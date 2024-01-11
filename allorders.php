<?php
session_start();
require "./includes/head.php";
require './includes/conn.php';

if (!isset($_SESSION['email'])) {
  echo "<script> location.href='/nursery_online'; </script>";
  exit();
}
?>

<?php

$user_id = $_SESSION['user_id'];
// $query = 'SELECT products.price, products.id, products.title, products.image, cart.qty from cart, products where products.id = cart.product_id and cart.user_id="' . $user_id . '"';

// $result = mysqli_query($con, $query);

// while ($row = mysqli_fetch_array($result)) {
//   $order = "INSERT INTO `orders`(`product_id`, `user_id`, `product_qty`, `order_amount`, `status`) 
//     VALUES (" . $row['id'] . "," . $user_id . "," . $row['qty'] . "," . $row['price'] * $row['qty'] + 49 . ", 'Confirmed')";

//   $answer = mysqli_query($con, $order);
// }

?>



<section class="breadcrumb breadcrumb_bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="breadcrumb_iner">
          <div class="breadcrumb_iner_item">
            <h2>My Orders</h2>
            <p>Home <span>-</span> All Orders</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="confirmation_part padding_top">
  <div class="container">
    <!-- <div class="row">
      <div class="col-lg-6 col-lx-4">
        <div class="single_confirmation_details">
          <h4>order info</h4>
          <ul>
            <li>
              <p>order number</p><span>: 60235</span>
            </li>
            <li>
              <p>data</p><span>: Oct 03, 2017</span>
            </li>
            <li>
              <p>total</p><span>: USD 2210</span>
            </li>
            <li>
              <p>mayment methord</p><span>: Check payments</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6 col-lx-4">
        <div class="single_confirmation_details">
          <h4>Billing Address</h4>
          <ul>
            <li>
              <p>Street</p><span>: 56/8</span>
            </li>
            <li>
              <p>city</p><span>: Los Angeles</span>
            </li>
            <li>
              <p>country</p><span>: United States</span>
            </li>
            <li>
              <p>postcode</p><span>: 36952</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6 col-lx-4">
        <div class="single_confirmation_details">
          <h4>shipping Address</h4>
          <ul>
            <li>
              <p>Street</p><span>: 56/8</span>
            </li>
            <li>
              <p>city</p><span>: Los Angeles</span>
            </li>
            <li>
              <p>country</p><span>: United States</span>
            </li>
            <li>
              <p>postcode</p><span>: 36952</span>
            </li>
          </ul>
        </div>
      </div>
    </div> -->
    <div class="row">
      <div class="col-lg-12">
        <div class="order_details_iner">
          <h3>My Order</h3>
          <br><br>
          <table class="table table-borderless">
            <thead>
              <tr>
                <th scope="col">Order Id</th>
                <th scope="col">Order Date</th>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Order Total</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $allOrders = "SELECT orders.id, orders.order_date ,products.title, orders.product_qty, orders.order_amount, orders.status from orders, products where user_id='$user_id' and orders.product_id=products.id";
              $orderresult = mysqli_query($con, $allOrders);
              while($row = mysqli_fetch_array($orderresult)){
                echo '<tr>
                        <th><span>'.$row['id'].'</span></th>
                        <th><span>'.$row['order_date'].'</span></th>
                        <th><span>'.$row['title'].'</span></th>
                        <th>'.$row['product_qty'].'</th>
                        <th> <span>Rs. '.$row['order_amount'].'</span></th>
                        <th> <span>'.$row['status'].'</span></th>
                      </tr>';
              }
              
              ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>


<?php require './includes/footer.php' ?>










</body>

</html>

</html>

</html>

</html>

</html>

</html>