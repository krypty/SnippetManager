<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LangagesController
 *
 * @author Kevin
 */
class LangageController extends BaseController {

    public function __construct(LangageGestion $gestion) {
        parent::__construct();
        $this->gestion = $gestion;
        $this->base = class_basename(__NAMESPACE__);
        $this->message_store = "Le langages a été ajouté";
        $this->message_update = "Le langages a été modifié";
    }

    public static function getIdName() {
        $languagesSelect = array();

        $tabLangage = Langage::all();

        foreach ($tabLangage as $langage) {
            $languagesSelect[$langage->id] = $langage->name;
        }

        return $languagesSelect;
    }

}

?>
