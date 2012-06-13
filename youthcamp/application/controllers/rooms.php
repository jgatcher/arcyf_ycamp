<?php 
	class Rooms extends CI_Controller {
		public function index (){
			
			$this->view("rooms");
		}

		public function view ($page = "admin", $extra = array()) {
			
			$data["title"] = $page;
			$data["page"] =  $page;
			$data["main_content"]  = 'admin/'.$page;
			$data = array_merge($data,$extra);
			//print_r($data);
			$this->load->view('templates/admin_template',$data);
		}

		public function getRoomsAsJson(){
			$this->load->library('mongo_db');
			$rooms =  $this->mongo_db->get("camper_rooms_view");
			usort($rooms, "Rooms::cmp");
			$response = array(
					"data" =>$rooms, 
					"total" =>count($rooms)  
			);

			echo json_encode($response);
			exit;
		}
		private function cmp($a, $b){
			return strcmp($a['camper'], $b['camper']);		
		}			
						
		public function assignRooms($type){
			$this->load->library('mongo_db');
			$this->mongo_db->doClear();
			$campers = $this->mongo_db->where(array("gender" =>  $type))->get("campers");
			$rooms =  $this->mongo_db->where(array("roomType" => $type))->get("camp_rooms");
		
			$lastIndex = -1;
			$done =  false;
			
			foreach ($rooms as $room) {
				//echo "ROOM" . "<br />";
				$numberInRoom = count($room["occupants"]);
				$numExpected = $room["expectedNumber"];
				$numberToAdd = $numExpected - $numberInRoom;
				$targetIndex = $numberToAdd + $lastIndex;
				$ids = array();
				$recs = array();
				for( $i = 0; $i < $numberToAdd ; $i++){
					
					$lastIndex++;
					
					if(isset($campers[$lastIndex])){
						$c = $campers[$lastIndex];
						if($c["role"]==="camper" || $c["role"] === "participant" && $c["lastName"] !== "Ayitevie"){
							
							//echo $lastIndex ." is ".$c["firstName"] . " ". $c["lastName"] . " is " . $c["role"];
							$r = array(
								"camper" => $c["firstName"] . " ". $c["lastName"],
								"id" => $c["_id"]->__toString(),
								"role" => $c["role"]
							);
							
							$recs[] = $r;	
						}else {
							//echo "<br />";
						 	//echo $lastIndex ." is ".$c["firstName"] . " ". $c["lastName"] . " is " . $c["role"];
						 	$i--;
						 }
					}
						
					else
						//$done =true;
						break;
				}

				$room["occupants"] = $recs;
				$roomId = $room["_id"];
				unset($room["_id"]);
				//print_r($room);
				//echo $room["_id"];
				$this->mongo_db->where(array( "_id"=> new MongoId($roomId) ))
				->update('camp_rooms', $room);
				//echo "<pre>";
				//print_r($recs);
				//echo "</pre>";
				//echo $lastIndex;
				
			}	

			return true;
		}
		public function createCamperRoomsView (){
			$this->load->library('mongo_db');
			$this->mongo_db->doClear();
			$rooms =  $this->mongo_db->get("camp_rooms");
			//print_r($rooms);
			$this->mongo_db->delete_all("camper_rooms_view");
			foreach ($rooms as $room) {
				//echo "CREATING" . "<br>";
				$data = array();
				$ocs = $room["occupants"];
				$name = $room["name"];
				foreach ($ocs as $occupant) {
					$rec = array(
						"camper" => $occupant["camper"],
						"roomType" => $room["roomType"],
						"room" => $name,
						"role" => $occupant["role"]
					);
					$this->mongo_db->insert("camper_rooms_view",$rec);	
				}
				
			}
		}

		public function processRooms(){
			//make two calls
			//1. assign rooms
			//2. build the view

			$response = array(
					"message" => "something went wrong",
					"success" => false
			);
			$this->load->library('mongo_db');
			Rooms::assignRooms("female");
			$this->mongo_db->doClear();
			Rooms::assignRooms("male");
			Rooms::createCamperRoomsView();

			$response = array(
				"message" => "done",
				"success" => true
			);
			

			echo json_encode($response);
		}

		
	}
?>