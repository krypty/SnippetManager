<?php

/// HOME
Route::get('/', 'HomeController@showWelcome');


/// SNIPPET
Route::get('viewsnippet/{id}', "SnippetController@ViewSnippetShow")->where(array('id' => '[0-9]+'));

Route::get('addsnippet', "SnippetController@AddSnippetShow");
Route::post('addsnippet', "SnippetController@AddSnippetPost");

Route::get('editsnippet/{id}', "SnippetController@EditSnippetShow")->where(array('id' => '[0-9]+'));
Route::post('editsnippet', "SnippetController@EditSnippetPost");

Route::get("likesnippet/{id}", "SnippetController@LikeSnippet")->where(array('id' => '[0-9]+'));

Route::get("unlikesnippet/{id}", "SnippetController@UnlikeSnippet")->where(array('id' => '[0-9]+'));


/// AUTHENTIFICATION
Route::get("loginTPL", 'AccueilController@show');
Route::get("passwordlost", "PasswordLostController@show");
Route::get("createaccount", "AccountController@show");


/// USER
Route::controller("users", "UsersController");
Route::get("profile", "ProfileController@show");
Route::get("mysnippets", "AccountController@showMySnippets");


/// ERRORS
App::missing(function() {
    return Response::view("errors.404", array(), 404);
});
