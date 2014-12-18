<?php

class SearchController extends BaseController {

    public function showResults() {
        $languages = parent::getListLangage();

        $query = Input::get("query");

        // to make the where clause work
        $userID = Auth::check() ? Auth::user()->id : -1;

        $snippets_id = Snippet::where("name", "like", "%$query%")->where(function($query) use (&$userID) {
                    $query->where('public', '=', 1)->orWhere('auteur_id', '=', $userID);
                })->lists('id');

        $searchResultSnippetData = array();
        $columnsNeeded = array("id", "title", "author", "updatedAt", "createdAt");
        foreach ($snippets_id as $snippet_id) {
            $snippetData = SnippetController::getInfoWithFilter($snippet_id, $columnsNeeded);
            array_push($searchResultSnippetData, $snippetData);
        }

        $searchResultsSnippetsTable = array(
            "tableTitle" => "",
            "cols" => array("Nom", "Langage", "Date de modification"),
            "snippetsData" => $searchResultSnippetData
        );

        $data = array(
            "query" => $query,
            "languages" => $languages,
            "searchResultsSnippetsTable" => $searchResultsSnippetsTable
        );

        return View::make('search_results', $data);
    }

}

?>
