<?php

namespace App\Services;

use App\Models\Action;
use App\Models\Role;
use App\Models\RoleDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleService
{
    public function getRoleDetail(Role $role)
    {
        $role = Role::with('role_details.action')->findOrFail($role->id);
        $role_details = $role->role_details;

        $permission = $role_details
            ->groupBy('chucNangId')
            ->map(function ($items) {
                return [
                    'tenChucNang' => $items->first()->action->tenChucNang,
                    'canView'   => $items->contains('hanhDong', 'VIEW'),
                    'canCreate' => $items->contains('hanhDong', 'ADD'),
                    'canUpdate' => $items->contains('hanhDong', 'UPDATE'),
                    'canDelete' => $items->contains('hanhDong', 'DELETE')
                ];
            })->values();

        $response = [
            "id" => $role->id,
            "tenNhomQuyen" => $role->tenNhomQuyen,
            "role_details" => $permission
        ];

        return $response;
    }

    // *** format gửi tạo 1 phân quyền
    // {
    //   "tenNhomQuyen": "Nhân viên bán hàng",
    //   "role_details": [
    //     {
    //       "tenChucNang": "QL_NHOMHP",
    //       "canView": true,
    //       "canCreate": false,
    //       "canUpdate": false,
    //       "canDelete": false
    //     },
    //     {
    //       "tenChucNang": "QL_CAUHOI",
    //       "canView": true,
    //       "canCreate": true,
    //       "canUpdate": false,
    //       "canDelete": false
    //     }
    //   ]
    // }
    public function createRoleWithPermissions(array $data)
    {
        //transaction kiểu II, đảm bảo rollback toàn bộ khi có lỗi
        return DB::transaction(function () use ($data) {
            // 1. Thêm role
            $role = Role::create([
                'tenNhomQuyen' => $data['tenNhomQuyen'],
            ]);

            // 2. Chuẩn bị dữ liệu role_details
            $roleDetailsData = [];
            foreach ($data['role_details'] as $roleDetail) {
                //Tìm action cho mỗi quyền hạn
                $action = Action::where('tenChucNang', $roleDetail['tenChucNang'])->firstOrFail();
                if ($roleDetail['canView']) {
                    $roleDetailsData[] = [
                        'nhomQuyenId'   => $role->id,
                        'chucNangId' => $action->id,
                        'hanhdong'  => 'VIEW',
                    ];
                }

                if ($roleDetail['canCreate']) {
                    $roleDetailsData[] = [
                        'nhomQuyenId'   => $role->id,
                        'chucNangId' => $action->id,
                        'hanhdong'  => 'ADD',
                    ];
                }

                if ($roleDetail['canUpdate']) {
                    $roleDetailsData[] = [
                        'nhomQuyenId'   => $role->id,
                        'chucNangId' => $action->id,
                        'hanhdong'  => 'UPDATE',
                    ];
                }

                if ($roleDetail['canDelete']) {
                    $roleDetailsData[] = [
                        'nhomQuyenId'   => $role->id,
                        'chucNangId' => $action->id,
                        'hanhdong'  => 'DELETE',
                    ];
                }
            }

            // 3. Insert batch 1 lần
            RoleDetail::insert($roleDetailsData);

            return $role->load('role_details.action');
        });
    }

    public function updateRoleWithPermissions(array $data, $id)
    {
        return DB::transaction(function () use ($data, $id) {

            // 1. Lấy role cần update
            $role = Role::findOrFail($id);

            // 2. Update thông tin role
            $role->update([
                'tenNhomQuyen' => $data['tenNhomQuyen'],
            ]);

            // 3. Xoá toàn bộ quyền cũ
            RoleDetail::where('nhomQuyenId', $role->id)->delete();

            // 4. Chuẩn bị dữ liệu quyền mới
            $roleDetailsData = [];

            //tương tự như insert
            foreach ($data['role_details'] as $roleDetail) {

                // Tìm action tương ứng
                $action = Action::where('tenChucNang', $roleDetail['tenChucNang'])->firstOrFail();

                if ($roleDetail['canView']) {
                    $roleDetailsData[] = [
                        'nhomQuyenId'    => $role->id,
                        'chucNangId'  => $action->id,
                        'hanhdong'  => 'VIEW',
                    ];
                }

                if ($roleDetail['canCreate']) {
                    $roleDetailsData[] = [
                        'nhomQuyenId'    => $role->id,
                        'chucNangId'  => $action->id,
                        'hanhdong'  => 'ADD',
                    ];
                }

                if ($roleDetail['canUpdate']) {
                    $roleDetailsData[] = [
                        'nhomQuyenId'    => $role->id,
                        'chucNangId'  => $action->id,
                        'hanhdong'  => 'UPDATE',
                    ];
                }

                if ($roleDetail['canDelete']) {
                    $roleDetailsData[] = [
                        'nhomQuyenId'    => $role->id,
                        'chucNangId'  => $action->id,
                        'hanhdong'  => 'DELETE',
                    ];
                }
            }

            // 5. Insert batch quyền mới
            if (!empty($roleDetailsData)) {
                RoleDetail::insert($roleDetailsData);
            }
            return $role->load('role_details.action');
        });
    }

    public function deleteRoleWithPermissions($id)
    {
        return DB::transaction(function () use ($id) {

            // 1. Lấy role cần xóa
            $role = Role::findOrFail($id);

            // 2. Xóa toàn bộ quyền của role
            RoleDetail::where('nhomQuyenId', $role->id)->delete();

            // 3. Xóa role
            $role->delete();

            return true;
        });
    }

    public function hasRole($id, $permission)
    { //cho middleware
        $role = Role::findOrFail($id);
        if (!$role || !isset($role['role_details'])) {
            return false; // nếu không có quyền nào trả về false
        }

        $parts = explode('_', $permission, 2);

        [$action, $function] = $parts;

        $actionMap = [
            'view'    => 'canView',
            'create'   => 'canCreate',
            'update'    => 'canUpdate',
            'delete'    => 'canDelete',
        ];

        $field = $actionMap[$action];

        $roleDetailData = $this->getRoleDetail($role);

        foreach ($roleDetailData["role_details"] as $detail) {
            if ($detail['tenChucNang'] === $function) {
                return $detail[$field]; // trả true/false
            }
        }

        // Log quyền cần và quyền đang có
        Log::info("Kiểm tra quyền", [
            'role_id' => $id,
            'permission_checked' => $permission,
            'user_has_permission' => $this->getRoleDetail($role),
        ]);

        return false;
    }
}
