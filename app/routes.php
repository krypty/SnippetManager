<?php

/// HOME
Route::get('/', 'HomeController@showWelcome');


/// SNIPPET
Route::get('viewsnippet/{id}', array("uses" => "SnippetController@ViewSnippetShow", "before" => "public"))->where(array('id' => '[0-9]+'));

Route::get('addsnippet', "SnippetController@addSnippetShow");
Route::post('addsnippet', "SnippetController@addSnippetPost");

Route::get('editsnippet/{id}', array("uses" => "SnippetController@editSnippetShow", "before" => "author"))->where(array('id' => '[0-9]+'));
Route::post('editsnippet', "SnippetController@editSnippetPost");

Route::get('deletesnippet/{id}', array("uses" => "SnippetController@deleteSnippet", "before" => "author"))->where(array('id' => '[0-9]+'));

Route::get("likesnippet/{id}", array("uses" => "SnippetController@likeSnippet", "before" => "public"))->where(array('id' => '[0-9]+'));

Route::get("unlikesnippet/{id}", array("uses" => "SnippetController@unlikeSnippet", "before" => "public"))->where(array('id' => '[0-9]+'));

Route::get("snippetsbylanguage", "SnippetController@listSnippetByLanguage");


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
Route::get("likedsnippets", "UsersController@showLikedSnippets");

// SEARCH
Route::get("search", "SearchController@showResults");


/// ERRORS
App::missing(function() {
    return Response::view("errors.404", array(), 404);
});


// DEBUG
// affiche les requêtes générées
//Event::listen('illuminate.query', function($query) {
//    echo "<pre>";
//    var_dump($query);
//    echo "</pre>";
//});
