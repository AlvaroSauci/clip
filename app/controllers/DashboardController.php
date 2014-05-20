<?php

class DashboardController extends BaseController {

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

        $validator = Validator::make( Input::all(), Comment::getValidator(), Comment::getMessages() );        
   	
		if ($validator->fails())
		{
     	
     		return Redirect::intended('dashboard')
                ->withErrors($validator) 
                ->withInput();
        }
        else
        {
            $this->createComments();
            
            return Redirect::route('dashboard');
        }
    }

    public function createComments()
    {

        $comentario                 = new Comment;

        $comentario->name           = Auth::user()->name;
        $comentario->message        = Input::get('message');

        if ( !$comentario->save() )
        {
            return Redirect::intended('dashboard')
                ->withErrors($comentario->errors()->all(':message'))
                ->withInput();            
        }

    }


    public function reclippeaComment($id){

        $comentarioAnt              = Comment::find($id);
        $comentario                 = new Comment;

        $comentario->name           = Auth::user()->name;
        $comentario->message        = $comentarioAnt->message;

        if ( !$comentario->save() )
        {
            return Redirect::intended('dashboard')
                ->withErrors($comentario->errors()->all(':message'))
                ->withInput();            
        }
        else
        {
            return Redirect::route('dashboard');
        }

    }
}
?>