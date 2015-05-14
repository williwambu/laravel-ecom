<?php

class Manufacturer extends \Eloquent {
	protected $fillable = ['manufacturer_name'];
	protected $table = 'manufacturers';

	public function products(){
		return $this -> hasMany('Product');
	}

	public function category(){
		return $this -> hasMany('Category');
	}
}