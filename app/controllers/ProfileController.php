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
class ProfileController extends BaseController {

    public function show() {
        $languages = parent::getListLangage();
        
        $profile = array(
            "pseudo" => "toto",
            "mail" => "toto@monmaildefou.com"
        );

        $data = array(
            "languages" => $languages,
            "profile" => $profile
        );

        return View::make('profile', $data);
    }

}

?>
