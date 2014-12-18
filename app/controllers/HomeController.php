<?php

class HomeController extends BaseController {

    public function showWelcome() {
        $languages = parent::getListLangage();

        $n = 10; // show limit
        // to make the where clause work
        $userID = Auth::check() ? Auth::user()->id : -1;

        $newestSnippetTable = $this->getLastestSnippet($n, $userID);
        $topSnippetTable = $this->getMostLikedSnippet($n, $userID);

        $data = array(
            "languages" => $languages,
            "newestSnippetTable" => $newestSnippetTable,
            "topSnippetTable" => $topSnippetTable
        );

        return View::make('index', $data);
    }

    private function getLastestSnippet($n) {
        $newestSnippetData = array();

        $snippets_id = Snippet::where('public', '=', 1)->orderBy('created_at', 'desc')->limit($n)->lists('id');

        $columnsNeeded = array("id" => "id", "title" => "Nom", "author" => "Auteur", "language" => "Langage", "createdAt" => "Date d'ajout");
        foreach ($snippets_id as $snippet_id) {
            $snippetData = SnippetController::getInfoWithFilter($snippet_id, array_keys($columnsNeeded));
            array_push($newestSnippetData, $snippetData);
        }

        $newestSnippetTable = array(
            "tableTitle" => "Derniers snippets publics ajoutés",
            "cols" => $columnsNeeded,
            "snippetsData" => $newestSnippetData
        );

        return $newestSnippetTable;
    }

    private function getMostLikedSnippet($n, $userID) {
        $topSnippetData = array();

        $snippets_id = Likes::select('*', DB::raw('COUNT(*) as cpt'))->leftJoin('snippets', 'likes.id_snippets', '=', 'snippets.id')->where('public', '=', 1)->orWhere('auteur_id', '=', $userID)->groupBy('id_snippets')->orderBy('cpt', 'DESC')->limit($n)->lists('id_snippets');

        $columnsNeeded = array("id" => "id", "numberOfLikes" => "Nombre de likes", "title" => "Nom", "language" => "Langage", "author" => "Auteur", "updatedAt" => "Date de modification");
        foreach ($snippets_id as $snippet_id) {
            $snippetData = SnippetController::getInfoWithFilter($snippet_id, array_keys($columnsNeeded));
            array_push($topSnippetData, $snippetData);
        }

        $topSnippetTable = array(
            "tableTitle" => "Top des snippets publics",
            "cols" => $columnsNeeded,
            "snippetsData" => $topSnippetData
        );

        return $topSnippetTable;
    }

}
