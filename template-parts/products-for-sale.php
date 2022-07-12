<?php



$mysqli = new mysqli("kasiamitan.nl.mysql", "kasiamitan_nlkami", "nochsvetla13", "kasiamitan_nlkami");
// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

//echo "connecton established";

if ($result = $mysqli->query("SELECT * FROM products")) {
    // echo "Returned rows are: " . $result -> num_rows;

}
$mysqli->close();

?>


<div class="page-content">


<div class="products-for-sale-gallery">

    <?php if ($result->num_rows > 0) :?>
    <?php while($row = $result->fetch_assoc()) : ?>

    <div class="product-card">
        <img src="<?php echo $row['image'];?>">

        <div class="card-bottom">

            <div class="name-product">  <?php echo $row['name']; ?>   </div>
            <div class="price-product">   <?php echo $row['price']; ?> € </div>
        </div>

        <button class='order-btn'> <a class='order-link' href='<?php echo home_url();?>/wp-content/themes/kami/checkout/form.php?productId=<?=$row['id']?>'> order it now </a></button>

    </div>

    <?php endwhile ?>
    <?php endif ?>

</div>





</div>
