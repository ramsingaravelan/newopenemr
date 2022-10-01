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
    $datepicker = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['datepicker'])));
    $blood_group = $_POST['blood_group'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];


    $sql = "INSERT INTO reg (patient_name,age,address,phone,gender,qualification,university,datepicker,blood_group,height,weight,father_name,mother_name) VALUES ('$patient_name','$age','$address', '$phone','$gender','$qualification','$university','$datepicker','$blood_group',' $height','$weight',' $father_name','$mother_name')";

    $result = sqlStatement($sql);
    if ($result == TRUE) {

        echo "New record created successfully.";
    } else {

        echo "Error:";
    }
}
$sql = "select * from reg";
$res = sqlStatement($sql);

if(isset($_POST['importSubmit'])){
    $csv = array('application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csv)){


        if(is_uploaded_file($_FILES['file']['tmp_name'])){


            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');


            fgetcsv($csvFile);


            while(($lon = fgetcsv($csvFile,1000,",")) !== FALSE){


                $patient_name   = $lon[0];
                $age  = $lon[1];
                $address   = $lon[2];
                $phone = $lon[3];
                $gender =$lon[4];
                $qualification=$lon[5];
                $university=$lon[6];
                $datepicker=$lon[7];
                $blood_group=$lon[8];
                $height =$lon[9];
                $weight =$lon[10];
                $father_name =$lon[11];
                $mother_name =$lon[12];


                $sql = "INSERT INTO reg (patient_name,age,address,phone,gender,qualification,university,datepicker,blood_group,height,weight,father_name,mother_name) VALUES ('$patient_name','$age','$address', '$phone','$gender','$qualification','$university','$datepicker','$blood_group',' $height','$weight',' $father_name','$mother_name')";
                    $result = sqlStatement($sql);

            }


            fclose($csvFile);

            $qstring = '?status=succ';
            header('Location:report.php');
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

?>

<title>report</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <style>
  .box
  {
   width:1000px;
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
   background-color: #fff;
   color: #333;
   /* cursor: not-allowed; */
  }
  /* .has-error
  {
   border-color:#cc0000;
   background-color:#ffff99;
  } */
  #tblCustomers{
    width: 1500px;
    margin-left: 250px;
  }
  .form-group{
    margin-top: 10px;
}
.pdf{
    margin-left: 1650px;
    margin-bottom:80px;
}
  </style>
  <div class="col-md-12">
<div class="container box" id="tabs">
    <form method="post" action="" id="register_form" enctype="multipart/form-data">
    <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Patient Details</a></li>
    <li><a href="#tab2" data-toggle="tab">Education Details</a></li>
    <li><a href="#tab3" data-toggle="tab">Medical Details</a></li>
    <li><a href="#tab4" data-toggle="tab">Parents Details</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="tab1">
    <div class="panel panel-primary">
       <div class="panel-heading">Patient Details</div>

       <div class="panel-body">
    <div class="form-group ">
         <label>Patient Name</label>
         <input type="text" name="patient_name" id="patient_name" class="form-control" />

        </div>
        <div class="form-group">
         <label>Age</label>
         <input type="text" name="age" id="age" class="form-control"  />

        </div>
        <div class="form-group">
         <label>Address</label>
         <textarea class="form-control" id="address" name="address" rows="3"></textarea>

        </div>
        <div class="form-group">
         <label>Phone number</label>
         <input type="text" name="phone" id="phone" class="form-control" />

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
        <div align="center">
        <a class="btn btn-info btn-lg btnNext" >Next</a>
        </div>
</div>
</div>
    </div>
    <div class="tab-pane" id="tab2">
    <div class="panel panel-primary">
       <div class="panel-heading">Education Details</div>

       <div class="panel-body">
    <div class="form-group">
         <label>Qualification</label>
         <input type="text" name="qualification" id="qualification" class="form-control"  />

        </div>
        <div class="form-group">
         <label>University</label>
         <input type="text" name="university" id="university" class="form-control"  />

        </div>
        <div class="form-group">
                <label class="form-label">Date</label>
                <input type="text" class="form-control" name="datepicker" id="datepicker">
            </div>
        <div  align="center">
        <a class="btn btn-warning btn-lg btnPrevious" >Previous</a>
        <a class="btn btn-info btn-lg btnNext" >Next</a>
        </div>
</div>
</div>
    </div>
    <div class="tab-pane" id="tab3">
    <div class="panel panel-primary">
       <div class="panel-heading">Medical Details</div>

       <div class="panel-body">
    <div class="form-group">
         <label>Blood group</label>
         <input type="text" name="blood_group" id="blood_group" class="form-control"  />
         </div>
        <div class="form-group">
         <label>Height</label>
         <input type="text" name="height" id="height" class="form-control"  />

        </div>
        <div class="form-group">
         <label>Weight</label>
         <input type="text" name="weight" id="weight" class="form-control" />

        </div>
        <div  align="center">
        <a class="btn btn-warning btn-lg btnPrevious" >Previous</a>
    <a class="btn btn-info btn-lg btnNext" >Next</a>
        </div>
</div>
</div>
    </div>
    <div class="tab-pane" id="tab4">
    <div class="panel panel-primary">
       <div class="panel-heading">Parents Details</div>

       <div class="panel-body">
    <div class="form-group">
         <label>Father Name</label>
         <input type="text" name="father_name" id="father_name" class="form-control"  />

        </div>
        <div class="form-group">
         <label>Mother Name</label>
         <input type="text" name="mother_name" id="mother_name" class="form-control" />

        </div>

        <div  align="center">
        <a class="btn btn-warning btn-lg btnPrevious" >Previous</a>
        <button type="submit" value="submit" name="submit"  id="btn_parents_details" class="btn btn-success btn-lg">Submit</button>
</div>
</div>
</div>
    </div>
</div>
<div class="form-group">
        <label>Import csv file :</label>
        <input type="file" name="file" />
            <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
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
        <th>Date</th>
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
            <th><?php echo $row['datepicker']; ?></th>
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

    <a href="fliter.php" class="btn btn-danger">Report Generate</a>
    </div>



<script>


  $('.btnNext').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});

  $('.btnPrevious').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});
$(function() {
        $("#datepicker").datepicker({
            dateFormat: 'dd-mm-yy'
        });
    });
</script>
