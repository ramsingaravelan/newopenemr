<?php

require_once("../../globals.php");


include "class.phpmailer.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// for display data based on id
// if (isset($_GET['id'])) {
//     $id = $_GET['id'];

// $sql="select * from form_doctor_details WHERE id=$id";
//  $result=sqlStatement($sql);
//  $res=sqlFetchArray($result);

// }

$filename = "dataexcel.csv";
// $mail = new PHPMailer;
function create_cvs_from_db($sql)
{
    if(isset($_POST["from_date"], $_POST["to_date"])) {
$csv = fopen('php://temp/maxmemory:' . (5 * 1024 * 1024), 'r+');

    // add the headers
    fputcsv($csv,  array("id", "patient_name", "age", "address", "phone","gender","qualification","university","datepicker","blood_group","height","weight","father_name","mother_name"));
    // the loop
    $sql="SELECT * FROM reg WHERE datepicker BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";
 $res=sqlStatement($sql);

    while ($row = sqlFetchArray($res)) {
        $id = $row['id'];
        $patient_name = $row['patient_name'];
        $age=$row['age'];
        $address= $row['address'];
        $phone=$row['phone'];
        $gender=$row['gender'];
        $qualification=$row['qualification'];
        $university=$row['university'];
        $datepicker=$row['datepicker'];
        $blood_group=$row['blood_group'];
        $weight=$row['weight'];
        $height=$row['height'];
        $father_name=$row['father_name'];
        $mother_name=$row['mother_name'];
        // creates a valid csv string
        fputcsv($csv, array($id, $patient_name,$age,$address,$phone,$gender,$qualification, $university,$datepicker,$blood_group,$weight,$height,$father_name,$mother_name));

    }
    }
    rewind($csv);
    // return the the written data
    return stream_get_contents($csv);
  }
$mail = new PHPMailer;

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

//To us
$mail->AddAddress('ram@zeoner.com');
//To Applicant
// $mail->AddAddress($email, $first_name.''.$last_name);
$mail->IsHTML(true);

// $last_4_digits = substr($card_num, -4);
//build email contents

$mail->Subject = 'Exported data ';
$my_path ="../../exportcsv/dataexcel.csv";

$mail->addStringAttachment(create_cvs_from_db($sql),$filename);

$sql="select * from reg";
$res=sqlStatement($sql);


$body = "<html>
        <head>
        <title></title>
         <style>
    table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
  border: 1px solid #ddd;
    text-align: left;
    padding: 8px;
    color:black
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>


       <table>
      <thead>
        <tr>
        <th>ID</th>
        <th>patient_name</th>
                 <th>age</th>
                 <th>Address</th>
                 <th>Phone</th>
                <th>Gender</th>
                <th>Qualification</th>
                <th>University</th>
                 <th>date</th>
             <th>Blood Group</th>
                 <th>Height</th>
                 <th>Weight</th>
                 <th>Father Name</th>
                 <th>Mother Name</th>

        </tr>
      </thead>
      <tbody>";


        while ($row = sqlFetchArray($res)) {


          $body.= "<tr>
      <td>".$row['id']."</td>
      <td>".$row['patient_name']."</td>
      <td>".$row['age']."</td>
      <td>".$row['address']."</td>
      <td>".$row['phone']."</td>
      <td>".$row['gender']."</td>
      <td>".$row['qualification']."</td>
      <td>".$row['university']."</td>
      <td>".$row['datepicker']."</td>
      <td>".$row['blood_group']."</td>
      <td>".$row['height']."</td>
      <td>".$row['weight']."</td>
      <td>".$row['father_name']."</td>
      <td>".$row['mother_name']."</td>
      </tr>";


         }

        $body.="</tbody></table></body></html>";

        // $body.='Content-Disposition: attachment; filename="' . $my_path . '";';
$mail->Body='hai';

if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}


?>
