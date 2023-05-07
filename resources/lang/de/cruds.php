<?php

return [
    'userManagement' => [
        'title'          => 'Benutzerverwaltung',
        'title_singular' => 'Benutzerverwaltung',
    ],
    'permission' => [
        'title'          => 'Zugriffsrechte',
        'title_singular' => 'Berechtigung',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Rollen',
        'title_singular' => 'Rolle',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Benutzer',
        'title_singular' => 'Benutzer',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'First Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'username'                 => 'Username',
            'username_helper'          => ' ',
            'phonenumber'              => 'Phone number',
            'phonenumber_helper'       => ' ',
            'picture'                  => 'Picture',
            'picture_helper'           => ' ',
            'second_name'              => 'Second Name',
            'second_name_helper'       => ' ',
            'fcmtoken'                 => 'Fcmtoken',
            'fcmtoken_helper'          => ' ',
            'designation'              => 'Designation',
            'designation_helper'       => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'customer' => [
        'title'          => 'Customer',
        'title_singular' => 'Customer',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'firstname'         => 'Firstname',
            'firstname_helper'  => ' ',
            'secondname'        => 'Secondname',
            'secondname_helper' => ' ',
            'thirdname'         => 'Thirdname',
            'thirdname_helper'  => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'profilepic'        => 'Profilepic',
            'profilepic_helper' => ' ',
            'fcm'               => 'Fcm',
            'fcm_helper'        => ' ',
            'phone_1'           => 'Phone 1',
            'phone_1_helper'    => ' ',
            'phone_2'           => 'Phone 2',
            'phone_2_helper'    => ' ',
            'password'          => 'Password',
            'password_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'management' => [
        'title'          => 'Management',
        'title_singular' => 'Management',
    ],
    'saver' => [
        'title'          => 'Saver',
        'title_singular' => 'Saver',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'firstname'             => 'Firstname',
            'firstname_helper'      => ' ',
            'secondname'            => 'Secondname',
            'secondname_helper'     => ' ',
            'thirdname'             => 'Thirdname',
            'thirdname_helper'      => ' ',
            'email'                 => 'Email',
            'email_helper'          => ' ',
            'profilepic'            => 'Profilepic',
            'profilepic_helper'     => ' ',
            'phone_1'               => 'Phone 1',
            'phone_1_helper'        => ' ',
            'phone_2'               => 'Phone 2',
            'phone_2_helper'        => ' ',
            'password'              => 'Password',
            'password_helper'       => ' ',
            'type'                  => 'Type',
            'type_helper'           => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'account_number'        => 'Account Number',
            'account_number_helper' => ' ',
            'savings'               => 'Savings',
            'savings_helper'        => ' ',
            'shares'                => 'Shares',
            'shares_helper'         => ' ',
        ],
    ],
    'subscription' => [
        'title'          => 'Subscription',
        'title_singular' => 'Subscription',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'price'             => 'Price',
            'price_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'paymentMethod' => [
        'title'          => 'Payment Methods',
        'title_singular' => 'Payment Method',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'transaction' => [
        'title'          => 'Transaction',
        'title_singular' => 'Transaction',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'saver'                  => 'Saver',
            'saver_helper'           => ' ',
            'payment_method'         => 'Payment Method',
            'payment_method_helper'  => ' ',
            'shares_quantity'        => 'Shares Quantity',
            'shares_quantity_helper' => ' ',
            'amount'                 => 'Amount',
            'amount_helper'          => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],

];
