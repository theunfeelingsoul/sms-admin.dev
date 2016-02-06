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
}








 ?>