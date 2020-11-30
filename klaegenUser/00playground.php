<?php

function encrypt($message, $encryption_key){
$key =  hex2bin($encryption_key); //converting the secret key to binary
 $nonceSize =  openssl_cipher_iv_length('aes-256-ctr');
 $nonce = openssl_random_pseudo_bytes($nonceSize);

 $cipherText = openssl_encrypt($message,'aes-256-ctr',$encryption_key,OPENSSL_RAW_DATA,$nonce);
 return base64_decode($nonce,$cipherText);
}

function decrypt($message,$encryption_key){
$key = hex2bin($encryption_key);
$message =  base64_decode($message);
$nonceSize = openssl_cipher_iv_length('aes-256-ctr');
$nonce = mb_substr($message,0,$nonceSize,'8bit');
$cipherText = mb_substr($message, $nonceSize, null, '8bit');

$plainText =openssl_decrypt(
    $cipherText,'aes-256-ctr',$key,OPENSSL_RAW_DATA,$nonce
);

return $plainText;

}

$originalString="some words";
$salt="anyrandomncaracterdeuefuefuefguegfammint";  //lenght needs to be 256 bits or more

$encrypted = encrypt($originalString, $salt);
$decrypted = decrypt($encrypted,$salt);

echo '<h3>Original String: '.$originalString.' </h3>';
echo '<h3>After encryption: '.$encrypted.' </h3>';
echo '<h3>After decryption: '.$decrypted.' </h3>';

?>