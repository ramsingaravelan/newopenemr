<?php
require_once("../../globals.php");


if (isset($_POST['submit'])) {

    $patient_name = $_POST['patient_name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $qualification = $_POST['qualification'];
    $university = $_POST['university'];
    $blood_group = $_POST['blood_group'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    // echo $name;

    $sql = "INSERT INTO reg (patient_name,age,address,phone,gender,qualification,university,blood_group,height,weight,father_name,mother_name) VALUES ('$patient_name','$age','$address', '$phone','$gender','$qualification','$university','$blood_group',' $height','$weight',' $father_name','$mother_name')";
    // echo $sql;
    $result = sqlStatement($sql);
    if ($result == TRUE) {

        echo "New record created successfully.";
    } else {

        echo "Error:";
    }
}
$sql = "select * from reg";
$res = sqlStatement($sql);


?>

<title>report</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<style>
  .box
  {
   width:800px;
   margin:0 auto;
   margin-top: 50px;
  }
  .active_tab1
  {
   background-color:#fff;
   color:#333;
   font-weight: 600;
  }
  .inactive_tab1
  {
   background-color: #f5f5f5;
   color: #333;
   /* cursor: not-allowed; */
  }
  .has-error
  {
   border-color:#cc0000;
   background-color:#ffff99;
  }
  </style>
<div class="container box">
    <form method="post" action="" id="register_form">
    <ul class="nav nav-tabs">
     <li class="nav-item">
      <a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_patient_details">Patient Details</a>
     </li>
     <li class="nav-item">
      <a class="nav-link inactive_tab1" href="#step2" id="list_education_details" style="border:1px solid #ccc">Education Details</a>
     </li>
     <li class="nav-item">
      <a class="nav-link inactive_tab1" id="list_medical_details" style="border:1px solid #ccc">Medical Details</a>
     </li>
     <li class="nav-item">
      <a class="nav-link inactive_tab1" id="list_parents_details" style="border:1px solid #ccc">Parents Details</a>
     </li>
    </ul>
    <div class="tab-content">
    <div class="tab-pane active" id="patient_details">
      <div class="panel panel-default">
       <div class="panel-heading">Patient Details</div>

       <div class="panel-body">
        <div class="form-group">
         <label>Patient Name</label>
         <input type="text" name="patient_name" id="patient_name" class="form-control" required/>
         <span id="error_patient_name" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>Age</label>
         <input type="text" name="age" id="age" class="form-control" required />
         <span id="error_age" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>Address</label>
         <textarea class="form-control" id="address" name="address" rows="3"></textarea>
         <span id="error_address" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>Phone number</label>
         <input type="text" name="phone" id="phone" class="form-control" required/>
         <span id="error_phone" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>Gender</label>
         <label class="radio-inline">
          <input type="radio" name="gender" value="male" checked> Male
         </label>
         <label class="radio-inline">
          <input type="radio" name="gender" value="female"> Female
         </label>
        </div>
        <br />
        <div align="center">
         <button type="button" name="btn_patient_details" id="btn_patient_details" class="btn btn-info btn-lg">Next</button>
        </div>
        <br />
       </div>

      </div>
     </div>


<div class="tab-pane fade" id="education_details">
      <div class="panel panel-default">
       <div class="panel-heading">Education Details</div>

       <div class="panel-body">
        <div class="form-group">
         <label>Qualification</label>
         <input type="text" name="qualification" id="qualification" class="form-control" required />
         <span id="error_qualification" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>University</label>
         <input type="text" name="university" id="university" class="form-control" required />
         <span id="error_university" class="text-danger"></span>
        </div>

        <br />
        <div align="center">
        <button type="button" name="previous_btn_education_details" id="previous_btn_education_details" class="btn btn-default btn-lg">Previous</button>
         <button type="button" name="btn_education_details" id="btn_education_details" class="btn btn-info btn-lg">Next</button>
        </div>
        <br />
       </div>

      </div>
     </div>
     <div class="tab-pane fade" id="medical_details">
      <div class="panel panel-default">
       <div class="panel-heading">Medical Details</div>

       <div class="panel-body">
        <div class="form-group">
         <label>Blood group</label>
         <input type="text" name="blood_group" id="blood_group" class="form-control" required />
         <span id="error_blood_group" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>Height</label>
         <input type="text" name="height" id="height" class="form-control" required />
         <span id="error_height" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>Weight</label>
         <input type="text" name="weight" id="weight" class="form-control" required/>
         <span id="error_weight" class="text-danger"></span>
        </div>
        <br />
        <div align="center">
        <button type="button" name="previous_btn_medical_details" id="previous_btn_medical_details" class="btn btn-default btn-lg">Previous</button>
         <button type="button" name="btn_medical_details" id="btn_medical_details" class="btn btn-info btn-lg">Next</button>
        </div>
        <br />
       </div>

      </div>
     </div>
     <div class="tab-pane fade" id="parents_details">
      <div class="panel panel-default">
       <div class="panel-heading">Parents Details</div>
       <fieldset>
       <div class="panel-body">
        <div class="form-group">
         <label>Father Name</label>
         <input type="text" name="father_name" id="father_name" class="form-control" required />
         <span id="error_father_name" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>Mother Name</label>
         <input type="text" name="mother_name" id="mother_name" class="form-control" required/>
         <span id="error_mother_name" class="text-danger"></span>
        </div>

        <br />
        <div align="center">
        <button type="button" name="previous_btn_parents_details" id="previous_btn_parents_details" class="btn btn-default btn-lg">Previous</button>
         <!-- <button type="button" value="submit" name="btn_parents_details" id="btn_parents_details submit" class="btn btn-info btn-lg">Submit</button> -->
         <button type="submit" value="submit" name="submit"  id="btn_parents_details" class="btn btn-success btn-lg">Submit</button>
        </div>
        <br />
       </div>

      </div>
     </div>
</div>
    </form>
</div>
<div class="table">
<table class="table table-striped result" id="tblCustomers">

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
        <th>Blood Group</th>
        <th>Height</th>
        <th>Weight</th>
        <th>Father Name</th>
        <th>Mother Name</th>
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
            <th><?php echo $row['age']; ?></th>
            <th><?php echo $row['address']; ?></th>
            <th><?php echo $row['phone']; ?></th>
            <th><?php echo $row['gender']; ?></th>
            <th><?php echo $row['qualification']; ?></th>
            <th><?php echo $row['university']; ?></th>
            <th><?php echo $row['blood_group']; ?></th>
            <th><?php echo $row['height']; ?></th>
            <th><?php echo $row['weight']; ?></th>
            <th><?php echo $row['father_name']; ?></th>
            <th><?php echo $row['mother_name']; ?></th>
        </tr> <?php }



                ?>
</tbody>

</table>
    </div>
<script>
  $(document).ready(function(){
    $('#btn_patient_details').click(function(){
//         var error_patient_name='';
//         var error_age='';
//         var error_address='';
//         var error_phone='';

//         if($.trim($('#patient_name').val()).length == 0)
//   {
//     error_patient_name = 'patient Name is required';
//    $('#error_patient_name').text(error_patient_name);
//    $('#patient_name').addClass('has-error');
//   }
//   else
//   {
//     error_patient_name = '';
//    $('#error_patient_name').text(error_patient_name);
//    $('#patient_name').removeClass('has-error');
//   }

//   if($.trim($('#age').val()).length == 0)
//   {
//     error_age = 'age is required';
//    $('#error_age').text(error_age);
//    $('#age').addClass('has-error');
//   }
//   else
//   {
//     error_age = '';
//    $('#error_age').text(error_age);
//    $('#age').removeClass('has-error');
//   }
//   if($.trim($('#address').val()).length == 0)
//   {
//     error_address = 'address is required';
//    $('#error_address').text(error_address);
//    $('#address').addClass('has-error');
//   }
//   else
//   {
//     error_address = '';
//    $('#error_address').text(error_address);
//    $('#address').removeClass('has-error');
//   }
//   if($.trim($('#phone').val()).length == 0)
//   {
//     error_phone = 'address is required';
//    $('#error_address').text(error_phone);
//    $('#phone').addClass('has-error');
//   }
//   else
//   {
//     error_phone = '';
//    $('#error_phone').text(error_address);
//    $('#phone').removeClass('has-error');
//   }
//   if(error_patient_name != '' || error_age != '' || error_address != '' || error_phone != ''   )
//   {
//    return false;
//   }
//   else
//   {
   $('#list_patient_details').removeClass('active active_tab1');
   $('#list_patient_details').removeAttr('href data-toggle');
   $('#patient_details').removeClass('active');
   $('#list_patient_details').addClass('inactive_tab1');
   $('#list_education_details').removeClass('inactive_tab1');
   $('#list_education_details').addClass('active_tab1 active');
   $('#list_education_details').attr('href', '#education_details');
   $('#list_education_details').attr('data-toggle', 'tab');
   $('#education_details').addClass('active in');
 // }
    });

    $('#previous_btn_education_details').click(function(){
  $('#list_education_details').removeClass('active active_tab1');
  $('#list_education_details').removeAttr('href data-toggle');
  $('#education_details').removeClass('active in');
  $('#list_education_details').addClass('inactive_tab1');
  $('#list_patient_details').removeClass('inactive_tab1');
  $('#list_patient_details').addClass('active_tab1 active');
  $('#list_patient_details').attr('href', '#patient_details');
  $('#list_patient_details').attr('data-toggle', 'tab');
  $('#patient_details').addClass('active in');
 });

$('#btn_education_details').click(function(){
//         var error_qualification='';
//         var error_university='';


//         if($.trim($('#qualification').val()).length == 0)
//   {
//     error_qualification = 'qualification is required';
//    $('#error_qualification').text(error_patient_name);
//    $('#qualification').addClass('has-error');
//   }
//   else
//   {
//     error_qualification = '';
//    $('#error_qualification').text(error_qualification);
//    $('#qualification').removeClass('has-error');
//   }

//   if($.trim($('#university').val()).length == 0)
//   {
//     error_university = 'university is required';
//    $('#error_university').text(error_university);
//    $('#university').addClass('has-error');
//   }
//   else
//   {
//     university = '';
//    $('#error_university').text(error_university);
//    $('#university').removeClass('has-error');
//   }

//   if(error_qualification != '' || error_university != '' )
//   {
//    return false;
//   }
//   else
//   {
   $('#list_education_details').removeClass('active active_tab1');
   $('#list_education_details').removeAttr('href data-toggle');
   $('#education_details').removeClass('active');
   $('#list_education_details').addClass('inactive_tab1');
   $('#list_medical_details').removeClass('inactive_tab1');
   $('#list_medical_details').addClass('active_tab1 active');
   $('#list_medical_details').attr('href', '#medical_details');
   $('#list_medical_details').attr('data-toggle', 'tab');
   $('#medical_details').addClass('active in');
  //}
    });

    $('#previous_btn_medical_details').click(function(){
  $('#list_medical_details').removeClass('active active_tab1');
  $('#list_medical_details').removeAttr('href data-toggle');
  $('#medical_details').removeClass('active in');
  $('#list_education_details').addClass('inactive_tab1');
  $('#list_education_details').removeClass('inactive_tab1');
  $('#list_education_details').addClass('active_tab1 active');
  $('#list_education_details').attr('href', '#patient_details');
  $('#list_education_details').attr('data-toggle', 'tab');
  $('#education_details').addClass('active in');
 });


$('#btn_medical_details').click(function(){
//         var error_blood_group='';
//         var error_height='';
//         var error_weight='';

//         if($.trim($('#blood_group').val()).length == 0)
//   {
//     error_blood_group = 'blood_group is required';
//    $('#error_blood_group').text(error_blood_group);
//    $('#blood_group').addClass('has-error');
//   }
//   else
//   {
//     blood_group = '';
//    $('#error_blood_group').text(error_blood_group);
//    $('#blood_group').removeClass('has-error');
//   }

//   if($.trim($('#height').val()).length == 0)
//   {
//     error_height = 'height is required';
//    $('#error_height').text(error_height);
//    $('#height').addClass('has-error');
//   }
//   else
//   {
//     height = '';
//    $('#error_height').text(error_height);
//    $('#height').removeClass('has-error');
//   }
//   if($.trim($('#weight').val()).length == 0)
//   {
//     error_weight = 'height is required';
//    $('#error_weight').text(error_weight);
//    $('#weight').addClass('has-error');
//   }
//   else
//   {
//     weight = '';
//    $('#error_weight').text(error_weight);
//    $('#weight').removeClass('has-error');
//   }

//   if(error_blood_group != '' || error_height != ''  || error_weight != '' )
//   {
//    return false;
//   }
//   else
//   {
   $('#list_medical_details').removeClass('active active_tab1');
   $('#list_medical_details').removeAttr('href data-toggle');
   $('#medical_details').removeClass('active');
   $('#list_medical_details').addClass('inactive_tab1');
   $('#list_parents_details').removeClass('inactive_tab1');
   $('#list_parents_details').addClass('active_tab1 active');
   $('#list_parents_details').attr('href', '#parents_details');
   $('#list_parents_details').attr('data-toggle', 'tab');
   $('#parents_details').addClass('active in');
  //}
    });

    $('#previous_btn_parents_details').click(function(){
  $('#list_parents_details').removeClass('active active_tab1');
  $('#list_parents_details').removeAttr('href data-toggle');
  $('#parents_details').removeClass('active in');
  $('#list_medical_details').addClass('inactive_tab1');
  $('#list_medical_details').removeClass('inactive_tab1');
  $('#list_medical_details').addClass('active_tab1 active');
  $('#list_medical_details').attr('href', '#medical_details');
  $('#list_medical_details').attr('data-toggle', 'tab');
  $('#medical_details').addClass('active in');
 });


 $('#btn_parents_details').click(function(){
//         var error_father_name='';
//         var error_mother_name='';


//         if($.trim($('#father_name').val()).length == 0)
//   {
//     error_father_name = 'father_name is required';
//    $('#error_father_name').text(error_father_name);
//    $('#father_name').addClass('has-error');
//   }
//   else
//   {
//     father_name = '';
//    $('#error_father_name').text(error_father_name);
//    $('#father_name').removeClass('has-error');
//   }

//   if($.trim($('#mother_name').val()).length == 0)
//   {
//     error_mother_name = 'mother_name is required';
//    $('#error_mother_name').text(error_mother_name);
//    $('#mother_name').addClass('has-error');
//   }
//   else
//   {
//     mother_name = '';
//    $('#error_mother_name').text(error_mother_name);
//    $('#mother_name').removeClass('has-error');
//   }


//   if(error_father_name != '' || error_mother_name != ''      )
//   {
//    return false;
//   }
//   else
//   {
    // $('#btn_parents_details').attr("disabled", "disabled");
//    $(document).css('cursor', 'prgress');
//    $("#register_form").submit();
  //}

 });
  });

</script>
