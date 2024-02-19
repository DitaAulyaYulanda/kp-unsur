<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\BeritaPenggunaController;
use App\Http\Controllers\FasilitasPenggunaController;
use App\Http\Controllers\ProfilguruController;
use App\Http\Controllers\ProfilSekolahPenggunaController;
use App\Http\Controllers\TrackingPenggunaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardPenggunaController;
use App\Models\User;
use App\Models\Berita;
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

// $user = Auth::user();
// Mengambil hanya data id user saja
$user = Auth::id();
if (Auth::check()) {
    // Pengguna telah berhasil masuk
}
Route::get('/', function () {
    return view('dashboard');
});
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [AdminController::class, 'index'])
    ->name('admin.home')
    ->middleware('is_admin');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/forgot-password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/forgot-password', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('admin/guru', [App\Http\Controllers\GuruController::class, 'index'])
//     ->name('admin.guru');
// // ->middleware('is_admin');

// //route tambah 
// Route::post('admin/guru', [GuruController::class, 'tambah_guru'])
//     ->name('admin.guru.submit');
// // ->middleware('is_admin');

// //route edit
// Route::patch('admin/guru', [GuruController::class, 'update_guru'])
//     ->name('admin.guru.update');
// // ->middleware('is_admin');
// Route::get('admin/ajaxadmin/dataGuru/{id}', [GuruController::class, 'getDataGuru']);

// //route delete
// Route::delete('/admin/guru', [GuruController::class, 'delete_guru'])
//     ->name('admin.guru.delete');
//     // ->middleware('is_admin');


Route::get('admin/guru', [App\Http\Controllers\GuruController::class, 'index'])
    ->name('admin.pengguna');
// ->middleware('is_admin');

//route tambah 
Route::post('admin/guru', [GuruController::class, 'submit_guru'])
    ->name('admin.guru.submit');
// ->middleware('is_admin');

//route edit
Route::patch('admin/guru', [GuruController::class, 'update'])
    ->name('admin.guru.update')->middleware('is_admin');
Route::get('admin/ajaxadmin/dataGuru/{id}', [GuruController::class, 'getDataGuru']);

//route delete
Route::get('/admin/guru/delete/{id}', [GuruController::class, 'delete_guru'])->name('admin.guru.delete')->middleware('is_admin');


Route::get('admin/tracking', [App\Http\Controllers\TrackingController::class, 'index'])
    ->name('admin.tracking');
// ->middleware('is_admin');

//route tambah 
Route::get('/tracking/create', [TrackingController::class, 'create'])->name('tracking.create');
Route::post('admin/tracking', [TrackingController::class, 'tambah_tracking'])
    ->name('admin.tracking.submit');
Route::get('admin/hasil', [TrackingController::class, 'hasil'])->name('admin.hasil');
// ->middleware('is_admin');

//route edit
Route::patch('admin/tracking', [TrackingController::class, 'update_tracking'])->name('admin.tracking.update')->middleware('is_admin');
Route::get('admin/ajaxadmin/dataTracking/{id}', [TrackingController::class, 'getDataTracking']);

//route delete
Route::get('/admin/tracking/delete/{id}', [TrackingController::class, 'delete_tracking'])->name('admin.tracking.delete')->middleware('is_admin');

Route::get('admin/fasilitas', [App\Http\Controllers\FasilitasController::class, 'index'])
    ->name('admin.fasilitas');
// ->middleware('is_admin');
//route tambah 
Route::post('admin/fasilitas', [FasilitasController::class, 'submit_fasilitas'])
    ->name('admin.fasilitas.submit');
// ->middleware('is_admin');

//route edit
Route::patch('admin/fasilitas', [FasilitasController::class, 'update'])
    ->name('admin.fasilitas.update');
// ->middleware('is_admin');
Route::get('admin/ajaxadmin/dataFasilitas/{id}', [FasilitasController::class, 'getDataFasilitas']);

//route delete
Route::get('/admin/fasilitas/delete/{id}', [FasilitasController::class, 'delete_fasilitas'])->name('admin.tracking.delete')->middleware('is_admin');

Route::get('admin/berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('admin.berita')->middleware('is_admin');

//route tambah 
Route::post('admin/berita', [BeritaController::class, 'tambah_berita'])->name('admin.berita.submit')->middleware('is_admin');

//route edit
Route::patch('admin/berita', [BeritaController::class, 'update_berita'])->name('admin.berita.update')->middleware('is_admin');
Route::get('admin/ajaxadmin/dataBerita/{id}', [BeritaController::class, 'getDataBerita']);

//route delete
Route::get('/admin/berita/delete/{id}', [BeritaController::class, 'delete_berita'])->name('admin.berita.delete')->middleware('is_admin');

Route::get('admin/profilsekolah', [App\Http\Controllers\ProfilSekolahController::class, 'index'])
    ->name('admin.profilsekolah');
// ->middleware('is_admin');

//route tambah 
Route::post('admin/profilsekolah', [ProfilSekolahController::class, 'tambah_profilsekolah'])
    ->name('admin.profilsekolah.submit');
// ->middleware('is_admin');

//route edit
Route::patch('admin/profilsekolah', [ProfilSekolahController::class, 'update_profilsekolah'])->name('admin.profilsekolah.update')->middleware('is_admin');
Route::get('admin/ajaxadmin/dataProfilsekolah/{id}', [ProfilSekolahController::class, 'getDataProfilsekolah']);

//route delete
Route::get('/admin/profilsekolah/delete/{id}', [ProfilSekolahController::class, 'delete_profilsekolah'])->name('admin.profilsekolah.delete')->middleware('is_admin');

Route::get('berita/pengguna', [App\Http\Controllers\BeritaPenggunaController::class, 'index'])->name('berita');
Route::get('fasilitas/pengguna', [App\Http\Controllers\FasilitasPenggunaController::class, 'index'])->name('fasilitas');
Route::get('profilguru/pengguna', [App\Http\Controllers\ProfilguruController::class, 'index'])->name('guru');
Route::get('profilsekolah/pengguna', [App\Http\Controllers\ProfilSekolahPenggunaController::class, 'index'])->name('sekolah');
Route::get('tracking/pengguna', [App\Http\Controllers\TrackingPenggunaController::class, 'index'])->name('tracking');
Route::post('tracking/store', [TrackingPenggunaController::class, 'store'])->name('tracking.store');
Route::get('tracking/hasil', [TrackingPenggunaController::class, 'hasil'])->name('hasil');

Route::get('admin/akun', [UserController::class, 'index'])->name('akun.show');
Route::get('/akun/create', [UserController::class, 'create'])->name('akun.create')->middleware('is_admin');
Route::post('akun/store', [UserController::class, 'store'])->name('akun.store')->middleware('is_admin');
Route::get('/akun/{id}/edit', [UserController::class, 'edit'])->name('akun.edit');
Route::patch('/akun/{id}', [UserController::class, 'update'])->name('akun.update');
Route::get('/admin/akun/delete/{id}', [UserController::class, 'destroy'])->name('akun.delete')->middleware('is_admin');
// Route::get('admin/user', [App\Http\Controllers\UserController::class, 'index'])
//     ->name('admin.pengguna');
// // ->middleware('is_admin');

// //route tambah 
// Route::post('admin/user', [UserController::class, 'submit_user'])
//     ->name('admin.pengguna.submit');
// // ->middleware('is_admin');

// //route edit
// Route::get('/admin/{id}/edit', [UserController::class, 'edit']);
// Route::patch('/admin/{id}', [UserController::class, 'update'])->name('admin.pengguna.update');
// Route::patch('admin/user', [UserController::class, 'update'])
//     ->name('admin.pengguna.update');
// Route::get('admin/ajaxadmin/dataUser/{id}', [UserController::class, 'getDataUser']);

//route delete
Route::get('/admin/user/delete/{id}', [UserController::class, 'delete_user'])->name('admin.user.delete')->middleware('is_admin');
Route::get('/', [App\Http\Controllers\DashboardPenggunaController::class, 'index']);
