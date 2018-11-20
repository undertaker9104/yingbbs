<?php

use Spatie\Permission\Models\Permission;

return [
    'title'   => '權限',
    'single'  => '權限',
    'model'   => Permission::class,

    'permission' => function () {
        return Auth::user()->can('manage_users');
    },

    // 对 CRUD 动作的单独权限控制，通过返回布尔值来控制权限。
    'action_permissions' => [
        // 控制『新建按钮』的显示
        'create' => function ($model) {
            return true;
        },
        // 允许更新
        'update' => function ($model) {
            return true;
        },
        // 不允许删除
        'delete' => function ($model) {
            return false;
        },
        // 允许查看
        'view' => function ($model) {
            return true;
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title'    => '標示',
        ],
        'operation' => [
            'title'    => '管理',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => '標示(請慎重修改)',

            // 表单条目标题旁的『提示信息』
            'hint' => '修改權限標示會影響代碼的調用，请不要轻易更改。'
        ],
        'roles' => [
            'type' => 'relationship',
            'title' => '角色',
            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'name' => [
            'title' => '標示',
        ],
    ],
];