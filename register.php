<?php

require('ET_Client.php');

use Minishlink\WebPush\WebPush;

try {	
var_dump(0);
		$myclient = new ET_Client();

		$dataExtensionExternalKey = getenv('PUSH_REGISTRATION_DE_EXTERNAL_KEY');
		$dataExtensionName = getenv('PUSH_REGISTRATION_DE_NAME');
			
var_dump('$dataExtensionExternalKey:',$dataExtensionExternalKey);
var_dump('$dataExtensionName:',$dataExtensionName);

		// Add a row to a DataExtension 
		$request_body = file_get_contents('php://input');
		$request_data = json_decode($request_body);
		$subscriptionId = $request_data->id;
		$firstName = $request_data->firstName;
		$lastName = $request_data->lastName;
		$email = $request_data->email;
		$browserPushOptin = $request_data->browserPushOptin;
var_dump(1);
		$authKey = $request_data->subscription->keys->auth;
		$p256dhKey = $request_data->subscription->keys->p256dh;
		$subscription = $request_data->subscription;
var_dump(2);

		print_r("Add a row to a DataExtension  \n");
		$postDRRow = new ET_DataExtension_Row();
		$postDRRow->authStub = $myclient;
		$postDRRow->props = array("Key" => $dataExtensionExternalKey, 
								  "SubscriptionID" => $subscriptionId, 
								  "SubscriberKey" => $email,
								  "FirstName" => $firstName,
								  "LastName" => $lastName,
								  "EmailAddress" => $email,
								  "BrowserPushOptin" => $browserPushOptin,
								  "AuthKey" => $authKey,
								  "p256dhKey" => $p256dhKey,
								  "Subscription" => json_encode($subscription));
		$postDRRow->Name = $dataExtensionName;	
		$postResult = $postDRRow->post();
		print_r('Post Status: '.($postResult->status ? 'true' : 'false')."\n");
		print 'Code: '.$postResult->code."\n";
		print 'Message: '.$postResult->message."\n";	
		print 'Result Count: '.count($postResult->results)."\n";
		print 'Results: '."\n";
		print_r($postResult->results);
		print "\n---------------\n";
var_dump(3);

		$patchResult = $postDRRow->patch();
		print_r('Patch Status: '.($patchResult->status ? 'true' : 'false')."\n");
		print 'Code: '.$patchResult->code."\n";
		print 'Message: '.$patchResult->message."\n";	
		print 'Result Count: '.count($patchResult->results)."\n";
	}

	catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

?>


