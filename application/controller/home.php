<?php

class HomeController extends Controller{

	public function index(){


		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			$product = $this->load_model('product');
			$data['category'] = $product->show_category();


			$data['itemUnit'] = $product->show_item_unit();

			
			$data['products'] = $product->show_product();

			$user = $this->load_model('user'); 
			$data['current_user'] = $user->show_current_users_info($_SESSION['user_id']);
			
			
			$notification = $this->load_model('product');
			$data['notification'] = $notification->product_lowItems();

			$client = $this->load_model('client');
			$data['clients'] = $client->show_client();
			
			if($data['current_user']['user_type'] == 3){
				$service = $this->load_model('service');
				$data['services'] = $service->get_service_byId($_SESSION['user_id']);
				$this->load_template('home',$data,'service');

			}else if($data['current_user']['user_type'] != 3){
				$this->load_template('home',$data);	
			}
			

		}else{
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$this->load_view('login',$data);	
			
		}
		//sample call this own model menthod insert
		//$this->model->insert('tbl_user',array('id'=>1));
	}

	public function user_login(){
		$userName = isset($_POST['userName']) ? $_POST['userName']: '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';

		$users_login_result  = $this->model->user_login($userName,$password);

		//echo json_encode($users_login_result);

		if(empty($users_login_result)){
			echo '0';
		}else if(!empty($users_login_result)){
			$_SESSION['user_id'] = $users_login_result[0]['id'];
			echo '1';
		}
	}



/*
	REPORTS
*/
	//reports stockpile page
	public function stockPile(){

	}

	//reports stock card page
	public function stockCard(){

	}

	//reports for stockin products
	public function stockInReports(){

	}

	//reports for stockout products
	public function stockOutReports(){

	}

	//reports for service this came from the technician 
	public function serviceReport(){
		
	}


}