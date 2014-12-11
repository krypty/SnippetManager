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
        
        if(Auth::check())
        {
            $user = Auth::user();
            $profile = array(
                "pseudo" => $user->pseudo,
                "mail" =>  $user->email
            );
            
            $data = array(
                "languages" => $languages,
                "profile" => $profile
            );
            return View::make('profile', $data);
        }
        else
        {
            return Redirect::to("login");
        }
        
    }

}
?>
