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

		public function createCamperRoomsView (){
			$this->load->library('mongo_db');
			$rooms =  $this->mongo_db->get("camp_rooms");
			
			foreach ($rooms as $room) {
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

		
	}
?>