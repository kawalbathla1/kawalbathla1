$(document).ready(function (){ 

    /***** GLOBAL VARIABLE DECALRE *****/
    const  base_url = $("#baseurlform").val();
    const  shopify_apikey = $('#shopify_key').val();
    const  directory = $('#mydirectory').val();
    const  store = $('#config_store').val();

    /*-- AppBridge(Button,Modal,Toast)--*/
    var AppBridge = window['app-bridge'];
    var createApp = AppBridge.default;
    var app = createApp({
        apiKey: shopify_apikey,
        shopOrigin : store
    });
    var AppBridge = window['app-bridge'];
    var Button = actions.Button;
    var Modal = actions.Modal;
    var Toast = actions.Toast;
    var ResourcePicker = actions.ResourcePicker;


    $(".browse_product").click(function(){
        console.log('hi');
        var productPicker = ResourcePicker.create(app, {
            resourceType: ResourcePicker.ResourceType.Product,
            options: {
                selectMultiple: true,
                showHidden: false,
              },
          });
        productPicker.dispatch(ResourcePicker.Action.OPEN);
      
    });

});