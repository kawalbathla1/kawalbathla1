<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <div>
        <!-- <div class = "productTag_data" style="display:none"; >  -->
        <div class="Polaris-Page Polaris-Page--narrowWidth">
            <div class="Polaris-Page-Header Polaris-Page-Header--hasNavigation Polaris-Page-Header--mobileView Polaris-Page-Header--mediumTitle">
                <div class="Polaris-Page-Header__Row">
                    <!-- <div class="Polaris-Page-Header__BreadcrumbWrapper">
                        href= " echo site_url ('Auth/access?shop=pragati-test-store.myshopify.com')"-----  used for one store .(shop) 
                        <nav role="navigation"><a class="Polaris-Breadcrumbs__Breadcrumb" href=" " data-polaris-unstyled="true"><span class="Polaris-Breadcrumbs__ContentWrapper"><span class="Polaris-Breadcrumbs__Icon"><span class="Polaris-Icon"><span class="Polaris-VisuallyHidden"></span><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                        <path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path>
                        </svg></span></span></span></a></nav>
                    </div>  -->
                </div>
            </div>

            <div class="Polaris-Layout">
                <div class="Polaris-Layout__AnnotatedSection">
                    <div class="Polaris-Layout__AnnotationWrapper">
                        <div class="Polaris-Layout__Annotation">
                            <div class="Polaris-TextContainer">
                                <h2 class="Polaris-Heading" id="storeDetails">Product Tab/Collection Tab/Page Tab</h2>
                                <div class="Polaris-Layout__AnnotationDescription">
                                    <p>Shopify and your customers will use this information to contact you.</p>
                                </div>
                            </div>
                        </div>
                        <div class="Polaris-Layout__AnnotationContent">
                            <div class="Polaris-Card">
                                <div class="Polaris-Card__Section">
                                    <div class="Polaris-FormLayout">
                                        <!-- section1 -->
                                        <div class="Polaris-FormLayout__Item">
                                            <div class="">
                                                <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label"><label id="PolarisTextField3Label" for="PolarisTextField3" class="Polaris-Label__Text">Tab Title</label></div>
                                                </div>
                                                <div class="Polaris-Connected">
                                                <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                                    <div class="Polaris-TextField"><input id="PolarisTextField3" autocomplete="off" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField3Label" aria-invalid="false" value="">
                                                    <div class="Polaris-TextField__Backdrop"></div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
 
                                        <!-- button -->
                                        <div class="Polaris-FormLayout__Item">
                                            <legend class="Polaris-ChoiceList__Title"> Assign To</legend>
                                            <ul class="Polaris-ChoiceList__Choices">
                                                <li><label class="Polaris-Choice" for="invoice_generation_products">
                                                        <span class="Polaris-Choice__Control">
                                                            <span class="Polaris-RadioButton ">
                                                                <input id="invoice_generation_products" name="invoice_generation" type="radio" class="Polaris-RadioButton__Input invoice_generation_main  " value="order_number">

                                                                <span class="Polaris-RadioButton__Backdrop product_genrate"></span>
                                                                <span class="Polaris-RadioButton__Icon product_genrate "></span>
                                                            </span>
                                                        </span>
                                                    <span class="Polaris-Choice__Label">Products</span>
                                                </label></li>

                                                <li><label class="Polaris-Choice" for="invoice_generation_collection">
                                                    <span class="Polaris-Choice__Control">
                                                        <span class="Polaris-RadioButton">
                                                            <input id="invoice_generation_collection" name="invoice_generation" type="radio" class="Polaris-RadioButton__Input invoice_generation_main" value="order_number">
                                                            <span class="Polaris-RadioButton__Backdrop collection_genrate "></span>
                                                            <span class="Polaris-RadioButton__Icon collection_genrate"></span>
                                                        </span>
                                                    </span>
                                                    <span class="Polaris-Choice__Label">Collections</span>
                                                </label></li>

                                                <li><label class="Polaris-Choice" for="invoice_generation_pages">
                                                    <span class="Polaris-Choice__Control">
                                                        <span class="Polaris-RadioButton">
                                                            <input id="invoice_generation_pages" name="invoice_generation" type="radio" class="Polaris-RadioButton__Input invoice_generation_main" value="order_number">
                                                            <span class="Polaris-RadioButton__Backdrop page_genrate"></span>
                                                            <span class="Polaris-RadioButton__Icon page_genrate"></span>
                                                        </span>
                                                    </span>
                                                    <span class="Polaris-Choice__Label">Pages</span>
                                                </label></li>
                                            </ul>
                                        </div>
                                        <!-- button -->

                                        <!-- section2 -->
                                        <div class="Polaris-FormLayout__Item">
                                            <div class="">
                                                <div class="Polaris-Labelled__LabelWrapper">
                                                    <div class="Polaris-Label"><label id="PolarisSelect14Label" for="PolarisSelect14" class="Polaris-Label__Text">Type</label></div>
                                                </div>
                                                <div class="Polaris-Select">
                                                    <select id="product_select" class="Polaris-Select__Input" aria-invalid="false">
                                                        <option  value="text">Text</option>
                                                        <option  value="size_chart">Size Chart</option>
                                                        <option  value="page_content">Page Content</option>
                                                        <option  value="page_element">Page Element</option>
                                                        <option  value="reviews">Reviews</option>

                                                    </select>
                                                    <div class="Polaris-Select__Content" aria-hidden="true"><span class="Polaris-Select__SelectedOption" id="product_option" >Text</span><span class="Polaris-Select__Icon"><span class="Polaris-Icon"><span class="Polaris-VisuallyHidden"></span><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                                            <path d="M7.676 9h4.648c.563 0 .879-.603.53-1.014L10.531 5.24a.708.708 0 0 0-1.062 0L7.145 7.986C6.798 8.397 7.113 9 7.676 9zm4.648 2H7.676c-.563 0-.878.603-.53 1.014l2.323 2.746c.27.32.792.32 1.062 0l2.323-2.746c.349-.411.033-1.014-.53-1.014z"></path>
                                                            </svg></span></span>
                                                    </div>
                                                    <div class="Polaris-Select__Backdrop"></div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- section3 -  TYPE ----[start]----->

                                        <!--Tiny MCE text editor  -->
                                        <div class="Polaris-FormLayout__Item Product_tags text_data">
                                            <textarea  class ="tiny_text" id="full-featured-non-premium" >  </textarea>
                                        </div>

                                        <!--size chart  -->
                                        <div class="Polaris-FormLayout__Item Product_tags size_chart_data" style="display: none;">
                                               <h2>size chart</h2>
                                        </div>

                                        <!--Page Content  -->
                                        <div class="Polaris-FormLayout__Item Product_tags page_content_data" style="display: none;">
                                                <h2>Page Content</h2>
                                        </div>

                                        <!-- Page Element  -->
                                        <div class="Polaris-FormLayout__Item Product_tags page_element_data" style="display: none;">
                                                <h2>Page Element</h2>
                                        </div>

                                        <!-- Reviews  -->
                                        <div class="Polaris-FormLayout__Item Product_tags reviews_data" style="display: none;">
                                                <h2>Reviews</h2>
                                        </div>
                                        
                                    <!-- section3 -  TYPE ----[end]----->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="PolarisPortalsContainer"></div>
    </div>


    
</body>
</html>