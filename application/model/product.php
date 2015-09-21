<?php
class ProductModel extends Model{

	private $tblCategory = 'tbl_categories';
	private $tblItemUnit = 'tbl_item_unit';
	private $tblProducts = 'tbl_products';

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
			return $this->db->select($this->tblCategory)->or_where('name LIKE ',"%".$searchKey."%")->ja_execute();
		}
	}

	public function save_item_unit($data){
		return $this->db->insert($this->tblItemUnit,$data)->ja_execute();
	}

	public function update_item_unit($data,$where){
		return $this->db->update($data)->where($where)->ja_execute();
	}

	public function show_all_item_unit(){
		return $this->db->select($this->tblCategory)->ja_execute();
	}
}