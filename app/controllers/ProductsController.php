<?php

/**
 * Created by PhpStorm.
 * User: William Muli
 * Date: 2/13/2015
 * Time: 1:36 AM
 */
class ProductsController extends BaseController
{

    public function filterPhotocopiers()
    {
        $manufacturer_id = Input::get('manufacturer');
        $color = Input::get('color');
        $speed = Input::get('speed');
        // Input::create('*','POST',['manufacturer'=>$manufacturer_id]);
        if ($manufacturer_id == 'all' | $speed == 'all') {
            $products = Product::whereRaw('color=?',
                array($color))
                ->with('category', 'manufacturer', 'features')
                ->simplePaginate(9);
        } else {
            $products = Product::whereRaw('manufacturer_id=? and color=? and speed=?',
                array($manufacturer_id, $color, $speed))
                ->with('category', 'manufacturer', 'features')
                ->simplePaginate(9);
        }
        return View::make('layouts.product')->with('products', $products);
    }

    public function filterCatridges()
    {
        //reference the category id of Catridges
        $category_id = Category::where('category_name', '=', 'Catridges')->get(array('id'));
        $manufacturer = Input::get('manufacturer');
        $series = Input::get('series');
        $model = Input::get('model');
        if ($manufacturer == 'all') {
            $products = Product::whereRaw('category_id =? and series= ? and model = ?',
                array($category_id, $manufacturer, $series, $model))
                ->with('category', 'manufacturer', 'features')
                ->simplePaginate(9);
        } else {
            $products = Product::whereRaw('category_id =? and manufacturer_id=? and series= ? and model = ?',
                array($category_id, $manufacturer, $series, $model))
                ->with('category', 'manufacturer', 'features')
                ->simplePaginate(9);
        }
        return View::make('layouts.product')->with('products', $products);
    }

    public function getUniqueModels()
    {
        return $models = DB::select('SELECT DISTINCT model from products ORDER BY model');
    }

    /**
     * get series given a manufacturer
     */
    public function getUniqueSeries()
    {
        $category_id = Category::where('category_name', '=', 'Catridges')->get(array('id'));
        $manufacturer_id = Input::get('manufacturer');
        $series = DB::select(
            'SELECT DISTINCT series from products WHERE manufacturer_id=? and category_id=? ORDER BY series',
            [$manufacturer_id, $category_id[0]->id]);
        return $series;
    }

    public function getModels()
    {
        $manufacturer = Input::get('manufacturer');

    }

    public function createProduct()
    {


        $rules = array(
            'name' => 'required',
            'price' => 'required|numeric',
            'picture' => 'required',
            'features' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            $product = new Product(Input::all());

            if (Input::hasFile('picture')) {
                $destination_path = 'pictures/';
                Input::file('picture')->move($destination_path, Input::file('picture')->getClientOriginalName());

                $product->picture = $destination_path . Input::file('picture')->getClientOriginalName();

            }
            $product->save();

            $features = Input::get('features');

            foreach ($features as $feat) {
                $feature = new Feature();
                $feature->feature = $feat;
                $feature->save();

                $product->features()->attach($feature->id);
            }

            return View::make('layouts.admin.success')->with(['message' => 'Product created...']);
        }

        return Redirect::to(route('create_product'))->withErrors($validator)->withInput(Input::except('picture'));
    }

    public function deleteProduct()
    {
        $product = Product::find(Input::get('id'));
        $product->delete();

        //redirect back to all products table
        return Redirect::route('all_products')->with('message', 'Product deleted.');
    }

    public function showAll()
    {
        $products = Product::with('category', 'manufacturer')
            ->orderBy('created_at')
            ->simplePaginate(15);
        return View::make('layouts.admin.products_view')->with(['products' => $products]);
    }

    public function editProduct()
    {
        $product = Product::with('category', 'features', 'manufacturer')->where('id', '=', Input::get('id'))->first();
        return View::make('layouts.admin.edit_product')->with(
            array('categories' => Category::all(),
                'manufacturers' => Manufacturer::all(),
                'product' => $product,
                'message' =>''
            ));
    }

    public function updateProduct()
    {
        $product = Product::find(Input::get('id'));

        $product->name = Input::get('name');
        $product->price = Input::get('price');
        $product->speed = Input::get('speed');
        $product->color = Input::get('color');
        $product->series = Input::get('series');

        // remove the existing product-manufacturer r/ship
        $product->category()->dissociate();
        //attach a new r/ship
        $product->category()->associate(Category::find(Input::get('category_id')));

        $product->manufacturer()->dissociate();
        $product->manufacturer()->associate(Manufacturer::find(Input::get('manufacturer_id')));

        $features = $product->features;
        foreach ($features as $feature) {
            $product->features()->detach($feature->id);
            $feature->delete($feature->id);
        }

        $new_features = Input::get('features');
        foreach ($new_features as $new_feature) {
            $feat = new Feature();
            $feat->feature = $new_feature;
            $feat->save();
            $product->features()->attach($feat->id);
        }

        if (Input::hasFile('picture')) {
            $destination_path = 'pictures/';
            Input::file('picture')->move($destination_path, Input::file('picture')->getClientOriginalName());

            $product->picture = $destination_path . Input::file('picture')->getClientOriginalName();
        }
        $product->save();

        //return "Product updated....";
        $product = Product::with('category', 'features', 'manufacturer')->where('id', '=', Input::get('id'))->first();
        return View::make('layouts.admin.edit_product')->with(
            array('categories' => Category::all(),
                'manufacturers' => Manufacturer::all(),
                'product' => $product,
                'message' =>'Product updated successfully....'
            ));
    }
}