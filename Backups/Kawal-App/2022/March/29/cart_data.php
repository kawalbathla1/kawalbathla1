<?php
header('Access-Control-Allow-Origin: *');
include("keys.php");
include("shopify.php");
// print_r($_POST);die;
// echo "hello";
// echo $_POST['token'];
if ($conn) {
    // echo "connected";
}
// echo $access_token;die;
// echo $SHOPIFY_APIKEY;die;
// print_r($sc);die;
foreach ($_POST['items'] as $key => $value) {
    // echo($value['variant_id']);
    // myfun();
    $variant[] = $value['variant_id'];
    // $variant_id = array_push($variant,$variant);
    // myfun($variant,$MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB, $SHOPIFY_API_VERSION, $SHOPIFY_APIKEY, $SHOPIFY_SECRET);
        // array_push()
}
print_r(['variant_id'=>$variant]);
// print_r($a);    

// $variant_id['variant_id'] = [];

// die;
function myfun($variant,$MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB, $SHOPIFY_API_VERSION, $SHOPIFY_APIKEY, $SHOPIFY_SECRET)
{
    $draft_data = [
        "draft_order" => [
            "line_items" => $variant
        ]
    ];
    // print_r($draft_data);die;
    $conn = mysqli_connect($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB);
    $token = "SELECT `access_token` FROM `installs` WHERE `store` = 'dr-sterile-sanitizer.myshopify.com'";
    $query = mysqli_query($conn, $token);
    $data = mysqli_fetch_assoc($query);
    $access_token = $data['access_token'];
    $draft_api = '/admin/api/' . $SHOPIFY_API_VERSION . '/draft_orders.json';
    $sc = new ShopifyClient('dr-sterile-sanitizer.myshopify.com', $access_token, $SHOPIFY_APIKEY, $SHOPIFY_SECRET);
    $draft_create = $sc->call('POST', $draft_api, $draft_data);
    print_r($draft_create); 
}
// draftApi($variant_id,$SHOPIFY_API_VERSION, $SHOPIFY_APIKEY,$SHOPIFY_SECRET,$conn);

    // include("keys.php");
// include("shopify.php");
    // global $conn;

    // print_r($conn);die;
    

