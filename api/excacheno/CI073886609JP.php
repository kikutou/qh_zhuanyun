<?php  defined("IN_PHPCMS") or exit("No permission resources.");  $no = trim($_GET["no"]); $result = file_get_contents("https://trackings.post.japanpost.jp/services/srv/search/direct?reqCodeNo1=CI073886609JP"); echo $result;exit;?>