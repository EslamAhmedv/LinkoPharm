<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// use Infobip\Configuration;
// use Infobip\Api\SmsApi;
// use Infobip\Model\SmsDestination;
// use Infobip\Model\SmsTextualMessage;
// use Infobip\Model\SmsAdvancedTextualRequest;

// require '../vendor/autoload.php';

// function message($phone,$name,$totalamount) {

//     $number = "+20".$phone;
//     $message = "Your order has been confirmed
// Name: $name
// Total amount: $totalamount";
    
    
//         $base_url = "https://3gmkmn.api.infobip.com";
//         $api_key = "107ab2ca59d6e1d862695d4b0d597551-37848a60-5dea-45e7-8a11-db46351fc4e1";
    
//         $configuration = new Configuration(host: $base_url, apiKey: $api_key);
    
//         $api = new SmsApi(config: $configuration);
    
//         $destination = new SmsDestination(to: $number);
    
//         $message = new SmsTextualMessage(
//             destinations: [$destination],
//             text: $message,
//             from: "LinkoPharm"
//         );
    
//         $request = new SmsAdvancedTextualRequest(messages: [$message]);
    
//         $response = $api->sendSmsMessage($request);
// }
?>

