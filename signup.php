<?php
include("config/connect.php");
include("includes/header.php");
?>
<section class="vh-100 gradient-custom">
  <div class="container py-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-light text-white h-100" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
<form action="" method="post">
      <h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
        <p class="text-white-50 mb-5">Create your acount here</p>
            <div data-mdb-input-init class="form-outline form-white mb-4">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Name" name="name" id="" required>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" placeholder="Email" name="email" id=""required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Phone No" name="phone" id=""required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username" id=""required>
      </div>
      <div class="form-group">
        
        <input type="text" class="form-control" placeholder="Role" name="role" id=""required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" id=""required>
        </div>
        </div>
            <button name="submit" class="btn btn-primary">submit</button>
            <p>Already have an acount <a href="login.php">Log In</a> </p>
  </form>
            </div>
            <div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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
        header("Location: login.php");
        }

?>