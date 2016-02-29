<?php 
include 'Database.php';


/**
* 
*/
class Contacts extends Database
{
	
	public function Create(){
		
	}

	/**
	 * checkFormat()
	 *
	 * checks if num starts with +254
	 * If not it will add it.
	 *
	 * @param 	(int) 		(tel) 			tel number to be checked
	 * @return 	(string)
	 */
	public function checkFormat($tel){
		// if it dosent start with +254
		if (substr( $tel, 0, 4 ) != "+254"):
			// check if the first number is a 0
			if (substr( $value, 0 ) != "0"):

			endif

		endif;

		return $tel;
	}
	
}











 ?>