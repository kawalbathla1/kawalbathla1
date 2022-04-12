<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Import php mailer name space for Sending Mail  */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Phpmailer_library
{
  
    public function __construct()
	{
		log_message('Debug', 'CommonFunction class is loaded.');
		$this->_CI = &get_instance();
		$this->_CI->load->model('Usermodel', 'DB');
		$this->_CI->load->config('');
		$this->_CI->load->library('session');
	}

    /* get file path for mail */
    public function mail_load(){
        require  FCPATH.'application/third_party/phpmailer/src/Exception.php';
        require  FCPATH.'application/third_party/phpmailer/src/PHPMailer.php';
        require  FCPATH.'application/third_party/phpmailer/src/SMTP.php';
        require  FCPATH.'vendor/autoload.php';
        $mail = new PHPMailer(true);
        return $mail;
    }
    /* $mail_body ( $frontend_mail_update, $customerReg_condition)*/
    public function mailSend($store_email, $mail_body){
        try{
            /*use mail_load function*/
            $mail = $this->mail_load();
            $mail->SMTPDebug = 0;                     
            $mail->isSMTP();                                         
            $mail->Host       = 'smtp.gmail.com';                  
            $mail->SMTPAuth   = true;                                 
            $mail->Username   = 'pragatishinedezign@gmail.com';                     
            $mail->Password   = 'pragati@123';                            
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;                                   
            //Recipients
            $mail->setFrom('pragatishinedezign@gmail.com', 'Pragati'); //Send mail from 
            $mail->addReplyTo('pragati.thakur@shinedezign.com', 'Pragati');
            $mail->addAddress($store_email); //Send mail to 
            //Content
            $mail->isHTML(true);                                
            $mail->Subject = 'Schedule Call';
            $mail->Body    = $mail_body ;
            
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Mail has been sent successfully';

        }catch (Exception $e) {
            echo "Mail could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        /* 1)account access enable 2)Less secure app access on(google)*/
    }


}