<?php
/*
 * main application Routes
 */

Route::get('/', array('uses' => 'HomeController@showIndex', 'as' => 'home'));

Route::get('products', array('uses' => 'MenuController@showProducts', 'as' => 'products'));

Route::get('products/categories/{category_id}', array('uses' => 'MenuController@showCategory', 'as' => 'category'));

Route::get('products/manufacturers/{manufacturer_id}', array('uses' => 'MenuController@showManufacturer', 'as' => 'manufacturer'));

Route::get('about', array('uses' => 'HomeController@about', 'as' => 'about'));

Route::get('know-bhm', array('uses' => 'HomeController@knowBhm', 'as' => 'know-bhm'));

Route::get('contact-us', array('uses' => 'HomeController@contact', 'as' => 'contact-us'));

Route::get('faqs', array('uses' => 'HomeController@faqs', 'as' => 'faqs'));

Route::any('photocopiers/filter', array('uses' => 'ProductsController@filterPhotocopiers', 'as' => 'filterPhotocopiers'));

Route::any('catridges/filter', array('uses' => 'ProductsController@filterCatridges', 'as' => 'filterCatridges'));

Route::get('shopping-cart', array('uses' => 'CartController@showCart', 'as' => 'cart'));

Route::get('remove-item/{row_id}', array('uses' => 'CartController@removeItem', 'as' => 'remove-item'));

Route::post('update-row', array('uses' => 'CartController@updateRow', 'as' => 'update-row'));

Route::any('product/{id}/addToCart', array('uses' => 'CartController@addToCart', 'as' => 'addToCart'));

Route::get('cart-summary', array('uses' => 'CartController@cartSummary', 'as' => 'cart-summary'));

Route::get('order', array('uses' => 'OrderController@showOrderForm', 'as' => 'order'));

Route::post('complete', array('uses' => 'OrderController@processOrder', 'as' => 'submit-order'));

Route::get('admin', array('uses' => 'AdminController@adminLogin', 'as' => 'admin'));

Route::post('post-contact', array('uses' => 'HomeController@contactUs', 'as' => 'post-contact-us'));

Route::get('enquire', array('uses' => 'HomeController@enquire', 'as' => 'enquire'));

Route::post('submit-enquiry', array('uses' => 'EnquiriesController@createEnquiry', 'as' => 'submit-enquiry'));

Route::post('search', array('uses' => 'SearchController@search', 'as' => 'search'));

Route::get('products/{id}/consumables', array('uses' => 'ProductsController@getConsumables', 'as' => 'get-consumable'));

Route::get('consumables/all', array('uses' => 'ConsumablesController@showAll', 'as' => 'consumables-all'));

Route::get('products/{id}/consumables',array('uses'=>'ConsumablesController@showCons','as'=>'product-cons'));

/**
 * Consumables cart routes
 */
Route::any('consumables/{id}/addToCart', array('uses' => 'ConsCartController@addToCart', 'as' => 'cons-add-to-cart'));

/**
 * Consumables admin panel
 */
Route::get('admin/consumables', array('uses' => 'ConsumablesController@adminShowAll', 'as' => 'admin-show-all'));

/*
 * admin routes
 */
Route::post('admin/panel', array('uses' => 'AdminController@login', 'as' => 'login'));

Route::get('admin/logout', array('uses' => 'AdminController@logout', 'as' => 'logout'));

Route::get('admin/category/new', array('before' => 'auth', 'uses' => 'AdminNavController@createCategory', 'as' => 'create_category'));

Route::post('admin/category/new', array('before' => 'auth', 'uses' => 'CategoryController@createCategory', 'as' => 'post_create_category'));

Route::get('admin/product/new', array('before' => 'auth', 'uses' => 'AdminNavController@createProduct', 'as' => 'create_product'));

Route::get('admin/products/all', array('before' => 'auth', 'uses' => 'ProductsController@showAll', 'as' => 'all_products'));

Route::post('admin/product/new', array('before' => 'auth', 'uses' => 'ProductsController@createProduct', 'as' => 'post_create_product'));

Route::get('edit-product', array('before' => 'auth', 'uses' => 'ProductsController@editProduct', 'as' => 'edit-product'));

Route::post('update-product', array('before' => 'auth', 'uses' => 'ProductsController@updateProduct', 'as' => 'update-product'));

Route::get('admin/orders/all', array('before' => 'auth', 'uses' => 'AdminNavController@showOrders', 'as' => 'orders'));

Route::get('admin/products/delete/{id}', array('before' => 'auth', 'uses' => 'ProductsController@deleteProduct', 'as' => 'delete-product'));

Route::get('admin/orders/delete/{order_id}', array('before' => 'auth', 'uses' => 'OrderController@deleteOrder', 'as' => 'delete-order'));

Route::get('admin/carousel-editor', array('before' => 'auth', 'uses' => 'CarouselController@edit', 'as' => 'edit-carousel'));

Route::post('admin/carousel/add-image', array('before' => 'auth', 'uses' => 'CarouselController@addImage', 'as' => 'add-image'));

Route::get('admin/carousel/delete-image/{id}', array('before' => 'auth', 'uses' => 'CarouselController@removeImage', 'as' => 'delete-image'));

Route::get('consumables/new', array('before' => 'auth', 'uses' => 'ConsumablesController@addConsumableView', 'as' => 'add-consumable-view'));

Route::post('consumables/new', array('before' => 'auth', 'uses' => 'ConsumablesController@addConsumable', 'as' => 'add-consumable'));

Route::post('admin/edit-consumable', array('before' => 'auth', 'uses' => 'ConsumablesController@editConsumable', 'as' => 'edit-consumable'));

Route::post('update-consumable', array('before' => 'auth', 'uses' => 'ConsumablesController@updateConsumable', 'as' => 'update-consumable'));

Route::post('consumables/delete',array('before'=>'auth','uses'=>'ConsumablesController@deleteConsumable','as'=>'delete-consumable'));
/*
 * layout.master composer
 */
View::composer('*', function ($view) {
    $categories = Category::all();
    $manufacturers = Manufacturer::all();
    $models = DB::table('products')->groupBy('model')->get(['model']);
    $menu_data = Category::with('manufacturers')->get();
    $cart_content = Cart::content();
    $cart_total = Cart::total();
    $cart_count = Cart::count();

    $view->with(
        [
            'menu_data' => $menu_data,
            'categories' => $categories,
            'manufacturers' => $manufacturers,
            'models' => $models,
            'cart_total' => $cart_total,
            'cart_count' => $cart_count,
            'cart_content' => $cart_content
        ]);
});

Route::get('orders/{order_id}', function ($order_id) {
    $order = Order::find($order_id)->with('Products')->get();
    return $order;
});

Route::get('product/{product_id}/orders', function ($id) {
    $prdt = Product::find($id)->with('orders')->get();
    return $prdt;
});
Route::get('admin/create/new', function () {
    $userCtrl = new AdminController();
    $userCtrl->createAdmin('admin', 'password');
});

Route::get('admin/delete/{id}', function ($id) {
    $adminCtrl = new AdminController();

    $adminCtrl->deleteAdmin($id);
});


Route::get('test',array('uses'=>'SMSTestingController@sendSMS','as'=>'send-sms'));