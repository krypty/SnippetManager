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
            if(Hash::check($tab["inputPassword"], $u->password))
            {
                if($tab["cbxRemember"]==1)
                {
                    Auth::login(User::find($u->id),true);
                }
                else 
                {
                    Auth::login(User::find($u->id));
                }
            }
        }


        if (Auth::check()) {
            Session::flash('message', 'Vous êtes désormais connecté !');
            Session::flash('alert-class', 'alert-success');
            return Redirect::to('profile');
        } else {
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

        // validation
        $rules = array(
            'email' => 'Required|Between:3,64|Email|Unique:users',
            'pseudo' => 'Required|Min:3|Max:20|AlphaNum|Unique:users',
            'password' => 'Required|AlphaNum|Between:4,32|Confirmed',
            'password_confirmation' => 'Required|AlphaNum|Between:4,32',
        );

        $inputToValidate = array(
            "email" => Input::get("inputEmail"),
            "pseudo" => Input::get("inputPseudo"),
            "password" => Input::get("inputPassword"),
            "password_confirmation" => Input::get("inputPasswordConfirm"),
        );
        $validator = Validator::make($inputToValidate, $rules);

        if ($validator->fails()) {
            return Redirect::to("createaccount")->withErrors($validator)->withInput();
        } else {
            $user = new User();
            $user->pseudo = $tab["inputPseudo"];
            $user->email = $tab["inputEmail"];
            $user->password = Hash::make($tab["inputPassword"]);
            $user->save();

            Auth::login($user);

            return Redirect::to('/');
        }
    }

}

?>
