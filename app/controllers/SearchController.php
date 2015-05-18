<?php

/**
 * Created by PhpStorm.
 * User: William Muli
 * Date: 2/19/2015
 * Time: 9:35 AM
 */
class SearchController extends BaseController {
    /**
     * search algorithm
     */
    //search manufacturers -> then get products

    //search features -> then get associated products

    //search categories -> then return associated products

    //search products themselves ->return them

    //search consumables -> return consumables


    public function search() {
        $search_term1 = Input::get('search-term');
        $search_term = ("%" . $search_term1 . "%");
        $cat = $this->searchCategories($search_term);
        $man = $this->searchManufacturers($search_term);
        $feat = $this->searchFeatures($search_term);
        $prod = $this->searchProducts($search_term);

        $total_ids = array();
        if ($cat) {
           foreach($cat as $id){
               array_push($total_ids,$id);
           }
        }
        if ($man) {
            foreach($man as $id){
                array_push($total_ids,$id);
           }
        }
        if ($feat) {
            foreach($feat as $id){
                array_push($total_ids,$id);
           }
        }
        if ($prod) {
            foreach($prod as $id){
                array_push($total_ids,$id);
           }
        }

        $products = array();
       if(count($total_ids) != 0){

            foreach($total_ids as $id){
                $product = Product::find($id)->with('Features','Manufacturer') -> get();

                array_push($products,$product);
            }

           return View::make('layouts.search-results') -> with(array('products'=>$products,'search_term'=>$search_term1));
       }
        return View::make('layouts.search-results') -> with(array('products'=>$products,'search_term'=>$search_term1));
    }

    public function searchManufacturers($search_term) {
        //search manufacturers
        $manufacturer_ids = DB::select("SELECT id FROM manufacturers WHERE manufacturer_name LIKE ?", array($search_term));

        $products_array = array();

        if (count($manufacturer_ids) != 0) {
            foreach ($manufacturer_ids as $id) {
                $manufacturer = Manufacturer::find($id->id);

                $products = $manufacturer->products;

                if (count($products) != 0) {
                    foreach ($products as $product) {
                        array_push($products_array, $product->id);
                    }
                }
            }

            return $products_array;
        }

        return false;
    }

    public function searchFeatures($search_term) {
        $features_ids = DB::select("SELECT id FROM features WHERE feature LIKE ?", array($search_term));


        $products_array = array();

        if (count($features_ids) != 0) {
            foreach ($features_ids as $id) {
                $feature = Feature::find($id->id);

                $products = $feature->products;

                if (count($products) != 0) {
                    foreach ($products as $product) {
                        array_push($products_array, $product->id);
                    }
                }
            }

            return $products_array;
        }
        return false;
    }

    public function searchCategories($search_term) {
        $param_array = $this->paramArray(2, $search_term);

        $category_ids = DB::select('SELECT id FROM categories WHERE category_name LIKE ? OR description LIKE ?', $param_array);

        $products_ids = array();

        if (!empty($category_ids)) {
            foreach ($category_ids as $category_id) {
                $category = Category::find($category_id->id);

                $products = $category->products;

                if (!empty($products)) {
                    foreach ($products as $product) {
                        array_push($products_ids, $product->id);
                    }
                }
            }
            return $products_ids;
        }

        return false;
    }

    public function searchProducts($search_term) {
        $param_array = $this->paramArray(5, $search_term);
        $product_ids = DB::select('SELECT id FROM products WHERE name LIKE ? OR model LIKE ? OR series LIKE ? or color LIKE ? or speed LIKE ?', $param_array);
        if (!empty($product_ids)) {
            $products_array = array();
            foreach ($product_ids as $id) {

                array_push($products_array, $id->id);
            }

            return $products_array;
        }

        return false;
    }

    public function paramArray($n, $search_term) {
        $param_number = $n;
        $param_array = array();
        for ($i = 0; $i < $param_number; $i++) {
            array_push($param_array, $search_term);
        }

        return $param_array;
    }
}