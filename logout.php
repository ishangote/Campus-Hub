<?php
session_start();

if (!isset($_SESSION['userSession'])) {
 header("Location: Index.php");
} else if (isset($_SESSION['userSession'])) {
 header("Location: homie.php");
}
session_destroy();
?>