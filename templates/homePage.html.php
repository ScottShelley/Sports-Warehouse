
<main class="featured-products">
    <div class="head-bar">
        <h3>Featured Products</h3>
    </div>
    <div class="row">
        <?php foreach ($rows as $row): ?>
            <div class="col-6 col-md products text-center products-border">
                <a href="product.php?id=<?=$row[0]?>">
                    <img class="img-height" src="<?=$row[2]?>" alt="Product Image of <?=$row[1]?>">
                    <?php
                        if ($row[4]) { ?>
                            <p class="price"><span class="sale-price">$<?=$row[4]?></span> <span class="price-was">was</span> <span class="main-price">$<?=$row[3]?></span></p>
                    <?php
                        }
                        else
                        {
                    ?>
                        <p class="price">$<?=$row[3]?></p>
                    <?php
                        }
                    ?>
                    
                    <p><?=$row[1]?></p>
                </a>
            </div>    
        <?php endforeach; ?>
    </div>
</main>
<section class="section-brands">
    <div class="head-bar">
        <h3>Our brands and partnerships</h3>
    </div>
    <div class="row brands-container">
        <div class="col-md-4">
            <p>These are some of our top brands and partnerships.</p>
            <p><a href="allproducts.php">The best of the best is here.</a></p>
        </div>
        <div class="col-md-8">
            <div class="row brands">
                <div class="col-4 col-md">
                    <img src="img/logo_nike.png" alt="Nike Logo">
                </div>
                <div class="col-4 col-md">
                    <img src="img/logo_adidas.png" alt="Adidas Logo">
                </div>
                <div class="col-4 col-md">
                    <img src="img/logo_skins.png" alt="SKINS Logo">
                </div>
                <div class="col-4 col-md">
                    <img src="img/logo_asics.png" alt="Asics Logo">
                </div>
                <div class="col-4 col-md">
                    <img src="img/logo_newbalance.png" alt="New Balance Logo">
                </div>
                <div class="col-4 col-md">
                    <img src="img/logo_wilson.png" alt="Wilson Logo">
                </div>
            </div>
        </div>
    </div>
</section>