<?php
require_once("../../globals.php");
 require 'ssp.class.php';

$db=array(
    'host'=>'localhost',
    'user'=>'root',
    'pass'=>'root',
    'db'=>'openemr22'
);


$table = 'pat';


$primaryKey = 'id';

$columns = array(
    array( 'db' => 'id', 'dt' =>0 ),
    array( 'db' => 'patient_name', 'dt' => 1 ),
    array( 'db' => 'heart_rate',  'dt' => 2 ),
    array( 'db' => 'Height',      'dt' => 3 ),
    array( 'db' => 'cm',      'dt' => 4 ),
    array( 'db' => 'weight',      'dt' => 5 ),
    array( 'db' => 'kg',      'dt' => 6 ),
    array( 'db' => 'extra_notes',      'dt' => 7 ),
    array( 'db' => 'patient_name_list',      'dt' => 8 ),
    array(
        'db'        => 'id',
        'dt'        => 9,
        'formatter' => function( $d, $row ) {
            return '
                <a class="btn btn-info" href="edit.php?id='.$d.'">Edit</a>&nbsp;
                <a class="btn btn-danger" href="insert.php?id='.$d.'">Delete</a>
            ';
        }
    )

);


echo json_encode(
    SSP::simple( $_GET, $db, 'pat', $primaryKey, $columns )
);

?>

