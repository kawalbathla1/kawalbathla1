$(document).ready(function(){
   
    const base_url = $("#base_url").val();
    const shopify_api_key = $("#shopify_api_key").val();
    const directory = $('#shopify_version').val();
    const store = $("#shopify_store").val();

    // console.log(shopify_api_key);

    /*-- AppBridge(Button,Modal,Toast)--*/
    var AppBridge = window['app-bridge'];
    var createApp = AppBridge.default;
    var app = createApp({
        apiKey: shopify_api_key,
        shopOrigin : store
    });
    var AppBridge = window['app-bridge'];
    var Button = actions.Button;
    var Modal = actions.Modal;
    var Toast = actions.Toast;
    var ResourcePicker = actions.ResourcePicker;
 
    //ResourcePicker
    $(".browse_product").click(function(){
        var productPicker = ResourcePicker.create(app, {
            resourceType: ResourcePicker.ResourceType.Product,
            options: {
                selectMultiple: true,
                showHidden: false,
            },
        });
        productPicker.dispatch(ResourcePicker.Action.OPEN);
    });

    
    $("#PolarisSelect2").change(function() {

        a = $("#PolarisSelect2").val();
        console.log(a);
    })

    // $("#show_polaris_card").hide();
    // if($('#show_polaris_card').prop('checked')){
    //     console.log("ghjk")
    //     $("#show_polaris_card").css("display","block");
    // }

    $(".showCard").click(function(){
        if($(".showCard").is(":checked")){
        console.log('aa');
        $("#show_polaris_card").css("display","block");
        }else {
            $("#show_polaris_card").css("display","none");
        }
    });
})
    
