<?php

class ProductController extends Controller{
	public function index(){

		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';

			$product = $this->load_model('product');
			$data['category'] = $product->show_category();


			$data['itemUnit'] = $product->show_item_unit();
			$this->load_template('home',$data);

		}else{
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$this->load_view('login',$data);	
			
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
			$this->load_template('home',$data,'category');

		}else{
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$this->load_view('login',$data);	
			
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
			$this->load_template('home',$data,'item_unit');

		}else{
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$this->load_view('login',$data);	
			
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

	//products profile page
	public function productsProfile(){

	}

	

/*
	Transaction 
*/

	//transaction stockin page
	public function stockIn(){
		echo 'page for stockin';
	}

	//transaction Stockout page
	public function stockOut(){
		echo 'page for stockout';
	}

	//transaction retuned items page
	public function returnedItems(){
		echo 'page for returned items';
	}

}