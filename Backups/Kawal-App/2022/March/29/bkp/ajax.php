<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include("keys.php");
    include("shopify.php");
    // print_r($_POST);die;
    $action = $_POST['action'];
    if($action == "inventory") {
        
        $store = $_POST['shop'];
        // echo$store;die;
        $conn = mysqli_connect($MYSQL_HOST,$MYSQL_USER,$MYSQL_PASS,$MYSQL_DB);
        $token = "SELECT `access_token` FROM `installs` WHERE `store` = '$store'";
        $query = mysqli_query($conn,$token);
        $data = mysqli_fetch_assoc($query);
        $access_token = $data['access_token'];
        $id = $_POST['id'];
        
        // echo $access_token;die;
        $sc = new ShopifyClient($store, $access_token, $SHOPIFY_APIKEY, $SHOPIFY_SECRET);
        // print_r($sc);die;
        $shop_endpoint = '/admin/api/'.$SHOPIFY_API_VERSION.'/products/'.$_POST['id'].'/variants.json';
        // print_r($shop_endpoint);die;
        $condition = $_POST['con'];
        // echo gettype($condition);die;
        $shop_data = $sc->call('GET', $shop_endpoint);
        // print_r($shop_data);die;
        if($condition == "true") {
            $inventory = "continue";
        }else {
            $inventory = "deny";
        }
        foreach($shop_data as $value) {
            $arr = 	[
                "variant" => [
                    "id" => "".$value['id']."",
                    "inventory_policy"=>"$inventory"]
                ];  
                $shop_endpoint = '/admin/api/'.$SHOPIFY_API_VERSION.'/variants/'.$value['id'].'.json';
                $shop_data = $sc->call('PUT', $shop_endpoint,$arr);
                $product_id = $_POST['id'];
                $variant_id = $value['id'];
                $store = $_POST['shop'];
                $checkbox = $_POST['con'];
                $select = "SELECT * FROM `products` WHERE `variant_id` = '$variant_id'";
                $query = mysqli_query($conn,$select);
                // echo $select;die;
                // $query = mysqli_query($conn,$select);
                echo "Successfully Updated !";
                if(mysqli_num_rows($query) <= 0) {
                    $insert = "INSERT INTO `products`( `store`, `product_id`, `variant_id`,`checkbox`,) VALUES ('$store','$product_id','$variant_id','$checkbox')";
                    $query = mysqli_query($conn,$insert);
                    if($query){echo"inserted";}else{echo"notinserted";}
                }else {
                    $product_id = $_POST['id'];
                    $checkbox = $_POST['con'];
                    $update = "UPDATE `products` SET `checkbox` = '$checkbox' WHERE `product_id` = '$product_id'";
                    $query = mysqli_query($conn,$update);
            }
        }
}
        
?>