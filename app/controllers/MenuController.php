<?php
/**
 * Created by PhpStorm.
 * User: William Muli
 * Date: 2/15/2015
 * Time: 7:33 PM
 */

class MenuController extends BaseController {
    public function showCategory($cat_id){
        $category = Category::find($cat_id);
        $products = Product::where('category_id','=',$cat_id)
            ->with('category','manufacturer','features')
            ->orderBy('created_at')
            ->simplePaginate(9);

        return View::make('layouts.category')->with(array('products'=>$products,'category'=>$category));
    }

    public function showManufacturer($man_id){
        $products = Product::where('manufacturer_id','=',$man_id)
            ->with('category','manufacturer','features')
            ->orderBy('created_at')
            ->simplePaginate(9);

        return View::make('layouts.product')->with('products',$products);
    }

    public function showProducts(){
        $products = Product::with('category','manufacturer','features')
            ->orderBy('created_at')
            ->simplePaginate(9);

        return View::make('layouts.product')->with('products',$products);
    }
}
