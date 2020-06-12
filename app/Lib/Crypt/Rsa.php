<?php
namespace App\Lib\Crypt;

class Rsa{
    /* *
     * RSA函数
     */

    /**
     * RSA签名
     * @param $data 待签名数据
     * @param $private_key 商户私钥字符串
     * return 签名结果
     */
    function rsaSign($data, $private_key) {
        // 以下为了初始化私钥，保证在您填写私钥时不管是带格式还是不带格式都可以通过验证。
        $private_key=str_replace("-----BEGIN PRIVATE KEY-----","",$private_key);
    	$private_key=str_replace("-----END PRIVATE KEY-----","",$private_key);
    	$private_key=str_replace("\n","",$private_key);

    	$private_key="-----BEGIN PRIVATE KEY-----".PHP_EOL .wordwrap($private_key, 64, "\n", true). PHP_EOL."-----END PRIVATE KEY-----";

        $res=openssl_get_privatekey($private_key);

        if($res)
        {
            openssl_sign($data, $sign,$res);
        }
        else {
            echo "您的私钥格式不正确!"."<br/>"."The format of your private_key is incorrect!";
            exit();
        }
        openssl_free_key($res);
    	//base64编码
        $sign = base64_encode($sign);
        return $sign;
    }

    /**
     * RSA验签
     * @param $data 待签名数据
     * @param $alipay_public_key 支付宝的公钥字符串
     * @param $sign 要校对的的签名结果
     * return 验证结果
     */
    function rsaVerify($data, $alipay_public_key, $sign)  {
        //以下为了初始化私钥，保证在您填写私钥时不管是带格式还是不带格式都可以通过验证。
    	$alipay_public_key=str_replace("-----BEGIN PUBLIC KEY-----","",$alipay_public_key);
    	$alipay_public_key=str_replace("-----END PUBLIC KEY-----","",$alipay_public_key);
    	$alipay_public_key=str_replace("\n","",$alipay_public_key);

        $alipay_public_key='-----BEGIN PUBLIC KEY-----'.PHP_EOL.wordwrap($alipay_public_key, 64, "\n", true) .PHP_EOL.'-----END PUBLIC KEY-----';
        $res=openssl_get_publickey($alipay_public_key);
        if($res)
        {
            $result = (bool)openssl_verify($data, base64_decode($sign), $res);
        }
        else {
            echo "您的支付宝公钥格式不正确!"."<br/>"."The format of your alipay_public_key is incorrect!";
            exit();
        }
        openssl_free_key($res);    
        return $result;
    }

    /**
     * rsa 解密
     * @param $content
     * @return string
     */
    function rsa_decrypt($content,$priKey) {

        //读取私钥
        // $priKey = file_get_contents( 'public/'.$url);//pkcs8.pem


        //转换为openssl密钥，必须是没有经过pkcs8转换的私钥
        $res = openssl_pkey_get_private($priKey);

        //声明明文字符串变量
        $result  = '';

        //私钥解密
        openssl_private_decrypt(base64_decode($content), $result, $priKey);

        //释放资源
        openssl_free_key($res);

        //返回明文
        return $result;
    }

    /**
     * rsa 加密
     * @param $content
     * @return string
     */
    function rsa_encrypt($content,$pubKey) {

        //读取公钥
        // $pubKey = file_get_contents('public/'.$url);//public_key.pem

        //转换为openssl公钥，必须是没有经过pkcs8转换的公钥
        $res = openssl_pkey_get_public($pubKey);

        //声明明文字符串变量
        $result  = '';

        //公钥加密
        openssl_public_encrypt($content, $result, $pubKey);

        //编码
        $result = base64_encode($result);

        //释放资源
        openssl_free_key($res);

        //返回密文
        return $result;
    }

    /**
     * 16位 随机key
     * @return string
     */
    function rand_key(){
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $uuid =substr($charid, 0, 16);
        return $uuid;//strtolower()
    }

    /**
     * 生成密钥
     */
    public function GenerateKey($dn=NULL, $config=NULL, $passphrase=NULL)
    {
        
        if(!$dn)
        {
            $dn = array(
                "countryName" => "CN",
                "stateOrProvinceName" => "JIANGSU",
                "localityName" => "Suzhou",
                "organizationName" => "95epay",
                "organizationalUnitName" => "Moneymoremore",
                "commonName" => "www.moneymoremore.com",
                "emailAddress" => "csreason@95epay.com"
            );
        }
        /*
        if (!$config)
        {
            $config = array(
            "digest_alg" => "sha1",
            "private_key_bits" => 1024,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
            "encrypt_key" => false
            );
        }
        */
        $privkey = openssl_pkey_new();
        if($passphrase != NULL)
        {
            openssl_pkey_export($privkey, $privatekey, $passphrase);
        }
        else
        {
            openssl_pkey_export($privkey, $privatekey);
        }
        
        /*
        $csr = openssl_csr_new($dn, $privkey);
        $sscert = openssl_csr_sign($csr, null, $privkey, 65535);
        echo "CSR:";
        echo "<br>";
        openssl_csr_export($csr, $csrout);
        
        echo "Certificate: public key";
        echo "<br>";
        openssl_x509_export($sscert, $publickey);
        */
        $publickey = openssl_pkey_get_details($privkey);
        $publickey = $publickey["key"];
        
        // $this->noresource_pubKey=$publickey;
        // $this->noresource_priKey=$privatekey;
        return [$publickey,$privatekey];
    }



}