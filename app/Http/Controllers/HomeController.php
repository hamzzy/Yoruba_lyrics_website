<?php

namespace App\Http\Controllers;

use App\Lyrics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('UserDash.home');
    }

    public function UserLyric()
    {
        return view('UserDash.lyricpage');
    }


    public function Request_l()
    {
        return view('UserDash.req_l');
    }
    public function  lyrics_show(){
       $user_l= Lyrics::where('user_id','=',Auth::id())->get();
        return response()->json($user_l,200);
    }

    public function  Profile(){
        return view('UserDash.Profile');
    }
    public function Update_Lyrics(Request $request ,$id){
        $lyrics=Lyrics::findOrFail($id);

        $lyrics->update($request->all());

        return response()->json('success',200);
    }

    public function  Remove_lyrics(Request $request, $id){


        $lyrics=Lyrics::findOrFail($id);

        $lyrics->delete($request->all());
        return response()->json('success');
    }
}
