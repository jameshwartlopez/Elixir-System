<?php

class ClientModel extends Model{

	public $tblClient = 'tbl_clients';

	public function save_client($data){
		
		if($this->db->insert($this->tblClient,$data)->ja_execute()){
			return $this->show_client();
		}
	}

	public function update_client($data,$id){
		if($this->db->update($this->tblClient,$data)->where(" id = ",$id)->ja_execute()){
			return  $this->show_client();
		}
	}

	public function show_client(){
		return $this->db->select($this->tblClient)->ja_execute();
	}
}