<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

//		$this->call('UserTableSeeder');
//		$this->command->info('User table seeded!');
//
//		$this->call('SnippetTableSeeder');
//		$this->command->info('Snippet table seeded!');

		$this->call('LangageTableSeeder');
		$this->command->info('Langage table seeded!');
	}
}