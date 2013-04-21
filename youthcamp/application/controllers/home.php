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

					//check to make sure the person has first confirmed their signup

					$has_confirmed = empty($val[0]["has_confirmed"]) ? 0 : $val[0]["has_confirmed"];  

					if(!$has_confirmed){
						$message  = "You cannot proceed to register unless you have confirmed through the email that was sent you. ";
						$message .= "kindly check your email and follow the instructions given";
						$this->session->set_flashdata('err', $message);
						redirect("home/view");
					}

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

		public function view_confirmsignup ($key=null){
			if(empty($key)){
				//set an error message here
				redirect("home/view");
			}else {
				$this->load->library('mongo_db');
				$val = $this->mongo_db->where(array(
					"confirmationKey" => $key
				))->get("campers");

				if(count($val) > 0) { 

					//check if user has already been confirmed
					if($val[0]["has_confirmed"] == 1) {

						$response = array(
							"type" => "info",
							"message" => "You have already been confirmed."
						);
						$this->session->set_flashdata('item', $response);	
					}else {
						$data = array("has_confirmed" => true);
						$this->mongo_db->where(
							array("confirmationKey" => $key)
							)->update('campers', $data);

						$response = array(
							"type" => "success",
							"message" => "You have been successfully confirmed."
						);
						$this->session->set_flashdata('item', $response);	
					}

					
					$this->view("confirm_signup");	
				}else {
					//set error message here
					redirect ("home/view");
				}
				
			}
		}

		public function signup(){
			$this->load->helper('url');
			$this->load->library('mongo_db');
			$data = array();
			//todo make sure that the email and password do not already exist
			$data["email"] = $this->input->post("email");
			$data["password"] =$this->input->post("password");
			$data["firstName"] = $this->input->post("firstName");
			$data["lastName"] = $this->input->post("lastName");
			
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
					$data["has_confirmed"] = false;
					$data["date_signed_up"]  = date("Y-m-d H:i:s");
					$confirmation_key = md5(date("Y-m-d H:i:s"));

					//set up a confirmation key which will be sent via email
					$data["confirmationKey"] = $confirmation_key; 
					
					try {
						$id = $this->mongo_db->insert('campers', $data );
						$str  = "Thanks for signing up. Instructions have been sent to your email."; 
						$str .=" Please follow them to enable you to continue with the registration.";
						$this->session->set_flashdata('item', $str);
						$this->send_signup_mail($data["email"],$data);
						//redirect('home/view_login');
						//redirect('home/view');
					}catch (MongoConnectionException $e) {
						//todo : add error messages
						//redirect('home/view');
					}catch (MongoException  $e) {
						//redirect('home/view');
					}

					redirect('home/view');
				}
				else {
					$reponse = "There is already a  camper with the same email. If you the one, kindly check your email to confirm and then proceed to login.";
					$this->session->set_flashdata('err', $reponse);
					redirect('home/view');
				}
			}
		}

		private function send_signup_mail($to_address, $data){
			$name = $data["firstName"] ." ". $data["lastName"];
			$key = $data["confirmationKey"];
			$url = base_url() ."index.php/home/view_confirmsignup/{$key}"; 
			
			$message  = "Hello $name, thank you for signing up for Youth Camp 2013. ";
			$message .= "In order to complete the signup process, please proceed by clicking ";
			$message .= "on the link below. Failure to do so will mean u cannot continue with the process. \n \n";
			$message .= "$url";
			
			$this->load->library('email');
			$this->email->from("selasiehansontest@gmail.com", "Youth Camp 2013");
			$this->email->to($to_address); 
			$this->email->subject('Confirm Sign Up');
			$this->email->message($message);	
			$this->email->send();
			//echo $this->email->print_debugger();
		}

		public function do_confirm_signup(){

		}

		public function logout () {
			$this->session->sess_destroy(); 
			//$this->view();
			redirect('');
		}
	}
?>