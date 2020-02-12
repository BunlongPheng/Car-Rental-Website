<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Car Rental Cart</title>
    <link rel="stylesheet" type="text/css" href="../../styles/home.css">
    <link rel="stylesheet" type="text/css" href="../../styles/cart.css">
</head>
<body>
    <body>
    <div class="header">
    <div style="float:left; width: 15%; ">
        
    </div>

    <div style="float: left; width: 70%; height: 100%; ">
    <h1 class="headText" style="margin-top: 30px;">Car Rental Cart</h1>
    </div>
    
    
    
    </div>
    


        <?php
        session_start();
        if (empty($_SESSION["cart"])){
            echo '<div class="container text-center">';
            echo '<h2>No cars in the cart. Please go back to select the car.</h2>';
            echo '<a href="../../index.html" class="btn btn-primary">Back to Home</a></div>';
        }else{
            echo '<form id="checkout" method="post" action="../Checkout/checkout.php">';
            echo '<div class="container">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Vehicle</th>
                                <th scope="col">Price Per Day</th>
                                <th scope="col">Rent Days</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>';

            foreach ($_SESSION["cart"] as $id => $car) {
                echo '<tr>';
                echo '<td class="align-middle" scope="row"><img style="width: 100px; height: 80px;" class="img-thumbnail" src="../../images/'.$car["image"].'"></td>';
                echo '<td class="align-middle" class="align-middle">'. $car["modelYear"] .'-'. $car["brand"] .'-'. $car["model"] .'</td>';
                echo '<td class="align-middle">$'. $car["pricePerDay"].'</td>';
                echo '<td class="align-middle"><input name="rentDay[]" type="number" required max="30" min="1" value="'.$car["RentDay"].'" </td>';
                echo '<td class="align-middle"><button type="submit" onclick="document.getElementById(\'deleteId\').value=' . $id . '" class="btn btn-danger" form="deleteForm">Delete</button></td></tr>';
            }

            echo '</tbody></table>
            <div class="text-right">
                <a class="btn btn-primary" href="../../index.html"" >Back to Home</a>
                <button type="submit" form="checkout" class="btn btn-success">Proceed to Checkout</button>
            </div></div></form>';

        }
        ?>



<form id="deleteForm" method="post" action="deleteFromCart.php">
    <input hidden name="id" id="deleteId" value="">
</form>


</body>
</html>