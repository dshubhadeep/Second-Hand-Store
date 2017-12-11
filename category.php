<?php
ob_start();
$con = mysqli_connect("localhost", "root", "", "the_store") or die(mysqli_error() . "occurs");
if (isset($_COOKIE['details'])) {
    $name = $_COOKIE['details'];
}
$query = "SELECT DISTINCT prodCat FROM products ORDER BY prodCat";
$result = mysqli_query($con, $query);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Profile Page</title>
        <!-- CSS Files -->
        <link href="css/bulma.css" rel="stylesheet">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/profile.css">
    </head>
    <body>
        <nav class="navbar is-dark">
            <div class="navbar-brand">
                <a class="navbar-item" href="index.php">
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
                                echo "<a class='navbar-item' href='#$cat' >$cat</a>";
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
                            if (isset($_GET['logout'])) {
                                setcookie('details', "", time() - 3600);
                                header("location:index.php");
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div>
            <section class="hero is-warning is-bold" id="Home">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            Home
                        </h1>
                    </div>
                </div>
            </section>
            <?php
            $query1 = mysqli_query($con, "SELECT * FROM products WHERE prodCat = 'Home'");
            echo "<ul>";
            while ($data = mysqli_fetch_assoc($query1)) {
                $imgSrc = $data['prodImg'];
                $name = $data['prodName'];
                $price = $data['prodPrice'];
                $id = $data['prodId'];
                echo "<li style='display: inline-block;margin: 16px;'>
                       <img src=$imgSrc width='200px' height='200px'>
                       <h3 align='center'>$name</h3>
                       <h4 align='center'>Rs. $price</h4>";
                if (isset($user)) {
                    echo "<a class='is-dark button' href='?$id'><span>Buy</span></a>";
                }
                echo "</li>";
                if (isset($_GET[$id])) {
                    echo $id;
                    setcookie("product", "$id", time() + 60 * 60);
                    header('location:product.php');
                }
            }
            echo "</ul>";

            ?>
        </div>
        <div>
            <section class="hero is-warning is-bold" id="Personal">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            Personal
                        </h1>
                    </div>
                </div>
            </section>
            <?php
            $query1 = mysqli_query($con, "SELECT * FROM products WHERE prodCat = 'Personal'");
            echo "<ul>";
            while ($data = mysqli_fetch_assoc($query1)) {
                $imgSrc = $data['prodImg'];
                $name = $data['prodName'];
                $price = $data['prodPrice'];
                $id = $data['prodId'];
                echo "<li style='display: inline-block;margin: 16px;'>
                       <img src=$imgSrc width='200px' height='200px'>
                       <h3 align='center'>$name</h3>
                       <h4 align='center'>Rs. $price</h4>";
                if (isset($user)) {
                    echo "<a class='is-dark button' href='?$id'><span>Buy</span></a>";
                }
                echo "</li>";
                if (isset($_GET[$id])) {
                    echo $id;
                    setcookie("product", "$id", time() + 60 * 60);
                    header('location:product.php');
                }
            }
            echo "</ul>";
            ?>
        </div>
        <div>
            <section class="hero is-warning is-bold" id="Book">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            Books
                        </h1>
                    </div>
                </div>
            </section>
            <?php
            $query1 = mysqli_query($con, "SELECT * FROM products WHERE prodCat = 'Book'");
            echo "<ul>";
            while ($data = mysqli_fetch_assoc($query1)) {
                $imgSrc = $data['prodImg'];
                $name = $data['prodName'];
                $price = $data['prodPrice'];
                $id = $data['prodId'];
                echo "<li style='display: inline-block;margin: 16px;'>
                       <img src=$imgSrc width='200px' height='200px'>
                       <h3 align='center'>$name</h3>
                       <h4 align='center'>Rs. $price</h4>";
                if (isset($user)) {
                    echo "<a class='is-dark button' href='?$id'><span>Buy</span></a>";
                }
                echo "</li>";
                if (isset($_GET[$id])) {
                    echo $id;
                    setcookie("product", "$id", time() + 60 * 60);
                    header('location:product.php');
                }
            }
            echo "</ul>";
            ?>
        </div>
    </body>
</html>