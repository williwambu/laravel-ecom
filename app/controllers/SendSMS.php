<?php
/**
 * Created by PhpStorm.
 * User: william muli
 * Date: 5/14/15
 * Time: 3:26 AM
 */

require_once('AfricasTalkingGateway.php');

class SendSMS {

// Specify your login credentials


    function sendSMS($message,$recipient){
        $username   = "MyAfricasTalkingUsername";
        $apikey     = "MyAfricasTalkingAPIKey";

        // Create a new instance of our awesome gateway class
        $gateway    = new AfricasTalkingGateway($username, $apikey);

        try
        {
            // Thats it, hit send and we'll take care of the rest.
            $results = $gateway->sendMessage($recipient, $message);
            foreach($results as $result) {
                // Note that only the Status "Success" means the message was sent
               // echo " Number: " .$result->number;
               // echo " Status: " .$result->status;
               // echo " MessageId: " .$result->messageId;
               // echo " Cost: "   .$result->cost."\n";

                //Log some information
                    Log::info("SMS : Message status".$result->status." Message id = ".$result->messageId);


            }
        }
        catch ( AfricasTalkingGatewayException $e )
        {
            Log::error("SMS : Encountered an error while sending: ".$e->getMessage());
        }
    }
} 