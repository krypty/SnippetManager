<?php

class ProfileController extends BaseController {

    public function show() {
        $languages = parent::getListLangage();

        if (Auth::check()) {
            $user = Auth::user();
            $profile = array(
                "pseudo" => $user->pseudo,
                "mail" => $user->email
            );

            $data = array(
                "languages" => $languages,
                "profile" => $profile
            );
            return View::make('profile', $data);
        } else {
            return Redirect::to("login");
        }
    }

    public function edit() {
        print_r(Input::all());

        $rules = array(
            'old_password' => "Required",
            'password' => 'Required|AlphaNum|Between:6,32|Confirmed',
            'password_confirmation' => 'Required|AlphaNum|Between:6,32',
        );

        $credentials = array(
            'old_password' => Input::get('inputOldPassword'),
            'password' => Input::get('inputNewPassword'),
            'password_confirmation' => Input::get('inputNewPasswordConfirm'),
            'token' => Input::get('token')
        );

        $validator = Validator::make($credentials, $rules);

        if ($validator->fails()) {
            return Redirect::back()->with("errors", $validator->errors())->withInput();
        } else {

            $user = Auth::user();
            $oldPassword = Input::get("inputOldPassword");

            if (!Hash::check($oldPassword, $user->password)) {
                Session::flash('message', "Votre ancien mot de passe n'est pas correct");
                Session::flash('alert-class', 'alert-danger');
                return Redirect::back();
            } else {
                $user->password = Hash::make(Input::get("inputNewPassword"));
                $user->save();

                Session::flash('message', "Votre mot de passe a été modifié !");
                Session::flash('alert-class', 'alert-success');
                return Redirect::to("profile");
            }
        }
    }

}

?>
