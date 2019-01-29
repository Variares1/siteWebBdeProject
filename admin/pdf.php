<?php
// include connection file 
include_once("connection.php");
include_once('D:\wamp\fpdf\fpdf.php');

class PDF extends FPDF
    
{
    
function Header()
{
   
    $arr = array(1,2,3);
    
    $this->SetFont('Arial','B',15);
    //Décalage à droite
    $this->Cell(80);
    //Titre
    $this->Cell(30,10,'Photo',1,0,'C');
    //Saut de ligne
    $this->Ln(20);
    foreach($arr as $value){
       $this->Image($value.'.jpg');
        }   
    }
}


// //Instanciation de la classe dérivée
$pdf=new PDF();
$pdf->AddPage();
$pdf->Output();
// ?>