<?php 
	class Management extends CI_Controller {
		
		public function index (){
			$campers = $this->getData();
			$this->view("management", $campers);
		}

		public function view ($page = "admin", $extra = array()) {
			
			$data["title"] = $page;
			$data["page"] =  $page;
			$data["main_content"]  = 'admin/'.$page;
			$data = array_merge($data,$extra);
			//print_r($data);
			$this->load->view('templates/admin_template',$data);
		}

		public function getData($page=-1, $start=-1, $limit=-1 ){

			$this->load->library('mongo_db');
			
			$num_campers_registered = $this->mongo_db->where(array(
				"has_registered" => true
			))->count("campers");

			$num_campers_signedup =  $this->mongo_db->where(array(
				"has_registered" => false
			))->count("campers");

			//
			if($start != -1){
				$take = $limit;
				$startFrom = $start;
				$campers_registered = $this->mongo_db->offset($startFrom)->limit($take)->where(array(
					"has_registered" => true
				))->get("campers");

				$campers_signedup = $this->mongo_db->where(array(
					"has_registered" => false
				))->get("campers");
			}else {
				$campers_registered = $this->mongo_db->where(array(
					"has_registered" => true
				))->get("campers");

				$campers_signedup = $this->mongo_db->where(array(
					"has_registered" => false
				))->get("campers");
			}
			
			
			$campers = array();
			$campers["num_campers_signedup"] = $num_campers_signedup;
			$campers["num_campers_registered"] = $num_campers_registered;
			$campers["campers_signedup"] = $campers_signedup;
			
			


			$campers["campers_registered"] = $this->prepData($campers_registered);
			return $campers;
		}

		private function prepData($data){
			$reg = array();
			foreach ($data as $camper ) {
				//echo ($camper["firstName"]);
				$camper["id"] = $camper["_id"]->__toString();
				if(array_key_exists("payment",$camper)){
					$camper["paymentStatus"] = $camper["payment"]["status"];	
				}else {
					$camper["paymentStatus"] = "Not Paid";
				}
				
				$reg[] = $camper;				
			}

			return $reg;
		}

		public function getRegisteredCampersAsJson(){
			$this->load->helper('url');
			$myGet = $this->input->get();
			$start = $myGet["start"];
			$limit = $myGet["limit"];
			$page = $myGet["page"];
			
			if(array_key_exists("action", $myGet)){
				$action =  $myGet["action"];
				if( !empty($action) && isset($action) && $action == "search") {
					$firstName = $myGet["sFirstName"];
					$lastName = $myGet["sLastName"];
					$data = $this->searchCamper($firstName, $lastName);
					$response = array(
						"data" =>$data,
						"total" =>count($data) 
					);
				}
			}else {
				$data = $this->getData($page,$start,$limit);
				$response = array(
					"data" =>$data["campers_registered"], 
					"total" =>$data['num_campers_registered']  
				);
			}
				
			echo json_encode($response);
			exit;
		}

		public function searchCamper($firstName, $lastName){
			$this->load->library('mongo_db');
			$data = $this->mongo_db->like("firstName", $firstName)->like('lastName',$lastName)->get('campers') ;
			return $this->prepData( $data);
		}

		public function markCamperAsPaid(){
			$this->load->library('mongo_db');
			$this->load->helper('url');
			$myPost = $this->input->post();
			
			$id = $myPost["id"];
			$update = array(
					"payment" => array(
						"status" => $myPost["paymentStatus"],
						"date_of_payment" => date("Y-m-d H:i:s")	
				));

			try{
				
				$this->mongo_db->where(
					array("_id" => new MongoId($id))
					)->update('campers', $update);

				$response = array(
					"success" => true,
					"msg" => "camper's records updated successfully"
					);
				echo json_encode($response);
				exit;
			}catch (MongoConnectionException $e) {
				//print_r($e);

				$response = array(
					"success" => false,
					"msg" => "something went wrong. Please try again"
					);
				echo json_encode($response);
				exit;
			}catch (MongoException  $e) {
				$response = array(
					"success" => false,
					"msg" => "something went wrong. Please try again"
					);
				echo json_encode($response);
				exit;
			}
		}

	}
 ?>