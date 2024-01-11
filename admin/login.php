<?php require "includes/conn.php" ?>
<?php require "includes/header.php";

require 'includes/conn.php';

session_start();

if(isset($_SESSION['admin_email'])){
    echo "<script> location.href='/bloom-bazaar/admin'; </script>";
    exit();
}

?>


<div class="allContainer">
        <div class="container jumbotron jumbotron-fluid col-md-6 bg-light my-4 p-4 text-center">
            <div class="container">
                <h1 class="display-4">Admin Login</h1>
            </div>
        </div>

        <div class="container col-md-3 my-4">
            <form class="row g-3" action="scripts/login_script.php" method="POST">

                <div class="col-md-12">
                <?php
    if (isset($_SESSION['error_message'])) {
        echo '<p class="error-message">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']);  // Clear the error message after displaying
    }
    ?>
                <label for="email" class="form-label mx-1">Email</label>
                                    <input type="email" class="form-control" required id="email" name="email" value="" placeholder="Email Address" />
                                </div>
                                <div class="col-md-12">
                                <label for="password" class="form-label mx-1">Password</label>
                                    <input type="password" class="form-control" required id="password" name="password" value="" placeholder="Password" />
                                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>