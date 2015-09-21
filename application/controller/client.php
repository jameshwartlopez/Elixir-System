<?php

class ClientController extends Controller{
	public function index(){

		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			$this->load_template('home',$data,'client');

		}else{
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$this->load_view('login',$data);	
			
		}
	}
}