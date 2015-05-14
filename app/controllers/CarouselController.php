<?php
/**
 * Created by PhpStorm.
 * User: william muli
 * Date: 5/14/15
 * Time: 5:19 AM
 */

class CarouselController extends BaseController {
    public function edit(){
        $slides = CarouselImage::all();
        return View::make('layouts.admin.carousel-editor')->with(array('slides'=>$slides));
    }

    public function addImage(){
        $file = Input::file('image');
        $caption = Input::get('caption');
        $folder = 'public/carousel-images/';
        $name = $file -> getClientOriginalName();
        $file->move($folder,$name);

        $path = 'carousel-images/'.$name;

        $carousel_image = new CarouselImage();

        $carousel_image -> path = $path;
        $carousel_image -> name = $name;
        $carousel_image -> caption = $caption;

        $carousel_image -> save();

        return Redirect::route('edit-carousel');
    }

    public function removeImage($id){
       // $image_id = Input::get('id');

        $carousel_image = CarouselImage::find($id);

        $carousel_image -> delete();

        //Delete the image
        $path = public_path().'/'.$carousel_image->name;
        if(file_exists($path)){
            File::delete($path);
        }

        return Redirect::route('edit-carousel');
    }

    public function slider(){

    }
} 