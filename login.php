<?php

session_start();
include("db.php");

// Get form data
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Check user in database
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    $user = mysqli_fetch_assoc($result);

    // Store session
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];

    // Redirect to home
    header("Location: index.php");
    exit();

} else {

    echo "<script>
        alert('Invalid Email or Password ❌');
        window.location.href='login.html';
    </script>";

}

?>