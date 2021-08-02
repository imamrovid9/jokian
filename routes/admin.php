<?php

Route::GET('/home', 'AdminController@index')->name('admin.home');
// Login and Logout
Route::GET('/', 'LoginController@showLoginForm')->name('admin.login');
Route::POST('/', 'LoginController@login');
Route::POST('/logout', 'LoginController@logout')->name('admin.logout');

// Password Resets
Route::POST('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('/password/reset', 'ResetPasswordController@reset');
Route::GET('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::GET('/password/change', 'AdminController@showChangePasswordForm')->name('admin.password.change');
Route::POST('/password/change', 'AdminController@changePassword');

// Register Admins
Route::get('/register', 'RegisterController@showRegistrationForm')->name('admin.register');
Route::post('/register', 'RegisterController@register');
Route::get('/{admin}/edit', 'RegisterController@edit')->name('admin.edit');
Route::delete('/{admin}', 'RegisterController@destroy')->name('admin.delete');
Route::patch('/{admin}', 'RegisterController@update')->name('admin.update');

// Admin Lists
Route::get('/show', 'AdminController@show')->name('admin.show');
Route::get('/me', 'AdminController@me')->name('admin.me');

// Admin Roles
Route::post('/{admin}/role/{role}', 'AdminRoleController@attach')->name('admin.attach.roles');
Route::delete('/{admin}/role/{role}', 'AdminRoleController@detach');

// Roles
Route::get('/roles', 'RoleController@index')->name('admin.roles');
Route::get('/role/create', 'RoleController@create')->name('admin.role.create');
Route::post('/role/store', 'RoleController@store')->name('admin.role.store');
Route::delete('/role/{role}', 'RoleController@destroy')->name('admin.role.delete');
Route::get('/role/{role}/edit', 'RoleController@edit')->name('admin.role.edit');
Route::patch('/role/{role}', 'RoleController@update')->name('admin.role.update');

// active status
Route::post('activation/{admin}', 'ActivationController@activate')->name('admin.activation');
Route::delete('activation/{admin}', 'ActivationController@deactivate');
Route::resource('permission', 'PermissionController');
Route::delete('article/delete/{id}', 'AdminController@deletearticle')->name('admin.deletearticle');
// Article
Route::get('/article', 'AdminController@addarticle')->name('admin.addarticle');
Route::post('/article', 'AdminController@postarticle')->name('admin.postarticle');
// ADD article
Route::get('/article/add', 'AdminController@tambaharticle')->name('admin.tambaharticle');

// detail article
Route::get('/detail/article/{id}', 'AdminController@detailarticle')->name('admin.detailarticle');
Route::get('/edit/article/{id}', 'AdminController@editarticle')->name('admin.editarticle');
Route::post('/edit/article/{id}', 'AdminController@posteditarticle')->name('admin.posteditarticle');

// 
Route::get('/people', 'AdminController@people')->name('admin.people');
Route::get('/peopletable', 'AdminController@peopletable')->name('admin.peopletable');
Route::post('/people/detail/{id}', 'AdminController@peopledetail')->name('admin.peopledetail');
Route::post('/people/edit/{id}', 'AdminController@peopleedit')->name('admin.peopleedit');
Route::post('/people/add', 'AdminController@addpeople')->name('admin.addpeople');
Route::delete('/people/delete/{id}', 'AdminController@deletepeople')->name('admin.deletepeople');



Route::fallback(function () {
    return abort(404);
});
