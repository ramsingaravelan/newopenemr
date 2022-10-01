<?php


require_once("../../globals.php");

// use OpenEMR\Common\Csrf\CsrfUtils;
// use OpenEMR\Common\Logging\EventAuditLogger;
// use OpenEMR\Core\Header;
// use OpenEMR\OeUI\OemrUI;
$targetDir = "./uploads/";
//  print_r($_FILES); die;
$fileName = basename($_FILES["image"]["name"]);
$targetFilePath = $targetDir . $fileName;

$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM doctor WHERE id=$id";
    $result = sqlStatement($sql);

    $res = sqlFetchArray($result);
    //echo $res['patient_name'];
    if (isset($_POST['submit'])) {
        $doctor_name = $_POST['doctor_name'];

        $specification = $_POST['specification'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $clinic_name = $_POST['clinic_name'];
        $image = $_FILES['image']['name'];
        // $uploadfile = $_POST['uploadfile'];
        $doctor_name_list = implode(',', $_POST['doctor_name_list']);
        $doctor_name_search = $_POST['doctor_name_search'];
        if (!empty($_FILES['image']['name'])) {
            $sql = "update doctor set id=$id,doctor_name= '$doctor_name ',specification=' $specification',email=' $email',phone='$phone',clinic_name='$clinic_name',image='$image',doctor_name_list='$doctor_name_list',doctor_name_search='$doctor_name_search' where id=$id";
        } else {
            $sql = "update doctor set id=$id,doctor_name= '$doctor_name ',specification=' $specification',email=' $email',phone='$phone',clinic_name='$clinic_name',doctor_name_list='$doctor_name_list',doctor_name_search='$doctor_name_search' where id=$id";
        }






        $result = sqlStatement($sql);
        if ($result) {
            // echo "Data updated successfully";
            header('location:insert.php');
        } else {
            echo "Error:";
        }
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            echo "  Image uploaded successfully!";
        } else {
            echo " Failed to upload image!";
        }
    }
}

// $selectPlans = "SELECT id, doctor_name FROM doctor";
// $rows=sqlStatement($selectPlans);

?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
<!-- DataTables CSS -->
<!-select2--!>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-select2--!>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <!-- <script src="https://gitcdn.xyz/repo/FuriosoJack/TableHTMLExport/v1.0.0/src/tableHTMLExport.js"></script> -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- DataTables -->

        <style>
            .file {
                visibility: hidden;
                position: absolute;
            }

            .search {
                margin-top: 100px;
            }
        </style>
        <div class="container">
            <div class="title">
                <title>edit</title>

                <form action="" method="POST" id="myform" enctype="multipart/form-data">
                    <div class="mb-3 name">
                        <label class="form-label">Doctor name</label>
                        <input type="text" class="form-control" name="doctor_name" id="doctor_name" value="<?php echo $res['doctor_name']; ?>">

                    </div>
                    <div class="mb-3 age">
                        <label class="form-label">Specification</label>
                        <input type="text" class="form-control" name="specification" id="specification" value="<?php echo $res['specification']; ?>">
                    </div>
                    <div class="mb-3 age">
                        <label class="form-label">email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $res['email']; ?>">
                    </div>

                    <div class="mb-3 age">
                        <label class="form-label">phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $res['phone']; ?>">
                    </div>

                    <div class="mb-3 age">
                        <label class="form-label">clinic_name</label>
                        <input type="text" class="form-control" name="clinic_name" id="clinic_name" value="<?php echo $res['clinic_name']; ?>">
                    </div>
                    <!--  -->
                    <div class="mb-3">
                        <label class="form-label">doctor name List</label>
                        <select class="songs form-select form-control" name="doctor_name_list[]" multiple>

                            <?php
                            $doctorlist = explode(",", $res["doctor_name_list"]);
                            $result = sqlStatement("SELECT * FROM pat");
                            $i = 0;
                            //print_r($doctorlist);
                            while ($row = sqlFetchArray($result)) {

                                if (in_array($row["patient_name"], $doctorlist))
                                    $str_flag = "selected";
                                else
                                    $str_flag = "";
                            ?>
                                <option value="<?= $row["patient_name"]; ?>" <?php echo $str_flag; ?>><?= $row["patient_name"]; ?></option>
                            <?php
                                $i++;
                            }
                            ?>
                    </div>


                    <div class="mb-3 age">

                        <input type="file" name="image" class="file" accept="image/*">
                        <div class="input-group my-3">
                            <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                            <div class="input-group-append">
                                <button type="button" class="browse btn btn-primary">Browse...</button>
                            </div>
                        </div>
                        <div class="ml-2 col-sm-6">
                            <?php

                            $img = './uploads/' . $res['image'];
                            ?>
                            <img src="<?php echo $img ?>" id="preview" class="img-thumbnail">


                        </div>
                    </div>

                    <div class="mb-3 age">
                        <label class="form-label">doctor name search </label>
                        <select class="postName form-control" name="doctor_name_search">
                            <option></option>
                            <?php
                             $docname = explode(",", $res["doctor_name_search"]);
                            $result = sqlStatement("SELECT * FROM pat");
//  print_r($result);
                            while ($row = sqlFetchArray($result)) {
                                    //print_r(strlen($docname[0]));
                                // print_r(strlen($row["doctor_name_search"]));
                                if (in_array($row["patient_name"], $docname))
                                {

                                    $str_flag = "selected";


                                }

                                else{
                                    $str_flag = "";

                                }


                            ?>
                                <option value="<?= $row["patient_name"]; ?>" <?php echo $str_flag; ?>><?= $row["patient_name"]; ?></option>
                            <?php

                            }
                            ?>
                        </select>

                    </div>
                    <button type="submit" value="submit" name="submit" class="btn btn-success">Submit</button>
                </form>

            </div>

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
                $(document).ready(function() {
                    $('.songs').select2();

                    $(".postName").select2();
                });
            </script>
            <!--------select2 search-------->
