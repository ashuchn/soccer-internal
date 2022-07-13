<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Users;
use App\Models\League;
use App\Models\Team;
use App\Models\Player;

class MainController extends Controller
{
    //

    public function login(Request $request)
    {
        if( $request->isMethod('get') ) {
            if(session::has('userId')){
                return redirect()->route('dashboard');
            }
            return view('admin.login');
        } else {
            $email = $request->email;
            $password = $request->password;

            $exists = DB::table('users')->where('email', $email)->where('password', $password)->exists();
            if($exists) {
                $sql =DB::table('users')->where('email', $email)->get();
                $userId = $sql[0]->id;
                $request->session()->put('userId', $userId);
                return redirect()->route('dashboard')->with('status', 'Logged in');
            }  else {
                return redirect()->back()->with('status', 'Invalid Credentials');
            }

            

        }
    }


    public function signup(Request $request) 
    {
        if( $request->isMethod('get') ) {
            return view('admin.signup');
        } else {
            $name = $request->name;
            $email = $request->email;
            $password = $request->password;

            $insert = new Users;
            $insert->name = $name;
            $insert->email = $email;
            $insert->password = $password;
            $insert->save();

            if($insert)
            {
                return redirect()->route('login')->with('status', 'User created!');
            } else {
                return redirect()->back()->with('status', 'Some error occured!');
            }

            

        }
    }

    public function dashboard()
    {
        $myLeagues = League::where('userId', session('userId'))->get();
        
        $otherLeagues = League::where('userId', '!=',session('userId'))->get();
        
        return view('admin.dashboard', ["myleague" => $myLeagues , "otherLeague" => $otherLeagues]);

    }

    public function addLeague(Request $request)
    {
        if( $request->isMethod('get') ) {
            return view('admin.league.add');
        } else {

            $leagueName = $request->leagueName;


            $insert = new League;
            $insert->leagueName = $leagueName;
            $insert->userId = session('userId');
            $insert->save();

            if($insert)
            {
                return redirect()->route('dashboard')->with('status', 'League Added!');
            } else {
                return redirect()->back()->with('status', 'Some error occured!');
            }
			
        }
    }

    public function leagueDashboard($leagueId)
    {
        
        $teams = Team::where('leagueId', $leagueId)->get();
        $league = League::where('id', $leagueId)->get();
        // return $league[0];
        

        return view('admin.league.teams', ['teams' => $teams, 'league' => $league[0]]);
    }


    public function addTeam( Request $request ,$leagueId = null)
    {
        if( $request->isMethod('get') ) {
            return view('admin.league.addTeam', ['leagueId' => $leagueId]);
        } else { 
            
            $insert = new Team;
            $insert->teamName = $request->teamName;
            $insert->leagueId = $request->leagueId;
            $insert->save();

            if($insert)
            {
                return redirect()->back()->with('status', 'Team Added!');
            } else {
                return redirect()->back()->with('status', 'Some error occured!');
            }


        }

    }


    public function mainDashboard($leagueId, $teamId)
    {
        return view('admin.mainDashboard', [ 'leagueId' => $leagueId, 'teamId' => $teamId ]);
    }

    /** draft 1st page */
    public function draftDashboard($leagueId, $teamId)
    {
        $league = League::where('id', $leagueId)->get();
        $teamCount = Team::where('leagueId', $leagueId)->count();

        return view('admin.draft.dashboard', ['league' => $league,'teamId' => $teamId ,'teamCount' => $teamCount]);

    }


    /** draft 2nd page */
    public function playDraft($leagueId, $teamId)
    {
        $league = League::where('id', $leagueId)->get();
        $players = Player::all();
        return view('admin.draft.play', ['players' => $players ,  'league' => $league, 'teamId' => $teamId ]);
    }

    public function addPlayerToDraft($leagueId, $teamId, $draftId, $playerId)
    {
    }




    /** total90 code */


    function draft($leagueId, $teamId)
        {
            /** user id who is drafting draft */
            $length = 50;
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			$randomString;
            $userId = session('userId');


            $userinfo2 = DB::table('draft_league')->where('user_id',$userId)->where('league_id',$leagueId)->exists();
            if($userinfo2){
                    $draftId = DB::table('draft_league')
            ->where('user_id',$userId)->where('league_id',$leagueId)->where('team_id',$teamId)->pluck('draft_id');
            
            /** returns the league details */
            $league = DB::table('leagues')->where('id', $leagueId)->get(); 
            

            /** returns teams in a league */
            $teamCount = DB::table('draft_league')->where('league_id', $leagueId)->count(); 

            return view('admin.draft.dashboard',[
                // 'userId' => $userId,
                'teamId' => $teamId,
                'league' => $league,
                'teamCount' => $teamCount,
                'draftId' => $draftId
            ]);

            }


            $userinfo = DB::table('draft_league')->where('user_id',$userId)->where('league_id',$leagueId)->where('team_id',$teamId)->exists();
            if($userinfo){
            echo 'none';
            }else{
                $id = DB::table('draft_league')-> insertGetId(array(
                    'user_id'=>$userId,
                    'league_id'=>$leagueId,
                    'team_id'=>$teamId,
                    'choose_status'=>0,
                    'active_status'=>0,
                    'draft_id'=>$randomString
                    ));

                    $draftId = DB::table('draft_league')
            ->where('user_id',$userId)->where('league_id',$leagueId)->where('team_id',$teamId)->pluck('draft_id');
            
            /** returns the league details */
            $league = DB::table('leagues')->where('id', $leagueId)->get(); 
            

            /** returns teams in a league */
            $teamCount = DB::table('teams')->where('league_id', $leagueId)->count(); 

            return view('admin.draft.dashboard',[
                // 'userId' => $userId,
                'teamId' => $teamId,
                'league' => $league,
                'teamCount' => $teamCount,
                'draftId' => $draftId
            ]);

            }
           
            
        }


        public function start_draft( $leagueId,$draftId) {
            // return $draftId;

            

            DB::table('draft_league')->where('draft_id', $draftId)->update([
                "choose_status" => 1
            ]);

            return redirect()->route('draft-dashboard', [
                "leagueId" =>$leagueId,
                "draftId" => $draftId
            ]);

        }

}
