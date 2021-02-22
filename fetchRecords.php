<?php

/*
 * Snapforce API - fetchRecords()
 * This script uses cURL to send a post request to your Snapforce CRM.
 */

// Authentication
$api_user = "your api user";
$api_key = "your api key";

// Identify the URL:
$url = 'https://crm.snapforce.com/vintage/sf_receive_request.inc.php';

// Start the process:
$curl = curl_init($url);

$fetchRecords = "format=xml&api_user=$api_user&api_key=$api_key&module=Leads&status=Active&method=fetchRecords";

// Tell cURL to fail if an error occurs:
curl_setopt($curl, CURLOPT_FAILONERROR, 1);

// Allow for redirects:
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

// Assign the returned data to a variable:
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// Set the timeout:
curl_setopt($curl, CURLOPT_TIMEOUT, 5);

// Use POST:
curl_setopt($curl, CURLOPT_POST, 1);

// Set the POST data:
curl_setopt($curl, CURLOPT_POSTFIELDS, $fetchRecords);

// Execute the transaction:
$r = curl_exec($curl);

// Close the connection:
curl_close($curl);

libxml_use_internal_errors(true);

$xml = simplexml_load_string($r) or die("Error: Cannot create object");

// print each lead
foreach ($xml as $xml1) {
    echo $xml1->lead_id."\n";
    echo $xml1->type."\n";
    echo $xml1->website."\n";
    echo $xml1->contact_first."\n";
}

?>
