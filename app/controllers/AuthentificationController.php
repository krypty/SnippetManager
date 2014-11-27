<?php

class AuthentificationController extends BaseController {

    ///
    /// Login
    ///
    function loginShow() {
        $languages = parent::getListLangage();

        $data = array(
            'username' => "toto",
            'password' => "pass",
            "languages" => $languages
        );

        return View::make('login', $data);
    }

    function loginPost() {
        //TODO...
        echo "login post<br/>";
        print_r(Input::all());
    }

    ///
    /// Password lost
    ///

    public function passwordLostShow() {
        $languages = parent::getListLangage();

        $data = array(
            "languages" => $languages
        );

        return View::make('password_lost', $data);
    }

    public function passwordLostPost() {
        //TODO: get user input and send mail to user
        echo "password lost post<br/>";
        print_r(Input::all());
    }

    ///
    /// Create account
    ///
    public function createAccountShow() {
        $languages = parent::getListLangage();

        $data = array(
            "languages" => $languages
        );

        return View::make('create_account', $data);
    }

    public function createAccountPost() {
        //TODO: get user input and create account in BD
        echo "createAccountPost<br/>";
        print_r(Input::all());
    }

}

?>
