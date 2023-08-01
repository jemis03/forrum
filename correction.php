<?php

date_default_timezone_set("Asia/Kolkata");
$time= date("h:i:s A");
$date = date("jS \of F Y");
echo $date;
echo '<br>';
echo $time;

?>


id="frmContactus"


// $html="<table><tr><td>Name</td><td>$name</td></tr><tr><td>Email</td><td>$email</td></tr><tr><td>Mobile</td><td>$mobile</td></tr><tr><td>Comment</td><td>$comment</td></tr></table>";
	// echo $html;
	// include('smtp/PHPMailerAutoload.php');
	// $mail = new PHPMailer(true);
	// $mail->isSMTP();
	// $mail->Host="smtp.gmail.com";
	// $mail->Port=587;
	// $mail->SMTPSecure="tls";
	// $mail->SMTPAuth=true;
	// $mail->Username="lathiyajems@gmail.com";
	// $mail->Password="Lathiya@123";
	// $mail->SetFrom("lathiyajems@gmail.com");
	// $mail->addAddress("lathiyajems@gmail.com");
	// $mail->IsHTML(true);
	// $mail->Subject="New Contact Us";
	// $mail->Body=$html;
	// $mail->SMTPOptions=array('ssl'=>array(
	// 	'verify_peer'=>false,
	// 	'verify_peer_name'=>false,
	// 	'allow_self_signed'=>false
	// ));
  // $mail->send();
  // echo $mail;
  // echo var_dump(mail->send());
	// if($mail->send()){
  //   // header("Location: /forrum/index1.php?contactsuccess=true");
	// 	echo "Mail send";
	// }
// //   else{
// //     // header("Location: /forrum/index1.php?contactsuccess=false");
// // 		echo "Error occur";
// // 	}



$sql="SELECT categary_title,categary_id FROM `categary`";
        $result=mysqli_query($conn,$sql);
        while ($row=mysqli_fetch_assoc($result)) {
          echo'<a class="dropdown-item" href="#">'.$row['categary_title'].'</a>';
          
        }

		forrum/threadlist.php?$categary_id=$row['categary_id']


		UPDATE `comments` SET `comment_opinion`='i am jemis', `comment_update_date`='he',`comment_update_time`='hel',`comment_update_repetation`=1 WHERE `comment_id`=1;


		SELECT * FROM `comments` WHERE `comment_id`=1;

		