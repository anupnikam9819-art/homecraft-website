<?php
include "db.php";

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "INSERT INTO users (name, email, password)
        VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Signup successful ✅');
        window.location.href='login.html';
    </script>";
} else {
    echo "<script>
        alert('Error ❌');
        window.location.href='signup.html';
    </script>";
}
?>