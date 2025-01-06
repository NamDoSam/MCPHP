<?php 
session_start();
session_destroy();
header("Location: ../?c=".$_GET['c']);
?>