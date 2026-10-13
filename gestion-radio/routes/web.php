<?php

use App\Http\Controllers\AnimateurController;
use App\Http\Controllers\ChansonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\InfoJournaliereController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\SmsAuditeurController;
use App\Http\Controllers\TantaraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UtilisateurController;

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('programmes', ProgrammeController::class);
    Route::resource('animateurs', AnimateurController::class);
    Route::resource('chansons', ChansonController::class);
    Route::post('chansons/{chanson}/incrementer', [ChansonController::class, 'incrementer'])->name('chansons.incrementer');
    Route::resource('tantaras', TantaraController::class);
    Route::resource('sms', SmsAuditeurController::class);
    Route::resource('evenements', EvenementController::class);
    Route::resource('infos', InfoJournaliereController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/utilisateurs', [UtilisateurController::class, 'index'])->name('utilisateurs.index');
    Route::post('/utilisateurs/{user}/approuver', [UtilisateurController::class, 'approuver'])->name('utilisateurs.approuver');
});

require __DIR__.'/auth.php';