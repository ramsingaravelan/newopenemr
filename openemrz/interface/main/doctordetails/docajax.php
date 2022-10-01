<?php
require_once("../../globals.php");
// require_once("../../insert.php");

// if (isset($_POST['submit'])) {

    // $targetDir = "./uploads/";
    // //  print_r($_FILES); die;
    // $fileName = basename($_FILES["image"]["name"]);
    // $targetFilePath = $targetDir . $fileName;

    // $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    // // $keys = array_keys($_FILES["image"]);
    // //  if (isset($_POST['submit'])) {
    //     print_r($_POST);die;
    //     $doctor_name = $_POST['doctor_name'];

    //     $specification = $_POST['specification'];
    //     $email = $_POST['email'];
    //     $phone = $_POST['phone'];
    //     $clinic_name = $_POST['clinic_name'];
    //     $datepicker=date('Y-m-d', strtotime(str_replace('/', '-', $_POST['datepicker'])));
    //     // $fileName=$_POST['image'];
    //     $allowTypes = array('jpg','png','jpeg','gif','pdf');
    //     // if(move_uploaded_file ($_FILES['image']['tmp_name'] , $targetFilePath))
    //     //     // Upload file to server
    //     //   {

    //     $sql = "INSERT INTO doctor (doctor_name,specification,email,phone,clinic_name,datepicker,image) VALUES ('$doctor_name',' $specification',' $email', '$phone',' $clinic_name','$datepicker','$fileName')";
    //     // echo $sql;
    //     $result=sqlStatement($sql);
    //     if ($result == TRUE) {

    //         echo "New record created successfully.";

    //       }else{

    //         echo "Error:";

    //       }
    //       if (move_uploaded_file($_FILES['image']['tmp_name'] , $targetFilePath)) {
    //         echo "  Image uploaded successfully!";
    //     } else {
    //         echo " Failed to upload image!";
    //     }
    //     // }

    // // }




    move_uploaded_file($image_temp, "./uploads/" . $_FILES["image"]["name"]);
    $doctor_name = $_POST['doctor_name'];

    $specification = $_POST['specification'];

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $clinic_name = $_POST['clinic_name'];
    $datepicker = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['datepicker'])));
    $image = $_FILES["image"]["name"];
    $doctor_name_list = implode(',', $_POST['doctor_name_list']);
    $doctor_name_search = $_POST['doctor_name_search'];
    $sql = "INSERT INTO doctor (doctor_name,specification,email,phone,clinic_name,datepicker,image,doctor_name_list,doctor_name_search) VALUES ('$doctor_name',' $specification',' $email', '$phone',' $clinic_name','$datepicker','$image','$doctor_name_list','$doctor_name_search')";

    $result = sqlStatement($sql);
    if ($result == TRUE) {

      echo "New record created successfully.";
    } else {

      echo "Error:";
    }

    // }

?>
