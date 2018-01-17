<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middlewareGroup('admin', [
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    \App\Http\Middleware\AdminBeforeCheck::class,
]);

Route::any('/device/list', 'Admin\DeviceController@list');
Route::any('/device/add', 'Admin\DeviceController@add');
Route::any('/device/remoteUpgrade', 'Admin\DeviceController@remoteUpgrade');
Route::any('/device/slaveBinManage', 'Admin\DeviceController@slaveBinManage');
Route::any('/device/remoteTunnel', 'Admin\DeviceController@remoteTunnel');

Route::any('/user/list', 'Admin\UserController@list');
Route::any('/user/feedback', 'Admin\UserController@feedback');

Route::any('/orders/list', 'Admin\OrdersController@list');

Route::any('/charge/list', 'Admin\ChargeController@list');

Route::any('/refunds/list', 'Admin\RefundsController@list');

Route::any('/admins/list', 'Admin\AdminController@list');
Route::any('/admins/add', 'Admin\AdminController@add');
Route::any('/admins/login', 'Admin\AdminController@login')->name('login');
Route::any('/admins/logout', 'Admin\AdminController@logout');

Route::any('/test', function () {
    $d = Route::currentRouteAction();
    var_dump($d);
    exit;
    $a = view('admin/test');
    var_dump($a->render());
    //echo $a;
});

//放在最后
Route::any('/', 'Admin\AdminController@login')->name('login');
