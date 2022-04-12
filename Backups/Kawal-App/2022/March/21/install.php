<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("keys.php");

$db = mysqli_connect($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB);
$store = $_GET['shop'];
$redirect_uri = urlencode($SHOPIFY_REDIRECT_URI);
$sql = "SELECT * FROM installs WHERE store ='$store'";
$result = mysqli_query($db, $sql);
$rowcount = mysqli_num_rows($result);
if($rowcount > 0) {
	echo '<script type="text/javascript">window.top.location.href = "https://'.$_GET['shop'].'/admin/apps/'.$SHOPIFY_APIKEY.'/'.$SHOPIFY_DIRECTORY_NAME.'/dashboard.php?shop=' . $_GET['shop'] . '"; </script>';
}
else{
	$url = "https://{$store}/admin/oauth/authorize?client_id={$SHOPIFY_APIKEY}&scope={$SHOPIFY_SCOPES_PREMIUM}&redirect_uri={$redirect_uri}";
	header("Location: {$url}");
}
