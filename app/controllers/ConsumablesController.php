<?php

/**
 * Created by PhpStorm.
 * User: william muli
 * Date: 5/15/2015
 * Time: 11:37 AM
 */
class ConsumablesController extends BaseController
{
    public function showAll()
    {
        /*return View::make('layouts.consumables') -> with(
          array('consumables' => Consumable::all())
        );*/

        return Consumable::all();
    }
}