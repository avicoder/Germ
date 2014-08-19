<?php
require_once('VirusTotalApiV2.php');

/* Initialize the VirusTotalApi class. */
$api = new VirusTotalAPIV2('db62ac9882832bbd8ec909f9e41d7790b442ae525e5438d3b9ced1e670a34cb8');

/* Scan an URL. */
$result = $api->scanURL('http://www.google.com');
$scanId = $api->getScanID($result); /* Can be used to check for the report later on. */
//$api->displayResult($result);

/* Get an URL report. */
$report = $api->getURLReport('http://www.google.com');
$api->displayResult($report);
//print($api->getTotalNumberOfChecks($report) . '<br>');
//print($api->getNumberHits($report) . '<br>');
//print($api->getReportPermalink($report, FALSE) . '<br>');
print($api->getNumberHits($report) . '<br>');

?>
