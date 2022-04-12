<div class="Polaris-Layout  ">
    <!--  Section 1 -->
    <div class="Polaris-Layout__Section Polaris-Layout__Section--secondary manage_proTab">
        <!--  header section 1 -->
        <div class="Polaris-Card">
            <div class="Polaris-Card__Section">
                <div class="back_dashboard">
                    <button type="button" class="Polaris-shopify__Item sd_back_dashboard My_Tab_data" attr_redirect_link= "back_to_dashboard">
                        <span class="Polaris-Icon">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                <path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path>
                            </svg>
                        </span>
                        <span class="Polaris-shopify back_trackShopify" id="backTo_dashboard">Back To Dashboard</span>
                    </button>   

                    <?php if($tabvalue == 'update'){
                
                    $tab_html=''; 

                    $tab_html.='
                    <div class="Polaris-Connected tab_nameWrapper tab_nameField">
                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary ">
                            <div class="Polaris-TextField Polaris-TextField--hasValue" id="name-outer">
                                <input id="tab_textfield_name"  maxlength="25" autocomplete="off" class="Polaris-TextField__Input  tab_name_counter"  aria-describedby="PolarisTextField22CharacterCounter" aria-labelledby="PolarisTextField22Label" aria-invalid="false" attr-id='.$tabid.' value="'.$tabname.'" placeholder="Enter Tab Name">
                                <div id="CharacterNum" class="Polaris-TextField__CharacterCount" aria-label="11 of 20 characters used" aria-live="off" aria-atomic="true">25/25</div>
                                <div class="Polaris-TextField__Backdrop"></div>
                            </div>
                        </div>
                    </div>              
                </div>
            </div>
        </div>
                    
        <div class="Polaris-Card">
            <div class="Polaris-Card__Header">
                <div>
                    <div class="Polaris-Tabs__Wrapper ">
                        <ul role="tablist" class="Polaris-Tabs tab_remove_data">

                            <li class="Polaris-Tabs__TabContainer" role="presentation"><button id="Elements-Tab-Setting" role="tab" type="button" tabindex="-1" class="Polaris-Tabs__Tab Polaris-Tabs__Tab--selected Select_myTabs icon_Container" attr_data="settingTab"  aria-selected="true" aria-controls="all-customers-content-4" aria-label="All customers"><span class="Polaris-Tabs__Title" >Elements</span></button></li>

                            <li class="Polaris-Tabs__TabContainer" role="presentation"><button id="Products-Tab-Setting" role="tab" type="button" tabindex="0" class="Polaris-Tabs__Tab   Select_myTabs  icon_Container" attr_data="layoutTab" aria-selected="false" aria-controls="accepts-marketing-content-4"><span class="Polaris-Tabs__Title" > Products </span></button>
                            </li>

                            <li class="Polaris-Tabs__TabContainer" role="presentation"><button id="desktop-Tab-Setting" role="tab" type="button" tabindex="0" class="Polaris-Tabs__Tab  Select_myTabs  icon_Container icon_Container" attr_data="themeTab" aria-selected="false" aria-controls="accepts-marketing-content-4"><span class="Polaris-Tabs__Title"> Appearance </span></button>
                            </li>

                            <li>
                                <button type="button" class="Polaris-shopify__Item back_card " style="display: none;">
                                    <span class="Polaris-Icon">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                            <path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path>
                                        </svg>
                                    </span>
                                    <span class="Polaris-shopify back_trackShopify" id="backTo_dashboard">Back</span>
                                </button>
                            </li>                                     
                        </ul>
                    </div>
                    <div class="Polaris-Tabs__Panel tabs_bttn_content settingTab" id="all-customers-content-4" role="tabpanel" aria-labelledby="all-customers-4" tabindex="-1" >

                    <div class="Polaris-Card  elements_section"  attr-step= "Contaier-STEP1" >   
                        <div class="Polaris-Card__Section add_tab hover_mytab icon_Container" id="Media_Element_Icon">
                            <svg xmlns="http://www.w3.org/2000/svg"  class="AddElement" style="width: 30px; cursor: pointer;" viewBox="0 0 20 20"><path class="AddElement"
                                d="M3 3h1V1H2.5A1.5 1.5 0 001 2.5V4h2V3zM6 3h3V1H6v2zM11 3h3V1h-3v2zM9 19H6v-2h3v2zM11 19h3v-2h-3v2zM17 4V3h-1V1h1.5A1.5 1.5 0 0119 2.5V4h-2zM3 17v-1H1v1.5A1.5 1.5 0 002.5 19H4v-2H3zM16 17h1v-1h2v1.5a1.5 1.5 0 01-1.5 1.5H16v-2zM10 6a1 1 0 011 1v2h2a1 1 0 110 2h-2v2a1 1 0 11-2 0v-2H7a1 1 0 110-2h2V7a1 1 0 011-1zM1 9V6h2v3H1zM1 11v3h2v-3H1zM17 9V6h2v3h-2zM17 11v3h2v-3h-2z" fill="#5C5F62"/>
                            </svg>  
                            <div class="element_section"><h3>Add Tab</h3></div>
                        </div> 
            
                        <form method="post" class="add_new_tab">';
                            if (!empty($fetch)){ 
                                foreach ($fetch as $obj){
                                    $description_ar = json_decode($obj->tab_description,true);
									
                                    if(isset($description_ar['description'])){
                                        $obj->tab_description = $description_ar['description'];
                                    }
                                    if(isset($description_ar['tab_page_id'])){
                                        $obj->page_id = $description_ar['tab_page_id'];
                                    }
                                    if(isset($description_ar['tab_page_select'])){
                                        $obj->page_select = $description_ar['tab_page_select'];
                                    }

                                    if($obj->type == "text_area"){
                                    
                                        $tab_html.='
                                        <div class="no_elements Element_tab_area ">
                                            <div class="Polaris-Card__Section hover_mytab add_tab tab_element_accordian" attr-tid='.$obj->id.' attr-type ="text_area" aria-element="false" attr-value="false">
                                                <div class="Polaris-ResourceItem__Media">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="Element_tab_header"  style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.5 1A1.5 1.5 0 001 2.5v15A1.5 1.5 0 002.5 19h15a1.5 1.5 0 001.5-1.5v-15A1.5 1.5 0 0017.5 1h-15zM16 5H4v2h12V5zM4 9h12v2H4V9zm6 4H4v2h6v-2z" fill="#5C5F62"></path></svg>
                                                </div>
                                                <div class="Polaris-ResourceItem__Content text_variation">
                                                    <span class="Polaris-TextStyle--variationStrong" name="elementer_'.$obj->id.'[container_title]">'. $obj->tab_title.'</span>
                                                </div> 
                                                <div class="Polaris-ResourceItem__Media tab_element_delete" attr-tid='.$obj->id.'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="element_Tab_delete" style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M14 4h3a1 1 0 011 1v1H2V5a1 1 0 011-1h3V1.5A1.5 1.5 0 017.5 0h5A1.5 1.5 0 0114 1.5V4zM8 2v2h4V2H8zM3 8h14v10.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 18.5V8zm4 3H5v6h2v-6zm4 0H9v6h2v-6zm2 0h2v6h-2v-6z" fill="#5C5F62"></path></svg>
                                                </div>
                                                <div class="Polaris-ResourceItem__Media drag_media_data">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="element_Tab_drag"  style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path d="M7 2a2 2 0 10.001 4.001A2 2 0 007 2zm0 6a2 2 0 10.001 4.001A2 2 0 007 8zm0 6a2 2 0 10.001 4.001A2 2 0 007 14zm6-8a2 2 0 10-.001-4.001A2 2 0 0013 6zm0 2a2 2 0 10.001 4.001A2 2 0 0013 8zm0 6a2 2 0 10.001 4.001A2 2 0 0013 14z" fill="#5C5F62"></path></svg>
                                                </div>
                                            </div> 
                        
                                            <div class="Polaris-ResourceItem__Container_content Text-discripition_editor element_step_discripition" style="display: none;">  
                                                <div class="Polaris-Card__Section">
                                                    <div class="Polaris-Card__Section element_editor"> 
                                                        <div class="Polaris-FormLayout">
                                                            <div class="Polaris-FormLayout__Item save_item_field">
                                                                <div class="Polaris-Labelled__LabelWrapper">
                                                                    <div class="Polaris-Label">
                                                                        <label id="PolarisTextFieldinvoice_title" for="PolarisTextFieldinvoice_titleLabel" class="Polaris-Label__Text">Title</label>
                                                                    </div>      
                                                                </div>
                                                                <div class="Polaris-Connected">
                                                                    <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                                                        <div class="Polaris-TextField title_outer">
                                                                            <input type="text" maxlength="100" name="elementer_'.$obj->id.'[container_title]" id="add_tab_container" placeholder="Enter Title" class="Polaris-TextField__Input title_name_container get_form_data" aria-invalid="false" aria-multiline="false" aria-labelledby="PolarisTextFieldemail_on_billLabel" value='. $obj->tab_title.'>
                                                                            <div class="Polaris-TextField__Backdrop"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="Polaris-FormLayout__Item textarea_descripition">
                                                                <div class="Polaris-Labelled__LabelWrapper">
                                                                    <div class="Polaris-Label">
                                                                        <label id="PolarisTextFieldinvoice_title" for="PolarisTextFieldinvoice_titleLabel" class="Polaris-Label__Text">Text Area</label>
                                                                    </div>
                                                                </div>
                                                                <div class="Polaris-Connected"> 
                                                                    <div class="Polaris-Connected__Item Polaris-Connected__Item--primary"> 
                                                                        <div class="Polaris-FormLayout__Item Product_tags text_data">
                                                                            <textarea name="elementer_'.$obj->id.'[container_desc]" class="tiny_text_area " id="featured_container">'. $obj->tab_description.'</textarea>
                                                                            <input type="hidden" name="elementer_'.$obj->id.'[container_type]" id ="hidden_from_type" value ='. $obj->type.'>
                                                                            <input type="hidden" name="elementer_'.$obj->id.'[container_id]" id ="hidden_from_id"  value ='. $obj->id.'>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                    if($obj->type == "page_content"){

                                        $tab_html.='
                                        <div class="no_elements Element_tab_area">
                                            <div class="Polaris-Card__Section hover_mytab add_tab tab_element_accordian" attr-tid='.$obj->id.'" attr-type ='.$obj->type.' aria-element="false" attr-value="false">
                                                <div class="Polaris-ResourceItem__Media">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="Element_tab_header"  style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.5 1A1.5 1.5 0 001 2.5v15A1.5 1.5 0 002.5 19h15a1.5 1.5 0 001.5-1.5v-15A1.5 1.5 0 0017.5 1h-15zM16 5H4v2h12V5zM4 9h12v2H4V9zm6 4H4v2h6v-2z" fill="#5C5F62"></path></svg>
                                                </div>
                                                <div class="Polaris-ResourceItem__Content text_variation">
                                                    <span class="Polaris-TextStyle--variationStrong">'. $obj->tab_title.'</span>
                                                </div> 
                                                <div class="Polaris-ResourceItem__Media tab_element_delete" attr-tid='.$obj->id.'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="element_Tab_delete" style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M14 4h3a1 1 0 011 1v1H2V5a1 1 0 011-1h3V1.5A1.5 1.5 0 017.5 0h5A1.5 1.5 0 0114 1.5V4zM8 2v2h4V2H8zM3 8h14v10.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 18.5V8zm4 3H5v6h2v-6zm4 0H9v6h2v-6zm2 0h2v6h-2v-6z" fill="#5C5F62"></path></svg>
                                                </div>
                                                <div class="Polaris-ResourceItem__Media drag_media_data">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="element_Tab_drag"  style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path d="M7 2a2 2 0 10.001 4.001A2 2 0 007 2zm0 6a2 2 0 10.001 4.001A2 2 0 007 8zm0 6a2 2 0 10.001 4.001A2 2 0 007 14zm6-8a2 2 0 10-.001-4.001A2 2 0 0013 6zm0 2a2 2 0 10.001 4.001A2 2 0 0013 8zm0 6a2 2 0 10.001 4.001A2 2 0 0013 14z" fill="#5C5F62"></path></svg>
                                                </div>
                                            </div>

                                            <div class="Polaris-ResourceItem__Container_content Text-discripition_editor element_step_discripition" attr-type ='.$obj->type.' style="display: none;">   
                                                <div class="Polaris-Card__Section">
                                                    <div class="Polaris-Card__Section element_editor"> 
                                                        <div class="Polaris-FormLayout">
                                                            <div class="Polaris-FormLayout__Item save_item_field">
                                                                <div class="Polaris-Labelled__LabelWrapper">
                                                                    <div class="Polaris-Label">
                                                                        <label id="PolarisTextFieldinvoice_title" for="PolarisTextFieldinvoice_titleLabel" class="Polaris-Label__Text">Title</label>
                                                                    </div>
                                                                </div>
                                                                <div class="Polaris-Connected">
                                                                    <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                                                        <div class="Polaris-TextField">
                                                                            <input type="text" maxlength="100" id="add_tab_container"  name="elementer_'.$obj->id.'[container_title]"  placeholder="Enter Title" class="Polaris-TextField__Input title_name_container get_form_data" aria-invalid="false" aria-multiline="false" aria-labelledby="PolarisTextFieldemail_on_billLabel" value='.$obj->tab_title.'>
                                                                            <div class="Polaris-TextField__Backdrop"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="Polaris-FormLayout__Item pagecontent_descripition ">
                                                                <div class="Polaris-Labelled__LabelWrapper">
                                                                    <div class="Polaris-Label">
                                                                        <label id="PolarisTextFieldinvoice_title" for="PolarisTextFieldinvoice_titleLabel" class="Polaris-Label__Text">Page Selected: </label>
                                                                    </div>
                                                                </div>
                                                                <div class="Polaris-Connected"> 
                                                                <div class="Polaris-Connected__Item Polaris-Connected__Item--primary"> 
                                                                    <span class="Polaris-TextStyle--variationStrong" name="elementer_'.$obj->id.'[container_selected]"> '.$obj->page_select.' </span>
                                                                </div>

                                                                <button type="button" class="Polaris-shopify__Item sd_back_dashboard Edit_page_dashboard" attr-value="true" attr-id="'.$obj->page_id.'">
                                                                    <span class="Polaris-Icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4.5 3A1.5 1.5 0 003 4.5v11A1.5 1.5 0 004.5 17h11a1.5 1.5 0 001.5-1.5V12h-2v3H5V5h3V3H4.5zM17 4a1 1 0 00-1-1h-5a1 1 0 100 2h2.586l-5.293 5.293a.999.999 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4z" fill="#5C5F62"/></svg>
                                                                    </span>
                                                                    <span class="Polaris-shopify back_trackShopify" id="">Edit page</span>
                                                                </button> 
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="elementer_'.$obj->id.'[container_selected]" value ="'. $obj->page_select.'">
                                                        <input type="hidden" name="elementer_'.$obj->id.'[container_type]" value = '.$obj->type.'>
                                                        <input type="hidden" name="elementer_'.$obj->id.'[container_page_id]" value = '.$obj->page_id.'>
                                                        <input type="hidden" name="elementer_'.$obj->id.'[container_desc]" value = "none">
                                                        <input type="hidden" name="elementer_'.$obj->id.'[container_id]" value = "'. $obj->id.'">
                                                    </div>
                                                </div>
                                            </div> 
                                        </div> 
                                    </div>';                                      
                                    }
                                }
                            }

                            $tab_html.='
                        </form>
                    </div>
                
                    <div class="Element_input " style="display: none;" attr-step= "Contaier-STEP2">
                        <div class="Polaris-Card Polaris-Card--subdued">
                            <div class="Polaris-Card__Section">
                                <div class="Polaris-ResourceList__ResourceListWrapper">
                                    <h2 class="Polaris-Heading">Input</h2>
                                    <ul class="Polaris-ResourceList" aria-live="polite">
                                        <li class="Polaris-ResourceItem__ListItem  Media_text_append" id="Text-Container"> 
                                            <div class="Polaris-ResourceItem__Container text_Icon hover_mytab Media_text_Icon tab_element_accordian" attr-type="text_area" 
                                            aria-element="false" attr-value="false">
                                                <div class="Polaris-ResourceItem__Media ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="Textarea_elements" style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path  class="Textarea_elements"fill-rule="evenodd" d="M2.5 1A1.5 1.5 0 001 2.5v15A1.5 1.5 0 002.5 19h15a1.5 1.5 0 001.5-1.5v-15A1.5 1.5 0 0017.5 1h-15zM16 5H4v2h12V5zM4 9h12v2H4V9zm6 4H4v2h6v-2z" fill="#5C5F62"/></svg>   
                                                </div>
                                                <div class="Polaris-ResourceItem__Content text_variation">
                                                    <h3><span class="Polaris-TextStyle--variationStrong">Text Area</span></h3>
                                                </div>
                                            </div>
                                        
                                            <div class="Polaris-ResourceItem__Container_content"  style="display: none;">
                                                <form method="post" class="Text-Container_editor element_step_discripition" id="tab_textArea">
                                                    <div class="Polaris-Card__Section " attr-step= "Contaier-STEP3" >
                                                        <div class="Polaris-Card__Section element_editor"> 
                                                            <div class="Polaris-FormLayout">
                                                                <div class="Polaris-FormLayout__Item save_item_field">
                                                                    <div class="Polaris-Labelled__LabelWrapper">
                                                                        <div class="Polaris-Label">
                                                                            <label id="PolarisTextFieldinvoice_title" for="PolarisTextFieldinvoice_titleLabel" class="Polaris-Label__Text">Title</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Polaris-Connected">
                                                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                                                            <div class="Polaris-TextField title_outer">
                                                                                <input type="text" maxlength="100" name="invoice_title"  class="Polaris-TextField__Input" id="element_title" placeholder="Enter Title" class="Polaris-TextField__Input title_name" aria-invalid="false" aria-multiline="false" aria-labelledby="PolarisTextFieldemail_on_billLabel" value="">
                                                                                <div class="Polaris-TextField__Backdrop"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Polaris-FormLayout__Item textarea_descripition">
                                                                    <div class="Polaris-Labelled__LabelWrapper">
                                                                        <div class="Polaris-Label">
                                                                            <label id="PolarisTextFieldinvoice_title" for="PolarisTextFieldinvoice_titleLabel" class="Polaris-Label__Text">Text Area</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Polaris-Connected"> 
                                                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary text_outer"> 
                                                                        
                                                                            <div class="Polaris-FormLayout__Item Product_tags text_data">
                                                                            <textarea  class="tiny_text" id="full-featured-non-premium"> </textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                            
                                                                <div class="title_text_bttn">
                                                                    <button class="Polaris-Button Polaris-Button--primary Textarea-Bttn  tab_element_save" aria-element="false" attr-id="add_textarea_data" attr-action="selected" aria-element="false" attr-type="text_area" type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Add</span></span></button>
                                                                    <button class="tab_element_cancel Polaris-Button" attr-type="text_area" attr-action="cancel" cancel-action="cancel"   id="add_cancel" type="button" id="btn"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Cancel</span></span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                                                               
                                                </form>
                                            </div>      
                                        </li>
                                    
                                        <li class="Polaris-ResourceItem__ListItem" id="LegalContent">   
                                            <div class="Polaris-ResourceItem__Container text_Icon hover_mytab Media_Legal_Icon tab_element_accordian" attr-type="legal_content"   aria-element="false"  attr-value="false" >
                                                <div class="Polaris-ResourceItem__Media">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="Legal_elements" style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path d="M7 5h5v2H7V5zM12 9H7v2h5V9z" fill="#5C5F62"/><path class="Legal_elements" fill-rule="evenodd" d="M16 17a3 3 0 01-3 3H3a3 3 0 01-3-3v-1.5A1.5 1.5 0 011.5 14H3V4a3 3 0 013-3h11a3 3 0 110 6h-1v10zM5 4a1 1 0 011-1h8.17c-.11.313-.17.65-.17 1v13a1 1 0 11-2 0v-3H5V4zm12-1a1 1 0 00-1 1v1h1a1 1 0 100-2zm-7 14c0 .35.06.687.17 1H3a1 1 0 01-1-1v-1h8v1z" fill="#5C5F62"/></svg>                                                               
                                                </div>
                                                <div class="Polaris-ResourceItem__Content text_variation">
                                                        <h3><span class="Polaris-TextStyle--variationStrong">Legal Content</span></h3>
                                                </div> 
                                            </div>

                                            
                                            <div class="Polaris-ResourceItem__Container_content" style="display: none;">
                                                <div class="Polaris-Card__Section Element_editor  element_step_discripition Legalcontent_editor" id="tab_legalcontent_">
                                                    <div class="Polaris-Card__Section">
                                                        <div class="Polaris-Select">
                                                            <div class="Polaris-Labelled__LabelWrapper">
                                                                <div class="Polaris-Label">
                                                                    <label id="PolarisTextFieldinvoice_title" for="PolarisTextFieldinvoice_titleLabel" class="Polaris-Label__Text">Content</label>
                                                                </div>
                                                            </div>
                                                        </div> 

                                                        <div class="Polaris-Select">
                                                            <select id="PolarisSelect1" class="Polaris-Select__Input legal_policy" aria-invalid="false">
                                                                <option value="text">Privacy policy</option>
                                                                <option value="page">Shipping policy</option>
                                                                <option value="relocate">Refund policy</option>
                                                                <option value="legal">Teams of service</option>
                                                            </select>
                                                            <div class="Polaris-Select__Content" aria-hidden="true">
                                                                <span class="Polaris-Select__SelectedOption" id="Legal_option">Privacy policy</span>
                                                                <span class="Polaris-Select__Icon">
                                                                <span class="Polaris-Icon">
                                                                    <span class="Polaris-VisuallyHidden"></span>
                                                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                                                        <path d="M7.676 9h4.648c.563 0 .879-.603.53-1.014L10.531 5.24a.708.708 0 0 0-1.062 0L7.145 7.986C6.798 8.397 7.113 9 7.676 9zm4.648 2H7.676c-.563 0-.878.603-.53 1.014l2.323 2.746c.27.32.792.32 1.062 0l2.323-2.746c.349-.411.033-1.014-.53-1.014z"></path>
                                                                    </svg>
                                                                </span>
                                                                </span>
                                                            </div>
                                                            <div class="Polaris-Select__Backdrop"></div>                                 
                                                        </div>
                                            
                                                        <div>
                                                            <button type="button" class="Polaris-shopify__Item sd_back_dashboard">
                                                                <span class="Polaris-Icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4.5 3A1.5 1.5 0 003 4.5v11A1.5 1.5 0 004.5 17h11a1.5 1.5 0 001.5-1.5V12h-2v3H5V5h3V3H4.5zM17 4a1 1 0 00-1-1h-5a1 1 0 100 2h2.586l-5.293 5.293a.999.999 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4z" fill="#5C5F62"/></svg>
                                                                </span>
                                                                <span class="Polaris-shopify back_trackShopify" id="">Edit Content</span>
                                                            </button>  
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div> 
                                        </li>
                                
                                        <li class="Polaris-ResourceItem__ListItem" id="Page-Container">   
                                            <div class="Polaris-ResourceItem__Container hover_mytab text_Icon Media_Page_Icon tab_element_accordian" attr-type="page_content"  aria-element="false"  attr-value="false">
                                                <div class="Polaris-ResourceItem__Media ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="PageContent_elements" style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path
                                                    class="PageContent_elements" d="M12.44.44A1.5 1.5 0 0011.378 0H4.5A1.5 1.5 0 003 1.5v17A1.5 1.5 0 004.5 20h11a1.5 1.5 0 001.5-1.5V5.621a1.5 1.5 0 00-.44-1.06L12.44.439z" fill="#5C5F62"/></svg>   
                                                </div> 
                                                <div class="Polaris-ResourceItem__Content text_variation">
                                                    <h3><span class="Polaris-TextStyle--variationStrong"> Page Content </span></h3>
                                                </div>
                                            </div>

                                        
                                            <div class="Polaris-ResourceItem__Container_content page_content_variation_update" style="display: none;">
                                                <div class="Polaris-Card__Section Element_editor element_step_discripition Page-Container_editor" id="tab_pagecontent_">
                                                
                                                        <div class="Polaris-FormLayout__Item page_title_field">
                                                            <div class="Polaris-Labelled__LabelWrapper">
                                                                <div class="Polaris-Label">
                                                                    <label id="PolarisTextFieldinvoice_title" for="PolarisTextFieldinvoice_titleLabel" class="Polaris-Label__Text">Title</label>
                                                                </div>
                                                            </div>
                                                            <div class="Polaris-Connected">
                                                                <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                                                    <div class="Polaris-TextField page_outer">
                                                                        <input type="text" maxlength="100" name="invoice_title"  id="page_element_title" placeholder="Enter Title" class=" Polaris-TextField__Input title_name" aria-invalid="false" aria-multiline="false" aria-labelledby="PolarisTextFieldemail_on_billLabel" value="">
                                                                        <div class="Polaris-TextField__Backdrop"></div>
                                                                    </div>
                                                                </div>
                                                            </div>             
                                                        </div>


                                                        <div class="Polaris-FormLayout__Item page_title_discrition">
                                                            <div class="select_page_options select_outer"> 
                                                                <select id="content_page_title" class="page_content_policy Product_tags " name="platform" attr-type="page_content" aria-invalid="false">

                                                                    <option class="page_body_option" selected="selected">Select page</option> '; 
                                                                    
                                                                    foreach ($page_list->pages as $item) { 
                                                                    
                                                                        $tab_html.=' <option class="page_content_body" aria_element="true" page-id='.$item->id.' value="'.$item->title.' ">'.$item->title.'</option>';
                                                                    
                                                                    } 

                                                                $tab_html.='</select>                                   
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="Polaris-FormLayout__Item edit_page_layout" style="display: none;">
                                                            <button type="button" class="Polaris-shopify__Item sd_back_dashboard  Edit_page_dashboard" >
                                                                <span class="Polaris-Icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4.5 3A1.5 1.5 0 003 4.5v11A1.5 1.5 0 004.5 17h11a1.5 1.5 0 001.5-1.5V12h-2v3H5V5h3V3H4.5zM17 4a1 1 0 00-1-1h-5a1 1 0 100 2h2.586l-5.293 5.293a.999.999 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4z" fill="#5C5F62"/></svg>
                                                                </span>
                                                                <span class="Polaris-shopify back_trackShopify" id="">Edit page</span>
                                                            </button>  
                                                        </div>

                                                        <div class="Polaris-FormLayout__Item page_content_bttn">
                                                            <button class="Polaris-Button Polaris-Button--primary Textarea-Bttn Optionsvlaue tab_element_save" aria-element="false" attr-id="add_page_data"  attr-page ="'.$tabvalue.'" attr-action="selected" attr-type="page_content" type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Add</span></span></button>
                                                            <button class="tab_element_cancel Polaris-Button" attr-type="page_content" attr-action="cancel" cancel-action="cancel" aria-element="false"  id="add_cancel" type="button" id="btn"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Cancel</span></span></button>
                                                        </div>
                                                </div>   
                                            </div>
                                        </li>

                                        <li class="Polaris-ResourceItem__ListItem"  id="Integration-Container">   
                                            <div class="Polaris-ResourceItem__Container text_Icon hover_mytab Media_Integration_Icon tab_element_accordian" attr-type="app_integration"  aria-element="false" attr-value="false">

                                                <div class="Polaris-ResourceItem__Media ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="Integration_elements" style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path class="Integration_elements" d="M9 9H1V2.5A1.5 1.5 0 012.5 1H9v8zM9 11v8H2.5A1.5 1.5 0 011 17.5V11h8zM11 11v8h6.5a1.5 1.5 0 001.5-1.5V11h-8zM15 1a1 1 0 011 1v2h2a1 1 0 110 2h-2v2a1 1 0 11-2 0V6h-2a1 1 0 110-2h2V2a1 1 0 011-1z" fill="#5C5F62"/></svg>                                                         
                                                </div> 
                                                <div class="Polaris-ResourceItem__Content text_variation">
                                                    <h3><span class="Polaris-TextStyle--variationStrong"> App Integration</span></h3>
                                                </div>
                                            </div>

                                            <div class="Polaris-ResourceItem__Container_content"  style="display: none;">
                                                <div class="Polaris-Card__Section Element_editor element_step_discripition Integration-Container_editor" id="tab_Integration_" attr-step3= "Contaier-Tab3_step2" >
                                                    <div class="Polaris-Card__Section">
                                                        <div class="Polaris-Labelled__LabelWrapper">
                                                            <div class="Polaris-Label"><label id="PolarisTextField14Label" for="PolarisTextField14" class="Polaris-Label__Text">app Integration</label></div>
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div>
                                        </li>   
                                    </ul>
                                </div>
                            </div>
                        </div>  
                    </div>

                </div>
                <div class="Polaris-Tabs__Panel Polaris-Tabs__Panel--hidden  tabs_bttn_content layoutTab" id="accepts-marketing-content-4 "  role="tabpanel" aria-labelledby="accepts-marketing-4" tabindex="-1" style="display: none;">
                    <div class="Polaris-Card__Section">
                        <div class="Polaris-Card__SectionHeader">
                            <h3 aria-label="All" class="Polaris-Subheading">Products</h3>
                        </div>
                        <p>Product 1 selected</p>
                    </div>
                </div>

                <div class="Polaris-Tabs__Panel Polaris-Tabs__Panel--hidden tabs_bttn_content themeTab" id="repeat-customers-content-4 " role="tabpanel" aria-labelledby="repeat-customers-4" tabindex="-1" style="display: none;">
                    <div class="Polaris-Card__Section">
                        <div class="Polaris-Card__SectionHeader">
                            <h3 aria-label="All" class="Polaris-Subheading">Appearance</h3>
                        </div>
                        <p>Appearance 2 selected</p>
                    </div>
                </div>

                </div>      
                    </div>
                        <div id="PolarisPortalsContainer">
                        <div data-portal-id="popover-Polarisportal5"></div>
                    </div>
                </div>';

        echo $tab_html;
            
            }else{
                    $tab_val='';

                    $tab_val.='
                    <div class="Polaris-Connected tab_nameWrapper tab_nameField">
                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary ">
                            <div class="Polaris-TextField Polaris-TextField--hasValue"  id="name-outer">
                                <input id="tab_textfield_name"  maxlength="25" autocomplete="off" class="Polaris-TextField__Input  tab_name_counter"  aria-describedby="PolarisTextField22CharacterCounter" aria-labelledby="PolarisTextField22Label" aria-invalid="false" value=" " placeholder="Enter Tab Name">
                                <div id="CharacterNum" class="Polaris-TextField__CharacterCount" aria-label="11 of 20 characters used" aria-live="off" aria-atomic="true">25/25</div>
                                <div class="Polaris-TextField__Backdrop"></div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
                            
        <div class="Polaris-Card ">
            <div class="Polaris-Card__Header">
                <div>
                    <div class="Polaris-Tabs__Wrapper ">
                        <ul role="tablist" class="Polaris-Tabs tab_remove_data">
                            
                            <li class="Polaris-Tabs__TabContainer" role="presentation"><button id="Elements-Tab-Setting" role="tab" type="button" tabindex="-1" class="Polaris-Tabs__Tab Polaris-Tabs__Tab--selected Select_myTabs icon_Container" attr_data="settingTab"  aria-selected="true" aria-controls="all-customers-content-4" aria-label="All customers"><span class="Polaris-Tabs__Title" >Elements</span></button></li>
            
                        
                            <li class="Polaris-Tabs__TabContainer" role="presentation"><button id="Products-Tab-Setting" role="tab" type="button" tabindex="0" class="Polaris-Tabs__Tab   Select_myTabs  icon_Container" attr_data="layoutTab" aria-selected="false" aria-controls="accepts-marketing-content-4"><span class="Polaris-Tabs__Title" > Products </span></button>
                            </li>
            
                        
                            <li class="Polaris-Tabs__TabContainer" role="presentation"><button id="desktop-Tab-Setting" role="tab" type="button" tabindex="0" class="Polaris-Tabs__Tab  Select_myTabs  icon_Container icon_Container" attr_data="themeTab" aria-selected="false" aria-controls="accepts-marketing-content-4"><span class="Polaris-Tabs__Title"> Appearance </span></button>
                            </li>
            
                            <li>
                                <button type="button" class="Polaris-shopify__Item back_card " style="display: none;">
                                    <span class="Polaris-Icon">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                            <path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path>
                                        </svg>
                                    </span>
                                    <span class="Polaris-shopify back_trackShopify" id="backTo_dashboard">Back</span>
                                </button>
                            </li>                                     
                        </ul>
                    </div>
                    <div class="Polaris-Tabs__Panel tabs_bttn_content settingTab" id="all-customers-content-4" role="tabpanel" aria-labelledby="all-customers-4" tabindex="-1" >
                            
                    <div class="Polaris-Card  elements_section"  attr-step= "Contaier-STEP1" >   
                        <div class="Polaris-Card__Section add_tab hover_mytab icon_Container" id="Media_Element_Icon">
                            <svg xmlns="http://www.w3.org/2000/svg"  class="AddElement" style="width: 30px; cursor: pointer;" viewBox="0 0 20 20"><path class="AddElement"
                                d="M3 3h1V1H2.5A1.5 1.5 0 001 2.5V4h2V3zM6 3h3V1H6v2zM11 3h3V1h-3v2zM9 19H6v-2h3v2zM11 19h3v-2h-3v2zM17 4V3h-1V1h1.5A1.5 1.5 0 0119 2.5V4h-2zM3 17v-1H1v1.5A1.5 1.5 0 002.5 19H4v-2H3zM16 17h1v-1h2v1.5a1.5 1.5 0 01-1.5 1.5H16v-2zM10 6a1 1 0 011 1v2h2a1 1 0 110 2h-2v2a1 1 0 11-2 0v-2H7a1 1 0 110-2h2V7a1 1 0 011-1zM1 9V6h2v3H1zM1 11v3h2v-3H1zM17 9V6h2v3h-2zM17 11v3h2v-3h-2z" fill="#5C5F62"/>
                            </svg>  
                            <div class="element_section"><h3>Add Tab</h3></div>
                        </div> 
                        <form method="post" class="add_new_tab">
                            
                        </form>
                    </div>
                                
                    <div class="Element_input " style="display: none;" attr-step= "Contaier-STEP2">
                        <div class="Polaris-Card Polaris-Card--subdued">
                            <div class="Polaris-Card__Section">
                                <div class="Polaris-ResourceList__ResourceListWrapper">
                                    <h2 class="Polaris-Heading">Input</h2>
                                    <ul class="Polaris-ResourceList" aria-live="polite">
                                        <li class="Polaris-ResourceItem__ListItem  Media_text_append" id="Text-Container"> 
                                            <div class="Polaris-ResourceItem__Container text_Icon hover_mytab Media_text_Icon tab_element_accordian" attr-type="text_area" 
                                            aria-element="false" attr-value="false">
                                                <div class="Polaris-ResourceItem__Media ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="Textarea_elements" style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path  class="Textarea_elements"fill-rule="evenodd" d="M2.5 1A1.5 1.5 0 001 2.5v15A1.5 1.5 0 002.5 19h15a1.5 1.5 0 001.5-1.5v-15A1.5 1.5 0 0017.5 1h-15zM16 5H4v2h12V5zM4 9h12v2H4V9zm6 4H4v2h6v-2z" fill="#5C5F62"/></svg>   
                                                </div>
                                                <div class="Polaris-ResourceItem__Content text_variation">
                                                    <h3><span class="Polaris-TextStyle--variationStrong">Text Area</span></h3>
                                                </div>
                                            </div>
        
                                            <div class="Polaris-ResourceItem__Container_content"  style="display: none;">
                                                <form method="post" class="Text-Container_editor element_step_discripition" id="tab_textArea">
                                                    <div class="Polaris-Card__Section " attr-step= "Contaier-STEP3" >
                                                        <div class="Polaris-Card__Section element_editor"> 
                                                            <div class="Polaris-FormLayout">
                                                                <div class="Polaris-FormLayout__Item save_item_field">
                                                                    <div class="Polaris-Labelled__LabelWrapper">
                                                                        <div class="Polaris-Label">
                                                                            <label id="PolarisTextFieldinvoice_title" for="PolarisTextFieldinvoice_titleLabel" class="Polaris-Label__Text">Title</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Polaris-Connected">
                                                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                                                            <div class="Polaris-TextField title_outer">
                                                                                <input type="text" maxlength="100" class="element_title_field Polaris-TextField__Input" name="text_title" id="element_title" placeholder="Enter Title" class="Polaris-TextField__Input title_name" aria-invalid="false" aria-multiline="false" aria-labelledby="PolarisTextFieldemail_on_billLabel" value="">
                                                                                <div class="Polaris-TextField__Backdrop"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Polaris-FormLayout__Item textarea_descripition text_outer">
                                                                    <div class="Polaris-Labelled__LabelWrapper">
                                                                        <div class="Polaris-Label">
                                                                            <label id="PolarisTextFieldinvoice_title" for="PolarisTextFieldinvoice_titleLabel" class="Polaris-Label__Text">Text Area</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Polaris-Connected"> 
                                                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary"> 
                                                                        
                                                                            <div class="Polaris-FormLayout__Item Product_tags text_data">
                                                                            <textarea  class="tiny_text" id="full-featured-non-premium"> </textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                            
                                                                <div class="title_text_bttn">
                                                                    <button class="Polaris-Button Polaris-Button--primary Textarea-Bttn tab_element_save" attr-id="add_textarea_data" attr-action="selected"  attr-page ="'.$tabvalue.'"  aria-element="false" attr-type="text_area" type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Add</span></span></button>
                                                                    <button class="tab_element_cancel Polaris-Button" attr-type="text_area" attr-action="cancel" cancel-action="cancel" aria-element="false"  id="add_cancel" type="button" id="btn"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Cancel</span></span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                                                               
                                                </form>
                                            </div>      
                                        </li>
                                    
                                        <li class="Polaris-ResourceItem__ListItem" id="LegalContent">   
                                            <div class="Polaris-ResourceItem__Container text_Icon hover_mytab Media_Legal_Icon tab_element_accordian" attr-type="legal_content"   aria-element="false"  attr-value="false" >
                                                <div class="Polaris-ResourceItem__Media">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="Legal_elements" style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path d="M7 5h5v2H7V5zM12 9H7v2h5V9z" fill="#5C5F62"/><path class="Legal_elements" fill-rule="evenodd" d="M16 17a3 3 0 01-3 3H3a3 3 0 01-3-3v-1.5A1.5 1.5 0 011.5 14H3V4a3 3 0 013-3h11a3 3 0 110 6h-1v10zM5 4a1 1 0 011-1h8.17c-.11.313-.17.65-.17 1v13a1 1 0 11-2 0v-3H5V4zm12-1a1 1 0 00-1 1v1h1a1 1 0 100-2zm-7 14c0 .35.06.687.17 1H3a1 1 0 01-1-1v-1h8v1z" fill="#5C5F62"/></svg>                                                               
                                                </div>
                                                <div class="Polaris-ResourceItem__Content text_variation">
                                                        <h3><span class="Polaris-TextStyle--variationStrong">Legal Content</span></h3>
                                                </div> 
                                            </div>
        
                                            
                                            <div class="Polaris-ResourceItem__Container_content" style="display: none;">
                                                <div class="Polaris-Card__Section Element_editor  element_step_discripition Legalcontent_editor" id="tab_legalcontent_">
                                                    <div class="Polaris-Card__Section">
                                                        <div class="Polaris-Select">
                                                            <div class="Polaris-Labelled__LabelWrapper">
                                                                <div class="Polaris-Label">
                                                                    <label id="PolarisTextFieldinvoice_title" for="PolarisTextFieldinvoice_titleLabel" class="Polaris-Label__Text">Content</label>
                                                                </div>
                                                            </div>
                                                        </div> 
        
                                                        <div class="Polaris-Select">
                                                            <select id="PolarisSelect1" class="Polaris-Select__Input legal_policy" aria-invalid="false">
                                                                <option value="text">Privacy policy</option>
                                                                <option value="page">Shipping policy</option>
                                                                <option value="relocate">Refund policy</option>
                                                                <option value="legal">Teams of service</option>
                                                            </select>
                                                            <div class="Polaris-Select__Content" aria-hidden="true">
                                                                <span class="Polaris-Select__SelectedOption" id="Legal_option">Privacy policy</span>
                                                                <span class="Polaris-Select__Icon">
                                                                <span class="Polaris-Icon">
                                                                    <span class="Polaris-VisuallyHidden"></span>
                                                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                                                        <path d="M7.676 9h4.648c.563 0 .879-.603.53-1.014L10.531 5.24a.708.708 0 0 0-1.062 0L7.145 7.986C6.798 8.397 7.113 9 7.676 9zm4.648 2H7.676c-.563 0-.878.603-.53 1.014l2.323 2.746c.27.32.792.32 1.062 0l2.323-2.746c.349-.411.033-1.014-.53-1.014z"></path>
                                                                    </svg>
                                                                </span>
                                                                </span>
                                                            </div>
                                                            <div class="Polaris-Select__Backdrop"></div>                                 
                                                        </div>
                                            
                                                        <div>
                                                            <button type="button" class="Polaris-shopify__Item sd_back_dashboard">
                                                                <span class="Polaris-Icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4.5 3A1.5 1.5 0 003 4.5v11A1.5 1.5 0 004.5 17h11a1.5 1.5 0 001.5-1.5V12h-2v3H5V5h3V3H4.5zM17 4a1 1 0 00-1-1h-5a1 1 0 100 2h2.586l-5.293 5.293a.999.999 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4z" fill="#5C5F62"/></svg>
                                                                </span>
                                                                <span class="Polaris-shopify back_trackShopify" id="">Edit Content</span>
                                                            </button>  
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div> 
                                        </li>
                                    
                                        <li class="Polaris-ResourceItem__ListItem" id="Page-Container">   
                                            <div class="Polaris-ResourceItem__Container hover_mytab text_Icon Media_Page_Icon tab_element_accordian" attr-type="page_content"  aria-element="false"  attr-value="false">
                                                <div class="Polaris-ResourceItem__Media ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="PageContent_elements" style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path
                                                    class="PageContent_elements" d="M12.44.44A1.5 1.5 0 0011.378 0H4.5A1.5 1.5 0 003 1.5v17A1.5 1.5 0 004.5 20h11a1.5 1.5 0 001.5-1.5V5.621a1.5 1.5 0 00-.44-1.06L12.44.439z" fill="#5C5F62"/></svg>   
                                                </div> 
                                                <div class="Polaris-ResourceItem__Content text_variation">
                                                    <h3><span class="Polaris-TextStyle--variationStrong"> Page Content </span></h3>
                                                </div>
                                            </div>
        
                                        
                                            <div class="Polaris-ResourceItem__Container_content page_content_variation" style="display: none;">
                                                <div class="Polaris-Card__Section  Element_editor element_step_discripition Page-Container_editor" id="tab_pagecontent_">
                                                
                                                    <div class="Polaris-FormLayout__Item page_title_field">
                                                        <div class="Polaris-Labelled__LabelWrapper">
                                                            <div class="Polaris-Label">
                                                                <label id="PolarisTextFieldinvoice_title" for="PolarisTextFieldinvoice_titleLabel" class="Polaris-Label__Text">Title</label>
                                                            </div>
                                                        </div>
                                                        <div class="Polaris-Connected">
                                                            <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                                                <div class="Polaris-TextField page_outer">

                                                                    <input type="text" maxlength="100"  name="page_title" id="page_element_title" placeholder="Enter Title" class=" Polaris-TextField__Input title_name element_title_field" aria-invalid="false" aria-multiline="false" aria-labelledby="PolarisTextFieldemail_on_billLabel" value="">
                                                                    <div class="Polaris-TextField__Backdrop"></div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>             
                                                    </div>
        
        
                                                    <div class="Polaris-FormLayout__Item page_title_discrition">
                                                        <div class="select_page_options select_outer">  
                                                            <select id="content_page_title" class="page_content_policy Product_tags " name="platform" attr-type="page_content" aria-invalid="false">

                                                                <option class="page_body_option" aria_element="false" selected="selected">Select page</option> '; 
                                                                foreach ($page_list->pages as $item) { 
                                                                
                                                                    $tab_val.=' <option class="page_content_body"  aria_element="true" page-id='.$item->id.' value="'.$item->title.'">'.$item->title.'</option>';

                                                                } 
                                                                $tab_val.='</select>                                    
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="Polaris-FormLayout__Item edit_page_layout" style="display: none;">
                                                        <button type="button" class="Polaris-shopify__Item sd_back_dashboard  Edit_page_dashboard" >
                                                            <span class="Polaris-Icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4.5 3A1.5 1.5 0 003 4.5v11A1.5 1.5 0 004.5 17h11a1.5 1.5 0 001.5-1.5V12h-2v3H5V5h3V3H4.5zM17 4a1 1 0 00-1-1h-5a1 1 0 100 2h2.586l-5.293 5.293a.999.999 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4z" fill="#5C5F62"/></svg>
                                                            </span>
                                                            <span class="Polaris-shopify back_trackShopify" id="">Edit page</span>
                                                        </button>  
                                                    </div>
        
                                                    <div class="Polaris-FormLayout__Item page_content_bttn">
                                                
                                                
                                                        <button class="Polaris-Button Polaris-Button--primary Textarea-Bttn Optionsvlaue tab_element_save"  attr-id="add_page_data" attr-action="selected"  attr-page ="'.$tabvalue.'"  attr-type="page_content" aria-element="false"  type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Add</span></span></button>

                                                        <button class="tab_element_cancel Polaris-Button" attr-type="page_content" attr-action="cancel" cancel-action="cancel"   id="add_cancel" type="button" id="btn"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Cancel</span></span></button>
                                                    </div>
                                                </div>   
                                            </div>
                                        </li>
         
                                        <li class="Polaris-ResourceItem__ListItem"  id="Integration-Container">   
                                            <div class="Polaris-ResourceItem__Container text_Icon hover_mytab Media_Integration_Icon tab_element_accordian" attr-type="app_integration"  aria-element="false" attr-value="false">
        
                                                <div class="Polaris-ResourceItem__Media ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="Integration_elements" style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path class="Integration_elements" d="M9 9H1V2.5A1.5 1.5 0 012.5 1H9v8zM9 11v8H2.5A1.5 1.5 0 011 17.5V11h8zM11 11v8h6.5a1.5 1.5 0 001.5-1.5V11h-8zM15 1a1 1 0 011 1v2h2a1 1 0 110 2h-2v2a1 1 0 11-2 0V6h-2a1 1 0 110-2h2V2a1 1 0 011-1z" fill="#5C5F62"/></svg>                                                         
                                                </div> 
                                                <div class="Polaris-ResourceItem__Content text_variation">
                                                    <h3><span class="Polaris-TextStyle--variationStrong"> App Integration</span></h3>
                                                </div>
                                            </div>
        
                                        
                                            <div class="Polaris-ResourceItem__Container_content"  style="display: none;">
                                                <div class="Polaris-Card__Section Element_editor element_step_discripition Integration-Container_editor" id="tab_Integration_" attr-step3= "Contaier-Tab3_step2" >
                                                    <div class="Polaris-Card__Section">
                                                        <div class="Polaris-Labelled__LabelWrapper">
                                                            <div class="Polaris-Label"><label id="PolarisTextField14Label" for="PolarisTextField14" class="Polaris-Label__Text">app Integration</label></div>
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div>
                                        </li>   
                                    </ul>

                                </div>
                            </div>
                        </div>  
                    </div>          
                </div>
                        
                <div class="Polaris-Tabs__Panel Polaris-Tabs__Panel--hidden  tabs_bttn_content layoutTab" id="accepts-marketing-content-4 "  role="tabpanel" aria-labelledby="accepts-marketing-4" tabindex="-1" style="display: none;">
                    <div class="Polaris-Card__Section">
                        <div class="Polaris-Card__SectionHeader">
                            <h3 aria-label="All" class="Polaris-Subheading">Products</h3>
                        </div>
                        <p>Product 1 selected</p>
                    </div>
                </div>
                    
                <div class="Polaris-Tabs__Panel Polaris-Tabs__Panel--hidden tabs_bttn_content themeTab" id="repeat-customers-content-4 " role="tabpanel" aria-labelledby="repeat-customers-4" tabindex="-1" style="display: none;">
                    <div class="Polaris-Card__Section">
                        <div class="Polaris-Card__SectionHeader">
                            <h3 aria-label="All" class="Polaris-Subheading">Appearance</h3>
                        </div>
                        <p>Appearance 2 selected</p>
                    </div>
                </div>    
            </div>      
        </div>

        <div id="PolarisPortalsContainer">
            <div data-portal-id="popover-Polarisportal5"></div>
        </div>
    </div>';

    echo $tab_val;
        }
    ?>
            
    </div>
        <!--  Section 2-->
        <div class="Polaris-Layout__Section manage_proTab_second">
            <!--  header section 2 -->
            <div class="Polaris-Card">
                <div class="Polaris-Card__Section ">
                    <div class="Manage_tab_dashboard">
                        <h3 class="Polaris-Heading manage_your_tab">Manage Tabs</h3>
                        <div class="polaris_mobile_computer">
                            <!-- phone -->
                            <div class="preview-mobile active " >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" style="width: 20px; cursor: pointer;" class="icon_Container" id="preview-tab-mobile">
                                    <path fill-rule="evenodd"  d="M3 1.5C3 .7 3.7 0 4.5 0h11c.8 0 1.5.7 1.5 1.5v17c0 .8-.7 1.5-1.5 1.5h-11c-.8 0-1.5-.7-1.5-1.5v-17zM5 2h10v14H5V2zm4 15a1 1 0 100 2h2a1 1 0 100-2H9z"/>
                                </svg>
                            </div>
                            <!-- computer -->
                            <div class="preview-desktop">
                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20" style="width: 20px; margin-left:20px; cursor: pointer;" class="icon_Container" id="preview-tab-desktop">
                                    <path fill-rule="evenodd" d="M2.5 1A1.5 1.5 0 001 2.5v11A1.5 1.5 0 002.5 15H7c0 .525-.015.793-.144 1.053-.12.239-.416.61-1.303 1.053A1 1 0 006.022 19h7.956a1.004 1.004 0 00.995-.77 1.001 1.001 0 00-.544-1.134c-.873-.439-1.166-.806-1.285-1.043-.13-.26-.144-.528-.144-1.053h4.5a1.5 1.5 0 001.5-1.5v-11A1.5 1.5 0 0017.5 1h-15zm8.883 16a2.621 2.621 0 01-.027-.053c-.357-.714-.357-1.42-.356-1.895V15H9v.052c0 .475.001 1.181-.356 1.895a2.913 2.913 0 01-.027.053h2.766zM17 11H3v2h14v-2z"/>
                                </svg> 
                            </div>
							
                            <button class="Polaris-Button save_all_settings  icon_Container" attr-tab-val="<?php echo $tabvalue ;?>" attr_tab_id="<?php echo $tabid ;?>"  id="ManageSave_settings" type="button"><span class="Polaris-Button__Content" ><span>Save</span></span></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- container section 2 (card) -->
            <div class="Polaris-Card add_polaris_width ">
                <div class="Polaris-Card__Section skeleton"> 
                    <div class="left-Thumbnail_width">
                        <div class="Polaris-SkeletonThumbnail left-Thumbnail Polaris-SkeletonThumbnail--sizeLarge"></div>
                    </div>
                
                    <div class="right-Thumbnail_width">
                        <div class="Polaris-SkeletonBodyText"></div>
                        <div class="Polaris-SkeletonBodyText"></div>
                        <div class="Polaris-SkeletonBodyText"></div>

                        <div class="Polaris-SkeletonThumbnail Polaris-SkeletonThumbnail--sizeSmall" style="margin-top: 10px; padding-left:150px;"></div>
                    
                        <button class="Polaris-Button Polaris-Button--fullWidth skeleton_bttn" type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Add To Cart</span></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="PolarisPortalsContainer"></div>


   

