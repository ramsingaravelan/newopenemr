<?php
require_once("../../globals.php");



?>
<title>Filter</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <style>
      .filter{
          margin-top: 45px;
      }
      .dat{
          margin-top: 20px;
      }
  </style>
<div class="container">
<div class="col-md-12">
    <div class="col-md-4 dat">
    <div class="form-group">
                <label class="form-label">FromDate</label>
                <input type="text" class="form-control" name="from_date" id="from_date" >

            </div>
    </div>
    <div class="col-md-4 dat">
    <div class="form-group">
                <label class="form-label">ToDate</label>
                <input type="text" class="form-control" name="to_date" id="to_date" >
            </div>
    </div>

    <div class="col-md-4">

    <input type="button" name="submit" id="range" value="submit" class="btn btn-info lg filter" />
    <input type="button" name="filter" id="filter" value="export"   class="btn btn-info lg filter" />
    </div>
</div>


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
        <th>date</th>
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

<div class="col-md-12 head ">
    <div class="float-right">
      <button class="btn btn-success" onclick="email()"> Email</button>
    </div>
  </div>
<script>
    $(document).ready(function(){
           $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
           });
           $(function(){
                $("#from_date").datepicker();
                $("#to_date").datepicker();
           });
           $('#filter').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();

                if(from_date != '' && to_date != '')
                {
                     $.ajax({
                          url:"daterangefilter.php",
                          method:"POST",
                          data:{from_date:from_date, to_date:to_date},
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
                }
                else
                {
                     alert("Please Select Date");
                }
           });
           $('#range').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();

                if(from_date != '' && to_date != '' )
                {
                     $.ajax({
                          url:"filtertocsv.php",
                          method:"POST",
                          data:{from_date:from_date, to_date:to_date},
                          processData: false,
                            contentType: false,
                          success:function(data)
                          {
                               $('#tblCustomers').html(data);
                          }
                        });
                    }
                    });

        });
        function email() {
            var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if(from_date != '' && to_date != '')
                {
                     $.ajax({
                          url:"email.php",
                          method:"POST",
                          data:{from_date:from_date, to_date:to_date},
                          success:function(data)
                          {
                            //    $('#tblCustomers').html(data);
                          }
                        });
                    }


  }
</script>
