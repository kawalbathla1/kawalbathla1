<!DOCTYPE html>
<html>
    <head>
        <link href="https://sdks.shopifycdn.com/polaris/latest/polaris.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/quote.css">
        <script src="https://unpkg.com/@shopify/app-bridge@2"></script>
        <script>

            /*- shopify app bridge (Toast,Modal in js file)--*/
            var AppBridge = window['app-bridge'];
            var createApp = AppBridge.default;
            var app = createApp({
                apiKey: '<?php echo($apiKey); ?>',
                shopOrigin : '<?php echo($store); ?>'
            });
            var AppBridge = window['app-bridge'];
            var actions = AppBridge.actions;
            var TitleBar = actions.TitleBar;
            var Button = actions.Button;
            var Redirect = actions.Redirect;

            var breadcrumb = Button.create(app, { label: 'Message' });
            breadcrumb.subscribe(Button.Action.CLICK, function() {
                app.dispatch(Redirect.toApp({ path: '/breadcrumb-link' }));
            });
            var titleBarOptions = {
            title: 'My page title',
            breadcrumbs: breadcrumb
            };
            var myTitleBar = TitleBar.create(app, titleBarOptions);
            /*- shopify app bridge--*/

        </script> 
    </head>
<body>
    <!--Header Section ----------->
    <header>
        <div>
            <button class="Polaris-Button My_Tab_data" attr_redirect_link = "" type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text" id="Tab_header_Bttn" >Tab</span></span></button>
            <button class="Polaris-Button My_Tab_data" attr_redirect_link = "" type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text" id="ContactUs_header_Bttn">Contact Us</span></span></button>
        </div>
    </header>

    <div class="main">
        <!-- directory from config file ------------>
        <input type="hidden" id ="baseurlform"  value = "<?php echo $this->config->item('base_url') ?>">
        <input type="hidden" id ="shopify_key"  value = "<?php echo $this->config->item('shopify_api_key') ?>">
        <input type="hidden" id ="mydirectory"  value = "<?php echo $this->config->item('directory') ?>">
        <input type="hidden" id="config_store" name="config_app_store" value="<?php echo $store; ?>">
    </div>  