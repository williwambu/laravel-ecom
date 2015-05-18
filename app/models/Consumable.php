<?php

/**
 * Created by PhpStorm.
 * User: William Muli
 * Date: 3/12/2015
 * Time: 3:22 PM
 */
class Consumable extends Eloquent
{

    protected $fillable = ['id', 'name', 'features','price', 'product_id','path'];
    public $timestamps = false;
    protected $table ='consumables';

    public function products()
    {
        return $this->belongsTo('Product');
    }

}