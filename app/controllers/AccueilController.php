
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccueilController
 *
 * @author Kevin
 */
class AccueilController extends BaseController
{
    public function show()
    {
        $languages = parent::getListLangage();

        $data = array(
            'username' => "toto",
            'password' => "pass",
            "languages" => $languages
        );   
        
        return View::make('loginTPL', $data);
    }
}

?>
