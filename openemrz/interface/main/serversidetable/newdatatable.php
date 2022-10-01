<?php
require_once("../../globals.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM reg WHERE id=$id";
    $result = sqlStatement($sql);

    if ($result == TRUE) {
        header('Location:newdatatable.php');
        // echo "Record deleted successfully.";

    } else {


        echo "Error:";
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "update from reg where id=$id";
        $res = sqlStatement($sql);
        echo $res;
    }
}
?>
<title>multiFilter-newdatatable</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1370px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
   #search{
       margin-top: 35px;
   }
  </style>


 </head>
 <body>
  <div class="container box">

   <br />
   <div class="table-responsive">
    <br />

<div class="col-md-12">
    <div class="row">
    <div class="col-md-3 dat">
    <div class="form-group">
                <label class="form-label">FromDate</label>
                <input type="text" name="start_date" id="start_date" class="form-control" />

            </div>
    </div>
    <div class="col-md-3 dat">
    <div class="form-group">
                <label class="form-label">ToDate</label>
                <input type="text" name="end_date" id="end_date" class="form-control" />
            </div>
    </div>
    <div class="col-md-3 dat">
    <div class="form-group">
    <label class="form-label">Gender</label>
    <select name="filter_gender" id="filter_gender" class="form-control" required>
       <option value="">Select Gender</option>
       <option value="Male">Male</option>
       <option value="Female">Female</option>
      </select>
            </div>
    </div>
    <div class="col-md-3">
    <input type="button" name="search" id="search" value="Search" class="btn btn-info" />
    </div>
</div>
</div>
    <br />
    <table id="order_data" class="table table-bordered table-striped">
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
<th>date</th>
<th>Blood Group</th>
<th>Height</th>
<th>Weight</th>
<th>Father Name</th>
<th>Mother Name</th>
<th>Delete</th>
<th>Edit</th>
      </tr>
     </thead>
    </table>

   </div>
  </div>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){

//  $('.input-daterange').datepicker({
//   todayBtn:'linked',
//   format: "yyyy-mm-dd",
//   autoclose: true
//  });
$.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
           });
           $(function(){
                $("#start_date").datepicker();
                $("#end_date").datepicker();
           });



 function fetch_data( start_date='', end_date='',filter_gender='')
 {
  var dataTable = $('#order_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   "order" : [],
   "ajax" : {
    url:"range.php",
    type:"POST",
    data:{
      start_date:start_date, end_date:end_date,filter_gender
    }
   }
  });
 }

 $('#search').click(function(){
  var start_date = $('#start_date').val();
  var end_date = $('#end_date').val();
  var filter_gender = $('#filter_gender').val();
  if(start_date != '' && end_date !='' && filter_gender !='')
  {
    $.ajax({
                          url:"exportcsv.php",
                          method:"POST",
                          data:{start_date:start_date, end_date:end_date,filter_gender:filter_gender},
                          success:function(data)
                          {
                            //    $('#tblCustomers').html(data);
                               var downloadLink = document.createElement("a");
var fileData = ['\ufeff'+data];
var blobObject = new Blob(fileData,{
type: "text/csv;charset=utf-8;"
});
var url = URL.createObjectURL(blobObject);
downloadLink.href = url;
downloadLink.download = "dataexcel.csv";
/*
* Actually download CSV
*/
document.body.appendChild(downloadLink);
downloadLink.click();
document.body.removeChild(downloadLink);

                          }
                     });
   $('#order_data').DataTable().destroy();
   fetch_data( start_date, end_date,filter_gender);
  }
  else
  {
   alert("Both Date is Required");
  }
 });

});
</script>


