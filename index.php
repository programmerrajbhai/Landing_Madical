<?php
// ১. কনফিগারেশন লোড
require_once 'config.php';

// ২. হেডার লোড
require_once 'header.php';

// ৩. সেকশনগুলো লোড
require_once 'sections/navbar.php';   // লোগো ছাড়া শুধু টেক্সট
require_once 'sections/hero.php';     // ক্লিন হিরো সেকশন
require_once 'sections/event_time.php';     // ক্লিন হিরো সেকশন

require_once 'sections/intro.php';
require_once 'sections/learn.php';
require_once 'sections/speaker.php';
require_once 'sections/audience.php';
require_once 'sections/register.php'; // হলুদ ড্রপডাউন ফিক্স সহ

// ৪. ফুটার লোড
require_once 'footer.php';
?>