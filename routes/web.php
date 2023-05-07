<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Customer
    Route::delete('customers/destroy', 'CustomerController@massDestroy')->name('customers.massDestroy');
    Route::post('customers/media', 'CustomerController@storeMedia')->name('customers.storeMedia');
    Route::post('customers/ckmedia', 'CustomerController@storeCKEditorImages')->name('customers.storeCKEditorImages');
    Route::post('customers/parse-csv-import', 'CustomerController@parseCsvImport')->name('customers.parseCsvImport');
    Route::post('customers/process-csv-import', 'CustomerController@processCsvImport')->name('customers.processCsvImport');
    Route::resource('customers', 'CustomerController');

    // Saver
    Route::delete('savers/destroy', 'SaverController@massDestroy')->name('savers.massDestroy');
    Route::post('savers/media', 'SaverController@storeMedia')->name('savers.storeMedia');
    Route::post('savers/ckmedia', 'SaverController@storeCKEditorImages')->name('savers.storeCKEditorImages');
    Route::post('savers/parse-csv-import', 'SaverController@parseCsvImport')->name('savers.parseCsvImport');
    Route::post('savers/process-csv-import', 'SaverController@processCsvImport')->name('savers.processCsvImport');
    Route::resource('savers', 'SaverController');

    // Subscription
    Route::delete('subscriptions/destroy', 'SubscriptionController@massDestroy')->name('subscriptions.massDestroy');
    Route::post('subscriptions/parse-csv-import', 'SubscriptionController@parseCsvImport')->name('subscriptions.parseCsvImport');
    Route::post('subscriptions/process-csv-import', 'SubscriptionController@processCsvImport')->name('subscriptions.processCsvImport');
    Route::resource('subscriptions', 'SubscriptionController');

    // Payment Methods
    Route::delete('payment-methods/destroy', 'PaymentMethodsController@massDestroy')->name('payment-methods.massDestroy');
    Route::post('payment-methods/parse-csv-import', 'PaymentMethodsController@parseCsvImport')->name('payment-methods.parseCsvImport');
    Route::post('payment-methods/process-csv-import', 'PaymentMethodsController@processCsvImport')->name('payment-methods.processCsvImport');
    Route::resource('payment-methods', 'PaymentMethodsController');

    // Transaction
    Route::delete('transactions/destroy', 'TransactionController@massDestroy')->name('transactions.massDestroy');
    Route::post('transactions/parse-csv-import', 'TransactionController@parseCsvImport')->name('transactions.parseCsvImport');
    Route::post('transactions/process-csv-import', 'TransactionController@processCsvImport')->name('transactions.processCsvImport');
    Route::resource('transactions', 'TransactionController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
