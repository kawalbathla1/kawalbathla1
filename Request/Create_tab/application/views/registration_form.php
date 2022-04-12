<!---- Registration form ----- (start)-->
<div>
    <div class="Polaris-Page Polaris-Page--fullWidth">
        <div class="Polaris-Page-Header Polaris-Page-Header--hasActionMenu Polaris-Page-Header--mobileView Polaris-Page-Header--noBreadcrumbs Polaris-Page-Header--mediumTitle">
            <div class="Polaris-Page-Header__Row">
            <div class="Polaris-Page-Header__TitleWrapper">
            </div>
            <div class="Polaris-Page-Header__RightAlign">
                <div class="Polaris-Page-Header__Actions">
                </div>
            </div>
            </div>
        </div>
        <div class="Polaris-Page__Content">
            <div class="Polaris-Layout__AnnotationContent">
                <div class="Polaris-Card">
                    <div class="Polaris-Card__Section">
                        <div class="Polaris-FormLayout">
                            <div class="Polaris-FormLayout__Item">
                                <div class="">
                                    <div class="Polaris-Labelled__LabelWrapper">
                                        <div class="Polaris-Label "><label id="PolarisTextField1Label" for="PolarisTextField1" class="Polaris-Label__Text">Enter First Name Label</label></div>
                                    </div>
                                    <div class="Polaris-Connected ">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                            <div class="Polaris-TextField Polaris-TextField--hasValue">
                                                <input type ="text" id="PolarisTextField1" autocomplete="name" class="Polaris-TextField__Input first_name_data" aria-labelledby="PolarisTextField1Label" aria-invalid="false" value="<?php echo $first_name; ?>" placeholder="First Name">
                                                <div class="Polaris-TextField__Backdrop"></div>
                                            </div> 
                                        </div>
                                    </div>          
                                </div>     
                            </div>
                            <div class="Polaris-FormLayout__Item">
                                <div class="">
                                    <div class="Polaris-Labelled__LabelWrapper">
                                        <div class="Polaris-Label "><label id="PolarisTextField1Label" for="PolarisTextField1" class="Polaris-Label__Text">Enter Last Name Label</label></div>
                                    </div>
                                    <div class="Polaris-Connected ">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                            <div class="Polaris-TextField Polaris-TextField--hasValue">
                                                <input type ="text" id="PolarisTextField2" autocomplete="user_name" class="Polaris-TextField__Input last_name_data" type="user_name" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="<?php echo $last_name; ?>" placeholder="Last Name">
                                                <div class="Polaris-TextField__Backdrop"></div> 
                                            </div>
                                        </div>
                                    </div>    
                                </div>   
                            </div>
                            <div class="Polaris-FormLayout__Item">
                                <div class="">
                                    <div class="Polaris-Labelled__LabelWrapper">
                                        <div class="Polaris-Label "><label id="PolarisTextField1Label" for="PolarisTextField1" class="Polaris-Label__Text">Enter Email Label</label></div>
                                    </div>
                                    <div class="Polaris-Connected ">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                            <div class="Polaris-TextField Polaris-TextField--hasValue">
                                                <input type ="text" id="PolarisTextField2" autocomplete="user_name" class="Polaris-TextField__Input user_emailData" type="user_name" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="<?php echo $email; ?>" placeholder="Email">
                                                <div class="Polaris-TextField__Backdrop"></div> 
                                            </div>
                                        </div>
                                    </div>    
                                </div>   
                            </div>
                            <div class="Polaris-FormLayout__Item">
                                <div class="">
                                    <div class="Polaris-Labelled__LabelWrapper">
                                        <div class="Polaris-Label "><label id="PolarisTextField1Label" for="PolarisTextField1" class="Polaris-Label__Text">Enter Mobile Number Label</label></div>
                                    </div>
                                    <div class="Polaris-Connected ">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                            <div class="Polaris-TextField Polaris-TextField--hasValue">
                                                <input type ="text" id="PolarisTextField2" autocomplete="mobile_no" class="Polaris-TextField__Input user_mobile_no" type="mobile_no" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="<?php echo $phone_no; ?>" placeholder=" Mobile Number">
                                                <div class="Polaris-TextField__Backdrop"></div> 
                                            </div>
                                        </div>
                                    </div>    
                                </div>  
                            </div>
                            <div class="Polaris-FormLayout__Item">
                                <div class="">
                                    <div class="Polaris-Labelled__LabelWrapper">
                                        <div class="Polaris-Label "><label id="PolarisTextField1Label" for="PolarisTextField1" class="Polaris-Label__Text">Enter Preferred Time Label</label></div>
                                    </div>
                                    <div class="Polaris-Connected ">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                            <div class="Polaris-TextField Polaris-TextField--hasValue">
                                                <input type ="text" id="PolarisTextField2" autocomplete="mobile_no" class="Polaris-TextField__Input user_preferred_time" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="<?php echo $preferred_time; ?>" placeholder=" Do you have a preferred time for us to call you?">
                                                <div class="Polaris-TextField__Backdrop"></div> 
                                            </div>
                                        </div>
                                    </div>    
                                </div>    
                            </div>  
                            <!---- Set Timepicker  (start)---->
                            <div class="Polaris-DataTable">
                                <div class="Polaris-DataTable__ScrollContainer">
                                    <table class="Polaris-DataTable__Table" id="multiconditionTable" cellspacing="10px">
                                        <thead>
                                            <tr>
                                                <th id="sd_cartquantity" ata-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn Polaris-DataTable__Cell--header sd_cartquantity" scope="col">Start Time</th>
                                                <th ata-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn Polaris-DataTable__Cell--header sd_discount_peritem" scope="col">End Time</th>
                                                <th ata-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn Polaris-DataTable__Cell--header" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="sd_tablerow">
                                                <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--total Polaris-DataTable__Cell--numeric">
                                                    <div class="Polaris-TextField sd_wcartvalue">
                                                        <input type ="text" name="startDate__timepicker" id="startDate__timepicker" class="Polaris-TextField__Input start_time_reg" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="<?php echo $start_time; ?>">
                                                        <div class="Polaris-TextField__Backdrop"></div>
                                                    </div>
                                                </td>
                                                <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--total Polaris-DataTable__Cell--numeric">
                                                    <div class="Polaris-TextField sd_wdiscount">
                                                        <input type ="text" name="endDate__timepicker" id="endDate__timepicker" class="Polaris-TextField__Input end_time_reg" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="<?php echo $end_time; ?>">
                                                        <div class="Polaris-TextField__Backdrop"></div>
                                                    </div>
                                                </td>
                                                <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--total Polaris-DataTable__Cell--numeric">
                                                    <div><span class="sd_delete_row"><i class="fa fa-trash" aria-hidden="true"></i></span></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!---- Set Timepicker  (end)---->
                            <div class="Polaris-FormLayout__Item">
                                <div class="">
                                    <div class="Polaris-Labelled__LabelWrapper">
                                        <div class="Polaris-Label "><label id="PolarisTextField1Label" for="PolarisTextField1" class="Polaris-Label__Text">Enter Remark Label</label></div>
                                    </div>
                                    <div class="Polaris-Connected ">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                            <div class="Polaris-TextField Polaris-TextField--hasValue">
                                                <input type ="text" id="PolarisTextField2" autocomplete="mobile_no" class="Polaris-TextField__Input user_remark" type="mobile_no" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="<?php echo $remark; ?>" placeholder="Remark">
                                                <div class="Polaris-TextField__Backdrop"></div> 
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>

                            <div class="Polaris-FormLayout__Item">
                                <div>
                                    <button class="Polaris-Button save_registration" id="upload_image_data" type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text"> Save </span></span>
                                    </button>
                                    <div id="PolarisPortalsContainer"></div>
                                </div>
                            </div>
                        </div>
                        </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="PolarisPortalsContainer">
        <div data-portal-id="popover-Polarisportal17"></div>
    </div>
</div>
<!---- Registration form   ----- (end)-->

