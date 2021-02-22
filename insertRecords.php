<?php

/*
 * Snapforce API - insertRecords()
 * This script uses cURL to send a post request to your Snapforce CRM.
 */

// Authentication
$api_user = "your api user";
$api_key = "your api key";

// Identify the URL:
$url = 'https://crm.snapforce.com/vintage/sf_receive_request.inc.php';

// Start the process:
$curl = curl_init($url);

$insertRecords = "format=xml&api_user=$api_user&api_key=$api_key&module=Leads&status=Active&method=insertRecords&contact_first=Michael&contact_last=Stefonson&lead_status=Open";

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
curl_setopt($curl, CURLOPT_POSTFIELDS, $insertRecords);

// Execute the transaction:
$r = curl_exec($curl);

// Close the connection:
curl_close($curl);

?>
