<?php
/**
 * Created by PhpStorm.
 * User: william muli
 * Date: 5/18/2015
 * Time: 10:39 AM
 */

class SMSTestingController extends BaseController {
    public function sendSMS(){
        $sender = new SendSMS();

        $sender -> sendText('Testing message','0700203130');

        return 'Done';
    }
}