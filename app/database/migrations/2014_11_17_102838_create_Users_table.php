<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('Users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('email')->unique();
			$table->string('pseudo')->unique();
			$table->string('password');
			$table->integer('snippetsLiked');
		});
	}

	public function down()
	{
		Schema::drop('Users');
	}
}