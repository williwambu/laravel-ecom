<?php
/**
 * Created by PhpStorm.
 * User: william muli
 * Date: 5/14/15
 * Time: 5:27 AM
 */

class CarouselImage extends Eloquent {
    protected $table = 'carousel';
    protected $fillable = ['id','path','name','caption'];
    public $timestamps = false;
} 