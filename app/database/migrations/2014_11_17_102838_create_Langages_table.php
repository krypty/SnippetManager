<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLangagesTable extends Migration {

	public function up()
	{
		Schema::create('Langages', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('syntaxColorCode');
			$table->string('snippet_id');
		});
	}

	public function down()
	{
		Schema::drop('Langages');
	}
}