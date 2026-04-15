<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout - HomeCraft</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<!-- Navbar -->
<header class="navbar">
    <div class="logo">
        <img src="images/logo.png" width="30">
        <span>HomeCraft</span>
    </div>

    <nav class="nav-links">
        <a href="index.php">Home</a>
        <a href="products.html">Products</a>
        <a href="cart.php">Cart</a>
        <a href="wishlist.php">Wishlist ❤️</a>
    </nav>

    <div class="login-panel">
        <a href="login.html">👤 Login</a>
    </div>
</header>

<h1 style="text-align:center;">Checkout</h1>

<div class="checkout-container">

    <!-- LEFT: FORM -->
    <div class="checkout-form">

        <h2>Shipping Details</h2>

        <label>Name</label>
        <input type="text" id="name" placeholder="Enter your name">

        <label>Address</label>
        <input type="text" id="address" placeholder="Enter your address">

        <label>City</label>
        <input type="text" id="city" placeholder="Enter your city">

        <label>Payment Method</label>
        <select id="payment">
            <option value="">Select Payment</option>
            <option>Cash on Delivery</option>
            <option>UPI</option>
            <option>Card</option>
        </select>

        <button onclick="placeOrder()">Place Order</button>

    </div>

    <!-- RIGHT: ORDER SUMMARY -->
    <div class="checkout-summary">

        <h2>Order Summary</h2>

        <div id="order-items"></div>

        <hr>

        <h3>Total: ₹<span id="final-total">0</span></h3>

    </div>

</div>

<!-- ================= JAVASCRIPT ================= -->
<script>

let cart = JSON.parse(localStorage.getItem("cart")) || [];
let container = document.getElementById("order-items");
let total = 0;

// 🟡 EMPTY CART CHECK
if(cart.length === 0){
    container.innerHTML = "<p>Your cart is empty 😢</p>";
}

// 🟢 SHOW ITEMS
cart.forEach(item => {
    total += item.price * item.quantity;

    container.innerHTML += `
        <p>${item.name} (x${item.quantity}) - ₹${item.price * item.quantity}</p>
    `;
});

document.getElementById("final-total").innerText = total;


// 🟢 PLACE ORDER
function placeOrder(){

    let name = document.getElementById("name").value.trim();
    let address = document.getElementById("address").value.trim();
    let city = document.getElementById("city").value.trim();
    let payment = document.getElementById("payment").value;

    // ❌ VALIDATION
    if(name === "" || address === "" || city === ""){
        alert("Please fill all fields ❗");
        return;
    }

    if(payment === ""){
        alert("Please select payment method ❗");
        return;
    }

    if(cart.length === 0){
        alert("Cart is empty!");
        return;
    }

    // ✅ SUCCESS
    fetch("place_order.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify({
        name: name,
        address: address,
        city: city,
        payment: payment,
        cart: cart
    })
})
.then(res => res.text())
.then(data => {
    alert("Order placed successfully 🎉");

    localStorage.removeItem("cart");

    window.location.href = "index.php";
});
}

</script>

</body>
</html>