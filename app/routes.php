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

Route::get("passwordlost", function() {
    $languages = array(
        "C" => "4",
        "C++" => "16",
        "Python" => "5",
        "HTML" => "115"
    );

    $data = array(
        "languages" => $languages
    );

    return View::make('password_lost', $data);
});

Route::get('addsnippet', function() {
    //TODO: encapsulate this in BaseController.
    $languages = array(
        "C" => "4",
        "C++" => "16",
        "Python" => "5",
        "HTML" => "115"
    );

    // TODO: replace this with databases values (id + langague's name)
    $languagesSelect = array(
        "2" => "C",
        "4" => "C++",
        "5" => "HTML",
        "3" => "Java",
        "10" => "Scala",
        "11" => "Python",
        "12" => "C#"
    );

    $data = array(
        "languages" => $languages,
        "title" => "Ajouter un snippet",
        "languagesSelect" => $languagesSelect
    );

    return View::make('add_edit_snippet', $data);
});


Route::get('editsnippet/{id}', function($id) {
    //TODO: encapsulate this in BaseController.
    $languages = array(
        "C" => "4",
        "C++" => "16",
        "Python" => "5",
        "HTML" => "115"
    );

    // TODO: replace this with databases values (id => language's name)
    $languagesSelect = array(
        "2" => "C",
        "4" => "C++",
        "5" => "HTML",
        "3" => "Java",
        "10" => "Scala",
        "11" => "Python",
        "12" => "C#"
    );

    //TODO: get snippet data from database using id $n
    $snippetData = array(
        "title" => "Hello world",
        "language" => "C++",
        "public" => 1,
        "code" => '// my first program in C++
#include <iostream>

int main()
{
  std::cout << "Hello World!";
}'
    );


    $data = array(
        "languages" => $languages,
        "title" => "Modifier un snippet",
        "languagesSelect" => $languagesSelect,
        "snippetData" => $snippetData
    );

    return View::make('add_edit_snippet', $data);
})->where(array('id' => '[0-9]+'));
