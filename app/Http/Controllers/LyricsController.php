<?php

namespace App\Http\Controllers;


use App\Comment;
use App\Lyrics;
use App\ProposeLyrics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Helper\Helper;

class LyricsController extends Controller
{

    public function index()
    {
        return view('welcome');
    }



    public function Lyrics()
    {
        return view('lyric');
    }



    public  function GetLyrics(Request $request)
    {

       $ly= Lyrics::orderBy('created_at','desc')->get();
        return response()->json($ly, 200);
    }

    public  function Latest()
    {
    $ly= Lyrics::orderBy('created_at','desc')->get()->take(6);
        return response()->json($ly, 200);
    }


 public function LyricsD($slug){
        $post = Lyrics::where('slug', $slug)->first();
     return view('lyricDetails', compact('post'));
 }
public function  Comment(Request $request){
            $this->validate($request,[
                'comment'=>'required',
            ]);
    $comment= new  Comment();
    $comment->user_id=Auth::id();
    $comment->comment=$request->get('comment');
    $comment->lyric_id=$request->get('lyric_id');
    $comment->save();
    return response()->json(null, 200);

}


public function updateProposeLyrics( Request $request)
{

    ProposeLyrics::create([
        'lyrics_id' => $request->get('lyrics_id'),
        'user_id' => Auth::id(),
        'reason' => $request->get('reason'),
        'lyrics' => $request->get('lyric')

    ]);
    return response()->json(null, 200);
}

public function get_Album($album){
        $al=Lyrics::where('Album','=',$album)->get();
        return response()->json($al,200);
}

public function  Album(){

        return view('album');
}

public function Search(Request $request){
    $search =  $request->search;

    $posts = '';

    if (trim($request->search)) {
        $posts = Lyrics::where('artist','LIKE',"%$search%")
            ->orWhere('title','LIKE',"%$search%")
            ->orWhere('Album','LIKE',"%$search%")->get();

        $posts = $posts->map(function ($post, $key) {
            return [
                'title' => $post['title'],
                'url'  => url('/lyric_det/'.$post['slug']),
                'artist' => $post['artist'],
            ];
        });
    }

    return response()->json($posts);
}



}




