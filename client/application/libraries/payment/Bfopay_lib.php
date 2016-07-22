<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 天
 */
class Bfopay_lib
{   

    
	function __construct()
	{        
		$CI =& get_instance();
	}

	public function create_payment($amount, $uid){
		$PayID = '';
		$MemberID = MEMBER_ID;//商户号
		$TransID = date('mdHis').$uid;//流水号
		$TradeDate = date("YmdHis");//交易时间
		$OrderMoney = $amount*100;//订单金额
		$ProductName = PROD_NAME;//产品名称
		$Amount = 1;//商品数量
		$Username = $uid;//支付用户名
		$AdditionalInfo = '';//订单附加消息
		$PageUrl = MT4_RET_URL;//通知商户页面端地址
		$ReturnUrl = MT4_RET_URL;//服务器底层通知地址
		$NoticeType = 1;//通知类型	
		$Md5key = MD5KEY;//md5密钥（KEY）
		$MARK = BFU_MARK;
		//MD5签名格式
		$Signature=md5($MemberID.$MARK.$PayID.$MARK.$TradeDate.$MARK.$TransID.$MARK.$OrderMoney.$MARK.$PageUrl.$MARK.$ReturnUrl.$MARK.$NoticeType.$MARK.$Md5key);
		$payUrl = PAYURL;//借贷混合
		$TerminalID = TERM_ID; 
		$InterfaceVersion = BFU_VER;
		$KeyType = KEY_TYPE;
		$post_arrays = array('MemberID' => $MemberID,
			'TerminalID' => $TerminalID,
			'PayID' => '',
			'InterfaceVersion' => $InterfaceVersion,
			'KeyType' => $KeyType,
			'TradeDate' => $TradeDate,
			'TransID' => $TransID,
			'OrderMoney' => $OrderMoney,
			'ProductName' => $ProductName,
			'Amount' => $Amount,
			'Username' => $Username,
			'AdditionalInfo' => $AdditionalInfo,
			'PageUrl' => $PageUrl,
			'ReturnUrl' => $ReturnUrl,
			'Signature' => $Signature,
			'NoticeType' => $NoticeType,
			'payUrl' => $payUrl,
		);
		return $post_arrays;
	}
}

?>