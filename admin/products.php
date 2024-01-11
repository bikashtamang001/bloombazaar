<?php

require 'includes/conn.php';

session_start();

if (!isset($_SESSION['admin_email'])) {
    echo "<script> location.href='/bloom-bazaar/admin/login.php'; </script>";
    exit();
}
require "includes/header.php";

?>
<div class="mainContainer">
    <?php require "includes/sidebar.php" ?>


    <div class="allContainer">
        <div class="container jumbotron jumbotron-fluid col-md-6 bg-light my-4 p-4 text-center">
            <div class="container">
                <?php
                if(isset($_SESSION['message'])){
                    echo '<p>' . $_SESSION['message'] . '</p>';
                    
                    // Clear the message to avoid displaying it again on page refresh
                    unset($_SESSION['message']);
                }
                ?>
                <h1 class="display-4">All Products</h1>
            </div>
        </div>

        <div class="container">
            <table class="table container">
                <thead>
                    <tr>
                        <th scope="col">Product Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity Left</th>
           
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php require "includes/conn.php" ?>
                    <?php
                    $query = 'SELECT * FROM `products`';

                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr><th>" . $row['id'] . "</th>";
                        echo "<td><img class='adminimg' src='../img/product/{$row['image']}' /></td>";
                        echo "<th>" . $row['title'] . "</th>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . $row['qty'] . "</td>";
                        
                       
                            echo "<td>
                            <a href='#' onclick='confirmDelete({$row['id']})'>
                                <button type='button' class='btn btn-danger'>Delete</button>
                            </a>
                          </td></tr>";
                    
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function confirmDelete(id) {
        var result = confirm("Are you sure you want to delete this item?");
        if (result) {
            // If the user clicks "OK" in the confirmation dialog, redirect to the delete script
            window.location.href = 'scripts/delete_script_product.php?id=' + id;
        }
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>