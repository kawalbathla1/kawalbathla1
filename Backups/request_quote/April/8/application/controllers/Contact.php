<?php
    header("Access-Control-Allow-Origin: *");
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Contact extends CI_Controller {
        public function __construct() {
            parent::__construct();
           // $this->load->library('Header_library');
        }
        public function contact() {
            $this->load->view("header");
            $this->load->view("contact");
            $this->load->view("footer");

        }

    
    }
?>