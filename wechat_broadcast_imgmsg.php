<?php

$accessToken = "M-9OXPZlt4nWtr4yuy8lYtSR9t5ohh7as4mHFIp2Lz_w1Lsqr9iCA83Vt9gyhBomIAiRyQiJdV9c6b0v-ZIpmYYUUh4Qj7iD9vArqkwCJGLHhgcnK_CgIRa9Ubp4WUBRBNKaAHARDA";
$imgUri = "http://mmbiz.qpic.cn/mmbiz/M2mv954iaHeku9iaKl0djmv8LHjMsjpPmltxM1BR4c9bslxrbgc2ibcMm4qo83tczx6qaicIGLLbdI5mdPGEuAf6lg/0";

$broadCastUrl = "https://api.weixin.qq.com/cgi-bin/media/uploadnews?access_token=".$accessToken;
// $rawData = array('touser' => $toUser,
//               'msgtype' => 'text',
//               'text' => array('content' => $msg));
$rawData = array('articles' => array(
    $item1 = array('thumb_media_id' => $imgUri,
                    'author' => "yy",
                    'title' => "test img msg",
                    'content_source_url' => "www.baidu.com",
                    'content' => "contents here",
                    'digest' => "digest",
                    'show_cover_pic' => 1)
));
$data = json_encode($rawData);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $broadCastUrl); 
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

?>