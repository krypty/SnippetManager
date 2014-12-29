<?php

//
// NOTE Migration Created: 2014-12-11 20:19:54
// --------------------------------------------------

class CreateSnippetManagerDatabase {

//
// NOTE - Make changes to the database.
// --------------------------------------------------

    public function up() {

//
// NOTE -- langages
// --------------------------------------------------

        Schema::create('langages', function($table) {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->default("0000-00-00 00:00:00");
            $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
            $table->string('name', 255)->unique();
            $table->string('syntaxColorCode', 255);
        });


//
// NOTE -- likes
// --------------------------------------------------

        Schema::create('likes', function($table) {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->default("0000-00-00 00:00:00");
            $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
            $table->unsignedInteger('id_user')->unsigned();
            $table->unsignedInteger('id_snippets')->unsigned();
        });


//
// NOTE -- snippets
// --------------------------------------------------

        Schema::create('snippets', function($table) {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->default("0000-00-00 00:00:00");
            $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
            $table->string('name', 255);
            $table->text('code');
            $table->unsignedInteger('auteur_id');
            $table->unsignedInteger('langage_id');
            $table->boolean('public');
        });


//
// NOTE -- users
// --------------------------------------------------

        Schema::create('users', function($table) {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->default("0000-00-00 00:00:00");
            $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
            $table->string('email', 255)->unique();
            $table->string('pseudo', 255)->unique();
            $table->string('password', 255);
        });
    }

//
// NOTE - Revert the changes to the database.
// --------------------------------------------------

    public function down() {

        Schema::drop('langages');
        Schema::drop('likes');
        Schema::drop('snippets');
        Schema::drop('users');
    }

}
