<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Chats;
use Session;
use DB;

class ChatController extends Controller
{
    public function user_login (Request $request)
    {
        if( $request->isMethod('get') ) {
            if(session::has('chatUserId')){
                return redirect()->route('user-dashboard');
            }
            return view('users.login');
        } else {
            $email = $request->email;
            $password = $request->password;

            $exists = DB::table('chat_users')->where('email', $email)->where('password', $password)->exists();
            if($exists) {
                $sql =DB::table('chat_users')->where('email', $email)->get();



                $userId = $sql[0]->id;
                $update = DB::table('chat_users')->where('id', $userId)->update([
                    "status"=>"online"
                ]);


                $request->session()->put('chatUserId', $userId);
                return redirect()->route('user-dashboard')->with('status', 'Logged in');
            }  else {
                return redirect()->back()->with('status', 'Invalid Credentials');
            }

            

        }
    }


    public function user_dashboard()
    {
        return view('users.dashboard');
    }

    public function chat_window($userId = null)
    {
        // return session::all();

        $loggedInUser = session('chatUserId');
        $users = DB::table('chat_users')->where('id', '!=', $loggedInUser)->get();

        if($userId != '') {
            // $chatId = "chat_".rand(1000,9999);
            $receiverName = Users::where('id', $userId)->pluck('name');
            $receiverId = $userId;
            $chat_exists = Chats::where('sender_id', $loggedInUser)
                        ->where('receiver_id', $userId)
                        ->exists();
            
            if($chat_exists) {
                $chat_list = Chats::where('sender_id', $loggedInUser)
                        ->where('receiver_id', $userId)
                        ->orderBy('time','desc')
                        ->get();
            } else {
                $chat_list = array();
            }

        } else {
            $chat_list = array();
            $receiverId = '';
            $receiverName = '';
        }
        
        if($userId != '') {
            $display = 'block';
        } else {
            $display = 'none';
        }
        
        // return $chat_list;

        return view('users.chat', ['data' => $users, 'chat' => $chat_list,'display'=> $display, 
                                    'receiverName'=> $receiverName, 'receiverId'=>$receiverId]);

    }


    public function send_message(Request $request )
    {
        date_default_timezone_set('Asia/Kolkata');
        
        $senderId = $request->senderId; 
        $receiverId = $request->receiverId; 
        $message = $request->message;
        
        $insert = new Chats;
        // $insert->chatId = $chatId;
        $insert->sender_id = $senderId;
        $insert->receiver_id = $receiverId;
        $insert->message = $message;
        $insert->time = date('h:i'); 
        $insert->save();

        return $insert;

        // $messages = $this->getMessages($senderId, $receiverId);
        // return $messages;



    }

    public function getMessages($senderId, $receiverId)
    {
        // $chat_list = Chats::where('sender_id', $loggedInUser)
        //                 ->where('receiver_id', $userId)
        //                 ->orderBy('id','desc')
        //                 ->get();
    }


    public function logout()
    {
        DB::table('chat_users')->where('id', session('chatUserId'))->update([
            "status"=> "offline"
        ]);

        session()->flush();
        return redirect()->route('user-login');
    }


}
