<?php
/**
 * Created by PhpStorm.
 * User: William Muli
 * Date: 2/22/2015
 * Time: 12:12 PM
 */

class AdminNavController extends BaseController {

    public function createCategory(){
        return View::make('layouts.admin.create_category')->with(array('manufacturers'=>Manufacturer::all()));
    }

    public function createProduct(){
        $manufacturers = Manufacturer::all();
        $categories = Category::all();
        return View::make('layouts.admin.try-desc') -> with(
            array('manufacturers'=>$manufacturers,
                   'categories' => $categories
                 )
            );
    }

    public function showOrders(){
        $orders = Order::with('products')
                    ->orderBy('created_at')
                    ->simplePaginate(15);
        return View::make('layouts.admin.orders') -> with(array('orders'=>$orders));
    }

    public function deleteProduct(){
        return View::make('layouts.admin.delete_product');
    }
}