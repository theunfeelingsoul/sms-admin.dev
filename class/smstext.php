<?php 
// include 'includes/_config.php';
include 'Database.php';
/**
* 
*/

class smstext extends Database
{

	public $sent_sms_table = "sentsms";
	public function getSms(){
		// $this->db();
		$table = $this->sent_sms_table;
		$res = $this->mysqli->query("SELECT * FROM $table");
        while ($row = $res->fetch_assoc()){
        	$data[] = array(
				'id' 		=>$row['id'] , 
				'phone' 	=>$row['phone'] , 
				'smstext' 	=>$row['smstext'] 
				);
        }

        return $data;
	} // end getSms()

	public function getSingle($id){
		// $this->db();
		$table = $this->sent_sms_table;
		$res = $this->mysqli->query("SELECT * FROM $table WHERE id='$id'");
        while ($row = $res->fetch_assoc()){
        	$data= array(
				'id' 		=>$row['id'] , 
				'phone' 	=>$row['phone'] , 
				'smstext' 	=>$row['smstext'] 
				);
        }

        return $data;
	} // end getSms()

	public function create($recipient_phone,$text){
		// $this->db();

		$table = $this->sent_sms_table;
		$stmt = $this->mysqli->prepare("INSERT INTO $table(phone,smstext) VALUES (?,?)");
		$stmt->bind_param('ss', $recipient_phone,$text);
		if($stmt->execute()){
			return 1;
		}else{
			return 0;
		}

	} // end create()

	public function sendSms($recipients,$message){
		// Be sure to include the file you've just downloaded
		require_once('AfricasTalkingGateway.php');

		// Specify your login credentials
		$username   = "aflowf";
		$apikey     = "b363386c84d13496370e9a4b8ba60d8daa98e4a6a41289d392e08b2ee7996f41";

		// $recipients = "+254725813847";
		// $recipients;

		// echo $message    = "This is a test. This is victor.";
		// $message;

		
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
		    // echo " Number: " .$result->number;
		    // echo " Status: " .$result->status;
		    // echo " MessageId: " .$result->messageId;
		    // echo " Cost: "   .$result->cost."\n";
		    return $result->status;
		  }
		}
		catch ( AfricasTalkingGatewayException $e )
		{
		  return  "Encountered an error while sending: ".$e->getMessage();
		}



	}




















} // end class






 ?>