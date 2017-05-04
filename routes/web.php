<?php
Route::get('/', function () {
    return redirect('/home');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

// Registration Routes..
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

Route::group(['middleware' => ['auth', 'approved']], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('faq_categories', 'FaqCategoriesController');
    Route::post('faq_categories_mass_destroy', ['uses' => 'FaqCategoriesController@massDestroy', 'as' => 'faq_categories.mass_destroy']);
    Route::resource('faq_questions', 'FaqQuestionsController');
    Route::post('faq_questions_mass_destroy', ['uses' => 'FaqQuestionsController@massDestroy', 'as' => 'faq_questions.mass_destroy']);
    Route::resource('sales', 'SalesController');
    Route::post('sales_mass_destroy', ['uses' => 'SalesController@massDestroy', 'as' => 'sales.mass_destroy']);
    Route::resource('user_actions', 'UserActionsController');
    Route::get('internal_notifications/read', 'InternalNotificationsController@read');
    Route::resource('internal_notifications', 'InternalNotificationsController');
    Route::post('internal_notifications_mass_destroy', ['uses' => 'InternalNotificationsController@massDestroy', 'as' => 'internal_notifications.mass_destroy']);

});
