<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ChatController;
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

    Route::get('draftDashboard/league/{leagueId}/team/{teamId}', [MainController::class, 'draft'])->name('draftDashboard');

    Route::get('playDraft/league/{leagueId}/draft/{draftId}', [MainController::class, 'playDraft'])->name('playDraft');

    Route::get('addPlayerToDraft/league/{leagueId}/player/{playerId}/draftId/{draftId}', [MainController::class, 'addPlayerToDraft'])->name('addPlayerToDraft');

    Route::get('start-draft/league/{leagueId}/draft/{draftId}',[MainController::class, 'start_draft'])->name('start-draft');

});

Route::match(['get', 'post'], 'user-login', [ChatController::class, 'user_login' ])->name('user-login');

Route::get('user-dashboard', [ChatController::class, 'user_dashboard' ])->name('user-dashboard');
Route::get('chat-window/{userId?}', [ChatController::class, 'chat_window' ])->name('chat-window');
Route::post('send-message', [ChatController::class, 'send_message' ])->name('send-message');
Route::get('user-logout', [ChatController::class, 'logout' ])->name('user-logout');


