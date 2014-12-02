<?php

class UsersController extends BaseController {

    //TODO: still useful ?
    public function getList() {
        
    }

    public function showMySnippets() {
        $languages = parent::getListLangage();

        $userID = 1; //TODO: replace this with the id of the current logged user
        $snippetsId = DB::table("snippets")->where('auteur_id', "=", $userID)->lists('id');

        $mySnippetData = array();
        $columnsNeeded = array("id", "title", "language", "updatedAt", "createdAt");
        foreach ($snippetsId as $snippetId) {
            $snippetData = SnippetController::getInfoWithFilter($snippetId, $columnsNeeded);
            array_push($mySnippetData, $snippetData);
        }

        $mySnippetsTable = array(
            "tableTitle" => "",
            "cols" => array("Nom", "Langage", "Date de modification", "Date de création"),
            "snippetsData" => $mySnippetData
        );

        $data = array(
            "languages" => $languages,
            "mySnippetsTable" => $mySnippetsTable
        );

        return View::make('my_snippets', $data);
    }

    public function showLikedSnippets() {
        $languages = parent::getListLangage();

        $userID = 1; //TODO: replace this with the id of the current logged user
        $snippetsId = DB::table("likes")->where('id_user', "=", $userID)->lists('id_snippets');

        $mySnippetData = array();
        $columnsNeeded = array("id", "title", "language", "author", "updatedAt");
        foreach ($snippetsId as $snippetId) {
            $snippetData = SnippetController::getInfoWithFilter($snippetId, $columnsNeeded);
            array_push($mySnippetData, $snippetData);
        }

        $likedSnippetsTable = array(
            "tableTitle" => "",
            "cols" => array("Nom", "Langage", "Auteur", "Date de modification"),
            "snippetsData" => $mySnippetData
        );

        $data = array(
            "languages" => $languages,
            "likedSnippetsTable" => $likedSnippetsTable
        );

        return View::make('liked_snippets', $data);
    }

}

?>
