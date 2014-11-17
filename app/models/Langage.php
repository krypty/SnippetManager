<?php

class Langage extends Eloquent 
{

	protected $table = 'Langages';
	public $timestamps = true;

	public function getSnippets()
	{
		return $this->hasMany('Snippet', 'langage_id');
	}

}