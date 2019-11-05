<?php
session_start();
if (!isset($_SESSION['access_granted']) || true !== $_SESSION['access_granted']) {
  header("Location: /login.php");
  exit;
}

echo "ACCESS GRANTED  ";
?>
<a id="logout" href="logout_handler.php">Logout</a>

