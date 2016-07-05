<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 天
 */
class Captcha_lib
{   

    
	function __construct()
	{        
	}
    
    /**
     * 取得驗證碼
     */
    public function captcha_gen()
    {
        $img_height = 46;  // 圖形高度
        $img_width = 80;   // 圖形寬度
        $mass = 130;        // 雜點的數量，數字愈大愈不容易辨識

        $num='';              // rand後所存的地方
        $num_max = 4;      // 產生6個驗證碼
        for( $i=0; $i<$num_max; $i++ )
        {
            $num .= rand(0,9);
        }

        // 創造圖片，定義圖形和文字顏色
        Header("Content-type: image/PNG");
        srand((double)microtime()*1000000);
        $im = imagecreate($img_width,$img_height);
        $ranClr = ImageColorAllocate($im, rand(0, 127),rand(0, 127),rand(0, 127)); 
        $gray = ImageColorAllocate($im, rand(128, 255),rand(128, 255),rand(128, 255)); // (200,200,200)背景是灰色
        imagefill($im,0,0,$gray); 

        // 在圖形產上黑點，起干擾作用;
        for( $i=0; $i<$mass; $i++ )
        {
            imagesetpixel($im, rand(0,$img_width), rand(0,$img_height), $ranClr);
        }

        // 將數字隨機顯示在圖形上,文字的位置都按一定波動範圍隨機生成
        $strx = rand(10,18);
        for( $i=0; $i<$num_max; $i++ )
        {
            $strpos=rand(12,20);
            imagestring($im,5,$strx,$strpos, substr($num,$i,1), ImageColorAllocate($im, rand(0, 127),rand(0, 127),rand(0, 127)));
            $strx+=rand(10,18);
        }
        ImagePNG($im);
        ImageDestroy($im);  
        return $num;
    }
}