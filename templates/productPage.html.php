<section>
    <h2 class="text-center"><?=$row["Name"]?></h2>
    <div class="row">
        <div class="col-md-6">
            <img src="<?=$row[2]?>" alt="Product Image of <?=$row[1]?>" class="img">
        </div>
        <div class="col-md-6">
            <p><?=$row["Description"]?></p>
            <form action="product.php?id=<?=$row["Id"]?>" method="post">
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" value="1" class="form-control" style="display: inline; width: 173px;">
                </div>
                <button tpye="button" class="btn btn-primary">Add to Cart</button>
            </form>
        </div>
    </div>
</section>