<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Comment;
use App\Post;

Route::get('/', function () {
//    $user = new \App\User();
//    $user->name = 'johnkagga';
//    $user->password = bcrypt('123456');
//    $user->email = "johnkagga@gmail.com";
//    $user->save();
//
//    $post = new Post();
//    $post->name = 'name';
//    $post->body = 'body';
//    $post->user_id = 1;
//    $post->save();
//
//    $comment = new Comment();
//    $comment->user_id = 1;
//    $comment->post_id = 1;
//    $comment->body = " comment";
//    $comment->save();

//    $postD = Post::find(1);
//    $postD->delete();
//    $commentd = Comment::find(1);
//    $commentd->delete();
    
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('user/{username}/activities', 'ActivitiesController@show');
});
