<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssignTaskController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainmenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegUserController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::post('/signin', [LoginController::class, 'authenticate'])->name('signin');
Route::post('/resetpassword', [LoginController::class, 'resetpassword'])->name('resetpassword');
Route::post('/confirmpass', [LoginController::class, 'confirmpass'])->name('confirmpass');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/forget', [LoginController::class, 'forget'])->name('forget');

//profile User Start

Route::get('/loadprofile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/updatepic', [ProfileController::class, 'profilepic'])->name('profiles.updatepic');
Route::post('/store', [ProfileController::class, 'store'])->name('profiles.store');
Route::put('/password', [ProfileController::class, 'password'])->name('profiles.password');

//profile User End

// Normal User Start

Route::get('/', [HomeController::class, 'index'])->name('normal.home');
Route::get('/signup', [HomeController::class, 'signup'])->name('normal.signup');
Route::get('/login', [HomeController::class, 'login'])->name('normal.login');
Route::post('/register', [HomeController::class, 'register'])->name('normal.register');

// Normal User End

// Register User Start

Route::get('/reguser/home', [RegUserController::class, 'index'])->name('register.home');

// Register User End

// Admin User Start

Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
Route::get('/admin/usercreate', [AdminController::class, 'usercreate'])->middleware('admin')->name('admin.usercreate');
Route::post('/admin/usercreate/usercreate', [AdminController::class, 'addusertype'])->middleware('admin')->name('admin.addusertype');

//Admin User list Action
Route::get('/admin/getnormaluserlist', [AdminController::class, 'getnormaluserlist'])->name('admin.getnormaluserlist');
Route::get('/admin/getnormaluserblacklist', [AdminController::class, 'getnormaluserblacklist'])->name('admin.getnormaluserblacklist');

Route::get('/admin/getsubadminlist', [AdminController::class, 'getsubadminlist'])->name('admin.getsubadminlist');
Route::get('/admin/getsubadminblacklist', [AdminController::class, 'getsubadminblacklist'])->name('admin.getsubadminblacklist');

Route::get('/admin/getadminlist', [AdminController::class, 'getadminlist'])->middleware('admin')->name('admin.getadminlist');
Route::get('/admin/getadminblacklist', [AdminController::class, 'getadminblacklist'])->middleware('admin')->name('admin.getadminblacklist');

Route::put('/admin/blacklistuser/user/{user}', [AdminController::class, 'blacklistuser'])->name('admin.blacklistuser');
Route::patch('/admin/activeuser/user/{user}', [AdminController::class, 'activeuser'])->name('admin.activeuser');

Route::get('/admin/resetpass/user/{user}', [AdminController::class, 'loadrestpass'])->middleware('admin')->name('admin.loadrestpass');
Route::post('/admin/passresetconfirm/user/{user}', [AdminController::class, 'passresetconfirm'])->middleware('admin')->name('admin.passresetconfirm');
// Admin User End

//Main Menu Start

Route::get('/admin/mainmenu/create', [MainmenuController::class, 'create'])->name('mainmenu.create');
Route::get('/admin/mainmenu/list', [MainmenuController::class, 'index'])->name('mainmenu.index');
Route::get('/admin/mainmenu/{mainmenu}/edit', [MainmenuController::class, 'edit'])->name('mainmenu.edit');
Route::put('/admin/mainmenu/{mainmenu}', [MainmenuController::class, 'update'])->name('mainmenu.update');
Route::post('/admin/mainmenu/store', [MainmenuController::class, 'store'])->name('mainmenu.store');
Route::delete('/admin/mainmenu/{mainmenu}', [MainmenuController::class, 'destroy'])->name('mainmenu.destroy');

// Active Disable
Route::put('/admin/disable/mainmenu/{mainmenu}/', [MainmenuController::class, 'disable'])->name('mainmenu.disable');
Route::patch('/admin/active/mainmenu/{mainmenu}/', [MainmenuController::class, 'active'])->name('mainmenu.active');
Route::get('/admin/mainmenu/disablelist', [MainmenuController::class, 'disablelist'])->name('mainmenu.disableindex');
//Main Menu End

//Sub Menu Start

Route::get('/admin/submenu/create', [SubmenuController::class, 'create'])->name('submenu.create');
Route::get('/admin/submenu/list', [SubmenuController::class, 'index'])->name('submenu.index');
Route::get('/admin/submenu/{submenu}/edit', [SubmenuController::class, 'edit'])->name('submenu.edit');
Route::put('/admin/submenu/{submenu}', [SubmenuController::class, 'update'])->name('submenu.update');
Route::post('/admin/submenu/store', [SubmenuController::class, 'store'])->name('submenu.store');

//Active Disable

Route::put('/admin/disable/submenu/{submenu}/', [SubmenuController::class, 'disable'])->name('submenu.disable');
Route::patch('/admin/active/submenu/{submenu}/', [SubmenuController::class, 'active'])->name('submenu.active');
Route::get('/admin/submenu/disablelist', [SubmenuController::class, 'disablelist'])->name('submenu.disableindex');

//Sub Menu End

//Project Start

Route::get('/admin/project/create', [ProjectController::class, 'create'])->name('project.create');
Route::get('/admin/project/list', [ProjectController::class, 'index'])->name('project.index');
Route::get('/admin/project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/admin/project/{project}', [ProjectController::class, 'update'])->name('project.update');
Route::post('/admin/project/store', [ProjectController::class, 'store'])->name('project.store');
Route::delete('/admin/project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');

//Project End

//Task Start

Route::get('/admin/task/create', [TaskController::class, 'create'])->name('task.create');
Route::get('/admin/task/list', [TaskController::class, 'index'])->name('task.index');
Route::get('/admin/task/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/admin/task/{task}', [TaskController::class, 'update'])->name('task.update');
Route::post('/admin/task/store', [TaskController::class, 'store'])->name('task.store');
Route::delete('/admin/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');

//Task End

//Assign Task Start

Route::get('/admin/assingtask/create', [AssignTaskController::class, 'create'])->name('assingtask.create');
Route::get('/admin/assingtask/list', [AssignTaskController::class, 'index'])->name('assingtask.index');
Route::get('/admin/assingtask/{assingtask}/edit', [AssignTaskController::class, 'edit'])->name('assingtask.edit');
Route::put('/admin/assingtask/{assingtask}', [AssignTaskController::class, 'update'])->name('assingtask.update');
Route::post('/admin/assingtask/store', [AssignTaskController::class, 'store'])->name('assingtask.store');
Route::delete('/admin/assingtask/{assingtask}', [AssignTaskController::class, 'destroy'])->name('assingtask.destroy');

//Assign Task End

// Admin task show

Route::get('/admin/user/task/list/{projectid}', [AdminController::class, 'userTaskList'])->name('usertasklist.show');
Route::get('/admin/single/user/task/list/{projectid}/{userid}', [AdminController::class, 'singleUserTaskList'])->name('singleusertasklist.show');
Route::get('/admin/mainmenu/{mainmenu}/edit', [AdminController::class, 'edit'])->name('mainmenu.edit');
Route::put('/admin/mainmenu/{mainmenu}', [AdminController::class, 'update'])->name('mainmenu.update');
Route::post('/admin/mainmenu/store', [AdminController::class, 'store'])->name('mainmenu.store');
Route::delete('/admin/mainmenu/{mainmenu}', [AdminController::class, 'destroy'])->name('mainmenu.destroy');

// Task Done / Pending

Route::patch('/admin/action/task/status/{assingtask}/{status}', [AdminController::class, 'taskStatus'])->name('taskstatus.action');

// Task Done / Pending

// Admin task show

//Image Start

Route::get('/admin/image/create/{projectid}', [ImageController::class, 'create'])->name('image.create');
Route::get('/admin/image/list/{projectid}', [ImageController::class, 'index'])->name('image.index');
Route::get('/admin/image/show/list/{projectid}', [ImageController::class, 'showAllImage'])->name('allimage.show');
Route::get('/admin/singel/user/image/{projectid}/{userid}', [ImageController::class, 'singelUserImage'])->name('singleuserimage.show');
Route::put('/admin/image/{image}', [ImageController::class, 'update'])->name('image.update');
Route::post('/admin/image/store', [ImageController::class, 'store'])->name('image.store');
Route::delete('/admin/image/{image}', [ImageController::class, 'destroy'])->name('image.destroy');

Route::post('/admin/image/list/bydate', [ImageController::class, 'getPicBydate'])->name('image.getpicdate');
Route::post('/admin/single/user/image/list/bydate', [ImageController::class, 'userGetPicBydate'])->name('image.userpicdate');

//Image End
