<?php
session_start();
include("includes/header.php");
include("includes/topbar.php");
include("includes/sidebar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>
<div class="content-wrapper">
  <h2>Your Cart</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Product</th>
        <th>Image</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $total_price = 0;
      $total_items = 0;

      if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $item) {
              $total = $item['price'] * $item['quantity'];
              $total_price += $total;
              $total_items += $item['quantity'];
              
              echo "<tr>
                      <td>{$item['name']}</td>
                      <td><img src='{$item['file']}' width='50'></td>
                      <td>\${$item['price']}</td>
                      <td>{$item['quantity']}</td>
                      <td>\${$total}</td>
                      <td><button class='btn btn-danger remove-from-cart' data-name='{$item['name']}'>Remove</button></td>
                    </tr>";
          }
      } else {
          echo "<tr><td colspan='6'>Your cart is empty.</td></tr>";
      }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3"><strong>Total Items:</strong></td>
        <td><?php echo $total_items; ?></td>
        <td><strong>Total Price:</strong></td>
        <td>$<?php echo number_format($total_price, 2); ?></td>
      </tr>
    </tfoot>
  </table>
</div>

<script>
$(document).ready(function() {
    $('.remove-from-cart').click(function() {
        var name = $(this).data('name');

        $.ajax({
            url: 'manage_cart.php',
            method: 'POST',
            data: {
                name: name,
                action: 'remove'
            },
            success: function(response) {
                var data = JSON.parse(response);
                location.reload();
            }
        });
    });
});
</script>

</body>
</html>

<?php include("includes/footer.php"); ?>
