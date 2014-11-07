<?php

class Vue1Controller extends BaseController {

    public function showTableUser() {
        
        // En pratique, $users est récupéré à partir du modèle (via gestion)
        $users = array(
            array(
                "user_name" => "toto",
                "user_mail" => "toto@msn.com"
            ),
            array(
                "user_name" => "titi",
                "user_mail" => "titi@example.com"
            )
        );
        return View::make("essais.vue1", array("users" => $users));
    }

}
