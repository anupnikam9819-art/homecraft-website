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
    <title>HomeCraft - DIY & Home Improvement Store</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<div id="toast" class="toast">Item added to cart!</div>
<body>

<!-- Header / Navbar -->
<header class="navbar">

    <div class="logo">
        <img src="images/logo.png" alt="logo">
        <span>HomeCraft</span>
    </div>

    <nav class="nav-links">
        <a href="index.php">Home</a>
        <a href="products.html">Products</a>
        <a href="cart.php">Cart (<span id="cart-count-nav">0</span>)</a>
        <a href="wishlist.php">Wishlist ❤️</a>
        <a href="budget.html">Budget</a>
    </nav>

    <div class="login-panel">
        <a href="login.html">👤 Login</a>
    </div>

</header>


<!-- Hero Section -->
<section class="hero">

    <div class="hero-text">
        <h1>Create Your Perfect Home</h1>
        <p>DIY Kits, Furniture & Home Decor</p>
        <p class="highlight">Smart Budget-Based Shopping System 💡</p>
        <a href="products.html" class="shop-btn">Shop Now</a>
        <a href="budget.html" class="shop-btn">Try Budget Setup 💡</a>

    </div>

</section>


<!-- Featured Products -->
<section class="featured">

<h2 class="section-title">Featured Products</h2>

<div class="product-grid">

    <div class="product-card">
        <img src="images/chair.jpg">
        <h3>Wooden Chair</h3>
        <p>₹2000</p>
        <button onclick="addToCart('Wooden Chair', 2000, 'images/chair.jpg')">
            Add to Cart
        </button>
    </div>

    <div class="product-card">
        <img src="images/frame.jpg">
        <h3>Wall Frame Decor</h3>
        <p>₹800</p>
        <button onclick="addToCart('Wall Frame Decor', 800, 'images/frame.jpg')">
            Add to Cart
        </button>
    </div>

    <div class="product-card">
        <img src="images/shelf.jpg">
        <h3>DIY Shelf Kit</h3>
        <p>₹1500</p>
        <button onclick="addToCart('DIY Shelf Kit', 1500, 'images/shelf.jpg')">
            Add to Cart
        </button>
    </div>

</div>

</section>


<!-- Footer -->
<footer class="footer">

    <div class="footer-container">

        <div class="footer-section">
            <h3>HomeCraft</h3>
            <p>DIY Kits, Furniture & Home Decor for your perfect home.</p>
        </div>

        <div class="footer-section">
            <h4>Quick Links</h4>
            <a href="index.html">Home</a><br>
            <a href="products.html">Products</a><br>
            <a href="cart.html">Cart</a><br>
            <a href="login.html">Login</a>
        </div>

        <div class="footer-section">
            <h4>Contact</h4>
            <p>Email: support@homecraft.com</p>
            <p>Phone: +91 98765 43210</p>
        </div>

    </div>

    <p class="footer-bottom">© 2026 HomeCraft | All Rights Reserved</p>

</footer>

<!-- ================= JAVASCRIPT ================= -->
<script>

// 🛒 Add to Cart


function showToast(message){
    let toast = document.getElementById("toast");
    toast.innerText = message;
    toast.classList.add("show");

    setTimeout(() => {
        toast.classList.remove("show");
    }, 2000);
}

function addToCart(name, price, image){

    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    let found = cart.find(item => item.name === name);

    if(found){
        found.quantity++;
    } else {
        cart.push({
            name: name,
            price: price,
            image: image,
            quantity: 1
        });
    }

    localStorage.setItem("cart", JSON.stringify(cart));

    updateCartCount();

    showToast(name + " added to cart ✅");
}

// 🔢 Cart Count
function updateCartCount(){
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    
    let count = 0;
    cart.forEach(item => {
        count += item.quantity;
    });

    document.getElementById("cart-count-nav").innerText = count;
}

// Load count on page load
updateCartCount();

</script>

</body>
</html>