<?php
class Comment extends Eloquent  {
 
    protected $table    = 'comments';
    protected $guarded  = array( 'id', 'created_at', 'updated_at', 'deleted_at' );
    
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
