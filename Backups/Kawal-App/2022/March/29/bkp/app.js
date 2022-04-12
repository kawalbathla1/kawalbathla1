
    // console.log()
    // jQuery(".cart__ctas").html("<button>checkout</button>");
    $("button[name='checkout']").hide();
    var classname = $("button[name='checkout']").attr("class");
    console.log(classname) 
    $("button[name='checkout']").after(`<button class='${classname}' id='newcheckout'>Kawal Checkout</button>`)
    $(document).ready(function() {

        $('body #newcheckout').on("click",function() {
            console.log("kjiji")
            $.ajax({
                url:"https://dr-sterile-sanitizer.myshopify.com/cart.json",
                type:"GET",
               success:function(data) {
                //    cart_data = json_decode(data)
                   console.log(data.items)
                   $.ajax({
                       url:"https://shinedezigninfotech.com/kawal_app/cart_data.php",
                       type:"POST",
                       data:{items: data.items},
                       success:function(response) {
                        myfun(response);
                       }
                   })
               }
            });
            function myfun(data) {
                console.log(data)
            }
        });
    })
