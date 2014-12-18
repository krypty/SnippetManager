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
        
        $user = User::where("pseudo","=",$tab["inputPseudo"])->get();
       
        
        if(count($user)!=0)
        {
             $u = $user[0];
            if(Hash::check($tab["inputPassword"], $u->password))
            {
                Auth::login(User::find($u->id));
            }
        }
        
        
        if(Auth::check())
        {
            return Redirect::to('profile');
        }
        else
        {
            return Redirect::to('/');
        }
    }
    
    function logout(){
        Auth::logout();
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
        
        
        if($tab["inputPassword"] != $tab["inputPasswordConfirm"])
        {
            //TODO Password Différent
            return Redirect::to('createaccount');
        }
       
        
        $t = User::where("pseudo","=",$tab["inputPseudo"])->get();
        $t2 = User::where("email","=",$tab["inputEmail"])->get();
        if(count($t)==0&&count($t2)==0)
        {
            $user = new User();
            $user->pseudo = $tab["inputPseudo"];
            $user->email = $tab["inputEmail"];
            $user->password = Hash::make($tab["inputPassword"]);
            $user->save();
            
            Auth::login($user);
            
            return Redirect::to('/');
        }
        else
        {
            //TODO User deja existant
            return Redirect::to('createaccount');
        }
        
    }

}

?>
