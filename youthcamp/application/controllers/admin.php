<?php 
	class Admin extends CI_Controller {
		
		public function index (){
			$this->load->library('mongo_db');
			
			$num_campers_registered = $this->mongo_db->where(array(
				"has_registered" => true
			))->count("campers");

			$num_campers_signedup =  $this->mongo_db->where(array(
				"has_registered" => false
			))->count("campers");

			$campers_registered = $this->mongo_db->where(array(
				"has_registered" => true
			))->get("campers");

			$campers_signedup = $this->mongo_db->where(array(
				"has_registered" => false
			))->get("campers");
			
			$campers = array();
			$campers["num_campers_signedup"] = $num_campers_signedup;
			$campers["num_campers_registered"] = $num_campers_registered;
			$campers["campers_signedup"] = $campers_signedup;
			$campers["campers_registered"] = $campers_registered;

			$this->view("index", $campers);
		}

		public function view ($page = "admin", $extra = array()) {
			
			
			$data["title"] = $page;
			$data["page"] =  $page;
			$data["main_content"]  = 'admin/'.$page;
			$data = array_merge($data,$extra);
			//print_r($data);
			$this->load->view('templates/template',$data);
		}

	}
 ?>