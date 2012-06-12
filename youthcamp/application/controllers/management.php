<?php 
	class Management extends CI_Controller {
		
		public function index (){
			$campers = $this->getData();
			$this->view("management", $campers);
		}

		public function view ($page = "admin", $extra = array()) {
			
			$data["title"] = $page;
			$data["page"] =  $page;
			$data["main_content"]  = 'admin/'.$page;
			$data = array_merge($data,$extra);
			//print_r($data);
			$this->load->view('templates/admin_template',$data);
		}

		public function getData($page=-1, $start=-1, $limit=-1 ){

			$this->load->library('mongo_db');
			
			$num_campers_registered = $this->mongo_db->where(array(
				"has_registered" => true
			))->count("campers");

			$num_campers_signedup =  $this->mongo_db->where(array(
				"has_registered" => false
			))->count("campers");

			//
			if($start != -1){
				$take = $limit;
				$startFrom = $start;
				$campers_registered = $this->mongo_db->offset($startFrom)->limit($take)->where(array(
					"has_registered" => true
				))->get("campers");

				$campers_signedup = $this->mongo_db->where(array(
					"has_registered" => false
				))->get("campers");
			}else {
				$campers_registered = $this->mongo_db->where(array(
					"has_registered" => true
				))->get("campers");

				$campers_signedup = $this->mongo_db->where(array(
					"has_registered" => false
				))->get("campers");
			}
			
			
			$campers = array();
			$campers["num_campers_signedup"] = $num_campers_signedup;
			$campers["num_campers_registered"] = $num_campers_registered;
			$campers["campers_signedup"] = $campers_signedup;
			
			


			$campers["campers_registered"] = $this->prepData($campers_registered);
			return $campers;
		}

		private function prepData($data){
			$reg = array();
			foreach ($data as $camper ) {
				//echo ($camper["firstName"]);
				$camper["id"] = $camper["_id"]->__toString();
				if(array_key_exists("payment",$camper)){
					$camper["paymentStatus"] = $camper["payment"]["status"];	
				}else {
					$camper["paymentStatus"] = "Not Paid";
				}
				
				$reg[] = $camper;				
			}

			return $reg;
		}

		public function getRegisteredCampersAsJson(){
			$this->load->helper('url');
			$myGet = $this->input->get();
			$start = $myGet["start"];
			$limit = $myGet["limit"];
			$page = $myGet["page"];
			
			if(array_key_exists("action", $myGet)){
				$action =  $myGet["action"];
				if( !empty($action) && isset($action) && $action == "search") {
					$firstName = $myGet["sFirstName"];
					$lastName = $myGet["sLastName"];
					$data = $this->searchCamper($firstName, $lastName);
					$response = array(
						"data" =>$data,
						"total" =>count($data) 
					);
				}
			}else {
				$data = $this->getData($page,$start,$limit);
				$response = array(
					"data" =>$data["campers_registered"], 
					"total" =>$data['num_campers_registered']  
				);
			}
				
			echo json_encode($response);
			exit;
		}

		public function searchCamper($firstName, $lastName){
			$this->load->library('mongo_db');
			$data = $this->mongo_db->like("firstName", $firstName)->like('lastName',$lastName)->get('campers') ;
			return $this->prepData( $data);
		}

		public function markCamperAsPaid(){
			$this->load->library('mongo_db');
			$this->load->helper('url');
			$myPost = $this->input->post();
			
			$id = $myPost["id"];
			date_default_timezone_set ("Africa/Accra"); //essential
			$update = array(
					"payment" => array(
						"status" => $myPost["paymentStatus"],
						"date_of_payment" => date("Y-m-d H:i:s")	
			));

			try{
				
				$this->mongo_db->where(
					array("_id" => new MongoId($id))
					)->update('campers', $update);

				$response = array(
					"success" => true,
					"msg" => "camper's records updated successfully"
					);
				echo json_encode($response);
				exit;
			}catch (MongoConnectionException $e) {
				//print_r($e);

				$response = array(
					"success" => false,
					"msg" => "something went wrong. Please try again"
					);
				echo json_encode($response);
				exit;
			}catch (MongoException  $e) {
				$response = array(
					"success" => false,
					"msg" => "something went wrong. Please try again"
					);
				echo json_encode($response);
				exit;
			}
		}

		public function createRooms()
		{
			$this->load->library('mongo_db');
			$this->load->helper('url');
			$myPost = $this->input->post();
			$rooms = array();

			$numMatts = $myPost["numberOfMattresses"] ;
			$numBeds = $myPost["numberOfBeds"];
			$numRooms = $myPost["numberOfRooms"];
			
			
			try {

				for($i=0; $i < $numRooms; $i++){
					$room = array(
						"name" => $myPost["blockNname"] ."_" .($i+1),
						"occupants" => array(),
						"expectedNumber" =>$numBeds + $numMatts,
						'roomType' => $myPost['roomType'],
						'block' => $myPost["blockNname"]
					);
					//$rooms[] = $room;
					$this->mongo_db->insert('camp_rooms',$room);
				}
				
				echo  json_encode(array("message"=>"Saved"));
				
			}catch (MongoConnectionException $e) {
				//echo $e->message();
			}catch (MongoException  $e) {
				//echo $e->message();
			}
			
		}

		public function assignRooms()
		{
			$this->load->library('mongo_db');
			$campers = $this->mongo_db->where(array("gender" =>  "female"))->get("campers");
			$rooms =  $this->mongo_db->where(array("roomType" => "female"))->get("camp_rooms");
			echo count($campers) . "<br >";
			echo  count($rooms);
			$lastIndex = -1;
			$done =  false;
			
			foreach ($rooms as $room) {
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
							echo "<br />";
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
		}

		public function getRooms(){
			
		}

	}
 ?>