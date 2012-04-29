<?php 
	class Registration extends  CI_Controller {

		//private $mdb =  
		public function view($page = 'home')
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('mongo_db');

			if(!file_exists('application/views/pages/'.$page. '.php')){
				show_404();
			}
			

			$data["title"] = ucfirst($page);

			try {
				$data["campers"] = $this->mongo_db->get('campers');
			} catch (MongoConnectionException $e) {
				

			} catch (MongoException  $e) {
				
			}
			$response = array(
				"data" => $data ,
				"message" => "got here",
				"success" => true
			);


			$this->load->view("templates/header",$data);
			$this->load->view('pages/'.$page,$data);
			$this->load->view('templates/footer',$data);
		}

		public function  signup(){

		}

		public function register ($page = 'register'){
			view($page);
		}

		public function register_camper(){
			$this->load->helper('url');
			$data = $this->input->post();
			$this->load->library('mongo_db');
			try {
				$this->mongo_db->insert('campers', $data );
			} catch (MongoConnectionException $e) {
				

			} catch (MongoException  $e) {
				
			}
			$response = array(
				"data" => $data ,
				"message" => "Thanks for registering for youth camp 2012. Hope to see there. Till then keep your fire burning",
				"success" => true
			);

			header("Content-Type: application/json");
			echo json_encode($response);
			exit;
		}
	}
 ?>