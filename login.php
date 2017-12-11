<?php
$con = mysqli_connect("localhost", "root", "", "the_store") or die(mysqli_error($con) . " occurs");
$uname = "";
$pwd = "";
$query2 = "SELECT DISTINCT prodCat FROM products ORDER BY prodCat";
$result2 = mysqli_query($con, $query2);
if (!empty($_POST['uname'])) {
    $uname = $_POST['uname'];
}
if (!empty($_POST['pwd'])) {
    $pwd = $_POST['pwd'];
}
if (!empty($uname) && !empty($pwd)) {
    $query = "select * from Userdetails where username = \"$uname\" " . "and password = \"$pwd\"";
    $result = mysqli_query($con, $query);
    $num = mysqli_num_rows($result);
    while ($data = mysqli_fetch_assoc($result)) {
        $user = ucwords($data['name']);
    }
    if ($num) {
        setcookie("details", $user);
        header("location:index.php");
    } else {
        $msg = 'Login Failed! Please make sure that you enter the correct '
            . 'details';
        echo "<script>alert(\"$msg\")</script>";
    }
    /*if(($num === 0) and (isset($_COOKIE["details"]))){
        setcookie("details",$uname, time()-10);
    }*/
}
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login Page</title>
        <!-- CSS Files -->
        <link href="css/bulma.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/login.css">
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
                            while ($data = mysqli_fetch_assoc($result2)) {
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
                            <p class="control">
                                <a class="bd-tw-button button" href="signup.php">
                                    <span>Sign Up</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="login-wrapper">
            <div class="login-img">
                <img src="img/shop.jpg" alt="" height="100vh">
            </div>
            <div class="login-details">
                <form action="login.php" method="post">
                    <h1>Login</h1>
                    <div class="field" style="text-align: center;margin-left: 20%; margin-right: 20%;">
                        <div class="control has-icons-left">
                            <span class="icon is-small is-left has-text-info">
                                <i class="fa fa-user"></i>
                            </span>
                            <input type="text" class="input" placeholder="Username" width="100px" name="uname"
                                   minlength="4" required>
                        </div>
                    </div>

                    <div class="field has-addons" style="margin-left: 20%;margin-right: 20%;margin-top: 5%">
                        <p class="control has-icons-left">
                            <span class="icon is-small is-left has-text-info">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input class="input" type="password" placeholder="Password" style="width: 375px" id="pass"
                                   name="pwd" minlength="4" maxlength="20" required>
                        </p>
                        <p class="control">
                            <a class="button is-primary" onclick="change()">
                                <span>
                                    <i class="fa fa-eye eye"></i>
                                    <span id="show">Show</span>
                                </span>
                            </a>
                        </p>
                    </div>

                    <div class="field is-grouped is-grouped-centered" style="margin-top: 6%">
                        <p class="control">
                            <input type="submit" class="input is-primary" value="Submit">
                        </p>
                        <p>
                            <input type="reset" class="input is-danger">
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <script>
            function change() {
                var show = document.getElementById('show');
                var pass = document.getElementById('pass');
                pass.type = (pass.type === "password") ? "text" : "password";
                show.innerHTML = (show.innerHTML === "Show") ? "Hide" : "Show";

            }
        </script>
    </body>
</html>