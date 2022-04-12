<?php

class Tabs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Header_library');
        $this->load->library('Api_library');

    }  

    public function tabs_show(){
        $header_data = $this->header_library->header_data();
        $Page_data = $this->api_library->Api_page();
      
        $popup_heading = array(
            'popup_heading' => 'Add Page',
            'page_list' => $Page_data
        );
    
        $this->load->view('header', $header_data);
        // $this->load->view('settings');
        $this->load->view('footer');
    }


    public function TabsDetail_save(){ 
       

    }
 


}