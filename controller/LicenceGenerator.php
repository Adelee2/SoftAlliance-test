<?php
	
	/**
	 * 
	 */
	class LicenceGenerator{
	
		public function __construct(){
			session_start();
			// echo $_SESSION['counter']."<br>";
		}
		public function destroy_session(){
			session_destroy();
		}
		public function generatenumber($input,$platenum){
			for ($i=0; $i <intval($platenum) ; $i++) {
				// echo $this->gennumber().", ";
				$result[] = $input.$this->gennumber().$this->genletter();
			}

			for ($j=0; $j <count($result) ; $j++) { 
				if(strlen($result[$j]) == 7 ){
					$result[$j] = substr($result[$j], 0, 3) . "0" . substr($result[$j], 3, strlen($result[$j]));
				}
				elseif (strlen($result[$j]) == 6 ) {
					$result[$j] = substr($result[$j], 0, 3) . "00" . substr($result[$j], 3, strlen($result[$j]) );
				}
			}

			return $result;
		}

		// private function inputabrv($input){
		// 	$newinput = substr($input, 0,3);
		// 	$newinput = strtoupper($newinput);

		// 	return $newinput;
		// }
		private function gennumber(){
			// echo "counter is ".$this->counter."<br>";
			$intnumber = 0;
			if(isset($_SESSION['counter'])){
				if(intval($_SESSION['counter']) <= 999){
					$intnumber = $_SESSION['counter'];
					$intnumber = intval($intnumber);

					 $_SESSION['counter'] = $intnumber+ 1;
				}
				else{
					$_SESSION['counter'] =1;
				}
			}
			else{
				echo "session not set!!";
			}

			return $_SESSION['counter'];
		}

		private function genletter(){
			if($_SESSION['alphacounter1']==90 && $_SESSION['alphacounter2']==90){
				$_SESSION['alphacounter1']=65;
				$_SESSION['alphacounter2']=65;
			}
			if($_SESSION['alphacounter2']<=90){
				$letter=chr($_SESSION['alphacounter1']).chr($_SESSION['alphacounter2'] +=1);
				// $count++;
			}
			else{
				$_SESSION['alphacounter1'] = $_SESSION['alphacounter1'] + 1;
				$_SESSION['alphacounter2']=65;

				$letter=chr($_SESSION['alphacounter1']).chr($_SESSION['alphacounter2']);
			}
			
			return $letter;
		}
	}

?>