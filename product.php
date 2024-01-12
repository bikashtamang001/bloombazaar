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
                    $results_per_page = 9; // Adjust the number of products per page as needed

                    // Determine the current page
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;

                    // Calculate the starting index for the results on the current page
                    $start_index = ($page - 1) * $results_per_page;

                    // Update your query to limit the results based on pagination parameters
                    $query = "SELECT * FROM `products` LIMIT $start_index, $results_per_page";

                    $result = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_array($result)) {
                        echo '<div class="col-lg-4 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="img/product/'.$row['image'].'" alt="Image not available" />
                                        <div class="single_product_text">
                                            <h4>'. $row['title'] .'</h4>
                                            <h3>Rs. '. $row['price'] .'</h3>';
                                            if(!check_if_added_to_cart($row['id'])){
                                            echo '<a href="scripts/cart_add.php?id='.$row['id'].'&qty=1" class="add_cart">+ add to cart</a>';
                                            } else {
                                                echo '<a href="login.php" disabled>+ add to cart</a>';
                                            }
                                        
                                    echo ' </div>
                                    </div>
                                </div>';
                    }
                    ?>

                    
                
                </div>
                <?php
                    // Count the total number of products (useful for pagination)
                    $total_results = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `products`"));

                    // Calculate the total number of pages
                    $total_pages = ceil($total_results / $results_per_page);

                    // Get the current page from the URL parameter, default to 1 if not set
                    $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

                    // Display pagination links
                    echo '<div class="pagination">';

                    // "First" button
                    if ($current_page > 1) {
                        echo '<a href="?page=1">&lt&lt</a>';
                    }

                    // "Previous" button
                    if ($current_page > 1) {
                        $prev_page = $current_page - 1;
                        echo '<a href="?page=' . $prev_page . '">&lt</a>';
                    }

                    // Numbered pages
                    for ($i = 1; $i <= $total_pages; $i++) {
                        // Add a class to the current page link
                        $class = ($i === $current_page) ? 'current' : '';
                        echo '<a href="?page=' . $i . '" class="' . $class . '">' . $i . '</a>';
                    }

                    // "Next" button
                    if ($current_page < $total_pages) {
                        $next_page = $current_page + 1;
                        echo '<a href="?page=' . $next_page . '">&gt</a>';
                    }

                    // "Last" button
                    if ($current_page < $total_pages) {
                        echo '<a href="?page=' . $total_pages . '">&gt&gt</a>';
                    }

                    echo '</div>';
                ?>

            </div>
        </div>
    </div>
</section>


<?php require './includes/footer.php' ?>




<script src="js/bootstrap.min.js"></script>



<script src="js/custom.js"></script>
</body>

</html>