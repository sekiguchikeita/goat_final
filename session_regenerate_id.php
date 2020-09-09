<?php


session_start();


$old_sessionid = session_id(); // here insert existed key into the var named old

session_regenerate_id(); // order regenerate key differ from previous


$new_sessionid = session_id(); // then session id func here generate sth different from the previous


echo "this is old one: ";
echo $old_sessionid;
echo 'this is new one : '; 
echo $new_sessionid;


?>