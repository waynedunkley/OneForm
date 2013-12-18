<?php

/*######################################################################################
# UPDATE THESE FIELDS
########################*/

//Confirmation Email Content
$sendConfirmation = false;
$cust_subject = 'Confirmation of Message'; //Subject field for Confirmation email
$company = 'Your Company'; //Company Name 
$customerMailMessage = 'test message'; //Main body message for confirmation email
$logo = false; //Use company logo? Change to false to not use a logo
if($logo){
    $logoUrl = 'www.yourcompany.com/images/logo.jpg'; //Url for company logo
    $logoWidth = '173px';
    $logoHeight = '172px';
}

//Company Email Content
$subject = 'New Website Enquiry'; //subject line for email
$mailTo = 'wayne@quikclicks.com.au'; //email address for email to send to

/*######################################################################################*/
/*######################################################################################*/

//Email Styling
$titleColor = '#0072BB'; //Title text color
$textColor = '#000'; //Main body text color

//Form contents
$name = $_POST['name'];
$email = $_POST['email'];
$company = $_POST['company'];
$phone = $_POST['phone'];
$website = $_POST['website'];
$heardfrom = $_POST['heardfrom'];
$message = $_POST['message'];
$confirmation = $_POST['confirmation'];

//Set headers for email's
$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: ". $email . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

//Body content for company email
$companyEmail = '<!DOCTYPE html>';
$companyEmail .= '<html><head></head>';
$companyEmail .= '<body style="width: 100%;margin: 0px;">';
$companyEmail .= '<p>Name: '.$name.'</p>';
$companyEmail .= '<p>Email: '.$email.'</p>';
$companyEmail .= '<p>Email: '.$company.'</p>';
$companyEmail .= '<p>Phone: '.$phone.'</p>';
$companyEmail .= '<p>Website: '.$website.'</p>';
$companyEmail .= '<p>Heard from: '.$heardfrom.'</p>';
$companyEmail .= '<p>Message: '.$message.'</p>';
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
	$confirmationEmail .= '<h1 style="font-family: sans-serif;color: ' . $titleColor . ';font-size: 19px;text-align: center;">Thanks for contacting<br>' . $company . '!</h1>';
	$confirmationEmail .= '<p style="font-family: sans-serif;color: ' . $textColor . ';font-size: 14px;text-align:left;">' . $customerMailMessage . '</p>';
	$confirmationEmail .= '<p style="font-family: sans-serif;color: ' . $textColor . ';font-size: 14px;text-align:left;">Regards,<br>' . $company . '</p>';
	$confirmationEmail .= '</div></body></html>';
}

//Main Email to send to company & check it has been successfully accepted for delivery
//*NOTE*: This only checks that the form has been successfully accepted by MTA for delivery. This does not neccessarily mean it has been delivered!
if(mail($mailTo, $subject, $companyEmail, $headers)){
	//Confirmation email for customer
	if($confirmation && $sendConfirmation){
		mail($email, $cust_subject, $confirmationEmail, $headers);
	}
	echo true;
}else{
	echo false;
}
?>