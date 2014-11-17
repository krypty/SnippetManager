<?php

App::missing(function() {
    return Response::view("errors.404", array(), 404);
});

Route::get('/', 'HomeController@showWelcome');

Route::controller("users", "UsersController");

//Route::resource("users", "UsersController");
//Route::post("users", "UsersController@postInfos");

Route::get("vue1", "Vue1Controller@showTableUser");

Route::get("login", function() {
    return View::make('login', array('username' => "toto", 'password' => "pass"));
});


Route::get("loginTPL", 'AccueilController@show');
    
Route::get("passwordlost", "PasswordLostController@show");

Route::get('addsnippet', "AddSnippetController@show");

Route::get('editsnippet/{id}', "EditSnippetController@show")->where(array('id' => '[0-9]+'));

Route::get("profile","ProfileController@show");