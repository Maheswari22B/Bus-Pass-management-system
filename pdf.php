<?php
if(!empty($_POST['generate']))
{
   $un=$_POST['username'];
   $bn=$_POST['busnumber'];
   $ss=$_POST['startingstop'];
   $des=$_POST['destination'];
   $dur=$_POST['duration'];
   $mail=$_POST['email'];
   

   require("fpdf/fpdf.php");

   $pdf=new FPDF();
   $pdf->AddPage();

   $pdf->SetFont("Arial","I",12,"blue");
   $pdf->Cell(0,20,"Your Bus-Pass has been generated!",0,1,'C',);
   $pdf->Cell(0,10,"Bus-Pass Details",1,1,'C',);
   $pdf->Cell(25,10,"Username",1,0);
   $pdf->Cell(25,10,"Bus Number",1,0);
   $pdf->Cell(35,10,"Email",1,0);
   $pdf->Cell(30,10,"From",1,0);
   $pdf->Cell(30,10,"To",1,0);
   $pdf->Cell(0,10,"Pass Duration",1,1);
   


   $pdf->Cell(25,10,$un,1,0);
   $pdf->Cell(25,10,$bn,1,0);
   $pdf->Cell(35,10,$mail,1,0);
   $pdf->Cell(30,10,$ss,1,0);
   $pdf->Cell(30,10,$des,1,0);
   $pdf->Cell(0,10,$dur,1,0);



   $pdf->output();
}
?>