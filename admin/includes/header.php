<?php require 'conn.php' ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/bloom-bazaar/admin"><h1>Admin Panel</h1></a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                </ul>


                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <?php

                        if(isset($_SESSION['admin_email'])){
                            echo '<li class="nav-item">
        <a class="nav-link" href="#" onclick="confirmLogout()">
            <button type="button" class="btn btn-primary">Logout</button>
        </a>
      </li>';

                        } else {
                            echo '<li class="nav-item">
                                <a class="nav-link active" href="login.php"><button type="button" class="btn btn-primary">Login</button></a>
                            </li>';

                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
 
</body>
<script>
    function confirmLogout() {
        var result = confirm("Are you sure you want to log out?");
        if (result) {
            // If the user clicks "OK" in the confirmation dialog, proceed with the logout
            window.location.href = 'scripts/logout_script.php';
        }
    }
</script>

