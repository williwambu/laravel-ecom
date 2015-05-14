<?php

class HomeController extends BaseController {

	public function showIndex(){
		$products = Product::with('category','manufacturer')
            ->orderBy('created_at','asc')
            ->simplePaginate(6);
		$categories = Category::all();
		$manufacturers = Manufacturer::all();
		$models= DB::table('products')->groupBy('model')->get(['model']);
        $carousel_images = CarouselImage::all();
		return View::make('layouts.index')->with(['products'=>$products,'categories'=>$categories,'manufacturers'=>$manufacturers,'models'=>$models,'slides'=>$carousel_images]);
	}

	public function about(){
		return View::make('layouts.about');
	}

    public function knowBhm(){
        return View::make('layouts.know-bhm');
    }

	public function contact(){
		return View::make('layouts.contact');
	}

	public function faqs(){
		return "FAQs Placeholder";
	}

    public function contactUs(){
        $details = Input::all();
        $message = 'A visitor with the email '.Input::get('email').' said "'.Input::get('message').'"';

        mail('admin@localhost','VISITOR MESSAGE',$message);
    }

    public function enquire(){
        return View::make('layouts.enquire');
    }
}
