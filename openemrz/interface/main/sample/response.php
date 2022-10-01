<?php
//include db configuration file
include_once("config.php");

if(isset($_POST["content_txt"]) && strlen($_POST["content_txt"])>0)
{
	$contentToSave = filter_var($_POST["content_txt"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

	if(mysqli_query($connecDB,"INSERT INTO form_pt(patient_name,heart_rate,Height,cm,weight,kg,extra_notes) VALUES ('$patient_name','$heart_rate','$Height', '$cm','$weight','$kg','$extra_notes')"))
	{
		  $my_id = mysqli_insert_id($connecDB);
		  echo '<li id="item_'.$my_id.'" class="item-list">';
		  echo $contentToSave.'</li>';

	}

}
?>
