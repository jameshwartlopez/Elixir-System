<?php

class ReportController extends Controller{

	public function returned_item_list(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';

			$clients = $this->load_model('client');
			$data['clients'] = $clients->show_client();

			$user = $this->load_model('user'); 
			$data['current_user'] = $user->show_current_users_info($_SESSION['user_id']);

			$product = $this->load_model('product');
			$data['category'] = $product->show_category();
			$data['itemUnit'] = $product->show_item_unit();

			

			$notification = $this->load_model('product');
			$data['notification'] = $notification->product_lowItems();

			$data['stockoutList'] = $notification->return_so_item();
			$data['transaction_data'] =  $notification->transaction_data();
			
			$this->load_template('home',$data,'report/returneditems');

		}else{
			redirect_to(home_url());	
		}
	}

	public function returned_list(){
		if(isset($_POST['dateFrom']) && !empty($_POST['dateTo'])){
			$product = $this->load_model('product');

			$category = $product->show_category();
			$itemUnit = $product->show_item_unit();
			$notification = $this->load_model('product');
			
			$stockoutList = $notification->return_so_item($_POST['dateFrom'],$_POST['dateTo']);
			foreach ($stockoutList as $stockout) {
                            
	                $items_unit ='';
	                foreach ($itemUnit as $key) {
	                        if($key['id'] == $stockout['item_unit'])
	                            $items_unit = $key['name'];
	                }
	                
	               ?>
	                <tr>

	                   <td><?php echo $stockout['transaction_no']; ?></td>
	                   <td><?php 
	                        echo '<strong>'.$stockout['name'].'</strong> ('.$items_unit.')<br/>'; 
	                        foreach ($category as $key) {
	                            if($key['id'] == $stockout['category']){
	                                echo $key['name'];
	                            }
	                        }
	                   ?></td>
	                   <td><?php echo $stockout['selling_price'];?></td>
	                   <td><?php echo $stockout['quantity'];?></td>
	                   <td><?php echo $stockout['total']; ?></td>
	                   <td><?php echo $stockout['date'];?></td>
	                   <td><?php echo $stockout['status'];?></td>
	                   <td><?php echo $stockout['Firstname']." ".$stockout['LastName'];?></td>
	                   <td>
	                     
	                   </td>
	                </tr>
	               <?php
	            
	        
	    }
			
		}
	}

	public function stockPile(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			

			$user = $this->load_model('user'); 
			$data['current_user'] = $user->show_current_users_info($_SESSION['user_id']);

			$product = $this->load_model('product');
			$data['category'] = $product->show_category();
			$data['itemUnit'] = $product->show_item_unit();

			$notification = $this->load_model('product');
			$data['notification'] = $notification->product_lowItems();
			
			$data['stockpiles'] = $notification->stockPile_report();
			$this->load_template('home',$data,'report/stockpile');

		}else{
			redirect_to(home_url());	
		}
		
	}

	public function stokPile_report(){
		if(isset($_POST['dateFrom']) && !empty($_POST['dateTo'])){
			

			$product = $this->load_model('product');
			$category = $product->show_category();
			$itemUnit = $product->show_item_unit();

			$notification = $this->load_model('product');
			
			$stockpiles = $notification->stockPile_report($_POST['dateFrom'],$_POST['dateTo']);

			foreach ($stockpiles as $stockpile) {
                $items_unit ='';
                foreach ($itemUnit as $key) {
                        if($key['id'] == $stockpile['item_unit'])
                            $items_unit = $key['name'];
                }
               ?>
                <tr>
                    <td><?php echo $stockpile['No'];?></td>
                    <td><?php echo $stockpile['type'];?></td>
                    <td><?php 
                            echo '<strong>'.$stockpile['name'].'</strong> ('.$items_unit.')<br/>'; 
                            foreach ($category as $key) {
                                if($key['id'] == $stockpile['category']){
                                    echo $key['name'];
                                }
                            }
                    ?></td>
                    <td><?php echo $stockpile['sin_qty'];?></td>
                    <td><?php echo $stockpile['sout_qty'];?></td>
                    <td><?php echo $stockpile['balance'];?></td>
                    <td><?php echo $stockpile['Firstname']." ".$stockpile['LastName'];?></td>
                    <td><?php echo $stockpile['date'];?></td>
                </tr>
               <?php
            }
			
		}
	}
	public function stockIn(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			

			$user = $this->load_model('user'); 
			$data['current_user'] = $user->show_current_users_info($_SESSION['user_id']);

			$product = $this->load_model('product');
			$data['category'] = $product->show_category();
			$data['itemUnit'] = $product->show_item_unit();

			$stockin = $this->load_model('product');
			$data['stockin_data'] = $stockin->stockin_report();

			$notification = $this->load_model('product');
			$data['notification'] = $notification->product_lowItems();
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

	public function stockOut_DateFromTo(){

		if(isset($_POST['dateFrom']) && isset($_POST['dateTo']) ){

			$stockin = $this->load_model('product');
			

			$clients = $this->load_model('client');
			$clients = $clients->show_client();
			
			$product = $this->load_model('product');
			$category = $product->show_category();
			$itemUnit = $product->show_item_unit();

			$notification = $this->load_model('product');
			

			$stockoutList = $notification->stocOut_report($_POST['dateFrom'],$_POST['dateTo']);
			$transaction_data =  $notification->transaction_data($_POST['dateFrom'],$_POST['dateTo']);

			foreach ($transaction_data as $transaction) {
                $status_t = '';
                foreach ($stockoutList as $stockout) {
                   
                    
                    if($stockout['transaction_no'] == $transaction['No']){
                         $status_t = $stockout['status'];
                         //clients
                            $items_unit ='';
                            foreach ($itemUnit as $key) {
                                    if($key['id'] == $stockout['item_unit'])
                                        $items_unit = $key['name'];
                            }
                            
                           ?>
                            <tr>

                               <td><?php echo $stockout['transaction_no']; ?></td>
                               <td><?php 
                                    echo '<strong>'.$stockout['name'].'</strong> ('.$items_unit.')<br/>'; 
                                    foreach ($category as $key) {
                                        if($key['id'] == $stockout['category']){
                                            echo $key['name'];
                                        }
                                    }
                               ?></td>
                               <td>
                                   <?php 
                                    foreach ($clients as $client) {
                                        if($stockout['c_id']== $client['id']){
                                            echo $client['name'];
                                            break;
                                        }
                                    }
                                   ?>
                               </td>
                               <td><?php echo $stockout['selling_price'];?></td>
                               <td><?php echo $stockout['quantity'];?></td>
                               <td><?php echo $stockout['total']; ?></td>
                               <td><?php echo $stockout['date'];?></td>
                               <td><?php echo $stockout['Firstname']." ".$stockout['LastName'];?></td>
                               <td>
                                  
                               </td>
                            </tr>
                           <?php
                        
                    }
                }?>
                <tr>
                    <td colspan="8">
                        <?php 
                            if($status_t == 'unpaid'){
                                ?>
                                    <button class="btn btn-danger waves-effect waves-effect btnStockOutStatus" data-client-id='<?php echo $transaction['client_id'];?>' data-transaction-no="<?php echo $transaction['No'];?>" ><?php echo ucfirst($status_t);?></button>
                                <?php 
                            }else if($status_t != 'unpaid' || $status_t != 'hold'){
                                echo '<strong style="color:red;">'.ucfirst($status_t).'</strong>';
                            }else{
                            }
                        ?>
                    </td>
                </tr>
                <?php     
            }
		}
	}

	public function stockOut(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';

			$clients = $this->load_model('client');
			$data['clients'] = $clients->show_client();

			$user = $this->load_model('user'); 
			$data['current_user'] = $user->show_current_users_info($_SESSION['user_id']);

			$product = $this->load_model('product');
			$data['category'] = $product->show_category();
			$data['itemUnit'] = $product->show_item_unit();

			$notification = $this->load_model('product');
			$data['notification'] = $notification->product_lowItems();

			$data['stockoutList'] = $notification->stocOut_report();
			$data['transaction_data'] =  $notification->transaction_data();

			$this->load_template('home',$data,'report/stockout');

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

			$product = $this->load_model('product');
			$data['category'] = $product->show_category();
			$data['itemUnit'] = $product->show_item_unit();

			$notification = $this->load_model('product');
			$data['notification'] = $notification->product_lowItems();
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