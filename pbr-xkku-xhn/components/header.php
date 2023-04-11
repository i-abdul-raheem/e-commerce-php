<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./components/style.css">
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Dashboard</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li id="homeMenu"><a href="index.php">Home</a></li>
                    <li id="bannerMenu"><a href="banners.php">Banners</a></li>
                    <li id="categoryMenu"><a href="categories.php">Categories</a></li>
                    <li id="brandMenu"><a href="brands.php">Brands</a></li>
                    <li id="productMenu"><a href="products.php">Products</a></li>
                    <li id="featuredMenu"><a href="featured.php">Featured Products</a></li>
                    <li id="colorMenu"><a href="colors.php">Product Colors</a></li>
                    <li id="sizeMenu"><a href="sizes.php">Product Sizes</a></li>
                    <li id="pageSetupMenu"><a href="pageSetup.php">Page Setup</a></li>
                    <li id="orderMenu"><a href="orders.php">Orders</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>