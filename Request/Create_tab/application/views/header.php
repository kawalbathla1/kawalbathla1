<!DOCTYPE html>
<html>
    <head>
        <link href="https://sdks.shopifycdn.com/polaris/latest/polaris.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- tiny text editor -->
        <script src="https://cdn.tiny.cloud/1/6009lt04pt1m00jyye2w0qsem7fqxb8bcmfep9rzzaqmpn3p/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/backendstyle.css">
        <script src="https://unpkg.com/@shopify/app-bridge@2"></script>
        <script>
            /*- shopify app bridge (Toast,Modal in js file)--*/
            var AppBridge = window['app-bridge'];
            var createApp = AppBridge.default;
            var app = createApp({
                apiKey: '9f030e98dda2f092728d506ad956caaa',
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
            <button class="Polaris-Button My_Tab_data" attr_redirect_link = "tabs_show" type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text" id="Tab_header_Bttn" >Tab</span></span></button>
            <button class="Polaris-Button My_Tab_data" attr_redirect_link = "contact_us_show" type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text" id="ContactUs_header_Bttn">Contact Us</span></span></button>
        </div>
    </header>

    <!--Discard and save polaris stack ----------->
    <div class="header_polaris_stack">
        <div class="Polaris-Stack">
            <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                <h2 class="Polaris-Heading-unsaved">Unsaved changes</h2>
            </div>

            <div class="stack_button_section">
                <!-- - Discard --- -->
                <div> 
                    <button class="Polaris-Button Polaris-Button--outline Stack_discard_button stack_popup_bttn" attr-model="show_model" type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text stack-Button-discard">Discard</span></span></button>
                    <div id="PolarisPortalsContainer"></div>
                </div>
                <!-- - Save --- -->
                <div> 
                    <button class="Polaris-Button polaris_primary_button Stack_save_button" type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text stack-Button-Save">Save</span></span></button>
                    <div id="PolarisPortalsContainer"></div>
                </div>
            </div>

        </div>
        <div id="PolarisPortalsContainer"></div>
    </div>

    <div class="main">
        <!-- directory from config file ------------>
        <input type="hidden" id ="baseurlform"  value = "<?php echo $this->config->item('base_url') ?>">
        <input type="hidden" id ="shopify_key"  value = "<?php echo $this->config->item('shopify_api_key') ?>">
        <input type="hidden" id ="mydirectory"  value = "<?php echo $this->config->item('directory') ?>">
        <!-- store------------>
        <input type="hidden" id="config_store" name="config_app_store" value="<?php echo $store; ?>">
    </div>  
   
  

    
 

