<?php


require_once("../../globals.php");

// use OpenEMR\Common\Csrf\CsrfUtils;
// use OpenEMR\Common\Logging\EventAuditLogger;
// use OpenEMR\Core\Header;
// use OpenEMR\OeUI\OemrUI;



 $pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('times','B',10);
$pdf->Cell(25,7,"ID");
$pdf->Cell(30,7,"patient_name");
$pdf->Cell(40,7,"heart_rate");
$pdf->Cell(30,7,"Height");
$pdf->Cell(30,7,"cm");
$pdf->Cell(30,7,"weight");
$pdf->Cell(30,7,"kg");
$pdf->Cell(30,7,"extra_notes");
$pdf->Ln();
$pdf->Cell(450,7,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();


        $sql = "select * from pat";
        $result = sqlStatement($sql);

        while($row = sqlFetchArray($result))
        {



            $pdf->Cell(25,7,$row['id']);
            $pdf->Cell(30,7,$row['patient_name']);
            $pdf->Cell(40,7,$row['heart_rate']);
            $pdf->Cell(30,7,$row['Height']);
            $pdf->Cell(30,7, $row['cm']);
            $pdf->Cell(30,7, $row['weight']);
            $pdf->Cell(30,7, $row['kg']);
            $pdf->Cell(30,7, $row['extra_notes']);
            $pdf->Ln();

        }
        $pdf->Output();
?>
