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
	// public $mysqli;
	// public function db(){
	// 	$this->mysqli = new mysqli("localhost", "root", "", "smsapp");
	// 	if ($this->mysqli->connect_errno) {
	// 	    echo "Failed to connect to MySQL: " . $this->mysqli->connect_error;
	// 	}
	// }
}








 ?>