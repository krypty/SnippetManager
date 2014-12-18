<?php

/// HOME
Route::get('/', 'HomeController@showWelcome');


/// SNIPPET
Route::get('viewsnippet/{id}', array("uses" => "SnippetController@ViewSnippetShow", "before" => "public"))->where(array('id' => '[0-9]+'));

Route::get('addsnippet', array("uses" => "SnippetController@addSnippetShow", "before" => "auth"));
Route::post('addsnippet', array("uses" => "SnippetController@addSnippetPost", "before" => "auth"));

Route::get('editsnippet/{id}', array("uses" => "SnippetController@editSnippetShow", "before" => "author"))->where(array('id' => '[0-9]+'));
Route::post('editsnippet', "SnippetController@editSnippetPost");

Route::get('deletesnippet/{id}', array("uses" => "SnippetController@deleteSnippet", "before" => "author"))->where(array('id' => '[0-9]+'));

Route::get("likesnippet/{id}", array("uses" => "SnippetController@likeSnippet", "before" => "public"))->where(array('id' => '[0-9]+'));

Route::get("unlikesnippet/{id}", array("uses" => "SnippetController@unlikeSnippet", "before" => "public"))->where(array('id' => '[0-9]+'));

Route::get("snippetsbylanguage", "SnippetController@listSnippetByLanguage");


/// AUTHENTIFICATION
Route::get("login", array("uses" => "AuthentificationController@loginShow", "before" => "guest"));
Route::post("login", array("uses" => "AuthentificationController@loginPost", "before" => "guest"));


Route::get("passwordlost", array("uses" => "AuthentificationController@passwordLostShow", "before" => "guest"));
Route::post("passwordlost", array("uses" => "AuthentificationController@passwordLostPost", "before" => "guest"));


Route::get("createaccount", array("uses" => "AuthentificationController@createAccountShow", "before" => "guest"));
Route::post("createaccount", array("uses" => "AuthentificationController@createAccountPost", "before" => "guest"));

Route::get("logout", "AuthentificationController@logout");


/// USER
Route::get("profile", array("uses" => "ProfileController@show", "before" => "auth"));
Route::get("mysnippets", array("uses" => "UsersController@showMySnippets", "before" => "auth"));
Route::get("likedsnippets", array("uses" => "UsersController@showLikedSnippets", "before" => "auth"));

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
