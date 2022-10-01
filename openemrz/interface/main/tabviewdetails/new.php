<!---this page code is for directly filter and download it to csv file but in daterangefilter.php file and filtertocsv.php file is used to display data and export csv data for speratly code is written
so both used to export data to csv file ---->
<?php
require_once("../../globals.php");

if(isset($_POST["export"])){
    if(empty($_POST["fromDate"]))
{
    $startDateMessage = '>label class="text-danger"<Select start date.>/label<';
}else if(empty($_POST["toDate"])){
 $endDate = '>label class="text-danger"<Select end date.>/label<';
}
else{
    $orderQuery = "
      SELECT * FROM reg
      WHERE datepicker <= '".$_POST["fromDate"]."' AND datepicker >= '".$_POST["toDate"]."' ORDER BY datepicker DESC";
    $orderResult =  sqlStatement($orderQuery);
    $filterOrders = array();
    while( $order = sqlFetchArray($orderResult) ) {
      $filterOrders[] = $order;
    }
    if(count($filterOrders)) {
        $fileName = "sampletest" . ".csv";
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/csv;");
        $file = fopen('php://output', 'w');
        $header = array("id", "patient_name", "age", "address", "phone","gender","qualification","university","datepicker","blood_group","height","weight","father_name","mother_name");
        fputcsv($file, $header);
        foreach($filterOrders as $order) {
         $orderData = array();
         $orderData[] = $order["id"];
         $orderData[] = $order["patient_name"];
         $orderData[] = $order["age"];
         $orderData[] = $order["address"];
         $orderData[] = $order["phone"];
         $orderData[] = $order["gender"];
         $orderData[] = $order["qualification"];
         $orderData[] = $order["university"];
         $orderData[] = $order["datepicker"];
         $orderData[] = $order["blood_group"];
         $orderData[] = $order["height"];
         $orderData[] = $order["weight"];
         $orderData[] = $order["father_name"];
         $orderData[] = $order["mother_name"];
         fputcsv($file, $orderData);
        }
        fclose($file);
        exit;
    }
    else{
        $reportData .='
        <table class="table table-bordered">
        <tr>
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
        </tr>';

        while($row = sqlFetchArray($orderResult))
        {


            $reportData .='
            <tr>
                <td>'.$row["patient_name"].'</td>
                <td>'.$row["age"].'</td>
                <td>'.$row["address"].'</td>
                <td>'.$row["phone"].'</td>
                <td>'.$row["gender"].'</td>
                <td>'.$row["qualification"].'</td>
                <td>'.$row["university"].'</td>
                <td>'.$row["datepicker"].'</td>
                <td>'.$row["blood_group"].'</td>
                <td>'.$row["height"].'</td>
                <td>'.$row["weight"].'</td>
                <td>'.$row["father_name"].'</td>
                <td>'.$row["mother_name"].'</td>
                </tr>';

        }
    }
    $reportData .= '</table>';
    echo $reportData;
   }
  }

?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

  <style>
      .filter{
          margin-top: 18px;
      }
      </style>
<div class="container">

<br>
<div class="row">
 <form method="post">
  <div class="input-daterange">
   <div class="col-md-4">
	From<input type="text" name="fromDate" class="form-control" id="from_date"
 value="<?php echo date("Y-m-d"); ?>" readonly />
	<?php echo $startDateMessage; ?>
   </div>
   <div class="col-md-3">
	To<input type="text" name="toDate" class="form-control" id="to_date"
value="<?php echo date("Y-m-d"); ?>" readonly />
	<?php echo $endDate; ?>
   </div>
  </div>
  <div class="col-md-2"><div> </div>
   <input type="submit" name="export" value="Export to CSV" class="btn btn-info filter" />
  </div>
 </form>
</div>
<div class="row">
	<div class="col-md-8">
		<?php echo $noResult;?>
	</div>
</div>
<br />
<table class="table table-bordered table-striped">
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
  foreach($allOrders as $order) {
   echo '
   <tr>
	<td>'.$order["id"].'</td>
	<td>'.$order["patient_name"].'</td>
	<td>'.$order["address"].'</td>
	<td>$'.$order["phone"].'</td>
	<td>'.$order["gender"].'</td>
    <td>'.$order["qualification"].'</td>
    <td>'.$order["university"].'</td>
    <td>'.$order["datepicker"].'</td>
    <td>'.$order["blood_group"].'</td>
    <td>'.$order["height"].'</td>
    <td>'.$order["weight"].'</td>
    <td>'.$order["father_name"].'</td>
    <td>'.$order["mother_name"].'</td>
   </tr>
   ';
  }
  ?>
 </tbody>
</table>
</div>
<script>
    $(document).ready(function(){
//  $('.input-daterange').datepicker({
//   todayBtn:'linked',
//   format: "yyyy-mm-dd",
//   autoclose: true
//  });
$("#from_date").datepicker({
    dateFormat: 'yy-mm-dd'
});
$("#to_date").datepicker({
    dateFormat: 'yy-mm-dd'
});
});
</script>
