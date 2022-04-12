<?php
class ContactUs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Header_library');
    }  

    public function contact_us_show(){
        $header_data = $this->header_library->header_data();

        $this->load->view('header', $header_data);
        //$this->load->view('page_popup');
        $this->load->view('contact_us');
        $this->load->view('footer');
    }

}