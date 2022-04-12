<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_library
{
    public function __construct(){
		log_message('Debug', 'CommonFunction class is loaded.');
		$this->_CI = &get_instance();
		$this->_CI->load->model('Usermodel', 'DB');
		$this->_CI->load->config('');
		$this->_CI->load->library('session');
	}
    
    /* HEADAER BUTTON LIBRARY */
    public function header_data(){
        $CI = &get_instance(); 
        $Api_Key = $CI->config->item('shopify_api_key');

        $store = $CI->input->get('shop');
        
        $store_condition = array(
            'store' => $store,
            'Api_Key' => $Api_Key
        );

        // echo '<pre>';
        // print_r($store_condition);

        return $store_condition;  
    }

    

}