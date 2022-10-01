<?php



require_once("../../globals.php");


if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $id=$_POST['id'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];

    // echo $name;

    $sql = "INSERT INTO querytable (name,id,age,phone) VALUES ('$name','$id','$age','$phone')";
    // echo $sql;
    $result = sqlStatement($sql);
    if ($result == TRUE) {

        echo "New record created successfully.";
    } else {

        echo "Error:";
    }
}
$sql = "select * from querytable";
$res = sqlStatement($sql);


//$sq="select pat.id,pat.patient_name,pat.heart_rate,pat.height,pat.cm,pat.weight,pat.kg,pat.extra_notes,pat.patient_name_list AS promotion FROM pat LEFT JOIN test_table"

// $tq="SELECT * from test_table left join pat on test_table.id=pat.id";
// $res = sqlStatement($tq);


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
<!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->


<div class="container">
    <div class="title">
        <title>ADDING</title>
        <!-- <form action="" method="POST"> -->
            <form action="" method="POST" id="myform">
            <div class="mb-3 name">
            <label class="form-label">  pat_id</label>
                    <select  name="id" class="form-control">
                    <?php
                $result = sqlStatement("SELECT * FROM pat");
                $i = 0;
                while ($row = sqlFetchArray($result)) {
                    ?>
                <option value="<?=$row["id"];?>"><?=$row["id"];?></option>
                <?php
                    $i ++;
                }
                ?>
                    </select>

                </div>
                <div class="mb-3 name">
                    <label class="form-label">  name</label>
                    <input type="text" class="form-control" name="name" id="name" required>

                </div>
                <div class="mb-3 age">
                    <label class="form-label">age</label>
                    <input type="text" class="form-control" name="age" id="age" required>
                </div>
                <div class="mb-3 age">
                    <label class="form-label">phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" required>
                </div>
                                <button type="submit" value="submit" name="submit" class="btn btn-success">Submit</button>
            </form>
    </div>




    <table id="table" class="table table-bordered table-striped">
     <thead>
      <tr>
        <th>ID</th>
        <th id="tabname">patient_id</th>
        <th id="tabname">name</th>

        <th id="tabname">age</th>
        <th id="tabname">phone</th>


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

    </tr> <?php }



            ?>

     <tbody>

    </table>

    <!-- <input type="button" id="btnExport" value="Export" onclick="Export()" /> -->
    <a href="leftjoin.php"  class="btn btn-warning">left join</a>

</div>




