<?php

class UserModel extends Model{

	public $tblUser = 'tbl_user';
	public function save_user($data){
		if($this->db->insert($this->tblUser,$data)->ja_execute()){
			return $this->show_all_user($this->db->lastInsertId);
		}
	}

	public function udpate_user($data,$id){
		if($this->db->update($this->tblUser,$data)->where(" id = ",$id)->ja_execute()){
			return  $this->show_all_user();
		}
	}

	public function show_all_user(){
		return $this->db->select($this->tblUser)->ja_execute();
	}
}