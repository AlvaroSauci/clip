<?php

class RegisterController extends BaseController {

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->beforeFilter(function()
        {
            //
        });
    }

    public function Check()
    {

        $validator = Validator::make( Input::all(), User::getValidator(), User::getMessages() );        
   	
		if ($validator->fails())
		{
     	
     		return Redirect::intended('register')
                ->withErrors($validator) 
                ->withInput();
        }
        else
        {
            $this->createUser();
            
            return 'Registrado';
        }
    }

    public function createUser()
    {
        $user               = new User;
        
        $user->email        = Input::get('email');
        $user->name         = Input::get('name');
        $user->password     = Hash::make(Input::get('password'));

        if ( !$user->save() )
        {
            return Redirect::intended('register')
                ->withErrors($user->errors()->all(':message'))
                ->withInput();            
        }

    }
}
?>