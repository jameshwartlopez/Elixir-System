<?php
class ProductModel extends Model{

	private $tblCategory = 'tbl_categories';
	private $tblItemUnit = 'tbl_itemunits';
	private $tblProducts = 'tbl_products';
	private $tblStockOut  = 'tbl_stockout';
	private $tbltransaction = 'tbl_transaction';
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
	public function save_stockOutList($data,$terms,$client_id,$date,$discount,$type){
		$last_transaction = $this->get_last_inserted_data();
		$new_transaction_no = $this->new_transaction_no($last_transaction['No']);

		$check_client = count($this->check_client_order($client_id));
		$stat = 'unpaid';
		
		if($check_client >= 1){
			$stat = 'hold';
		}else if($check_client <= 0){
			$stat = 'unpaid';
		}

		
		foreach ($data as $stockout) {
			$stock_row_data = array(
				':transaction_no'=>$new_transaction_no,
				':product_id'=>$stockout['product_id'],
				':quantity'=>$stockout['quantity'],
				':client_id'=>$client_id,
				':terms'=>$terms,
				':date'=>$date,
				':discount'=>$discount,
				':user_id'=>$_SESSION['user_id'],
				':status'=> $stat,
				':type'=>$type
			);

			$product = $this->get_product_byId($stockout['product_id']);
			$db =  $this->db->pdo->prepare("INSERT INTO ".$this->tblStockOut."
												(transaction_no,product_id,quantity,client_id,terms,date,discount,user_id,status,type) VALUES
												(:transaction_no,:product_id,:quantity,:client_id,:terms,:date,:discount,:user_id,:status,:type) ");
			$sOut = $db->execute($stock_row_data);


			$balance = (int)$product['quantity'] - (int)$stockout['quantity'];

			$stockOutTransaction = array(
				':No'=>$new_transaction_no,
				':type'=>'STOCK OUT',
				':product_id'=>$stockout['product_id'],
				':date'=>$date,
				':balance'=>$balance,
				':user'=>$_SESSION['user_id']
			);

			$db =  $this->db->pdo->prepare("INSERT INTO ".$this->tbltransaction."
													(No,type,product_id,date,balance,user) VALUES
													(:No,:type,:product_id,:date,:balance,:user)");
			$transaction = $db->execute($stockOutTransaction);

			
			$db =  $this->db->pdo->prepare("UPDATE ".$this->tblProducts." SET quantity = :qty WHERE id = :id ");
			$product = $db->execute(array(':qty'=>$balance,':id'=>$stockout['product_id']));

			print_r($product);
		}
		
	}
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

	public function check_client_order($clientid,$status = 'unpaid'){
		$db = $this->db->pdo->prepare("SELECT distinct(transaction_no),status from tbl_stockout where status='".$status."' and client_id  = ".$clientid);
		$db->execute();
		return $db->fetchAll();

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

	public function product_lowItems(){
		$db = $this->db->pdo->prepare('SELECT * FROM tbl_products where quantity < 10');
		$db->execute();
		return $db->fetchAll();
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

	public function stocOut_report($datefrom = '' , $dateto= ''){
		$query = "SELECT 
						tbl_products.category,
						tbl_products.code,
						tbl_products.name,
						tbl_products.item_unit,
						tbl_products.unit_price,
						tbl_products.selling_price,
						(tbl_products.selling_price * tbl_stockout.quantity) as total,
						tbl_stockout.transaction_no,
						tbl_stockout.quantity,
						tbl_stockout.terms,
						tbl_stockout.date,
						tbl_stockout.discount,
						tbl_stockout.status,
						tbl_stockout.type,
						tbl_stockout.id as so_id,
						tbl_clients.id as c_id,
						tbl_clients.name,
						tbl_user.id,
						tbl_user.username,
						tbl_user.Firstname,
						tbl_user.LastName,
						tbl_user.id
				FROM tbl_stockout 
				INNER JOIN tbl_products on tbl_products.id = tbl_stockout.product_id 
				INNER JOIN tbl_user on tbl_user.id = tbl_stockout.user_id 
				INNER JOIN tbl_clients on tbl_clients.id = tbl_stockout.client_id ";

				if($datefrom != '' && $dateto != ''){
					$query .= " WHERE tbl_stockout.date BETWEEN '".$datefrom."' AND '".$dateto."' ";
				}
			// echo $query;
		$db = $this->db->pdo->prepare($query);
		$db->execute();
		return $db->fetchAll();
	}


	public function return_so_item($datefrom= '' ,$dateto= ''){
		$query = "SELECT 
						tbl_products.category,
						tbl_products.code,
						tbl_products.name,
						tbl_products.item_unit,
						tbl_products.unit_price,
						tbl_products.selling_price,
						(tbl_products.selling_price * tbl_stockout.quantity) as total,
						tbl_stockout.transaction_no,
						tbl_stockout.quantity,
						tbl_stockout.terms,
						tbl_stockout.date,
						tbl_stockout.discount,
						tbl_stockout.status,
						tbl_stockout.id as so_id,
						tbl_clients.id as c_id,
						tbl_clients.name,
						tbl_user.id,
						tbl_user.username,
						tbl_user.Firstname,
						tbl_user.LastName,
						tbl_user.id
				FROM tbl_stockout 
				INNER JOIN tbl_products on tbl_products.id = tbl_stockout.product_id 
				INNER JOIN tbl_user on tbl_user.id = tbl_stockout.user_id 
				INNER JOIN tbl_clients on tbl_clients.id = tbl_stockout.client_id where tbl_stockout.o_return =1 ";
				
				if($datefrom !='' && $dateto != ''){
					$query .= " AND tbl_stockout.date BETWEEN '".$datefrom."'  AND '".$dateto."' ";
				}
		$db = $this->db->pdo->prepare($query);
		$db->execute();
		return $db->fetchAll();
	}

	public function unreturned_so_item(){
		$query = "SELECT 
						tbl_products.category,
						tbl_products.code,
						tbl_products.name,
						tbl_products.item_unit,
						tbl_products.unit_price,
						tbl_products.selling_price,
						(tbl_products.selling_price * tbl_stockout.quantity) as total,
						tbl_stockout.transaction_no,
						tbl_stockout.quantity,
						tbl_stockout.terms,
						tbl_stockout.date,
						tbl_stockout.discount,
						tbl_stockout.status,
						tbl_stockout.id as so_id,
						tbl_clients.id as c_id,
						tbl_clients.name,
						tbl_user.id,
						tbl_user.username,
						tbl_user.Firstname,
						tbl_user.LastName,
						tbl_user.id
				FROM tbl_stockout 
				INNER JOIN tbl_products on tbl_products.id = tbl_stockout.product_id 
				INNER JOIN tbl_user on tbl_user.id = tbl_stockout.user_id 
				INNER JOIN tbl_clients on tbl_clients.id = tbl_stockout.client_id where tbl_stockout.o_return =0 ";
		$db = $this->db->pdo->prepare($query);
		$db->execute();
		return $db->fetchAll();
	}

	public function stockPile_report($datefrom="",$dateto=""){
		$query = "SELECT
					tbl_transaction.No,
					tbl_transaction.type,
					tbl_transaction.product_id,
					tbl_transaction.date,
					tbl_transaction.balance,
					tbl_transaction.user,
					tbl_stockin.quantity as sin_qty,
					tbl_stockout.quantity as sout_qty,
					tbl_user.Firstname,
					tbl_user.LastName,
					tbl_products.name,
					tbl_products.category,
					tbl_products.item_unit
				FROM tbl_transaction
				LEFT JOIN tbl_user ON tbl_user.id = tbl_transaction.user 
				LEFT JOIN tbl_products ON tbl_products.id = tbl_transaction.product_id 
				LEFT JOIN tbl_stockout ON tbl_transaction.No = tbl_stockout.transaction_no 
				LEFT JOIN tbl_stockin ON tbl_stockin.transaction_no = tbl_transaction.No ";
				if($datefrom != ''  && $dateto != ''){
					$query.=" WHERE tbl_transaction.date BETWEEN '".$datefrom."' AND '".$dateto."' ";
				}
		$db = $this->db->pdo->prepare($query);
		$db->execute();
		return $db->fetchAll();
	}

	public function update_stockout_to_paid($transaction_no,$clientid){
		$db =  $this->db->pdo->prepare("UPDATE tbl_stockout SET status = 'paid' WHERE transaction_no  = :tran ");
		$product = $db->execute(array(':tran'=>$transaction_no));

		//UPDATE tbl_stockout SET status = 'Unpaid' WHERE client_id = 3 and status='hold'
		$db =  $this->db->pdo->prepare("UPDATE tbl_stockout SET status = 'unpaid' WHERE client_id = :client_id and status='hold' ");
		$client = $db->execute(array(':client_id'=>$clientid));
		return $product;
	}
	public function transaction_data($datefrom= '',$dateto=''){

		$query = " SELECT DISTINCT(transaction_no) as No, client_id FROM tbl_stockout ";

		if($datefrom != '' && $dateto !=''){
			$query .= " WHERE date BETWEEN '".$datefrom."' AND '".$dateto."' ";
		}
		$db = $this->db->pdo->prepare($query);
		$db->execute();
		return $db->fetchAll();	

	}

	public function save_return_item($so_id){
		$db = $this->db->pdo->prepare('UPDATE tbl_stockout SET o_return = 1 WHERE id = :stockout_id');
		return $db->execute(array(':stockout_id'=>$so_id));
	}

	public function select_allReturnData(){
		$db = $this->db->pdo->prepare("SELECT * FROM tbl_return ");
		$db->execute();
		return $db->fetchAll();
	}

}