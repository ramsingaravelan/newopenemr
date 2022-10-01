<?php


require_once("../../globals.php");

// use OpenEMR\Common\Csrf\CsrfUtils;
// use OpenEMR\Common\Logging\EventAuditLogger;
// use OpenEMR\Core\Header;
// use OpenEMR\OeUI\OemrUI;
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// if (isset($_POST['submit'])) {

//     $targetDir = "./uploads/";
//     //  print_r($_FILES); die;
//     $fileName = basename($_FILES["image"]["name"]);
//     $targetFilePath = $targetDir . $fileName;

//     $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
//     // $keys = array_keys($_FILES["image"]);
//     //  if (isset($_POST['submit'])) {
//         // print_r($_POST);die;
//         $doctor_name = $_POST['doctor_name'];

//         $specification = $_POST['specification'];
//         $email = $_POST['email'];
//         $phone = $_POST['phone'];
//         $clinic_name = $_POST['clinic_name'];
//         $datepicker=date('Y-m-d', strtotime(str_replace('/', '-', $_POST['datepicker'])));

//         $allowTypes = array('jpg','png','jpeg','gif','pdf');
//         // if(move_uploaded_file ($_FILES['image']['tmp_name'] , $targetFilePath))
//         //     // Upload file to server
//         //   {

//         $sql = "INSERT INTO doctor (doctor_name,specification,email,phone,clinic_name,datepicker,image) VALUES ('$doctor_name',' $specification',' $email', '$phone',' $clinic_name','$datepicker','$fileName')";
//         // echo $sql;
//         $result=sqlStatement($sql);
//         if ($result == TRUE) {

//             echo "New record created successfully.";

//           }else{

//             echo "Error:";

//           }
//           if (move_uploaded_file($_FILES['image']['tmp_name'] , $targetFilePath)) {
//             echo "  Image uploaded successfully!";
//         } else {
//             echo " Failed to upload image!";
//         }
//         // }

//      }

$sql = "select * from doctor";
$res = sqlStatement($sql);
//  echo $res;
// $selectPlans = "SELECT id, doctor_name FROM doctor";
// $rows=sqlStatement($selectPlans);
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" /> -->
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-select2--!>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-select2--!>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<!-- <script src="https://gitcdn.xyz/repo/FuriosoJack/TableHTMLExport/v1.0.0/src/tableHTMLExport.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script> -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<!-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
    .file {
        visibility: hidden;
        position: absolute;
    }
    .ui-autocomplete-row
      {
        padding:8px;
        background-color: #fff;
        border-bottom:1px solid #ccc;
        font-weight:bold;
      }
      .ui-autocomplete-row:hover
      {
        background-color: #ddd;
      }
</style>
<div class="container">
    <div class="title">
        <title>doctor</title>

        <!-- <form action="" method="POST"> -->
        <form action="" method="POST" id="myform" enctype="multipart/form-data">
            <div class="mb-3 name">
                <label class="form-label">Doctor name</label>
                <input type="text" class="form-control" name="doctor_name"  id="doctor_name">
                <!-- <div id="doctorname"></div> -->
            </div>
            <div class="mb-3 age">
                <label class="form-label">Specification</label>
                <input type="text" class="form-control" name="specification" id="specification">
            </div>
            <div class="mb-3 age">
                <label class="form-label">email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>

            <div class="mb-3 age">
                <label class="form-label">phone</label>
                <input type="text" class="form-control" name="phone" id="phone">
            </div>

            <div class="mb-3 age">
                <label class="form-label">Date</label>
                <input type="text" class="form-control" name="datepicker" id="datepicker">
            </div>
            <div class="mb-3 age">
                <label class="form-label">clinic_name</label>
                <input type="text" class="form-control" name="clinic_name" id="clinic_name">
            </div>
            <div class="mb-3">
                <label class="form-label">doctor name List</label>
                <select class="songs form-select form-control" name="doctor_name_list[]"    multiple>


                    <?php
                $result = sqlStatement("SELECT * FROM pat");
                $i = 0;
                while ($row = sqlFetchArray($result)) {
                    ?>
                <option value="<?=$row["patient_name"];?>"><?=$row["patient_name"];?></option>
                <?php
                    $i ++;
                }
                ?>
                </select>
            </div>
            <div class="mb-3 age">
            <label class="form-label">doctor name search</label>
                        <select class="postName form-control"  name="doctor_name_search">
                                <option></option>
                        <?php $post_row= sqlStatement("SELECT * FROM pat");
                 while ($post_res = sqlFetchArray($post_row)) {
                ?>

                 <option value="<?= $post_res["patient_name"]; ?>"><?= $post_res["patient_name"]; ?></option>
                 <?php }?>
                        </select>
                    </div>

            <div class="mb-3 age">
                <!-- <label  class="form-label">file upload</label>
    <input type="file" id="uploadfile" name="uploadfile">
    <img src="<?php echo $row['uploadfile']; ?>"> -->
                <input type="file" name="image" class="file" accept="image/*">
                <div class="input-group my-3">
                    <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                    <div class="input-group-append">
                        <button type="button" class="browse btn btn-primary">Browse...</button>
                    </div>
                </div>
                <div class="ml-2 col-sm-6">
                    <img src="" id="preview" class="img-thumbnail">
                </div>
            </div>


            <button type="submit" value="submit" name="submit" id="submit" click="add()" id="add" class="btn btn-success">Submit</button>
        </form>
    </div>


    <table class="table table-striped result" id="tblCustomers">

        <thead>

            <tr>

                <th>ID</th>

                <th>doctor_name</th>
                <th>specification</th>
                <th>email</th>
                <th>phone</th>
                <th>clinic_name</th>
                <th>date</th>
                <th>file path</th>
                <th>Doctor_name_list</th>
                <th>Doctor_name_search</th>
                <th>Actions</th>
            </tr>

        </thead>

        <tbody>

            <?php
            // echo $res;

            while ($row = sqlFetchArray($res)) {
                $img = './uploads/' . $row['image'];
            ?>

                <tr>

                    <th><?php echo $row['id']; ?></th>

                    <th><?php echo $row['doctor_name']; ?></th>
                    <th><?php echo $row['specification']; ?></th>
                    <th><?php echo $row['email']; ?></th>
                    <th><?php echo $row['phone']; ?></th>
                    <th><?php echo $row['clinic_name']; ?></th>
                    <th><?php echo $row['datepicker']; ?></th>
                    <th><img src="<?php echo $img ?>" width="80"></th>
                    <th><?php echo $row['doctor_name_list']; ?></th>
                    <th><?php echo $row['doctor_name_search']; ?></th>
                    <th><a class="btn btn-info" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>

                        <!-- <a class="btn btn-danger" href="insert.php?id=<?php echo $row['id']; ?>">Delete</a> -->
                        <button class="btn btn-danger btn-sm delete" onclick="del(<?php echo $row['id']; ?>)">Delete</button>
                    </th>
                    <!-- <button type="submit" id="pdf" name="create_new_pdf" onclick="downloadpdf()" class="btn btn-primary"><i class="fa fa-pdf"" aria-hidden="true"></i>
Generate PDF</button></th> -->
                </tr> <?php }



                        ?>
        </tbody>

    </table>
    <div class="pdf">
        <div class="float-right">
            <a href="exportPdf.php" class="btn btn-secondary btn-lg">PDF</a>
        </div>
        <input name="submit_btn" class="btn btn-warning" type="submit" id="submit-btn" value="Send Mail">
    </div>
    <!-- <input type="button" id="btnExport" value="Export" onclick="Export()" /> -->
</div>

<script>
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: 'dd-mm-yy'
        });
    });


    $(document).ready(function () {
    $("#submit").click(function() {

      var form = $('#myform')[0];
    var formData = new FormData(form);

    // formData.append('image', image);

      $.ajax({
        type: 'POST',
        url: 'docajax.php',
        // data: {
        //   fname: fname,
        //   lname: lname,
        //   speciality: speciality,
        //   clinic_name: clinic_name,
        //   date: date,
        //   image: image
        // },

        data:formData,
        contentType: false,
        //  cache: false,
         processData:false,
        success: function(data) {
           alert(data)
          console.log(data);
        }
      });
    });

  });
    function del(id) {
        console.log(id)
        $.ajax({
            type: "POST",
            url: "delajax.php",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                console.log(data);
            }
        });
        location.reload(1);
    }
</script>
<script>
    $(document).on("click", ".browse", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    $(document).ready( function () {
    $('#tblCustomers').DataTable({

    });
} );
// $( "#doctor_name" ).autocomplete({
//       source: "search.php"
//     });
</script>
<!-----select2 multiple select------>
<script>
 $(document).ready(function(){

      $('.songs').select2();
 });
 </script>
 <!---------autocomple------->
<script>
  $(document).ready(function(){

    $('#doctor_name').autocomplete({
      source: "search.php",
      minLength: 1,
      select: function(event, ui)
      {
        $('#doctor_name').val(ui.item.value);
      }
    }).data('ui-autocomplete')._renderItem = function(ul, item){
      return $("<li class='ui-autocomplete-row'></li>")
        .data("item.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };

  });
</script>
<!--------select2 search-------->
<script type="text/javascript">
       $(document).ready(function(){

$(".postName").select2();
//    ajax: {
//      url: "select2search.php",
//      type: "post",
//      dataType: 'json',
//      delay: 250,
//      data: function (params) {
//         return {
//            searchTerm: params.term // search term
//         };
//      },
//      processResults: function (response) {
//         return {
//            results: response
//         };
//      },
//      cache: true
//    }
// });

});
    </script>
