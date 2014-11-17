<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SnippetsControllers
 *
 * @author Kevin
 */
class SnippetController extends BaseController
{
    
    public static function getInfo($id)
    {
        $objet = Snippet::find($id);
        
        $lang = Langage::find($objet->langage_id);
        
        $tab = array(
            "title" => $objet->name,
            "language" => "$lang->name",
            "public" => 1,
            "code" => $objet->code
        );
        return $tab;
    }
}

?>
