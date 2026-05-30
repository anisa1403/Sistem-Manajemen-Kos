<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminSewaController;
use App\Http\Controllers\AdminPembayaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserKamarController;
use App\Http\Controllers\UserSewaController;
use App\Http\Controllers\UserPembayaranController;
use App\Models\Kamar;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin-login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin-login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('admin')->name('admin.dashboard');
Route::get('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware('admin')->group(function () {
    Route::get('/admin/user', [AdminUsersController::class, 'index']);
    Route::get('/admin/user/create', [AdminUsersController::class, 'create']);
    Route::post('/admin/user', [AdminUsersController::class, 'store']);
    Route::get('/admin/user/{id_user}/edit', [AdminUsersController::class, 'edit']);
    Route::put('/admin/user/{id_user}', [AdminUsersController::class, 'update']);
    Route::delete('/admin/user/{id_user}', [AdminUsersController::class, 'destroy']);

    Route::get('/admin/tipe-kamar', [\App\Http\Controllers\TipeKamarController::class, 'index']);

    Route::get('/admin/tipe-kamar/create', [\App\Http\Controllers\TipeKamarController::class, 'create']);
    Route::post('/admin/tipe-kamar', [\App\Http\Controllers\TipeKamarController::class, 'store']);
    Route::get('/admin/tipe-kamar/{id}/edit', [\App\Http\Controllers\TipeKamarController::class, 'edit']);
    Route::put('/admin/tipe-kamar/{id}', [\App\Http\Controllers\TipeKamarController::class, 'update']);
    Route::delete('/admin/tipe-kamar/{id}', [\App\Http\Controllers\TipeKamarController::class, 'destroy']);

    Route::get('/admin/kamar', [\App\Http\Controllers\KamarController::class, 'index']);
    Route::get('/admin/kamar/create', [\App\Http\Controllers\KamarController::class, 'create']);
    Route::post('/admin/kamar', [\App\Http\Controllers\KamarController::class, 'store']);
    Route::get('/admin/kamar/{id}/edit', [\App\Http\Controllers\KamarController::class, 'edit']);
    Route::put('/admin/kamar/{id}', [\App\Http\Controllers\KamarController::class, 'update']);
    Route::delete('/admin/kamar/{id}', [\App\Http\Controllers\KamarController::class, 'destroy']);

    Route::get('/admin/sewa', [AdminSewaController::class, 'index']);
    Route::get('/admin/sewa/{id_sewa}', [AdminSewaController::class, 'show']);

    Route::get('/admin/pembayaran', [AdminPembayaranController::class, 'index']);
    Route::get('/admin/pembayaran/{id_pembayaran}', [AdminPembayaranController::class, 'show']);
});


Route::middleware(['auth'])->group(function () {

    Route::get('/user', function () {
        $kamar = Kamar::with('tipeKamar')->get();
        $currentSewa = auth()->user()->sewa()
            ->with('kamar.tipeKamar')
            ->latest('id_sewa')
            ->first();

        $currentDue = null;
        if ($currentSewa) {
            $totalContract = $currentSewa->kamar->tipeKamar->harga * $currentSewa->jumlah_bulan;
            $paid = $currentSewa->pembayaran()->sum('jumlah');
            $currentDue = max(0, $totalContract - $paid);
        }

        $notifications = 0;
        return view('user.landing', compact('kamar', 'currentSewa', 'currentDue', 'notifications'));
    })->name('user.home');

    Route::get('/user/kamar', [UserKamarController::class, 'index']);
    Route::get('/user/sewa/{no_kamar}', [UserSewaController::class, 'create']);
    Route::post('/user/sewa', [UserSewaController::class, 'store']);
    Route::get('/user/pembayaran/next', [UserPembayaranController::class, 'next']);
    Route::get('/user/pembayaran', [UserPembayaranController::class, 'index']);
    Route::get('/user/pembayaran/{id}', [UserPembayaranController::class, 'create']);
    Route::post('/user/pembayaran', [UserPembayaranController::class, 'store']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


require __DIR__.'/auth.php';

