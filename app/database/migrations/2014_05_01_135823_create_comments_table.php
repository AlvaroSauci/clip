<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	public function up()
	{
		Schema::create('Comments', function(Blueprint $table) {
      		$table->increments('id');
			$table->string('name');
			$table->mediumtext('message');
			$table->integer('id_padre');
      		$table->timeStamps();
      		$table->softDeletes();
    	});

	}

	public function down()
	{
		Schema::drop('Comments');
	}

}
