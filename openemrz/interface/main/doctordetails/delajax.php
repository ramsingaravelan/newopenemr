
<?php
require_once("../../globals.php");

        $id = $_POST['id'];

     $sql="DELETE FROM doctor WHERE id=$id";
     $result=sqlStatement($sql);


    ?>
