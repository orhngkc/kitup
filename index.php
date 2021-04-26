<?php
ob_start();
error_reporting(0);

if(isset($_SESSION['username'])){
    session_start();
}

include 'lib/conn.php';
include 'lib/functions.php';
include 'lib/init.php';
include 'inc/header.php';


$file = convertedURL();
include "modules/".$file;

include 'inc/footer.php';

?>
