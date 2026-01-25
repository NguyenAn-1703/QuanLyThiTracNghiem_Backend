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
            ->groupBy('actionId')
            ->map(function ($items) {
                return [
                    'name' => $items->first()->action->name,
                    'canView'   => $items->contains('hanhdong', 'view'),
                    'canCreate' => $items->contains('hanhdong', 'add'),
                    'canUpdate' => $items->contains('hanhdong', 'update'),
                    'canDelete' => $items->contains('hanhdong', 'delete')
                ];
            })->values();


        return $permission;
    }

    public function createRoleWithPermissions(array $data)
    {
        //transaction kiểu II, đảm bảo rollback toàn bộ khi có lỗi
        return DB::transaction(function () use ($data) {
            // 1. Thêm role
            $role = Role::create([
                'name' => $data['name'],
            ]);

            // 2. Chuẩn bị dữ liệu role_details
            $roleDetailsData = [];
            foreach ($data['role_details'] as $roleDetail) {
                //Tìm action cho mỗi quyền hạn
                $action = Action::where('name', $roleDetail['name'])->firstOrFail();
                if ($roleDetail['canView']) {
                    $roleDetailsData[] = [
                        'roleId'   => $role->id,
                        'actionId' => $action->id,
                        'hanhdong'  => 'view',
                    ];
                }

                if ($roleDetail['canCreate']) {
                    $roleDetailsData[] = [
                        'roleId'   => $role->id,
                        'actionId' => $action->id,
                        'hanhdong'  => 'add',
                    ];
                }

                if ($roleDetail['canUpdate']) {
                    $roleDetailsData[] = [
                        'roleId'   => $role->id,
                        'actionId' => $action->id,
                        'hanhdong'  => 'update',
                    ];
                }

                if ($roleDetail['canDelete']) {
                    $roleDetailsData[] = [
                        'roleId'   => $role->id,
                        'actionId' => $action->id,
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
                'name' => $data['name'],
            ]);

            // 3. Xoá toàn bộ quyền cũ
            RoleDetail::where('roleId', $role->id)->delete();

            // 4. Chuẩn bị dữ liệu quyền mới
            $roleDetailsData = [];

            //tương tự như insert
            foreach ($data['role_details'] as $roleDetail) {

                // Tìm action tương ứng
                $action = Action::where('name', $roleDetail['name'])->firstOrFail();

                if ($roleDetail['canView']) {
                    $roleDetailsData[] = [
                        'roleId'    => $role->id,
                        'actionId'  => $action->id,
                        'hanhdong'  => 'view',
                    ];
                }

                if ($roleDetail['canCreate']) {
                    $roleDetailsData[] = [
                        'roleId'    => $role->id,
                        'actionId'  => $action->id,
                        'hanhdong'  => 'add',
                    ];
                }

                if ($roleDetail['canUpdate']) {
                    $roleDetailsData[] = [
                        'roleId'    => $role->id,
                        'actionId'  => $action->id,
                        'hanhdong'  => 'update',
                    ];
                }

                if ($roleDetail['canDelete']) {
                    $roleDetailsData[] = [
                        'roleId'    => $role->id,
                        'actionId'  => $action->id,
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
            RoleDetail::where('roleId', $role->id)->delete();

            // 3. Xóa role
            $role->delete();

            return true;
        });
    }
}
