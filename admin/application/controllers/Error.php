<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 故障
*/
class error extends CI_Controller {
    
	/**
	* 建構子，優先執行
	*/
	public function __construct()
	{
        parent::__construct();
        redirect(base_url());
	}
}
