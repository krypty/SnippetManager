<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PassswordLostController
 *
 * @author Kevin
 */
class AccountController extends BaseController {

    public function show() {
        $languages = parent::getListLangage();

        $data = array(
            "languages" => $languages
        );

        return View::make('create_account', $data);
    }

    public function showMySnippets() {
        $languages = parent::getListLangage();

        $mySnippetData = array(
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

        $mySnippetsTable = array(
            "tableTitle" => "",
            "cols" => array("Nom", "Langage", "Date de modification"),
            "snippetsData" => $mySnippetData
        );

        $data = array(
            "languages" => $languages,
            "mySnippetsTable" => $mySnippetsTable
        );

        return View::make('my_snippets', $data);
    }

}

?>
