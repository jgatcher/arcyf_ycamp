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
			//connect to db and fetch record
			//do some validation
			$this->load->library('mongo_db');
			$valid = false;
			$email_log = $this->input->post("email_log");
			$password = $this->input->post("password_log");

			if(empty($password) || empty($email_log)){
				$reponse = "Please supply both email and password.";
				$this->session->set_flashdata('log_err', $reponse);
				redirect('home/view_login');
			}
			else {

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
					
				}
				else {
					$reponse = "There is no camper with the credentials you entered. If youy haven't signed up please do so.";
					$this->session->set_flashdata('log_err', $reponse);
					redirect('home/view_login');
				}
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
			$data["password"] =$this->input->post("password");
			
			$this->session->set_userdata(array("is_registering" => true));

			if(empty($data["email"]) || empty($data["password"])) {
				$response = "Please supply both email and password.";
				$this->session->set_flashdata('err', $response);
				redirect('home/view');
			}
			else //inputs are clean
			{
				$data["password"] =  md5($data["password"]);

				//check to see if a camper with the same credentials already exist
				$val = $this->mongo_db->where(array(
					"email" => $data["email"]
					//"password" => $data["password"]
					))->get("campers");
				
				if(empty($val)){ // no camper found
					$data["has_registered"] = false;
					$data["date_signed_up"]  = date("Y-m-d H:i:s");
					$confirmation_key = md5(date("Y-m-d H:i:s"));
					$data["confirmationKey"] = $confirmation_key;
					
					try {
						$id = $this->mongo_db->insert('campers', $data );
						$str = "Successfully signed Up! <b>Please login to start the registration process </b> .";
						$this->session->set_flashdata('item', $str);
						//$this->send_signup_mail("selasiehansontest@gmail.com",$data["email"],"this is a test");
						redirect('home/view_login');
						//redirect('home/view');
					}catch (MongoConnectionException $e) {
						//todo : add error messages
						redirect('home/view');
					}catch (MongoException  $e) {
						redirect('home/view');
					}
				}
				else {
					$reponse = "There is already a  camper with the same email. If you the one, kindly proceed to login.";
					$this->session->set_flashdata('err', $reponse);
					redirect('home/view');
				}
			}
		}

		private function send_signup_mail($from,$to, $message){

			$this->load->library('email');
			$this->email->from($from, "Youth Camp 2012");
			$this->email->to($to); 
			$this->email->subject('Confirm Sign Up');
			$this->email->message($message);	
			$this->email->send();

			//echo $this->email->print_debugger();
		}

		public function logout () {
			$this->session->sess_destroy(); 
			//$this->view();
			redirect('');
		}
	}
?>