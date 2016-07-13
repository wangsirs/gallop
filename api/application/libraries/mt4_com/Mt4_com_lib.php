<?php

	//+------------------------------------------------------------------+
	//| WebRegistration: Configuration                                   |
	//+------------------------------------------------------------------+
define('T_SOCK_HOST'   , '127.0.0.1'); //Socket server 溝通主機
define('T_SOCK_PORT'   , 5566); //Socket server port
define('T_TIMEOUT', 5);
define('STR_SPLITTER', "|");
define('RETRY_MAX' , 5);

/**
 * MT4 Server API
 *
 * @author martin
 */
class mt4_com_lib {

	/**
	 * 發生異常
	 * Exception occurs
	 */
	const RET_EXCEPTION = -1;
	/**
	 * 成功
	 */
	const RET_SUCCESS = 0;
	/**
	 * 指令錯誤
	 * Common error
	 */
	const RET_ERROR = 2;
	/**
	 * 無效的信息
	 * Invalid information.
	 */
	const RET_INVALID_DATA = 3;
	/**
	 * 伺服器錯誤
	 * Technical errors on the server
	 */
	const RET_TECH_PROBLEM = 4;
	/**
	 * 舊 Terminal 版本
	 * Old terminal version
	 */
	const RET_OLD_VERSION = 5;
	/**
	 * 沒有連線
	 * No connection
	 */
	const RET_NO_CONNECT = 6;
	/**
	 * 沒有足夠的操作權限
	 * Not enough permissions to perform the operation
	 */
	const RET_NOT_ENOUGH_RIGHTS = 7;
	/**
	 * 請求過於頻繁
	 * Too frequent requests
	 */
	const RET_TOO_FREQUENT = 8;
	/**
	 * 無法完成操作
	 * Operation cannot be completed
	 */
	const RET_MALFUNCTION = 9;
	/**
	 * KEY 是必要的
	 * Key generation is required
	 */
	const RET_GENERATE_KEY = 10;
	/**
	 * 使用拓展的權限連接
	 * Connection using extended authentication
	 */
	const RET_SECURITY_SESSION = 11;
	/**
	 *未帶參數給MT4.exe
	 * Insufficient parameters for MT4.exe
	 */
	const NOT_ENOUGH_PARAMS = 12;
	/**
	 *重複帳號ID
	 * Duplicated login ID
	 */
	const LOGIN_ID_EXISTS = 13;
	/**
	 * 餘額不足
	 *  Inssuficient balance when withdrawing
	 */
	const INSUF_BALANCE = 30;
	/**
	 * 更改密碼 - 主密碼
	 */
	const CPW_MAIN = 0;
	/**
	 * 更改密碼 - 唯讀密碼
	 */
	const CPW_READ = 1;
	
	public function __construct()
	{
	}

	/**
	* @author martin
	* @version [1.0.0] [Add user to MT4 server]
	* @todo [Add isEmpty() judgement for each params]
	* @param string group 所屬群組
	* @param string name 名字
	* @param string password 主密碼(MT4登入密碼)
	* @param string read_password 投資密碼(唯讀密碼)
	* @param string email 電子信箱
	* @param string country 國家
	* @param string state 洲
	* @param string city 城市
	* @param string address 地址
	* @param string comment 備註
	* @param string phone 電話
	* @param string phone_password 電話密碼
	* @param string status ??? NR | RE, Not registered, Registered  ex.'RE'
	* @param string zipcode 郵遞區號
	* @param string id 客戶編號
	* @param string leverage 槓桿比例 ex.'100'
	* @param string agent MT4管理人
	* @param string send_reports ?? ex.'1'
	* @param string deposit 入金金額
	* @return array('status'=>$retVal, 'data'=> $data)
	*/
	public function add_user($user){
		try{
			//--- prepare query
			$query='OP=add_mt4_user'.STR_SPLITTER.
			'GROUP='.$user['group'].STR_SPLITTER.
			'NAME='.$user['name'].STR_SPLITTER.
			'PASSWORD='.$user['password'].STR_SPLITTER.
			'READ_PASSWORD='.$user['read_password'].STR_SPLITTER.
			'EMAIL='.$user['email'].STR_SPLITTER.
			'COUNTRY='.$user['country'].STR_SPLITTER.
			'STATE='.$user['state'].STR_SPLITTER.
			'CITY='.$user['city'].STR_SPLITTER.
			'ADDRESS='.$user['address'].STR_SPLITTER.
			'COMMENT='.$user['comment'].STR_SPLITTER.
			'PHONE='.$user['phone'].STR_SPLITTER.
			'PHONE_PASSWORD='.$user['phone_password'].STR_SPLITTER.
			'STATUS='.$user['status'].STR_SPLITTER.
			'ZIPCODE='.$user['zipcode'].STR_SPLITTER.
			'ID='.$user['id'].STR_SPLITTER.
			'LEVERAGE='.$user['leverage'].STR_SPLITTER.
			'AGENT='.$user['agent'].STR_SPLITTER.
			'SEND_REPORTS='.$user['send_reports'].STR_SPLITTER.
			'DEPOSIT='.$user['deposit'];
			//--- send request
			$retVal = $this->MQ_Query($query); 
			return array('status' => intval($retVal), 'data' => null);
		}catch(Exception $e){
			return array('status' => self::RET_EXCEPTION, 'data' => $e->getMessage());
		}
	}

	/**
	* @author martin
	* @version [1.0.0] [check login id exists or not]
	* @todo [Add isEmpty() judgement for each params]
	* @param string id 客戶編號
	* @return array('status'=>$retVal, 'data'=> $data)
	*/	
	public function check_id_exists($id){
		try{
			$query='OP='.__FUNCTION__.STR_SPLITTER.
			'ID='.$id;
			$retVal = $this->MQ_Query($query);
			return array('status' => intval($retVal), 'data' => null);
		}catch(Exception $e){
			return array('status' => self::RET_EXCEPTION, 'data' => $e->getMessage());
		}
	}

	/**
	* @author martin
	* @version [1.0.0] [client funding operation]
	* @todo [Add isEmpty() judgement for each params]
	* @param string id 客戶編號
	* @param string amount 金額
	* @return array('status'=>$retVal, 'data'=> $data)
	*/	
	public function client_funding($id, $amount){
		try{
			$query='OP='.__FUNCTION__.STR_SPLITTER.
			'ID='.$id.STR_SPLITTER.
			'AMOUNT='.$amount;
			$retVal = $this->MQ_Query($query);
			return array('status' => intval($retVal), 'data' => null);
		}catch(Exception $e){
			return array('status' => self::RET_EXCEPTION, 'data' => $e->getMessage());
		}
	}

	/**
	* @author martin
	* @version [1.0.0] [client withdraw operation]
	* @todo [Add isEmpty() judgement for each params]
	* @param string id 客戶編號
	* @param string amount 金額 (正數)
	* @return array('status'=>$retVal, 'data'=> $data)
	* @return   [status = 30時，代表餘額不足]
	*/	
	public function client_withdraw($id, $amount){
		//調整成負數!!!
		$amount = -$amount;
		
		try{
			$query='OP='.__FUNCTION__.STR_SPLITTER.
			'ID='.$id.STR_SPLITTER.
			'AMOUNT='.$amount;
			$retVal = $this->MQ_Query($query);
			return array('status' => intval($retVal), 'data' => null);
		}catch(Exception $e){
			return array('status' => self::RET_EXCEPTION, 'data' => $e->getMessage());
		}
	}

	/**
	* @author martin
	* @version [1.0.0] [取得客戶當前餘額]
	* @param string id 客戶編號
	* @return array('status'=>$retVal, 'data'=> $data)
	*/	
	public function get_client_asset($id){       
		try{
			$query='OP='.__FUNCTION__.STR_SPLITTER.
			'ID='.$id;
			$retVal = $this->MQ_Query($query);
			if(intval($retVal) === self::RET_EXCEPTION){
				$retVal = 0;
			}
			return array('status' => 0, 'data' => $retVal);
		}catch(Exception $e){
			return array('status' => self::RET_EXCEPTION, 'data' => $e->getMessage());
		}
	}

	/**
	* @author martin
	* @version [1.0.0] [Get client trade history record]
	* @param string id 客戶編號
	* @param string from 查詢起始時間戳記 (如為null, 則預設unix timestamp = 0)
	* @param string to 查詢結束時間戳記 (如為null, 則預設unix timestamp = current time)
	* @return array('status'=>$retVal, 'data'=> $data)
	* @return order 流水編號
	* @return cmd 買賣指令
	* @return symbol 商品別名稱
	* @return volume 手數
	* @return open_price 進場價格
	* @return open_time 進場時間戳記
	* @return close_price 出場價格
	* @return close_time 出場時間戳記
	* @return profit 總獲利
	*/
	public function get_client_trade_history($id, $from = NULL, $to = NULL){
		try{
			if($from === NULL){
				$from = 0;
			}
			if($to === NULL){
				$to = time() + 86400;
			}

			$query='OP='.__FUNCTION__.STR_SPLITTER.
			'ID='.$id.STR_SPLITTER.
			'FROM='.$from.STR_SPLITTER.
			'TO='.$to;
			$query_result = $this->MQ_Query($query);

			$retVal = array();
			foreach(explode("\r\n", $query_result) as $key => $val){
				if(strlen($val) === 0) continue;
				$data = array();
				foreach(explode(',', $val) as $key2 => $val2){
					switch ($key2) {
						case 0:
							$data['order'] = $val2;
							break;
						case 1:
							$data['cmd'] = $val2;
							break;
						case 2:
							$data['symbol'] = $val2;
							break;
						case 3:
							$data['volume'] = $val2;
							break;
						case 4:
							$data['open_price'] = $val2;
							break;
						case 5:
							$data['open_time'] = $val2;
							break;
						case 6:
							$data['close_price'] = $val2;
							break;
						case 7:
							$data['close_time'] = $val2;
							break;
						case 8:
							$data['comment'] = iconv("Big-5", "UTF-8",$val2);
							break;
						case 9:
							$data['profit'] = $val2;
							break;
						default:
							# do nothing
							break;
					}
				}
				array_push($retVal, $data);
			}
			return array('status' => 0, 'data' => $retVal);
		}catch(Exception $e){
			return array('status' => self::RET_EXCEPTION, 'data' => $e->getMessage());
		}
	}

	/**
	* @author martin
	* @version [1.0.0] [Get client deposit and withdraw history record]
	* @param string id 客戶編號
	* @param string from 查詢起始時間戳記 (如為null, 則預設unix timestamp = 0)
	* @param string to 查詢結束時間戳記 (如為null, 則預設unix timestamp = current time)
	* @return array('status'=>$retVal, 'data'=> $data)
	* @return order 流水編號
	* @return timestamp 出入金之時間戳記
	* @return comment 註記
	* @return amount 出入金金額
	*/	
	public function get_access_payment($id, $from = NULL, $to = NULL){ 
		try{
			if($from === NULL){
				$from = 0;
			}
			if($to === NULL){
				$to = time() + 86400;
			}

			$query='OP='.__FUNCTION__.STR_SPLITTER.
			'ID='.$id.STR_SPLITTER.
			'FROM='.$from.STR_SPLITTER.
			'TO='.$to;
			$query_result = $this->MQ_Query($query);
			$retVal = array();

			foreach(explode("\r\n", $query_result) as $key => $val){
				if(strlen($val) === 0) continue;
				$data = array();
				foreach(explode(',', $val) as $key2 => $val2){
					switch ($key2) {
						case 0:
							$data['order'] = $val2;
							break;
						case 1:
							$data['timestamp'] = $val2;
							break;
						case 2:
							$data['comment'] = $val2;
							break;
						case 3:
							$data['amount'] = $val2;
							break;
						default:
							# do nothing
							break;
					}
				}
				array_push($retVal, $data);
			}
			return array('status' => 0, 'data' => $retVal);
		}catch(Exception $e){
			return array('status' => self::RET_EXCEPTION, 'data' => $e->getMessage());
		}
	}

	/**
	* @author martin
	* @version [1.0.0] [change password for specific user]
	* @todo nothing
	* @param string $id 客戶編號
	* @param string $type 類型，主密碼=0|CPW_MAIN, 投資密碼=1|CPW_READ
	* @param string $passwrd 密碼
	* @return array ('status'=>$retVal, 'data'=> $data)
	*/	
	public function change_pw($id, $type, $passwd){
		try{
			$query='OP='.__FUNCTION__.STR_SPLITTER.
			'ID='.$id.STR_SPLITTER.
			'TYPE='.$type.STR_SPLITTER.
			'PASSWD='.$passwd;
			$retVal = $this->MQ_Query($query);
			return array('status' => intval($retVal), 'data' => null);
		}catch(Exception $e){
			return array('status' => self::RET_EXCEPTION, 'data' => $e->getMessage());
		}
	}

	/**
	* @author martin
	* @version [1.0.0] [Get all the symbol information]
	* @todo nothing
	* @return array ('status'=>$retVal, 'data'=> $data)
	* @return symbol 商品名稱
	* @return sec_group 商品類別
	* @return symbol_id 商品ID
	*/		
	public function get_all_symbols(){
		try{
			$query='OP='.__FUNCTION__;
			$query_result = $this->MQ_Query($query);
			$retVal = array();

			foreach(explode("\r\n", $query_result) as $key => $val){
				if(strlen($val) === 0) continue;
				$data = array();
				foreach(explode(',', $val) as $key2 => $val2){
					switch ($key2) {
						case 0:
							$data['symbol'] = $val2;
							break;
						case 1:
							$data['sec_group'] = $val2;
							break;
						case 2:
							$data['symbol_id'] = $val2;
							break;
						default:
							# do nothing
							break;
					}
				}
				array_push($retVal, $data);
			}
			return array('status' => 0, 'data' => $retVal);
		}catch(Exception $e){
			return array('status' => self::RET_EXCEPTION, 'data' => $e->getMessage());
		}
	}

	/**
	* @author martin
	* @version [1.0.0] [start to query using socket connection, notice that this function call should be protected]
	* @todo [Add isEmpty() judgement for each params]
	* @todo  目前只支援繁中，後期需支援多國語系 (至少需支援簡中)
	* @param string query 請求字串
	* @return trimed string from local server
	*/
	protected function MQ_Query($query){
		$ret = '';
		$query = iconv("UTF-8", "Big-5", $query);
		for($i = 0; $i < RETRY_MAX; $i++){
			$ret = '';
			$ptr=@fsockopen(T_SOCK_HOST,T_SOCK_PORT,$errno,$errstr,T_TIMEOUT);
			if($ptr){
				//Socket Streaming需設timeout值，當resp過久沒回應擇直接fail
				stream_set_blocking($ptr, TRUE);
				stream_set_timeout($ptr, T_TIMEOUT);
				$info = stream_get_meta_data($ptr);
				if(fputs($ptr,$query)!=FALSE){
					while(!feof($ptr) && (! $info['timed_out'])) {
						if(($line=fgets($ptr,128))=="end\r\n"){
							break; 
						}
						$ret .= $line;
						$info = stream_get_meta_data($ptr);
					} 
					fclose($ptr);	
				}
			}else{
				$ret = self::RET_EXCEPTION;
			}
			
			if(intval(trim($ret)) == 6 || 
				intval(trim($ret)) == -1 || 
				$info['timed_out']){
				continue;
			}else{
				break;
			}
		}
		return trim($ret);
	}
}

?>
