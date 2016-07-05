<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*  匯出資料
 */
class Export_lib
{
    function __construct()
    {
        $CI =& get_instance();
        $CI->load->helper('file');
        $CI->load->helper('download');
    }

    /**
     * 匯出CSV檔案
     */
    public function export_csv($data, $filename = '' , $title = array())
    {
        if(strlen($filename) == 0){
            $filename = date('Ymd_Hi', time()).'.csv';
        }
        header('Content-Type: text/csv;charset=utf-8');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header("Pragma: no-cache");
        header("Expires: 0");

        $handle = fopen('php://output', 'w');
        //此為寫入BOM標籤，目的在使Excel能正確讀取UTF-8編碼
        fwrite($handle, "\xEF\xBB\xBF");

        foreach ($data as $key => $val) {
            if($key === 0){
                if(empty($title)){
                    fputcsv($handle, array_keys($val));
                }else{
                    fputcsv($handle, $title);
                }
            }
            fputcsv($handle, $val);
        }

        fclose($handle);
        exit();
    }
}
