<?php

//get values submitted by form in signup.php

$deliveryid = intval($_POST['deliveryid']);
$date = $_POST['date'];
$timeslot = $_POST['timeslot'];
$scheduled = 1;

/* Values for testing
$deliveryid = 123456;
$date = "03/01/1991";
$timeslot = "6";
$scheduled = 1;
*/

$link = mysqli_connect('RDS_HOSTNAME', 'RDS_USERNAME', 'RDS_PASSWORD', 'ebdb', 3306);

$stmt = mysqli_prepare($link, "UPDATE deliveries SET deliverydate=?, timeslot=?, scheduled=? WHERE deliveryid=?");
mysqli_stmt_bind_param($stmt, 'ssii', $date, $timeslot, $scheduled, $deliveryid); 

//execute statement
mysqli_stmt_execute($stmt);

//close statement and connection
mysqli_stmt_close($stmt);

//get email address
$stmt = mysqli_prepare($link, "SELECT email, sender FROM `deliveries` WHERE `deliveryid`= ?");
mysqli_stmt_bind_param($stmt, 'i', $deliveryid);

//execute statement
mysqli_stmt_execute($stmt);

//bind result variables
mysqli_stmt_bind_result($stmt, $email, $sender);

//fetch value
mysqli_stmt_fetch($stmt);

//close connection
mysqli_close($link);

echo $email;

//send email notifying user of delivery

/* code for sending email with AWS's Simple Email Service (SES) below

- The phar file holds the AWS SDK. Remember to include it in your upload to Beanstalk.
- $client starts an SES client, which we need to do before sending an email.
- To start a client, you MUST provide 1) credential info and 2) a region.
   - We're providing credentials implicitly. They're held in environment variables
     in our Elastic Beanstalk application.

I took this code from an AWS tutorial which is why a bunch of stuff is commented out.
*/

require 'aws.phar';

use Aws\Ses\SesClient;

$client = SesClient::factory(array(
    'region'  => 'us-east-1'
));

$timeslotstart = intval($timeslot);
$timeslotend = intval($timeslot) + 1;

$emailcontent = "
Hi,
<br>
<br>We'll deliver your package from ".$sender." on ".date('l, F jS', strtotime($date))." between ".$timeslotstart." and ".$timeslotend." PM. 
You can reschedule this delivery at any time by <a href=\"shipfairy.com/delivery.php?did=".$deliveryid."\">clicking this link</a>.
<br>
<br>See you soon!
<br>Shipfairy
<br>
<br>P.S. You can reply to this email - I'm human!
";

$result = $client->sendEmail(array(
    // Source is required
    'Source' => 'Shipfairy <help@shipfairy.com>',
    // Destination is required
    'Destination' => array(
        'ToAddresses' => array( $email ),
        //'CcAddresses' => array('string', ... ),
        'BccAddresses' => array( 'help@shipfairy.com' ),
    ),
    // Message is required
    'Message' => array(
        // Subject is required
        'Subject' => array(
            // Data is required
            'Data' => 'Your '.date('l n/j', strtotime($date)).' delivery is confirmed',
            //'Charset' => 'string',
        ),
        // Body is required
        'Body' => array(
            'Text' => array(
                // Data is required
                'Data' => $emailcontent,
                'Charset' => 'UTF-8',
            ),
            'Html' => array(
                // Data is required
                'Data' => $emailcontent,
                'Charset' => 'UTF-8',
            ),
        ),
    ),
    'ReplyToAddresses' => array( 'help@shipfairy.com' ),
    'ReturnPath' => 'help@shipfairy.com',
));

?>