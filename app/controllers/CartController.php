<?php
/**
 * Created by PhpStorm.
 * User: William Muli
 * Date: 2/17/2015
 * Time: 7:47 PM
 */

class CartController extends BaseController {
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
        $product = Product::find($id);
        $qty = 1;
        if(Cart::get($id)){
            return 'Item already in the cart.';
        }
        else{
            Cart::add($product->id,$product->name,$qty,$product->price);
            return $product->name.' added to cart';
        }
    }
    /*
     * remove an item from the cart
     */
    public function removeItem($row_id){
        Cart::remove($row_id);
        return Redirect::route('cart');
    }
    /*
     * update a row in the cart
     */
    public function updateRow(){
        $row_id = Input::get('row_id');
        $qty = Input::get('qty');
        Cart::update($row_id,array('qty'=>$qty));
        return Redirect::route('cart');
    }

    /*
     * return a summary of the cart
     * use in layouts.master,request made via ajax
     */
    public function cartSummary(){
        $data = ["items"=>Cart::count(),"total" => Cart::total()];
        return $data;
    }
}