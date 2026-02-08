<?php
// submit_lead.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// ১. অটোলোডার এবং কনফিগারেশন লোড করা
require 'vendor/autoload.php';
require_once 'db_connect.php';
require_once 'mail_config.php'; // পাসওয়ার্ড ফাইল

// ইনপুট ক্লিন ফাংশন
function clean($s) {
    return strip_tags(trim($s));
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

// ২. ইনপুট নেওয়া
$full_name = clean($_POST['full_name'] ?? '');
$email     = clean($_POST['email'] ?? '');
$address   = clean($_POST['address'] ?? '');
$supp      = clean($_POST['supplement_count'] ?? '');
$pc_prob   = clean($_POST['pc_problem'] ?? '');
$ip        = $_SERVER['REMOTE_ADDR'] ?? '';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';

try {
    // ৩. ডুপ্লিকেট চেক
    $stmt = $conn->prepare("SELECT id FROM leads WHERE email = :email LIMIT 1");
    $stmt->execute([':email' => $email]);
    if ($stmt->fetch()) {
        header("Location: thank_you.php");
        exit;
    }

    // ৪. ডাটাবেসে ইনসার্ট
    $sql = "INSERT INTO leads (full_name, email, address, supplement_count, pc_problem, ip_address) 
            VALUES (:full_name, :email, :address, :supp, :pc_prob, :ip)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':full_name' => $full_name, ':email' => $email, ':address' => $address,
        ':supp' => $supp, ':pc_prob' => $pc_prob, ':ip' => $ip
    ]);

    // =========================================================
    // 🔥 5. FACEBOOK CAPI (Keep Existing Logic) 🔥
    // =========================================================
    // (আপনার আগের ফেসবুক পিক্সেল কোড এখানে থাকবে, আমি সংক্ষেপে রাখলাম)
    $pixel_id = '4155728038000919';
    $access_token = 'EAALrbheZBSQIBQjlKlZBQu2nSpt3XMmeeP2PhctXCfMWyMHhkh92FZB64CVSrHzZBctyZBj5KYs69W3b2sYnJzTu8XzZCz2KJZAANRRWkRW4oZC5ldQp5WNtbs0s1bPvbtZCSZCK1W0g7cBkm93Veghaj1aW9TsqGLtuqcdXCDuCMkxoinM18xtfNAvA4lPW3XLQZDZD';
    
    $pixel_event_data = [
        'data' => [[
            'event_name' => 'Lead', 'event_time' => time(), 'action_source' => 'website',
            'user_data' => ['em' => [hash('sha256', strtolower($email))], 'client_ip_address' => $ip, 'client_user_agent' => $user_agent],
            'custom_data' => ['content_name' => 'Seminar Registration', 'status' => 'completed']
        ]]
    ];
    $ch = curl_init('https://graph.facebook.com/v16.0/' . $pixel_id . '/events?access_token=' . $access_token);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($pixel_event_data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_exec($ch);
    curl_close($ch);

    // =========================================================
    // 📧 6. PROFESSIONAL EMAIL SENDING (PHPMailer) 📧
    // =========================================================
    $mail = new PHPMailer(true);

    try {
        // Server Settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // টেস্টিং এর সময় অন রাখতে পারেন
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->SMTPSecure = (SMTP_SECURE === 'ssl') ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = SMTP_PORT;

        // Headers (Spam Prevention)
        $mail->setFrom(FROM_EMAIL, FROM_NAME);
        $mail->addAddress($email, $full_name);
        $mail->addReplyTo(FROM_EMAIL, 'Support Team');
        $mail->XMailer = 'Microsoft Office Outlook 16.0'; // হ্যাকাররা পিএইচপি মেইলার লুকানোর জন্য এটা করে (Optional Trick)

        // Content
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8'; // বাংলা বা বিশেষ ক্যারেক্টার সাপোর্ট
        $mail->Subject = "Registration Confirmed: Longevity Medical Seminar";
        
        // Professional Email Template
    // পরিবর্তন করুন:
// $mailBody = file_get_contents('email_template.html');

// এভাবে লিখুন (Safe & Pro):
        $mailBody = file_get_contents(__DIR__ . '/email_template.html');


        // টেমপ্লেটের ভেরিয়েবল রিপ্লেস করা
        $mailBody = str_replace('{{name}}', $full_name, $mailBody);
        $mailBody = str_replace('{{year}}', date('Y'), $mailBody);
        
        $mail->Body = $mailBody;
        

        
        // Plain text version for non-HTML mail clients (Spam filter likes this)
        $mail->AltBody = "Hi $full_name, Thank you for registering. Check your email for details.";

        $mail->send();

    } catch (Exception $e) {
        // এরর ক্লায়েন্টকে না দেখিয়ে ফাইলে সেভ করা
        error_log("Mail Error: " . $mail->ErrorInfo, 3, "error_log.txt");
    }

    // ৭. রিডাইরেক্ট
    header("Location: thank_you.php");
    exit;

} catch (PDOException $e) {
    error_log("DB Error: " . $e->getMessage(), 3, "error_log.txt");
    die("Something went wrong. Please try again.");
}
?>

