<?php
/*
	// MailChimp
	$APIKey = '53bb3bcad3947b9c5b45884b439097f4-us3';  // Grab an API Key from http://admin.mailchimp.com/account/api/

	$listID = 'fd1b8baf3f'; // Grab your List's Unique Id by going to http://admin.mailchimp.com/lists/

	$email   = $_POST['email'];

	require_once('inc/MCAPI.class.php');

	$api = new MCAPI($APIKey);
	$list_id = $listID;

	if($api->listSubscribe($list_id, $email) === true) {
		$sendstatus = 1;
		$message = '<div class="alert alert-success subscription-success" role="alert"><strong>Success!</strong> Check your email to confirm sign up.</div>';
	} else {
		$sendstatus = 0;
		$message = '<div class="alert alert-danger subscription-error" role="alert"><strong>Error:</strong> ' . $api->errorMessage.'</div>';
	}

	$result = array(
		'sendstatus' => $sendstatus,
		'message' => $message
	);

	echo json_encode($result);
*/

require_once('inc/db_default.php');

if(!empty($_POST)){
	
	$stmt = $connect->prepare("INSERT INTO tblqueries (name,email,phone,description) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $name, $email,$phone,$description);
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$description = $_POST['desc'];
	$insert = $stmt->execute();
	
	
	
//	$insert = mysqli_query($connect,"insert into tblqueries(name,email,phone,description) values('$name','$email','$phone','$description')");
	if($insert){
		$sendstatus = 1;
		$message = '<div class="alert alert-success subscription-success" role="alert"><strong>Success!</strong> We will contact you soon.</div>';
	}else{
		$sendstatus = 0;
		$message = '<div class="alert alert-danger subscription-error" role="alert"><strong>Error:</strong> '.mysqli_error($connect).'</div>';
	}
	
	$stmt->close();
$connect->close();
	
}else{
	$sendstatus = 0;
	$message = '<div class="alert alert-danger subscription-error" role="alert"><strong>Error:</strong> No form submitted</div>';
}

$result = array(
		'sendstatus' => $sendstatus,
		'message' => $message
	);

echo json_encode($result);
exit;


?>