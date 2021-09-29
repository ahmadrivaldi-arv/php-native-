<?php
session_start();

$db = new mysqli("localhost","admin","admin1912","db_login");

if($db -> connect_errno){
    echo("failed to connect to databse!");
    exit();
}


function generate_random_session(){
  $str_char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $str_length = strlen($str_char);

  $random_session = '';

  for($i=0;i < $str_length; $i++){
      $random_session .= $str_char[rand(0,$str_length -1)];
  }

  return $random_session;

}

function get_data_login($user_email,$password){

    global $db;
    $sql = "select * from tbl_users where email='$user_email' and password='$password'";
    $result = $db->query($sql);
    
    if(mysqli_num_rows($result) > 0){

        while($row = $result->fetch_assoc()){
            $_SESSION["name"] = $row["name"];
            $_SESSION["role"] = $row["role"];
        }
    
        return true;

    }else {
        return false;
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
function get_data_barang(){
  
    global $db;
    $sql = "select * from tbl_barang";

    $result = $db->query($sql);

    $rows= [];

    while ($row = $result->fetch_assoc()) {
            
        // $rows["id"] = $row["barangId"];
        // $rows["nama_barang"] = $row["namaBarang"];
        // $rows["harga_modal"] = $row["hargaModal"];
        // $rows["harga_jual"] = $row["hargaJual"];
        $rows[]=$row;
    }
    return json_encode($rows,JSON_PRETTY_PRINT);

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

?>