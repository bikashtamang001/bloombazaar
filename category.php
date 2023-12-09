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
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Browse Categories</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <li>
                                    <a href="#">Flowering Indoor Plants</a>
                                    <span>(3)</span>
                                </li>
                                <li>
                                    <a href="#">Colourful Foliage Indoor Plants</a>
                                    <span>(2)</span>
                                </li>
                                <li>
                                    <a href="#">Low-Light Indoor Plants</a>
                                    <span>(2)</span>
                                </li>
                                <li>
                                    <a href="#">Air Purifying Indoor Plants</a>
                                    <span>(3)</span>
                                </li>
                                <li>
                                    <a href="#">Trailing Indoor Plants</a>
                                    <span>(2)</span>
                                </li>
                                <li>
                                    <a href="#">Small Indoor Plants</a>
                                    <span>(6)</span>
                                </li>
                                <li>
                                    <a href="#">Large Indoor Plants</a>
                                    <span>(6)</span>
                                </li>
                                <li>
                                    <a href="#">Succulents & Cacti</a>
                                    <span>(3)</span>
                                </li>
                                <li>
                                    <a href="#">Moisture Loving Indoor Plants</a>
                                    <span>(2)</span>
                                </li>
                                <li>
                                    <a href="#">Air Plants</a>
                                    <span>(3)</span>
                                </li>
                            </ul>
                        </div>
                    </aside>
                    
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
                                    <option value="1">Price</option>
                                    <option value="2">Name</option>
                                </select>
                            </div>

                            <div class="single_product_menu d-flex">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="search" aria-describedby="inputGroupPrepend" />
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="ti-search"></i></span>
                                    </div>
                                </div>
                            </div>
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
                                        <img width="200px" src="img/product/'.$row['image'].'" alt="djwij" />
                                        <div class="single_product_text">
                                            <h4>'. $row['title'] .'</h4>
                                            <h3>Rs. '. $row['price'] .'</h3>';
                                            if(!check_if_added_to_cart($row['id'])){
                                            echo '<a href="scripts/cart_add.php?id='.$row['id'].'&qty=1" class="add_cart">+ add to cart<i class="ti-heart"></i></a>';
                                            } else {
                                                echo '<a href="#" class="add_cart" disabled>+ add to cart<i class="ti-heart"></i></a>';
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
                        echo '<a href="?page=1">First</a>';
                    }

                    // "Previous" button
                    if ($current_page > 1) {
                        $prev_page = $current_page - 1;
                        echo '<a href="?page=' . $prev_page . '">Previous</a>';
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
                        echo '<a href="?page=' . $next_page . '">Next</a>';
                    }

                    // "Last" button
                    if ($current_page < $total_pages) {
                        echo '<a href="?page=' . $total_pages . '">Last</a>';
                    }

                    echo '</div>';
                ?>

            </div>
        </div>
    </div>
</section>


<?php require './includes/footer.php' ?>

<script src="js/jquery-1.12.1.min.js"></script>

<script src="js/popper.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.magnific-popup.js"></script>

<script src="js/swiper.min.js"></script>

<script src="js/masonry.pkgd.js"></script>

<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>

<script src="js/slick.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/stellar.js"></script>
<script src="js/price_rangs.js"></script>

<script src="js/custom.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7721ac04f8bd3390","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>
</body>

</html>