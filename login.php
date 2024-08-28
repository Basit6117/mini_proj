
      <?php
      session_start();
      $login = false;
      $showError = false;
      include("includes/header.php");
      include("config/connect.php");
      if(isset($_POST['login_btn'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num==1){
          $login = true;
          $_SESSION['loggedin'] = true;
          $_SESSION['email'] = $email;
          header("location: index.php");
        }
        else{
          $showError = "Invalid Credentials";
        }
      }
      ?>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-light text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
          <?php
          if($login){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfully Logged in.</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
              </div>';
                }
  if($showError){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error!</strong> '.$showError.' 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
         </button>
          </div>';
                }

?>
  <form action="" method="post">
      <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
        <p class="text-white-50 mb-5">Please enter your login and password!</p>
            <div data-mdb-input-init class="form-outline form-white mb-4">
              <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email" required />
              <label class="form-label" for="typeEmailX">Email</label>
            </div>
              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" required />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>
              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg px-5" name="login_btn" type="submit">Login</button>
          </form>
            </div>
            <div>
              <p class="mb-0">Don't have an account? <a href="signup.php">Sign Up</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
@include("config/connect.php");
?>