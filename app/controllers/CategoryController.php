<?php
/**
 * Created by PhpStorm.
 * User: William Muli
 * Date: 2/22/2015
 * Time: 10:26 PM
 */

class CategoryController extends BaseController{

    public function createCategory(){
        $rules = array(
            'category_name'=>'required',
            'description' => 'required',
            'manufacturers'=>'required'
        );
        $validator = Validator::make(Input::all(),$rules);
        if($validator->passes()){
            $category = new Category();
            $category -> category_name = Input::get('category_name');
            $category -> description = Input::get('description');
            $category -> save();
            $manufacturers = Input::get('manufacturers');

            foreach ($manufacturers as $manufacturer) {
                $category -> manufacturers() -> attach($manufacturer);
            }

            return 'category created';
        }

        return View::make('layouts.admin.create_category')->withErrors($validator);
    }
}