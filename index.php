<?php
session_start();
include("lib/function.php");

if (isset($_POST['login_btn'])) {
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    if(get_data_login($user_email,$user_password)){
      if($_SESSION['role'] == 'admin'){
        header("location:pages/admin");
      }
    }else {
      echo("<script>alert('username or password incorrect')</script>");
    }

    
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/style.css">
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
    <title>Form Login</title>
 
    </style>
  </head>
  <body>
    <div class="container">
    <div class="row vh-100 d-flex justify-content-center align-items-center">
      <div class="col-md-7 col-lg-5">
        <div class="card shadow-lg no-border b-radius-10" >
          <div class="card-body">
            <h3 class="mb-5 mt-3 text-center text-h3">SIGN IN</h3>
             
             <form action="" method="post">
 
              <div class="mb-3">
                <input type="email" id="email1" class="form-control frm-border" value="<?php if(isset($_POST['email'])) echo($_POST['email']);?>" placeholder="Email" name="email">
              </div>
 
              <div class="mb-3">
                <input type="password" name="password" id="password" class="form-control frm-border"  placeholder="Password">
              </div>
 
              <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="checkbox1">
                  <label class="form-check-label" for="checkbox1">show password</label>
              </div>
 
              <div class="d-grid gap-2">
                <button class="button-me btn no-border" name="login_btn" id="login_btn" type="submit">Sign In</button>
              </div>  
 
              <p class="mt-3">New member? <a href="pages/register/" class="text-decoration-none">Create account</a></p>
 
             </form>
 
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <script src="static/js/script.js"></script>
  </body>
</html>