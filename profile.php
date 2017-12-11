<?php
$con = mysqli_connect("localhost", "root", "", "the_store") or die(mysqli_error() . "occurs");
$name = $_COOKIE['details'];
$query = "SELECT DISTINCT prodCat FROM products ORDER BY prodCat";
$result = mysqli_query($con, $query);
$query1 = "SELECT * FROM userdetails WHERE name ='$name'";
$result2 = mysqli_query($con, $query1);
while ($data = mysqli_fetch_assoc($result2)) {
    $userName = $data['username'];
    $contact = $data['contactno'];
    $addr = $data['Address'];
    $mail = $data['emailid'];
}
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                                echo "<a class='navbar-item' href='?$cat' >$cat</a>";
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
                                echo "<p class='control'><a class='bd-tw-button button' href='insert_product.php'><span>Post Ad</span></a>";
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

        <section class="hero is-danger is-bold">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title" style="margin-bottom: 25px;">
                        Welcome,
                    </h1>
                    <h2 class="subtitle">
                        <?php echo $name ?>
                    </h2>
                </div>
            </div>
        </section>

        <section>
            <div>
                <h1 align="center" id="detail">User details</h1>
            </div>
            <div class="user-details box">
                <h2><b>Name</b> : <?php echo $user ?></h2>
                <h2><b>Username</b> : <?php echo $userName ?></h2>
            </div>
            <div class="user-details box">
                <h2><b>Contact No.</b> : <?php echo $contact ?></h2>
                <h2><b>Email ID</b> : <?php echo $mail ?></h2>
                <h2><b>Address</b> : <?php echo $addr ?></h2>
            </div>
            <div class="user-details box">
                <h1 align="center"><b>Items bought</b></h1>
            </div>
            <div class="user-details box">
                <h1 align="center"><b>Items sold</b></h1>
                <?php
                $query2 = "select * from products where user=\"$user\"";
                $result3 = mysqli_query($con, $query2);
                echo "<ul>";
                while ($data = mysqli_fetch_assoc($result3)) {
                    $imgSrc = $data['prodImg'];
                    $name = $data['prodName'];
                    echo "<li style='display: inline-block;margin: 16px;'>
                       <img src=$imgSrc width='200px' height='200px'>
                       <h3 align='center'>$name</h3>
                    </li>";
                }
                echo "</ul>";
                ?>
            </div>
        </section>
    </body>
</html>
