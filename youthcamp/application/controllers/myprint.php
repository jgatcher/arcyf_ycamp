<?php 
	class MyPrint extends CI_Controller {
		public function aaa(){
			echo "HI";
		}

		public function print_rooms ($type){
			$this->load->library('mongo_db');
			$val = $this->mongo_db->where(array("roomType" => $type))->get("camper_rooms_view");

			$data["campers"] = $val;
			$page = "print_rooms";
			$data["title"] = "ROOMS";
			$data["page"] =  $page;
			//$data["main_content"]  = 'pages/'.$page;
			$this->load->view('pages/'.$page,$data);
		}

	}

?>