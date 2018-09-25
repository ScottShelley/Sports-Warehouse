<h2 class="text-center">Check Out</h2>
<p class="text-center lead">Cart Summary</p>
<?php if (!empty($cartItems)): ?>
    <table class="table">
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
    <p class="text-center lead">Total: $<?= sprintf('%01.2f', $cart->calculateTotal()) ?></p>
<?php endif;?>
<form method="post" action="checkout.php" id="checkout">
    <fieldset>
        <legend>Delivery Details</legend>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstName">First Name:</label>
                    <input class="form-control" type="text" id="firstName" name="firstName" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input class="form-control" type="text" id="lastName" name="lastName" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input class="form-control" type="text" id="phone" name="phone" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" id="email" name="email" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input class="form-control" type="text" id="address" name="address" required>
        </div>
    </fieldset>
    <fieldset>
        <legend>Payment</legend>
        <div class="row" class="form-container active">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="number">Credit Card Number</label>
                    <input class="form-control" type="tel" id="number" name="number" placeholder="Card number" required>
                </div>
                <div class="form-group">
                    <label for="name">Name on Card</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Full name" required>
                </div>
                <div class="form-group">
                    <label for="expiry">Expiry Date</label>
                    <input class="form-control" type="text" id="expiry" name="expiry" placeholder="MM/YY" required>
                </div>
                <div class="form-group">
                    <label for="cvc">Card Verification Code</label>
                    <input class="form-control" type="text" id="cvc" name="cvc" placeholder="CVC" required>
                </div>
                <p><input type="submit" name="pay" value="Pay" class="btn btn-primary"></p>        
            </div>
            <div class="col-md-6">
                <div class="card-wrapper"></div>
            </div>
        </div>
        
    </fieldset>
</form>

<script src="./plugin/card/jquery.card.js"></script>
<script>
    $("#checkout").validate({
        rules: {
            firstName: "required",
            lastName: "required",
            address: "required", 
            phone: "required", 
            email: {
                required: true,
                email: true
            }, 
            number: "required", 
            name: "required", 
            expiry: "required", 
            cvc: "required" 
        },
        messages: {
            firstName: "Frist Name is required!",
            lastName: "Last Name is required!",
            address: "Address is required!", 
            phone: "Phone is required!", 
            email: {
                required: "Email is required!"
            }, 
            number: "Credit Card Number is required!", 
            name: "Name on Card is required!", 
            expiry: "Expiry Date is required!", 
            cvc: "Card Verification Code is required!" 
        }
    });

    $('#checkout').card({
        container: '.card-wrapper'
    });
</script>