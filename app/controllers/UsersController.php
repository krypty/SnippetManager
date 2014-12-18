<?php

class UsersController extends BaseController {

    //TODO: still useful ?
    public function getList() {
        
    }

    public function showMySnippets() {
        $languages = parent::getListLangage();

        $userID = Auth::user()->id;
        $snippetsId = Snippet::where('auteur_id', "=", $userID)->lists('id');

        $mySnippetData = array();
        $columnsNeeded = array("id" => "id", "title" => "Nom", "language" => "Langage", "visibility" => "Visibilité", "updatedAt" => "Date de modification", "createdAt" => "Date de création");
        foreach ($snippetsId as $snippetId) {
            $snippetData = SnippetController::getInfoWithFilter($snippetId, array_keys($columnsNeeded));
            array_push($mySnippetData, $snippetData);
        }

        $mySnippetsTable = array(
            "tableTitle" => "",
            "cols" => $columnsNeeded,
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

        $userID = Auth::user()->id;
        $snippetsId = Likes::where('id_user', "=", $userID)->lists('id_snippets');

        $mySnippetData = array();
        $columnsNeeded = array("id" => "id", "title" => "Nom", "language" => "Langage", "author" => "Auteur", "updatedAt" => "Date de modification");
        foreach ($snippetsId as $snippetId) {
            $snippetData = SnippetController::getInfoWithFilter($snippetId, array_keys($columnsNeeded));
            array_push($mySnippetData, $snippetData);
        }

        $likedSnippetsTable = array(
            "tableTitle" => "",
            "cols" => $columnsNeeded,
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
