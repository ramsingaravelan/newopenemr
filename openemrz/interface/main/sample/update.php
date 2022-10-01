
<?php
// require_once("../globals.php");
require_once "../globals.php";

use OpenEMR\Common\Csrf\CsrfUtils;
use OpenEMR\Core\Header;
// $id=$_GET['id'];
//$sql="SELECT *  FROM form_pt WHERE id=$id";
//$result=sqlStatement($sql);
// echo $result;
//  $row=sqlFetchArray($result);

//  $patient_name = $row['patient_name'];

//     $heart_rate = $row['heart_rate'];
//     $Height = $row['Height'];
//    $cm = $row['cm'];
//     $weight = $row['weight'];
//     $kg=$row['kg'];
//     $extra_notes = $row['extra_notes'];
// if(isset($_POST['submit']))
// {
//     $name=$_POST['name'];
//     $email=$_POST['email'];

//     $sql="update form_pt set id=$id,patient_name= '$patient_name ',heart_rate=' $heart_rate',Height=' $Height',cm='$cm',weight='$weight',kg='$kg',extra_notes='$extra_notes' where id=$id";

//     $result=sqlStatement($sql);
//     if($result)
//     {
//         // echo "Data updated successfully";
//         header('location:add.php');
//     }
//     else{
//         echo "Error:";
//     }
// }
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql="SELECT * FROM pat WHERE id=$id";
    $result=sqlStatement($sql);
    echo $result;

    }
?>


<!-- <html>
   <head>
<title>update</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    .age{
        margin-top: 5px;
        margin-bottom: 5px;
    }
    /* table, tr, th {
  border:1px solid black;
} */

</style>
    </head>
    <body>
        <div class="container col-md-8 mt-3">
        <form action="" method="POST">
  <div class="mb-3 name">
    <label  class="form-label">patient name</label>
    <input type="text" class="form-control"  name="patient_name" id="patient_name" required >

  </div>
  <div class="mb-3 age">
    <label  class="form-label">heart rate</label>
    <input type="number" class="form-control" name="heart_rate" id="heart_rate" required>
  </div>
  <div class="mb-3 age">
    <label  class="form-label">Height</label>
    <input type="number" class="form-control" name="Height" id="height" required>
  </div>
  <div class="mb-3 age">
    <label  class="form-label">CM/M</label>
    <select class="form-control form-control-lg" name="cm" id="cm" required>
    <option value="">Select CM/M</option>
        <option value="cm">cm</option>
        <option value="m">m</option>
    </select>
  </div>
  <div class="mb-3 age">
    <label  class="form-label">Weight</label>
    <input type="number" class="form-control" name="weight" id="weight">
  </div>
  <div class="mb-3 age">
    <label  class="form-label">KG/LBS</label>

    <select class="form-control form-control-lg" name="kg" id="kg" required>
    <option value="">Select KG/LBS</option>
  <option  value="kg">kg</option>
  <option  value="lbs">LBS</option>
</select>
  </div>
  <div class="mb-3 age">
    <label  class="form-label">Extra notes</label>


<textarea class="form-control" id="extra_notes" name="extra_notes" rows="3"></textarea>
  </div>

  <button type="submit"  value="submit" name="submit" class="btn btn-success">Submit</button>
</form>
    </body>
</html> -->
