
    if(ShopifyAnalytics.meta.page.pageType == "product") {
        var product_id = ShopifyAnalytics.meta.product.id
        var variant_id = ShopifyAnalytics.meta.selectedVariantId
        // console.log(variant_id)
        $.ajax({
            url:"https://shinedezigninfotech.com/kawal_app/cart_data.php",
            type:"POST",
            data:{"action":"preorder","product_id":product_id,"variant_id":variant_id},
            success:function(response) {
                if(response == "updated") {
                    $("button[name='add']").hide();
                    var classname = $("button[name='add']").attr("class");
                    // console.log(classname) 
                    $("button[name='add']").after(`<button class='${classname}' id='${variant_id}'>Kawal preorder</button>`)
                }
            }
        })
        
    }
    $("button[name='checkout']").hide();
    var classname = $("button[name='checkout']").attr("class");
    // console.log(classname) 
    $("button[name='checkout']").after(`<button class='${classname}' id='newcheckout'>Kawal Checkout</button>`)
    $(document).ready(function() {

        $('body #newcheckout').on("click",function() {
            // console.log("kjiji")
            $.ajax({
                url:"https://dr-sterile-sanitizer.myshopify.com/cart.json",
                type:"GET",
               success:function(data) {
                //    cart_data = json_decode(data)
                //    console.log(data.items)
                   $.ajax({
                       url:"https://shinedezigninfotech.com/kawal_app/cart_data.php",
                       type:"POST",
                       data:{items: data.items,"action":"cart"},
                       success:function(response) {
                        //    console.log(response)
                            // window.top.location.href = response;
                       }
                   })
               }
            });
        });
    })
