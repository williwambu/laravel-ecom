<?php
/**
 * Created by PhpStorm.
 * User: William Muli
 * Date: 2/19/2015
 * Time: 9:35 AM
 */

class SearchController extends BaseController {

    public function search(){
        $search_term = Input::get('search-term');
        $fields = ['name','price'];
        $terms = explode(' ',$search_term);
        $results = array();

        foreach($terms as $term){
            foreach($fields as $field){
                $products  = Product::where('name','LIKE','%'.$term.'%')->get()->toArray();
                if(count($products) != 0){
                    foreach($products as $product){
                        array_push($results,$product);
                    }
                }


                $categories = Category::where('category_name','LIKE','%'.$term.'%')->get()->toArray();
                if(count($categories) != 0){
                    foreach($categories as $category){
                        $prods = Product::where('category_id','=',$category['id'])->get()->toArray();

                        if(count($prods) != 0){
                            foreach ($prods as $prod) {
                                array_push($results,$prod);
                            }
                        }
                    }
                }


                $manufacturers = Manufacturer::where('manufacturer_name','LIKE','%'.$term.'%')->get()->toArray();
                if(count($manufacturers != 0)){
                    foreach($manufacturers as $manufacturer){
                        $man_prods = Product::where('manufacturer_id','=',$manufacturer['id'])->get()->toArray();

                        if(count($man_prods) != 0){
                            foreach($man_prods as $man_prod){
                                array_push($results,$man_prod);
                            }
                        }
                    }
                }


            }


        }
        return $results;
    }

}