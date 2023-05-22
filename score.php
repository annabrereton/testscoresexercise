<?php

require "vendor/autoload.php";

use TestData\Services\TestDataServices;

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Content-Type: application/json');

$testDataServices = new TestDataServices();

try {
    http_response_code(200);
    $fetchedData = $testDataServices->fetchTestDataByIdJSONResponse(intval($_GET['id']));
    $data = json_encode($fetchedData);
}  catch (\PDOException $e) {
    http_response_code(500);
    $data = json_encode(["message" => "Unexpected error"]);
}

echo $data;
//var_dump(intval($_GET['id']));
//var_dump($fetchedData);
//var_dump($data);

//
//require "vendor/autoload.php";
//
//use TestData\Services\TestDataServices;
//
//header('Access-Control-Allow-Origin: http://localhost:3000');
//header('Content-Type: application/json');
//
//$testDataServices = new TestDataServices();
//
//try {
//    $id = intval($_GET['id']);
//
//    // Create a cURL resource
//    $curl = curl_init();
//
//    // Set the URL to send the GET request
//    curl_setopt($curl, CURLOPT_URL, 'http://localhost:1234/testscoresexercise/score.php?id=' . $id);
//
//    // Set options for handling the response
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
//
//    // Execute the request and get the response
//    $response = curl_exec($curl);
//
//    // Check if the request was successful
//    if ($response === false) {
//        throw new \Exception('cURL request failed: ' . curl_error($curl));
//    }
//
//    // Get the HTTP response code
//    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//
//    // Close the cURL resource
//    curl_close($curl);
//
//    if ($httpCode == 200) {
//        http_response_code(200);
//        $data = $response;
//    } else {
//        http_response_code($httpCode);
//        $data = json_encode(["message" => "Unexpected error"]);
//    }
//} catch (\Exception $e) {
//    http_response_code(500);
//    $data = json_encode(["message" => $e->getMessage()]);
//}
//
//echo $data;