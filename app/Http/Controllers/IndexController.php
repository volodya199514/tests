<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class IndexController extends Controller
{
    public function show(Request $request){

        $request = $request->all();

        dump($request);



        if(isset($request['text'])){
            $users = User::all()->where($request['tag'], $request['text']);
        }
        else{

            $users = User::all();
        }

        if(isset($request['created']) == 'up'){
            if($request['created'] == 'up'){
               $users = $users->sortBy('created_at');
            }else{
                $users = $users->sortByDesc('created_at');
            }
        }

        if(isset($request['count']) == 'up'){
            if($request['count'] == 'up'){
                $users = User::with('comments')->get()->sortBy(function($users){
                   return $users->comments->count();
                });
            }else{
                $users = User::with('comments')->get()->sortByDesc(function($users){
                    return $users->comments->count();
                });
            }
        }



        return view('index', ['users' => $users]);
    }
}
