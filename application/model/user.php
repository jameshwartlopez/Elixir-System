<?php

class UserModel extends Model{

	public $tblUser = 'tbl_user';
	public function save_user($data){
		return $this->db->insert($this->tblUser,$data)->ja_execute();
	}

	public function udpate_user($data,$id){
		return $this->db->update($this->tblUser,$data)->where(" id = ",$id)->ja_execute();
	}

	public function show_users_info($id){
		return $this->db->select($this->tblUser)->where(" id != ",$id)->ja_execute();
	}

	public function show_current_users_info($id){
		return array_shift($this->db->select($this->tblUser)->where(" id = ",$id)->ja_execute());
	}	

	public function check_username($username){
		return $this->db->select($this->tblUser)->where(" username = ",$username)->ja_execute();
	}

}