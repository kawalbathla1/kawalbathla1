<?php 
header("Access-Control-Allow-Origin: *");
defined('BASEPATH') OR exit('No direct script access allowed');
// print_r($_POST);die;
class Auth extends CI_Controller
{   
    public function __construct(){
        parent::__construct();
        $this->load->library('Header_library');
       
    }    
    // echo "hello";die;
    public function access(){
        $header_data = $this->header_library->header_data();
        // print_r($header_data);
        $store = $this->input->get('shop');
        $store_condition = array(
            'store' => $store
        );
    
        
        
        // $get_install_data = $this->Usermodel->select_db('installs', $store_condition);
        // echo '<pre>';
        // print_r ($get_install_data);
        // die;
        //  echo '<pre>';
        // print_r($get_install_data);
        // $accessTo = $get_install_data['access_token'];  
        // $name = 'Rohit Saini';
        // $designation = 'Shopify App Developer';
        // $this->load->view('welcome',$accessTo);

        // 
        // $a = array(
        //     'token'=>$accessTo,
        //     'name'=>$name,
        //     'designation'=>$designation
        // );
        // $data = array_merge($designation,$a);
        // print_r($a);die;

        // if($get_install_data) {
        //     /*  welcome file load----*/
        //     //$this->load->view('header');
        //     $store_condition = array("store"=>"dr-sterile-sanitizer.myshopify.com");
        //     $data = array("name"=>"kawal",
        //                 "class"=>"10th");
        //     // $this->Usermodel->insert_test("test",$data);
        //     $project = $this->Usermodel->select_multiproject('products', $store_condition);
        //     echo "<pre>";
        //     // print_r($project);
        //     // echo 'tttt';
        //     // echo "<a href='https:/google.com/'>welcome</a>";
        //     // echo "<button onclick=redirect(google.com)>button</button>";
        //     foreach($project as $value) {
        //         // echo $value->product_title;
        //         // echo '<br><hr>';
        //     }
            // $data_header = array("access_token"=>$accessTo,"store"=>$store);
            $data_header = array(
                'store' => $store,
                'apiKey' => $this->config->item('shopify_api_key')
            );
            
            // echo '<pre>';
            // print_r($data_header);

            $this->load->view('header',$data_header);
            $this->load->view('product_details');
            $this->load->view('footer');

            // $data = array("name"=>"kawalbathla",
            //             "class"=>20);
            // $a = array("id"=>1);
            // $update = $this->Usermodel->update_test("test",$data,$a);


            //$this->load->view('footer');
            /*  welcome file load----*/
        // }else{
            //echo 'no';
            // $this->auth($store); 
        // }
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
        // echo $code ;
        // die;
        $store = $this->input->get('shop');
        //echo $code ;
        $condition = array(
            'store' => $store
        );
        // echo '<pre>';
        // print_r($condition);
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
       
        $this->Usermodel->insert_db('installs', $data);
      //  $this->appUninstall($store, $accessToken);
        redirect('https://'. $store .'/admin/apps');
    }

        
    //webhook
    // public function appUninstall() {
       
    //     $header_data = $this->header_library->header_data(); 
    //     $store = $header_data['store'];
        
    //     $store_condition = array(
    //         "store" => $store
    //     );
    //     $accessToken = $this->Usermodel->select_db("installs",$store_condition);

    //     $SHOPIFY_API_VERSION = $this->config->item('shopify_api_version');
        
    //     $base_url = $this->config->item('base_url');

    //     $callData = array(  
    //         'API_KEY' => $this->config->item('shopify_api_key'),
    //         'SECRET_KEY' => $this->config->item('shopify_secret'),
    //         'SHOP_DOMAIN' => $store,
    //         'ACCESS_TOKEN' => $accessToken['access_token']
    //     );

    //     $data = $this->load->library('Shopify', $callData);
        
      
        

    //     $retrieves_list_webhook = array(
    //         'METHOD' => 'GET',
    //         'URL' => '/admin/api/' .$SHOPIFY_API_VERSION. '/webhooks.json'
    //     );


    //     $retrieves_list = $this->shopify->call($retrieves_list_webhook);

            
    //     echo '<pre>';
    //     print_r($retrieves_list);
    //    die;

    //     $app_uninstall_webhook_param = array(
    //         'METHOD' => 'POST',
    //         'URL' => '/admin/api/' .$SHOPIFY_API_VERSION. '/webhooks.json',
    //             'DATA' => array(
    //                 "webhook" => array(
    //                 "topic" => "app/uninstalled",
    //                 "address" => $base_url."schedule_app_uninstall",
    //                 "format" => "json"
    //                 )
    //             )
    //         );

          
     
    //   echo '<pre>';
    //  print_r($app_uninstall_webhook_param);
    //  die;
    // }

        
}     