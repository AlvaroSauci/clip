<?php


class LoginController extends BaseController {

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

        $email      = Input::get('email');
        $password   = Input::get('password');

         if ( Auth::attempt(array('email' => $email, 'password' => $password)))
         {
             return Redirect::to('dashboard');
         }
         else
         {
            return Redirect::route('login')
                ->with('error_message', Lang::get('messages.error_authentication')) 
                ->withInput();
         }
        

    }

    public function Logout()
    {
        //Desconctamos al usuario
        Auth::logout();
 
        //Redireccionamos al inicio de la app con un mensaje
        return Redirect::route('login')
            ->with('msg', 'Gracias por visitarnos!.');
    }


}

?>