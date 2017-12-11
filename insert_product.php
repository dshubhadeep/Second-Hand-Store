<!DOCTYPE>
<?php
$con=mysqli_connect("localhost","root","","the_store");
$name = $_COOKIE['details'];
$query = "SELECT DISTINCT prodCat FROM products ORDER BY prodCat";
$result = mysqli_query($con,$query);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login Page</title>
        <!-- CSS Files -->
        <link href="css/bulma.css" rel="stylesheet">
        <link rel="stylesheet" href="css/font-awesome.css">
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
            <section style="margin-top: 4%">
                <div>
                    <h1 style="font-size: 32px;font-family: Quicksand;text-align: center;margin-bottom: 6%">Enter Product Details</h1>
                </div>
                <form method="post" action="insert_product.php" ENCTYPE="multipart/form-data">
                    <div class="field">
                        <p class="control" style="margin-left: 35%;margin-bottom: 2%">
                            <label for="pass" style="margin-right: 2%">Product Name</label>
                            <input class="input" placeholder="Product Name" style="width: 375px" id="pass" name="prodName" required>
                        </p>
                        <p class="control" style="margin-left: 35%;margin-bottom: 2%">
                            <label for="pass" style="margin-right: 2%">Product Category</label>
                            <input class="input" placeholder="Product Category" style="width: 375px" id="pass" name="prodCat" required>
                        </p>
                        <p class="control" style="margin-left: 35%;margin-bottom: 2%">
                            <label for="pass" style="margin-right: 2%">Product Brand</label>
                            <input class="input" placeholder="Product Brand" style="width: 375px" id="pass" name="prodBrand" required>
                        </p>
                        <p class="control" style="margin-left: 35%;margin-bottom: 2%">
                            <label for="pass" style="margin-right: 2%">Product Price</label>
                            <input class="input" placeholder="Product Price" style="width: 375px" id="pass" name="prodPrice" required>
                        </p>
                        <p class="control" style="margin-left: 35%;margin-bottom: 2%">
                            <label for="pass" style="margin-right: 2%">Product Description</label>
                            <input class="input" placeholder="Product Desc." style="width: 375px" id="pass" name="prodDesc" required>
                        </p>
                        <p class="control" style="margin-left: 35%;margin-bottom: 2%">
                            <label for="pass" style="margin-right: 2%">Product Image</label>
                            <input class="input" type="file" style="width: 375px" id="pass" name="prodImg" required>
                        </p>
                    </div>
                    <div class="field is-grouped is-grouped-centered" style="margin-top: 4%">
                        <p class="control">
                            <input type="submit" class="input is-primary" value="Submit">
                        </p>
                        <p>
                            <input type="reset" class="input is-danger">
                        </p>
                    </div>
                </form>
            </section>
            <?php
            if (isset($_POST['prodName']) && isset($_POST['prodBrand']) && isset($_POST['prodCat'])
            && isset($_POST['prodPrice']) && isset($_POST['prodDesc'])){
                $prodName = $_POST['prodName'];
                $prodBrand = $_POST['prodBrand'];
                $prodCat = $_POST['prodCat'];
                $prodPrice = $_POST['prodPrice'];
                $prodDesc = $_POST['prodDesc'];
                $res2 = mysqli_query($con,"select * from products");
                $prodId = 0;
                while ($data = mysqli_fetch_assoc($res2)) {
                    $prodId = $data['prodId'];
                }
                $prodId++;
                $fileDest = "img/prodImg/".$_FILES['prodImg']['name'];
                $fileSrc = $_FILES['prodImg']['tmp_name'];
                echo $fileDest;
                echo $fileSrc;
                copy($fileSrc,$fileDest);
                $query2 = "insert into products VALUES ($prodId,\"$prodName\",$prodPrice,\"$prodBrand\",\"$prodDesc\",\"$fileDest\",\"$prodCat\",\"$user\")";
                $res3 = mysqli_query($con,$query2);
            }
            ?>
	</body>
</html>	



