<?php
class ProductModel extends Model{

	private $tblCategory = 'tbl_categories';
	private $tblItemUnit = 'tbl_itemunits';
	private $tblProducts = 'tbl_products';
/*
	Category Db related events
 */
	public function save_category($data){
		
		if($this->db->insert($this->tblCategory,$data)->ja_execute()){
			return $this->show_category($this->db->lastInsertId);
		}
	}

	public function update_category($data,$id){
		if($this->db->update($this->tblCategory,$data)->where(" id = ",$id)->ja_execute()){
			return  $this->show_category();
		}
	}

	public function show_category($id = null){

		if($id != null){
			return $this->db->select($this->tblCategory)->where('id = ',$id)->ja_execute();
		}else{
			return $this->db->select($this->tblCategory)->ja_execute();
		}		
	}

	public function search_category($searchKey){
		if($searchKey != null){
			return $this->db->select($this->tblCategory)->or_where('name LIKE ','%'.$searchKey.'%')->ja_execute();
		}
	}
/*
	Item unit related events
 */
	public function save_item_unit($data){
		if($this->db->insert($this->tblItemUnit,$data)->ja_execute()){
			return $this->show_item_unit($this->db->lastInsertId);
		}
	}

	public function update_item_unit($data,$where){
		if($this->db->update($this->tblItemUnit,$data)->where('id = ',$where)->ja_execute()){
			return $this->show_item_unit();
		}
	}

	public function show_item_unit($id = null){
		if($id != null){
			return $this->db->select($this->tblItemUnit)->where('id = ',$id)->ja_execute();
		}else{
			return $this->db->select($this->tblItemUnit)->ja_execute();
		}
	}

	public function search_item_unit($searchKey){
		if($searchKey != null){
			return $this->db->select($this->tblItemUnit)->or_where('name LIKE ','%'.$searchKey.'%')->ja_execute();
		}
	}
/*
	Products related events
 */
	public function save_product($data){
		if($this->db->insert($this->tblProducts,$data)->ja_execute()){
			return $this->show_product();
		}
	}

	public function update_product($data,$where){
		if($this->db->update($this->tblProducts,$data)->where('id = ',$where)->ja_execute()){
			return $this->show_product();
		}
	}

	public function show_product($id = null){
		if($id != null){
			return $this->db->select($this->tblProducts)->where('id = ',$id)->ja_execute();
		}else{
			return $this->db->select($this->tblProducts)->ja_execute();
		}
	}

	public function search_product($searchKey){
		if($searchKey != null){
			return $this->db->select($this->tblProducts)->or_where('name LIKE ','%'.$searchKey.'%')->ja_execute();
		}
	}

	//transactions
	
	public function save_stockin($data){
		$last_transaction = $this->get_last_inserted_data();
		
		$new_transaction_no = $this->new_transaction_no($last_transaction['No']);
		
		$product_info = $this->get_product_byId($data['product_id']);
		
		$db = $this->db->pdo->prepare("INSERT INTO tbl_stockin(transaction_no,product_id,date,quantity,user) VALUES(:transaction_no,:product_id,:date,:quantity,:user)");
		$stockin = $db->execute(array(':transaction_no' => $new_transaction_no,':product_id'=>$data['product_id'], ':date'=>$data['date'],':quantity'=>$data['quantity'],':user'=>$_SESSION['user_id']));

		$bal = (int)$product_info['quantity'] + (int)$data['quantity'];
		
		$db =  $this->db->pdo->prepare("INSERT INTO tbl_transaction(No,type,product_id,date,balance,user) VALUES(:No,:type,:product_id,:date,:balance,:user)");
		$transaction = $db->execute(array(':No'=>$new_transaction_no,':type'=>'STOCK IN',':product_id'=>$data['product_id'],':date'=>$data['date'],':balance'=>$bal,':user'=>$_SESSION['user_id']));

		$db =  $this->db->pdo->prepare("UPDATE tbl_products SET quantity = :qty WHERE id = :id ");
		$product = $db->execute(array(':qty'=>$bal,':id'=>$product_info['id']));

		if($product && $transaction && $stockin){
			return 1;
		}

	}
	public function get_last_inserted_data(){
		$db = $this->db->pdo->prepare("Select * from tbl_transaction ORDER BY id DESC LIMIT 1");
		$db->execute();
		return $db->fetch();
	}

	public function get_product_byId($id){
		$db = $this->db->pdo->prepare("Select * from tbl_products where id = ?");
		$db->execute(array($id));
		return $db->fetch();
	}

	public function new_transaction_no($trasno){
		$str_int=((int)($trasno))+1; // convert string to int
			$str_id='';   
			// initialize the return variable
			for($i=1 ;$i<=(6 - (strlen($str_int)));$i++){   // loop through to 6 minus the length of the string passed...
				$str_id.="0";		
			}
			$str_id.=($str_int);
			return $str_id;
	}

	public function stockin_report($dateFrom='',$dateTo=''){
		$query = "SELECT 
						tbl_stockin.id,
						tbl_stockin.transaction_no,
						tbl_stockin.product_id,
						tbl_stockin.quantity,
						tbl_stockin.date as stockinDate,
						tbl_products.code,
						tbl_products.name,
						tbl_products.item_unit,
						tbl_products.unit_price,
						tbl_products.selling_price,
						tbl_products.quantity as pqty,
						tbl_user.username,
						tbl_user.Firstname,
						tbl_user.LastName,
						tbl_user.id
				FROM tbl_stockin 
				INNER JOIN tbl_products ON tbl_products.id = tbl_stockin.product_id 
				INNER JOIN tbl_user ON tbl_user.id = tbl_stockin.user 
						";
			if($dateFrom != '' && $dateTo != ''){
				$query .= " WHERE (tbl_stockin.date BETWEEN '".$dateFrom."' AND '".$dateTo."') ";
			}
		$db = $this->db->pdo->prepare($query);
		$db->execute();
		return $db->fetchAll();
	}
}