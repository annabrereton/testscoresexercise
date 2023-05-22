<?php

require "vendor/autoload.php";

use TestData\Services\TestDataServices;

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Content-Type: application/json');

$testDataServices = new TestDataServices();
//$fetchedData = $testDataServices->allTestDataJSONResponse();

try {
    http_response_code(200);
    $fetchedData = $testDataServices->allTestDataJSONResponse();
    $data = json_encode($fetchedData);
}  catch (\PDOException $e) {
    http_response_code(500);
    $data = json_encode(["message" => "Unexpected error"]);
}

echo $data;
