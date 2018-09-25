<?php if($orderId>0):?>
    <h2 class="text-center">Order Confirmation</h2>
    <p class="text-center lead margin-top">Thank you, your order number is <?= $orderId ?></p>
<?php else: ?>
    <p>Something went wrong and the order was not placed</p>
<?php endif; ?>
<p class="text-center lead margin-top"><a href="./" class="btn btn-primary">Back to Home</a></p>