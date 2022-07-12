<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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



Route::match(['get', 'post'], 'login', [MainController::class, 'login' ])->name('login');
Route::match(['get', 'post'], 'signup', [MainController::class, 'signup' ])->name('signup');


Route::group(['middleware' => ['checkuser']],function(){

    Route::get('dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    
    Route::match(['get','post'],'addLeague', [MainController::class, 'addLeague'])->name('addLeague');

    Route::get('dashboard/league/{leagueId}', [MainController::class, 'leagueDashboard'])->name('leagueDashboard');
    
    Route::match(['get','post'],'addTeam/{leagueId?}', [MainController::class, 'addTeam'])->name('addTeam');
    
    Route::get('dashboard/league/{leagueId}/team/{teamId}', [MainController::class, 'mainDashboard'])->name('mainDashboard');

    Route::get('draftDashboard/league/{leagueId}/team/{teamId}', [MainController::class, 'draftDashboard'])->name('draftDashboard');

    Route::get('playDraft/league/{leagueId}/team/{teamId}', [MainController::class, 'playDraft'])->name('playDraft');

    Route::get('addPlayerToDraft/league/{leagueId}/team/{teamId}/draftId/{draftId}/player/{playerId}', [MainController::class, 'addPlayerToDraft'])->name('addPlayerToDraft');
});
