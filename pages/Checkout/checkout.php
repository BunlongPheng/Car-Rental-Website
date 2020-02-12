<?php
session_start();

// to calculate the total price of the rental day
$total = 0;
$rentDay = $_REQUEST["rentDay"];
$index = 0;
foreach ($_SESSION["cart"] as $id => $car) {
    $_SESSION["cart"][$id]["RentDay"] = $rentDay[$index];
    $total += $rentDay[$index++] * $car["pricePerDay"];
}
$_SESSION["total"]=$total;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../styles/home.css">
    <link rel="stylesheet" type="text/css" href="../../styles/cart.css">

    <title>Checkout Form</title>
</head>
<body>
    <div class="header">
    <div style="float:left; width: 15%; ">
    </div>

    <div style="float: left; width: 70%; height: 100%; ">
    <h1 class="headText" style="margin-top: 10px">Check Out Form</h1>
    </div>
</div>
    <div class="container mx-4">
        <p style="color: red;">* Required</p>
        <form name="emailForm" method="post" action="email.php">
        <div class="form-group row">
            <label for="firstName" class="col-sm-2 col-form-label">First Name: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" required name="firstName" id="firstName" placeholder="First Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="lastName" class="col-sm-2 col-form-label">Last Name: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" required name="lastName" id="lastName"  placeholder="Last Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email Address: </label>
            <div class="col-sm-10">
                <input type="email" class="form-control" required name="email" id="email"  placeholder="Email Address">
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" required name="address" id="addrLine1"  placeholder="Address Line 1">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Suburb</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" required name="Suburb" id="Suburb"  placeholder="Suburb">
            </div>
        </div>
        <div class="form-group row">
            <label for="state" class="col-sm-2 col-form-label">State</label>
            <div class="col-sm-10">
                <select class="form-control" required id="state" name="state">
                    <option selected>New South Wales</option>
                    <option>Victoria</option>
                    <option>Queensland</option>
                    <option>Tasmania</option>
                    <option>Western Australia</option>
                    <option>South Australian</option>
                    <option>Australian Capital Territory</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="postCode" class="col-sm-2 col-form-label">Post Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" required name="postCode" id="postCode"  placeholder="Post Code">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Payment Type</label>
            <div class="col-sm-10">
                <select class="form-control" required id="paymentMethod" name="paymentMethod">
                    <option selected>VISA</option>
                    <option>MasterCard</option>
                </select>
            </div>
        </div>
        <h3 style="float:right;">Total: $<?php echo $total;?></h3>
        <div class="form-group row" style="float: left;">
            <div class="col-sm-12 text-right">
                <input type="submit" value="Cancel" onclick="window.location.href='../..//index.html'" class="btn btn-danger" />
                <input type="submit" class="btn btn-primary" value="Confirm" />
            </div>
        </div>
    </form>
    </div>

<div class="footer" style="margin-top: 10px;">
    
<p class="footerText" style="margin:20px"> Copyrights Bunlong Pheng 13137233 @UTS_2019 </p>
</div>
</body>
</html>