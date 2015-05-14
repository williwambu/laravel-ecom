<?php

class Feature extends \Eloquent {
	protected $fillable = [];

	public function products(){
		return $this -> belongsTo('Product');
	}
}