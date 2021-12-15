<?php
include_once "checking.php";
session_start();
session_destroy();
header("Location:index.php");
 ?>
