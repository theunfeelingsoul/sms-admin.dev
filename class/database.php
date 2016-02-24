<?php 




/**
* 
*/
class Database
{
	public $mysqli;

	function __construct()
	{
		$this->mysqli = new mysqli("localhost", "root", "", "smsapp");
		if ($this->mysqli->connect_errno) {
		    echo "Failed to connect to MySQL: " . $this->mysqli->connect_error;
		}
	}

	public function countRows($query){
		$result = $this->mysqli->query($query);
		
		$row_count = $result->num_rows;

		return $row_count;
	}

	public function countSentSMS(){
		$query = "SELECT * FROM sentsms WHERE draft = 0";
		$result = $this->mysqli->query($query);
		$row_count = $result->num_rows;

		return $row_count;
	}


	public function countDraftSMS(){
		$query = "SELECT * FROM sentsms WHERE draft = 1";
		$result = $this->mysqli->query($query);
		$row_count = $result->num_rows;

		return $row_count;
	}

	public function getGroupsByField($field,$value){
		// $query = "SELECT DISTINCT id,person_id, group_name FROM people_group WHERE $field = '$value'";
		$query = "SELECT * FROM people_group WHERE $field = '$value'";
		$result = $this->mysqli->query($query);
		$data = FALSE;
		while ($row = $result->fetch_assoc()) {
			$data [] = array(
				'id' => $row['id'], 
				'person_id' => $row['person_id'], 
				'group_name' => $row['group_name'], 
			);
		}

		return $data;

	}

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



	public function getContactsByID($id){
		$query = "SELECT telp FROM personal WHERE id_personal = '$id'";
		$result = $this->mysqli->query($query);

		while ($row = $result->fetch_assoc()) {
			$data = array(
				'telp' =>$row['telp'] 
			);
		}

		return $data;
	} // end getContactsByField()







} // end class









 ?>