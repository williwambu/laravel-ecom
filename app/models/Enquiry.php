<?php
/**
 * Created by PhpStorm.
 * User: William Muli
 * Date: 3/12/2015
 * Time: 4:05 PM
 */

class Enquiry extends Eloquent {
    protected $table = 'enquiries';

    protected $fillable = ['machine_name','machine_model','consumable_name'];

    public $timestamps = false;
}