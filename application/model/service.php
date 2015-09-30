<?php

class ServiceModel extends Model{

	public $tblname = 'tbl_service';
	public function get_service_byId($id){
		return $this->db->select($this->tblname)->where(" user_id = ",$id)->ja_execute();
	}

	public function get_all_service(){
		return $this->db->select($this->tblname)->ja_execute();
	}
	
	public function service_report($dateFrom='',$dateTo=''){
		$query = "SELECT 
						tbl_service.id,
						tbl_service.date,
						tbl_service.client_id,
						tbl_service.printer_model,
						tbl_service.remarks,
						tbl_service.status,
						tbl_service.user_id,
						tbl_user.username,
						tbl_user.Firstname,
						tbl_user.LastName,
						tbl_clients.name,
						tbl_clients.address,
						tbl_clients.telphone_number,
						tbl_clients.fax_number,
						tbl_clients.email,
						tbl_clients.contact_person
				FROM tbl_service
				INNER JOIN tbl_user ON tbl_user.id = tbl_service.user_id 
				INNER JOIN tbl_clients ON tbl_service.client_id = tbl_clients.id 
						";
			if($dateFrom != '' && $dateTo != ''){
				$query .= " WHERE (tbl_service.date BETWEEN '".$dateFrom."' AND '".$dateTo."') ";
			}
		$db = $this->db->pdo->prepare($query);
		$db->execute();
		return $db->fetchAll();
	}
	public function save_service($data){
		return $this->db->insert($this->tblname,$data)->ja_execute();
	}

	public function udpate_service($data,$id){
		return $this->db->update($this->tblname,$data)->where(" id = ",$id)->ja_execute();
	}
}