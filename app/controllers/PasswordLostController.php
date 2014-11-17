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
class PasswordLostController extends BaseController
{
    public function show()
    {
        $languages = parent::getListLangage();
               
        $data = array(
        "languages" => $languages
        );

        return View::make('password_lost', $data);
    }
}

?>
