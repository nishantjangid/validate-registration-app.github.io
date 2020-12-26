<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/storage/{extra}', function ($extra) {
    return redirect("/public/storage/$extra");
})->where('extra', '.*');

Route::get('/login', function () {
    if(Session::has('user'))
    {
        return redirect('/');
    }else{
        return view('login');

    }
});
Route::get('/registration', function () {
    if(Session::has('user'))
    {
        return redirect('/');
    }else{
        return view('registration');

    }
});


Route::get('/',[App\Http\Controllers\EmployeeController::class,'index']);
Route::post('/login-user',[App\Http\Controllers\EmployeeController::class,'login']);
Route::post('/register-user',[App\Http\Controllers\EmployeeController::class,'registration']);
Route::get('/forgot-password',function(){
    if(Session::has('user'))
    {
        return redirect('/myaccount');
    }else{
        return view('forgot-password');

    }
});
Route::post('/forgotPassword',[App\Http\Controllers\EmployeeController::class,'forgotPassword'])->name('forgetPassword');
Route::group(['middleware'=>['ProtectPage']],function(){
    Route::view('/myaccount','myaccount');
    Route::get('/edit-profile',[App\Http\Controllers\EmployeeController::class,'editForm']);
    Route::post('/update-user',[App\Http\Controllers\EmployeeController::class,'updateForm']);
    Route::view('/change-password','change-password');
    Route::post('/changePassword',[App\Http\Controllers\EmployeeController::class,'changePassword']);
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/login');
});


//admin area routes
Route::get('/admin/login', function () {
    if(Session::has('admin'))
    {
        return redirect('/admin');
    }else{
        return view('/admin/login');

    }
});
Route::post('/admin-login',[App\Http\Controllers\AdminController::class,'adminlogin']);

Route::get('/admin/logout', function () {
    Session::forget('admin');
    return redirect('/admin/login');
});

Route::group(['middleware'=>['ProtectAdmin']],function(){
    Route::get('/admin',[App\Http\Controllers\AdminController::class,'DashboardDetail'])->name('admin.dashboard');
    Route::get('/admin/view-employee',[App\Http\Controllers\AdminController::class,'viewEmployee'])->name('view-employee');
    Route::view('/admin/insert-employee','admin/dashboard')->name('insert-employee');
    Route::post('/admin/insertEmployee',[App\Http\Controllers\AdminController::class,'insertEmployee']);
    Route::get('/admin/delete-employee/{id}',[App\Http\Controllers\AdminController::class,'deleteEmployee']);
    Route::get('/admin/edit-employee/{id}',[App\Http\Controllers\AdminController::class,'editForm']);
    Route::post('/admin/editEmployee',[App\Http\Controllers\AdminController::class,'editEmployee']);
    Route::get('/admin/status-change/{id}/{status}',[App\Http\Controllers\AdminController::class,'changeStatus']);
});

Route::post('/admin/admin-login',[App\Http\Controllers\AdminController::class,'viewEmployee']);
// Route::view('/admin/forgot-password','admin/forgot-password');
Route::get('/admin/forgot-password', function () {
    if(Session::has('admin'))
    {
        return redirect('/admin');
    }else{
        return view('admin/forgot-password');
    }
});
Route::post('/admin/reset-password',[App\Http\Controllers\AdminController::class,'resetPassword']);
