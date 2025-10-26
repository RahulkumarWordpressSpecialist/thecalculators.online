<?php
require_once '../includes/config.php';

$page_title = get_page_title('About Us');
$meta_description = "Learn about The Calculators Online - your one-stop destination for all types of online calculators and tools.";
$canonical_url = SITE_URL . '/pages/about.php';

require_once '../includes/header.php';
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Contact Us — The Calculators Online</title>
  <meta name="description" content="Contact The Calculators Online for support, feedback, or business inquiries. We're happy to help you." />
  <meta name="theme-color" content="#ffffff" />
  <style>
    body {
      font-family: 'Segoe UI', Roboto, Arial, sans-serif;
      background: #f9fafb;
      margin: 0;
      padding: 0;
      color: #111827;
    }
    .container {
      max-width: 900px;
      margin: 60px auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
      padding: 30px;
    }
    h1 {
      font-size: 28px;
      margin-bottom: 10px;
      color: #2563eb;
    }
    p {
      color: #374151;
      line-height: 1.6;
    }
    form {
      display: flex;
      flex-direction: column;
      gap: 14px;
      margin-top: 20px;
    }
    label {
      font-weight: 600;
      color: #1f2937;
      font-size: 14px;
    }
    input, textarea {
      padding: 10px 14px;
      border-radius: 8px;
      border: 1px solid #d1d5db;
      font-size: 14px;
      width: 100%;
    }
    input:focus, textarea:focus {
      outline: none;
      border-color: #2563eb;
      box-shadow: 0 0 0 3px rgba(37,99,235,0.15);
    }
    button {
      background: #2563eb;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 12px 18px;
      font-size: 15px;
      cursor: pointer;
      transition: background 0.3s;
    }
    button:hover {
      background: #1d4ed8;
    }
    .info {
      margin-top: 30px;
      background: #f3f4f6;
      border-radius: 8px;
      padding: 20px;
      line-height: 1.7;
    }
    .info h2 {
      color: #111827;
      font-size: 18px;
      margin-top: 0;
    }
    a {
      color: #2563eb;
      text-decoration: none;
    }
    footer {
      text-align: center;
      margin-top: 40px;
      font-size: 14px;
      color: #6b7280;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Contact Us</h1>
    <p>Have questions, feedback, or business inquiries? We’d love to hear from you. Fill out the form below or use the contact details provided.</p>

    <form id="contactForm">
      <label for="name">Your Name</label>
      <input type="text" id="name" name="name" placeholder="Enter your full name" required>

      <label for="email">Your Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email address" required>

      <label for="message">Message</label>
      <textarea id="message" name="message" placeholder="Write your message here..." required></textarea>

      <button type="submit">Send Message</button>
    </form>

    <div class="info">
      <h2>Contact Information</h2>
      <p><strong>Rahul Kumar</strong> — CEO & Developer<br>
      <a href="https://rahul.wp-fixhub.com" target="_blank">rahul.wp-fixhub.com</a></p>
      <p><strong>Email:</strong> <a href="mailto:help@thecalculators.online">help@thecalculators.online</a><br>
      <strong>Help:</strong> <a href="tel:+919113451527">9113451527</a><br>
      <strong>Office:</strong> Khedarpur, Samastipur, Bihar — 848114</p>
    </div>

    <footer>© 2025 The Calculators Online. Developed by Rahul Kumar.</footer>
  </div>

  <script>
    document.getElementById('contactForm').addEventListener('submit', function(e){
      e.preventDefault();
      alert('Thank you! Your message has been sent.');
      this.reset();
    });
  </script>
</body>
</html>