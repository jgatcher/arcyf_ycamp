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
			
			$occupation = array();
			$type = $occupation["type"] = $data["occupation"];
			
			if($type=="student"){
				$occupation["school"] = $data["school"];
				$occupation["school_location"] = $data["school_location"];
				$occupation["educationalLevel"] = $data["educationalLevel"];

				
			}

			unset($data["school"]);
			unset($data["school_location"]);
			unset($data["educationalLevel"]);

			$data["occupation"] = $occupation;

			$emergency  = array(
				"name" => $data["emergency_contact"],
				"number" => $data["emergency_contact_num"]
			);

			unset($data["emergency_contact"]);
			unset($data["emergency_contact_num"]);
			$data["emergency"] = $emergency;
			

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
		}
	}
 ?>