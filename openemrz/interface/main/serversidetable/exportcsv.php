<?php
require_once("../../globals.php");



if(isset($_POST["start_date"], $_POST["end_date"],$_POST['filter_gender'])) {
    // $delimiter = ",";
    // $file_name = 'Report Data.csv';

    $file = fopen('php://output', 'w');

    $header = array("id", "patient_name", "age", "address", "phone","gender","qualification","university","datepicker","blood_group","height","weight","father_name","mother_name");
    fputcsv($file, $header,$delimiter);

    $query = "SELECT * FROM reg WHERE datepicker BETWEEN '".$_POST["start_date"]."' AND '".$_POST["end_date"]."' AND gender= '".$_POST["filter_gender"]."'";
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
