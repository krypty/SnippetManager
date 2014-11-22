<?php

/// HOME
Route::get('/', 'HomeController@showWelcome');


/// SNIPPET
Route::get('viewsnippet/{id}', "SnippetController@ViewSnippetShow")->where(array('id' => '[0-9]+'));

Route::get('addsnippet', "SnippetController@addSnippetShow");
Route::post('addsnippet', "SnippetController@addSnippetPost");

Route::get('editsnippet/{id}', "SnippetController@editSnippetShow")->where(array('id' => '[0-9]+'));
Route::post('editsnippet', "SnippetController@editSnippetPost");

Route::get('deletesnippet/{id}', "SnippetController@deleteSnippetShow")->where(array('id' => '[0-9]+'));

Route::get("likesnippet/{id}", "SnippetController@likeSnippet")->where(array('id' => '[0-9]+'));

Route::get("unlikesnippet/{id}", "SnippetController@unlikeSnippet")->where(array('id' => '[0-9]+'));


/// AUTHENTIFICATION
Route::get("login", 'AuthentificationController@loginShow');
Route::post("login", 'AuthentificationController@loginPost');


Route::get("passwordlost", "AuthentificationController@passwordLostShow");
Route::post("passwordlost", "AuthentificationController@passwordLostPost");


Route::get("createaccount", "AuthentificationController@createAccountShow");
Route::post("createaccount", "AuthentificationController@createAccountPost");


/// USER
//Route::controller("users", "UsersController");
Route::get("profile", "ProfileController@show");
Route::get("mysnippets", "UsersController@showMySnippets");


/// ERRORS
App::missing(function() {
    return Response::view("errors.404", array(), 404);
});
