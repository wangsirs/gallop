<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Email
 *
 * @author wild
 */
class email_lib {
    
    private $_CI;
    
    public function __construct()
    {
        $this->_CI = &get_instance();
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
