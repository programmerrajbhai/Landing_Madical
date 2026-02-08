<?php
// mail_config.php

// সরাসরি ফাইল এক্সেস বন্ধ করা হলো (Security)
if (basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
    header("HTTP/1.0 403 Forbidden");
    exit("Access Forbidden");
}

// ⚠️ IMPORTANT: নিচের xxxx এর জায়গায় আপনার 16 ডিজিটের App Password বসান
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USER', 'mdmostakinali686@gmail.com');
define('SMTP_PASS', 'ilplejbhkdcxktkk'); // <--- এখনি পাসওয়ার্ড রিপ্লেস করুন
define('SMTP_PORT', 465);
define('SMTP_SECURE', 'ssl');

define('FROM_NAME', 'Dr. Victor Enoh');
define('FROM_EMAIL', SMTP_USER);
?>