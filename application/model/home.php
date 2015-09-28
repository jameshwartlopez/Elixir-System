<?php

class HomeModel extends Model{
	private $tableName = 'tbl_user';

	public function insert($tableName,$columns_values = array()){
		
		$user_insert = array(
						'username'	=> 'sirvan',
						'password'	=> 'this-is-password',
						'Firstname'	=> 'van',
						'LastName'	=> 'van',
						'Contact'	=> '09336888305',
						'Email'		=> 'jameshwartlopez@gmail.com' 
				);

		$user_update = array(
						'username'	=> 'jameskira',
						'password'	=> 'jameskira',
						'Firstname'	=> 'Jameshwart',
						'LastName'	=> 'Lopez',
						'Contact'	=> '09336888305',
						'Email'		=> 'jameshwartlopez@gmail.com' 
				);

		$where = array('user_id <= ' => 3);
		
		$this->db->insert('tbl_user',$user_insert)->ja_execute();
		
		$a = $this->db->select('tbl_user')->ja_execute();
		
	}	

	public function user_login($userName,$password){		
		return $this->db->select('tbl_user')->where('username = ',$userName)->where('password = ',$password)->ja_execute();
	}
}