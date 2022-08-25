<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{
    RegisterController,
    LoginController
};
use App\Http\Controllers\Participant\Dashboard\DashboardController as ParticipantDashboardControlller;
use App\Http\Controllers\Organization\Dashboard\DashboardController as OrganizationDashboardController;
use App\Http\Controllers\Organization\Event\{
    EventController,
    EventPresenceController,
    EventSubscriptionController
};

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
Route::get('/', function(){
    return 'teste';
});


Route::group(['as'=>'auth.'], function(){
    Route::group(['middleware'=>'guest'], function(){
        Route::get('register',[RegisterController::class,'create'])->name('register.create');
        Route::post('register', [RegisterController::class,'store'])->name('register.store');
        Route::get('login', [LoginController::class,'create'])->name('login.create');
        Route::post('login', [LoginController::class,'store'])->name('login.store');
    });

    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('login.destroy')
        ->middleware('auth');
});


Route::group(['middleware'=>'auth'], function(){
    Route::get('participant/dashboard', [ParticipantDashboardControlller::class, 'index'])
        ->name('participant.dashboard.index')
        ->middleware('role:participant');

    Route::group(['prefix'=>'organization', 'as' =>'organization.', 'middleware'=> 'role:organization'], function(){
        // dashboard
        Route::get('dashboard', [OrganizationDashboardController::class, 'index'])->name('dashboard.index');

        // eventos
        Route::post('events/{event}/subscriptions', [EventSubscriptionController::class, 'store'])
            ->name('events.subscriptions.store');
        Route::delete('events/{event}/subscriptions/{user}', [EventSubscriptionController::class, 'destroy'])
            ->name('events.subscription.destroy');

        Route::post('events/{event}/presences/{user}', EventPresenceController::class)
            ->name('events.presences');

        Route::resource('events', EventController::class);


    } );


});


