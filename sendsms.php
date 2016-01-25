<?php
// Be sure to include the file you've just downloaded
require_once('AfricasTalkingGateway.php');

// Specify your login credentials
$username   = "aflowf";
$apikey     = "b363386c84d13496370e9a4b8ba60d8daa98e4a6a41289d392e08b2ee7996f41";

// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$recipients = "+255674852612";
// $recipients = "+254725813847";

// And of course we want our recipients to know what we really do
// $message    = "I'm a lumberjack and its ok, I sleep all night and I work all day";
$message    = "Sema, huyu ni Amina. This is a test. Jibu kwa whatsapp kama umepata hii message.";

// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);

// Any gateway error will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block

try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);
			
  foreach($results as $result) {
    // status is either "Success" or "error message"
    echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId;
    echo " Cost: "   .$result->cost."\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}

// DONE!!! 
