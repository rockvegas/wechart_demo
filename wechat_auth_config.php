<?php

$echostr = $_GET["echostr"];

if($echostr != NULL) {
    echo $echostr;
}
else {
    echo "wrong";
    exit;
}

?>
