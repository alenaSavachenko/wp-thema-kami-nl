<?php

session_start();
//print_r ($_SESSION);

// $_SESSION['price_cent'] = $product_price_cent;

if (!empty($_SESSION)) {


    $c_name=($_SESSION["customer_name"]);
    $c_email=($_SESSION["customer_email"]);
    $c_street=($_SESSION["customer_street"]);
    $c_homenumber=($_SESSION["customer_homenumber"]);
    $c_city= ($_SESSION["customer_city"]);
    $c_postal_code=($_SESSION["customer_postal_coder"]);
    $c_additional=($_SESSION["customer_additional_adres"]);
    $productId=($_SESSION["productId"]);
    $product_name=($_SESSION["product_name"]);
    $product_price=($_SESSION["product_price"]);


    $conn = new mysqli("kasiamitan.nl.mysql", "kasiamitan_nlkami", "nochsvetla13", "kasiamitan_nlkami");


    //$conn = new mysqli("localhost","root","","wordpress");


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

//echo "connection sussefull";

//echo  "<p> ".$productId." ".$c_name." ".$c_email."".$c_street." ".$c_homenumber." ".$c_city." ".$c_postal_code." ".$c_additional." ".$productId." ".$product_name." ".$product_price."  </p>";

    $name=$conn->real_escape_string($c_name);
    $email=$conn->real_escape_string($c_email);
    $street=$conn->real_escape_string($c_street);
    $homenumber=$conn->real_escape_string($c_homenumber);
    $city=$conn->real_escape_string($c_city);
    $postal_code=$conn->real_escape_string($c_postal_code);
    $additional=$conn->real_escape_string($c_additional);
    $product_Id=$conn->real_escape_string($productId);
    $product_name=$conn->real_escape_string($product_name);
    $product_price=$conn->real_escape_string($product_price);


    $sql = "INSERT INTO klanten  (customer_name,customer_email,customer_street,customer_homenumber,customer_city,  customer_postal_coder, customer_additional_adres, product_name,productId,
product_price )
values ( '$name', '$email','$street','$homenumber','$city','$postal_code','$additional','$product_name','$product_Id','$product_price')";



    if ($conn->query($sql) === TRUE) {
        // echo "<h2>New record created successfully </h2>";
    } else {
        echo "<h3>Error:</h3> " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


?>

<?php // send e-mail with order
require_once 'post/sender.php';   ?>


