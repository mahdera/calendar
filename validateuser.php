<?php
  session_start();
  $userId = $_POST['txtuserid'];
  $_SESSION['LOGGED_USER_ID'] = $userId;
  header("Location: home.php");
?>
