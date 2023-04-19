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
            Route::get('/dosen/jadwalkuliah', 'schedulelecturer')->name('schedulelec.course');
            Route::get('/dosen/detailjadwal/{trkodemtk}/{periode}', 'detailschedulelecturer')->name('detailschedulelecturer.course');
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
            Route::get('/dosen/downloadmateri/{filemateri}', 'downloadmatericourse')->name('downloadmateridosen.course');
            Route::delete('/dosen/hapusmaterimatakuliah/{idmmk}/{idmk}', 'deletematericourse')->name('deletemateri.course');
            Route::get('/dosen/detailjadwal/materi/{kodemk}/{idmateri}', 'detaillecturermateri')->name('detaillecturer.materi');
            
            Route::get('/dosen/filemateri/{idmkdet}/{idmk}', 'filemateri')->name('file.materi');
            Route::post('/dosen/filemateri', 'prosesfilemateri')->name('prosesfile.materi');
            Route::delete('/dosen/hapusfilemateri/{id}', 'deletefilemateri')->name('deletefile.materi');

            Route::get('/dosen/nilai', 'listcoursescore')->name('listcourse.score');
            Route::get('/dosen/nilai/{kodemk}', 'inputscore')->name('input.score');
            Route::post('/dosen/nilai', 'submitscore')->name('submit.score');
            Route::get('/dosen/nilai/mahasiswa/{kodemk}/{periode}', 'detailscore')->name('detail.score');
            Route::get('/dosen/nilai/mahasiswa/sesi/{kodemk}/{periode}/{session}', 'detaillecturerscore')->name('detaillecturer.score');
            
            Route::get('/dosen/feedback', 'listcoursefeedback')->name('listcourse.feedback');
            Route::get('/dosen/feedback/{kodemk}', 'inputfeedback')->name('input.feedback');
            Route::get('/dosen/feedback/mahasiswa/sesi/{kodemk}/{periode}/{session}', 'detaillecturerfeedback')->name('detaillecturer.feedback');
            Route::post('/dosen/feedback', 'submitfeedback')->name('submit.feedback');
            Route::get('/dosen/feedback/mahasiswa/{kodemk}/{periode}', 'detailfeedback')->name('detail.feedback');
        
            Route::get('/dosen/profile', 'profiledosen')->name('profil.dosen');
            Route::post('/dosen/profile', 'editprofil')->name('submitprofile.dosen');
            
            Route::get('/dosen/email', 'mailinboxdosen')->name('inbox.dosen');
            Route::get('/dosen/email/compose', 'mailcomposedosen')->name('compose.dosen');
            Route::post('/dosen/email/autocomplete', 'autocomplete')->name('autocomplete.dosen');
            Route::post('/dosen/email/compose', 'kirimemaildosen')->name('kirimemail.dosen');
            Route::get('/dosen/email/sent', 'mailsentdosen')->name('sent.dosen');
            Route::get('/dosen/email/read/{flag}/{kodemail}', 'mailreaddosen')->name('read.dosen');

            Route::get('/dosen/forum', 'forumdosen')->name('forum.dosen');
            Route::get('/dosen/forum/matakuliah/{trkodemtk}/{periode}', 'forumcoursedosen')->name('forumcourse.dosen');
            Route::get('/dosen/forum/matakuliah/create/thread/{kodemk}/{namamk}/{session}/{materi}/{periode}', 'createforumdosen')->name('createforum.dosen');

            Route::get('/dosen/interaksi', 'interaksidosen')->name('interaksi.dosen');
            Route::get('/dosen/infogayabelajar', 'infogayabelajar')->name('infogayabelajar.dosen');
        });
    });

    Route::group(['middleware' => ['cekUserLogin:3']],function(){
        // Route::resource('mahasiswa',MahasiswaController::class);
        Route::controller(MahasiswaController::class)->group(function () {
            Route::get('/mahasiswa', 'index')->name('index.mahasiswa');
            Route::get('/mahasiswa/kuesioner', 'kuesioner')->name('tampil.kuesioner');
            Route::post('/mahasiswa/kuesioner', 'kuesionerstore')->name('kuesioner.store');

            Route::get('/mahasiswa/rencanastudi', 'enrollcourse')->name('enroll.course');
            Route::delete('/mahasiswa/daftarmatakuliah/{trid}/{namamtk}', 'deletetrcourse')->name('deletetr.course');
            Route::get('/mahasiswa/addmatakuliah/{mkkode}', 'addtrcourse')->name('addtr.course');
            Route::get('/mahasiswa/jadwalkuliah', 'schedulecourse')->name('schedule.course');
            Route::get('/mahasiswa/detailjadwal/{trkodemtk}/{periode}', 'detailschedule')->name('detailschedule.course');
            Route::get('/mahasiswa/downloadmateri/{filemateri}', 'downloadmatericourse')->name('downloadmateri.course');
            Route::get('/mahasiswa/detailjadwal/nilai/sesi/{kodemk}/{periode}/{session}', 'detailstudentscore')->name('detailstudent.score');
            Route::get('/mahasiswa/detailjadwal/materi/{kodemk}/{idmateri}', 'detailstudentmateri')->name('detailstudent.materi');

            Route::get('/mahasiswa/email', 'mailinbox')->name('inbox.mahasiswa');
            Route::get('/mahasiswa/email/compose', 'mailcomposemhs')->name('compose.mahasiswa');
            Route::post('/mahasiswa/email/autocomplete', 'autocomplete')->name('autocomplete.mahasiswa');
            Route::post('/mahasiswa/email/compose', 'kirimemailmhs')->name('kirimemail.mahasiswa');
            Route::get('/mahasiswa/email/sent', 'mailsentmhs')->name('sent.mahasiswa');
            Route::get('/mahasiswa/email/read/{flag}/{kodemail}', 'mailreadmhs')->name('read.mahasiswa');

            Route::get('/mahasiswa/forum', 'forummhs')->name('forum.mahasiswa');
            Route::get('/mahasiswa/forum/matakuliah/{trkodemtk}/{periode}', 'forumcoursemhs')->name('forumcourse.mahasiswa');
            Route::get('/mahasiswa/forum/matakuliah/create/thread/{kodemk}/{namamk}/{session}/{materi}/{periode}', 'createforummhs')->name('createforum.mahasiswa');
        });
    });
});

