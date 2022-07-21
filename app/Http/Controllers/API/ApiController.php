<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{
    //
    public function questions()
    {
        $questions = DB::table('questions')->get(['id', 'question']);
        
        // $options = '';
        foreach($questions as $q) {
            $options = DB::table('options')->where('question_id', $q->id)->get(['id as option_id', 'options']);    
            $q->options =json_decode($options);
            // print_r($q);
        }


        return response()->json([
            "questions" => $questions,
            "responseCode" => 200,
            "responseMessage" => "Ok"
        ], 200);

    }
}
