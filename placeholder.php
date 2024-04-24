<?php
//Clear cart and show order has been placed 
unset($_SESSION['cart'])
?>
<?=template_header('Place Order')?>
<style>
    <?php 
    include 'style.css';
    ?>
</style>
<div class="placeorder content-wrapper">
    <h1>Your Order Has Been Placed</h1>
    <p>Thank you for ordering with Cloud9! We'll contact you by email with your order details.</p>
</div>

<?=template_footer()?>
