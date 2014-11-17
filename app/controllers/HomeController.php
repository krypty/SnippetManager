<?php

class HomeController extends BaseController {

    public function showWelcome() {
        $languages = parent::getListLangage();

        // TODO: get this from database
        // data used to populate table "Derniers snippets ajoutés"
        $newestSnippetData = array(
            array(
                "Tri bulle en java",
                "Java",
                "17/11/2014"
            ),
            array(
                "Tri bulle en C",
                "C",
                "18/10/2014"
            ),
            array(
                "Division euclidienne en Python",
                "Python",
                "17/10/2014"
            )
        );

        $newestSnippetTable = array(
            "tableTitle" => "Derniers snippets ajoutés",
            "cols" => array("Nom", "Langage", "Date d'ajout"),
            "snippetsData" => $newestSnippetData
        );


        // TODO: get this from database
        // data used to populate table "Top des snippets ajoutés"
        $topSnippetData = array(
            array(
                "Tri bulle en Perl",
                "Perl",
                "17/11/2014"
            ),
            array(
                "Tri bulle en C#",
                "C#",
                "18/10/2014"
            ),
            array(
                "Division euclidienne en JS",
                "Javascript",
                "17/10/2014"
            )
        );

        $topSnippetTable = array(
            "tableTitle" => "Top des snippets ajoutés",
            "cols" => array("Nom", "Langage", "Date de modification"),
            "snippetsData" => $topSnippetData
        );

        $data = array(
            "languages" => $languages,
            "newestSnippetTable" => $newestSnippetTable,
            "topSnippetTable" => $topSnippetTable
        );

        return View::make('index', $data);
    }

}
