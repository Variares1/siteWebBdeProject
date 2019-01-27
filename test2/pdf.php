<?php
//include connection file 
include_once("connection.php");
include_once('C:\wamp64\fpdf181\fpdf.php');

class PDF extends FPDF
{
//En-tête
function Header()
{
        // Logo
    $this->Image('logo_pb.jpg',10,-1,70);//\assets\upload
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Users',1,0,'C');
    // Line break
    $this->Ln(20);

    // //Logo
    // // echo "";
    // // echo "";
    // $this->Image('logo_pb.jpg',40,30,33);
    // $this->Image('vignette3.jpg',40,60,66);
    // //Police Arial gras 15
    // $this->SetFont('Arial','B',15);
    // //Décalage à droite
    // $this->Cell(80);
    // //Titre
    // $this->Cell(30,10,'Photo',1,0,'C');
    // //Saut de ligne
    // $this->Ln(20);
}
}
    $db = new dbObj();
    $connString =  $db->getConnstring();
    $display_heading = array('id'=>'ID', 'fname'=> 'Name', 'lname'=> 'Age','email'=> 'Salary',);
     
    $result = mysqli_query($connString, "SELECT id, fname, lname, email FROM users") or die("database error:". mysqli_error($connString));
    $header = mysqli_query($connString, "SHOW columns FROM users");
     
    $pdf = new PDF();
    //header
    $pdf->AddPage();
    //foter page
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',12);
    // foreach($header as $heading) {
    // $pdf->Cell(40,12,$display_heading[$heading['Field']],1);
    // }
    // foreach($result as $row) {
    // $pdf->Ln();
    // foreach($row as $column)
    // $pdf->Cell(40,12,$column,1);
    // }
    $pdf->Output();
//Instanciation de la classe dérivée
// $pdf=new PDF();
// $pdf->AddPage();
// $pdf->Output();
?>