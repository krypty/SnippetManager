<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSnippetsTable extends Migration {

	public function up()
	{
		Schema::create('Snippets', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name')->index();
			$table->text('code');
			$table->integer('auteur_id');
			$table->integer('usersLiked');
			$table->integer('langage_id');
		});
	}

	public function down()
	{
		Schema::drop('Snippets');
	}
}