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

/**
 * root parameter
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * about
 */
Route::get('/about', function () {
    return print_r($_REQUEST, true);
});

/**
 * Route with parameter
 */
Route::get('/contact/{id}', function ($id) {
    return "This is contact : $id";
});

/**
 * Route with multiple parameter
 */
Route::get('/category/{id}/userId/{userId}', function ($id, $userId) {
    return "This is category : $id, for $userId";
});

/**
 * nickname or alias for route
 * from console, you can check route using $ php artisan route:list
 */
Route::get('/admin/login', ['as' => 'admin.login', function () {

    $url = route('admin.login');

    return "this url is $url";
} ]);



/**
 * route to controller
 */
Route::get('/test', 'TestController@index');
Route::get('/test/{id}', 'TestController@show');

/**
 * Route to controller resource...
 */
//Route::get('post/contact/', 'PostController@contact');
Route::resource('post', 'PostController');


Route::get('/user/{id}/post', function($id) {


    return \App\User::find($id)->post;

    /*
    $user = new \App\User();
    $user->name = "Sanil";
    $user->email = "santonil@yahoo.com";
    $user->password = "pwd";
    $user->save();
     * */



});

Route::get('/post/{id}/user', function($id){

    try {
        return \App\Post::find($id)->user->name;
    } catch (ErrorException $ex){

    }


});

Route::get('/getposts/{id}', function($id) {

    $posts =  \App\User::find($id)->posts;

    foreach($posts as $post){
        echo $post;
    }


});

Route::get('/get-user-role/{id}', function($id){
    $roles = \App\User::find($id)->roles;

    return $roles;
});

Route::get('/get-role-users/{id}', function($id){
    $users = \App\Role::find($id)->users;

    return $users;
});


// access of pivot table, many to many....
Route::get('/user/pivot', function(){

    $user = \App\User::find(2);

    foreach($user->roles as $role){
        echo $role->pivot;
    }



});


Route::get('/user/country/{id}', function($id){
    $countries  = \App\Country::find($id);

    foreach($countries->posts as $post){

        echo $post;
    }
});


// polymorphic relations

Route::get('/poly-user/{id}', function($id){
    $user = \App\User::find($id);


    foreach($user->photos as $photo){
        echo $photo;
    }
});


Route::get('/poly-post/{id}', function($id){
    $post = \App\Post::findOrFail($id);

    foreach($post->photos as $photo){
        echo $photo;
    }
});

/**
 * photo-owner
 */
Route::get('photo-owner/{id}',function($id){
   $photo = \App\Photo::findOrFail($id);

   return $photo->imageable;


});

// polymorphic many to many
Route::get('/post/{id}/tags', function($id){

    $post = \App\Post::findOrFail($id);

    return $post->tags;
});

Route::get('/video/{id}/tags', function($id){

    $video = \App\Video::findOrFail($id);

    return $video->tags;
});


/**
 *tag-owner
 */
Route::get('/tag-owner/{id}',function($id){
    return $tag = \App\Tag::findOrFail($id);

    return $tag->posts;


});