<?php
session_start();

$db = new mysqli("localhost","admin","admin1912","db_login");

if($db -> connect_errno){
    echo("failed to connect to databse!");
    exit();
}


function generate_random_session(){

    $random_str = rand();

    $random_session = hash('sha256',$random_str);

    return $random_session;   

}

function get_data_login($user_email,$password){

    global $db;

    $result = $db->query("select * from tbl_users where email='$user_email'");

    foreach ($result as $user_data) {
      if(!password_verify($password,$user_data['password'])){
          return false;
      }else {
        
        $_SESSION['session_id'] = generate_random_session();
        $_SESSION['name'] = $user_data['name'];
        $_SESSION['email'] = $user_data['email'];
        $_SESSION['role'] = $user_data['role'];

        return TRUE;
      }
      
    }
}
function get_data_users(){

    global $db;

    $sql = "select id,name,email,role from tbl_users";
    $result = $db->query($sql);

    $rows = [];

    if(mysqli_num_rows($result) > 0){
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }
    return $rows;
}



function register_new_user($full_name,$user_email,$user_password){
    global $db;
    $password_hash = password_hash($password,PASSWORD_DEFAULT);

    $sql = "INSERT INTO tbl_users VALUES(null,'$full_name','$user_email','$password_hash','user')";
    
    if($db->query($sql)){ // jika data berhasil disimpan
        // header("location:../register/index.php?pesan=success");

        // kembalikan nilai true
        return TRUE;

    }
    else {
        // header("location:../register/index.php?pesan=gagal");

        return FALSE;
    }
    
  
}


function if_user_exist($user_email){

    global $db;

}


function delete_user($userid){
    global  $db;
    $sql = "delete from tbl_users where id='$userid'";

    if($db->query($sql)){
        return TRUE;
    }else {
        return FALSE;
    }

}

function add_new_user($full_name,$email,$password,$role){
    global $db;
    $password_hash = password_hash($password,PASSWORD_DEFAULT);

    $sql = "INSERT INTO tbl_users VALUES(null,'$full_name','$email','$password_hash','$role')";
    
    if($db->query($sql)){ 

        return TRUE;
    }
    else {
        // $_SESSION['sql_status'] = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>