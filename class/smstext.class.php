<?php 
// include 'includes/_config.php';
include 'Database.php';
/**
* 
*/

class smstext extends Database
{

	public $sent_sms_table = "sentsms";
	public $_limit = 5;
	public $_page = 1;
 

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


	/**
	 * getSentSms()
	 *
	 * Gets the sent sms. Not drafts
	 *
	 * @return (array) (data)
	 */
	public function getSentSms(){
		// $this->db();
		$table = $this->sent_sms_table;
		$res = $this->mysqli->query("SELECT * FROM $table WHERE draft=0");
        while ($row = $res->fetch_assoc()){
        	$data[] = array(
				'id' 		=>$row['id'] , 
				'phone' 	=>$row['phone'] , 
				'smstext' 	=>$row['smstext'] 
				);
        }

        return $data;
	}

	/**
	 * getSentSmsPagination()
	 *
	 * Gets the sent sms paginated. Not drafts
	 *
	 *	@param (int) ($start) 		record to start returning from
	 *	@param (int) ($per_page) 	records per page
	 *
	 * @return (array) (data)
	 */
	public function getSentSmsPagination($start,$per_page){
		$table = $this->sent_sms_table;
		$res = $this->mysqli->query("SELECT * FROM $table WHERE draft=0 LIMIT $start,$per_page");
		$data ="";
        while ($row = $res->fetch_assoc()){
        	$data[] = array(
				'id' 		=>$row['id'] , 
				'phone' 	=>$row['phone'] , 
				'smstext' 	=>$row['smstext'] 
				);
        }

        return $data;
	}


	public function delete($id){
		// sql to delete a record
		$table = $this->sent_sms_table;
		$sql = "DELETE FROM $table WHERE id='$id'";
		return $this->mysqli->query($sql);
	}

	// public function getSingle($id){
	// 	// $this->db();
	// 	$table = $this->sent_sms_table;
	// 	$res = $this->mysqli->query("SELECT * FROM $table WHERE id='$id'");
 //        while ($row = $res->fetch_assoc()){
 //        	$data= array(
	// 			'id' 		=>$row['id'] , 
	// 			'phone' 	=>$row['phone'] , 
	// 			'smstext' 	=>$row['smstext'] 
	// 			);
 //        }

 //        return $data;
	// } // end getSms()

	// insert into SMS table
	// the sent SMS
	public function create($recipient_phone,$text,$draft){
		// $this->db();

		$table = $this->sent_sms_table;
		$stmt = $this->mysqli->prepare("INSERT INTO $table(phone,smstext,draft) VALUES (?,?,?)");
		$stmt->bind_param('sss', $recipient_phone,$text,$draft);
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



	} // end sendSms()

	public function getLastId(){
		return $this->mysqli->insert_id;
	}

	/**
	 * update()
	 *
	 * update the sentsms table
	 *
	 * @param 	(int) 		(id) 			id to be updated
	 * @param 	(var_char) 	(recipients)	phone numbers of people
	 * @param 	(var_char) 	(message) 		text message sent / drafted
	 * @param 	(int) 		(is_draft) 		draft or not
	 * @return 	(string)
	 */
	public function update($id,$recipients,$message,$is_draft){
		$table = $this->sent_sms_table;
		$sql = "UPDATE $table SET phone='$recipients',smstext='$message', draft='$is_draft' WHERE id='$id'";
		// $result = $this->mysqli->query($sql);
		if ($this->mysqli->query($sql) === TRUE) {
		    return 1;
		} else {
		    return $this->mysqli->error;
		}

	}


	/**
	 * explodePostGetGroups()
	 *
	 * Get the groups and return the phone numbers associated with the group
	 * Also merge any phone numbers passed with the group
	 *
	 * @param 	(array) 	(post) 					array to be cleaned of phone numbers numbers
	 * @return 	(array)     ($contact_phones) 		conatining phone numbres
	 */
	public function explodePostGetGroups($post){
		// explode post
		$post = explode(',', $post);
		$contact_phones_1 = FALSE;
		
		foreach ($post as $key => $value) {
			// check if the string starts with +245
			// then get the phone numbers associated with that group
			if (substr( $value, 0, 4 ) != "+254"):
				// get the contact id associatied with the group name
				// this process will bring out duplicates becase many people can be in many groups
				$contacts_ids = $this->getGroupsByField('group_name',$value);
				
				// check if there are any contacts first
				if ($contacts_ids) :
					// get the contacts phone number from the personal table
					// by using the contacts id just gotten from the groups table
					foreach ($contacts_ids as $contacts_id) {

						// get the phone numbers from the contact table
						$phones = $this->getContactsByID($contacts_id['person_id']);
						$contact_phones[]= $phones['telp']; // no loop needed cause there is only one record gotten
					}
				endif;
			else:
				$contact_phones_1 [] = $value;
			endif;
		}

		// get rid of the dulicates
		// todo : find a way to remove this eariler on
		$contact_phones = array_unique($contact_phones);
		// merge the contacts form groups and contacts from field entry if any
		if ($contact_phones_1):
			$contact_phones = array_merge($contact_phones,$contact_phones_1);
		endif;

		return $contact_phones;

	} // end explodePostGetGroups()



















} // end class






 ?>