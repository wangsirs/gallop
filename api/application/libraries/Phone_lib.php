<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of phone
 */
class phone_lib {
    
    private $_CI;
    
    private $_isp = 'twilio';
    
    const ISP_TWILIO = 'twilio';


    public function __construct()
    {
        $this->_CI = &get_instance();
    }
    
    /**
     * 變更系統商
     * @param string $isp 系統商
     */
    public function change_isp($isp){
        $this->_isp = $isp;
    }
    
    /**
     * 發送簡訊
     * @param string $to 目標電話(國碼不含+) 8861235465433
     * @param string $msg 訊息 hello world
     * @param type $from 來源電話(國碼不含+)(非必要) 8861235465433
     * @return boolean 
     */
    public function sms($to, $msg, $from = ''){
        $func_name = '_'.$this->_isp.'_sms';
        if( ! method_exists($this, $func_name)){
            die('isp not exist:'.$this->_isp);
        }
        return $this->{$func_name}($to, $msg, $from);
    }
    
    /**
     * 發送簡訊 (twilio)
     */
    public function _twilio_sms($to, $msg, $from = ''){
        require(APPPATH.'/libraries/twilio-php/Services/Twilio.php');

        $sid = 'ACdc69e79c97862d4f55a069ec215ad54c';
        //$sid = "SK38c52939e93ae43f6389fbf54e83b716"; // Your Account SID from www.twilio.com/user/account
        $token = "4bb05604771bd3271d5d0b034f95cc13"; // Your Auth Token from www.twilio.com/user/account

        $client = new Services_Twilio($sid, $token);
        $message = $client->account->messages->sendMessage(
          empty($from) ? '+61481072375' : $from, // From a valid Twilio number
          '+'.$to, // Text this number
          '+'.$msg
        );
//        echo '<pre>';
//        var_dump($message);
//        echo '</pre>';
//        exit();
        return TRUE;
    }
    
    /**
     * 發送 email
     * @param string $to 發送到
     * @param string $subject 標題
     * @param string $content 內容
     * @param boolean $debug Debug模式
     * @return boolean 發送結果
     */
    public function send($to, $subject, $content, $debug = FALSE){
        
        $this->_CI->load->library('email');
//        $this->_CI->email->set_newline("\r\n");

        $com_mail = $this->_CI->config->item('company_email');
        $com_mail_name = $this->_CI->config->item('company_email_name');
        $this->_CI->email->from($com_mail, $com_mail_name);
        $this->_CI->email->to($to);
        
        $this->_CI->email->subject($subject);
        $this->_CI->email->message($content);

        $re = $this->_CI->email->send();
        
        if($debug){
            echo $this->_CI->email->print_debugger();
        }
        
        return $re;
    }
}
