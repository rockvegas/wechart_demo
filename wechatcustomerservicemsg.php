<?php

//更换成自己的APPID和APPSECRET            
$TOKEN_URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx1156b8ab632c2f99&secret=adffa603ee1cf4e0a37c41ff5bd28502";

$objCurl = curl_init($TOKEN_URL);
curl_setopt($objCurl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($objCurl, CURLOPT_TIMEOUT, 3);
$json = curl_exec($objCurl);

$result=json_decode($json, true);
//print_r($result);

//var_dump($result);
$ACC_TOKEN=$result['access_token'];
//print_r("...".$ACC_TOKEN."</br>");

$toUser = $_GET["to"];
$msg = $_GET["msg"];

print_r($toUser." msg:".$msg);

$url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$ACC_TOKEN;
$rawData = array('touser' => $toUser,
              'msgtype' => 'text',
              'text' => array('content' => $msg));
$data = json_encode($rawData);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url); 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                            
$result = curl_exec($curl);
if (curl_errno($curl)) {
    return 'Errno'.curl_error($curl);
}
curl_close($curl);

var_dump($result);
echo $result;
echo "\r\n";
//echo $url."</br>";

//foreach($opts['http'] as $k => $v) {
//    echo "key:".$k." value:".$v;
//}

?>
