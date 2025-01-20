<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Middleware\TokenAuthenticate;
use App\Http\Controllers\ContenController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\SuperadmController;
use App\Models\event;
use App\Models\Kandidat;
use App\Models\token;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

// Definisi rute untuk otentikasi
Route::get('/login', [SesiController::class, 'index'])->name('login');
Route::post('/login', [SesiController::class, 'login']);

// Definisi rute otentikasi login token
Route::get('/login-token', [SesiController::class, 'token'])->name('logintoken');
Route::post('/login-token', [SesiController::class, 'loginToken']);


// Rute yang hanya dapat diakses dengan token valid
Route::get('/user', [UserController::class, 'index']);
Route::post('/user/submit-vote', [UserController::class, 'submitVote'])->name('user.submit-vote');
Route::get('/user/thank', [UserController::class, 'thank'])->name('user.thank');

// Grup rute yang memerlukan otentikasi
Route::middleware(['auth'])->group(function () {

    Route::get('/index', [IndexController::class, 'index']);
    Route::get('/index/admin', [IndexController::class, 'admin'])->middleware('userAkases:admin')->name('admin');
    Route::get('/index/user', [IndexController::class, 'user'])->middleware('userAkases:user');
    Route::get('/index/superadm', [IndexController::class, 'superadm'])
        ->middleware('userAkases:admin,superadm')
        ->name('superadm');
    Route::delete('/delete/{id_event}', [IndexController::class, 'destroy'])->name('events.destroy');
    Route::get('/{id_event}/edit', [IndexController::class, 'edit'])->name('adminall.edit');
    Route::put('/{id_event}', [IndexController::class, 'update'])->name('adminall.update');


    //KANDIDAT
    Route::get('/index/kandidat/{id_event}', [IndexController::class, 'kandidat'])->name('adminall.kandidat')->middleware('userAkases:admin,superadm');
    //Route::get('/createkandidat/{id_event}', [IndexController::class, 'createkandidat'])->name('adminall.tambahkandidat');
    Route::get('/createkandidat/{id_event}', function ($id_event) {
        // Mengambil nilai $id_event dari URL
        $event = Token::where('id_event', $id_event)->first();

        // Lakukan sesuatu dengan $event dan $id_event

        return view('adminall.tambahkandidat', compact('event', 'id_event'));
    })->name('adminall.tambahkandidat');
    Route::post('/storekandidat', [IndexController::class, 'storekandidat'])->name('adminall.storekandidat');
    Route::get('/{id}/editkandidat', [IndexController::class, 'editKandidat'])->name('adminall.editkandidat');
    Route::put('/{id}/updatekandidat', [IndexController::class, 'updateKandidat'])->name('adminall.updatekandidat');
    Route::delete('/deleteKandidat/{id}', [IndexController::class, 'deleteKandidat'])->name('deleteKandidat');



    //TOKEN
    Route::get('/index/token/{id_event}', [IndexController::class, 'token'])
        ->name('adminall.token')
        ->middleware('userAkases:admin,superadm');
    //Route::get('/createTokensForm/{id_event}', [IndexController::class, 'createTokensForm'])->name('adminall.tambahtoken');
    Route::get('/createTokensForm/{id_event}', function ($id_event) {
        $event = Token::where('id_event', $id_event)->first();
        return view('adminall.tambahtoken', compact('event', 'id_event'));
    })->name('adminall.tambahtoken');
    Route::post('/generateTokens', [IndexController::class, 'generateTokens'])->name('adminall.generateTokens');
    Route::delete('/deleteToken/{id}', [IndexController::class, 'deleteToken'])->name('deleteToken');


    //RESULT HASIL
    Route::get('/index/result/{id_event}', [IndexController::class, 'result'])->name('adminall.result')->middleware('userAkases:superadm');


    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
    Route::get('/create', [IndexController::class, 'create'])->name('adminall.tambah');
    Route::post('/store', [IndexController::class, 'store'])->name('adminall.store');


    // Rute pemilihan yang memerlukan otentikasi dengan peran user
    Route::get('/pemilihan', function () {
        return view('fill.pemilihan');
    })->name('pemilihan')->middleware('userAkases:user');
    Route::get('/kandidat', function () {
        return view('fill.kandidat');
    })->name('kandidat')->middleware('userAkases:admin');



    //tambah superadmin
    //token untuk buat login user token
    //Route::post('/voting-tokens/use', 'VotingTokenController@useToken')->name('voting_tokens.use');
});

// Rute fallback untuk tampilan landing
Route::fallback(function () {
    return view('landing');
});

Route::get('/download-pdf', function (Request $request) {
    $path = $request->query('path');
    if (Storage::exists($path)) {
        return Storage::download($path);
    }
    return redirect()->back()->withErrors(['error' => 'PDF not found']);
})->name('download.pdf');
