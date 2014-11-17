<?php

class LangageTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('Langages')->delete();

		// langage1
		Langage::create(array(
				'name' => Java,
				'syntaxColorCode' => 42,
				'snippet_id' => 1
			));
	}
}