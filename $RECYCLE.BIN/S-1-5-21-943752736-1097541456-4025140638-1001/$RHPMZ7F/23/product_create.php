<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
error_reporting(1); 
include("../MainFunction.php");
require '../keys.php';
$store = $_SERVER['HTTP_X_SHOPIFY_SHOP_DOMAIN'];
// $store = 'hunt-us-dev.myshopify.com';
$db = mysqli_connect($MYSQL_HOST,$MYSQL_USER,$MYSQL_PASS,$MYSQL_DB);


$json_str = file_get_contents('php://input');
file_put_contents('product_create.txt', $json_str);
$json_str = str_replace("'", "", $json_str);
if(!isJSON($json_str)){
	return false;
	exit;
}

$sql = "SELECT * FROM installs WHERE store ='$store'";
$result = mysqli_query($db, $sql);
$rowcount = mysqli_num_rows($result);
if($rowcount > 0) {
	$row = mysqli_fetch_assoc($result); 
	$access_token = $row['access_token'];
}

$sc = new ShopifyClient($store, $access_token, $SHOPIFY_APIKEY, $SHOPIFY_SECRET);
$newjson = str_replace("'", "", $json_str);
$json_obj = json_decode($newjson, true);


// $product_endpoint = '/admin/api/'.$SHOPIFY_API_VERSION.'/products/'.$json_obj['id'].'.json';
// $product = $sc->call('GET', $product_endpoint);



$tags_array = explode (",", $json_obj['tags']);  
if(in_array('preorder_duplicate_product', $tags_array)) {
    $product_id = $json_obj['id'];
    $variant_id = $json_obj['variants'][0]['id'];
    $created_at = $json_obj['created_at'];
    $updated_at = $json_obj['updated_at'];

    $insert_product_query = "INSERT INTO `preorder_duplicate_products` (store, product_id, variant_id, created_at, updated_at, status) VALUES ('$store', '$product_id', '$variant_id', '$created_at', '$updated_at', 'abandoned')";
    $result = mysqli_query($db, $insert_product_query);
    if ($result === TRUE) {
        echo "Inserted Sucessfully";
        echo http_response_code(200);
    }
}

function isJSON($json_str){
	return is_string($json_str) && is_array(json_decode($json_str, true)) ? true : false;
}

mysqli_close($db);
echo http_response_code(200);
