<?php
require_once("../../globals.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql="SELECT * FROM reg WHERE id=$id";
    $result=sqlStatement($sql);

    $res=sqlFetchArray($result);
    //echo $res['patient_name'];
    if(isset($_POST['submit']))
    {
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

        $sql="update reg set id=$id,patient_name= '$patient_name ',age=' $age',address=' $address',phone='$phone',gender='$gender',qualification='$qualification',university='$university',datepicker='$datepicker',blood_group='$blood_group',height='$height',weight='$weight',father_name='$father_name',mother_name='$mother_name' where id=$id";

        $result=sqlStatement($sql);
        if($result)
        {
            // echo "Data updated successfully";
            header('location:report.php');
        }
        else{
            echo "Error:";
        }
    }
    }

?>

<title>updatereport</title>
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
         <input type="text" name="patient_name" id="patient_name" value="<?php echo $res['patient_name']; ?>"class="form-control" />

        </div>
        <div class="form-group">
         <label>Age</label>
         <input type="text" name="age" id="age" class="form-control" value="<?php echo $res['age']; ?>" />

        </div>
        <div class="form-group">
         <label>Address</label>
         <textarea class="form-control" id="address" name="address" rows="3"><?php echo $res['address']; ?></textarea>

        </div>
        <div class="form-group">
         <label>Phone number</label>
         <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $res['phone']; ?>" />

        </div>
        <div class="form-group">
         <label>Gender</label>
         <label class="radio-inline">
          <input type="radio" name="gender" value="male" <?php if($res['gender']=="male"){ echo "checked";}?> > Male
         </label>
         <label class="radio-inline">
          <input type="radio" name="gender" value="female" <?php if($res['gender']=="female"){ echo "checked";}?> > Female
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
         <input type="text" name="qualification" id="qualification" class="form-control" value="<?php echo $res['qualification']; ?>"  />

        </div>
        <div class="form-group">
         <label>University</label>
         <input type="text" name="university" id="university" class="form-control" value="<?php echo $res['university']; ?>" />

        </div>
        <div class="form-group">
                <label class="form-label">Date</label>
                <input type="text" class="form-control" name="datepicker" id="datepicker" value="<?php echo $res['datepicker']; ?>">
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
         <input type="text" name="blood_group" id="blood_group" class="form-control" value="<?php echo $res['blood_group']; ?>"  />
         </div>
        <div class="form-group">
         <label>Height</label>
         <input type="text" name="height" id="height" class="form-control" value="<?php echo $res['height']; ?>"  />

        </div>
        <div class="form-group">
         <label>Weight</label>
         <input type="text" name="weight" id="weight" class="form-control" value="<?php echo $res['weight']; ?>" />

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
         <input type="text" name="father_name" id="father_name" class="form-control" value="<?php echo $res['father_name']; ?>"  />

        </div>
        <div class="form-group">
         <label>Mother Name</label>
         <input type="text" name="mother_name" id="mother_name" class="form-control" value="<?php echo $res['mother_name']; ?>" />

        </div>

        <div  align="center">
        <a class="btn btn-warning btn-lg btnPrevious" >Previous</a>
        <button type="submit" value="submit" name="submit"  id="btn_parents_details" class="btn btn-success btn-lg">Submit</button>
</div>
</div>
</div>
    </div>
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
