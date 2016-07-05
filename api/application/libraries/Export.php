<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Export
 * 
 * log 處理與 controller 回傳處理<br/>
 * OK 100 , 100 ~ 199<br/>
 * input error 200 , 200 ~ 299<br/>
 * process error 300 , 300 ~ 399<br/>
 * output error 400 , 400 ~ 499<br/>
 * auth error 500 , 500 ~ 599<br/>
 * exception error 999
 * 
 * @package     igarden API
 * @subpackage  Libraries
 * @category    Export
 */
class Export {
    
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    
    // --------------------------------------------------------------------
    
    /**
     * _Echo_JSON
     * 
     * Echo JSON & 中斷程式
     * 
     * @access private
     * @param array $output Description
     * @return void Description
     */
    private static function _echo_json($output = array())
    {
        //header('Content-Type: text/json; charset=utf-8');
        die(json_encode($output));
    }
    
    // --------------------------------------------------------------------
    
    /**
     * _Result
     * 
     * 處理回傳
     * 
     * @access private
     * @param string $from Public function name
     * @param string $class Class name
     * @param string $function Function name
     * @param int $code Completed status code ( VIEW：狀態代碼；API：完整狀態代碼 )
     * @param string $msg Status message ( 狀態訊息 )
     * @param array $param_arr Description
     * @param string $url URL
     * @return void Description
     */
    private static function _result($from, $class, $function, $code, $msg, $param_arr = array(), $url = '')
    {
        // 先記錄 data_log
        self::_post_log($from, $class, $function, $param_arr);
        
        // 再記錄 status_log
        self::_exec_log($from, $class, $function, $code, $msg, $url);
    }
    
    // --------------------------------------------------------------------
    
    /**
     * _Get_completed_code
     * 
     * 取得完整狀態代碼
     * 
     * @access private
     * @param string $class Class name
     * @param string $function Function name
     * @param int $code Status code ( 狀態代碼 )
     * @return string Completed status code ( 完整狀態代碼 )
     */
    private static function _get_completed_code($class, $function, $code)
    {
        $completed_code = '';
        
        $list = get_instance()->config->item(strtolower($class));//讀取 config/controller/xxx_code.php 檔案
        
        $class_code = empty($list['Controller']) ? '000' : $list['Controller'];
        $function_code = empty($list['Method'][$function]) ? '000' : $list['Method'][$function];
        $code = empty($code) ? '000' : $code;
        
        $completed_code = SYS_ID . $class_code . $function_code . $code;
        
        return $completed_code;
    }
    
    // --------------------------------------------------------------------
    
    /**
     * _Log
     * 
     * 寫入log
     * 
     * @access private
     * @param string $title Description
     * @param string $content Description
     * @return boolean TRUE
     */
    private static function _log($title, $content)
    {
        if(empty($title))
        {
            $title = __CLASS__ . '->' . __Function__;
            
            if (empty($content))
            {
                $content = 'Can not log without class_name';
            }
        }
        
        $title = strtoupper($title);
        
        openlog($title, LOG_PID | LOG_PERROR, LOG_LOCAL1);
        syslog(LOG_WARNING, $content);
        closelog();
        
        return TRUE;
    }
    
    // --------------------------------------------------------------------
    
    /**
     * POST_log
     * 
     * 僅供紀錄 POST Data ( 每個 http request 僅在 controller->Function() 的一開始，呼叫此函式一次 )
     * 
     * @access public
     * @param string $class Class name
     * @param string $function Function name
     * @param array $param_arr Data array ( 欲記錄、檢查的變數陣列 )
     * @example path $this->export->post_log(__CLASS__, __FUNCTION__, array());
     * @return void 不回傳任何資訊、不中斷任何處理
     */
    public static function post_log($class, $function, $param_arr = array())
    {
        self::_post_log(__FUNCTION__, $class, $function, $param_arr);
    }
    
    // --------------------------------------------------------------------
    
    /**
     * _POST_log
     * 
     * 僅供紀錄 POST Data ( 每個 http request 僅在 controller->Function() 的一開始，呼叫此函式一次 )
     * 
     * @access private
     * @param string $from Public function name
     * @param string $class Class name
     * @param string $function Function name
     * @param array $param_arr Data array ( 欲記錄、檢查的變數陣列 )
     * @example path $this->export->post_log(__CLASS__, __FUNCTION__, array());
     * @return void 不回傳任何資訊、不中斷任何處理
     */
    private static function _post_log($from, $class, $function, $param_arr = array())
    {
        $class = empty($class) ? __CLASS__ : $class;
        $function = empty($function) ? __FUNCTION__ : $function;
        
        $title = $class . '->' . $function;
        //$content = '[' . strtoupper($from) . '::POST][DATA] ' . print_r($param_arr, TRUE);
        $content = '[' . strtoupper($from) . '::POST][DATA] ' . json_encode($param_arr, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        
        self::_log($title, $content);
    }
    
    // --------------------------------------------------------------------
    
    /**
     * _Exec_log
     * 
     * 內部用：僅供紀錄 Execute 結果
     * 
     * @access private
     * @param string $from Public function name
     * @param string $class Class name
     * @param string $function Function name
     * @param int $code Completed status code ( 完整狀態代碼 )
     * @param string $msg Status message ( 狀態訊息 )
     * @param string $url URL
     * @return void 不回傳任何資訊、不中斷任何處理
     */
    private static function _exec_log($from, $class, $function, $code, $msg, $url)
    {
        $msg = empty($msg) ? 'null' : $msg;
        
        $class = empty($class) ? __CLASS__ : $class;
        $function = empty($function) ? __FUNCTION__ : $function;
        
        $url = empty($url) ? 'null' : $url;
        
        $title = $class . '->' . $function;
        $content = '[' . strtoupper($from) . '::EXECUTE][CODE] ' . $code . ' - [MSG] ' . $msg . ' - [URL] ' . $url;
        //$content = '[EXECUTE][CLASS] ' . $class . ' - [FUNCTION] ' . $function . ' - [CODE] ' . $status_code . ' - [MSG] ' . $msg . ' - [DATA] ' . print_r($list, TRUE);
        
        self::_log($title, $content);
    }
    
    // --------------------------------------------------------------------
    
    /**
     * Debug_log
     * 
     * 除錯專用 log，不會中斷程式執行 ( 正式環境不執行 )
     * 
     * @access public
     * @param string $class Class name
     * @param string $function Function name
     * @param string $note log ( 用途：除錯說明 )
     * @param array $param_arr ( 欲記錄、檢查的變數陣列 )
     * @return void Description
     */
    public static function debug_log($class, $function, $note = "", $param_arr = array())
    {
        $switch_list = get_instance()->config->item('switch');
        $debug_mod = $switch_list['debug_mod'];
        
        if (IS_ONLINE === TRUE && $debug_mod === FALSE)
        {
            $switch = FALSE;
        }
        else
        {
            $switch = TRUE;
        }
        
        if($switch === TRUE)
        {
            $class = empty($class) ? __CLASS__ : $class;
            $function = empty($function) ? __FUNCTION__ : $function;
            
            $title = $class . '->' . $function;
            //$content = '[DEBUG][NOTE] ' . $note . ' - [DATA] ' . print_r($param_arr, TRUE);
            $content = '[DEBUG][NOTE] ' . $note . ' - [DATA] ' . json_encode($param_arr, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);

            self::_log($title, $content);
        }
    }
    
    // --------------------------------------------------------------------
    
    /**
     * Log
     * 
     * 紀錄專用 log，不會中斷程式執行
     * 
     * @access public
     * @param string $class Class name
     * @param string $function Function name
     * @param string $note log ( 用途：除錯說明 )
     * @param array $param_arr ( 欲記錄、檢查的變數陣列 )
     * @return void Description
     */
    public static function log($class, $function, $note = "", $param_arr = array())
    {
        $switch_list = get_instance()->config->item('switch');
        $debug_mod = $switch_list['debug_mod'];
        
        $class = empty($class) ? __CLASS__ : $class;
        $function = empty($function) ? __FUNCTION__ : $function;
        
        $title = $class . '->' . $function;
        //$content = '[DEBUG][NOTE] ' . $note . ' - [DATA] ' . print_r($param_arr, TRUE);
        $content = '[DEBUG][NOTE] ' . $note . ' - [DATA] ' . json_encode($param_arr, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        
        self::_log($title, $content);
    }
    
    // --------------------------------------------------------------------
    
    /**
     * (未定義使用時機)Interrupt_log
     * 
     * 除錯專用 log，會中斷程式執行 ( 正式環境不執行 )
     * 
     * @access public
     * @param string $class Class name
     * @param string $function Function name
     * @param string $note log ( 用途：除錯說明 )
     * @param array $param_arr ( 欲記錄、檢查的變數陣列 )
     * @return void Description
     */
    public static function interrupt_log($class, $function, $note, $param_arr = array())
    {
        if(IS_ONLINE === FALSE)
        {
            $class = empty($class) ? __CLASS__ : $class;
            $function = empty($function) ? __FUNCTION__ : $function;

            $title = $class . '->' . $function;
            //$content = '[INTERRUPT][NOTE] ' . $note . ' - [DATA] ' . print_r($param_arr, TRUE);
            $content = '[INTERRUPT][NOTE] ' . $note . ' - [DATA] ' . json_encode($param_arr, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);

            self::_log($title, $content);

            die($title . ' - ' . $content);
        }
    }
    
    // --------------------------------------------------------------------
    
    /**
     * API_result
     * 
     * 記錄 API 處理結果 & 回傳
     * 
     * @access public
     * @param string $class Class name
     * @param string $function Function name
     * @param int $code Status code ( 狀態代碼 )
     * @param string $msg Status message ( 狀態訊息 )
     * @param array $param_arr Description
     * @return void Description
     */
    public static function api_result($class, $function, $code, $msg, $param_arr = array())
    {
        $completed_code = self::_get_completed_code($class, $function, $code);
        
        self::_result(__FUNCTION__, $class, $function, $completed_code, $msg, $param_arr);
        
        // 最後輸出 json_encode string
        $output['status'] = ($code == '100') ? TRUE : FALSE;
        $output['code'] = $completed_code;
        $output['msg'] = $msg;
        $output['data'] = $param_arr;
        
        if ( ! is_array($param_arr))
        {
            $tmp_msg = '$param_arr 必須是 array';
            self::debug_log(__CLASS__, __FUNCTION__, $tmp_msg, $param_arr);
            
            $output['status'] = FALSE;
            $output['code'] = '000';
            $output['msg'] = $tmp_msg;
            $output['data'] = NULL;
        }
        
        self::_echo_json($output);
    }
    
    // --------------------------------------------------------------------
    
    /**
     * Ajax_result
     * 
     * 紀錄 AJAX 處理結果 & 回傳
     * 
     * @access public
     * @param string $class Class name
     * @param string $function Function name
     * @param int $code Status code ( 狀態代碼 )
     * @param string $msg Status message ( 狀態訊息 )
     * @param array $param_arr Description
     * @return void 直接 echo json_encode string，並中斷程式執行
     */
    public static function ajax_result($class, $function, $code, $msg, $param_arr = array())
    {
        self::_result(__FUNCTION__, $class, $function, $code, $msg, $param_arr);
        
        // 最後輸出 json_encode string
        $output['status'] = ($code == '100') ? TRUE : FALSE;
        $output['msg'] = $msg; // 未來可能要做多語化處理，方便 JavaScript 直接 alert()
        $output['data'] = $param_arr;
        
        if ( ! is_null($param_arr) && ! is_array($param_arr))
        {
            $tmp_msg = '$param_arr 必須是 array';
            self::debug_log(__CLASS__, __FUNCTION__, $tmp_msg, $param_arr);
            
            $output['status'] = FALSE;
            $output['code'] = '000';
            $output['msg'] = '';
            $output['data'] = NULL;
        }
        
        self::_echo_json($output);
    }
    
    // --------------------------------------------------------------------
    
    /**
     * Curl_log
     * 
     * VIEW & API 端紀錄 API 回傳的呼叫結果
     * 
     * @access public
     * @param string $class Class name
     * @param string $function Function name
     * @param int $code Status code
     * @param string $msg Status message
     * @param array $param_arr Description
     * @param string $url URL
     * @return void 不回傳任何資訊、不中斷任何處理
     */
    public static function curl_log($class, $function, $url, $code, $msg, $param_arr = array())
    {
        self::_result(__FUNCTION__, $class, $function, $code, $msg, $param_arr, $url);
    }
    
    // --------------------------------------------------------------------
    
}

/* End of file Export.php */
/* Location: ./application/libraries/Export.php */