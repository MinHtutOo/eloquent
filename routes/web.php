<?php

use App\Models\City;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/insert', function () {
    // $user = new User();

    // $user->name = 'Bob';
    // $user->email = 'bob1001@gmail.com';
    // $user->password = Hash::make('123123');

    // $user->save();

    $pass = Hash::make('123123');
    User::create(['name'=>'Pete','email'=>'pete1111@gamil.com','password'=>$pass]);
});

Route::get('/post/insert', function () {
    Post::create(['user_id'=>1,'title'=>'Fifth Post', 'content'=> 'This is the fifth post of our website']);
});

Route::get('/posts', function () {
    $posts = Post::all();

    foreach( $posts as $post ) {
        echo $post->title . "<br>";
        echo $post->content ."<hr>";
    }
});

Route::get("/post/{id}/show", function ($id) {
    $post = Post::find($id);

    echo $post->title . "<br>";

    echo $post->user->name;
});

Route::get("/user/{id}/posts", function ($id) {
    $user = User::where("id", $id)->firstOrFail();
    
    echo $user->name . "<br>";

    foreach( $user->posts as $post ) {
        echo $post->content . "<br>";
    }
});

Route::get("/user/{id}/city", function ($id) {
    $user = User::where("id", $id)->firstOrFail();

    echo $user->name . "<br>";

    echo $user->city->name;
});

Route::get("/user/{id}/role", function ($id) {
    $user = User::where("id", $id)->firstOrFail();
    echo $user->name . "<br>";

    foreach( $user->roles as $role ) {
        echo $role->rank . "<br>";
    }
});

Route::get("/city/{id}/post", function ($id) {
    $city = City::find($id);
    echo $city->name . "<br>";

    foreach( $city->posts as $post ) {
        echo $post->title . "<br>";
    }
});

Route::get("/user/{id}/comment", function ($id) {
    $user = User::where("id", $id)->firstOrFail();
    echo $user->name . "<br>";

    foreach($user->comments as $comment ) {
        echo $comment->content . "<br>";
    }
});

Route::get("/post/{id}/comment", function ($id) {
    $post = Post::find( $id );

    foreach($post->comments as $comment ) {
        echo $comment->content . "<br>";
    }
});