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
        "draft_order"=>[
          "line_items"=> [
            [
              "title"=> "Black Leather Bag",
              "quantity"=> 11,
       
              "price" =>"200.00",
              "properties"=>[
                  [
                      "name"=>"variant_id",
                      "value"=>"42640807428325"
                  ],
                  [
                      "name"=>"product_id",
                      "value"=>"7679814271205"
                  ]
              ]
            ]
          ]
             
        ]
              ];
    

    echo '<pre>';
    // print_r(json_encode($draft ));
    // die;
   


    // try{
        echo ' Maharaj ji  ';
        $shop_endpoint = '/admin/api/'.$SHOPIFY_API_VERSION.'/draft_orders.json';
        // echo $shop_endpoint;
        // echo ' <br> ';
        $shop_data = $sc->call('POST', $shop_endpoint,$draft);
        echo"<pre>";
        // print_r(($shop_data));die;
        // echo '  Mann  ';
        echo '<pre>';
        // print_r($shop_data);die;
        $draft_id = $shop_data['id'];
        // $graphl_api =  $shop_data['admin_graphql_api_id'];
    // }
    // catch(Exception $e) {
    //     echo '  Kawal Don';
    //     echo "<pre>";
    //     echo $e->getMessage();
    // }

    
    // echo "<pre>";
    // print_r($shop_data);die;
    // $modify = [
    //     "draft_order" => [
    //       "id" => $draft_id,
    //       "tags" => "draftorder"]
    //     ];p
    $draft_complete = '/admin/api/'.$SHOPIFY_API_VERSION.'/draft_orders/'.$draft_id.'/complete.json';
    // echo $draft_complete;die;
    $draft_completed =  $sc->call('PUT', $draft_complete);
    print_r($draft_completed);

?>