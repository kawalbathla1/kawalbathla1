<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
error_reporting(1); 
include("../MainFunction.php");
require '../keys.php';
$store = $_SERVER['HTTP_X_SHOPIFY_SHOP_DOMAIN'];
// $store = 'hunt-us-dev.myshopify.com';
$db = mysqli_connect($MYSQL_HOST,$MYSQL_USER,$MYSQL_PASS,$MYSQL_DB);

$sql = "SELECT * FROM installs WHERE store ='$store'";
$result = mysqli_query($db, $sql);
$rowcount = mysqli_num_rows($result);
if($rowcount > 0) {
	$row = mysqli_fetch_assoc($result); 
	$access_token = $row['access_token'];
}
function isJSON($json_str){
	return is_string($json_str) && is_array(json_decode($json_str, true)) ? true : false;
}

// $json_str = '{"id":4236077105307,"admin_graphql_api_id":"gid:\/\/shopify\/Order\/4236077105307","app_id":1354745,"browser_ip":"14.99.195.170","buyer_accepts_marketing":false,"cancel_reason":null,"cancelled_at":null,"cart_token":null,"checkout_id":22288194797723,"checkout_token":"92223d183886ce42e6d4ee274a5da395","client_details":{"accept_language":"en-US,en;q=0.9","browser_height":969,"browser_ip":"14.99.195.170","browser_width":1920,"session_hash":null,"user_agent":"Mozilla\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/95.0.4638.69 Safari\/537.36"},"closed_at":null,"confirmed":true,"contact_email":"vipingarg.shinedezign@gmail.com","created_at":"2021-11-10T01:00:54-05:00","currency":"USD","current_subtotal_price":"559.50","current_subtotal_price_set":{"shop_money":{"amount":"559.50","currency_code":"USD"},"presentment_money":{"amount":"559.50","currency_code":"USD"}},"current_total_discounts":"0.00","current_total_discounts_set":{"shop_money":{"amount":"0.00","currency_code":"USD"},"presentment_money":{"amount":"0.00","currency_code":"USD"}},"current_total_duties_set":null,"current_total_price":"581.19","current_total_price_set":{"shop_money":{"amount":"581.19","currency_code":"USD"},"presentment_money":{"amount":"581.19","currency_code":"USD"}},"current_total_tax":"0.00","current_total_tax_set":{"shop_money":{"amount":"0.00","currency_code":"USD"},"presentment_money":{"amount":"0.00","currency_code":"USD"}},"customer_locale":"en","device_id":null,"discount_codes":[],"email":"vipingarg.shinedezign@gmail.com","financial_status":"paid","fulfillment_status":null,"gateway":"bogus","landing_site":"\/49478008987\/invoices\/b51b796e520f2a5422341ec3649b7c4b","landing_site_ref":null,"location_id":55797448859,"name":"#HBW1213TEST","note":"","note_attributes":[{"name":"prod_id","value":"5650028986523"},{"name":"prod_variant_id","value":"36137160933531"},{"name":"customer_id","value":""},{"name":"payment_type","value":"part"},{"name":"storename","value":"hunt-us-dev.myshopify.com"},{"name":"remaining","value":"559.5"}],"number":213,"order_number":1213,"order_status_url":"https:\/\/hunt-us-dev.myshopify.com\/49478008987\/orders\/c099e24d8cd0a20d7fc20a5c81aea69c\/authenticate?key=2b4bbbbe2778fb876e4d378cb07dcbe6","original_total_duties_set":null,"payment_gateway_names":["bogus"],"phone":null,"presentment_currency":"USD","processed_at":"2021-11-10T01:00:53-05:00","processing_method":"direct","reference":null,"referring_site":"https:\/\/hunt-us-dev.myshopify.com\/cart","source_identifier":null,"source_name":"web","source_url":null,"subtotal_price":"559.50","subtotal_price_set":{"shop_money":{"amount":"559.50","currency_code":"USD"},"presentment_money":{"amount":"559.50","currency_code":"USD"}},"tags":"Initial Partial Payment, Partial Payment","tax_lines":[],"taxes_included":false,"test":true,"token":"c099e24d8cd0a20d7fc20a5c81aea69c","total_discounts":"0.00","total_discounts_set":{"shop_money":{"amount":"0.00","currency_code":"USD"},"presentment_money":{"amount":"0.00","currency_code":"USD"}},"total_line_items_price":"559.50","total_line_items_price_set":{"shop_money":{"amount":"559.50","currency_code":"USD"},"presentment_money":{"amount":"559.50","currency_code":"USD"}},"total_outstanding":"0.00","total_price":"581.19","total_price_set":{"shop_money":{"amount":"581.19","currency_code":"USD"},"presentment_money":{"amount":"581.19","currency_code":"USD"}},"total_price_usd":"581.19","total_shipping_price_set":{"shop_money":{"amount":"21.69","currency_code":"USD"},"presentment_money":{"amount":"21.69","currency_code":"USD"}},"total_tax":"0.00","total_tax_set":{"shop_money":{"amount":"0.00","currency_code":"USD"},"presentment_money":{"amount":"0.00","currency_code":"USD"}},"total_tip_received":"0.00","total_weight":0,"updated_at":"2021-11-10T01:01:00-05:00","user_id":null,"billing_address":{"first_name":"Vipin","address1":"fdgfb","phone":null,"city":"NA","zip":"174024","province":"Himachal Pradesh","country":"India","last_name":"Garg","address2":"Testing Deptt.","company":null,"latitude":31.3830217,"longitude":76.71633589999999,"name":"Vipin Garg","country_code":"IN","province_code":"HP"},"customer":{"id":4561125703835,"email":"vipingarg.shinedezign@gmail.com","accepts_marketing":false,"created_at":"2021-02-12T06:55:07-05:00","updated_at":"2021-11-10T01:00:55-05:00","first_name":"Vipin","last_name":"Garg","orders_count":0,"state":"enabled","total_spent":"0.00","last_order_id":null,"note":null,"verified_email":true,"multipass_identifier":null,"tax_exempt":false,"phone":null,"tags":"","last_order_name":null,"currency":"USD","accepts_marketing_updated_at":"2021-02-12T06:55:07-05:00","marketing_opt_in_level":null,"tax_exemptions":[],"admin_graphql_api_id":"gid:\/\/shopify\/Customer\/4561125703835","default_address":{"id":6974433951899,"customer_id":4561125703835,"first_name":"Vipin","last_name":"Garg","company":null,"address1":"fdgfb","address2":"Testing Deptt.","city":"NA","province":"Himachal Pradesh","country":"India","zip":"174024","phone":null,"name":"Vipin Garg","province_code":"HP","country_code":"IN","country_name":"India","default":true}},"discount_applications":[],"fulfillments":[],"line_items":[{"id":10689979547803,"admin_graphql_api_id":"gid:\/\/shopify\/LineItem\/10689979547803","destination_location":{"id":3294909235355,"country_code":"IN","province_code":"HP","name":"Vipin Garg","address1":"fdgfb","address2":"Testing Deptt.","city":"NA","zip":"174024"},"fulfillable_quantity":1,"fulfillment_service":"manual","fulfillment_status":null,"gift_card":false,"grams":0,"name":"HUNT 50 Carbon Aero Disc Wheelset - Bundle Test || Oil-Slick Ti-Nitride Spokes \/ Campagnolo 9\/10\/11\/12 Speed","origin_location":{"id":2389743239323,"country_code":"GB","province_code":"","name":"Unit 8 Huffwood Trad Est","address1":"Unit 8 Huffwood Trad Est","address2":"","city":"Partridge Green","zip":"RH13 8AU"},"pre_tax_price":"559.50","pre_tax_price_set":{"shop_money":{"amount":"559.50","currency_code":"USD"},"presentment_money":{"amount":"559.50","currency_code":"USD"}},"price":"559.50","price_set":{"shop_money":{"amount":"559.50","currency_code":"USD"},"presentment_money":{"amount":"559.50","currency_code":"USD"}},"product_exists":true,"product_id":7203809820827,"properties":[{"name":"**Note","value":"Deposit Only (Fully Refundable)"},{"name":"_product_code","value":"5650028986523"},{"name":"_variant_code","value":"36137160933531"},{"name":"_SKU","value":"HNT-RWS-50CAD-RBW-KC-IC66"},{"name":"_PRE-ORDER DEPOSIT","value":"559.50"},{"name":"_REMAINING BALANCE","value":"559.50"},{"name":"Estimated Shipping Date","value":"Nov Week 1"}],"quantity":1,"requires_shipping":true,"sku":"HNT-RWS-50CAD-RBW-KC-IC66","taxable":true,"title":"HUNT 50 Carbon Aero Disc Wheelset - Bundle Test || Oil-Slick Ti-Nitride Spokes \/ Campagnolo 9\/10\/11\/12 Speed","total_discount":"0.00","total_discount_set":{"shop_money":{"amount":"0.00","currency_code":"USD"},"presentment_money":{"amount":"0.00","currency_code":"USD"}},"variant_id":41527905124507,"variant_inventory_management":"shopify","variant_title":"","vendor":"Duplicate - Privateer Bikes","tax_lines":[{"price":"0.00","price_set":{"shop_money":{"amount":"0.00","currency_code":"USD"},"presentment_money":{"amount":"0.00","currency_code":"USD"}},"rate":0.0,"title":"GB VAT"}],"duties":[],"discount_allocations":[]}],"payment_details":{"credit_card_bin":"1","avs_result_code":null,"cvv_result_code":null,"credit_card_number":"•••• •••• •••• 1","credit_card_company":"Bogus"},"refunds":[],"shipping_address":{"first_name":"Vipin","address1":"fdgfb","phone":null,"city":"NA","zip":"174024","province":"Himachal Pradesh","country":"India","last_name":"Garg","address2":"Testing Deptt.","company":null,"latitude":31.3830217,"longitude":76.71633589999999,"name":"Vipin Garg","country_code":"IN","province_code":"HP"},"shipping_lines":[{"id":3555582378139,"carrier_identifier":null,"code":"Standard","delivery_category":null,"discounted_price":"21.69","discounted_price_set":{"shop_money":{"amount":"21.69","currency_code":"USD"},"presentment_money":{"amount":"21.69","currency_code":"USD"}},"phone":null,"price":"21.69","price_set":{"shop_money":{"amount":"21.69","currency_code":"USD"},"presentment_money":{"amount":"21.69","currency_code":"USD"}},"requested_fulfillment_service_id":null,"source":"shopify","title":"Standard","tax_lines":[{"price":"0.00","price_set":{"shop_money":{"amount":"0.00","currency_code":"USD"},"presentment_money":{"amount":"0.00","currency_code":"USD"}},"rate":0.0,"title":"GB VAT"}],"discount_allocations":[]}]}';

$json_str = file_get_contents('php://input');
file_put_contents('order.txt', $json_str);
$json_str = str_replace("'","",$json_str);
if(!isJSON($json_str)){
	return false;
	exit;
}
$sc = new ShopifyClient($store, $access_token, $SHOPIFY_APIKEY, $SHOPIFY_SECRET);
$newjson = str_replace("'","",$json_str);
$json_obj = json_decode($newjson,true);

foreach($json_obj['line_items'] as $gettitle){
	$abandoned_variant_id = $gettitle['variant_id'];
	$abandoned_product_id = $gettitle['product_id'];
	$query = "SELECT id FROM preorder_duplicate_products WHERE product_id = '$abandoned_product_id' AND variant_id = '$abandoned_variant_id' AND store = '$store'";
	$abandoned_result = mysqli_query($db, $query);
	$abandoned_rowcount = mysqli_num_rows($abandoned_result);
	if(mysqli_num_rows($abandoned_result) > 0){
		$update_row = "UPDATE preorder_duplicate_products SET status = 'completed' WHERE product_id = '$abandoned_product_id' AND variant_id = '$abandoned_variant_id' AND store = '$store'";
		$update_abandoned_row = mysqli_query($db, $update_row);
	}

	if($store == 'hunt-us-dev.myshopify.comm'){
		$full_title = $gettitle['name'];
		if(!empty($gettitle['properties'])){
			$key = array_search('_product_code', array_column($gettitle['properties'], 'name'));
			if($key != ''){
				$Product_id = $gettitle['properties'][$key]['value'];
				/*$duplicate_productId = $gettitle['product_id'];
				try{
					$delproductlist = "/admin/api/{$SHOPIFY_API_VERSION}/products/{$duplicate_productId}.json";
					$delProduct = $sc->call('DELETE',$delproductlist);
				}catch (Exception $e) {
					echo "product not deleted";
				}*/
			}
			else{
				$Product_id = $gettitle['product_id'];
			}
		}else{
			$Product_id = $gettitle['product_id'];
		}
		
		try{
			$productlist = "/admin/api/{$SHOPIFY_API_VERSION}/products/{$Product_id}.json";
			$getProduct = $sc->call('GET',$productlist);
			$product_title = substr($full_title, strpos($full_title, "||") + 2); 
		
			$variant_key = array_search(trim($product_title), array_column($getProduct['variants'], 'title')); 

			$variant_inventory =  $getProduct['variants'][$variant_key]['inventory_quantity'];
			$option1 = $getProduct['variants'][$variant_key]['option1'];
			$option2 = $getProduct['variants'][$variant_key]['option2'];
			$option3 = $getProduct['variants'][$variant_key]['option3'];
		}catch (Exception $e) {
			echo http_response_code(200);
		}
		
		// to get the location id
		$getLocations =  "/admin/api/".$SHOPIFY_API_VERSION."/locations.json";
		$getlocation = $sc->call('GET',$getLocations);
		$location_id = $getlocation[1]['id'];

		// foreach($getlocation as $eachlocation){
			// $location_id = $eachlocation['id'];        
			foreach($getProduct['variants'] as $updateVariant){
				$variant_id = $updateVariant['id'];
				$inventory_item_id = $updateVariant['inventory_item_id'];
				
				if($option3 != null){
					if($option1 == $updateVariant['option1'] && $option2 == $updateVariant['option2'] && $updateVariant['title'] != trim($product_title) && $option2 != null){
					// echo $inventory_item_id.'<br>';
						try{
							$asset_linkput = 'https://'.$store.'/admin/api/'.$SHOPIFY_API_VERSION.'/inventory_levels/set.json';
							$upVariantqty = array(
								"location_id" => $location_id,
								"inventory_item_id" => $inventory_item_id,
								"available" => $variant_inventory
							);

							$jsonedasset = json_encode($upVariantqty);
							$assetresult = put_data($asset_linkput, "POST", $access_token, $jsonedasset); 
							echo '<pre class="a" style="font-size: 14px; border: 1px solid #0a1006; padding: 10px; box-shadow: 2px 3px 6px #b5e3af; background-color: #f9ffe2; border-radius: 8px; margin: 10px auto; text-align: center;">';
							print_r($assetresult);
							echo '</pre>';
						}catch (Exception $e) {
							echo "variant not Updated";
						}
					}     
				}else{
					if($option1 == $updateVariant['option1'] && $updateVariant['title'] != trim($product_title) && $option2 != null){
					// echo $inventory_item_id.'<br>';
						try{
							$asset_linkput = 'https://'.$store.'/admin/api/'.$SHOPIFY_API_VERSION.'/inventory_levels/set.json';
							$upVariantqty = array(
								"location_id" => $location_id,
								"inventory_item_id" => $inventory_item_id,
								"available" => $variant_inventory
							);

							$jsonedasset = json_encode($upVariantqty);
							$assetresult = put_data($asset_linkput, "POST", $access_token, $jsonedasset); 
							echo '<pre class="b" style="font-size: 14px; border: 1px solid #0a1006; padding: 10px; box-shadow: 2px 3px 6px #b5e3af; background-color: #f9ffe2; border-radius: 8px; margin: 10px auto; text-align: center;">';
							print_r($assetresult);
							echo '</pre>';
						}catch (Exception $e) {
							echo "variant not Updated";
						}
					} 
				}
			}
		// }
	}
}


function put_data($url, $action, $access_token, $arrayfield) {
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL =>$url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => $action,
		CURLOPT_POSTFIELDS => $arrayfield,
		CURLOPT_HTTPHEADER => array(
			"content-type: application/json",
			"x-shopify-access-token:{$access_token}"
		),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		return $response;
	}	
}

mysqli_close($db);
echo http_response_code(200);
