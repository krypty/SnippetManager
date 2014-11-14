<?php

App::missing(function() {
    return Response::view("errors.404", array(), 404);
});

Route::get('/', 'HomeController@showWelcome');

Route::get('/article/{n}', 'ArticleController@showArticle')->where("n", "[0-9]+");

Route::controller("users", "UsersController");

//Route::resource("users", "UsersController");
//Route::post("users", "UsersController@postInfos");

Route::get("vue1", "Vue1Controller@showTableUser");

Route::get("login", function() {
    return View::make('login', array('username' => "toto", 'password' => "pass"));
});


Route::get("loginTPL", function() {
    $languages = array(
        "C" => "4",
        "C++" => "16",
        "Python" => "5",
        "HTML" => "115"
    );



    $data = array(
        'username' => "toto",
        'password' => "pass",
        "languages" => $languages
    );

    return View::make('loginTPL', $data);
});
