<!-- script for action button Edit/Delete -->

<?php
session_start();

$uid = $_GET['uid'];
$acton = $_GET['act'];
$session_id = $_SESSION['session_id'];

if (empty($session_id)) {
    include('../template/not_login.php');
}



?>