<?php
$url = 'https://desk.zoho.com/api/v1/associatedTickets?include=contacts
  -H "orgId:60005558783"
  -H "Authorization:Zoho-oauthtoken 1000.3d0a155402dbb59f776fd63adb1e67c0.a41ea557a6a8d7e402690098b2056f60s';
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, $url);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$phoneList = curl_exec($cURLConnection);
curl_close($cURLConnection);

echo $jsonArrayResponse = json_decode($phoneList);