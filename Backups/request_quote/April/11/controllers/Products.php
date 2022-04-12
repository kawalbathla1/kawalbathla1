<?php
class Products extends CI_Controller{


    public function __construct()
    {
        parent::__construct();

    }

   public function quoteProduct(){
    $store = $this->input->get('shop');
        $data_header = array(
            'store' => $store,
            'apiKey' => $this->config->item('shopify_api_key')
        );

        $this->load->view('header', $data_header);
        $this->load->view('product_details');
        $this->load->view('footer');

   }
}