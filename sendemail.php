<?php

//send test email to abhi@shipfairy.com

echo 'page loaded';
//echo $_SERVER['PARAM1'];

require 'aws.phar';

use Aws\Ses\SesClient;

$client = SesClient::factory(array(
    'key' => 'AKIAIWKHXOWR33QHLQGQ',
    'secret' => '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',
    'region'  => 'us-east-1'
));

$emailcontent = "email content as a variable";

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
    'ReplyToAddresses' => array('help@shipfairy.com' ),
    'ReturnPath' => 'help@shipfairy.com',
));

?>