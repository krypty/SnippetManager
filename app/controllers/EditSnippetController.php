<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EditSnippetController
 *
 * @author Kevin
 */
class EditSnippetController extends BaseController
{
    public function show($n)
    {
        $languages = parent::getListLangage();
       
        $languagesSelect = LangageController::getIdName();
        
        $snippetData = SnippetController::getInfo($n);
        
        $data = array(
        "languages" => $languages,
        "title" => "Modifier un snippet",
        "languagesSelect" => $languagesSelect,
        "snippetData" => $snippetData
        );
        return View::make('add_edit_snippet', $data);
    }
}

?>
