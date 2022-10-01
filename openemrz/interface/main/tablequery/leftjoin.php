<?php
require_once("../../globals.php");

$sql="SELECT * from querytable left join pat on querytable.id=pat.id";
 $res = sqlStatement($sql);
 //echo $res;
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<!-select2--!>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-select2--!>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<!-- <script src="https://gitcdn.xyz/repo/FuriosoJack/TableHTMLExport/v1.0.0/src/tableHTMLExport.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>-->
<div class="container">
<title>Left join</title>
<h1>Left Join</h1>
<table id="table" class="table table-bordered table-striped">
     <thead>
      <tr>
        <th>ID</th>
        <th id="tabname">patient_id</th>
        <th id="tabname">name</th>

        <th id="tabname">age</th>
        <th id="tabname">phone</th>
        <th id="tabname">patient_name</th>
        <th id="tabname">height</th>

      </tr>
     </thead>
     <tbody>

<?php
// echo $res;

while ($row = sqlFetchArray($res)) {

?>

    <tr>

        <th><?php echo $row['t_id']; ?></th>

        <th><?php echo $row['id']; ?></th>
        <th><?php echo $row['name']; ?></th>
        <th><?php echo $row['age']; ?></th>
        <th><?php echo $row['phone']; ?></th>
        <th><?php echo $row['patient_name']; ?></th>
        <th><?php echo $row['Height']; ?></th>
    </tr> <?php }



            ?>

     <tbody>

    </table>
</div>
