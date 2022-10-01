<?php

require_once("../../globals.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create an instance; passing `true` enables exceptions
 //require_once ('third_party/phpmailer/phpmeji/PHPMailerAutoload.php');

$mail = new PHPMailer;
// if (isset($_GET[id])){
//     $id = $_GET['id'];
    $sql = "select * from pat";
$res = sqlStatement($sql);
$result=sqlFetchArray($res);
// }


// $body="<html>
// <head>
// <body>
// <style>
//     table {
//     border-collapse: collapse;
//     width: 100%;
// }

// th, td {
//   border: 1px solid #ddd;
//     text-align: left;
//     padding: 8px;
//     color:black
// }

// tr:nth-child(even){background-color: #ff0000}

// th {
//     background-color: #e3911e;
//     color: white;
// }
// </style>
// <table>
// <thead>

//             <tr>

//                 <th>ID</th>

//                 <th>patient name</th>
//                 <th>heart rate</th>
//                 <th>Height</th>
//                 <th>CM/M</th>
//                 <th>Weight</th>
//                 <th>KG/LBS</th>
//                 <th>Extra notes</th>

//             </tr>

//         </thead>

//         <tbody>";
//         // while ($row = sqlFetchArray($res)){
//             $body.="<tr>
//             <td>".$result['id']."</td>
//             <td>".$result['patient_name']."</td>
//             <td>".$result['heart_rate']."</td>
//             <td>".$result['Height']."</td>
//             <td>".$result['cm']."</td>
//             <td>".$result['weight']."</td>
//             <td>".$result['kg']."</td>
//             <td>".$result['extra_notes']."</td>
//             </tr>";
//         // }
//         $body.="</tbody>
//         </table>
//         </head>
//         </html>";


//------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------mail-------------------------------------------------------------------------//


$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('times','B',10);
$pdf->Cell(25,7,"ID");
$pdf->Cell(25,7,"patient_name");
$pdf->Cell(25,7,"heart_rate");
$pdf->Cell(25,7,"Height");
$pdf->Cell(25,7,"cm");
$pdf->Cell(25,7,"weight");
$pdf->Cell(25,7,"kg");
$pdf->Cell(25,7,"extra_notes");
$pdf->Ln();
$pdf->Cell(450,7,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();


        $sql = "select * from pat";
        $result = sqlStatement($sql);

        while($row = sqlFetchArray($result))
        {



            $pdf->Cell(25,7,$row['id']);
            $pdf->Cell(25,7,$row['patient_name']);
            $pdf->Cell(25,7,$row['heart_rate']);
            $pdf->Cell(25,7,$row['Height']);
            $pdf->Cell(25,7, $row['cm']);
            $pdf->Cell(25,7, $row['weight']);
            $pdf->Cell(25,7, $row['kg']);
            $pdf->Cell(25,7, $row['extra_notes']);
            $pdf->Ln();

        }
        $pdf->Output();


$mail->SMTPDebug = true;
$mail->SMTPAuth = true;
$mail->CharSet = 'utf-8';
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->Username = 'ram@zeoner.com';
$mail->Password = 'Ramkumar@1314';
$mail->Mailer = 'smtp';
$mail->From = 'ram@zeoner.com';
$mail->FromName = 'Ram';
$mail->Sender = 'ram@zeoner.com';
$mail->Priority = 3;
$fileattname = "test.pdf";

//To us
$mail->AddAddress('ram@zeoner.com');
//To Applicant
// $mail->AddAddress($email, $first_name.''.$last_name);
$mail->IsHTML(true);

$last_4_digits = substr($card_num, -4);
//build email contents

$mail->Subject = 'Patient Details From ';

$mail->Body    = 'hi';
$path='../../data/test.pdf';
// $mail->AddAttachment($path);
// $mail->AddStringAttachment($send, 'test.pdf', 'base64', 'application/pdf');
$mail->addStringAttachment($pdf->Output("S",'test.pdf'), 'test.pdf', $encoding = 'base64', $type = 'application/pdf');
// $mail->AddAttachment($path, '', $encoding = 'base64', $type = 'application/pdf');
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}




// $mail = new PHPMailer(); // defaults to using php mail

// $mail->IsSendmail(); // telling the class to use SendMail transport

// $msg = 'patient details';

// $body = '<html><body><p>' . $msg . '</p></body></html>'; //msg contents

// $body = preg_replace("[\\\]", '', $body);

// $mail->AddReplyTo('ram@zeoner.com', "ram");

// $mail->SetFrom('ram@zeoner.com', "ram");

// $mail->ReturnPath = 'bounceremail@email.com'; //bounce mail

// $address = 'ram@zeoner.com'; //email recipient
// $mail->AddAddress($address, "ram");

// $mail->Subject = 'SUBJECT';

// $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

// $mail->MsgHTML($body);


// $mail->AddAttachment('rktest.pdf');








?>
