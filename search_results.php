<?php
require 'includes/conn.php';
require 'includes/is_added_to_cart.php';
session_start();
require "./includes/head.php";

// if(!isset($_SESSION['email'])){
//     echo "<script> location.href='/bloom-bazaar'; </script>";
//     exit();
// }
?>

<?php
$query = 'SELECT * FROM `products`';

$result = mysqli_query($con, $query);

$sum = 0;

while ($row = mysqli_fetch_array($result)) {
    $sum++;
}

$query = "SELECT id, title FROM categories";
$result = mysqli_query($con, $query);

if ($result) {
    // Fetch categories
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
}



?>


<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>All Products</h2>
                        <p>Home <span>-</span> Buy Products</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cat_product_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <?php
                    echo '<aside class="left_widgets p_filter_widgets">
                    <div class="l_w_title">
                        <h3>Browse Categories</h3>
                    </div>
                    <div class="widgets_inner">
                        <ul class="list">';
           
           foreach ($categories as $category) {
               echo '<li>
                        <a href="category.php?id=' . $category['id'] . '">' . $category['title'] . '</a>
                        
                      </li>';
           }
           
           echo '</ul>
                </div>
              </aside>';
?>           

                    
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product_top_bar d-flex justify-content-between align-items-center">
                            <div class="single_product_menu">
                                <p><span><?php echo $sum ?> </span> Product Found</p>
                            </div>
                            <div class="single_product_menu d-flex">
                                <h5>sort by :</h5>
                                <select>
                                    <option data-display="Recent">Recent</option>
                                </select>
                            </div>

                            <form action="search_results.php" method="GET" class="single_product_menu d-flex">
    <div class="input-group">
        <input type="text" name="search_query" class="form-control" placeholder="Search" aria-describedby="inputGroupPrepend" />
        <div class="input-group-prepend">
            <button type="submit" class="input-group-text" id="inputGroupPrepend">Q</button>
        </div>
    </div>
</form>

                        </div>
                    </div>
                </div>
                <div class="row align-items-center latest_product_inner">



                <?php


// Get the search query from the form
$searchQuery = isset($_GET['search_query']) ? $_GET['search_query'] : '';

// Query the database for products matching the search query
$searchResultsQuery = "SELECT * FROM products WHERE title LIKE '%$searchQuery%'";
$searchResultsResult = mysqli_query($con, $searchResultsQuery);

// Display search results
echo '<div class="search-results">';
while ($product = mysqli_fetch_assoc($searchResultsResult)) {

    echo '<div class="col-lg-4 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="img/product/'.$product['image'].'" alt="Image not available" />
                                        <div class="single_product_text">
                                            <h4>'. $product['title'] .'</h4>
                                            <h3>Rs. '. $product['price'] .'</h3>';
                                            if(!check_if_added_to_cart($product['id'])){
                                            echo '<a href="scripts/cart_add.php?id='.$product['id'].'&qty=1" class="add_cart">+ add to cart<i class="ti-heart"></i></a>';
                                            } else {
                                                echo '<a href="scripts/cart_add.php?id='.$product['id'].'&qty=1" class="add_cart" disabled>+ add to cart</a>';
                                            }
                                        
                                    echo ' </div>
                                    </div>
                                </div>';
}
echo '</div>';
?>

                    
                
                </div>


            </div>
        </div>
    </div>
</section>


<?php require './includes/footer.php' ?>




<script src="js/bootstrap.min.js"></script>



<script src="js/custom.js"></script>
</body>

</html>