<?php

return array(

	'driver' => 'smtp',

	'host' => 'smtp.gmail.com',

	'port' => 587,

	'from' => array('address' => 'alvaro.clippea@gmail.com', 'name' => 'Clip'),

	'encryption' => 'tls',

	'username' => 'alvaro.clippea',

	'password' => 'proyectointegrado',

	'sendmail' => '/usr/sbin/sendmail -bs',

	'pretend' => false,

);
