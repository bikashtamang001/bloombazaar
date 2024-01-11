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
                            <h2>Login</h2>
                            <p>Home <span>-</span> User Login</p>
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
                            <h2>New to our Shop?</h2>
                            <p>
                                Welcome to Bloom Bazaar! Create an account to get served
                            </p>
                            <a href="register.php" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>
                                Welcome Back ! <br /> Please Sign in now
                            </h3>
                            <form class="row contact_form" action="scripts/login_script.php" method="post">
                            <div class="col-md-12 my-2">
                <?php
    if (isset($_SESSION['error_message'])) {
        echo '<p class="error-message">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']);  // Clear the error message after displaying
    }
    ?>

                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" required id="email" name="email" value="" placeholder="Email Address" />
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" required id="password" name="password" value="" placeholder="Password" />
                                </div>
                                <div class="col-md-12 form-group">
                                    
                                    <button type="submit" value="submit" class="btn_3">
											log in
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