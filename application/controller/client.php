<?php

class ClientController extends Controller{
	public function index(){

		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			$data['clients'] = $this->model->show_client();

			$user = $this->load_model('user'); 
			$data['current_user'] = $user->show_current_users_info($_SESSION['user_id']);
			$this->load_template('home',$data,'client');

		}else{
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$this->load_view('login',$data);	
			
		}
	}

	public function save_client(){
		if(isset($_POST['data']) && !empty($_POST['data'])){
			$result = $this->model->save_client($_POST['data']);
			foreach ($result as $client) {
			?>
			<tr>
                <td><?php echo $client['name']?></td>
                <td><?php echo $client['address']?></td>
                <td><?php echo $client['telphone_number']?></td>
                <td><?php echo $client['fax_number']?></td>
                <td><?php echo $client['email']?></td>
                <td><?php echo $client['contact_person']?></td>
                <td>
                    <button class="btn btn-danger waves-effect btnEditClient" 
                         	data-client-name='<?php echo $client['name']?>' 
                          	data-client-address='<?php echo $client['address']?>' 
                            data-client-telno='<?php echo $client['telphone_number']?>' 
                            data-client-faxno='<?php echo $client['fax_number']?>' 
                            data-client-email='<?php echo $client['email']?>' 
                            data-client-contactperson='<?php echo $client['contact_person']?>'  
                            data-client-id='<?php echo $client['id']?>'><i class="zmdi zmdi-edit"></i> Edit</button></td> 
                </td>
            </tr>
			<?php
			}
		}
		
	}

	public function update_client(){
		if(isset($_POST['data']) && !empty($_POST['data']) && isset($_POST['id']) && !empty($_POST['id'])){
			$result = $this->model->update_client($_POST['data'],$_POST['id']);
			foreach ($result as $client) {
			?>
			<tr>
                <td><?php echo $client['name']?></td>
                <td><?php echo $client['address']?></td>
                <td><?php echo $client['telphone_number']?></td>
                <td><?php echo $client['fax_number']?></td>
                <td><?php echo $client['email']?></td>
                <td><?php echo $client['contact_person']?></td>
                <td>
                    <button class="btn btn-danger waves-effect btnEditClient" 
                         	data-client-name='<?php echo $client['name']?>' 
                          	data-client-address='<?php echo $client['address']?>' 
                            data-client-telno='<?php echo $client['telphone_number']?>' 
                            data-client-faxno='<?php echo $client['fax_number']?>' 
                            data-client-email='<?php echo $client['email']?>' 
                            data-client-contactperson='<?php echo $client['contact_person']?>'  
                            data-client-id='<?php echo $client['id']?>'><i class="zmdi zmdi-edit"></i> Edit</button></td> 
                </td>
            </tr>
			<?php	
			}
		}
	}

	public function show_client(){

	}
}