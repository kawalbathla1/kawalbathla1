<?php 
header("Access-Control-Allow-Origin: *");
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller
{   
    public function __construct(){
        parent::__construct();
        $this->load->library('Header_library');
    }    

    public function access(){
        $header_data = $this->header_library->header_data();
        $store = $this->input->get('shop');
        $store_condition = array(
            'store' => $store
        );
        $get_install_data = $this->Usermodel->select_db('Install', $store_condition);
        if($get_install_data) {
            $admin_details_data = $this->Usermodel->select_multiple_rows('tab_details', $store_condition);
            $data_show = array(
                'fetch' => $admin_details_data     
            );

            /*  Dashboard file load----*/
            $this->load->view('header', $header_data);
            $this->load->view('dashboard',$data_show );
            $this->load->view('footer');
            /*  Dashboard file load----*/

        }else{
            $this->auth($store);
        } 
    }
   
    public function auth($store){
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
        
}     