<?php

class Auth extends CI_Controller
{
    
    public function __construct(){
        parent::__construct();
        /*- load library from Commoncallus (app uninstall)webhook  function(call_us) -*/  
        $this->load->library('Commoncallus'); 
    } 
      
    public function access(){
        $base_url = $this->config->item('base_url');
        $store = $this->input->get('shop');
        $store_condition = array(
            'store' => $store
        );

        $get_install_data = $this->Usermodel->select_db('Install', $store_condition);
        
        if ($get_install_data){
                    
            $accessToken = $get_install_data['access_token'];
            //uninstall app
            $data = $this->commoncallus->call_us($store,$accessToken,$base_url);

            $data_header = array(
                'store' => $store,
                'apiKey' => $this->config->item('shopify_api_key')
            );
      

            $this->load->view('header', $data_header);
            $this->load->view('welcome');
            $this->load->view('footer');
          
        }else{

            $this->auth($store);
        }
    }

    public function auth(){
        $store = $this->input->get('shop');
        $data = array(
            'API_KEY' => $this->config->item('shopify_api_key'),
            'API_SECRET' => $this->config->item('shopify_secret'),
            'SHOP_DOMAIN' => $store,
            'ACCESS_TOKEN' => ''
        );
       
        $this->load->library('Shopify', $data); /*load shopify library and pass values in constructor*/
        $scopes = array('read_themes,write_themes,read_script_tags,write_script_tags,read_products,write_products,read_draft_orders,write_draft_orders,read_customers,write_customers,read_price_rules,write_price_rules,read_discounts,write_discounts,write_content,read_orders,write_orders'); /*what app can do*/
        $redirect_url = $this->config->item('redirect_url'); /*redirect url specified in app setting at shopify*/
        $paramsforInstallURL = array(
            'scopes' => $scopes,
            'redirect' => $redirect_url
        );
        $permission_url = $this->shopify->installURL($paramsforInstallURL);
        $this->load->view('auth/escapeIframe', ['installUrl' => $permission_url]);
    }

    /*-$route['schedule_webhook_uninstall'] = 'Auth/authCallback';-*/
    public function authCallback(){
        $code = $this->input->get('code');
        $store = $this->input->get('shop');
        $condition = array(
            'store' => $store
        );

        if (isset($code)) {
            $data = array(
                'API_KEY' => $this->config->item('shopify_api_key'),
                'API_SECRET' => $this->config->item('shopify_secret'),
                'SHOP_DOMAIN' => $store,
                'ACCESS_TOKEN' => ''
            );
            $this->load->library('Shopify', $data); /*-load shopify library and pass values in constructor-*/
        }

        $accessToken = $this->shopify->getAccessToken($code);

        $this->session->set_userdata(['shop' => $store, 'access_token' => $accessToken]);
        $data = array(
            'store' => $store,
            'access_token' => $accessToken
        );
        $this->Usermodel->insert_db('Install', $data);
        redirect('https://'. $store .'/admin/apps');
    }

    public function configureAppWebhooks(){
        /*-$route['configure_app_webhooks'] = 'Auth/configureAppWebhooks'-*/
        $base_url = $this->config->item('base_url');
        $store =  $this->input->post('shop');
        $store_condition = array(
        'store' => $store
        );
        $get_install_data = $this->Usermodel->select_db('Install', $store_condition);
        $access_token = $get_install_data['access_token'];
        /*-- $this->load->library('Commoncallus')=> C first letter always small (commoncallus/AppWebhooks)
        -return status to controller ($library_data)-*/ 
        $library_data =  $this->commoncallus->AppWebhooks($store, $access_token, $base_url);
        if($library_data == 'TRUE'){
            $condition = array(
                'store' => $store
            ); 
            $data_update = array(
                'visit_time' => '2'
            );   
            $visit_time_detail = $this->Usermodel->update_db('Install',$condition, $data_update );
            /*--send response to success function and show alert msg */
            $response = json_encode(array( "status" => true,"message" => "You have successfully created webhook!"));
            echo $response;
        } else{
           echo "create webhook";
        }  
    }
}
