
<?php

require_once("../../globals.php");

// use OpenEMR\Common\Csrf\CsrfUtils;
// use OpenEMR\Core\Header;

///////////insert//////////////////////
if (isset($_POST['submit'])) {

    $patient_name = $_POST['patient_name'];

    $heart_rate = $_POST['heart_rate'];
    $Height = $_POST['Height'];
   $cm = $_POST['cm'];
    $weight = $_POST['weight'];
    $kg=$_POST['kg'];
    $extra_notes = $_POST['extra_notes'];



    $sql = "INSERT INTO pat (patient_name,heart_rate,Height,cm,weight,kg,extra_notes) VALUES ('$patient_name','$heart_rate','$Height', '$cm','$weight','$kg','$extra_notes')";

    $result = sqlStatement($sql);
    echo $result;
    if ($result == TRUE) {

     // echo "New record created successfully.";
     header('Location:add.php');

    }else{

      echo "Error:";

    }
}
$sql="select * from pat";
$res=sqlStatement($sql);
//echo $res;

///////delete//////////////
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM `pat` WHERE id=$id";

     $result = sqlStatement($sql);

     if ($result == TRUE) {

        //echo "Record deleted successfully.";
        //header('Location:add.php');
        //header('Location: '.$_SERVER['add.php']);
        //header("Location:https://www.formget.com/app/");

    }else{

        echo "Error:";

    }

}
///////edit//////




?>
<html>
    <head>
<title>Add</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  ADD
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" value="submit"  name="submit"  class="btn btn-primary">Save changes</button> -->
       <a href="add.php"> <button type="submit"value="submit"  name="submit"   class="btn btn-success">Submit</button></a>
        <a class="btn btn-success" value="submit"  name="submit"  href="add.php">add</a>
      </div>
    </div>
  </div>
</div>
        <div class="container col-md-8 mt-3">
        <form action="" method="POST" id="myform">
  <div class="mb-3 name">
    <label  class="form-label">patient name</label>
    <input type="text" class="form-control"  name="patient_name" id="patient_name" required >

  </div>
  <div class="mb-3 age">
    <label  class="form-label">heart rate</label>
    <input type="text" class="form-control" name="heart_rate" id="heart_rate" required>
  </div>
  <div class="mb-3 age">
    <label  class="form-label">Height</label>
    <input type="text" class="form-control" name="Height" id="height" required>
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
    <input type="text" class="form-control" name="weight" id="weight">
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

  <button type="submit"value="submit"  name="submit"   class="btn btn-success">Submit</button>
</form>
        <table class="table table-striped result">

<thead>

<tr>

<th>ID</th>

<th>patient name</th>
<th>heart rate</th>
<th>Height</th>
<th>CM/M</th>
<th>Weight</th>
<th>KG/LBS</th>
<th>Extra notes</th>
<th>Actions</th>
</tr>

</thead>

<tbody>

<?php
// echo $res;

while ($row = sqlFetchArray($res)) {

?>

<tr>

<th><?php echo $row['id']; ?></th>

<th><?php echo $row['patient_name']; ?></th>
<th><?php echo $row['heart_rate']; ?></th>
<th><?php echo $row['Height']; ?></th>
<th><?php echo $row['cm']; ?></th>
<th><?php echo $row['weight']; ?></th>
<th><?php echo $row['kg']; ?></th>
<th><?php echo $row['extra_notes']; ?></th>
<th><a class="btn btn-info" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
<a class="btn btn-danger" href="add.php?id=<?php echo $row['id']; ?>">Delete</a></th>
</tr> <?php }



?>
</tbody>

</table>
</div>

    </body>
</html>
<!-- <script >
    $('#myform').submit(function(){
 return false;
});

$('#insert').click(function(){
 $.post(
 $('#myform').attr('action'),
 $('#myform :input').serializeArray(),
//  function(result){
//  $('.result').html(result);
//  }
 );
});
</script> -->
<!-- <script type="text/javascript">
$(document).ready(function() {

	//##### Add record when Add Record Button is click #########
	$("#myform").submit(function (e) {
			e.preventDefault();
			if($("#patient_name").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
		 	var myData1 = 'patient_txt='+ $("#patient_name").val(); //build a post data structure

       if($("#heart_rate").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
		 	var myData2 = 'heart_txt='+ $("#heart_rate").val(); //build a post data structure

       if($("#height").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
		 	var myData3 = 'height_txt='+ $("#height").val(); //build a post data structure

       if($("#cm").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
		 	var myData4 = 'cm='+ $("#cm").val(); //build a post data structure

       if($("#weight").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
		 	var myData5 = 'weight_txt='+ $("#weight").val(); //build a post data structure

       if($("#kg").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
		 	var myData6 = 'kg_txt='+ $("#kg").val(); //build a post data structure extra_notes

       if($("#extra_notes").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
		 	var myData7 = 'extra_notes='+ $("#extra_notes").val();

			jQuery.ajax({
			type: "POST", // Post / Get method
			url: "response.php", //Where form data is sent on submission
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				$(".result").append(response);
				$('#patient_name').val("")
        $('#heart_rate').val("")
        $('#height').val("")
        $('#cm').val("")
        $('#weight').val("")
        $('#kg').val("")
        $('#extra_notes').val("")
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
	});

});
</script> -->
