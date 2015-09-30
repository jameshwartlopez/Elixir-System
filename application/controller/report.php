<?php

class ReportController extends Controller{

	public function stockPile(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			

			$user = $this->load_model('user'); 
			$data['current_user'] = $user->show_current_users_info($_SESSION['user_id']);
			$this->load_template('home',$data,'report/stockpile');

		}else{
			redirect_to(home_url());	
		}
		
	}

	public function stockIn(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			

			$user = $this->load_model('user'); 
			$data['current_user'] = $user->show_current_users_info($_SESSION['user_id']);

			$stockin = $this->load_model('product');
			$data['stockin_data'] = $stockin->stockin_report();
			$this->load_template('home',$data,'report/stockin');

		}else{
			redirect_to(home_url());	
		}
	}

	public function stockIn_dateFromTo(){
		if(isset($_POST['dateFrom']) && !empty($_POST['dateTo'])){
			$stockin = $this->load_model('product');
			$stockInbyDate = $stockin->stockin_report($_POST['dateFrom'],$_POST['dateTo']);
			foreach ($stockInbyDate as $stockin) {
               ?>
                <tr>
                    <td width="50%">
                        <p class="text-muted c-gray"><?php echo $stockin['name'];?></p>
                        <h5 class="t-uppercase f-400"><?php echo $stockin['name'].'( '.$stockin['item_unit'].' )'; ?> </h5>
                    </td>
                    <td><?php echo $stockin['quantity']; ?></td>
                    <td ><?php echo $stockin['stockinDate']; ?></td>
                    <td><?php echo $stockin['Firstname'].' '.$stockin['LastName']; ?></td>
                </tr>
               <?php
            }
		}
	}
	public function stockOut(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';

			$user = $this->load_model('user'); 
			$data['current_user'] = $user->show_current_users_info($_SESSION['user_id']);

			$this->load_template('home',$data,'report/stockpile');

		}else{
			redirect_to(home_url());	
		}
	}

	public function service(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			

			$user = $this->load_model('user'); 
			$data['current_user'] = $user->show_current_users_info($_SESSION['user_id']);
			
			$service = $this->load_model('service');
			$data['services'] = $service->service_report();
			$this->load_template('home',$data,'report/service');

		}else{
			redirect_to(home_url());	
		}
	}
	public function service_dateFromTo(){
		if(isset($_POST['dateFrom']) && !empty($_POST['dateTo'])){
			$service = $this->load_model('service');
			$servicebyDate = $service->service_report($_POST['dateFrom'],$_POST['dateTo']);
			 foreach ($servicebyDate as $service) {
               ?>
                <tr>
                    <td width="30%">
                        <h5 class="t-uppercase f-400"><?php echo $service['name']; ?> </h5>
                        <p class="text-muted c-gray">Address: <?php echo $service['address'];?></p>
                        <p class="text-muted c-gray">Tel#: <?php echo $service['telphone_number'];?></p>
                    </td>
                    <td><?php echo $service['printer_model']; ?></td>
                    <td><?php echo $service['remarks']; ?></td>
                    <td><?php echo $service['status']; ?></td>
                    <td><?php echo $service['Firstname'].' '.$service['LastName']; ?></td>
                    <td><?php echo $service['date']; ?></td>
                </tr>
               <?php
            }
		}
	}
}