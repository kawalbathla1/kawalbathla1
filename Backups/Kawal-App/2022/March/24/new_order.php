<?php
    
    ini_set('display_errors', 1);
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);
        error_reporting(1); 
        // require '../keys.php';
        $store = $_SERVER['HTTP_X_SHOPIFY_SHOP_DOMAIN'];
        // $store = '';
        $data = file_get_contents('php://input');
        file_put_contents('new_order.txt',$data);
        // $array = json_decode($data,true);
        // $data1 = '{"id":4709678088421,"admin_graphql_api_id":"gid:\/\/shopify\/Order\/4709678088421","app_id":580111,"browser_ip":"103.72.170.251","buyer_accepts_marketing":true,"cancel_reason":null,"cancelled_at":null,"cart_token":null,"checkout_id":32867360309477,"checkout_token":"91cb1379b6398d8c33b1ed5ec6c03a72","client_details":{"accept_language":"en-US,en;q=0.9","browser_height":714,"browser_ip":"103.72.170.251","browser_width":1519,"session_hash":null,"user_agent":"Mozilla\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/99.0.4844.82 Safari\/537.36"},"closed_at":null,"confirmed":true,"contact_email":"kawalbathla823@gmail.com","created_at":"2022-03-23T18:42:19+05:30","currency":"INR","current_subtotal_price":"80.00","current_subtotal_price_set":{"shop_money":{"amount":"80.00","currency_code":"INR"},"presentment_money":{"amount":"80.00","currency_code":"INR"}},"current_total_discounts":"0.00","current_total_discounts_set":{"shop_money":{"amount":"0.00","currency_code":"INR"},"presentment_money":{"amount":"0.00","currency_code":"INR"}},"current_total_duties_set":null,"current_total_price":"94.40","current_total_price_set":{"shop_money":{"amount":"94.40","currency_code":"INR"},"presentment_money":{"amount":"94.40","currency_code":"INR"}},"current_total_tax":"14.40","current_total_tax_set":{"shop_money":{"amount":"14.40","currency_code":"INR"},"presentment_money":{"amount":"14.40","currency_code":"INR"}},"customer_locale":"en","device_id":null,"discount_codes":[],"email":"kawalbathla823@gmail.com","estimated_taxes":false,"financial_status":"paid","fulfillment_status":null,"gateway":"bogus","landing_site":"\/wallets\/checkouts.json","landing_site_ref":null,"location_id":null,"name":"#1002","note":null,"note_attributes":[],"number":2,"order_number":1002,"order_status_url":"https:\/\/dr-sterile-sanitizer.myshopify.com\/63438225637\/orders\/20ca30f37c4f5c60b4c2385d3d4149a3\/authenticate?key=f7588eb679403d0dfecead589e4d59cd","original_total_duties_set":null,"payment_gateway_names":["bogus"],"phone":null,"presentment_currency":"INR","processed_at":"2022-03-23T18:42:17+05:30","processing_method":"direct","reference":null,"referring_site":"https:\/\/dr-sterile-sanitizer.myshopify.com\/products\/classic-leather-jacket","source_identifier":null,"source_name":"web","source_url":null,"subtotal_price":"80.00","subtotal_price_set":{"shop_money":{"amount":"80.00","currency_code":"INR"},"presentment_money":{"amount":"80.00","currency_code":"INR"}},"tags":"","tax_lines":[{"price":"14.40","rate":0.18,"title":"IGST","price_set":{"shop_money":{"amount":"14.40","currency_code":"INR"},"presentment_money":{"amount":"14.40","currency_code":"INR"}},"channel_liable":false}],"taxes_included":false,"test":true,"token":"20ca30f37c4f5c60b4c2385d3d4149a3","total_discounts":"0.00","total_discounts_set":{"shop_money":{"amount":"0.00","currency_code":"INR"},"presentment_money":{"amount":"0.00","currency_code":"INR"}},"total_line_items_price":"80.00","total_line_items_price_set":{"shop_money":{"amount":"80.00","currency_code":"INR"},"presentment_money":{"amount":"80.00","currency_code":"INR"}},"total_outstanding":"0.00","total_price":"94.40","total_price_set":{"shop_money":{"amount":"94.40","currency_code":"INR"},"presentment_money":{"amount":"94.40","currency_code":"INR"}},"total_price_usd":"1.24","total_shipping_price_set":{"shop_money":{"amount":"0.00","currency_code":"INR"},"presentment_money":{"amount":"0.00","currency_code":"INR"}},"total_tax":"14.40","total_tax_set":{"shop_money":{"amount":"14.40","currency_code":"INR"},"presentment_money":{"amount":"14.40","currency_code":"INR"}},"total_tip_received":"0.00","total_weight":0,"updated_at":"2022-03-23T18:42:20+05:30","user_id":null,"billing_address":{"first_name":"kawal","address1":"mohali","phone":null,"city":"mohali","zip":"160071","province":"Punjab","country":"India","last_name":"bathla","address2":"","company":null,"latitude":30.7038528,"longitude":76.7076768,"name":"kawal bathla","country_code":"IN","province_code":"PB"},"customer":{"id":6359375806693,"email":"kawalbathla823@gmail.com","accepts_marketing":true,"created_at":"2022-03-21T10:50:18+05:30","updated_at":"2022-03-23T18:42:19+05:30","first_name":"kawal","last_name":"bathla","orders_count":0,"state":"disabled","total_spent":"0.00","last_order_id":null,"note":null,"verified_email":true,"multipass_identifier":null,"tax_exempt":false,"phone":null,"tags":"","last_order_name":null,"currency":"INR","accepts_marketing_updated_at":"2022-03-23T18:42:19+05:30","marketing_opt_in_level":"single_opt_in","tax_exemptions":[],"sms_marketing_consent":null,"admin_graphql_api_id":"gid:\/\/shopify\/Customer\/6359375806693","default_address":{"id":7828881834213,"customer_id":6359375806693,"first_name":"kawal","last_name":"bathla","company":null,"address1":"mohali","address2":"","city":"mohali","province":"Punjab","country":"India","zip":"160071","phone":null,"name":"kawal bathla","province_code":"PB","country_code":"IN","country_name":"India","default":true}},"discount_applications":[],"fulfillments":[],"line_items":[{"id":12065553187045,"admin_graphql_api_id":"gid:\/\/shopify\/LineItem\/12065553187045","fulfillable_quantity":1,"fulfillment_service":"manual","fulfillment_status":null,"gift_card":false,"grams":0,"name":"Classic Leather Jacket","origin_location":{"id":3447673913573,"country_code":"IN","province_code":"PB","name":"Dr Sterile Sanitizer","address1":"mohali","address2":"","city":"mohali","zip":"160071"},"price":"80.00","price_set":{"shop_money":{"amount":"80.00","currency_code":"INR"},"presentment_money":{"amount":"80.00","currency_code":"INR"}},"product_exists":true,"product_id":7679813288165,"properties":[],"quantity":1,"requires_shipping":true,"sku":"","taxable":true,"title":"Classic Leather Jacket","total_discount":"0.00","total_discount_set":{"shop_money":{"amount":"0.00","currency_code":"INR"},"presentment_money":{"amount":"0.00","currency_code":"INR"}},"variant_id":42640806281445,"variant_inventory_management":"shopify","variant_title":"","vendor":"partners-demo","tax_lines":[{"channel_liable":false,"price":"14.40","price_set":{"shop_money":{"amount":"14.40","currency_code":"INR"},"presentment_money":{"amount":"14.40","currency_code":"INR"}},"rate":0.18,"title":"IGST"}],"duties":[],"discount_allocations":[]}],"payment_details":{"credit_card_bin":"1","avs_result_code":null,"cvv_result_code":null,"credit_card_number":"•••• •••• •••• 1","credit_card_company":"Bogus"},"payment_terms":null,"refunds":[],"shipping_address":{"first_name":"kawal","address1":"mohali","phone":null,"city":"mohali","zip":"160071","province":"Punjab","country":"India","last_name":"bathla","address2":"","company":null,"latitude":30.7038528,"longitude":76.7076768,"name":"kawal bathla","country_code":"IN","province_code":"PB"},"shipping_lines":[{"id":3922644173029,"carrier_identifier":null,"code":"Standard","delivery_category":null,"discounted_price":"0.00","discounted_price_set":{"shop_money":{"amount":"0.00","currency_code":"INR"},"presentment_money":{"amount":"0.00","currency_code":"INR"}},"phone":null,"price":"0.00","price_set":{"shop_money":{"amount":"0.00","currency_code":"INR"},"presentment_money":{"amount":"0.00","currency_code":"INR"}},"requested_fulfillment_service_id":null,"source":"shopify","title":"Standard","tax_lines":[],"discount_allocations":[]}]}';

        //var_dump($data);

        // $data = '{"id":7679813615845,"title":"Black Leather Bag","body_html":"\u003cp\u003eWomens black leather bag, with ample space. Can be worn over the shoulder, or remove straps to carry in your hand.1233345\u003c\/p\u003e\n\u003cp\u003e \u003c\/p\u003e","vendor":"partners-demo","product_type":"","created_at":"2022-03-21T13:13:29+05:30","handle":"black-leather-bag","updated_at":"2022-03-23T11:35:53+05:30","published_at":"2022-03-21T13:13:28+05:30","template_suffix":"","status":"active","published_scope":"web","tags":"women","admin_graphql_api_id":"gid:\/\/shopify\/Product\/7679813615845","variants":[{"id":42640806609125,"product_id":7679813615845,"title":"Default Title","price":"3000.00","sku":"","position":1,"inventory_policy":"continue","compare_at_price":null,"fulfillment_service":"manual","inventory_management":"shopify","option1":"Default Title","option2":null,"option3":null,"created_at":"2022-03-21T13:13:29+05:30","updated_at":"2022-03-23T11:35:53+05:30","taxable":true,"barcode":"","grams":0,"image_id":null,"weight":0.0,"weight_unit":"kg","inventory_item_id":44735340544229,"inventory_quantity":1,"old_inventory_quantity":1,"requires_shipping":true,"admin_graphql_api_id":"gid:\/\/shopify\/ProductVariant\/42640806609125"}],"options":[{"id":9784195350757,"product_id":7679813615845,"name":"Title","position":1,"values":["Default Title"]}],"images":[{"id":36926028513509,"product_id":7679813615845,"position":1,"created_at":"2022-03-21T13:13:29+05:30","updated_at":"2022-03-21T13:13:29+05:30","alt":null,"width":925,"height":617,"src":"https:\/\/cdn.shopify.com\/s\/files\/1\/0634\/3822\/5637\/products\/black-bag-over-the-shoulder_925x_a2907184-220e-4a19-b4e4-76eb7c38a463.jpg?v=1647848609","variant_ids":[],"admin_graphql_api_id":"gid:\/\/shopify\/ProductImage\/36926028513509"}],"image":{"id":36926028513509,"product_id":7679813615845,"position":1,"created_at":"2022-03-21T13:13:29+05:30","updated_at":"2022-03-21T13:13:29+05:30","alt":null,"width":925,"height":617,"src":"https:\/\/cdn.shopify.com\/s\/files\/1\/0634\/3822\/5637\/products\/black-bag-over-the-shoulder_925x_a2907184-220e-4a19-b4e4-76eb7c38a463.jpg?v=1647848609","variant_ids":[],"admin_graphql_api_id":"gid:\/\/shopify\/ProductImage\/36926028513509"}}';
        $array = json_decode($data, true);

        echo"<pre>";
        ($array['customer']['tags'] = "kawal");
        // print_r($array);