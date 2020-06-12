<?php

namespace App\Lib\Crypt;

class Aes {
    private $hex_iv = '12345678876543211234567887654321'; # converted JAVA byte code in to HEX and placed it here
    //public $key = '1234567812345678'; #Same as in JAVA
    
    //encrypt_openssl新版加密
    function encrypt_openssl($str,$encryptKey)
    {     
        $localIV = $this->hex_iv;
        return base64_encode(openssl_encrypt($str, 'AES-128-CBC',$encryptKey,true,$localIV));
    }
    //decrypt_openssl新版解密
    function decrypt_openssl($str,$encryptKey)
    {
        $localIV = $this->hex_iv;
        return openssl_decrypt(base64_decode($str), 'AES-128-CBC', $encryptKey, true, $localIV);
    }

}

