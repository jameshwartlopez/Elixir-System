<?php

class ServiceModel extends Model{

	public $tblname = 'tbl_service';
	public function get_service_byId($id){
		return $this->db->select($this->tblname)->where(" user_id = ",$id)->ja_execute();
	}

	public function save_service($data){
		return $this->db->insert($this->tblname,$data)->ja_execute();
	}

	public function udpate_service($data,$id){
		return $this->db->update($this->tblname,$data)->where(" id = ",$id)->ja_execute();
	}
}