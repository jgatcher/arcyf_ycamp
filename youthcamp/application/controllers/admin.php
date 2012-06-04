<?php 

	class Admin extends CI_Controller {
		
		public function index (){
			
			$this->view("index");
		}

		public function view ($page = "index", $extra = array()) {
			
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data["title"] = $page;
			$data["page"] =  $page;
			$data["main_content"]  = 'admin/'.$page;
			$data = array_merge($data,$extra);
			//print_r($data);
			$this->load->view('templates/template',$data);
		}

		public function logout(){
			$this->session->sess_destroy(); 
			redirect('admin');
		}

		public function login(){
			//connect to db and fetch record
			//do some validation
			$this->load->library('mongo_db');
			$valid = false;
			$username_log = $this->input->post("username_log");
			$password = $this->input->post("password_log");

			if(empty($password) || empty($username_log) || !isset($password) || !isset($username_log)){
				$response = "Please supply both email and password.";
				$this->session->set_flashdata('admin_log_err', $response);
				redirect('admin/view');
			}
			else {

				$val = $this->mongo_db->where(array(
					"username" => $username_log,
					"password" => md5($password)
					
				))->get("admins");

				if(!empty($val)){

					$data = array(
						"admin_username_log" => $val[0]["username"],
						"is_admin_logged_in" => true,
						'admin_id' => $val[0]["_id"] 
					);
					
					$this->session->set_userdata($data);
					redirect('management/');
					// if($has_registered){
					// 	redirect('site/');
					// }else {
					// 	redirect('registeration/');	
					// }
					
				}
				else {
					$response = "There is no admin with the credentials you entered. Contact an Admin.";
					$this->session->set_flashdata('admin_log_err', $response);
					redirect('admin/view');
				}
			}
		}		
	}
?>