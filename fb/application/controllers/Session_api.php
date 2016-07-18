<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * Session API
 */
class Session_api extends REST_Controller {

    function __construct(){
        parent::__construct();

        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['info_get']['limit'] = 1; // 500 requests per hour per user/key
        
        $this->load->model('session_model');        
    }
    
    /**
     * IB登入驗證
     */
    public function chk_post(){
        $type = $this->post('type');
        $stk = $this->post('stk');
        
		$stk = $this->fnDecrypt($stk, '12345678');
		
		$this->session_model->add($stk);
		
        $this->set_response('OK', REST_Controller::HTTP_OK);
    }
	
	public function fnDecrypt($sValue, $sSecretKey)
	{
		return rtrim(
			mcrypt_decrypt(
				MCRYPT_RIJNDAEL_256, 
				$sSecretKey, 
				base64_decode($sValue), 
				MCRYPT_MODE_ECB,
				mcrypt_create_iv(
					mcrypt_get_iv_size(
						MCRYPT_RIJNDAEL_256,
						MCRYPT_MODE_ECB
					), 
					MCRYPT_RAND
				)
			), "\0"
		);
	}
}
