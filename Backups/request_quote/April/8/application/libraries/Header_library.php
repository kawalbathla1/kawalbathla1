<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Header_library {
        public function __construct() {
            $this->_CI = &get_instance();
        }
        public function header_data() {
            $CI = &get_instance();
            $api_key = $CI->config->item('shopify_api_key');
           
            $store = $CI->input->get('shop');
            
            $condition = array("store"=>$store,'shopify_api_key'=>$api_key);
       
            return $condition;
        }
    }
?>