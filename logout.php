<?php

include("funcs.php");
session_start(); // feels like connect to session otherwise cannot share info
$_SESSION = array();

// remove the key from browser side
if(isset($_COOKIE[session_name()])){ // try to remove key from cookie here 
    setcookie(session_name(), '',time()-42000, '/'); // that's why it set time waaaay back before it has the key
}

//try to remove the key from server side 
session_destroy();

// where to redirect people 
redirect('login.php')


?>