<?php

/**
 * Created by PhpStorm.
 * User: william muli
 * Date: 5/15/2015
 * Time: 11:37 AM
 */
class ConsumablesController extends BaseController {
    public function showAll() {
        return View::make('layouts.consumables')->with(
            array('consumables' => Consumable::simplePaginate(15))
        );

        //return Consumable::all();
    }

    public function addConsumableView() {
        return View::make('layouts.admin.add-consumable')->with(['id' => Input::get('id')]);
    }

    public function addConsumable() {
        $consumable = new Consumable();
        $consumable->product_id = Input::get('id');
        $consumable->name = Input::get('name');
        $consumable->price = Input::get('price');
        $consumable->features = Input::get('features');

        $picture = Input::file('picture');
        $picture->move('public/consumables', $picture->getClientOriginalName());

        $consumable->path = 'consumables/' . $picture->getClientOriginalName();
        $consumable->save();

        return REdirect::route('admin-show-all');
    }

    public function adminShowAll() {
        $consumables = Consumable::simplePaginate(15);
        return View::make('layouts.admin.consumables')->with(['consumables' => $consumables]);
    }

    public function editConsumable() {
        $consumable = Consumable::find(Input::get('id'));
        return View::make('layouts.admin.edit-consumable')->with(array('message' => '', 'consumable' => $consumable, 'id' => Input::get('id')));
    }

    public function updateConsumable() {
        $consumable = Consumable::find(Input::get('id'));

        $consumable->features = Input::get('features');
        $consumable->price = Input::get('price');
        $consumable->name = Input::get('name');

        if (Input::file('picture') != '') {

            $picture = Input::file('picture');
            $picture->move('public/consumables', $picture->getClientOriginalName());

            $consumable->path = 'consumables/' . $picture->getClientOriginalName();
        }

        $consumable->save();
        return Redirect::route('admin-show-all');
    }

    public function deleteConsumable() {
        $consumable = Consumble::find(Input::get('id'));

        $consumable->delete();

        return Redirect::route('admin-show-all');
    }
}