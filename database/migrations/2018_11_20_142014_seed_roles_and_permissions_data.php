<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class SeedRolesAndPermissionsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //清除緩存
        app()['cache']->forget('spatie.permission.cache');
        //建立權限
        Permission::create(['name' => 'manage_contents']);
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'edit_settings']);

        //創立站長腳色,並賦予權限
        $founder = Role::create(['name' => 'Founder']);
        $founder->givePermissionTo('manage_contents');
        $founder->givePermissionTo('manage_users');
        $founder->givePermissionTo('edit_settings');

        //創建管理員腳色,並賦予權限
        $maintainer = Role::create(['name' => 'Maintainer']);
        $maintainer->givePermissionTo('manage_contents');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //清除緩存
        app()['cache']->forget('spatie.permission.cache');

        //清空所有資料庫數據
        $tableNames = config('permission.table_names');
        Model::unguard();
        DB::table($tableNames['role_has_permissions'])->delete();
        DB::table($tableNames['model_has_roles'])->delete();
        DB::table($tableNames['model_has_permissions'])->delete();
        DB::table($tableNames['roles'])->delete();
        DB::table($tableNames['permissions'])->delete();
        Model::reguard();
    }
}
