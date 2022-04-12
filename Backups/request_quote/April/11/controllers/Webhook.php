<?php
class Webhook extends CI_Controller {
    public function appUninstall(){

    $json_str = file_get_contents('php://input');
    echo $json_str;

    //$result_check = file_put_contents(FCPATH.'assets/txt_file/webhook/app_uninstall.txt', $json_str);

    }
}