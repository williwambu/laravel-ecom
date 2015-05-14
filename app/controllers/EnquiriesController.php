<?php
/**
 * Created by PhpStorm.
 * User: William Muli
 * Date: 3/12/2015
 * Time: 4:11 PM
 */

class EnquiriesController extends BaseController {

    public function showEnquiries(){
        $enquiries = Enquiry::simplePaginate(10);
    }

    public function createEnquiry(){
        $enquiry = new Enquiry(Input::all());
        $enquiry -> save();
    }

    public function deleteEnquiry($id){
        $enquiry = Enquiry::find($id);

        $enquiry -> delete();

        return 'Enquiry Deleted';
    }
}