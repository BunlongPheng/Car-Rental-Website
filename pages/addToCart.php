<?php
$id = $_GET["id"];

session_start();

// load car xml file
$xml = simplexml_load_file("../database/car.xml") or die("Error 404!");
foreach ($xml->children() as $carRental) {
    if (($id == $carRental->id) && ("Yes" == $carRental->availability)){
        // add car to the car reservation cart 
        $carDetail = array(
            "image" => (string) $carRental->image,
            "mileage" => (string) $carRental->mileage,
            "fuelType" => (string) $carRental->fuelType,
            "seat" => (string) $carRental->seat,
            "description" => (string) $carRental->description,
            "brand" => (string) $carRental->brand,
            "model" => (string) $carRental->model,
            "modelYear" => (string) $carRental->modelYear,
            "pricePerDay" => (int) $carRental->pricePerDay,
            "RentDay" => 1
        );
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array($id => $carDetail);
        } else if (!isset($_SESSION["cart"][$id])) {
            $_SESSION["cart"][$id] = $carDetail;
        }
        echo $carRental->availability;
        return;
    }
}
?>