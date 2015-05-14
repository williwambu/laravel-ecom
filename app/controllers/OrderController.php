<?php
/**
 * Created by PhpStorm.
 * User: William Muli
 * Date: 2/18/2015
 * Time: 1:04 AM
 */

class OrderController extends BaseController {

    public function showOrderForm(){
        return View::make('layouts.order');
    }

    public function processOrder(){
        $data['first_name'] = Input::get('first_name');
        $data['last_name'] = Input::get('last_name');
        $data['phone'] = Input::get('phone');
        $data['email'] = Input::get('email');
        $data['address'] = Input::get('address');
        $data['total'] = Cart::total();
        $prdt_details = $this ->getCartDetails();
        $rules = array(
            'first_name'=>'required',
            'last_name' => 'required',
            'phone'=>'required',
            'email' => 'required',
            'address' => 'required',
            'total' =>'required'
        );

        $validator = Validator::make($data,$rules);

        if($validator -> passes()){
            $order = new Order($data);
            $order -> save();

            foreach($prdt_details as $detail){
                $order -> products()->attach($detail['id'],array('quantity'=>$detail['qty']));
            }
        }
        else{
            return $validator -> messages();
        }

        return View::make('layouts.shopping-complete');
    }

    public function getCartDetails(){
        $items = Cart::content();
        $details = array();

        foreach($items as $item){
            $prdt = array();
            $prdt['id']=$item->id;
            $prdt['qty']=$item->qty;
            array_push($details,$prdt);
        }

        return $details;
    }

    public function deleteOrder($order_id){
        $order = Order::find($order_id);
        $order -> delete();

        return Redirect::route('orders');
    }

    function sendSMS($message){

    }
}