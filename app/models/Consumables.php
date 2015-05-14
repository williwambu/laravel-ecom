<?php
/**
 * Created by PhpStorm.
 * User: William Muli
 * Date: 3/12/2015
 * Time: 3:22 PM
 */

class Consumables extends Eloquent {



    public function products(){
        return $this -> belongsToMany('Product');
    }

}