<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Customer
    Route::post('customers/media', 'CustomerApiController@storeMedia')->name('customers.storeMedia');
    Route::apiResource('customers', 'CustomerApiController');

    // Saver
    Route::post('savers/media', 'SaverApiController@storeMedia')->name('savers.storeMedia');
    Route::apiResource('savers', 'SaverApiController');

    // Subscription
    Route::apiResource('subscriptions', 'SubscriptionApiController');

    // Payment Methods
    Route::apiResource('payment-methods', 'PaymentMethodsApiController');

    // Transaction
    Route::apiResource('transactions', 'TransactionApiController');
});
