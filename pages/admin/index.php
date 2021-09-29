<?php
session_start();
include("../template/header.php");
include("../../lib/function.php");

$users_data = get_data_users();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row vh-100 d-flex justify-content-center ">
          <div class="col-lg-12 mt-5">
              <div class="table-responsive">
              <table class="table table-striped mt-5 table-bordered text-center">
                  <thead>
                      <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Name</th>
                          <th scope="col">E-mail</th>
                          <th scope="col">Role</th>
                          <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($users_data as $ud): ?>
                      <tr>
                          <th scope="row"><?=$ud['id'];?></th>
                          <td scope="row"><?=$ud['name'];?></td>
                          <td scope="row"><?=$ud['email'];?></td>
                          <td scope="row"><?=$ud['role'];?></td>

                          <td>
                              <a href="../action/?uid=<?php echo $ud['id'];?>&act=e" class="btn btn-primary">Edit</a>
                              <a href="../action/?uid=<?php echo $ud['id'];?>&act=d" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      <?php endforeach;?>
                  </tbody>
              </table>
              </div>
          </div>
        </div>
    </div>
</body>
</html>