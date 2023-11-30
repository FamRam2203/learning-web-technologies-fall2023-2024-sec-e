<?php
session_start();

$_SESSION = array();//empties the session array

session_destroy();
header("Location: ../view/Login.html");
exit;
?>