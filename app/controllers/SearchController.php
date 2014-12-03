<?php

class SearchController extends BaseController {

    public function showResults() {
        $languages = parent::getListLangage();

        $query = Input::get("query");

        $tabSnippets = Snippet::where("name","like","%".$query."%")->get();
        
        $searchResultSnippetData = array();
        $i = 0;
        
        foreach ($tabSnippets as $snip) 
        {
             $searchResultSnippetData[$i] = array(
                "id" => $snip->id,
                $snip->name,
                Langage::find($snip->langage_id)->name,
                $snip->created_at
             );
            $i++;
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
