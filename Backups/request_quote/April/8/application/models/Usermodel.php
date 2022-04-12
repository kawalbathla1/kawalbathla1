<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends CI_model
{
	public function __construct() {
        parent::__construct();
    }


	/* 1.) ---- Select Query for Single Rows (Start) -----*/
		public function select_db($tablename, $condition) {
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

		public function insert_db($tablename,$data) {
			$this->db->insert($tablename,$data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		public function insert_test($tablename,$data) {
			$this->db->insert($tablename,$data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		public function select_project($tablename,$condition) {
			$this->db->select('*');
			$this->db->from($tablename);
			$this->db->where($condition);
			if($query=$this->db->get()){
				return $query->row_array();
			}else{
				return false;
			}
		}
		public function select_multiproject($tablename,$condition) {
			$this->db->select('*');
			$this->db->from($tablename);
			$this->db->where($condition);
			if($query = $this->db->get()){
				return $query->result();
				// return $result;
			}else{
				return false;
			}
		}
		public function update_test($tablename,$data,$condition) {
			$this->db->where($condition);
			$this->db->update($tablename,$data);
		}
		public function getToken($tablename,$store_condition) {
			$this->db->select("access_token");
			$this->db->from($tablename);
			$this->db->where($store_condition);
			if($query = $this->db->get()){
				return $query->result();
				// return $result;
			}else{
				return false;
			}
		}
	}