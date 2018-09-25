<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?> | Sports Warehouse</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php if(isset($_SESSION["theme"])): ?>
    <link rel="stylesheet" href="./css/<?= $_SESSION["theme"] ?>.css">
    <?php endif; ?>
    <link rel="stylesheet" href="./css/queries.css">
    <link rel="stylesheet" href="./css/bootstrap-grid.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <link rel="stylesheet" href="./plugin/card/card.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
</head>
    <body>
        <div id="wapper">
            <nav class="navbar theme-colour">
                <button id="menu-toggle" class="navbar-toggler mr-auto" type="button">
                    <i class="fas fa-align-justify"></i> Menu
                </button>
                <ul class="navbar-nav my-2 my-lg-0 navbar-small-devices">
                    <li class="float-left dropdown">
                        <a class="cart"><i class="fas fa-shopping-cart"></i> View Cart</a>
                        <?php if (!empty($cartItems)): ?>
                            <div class="dropdown-content" id="cart-dropdown">
                                <p class="text-center lead">Cart Summary</p>
                                <table>
                                    <tr>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th></th>
                                    </tr>
                                    <?php foreach ($cartItems as $item):
                                        $productName = $item->getItemName();
                                        $price = sprintf('%01.2f', $item->getPrice());
                                        $productId = $item->getItemId();
                                        $qty = $item->getQuantity();
                                        ?>
                                        <tr>
                                            <td><?= $productName ?></td>
                                            <td>$<?= $price ?></td>
                                            <td><?= $qty ?></td>
                                            <td>
                                                <form action="" method="GET">
                                                    <input type="submit" name="remove" value="Remove" class="btn btn-warning">
                                                    <input type="hidden" value="<?= $productId ?>" name="productId">
                                                </form>
                                            <td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                                <p class="text-center">Total: $<?= sprintf('%01.2f', $cart->calculateTotal()) ?></p>
                                <p class="text-center"><a href="checkout.php">Check Out</a></p>
                            </div>
                        <?php endif;?>
                    </li>
                    <li class="navbar-text float-left"><?=$cart->count() ?> items</li>
                </ul>
                <div id="main-menu" class="collapse navbar-collapse container">
                    <ul class="navbar-nav mr-auto nav-small">
                        <?php if(!$authorize):?>
                            <li class="navbar-small-devices login-lockimg">
                                <a href="login.php">Login</a>
                            </li>
                        <?php endif;?>
                        <?php if($authorize):?>
                            <li class="navbar-small-devices login-lockimg">
                                Welcome
                            </li>
                        <?php endif;?>
                        <li><a href="./">Home</a></li>
                        <li><a href="about-sw.php">About SW</a></li>
                        <li><a href="contact.php">Contact  Us</a></li>
                        <li><a href="allproducts.php">View Products</a></li>
                        <?php if($authorize):?>
                            <li><a href="manageCategories.php">Manage Categories</a></li>
                            <li><a href="manageProducts.php">Manage Products</a></li>
                            <li><a href="createUser.php">Create User</a></li>
                            <li><a href="updatePassword.php">Update Password</a></li>
                            <form action="theme.php" method="post" id="formTheme">
                                <select name="theme" id="theme">
                                    <?php if($_SESSION["theme"] == "blue") : ?>
                                        <option value="blue" selected>Blue</option>
                                    <?php else: ?>
                                        <option value="blue">Blue</option>
                                    <?php endif; ?>
                                    <?php if($_SESSION["theme"] == "red") : ?>
                                        <option value="red" selected>Red</option>
                                    <?php else: ?>
                                        <option value="red">Red</option>
                                    <?php endif; ?>
                                    <?php if($_SESSION["theme"] == "purple") : ?>
                                        <option value="purple" selected>Purple</option>
                                    <?php else: ?>
                                        <option value="purple">Purple</option>
                                    <?php endif; ?>
                                    <?php if($_SESSION["theme"] == "green") : ?>
                                        <option value="green" selected>Green</option>
                                    <?php else: ?>
                                        <option value="green">Green</option>
                                    <?php endif; ?>
                                    <?php if($_SESSION["theme"] == "black") : ?>
                                        <option value="black" selected>Black</option>
                                    <?php else: ?>
                                        <option value="black">Black</option>
                                    <?php endif; ?>
                                </select>
                            </form>
                        <?php endif;?>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0 nav-right nav-d-none">
                        <?php if(!$authorize):?>
                            <li>
                                <a href="login.php"><i class="fas fa-lock"></i> Login</a>
                            </li>
                        <?php endif;?>
                        <?php if($authorize):?>
                            <li class="navbar-text">
                                Welcome <?=$_SESSION["username"]?>
                            </li>
                            <li><a href="logout.php">Logout</a></li>
                        <?php endif;?>
                        <li class="dropdown">
                            <a class="cart"><i class="fas fa-shopping-cart"></i> View Cart</a>
                            <?php if (!empty($cartItems)): ?>
                                <div class="dropdown-content">
                                    <p class="text-center lead">Cart Summary</p>
                                    <table>
                                        <tr>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th></th>
                                        </tr>
                                        <?php foreach ($cartItems as $item):
                                            $productName = $item->getItemName();
                                            $price = sprintf('%01.2f', $item->getPrice());
                                            $productId = $item->getItemId();
                                            $qty = $item->getQuantity();
                                            ?>
                                            <tr>
                                                <td><?= $productName ?></td>
                                                <td>$<?= $price ?></td>
                                                <td><?= $qty ?></td>
                                                <td>
                                                    <form action="" method="GET">
                                                        <input type="submit" name="remove" value="Remove" class="btn btn-warning">
                                                        <input type="hidden" value="<?= $productId ?>" name="productId">
                                                    </form>
                                                <td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                    <p class="text-center">Total: $<?= sprintf('%01.2f', $cart->calculateTotal()) ?></p>
                                    <p class="text-center"><a href="checkout.php">Check Out</a></p>
                                </div>
                            <?php endif;?>
                        </li>
                        <li class="navbar-text"><?=$cart->count() ?> items</li>
                    </ul>
                </div>
            </nav>
            <div class="container">
                <header class="header">
                    <div class="row align-center">
                        <div class="col-md-6">
                            <a href="./">
                                <img src="./img/sports-warehouse-logo-600.png" alt="Logo">
                            </a>
                        </div>
                        <div class="col-md-6 clearfix">
                            <form class="search-form" action="search.php" method="get">
                                <input type="text" name="value" placeholder="Search Products" required>
                                <button class="btn-search" type="submit"><i class="fas fa-2x fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <nav class="navbar nav-secondary nav-black">
                        <ul class="navbar-nav mr-auto">
                            <?php
                                $cRows = $category->getCategories();
                                foreach ($cRows as $item): 
                            ?>
                            <li><a class="<?php if($item[0] == $categoryId) echo 'active' ?>" href="categories.php?id=<?=$item[0]?>"><?=$item[1]?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </header>
                <div id="slideshow" class="nav-d-none slideshow-container">
                    <div class="slides">
                        <img src="./img/slide1.png" alt="Slide Image 1">
                        <div class="slide-container">
                            <div class="slide-text theme-colour">
                                <p>View our brand<br>new range of</p>
                                <h2>Sports<br>balls</h2>
                                <a href="allproducts.php" class="btn btn-006989">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="slides">
                        <img src="./img/slide2.png" alt="Slide Image 2">
                        <div class="slide-container">
                            <div class="slide-text theme-colour">
                                <p>Get protected with<br>the new range of</p>
                                <h2>Protective <br> helmets</h2>
                                <a href="allproducts.php" class="btn btn-006989">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="slides">
                        <img src="./img/slide3.png" alt="Slide Image 2">
                        <div class="slide-container">
                            <div class="slide-text theme-colour">
                                <p>Get ready to race<br>with our professional</p>
                                <h2>Training<br>gear</h2>
                                <a href="allproducts.php" class="btn btn-006989">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="dot-container">
                        <span class="dot" onclick="currentSlide(1)"></span> 
                        <span class="dot" onclick="currentSlide(2)"></span> 
                        <span class="dot" onclick="currentSlide(3)"></span> 
                    </div> 
                </div>
                <?= $output ?>
            </div>
            
            <footer class="footer theme-colour">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Site Navigation</h3>
                            <nav>
                                <ul>
                                    <li><a href="./">Home</a></li>
                                    <li><a href="about-sw.php">About Sw</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <li><a href="allproducts.php">View Products</a></li>
                                    <li><a href="">Privacy Policy</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-md-4 colour-orages nav-d-none">
                            <h3>Product categories</h3>
                            <nav>
                                <ul>
                                    <?php foreach ($cRows as $item): ?>
                                        <li><a class="<?php if($item[0] == $categoryId) echo 'active' ?>" href="categories.php?id=<?=$item[0]?>"><?=$item[1]?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-md-4">
                            <h3>Contact Sports Warehouse</h3>
                            <div class="row">
                                <div class="col-4 text-center">
                                    <i class="fab fa-facebook-f fa-3x icon"></i>
                                    <p>Facebook</p>
                                </div>
                                <div class="col-4 text-center">
                                    <i class="fab fa-twitter fa-3x icon"></i>
                                    <p>Twitter</p>
                                </div>
                                <div class="col-4 text-center">
                                    <i class="fas fa-paper-plane fa-3x icon"></i>
                                    <p>Other</p>
                                </div>
                            </div>
                            <ul class="text-right list-style-none nav-d-none">
                                <li>Online form</li>
                                <li>Email</li>
                                <li>Phone</li>
                                <li>Address</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="copyright text-center">
                    <p>© Copyright 2020 Sports Warehouse. All rights reserved. Website made by Awesomesauce Design.</p>
                </div>
            </footer>
        </div>
        <script src="./js/script.js"></script>
        <script src="./js/slideshow.js"></script>
    </body>
</html>