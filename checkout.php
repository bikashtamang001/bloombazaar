<?php
session_start();

require './includes/conn.php';
require "./includes/head.php";

if (!isset($_SESSION['email'])) {
  echo "<script> location.href='/bloom-bazaar'; </script>";
  exit();
}
?>

<?php
  $sum = 0;
  $quantity = 0;
  $user_id = $_SESSION['user_id'];
  $query = 'SELECT products.price, products.id, products.title, products.image, cart.qty from cart, products where products.id = cart.product_id and cart.user_id="' . $user_id . '"';

  $result = mysqli_query($con, $query);

?>

<section class="breadcrumb breadcrumb_bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="breadcrumb_iner">
          <div class="breadcrumb_iner_item">
            <h2>Product Checkout</h2>
            <p>Home <span>-</span> Shop Single</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="checkout_area padding_top">
  <div class="container">
    
    <br><br>
    <div class="billing_details">
      <div class="row">
        <form class="row contact_form" action="confirmation.php" method="post" novalidate="novalidate">
          

          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li>
                  <a href="#">Product
                    <span>Total</span>
                  </a>
                </li>
                <?php

                while ($row = mysqli_fetch_array($result)) {

                  echo
                  '<li>
                    <a href="#">
                      ' . $row['title'] . '
                      <span class="middle">x ' . $row['qty'] . '</span>
                      <span class="last">Rs. ' . $row['qty'] * $row['price'] . '</span>
                    </a>
                  </li>';
                  $sum = $sum + $row['qty'] * $row['price'];
                  $quantity = $quantity + $row['qty'];
                }
                ?>
              </ul>
              <ul class="list list_2">
                <li>
                  <a href="#">Subtotal
                    <span>Rs. <?php echo $sum ?></span>
                  </a>
                </li>
                <li>
                  <a href="#">Shipping(Rs. 49/product)
                    <span>Rs. <?php echo $quantity*49?></span>
                  </a>
                </li>
                <li>
                  <a href="#">Total
                    <span>Rs. <?php echo $sum + 49*$quantity ?></span>
                  </a>
                </li>
              </ul>
                <br><br>
              <button type="submit" class="btn_3">Place Order</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


<?php require "./includes/footer.php" ?>





<script src="js/custom.js"></script>

</body>

</html>