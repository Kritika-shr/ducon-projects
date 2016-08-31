<?php
class Task{
	public function getPost(){
			
			$this->loc1 = $_POST['loc1'].',';
			$this->loc1 = $_POST['loc1'].',';
			$this->loc2 = $_POST['loc2'].',';
			$this->loc3 = $_POST['loc3'].',';
			$this->loc4 = $_POST['loc4'].',';

			$this->transport1 = $_POST['transport1'];
			$this->transport2 = $_POST['transport2'];
			$this->transport3 = $_POST['transport3'];
			$this->transport4 = $_POST['transport4'];


			$this->seat1 = $_POST['seat1'];
			$this->seat2 = $_POST['seat2'];
			$this->seat3 = $_POST['seat3'];
			$this->seat4 = $_POST['seat4'];

			$this->loc1 = array("location" => $this->loc1,"transport" => $this->transport1, "seat" => $this->seat1);
			$this->loc2 = array("location" => $this->loc2,"transport" => $this->transport2, "seat" => $this->seat2);
			$this->loc3 = array("location" => $this->loc3, "transport" => $this->transport3, "seat" => $this->seat3);
			$this->loc4 = array("location" => $this->loc4, "transport" => $this->transport4, "seat" => $this->seat4);
			
			$this->boarding_cards = array('loc1'=> $this->loc1,'loc2'=> $this->loc2, 'loc3' => $this->loc3, 'loc4' => $this->loc4);
			
			$this->logic();
	}//Get POST
	
	public function logic(){
		 	//Defining variable to be used
			$this->locations_all = '';
			$this->spep = [];
			$this->sequence = [];
			//All loction stored in single string to find Starting and End Point
			for($i = 1 ; $i <= count($this->boarding_cards) ; $i ++ ){
				$this->locations_all .= $this->boarding_cards['loc'.$i]['location'];
			}
			
			//Explode string to array for check
			$this->loc_array = explode(',', $this->locations_all);
			$this->find_start_point();
			

	}//Logic

	public function find_start_point(){
			//Find SP and EP
			foreach($this->loc_array as $this->loc){
				$count = substr_count($this->locations_all, $this->loc); 
				if($count == 1){
					array_push($this->spep,$this->loc);
				}
			}//loop
			
				//Get LOCATION if that is in first post then only assign it as Starting point
			for($i = 1 ; $i<=count($this->boarding_cards); $i++){
				foreach($this->spep as $sp){
				$count= substr_count($this->boarding_cards['loc'.$i]['location'], $sp);
				if($count > 0){
					$pos = strpos($this->boarding_cards['loc'.$i]['location'],$sp);
					
					if($pos == 0){
						$this->sp = $sp;
						
					}//pos
				  }//count
				}//for each
			}//for loop
			
			$this->find_next_card();
		}//function Find_start_point

		public function find_next_card(){
				//Now you got SP and EP Find Card For that 
				for($i = 0 ; $i<=5; $i++){
					if(array_key_exists('loc'.$i,$this->boarding_cards)){
						$count = substr_count($this->boarding_cards['loc'.$i]['location'], $this->sp);
						if($count > 0){
							print_r($this->boarding_cards['loc'.$i]);
							array_push($this->sequence, $this->boarding_cards['loc'.$i]	);
							$this->sp_loc = $this->boarding_cards['loc'.$i]['location'];
							$tmp = str_replace(',',"" ,$this->sp_loc);
							$next_loc = str_replace($this->sp ,"" ,$tmp);
							$sp=$next_loc;
							unset($this->boarding_cards['loc'.$i]);
							$i = 0;
					}
					}
					$this->display_message();
					
					
		    }	//for
		}//find next card
		
	public function display_message(){
		//Display message
		 echo "<pre>";
			print_r($this->sequence);
			echo "</pre>";
	     $i = 0 ;
		 foreach ($this->sequence as $s)
		{
			$i ++;
		    $a = explode(',', $s['location']);
		    echo $i.") Form ".$a[0] .' to '. $a[1]. ' by '. $s['transport']. ' Seat Number '. $s['seat'];
		    echo "<br><br\>";
		}

	}
						
}//Class Task
?>