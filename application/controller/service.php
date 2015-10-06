<?php

class ServiceController extends Controller{
	public function index(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			
			$client = $this->load_model('client');
			$data['clients'] = $client->show_client();

			$user = $this->load_model('user'); 
			$data['current_user'] = $user->show_current_users_info($_SESSION['user_id']);

			$data['services'] = $this->model->get_service_byId($_SESSION['user_id']);

			$product = $this->load_model('product');
			$data['category'] = $product->show_category();
			$data['itemUnit'] = $product->show_item_unit();

			$notification = $this->load_model('product');
			$data['notification'] = $notification->product_lowItems();
			
			if($data['current_user']['user_type'] == 3 || $data['current_user']['user_type'] ==0){
				$this->load_template('home',$data,'service');
			}else{
				redirect_to(home_url());
			}

		}else{
			redirect_to(home_url());	
		}
	}
	public function update_service(){
		echo 'update ni cya php';
		if(isset($_POST['data']) && !empty($_POST['data']) && isset($_POST['id']) && !empty($_POST['id'])){
			$serviceUpdate = $this->model->udpate_service($_POST['data'],$_POST['id']);
			
			if($serviceUpdate){
				$servicetendered = $this->model->get_service_byId($_SESSION['user_id']);

				$client = $this->load_model('client');
				$clients = $client->show_client();

				foreach ($servicetendered as $service) {
					$clientName ='';
                         foreach ($clients as $client) {
                            if($client['id'] == $service['client_id']){
                                $clientName = $client['name'];
                            }
                         }
                    ?>
                    <tr>
                        <td><?php echo $service['date']; ?></td>
                        <td><?php echo $clientName;?></td>
                        <td><?php echo $service['printer_model']; ?></td>
                        <td><?php echo $service['remarks']; ?></td>
                        <td><?php echo $service['status']; ?></td>
                        <td>
                            <button class="btn btn-danger waves-effect btnEditService" 
                                    data-service-date='<?php echo $service['date'];?>' 
                                    data-service-client-id='<?php echo $service['client_id']; ?>' 
                                    data-service-printer-model='<?php echo $service['printer_model']; ?>' 
                                    data-service-remarks='<?php echo $service['remarks']; ?>' 
                                    data-service-status='<?php echo $service['status']; ?>'  
                                    data-service-id='<?php echo $service['id']; ?>'><i class="zmdi zmdi-edit"></i> Edit</button></td> 
                        </td>
                    </tr>
                    <?php
				}
			}
		}

	}

	public function save_service(){

		if(isset($_POST['data']) && !empty($_POST['data'])){
		
			$_POST['data']['user_id']=$_SESSION['user_id'];

			if($this->model->save_service($_POST['data'])){
				$servicetendered = $this->model->get_service_byId($_SESSION['user_id']);

				$client = $this->load_model('client');
				$clients = $client->show_client();

				foreach ($servicetendered as $service) {
					$clientName ='';
                         foreach ($clients as $client) {
                            if($client['id'] == $service['client_id']){
                                $clientName = $client['name'];
                            }
                         }
                    ?>
                    <tr>
                        <td><?php echo $service['date']; ?></td>
                        <td><?php echo $clientName;?></td>
                        <td><?php echo $service['printer_model']; ?></td>
                        <td><?php echo $service['remarks']; ?></td>
                        <td><?php echo $service['status']; ?></td>
                        <td>
                            <button class="btn btn-danger waves-effect btnEditService" 
                                    data-service-date='<?php echo $service['date'];?>' 
                                    data-service-client-id='<?php echo $service['client_id']; ?>' 
                                    data-service-printer-model='<?php echo $service['printer_model']; ?>' 
                                    data-service-remarks='<?php echo $service['remarks']; ?>' 
                                    data-service-status='<?php echo $service['status']; ?>'  
                                    data-service-id='<?php echo $service['id']; ?>'><i class="zmdi zmdi-edit"></i> Edit</button></td> 
                        </td>
                    </tr>
                    <?php
				}
				
			}
		}
	}
}