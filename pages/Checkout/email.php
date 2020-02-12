<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../styles/home.css">

    <title>Email</title>
</head>
<body>
    <div class="header">
    <div style="float:left; width: 15%; ">
        
    </div>

    <div style="float: left; width: 70%; height: 100%; ">
    <h1 class="headText" style="margin-top: 30px;">Digital Reciept is sent via email.</h1>
    </div>
    
    
    
    </div>

    <div class="container text-center">
        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Vehicle</th>
                                <th scope="col">Price Per Day</th>
                                <th scope="col">Rent Days</th>
                            </tr>
                            </thead>
                            <tbody>
       <?php
            
            foreach ($_SESSION["cart"] as $id => $car) {
                echo '<tr>';
                echo '<td class="align-middle" scope="row"><img style="width: 100px; height: 80px;" class="img-thumbnail" src="../../images/'.$car["image"].'"></td>';
                echo '<td class="align-middle" class="align-middle">'. $car["modelYear"] .'-'. $car["brand"] .'-'. $car["model"] .'</td>';
                echo '<td class="align-middle">$'. $car["pricePerDay"] .'</td>';
                echo '<td class="align-middle">"'.$car["RentDay"].'" </td></tr>';
                
            }

            echo '</tbody></table>';

       ?>
        <h1></h1>
        <input value="Done" onclick="window.location.href='../../index.html'" class="btn btn-success" />
    </div>

    <?php

$to = $_REQUEST['email'];
$subject = 'Your Rental Detail';
$message .= '<h1>Digital Reciept for car renting</h1>
            <h2>Rents Detail:</h2>';

$message .='<table>
                            <thead>
                            <tr>
                                <th>Vehicle</th>
                                <th>Price Per Day</th>
                                <th>Rent Days</th>
                                <th>Fuel Type</th>
                                <th>Seat</th>
                                <th>Mileage</th>
                            </tr>
                            </thead>
                            <tbody>';

foreach ($_SESSION["cart"] as $id => $car) {

    $message .='<tr>';
    $message .='<td>'. $car['modelYear'] .'-'. $car['brand'] .'-'. $car['model'] .'</td>';
    $message .='<td class="align-middle">$'. $car['pricePerDay'].'</td>';
    $message .= '<td class="align-middle">"'.$car['RentDay'].'" </td>';
    $message .= '<td class="align-middle">"'.$car['fuelType'].'" </td>';
    $message .= '<td class="align-middle">"'.$car['seat'].'" </td>';
    $message .= '<td class="align-middle">"'.$car['mileage'].'" </td></tr>'; 
    $message .='<br>';
}

$message .='</tbody></table>';
$message .='<h3>Total: $' . $_SESSION["total"].'</h3>';

$message .='<h4>Thank you for renting with US</h4>';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


$headers .= 'From: <bunlong.pheng@student.uts.edu.au>' . "\r\n";
$headers .= "Return-Path: <bunlong.pheng@student.uts.edu.au>\n";

mail($to, $subject, $message, $headers);
?>

</body>
<?php
session_destroy();
?>