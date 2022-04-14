<?php

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Eloquent one to many Create into DB
Route::get('/create', function(){

$user = User::find(1);
$posts = new Post(['title'=>'new post', 'body'=>'this is body of my new post']);

$user->posts()->save($posts);
});


//Eloquent one to many read from DB
Route::get('read', function(){

    $user = User::find(2);

foreach($user->posts as $post){

    echo $post. "<br>";
}
});


//Eloquent one to many update into DB
Route::get('/update', function(){

    $user= User::find(1);

    $user->posts()->whereUserId(1)->update(['title'=>'new title here', 'body'=>'here is the body of new title']);
     return "successfuly submited new update to DB!";

});


//Eloquent one to many delete from DB
Route::get('/delete', function(){

    $user = User::find(1);

    $user->posts()->whereUserId(1)->delete();

    return "successfuly submited new update to DB!";
});