<?php
$conn = new mysqli("localhost", "root", "", "homecraft", 3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>