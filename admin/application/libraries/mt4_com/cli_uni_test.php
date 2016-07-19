<?php 
require_once('Mt4_com_lib.php');
if(count($argv) >= 2){
	$mt4Obj = new mt4_com_lib();
	if($argv[1] == "add_user"){
		$userObj = array(
			'group' => 'All-Hedge',
			'name'=>'哈哈哈哈哈金靠北',
			'password'=>'asdaAsd',
			'investor'=>'asdaAsd1',
			'email'=>'aaaa@gmail.com',
			'country'=>'Taiwan',
			'state'=>'Taiwan',
			'city'=>'Taiwan',
			'address'=>'aaa bbb ccc',
			'comment'=>'',
			'phone'=>'0972531400',
			'phone_password'=>'asdaAsd33',
			'status'=>'',
			'zipcode'=>'1111',
			'id'=>'88881113',
			'leverage'=>'100',
			'agent'=>'',
			'send_reports'=>'1',
			'deposit'=>'0',
			'REMOTE_ADDR'=>'178.88.88.88',
			);
		var_dump($mt4Obj->add_user($userObj));
	}
}
?>
