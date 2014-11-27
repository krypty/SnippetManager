<?php

class SearchController extends BaseController {

    public function showResults() {
        $languages = parent::getListLangage();

        $query = Input::get("query");

        //TODO: add snippets that match with the search
        $searchResultSnippetData = array(
            array(
                "id" => "-1",
                "Tri bulle en java",
                "Java",
                "17/11/2014"
            ),
            array(
                "id" => "-1",
                "Tri bulle en C",
                "C",
                "18/10/2014"
            ),
            array(
                "id" => "-1",
                "Division euclidienne en Python",
                "Python",
                "17/10/2014"
            )
        );

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
