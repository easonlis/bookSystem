<?php 
/**创建任意类型的验证码
 * @param 验证码类型 $type
 * @param 验证码长度 $length
 * @return string
 * range — 建立一个包含指定范围单元的数组 
 * array_merge()  将一个或多个数组的单元合并起来，一个数组中的值附加在前一个数组的后面。
 * str_shuffle — 随机打乱一个字符串 
 */
function buildRandomString($type,$length) {
    if ($type == 1) {
        $chars = join("", range(0, 9));
    } elseif ($type == 2) {
        $chars = join("", array_merge(range("a", "z"), range("A", "Z")));
    } elseif ($type == 3) {
        $chars = join("", array_merge(range("A", "Z"), range("a", "z"), range(0, 9)));
    }
    if ($length > strlen($chars)) {
        exit('验证码长度不够');
    }
    $chars = str_shuffle($chars);
    return substr($chars, 0, $length);
}
