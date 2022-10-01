<?php

require_once("../globals.php");
if(isset($_POST["hidden_status"]))
{
	$status=$_POST['hidden_status'];



$sql = "INSERT INTO facility(status) VALUES ('".$status."')";

$result=sqlStatement($sql);
echo $result;
}




// $id=$_POST['id'];
// $sql="SELECT * FROM facility WHERE id=$id";
// $result=sqlStatement($sql);
// $data=sqlFetchArray($result);
// $status= $data['status'];

// if($status =='1'){
//     $status ='0';
// }
// else{
//     $status='1';
// }
// $update="INSERT INTO facility (status) VALUES ('$status')";
// $result1=sqlStatement($update);
// if($result1){
//     echo $status;
// }
?>
