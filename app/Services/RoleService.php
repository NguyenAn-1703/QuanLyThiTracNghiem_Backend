<?php

namespace App\Services;

use App\Models\Action;
use App\Models\Role;
use App\Models\RoleDetail;
use Illuminate\Support\Facades\DB;

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


        return $permission;
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
                        'hanhdong'  => 'view',
                    ];
                }

                if ($roleDetail['canCreate']) {
                    $roleDetailsData[] = [
                        'nhomQuyenId'   => $role->id,
                        'chucNangId' => $action->id,
                        'hanhdong'  => 'add',
                    ];
                }

                if ($roleDetail['canUpdate']) {
                    $roleDetailsData[] = [
                        'nhomQuyenId'   => $role->id,
                        'chucNangId' => $action->id,
                        'hanhdong'  => 'update',
                    ];
                }

                if ($roleDetail['canDelete']) {
                    $roleDetailsData[] = [
                        'nhomQuyenId'   => $role->id,
                        'chucNangId' => $action->id,
                        'hanhdong'  => 'delete',
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
                        'hanhdong'  => 'view',
                    ];
                }

                if ($roleDetail['canCreate']) {
                    $roleDetailsData[] = [
                        'nhomQuyenId'    => $role->id,
                        'chucNangId'  => $action->id,
                        'hanhdong'  => 'add',
                    ];
                }

                if ($roleDetail['canUpdate']) {
                    $roleDetailsData[] = [
                        'nhomQuyenId'    => $role->id,
                        'chucNangId'  => $action->id,
                        'hanhdong'  => 'update',
                    ];
                }

                if ($roleDetail['canDelete']) {
                    $roleDetailsData[] = [
                        'nhomQuyenId'    => $role->id,
                        'chucNangId'  => $action->id,
                        'hanhdong'  => 'delete',
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
}
