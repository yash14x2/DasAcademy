<?php
include_once("dbconnection.php");
session_start();
if(!isset($_SESSION['stulogemail']))
{
    echo "<script> location.href = 'loginorsignup.php' </script>";
}
else
{
    header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
     $stulogemail = $_SESSION['stulogemail'] ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="GENERATOR" content="Evrsoft First Page">
    <title>CheckOut</title>
    <link rel="stylesheet" href="./csss/all.min.css">
    <link rel="stylesheet" href="./csss/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 jumbotron">
                <h3 class="text-center">Check And Pay</h3>
                <form method="post" action="./paytmkit/pgRedirect.php">
                    <div class="form-group row">
                        <label for="ORDER_ID" class="col-sm-4 col-form-label">Order Id</label>
                        <div class="col-sm-8">
                        <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999) ?>" readonly>

                        </div>
                        </div>  

                        <div class="form-group row">
                        <label for="CUST_ID" class="col-sm-4 col-form-label">Student Email</label>
                        <div class="col-sm-8">
                        <input type="text" readonly id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php
                        if(isset($stulogemail)){echo $stulogemail; }
                        ?>" readonly class="form-control">

                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
                        <div class="col-sm-8">
                        <input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php
                        if(isset($_POST['id'])){echo $_POST['id'];}
                        ?>" class="form-control" readonly>

                        </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-8">
                            <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-8">
                            <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
                            
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <input type="submit" value="Check Out" class="btn btn-primary" onclick="">
                            <a href="courses.php" class="btn btn-secondary">Cancel</a>
                        </div>
</form>

<small class="form-text text-muted">Note:Complete Payment By clicking Checkout Button</small>
                        

                    </div>

            </div>
        </div>
    </div>

</body>
</html>
<?php
}
?>