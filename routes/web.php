<?php

use App\Models\User;
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
    try {
        if(User::all()->count()){
            return redirect(route("dashboard"));
        }else{
            return view('welcome');
        }
    } catch (\Throwable $th) {
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function() {
    Route::get('/dataPulang', function () { return view('dataPulang.index'); });
    Route::get('/tambah-data', function () { return view('dataPulang.tambah-data'); });
    Route::get('/dataSantri', function () { return view('dataSantri.index'); });
    Route::get('/dataUser', function () { return view('dataUser.index'); });
    Route::middleware("level:ADMIN")->resource("users", UserController::class);
    Route::middleware("level:ADMIN")->post("/students/import", [StudentController::class, 'import'])->name('students.import');
    Route::middleware("level:ADMIN")->get("/students/export/excel", [StudentController::class, 'exportExcel'])->name('students.export.excel');
    Route::middleware("level:ADMIN")->get("/students/export/pdf", [StudentController::class, 'exportPDF'])->name('students.export.pdf');
    Route::middleware("level:ADMIN")->get("/permits/export/excel", [PermitController::class, 'exportExcel'])->name('permits.export.excel');
    Route::middleware("level:ADMIN")->get("/permits/export/pdf", [PermitController::class, 'exportPDF'])->name('permits.export.pdf');
    Route::get("/profile", [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put("/profile", [UserController::class, 'updateProfile'])->name('profile.update');
    Route::resource("students", StudentController::class);
    Route::resource("permits", PermitController::class);
});

require __DIR__.'/auth.php';
