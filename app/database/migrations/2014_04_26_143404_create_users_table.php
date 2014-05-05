<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up()
	{

		Schema::create('Users', function(Blueprint $table) {
      $table->increments('id');
			$table->string('name')->unique();
		  $table->string('email')->unique();
		  $table->string('password');
      $table->timestamps();
      $table->softDeletes();
    });

    DB::table('Users')->insert( array(	'name' => 'demo',
				                        'email' => 'demo@demo.com',
				                        'password' => Hash::make('demo')));

	}

	public function down()
	{

		Schema::drop('Users');

	}

}
