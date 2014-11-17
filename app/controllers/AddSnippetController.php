<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddSnippetController
 *
 * @author Kevin
 */
class AddSnippetController extends BaseController
{
    public function show()
    {
        $languages = parent::getListLangage();
        
        $languagesSelect = LangageController::getIdName();
        
        $data = array(
        "languages" => $languages,
        "title" => "Ajouter un snippet",
        "languagesSelect" => $languagesSelect
        );
        return View::make('add_edit_snippet', $data);
    }
}

?>
