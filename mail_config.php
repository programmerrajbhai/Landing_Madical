<?php
// mail_config.php

// ⚠️ ক্লায়েন্টের বিজনেস ইমেইল (SMTP) ব্যবহার করা সবচেয়ে ভালো।
// যদি জিমেইল ব্যবহার করেন, তবে অবশ্যই "App Password" লাগবে।

define('SMTP_HOST', 'smtp.gmail.com');      // অথবা ক্লায়েন্টের হোস্টিং হোস্ট (যেমন: mail.domain.com)
define('SMTP_USER', 'texasairwayinstitute@gmail.com'); // যে ইমেইল থেকে মেইল যাবে
define('SMTP_PASS', 'xxxx xxxx xxxx xxxx'); // 16 Digit App Password (জিমেইল হলে)
define('SMTP_PORT', 465);                   // SSL এর জন্য 465, TLS এর জন্য 587
define('SMTP_SECURE', 'ssl');               // 'ssl' অথবা 'tls'

define('FROM_NAME', 'Dr. Victor Enoh');     // যা কাস্টমারের ইনবক্সে দেখাবে
define('FROM_EMAIL', SMTP_USER);
?>