<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','LyricsController@index')->name('index');
Route::get('/lyrics','LyricsController@Lyrics')->name('lyrics');
Route::post('/comment','LyricsController@Comment');
Route::post('/update_prop','LyricsController@updateProposeLyrics');

Route::get('/add_lyrics','PostLyricController@AddLyrics')->name('Addly');
Route::post('/post_lyrics','PostLyricController@PostLyrics');

Route::get('/get_lyrics','LyricsController@GetLyrics');
Route::get('/latest','LyricsController@Latest');
Route::get('/lyric_det/{slug}','LyricsController@LyricsD');
Route::get('/get_album/{album}','LyricsController@get_Album');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ul', 'HomeController@UserLyric')->name('ul');
Route::get('/req_l', 'HomeController@Request_l')->name('user_request');
Route::get('/user_l','HomeController@lyrics_show');
Route::get('/profile','HomeController@Profile')->name('profile');
Route::delete('/delete_lyrics/{id}','HomeController@Remove_lyrics');
Route::put('/update_lyrics/{id}','HomeController@Update_Lyrics');

Route::post('/findlyric','LyricsController@Search');


Route::put('/update_user','UserDashboard@UpdateUser');



