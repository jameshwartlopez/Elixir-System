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
}