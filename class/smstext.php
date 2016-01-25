<?php 
// include 'includes/_config.php';
include 'Database.php';
/**
* 
*/

class smstext extends Database
{

	public function getSms(){
		// $this->db();

		$res = $this->mysqli->query("SELECT * FROM sms");
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

		$res = $this->mysqli->query("SELECT * FROM sms WHERE id='$id'");
        while ($row = $res->fetch_assoc()){
        	$data= array(
				'id' 		=>$row['id'] , 
				'phone' 	=>$row['phone'] , 
				'smstext' 	=>$row['smstext'] 
				);
        }

        return $data;
	} // end getSms()
}






 ?>