<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commoncallus
{
  
    public function __construct()
	{
		log_message('Debug', 'CommonFunction class is loaded.');
		$this->_CI = &get_instance();
		$this->_CI->load->model('Usermodel', 'DB');
		$this->_CI->load->config('');
		$this->_CI->load->library('session');
	}

    public function call_us($shop, $access_token ,$base_url){
        /*CI = &get_instance() get data from config to library 
         call_us($shop, $access_token) send by Auth controller/access($this->commoncallus->call_us($shop, $access_token))*/
        $CI = &get_instance();
        $SHOPIFY_API_VERSION =  $CI->config->item('shopify_api_version');
        $callData = array(
            'API_KEY' => $CI->config->item('shopify_api_key'),
            'API_SECRET' =>  $CI->config->item('shopify_secret'),
            'SHOP_DOMAIN' => $shop,
            'ACCESS_TOKEN' => $access_token
        );
         $CI->load->library('Shopify', $callData);
      
        /*--Retrieves a list of webhooks(start)--*/
        $retrieves_list_webhook = array(
            'METHOD' => 'GET',
            'URL' => '/admin/api/' . $SHOPIFY_API_VERSION . '/webhooks.json',
        );
        $retrieves_list = $CI->shopify->call($retrieves_list_webhook);
        /*--Retrieves a list of webhooks(end)-*/

        /*-app uninstall_webhook (data)start--
            "address"==$route['schedule_app_uninstall'] = 'Webhook/appUninstall'--*/
        $app_uninstall_webhook_param = array(
            'METHOD' => 'POST',
            'URL' => '/admin/api/' . $SHOPIFY_API_VERSION . '/webhooks.json',
            'DATA' => array(
                "webhook" => array(
                    "topic" => "app/uninstalled",
                    "address" => $base_url."schedule_app_uninstall"
                )
            )
        );
        /*--app uninstall_webhook (data)end--*/
        if (empty($retrieves_list->webhooks)) {
            /*-app/uninstalled webhook--- $product_create_webhook--(start)-*/
            $order_data = $CI->shopify->call($app_uninstall_webhook_param);
            /*-app/uninstalled webhook-----(end)-*/
        }else{
            $items = [];
            /*-using foreach get address value  from  $retrieves_list- */
            foreach ($retrieves_list->webhooks as $webhookKey) {
                /*-$items= we get address-*/
                $items[] = $webhookKey->address;
            }
            if (!in_array($base_url."schedule_app_uninstall", $items)) {
                $order_data = $CI->shopify->call($app_uninstall_webhook_param);
            }
        } 
    }

    public function AppWebhooks($shop, $access_token ,$base_url){
        $CI = &get_instance();

        $SHOPIFY_API_VERSION =  $CI->config->item('shopify_api_version');
        $callData = array(
            'API_KEY' => $CI->config->item('shopify_api_key'),
            'API_SECRET' =>  $CI->config->item('shopify_secret'),
            'SHOP_DOMAIN' => $shop,
            'ACCESS_TOKEN' => $access_token
        ); 
         
        $CI->load->library('Shopify', $callData);
        /*--Retrieves a list of webhooks(start)--*/
        $retrieves_list_webhook = array(
            'METHOD' => 'GET',
            'URL' => '/admin/api/' . $SHOPIFY_API_VERSION . '/webhooks.json',
        );
        $retrieves_list = $CI->shopify->call($retrieves_list_webhook);
        /*--Retrieves a list of webhooks(end)-*/

        /*-productCreate webhook--(start)--*/
        $productCreate_webhook = array(
            'METHOD' => 'POST',
            'URL' => '/admin/api/'.$SHOPIFY_API_VERSION.'/webhooks.json',
            'DATA' => array(                   
                "webhook" => array(       
                "topic" => "products/create",  
                "address" => $base_url."product_create_webhooks",
                "format" => "json" 
                )
            )       
         );
        /* $productCreate_data = $this->shopify->call($productCreate_webhook); 
        productCreate webhook-------(end)-*/
 
        /*productUpdate webhook----(start)--*/
        $productUpdate_webhook = array(
        'METHOD' => 'POST',
        'URL' => '/admin/api/'.$SHOPIFY_API_VERSION.'/webhooks.json',
        'DATA' => array(                   
            "webhook" => array(
            "topic" => "products/update",             
            "address" => $base_url."product_update_webhooks" ,
            "format" => "json"  
            )
        )       
        );
        /*$productUpdate_data = $this->shopify->call($productUpdate_webhook); 
        productUpdate webhook-----(end)-*/
 
        /*orderCreate webhook---------(start)-*/
        $orderCreate_webhook = array(
            'METHOD' => 'POST',
            'URL' => '/admin/api/'.$SHOPIFY_API_VERSION.'/webhooks.json',
            'DATA' => array(                   
                "webhook" => array(        
                "topic" => "orders/create",  
                "address" => $base_url."order_create_webhooks",
                "format" => "json" 
                )
            )       
        );
        /*$orderCreate_data = $this->shopify->call($orderCreate_webhook); 
        orderCreate webhook------(end)*/
 
        /*orderUpdate webhook---------------(start)-*/
        $orderUpdate_webhook = array(
            'METHOD' => 'POST',
            'URL' => '/admin/api/'.$SHOPIFY_API_VERSION.'/webhooks.json',
            'DATA' => array(                   
                "webhook" => array(  
                    "topic" => "orders/updated",            
                    "address" => $base_url."order_update_webhooks",
                    "format" => "json"  
                )
            )       
        );
        /*$orderUpdate_data = $this->shopify->call($orderUpdate_webhook);
        orderUpdate webhook---------------(end)-*/
 
        /*if retrieves_list_webhook empty then create product,order webhooks.*/
        if(empty($retrieves_list->webhooks)) {
        /*productCreate webhook*/
        $productCreate_data = $CI->shopify->call($productCreate_webhook); 
        /*orderCreate webhook*/
        $orderCreate_data = $CI->shopify->call($orderCreate_webhook); 
        /*productUpdate webhook*/
        $productUpdate_data = $CI->shopify->call($productUpdate_webhook);
        /*orderUpdate webhook*/
        $orderUpdate_data = $CI->shopify->call($orderUpdate_webhook);
        }else{
            $items = [];
            /*-using foreach get address value  from  $retrieves_list -*/
            foreach ($retrieves_list->webhooks as $webhookKey) {
                /*--$items= we get address--*/
                $items[] = $webhookKey->address;
            }
        
            if (!in_array($base_url."product_create_webhooks", $items)) {
                $productCreate_data = $CI->shopify->call($productCreate_webhook); 
            }

            if (!in_array($base_url."order_create_webhooks", $items)) {
                $orderCreate_data = $CI->shopify->call($orderCreate_webhook);  
            }

            if (!in_array($base_url."product_update_webhooks", $items)) {
                $productUpdate_data = $CI->shopify->call($productUpdate_webhook); 
            }

            if (!in_array($base_url."order_update_webhooks", $items)) {
                $orderUpdate_data = $CI->shopify->call($orderUpdate_webhook);
            }
        }
        /*-return status to controller ($library_data)-*/
        $status = 'TRUE';
        return $status;
    }

    /* for header controller['customer_listing'] = 'Custom/forms',
    ['registration_form'] = 'Custom/registration'*/ 
    public function header_data(){
        $CI = &get_instance();
        $base_url =  $CI->config->item('base_url');
        $shop = $CI->input->get('shop');
        $store_condition = array(
            'store' => $shop
        );
        $get_install_data = $CI->Usermodel->select_db('Install', $store_condition);
            $visit_time = $get_install_data['visit_time'];
            $access_token = $get_install_data['access_token'];
            
            $data_header = array(
                'visit_time' => $visit_time,
                'store' => $shop
            );
            /* custom controller/forms;*/ 
            return $data_header;       
    }  
    
  
}
?>