<?php
    header("Access-Control-Allow-Origin: *");
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Ajax extends CI_Controller {
        public function __construct() {
            parent::__construct();
        }
        public function query() {
            // $this->Usermodel->ajaxQuery();
            $action =  $this->input->post('action');
            // echo "hello";
            // echo $check;
            // echo $action;
            if($action == "manual_check") {
                $check =  $this->input->post('check');
                $table_data = array(
                    'manual_check' => $check
                ); 
                $condition = array(
                    "id"=>"1"
                );
                $this->Usermodel->update_test('products_conditions', $table_data,$condition);
                $data = array("data"=>"manual","status"=>true);
                echo json_encode($data);
            }
            if($action == "auto_check") {
                $check =  $this->input->post('check');
                // echo $check;die;
                $table_data = array(
                    'automate_check' => $check
                ); 
                $condition = array(
                    "id"=>"1"
                );
                $this->Usermodel->update_test('products_conditions', $table_data,$condition);
                $data = array("data"=>"auto","status"=>true);
                echo json_encode($data);
            }
        }
    }
?>