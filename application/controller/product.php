<?php

class ProductController extends Controller{
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
			
			$this->load_template('home',$data);

		}else{
			redirect_to(home_url());	
		}
	}
/*
	Category related methods
 */
	public function category(){

		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			$data['categories'] = $this->model->show_category(); 

			$user = $this->load_model('user'); 
			$data['current_user']= $user->show_current_users_info($_SESSION['user_id']);
			
			$this->load_template('home',$data,'category');

		}else{
			redirect_to(home_url());	
		}
	}
	public function save_category(){
		if(isset($_POST['catName']) && !empty($_POST['catName'])){
			$result = $this->model->save_category(array('name'=>$_POST['catName']));

		echo "<tr>
               <td>".$result[0]['name']."</td>
               <td>
                   <button class='btn btn-danger waves-effect btnEditCategory' data-category-name='".$result[0]['name']."' data-category-id='".$result[0]['id']."'><i class='zmdi zmdi-edit'></i> Edit</button>
                </td>
            </tr>";
		}
	}

	public function update_category(){
		if(isset($_POST['catName']) && !empty($_POST['catName']) && isset($_POST['id']) && !empty($_POST['id'])){
			$result = $this->model->update_category(array('name'=>$_POST['catName']),$_POST['id']);
			foreach ($result as  $value) { ?>
                <tr>
                    <td><?php echo $value['name'];?></td>
                    <td>
                         <button class="btn btn-danger waves-effect btnEditCategory" data-category-name='<?php echo $value['name'];?>' data-category-id="<?php echo $value['id'];?>"><i class="zmdi zmdi-edit"></i> Edit</button>
                    </td>
                 </tr>
            <?php }
		}
	}

	public function search_category(){
		if(isset($_POST['catName']) && !empty($_POST['catName'])){
			$result = $this->model->search_category($_POST['catName']);
			
		}else if(empty($_POST['catName'])){
			$result = $this->model->show_category();
		}
			foreach ($result as  $value) { ?>
                <tr>
                    <td><?php echo $value['name'];?></td>
                    <td>
                         <button class="btn btn-danger waves-effect btnEditCategory" data-category-name='<?php echo $value['name'];?>' data-category-id="<?php echo $value['id'];?>"><i class="zmdi zmdi-edit"></i> Edit</button>
                    </td>
                 </tr>
            <?php }
	}

/*
	Items Unit related methods
 */
	//products Item Unit page
	public function itemUnit(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			$data['itemUnits'] = $this->model->show_item_unit();

			$user =$this->load_model('user'); 
			$data['current_user'] = $user->show_current_users_info($_SESSION['user_id']);

			$this->load_template('home',$data,'item_unit');

		}else{
			redirect_to(home_url());		
			
		}
	}

	public function save_itemUnit(){
		if(isset($_POST['itemUnit']) && !empty($_POST['itemUnit'])){
			$result = $this->model->save_item_unit(array('name'=>$_POST['itemUnit']));

			echo "<tr>
	               <td>".$result[0]['name']."</td>
	               <td>
	                   <button class='btn btn-danger waves-effect btnEditItemUnit' data-itemunit-name='".$result[0]['name']."' data-itemunit-id='".$result[0]['id']."'><i class='zmdi zmdi-edit'></i> Edit</button>
	                </td>
	            </tr>";
		}
	}

	public function update_itemUnit(){
		if(isset($_POST['itemName']) && !empty($_POST['itemName']) && isset($_POST['id']) && !empty($_POST['id'])){
			$result = $this->model->update_item_unit(array('name'=>$_POST['itemName']),$_POST['id']);
			foreach ($result as $itemUnit) {
				?>
				 <tr>
                     <td><?php echo $itemUnit['name']; ?></td>
                     <td>
                         <button class="btn btn-danger waves-effect btnEditItemUnit" data-itemunit-name='<?php echo $itemUnit['name']; ?>' data-itemunit-id="<?php echo $itemUnit['id']; ?>"><i class="zmdi zmdi-edit"></i> Edit</button>
                     </td>
                 </tr>
				<?php
			}
		}
	}

	public function search_itemUnit(){
		if(isset($_POST['itemUnitName']) && !empty($_POST['itemUnitName'])){
			$result = $this->model->search_item_unit($_POST['itemUnitName']);
		}else{
			$result = $this->model->show_item_unit();
		}
		foreach ($result as $itemUnit) {
				?>
				 <tr>
                     <td><?php echo $itemUnit['name']; ?></td>
                     <td>
                         <button class="btn btn-danger waves-effect btnEditItemUnit" data-itemunit-name='<?php echo $itemUnit['name']; ?>' data-itemunit-id="<?php echo $itemUnit['id']; ?>"><i class="zmdi zmdi-edit"></i> Edit</button>
                     </td>
                 </tr>
				<?php
		}
	}
/*
	Products related methods
*/
	//products profile page
	public function productsProfile(){

	}

	public function save_product(){
		if(isset($_POST['data']) && !empty($_POST['data'])){
			$result = $this->model->save_product($_POST['data']);

			$product = $this->load_model('product');
			$category = $product->show_category();


			$itemUnit = $product->show_item_unit();

                                            foreach ($result as $product) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $product['code']; ?></td>
                                                    <td><?php echo $product['name']; ?></td>
                                                    <td><?php  
                                                            foreach ($category as $key) {
                                                                if($key['id'] == $product['category'])
                                                                    echo $key['name'];
                                                            }
                                                    ?></td>
                                                    <td><?php 
                                                            foreach ($itemUnit as $key) {
                                                                if($key['id'] == $product['item_unit'])
                                                                    echo $key['name'];
                                                            }
                                                    ?></td>
                                                    <td><?php echo $product['unit_price']; ?></td>
                                                    <td><?php echo $product['selling_price']; ?></td>
                                                    <td><?php echo $product['quantity']; ?></td>
                                                    <td><?php echo $product['date']; ?></td>
                                                    <td>
                                                        <button class='btn btn-danger waves-effect btnEditProduct' 
                                                                data-product-code='<?php echo $product['code']; ?>' 
                                                                data-product-name='<?php echo $product['name']; ?>' 
                                                                data-product-category='<?php echo $product['category']; ?>' 
                                                                data-product-item-unit='<?php echo $product['item_unit']; ?>'
                                                                data-product-unit-price='<?php echo $product['unit_price']; ?>'
                                                                data-product-selling-price='<?php echo $product['selling_price']; ?>'
                                                                data-product-quantity='<?php echo $product['quantity']; ?>' 
                                                                data-product-date='<?php echo $product['date']; ?>' 
                                                                data-product-id='<?php echo $product['id']; ?>'  >
                                                            <i class="zmdi zmdi-edit"></i> Edit
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php
                                            } 
		}
	}

	public function update_product(){
		if(isset($_POST['data']) && !empty($_POST['data']) && isset($_POST['id']) && !empty($_POST['id'])){
			$result = $this->model->update_product($_POST['data'],$_POST['id']);
			$product = $this->load_model('product');
			$category = $product->show_category();


			$itemUnit = $product->show_item_unit();

                                            foreach ($result as $product) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $product['code']; ?></td>
                                                    <td><?php echo $product['name']; ?></td>
                                                    <td><?php  
                                                            foreach ($category as $key) {
                                                                if($key['id'] == $product['category'])
                                                                    echo $key['name'];
                                                            }
                                                    ?></td>
                                                    <td><?php 
                                                            foreach ($itemUnit as $key) {
                                                                if($key['id'] == $product['item_unit'])
                                                                    echo $key['name'];
                                                            }
                                                    ?></td>
                                                    <td><?php echo $product['unit_price']; ?></td>
                                                    <td><?php echo $product['selling_price']; ?></td>
                                                    <td><?php echo $product['quantity']; ?></td>
                                                    <td><?php echo $product['date']; ?></td>
                                                    <td>
                                                        <button class='btn btn-danger waves-effect btnEditProduct' 
                                                                data-product-code='<?php echo $product['code']; ?>' 
                                                                data-product-name='<?php echo $product['name']; ?>' 
                                                                data-product-category='<?php echo $product['category']; ?>' 
                                                                data-product-item-unit='<?php echo $product['item_unit']; ?>'
                                                                data-product-unit-price='<?php echo $product['unit_price']; ?>'
                                                                data-product-selling-price='<?php echo $product['selling_price']; ?>'
                                                                data-product-quantity='<?php echo $product['quantity']; ?>' 
                                                                data-product-date='<?php echo $product['date']; ?>' 
                                                                data-product-id='<?php echo $product['id']; ?>'  >
                                                            <i class="zmdi zmdi-edit"></i> Edit
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php
                                            } 
		}
	}

	public function search_product(){

	}


/*
	Transaction 
*/

	//transaction stockin page
	public function stockIn(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';

			$product = $this->load_model('product');
			$data['category'] = $product->show_category();


			$data['itemUnit'] = $product->show_item_unit();

			$data['products'] = $product->show_product();

			$user = $this->load_model('user'); 
			$data['current_user'] = $user->show_current_users_info($_SESSION['user_id']);
			
			$p = $this->load_model('product');
			$data['last_transaction']=$p->get_last_inserted_data();

			$data['newtransaction'] = $p->new_transaction_no($data['last_transaction']['No']);
			
			$this->load_template('home',$data,'stockin');

		}else{
			redirect_to(home_url());	
		}
	}

	public function save_stockin(){
		if(isset($_POST['data']) && !empty($_POST['data'])){
			$product  = $this->load_model('product');
			$product_info = $product->get_product_byId($_POST['data']['product_id']);
			
			echo $product->save_stockin($_POST['data']);
			
		}
	}
	//transaction Stockout page
	public function stockOut(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			
			$client = $this->load_model('client');
			$data['clients'] = $client->show_client();

			$user = $this->load_model('user'); 
			$data['current_user'] = $user->show_current_users_info($_SESSION['user_id']);

			

			$this->load_template('home',$data,'stockout');

		}else{
			redirect_to(home_url());	
		}
	}

	//transaction retuned items page
	public function returnedItems(){
		echo 'page for returned items';
	}

}