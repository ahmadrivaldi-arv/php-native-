<!-- script for action button Edit/Delete -->

<?php
session_start();
include("../../lib/function.php");


$uid = $_GET['uid'];
$action = $_GET['act'];
$session_id = $_SESSION['session_id'];

if (empty($session_id)) {
    include('../template/not_login.php');
}else {
    if ($action == 'd') {
        
        if(delete_user($uid)){
            header("location:../admin/");
        }else {
            echo("<script>alert('failed to delete user')</script>");
            header("location:../admin/");
        }
    }
}
?>