# HomeCraft — Mini Project Report

HomeCraft is a DIY and home improvement e-commerce website implemented as a static front-end prototype using HTML and CSS. This repository contains the UI pages, styles, and image assets created as part of a web programming project.

---
## Table of Contents
- Overview
- Features
- Architecture & Design
  - File structure
  - Page responsibilities (modules)
  - Assumed backend / database (not implemented)
  - API surface (assumed for a full implementation)
- How to run / preview
- Challenges faced
- Contributions
- Screenshots (app flow)

---

## Overview
HomeCraft provides a simple and clean front-end for an e-commerce experience focused on DIY and home-improvement products. The project demonstrates static page design, responsive layout concepts, and asset organization suitable for a starter e-commerce site.

This repository is a static prototype (no real backend or database was added). The README documents an assumed architecture for a complete deployment, including an example DB schema and API endpoints that would be added if the project were extended.

---

## Features
- Landing / home page showcasing hero banner and featured items (`index.html`).
- Product catalog listing (`products.html`).
- Product wishlist support (`wishlist.html`).
- Cart page to review selected items (`cart.html`).
- Checkout page UI (`checkout.html`).
- Authentication pages UI (`login.html`, `signup.html`).
- Budget planner / estimation page (`budget.html`).
- Shared CSS (`css/style.css`) and image assets (`images/`).

---

## Architecture & Design
This project is a front-end only implementation organized with clear separation of pages, styles, and assets.

File structure (important files):
- `index.html` — Landing page
- `products.html` — Product listing and filters
- `cart.html` — Shopping cart UI
- `checkout.html` — Checkout form and summary
- `login.html`, `signup.html` — Authentication UI
- `wishlist.html` — Saved items UI
- `budget.html` — Budget estimation tool UI
- `css/style.css` — Main stylesheet
- `images/` — Product and UI images

Page responsibilities (modules):
- Navigation / Header / Footer: shared across pages to provide site structure.
- Product listing: displays cards with image, title, price, and add-to-cart/wishlist actions.
- Cart & Checkout: present cart line-items and a checkout form (address, payment details UI).
- Auth (UI only): login/signup forms with validation UI.
- Budget planner: a simple UI to estimate purchase budget based on selected items.

UI decisions:
- Simple responsive layout using CSS (mobile-first where appropriate).
- Reusable card components for product display.
- Clear visual hierarchy for checkout and cart to reduce cognitive load.

Assumed backend / database (not implemented):
This repository does not include a running database. For a full implementation the following example database and data model were assumed:

- Database type (example): MongoDB or relational DB (MySQL/Postgres)
- Collections / tables and example fields:
  - users: { _id, name, email, passwordHash, createdAt }
  - products: { _id, title, description, price, images[], category, stock }
  - carts: { userId, items: [{ productId, quantity, price }], updatedAt }
  - orders: { orderId, userId, items, total, billingAddress, status, createdAt }
  - wishlists: { userId, items: [productId] }

Security and authentication (assumed):
- Passwords stored as hashed values (bcrypt or similar).
- Sessions via JWT or secure server-side sessions and HttpOnly cookies.

API surface (assumed endpoints for a full implementation):
- Auth
  - POST /api/auth/signup — create user
  - POST /api/auth/login — authenticate and return token/session
  - POST /api/auth/logout — invalidate session
- Products
  - GET /api/products — list or search products
  - GET /api/products/:id — single product
- Cart / Wishlist
  - GET /api/cart (protected) — get user's cart
  - POST /api/cart — add item to cart
  - PUT /api/cart — update item quantity
  - DELETE /api/cart/:itemId — remove item
  - GET /api/wishlist (protected)
  - POST /api/wishlist — add item
- Orders / Checkout
  - POST /api/checkout — create order (would integrate with payment gateway)
  - GET /api/orders — list user orders

Third-party integrations (possible)
- Payment: Stripe / PayPal (for payment processing in checkout flow)
- Email: SendGrid or Mailgun (order confirmations)
- Analytics: Google Analytics or similar for usage tracking

Note: In this static prototype these APIs are not implemented; they are documented to guide future backend integration.

---

## How to run / preview
This is a static site. To preview locally:
1. Open `index.html` in a browser, or
2. Use a local static server (recommended), for example using VS Code Live Server extension or:
   - `npx http-server` (or any simple static server)

---

## Challenges faced
- Designing a consistent visual language and spacing across multiple static pages with only CSS.
- Simulating dynamic behaviors (cart updates, wishlist toggles) without a JavaScript-driven backend — UI-only interactions must be clearly represented.
- Organizing images and asset sizes to keep page load reasonable while preserving visual quality.

---

## Contributions
- Adarsh Patil — Project owner: UI design, HTML & CSS implementation, content and documentation.

(If this was a team project, list each member and their responsibilities here.)

---

## Screenshots (app flow)
Below are example screenshots to illustrate the flow and main features. Replace or add more screenshots in the `images/` folder as needed.

- Home / Landing page: `images/hero.jpg`
- Products / Catalog (example product card): `images/chair.jpg`, `images/sofa.jpg`, `images/shelf.jpg`
- Login page background: `images/login-bg.jpg`
- Logo / branding: `images/logo.png`

To include screenshots in README, add them to `images/` and use Markdown image references like:

![Home](/images/hero.jpg)

---

## Next steps / Improvements
- Add a backend API and persistent database to store users, products, carts, and orders.
- Implement authentication, cart persistence, and real checkout with a payment gateway.
- Add JavaScript-driven client-side interactivity (dynamic cart updates, client-side routing for SPA behavior).
- Improve accessibility and add automated tests.

---

If you want, I can also add a brief API spec (OpenAPI/Swagger) or implement a simple Node.js/Express backend skeleton and example DB schema for this project.
