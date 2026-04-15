<?php
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$address = $data['address'];
$city = $data['city'];
$payment = $data['payment'];
$total = 0;

// calculate total
foreach($data['cart'] as $item){
    $total += $item['price'] * $item['quantity'];
}

$sql = "INSERT INTO orders (name, address, city, payment, total) 
        VALUES ('$name', '$address', '$city', '$payment', '$total')";

if ($conn->query($sql) === TRUE) {
    echo "Order placed!";
} else {
    echo "Error: " . $conn->error;
}
?>