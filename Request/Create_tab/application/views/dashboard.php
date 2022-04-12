<div>
    <div class="Polaris-Page listing_page">
        <div class="Polaris-Page-Header Polaris-Page-Header--isSingleRow Polaris-Page-Header--mobileView Polaris-Page-Header--noBreadcrumbs Polaris-Page-Header--mediumTitle">
            <div class="Polaris-Page-Header__Row">
                <div class="Polaris-Page-Header__TitleWrapper">
                    <!-- <div class="sd_content Polaris-Page white_page--content" id="create_invoice"> -->
                        <div class="Polaris-Page-Header show_grid_head">
                            <div class="Polaris-Page-Header__MainContent">
                                <div class="Polaris-Page-Header__TitleActionMenuWrapper">
                                    <div class="Polaris-Header-Title__TitleAndSubtitleWrapper">
                                        <div class="Polaris-Header-Title">
                                            <h3 class="Polaris-Heading">Tab Listing</h3>
                                        </div>
                                        <div class="my_button_setting">
                                            <button type="button" class="Polaris-Button  update_tab_list"  attr-tab-val= "tab_create"  attr_tab_id=""  attr_val="create" attr_redirect_link ="edit_create_tab">
                                                <span class="Polaris-Button__Content">
                                                    <span class="Polaris-Button__Text" id="dashboard_tabBttn">Create Tab</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div> 
                                </div>
                            </div>	
                        </div>

                        <div class="Polaris-Page__Content">
                            <div class="Polaris-Card">
                                <div class="">
                                    <div class="Polaris-DataTable ">
                                        <div class="Polaris-DataTable__ScrollContainer polaris_datatable_heading">
                                            <table class="Polaris-DataTable__Table display" id="tab-listing">
                                                <thead>
                                                    <tr>
                                                        <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn Polaris-DataTable__Cell--header" scope="col">SrNo</th>
                                                        <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Tab Name</th>
                                                        <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Status</th>
                                                        <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Action</th>
                                                    </tr>       
                                                </thead>
                                                <tbody> 
                                                    <?php
                                                        $i=1;
                                                        /*show multiple rows using jquery datatable */
                                                        foreach($fetch as $row){ ?>
                                                            <tr class="Polaris-DataTable__TableRow Polaris-DataTable--hoverable">
                                                                <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn" scope="row"><?php echo $i; ?></td>
                                                                <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric"><?php echo $row->tab_name ?></td>
                                                                <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric"><?php echo $row->Status ?></td> 
                                                                <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric">
                                                                    <!-- Edit Button -->
                                                                    <a><i class="fa fa-edit edit_list update_tab_list"  attr_tab_name="<?php echo $row->tab_name ?>" attr_tab_id="<?php echo $row->id ?>" attr_val="update" attr_redirect_link ="edit_create_tab" style="font-size:20px"></i></a> 
                                                                    <!-- Delete Button -->
                                                                    <a><i  class="fa fa-trash stack_popup_bttn delete_list" attr-model-delete="delete_model" attr_tab_id="<?php echo $row->id ?>" attr-model="show_model" style="font-size:20px"></i></a>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                        $i++;
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
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
    <div id="PolarisPortalsContainer"></div>
</div>