<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RegistrationController;
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
Route::get('/storage-link', function () {
    $targetFolder = storage_path('app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder, $linkFolder);
});

Route::get('/', [LoginController::class,'index'])->middleware('auth');


Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});

Route::controller(RegistrationController::class)->group(function(){
    Route::get('registrationdosen', 'indexdosen')->name('registrasidosen');
    Route::post('registrationdosen', 'storedosen')->name('regisdosen.store');
    Route::get('registrationmahasiswa', 'indexmahasiswa')->name('registrasimahasiswa');
    Route::post('registrationmahasiswa', 'storemhs')->name('regismhs.store');

});

//Route::get('/mahasiswa', [MahasiswaController::class,'index']);

Route::group(['middleware'=>['auth']],function(){
    Route::group(['middleware' => ['cekUserLogin:1']],function(){
        // Route::resource('homeadmin',AdminController::class);
        Route::controller(AdminController::class)->group(function () {
            Route::get('/admin', 'index')->name('index.admin');
            Route::get('/admin/user', 'manageuser')->name('list.user');
            Route::get('/admin/gayabelajar', 'gayabelajar')->name('list.gayabelajar');
            Route::post('/admin/user', 'userapprove')->name('approve.user');
        });
    });

    Route::group(['middleware' => ['cekUserLogin:2']],function(){
        // Route::resource('dosen',DosenController::class);
        Route::controller(DosenController::class)->group(function () {
            Route::get('/dosen', 'index')->name('index.dosen');
            Route::get('/dosen/matakuliah', 'listcourses')->name('list.courses');
            Route::get('/dosen/tambahmatakuliah', 'addcourses')->name('add.courses');
            Route::post('/dosen/tambahmatakuliah', 'createcourse')->name('create.course');
            Route::delete('/dosen/matakuliah/{id}', 'deletecourse')->name('delete.course');
            Route::get('/dosen/editmatakuliah/{id}', 'editcourse')->name('edit.course');
            Route::patch('/dosen/updatematakuliah/{idmtk}', 'updatecourse')->name('update.course');
            Route::get('/dosen/detailmaterimatakuliah/{id}', 'detailmateri')->name('detail.materi');
            Route::get('/dosen/adddetailmaterimatakuliah/{idmtk}', 'addmatericourse')->name('addmateri.course');
            Route::post('/dosen/adddetailmaterimatakuliah', 'createdetailcourse')->name('createdetail.course');
            Route::get('/dosen/editdetailmaterimatakuliah/{idmkdet}/{idmk}', 'editdetailmateri')->name('editmateri.course');
            Route::post('/dosen/editdetailmaterimatakuliah', 'updatedetailcourse')->name('updatedetail.course');
            Route::get('/dosen/downloadmateri/{filemateri}', 'downloadmatericourse')->name('downloadmateri.course');
            Route::delete('/dosen/hapusmaterimatakuliah/{idmmk}/{idmk}', 'deletematericourse')->name('deletemateri.course');
        });
    });

    Route::group(['middleware' => ['cekUserLogin:3']],function(){
        // Route::resource('mahasiswa',MahasiswaController::class);
        Route::controller(MahasiswaController::class)->group(function () {
            Route::get('/mahasiswa', 'index')->name('index.mahasiswa');
            Route::get('/mahasiswa/kuesioner', 'kuesioner')->name('tampil.kuesioner');
            Route::post('/mahasiswa/kuesioner', 'kuesionerstore')->name('kuesioner.store');
        });
    });
});

