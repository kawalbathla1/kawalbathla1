<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_library
{
    public function __construct(){
		log_message('Debug', 'CommonFunction class is loaded.');
		$this->_CI = &get_instance();
		$this->_CI->load->model('Usermodel', 'DB');
		$this->_CI->load->config('');
		$this->_CI->load->library('session');
	}
    
    /* HEADAER BUTTON LIBRARY */
    public function Api_page(){
        $CI = &get_instance(); 

        $Api_Key = $CI->config->item('shopify_api_key');
        $secret_key = $CI->config->item('shopify_secret');
        $store = $CI->input->get('shop');
        $SHOPIFY_API_VERSION =  $CI->config->item('shopify_api_version');
       
        $condition = array(
            'store' => $store
        ); 

        /* get page list from page api  */
        $select_token = $CI->Usermodel->select_db('Install',$condition);
        $access_token = $select_token['access_token'];
        $callData = array(
            'API_KEY' => $Api_Key,
            'API_SECRET' => $secret_key,
            'SHOP_DOMAIN' => $store,
            'ACCESS_TOKEN' => $access_token
        ); 

        $CI->load->library('Shopify', $callData);
        $shopParams = array(
            'METHOD' => 'GET',
            'URL' =>'/admin/api/'.$SHOPIFY_API_VERSION.'/pages.json'
        );

        $shopDatas = $CI->shopify->call($shopParams);    

        return $shopDatas;
        // echo "<pre>";
        // print_r($shopDatas);
       
    }
    

}