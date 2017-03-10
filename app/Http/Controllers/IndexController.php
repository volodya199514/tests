<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    public function show(Request $request){

        if($request->ajax()){

            $func= Input::get( 'func' );
            $range= Input::get( 'range' );
            $select= Input::get( 'select' );
            $text= Input::get('text');

            if($text != ''){
                $users = User::all()->where($select, $text);
            }
            else{
                $users = User::all();
            }

            if($func == 'created'){
                if(!isset($users))
                    $users = User::all();

                if($range == 'up'){
                    $users = $users->sortBy('created_at');
                }else{
                    $users = $users->sortByDesc('created_at');
                }
            }

            if($func == 'count'){
                if(!isset($users))
                    $users = User::with('comments');

                if($range == 'up'){
                    $users = $users->sortBy(function($users){
                        return $users->comments->count();
                    });
                }else{
                    $users = $users->sortByDesc(function($users){
                        return $users->comments->count();
                    });
                }
            }

            $view = view('sort', ['users'=>$users])->render();

            $response = array(
                'func'=> Input::get( 'func' ),
                'range'=> Input::get( 'range' ),
                'html' => $view
            );

            return response()->json($response);
        }

        $users = User::all();


        return view('index', ['users' => $users]);
    }


}
