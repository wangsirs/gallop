<?php
$config = array(
	'account/forgetConfirm'=>array(
			array(
					'field'   => 'account', 
					'label'   => 'User name', 
					'rules'   => 'trim|required|min_length[5]|max_length[12]'
				),
			array(
					'field'   => 'email', 
					'label'   => 'E-mail', 
					'rules'   => 'required'
				),
			array(
					'field'   => 'code', 
					'label'   => 'Confirmation code', 
					'rules'   => 'required'
				),
		),
);

?>