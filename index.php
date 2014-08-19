<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
		<!-- BASICS -->
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Germ - Based on VirusTotal API</title>
        <meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/style.css">
		<!-- skin -->
		<link rel="stylesheet" href="skin/default.css">
    </head>
	 
    <body>



<?php 
if(!isset($_POST['scanme'])){

?>
		<section class="featured">
			<div class="container"> 
				<div class="row mar-bot40">
					<div class="col-md-6 col-md-offset-3">
						
						<div class="align-center">
							<i class="fa fa-bug fa-10x mar-bot20"></i>
							<h2 class="slogan"> Germ</h2>
							<div class="cform" id="contact-form">
							
					<form action="index.php" method="post" role="form" class="contactForm">
							  <div class="form-group">
								<input type="text" name="query" class="form-control" id="name" placeholder="Enter URL to scan" />
							  </div>
							  							  
							  <button type="submit" class="btn btn-theme" name="scanme">Scan</button>
							</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php 
}

?>

<?php 

if(isset($_POST['scanme'])){
require_once('VirusTotalApiV2.php');
$api = new VirusTotalAPIV2('db62ac9882832bbd8ec909f9e41d7790b442ae525e5438d3b9ced1e670a34cb8');


$urltoscan=$_POST['query'];
$result = $api->scanURL($urltoscan);
$scanId = $api->getScanID($result); /* Can be used to check for the report later on. */
//$api->displayResult($result);

/* Get an URL report. */
$report = $api->getURLReport($urltoscan);
$api->displayResult($report);
//print($api->getTotalNumberOfChecks($report) . '<br>');
//print($api->getNumberHits($report) . '<br>');
//print($api->getReportPermalink($report, FALSE) . '<br>');
//print($api->getNumberHits($report) . '<br>');
//echo "Success";


}
?>		

		
	</body>
</html>
