<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;

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
})->name('index');

Route::get('/about-us', function () {
    return view('about_us');
})->name('about');

Route::get('/contact-us', function () {
    return view('contact_us');
})->name('contact');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::group(['prefix' => 'home'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::group(['middleware' => 'check_admin'], function () {
            Route::post('/add_feed', [HomeController::class, 'addFeed'])->name('home.add_feed');
            Route::delete('/delete_feed', [HomeController::class, 'deleteFeed'])->name('home.delete_feed');

        });
        Route::group(['as' => 'projects.'], function () {
            Route::get('/projects', [ProjectController::class, 'index'])->name('index');
            Route::get('/projects/{proyek_id}', [ProjectController::class, 'detailPage'])->name('detail');
            Route::group(['middleware' => 'check_admin'], function () {
                Route::get('/project/{type}/{id?}', [ProjectController::class, 'crudPage'])->name('crud');
                Route::post('/project', [ProjectController::class, 'create'])->name('post');
                Route::put('/project', [ProjectController::class, 'edit'])->name('put');
                Route::delete('/project', [ProjectController::class, 'delete'])->name('delete');
            });
        });
    });


    Route::prefix('dashboard')->name('dashboard.')->group(
        function () {
            Route::get('/', [DashboardProjectController::class, 'index'])->name('index');
            Route::get('/list_investor', [DashboardProjectController::class, 'list_investor'])->name('list_investor');
            Route::middleware('check_admin')->prefix('project_detail')->name('projects.')->group(function () {
                Route::get('/{id}', [DashboardProjectController::class, 'detail'])->name('detail');
                Route::post('/{id}/add_transaksi', [DashboardProjectController::class, 'addTransaksi'])->name('add_transaksi');
                Route::post('/{id}/add_investasi', [DashboardProjectController::class, 'addInvestasi'])->name('add_investasi');
            });
        }
    );
});
