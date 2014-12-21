<?php

class User extends Eloquent implements Illuminate\Auth\UserInterface, Illuminate\Auth\Reminders\RemindableInterface {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');
    //TODO: move ti createAccountPost and changeprofilepost
    private static $RULES = array(
        'email' => 'Required|Between:3,64|Email|Unique:users',
        'pseudo' => 'Required|Min:3|Max:20|AlphaNum|Unique:users',
        'password' => 'Required|AlphaNum|Between:4,32|Confirmed|Different:old_password',
        'password_confirmation' => 'Required|AlphaNum|Between:4,32',
        'old_password' => 'Required|AlphaNum|Between:4,32'
    );

    public function getAuthIdentifier() {
        return $this->getKey();
    }

    public function getAuthPassword() {
        return $this->password;
    }

    public function getRememberToken() {
        
    }

    public function getRememberTokenName() {
        
    }

    public function setRememberToken($value) {
        
    }

    public function getReminderEmail() {
        return $this->email;
    }

}

?>
