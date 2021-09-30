<?php
session_start();
include("../template/header.php");
include("../../lib/function.php");

$users_data = get_data_users();


$full_name = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$role = $_POST['role'];

if(isset($_POST['btn-submit'])){

    if($password2 != $password){
        echo("<script>alert('password not match')</script>");

    }else {
        if(add_new_user($full_name,$email,$password,$role)){
            header("location:../admin");
        }else {
        echo("<script>alert('failed to add user')</script>");
            
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
    <link rel="stylesheet" href="../../static/css/style.css">
    <link rel="stylesheet" href="../../static/fontawesome/css/all.css">
    <title>Admin</title>
</head>

<body>

<div class="container-fluid">

        <div class="container">
            <div class="row py-5">
                <div class="col-2">
                    <input type="text" name="" id="" placeholder="search here..." class="form-control">
                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <div class="col-1 offset-8">
                    <button type="submit" class="btn" style="border:1px solid green" data-bs-target="#add-user-modal" data-bs-toggle="modal">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            <div class="row ">

                <div class="col-12">

                    <div class="table-responsive">

                        <table class="table text-center table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach ($users_data as $ud): ?>
                            <tr>
                                <th scope="row">
                                    <?php

                                    echo $i;
                                    $i++;
                                
                                ?>
                                </th>
                                <th scope="row"><?=$ud['id'];?></th>
                                <td scope="row"><?=$ud['name'];?></td>
                                <td scope="row"><?=$ud['email'];?></td>
                                <td scope="row"><?=$ud['role'];?></td>

                                <td>

                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modal-edit-<?php echo($ud['id'])?>"><i class="far fa-edit"></i></button>
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-delete-<?php echo($ud['id'])?>"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    

    <!-- Modal delete -->
    <?php foreach ($users_data as $ud): ?>
    <div class="modal fade" id="modal-delete-<?php echo($ud['id']);?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data?
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="" method="get">
                        <a href="../action?uid=<?php echo($ud['id']);?>&act=d"><button type="button"
                                class="btn btn-danger">Yes</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>

    <!-- add user modal -->
    <div class="modal fade" id="add-user-modal" tabindex="-1" aria-labelledby="add-user-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="full-name" class="col-form-label">Full Name:</label>
                            <input type="text" required class="form-control" name="fullname" id="full-name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">E-mail:</label>
                            <input type="email" required class="form-control" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="password" required class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="col-form-label">Repeat Password:</label>
                            <input type="password" required class="form-control" name="password2" id="password2">
                        </div>
                        <div class="mb-3">
                            <label for="full-name" class="col-form-label">Role:</label>
                            <select class="form-select" style="height:40px;" name="role"
                                aria-label=".form-select-sm example">
                                <option selected>admin</option>
                                <option value="admin">admin</option>
                                <option value="user">user</option>
                            </select>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="btn-submit" class="btn btn-primary">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal logout-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin logout?
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="" method="post">
                        <button type="submit" name="btn-logout" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>