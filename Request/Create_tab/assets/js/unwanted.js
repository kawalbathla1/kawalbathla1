$(document).ready(function (){ 

    var base_url = $("#baseurlform").val();
    var shopify_apikey = $('#shopify_key').val();
    var directory = $('#mydirectory').val();
    var store = $('#config_store').val();

    /* Tiny MCE text editor */
    tinymce.init({
        selector: '#rte',
        toolbar: 'bold italic underline',
        height: '280px',
        width: '570px',
        elementpath: false,
        menubar: false,
        selector: "textarea",
        menubar : false,
        statusbar:false,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist  "
    });
    /* Tiny MCE text editor */

    /*-- AppBridge(Button,Modal,Toast)--*/
    var AppBridge = window['app-bridge'];
    var createApp = AppBridge.default;
    var app = createApp({
        apiKey: shopify_apikey,
        shopOrigin : store
    });
    var AppBridge = window['app-bridge'];
    // var ResourcePicker = actions.ResourcePicker;

    /* TAB JS */
    
    /* Type Select box */
    $('#product_select').on('change', function () {
       //Select text
        var selectedText = $(this).find("option:selected").text(); 
        $("#product_option").html(selectedText);
       
        var selectedValue = $(this).val();
        $(".Product_tags ").css({display: "none"});
        $( "." +selectedValue+"_data").css({display: "block"});
       
    }); 
   
    /* PRODUCT BUTTON */
    $(".product_genrate").click(function(){
        /*- ResourcePicker for products----(start)*/ 
        var productPicker = ResourcePicker.create(app, {
            resourceType: ResourcePicker.ResourceType.Product,
            options: {
                selectMultiple: true,
                showHidden: false,
            },
        });
        productPicker.dispatch(ResourcePicker.Action.OPEN);
        /*- ResourcePicker----(end)*/ 

    });

    /* COLLECTION BUTTON */
    $(".collection_genrate").click(function(){
        /*- ResourcePicker for collection ----(start)*/ 
        var collectionPicker = ResourcePicker.create(app, {
            resourceType: ResourcePicker.ResourceType.Collection,
            options: {
                selectMultiple: true,
                showHidden: false,
            },
        });
        collectionPicker.dispatch(ResourcePicker.Action.OPEN);
        /*- ResourcePicker----(end)*/ 

    });

    /* PAGE BUTTON */
    $(".page_genrate").click(function(){
        /*- ResourcePicker for collection ----(start)*/ 
        $('.Page_popup').show();
   
        console.log("Page");
        
    });


    /* page popup button action perform */
    $(".cancel_popup").click(function(){
        $('.Page_popup').hide();
    });
    $(".add_popup").click(function(){
       console.log("add popup");
    });
    

    /* tab LISTING */
    $(function(){
        $("#tab-listing").dataTable();
    });

   $(".edit_list") .click(function(){
    alert("edit");
   });
  
   $(".delete_list") .click(function(){
    alert("delete");
   });
  
   $(".bttnTab_setting") .click(function(){
        window.top.location= ('https://'+store+'/admin/apps/'+shopify_apikey+'/'+directory+'/Tabs_setting');
        
   });

});