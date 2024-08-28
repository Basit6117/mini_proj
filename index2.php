  <?php
  session_start();
  // if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true){
  //   header("location: login.php");
  //   exit;
  // }
  include("includes/header.php");
  include("includes/topbar.php");
  include("includes/sidebar.php");
  include("config/connect.php");
  error_reporting(0);
  $sql = "SELECT * from products";
  $data = mysqli_query($conn,$sql);
  $total = mysqli_num_rows($data);
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <?php
  while($row = mysqli_fetch_assoc($data)){
  ?>
<div class="content-wrapper">
    <div class="container-fluid">
    <div class="row">
      <form action="manage_cart.php" method="post">
        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
        <input type="hidden" name="discount" value="<?php echo $row['discount']; ?>">
        <input type="hidden" name="file" value="<?php echo $row['file']; ?>">
        <div class="col-md-4">
    <div class="card" style="width: 18rem;">
       <img src="<?php echo $row['file']; ?>" class="card-img-top" alt="...">
       <div class="card-body">
      <p class="card-text"><?php echo $row['name']; ?></p>
      <p class="card-text"><b>$<?php echo $row['price']; ?></b></p>
      <p class="card-text"><del>$<?php echo $row['discount']; ?></del></p>
      <label for="quantity">Quantity:</label>
      <input type="number" name="quantity" value="1" min="1" class="form-control" style="width: 60px; display: inline-block;">
      <input class="btn btn-primary add-to-cart" type="button" value="Add to Cart">
     </div>
     </div>
     </div>
     </div>
     </div>
</form>
    </div>
    </div>
  <?php
  }
  ?>
  <script>$(document).ready(function() {
    $('.add-to-cart').click(function() {
        var form = $(this).closest('form');
        var name = form.find('input[name="name"]').val();
        var price = form.find('input[name="price"]').val();
        var discount = form.find('input[name="discount"]').val();
        var file = form.find('input[name="file"]').val();
        var quantity = form.find('input[name="quantity"]').val();
        $.ajax({
            url: 'manage_cart.php',
            method: 'POST',
            data: {
                name: name,
                price: price,
                discount: discount,
                file: file,
                quantity: quantity,
                action: 'add'
            },
            success: function(response) {
                var data = JSON.parse(response);
                alert("Item added to cart!");
                $('.cart-count').text(data.total_items);
            }
        });
    });
});
</script>
</body>
</html>
<?php include("includes/footer.php"); ?>
