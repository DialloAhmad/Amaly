<?php

use App\Http\Controllers\CasOngController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UrlsCasController;
use App\Http\Controllers\UrlsCategoryController;
use App\Http\Controllers\UrlsRetourCasController;
use App\Http\Controllers\DonController;
use App\Http\Controllers\UserphoneControllerWeb;

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
//route home

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//routes utilisateurs

Route::resource('users', UserController::class);

Route::PUT('users/statut/{user}', [UserController::class, 'statut'])->name('users.statut');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::delete('users/force/{user}', [UserController::class, 'forceDestroy'])->name('users.force.destroy');

Route::put('users/restore/{user}', [UserController::class, 'restore'])->name('users.restore');

Route::get('profil/{user}', [App\Http\Controllers\ProfilController::class, 'show'])->name('profil');

Route::get('profil/{user}/edit', [App\Http\Controllers\ProfilController::class, 'edit'])->name('profil.edit')->middleware('nondemandeur');
Route::put('profil/{user}/edit', [App\Http\Controllers\ProfilController::class, 'update'])->name('profil.update')->middleware('nondemandeur');

Route::get('profil/{user}/editImage', [App\Http\Controllers\ProfilController::class, 'editImage'])->name('profil.editImage');
Route::put('profil/{user}/editImage', [App\Http\Controllers\ProfilController::class, 'updateImage'])->name('profil.updateImage');

Route::get('profil/{user}/editPassword', [App\Http\Controllers\ProfilController::class, 'editPassword'])->name('profil.editPassword')->middleware('password.confirm');;
Route::put('profil/{user}/editPassword', [App\Http\Controllers\ProfilController::class, 'updatePassword'])->name('profil.updatePassword');

//routes cas

Route::resource('cas', UrlsCasController::class)->middleware('admin');


Route::PUT('cas/statut/{cas}', [UrlsCasController::class, 'statut'])->name('cas.statut')->middleware('admin');

Route::delete('cas/force/{cas}', [UrlsCasController::class, 'forceDestroy'])->name('cas.forceDestroy')->middleware('admin');

Route::put('cas/restore/{cas}', [UrlsCasController::class, 'restore'])->name('cas.restore')->middleware('admin');

//routes cas ONG

Route::resource('Mescas', CasOngController::class)->middleware('nonadmin');

//routes catégories

Route::resource('categories', UrlsCategoryController::class)->middleware('admin');

//routes RetourCas

Route::resource('retour_cas', UrlsRetourCasController::class)->middleware('auth');

Route::get('MesRetoursCas', [App\Http\Controllers\UrlsRetourCasController::class, 'indexONG'])->name('indexONG')->middleware('nonadmin');
Route::get('RetoursCas', [App\Http\Controllers\UrlsRetourCasController::class, 'create'])->name('retour_cas.create')->middleware('nonadmin');
Route::post('RetoursCas', [App\Http\Controllers\UrlsRetourCasController::class, 'store'])->name('retour_cas.store')->middleware('nonadmin');

Route::PUT('retour_cas/statut/{retour_cas}', [UrlsRetourCasController::class, 'statut'])->name('retour_cas.statut')->middleware('admin');

Route::delete('retour_cas/force/{retour_cas}', [UrlsRetourCasController::class, 'forceDestroy'])->name('retour_cas.forceDestroy')->middleware('admin');

Route::put('retour_cas/restore/{retour_cas}', [UrlsRetourCasController::class, 'restore'])->name('retour_cas.restore')->middleware('admin');

//routes Dons

Route::resource('dons', DonController::class)->middleware('auth');

//routes userphones

Route::resource('userphones', UserphoneControllerWeb::class )->middleware('admin');
Route::put('userphones/restore/{userphone}', [UserphoneControllerWeb::class, 'restore'])->name('userphones.restore');
