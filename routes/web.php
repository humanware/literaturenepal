<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

Route::group(['middleware'=>'admin'], function(){
    Route::get('/admin', function(){
        return view('admin.index');
    });
    Route::resource('admin/users', 'AdminUsersController', ['names'=>[
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit',
        'show' => 'admin.users.show',
        'update'=>'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]]);

    Route::resource('admin/posts', 'AdminPostsController', ['names'=>[
        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'edit' => 'admin.posts.edit',
        'show' => 'admin.posts.show',
        'update'=>'admin.posts.update',
        'destroy' => 'admin.posts.destroy',
    ]]);

    Route::resource('admin/categories', 'AdminCategoriesController', ['names'=>[
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
        'show' => 'admin.categories.show',
        'update'=>'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
    ]]);

    Route::resource('admin/media', 'AdminMediasController', ['names'=> [
        'index' => 'admin.media.index',
        'create' => 'admin.media.create',
        'store' => 'admin.media.store',
        'edit' => 'admin.media.edit',
        'show' => 'admin.media.show',
        'update'=>'admin.media.update',
        'destroy' => 'admin.media.destroy',
    ]]);

    Route::resource('admin/comments', 'PostCommentsController', ['names'=>[
        'index' => 'admin.comments.index',
        'create' => 'admin.comments.create',
        'store' => 'admin.comments.store',
        'edit' => 'admin.comments.edit',
        'show' => 'admin.comments.show',
        'update'=>'admin.comments.update',
        'destroy' => 'admin.comments.destroy',
    ]]);

    Route::resource('admin/comment/replies', 'CommentRepliesController', ['names'=>[
        'index' => 'admin.comment.replies.index',
        'create' => 'admin.comment.replies.create',
        'store' => 'admin.comment.replies.store',
        'edit' => 'admin.comment.replies.edit',
        'show' => 'admin.comment.replies.show',
        'update'=>'admin.comment.replies.update',
        'destroy' => 'admin.comment.replies.destroy',
    ]]);
});

Route::group(['middleware'=>'auth'], function(){
    Route::post('comment/reply', 'CommentRepliesController@createReply');
});