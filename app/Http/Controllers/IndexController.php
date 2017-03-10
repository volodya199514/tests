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

           $users = $this->SelectWithDB($text, $select);

            if($func == 'created'){
                $users = $this->sortUserCreatedDate($range, $users, 'created_at');
            }

            if($func == 'count'){
                $users = $this->sortUserWithComment($range, $users, 'comments');
            }

            $view = view('sort', ['users'=>$users])->render();

            $response = ['html' => $view];

            return response()->json($response);
        }

        $users = $this->SelectWithDB();

        return view('index', ['users' => $users]);
    }



    private function SelectWithDB($text='', $select=false){
        if($text != ''){
            $users = User::all()->where($select, $text);
        }
        else{
            $users = User::all();
        }
        return $users;
    }



    private function sortUserCreatedDate($range, $users, $column){

        if(!isset($users))
            $users = User::all();

        if($range == 'up'){
            $users = $users->sortBy($column);
        }else{
            $users = $users->sortByDesc($column);
        }
        return $users;
    }



    private function sortUserWithComment($range, $users, $column){
        if(!isset($users))
            $users = User::with($column);

        if($range == 'up'){
            $users = $users->sortBy(function($users){
                return $users->comments->count();
            });
        }else{
            $users = $users->sortByDesc(function($users){
                return $users->comments->count();
            });
        }
        return $users;
    }

}
