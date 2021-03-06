<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

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
	protected $hidden = array('password');

	public static function getValidator()
	{
		return array(   'email'                 => 'required|email|unique:users',
				        'name'                  => 'required|unique:users',
				        'password'              => 'required|min:8|confirmed',
				        'password_confirmation' => 'required' ) ;
	}

    public static function getMessages()
    {
    	return  array(	'email.required'                 => Lang::get('messages.email_required'),
				        'email.email'                    => Lang::get('messages.email_email'),
				        'email.unique'                   => Lang::get('messages.email_unique'),
				        'name.required'                  => Lang::get('messages.name_required'),
				        'name.unique'                    => Lang::get('messages.name_unique'),
				        'password.required'              => Lang::get('messages.password_required'),
				        'password.min'                   => Lang::get('messages.password_min'),
				        'password.confirmed'             => Lang::get('messages.password_confirmed'),
				        'password_confirmation.required' => Lang::get('messages.password_confirmation') );
    }

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}
