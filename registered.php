<?php
session_start();
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;}
include("config/connect.php");
include("includes/header.php");
include("includes/topbar.php");
include("includes/sidebar.php");
?>
<div class="content-wrapper">
  <!-- Modal -->
<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" id="" required>
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" placeholder="Email" name="email" id="">
      </div>
      <div class="form-group">
        <label for="">Phone No</label>
        <input type="text" class="form-control" placeholder="Phone No" name="phone" id="">
      </div>
      <div class="form-group">
        <label for="">Username</label>
        <input type="text" class="form-control" placeholder="Username" name="username" id="">
      </div>
      <div class="form-group">
        <label for="">Role</label>
        <input type="text" class="form-control" placeholder="Role" name="role" id="">
      </div>

      <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" id="">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Registered Users</li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Registered Users</h3>
      <a href="#" data-toggle="modal" data-target="#AddUserModal"  class="btn btn-primary btn-sm float-right">Add User</a>
    </div>
    <!-- /.card-header -->
     <?php
$sql = "SELECT * from users";
$data = mysqli_query($conn,$sql);
$total = mysqli_num_rows($data);
if($total !=0){
     ?>
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
          <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Username</th>
            <th>Role</th>
            <th>Operations</th>
          </tr>
        </thead>
        <tbody>
          <?php
while($result = mysqli_fetch_assoc($data)){
  echo "
   <tr>
            <td>".$result['id']."</td>
            <td>".$result['name']."</td>
            <td>".$result['email']."</td>
            <td>".$result['phone']."</td>
            <td>".$result['username']."</td>
            <td>".$result['role']."</td>
            <td><a class='btn btn-success' href='update.php?userid=".$result['id']."S'>Update</a>
            <a class='btn btn-danger' href='delete.php?userid=".$result['id']."'>Delete</a>
            </td>
            
          </tr>
  ";
}
}
 ?>
 </tbody>
    </table>
    </div>
  </div>
</div>
<?php
include("includes/footer.php");
?>
<?php
if(isset($_POST['submit'])){
 $name =  $_POST['name'];
 $email =  $_POST['email'];
 $phone =  $_POST['phone'];
 $username =  $_POST['username'];
 $role =  $_POST['role'];
 $password =  $_POST['password'];
 $sql = "INSERT INTO `users` (`name`, `email`, `phone`, `username`, `role`,`password`) VALUES ('$name', '$email', '$phone', '$username', '$role','$password')";
 $result = mysqli_query($conn,$sql);
// header("Location: index.php");

}

?>