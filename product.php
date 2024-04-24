<?php
//Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    //Prepare statement and execute
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    //Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    //Check if the product exists
    if (!$product) {
        //Error displayed if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    //Error displayed if the id wasn't specified
    exit('Product does not exist!');
}
?>
<?=template_header('Product')?>
<style>
    <?php 
    include 'style.css';
    ?>
</style>

<div class="product content-wrapper">
    <img src="imgs/<?=$product['img']?>" width="400" height="400" alt="<?=$product['name']?>">
    <div>
        <h1 class="name"><?=$product['name']?></h1>
        <span class="price">
            &dollar;<?=$product['price']?>
            <?php if ($product['rrp'] > 0): ?>
            <span class="rrp">&dollar;<?=$product['rrp']?></span>
            <?php endif; ?>
        </span>
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?=$product['description']?>
        </div>
    </div>
</div>

<?=template_footer()?>