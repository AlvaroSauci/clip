<?php

class ContactController extends BaseController {

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

        $conditions = array( 
            'name'                  => 'required',
            'email'                 => 'required',
            'suggest'               => 'required'

        );

        $messages = array(
            'name.required'         => Lang::get('messages.contact_name'),
            'email.required'        => Lang::get('messages.contact_email'),
            'suggest.required'      => Lang::get('messages.contact_suggest')
        );

        $validator = Validator::make( Input::all(), $conditions, $messages );       

        if ($validator->fails())
        {
        
            return Redirect::intended('contact')
                ->withErrors($validator) 
                ->withInput();
        }
        else
        {
            $this->sendMail();
            
            return Redirect::route('dashboard')
                ->with('msg', Lang::get('messages.message_send') );
        }

    }

    public function sendMail()
    {
        $myEmail    = 'alvaro.clippea@gmail.com';

        Mail::send('emails.emailclip', //Esta es la vista que contiene el contenido del mensaje.
                    array(
                            'user' => Input::get('name'),           // Estos son los
                            'email' => Input::get('email'),         // valores que le
                            'suggest' => Input::get('suggest')),    // pasamos a la vista
                            function ($message) use ($myEmail)
                            {
                                $message->subject('Contacto Clip'); // Asunto del email
                                $message->from( Input::get('email') , Input::get('name')); // Quien lo manda.
                                $message->to($myEmail);             // Se envia a este email.
                            }
                    );     
    }

}



