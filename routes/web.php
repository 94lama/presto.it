<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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

Route::get('/', [FrontController::class, 'welcome'])->name('welcome');

Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');

/* Route::get('/categoria/{category}/{filter}', [FrontController::class, 'categoryFilter'])->name('category.filter'); */

Route::get('/annunci/nuovo', [AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('announcements.create');

Route::get('/annunci/mostra/{title}', [AnnouncementController::class, 'showAnnouncement'])->name('announcements.show');

Route::get('/annunci/index', [AnnouncementController::class, 'indexAnnouncement'])->name('announcements.index');


///[utente]
Route::get('/{user}/annunci', [AnnouncementController::class, 'showYourAnnouncement'])->middleware('auth')->name('user.announcements');

Route::get('/annunci/modifica/{announcement}', [AnnouncementController::class, 'editAnnouncement'])->name('announcements.edit');


///[revisore]
Route::get('/revisore/home', [RevisorController::class, 'indexAnnouncement'])->middleware('isRevisor')->name('revisor.index');

Route::patch('/annuncio/accetta/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

Route::patch('/annuncio/rifiuta/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

Route::get('/annuncio/ricontrolla/{announcement}', [RevisorController::class, 'recheckAnnouncement'])->middleware('isRevisor')->name('revisor.recheck_announcement');


Route::get('/ricerca/annuncio', [FrontController::class, 'searchAnnouncements'])->name('announcements.search');

Route::post('/lingua/{lang}', [FrontController::class, 'setLanguage'])->name('set_language_locale');


///[richiesta e approvazione per diventare revisore]
Route::get('/revisore/richiedi', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

Route::post('/requested', [RevisorController::class, 'sendRevisorRequest'])->middleware('auth')->name('revisor.request');

Route::get('/revisore/rendi/{user}', [RevisorController::class, 'makeRevisor'])->middleware('auth')->name('make.revisor');




