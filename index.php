<?php
    $con = mysqli_connect("localhost", "root", "", "the_store") or die(mysqli_error() . "occurs");
    $query = "SELECT DISTINCT prodCat FROM products ORDER BY prodCat";
    $result = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home Page</title>
        <!-- CSS Files -->
        <link href="css/bulma.css" rel="stylesheet">
        <link rel="stylesheet" href="css/font-awesome.css">
        <!-- JS Files -->
        <script src="js/home.js"></script>
    </head>
    <body>
        <nav class="navbar is-dark">
            <div class="navbar-brand">
                <a class="navbar-item" href="#">
                    <p>The Store</p>
                </a>

                <div class="navbar-burger burger" data-target="res-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div id="res-menu" class="navbar-menu">
                <div class="navbar-start">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link  is-active" href="category.php">
                            Categories
                        </a>
                        <div class="navbar-dropdown is-boxed">
                            <?php
                            while ($data = mysqli_fetch_assoc($result)) {
                                $cat = $data['prodCat'];
                                echo "<a class='navbar-item' href='category.php#$cat'>$cat</a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="field is-grouped">
                            <?php
                            if (isset($_COOKIE['details'])) {
                                $user = $_COOKIE['details'];
                                echo "<p class='control'><a class='bd-tw-button button' href='profile.php'><span>$user</span></a>";
                                echo "<p class='control'><a class='is-danger button' href='?logout'><span>Log Out</span></a>";
                            } else {
                                echo "<p class='control'><a class='bd-tw-button button' href='signup.php'><span>Sign Up</span></a>";
                                echo "<p class='control'><a class='is-primary button' href='login.php'><span>Log In</span></a>";
                            }
                            if(isset($_GET['logout'])) {
                                setcookie('details',"",time()-3600);
                                header("location:index.php");
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <section class="hero is-primary is-bold">
            <div class="hero-body is-centered">
                <div class="container">
                    <h1 class="title" align="center" style="font-family: Quicksand">
                        For all your shopping needs
                    </h1>
                </div>
            </div>
        </section>

        <div>
            <a href="app.php"><img src="img/car1.jpg" width="100%" id="slider"></a>
        </div>

        <div>
            <section class="hero is-warning is-bold">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            Products
                        </h1>
                    </div>
                </div>
            </section>
            <?php
            $query1 = mysqli_query($con,"select * from products");
            echo "<ul>";
            while ($data = mysqli_fetch_assoc($query1)){
                $imgSrc = $data['prodImg'];
                $name = $data['prodName'];
                $price = $data['prodPrice'];
                echo "<li style='display: inline-block;margin: 16px;'>
                       <img src=$imgSrc width='220px' height='250px'>
                       <h3 align='center'>$name</h3>
                       <h4 align='center'>Rs. $price</h4>
                </li>";
            }
            echo "</ul>";
            ?>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function () {

                // Get all "navbar-burger" elements
                var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

                // Check if there are any navbar burgers
                if ($navbarBurgers.length > 0) {

                    // Add a click event on each of them
                    $navbarBurgers.forEach(function ($el) {
                        $el.addEventListener('click', function () {

                            // Get the target from the "data-target" attribute
                            var target = $el.dataset.target;
                            var $target = document.getElementById(target);

                            // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                            $el.classList.toggle('is-active');
                            $target.classList.toggle('is-active');

                        });
                    });
                }

            });
        </script>
    </body>
</html>