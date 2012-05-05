<?php 
	class Site extends CI_Controller {
		
		public function index (){
			$this->load->helper('form');
			$this->load->library('form_validation');
			//$this->load->library('mongo_db');


			$this->load->library('mongo_db');
			$id = $this->session->userdata("id") ;
			$email = $this->session->userdata("email_log");

			$val = $this->mongo_db->where(array(
				"email" => $email,
				"_id" => new MongoId($id)
			))->get("campers");

			$has_registered = empty($val[0]["has_registered"]) ? 0 : $val[0]["has_registered"];  
			$this->session->set_userdata('has_registered', $has_registered);

			$page = "site";
			$data["title"] = $page;
			$data["camper"] = $val;
			$data["main_content"]  = 'pages/'.$page;
			$this->load->view('templates/template',$data);
		}
	}
 ?>