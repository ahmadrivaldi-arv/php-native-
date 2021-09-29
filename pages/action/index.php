<!-- script for action button Edit/Delete -->

<?php
// session_start();

// $uid = $_GET['uid'];
// $acton = $_GET['act'];

// echo($uid.$acton);

function generate_random_session(){
    $str_char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str_length = strlen($str_char);
  
    $random_session = '';
  
    for($i=0;i < $str_length; $i++){
        $random_session .= $str_char[rand(0,$str_length -1)];
    }
  
    return $random_session;
  
  }
echo(generate_random_session());


?>