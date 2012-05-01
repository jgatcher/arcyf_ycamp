<?php 
	class Home extends CI_Controller {

		public function view($page = "home"){
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$data["title"] = $page;
			$data["main_content"]  = 'pages/'.$page;
			$this->load->view('templates/template',$data);
		}

		public function login(){
			//connect to db and fecth record
			//do some validation
			$this->load->library('mongo_db');
			$valid = false;
			$email_log = $this->input->post("email_log");
			$password = $this->input->post("password_log");

			$val = $this->mongo_db->where(array(
				"email" => $email_log,
				"password" => md5($password)
				))->get("campers");

			
			if(!empty($val)){
				$has_registered = empty($val[0]["has_registered"]) ? 0 : $val[0]["has_registered"];  
				$data = array(
					"email_log" =>$val[0]["email"],
					"is_user_logged_in" => true,
					'has_registered' => $has_registered,
					'id' => $val[0]["_id"] 
				);
				
				
				$this->session->set_userdata($data);
				if($has_registered){
					redirect('site/');
				}else {
					redirect('registeration/');	
				}
				
			}else {
				$this->view();
			}
			
		}		
		
		public function view_login(){
			$this->view("login");
		}


		public function signup(){
			$this->load->helper('url');
			$this->load->library('mongo_db');
			$data = array();
			//todo make sure that the email and password do not already exist
			$data["email"] = $this->input->post("email");
			$data["password"] = md5($this->input->post("password"));
			
			$val = $this->mongo_db->where(array(
				"email" => $data["email"],
				"password" => $data["password"]
				))->get("campers");
			
			if(empty($val) ){ // no camper found
				$data["has_registered"] = false;
				try {
					$id = $this->mongo_db->insert('campers', $data );
					$str = "Successfully signed Up! Please login to start the registration process.";
					$this->session->set_flashdata('item', $str);
					redirect('home/view_login');
				}catch (MongoConnectionException $e) {
					//todo : add error messages
					$this->view();
				}catch (MongoException  $e) {
					$this->view();
				}
			}
			else {
				$reponse = "There is already a  camper with the same email and password. If you the one, kindly proceed to login.";
				$this->session->set_flashdata('error', $reponse);
				$this->session->keep_flashdata('error');
				$this->view();
			}
		}

		public function logout () {
			$this->session->sess_destroy(); 
			$this->view();
		}
	}
?>