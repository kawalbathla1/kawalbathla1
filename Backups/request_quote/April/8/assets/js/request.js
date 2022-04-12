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
    // $("#PolarisCheckbox5").change(function() {
    //     if($('#PolarisCheckbox5 :selected')) {
    //         // console.log("a")
    //         $(".card-information").after("Request Quote");
    //     }
    //     // $("#PolarisSelect2").val(a);
    // })
    // $("#show_polaris_card").hide();
    // if($('#show_polaris_card').prop('checked')){
    //     console.log("ghjk")
    //     $("#show_polaris_card").css("display","block");
    // }
    $(".manualCard").click(function(){
        if($(".manualCard").is(":checked")){
        console.log('aa');
        $("#show_manual_card").css("display","block");
        }else {
            $("#show_manual_card").css("display","none");
        }
    });
    $(".showCard").click(function(){
        if($(".showCard").is(":checked")){
        console.log('aa');
        $("#show_polaris_card").css("display","block");
        }else {
            $("#show_polaris_card").css("display","none");
        }
    });

    id = 0;
    
    $("#add_content").click(function() {
        // $("#content_append").after(`<div class="Polaris-FormLayout__Items"id="itemRemove">
        $("#content_append").append(`<div class="Polaris-FormLayout__Items"id="itemRemove">
        <div class="Polaris-FormLayout__Item" >
            <div class="">
                <div class="Polaris-Select">
                    <select id="PolarisSelect2" class="Polaris-Select__Input product_select " >
                        <option value="TITLE">Product title</option>
                        <option value="TYPE">Product type</option>
                        <option value="VENDOR">Product vendor</option>
                        <option value="PRICE">Product price</option>
                        <option value="STOCK">Product in stock</option>
                        <option value="TAG">Product tag</option>
                        <option value="COLLECTION">Collection</option>
                    </select>
                    <div class="Polaris-Select__Content selected_product_data">
                        <span class="Polaris-Select__SelectedOption" id="selectSet_data${id}">Product title</span>
                        <span class="Polaris-Select__Icon">
                            <span class="Polaris-Icon">
                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path d="M10 16l-4-4h8l-4 4zm0-12l4 4H6l4-4z"></path></svg>
                            </span>
                        </span>
                    </div>
                    <div class="Polaris-Select__Backdrop"></div>
                </div>
            </div>
        </div>
        <div class="Polaris-FormLayout__Item">
            <div class="">
                <div class="Polaris-Select">
                    <select id="PolarisSelect3" class="Polaris-Select__Input condition_select" aria-invalid="false">
                        <option value="EQUALS">is equal to</option>
                        <option value="IS" disabled="">is</option>
                        <option value="NOT_EQUALS">is not equal to</option>
                        <option value="STARTS_WITH">starts with</option>
                        <option value="ENDS_WITH">ends with</option>
                        <option value="GREATER_THAN" disabled="">is greater than</option>
                        <option value="LESS_THAN" disabled="">is less than</option>
                        <option value="CONTAINS">contains</option>
                        <option value="NOT_CONTAINS">does not contain</option>
                    </select>
                    <div class="Polaris-Select__Content selected_condition_data" aria-hidden="true">
                        <span class="Polaris-Select__SelectedOption" id="setCondition${id}">is not equal to</span>
                        <span class="Polaris-Select__Icon">
                            <span class="Polaris-Icon">
                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path d="M10 16l-4-4h8l-4 4zm0-12l4 4H6l4-4z"></path></svg>
                            </span>
                        </span>
                    </div>
                    <div class="Polaris-Select__Backdrop"></div>
                </div>
            </div>
        </div>
        <div class="Polaris-FormLayout__Item">
            <div class="">
                <div class="Polaris-Connected">
                    <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                        <div class="Polaris-TextField">
                            <input id="PolarisTextField3" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField3Label" aria-invalid="false" value="" />
                            <div class="Polaris-TextField__Backdrop"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="polaris-margin-top-left remove-rule">
            <button class="Polaris-Button deleteContent" type="button" id="condition_delete" style='margin-top: 14px;
            margin-left: 18px;height:9px;'>
                <span class="Polaris-Button__Content">
                    <span class="Polaris-Button__Text">
                        <span class="Polaris-Icon">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                <path
                                    d="M8 3.994C8 2.893 8.895 2 10 2s2 .893 2 1.994h4c.552 0 1 .446 1 .997a1 1 0 0 1-1 .997H4c-.552 0-1-.447-1-.997s.448-.997 1-.997h4zM5 14.508V8h2v6.508a.5.5 0 0 0 .5.498H9V8h2v7.006h1.5a.5.5 0 0 0 .5-.498V8h2v6.508A2.496 2.496 0 0 1 12.5 17h-5C6.12 17 5 15.884 5 14.508z"
                                ></path>
                            </svg>
                        </span>
                    </span>
                </span>
            </button>
        </div>
    </div>`);
    ++id;
    })
    $("#PolarisSelect2").change(function() {

        let a = $('#PolarisSelect2 :selected').text();
        // console.log(a)

        $("#selectSet").text(a);
        // $("#PolarisSelect2").val(a);
    })
    $("#PolarisSelect3").change(function() {

        b = $('#PolarisSelect3 :selected').text();
        console.log(b)

        $("#setSelect1").text(b);
        // $("#PolarisSelect2").val(a);
    })
  
    $('body').on('click', '#condition_delete',function() {
        $("#itemRemove").remove();
    });

    $('body').on('change', '.product_select',function() {
        console.log("ok");
        //let a = $('.product_select :selected').text();
        if($(this).find("option:selected")) {
            let product_value = $(this).find("option:selected").text();
            // id = $(".Polaris-Select__SelectedOption").attr("id");
            let id = $(this).siblings('.selected_product_data').children('.Polaris-Select__SelectedOption').attr("id");
            // console.log(id);
            // console.log(c);

            $("#"+id+"").text(product_value);
        }
       
        // console.log(c)

      
    });
    $('body').on('click','.condition_select',function() {
        if($(this).find("option:selected")) {
            let condition_value = $(this).find("option:selected").text();
            console.log(condition_value)
            let id = $(this).siblings(".selected_condition_data").children(".Polaris-Select__SelectedOption").attr('id');
            // console.log(id)
            $("#"+id+"").text(condition_value);
        }
    })
    
})
    
