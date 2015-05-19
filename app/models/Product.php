<?php

class Product extends \Eloquent {
	protected $fillable = ['name','category_id','price','manufacturer_id','speed','model','picture'];


	public function features(){
		return $this -> belongsToMany('Feature');
	}

	public function orders(){
		return $this -> belongsToMany('Order');
	}

	public function manufacturer(){
		return $this -> belongsTo('Manufacturer');
	}

	public function category(){
		return $this ->belongsTo('Category');
	}

    public function consumables(){
        return $this -> hasMany('Consumable');
    }
}