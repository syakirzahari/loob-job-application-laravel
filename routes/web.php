<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('/applications', \App\Livewire\Applications\Index::class)->name('applications.index');
    Route::get('/applications/create', \App\Livewire\Applications\Create::class)->name('applications.create');
    Route::get('/applications/show/{application}', \App\Livewire\Applications\Show::class)->name('applications.show');
    Route::get('/applications/update/{application}', \App\Livewire\Applications\Edit::class)->name('applications.edit');

    Route::get('/job-postings', \App\Livewire\JobPostings\Index::class)->name('job-postings.index');
    Route::get('/job-postings/create', \App\Livewire\JobPostings\Create::class)->name('job-postings.create');
    Route::get('/job-postings/show/{jobPosting}', \App\Livewire\JobPostings\Show::class)->name('job-postings.show');
    Route::get('/job-postings/update/{jobPosting}', \App\Livewire\JobPostings\Edit::class)->name('job-postings.edit');

    Route::get('/users', \App\Livewire\Users\Index::class)->name('users.index');
    Route::get('/users/create', \App\Livewire\Users\Create::class)->name('users.create');
    Route::get('/users/show/{user}', \App\Livewire\Users\Show::class)->name('users.show');
    Route::get('/users/update/{user}', \App\Livewire\Users\Edit::class)->name('users.edit');

    Route::group(['prefix' => 'reference'], function () {
        Route::get('/ref-statuses', \App\Livewire\RefStatuses\Index::class)->name('ref-statuses.index');
        Route::get('/ref-statuses/create', \App\Livewire\RefStatuses\Create::class)->name('ref-statuses.create');
        Route::get('/ref-statuses/show/{refStatus}', \App\Livewire\RefStatuses\Show::class)->name('ref-statuses.show');
        Route::get('/ref-statuses/update/{refStatus}', \App\Livewire\RefStatuses\Edit::class)->name('ref-statuses.edit');

        Route::get('/ref-job-positions', \App\Livewire\RefJobPositions\Index::class)->name('ref-job-positions.index');
        Route::get('/ref-job-positions/create', \App\Livewire\RefJobPositions\Create::class)->name('ref-job-positions.create');
        Route::get('/ref-job-positions/show/{refJobPosition}', \App\Livewire\RefJobPositions\Show::class)->name('ref-job-positions.show');
        Route::get('/ref-job-positions/update/{refJobPosition}', \App\Livewire\RefJobPositions\Edit::class)->name('ref-job-positions.edit');
    });
});

require __DIR__.'/auth.php';
