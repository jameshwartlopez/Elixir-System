<?php

class ProductController extends Controller{
	public function index(){

		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			$this->load_template('home',$data);

		}else{
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$this->load_view('login',$data);	
			
		}
	}

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


	//products profile page
	public function productsProfile(){

	}

	//products Item Unit page
	public function itemUnit(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$data['companyName'] = 'Elixir Industrial Equipment Inc.';
			$this->load_template('home',$data,'item_unit');

		}else{
			$data['title'] = 'Elixir Industrial Equipment Inc. Cebu-Branch';
			$this->load_view('login',$data);	
			
		}
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