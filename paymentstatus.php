<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include('./mainincludes/header.php');

include_once ('dbconnection.php');
?>


<!-- start of course bannner -->


<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./phothos/course3.jpg" alt="" style="height:300px ; width:100%; object-fit:cover; "/>
    </div>

    
</div>


<!-- end of course banner -->

<!-- start main content -->
<?php

?>
<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	// following files need to be included
	require_once("./PaytmKit/lib/config_paytm.php");
	require_once("./PaytmKit/lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Transaction status query</title>
<meta name="GENERATOR" content="Evrsoft First Page">
</head>
<body>
    <div class="col-sm-7">
	<h2 class="text-center" style="margin-left:410px;">Payment Status</h2>
</div>
</div>
</div>
	<form method="post" action="" class="form-inline text-center" > 
            
  
	
	<form method="post" action="" class="form-inline text-center mt-10">
           <strong> <label for="order_id">Order Id : </label></strong>
			<input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>" class="d-inline">

					<input value="Submit" type="submit"	onclick="" class="btn btn-primary p-1">
	
          </div>
				
			
		</table>
		<br/></br/>
		<?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 
		?>
		<div class="container">
            <div class="row" style="margin-left:300px;">
                <div class="col-auto">
                    <h2 class="text-center">Payment Receipt</h2>
                    <table class="table table-bordered">
			<tbody>
				<?php
					foreach($responseParamList as $paramName => $paramValue) {
				?>
				<tr >
					<td><label><?php echo $paramName?></label></td>
					<td><?php echo $paramValue?></td>
				</tr>
				<?php
					}
				?>
                <tr>
            <td><Button type="button" class="btn btn-primary" onclick="javascript:window.print();">Print</Button></td>
        </tr>
			</tbody>
		</table>
		<?php
		}
		?>
        
                </div>

            </div>
        </div>
		
	</form>
    </div>







<!-- start contact us -->
<?php
include('contactus.php');

?>
<!-- end contact us -->

<!-- end of main content -->

<?php
include('./mainincludes/footer.php')
?>


