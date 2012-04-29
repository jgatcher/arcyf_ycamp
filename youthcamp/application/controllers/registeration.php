<?php 
	class Registeration extends  CI_Controller {

		//private $mdb =  
		public function view()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			//$this->load->library('mongo_db');

			$page = "register";
			$data["title"] = $page;
			$data["main_content"]  = 'pages/'.$page;
			$this->load->view('templates/template',$data);
		}


		public function register_camper(){
			$this->load->helper('url');
			$data = $this->input->post();
			$this->load->library('mongo_db');
			$id = $this->session->userdata("id") ;
			$email = $this->session->userdata("email_log");
		
			try {
				$data["has_registered"] = true;
				$this->mongo_db->where(
					array("email"=>$email, "_id"=>new MongoId($id))
					)->update('campers', $data );
			} catch (MongoConnectionException $e) {
				print_r($e);
			} catch (MongoException  $e) {
				print_r($e);
			}

			redirect('site/');

			// $response = array(
			// 	"data" => $data ,
			// 	"message" => "Thanks for registering for youth camp 2012. Hope to see there. Till then keep your fire burning",
			// 	"success" => true
			// );

			// //header("Content-Type: application/json");
			// echo json_encode($response);
			// exit;
		}
	}
 ?>