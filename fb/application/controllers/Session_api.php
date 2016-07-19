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
        $stk = $this->post('user');
        
//		$stk = $this->aesDecrypt($stk);
        
        $stk = base64_decode($stk);
        
        $num = $this->session_model->add($stk);
        
        $this->set_response('OK='.$stk, REST_Controller::HTTP_OK);
    }
	
    public function test_db_post(){
        $data = $this->post();
        
        $num = $this->session_model->add(json_encode($data));
        
        $this->set_response('insert='.$num, REST_Controller::HTTP_OK);
    }
    
	/**
	 * AES 解密
	 */
	public function aesDecrypt($encryptedData) {
        $cipher = MCRYPT_RIJNDAEL_128;
        $mode = MCRYPT_MODE_CBC;
        $key = "chocolatechocola";
        $iv  = "1234567890123457";  // 密鑰
        $initializationVectorSize = mcrypt_get_iv_size($cipher, $mode);

        $data =  mcrypt_decrypt(
            $cipher,
            $key,
            base64_decode($encryptedData),
            $mode,
            $iv
        );
		$pad = ord($data[strlen($data) - 1]);
        return substr($data, 0, -$pad);
    }
}
