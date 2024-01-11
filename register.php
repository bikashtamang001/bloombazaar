<?php
    session_start();
    require "./includes/head.php" ;

    if(isset($_SESSION['email'])){
        echo "<script> location.href='/bloom-bazaar'; </script>";
        exit();
    }
?>

    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Register</h2>
                            <p>Home <span>-</span> User Registration</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Already a User</h2>
                            <p>
                                Welcome to Bloom Bazaar! Login to get accessed.
                            </p>
                            <a href="login.php" class="btn_3">Login now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>
                                Welcome to Our Store ! <br /> Please Sign Up now
                            </h3>
                            <form class="row contact_form" action="scripts/signup_script.php" method="post">
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" required id="fname" name="fname" value="" placeholder="First Name" />
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" required id="lname" name="lname" value="" placeholder="Last Name" />
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="number" class="form-control" required id="mobile" name="mobile" value="" placeholder="Mobile Number" />
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" required id="email" name="email" value="" placeholder="Email Address" />
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" required id="password" name="password" value="" placeholder="Password" />
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn_3">
											Sign up and Login
										</button>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require "./includes/footer.php" ?>



</body>

</html>