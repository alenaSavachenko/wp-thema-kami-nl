 <?php
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

require('fpdf.php');
	
/*A4 width : 219mm*/

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();
/*output the result*/

/*set font to arial, bold, 14pt*/
$pdf->SetFont('Arial','B',20);

/*Cell(width , height , text , border , end line , [align] )*/

$pdf->Cell(71 ,10,'',0,0);
$pdf->Cell(59 ,5,'Invoice',0,0);
$pdf->Cell(59 ,10,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(71 ,5,'Kasia Mitan Art',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->Cell(59 ,5,'Details',0,1);

$pdf->SetFont('Arial','',10);

$pdf->Cell(130 ,5,'Woestijgerweg 122',0,0);
$pdf->Cell(25 ,5,'Customer :'.$name ,0,0);
$pdf->Cell(34 ,5,'0012',0,1);

$pdf->Cell(130 ,5,'Amersfoort, 3817SN',0,0);
$pdf->Cell(25 ,5,'Invoice Date:',0,0);
$pdf->Cell(34 ,5,date("d-m-Y"),0,1);
 
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Invoice No:',0,0);
$pdf->Cell(34 ,5,'ORD001',0,1);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(71 ,5,'Bill to ',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->Cell(59 ,5,'',0,1);

$pdf->SetFont('Arial','',10);

$pdf->Cell(130 ,5, $customer_name ,0,0);
$pdf->Cell(25 ,5,'' ,0,0);
$pdf->Cell(34 ,5,'',0,1);

$pdf->Cell(130 ,5, $customer_street.' '. $customer_homenumber ,0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);
 
$pdf->Cell(130 ,5, $customer_city.' '. $customer_postal_code,0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);
 


$pdf->SetFont('Arial','B',10);
/*Heading Of the table*/

$pdf->Cell(80 ,6,'Description',1,0,'C');
$pdf->Cell(23 ,6,'Qty',1,0,'C');
$pdf->Cell(30 ,6,'Unit Price',1,0,'C');

$pdf->Cell(25 ,6,'Total',1,1,'C');/*end of line*/
/*Heading Of the table end*/
$pdf->SetFont('Arial','',10);

	
		$pdf->Cell(80 ,6, $product_name, 1,0);
		$pdf->Cell(23 ,6,'1',1,0,'R');
		$pdf->Cell(30 ,6, $product_price. ' EUR', 1,0,'R');
	
		$pdf->Cell(25 ,6, $product_price. ' EUR',1,1,'R');
		
		
$pdf->Cell(118 ,6,'',0,0);
$pdf->Cell(130,0,'break',1,1,'R'); 

$pdf->Cell(15 ,6,'subtotal ',0,0,'R');
$pdf->Cell(30 ,6,$product_price. ' EUR',0,0,'R');

$filename="invoice.pdf";
$pdf->Output($filename,'F');



?>