 
 
<!-- session_start();
@include("config/connect.php");
if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1 ";
    $result = mysqli_query($conn,$sql);

 
    if(mysqli_num_rows($result)>0){
        foreach($result as $row){
            $user_id =$row['id'];
            $user_name =$row['name'];
            $user_email =$row['email'];
            $user_phone =$row['phone'];
            $user_role =$row['role'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['auth_user'] = [
            'user_id'=>$user_id,
            'user_name'=>$user_name,
            'user_email'=>$user_email,
            'user_phone'=>$user_phone,
            'user_role'=>$user_role
        ];
        $_SESSION['status'] = "Loged in succsessful ";
        header("Location: index.php");
        

            }else{
                $_SESSION['status'] = "Invalid email or password";
                header("Location: login.php");
                
        
        }
    }
  
else{
$_SESSION['status'] = "Access Denied";
header("Location: login.php");
} -->
