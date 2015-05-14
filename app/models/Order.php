<?php

class Order extends \Eloquent {

	protected $fillable = ['id','email','phone','address','total','first_name','last_name'];

    public function products(){
        return $this -> belongsToMany('Product');
    }
}