<?php

class User extends Eloquent implements Illuminate\Auth\UserInterface, Illuminate\Auth\Reminders\RemindableInterface 
{
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
