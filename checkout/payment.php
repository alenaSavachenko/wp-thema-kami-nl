<?php
  session_start();

 // require_once('http://localhost/mysite/wp-content/themes/kami/checkout/stripe/php/init.php');

require_once('stripe-php/init.php');



    \Stripe\Stripe::setApiKey ('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');
	
  $intent =  \Stripe\PaymentIntent::create([
  'amount' => $_SESSION['price_cent'],
  'currency' => 'eur',
  'payment_method_types' => ['ideal'],
]);

if(isset($_POST["name"])){
  
    $name = $_POST["name"];
    $email= $_POST["email"];
    $street = $_POST["street"];
    $homenumber = $_POST["homenumber"];
    $city = $_POST["city"];
    $postal_code = $_POST["postal_code"];
    $additional = $_POST["additional"];
    
    $_SESSION["customer_name"] = $name;
    $_SESSION["customer_email"] =$email;
    $_SESSION["customer_street"] = $street;   
    $_SESSION["customer_homenumber"] = $homenumber;
    $_SESSION["customer_city"] = $city;
    $_SESSION["customer_postal_coder"] = $postal_code;
     $_SESSION["customer_additional_adres"] = $additional;
     
}
else { echo "error"; }

//print_r($_SESSION);
?>

<html>
<head>
    	<link rel="stylesheet" media="screen" href="https://kasiamitanart.nl/checkout/css/styles.css" >
  <title>Checkout</title>
  <script src="https://js.stripe.com/v3/"></script>
</head>

<style>

 

    #product {
        border: 2px solid olive;
        width: 24rem;
        padding: 12px;
    }
    #ideal-bank-element:nth-child(2) {
        border: 2px solid olive;
    }

    .form-row { padding:12px}
    #pay_btn { padding:12px; background-color:#00aadc color:#0d66c2;}
    #pay_btn:hover {background-color:#0d66c2; color:white; }


</style>

 <div id="product"> 
            <img src="<?=$_SESSION['product_image']?>" width="300" style="border:18px solid #e6e6e6;">
            
<form id="payment-form" class="contact_form">
    
    <div class="form-row">
        <p>description:  <span style="color:#3a6a16"> <?=$_SESSION['product_name']?> </span> </p>
             <p>price:<span style="color: #3a6a16"> <?=$_SESSION['product_price']?>  € </span>   </p>
    </div>
    <div class="form-row">
        <p style="color:#cc0066">iDEAL Payment</p>
        
    <label for="accountholder-name">
     Accountholder  name
    </label>
    <input id="accountholder-name"  name="accountholder-name" class="payment-input">
  </div>
   <div class="form-row">
     <label for="ideal-bank-element">
  
    </label>
    <div id="ideal-bank-element" class="payment-input">
      <!-- A Stripe Element will be inserted here. -->
    </div>
  </div>
     <button class="submit" id="pay_btn">Submit Payment</button>

<div id="weqnulzaohvdpsca-data" data-ttacxupeliaxvkvr="<?= $intent->client_secret ?>"></div>

  <!-- Used to display form errors. -->
  <div id="error-message" role="alert"></div>
</form>
</div>


<body>
<script>
var stripe = Stripe('pk_live_51LDS5WEgD20OyVzkB9sAHK0rxP1UetR2uXehVc3TrLAYtp5q6Qk00bbKnNzeS3CE6Pzq3TJdS2HNcotQBmHZ5CMI00nAmTi20e'
);
var elements = stripe.elements();

var options = {
  // Custom styling can be passed to options when creating an Element
  style: {
    base: {
      padding: '10px 12px',
      color: '#32325d',
      fontSize: '16px',
      '::placeholder': {
        color: '#aab7c4'
      },
    },
  },
};

// Create an instance of the idealBank Element
var idealBank = elements.create('idealBank', options);

// Add an instance of the idealBank Element into
// the `ideal-bank-element` <div>
idealBank.mount('#ideal-bank-element');
var form = document.getElementById('payment-form');
var accountholderName = document.getElementById('accountholder-name');
//var client_s=document.getElementById("payment-data").;
form.addEventListener('submit', function(event) {
	//var x = document.getElementById("payment-data").innerHTML; 
	var y=document.getElementById("weqnulzaohvdpsca-data").getAttribute('data-ttacxupeliaxvkvr');
	// get secret code 1. innderhtml 2. from data  attr
 event.preventDefault();

  // Redirects away from the client
  stripe.confirmIdealPayment(
    y,
    {
      payment_method: {
        ideal: idealBank,
        billing_details: {
          name: accountholderName.value,
        },
      },
      return_url: 'https://kasiamitan.nl/wp-content/themes/kami/checkout/thankyou.php',
    }
  );
});

</script>

</body>

</html>