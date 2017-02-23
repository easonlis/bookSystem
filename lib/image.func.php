<?php 
/* 验证码，图像函数 */
require_once 'string.func.php';
/**通过GD库做验证码
 * @param 验证码类型 $type
 * @param 验证码长度 $length
 * @param 黑点个数 $pxiel
 * @param 直线条数 $line
 * @param 验证码的session存储空间 $sess_name
 */
function verifyImage($type = 1,$length = 4,$pxiel = 0,$line = 0,$sess_name = "verify") {
    session_start();
//     1.创建画布
    $width = 80;
    $height = 28;
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
//     用填充矩阵填充画布
    imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);
//     2.将每一位验证码，随机放置在画布
    $chars = buildRandomString($type, $length);  
    $_SESSION[$sess_name] = $chars;
    $fontfiles = array(
        'CURLZ__.TTF',
        'FREESCPT.TTF',
        'ITCKRIST.TTF'
    );
    for ($i = 0; $i < $length; $i ++) {
        $size = mt_rand(14, 18);//随机大小
        $angle = mt_rand(- 15, 15);//随意角度
        $x = 5 + $i * $size;//x轴
        $y = mt_rand(20, 26);//y轴
        $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
        $font = "../fonts/" . $fontfiles[2];
        $text = substr($chars, $i, 1);
        imagettftext($image, $size, $angle, $x, $y, $color, $font, $text);
    }   
//     3.绘制干扰黑点
    if ($pxiel) {
        for ($i = 0; $i < $pxiel; $i ++) {
            imagesetpixel($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), $black);
        }
    }  
//     4.绘制干扰直线
    if ($line) {
        for ($i = 0; $i < $line; $i ++) {
            $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
            imageline($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), mt_rand(0, $width - 1), mt_rand(0, $height - 1), $color);
        }
    }
    header("content-type:image/gif");
    imagegif($image);//输出图像到浏览器
    imagedestroy($image);//释放与 image 关联的内存
}
verifyImage(1,4,10,4);
