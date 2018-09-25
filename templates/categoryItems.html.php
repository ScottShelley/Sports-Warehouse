<div class="row">
    <?php foreach ($rows as $row): ?>
    <div class="col-6 products text-center">
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