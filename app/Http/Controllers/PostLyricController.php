<?php
/**
 * Created by PhpStorm.
 * User: hamzzy
 * Date: 4/18/19
 * Time: 2:13 AM
 */

namespace App\Http\Controllers;

use App\Lyrics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class PostLyricController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function Addlyrics()
    {
        return view('post');
    }
    public  function PostLyrics(Request $request){
        $this->validate($request,[
            'artist'=>'required',
            'title'=>'required',
            'tag'=>'required',
            'content'=>'required',
            'release_date'=>'required',
            'image'=>'required|image64:jpeg,jpg,png'

        ]);

        $img = $request->get('image');
        $name = time().'.' . explode('/', explode(':', substr($img, 0, strpos($img, ';')))[1])[1];
        Image::make($request->get('image'))->resize(200,200)->save(public_path('lyrics_images/').$name);


        $post= new  Lyrics();
        $post->user_id=Auth::id();
        $post->artist=$request->get('artist');
        $post->title=$request->get('title');
        $post->tag=$request->get('tag');
        $post->Album=$request->get('Album');
        $post->content=$request->get('content');
        $post->featuring=$request->get('featuring');
        $post->slug = str_slug($request->get('artist').'-'.$request->get('title'));
        $post->producer=$request->get('producer');
        $post->written_by=$request->get('written_by');
        $post->release_date=$request->get('release_date');
        $post->audio_link=$request->get('audio_link');
        $post->video_link=$request->get('video_link');
        $post->Album_art = $name;
        $post->save();




        return response()->json(null, 200);

    }


}