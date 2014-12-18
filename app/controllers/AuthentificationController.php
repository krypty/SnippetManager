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

        $tab = Input::all();

        $user = User::where("pseudo", "=", $tab["inputPseudo"])->get();


        if (count($user) != 0) {
            $u = $user[0];
            if (Hash::check($tab["inputPassword"], $u->password)) {
                Auth::login(User::find($u->id));
            }
        }


        if (Auth::check()) {
            Session::flash('message', 'Vous êtes désormais connecté !');
            Session::flash('alert-class', 'alert-success');
            return Redirect::to('profile');
        } else {
            //TODO: add withErrors + message flash
            Session::flash('message', 'Vous identifiants sont incorrects ! Essayer à nouveau');
            Session::flash('alert-class', 'alert-danger');
            return Redirect::to('login')->withInput();
        }
    }

    function logout() {
        Auth::logout();
        Session::flash('message', 'Vous êtes désormais déconnecté !');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('/');
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

        $tab = Input::all();


        if ($tab["inputPassword"] != $tab["inputPasswordConfirm"]) {
            Session::flash('message', 'Veuillez saisir des mots de passes identiques');
            Session::flash('alert-class', 'alert-danger');
            return Redirect::to('createaccount')->withInput();
        }


        $t = User::where("pseudo", "=", $tab["inputPseudo"])->get();
        $t2 = User::where("email", "=", $tab["inputEmail"])->get();
        if (count($t) == 0 && count($t2) == 0) {
            $user = new User();
            $user->pseudo = $tab["inputPseudo"];
            $user->email = $tab["inputEmail"];
            $user->password = Hash::make($tab["inputPassword"]);
            $user->save();

            Auth::login($user);

            return Redirect::to('/');
        } else {
            Session::flash('message', 'Ce pseudo ou adresse mail existe déjà');
            Session::flash('alert-class', 'alert-danger');
            return Redirect::to('createaccount')->withInput();
        }
    }

}

?>
