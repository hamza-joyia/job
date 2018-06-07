<?php

namespace App\Http\Controllers;

use App\post;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function register()
    {
        return view('signup');
    }
    public function signIn(Request $request)
    {
        $tmp=DB::table('user_table')
        ->where('name','=',$request['username'])
            ->where('password','=',$request['password'])
            ->get();
        if(@$tmp[0]->id !=NULL)
        {

            session(['key' => $tmp[0]->id]);
            return view('homepage');
        }
        else
            return view('index');
    }
    public function signUp(Request $request)
    {

        $tmp=DB::table('user_table')
            ->where('name','=',$request['username'])
            ->get();
        if(@$tmp[0]->id ==NULL)
        {
            $post=new users;
            $post->id=NULL;
            $post->name=$request["username"];
            $post->password=$request["password"];
            $post->save();

        }
            return view('index');

    }
    public function create(Request $request)
    {
        $post=new post;
        $post->id=NULL;
        $post->user_id=session('key');
        $post->post=$request["post"];
        $post->save();
        return view('homepage');
    }
    public function display(Request $request)
    {
        $tmp =DB::table('post_table')
            ->where('user_id','=',session('key'))
            ->get();

        return view('crud',['val'=>$tmp]);
    }

    public function edit($id)
    {
        dd($id);
    }
}
