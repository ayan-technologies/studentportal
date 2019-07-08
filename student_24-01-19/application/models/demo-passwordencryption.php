<?php 
//http://admin.vehiclevisuals.lcl/common/library/cipher/demo.php
include_once 'cipher-commonfunctions.php';
$key = '1q2w3e';
$text = '192.168.2.6';
echo $text. '<br/>';
$encryptText = Encrypt::GetEncryptValueForURLParameter($text, $key);
echo $encryptText. '<br/>';

$decryptText = Encrypt::GetDecryptValueForURLParameter($encryptText, $key);
echo $decryptText. '<br/>';




?>