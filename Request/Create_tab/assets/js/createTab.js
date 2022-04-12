$(document).ready(function (){ 
	const attr_tab_val = $("#ManageSave_settings").attr('attr-tab-val');
    /***** GLOBAL VARIABLE DECALRE *****/
    const  base_url = $("#baseurlform").val();
    const  shopify_apikey = $('#shopify_key').val();
    const  directory = $('#mydirectory').val();
    const  store = $('#config_store').val();

    /* Dynamic Id */
    var count_id = 1; 
    var tinymce_editor_id = ''; 
    var quotations = [];
    /* Tiny MCE text editor */
    function tiny_text_editor() {
      
        tinymce.remove('textarea')
        tinymce.init({
            deprecation_warnings: false,
            toolbar: 'bold italic underline',
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
    }
    /* Tiny MCE text editor */

    /************************* FUNCTION CALL ********[START]****/

    //JQUERY DATATABLE  LISTING PAGE START 
    $(function(){
        $("#tab-listing").dataTable({
            "bPaginate": false,
            "oLanguage": { "sSearch": "" } ,
            "aoColumnDefs": [
                { "bSortable": false, "aTargets": [ 0, 1, 2, 3 ,4] }, 
                { "bSearchable": false, "aTargets": [ 0, 1, 2, 3 , 4 ] }
            ]
        });
    });
  
    //add and remove heading boarder(ELEMENT,PRODUCT,APPEAR):-
    function elementProductAppear(Tab) {
        $(".tab_remove_data li button ").removeClass('Polaris-Tabs__Tab--selected');
        $(Tab).addClass('Polaris-Tabs__Tab--selected');

        //add and remove container:-
        var tab_data = $(Tab).attr('attr_data');
        $( ".tabs_bttn_content").css({display: "none"});
        $( "."+tab_data).css({display: "block"});
    }

    //Get form multiple div input value in groups:-
    $.fn.serializeObject = function() {
        var data = {};
        $.each( this.serializeArray(), function( key, obj ) {
            var a = obj.name.match(/(.*?)\[(.*?)\]/);
            if(a !== null){
                var subName = new String(a[1]);
                var subKey = new String(a[2]);
                if( !data[subName] ) {
                  data[subName] = { };
                  data[subName].length = 0;
                };
                if (!subKey.length) {
                    subKey = data[subName].length;
                }
                if( data[subName][subKey] ) {
                  if( $.isArray( data[subName][subKey] ) ) {
                    data[subName][subKey].push( obj.value );
                  }else {
                    data[subName][subKey] = { };
                    data[subName][subKey].push( obj.value );
                  };
                }else {
                    data[subName][subKey] = obj.value;
                };
                data[subName].length++;
            }else{
                var keyName = new String(obj.name);
                if( data[keyName] ) {
                    if( $.isArray( data[keyName] ) ) {
                        data[keyName].push( obj.value );
                    }else {
                        data[keyName] = { };
                        data[keyName].push( obj.value );
                    };
                }else {
                    data[keyName] = obj.value;
                };
            };
        });
       
        return data;
    };

    /************************* FUNCTION CALL ********[END]****/

    /************************* STACK POPUP ********[END]****/ 
        // $('.stack_popup_bttn').on('click', function () { 
        //     var attr_model = $(this).attr("attr-model");
        //     console.log(attr_model);
    
        //     if(attr_model =='show_model'){
    
        //         $('.polaris_popup_Model').show();
    
        //     }else if(attr_model == 'hidden') {
    
        //         $('.polaris_popup_Model').hide();
    
        //     }else if(attr_model == 'continue_edit') {
    
        //         $('.polaris_popup_Model').hide();
    
        //     }else{
        //         $('.polaris_popup_Model').hide(); 
        //     }
    
        // });

    /****ON BUTTON CLICK REDIRECT TO NEXT PAGE START  *****************/
    $(".My_Tab_data").click(function(){
        var admin = $(this).attr('attr_redirect_link');
         console.log(admin);
        if(admin == 'dashboard'){
            window.top.location = `https://${store}/admin/apps/${shopify_apikey}/${directory}`;
        }else{
            window.top.location = `https://${store}/admin/apps/${shopify_apikey}/${directory}/${admin}`;     
        }
    });

    /*** BACK BUTTON CLICK *****************/
    $(".back_card").click(function(){
        //Previous button
        $(".icon_element_bttn ,.elements_section").css({display: "block"});
        $(".Element_input ,.back_card").css({display: "none"}); 
       // $(".Element_input ,.back_card ,.LegalContent_editor,.Page-Container_editor,.Integration-Container_editor,.Text-Container_editor").css({display: "none"}); 
    });

    // /*-- AppBridge(Button,Modal,Toast)--*/
    var AppBridge = window['app-bridge'];
    var createApp = AppBridge.default;
    var app = createApp({
        apiKey: shopify_apikey,
        shopOrigin : store
    });
    var AppBridge = window['app-bridge'];
    var Toast = actions.Toast;

    /*TOAST FUNCTION CALL START */
    function success_toast(message){
        /*--app bridge- toast --(start)*/
        var toastOptions = {
            message: message,
            duration: 3000 
        };
        var toastNotice = Toast.create(app, toastOptions);
        toastNotice.dispatch(Toast.Action.SHOW); 
        setTimeout(function(){
            window.location.reload(1);
        }, 3000); 
    }

    function error_toast(error_msg){
        var toastOptions = {
            message: error_msg,
            duration: 3000 
        };
        var toastNotice = Toast.create(app, toastOptions);
        toastNotice.dispatch(Toast.Action.SHOW); 
        setTimeout(function(){
            window.location.reload(1);
        }, 3000);
    }
	
	function alert_toast(error_msg){
        var toastOptions = {
            message: error_msg,
            duration: 3000 
        };
        var toastNotice = Toast.create(app, toastOptions);
        toastNotice.dispatch(Toast.Action.SHOW); 
    }
    /*TOAST FUNCTION  END */

    /*************** AJAX FUNCTION ********[START]****/
    function ajaxCall(options){
        return new Promise(function(Resolve, Reject) {
            $.ajax(options).then(function(response){  
            let Status = response.status;
            let message = response.message;
            //console.log(message);
                if(Status == true){
                    Resolve(response);
                }else{ 
                    Reject(response); 
                }
            });
        });
    }

   /****ON ELEMENTS BUTTON CLICK SWITCH CASE START *****************/
    $('.icon_Container').on('click', function () {
        var Selected_Id = $(this).attr("id");
        $('.elements_section').css('border','none'); //remove css on tab button click

        switch(Selected_Id){
            case "Elements-Tab-Setting":case "Products-Tab-Setting":case "desktop-Tab-Setting":
                elementProductAppear($(this));
                break;
            case 'preview-tab-mobile':
                $(".preview-mobile , .add_polaris_width").addClass("active  Mobile-card_width");
                $(".preview-desktop").removeClass("active");
                break;
            case 'preview-tab-desktop':
                $(".preview-desktop").addClass("active");
                $(".add_polaris_width , .preview-mobile ").removeClass("Mobile-card_width  active");
                break;
            case 'Media_Element_Icon':
                $(".Element_input , .back_card").css({display: "block"}); 
                $(".LegalContent_editor ,.elements_section").css({display: "none"});
                break;
            default:
        }
    });

    //ELEMENT CANCEL BUTTON := TEXTAREA
    $('body').on('click', '.tab_element_cancel',function() {
        
        var type_cancel = $(this).attr("attr-type");
        console.log(type_cancel);
        //var action_cancel = $(this).attr("cancel-action");

        if(type_cancel == 'text_area'){

            $('.Polaris-ResourceItem__Container_content').hide();
            $('.tab_element_accordian').attr("aria-element",'false');
            $('#element_title').val("");
            $('.textarea_descripition .tox-sidebar-wrap').find("#full-featured-non-premium_ifr").contents().find("body").html('');

        }else if(type_cancel == 'page_content'){

            $('.Polaris-ResourceItem__Container_content').hide();
            $('.tab_element_accordian').attr("aria-element",'false');
            $('#page_element_title').val("");
            $("#page_optionSelect").html("Select page");
            $('.edit_page_layout').hide(); //page edit button

        }else{

        }

    });

    //ELEMENT SAVE BUTTON :=
    $('body').on('click', '.tab_element_save',async function() {
        let pageContentOptions = [];
        var title_select = '';
        var attr_id = $(this).attr('attr-id');
        var aria_element = $(this).attr('aria-element');
        var attr_page = $(this).attr('attr-page'); 
		var attr_tab_val = $("#ManageSave_settings").attr('attr-tab-val');

        //console.log(attr_id);
        $('.title_outer, .text_outer, .select_outer, .page_outer').css('border','none'); //tab title not empty

        if(attr_id == 'add_textarea_data'){
            var title_tab = $('#element_title').val(); //Get title,discripition and type
            var tab_content = tinymce.get("full-featured-non-premium").getContent({format: "html"});
            var attr_type = $(this).attr("attr-type");

                //validation
                if(title_tab==''){
                    $('.title_outer').css('border','2px solid red');
                    alert_toast('Please fill the title');
                    return false;
                }
                if(tab_content==''){
                    $('.text_outer').css('border','2px solid red');
                    alert_toast('Please fill the textarea');
                    return false;
                }    

        }else if(attr_id == 'add_page_data'){
            var title_tab = $('.tab_element_save').parent('.page_content_bttn').siblings('.page_title_field').find('#page_element_title').val();
            title_select = $('.page_content_variation .Page-Container_editor').children('.page_title_discrition').find('#content_page_title').val();
			var page_id = $('.page_content_variation .Page-Container_editor #content_page_title').find('option:selected').attr('page-id');
			//var page_id = $('#content_page_title').find('option:selected').attr('page-id');
            
			if(attr_page=='create'){
        
                //validation
                if(title_tab==''){
                    $('.page_outer').css('border','2px solid red');
                    alert_toast('Please fill the title');
                    return false;
                }
                if(title_select=='Select page'){
                    $('.select_outer').css('border','2px solid red');
                    alert_toast('Please select the option');
                    return false;
                }
				
			}else{

				var page_id = $('.page_content_variation_update .Page-Container_editor .page_title_discrition #content_page_title').find('option:selected ,this').attr('page-id');
				title_select = $('.page_content_variation_update .Page-Container_editor').children('.page_title_discrition').find('#content_page_title').val();
				//var page_id = $('.page_content_variation_update .Page-Container_editor .edit_page_layout #content_page_title').find('option:selected').attr('page-id');
				//var page_id = $('#content_page_title').find('option:selected').attr('page-id');
				//var page_id = $('.page_content_variation_update .Page-Container_editor .page_title_discrition #content_page_title').find('option:selected ,this').attr('page-id');

                //validation
				if(title_tab==''){
                    $('.page_outer').css('border','2px solid red');
                    alert_toast('Please fill the title');
                    return false;
                }
                if(title_select=='Select page'){
                    $('.select_outer').css('border','2px solid red');
                    alert_toast('Please select the option');
                    return false;
                }
			}

            console.log(page_id);

            $('.page_content_policy').attr("aria-element",'false');
                if(page_id=='undefined' || typeof page_id === "undefined"){
                    page_id ='none';
                }
           
            var attr_type = $(this).attr("attr-type");
            $('.edit_page_layout').hide(); 

            //ADD button click hide element
            if(aria_element == 'false'){
                $(".Polaris-ResourceItem__Container_content").hide();
                $('.tab_element_accordian').attr("aria-element",'false');
            }
        }
       

        $('#element_title').val(""); //on save button click empty title and descripition
        $('.textarea_descripition .tox-sidebar-wrap').find("#full-featured-non-premium_ifr").contents().find("body").html('');
		if(attr_page=='create'){
				$('.page_content_variation').children('.Page-Container_editor').find('#page_element_title').val(""); //page content input field empty
				if($('.page_content_variation .Element_editor #content_page_title')){
					$('.page_content_variation .Element_editor #content_page_title')[0].selectedIndex = 0;
					
				}

				$(".page_content_variation #content_page_title option").each(function(){
					var OptionValue = $(this).val();
					var page_id = $(this).attr('page-id');
					//console.log(OptionValue);
					pageContentOptions.push({OptionValue,page_id});
				});
		}else{
			$('.page_content_variation_update').children('.Page-Container_editor').find('#page_element_title').val(""); //page content input field empty
				if($('.page_content_variation_update .Element_editor #content_page_title')){
					$('.page_content_variation_update .Element_editor #content_page_title')[0].selectedIndex = 0;
					
				}

				$(".page_content_variation_update #content_page_title option").each(function(){
					var OptionValue = $(this).val();
					var page_id = $(this).attr('page-id');
					//console.log(OptionValue);
					pageContentOptions.push({OptionValue,page_id});
				});	
		}

        var description_tab = { 
            "type" : attr_type,
            "title" : title_tab,
            "page_id" :  page_id,                         
            "selected" : title_select,
            "content" : tab_content,  
            "count_id" :  count_id
        };

        var tabContent  = tabElements(description_tab,pageContentOptions);
        $(".add_new_tab").append(tabContent);

        $(".Element_input").css({display: "none"});
        $(".icon_element_bttn ,.elements_section").css({display: "block"});
        count_id++; 
  
    });
    
    function tabElements(description_tab,pageContentOptions){

      //  console.log(description_tab.page_id);
      
        switch(description_tab.type){
            case "text_area":

                    var mymodel =`
                        <div class="no_elements Element_tab_area  ">
                        <div class="Polaris-Card__Section hover_mytab add_tab tab_element_accordian" id="tab_element_${description_tab.count_id}" attr-type = "${description_tab.type}"  aria-element="false" attr-value="false">
                            <div class="Polaris-ResourceItem__Media">
                                <svg xmlns="http://www.w3.org/2000/svg" class="Element_tab_header"  style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.5 1A1.5 1.5 0 001 2.5v15A1.5 1.5 0 002.5 19h15a1.5 1.5 0 001.5-1.5v-15A1.5 1.5 0 0017.5 1h-15zM16 5H4v2h12V5zM4 9h12v2H4V9zm6 4H4v2h6v-2z" fill="#5C5F62"></path></svg>
                                    
                            </div>
                            <div class="Polaris-ResourceItem__Content text_variation">
                                <span class="Polaris-TextStyle--variationStrong">${description_tab.title}</span>
                            </div> 
            
                            <div class="Polaris-ResourceItem__Media tab_element_delete">
                                <svg xmlns="http://www.w3.org/2000/svg" class="element_Tab_delete" style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M14 4h3a1 1 0 011 1v1H2V5a1 1 0 011-1h3V1.5A1.5 1.5 0 017.5 0h5A1.5 1.5 0 0114 1.5V4zM8 2v2h4V2H8zM3 8h14v10.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 18.5V8zm4 3H5v6h2v-6zm4 0H9v6h2v-6zm2 0h2v6h-2v-6z" fill="#5C5F62"></path></svg>
                            </div>
            
                            <div class="Polaris-ResourceItem__Media drag_media_data">
                                <svg xmlns="http://www.w3.org/2000/svg" class="element_Tab_drag"  style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path d="M7 2a2 2 0 10.001 4.001A2 2 0 007 2zm0 6a2 2 0 10.001 4.001A2 2 0 007 8zm0 6a2 2 0 10.001 4.001A2 2 0 007 14zm6-8a2 2 0 10-.001-4.001A2 2 0 0013 6zm0 2a2 2 0 10.001 4.001A2 2 0 0013 8zm0 6a2 2 0 10.001 4.001A2 2 0 0013 14z" fill="#5C5F62"></path></svg>
                            </div>
                        </div>
                        
                        <div class="Polaris-ResourceItem__Container_content Text-discripition_editor element_step_discripition" attr-type = '${description_tab.type}' style="display: none;">   
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
                                                <div class="Polaris-Connected__Item Polaris-Connected__Item--primary text_model">
                                                    <div class="Polaris-TextField ">
                                                        <input type="text" maxlength="100"  name="elementer_${description_tab.count_id}[container_title]" id="add_tab_container" placeholder="Enter Title" class="Polaris-TextField__Input title_name_container get_form_data" aria-invalid="false" aria-multiline="false" aria-labelledby="PolarisTextFieldemail_on_billLabel" value='${description_tab.title}'>
                                                        <div class="Polaris-TextField__Backdrop"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        
                                        <div class="Polaris-FormLayout__Item textarea_descripition" >
                                            <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <label id="PolarisTextFieldinvoice_title" for="PolarisTextFieldinvoice_titleLabel" class="Polaris-Label__Text">Text Area</label>
                                                </div>
                                            </div>
                                            <div class="Polaris-Connected"> 
                                                <div class="Polaris-Connected__Item Polaris-Connected__Item--primary"> 
                                                
                                                    <div class="Polaris-FormLayout__Item Product_tags text_data">
                                                    <textarea name="elementer_${description_tab.count_id}[container_desc]" class="tiny_text_area" id="featured_container">
                                                    ${description_tab.content}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <input type="hidden" name="elementer_${description_tab.count_id}[container_type]" value = '${description_tab.type}'>
                                        <input type="hidden" name="elementer_${description_tab.count_id}[container_id]" value = "none">
                                        <input type="hidden" name="elementer_${description_tab.count_id}[container_selected]"  value ="none">
                                        <input type="hidden" name="elementer_${description_tab.count_id}[container_page_id]" value = "none">
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div> `;
                break;

            case 'page_content':

                var select_page = '';

                for (var i = 0; i < pageContentOptions.length; i++){
					console.log(description_tab);
					console.log(pageContentOptions[i]);
                    var page_option= '';

                    if(description_tab.selected == pageContentOptions[i].OptionValue){ page_option = 'selected' }
                    select_page += '<option class="page_body_option"  page-id='+pageContentOptions[i].page_id+' value= '+pageContentOptions[i].page_id+'  '+page_option+' >'+pageContentOptions[i].OptionValue+'</option>';

                }

                var mymodel =`  
                <div class="no_elements Element_tab_area ">
                <div class="Polaris-Card__Section hover_mytab add_tab tab_element_accordian" id="tab_element_${description_tab.count_id}" attr-type ="${description_tab.type}"   aria-element="false" attr-value="false">
                    <div class="Polaris-ResourceItem__Media">
                        <svg xmlns="http://www.w3.org/2000/svg" class="Element_tab_header"  style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.5 1A1.5 1.5 0 001 2.5v15A1.5 1.5 0 002.5 19h15a1.5 1.5 0 001.5-1.5v-15A1.5 1.5 0 0017.5 1h-15zM16 5H4v2h12V5zM4 9h12v2H4V9zm6 4H4v2h6v-2z" fill="#5C5F62"></path></svg>
                            
                    </div>
                    <div class="Polaris-ResourceItem__Content text_variation">
                        <span class="Polaris-TextStyle--variationStrong"> ${description_tab.title} </span>
                    </div> 
    
                    <div class="Polaris-ResourceItem__Media tab_element_delete">
                        <svg xmlns="http://www.w3.org/2000/svg" class="element_Tab_delete" style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M14 4h3a1 1 0 011 1v1H2V5a1 1 0 011-1h3V1.5A1.5 1.5 0 017.5 0h5A1.5 1.5 0 0114 1.5V4zM8 2v2h4V2H8zM3 8h14v10.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 18.5V8zm4 3H5v6h2v-6zm4 0H9v6h2v-6zm2 0h2v6h-2v-6z" fill="#5C5F62"></path></svg>
                    </div>
    
                    <div class="Polaris-ResourceItem__Media drag_media_data">
                        <svg xmlns="http://www.w3.org/2000/svg" class="element_Tab_drag"  style="width: 20px; cursor: pointer;" viewBox="0 0 20 20"><path d="M7 2a2 2 0 10.001 4.001A2 2 0 007 2zm0 6a2 2 0 10.001 4.001A2 2 0 007 8zm0 6a2 2 0 10.001 4.001A2 2 0 007 14zm6-8a2 2 0 10-.001-4.001A2 2 0 0013 6zm0 2a2 2 0 10.001 4.001A2 2 0 0013 8zm0 6a2 2 0 10.001 4.001A2 2 0 0013 14z" fill="#5C5F62"></path></svg>
                    </div>
                </div>
                
                <div class="Polaris-ResourceItem__Container_content page_accordian_variation Text-discripition_editor element_step_discripition" attr-type ="${description_tab.type}" attr-type ='.$type.' style="display: none;">   
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
                                                    <input type="text" maxlength="100" id="add_tab_container"  name="elementer_${description_tab.count_id}[container_title]" placeholder="Enter Title" class="Polaris-TextField__Input title_name_container get_form_data" aria-invalid="false" aria-multiline="false" aria-labelledby="PolarisTextFieldemail_on_billLabel" value="${description_tab.title}">
                                                    <div class="Polaris-TextField__Backdrop"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                

                                    <div class="Polaris-FormLayout__Item pagecontent_descripition">
                                        <div class="Polaris-Labelled__LabelWrapper">
                                            <div class="Polaris-Label">
                                                <label id="PolarisTextFieldinvoice_title" for="PolarisTextFieldinvoice_titleLabel" class="Polaris-Label__Text">Page Selected: </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="Polaris-FormLayout__Item ">
                                        <div class="Polaris-FormLayout__Item page_title_discrition">
                                            <div class="select_page_options">
                                                <select id="content_page_title_added" class="page_content_policy Product_tags"  name="platform" attr-type="page_content" aria-invalid="false">
                                                    ${select_page}
                                                </select> 
                                                                               
                                            </div>
                                        </div>
                                    </div>

                                    <div class="Polaris-FormLayout__Item edit_page_layout">
                                        <button type="button" class="Polaris-shopify__Item sd_back_dashboard Edit_page_dashboard"  attr-type-val= ${attr_tab_val}  attr-value="true" attr-id="${description_tab.page_id}">
                                            <span class="Polaris-Icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4.5 3A1.5 1.5 0 003 4.5v11A1.5 1.5 0 004.5 17h11a1.5 1.5 0 001.5-1.5V12h-2v3H5V5h3V3H4.5zM17 4a1 1 0 00-1-1h-5a1 1 0 100 2h2.586l-5.293 5.293a.999.999 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4z" fill="#5C5F62"/></svg>
                                            </span>
                                            <span class="Polaris-shopify back_trackShopify" id="">Edit page</span>
                                        </button> 
                                    </div>
                                </div>

                                <input type="hidden" name="elementer_${description_tab.count_id}[container_selected]" value ="${description_tab.selected}">
                                <input type="hidden" name="elementer_${description_tab.count_id}[container_type]" value = "${description_tab.type}">
                                <input type="hidden" name="elementer_${description_tab.count_id}[container_page_id]" value ="${description_tab.page_id}">
                                <input type="hidden" name="elementer_${description_tab.count_id}[container_desc]" value = "none">
                                <input type="hidden" name="elementer_${description_tab.count_id}[container_id]" value = "none">
                            </div>
                        </div>
                    </div> 
                </div>
            </div> `;
            break; 
        }
        return mymodel;
    }

   
    //Accordian for element section (show)
    $('body').on('click', '.tab_element_accordian', function() {
        
        var attr_type = $(this).attr("attr-type");
        var attr_value = $(this).attr("attr-value");  // Show data
        var aria_element = $(this).attr("aria-element"); // Show Hide the accordian/ description box
        tiny_text_editor();

        // console.log(attr_type);
        $(".Polaris-ResourceItem__Container_content").hide();
        if(attr_value == 'false'){

            //console.log("attr_value");

            $(".Polaris-ResourceItem__Container_content").css({display: "none"});
            $(this).siblings(".Polaris-ResourceItem__Container_content").css({display: "block"});
        
            $(this).attr("attr-value",'true'); //change attr_value from false to true
            $('.tab_element_accordian').attr("aria-element",'false');
            $(this).attr("aria-element",'true'); //change attr_value of this click and rest will remain false  

        }else{
            console.log("aria_element");

            //do not hit ajax and simply load html 
            if(aria_element =='true'){
                //TEXTAREA BUTTON CLICK:= HIDE TEXTAREA POPUP
                $(this).siblings(".Polaris-ResourceItem__Container_content").hide();
                $(this).attr("aria-element",'false'); 
            }else{
                //TEXTAREA BUTTON CLICK:= SHOW
                $(this).siblings(".Polaris-ResourceItem__Container_content").show();
                $('.tab_element_accordian').attr("aria-element",'false');
                $(this).attr("aria-element",'true');  
            } 
        }
        
    });

    //ELEMENT DELETE BUTTON :=
    $('body').on('click', '.tab_element_delete',function() {
        $(this).parents('.Element_tab_area').remove();
        var delete_id = $(this).attr("attr-tid");
        quotations.push(delete_id);
       console.log(delete_id,quotations);
    });
  
    //Save button 
    $('.save_all_settings').click(async function () {
        let attr_tab_val = $(this).attr("attr-tab-val");
        let attr_id = $(this).attr("attr_tab_id");

        tinymce.triggerSave(); 
        let tab_name = $('#tab_textfield_name').val(); //get tab name value
        let form_objArr = $('form.add_new_tab').serializeObject();
		tab_name = tab_name.trim(); //trim space from tab name


        let textField = $('#add_tab_container').val();
        console.log(textField);

        let Field = $(this).val('');
        console.log(Field);

		$('#name-outer, .text_model').css('border','none'); //tab name not empty

        //validation
		if(tab_name==''){
			$('#name-outer').css('border','2px solid red');
			alert_toast('Please fill the tab name first');
			return false;
		}
   
        $('.elements_section').css('border','none');//tab elements not empty
        if (jQuery.isEmptyObject(form_objArr)){
            $('.elements_section').css('border','2px solid red');
            console.log('empty'); 
            alert_toast('No details has been saved  ');
            return false;
        } 

        if(attr_tab_val=='create'){
            window.top.location = `https://${store}/admin/apps/${shopify_apikey}/${directory}`; //redirect to dashboard
        }
       
        let data_save ={  
            "form_objArr": form_objArr,
            "store": store,
            "tab_name": tab_name,
            "delete": quotations,
            "attr_tab_val": attr_tab_val,
            "attr_id": attr_id
        }

        let options = {};
        options.type ="POST";
        options.url =  `${base_url}setting_save`;
        options.data =  data_save;
        options.dataType = 'json';

        try {
            let response = await ajaxCall(options);
            success_toast(response.message);   
        }catch(err){
            error_toast('Something Went Wrong Please Try Again.');
        }

    });



    //Count Maximum length
    $('#tab_textfield_name').keyup(function() {
        let maxLength = 25;
        let textlen = maxLength - $(this).val().length;
        $('#CharacterNum').text(`${textlen}/25`);
    });


    
	
    //Edit page:=
    $('body').on('click', '.Edit_page_dashboard', function() {
       
		
		if(attr_tab_val=='create'){
			var page_id = $(this).parent().prev().find('option:selected ,this').attr('page-id');
			window.open(`https://${store}/admin/pages/${page_id}`, "_blank");

		}else{
				var page_id = $(this).parent().prev().find('option:selected ,this').attr('page-id');
				var attr_value = $(this).attr("attr-value");
				var attr_id = $(this).attr("attr-id");
				 if(attr_value == 'true'){
					window.open(`https://${store}/admin/pages/${attr_id}`, "_blank");
				}else{
					window.open(`https://${store}/admin/pages/${page_id}`, "_blank"); 
				} 
			
			
		}
		
    });

    $('.update_tab_list ').on('click', function () {
        var attr_tab_name = $(this).attr("attr_tab_name");
        var attr_val = $(this).attr("attr_val");
        var attr_tab_id = $(this).attr("attr_tab_id");
        var admin = $(this).attr('attr_redirect_link');

        if(attr_val){
           window.top.location = `https://${store}/admin/apps/${shopify_apikey}/${directory}/${admin}?tabvalue=${attr_val}&tabid=${attr_tab_id}&tabname=${attr_tab_name}`;
        }
       
    });

    //cancel popup:=
        $('.stack_popup_bttn ').on('click', function () {
        let attr_model = $(this).attr("attr-model");
        let attr_tab_id = $(this).attr("attr_tab_id");
        $('#stack_popup_delete').attr('tab_delete_id', attr_tab_id);//set id in attribute

        if(attr_model =='show_model'){
    
            $('.polaris_popup_Model').show();

        }else{

            $('.polaris_popup_Model').hide();

        }

    });
       
    //delete popup:=
    $('.delete_popup_button').on('click',async function () {
        let popup_id =  $(this).attr("tab_delete_id");
        var data_save ={  
            "delete_id": popup_id
        }

        var options = {};
        options.type ="POST";
        options.url =  `${base_url}setting_save`;
        options.data =  data_save;
        options.dataType = 'json';

        try {
            var response = await ajaxCall(options);
            success_toast(response.message);  
        }catch(err){ 

        }
        $('.polaris_popup_Model').hide();
    });

});


// $(document).on('change', '#content_page_title' , function() {
//     console.log('why why?');
//     //Use $option (with the "$") to see that the variable is a jQuery object
//     var $option = $(this).find('option:selected');
    
//     var value = $option.val();//to get content of "value" attrib
// 	$(this).parent().parent().parent().next().find('.Edit_page_dashboard').attr('attr-id',value);
//     //var pageId = $('#content_page_title').find('option:selected ,this').attr('page-id');
//     var pageId = $('.page_accordian_variation ').find('#content_page_title').find('option:selected ,this').attr('page-id');
//    console.log(pageId);

//     if(pageId =='undefined'){
//         $('.edit_page_layout').hide();
//     }else{
//         $('.edit_page_layout').show();  
//     }

// });

//PAGE CONTENT:=
$('#content_page_title').on('change', function () {
    var selectedText = $(this).find("option:selected").text(); 
    var text = $("#page_optionSelect").html(selectedText);
    var ariaElement = $(this).find("option:selected, this").attr("aria_element");
    console.log(ariaElement);

    if(ariaElement =='true'){
        $(this).parents().find('.edit_page_layout').show();  
    }else{
        $(this).parents().find('.edit_page_layout').hide(); 
    }
});

$(document).on('change', '#content_page_title_added' , function() {
    console.log('ariaElement');
    //return false;
    var selectedText = $(this).find("option:selected").text(); 
    var text = $("#page_optionSelect").html(selectedText);
    var ariaElement = $(this).find("option:selected, this").attr("aria_element");
    var pageId = $(this).find('option:selected ,this').attr('page-id');
    console.log(pageId);
    console.log(ariaElement);

    if(pageId =='undefined'){
        $(this).parents().find('.edit_page_layout').hide();
    }else{
        $(this).parents().find('.edit_page_layout').show();  
    }

});