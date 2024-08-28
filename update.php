<?php
@include("config/connect.php");
include("includes/header.php");
// include("includes/topbar.php");
// include("includes/sidebar.php");
$userid = $_GET['userid']; // Get the id from the URL parameter

$sql = "SELECT * FROM users where id='$userid'";
$data = mysqli_query($conn,$sql);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" id="" required value="<?php echo $result['name'] ?>">
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" placeholder="Email" name="email" id="" value="<?php echo $result['email'] ?>">
      </div>
      <div class="form-group">
        <label for="">Phone No</label>
        <input type="text" class="form-control" placeholder="Phone No" name="phone" id="" value="<?php echo $result['phone'] ?>">
      </div>
      <div class="form-group">
        <label for="">Username</label>
        <input type="text" class="form-control" placeholder="Username" name="username" id="" value="<?php echo $result['username'] ?>">
      </div>
      <div class="form-group">
        <label for="">Role</label>
        <input type="text" class="form-control" placeholder="Role" name="role" id="" value="<?php echo $result['role'] ?>">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
      </div>
      </form>
      <?php
if(isset($_POST['update'])){
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$role = $_POST['role'];

$sql = "UPDATE `users` SET  name='$name',email='$email',phone='$phone',username='$username',role='$role' WHERE id='$userid'";
$result = mysqli_query($conn,$sql);
header("Location: registered.php");
}


?>
</body>
</html>