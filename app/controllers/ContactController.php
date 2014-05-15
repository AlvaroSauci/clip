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
            $myEmail    = 'alvaro.sauci@gmail.com';

            Mail::send('emails.emailclip', array('user' => Input::get('name'), 'email' => Input::get('email'), 'suggest' => Input::get('suggest')), function ($message) use ($myEmail) {
                $message->subject('Contacto Clip');
                $message->from( Input::get('email') , Input::get('name'));
                $message->to($myEmail); // Recipient address
            });     
        }

}



