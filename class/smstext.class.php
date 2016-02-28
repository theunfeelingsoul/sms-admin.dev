<?php 
// include 'includes/_config.php';
include 'Database.php';
/**
* 
*/

/**
* 
*/

class smstext extends Database
{

	public $sent_sms_table = "sentsms";
	public $labeltable = "labels";
	public $_limit = 5;
	public $_page = 1;

	//store the number of records
	public $total_sent;
	public $total_draft;
 
	function __construct()
	{	
		parent::__construct();

		// countr number of sent and draft SMSs
		$this->total_sent = $this->countSentSMS();   // total sent SMSs 
		$this->total_draft = $this->countDraftSMS();  
	}

	public function getSms()
	{
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
	 * @return (array or Boolean)  (data)  
	 */
	public function getSentSms()
	{
		// $this->db();
		$table = $this->sent_sms_table;
		$res = $this->mysqli->query("SELECT * FROM $table WHERE draft=0 ORDER BY id DESC");

		// check if there is data first
		if ($this->countSentSMS() > 0 ) {
			while ($row = $res->fetch_assoc()){
	        	$data[] = array(
					'id' 		=>$row['id'] , 
					'phone' 	=>$row['phone'] , 
					'smstext' 	=>$row['smstext'] 
					);
	        }
		}else{
			$data = FALSE;
		}
       

        return $data;
	}

	/**
	 * getDraftSms()
	 *
	 * Gets the draft sms.
	 *
	 * @return (array or Boolean) (data)
	 */
	public function getDraftSms()
	{
		// $this->db();
		$table = $this->sent_sms_table;
		$res = $this->mysqli->query("SELECT * FROM $table WHERE draft=1");

		// check if there is data first
		if ($this->countDraftSMS() > 0 ) {
			while ($row = $res->fetch_assoc()){
	        	$data[] = array(
					'id' 		=>$row['id'] , 
					'phone' 	=>$row['phone'] , 
					'smstext' 	=>$row['smstext'] 
					);
	        }
		}else{
			$data = FALSE;
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
	public function getSentSmsPagination($start,$per_page)
	{
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


	public function delete($id)
	{
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
	public function create($recipient_phone,$text,$draft)
	{
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

	public function sendSms($recipients,$message)
	{
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

	public function getLastId()
	{
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

	function getGroupIDByName($label_name){
		$table = $this->labeltable;
		$res = $this->mysqli->query("SELECT id FROM $table WHERE label_name='$label_name'");
        while ($row = $res->fetch_assoc()){
        	return $row['id'];
        }
	} // end getGroupnameByID()


	/**
	 * explodePostGetGroups()
	 *
	 * Get the groups and return the phone numbers associated with the group
	 * Also merge any phone numbers passed with the group
	 *
	 * @param 	(array) 	(post) 					array to be sorted, containing groups and individual numbers
	 * @return 	(array)     ($all_num) 				conatining final grouped numbers phone numbres
	 */
	public function explodePostGetGroups($post){
		// explode post
		$post = explode(',', $post);
		// initiate the variables to FALSE
		$i_num = FALSE; // individial phone numbers
		$g_num = FALSE; // grouped phone numebrs

		
		foreach ($post as $key => $value) {
			// check if its a  group i.e. doesnt start with +254
			// if group,  get the phone numbers associated with that group
			if (substr( $value, 0, 4 ) != "+254"):

				// get the group_name from the $value
				$label_id = $this->getGroupIDByName($value);
				// get the contact id associatied with the group name
				// this process will bring out duplicates becase many people can be in many groups
				$contacts_ids = $this->getGroupsByField('group_name',$label_id);
				
				// check if there are any contacts first
				if ($contacts_ids) :
					// get the contacts phone number from the personal table
					// by using the contacts id just gotten from the groups table
					foreach ($contacts_ids as $contacts_id) {

						// get the phone numbers from the contact table
						$phones = $this->getContactsByID($contacts_id['person_id']);
						$g_num[]= $phones['telp']; // no loop needed cause there is only one record gotten
					}
				else:
					$g_num = FALSE;
				endif;
			else:
				// add the individual numbers to this array
				$i_num [] = $value;
			endif;
		}



		// merge the contacts form groups and contacts from field entry if any
		// if both groups and intval(var)dividial numbers provided
		if ($g_num == TRUE && $i_num == TRUE):
			$all_num = array_merge($g_num,$i_num);
		// if only indovodual numbers provided
		elseif($g_num == FALSE && $i_num == TRUE):
			$all_num = array_unique($i_num);
		// if only groups provided
		elseif($g_num == TRUE && $i_num == FALSE):
			$all_num = array_unique($g_num);
		// if only groups provided
		elseif($g_num == FALSE && $i_num == FALSE):
			$all_num = FALSE;
		endif;

		
		return $all_num;

	} // end explodePostGetGroups()



















} // end class






 ?>