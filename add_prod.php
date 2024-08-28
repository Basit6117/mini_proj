<?php
   include("config/connect.php");
   include("includes/header.php");
   include("includes/topbar.php");
   include("includes/sidebar.php");
   ?>
<form action="" method="POST" enctype="multipart/form-data">
   <div class="content-wrapper">
      <div class="form-group">
         <caption><h3 class="text-center">Add Products</h3></caption>
         <h5></h5>
         <label for="">Product Name</label>
         <input type="text" class="form-control" placeholder="Product Name" name="name">
      </div>
      <div class="">
         <label for="">Price</label>
         <input type="text" class="form-control" placeholder="Price" name="price">
      </div>
      <div class="">
         <label for="">Discount</label>
         <input type="text" class="form-control" placeholder="Discount" name="discount">
      </div>
      <div class="">
         <label for="">Image</label>
         <input type="file" class="form-control" placeholder="Image" name="file">
      </div>
      <div class="">
         <input type="submit"  class="btn btn-primary" name="submit" value="Submit">
</form>
</div>
</div>
</div>
<!-- Content Header (Page header) -->
</div>
<?php
   if(isset($_POST['submit'])){
     $name = $_POST['name'];
     $price = $_POST['price'];
     $discount = $_POST['discount'];
     $filename = $_FILES["file"]["name"]; 
       $tempname = $_FILES["file"]["tmp_name"];
       $folder = "files/".$filename;
       move_uploaded_file($tempname,$folder);
   
       $sql =   "INSERT INTO `products` (`name`, `price`, `discount`,`file`) VALUES ('$name', '$price', '$discount','$folder')";
       $result = mysqli_query($conn, $sql);
      //  header("Location: index2.php");
   
   }
   ?>
<?php
   include("includes/footer.php");
   ?>