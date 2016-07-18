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
$accToken=$result['access_token'];

$accToken = "M-9OXPZlt4nWtr4yuy8lYtSR9t5ohh7as4mHFIp2Lz_w1Lsqr9iCA83Vt9gyhBomIAiRyQiJdV9c6b0v-ZIpmYYUUh4Qj7iD9vArqkwCJGLHhgcnK_CgIRa9Ubp4WUBRBNKaAHARDA";
$imgUri = "http://mmbiz.qpic.cn/mmbiz/M2mv954iaHeku9iaKl0djmv8LHjMsjpPmltxM1BR4c9bslxrbgc2ibcMm4qo83tczx6qaicIGLLbdI5mdPGEuAf6lg/0";
$imgID = "p4_BtL0HLohIZbne0RygSPbJwskErSHwIazWhDjK5K7YbQUNWbKCaYiJx1EAykeo";

$uploadUrl = "https://api.weixin.qq.com/cgi-bin/media/uploadnews?access_token=".$accToken;
// $rawData = array('touser' => $toUser,
//               'msgtype' => 'text',
//               'text' => array('content' => $msg));
$rawData = array('articles' => array(
    $item1 = array('thumb_media_id' => $imgID,
                    'author' => "yy",
                    'title' => "test img msg",
                    'content_source_url' => "www.baidu.com",
                    'content' => "contents here",
                    'digest' => "digest",
                    'show_cover_pic' => 1)
));
$data = json_encode($rawData);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $uploadUrl); 
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
//artical id:  4g4FLSc5J8BfzJj3Eg41rvI5d28bekX4P0dOnHrTeWPYP3e7oWR4udKhzRGPUdvp

//TODO: send broad cast img msg...

?>