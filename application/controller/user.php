<?php

class UserController extends Controller{

	public $user_type = array( 	'1' => 'Sales Assistant', 
                        	 	'2' => 'Product Specialist',
                        		'3' => 'Technician');
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
			$data['current_user'] = $this->model->show_current_users_info($_SESSION['user_id']);
			$this->load_template('home',$data,'profile');

		}else{
			redirect_to(home_url());
		}
	}

	public function settings(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			$data['current_user'] = $this->model->show_current_users_info($_SESSION['user_id']);

			$this->load_template('home',$data,'privacy_settings');

		}else{
			redirect_to(home_url());	
		}
	}

	public function all(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
		
			$data['users'] = $this->model->show_users_info($_SESSION['user_id']);
			
			$data['current_user'] = $this->model->show_current_users_info($_SESSION['user_id']);

			$data['user_type'] = $this->user_type;
			$this->load_template('home',$data,'user');

		}else{
			redirect_to(home_url());
		}
	}

	public function save_user(){
		if(isset($_POST['data']) && !empty($_POST['data'])){
			$result = $this->model->save_user($_POST['data']);
			if($result){
				$result = $this->model->show_users_info($_SESSION['user_id']);
				foreach ($result as $user) {
				?>
				 <tr>
	                <td><?php echo $user['username'];?></td>
	                <td><?php echo $user['password'];?></td>
	                <td><?php echo $user['Firstname'];?></td>
	                <td><?php echo $user['LastName'];?></td>
	                <td><?php echo $user['Email'];?></td>
	                <td><?php echo $user['Contact'];?></td>
	                <td><?php echo $user['gender'];?></td>
	                <td><?php echo $this->user_type[$user['user_type']];?></td>
	                <td>
	                    <button class="btn btn-danger waves-effect btnEditUser" 
	                            data-username='<?php echo $user['username'];?>' 
	                            data-password='<?php echo $user['password'];?>' 
	                            data-Firstname='<?php echo $user['Firstname'];?>' 
	                            data-LastName='<?php echo $user['LastName'];?>' 
	                            data-Contact='<?php echo $user['Contact'];?>' 
	                            data-Email='<?php echo $user['Email'];?>' 
	                            data-user-type='<?php echo $user['user_type'];?>' 
	                            data-gender='<?php echo $user['gender'];?>' 
	                            data-user-id='<?php echo $user['id'];?>'>
	                            <i class="zmdi zmdi-edit"></i> Edit
	                    </button>
	                </td>
	            </tr>   
				<?php	
				}
			}
		}
	}

	public function update_user(){
		if(isset($_POST['data']) && !empty($_POST['data']) && isset($_POST['id']) && !empty($_POST['id'])){
			$result = $this->model->udpate_user($_POST['data'],$_POST['id']);
			if($result){
				
				$user_info = $this->load_model('user');

				$result =$user_info->show_users_info($_SESSION['user_id']);
				
				foreach ($result as $user) {
				?>
				 <tr>
	                <td><?php echo $user['username'];?></td>
	                <td><?php echo $user['password'];?></td>
	                <td><?php echo $user['Firstname'];?></td>
	                <td><?php echo $user['LastName'];?></td>
	                <td><?php echo $user['Email'];?></td>
	                <td><?php echo $user['Contact'];?></td>
	                <td><?php echo $user['gender'];?></td>
	                <td><?php echo $this->user_type[$user['user_type']];?></td>
	                <td>
	                    <button class="btn btn-danger waves-effect btnEditUser" 
	                            data-username='<?php echo $user['username'];?>' 
	                            data-password='<?php echo $user['password'];?>' 
	                            data-Firstname='<?php echo $user['Firstname'];?>' 
	                            data-LastName='<?php echo $user['LastName'];?>' 
	                            data-Contact='<?php echo $user['Contact'];?>' 
	                            data-Email='<?php echo $user['Email'];?>' 
	                            data-user-type='<?php echo $user['user_type'];?>' 
	                            data-gender='<?php echo $user['gender'];?>' 
	                            data-user-id='<?php echo $user['id'];?>'>
	                            <i class="zmdi zmdi-edit"></i> Edit
	                    </button>
	                </td>
	            </tr>   
				<?php	
				}
			}
			
		}
	}

	public function update_current_user(){
		
		if(isset($_POST['data']) && !empty($_POST['data']) && isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			$result = $this->model->udpate_user($_POST['data'],$_SESSION['user_id']);
			echo $result;

		}
	}
	public function update_login_credential(){
			$user_model = $this->load_model('user');

		if(isset($_POST['data']) && !empty($_POST['data']) && isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			$current_user_data = $user_model->show_current_users_info($_SESSION['user_id']);

			$result = $this->model->check_username($_POST['data']['username']);
			
			//if password entered is equal to the current users password came from db
			if($current_user_data['password'] == $_POST['data']['oldPassword']){
				//check if the username entered was not found
				if(count($result) <= 0){

					$data = array('username'=>$_POST['data']['username'],'password'=>$_POST['data']['password']);
					$usersModel = $this->load_model('user');
					$a = $usersModel->udpate_user($data,$_SESSION['user_id']);
					if($a == 1)	echo 1;
				//this will check if the username entered is already in use
				}else if(count($result) > 0){

					//this will check if the username entered is already in use
					if($_POST['data']['username'] == $current_user_data['username']){
						
						$data = array('password'=>$_POST['data']['password']);
						
						$usersModel = $this->load_model('user');
						$a = $usersModel->udpate_user($data,$_SESSION['user_id']);
						if($a == 1) echo 1;
						
					}else if($_POST['data']['username'] != $current_user_data['username']){
						echo 2;
						// error user name is already taken
					}
				} 	

			}else if($current_user_data['password'] != $_POST['data']['oldPassword']){
				echo 3;
			}
		}
	}

	public function update_user_avatar(){
		if(isset($_POST['avatar']) && !empty($_POST['avatar'])){
			$usersModel = $this->load_model('user');
			$a = $usersModel->udpate_user(array('avatar'=>$_POST['avatar']),$_SESSION['user_id']);
			echo 'ang result';
			print_r($a);
		}
	}
}