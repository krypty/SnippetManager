<?php

class Langage extends Eloquent 
{

	protected $table = 'langages';
	public $timestamps = true;

	public function getSnippets()
	{
		return $this->hasMany('Snippet', 'langage_id');
	}

}