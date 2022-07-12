<?php session_start();

if(isset($_GET["productId"])){

    $productId = $_GET["productId"];
    $_SESSION["productId"] = $productId;
    $mysqli = new mysqli("kasiamitan.nl.mysql", "kasiamitan_nlkami", "nochsvetla13", "kasiamitan_nlkami");
   // $mysqli = new mysqli("localhost", "root", "", "wordpress");

// Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    if ($result = $mysqli -> query("SELECT * FROM products where id=".$productId)) {
        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {

                $product_name=$row["name"];
                $product_price=$row["price"];
                $product_price_cent=$row["price_cent"];
                $product_img=$row["image"];

                $_SESSION['price_cent'] = $product_price_cent;
                $_SESSION['product_name']=$product_name;
                $_SESSION['product_price']= $product_price;
                $_SESSION['product_image']=  $product_img;

            }
        } else {
            echo "0 results";
        }
    }
    $mysqli -> close();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HTML5 Contact Form</title>
    <link rel="stylesheet" media="screen" href="https://kasiamitan.nl/wp-content/themes/kami/checkout/checkout.css" >

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<body>
<section>

    <div class="block-1">

        <form id="contact-form" class="contact_form" action="https://kasiamitan.nl/wp-content/themes/kami/checkout/payment.php" method="post" name="contact_form">
            <ul>
                <li>
                    <h2> Shipping address  </h2>
                    <span class="required_notification">* Denotes Required Field</span>
                </li>
                <li>
                    <label for="name">Name:</label>
                    <input type="text"  name="name" required />
                </li>
                <li>
                    <label for="email">Email:</label>
                    <input type="email" name="email"  required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"/>
                    <span class="form_hint">Proper format "name@something.com"</span>
                </li>

                <li> <label for="street">Street  and  home number:</label>
                    <input type="text" name="street" required /> 	   <input class="short" type="text" name="homenumber"  required /> </li>
                <li>
                    <label for="city">City and postal code:</label>
                    <input type="text" name="city"/>   	 <input type="text" class="short" name="postal_code" required />
                </li>

                <li>
                    <label for="additional"> additional line:</label>
                    <input type="text" name="additional"/ placeholder="not required">
                </li>

                <!-- <li>
                     <label for="message">Message:</label>
                     <textarea name="message" cols="40" rows="6" required ></textarea>
                 </li> -->
                <li>
                    <button class="submit" type="submit" id="#btn"> next to the payment</button>
                </li>
            </ul>
        </form>

        <div id="result_form"></div>

    </div>
    <div class="block-2">

        <p>your order:</p>
        <img src="<?=$_SESSION["product_image"] ?>" class="order-img">
        <p> description : <?=$_SESSION['product_name']?> </p>
        <p> price : <?=$_SESSION['product_price']?> € </p>
    </div>

</section>
<script>
</script>

</body>
</html>