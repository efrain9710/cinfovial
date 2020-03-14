<?php
session_start();
$user = $_SESSION['user'];
$id_user = $_SESSION['id'];
session_destroy();
 ?>
