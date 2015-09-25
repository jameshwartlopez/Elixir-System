<?php

class userController extends Controller{

	function index(){
		$this->profile();
	} 

	function logout(){

		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			unset($_SESSION['user_id']);
			session_destroy();
			redirect_to(home_url());
		}
	}

	public function profile(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			$this->load_template('home',$data,'profile');

		}else{
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$this->load_view('login',$data);	
			
		}
	}

	public function settings(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			$this->load_template('home',$data,'privacy_settings');

		}else{
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$this->load_view('login',$data);	
			
		}
	}

	public function all(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			$this->load_template('home',$data,'user');

		}else{
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$this->load_view('login',$data);	
			
		}
	}

	public function save_user(){
		if(isset($_POST['data']) && !empty($_POST['data'])){
			$result = $this->model->save_user($_POST['data']);
			foreach ($result as $users) {
				
			}
		}
	}

	public function update_user(){
		if(isset($_POST['data']) && !empty($_POST['data']) && isset($_POST['id']) && !empty($_POST['id'])){
			$result = $this->model->udpate_user($_POST['data'],$_POST['id']);
			foreach ($result as $users) {
				
			}
		}
	}

	public function show_user(){
		
	}
}