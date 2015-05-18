<?php
/**
 * Created by PhpStorm.
 * User: william muli
 * Date: 5/15/2015
 * Time: 1:17 PM
 *
 * Controller for consumables
 */

class ConsCartController extends BaseController{
    /*
    * show the cart
    */
    public function showCart(){
        return View::make('layouts.cart');
    }
    /*
     * add an item to cart
     */
    public function addToCart($id){
        $consumable = Consumable::find($id);
        $qty = 1;
        if(Cart::get($id)){
            return 'Item already in the cart.';
        }
        else{
            Cart::add($consumable->id,$consumable->name,$qty,$consumable->price);
            return $consumable->name.' added to cart';
        }
    }

}