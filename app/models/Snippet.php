<?php

class Snippet extends Eloquent {

	protected $table = 'Snippets';
	public $timestamps = true;

	public function getAuteur()
	{
		return $this->belongsTo('User', 'id');
	}

	public function getUsersLiked()
	{
		return $this->hasMany('User', 'snippetsLiked');
	}

	public function getLangage()
	{
		return $this->hasOne('Langage', 'snippet_id');
	}

}