<?php
	foreach ($designer_details as $designer_details)
	{
	$id = $designer_details['des_id'];
	$fname = $designer_details['des_fname'];
	$mname = $designer_details['des_mname'];
	$lname = $designer_details['des_lname'];
	$contact_num = $designer_details['des_contact_no'];
	$e_add = $designer_details['des_email_add'];
	$location = $designer_details['des_location'];
	$status = $designer_details['des_status'];
	}
?>
<?php

$aa = "$id, $fname, $mname, $lname, $contact_num, $e_add, $e_add, $status, $location";
echo $aa;

?>
