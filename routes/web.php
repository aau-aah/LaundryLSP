<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('pages.dashboard');
    // })->name('dashboard');

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')
            ->name('dashboard');
    });
    Route::middleware(['only-admin'])->group(function () {
        Route::controller(PaketController::class)->group(function () {
            Route::get('/pakets', 'index')
                ->name('pakets');
            Route::post('/pakets', 'store')
                ->name('paket.store');
        });
    });

    Route::middleware(['only-kasir'])->group(function () {
        Route::controller(OutletController::class)->group(function () {
            Route::get('/outlets', 'index')
                ->name('outlets');
            Route::post('/outlet', 'store')
                ->name('outlet.store')->middleware('only-admin');
        });

        Route::controller(MemberController::class)->group(function () {
            Route::get('/members', 'index')
                ->name('members');
            Route::post('/member', 'store')
                ->name('member.store');
        });

        Route::controller(TransaksiController::class)->group(function () {
            Route::get('/transactions', 'index')
                ->name('transactions');
            Route::post('/transaction', 'store')
                ->name('transaction.store');
        });
    });
});
