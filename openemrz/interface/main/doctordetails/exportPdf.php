<?php


require_once("../../globals.php");

// use OpenEMR\Common\Csrf\CsrfUtils;
// use OpenEMR\Common\Logging\EventAuditLogger;
// use OpenEMR\Core\Header;
// use OpenEMR\OeUI\OemrUI;


 $pdf=new FPDF();

$pdf->AddPage();
// $pdf->setHeaderHtml('<div><h1>DOCTOR DETAILS</h1></div>');
// $pdf->Text(20, 800, 14, 'This is header text');

$pdf->SetFont('Arial','B',10);
// $pdf->Image('images/pdf-header.jpg',0,0);
$pdf->Ln();
$pdf->Ln();
// $pdf->cell(70,10,'DOCTOR DETAILS',1,0,'C');
$pdf->SetFillColor(193,229,252);
$pdf->SetFont('times','B',10);

$pdf->Cell(25,7,"ID",1);
$pdf->Cell(30,7,"doctor_name",1);
$pdf->Cell(40,7,"specification",1);
$pdf->Cell(40,7,"email",1);
$pdf->Cell(30,7,"phone",1);
$pdf->Cell(30,7,"clinic_name",1);
$pdf->Ln();
// $pdf->Cell(450,7,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
// $pdf->Ln();


        $sql = "select * from doctor";
        $result = sqlStatement($sql);

        while($row = sqlFetchArray($result))
        {



            $pdf->Cell(25,7,$row['id'],1);
            $pdf->Cell(30,7,$row['doctor_name'],1);
            $pdf->Cell(40,7,$row['specification'],1);
            $pdf->Cell(40,7,$row['email'],1);
            $pdf->Cell(30,7, $row['phone'],1);
            $pdf->Cell(30,7, $row['clinic_name'],1);
            $pdf->Ln();

        }
        $pdf->Output();

?>
