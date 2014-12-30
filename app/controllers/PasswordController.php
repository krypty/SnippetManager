<?php

class PasswordController extends BaseController {

    public function remind() {
        $languages = parent::getListLangage();

        $data = array(
            "languages" => $languages
        );

        return View::make('password.remind', $data);
    }

    public function request() {
        $credentials = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
        $responce = Password::remind($credentials, function($message) {
                    $message->subject("[SnippetManager] Reset de votre mot de passe");
                });

        switch ($responce) {
            case Password::REMINDER_SENT: {
                    $mail = Input::get("email");
                    Session::flash('message', "Un mail avec un lien de réinitialisation vous a été envoyé par mail à l'adresse <b>$mail</b>");
                    Session::flash('alert-class', 'alert-success');
                    return Redirect::to("/");
                }

            case Password::INVALID_USER: {
                    Session::flash('message', "Erreur: l'adresse mail indiquée n'existe pas !");
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to("password/reset")->withInput();
                }
            default : {
                    Session::flash('message', 'Erreur: Impossible de réinitialiser votre mot de passe');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to("password/reset")->withInput();
                }
        }
    }

    public function reset($token) {
        $languages = parent::getListLangage();

        $data = array(
            "languages" => $languages,
            "token" => $token
        );
        return View::make('password.reset', $data);
    }

    public function update() {
        $rules = array(
            'email' => 'Required|Between:3,64|Email|Exists:users,email',
            'password' => 'Required|AlphaNum|Between:6,32|Confirmed',
            'password_confirmation' => 'Required|AlphaNum|Between:6,32',
        );

        $credentials = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'password_confirmation' => Input::get('password_confirmation'),
            'token' => Input::get('token')
        );

        $validator = Validator::make($credentials, $rules);

        if ($validator->fails()) {
            return Redirect::back()->with("errors", $validator->errors())->withInput();
        } else {

            $response = Password::reset($credentials, function($user, $password) {
                        echo "pass: $password";
                        $user->password = Hash::make($password);
                        $user->save();
                    });
            switch ($response) {
                case Password::INVALID_PASSWORD:
                case Password::INVALID_TOKEN:
                case Password::INVALID_USER:
                    return Redirect::back()->with('error', Lang::get($response));

                case Password::PASSWORD_RESET: {
                        Session::flash('message', "Votre mot de passe a été correctement réinitialisé !");
                        Session::flash('alert-class', 'alert-success');
                        return Redirect::to("login");
                    }
            }
        }
    }

}

?>