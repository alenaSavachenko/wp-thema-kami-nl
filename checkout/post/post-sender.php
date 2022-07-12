<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer//src/Exception.php';

// get user data from session

$productd=$_SESSION['productId'];
$product_name=$_SESSION['product_name'];
$product_price=$_SESSION['product_price'];
$product_image=$_SESSION['product_image'];
$customer_name=$_SESSION['customer_name'];
$customer_email=$_SESSION['customer_email'];
$customer_street=$_SESSION['customer_street'];
$customer_homenumber=$_SESSION['customer_homenumber'];
$customer_city=$_SESSION['customer_city'];
$customer_postal_code=$_SESSION['customer_postal_coder'];
$customer_editional_adres=$_SESSION['customer_additional_adres'];


// Создаем письмо
$mail = new PHPMailer();
$mail->setFrom('info@kasiamitan.nl', 'Kasia Mitan Art'); // от кого (email и имя)
//$mail->addAddress('antonbezhi50@gmail.com', 'anton bezhi');  // кому (email и имя)

$mail->Subject = 'YOU ORDER ';

$users = [
  ['email' => $customer_email, 'name' => $customer_name],
  ['email' => 'alenasavachenko3@gmail.com', 'name' => $customer_name]
];

foreach ($users as $user) {
  $mail->addAddress($user['email'], $user['name']);

  $mail->Body = '<div style="paddng-top:16px">
<table cellpadding="7" style="padding:10px;margin:0 auto;width:90%;" > 

	<thead> <th style="background-color:#26bfa6;"> your order: </th><th colspan="3" style="background-color:#26bfa6"></th> </thead>
	<tbody>
<tr><td width="20%"> name:</td> <td width="30%" style="color:#336699"> '.$customer_name.' </td> <td rowspan="4"> <img src='.$product_image.' width="150"></td> <td> <sup style="0.5em"> EUR </sup> <span style="color:blue; font-size:14px"> '.$product_price.'</span> </td></tr>
<tr><td width="20%"> street and house number:</td> <td width="30%" style="color:#336699">'.$customer_street.'   '.$customer_homenumber.' </td> <td> <div>
 <span style="color:blue; font-size:12px"> '. $product_name.'</span>
</div> </td></tr> 
<tr><td width="20%"> city and postal code: </td>  <td width="30%" style="color:#336699">'.$customer_city.'  '.$customer_postal_code.'
</td>  <td> <div> <span style="color:blue; font-size:12px">  </span>
</div> </td></tr>

<tr><td width="20%" style="font-size:12px"> additional address line: </td>  <td width="30%" style="color:#336699">'.$customer_editional_adres .' </td>  <td> <div>
 <span style="color:blue; font-size:12px"> </span>
</div> </td></tr> 

   </tbody>
    <tfoot >				
    <tr height="16">
     <td colspan="2"> </td>    
    </tr>
	    <tr>
     <td colspan="4" style="font-size:10px;border-top:2px solid #26c0a9; margin:8px; background-color:#aaeee4;"> <span style="padding: 6px"> tel. +31 682 04 74 68 <span> <span  style="padding: 6px"> kasiamitan@gmail.com </span> 
 
    </tr>
	</tfoot>		
</table> 
</div> ';



  $mail->AltBody = "Hello, {$user['name']}! \n thank you for your order!";
  
  // !  attachment  -- !!!       //
  
  $mail->addAttachment('invoice.pdf');

  

  try {
      $mail->send();
     // echo "Message sent !";
     // echo "Message sent to: ({$user['email']}) {$mail->ErrorInfo}\n";
  } catch (Exception $e) {
      echo "Mailer Error ({$user['email']}) {$mail->ErrorInfo}\n";
  }

  $mail->clearAddresses();
}


    echo "<p> Message sent! </p>"; ?>


