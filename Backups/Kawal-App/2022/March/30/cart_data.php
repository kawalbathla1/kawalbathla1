<?php
header('Access-Control-Allow-Origin: *');
// print_r($_POST);die;
include("keys.php");
include("shopify.php");
$action = $_POST['action'];
$conn = mysqli_connect($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB);
$token = "SELECT `access_token` FROM `installs` WHERE `store` = 'dr-sterile-sanitizer.myshopify.com'";
$query = mysqli_query($conn, $token);
$data = mysqli_fetch_assoc($query);
$access_token = $data['access_token'];
$sc = new ShopifyClient('dr-sterile-sanitizer.myshopify.com', $access_token, $SHOPIFY_APIKEY, $SHOPIFY_SECRET);
if($action == "cart") {
    $draft_api = '/admin/api/' . $SHOPIFY_API_VERSION . '/draft_orders.json';
    $var = [];
    foreach ($_POST['items'] as $key => $value) {
        if (array_key_exists("variant_id", $value)) {
            $var[] = ["variant_id" => $value['variant_id'], "quantity" => $value['quantity'],"applied_discount"=>["value_type"=> "percentage", "value"=> 10, "amount"=>6120 ], "requires_shipping" => "false",
            "taxable" => "false"];
        }
    }
    // print_r($var);die;
    // *****************discount on total order***********

    // $draft_data = [
    //     "draft_order" => [
    //         "line_items" => $var,
    //         "applied_discount" => [
    //             "value_type" => "fixed_amount",
    //             "value" => "10.0",
    //             "amount" => "10.00",
    //         ],
    //         "tags" => "kawal_draft"
    //     ]
    // ];

    $draft_data =  [
        "draft_order" => [
        "line_items" => 
            $var,
            "tags" => "kawal_draft"
            ]
        ];
    $draft_create = $sc->call('POST', $draft_api, $draft_data);
    // print_r($draft_create);di
    $draft_id = $draft_create['id'];
    $invoice_url = $draft_create['invoice_url'];
    echo $invoice_url;
}
    if($action == "preorder") {
        $product_api = '/admin/api/' . $SHOPIFY_API_VERSION . '/variants/'.$_POST['variant_id'].'.json'; 
        $product_data = $sc->call('GET', $product_api);
        // print_r($product_data);die;
        // foreach ($product_data as $value) {
            if($product_data['inventory_quantity'] <= 0) {
                $success = "updated";
            }
            // print_r($value);
            echo $success;
        }
    
