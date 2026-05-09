# Foodie's Restaurant 🍽️

A full-stack restaurant website with an interactive menu, cart system, and contact form — built with PHP, MySQL, and vanilla JavaScript.

## Live Features

- **Multi-page menu** — Starters, Main Course, and Desserts with food images and prices
- **Add to Cart system** — Select quantities and place orders saved to a MySQL database
- **Cart page** — View your order summary fetched from the backend via Fetch API
- **Contact form** — Messages saved to database with email reply via PHPMailer
- **About page** — Restaurant information and story
- **Responsive navigation** — Dropdown menu across all pages

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Frontend | HTML, CSS, JavaScript |
| Backend | PHP |
| Database | MySQL |
| Email | PHPMailer |
| Server | XAMPP (Apache) |

## Pages

```
home/         → Landing page with hero section
Starter/      → Starter menu with cart functionality
MainCourse/   → Main Course menu (Veg & Non-Veg)
Dessert/      → Dessert menu
payment/      → Cart summary page (requires live server)
contact/      → Contact form with email notification
about/        → About the restaurant
```

## Database Structure

```sql
-- Orders table
CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Cart items table
CREATE TABLE cart_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  item_name VARCHAR(255),
  price DECIMAL(10,2),
  quantity INT
);

-- Contact messages table
CREATE TABLE contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255),
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## How to Run Locally

1. Clone the repository
```bash
git clone https://github.com/AryanPanjari/foodie-restaurant.git
```

2. Copy the project into your XAMPP `htdocs` folder:
```
C:/xampp/htdocs/Restaurant
```

3. Install PHPMailer via Composer:
```bash
composer install
```

4. Import the database — create a database named `Restaurant` in phpMyAdmin and run the SQL from the Database Structure section above

5. Update `backend/db.php` with your MySQL credentials:
```php
$password = "your-mysql-password";
```

6. Update `backend/contact.php` with your Gmail credentials:
```php
$mail->Username = 'your-email@gmail.com';
$mail->Password = 'your-app-password';
```

7. Start Apache and MySQL in XAMPP Control Panel

8. Visit `http://localhost/Restaurant/home/index.html`

## Note on Cart Page

The cart page fetches order data from the MySQL database via PHP. It requires a running XAMPP server to display items. A demo notice is shown when accessed without a backend.

## Team

- Aryan Rajendra Panjari — [github.com/AryanPanjari](https://github.com/AryanPanjari)

---

© 2026 Aryan Rajendra Panjari. All rights reserved.
This project was independently developed as a learning exercise. It is not affiliated with or endorsed by any institution.
