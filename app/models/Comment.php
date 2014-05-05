<?php
class Comment extends Eloquent  {
 
    public static function getValidator()
	{
		return array(   'message'                 => 'required|max:200' ) ;
	}

    public static function getMessages()
    {
    	return  array(	'message.required'               => Lang::get('messages.message_required'),
				        'message.max'                    => Lang::get('messages.message_max'));
    }
    
}
