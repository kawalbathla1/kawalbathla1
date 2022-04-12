<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("keys.php");
include("shopify.php");
$store = $_GET['shop'];
// echo $store;die;
$conn = mysqli_connect($MYSQL_HOST,$MYSQL_USER,$MYSQL_PASS,$MYSQL_DB);
$token = "SELECT `access_token` FROM `installs` WHERE `store` = '$store'";
$query = mysqli_query($conn,$token);
$data = mysqli_fetch_assoc($query);
$access_token = $data['access_token'];
$sc = new ShopifyClient($store, $access_token, $SHOPIFY_APIKEY, $SHOPIFY_SECRET);

$shop_endpoint = '/admin/api/'.$SHOPIFY_API_VERSION.'/products.json';
$shop_data = $sc->call('GET', $shop_endpoint);
// echo"<pre>";
// foreach($shop_data as $value) {
// $id = array_column($value['variants'],"id");
// print_r($id);
// }
// echo "<pre>";
// print_r($shop_data);die;
?> 

 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/@shopify/polaris@6.4.0/dist/styles.css" /></head>
    <style>
#success {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: green;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#success.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</style>
<body>
    <div style="--p-background:rgba(246, 246, 247, 1); --p-background-hovered:rgba(241, 242, 243, 1); --p-background-pressed:rgba(237, 238, 239, 1); --p-background-selected:rgba(237, 238, 239, 1); --p-surface:rgba(255, 255, 255, 1); --p-surface-neutral:rgba(228, 229, 231, 1); --p-surface-neutral-hovered:rgba(219, 221, 223, 1); --p-surface-neutral-pressed:rgba(201, 204, 208, 1); --p-surface-neutral-disabled:rgba(241, 242, 243, 1); --p-surface-neutral-subdued:rgba(246, 246, 247, 1); --p-surface-subdued:rgba(250, 251, 251, 1); --p-surface-disabled:rgba(250, 251, 251, 1); --p-surface-hovered:rgba(246, 246, 247, 1); --p-surface-pressed:rgba(241, 242, 243, 1); --p-surface-depressed:rgba(237, 238, 239, 1); --p-surface-search-field:rgba(241, 242, 243, 1); --p-backdrop:rgba(0, 0, 0, 0.5); --p-overlay:rgba(255, 255, 255, 0.5); --p-shadow-from-dim-light:rgba(0, 0, 0, 0.2); --p-shadow-from-ambient-light:rgba(23, 24, 24, 0.05); --p-shadow-from-direct-light:rgba(0, 0, 0, 0.15); --p-hint-from-direct-light:rgba(0, 0, 0, 0.15); --p-border:rgba(140, 145, 150, 1); --p-border-neutral-subdued:rgba(186, 191, 195, 1); --p-border-hovered:rgba(153, 158, 164, 1); --p-border-disabled:rgba(210, 213, 216, 1); --p-border-subdued:rgba(201, 204, 207, 1); --p-border-depressed:rgba(87, 89, 89, 1); --p-border-shadow:rgba(174, 180, 185, 1); --p-border-shadow-subdued:rgba(186, 191, 196, 1); --p-divider:rgba(225, 227, 229, 1); --p-icon:rgba(92, 95, 98, 1); --p-icon-hovered:rgba(26, 28, 29, 1); --p-icon-pressed:rgba(68, 71, 74, 1); --p-icon-disabled:rgba(186, 190, 195, 1); --p-icon-subdued:rgba(140, 145, 150, 1); --p-text:rgba(32, 34, 35, 1); --p-text-disabled:rgba(140, 145, 150, 1); --p-text-subdued:rgba(109, 113, 117, 1); --p-interactive:rgba(44, 110, 203, 1); --p-interactive-disabled:rgba(189, 193, 204, 1); --p-interactive-hovered:rgba(31, 81, 153, 1); --p-interactive-pressed:rgba(16, 50, 98, 1); --p-focused:rgba(69, 143, 255, 1); --p-surface-selected:rgba(242, 247, 254, 1); --p-surface-selected-hovered:rgba(237, 244, 254, 1); --p-surface-selected-pressed:rgba(229, 239, 253, 1); --p-icon-on-interactive:rgba(255, 255, 255, 1); --p-text-on-interactive:rgba(255, 255, 255, 1); --p-action-secondary:rgba(255, 255, 255, 1); --p-action-secondary-disabled:rgba(255, 255, 255, 1); --p-action-secondary-hovered:rgba(246, 246, 247, 1); --p-action-secondary-pressed:rgba(241, 242, 243, 1); --p-action-secondary-depressed:rgba(109, 113, 117, 1); --p-action-primary:rgba(0, 128, 96, 1); --p-action-primary-disabled:rgba(241, 241, 241, 1); --p-action-primary-hovered:rgba(0, 110, 82, 1); --p-action-primary-pressed:rgba(0, 94, 70, 1); --p-action-primary-depressed:rgba(0, 61, 44, 1); --p-icon-on-primary:rgba(255, 255, 255, 1); --p-text-on-primary:rgba(255, 255, 255, 1); --p-text-primary:rgba(0, 123, 92, 1); --p-text-primary-hovered:rgba(0, 108, 80, 1); --p-text-primary-pressed:rgba(0, 92, 68, 1); --p-surface-primary-selected:rgba(241, 248, 245, 1); --p-surface-primary-selected-hovered:rgba(179, 208, 195, 1); --p-surface-primary-selected-pressed:rgba(162, 188, 176, 1); --p-border-critical:rgba(253, 87, 73, 1); --p-border-critical-subdued:rgba(224, 179, 178, 1); --p-border-critical-disabled:rgba(255, 167, 163, 1); --p-icon-critical:rgba(215, 44, 13, 1); --p-surface-critical:rgba(254, 211, 209, 1); --p-surface-critical-subdued:rgba(255, 244, 244, 1); --p-surface-critical-subdued-hovered:rgba(255, 240, 240, 1); --p-surface-critical-subdued-pressed:rgba(255, 233, 232, 1); --p-surface-critical-subdued-depressed:rgba(254, 188, 185, 1); --p-text-critical:rgba(215, 44, 13, 1); --p-action-critical:rgba(216, 44, 13, 1); --p-action-critical-disabled:rgba(241, 241, 241, 1); --p-action-critical-hovered:rgba(188, 34, 0, 1); --p-action-critical-pressed:rgba(162, 27, 0, 1); --p-action-critical-depressed:rgba(108, 15, 0, 1); --p-icon-on-critical:rgba(255, 255, 255, 1); --p-text-on-critical:rgba(255, 255, 255, 1); --p-interactive-critical:rgba(216, 44, 13, 1); --p-interactive-critical-disabled:rgba(253, 147, 141, 1); --p-interactive-critical-hovered:rgba(205, 41, 12, 1); --p-interactive-critical-pressed:rgba(103, 15, 3, 1); --p-border-warning:rgba(185, 137, 0, 1); --p-border-warning-subdued:rgba(225, 184, 120, 1); --p-icon-warning:rgba(185, 137, 0, 1); --p-surface-warning:rgba(255, 215, 157, 1); --p-surface-warning-subdued:rgba(255, 245, 234, 1); --p-surface-warning-subdued-hovered:rgba(255, 242, 226, 1); --p-surface-warning-subdued-pressed:rgba(255, 235, 211, 1); --p-text-warning:rgba(145, 106, 0, 1); --p-border-highlight:rgba(68, 157, 167, 1); --p-border-highlight-subdued:rgba(152, 198, 205, 1); --p-icon-highlight:rgba(0, 160, 172, 1); --p-surface-highlight:rgba(164, 232, 242, 1); --p-surface-highlight-subdued:rgba(235, 249, 252, 1); --p-surface-highlight-subdued-hovered:rgba(228, 247, 250, 1); --p-surface-highlight-subdued-pressed:rgba(213, 243, 248, 1); --p-text-highlight:rgba(52, 124, 132, 1); --p-border-success:rgba(0, 164, 124, 1); --p-border-success-subdued:rgba(149, 201, 180, 1); --p-icon-success:rgba(0, 127, 95, 1); --p-surface-success:rgba(174, 233, 209, 1); --p-surface-success-subdued:rgba(241, 248, 245, 1); --p-surface-success-subdued-hovered:rgba(236, 246, 241, 1); --p-surface-success-subdued-pressed:rgba(226, 241, 234, 1); --p-text-success:rgba(0, 128, 96, 1); --p-decorative-one-icon:rgba(126, 87, 0, 1); --p-decorative-one-surface:rgba(255, 201, 107, 1); --p-decorative-one-text:rgba(61, 40, 0, 1); --p-decorative-two-icon:rgba(175, 41, 78, 1); --p-decorative-two-surface:rgba(255, 196, 176, 1); --p-decorative-two-text:rgba(73, 11, 28, 1); --p-decorative-three-icon:rgba(0, 109, 65, 1); --p-decorative-three-surface:rgba(146, 230, 181, 1); --p-decorative-three-text:rgba(0, 47, 25, 1); --p-decorative-four-icon:rgba(0, 106, 104, 1); --p-decorative-four-surface:rgba(145, 224, 214, 1); --p-decorative-four-text:rgba(0, 45, 45, 1); --p-decorative-five-icon:rgba(174, 43, 76, 1); --p-decorative-five-surface:rgba(253, 201, 208, 1); --p-decorative-five-text:rgba(79, 14, 31, 1); --p-border-radius-slim:0.125rem; --p-border-radius-base:0.25rem; --p-border-radius-wide:0.5rem; --p-border-radius-full:50%; --p-card-shadow:0px 0px 5px var(--p-shadow-from-ambient-light), 0px 1px 2px var(--p-shadow-from-direct-light); --p-popover-shadow:-1px 0px 20px var(--p-shadow-from-ambient-light), 0px 1px 5px var(--p-shadow-from-direct-light); --p-modal-shadow:0px 26px 80px var(--p-shadow-from-dim-light), 0px 0px 1px var(--p-shadow-from-dim-light); --p-top-bar-shadow:0 2px 2px -1px var(--p-shadow-from-direct-light); --p-button-drop-shadow:0 1px 0 rgba(0, 0, 0, 0.05); --p-button-inner-shadow:inset 0 -1px 0 rgba(0, 0, 0, 0.2); --p-button-pressed-inner-shadow:inset 0 1px 0 rgba(0, 0, 0, 0.15); --p-override-none:none; --p-override-transparent:transparent; --p-override-one:1; --p-override-visible:visible; --p-override-zero:0; --p-override-loading-z-index:514; --p-button-font-weight:500; --p-non-null-content:''; --p-choice-size:1.25rem; --p-icon-size:0.625rem; --p-choice-margin:0.0625rem; --p-control-border-width:0.125rem; --p-banner-border-default:inset 0 1px 0 0 var(--p-border-neutral-subdued), inset 0 0 0 1px var(--p-border-neutral-subdued); --p-banner-border-success:inset 0 1px 0 0 var(--p-border-success-subdued), inset 0 0 0 1px var(--p-border-success-subdued); --p-banner-border-highlight:inset 0 1px 0 0 var(--p-border-highlight-subdued), inset 0 0 0 1px var(--p-border-highlight-subdued); --p-banner-border-warning:inset 0 1px 0 0 var(--p-border-warning-subdued), inset 0 0 0 1px var(--p-border-warning-subdued); --p-banner-border-critical:inset 0 1px 0 0 var(--p-border-critical-subdued), inset 0 0 0 1px var(--p-border-critical-subdued); --p-badge-mix-blend-mode:luminosity; --p-thin-border-subdued:1px solid var(--p-border-subdued); --p-text-field-spinner-offset:0.125rem; --p-text-field-focus-ring-offset:-0.25rem; --p-text-field-focus-ring-border-radi:0.4375rem; --p-button-group-item-spacing:-0.0625rem; --p-duration-1-0-0:100ms; --p-duration-1-5-0:150ms; --p-ease-in:cubic-bezier(0.5, 0.1, 1, 1); --p-ease:cubic-bezier(0.4, 0.22, 0.28, 1); --p-range-slider-thumb-size-base:1rem; --p-range-slider-thumb-size-active:1.5rem; --p-range-slider-thumb-scale:1.5; --p-badge-font-weight:400; --p-frame-offset:0px;">
    <div>
    <div p-color-scheme="light">
  <div class="Polaris-Page">
    <div class="Polaris-Page__Content">
      <div class="Polaris-Card">
        <div class="Polaris-ResourceList__ResourceListWrapper">
          <div class="Polaris-ResourceList__HeaderOuterWrapper">
            <div>
              <div></div>
              <div>
                <div class="Polaris-ResourceList__HeaderWrapper">
                  <div class="Polaris-ResourceList__HeaderContentWrapper">
                    <div class="Polaris-ResourceList__HeaderTitleWrapper">All Products</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <ul class="Polaris-ResourceList" aria-live="polite">
          <?php $image = ""; foreach($shop_data as $value){ 
              if($value['image']) {
                  $image = $value['image']['src'];
            }else {
                    $image = "https://thumbs.dreamstime.com/b/no-image-available-icon-flat-vector-no-image-available-icon-flat-vector-illustration-132482953.jpg";
              }?>
            <li class="Polaris-ResourceItem__ListItem">
              <div class="Polaris-ResourceItem__ItemWrapper">
                <div class="Polaris-ResourceItem" data-href="customers/341"><a aria-describedby="341" aria-label="View details for item" class="Polaris-ResourceItem__Link" tabindex="0" id="PolarisResourceListItemOverlay11" href="customers/341" data-polaris-unstyled="true"></a>
                  <div class="Polaris-ResourceItem__Container" id="341">
                    <div class="Polaris-ResourceItem__Owned">
                      <div class="Polaris-ResourceItem__Media">
                        <span class="Polaris-Thumbnail Polaris-Thumbnail--sizeLarge"><img src="<?php echo $image;?>" alt="no image"></span>  
                      
                        
                        </div>
                    </div>
                    <div class="Polaris-ResourceItem__Content">
                      <h3><span class="Polaris-TextStyle--variationStrong"><?php echo $value['title']; ?>
                      <?php
                        $status = "";
                        $conn = mysqli_connect($MYSQL_HOST,$MYSQL_USER,$MYSQL_PASS,$MYSQL_DB);
                        $select = "SELECT * FROM `products`";
                        $query = mysqli_query($conn,$select);
                        if(mysqli_num_rows($query) > 0) {
                          while($data = mysqli_fetch_assoc($query)) {
                            $checked = $data['checkbox'];
                            if($checked == "true" && $data['product_id'] == $value['id']) {
                              $status = "checked";
                            }
                            
                          }
                        }
                       ?>
                      <div ><input type="checkbox"class="check" id="<?php echo $value['id'];?>" data-id="<?php echo $_GET['shop'];?>" <?php echo $status;?>></span></h3>
                         
                      <div>Decatur, USA</div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="PolarisPortalsContainer"></div>
</div>
        
</div>
    </div>
    <div id="success"><p id="response"></p></div>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
          $(".check").change(function() {
            var id = $(this).attr("id");
            // console.log(id)
            var store = $(this).attr("data-id");
            var con = $(".check").is(":checked");
            // console.log(con)
              $.ajax({ 
                url:"ajax.php",
                type:"post",
                data:{"id":id,"con":con,"shop":store,"action":"inventory"},
                success:function(result) {
                  // var x = document.getElementById("success");
                  $('#success').addClass('show');
                  $("#response").text(result)
                  setTimeout(function(){$('#success').removeClass('show')}, 3000);
                  // x.className = "show";
                  // x.html = result;
                  // setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
                }
              })
          })
        })
         
            
    </script>
</body>

</html>