<?php

require_once("../../globals.php");

$column = array('id','patient_name', 'age', 'address', 'phone', 'gender','qualification','university','datepicker','blood_group','height','weight','father_name','mother_name');


$query = "SELECT * FROM reg WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'datepicker BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (id LIKE "%'.$_POST["search"]["value"].'%"
  OR patient_name LIKE "%'.$_POST["search"]["value"].'%"
  OR age LIKE "%'.$_POST["search"]["value"].'%"
  OR address LIKE "%'.$_POST["search"]["value"].'%"
  OR phone LIKE "%'.$_POST["search"]["value"].'%"
  OR gender LIKE "%'.$_POST["search"]["value"].'%"
  OR qualification LIKE "%'.$_POST["search"]["value"].'%"
  OR university LIKE "%'.$_POST["search"]["value"].'%"
  OR datepicker LIKE "%'.$_POST["search"]["value"].'%"
  OR blood_group LIKE "%'.$_POST["search"]["value"].'%"
  OR height LIKE "%'.$_POST["search"]["value"].'%"
  OR weight LIKE "%'.$_POST["search"]["value"].'%"
  OR father_name LIKE "%'.$_POST["search"]["value"].'%"
  OR mother_name LIKE "%'.$_POST["search"]["value"].'%"
  )
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
 ';
}
else
{
 $query .= 'ORDER BY id ASC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = sqlStatement($query);

// $statement->execute();

$number_filter_row = $statement->rowCount();

$statement = sqlStatement($query . $query1);

// $statement->execute();

//$result = $statement->sqlFetchArray();

$data = array();

 while ($row = sqlFetchArray($statement))
{
 $sub_array = array();
 $sub_array[] = $row['id'];
 $sub_array[] = $row['patient_name'];
 $sub_array[] = $row['age'];
 $sub_array[] = $row['address'];
 $sub_array[] = $row['phone'];
 $sub_array[] = $row['gender'];
 $sub_array[] = $row['qualification'];
 $sub_array[] = $row['university'];
 $sub_array[] = $row['datepicker'];
 $sub_array[] = $row['blood_group'];
 $sub_array[] = $row['height'];
 $sub_array[] = $row['weight'];
 $sub_array[] = $row['father_name'];
 $sub_array[] = $row['mother_name'];
 $data[] = $sub_array;
}

function count_all_data()
{
 $query = "SELECT * FROM reg";
 $statement = sqlStatement($query);
//  $statement->execute();
 return $statement->rowCount();
}

$output = array(
 "draw"       =>  intval($_POST["draw"]),
 "recordsTotal"   =>  count_all_data(),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);

echo json_encode($output);

?>
