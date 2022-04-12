<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include("keys.php");
    include("shopify.php");
    // $store = $_GET['shop'];
    // echo $store;die;
    $conn = mysqli_connect($MYSQL_HOST,$MYSQL_USER,$MYSQL_PASS,$MYSQL_DB);
    if($conn) {
        echo "connected";
    }
    $token = "SELECT `access_token` FROM `installs` WHERE `store` = 'dr-sterile-sanitizer.myshopify.com'";
    $query = mysqli_query($conn,$token);
    $data = mysqli_fetch_assoc($query);
    $access_token = $data['access_token'];
    // echo $access_token;die;
    $sc = new ShopifyClient('dr-sterile-sanitizer.myshopify.com', $access_token, $SHOPIFY_APIKEY, $SHOPIFY_SECRET);
    // echo "<pre>";
    // print_r($sc);die;
    $draft = 
    [
        "draft_order" => [
            "line_items" => [
                [
                    "variant_id"=>42640805953765, 
                    "quantity"=>7,
                    "applied_discount" =>[ "value_type" => "percentage", "value" => 15, "amount"=> 50.99]
                ]
    ]
        ]
                ];

    // echo '<pre>';
    // print_r($draft );
    // die;
   


    // try{
        echo ' Maharaj ji  ';
        $shop_endpoint = '/admin/api/'.$SHOPIFY_API_VERSION.'/draft_orders.json';
        // echo $shop_endpoint;
        // echo ' <br> ';
        $shop_data = $sc->call('POST', $shop_endpoint,$draft);
        echo '  Mann  ';
        echo '<pre>';
        print_r($shop_data);
    // }
    // catch(Exception $e) {
    //     echo '  Kawal Don';
    //     echo "<pre>";
    //     echo $e->getMessage();
    // }

    
    // echo "<pre>";
    // print_r($shop_data);die;
?>