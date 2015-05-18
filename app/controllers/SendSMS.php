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


    public function sendText($message,$recipient){
        $username   = "muliswilliam";
        $apikey     = "a5caa1d295e85f4e7e71eb7c6033ae63aa23955f7c2efb27615837e46870b5fb";

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