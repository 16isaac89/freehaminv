<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'customer_create',
            ],
            [
                'id'    => 20,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 21,
                'title' => 'customer_show',
            ],
            [
                'id'    => 22,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 23,
                'title' => 'customer_access',
            ],
            [
                'id'    => 24,
                'title' => 'management_access',
            ],
            [
                'id'    => 25,
                'title' => 'saver_create',
            ],
            [
                'id'    => 26,
                'title' => 'saver_edit',
            ],
            [
                'id'    => 27,
                'title' => 'saver_show',
            ],
            [
                'id'    => 28,
                'title' => 'saver_delete',
            ],
            [
                'id'    => 29,
                'title' => 'saver_access',
            ],
            [
                'id'    => 30,
                'title' => 'subscription_create',
            ],
            [
                'id'    => 31,
                'title' => 'subscription_edit',
            ],
            [
                'id'    => 32,
                'title' => 'subscription_show',
            ],
            [
                'id'    => 33,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => 34,
                'title' => 'subscription_access',
            ],
            [
                'id'    => 35,
                'title' => 'payment_method_create',
            ],
            [
                'id'    => 36,
                'title' => 'payment_method_edit',
            ],
            [
                'id'    => 37,
                'title' => 'payment_method_show',
            ],
            [
                'id'    => 38,
                'title' => 'payment_method_delete',
            ],
            [
                'id'    => 39,
                'title' => 'payment_method_access',
            ],
            [
                'id'    => 40,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 41,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 42,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 43,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 44,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 45,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
