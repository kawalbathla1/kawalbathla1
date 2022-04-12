<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
include("keys.php");
include("shopify.php");
$hmac = $_GET['hmac'];
$store = $_GET['shop']; 
$code  = $_GET['code'];
$db = mysqli_connect($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB);
// $sc = new ShopifyClient($store, $access_token, $SHOPIFY_APIKEY, $SHOPIFY_SECRET);
if (isset($_GET['code'])) {
	$sql = "SELECT * FROM installs WHERE store = '$store'";
	$result=mysqli_query($db, $sql);
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		$row = mysqli_fetch_assoc($result); 
		$access_token = $row['access_token'];
	}else{
		$shopifyClient = new ShopifyClient($store, "", $SHOPIFY_APIKEY, $SHOPIFY_SECRET);
		$access_token = $shopifyClient->getAccessToken($code);
	}
	
	$sc = new ShopifyClient($store, $access_token, $SHOPIFY_APIKEY, $SHOPIFY_SECRET);
	
	/*** when order is created ***/
	
	try{
		$order_create_webhook = $sc->call('GET','/admin/api/'.$SHOPIFY_API_VERSION.'/webhooks.json?address='.$SHOPIFY_DOMAIN_URL.'/webhooks/order_create.php');
		$webhook_order_create = array (
			"webhook" => array (
			"topic" => "orders/create",
			"address" => $SHOPIFY_DOMAIN_URL.'/webhooks/order_create.php',
			"format" => "json"
			)
		);
		if (empty($order_create_webhook)) {
			$sc->call('POST', '/admin/api/'.$SHOPIFY_API_VERSION.'/webhooks.json', $webhook_order_create);
		}
	}
	catch(Exception $e) {
		echo 'Message: ' .$e->getMessage();
	}
	
	
	try{
		/*** when order is created ***/
		$product_create_webhook = $sc->call('GET','/admin/api/'.$SHOPIFY_API_VERSION.'/webhooks.json?address='.$SHOPIFY_DOMAIN_URL.'/webhooks/product_create.php');
		$webhook_product_create = array (
			"webhook" => array (
			"topic" => "products/create",
			"address" => $SHOPIFY_DOMAIN_URL.'/webhooks/product_create.php',
			"format" => "json"
			)
		);
		if (empty($product_create_webhook)) {
			$sc->call('POST', '/admin/api/'.$SHOPIFY_API_VERSION.'/webhooks.json', $webhook_product_create);
		}
	}
	catch(Exception $e) {
		echo 'Message: ' .$e->getMessage();
	}
	
    
    $shop_endpoint = '/admin/api/'.$SHOPIFY_API_VERSION.'/shop.json';
    $shop_data = $sc->call('GET', $shop_endpoint);
    $iana_timezone = $shop_data['iana_timezone'];
	$get_install_data = $db->query("SELECT * From installs WHERE store = '$store'");
	$count_install_row = mysqli_num_rows($get_install_data);
	if(empty($count_install_row)) {
		$app_install = $db->query("INSERT INTO installs SET store = '$store', access_token = '$access_token', iana_timezone = '$iana_timezone'");
		if ($app_install === TRUE) {
			$redirect_url = "https://{$store}/admin/apps/{$SHOPIFY_APIKEY}/{$SHOPIFY_DIRECTORY_NAME}/dashboard.php?shop={$store}";
			header("Location: {$redirect_url}");
		}else {
			echo "Error installing App: " . $db->error;
			echo "<br>";
		} 
	}else{
		$app_update = $db->query("UPDATE installs SET access_token = '$access_token', iana_timezone = '$iana_timezone' WHERE store = '$store'");
		if ($app_update === TRUE) {
			$redirect_url = "https://{$store}/admin/apps/{$SHOPIFY_APIKEY}/{$SHOPIFY_DIRECTORY_NAME}/dashboard.php?shop={$store}";
			header("Location: {$redirect_url}");
		}else{
			echo "Error Updating App: " . $db->error;
			echo "<br>";
		}
	}
}
?>
