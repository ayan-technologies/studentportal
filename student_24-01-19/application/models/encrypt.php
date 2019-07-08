<?php
define('URL_Original_Characters','+/=');
define('URL_Replace_Characters', '-_~');
define('ENCRYPT_KEY' , '1q2w3e'); 

Class Encrypt extends CI_Model {

	//Get the encrypted value for passed encrypted $text.
	static function GetEncryptValue($text, $key ) {
		if($key == "") {
			$key = ENCRYPT_KEY;
		}
		return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
	}

	//Get the decrypted value for passed encrypted $text.
	static function GetDecryptValue($text, $key ) {
		if($key == "") {
			$key = ENCRYPT_KEY;
		}
		return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
	}

	//Get the URL parameters decrypted after translation.
	static function GetDecryptValueForURLParameter($parameter, $key='') {

		$returnval = '';
		if($key == "") {
		    $key = ENCRYPT_KEY."\0\0\0\0\0\0\0\0\0\0";
		}
		if($parameter != ''){
			$translatedParameter = strtr($parameter, URL_Replace_Characters, URL_Original_Characters);
			$decryptValue = self::GetDecryptValue($translatedParameter, $key);
			$returnval = $decryptValue;
		}
		return $returnval;

	}

	//Get the URL parameters encrypted before translation.
	static function GetEncryptValueForURLParameter($parameter, $key='') {

		$returnval = '';
		if($key == "") {
		    $key = ENCRYPT_KEY."\0\0\0\0\0\0\0\0\0\0";
		}
		if($parameter != ''){
			$parameter = self::GetEncryptValue($parameter, $key);
			$translatedParameter = strtr($parameter, URL_Original_Characters, URL_Replace_Characters);
			$returnval = $translatedParameter;
		}
		return $returnval;

	}
}
?>