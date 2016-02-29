<?php 

include 'database.php';

/**
* 
*/
class Group extends Database
{

	public $tablename = "labels";
	public $peoplegrouptable = "people_group";
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	public function create($label_name){
		$table = $this->tablename;
		$stmt = $this->mysqli->prepare("INSERT INTO $table(label_name) VALUES (?)");
		$stmt->bind_param('s', $label_name);
		if($stmt->execute()){
			return 1;
		}else{
			return 0;
		}

	} // end create()


	public function view(){
		// $this->db();
		$table = $this->tablename;
		$res = $this->mysqli->query("SELECT * FROM $table");

		// check if there is data first
		if ($this->countSentSMS() > 0 ) {
			while ($row = $res->fetch_assoc()){
	        	$data[] = array(
					'id' 		=>$row['id'] , 
					'label_name' 	=>$row['label_name']
					);
	        }
		}else{
			$data = FALSE;
		}
       

        return $data;
	}

	/**
	 * update()
	 *
	 * update the sentsms table
	 *
	 * @param 	(int) 		(id) 			id to be updated
	 * @param 	(var_char) 	(label_name)	group name
	 * @return 	(string)
	 */
	public function update($id,$label_name){
		$table = $this->tablename;
		$sql = "UPDATE $table SET label_name='$label_name' WHERE id='$id'";
		if ($this->mysqli->query($sql) === TRUE) {
		    return 1;
		} else {
		    return $this->mysqli->error;
		}

	}

	public function Single($id){
		// $this->db();
		$table = $this->tablename;
		$res = $this->mysqli->query("SELECT * FROM $table WHERE id ='$id'");
        while ($row = $res->fetch_assoc()){
        	$data= array(
				'id' 		=>$row['id'] , 
				'label_name' 	=>$row['label_name']
				);
        }

        return $data;
	} // end getContactsByField()

	/**
	 * delete()
	 *
	 * update the sentsms table
	 *
	 * @param 	(int) 		(id) 			id to be deleted
	 * @param 	(var_char) 	(label_name)	group name
	 * @return 	(string)
	 */
	public function delete($id){
		// sql to delete a record from label table
		$table = $this->tablename;
		$sql = "DELETE FROM $table WHERE id='$id'";
		$this->mysqli->query($sql);

		if($this->mysqli->affected_rows == 1){
			// also delete the records in people group

			$table = $this->peoplegrouptable;
			$sql = "DELETE FROM $table WHERE group_name ='$id'";
			$this->mysqli->query($sql);
			
			if($this->mysqli->affected_rows > 1){
				echo "yes";
			}else{
	          echo "no";
			}
	     }
	} // end delete


} // end class


 ?>