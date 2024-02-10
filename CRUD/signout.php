<?php
require 'configsignup.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: Signin.php");
?>