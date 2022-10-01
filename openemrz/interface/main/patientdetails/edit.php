
<?php
require_once("../../globals.php");

if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql="SELECT * FROM pat WHERE id=$id";
$result=sqlStatement($sql);

$res=sqlFetchArray($result);
//echo $res['patient_name'];
if(isset($_POST['submit']))
{
    $patient_name=$_POST['patient_name'];
    $heart_rate=$_POST['heart_rate'];
    $Height=$_POST['Height'];
    $cm = $_POST['cm'];
    $weight = $_POST['weight'];
    $kg=$_POST['kg'];
    $extra_notes = $_POST['extra_notes'];

    $sql="update pat set id=$id,patient_name= '$patient_name ',heart_rate=' $heart_rate',Height=' $Height',cm='$cm',weight='$weight',kg='$kg',extra_notes='$extra_notes' where id=$id";

    $result=sqlStatement($sql);
    if($result)
    {
        // echo "Data updated successfully";
        header('location:insert.php');
    }
    else{
        echo "Error:";
    }
}
}
?>
 <html>
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
    <input type="text" class="form-control"  name="patient_name" id="patient_name"  value="<?php echo $res['patient_name']; ?>" required >

  </div>
  <div class="mb-3 age">
    <label  class="form-label">heart rate</label>
    <input type="text" class="form-control" name="heart_rate" id="heart_rate" value="<?php echo $res['heart_rate']; ?>"required>
  </div>
  <div class="mb-3 age">
    <label  class="form-label">Height</label>
    <input type="text" class="form-control" name="Height" id="height"value="<?php echo $res['Height']; ?> "required>
  </div>
  <div class="mb-3 age">
    <label  class="form-label">CM/M</label>
    <select class="form-control form-control-lg" name="cm" id="cm" >
    <option value=""><?php echo $res['cm']; ?></option>
        <option value="cm">cm</option>
        <option value="m">m</option>
    </select>
  </div>
  <div class="mb-3 age">
    <label  class="form-label">Weight</label>
    <input type="text" class="form-control" name="weight" id="weight" value="<?php echo $res['weight']; ?>"required>
  </div>
  <div class="mb-3 age">
    <label  class="form-label">KG/LBS</label>

    <select class="form-control form-control-lg" name="kg" id="kg" value="" >
    <option value=""><?php echo $res['kg']; ?></option>
  <option  value="kg">kg</option>
  <option  value="lbs">lbs</option>
</select>
  </div>
  <div class="mb-3 age">
    <label  class="form-label">Extra notes</label>


<textarea class="form-control" id="extra_notes" name="extra_notes" value="" rows="3"><?php echo $res['extra_notes']; ?></textarea>
  </div>

  <button type="submit"  value="submit" name="submit" class="btn btn-success">Submit</button>
</form>
    </body>
</html>
