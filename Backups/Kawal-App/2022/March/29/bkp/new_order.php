<?php
// echo "knk";die;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
error_reporting(1);
require '../keys.php';
include("../shopify.php");
$store = $_SERVER['HTTP_X_SHOPIFY_SHOP_DOMAIN'];
// $store = 'dr-sterile-sanitizer.myshopify.com';
 $store = 'dr-sterile-sanitizer.myshopify.com';


// die;
$data = file_get_contents('php://input');
file_put_contents('new_order.txt', $data);
// $array = json_decode($data,true);
//  $data = '{"id":4714394714341,"admin_graphql_api_id":"gid:\/\/shopify\/Order\/4714394714341","app_id":6665737,"browser_ip":null,"buyer_accepts_marketing":false,"cancel_reason":null,"cancelled_at":null,"cart_token":null,"checkout_id":32887371858149,"checkout_token":"24167ca0bec28932cdb384299412586e","client_details":{"accept_language":null,"browser_height":null,"browser_ip":null,"browser_width":null,"session_hash":null,"user_agent":null},"closed_at":null,"confirmed":true,"contact_email":null,"created_at":"2022-03-28T11:28:39+05:30","currency":"INR","current_subtotal_price":"2200.00","current_subtotal_price_set":{"shop_money":{"amount":"2200.00","currency_code":"INR"},"presentment_money":{"amount":"2200.00","currency_code":"INR"}},"current_total_discounts":"0.00","current_total_discounts_set":{"shop_money":{"amount":"0.00","currency_code":"INR"},"presentment_money":{"amount":"0.00","currency_code":"INR"}},"current_total_duties_set":null,"current_total_price":"2596.00","current_total_price_set":{"shop_money":{"amount":"2596.00","currency_code":"INR"},"presentment_money":{"amount":"2596.00","currency_code":"INR"}},"current_total_tax":"396.00","current_total_tax_set":{"shop_money":{"amount":"396.00","currency_code":"INR"},"presentment_money":{"amount":"396.00","currency_code":"INR"}},"customer_locale":null,"device_id":null,"discount_codes":[],"email":"","estimated_taxes":false,"financial_status":"paid","fulfillment_status":null,"gateway":"manual","landing_site":null,"landing_site_ref":null,"location_id":68291985637,"name":"#1031","note":null,"note_attributes":[],"number":31,"order_number":1031,"order_status_url":"https:\/\/dr-sterile-sanitizer.myshopify.com\/63438225637\/orders\/8ff218318c42ccdfa1aa1e7f2b7d07c5\/authenticate?key=d3d6aafd03b2d1f487efb56292984951","original_total_duties_set":null,"payment_gateway_names":["manual"],"phone":null,"presentment_currency":"INR","processed_at":"2022-03-28T11:28:39+05:30","processing_method":"manual","reference":null,"referring_site":null,"source_identifier":null,"source_name":"6665737","source_url":null,"subtotal_price":"2200.00","subtotal_price_set":{"shop_money":{"amount":"2200.00","currency_code":"INR"},"presentment_money":{"amount":"2200.00","currency_code":"INR"}},"tags":"","tax_lines":[{"price":"396.00","rate":0.18,"title":"IGST","price_set":{"shop_money":{"amount":"396.00","currency_code":"INR"},"presentment_money":{"amount":"396.00","currency_code":"INR"}},"channel_liable":false}],"taxes_included":false,"test":false,"token":"8ff218318c42ccdfa1aa1e7f2b7d07c5","total_discounts":"0.00","total_discounts_set":{"shop_money":{"amount":"0.00","currency_code":"INR"},"presentment_money":{"amount":"0.00","currency_code":"INR"}},"total_line_items_price":"2200.00","total_line_items_price_set":{"shop_money":{"amount":"2200.00","currency_code":"INR"},"presentment_money":{"amount":"2200.00","currency_code":"INR"}},"total_outstanding":"0.00","total_price":"2596.00","total_price_set":{"shop_money":{"amount":"2596.00","currency_code":"INR"},"presentment_money":{"amount":"2596.00","currency_code":"INR"}},"total_price_usd":"34.03","total_shipping_price_set":{"shop_money":{"amount":"0.00","currency_code":"INR"},"presentment_money":{"amount":"0.00","currency_code":"INR"}},"total_tax":"396.00","total_tax_set":{"shop_money":{"amount":"396.00","currency_code":"INR"},"presentment_money":{"amount":"396.00","currency_code":"INR"}},"total_tip_received":"0.00","total_weight":0,"updated_at":"2022-03-28T11:28:40+05:30","user_id":null,"discount_applications":[],"fulfillments":[],"line_items":[{"id":12074956128485,"admin_graphql_api_id":"gid:\/\/shopify\/LineItem\/12074956128485","fulfillable_quantity":11,"fulfillment_service":"manual","fulfillment_status":null,"gift_card":false,"grams":0,"name":"Black Leather Bag","origin_location":{"id":3450123747557,"country_code":"IN","province_code":"PB","name":"mohali","address1":"mohali","address2":"","city":"mohali","zip":"160071"},"price":"200.00","price_set":{"shop_money":{"amount":"200.00","currency_code":"INR"},"presentment_money":{"amount":"200.00","currency_code":"INR"}},"product_exists":false,"product_id":null,"properties":[{"name":"variant_id","value":"42640805986533"},{"name":"product_id","value":"7679813058789"}],"quantity":11,"requires_shipping":false,"sku":null,"taxable":true,"title":"Black Leather Bag","total_discount":"0.00","total_discount_set":{"shop_money":{"amount":"0.00","currency_code":"INR"},"presentment_money":{"amount":"0.00","currency_code":"INR"}},"variant_id":null,"variant_inventory_management":null,"variant_title":"","vendor":null,"tax_lines":[{"channel_liable":false,"price":"396.00","price_set":{"shop_money":{"amount":"396.00","currency_code":"INR"},"presentment_money":{"amount":"396.00","currency_code":"INR"}},"rate":0.18,"title":"IGST"}],"duties":[],"discount_allocations":[]}],"payment_terms":null,"refunds":[],"shipping_lines":[]}';
$array = json_decode($data, true);
// echo "<pre>";
// print_r($array);die;
$order_id = $array['id'];
// echo $order_id;die;
// echo "<pre>";
$conn = mysqli_connect($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB);
$token = "SELECT `access_token` FROM `installs` WHERE `store` = '$store'";
$query = mysqli_query($conn, $token);
$data = mysqli_fetch_assoc($query);
$access_token = $data['access_token'];
$sc = new ShopifyClient($store, $access_token, $SHOPIFY_APIKEY, $SHOPIFY_SECRET);
// $store = 'dr-sterile-sanitizer.myshopify.com';
// echo $draft_quantity;die;
foreach ($array['line_items'] as $value) {
  $draft_quantity = $value['quantity'];
  // echo $draft_quantity;
  // print_r($value['properties']);
  $location_id = $array['location_id'];
  myfun($value['properties'],$SHOPIFY_API_VERSION,$sc,$draft_quantity,$location_id );
}
function myfun($arr,$SHOPIFY_API_VERSION,$sc,$draft_quantity,$location_id)
{
  // $inventory_data = [];
  foreach ($arr as $val) {
    // $inventory_data[$val['name']] = $val['value'];
    // echo $SHOPIFY_API_VERSION;
    // print_r($sc);
    $a = array_search("variant_id", $val);
    if ($a) {
      $shop_endpoint = '/admin/api/' . $SHOPIFY_API_VERSION . '/variants/' . $val['value'] . '.json';
      // echo $val['value'];
      $shop_data = $sc->call('GET', $shop_endpoint);
      // print_r($shop_data);die;
     $product_quantity =  $shop_data['inventory_quantity'];
    //  echo $product_quantity;die;
     $inventory_item_id = $shop_data['inventory_item_id'];
    //  echo $location_id;die;
    $total_quantity =   $product_quantity - $draft_quantity;
    // echo $total_quantity;die;
     $quantity_adjust_data = [
      "location_id"=>$location_id,
      "inventory_item_id"=>$inventory_item_id,
      "available" => $total_quantity
      
     ];
    //  print_r($quantity_adjust_data);die;
    
    //  echo $inventory_item_id;die;
     $inventory_level_api = '/admin/api/'.$SHOPIFY_API_VERSION.'/inventory_levels/set.json';
     $inventory_api_data = $sc->call('POST', $inventory_level_api,$quantity_adjust_data);
    //  print_r($inventory_level_api);die;
    //  print_r($inventory_api_data );die;
    //  echo $total_quantity;
     $inv_data = [
      "variant" => [
        "id" => $val['value'],
        "inventory_quantity" => "$total_quantity"]
      ];
      $shop_endpoint = '/admin/api/' . $SHOPIFY_API_VERSION . '/variants/' . $val['value'] . '.json';
      // $inventory_data = $sc->call('PUT', $shop_endpoint,$inv_data);
      // print_r($inventory_data);

    } else {
      $product_id = $val['value'];
    }
  }
}
$variant_id = $val['value'];
// print_r($shop_data);
// die;
// print_r($inventory_data);die; 
// $store = $_GET['shop']; 
// echo $order_id;die;
$conn = mysqli_connect($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB);
$token = "SELECT `access_token` FROM `installs` WHERE `store` = '$store'";
$query = mysqli_query($conn, $token);
$data = mysqli_fetch_assoc($query);
// echo"jelo";
// echo $access_token;die;
// echo"<pre>";
// print_r($sc);die;
$tags =  $array['tags'];
$new_tags = $tags . "," . "shopify,men,women";
// echo $new_tags;die;
// $tags_new = array_merge($tags,$tags_new);
// print_r($tags_new);die;
$order_update = [
  "order" => [
    "id" => "" . $order_id . "",
    "tags" => "" . $new_tags . ""
  ]
];
$shop_endpoint = '/admin/api/' . $SHOPIFY_API_VERSION . '/orders/' . $order_id . '.json';
// echo $shop_endpoint;
// die;
// $shop_data = $sc->call('PUT', $shop_endpoint, $order_update);
// print_r($shop_data);
        // $array['customer']['tags'] = "kawal";
        // $a = array_search("tags",$array);
        
    //    echo $a;