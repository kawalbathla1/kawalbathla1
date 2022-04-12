<?php
header("Access-Control-Allow-Origin: *");
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->library('Header_library');
        $this->load->library('Api_library');
    }  

    public function edit_create_tab(){
        $header_data = $this->header_library->header_data();
        $Page_data = $this->api_library->Api_page();
        $tabvalue =  $this->input->get('tabvalue');
        $tabid =  $this->input->get('tabid');
		$elements_name = $this->Usermodel->select_multiple_rows('tab_details', ['id'=>$tabid]);
        $store_condition = array(
            'store' => $header_data['store'],
            'tab_id' => $tabid
        );
        if($tabvalue == 'update'){
			$tabname = $elements_name[0]->tab_name;
            $elements_details = $this->Usermodel->select_multiple_rows('tab_elements_details', $store_condition);
			$elements_details =  (!empty($elements_details)) ? $elements_details : '';
            $data_show = array(
                'fetch' => $elements_details,   
                'page_list' => $Page_data,
                'tabvalue' => $tabvalue,
                'tabid' => $tabid,
                'tabname' => $tabname
            );
        }else{
            $data_show = array(
                'fetch' => '' ,
                'page_list' => $Page_data,
                'tabvalue' => $tabvalue,
                'tabid' => ''
            );
        }
        $this->load->view('header', $header_data);
        $this->load->view('settings_2', $data_show);
        $this->load->view('footer');
    }

    /* DETAILS SAVE */
    public function setting_save(){ 
        $store =  $this->input->post('store');
        $data =  $this->input->post('form_objArr');
        $data_delete =  $this->input->post('delete');
        $delete_id =  $this->input->post('delete_id');
        $tab_name =  $this->input->post('tab_name');
        $attr_tab_val =  $this->input->post('attr_tab_val');
        $attr_id =  $this->input->post('attr_id');
        $tab_details_data = array(
            "store"=>  $store,
            'tab_name' => $tab_name
        ); 
        $store_condition = array(
            'id'=>$attr_id
        ); 
        //fetch id and pass in datasave variable:-  
        $get_tab_data = $this->Usermodel->select_db('tab_details', $store_condition);
        if($get_tab_data){
            $tab_data = array(
                "store"=>  $store,
                'tab_name' => $tab_name,
                'id' => $attr_id,
            );
            //Update
            $update_data = $this->Usermodel->update_db('tab_details',$store_condition, $tab_data);
        }else if($delete_id){
            $data_form = array(
                'id' => $delete_id
            ); 
            //delete
            $detail_delete = $this->Usermodel->delete_db('tab_details', $data_form);   
        }else{
            //insert
            $insert_data = $this->Usermodel->insert_db('tab_details', $tab_details_data);
            $last_id = $this->Usermodel->getLastRecordNew('tab_details');
            $last_id=   $last_id[0]->id;	
        }

        $get_tab = $this->Usermodel->select_db('tab_details', $store_condition);
        //foreach loop for insert and update:-
        if(!empty($data)) { 
            foreach ($data as $row) {
				$description_array = [];
                if( $row['container_type'] == 'page_content'){
                    $description_array['tab_page_id'] = $row['container_page_id'];
                    $description_array['tab_page_select'] = $row['container_selected'];
                    if($description_array['tab_page_id']=='undefined'){
                        $description_array['tab_page_id'] = 'none';
                    }
                }else if($row['container_type'] == 'text_area'){
                    $description_array['description'] = empty($row['container_desc']) ? null : $row['container_desc'];
                }
				$container_data = json_encode($description_array);
                    
                $data_save = array(
                    "store"=>  $store,
                    "tab_id" =>   empty($get_tab['id']) ? $last_id : $get_tab['id'],
                    "tab_description" =>  $container_data,
                    'type' => empty($row['container_type']) ? null : $row['container_type'],
                    'tab_title' => empty($row['container_title']) ? null : $row['container_title'], 
                );
                $condition = array(
                    'id' => $row['container_id']
                ); 
                if($row['container_id'] == 'none'){
                    //insert
                    $this->Usermodel->insert_db('tab_elements_details', $data_save); 
                }else{
                    //update
                    $data = $this->Usermodel->update_db('tab_elements_details',$condition, $data_save); 
                }   
                // foreach loop for delete id:-
                if(!empty($data_delete)) {
                    foreach ($data_delete as $item) {
                        $condition = array(
                            'id' => $item
                        ); 
                        $this->Usermodel->delete_db('tab_elements_details',$condition);  
                    }
                }
            }
        }
        echo  json_encode(array( "status" => true, "message" => "Your details have been saved successfully." ));  
    }  

}