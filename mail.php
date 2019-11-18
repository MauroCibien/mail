<?php

require_once('PHPMailer-master/class.phpmailer.php');

/**
* This section actually sends the email.
*/

$email = new PHPMailer();
$email->From = 'Justadfuel@gmail.com';
$email->FromName = 'Mauro Cibien';
$email->Subject = 'New voicemail Message';
$email->Body = 'You have a new voicemail message. Mp3 recording is attached.';
$email->AddAddress( 'justadfuel@gmail.com' );

$recordingUrl = @$_REQUEST['RecordingUrl'];
$duration = @$_REQUEST['Duration'];
$callerId = @$_REQUEST['From'].'.mp3';
$attachment_data = file_get_contents($recordingUrl);


$email->addStringAttachment($attachment_data,$callerId, 'base64', 'audio/mpeg3');

return $email->Send();

echo '<Response/>';
