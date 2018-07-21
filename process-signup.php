<?php

//get values submitted by form in signup.php

$email = $_POST['email'];
$password = crypt($_POST['password']);
$name = $_POST['fullname'];
$phone = $_POST['phone'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$city = "Chicago";
$state = "IL";
$zipcode = "60647";
$specialinstructions = $_POST['special-instructions'];


//sample values for testing purposes
/*
$email = 'abhi.reddy@gmail.com';
$password = 'test';
$name = 'Abhi Reddy';
$phone = '949-892-7965';
$address1 = '2600 N Kimball Ave';
$address2 = 'Apt 314';
$city = "Chicago";
$state = "IL";
$zipcode = "60647";
$specialinstructions = 'text2';
*/

$link = mysqli_connect('RDS_HOSTNAME', 'RDS_USERNAME', 'RDS_PASSWORD', 'ebdb', 3306);

$stmt = mysqli_prepare($link, "INSERT INTO customers (email, password, name, phone, address1, address2, city, state, zip, specialinstructions) 
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'ssssssssss', $email, $password, $name, $phone, $address1, $address2, $city, $state, $zipcode, $specialinstructions);

//execute statement
mysqli_stmt_execute($stmt);

//close statement and connection
mysqli_stmt_close($stmt);

//close connection
mysqli_close($link);

//send email notifying co-founders of signup

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

$emailcontent = 'Email: '.$email.'<br>Name: '.$name.'<br>Phone: '.$phone.'<br>Address: '.$address1.'<br>Apt/Ste: '.$address2.'<br>Special Instructions: '.$specialinstructions;

$result = $client->sendEmail(array(
    // Source is required
    'Source' => 'Shipfairy <help@shipfairy.com>',
    // Destination is required
    'Destination' => array(
        'ToAddresses' => array('help@shipfairy.com', 'abhi@shipfairy.com' ),
        //'CcAddresses' => array('string', ... ),
        //'BccAddresses' => array('string', ... ),
    ),
    // Message is required
    'Message' => array(
        // Subject is required
        'Subject' => array(
            // Data is required
            'Data' => 'Someone signed up!',
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

//confirmation email to customer
$result2 = $client->sendEmail(array(
    // Source is required
    'Source' => 'Shipfairy <help@shipfairy.com>',
    // Destination is required
    'Destination' => array(
        'ToAddresses' => array( $email ),
        //'CcAddresses' => array('string', ... ),
        //'BccAddresses' => array('string', ... ),
    ),
    // Message is required
    'Message' => array(
        // Subject is required
        'Subject' => array(
            // Data is required
            'Data' => 'Sign Up Confirmation',
            //'Charset' => 'string',
        ),
        // Body is required
        'Body' => array(
            'Text' => array(
                // Data is required
                'Data' => 'Thanks for signing up for Shipfairy. We\'ll finish setting up your account and send you another email within 24 hours with your new shipping address.
                <br>
                <br>Keep you posted!
                <br>Shipfairy
                <br>
                <br>
                P.S. You can reply to this email - I\'m human!',
                'Charset' => 'UTF-8',
            ),
            'Html' => array(
                // Data is required
                'Data' => 'Thanks for signing up for Shipfairy. We\'ll finish setting up your account and send you another email within 24 hours with your new shipping address.
                <br>
                <br>Keep you posted!
                <br>Shipfairy
                <br>
                <br>
                P.S. You can reply to this email - I\'m human!',
                'Charset' => 'UTF-8',
            ),
        ),
    ),
    'ReplyToAddresses' => array( 'help@shipfairy.com' ),
    'ReturnPath' => 'help@shipfairy.com',
));

?>