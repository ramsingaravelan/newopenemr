<?php
require_once("../../globals.php");
// if(isset($_POST["from_date"], $_POST["to_date"])) {

//     $reportData = "";
//     $query = "SELECT * FROM reg WHERE datepicker BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";
//     $result = sqlStatement($query);



//     $reportData .='
//     <table class="table table-bordered">
//     <tr>
//     <th>patient_name</th>
//         <th>age</th>
//         <th>Address</th>
//         <th>Phone</th>
//         <th>Gender</th>
//         <th>Qualification</th>
//         <th>University</th>
//         <th>date</th>
//         <th>Blood Group</th>
//         <th>Height</th>
//         <th>Weight</th>
//         <th>Father Name</th>
//         <th>Mother Name</th>
//     </tr>';

//     while($row = sqlFetchArray($result))
//     {


//         $reportData .='
//         <tr>
//             <td>'.$row["patient_name"].'</td>
//             <td>'.$row["age"].'</td>
//             <td>'.$row["address"].'</td>
//             <td>'.$row["phone"].'</td>
//             <td>'.$row["gender"].'</td>
//             <td>'.$row["qualification"].'</td>
//             <td>'.$row["university"].'</td>
//             <td>'.$row["datepicker"].'</td>
//             <td>'.$row["blood_group"].'</td>
//             <td>'.$row["height"].'</td>
//             <td>'.$row["weight"].'</td>
//             <td>'.$row["father_name"].'</td>
//             <td>'.$row["mother_name"].'</td>
//             </tr>';

//     }
//     }
//     $reportData .= '</table>';
//     echo $reportData;


if(isset($_POST["from_date"], $_POST["to_date"])) {
    // $delimiter = ",";
    // $file_name = 'Report Data.csv';

    $file = fopen('php://output', 'w');

    $header = array("id", "patient_name", "age", "address", "phone","gender","qualification","university","datepicker","blood_group","height","weight","father_name","mother_name");
    fputcsv($file, $header,$delimiter);

    $query = "SELECT * FROM reg WHERE datepicker BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";
    $result = sqlStatement($query);
    while($row = sqlFetchArray($result))
    {
    // $imgURL ='../doctor_details/uploads/' . $row['image'];
    // $uploadfile='../tabviewdetails/exportcsv/' . $data;
    $data = array($row['id'], $row['patient_name'], $row['age'], $row['address'], $row['phone'],$row["gender"],$row['qualification'],$row['university'],$row['datepicker'],$row['blood_group'],$row['height'],$row['weight'],$row['father_name'],$row['mother_name']);
    fputcsv($file, $data);
    }
    }
    fseek($file, 0);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $file_name . '";');
    fpassthru($file);
    exit;

?>
