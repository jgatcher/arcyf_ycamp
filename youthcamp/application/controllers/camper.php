<?php 
	class Camper extends CI_Controller {

		public function index($id){
			$this->load->library('mongo_db');
			//$id = $this->session->userdata("id") ;

			$val = $this->mongo_db->where(array(
				"_id" => new MongoId($id)
			))->get("campers");

			$data["camper"] = $val;
			$page = "camper_datails";
			$data["title"] = $page;
			$data["page"] =  $page;
			//$data["main_content"]  = 'pages/'.$page;
			$this->load->view('pages/'.$page,$data);
			//$this->view();
		}

		public function  view (){
				
			
		}
	}
 ?>