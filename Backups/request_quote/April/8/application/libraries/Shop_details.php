<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_details
{
  
    public function __construct()
	{
		log_message('Debug', 'CommonFunction class is loaded.');
		$this->_CI = &get_instance();
		$this->_CI->load->model('Usermodel', 'DB');
		$this->_CI->load->config('');
		$this->_CI->load->library('session');
	}
    public function store_details(){

         /* GET SHOP API from store time Zone(shop api) start */
        $install_condition = array(
            'store' => $store
        );                        
        $select_token = $this->Usermodel->select_db('Install',$install_condition);
        // get access token from array($select_token)
        $access_token = $select_token['access_token'];
        $SHOPIFY_API_VERSION =  $this->config->item('shopify_api_version');
        $callData = array(
            'API_KEY' => $this->config->item('shopify_api_key'),
            'API_SECRET' => $this->config->item('shopify_secret'),
            'SHOP_DOMAIN' => $store,
            'ACCESS_TOKEN' =>  $access_token,
            'API_VERSION' => $SHOPIFY_API_VERSION
        );
        $this->load->library('Shopify', $callData);
        $email_data = array(
            'METHOD' => 'GET',
            'URL' => '/admin/api/'.$SHOPIFY_API_VERSION.'/shop.json',
        );
        $store_data = $this->shopify->call($email_data); 
        $store_timezone = $store_data->shop->iana_timezone;
    }
}