<?php

class HomeController extends BaseController {

    public function showWelcome() {
        $languages = parent::getListLangage();

        $n = 10; // show limit

        // to make the where clause work
        $userID = Auth::check() ? Auth::user()->id: -1;

        $newestSnippetTable = $this->getLastestSnippet($n, $userID);
        $topSnippetTable = $this->getMostLikedSnippet($n, $userID);

        $data = array(
            "languages" => $languages,
            "newestSnippetTable" => $newestSnippetTable,
            "topSnippetTable" => $topSnippetTable
        );

        return View::make('index', $data);
    }

    private function getLastestSnippet($n, $userID) {
        $newestSnippetData = array();

        $snippets_id = Snippet::where('public', '=', 1)->orderBy('created_at', 'desc')->limit($n)->lists('id');

        $columnsNeeded = array("id", "title", "author", "language", "createdAt");
        foreach ($snippets_id as $snippet_id) {
            $snippetData = SnippetController::getInfoWithFilter($snippet_id, $columnsNeeded);
            array_push($newestSnippetData, $snippetData);
        }

        $newestSnippetTable = array(
            "tableTitle" => "Derniers snippets publics ajoutés",
            "cols" => array("Nom", "Auteur", "Langage", "Date d'ajout"),
            "snippetsData" => $newestSnippetData
        );

        return $newestSnippetTable;
    }

    private function getMostLikedSnippet($n, $userID) {
        $topSnippetData = array();

        $snippets_id = Likes::select('*', DB::raw('COUNT(*) as cpt'))->leftJoin('snippets', 'likes.id_snippets', '=', 'snippets.id')->where('public', '=', 1)->orWhere('auteur_id', '=', $userID)->groupBy('id_snippets')->orderBy('cpt', 'DESC')->limit($n)->lists('id_snippets');

        $columnsNeeded = array("id", "numberOfLikes", "title", "language", "author", "updatedAt");
        foreach ($snippets_id as $snippet_id) {
            $snippetData = SnippetController::getInfoWithFilter($snippet_id, $columnsNeeded);
            array_push($topSnippetData, $snippetData);
        }

        $topSnippetTable = array(
            "tableTitle" => "Top des snippets publics",
            "cols" => array("Nombre de likes", "Nom", "Langage", "Auteur", "Date de modification"),
            "snippetsData" => $topSnippetData
        );

        return $topSnippetTable;
    }

}
