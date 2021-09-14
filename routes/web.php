<?php

use App\Http\Controllers\admin\CheckListController;
use App\Http\Controllers\admin\CheckListGroupController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\Admin\TaskController;
use App\Models\CheckList;
use App\Models\CheckListGroup;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=>'auth'],function(){

    Route::group(['middleware'=>'is_admin','prefix'=>'admin', 'as'=> 'admin.'],function(){
           Route::resource('pages',PageController::class)->only(['edit','update']);
           Route::resource('checklist_groups',CheckListGroupController::class);
           Route::resource('checklist_groups.checklists',CheckListController::class);
           Route::resource('checklists.tasks',TaskController::class);

    });
});