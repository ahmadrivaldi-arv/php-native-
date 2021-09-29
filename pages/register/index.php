<?php

require_once("../../lib/function.php");
$full_name = $_POST['full_name'];
$user_email = $_POST['user_email'];
$user_password = $_POST["user_password"];
$user_password2 = $_POST["user_password2"];

$pesan = $_GET['pesan'];

if(isset($_POST['btn_submit'])){    
    if ($user_password2 != $user_password ) {
        echo("<script>alert('password not match');</script>");
    }
    else {
            
            global $db;
            $result = $db->query("select email from tbl_users where email='$user_email'");

            if(mysqli_num_rows($result) > 0){
                echo("<script>alert(' email already registered');</script>");
                
            }else {
                if(register_new_user($full_name,$user_email,$user_password)){ //jika data berhasil diinput
                    // tampilkan pesan berhasil
                    echo("<script>alert('new user added');</script>");

                    // redirect ke halaman login
                    // header("location:../");
                }else { // jika gagal

                    // tampilkan kesalahan
                    echo("<script>alert('failed to register new user');</script>");
                }
            }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../static/css/style.css">
    <style>
        .button-me{
            color: white;
            height: 40px;
            background: #00A19D;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.25);
            border-radius: 88px;
        }
        .text-h3{
            color: #00A19D;
        }
        .frm-border{
            border-radius:88px;
        }
    </style>
    <title>Register</title>

</head>
<body >
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-7 col-lg-5">
                <div class="card shadow-lg no-border b-radius-10">
                    <div class="card-body">
                        <h3 class="text-h3 mb-3 mt-4 text-center">REGISTER</h3>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name:</label>
                                <input type="text" required class="form-control frm-border" placeholder="Ujang Sutisna" name="full_name" id="full_name" value="<?php if(isset($_POST['full_name'])) echo($_POST['full_name']);?>">
                            </div>
                            <div class="mb-3">
                                <label for="user_email" class="form-label">Email:</label>
                                <input type="email" required class="form-control frm-border" placeholder="email@address.com" name="user_email" id="user_email" value="<?php if(isset($_POST['user_email'])) echo($_POST['user_email']);?>">
                            </div>
                            <div class="mb-3">
                                <label for="user_password" class="form-label">Password:</label>
                                <input type="password" required class="form-control frm-border" placeholder="*********" name="user_password" id="password">
                                <div class="invalid-feedback" id="invalid">password not match</div>
                            </div>
                            <div class="mb-3">
                                <label for="user_password2" class="form-label">Repeat Password:</label>
                                <input type="password" required class="form-control frm-border" placeholder="**********" name="user_password2" id="password2">
                                <div class="invalid-feedback" id="invalid">password not match</div>
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" class="form-check-input"  name="showpass" id="showpass">
                                <label for="showpass" class="form-label">Show password</label>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="btn_submit" class="btn button-me">SUBMIT</button>
                            </div>
                            <div class="mb-3">
                                <p class="font-monospace">Already have a account? <a href="../../">login here</a></p>
                            </div>
                            
                        </form>

                        <label for="" class="cpr">&copy; adminsite.com 2021</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../static/js/script.js"></script>
</body>
</html>