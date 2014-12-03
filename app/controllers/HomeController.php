<?php

class HomeController extends BaseController {

    public function showWelcome() {
        $languages = parent::getListLangage();

        $n = 10; // show limit

        $newestSnippetTable = $this->getLastestSnippet($n);
        $topSnippetTable = $this->getMostLikedSnippet($n);

        $data = array(
            "languages" => $languages,
            "newestSnippetTable" => $newestSnippetTable,
            "topSnippetTable" => $topSnippetTable
        );

        return View::make('index', $data);
    }

    private function getLastestSnippet($n) {
        $newestSnippetData = array();

        $snippets_id = DB::table('snippets')->orderBy('created_at', 'desc')->lists('id');

        $columnsNeeded = array("id", "title", "author", "language", "createdAt");
        foreach ($snippets_id as $snippet_id) {
            $snippetData = SnippetController::getInfoWithFilter($snippet_id, $columnsNeeded);
            array_push($newestSnippetData, $snippetData);
        }

        $newestSnippetTable = array(
            "tableTitle" => "Derniers snippets ajoutés",
            "cols" => array("Nom", "Auteur", "Langage", "Date d'ajout"),
            "snippetsData" => $newestSnippetData
        );

        return $newestSnippetTable;
    }

    private function getMostLikedSnippet($n) {
        $topSnippetData = array();

        $snippets_id = DB::table('likes')->select('*', DB::raw('COUNT(*) as cpt'))->groupBy('id_snippets')->orderBy('cpt', 'DESC')->limit($n)->lists('id_snippets');

        $columnsNeeded = array("id", "title", "language", "author", "updatedAt");
        foreach ($snippets_id as $snippet_id) {
            $snippetData = SnippetController::getInfoWithFilter($snippet_id, $columnsNeeded);
            array_push($topSnippetData, $snippetData);
        }

        $topSnippetTable = array(
            "tableTitle" => "Top des snippets ajoutés",
            "cols" => array("Nom", "Auteur", "Langage", "Date de modification"),
            "snippetsData" => $topSnippetData
        );

        return $topSnippetTable;
    }

}
