<?php

/*######################################################################################
# UPDATE THESE FIELDS
########################*/


//Confirmation Email Content
$sendConfirmation = false;
$yourCompany = 'Your Company'; //Company Name 
$cust_subject = 'Confirmation of Message'; //Subject field for Confirmation email
$customerMailMessage = 'This is confirmation that we have recieved your email. We will get back to you as soon as we possibly can.'; //Main body message for confirmation email
$logo = false; //Use company logo? Change to false to not use a logo
if($logo){
    $logoUrl = 'www.yourcompany.com/images/logo.jpg'; //Url for company logo
    $logoWidth = '173px';
    $logoHeight = '172px';
}

//Company Email Content
$subject = 'New Website Enquiry'; //Subject line for company email
$mailTo = 'wayne@quikclicks.com.au'; //Email address to send form content to

/*######################################################################################*/
/*######################################################################################*/

$email = $_POST['email'];

//Email Styling
$titleColor = '#0072BB'; //Title text color
$textColor = '#000'; //Main body text color

//Set headers for email's
$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: ". $email . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

//Body content for company email
$companyEmail = '<!DOCTYPE html>';
$companyEmail .= '<html><head></head>';
$companyEmail .= '<body style="width: 100%;margin: 0px;">';
foreach($_POST as $key => $value){
	if($key != 'blank' && $key != 'code' && $key != 'confirmation'){
		$companyEmail .= '<p>'.ucfirst($key).': '.$value.'</p>';
	}
}
$companyEmail .= '</body></html>';


//Body content for confirmation email
if($sendConfirmation){
	$confirmationEmail = '<!DOCTYPE html>';
	$confirmationEmail .= '<html style=""><head></head>';
	$confirmationEmail .= '<body style="width: 100%;margin: 0px;">';
	$confirmationEmail .= '<div style="background-color: #fff;width: 450px;border-radius: 10px;margin: 0 auto;padding: 10px;margin-top: 10px;">';
	if($logo){
	    $confirmationEmail .= '<img src="' . $logoUrl . '" style="display: block;margin: 0 auto;text-align: center;padding-top: 10px;padding-bottom: 19px;width: '.$logoWidth.';height:'.$logoHeight.'">';
	}
	$confirmationEmail .= '<h1 style="font-family: sans-serif;color: ' . $titleColor . ';font-size: 19px;text-align: center;">Thanks for contacting<br>' . $yourCompany . '!</h1>';
	$confirmationEmail .= '<p style="font-family: sans-serif;color: ' . $textColor . ';font-size: 14px;text-align:left;">' . $customerMailMessage . '</p>';
	$confirmationEmail .= '<p style="font-family: sans-serif;color: ' . $textColor . ';font-size: 14px;text-align:left;">Regards,<br>' . $yourCompany . '</p>';
	$confirmationEmail .= '</div></body></html>';
}

//Main Email to send to company & check it has been successfully accepted for delivery
//*NOTE*: This only checks that the form has been successfully accepted by MTA for delivery. This does not neccessarily mean it has been delivered!
if(mail($mailTo, $subject, $companyEmail, $headers)){
	//Confirmation email for customer
	if(isset($_POST['confirmation']) && $sendConfirmation){
		mail($email, $cust_subject, $confirmationEmail, $headers);
	}
	echo true;
}else{
	echo false;
}
?>