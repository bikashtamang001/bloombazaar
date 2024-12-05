<?php
session_start();
?>
<?php require './includes/head.php' ?>
<?php require './includes/conn.php';
	require './includes/is_added_to_cart.php'

?>

<section class="banner_part">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12">
				<div class="banner_slider owl-carousel">
					<div class="single_banner_slider">
						<div class="row">
							<div class="col-lg-5 col-md-8">
								<div class="banner_text">
									<div class="banner_text_iner">
										<h1>Buy green to save green</h1>
										<p>
											Buy the best indoor plants.
											We have a plant for each door.
										</p>
										<a href="product.php" class="btn_2">Buy now</a>
									</div>
								</div>
							</div>
							<div class="banner_img d-none d-lg-block">
								<img src="img/banner.png" alt="" />
							</div>
						</div>
					</div>
					<div class="single_banner_slider">
						<div class="row">
							<div class="col-lg-5 col-md-8">
								<div class="banner_text">
									<div class="banner_text_iner">
										<h1>Indoor Plants</h1>
										<p>
											Choose among wide variety of indoor plants.
										</p>
										<a href="product.php" class="btn_2">Buy now</a>
									</div>
								</div>
							</div>
							<div class="banner_img d-none d-lg-block">
								<img src="img/banner.png" alt="" />
							</div>
						</div>
					</div>
					<div class="single_banner_slider">
						<div class="row">
							<div class="col-lg-5 col-md-8">
								<div class="banner_text">
									<div class="banner_text_iner">
										<h1>Budget Friendly</h1>
										<p>
											Eco-Friendly, Pocket-Friendly.
										</p>
										<a href="product.php" class="btn_2">Buy now</a>
									</div>
								</div>
							</div>
							<div class="banner_img d-none d-lg-block">
								<img src="img/banner.png" alt="" />
							</div>
						</div>
					</div>
				</div>
				<div class="slider-counter"></div>
			</div>
		</div>
	</div>
</section>


<section class="product_list section_padding">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="section_tittle text-center">
					<h2>Today's special</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="product_list_slider owl-carousel">
					<div class="single_product_list_slider">
						<div class="row align-items-center justify-content-between">
						<?php

							$query = "SELECT * from `products`";
							$result = mysqli_query($con, $query);

							while ($row = mysqli_fetch_array($result)) {
								echo '<div class="col-lg-3 col-sm-6" style="padding: 10px 20px !important;">
										<div class="single_product_item">
											<img width="120px" src="img/product/'.$row['image'].'" alt="djwij" />
											<div class="single_product_text">
												<h4>'. $row['title'] .'</h4>
												<h3>Rs. '. $row['price'] .'</h3>';
												if(!check_if_added_to_cart($row['id'])){
												echo '<a href="scripts/cart_add.php?id='.$row['id'].'&qty=1" class="add_cart">+ add to cart</a>';
												} else {
													echo '<a href="login.php" class="add_cart" disabled>+ add to cart</a>';
												}
											
										echo ' </div>
										</div>
									</div>';
							}
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>






<?php require "./includes/footer.php" ?>

<!-- Include jQuery library Yo vaena vaney product haru nai dekhaudaina -->
<script src="js/jquery-1.12.1.min.js"></script>



<!-- Bootstrap.js library -->
<script src="js/bootstrap.min.js"></script>

<!-- Include Magnific popup library Yo vaena vaney product haru nai dekhaudaina-->
<script src="js/jquery.magnific-popup.js"></script>

<!-- For carousel -->
<script src="js/owl.carousel.min.js"></script>




<script src="js/custom.js"></script>


</body>

</html>
