<?php
	
class AdeleyeMySql
{
		
	private $dbconnection;

	//makes it easy for anything to connect to different database
	public function connections($Host,$User,$Password,$Name){
	  	$this->dbconnection = mysqli_connect($Host,$User,$Password,$Name);
	  	if(!$this->dbconnection){
			// return "connection failed";
			return false;
	 	}
	 	return true;
	  	// echo "string";
	  }

	  public function connect(){
		return $this->dbconnection;
	}
	// function AdeleyeMySql($connect){
	// 	$this->dbconnection = $connect;
	// }

	public  function connectDB($query){
			$checker = substr($query, 0, 6);
			$checker = strtolower($checker);
			switch ($checker) {
				case 'insert':
					$myquery = mysqli_query($this->dbconnection,$query);

					if($myquery){
						// echo " true occured here";
						return true;
					}
					else{
						// echo " false error occured here";
						// print_r($myquery);
						return false;
						
					}
					break;
				case 'delete':
					$myquery = mysqli_query($this->dbconnection,$query);

					if($myquery){
						return true;
					}
					else{
						return false;
					}
					break;
				case 'select':
					$myquery = mysqli_query($this->dbconnection,$query);
					// print_r(mysqli_fetch_array($myquery));
					return mysqli_fetch_array($myquery);
					break;
				case 'update':
					$myquery = mysqli_query($this->dbconnection,$query);

					if($myquery){
						return true;
					}
					else{
						// echo mysqli_error();
						return false;
					}
					break;
				default:
					return "not a mysql query";
					break;
			}
		}
	public function hashed_password($oldpassword){
		$newpassword = password_hash($oldpassword, PASSWORD_DEFAULT);

		return $newpassword;
	}
	//Get the largest value in an array
	public function get_max($start,$arr_column){
		$count=0;

		for($i=$start;$i<count($arr_column);$i++){
			if($arr_column[$i]>$count){
				$count = $arr_column[$i];
			}
		}

		return $count;
	}
	public function get_num_rows($query){
		$myquery = mysqli_query($this->dbconnection,$query);
		$rowcount=mysqli_num_rows($myquery);
		// print_r($rowcount);
		return $rowcount;
	}	

}

?>