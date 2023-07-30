<?php
session_start();
if (!isset($_SESSION["adminEmail"])) {
header("Location: index.php");
exit;
}
?>
  