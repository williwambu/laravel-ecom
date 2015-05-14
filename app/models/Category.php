<?php

class Category extends \Eloquent {
	protected $fillable = ['category_name','description'];
	protected $table = 'categories';

	public function products(){
		return $this -> hasMany('Product');
	}

	public function manufacturers(){
		return $this -> belongsToMany('Manufacturer');
	}
}