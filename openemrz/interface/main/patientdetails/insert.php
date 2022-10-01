<?php



require_once("../../globals.php");

// use OpenEMR\Common\Csrf\CsrfUtils;
// use OpenEMR\Common\Logging\EventAuditLogger;
// use OpenEMR\Core\Header;
// use OpenEMR\OeUI\OemrUI;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer;

if (isset($_POST['submit'])) {

    $patient_name = $_POST['patient_name'];

    $heart_rate = $_POST['heart_rate'];
    $Height = $_POST['Height'];
    $cm = $_POST['cm'];
    $weight = $_POST['weight'];
    $kg = $_POST['kg'];
    $extra_notes = $_POST['extra_notes'];
    $patient_name_list = implode(',', $_POST['patient_name_list']);
    // echo $name;

    $sql = "INSERT INTO pat (patient_name,heart_rate,Height,cm,weight,kg,extra_notes,patient_name_list) VALUES ('$patient_name','$heart_rate','$Height', '$cm','$weight','$kg','$extra_notes','$patient_name_list')";
    // echo $sql;
    $result = sqlStatement($sql);
    if ($result == TRUE) {

        echo "New record created successfully.";
    } else {

        echo "Error:";
    }
}
$sql = "select * from pat";
$res = sqlStatement($sql);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM pat WHERE id=$id";
    $result = sqlStatement($sql);

    if ($result == TRUE) {
        header('Location:insert.php');
        // echo "Record deleted successfully.";

    } else {


        echo "Error:";
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "update from pat where id=$id";
        $res = sqlStatement($sql);
        echo $res;
    }
}




$selectPlans = "SELECT id, patient_name FROM pat";
$rows=sqlStatement($selectPlans);



//  $pdf=new FPDF();
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',10);
// $pdf->Ln();
// $pdf->Ln();
// $pdf->SetFont('times','B',10);
// $pdf->Cell(25,7,"ID");
// $pdf->Cell(30,7,"patient_name");
// $pdf->Cell(40,7,"heart_rate");
// $pdf->Cell(30,7,"Height");
// $pdf->Cell(30,7,"cm");
// $pdf->Cell(30,7,"weight");
// $pdf->Cell(30,7,"kg");
// $pdf->Cell(30,7,"extra_notes");
// $pdf->Ln();
// $pdf->Cell(450,7,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
// $pdf->Ln();


//         $sql = "select * from pat";
//         $result = sqlStatement($sql);

//         while($row = sqlFetchArray($result))
//         {



//             $pdf->Cell(25,7,$row['id']);
//             $pdf->Cell(30,7,$row['patient_name']);
//             $pdf->Cell(40,7,$row['heart_rate']);
//             $pdf->Cell(30,7,$row['Height']);
//             $pdf->Cell(30,7, $row['cm']);
//             $pdf->Cell(30,7, $row['weight']);
//             $pdf->Cell(30,7, $row['kg']);
//             $pdf->Cell(30,7, $row['extra_notes']);
//             $pdf->Ln();

//         }
//         $pdf->Output();



?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<!-select2--!>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<!-select2--!>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<!-- <script src="https://gitcdn.xyz/repo/FuriosoJack/TableHTMLExport/v1.0.0/src/tableHTMLExport.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->
  <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<div class="container">
    <div class="title">
        <title>ADDING</title>
        <!-- <form action="" method="POST"> -->
            <form action="" method="POST" id="myform">
                <div class="mb-3 name">
                    <label class="form-label">patient name</label>
                    <input type="text" class="form-control" name="patient_name" id="patient_name" required>

                </div>
                <div class="mb-3 age">
                    <label class="form-label">heart rate</label>
                    <input type="text" class="form-control" name="heart_rate" id="heart_rate" required>
                </div>
                <div class="mb-3 age">
                    <label class="form-label">Height</label>
                    <input type="text" class="form-control" name="Height" id="height" required>
                </div>
                <div class="mb-3 age">
                    <label class="form-label">CM/M</label>
                    <select class="form-control form-control-lg" name="cm" id="cm" required>
                        <option value="">Select CM/M</option>
                        <option value="cm">cm</option>
                        <option value="m">m</option>
                    </select>
                </div>
                <div class="mb-3 age">
                    <label class="form-label">Weight</label>
                    <input type="text" class="form-control" name="weight" id="weight">
                </div>
                <div class="mb-3 age">
                    <label class="form-label">KG/LBS</label>

                    <select class="form-control form-control-lg" name="kg" id="kg" required>
                        <option value="">Select KG/LBS</option>
                        <option value="kg">kg</option>
                        <option value="lbs">LBS</option>
                    </select>
                </div>
                <div class="mb-3">
                <label class="form-label">patient name List</label>
                <select class="songs form-select form-control" name="patient_name_list[]"    multiple="multiple" >
                    <option value="one">Anyone</option>
                    <?php foreach ($rows as $row): ?>
        <option value="<?= $row['id'] ?>"><?= $row['patient_name'] ?></option>
    <?php endforeach; ?>
                </select>
            </div>
                <div class="mb-3 age">
                    <label class="form-label">Extra notes</label>


                    <textarea class="form-control" id="extra_notes" name="extra_notes" rows="3"></textarea>
                </div>

                <button type="submit" value="submit" name="submit" class="btn btn-success">Submit</button>
            </form>
    </div>




    <table id="table" class="table table-bordered table-striped">
     <thead>
      <tr>
        <th>ID</th>
        <th id="tabname">patient name</th>
        <th id="tabname">heart rate</th>
        <th id="tabname">Height</th>
        <th id="tabname">CM/M</th>
        <th id="tabname">Weight</th>
        <th id="tabname">KG/LBS</th>
        <th id="tabname">Extra notes</th>
        <th id="tabname">patient_name_list</th>
        <th>Actions</th>
      </tr>
     </thead>

     <tbody>

     </tbody>
     <tfoot>
      <tr>



      </tr>
     </tfoot>
    </table>

    <!-- <input type="button" id="btnExport" value="Export" onclick="Export()" /> -->
    <!-- <a href="email.php"  class="btn btn-warning" value="Send Mail">sendmail</a> -->
    <input type="button" class="btn btn-warning" id="btnExport" value="sendemail" onclick="email()" />
    <div class="pdf">
        <div class="float-right">
            <a href="exportPdf.php" class="btn btn-success">PDF</a>
        </div>
    </div>
</div>




<script>
    $(document).ready(function(){

});

function email(){
        $.ajax({
			type: "POST", // Post / Get method
			url: "email.php",
    });
    alert("attachment send to mail");
    }
    $('.songs').select2();

    var table =$("#table").dataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "serversidedatatable.php"


    });

    $('#table #tabname').each(function() {
        var title = $(this).text();
        console.log(title);
        $(this).html(title + ' <input type="text" class="col-search-input" placeholder="Search ' + title + '" />');
    });

    table.api().columns().every(function() {
        var table = this;
        $('input', this.header()).on('keyup change', function() {
            if (table.search() !== this.value) {
                table.search(this.value).draw();
            }
        });
    });

</script>
