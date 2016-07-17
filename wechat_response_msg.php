<?php

$postArry = array();
foreach($_POST as $k => $v) {
   $postArray[$k] = $v;
}
file_put_contents("data.txt", postArray, FILE_APPEND);

$postStr = file_get_contents("php://input");
file_put_contents("postdata.txt", $postStr);

$xmlObj = simplexml_load_string($postStr);
$fromUsr = "";
$msg = "";
foreach($xmlObj->children() as $child) {
    if($child->getName() == "FromUserName") {
        $fromUsr = $child;
    }
    else if($child->getName() == "Content") {
        $msg = $child;
    }
}
file_put_contents("fromuser.txt", $fromUsr);

$responseStr = "<xml>
<ToUserName><![CDATA[".$fromUsr."]]></ToUserName>
<FromUserName><![CDATA[gh_64f40f484d6e]]></FromUserName>
<CreateTime>".gettimeofday()["sec"]."</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[".$msg."]]></Content>
</xml>";

file_put_contents("responselog.txt", $responseStr);

echo $responseStr;
exit;

?>
