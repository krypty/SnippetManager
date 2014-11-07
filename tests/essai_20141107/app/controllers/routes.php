<?php

App::missing(function() {
    return Response::view("errors.404", array(), 404);
});

// Quand on veut vue1 en GET on appelle la méthode showTableUser du contrôleur Vue1Controller
Route::get("vue1", "Vue1Controller@showTableUser");
