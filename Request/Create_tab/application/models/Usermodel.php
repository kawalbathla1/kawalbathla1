<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends CI_model
{
	public function __construct() {
        parent::__construct();
    }


	/* 1.) ---- Select Query for Single Rows (Start) -----*/
		public function select_db($tablename, $condition){
			$this->db->select('*');
			$this->db->from($tablename);
			$this->db->where($condition);
			if($query=$this->db->get()){
				return $query->row_array();
			}else{
				return false;
			}
		}
	/*------- Select Query for Single Rows (End) ------*/

	/* 2.) ------- Delete Query for Rows (Start)  ---------------*/
	public function delete_db($tablename,$where_condition){
		$this->db->where($where_condition);
		$query =  $this->db->delete($tablename);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	/*------- Delete Query for Rows (End) ---------------*/

	/* 3.) --------- Insert Query (Start) --------*/
	public function insert_db($tablename, $data){
		$query = $this->db->insert($tablename, $data);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	/*-------- Insert Query (End)--------------- */


	/* 4.) --------- Update Query (Start) ---------------*/
	public function update_db($tablename,$wherecondition,$setvalue){
		$check = $this->db->where($wherecondition);
		$query= $this->db->update($tablename,$setvalue);	
		if($query){
			return true;
		}else{
			return false;
		}
	}
	/*---------------- Update Query (End) -------------*/
	

	/* 5.) Select  Multiple Rows (Start)*/
	public function select_multiple_rows($tablename, $where_condition){
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($where_condition);
		if($query=$this->db->get()){
			return $query->result();
		}else{
			return false;
		}
	}
	/* Select Query Multiple Rows End */


	/* Select Query to Check Rows Exist Start */
	public function store_check($tablename,$wherecondition){
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($wherecondition);
		$query=$this->db->get();
		return $query->num_rows();
		// if($query->num_rows()>0){
		// 	return true;
		// }else{
		// 	return false;
		// }
	}
	/* Select Query to Check Rows Exist End */
	/* Select Query Get Access Token Start */
	public function get_accessToken($store){
		$this->db->select('access_token');
		$this->db->from('install');
		$this->db->where('store',$store);
		if($query=$this->db->get()){
			return $query->row_array();
		}else{
			return false;
		}
	}
	/* Select Query Get Access Token End */
	public function getParticularField($field, $tablename, $condition){
		$this->db->select($field);
		$this->db->from($tablename);
		$this->db->where($condition);
		if($query=$this->db->get()){
			return $query->result();
		}else{
			return false;
		}
	}
	
	/* Select Query Whole Table Data Start */
	public function getCustomeDetails($tablename, $where_condition){
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($where_condition);
		if($query=$this->db->get()){
			return $query->result();
		}else{
			return false;
		}
	}
	/* Select Query Whole Table Data End */
	/* Select Query Multiple Rows Start*/
	public function getMultipleRows($tablename, $where_condition){
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($where_condition);
		if($query=$this->db->get()){
			return $query->result();
		}else{
			return false;
		}
	}
	/* Select Query Multiple Rows End */

	
	
	/*************Get Last Record Start*************************/
	public function getLastRecord($tablename,$where_condition){
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($where_condition);
		$this->db->order_by("id", "desc");
		$this->db->limit(1);
		if($query=$this->db->get()){
			return $query->result();
		}else{
			return false;
		}
	}
	/*************Get Last Record Start shi se*************************/
	public function getLastRecordNew($tablename){
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->order_by("id", "desc");
		$this->db->limit(1);
		if($query=$this->db->get()){
			return $query->result();
		}else{
			return false;
		}
	}
	/*************Get Last Record End***************************/
	// SELECT * FROM Appointments WHERE store='ankit-testing-store1.myshopify.com' And (sd_bookdate) BETWEEN "2021-08-29" AND "2021-10-02";
	public function getCurrentMonthData($tablename, $condition, $setDate, $endDate){
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($condition);
		$this->db->where('date >=',$setDate);
		$this->db->where('date <=',$endDate);
		if($query=$this->db->get()){
			return $query->result();
		}else{
			return false;
		}  
	}

	public function getSelectedEmployeeData($tablename,$condition,$emp_ids){
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($condition);
		$this->db->where($emp_ids);
		if($query=$this->db->get()){
			return $query->result();
		}else{
			return false;
		}
	}
}