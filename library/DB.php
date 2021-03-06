<?php

class DB extends DB_config{

	public $db;
	protected $dns;
	public $lastInsertId;

	public $tables  = array();
	public $columnsName = array();
	public $columnsValues = array();

	public $sql = '';
	protected static $query='';
	protected static $where_query = '';

	private static $join = '';

	public $statement;
	public $result;

	public $pdo;
	public function __construct(){
		try{

			$this->dns = 'mysql:host='.$this->host.';dbname='.$this->dbname;
			$this->db = new PDO($this->dns,$this->username,$this->password);
			$this->pdo = $this->db;
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//save all table name in our variable;
			$tables= $this->db->query('SHOW TABLES');
			$this->tables = $tables->fetchAll(PDO::FETCH_COLUMN); 

		}catch(PDOExceptions $e){
			throw new Exception("Error In Connecting to Database: ".$e->getMessage(), 1);
		}

	}

	public function select($tblname,$columns=array(),$where = array()){
		
		if($this->table_exists($tblname)){
			
			$strSelectquery ='';

			if($columns == null && $where == null){
				$strSelectquery = 'SELECT * FROM '.$tblname;
			}else if($where == null){
				$strSelectquery = 'SELECT '.implode(',',$columns).' FROM '.$tblname;
			}else{
				
				$where_str ="";
				if($where != null && $columns != null){
					$where_str = " WHERE ";

					if(is_array($where)){
						$col_where = array();
						foreach ($where as $key => $value) {

							array_push($col_where,$key);
							array_push($this->columnsValues,$value);

						}

						$col_where[count($col_where) -1].=' ? ';
						$where_str .= implode(' ? AND ',$col_where);
					}

					
				}
				$strSelectquery = 'SELECT '.implode(', ',$columns).' FROM '.$tblname.' '.$where_str;
			}
			
			$this->query = $strSelectquery;
		}
		
		

		return $this;
	}

	// This method is comming soon!
	// public function inner_join($tblName,Array $where){
		
	// 	if($this->table_exists($tblName)){
	// 		$this->join = 'INNER JOIN '.$tblName.' ';
	// 		echo $this->query;
	// 	}
		
	// 	return $this;
	// }

	public function insert($tblname,$columnsAndValues){
		
		if($this->table_exists($tblname)){
			foreach ($columnsAndValues as $column => $value) {
		
				array_push($this->columnsName,$column);
				array_push($this->columnsValues,$value);

			}

			$val = array();
			for($i = 0 ; $i < count($this->columnsValues) ; $i++){
				array_push($val,'?');
			}
			$this->query = 'INSERT INTO '.$tblname.'('.implode(',',$this->columnsName).') VALUES ('.implode(',',$val).')';
				
		}
		return $this;

	}


	public function update($tblname,$columnsAndValues,$where = array()){
		
		if($this->table_exists($tblname)){

			foreach ($columnsAndValues as $column => $value) {
		
				array_push($this->columnsName,$column);
				array_push($this->columnsValues,$value);
			}

			$col = array();

			for($i = 0 ; $i < count($this->columnsValues) ; $i++){
				array_push($col,'?');
			}

			$where_str ="";
			if($where != null){
				$where_str = " WHERE ";

				if(is_array($where)){
					$col_where = array();
					foreach ($where as $key => $value) {

						array_push($col_where,$key);
						array_push($this->columnsValues,$value);

					}

					$col_where[count($col_where) -1].=' ? ';
					$where_str .= implode(' ? AND ',$col_where);
				}

				
			}
			$this->columnsName[count($this->columnsName) -1] .=" = ? " ;
			
			$this->query = 'UPDATE '.$tblname.' SET '.implode(' = ?, ',$this->columnsName).' '.$where_str.' ';
		}
		
		return $this;

	}

	public function delete($tblname,$where = array()){
		if($this->table_exists($tblname)){
			$where_str ="";
			if($where != null){
				$where_str = " WHERE ";
				
				if(is_array($where)){
					$col_where = array();
					foreach ($where as $key => $value) {
						array_push($col_where ,$key);
						array_push($this->columnsValues,$value);
					}

					$col_where[count($col_where) -1].=' ? ';
					$where_str .= implode(' ? AND ' ,$col_where);
				}
			}
			$this->query = 'DELETE FROM '.$tblname.' '.$where_str;
		}
	
		return $this;

	}

	public function table_exists($tblName){
		//return array_key_exists($tblName,$this->tables)? 'true': 'false';
		return in_array($tblName,$this->tables)? true: false;
	}

	public function where($col_withoperator,$value){
		
		if(isset($this->where_query) && !empty($this->where_query)){
			$this->where_query .=' AND '.$col_withoperator.' ? ';
		}else if(!isset($this->where_query) && empty($this->where_query)){
			$this->where_query ='WHERE '.$col_withoperator.' ? ';
		}
		
		array_push($this->columnsValues, $value);


		return $this;
	}

	//This method will be updated later
	public function or_where($col_withoperator,$value){
	
		if(isset($this->where_query) && !empty($this->where_query)){
			$this->where_query .=' OR '.$col_withoperator.' ? ';
		}else if(!isset($this->where_query) && empty($this->where_query)){
			$this->where_query ='WHERE '.$col_withoperator.' ? ';
		}	
		array_push($this->columnsValues, $value);

		return $this;
	}

	public function and_where($col_withoperator,$value){
		$this->where($col_withoperator,$value);
	}

	public function raw_query($query){

		if(preg_match('/^SELECT/i',$this->query)){
		
			$this->statement = $this->db->prepare($this->query);
			$this->statement->execute($this->columnsValues);
			$this->statement->fetchAll();
		}else{
			$this->statement = $this->db->prepare($this->query);
			$this->statement->execute($this->columnsValues);
		
		}
	}

	public function ja_execute(){
		try{

			if(isset($this->where_query)  && !empty($this->where_query)){
				$this->query .=" ".$this->where_query;
			}
			
			
			if(preg_match('/^SELECT/i',$this->query)){
			
				$this->statement = $this->db->prepare($this->query);
				$this->result = $this->statement->execute($this->columnsValues);
				if($this->result){
					$this->result = $this->statement->fetchAll();
				}
				
			}else{

				$this->statement = $this->db->prepare($this->query);
				$this->result =	$this->statement->execute($this->columnsValues);
				$this->lastInsertId = $this->db->lastInsertId();
			}
			$this->sql= $this->query;
			
			$this->resetAttributes();

		}catch(PDOExceptions $e){
			throw new Exception("Error In Connecting to Database: ".$e->getMessage(), 1);
		}

		
		return $this->result;
		
	}

	private function resetAttributes(){
		if(isset($this->where_query) && !empty(trim($this->where_query))){
			$this->where_query='';
		}

		if(isset($this->query) && !empty(trim($this->query))){
			$this->query ='';
		}

		if(isset($this->columnsName) && !empty($this->columnsName)){
			$this->columnsName = array();
		}
		if(isset($this->columnsValues) && !empty($this->columnsValues)){
			$this->columnsValues = array();
		}

		if(isset($this->join) && !empty($this->join)){
			$this->join = '';
		}

		
	}


}

