<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://sdks.shopifycdn.com/polaris/latest/polaris.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/request.css">
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

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
    <div p-color-scheme="light"><a href="/request_quote"><button class="Polaris-Button Polaris-Button--sizeLarge"redirect_link=""type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Home</span></span></button></a>
    <a href="/request_quote/contact"><button class="Polaris-Button Polaris-Button--sizeLarge"redirect_link="contact"type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Contact</span></span></button></a>
    <a href="/request_quote/about_us"><button class="Polaris-Button Polaris-Button--sizeLarge"redirect_link="about_us"type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">About</span></span></button></a>
    </div>
    </header>
    <!-- <a href="/request_quote/about_us">about us</a><br> -->
    <!-- <a href="/request_quote/contact">contact</a><br> -->
    <!-- <a href="/<?php echo $this->config->item('directory') ?>/contact_detail">contact detail</a><br> -->
    <div class="data">
        <input type="hidden" id="shopify_api_key" value="<?php echo $this->config->item('shopify_api_key'); ?>">
        <input type="hidden" id="shopify_version" value="<?php echo $this->config->item('shopify_api_version'); ?>">
        <input type="hidden" id="base_url" value="<?php echo $this->config->item('base_url'); ?>">
        <input type="hidden" id="store" value="<?php echo $this->input->get('shop'); ?>">
    </div>