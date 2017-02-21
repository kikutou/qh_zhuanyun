<?php

  $socket = fsockopen("ssl://smtp.gmail.com", 465, $errno, $errstr, 10);
  if(!$socket)
  {
    echo "ERROR: smtp.gmail.com 465 - $errstr ($errno)<br>\n";
  }
  else
  {
    echo "SUCCESS: smtp.gmail.com 465 - ok<br>\n";

    stream_set_blocking($socket, true);

    $lastmessage = fgets($socket, 512);

    echo "message is ".$lastmessage."\n";
  }
 
  $socket = fsockopen("smtp.gmail.com", 587, $errno, $errstr, 10);
  if(!$socket)
  {
    echo "ERROR: smtp.gmail.com 587 - $errstr ($errno)<br>\n";
  }
  else
  {
    echo "SUCCESS: smtp.gmail.com 587 - ok<br>\n";
  }
?>
