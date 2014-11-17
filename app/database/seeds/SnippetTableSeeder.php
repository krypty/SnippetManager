<?php

class SnippetTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('Snippets')->delete();

		// snippet1
		Snippet::create(array(
				'name' => Snip1,
				'code' => <?php echo coucou; ?>,
				'auteur_id' => 1,
				'usersLiked' => 2,
				'langage_id' => 1
			));
	}
}