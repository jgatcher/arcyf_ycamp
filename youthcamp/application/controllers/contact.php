<?php 
	class Contact extends CI_Controller {

		public function index(){
			$this->view();
		}

	public function  view (){
			
		$page = "contact";
		$data["title"] = $page;
		$data["page"] =  $page;
		$data["main_content"]  = 'pages/'.$page;
		$this->load->view('templates/template',$data);
	}
	}

 ?>