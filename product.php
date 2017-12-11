<?php
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
            <?php
            $id = $_COOKIE['product'];
            $query2 = "select * from products where prodId=$id";
            $result3 = mysqli_query($con, $query2);
            echo "<ul>";
            while ($data = mysqli_fetch_assoc($result3)) {
                $imgSrc = $data['prodImg'];
                $name = $data['prodName'];
                $price = $data['prodPrice'];
                $id = $data['prodId'];
                echo "<li style='display: inline-block;margin: 16px;'>
                       <img src=$imgSrc width='200px' height='200px'>
                       <h3 align='center'>$name</h3>
                       <h3 align='center'>$name</h3>
                       <a class='is-primary button' href='?pay'><span>Pay Rs. $price</span></a>
                    </li>";

            }
            echo "</ul>";
            if (isset($_GET['pay'])) {
                echo "<script>alert('Item bought')</script>";
            }
            ?>
        </div>
    </body>
</html>