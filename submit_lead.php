<?php
// submit_lead.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// PHPMailer ফাইলগুলো লোড করা (পাথ ঠিক রাখবেন)
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

require_once 'db_connect.php';

function clean($s) {
    return strip_tags(trim($s));
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

// ১. ইনপুট নেওয়া
$full_name = clean($_POST['full_name'] ?? '');
$email     = clean($_POST['email'] ?? '');
$address   = clean($_POST['address'] ?? '');
$supp      = clean($_POST['supplement_count'] ?? '');
$pc_prob   = clean($_POST['pc_problem'] ?? '');
$ip        = $_SERVER['REMOTE_ADDR'] ?? '';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';

// ২. ডাটাবেসে সেভ করা
try {
    // ডুপ্লিকেট চেক
    $stmt = $conn->prepare("SELECT id FROM leads WHERE email = :email LIMIT 1");
    $stmt->execute([':email' => $email]);
    if ($stmt->fetch()) {
        header("Location: thank_you.php");
        exit;
    }

    // ইনসার্ট
    $sql = "INSERT INTO leads (full_name, email, address, supplement_count, pc_problem, ip_address) 
            VALUES (:full_name, :email, :address, :supp, :pc_prob, :ip)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':full_name' => $full_name,
        ':email' => $email,
        ':address' => $address,
        ':supp' => $supp,
        ':pc_prob' => $pc_prob,
        ':ip' => $ip
    ]);

    // =========================================================
    // 🔥 1. FACEBOOK CAPI (SERVER-SIDE TRACKING) 🔥
    // =========================================================
    $pixel_id = '4155728038000919';
    $access_token = 'EAALrbheZBSQIBQjlKlZBQu2nSpt3XMmeeP2PhctXCfMWyMHhkh92FZB64CVSrHzZBctyZBj5KYs69W3b2sYnJzTu8XzZCz2KJZAANRRWkRW4oZC5ldQp5WNtbs0s1bPvbtZCSZCK1W0g7cBkm93Veghaj1aW9TsqGLtuqcdXCDuCMkxoinM18xtfNAvA4lPW3XLQZDZD';
    
    $pixel_event_data = [
        'data' => [
            [
                'event_name' => 'Lead',
                'event_time' => time(),
                'action_source' => 'website',
                'user_data' => [
                    'em' => [hash('sha256', strtolower($email))],
                    'client_ip_address' => $ip,
                    'client_user_agent' => $user_agent
                ],
                'custom_data' => ['content_name' => 'Seminar Registration', 'status' => 'completed']
            ]
        ]
    ];

    $ch = curl_init('https://graph.facebook.com/v16.0/' . $pixel_id . '/events?access_token=' . $access_token);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($pixel_event_data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_exec($ch);
    curl_close($ch);

    // =========================================================
    // 📧 2. SEND EMAIL VIA GMAIL SMTP (PHPMailer) 📧
    // =========================================================
    $mail = new PHPMailer(true);

    try {
        // সার্ভার সেটিংস
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        
        // ⚠️ আপনার জিমেইল এড্রেস এখানে দিন
        $mail->Username   = 'texasairwayinstitute@gmail.com'; 
        
        // ⚠️ ধাপ ১-এ তৈরি করা ১৬ অক্ষরের App Password এখানে দিন (স্পেস ছাড়া)
        $mail->Password   = 'xxxx xxxx xxxx xxxx'; 
        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // প্রেরক এবং প্রাপক
        $mail->setFrom('texasairwayinstitute@gmail.com', 'Dr. Victor Enoh');
        $mail->addAddress($email, $full_name);     // কাস্টমারের ইমেইল
        $mail->addReplyTo('texasairwayinstitute@gmail.com', 'Information');

        // ইমেইল কন্টেন্ট
        $mail->isHTML(true);
        $mail->Subject = 'Registration Confirmed: Longevity Medical Seminar';
        $mail->Body    = "
            <h3>Hi $full_name,</h3>
            <p>Thank you for registering for the <strong>Longevity Medical Seminar</strong>!</p>
            <p>We have successfully reserved your seat. Here are the event details:</p>
            <ul>
                <li><strong>Date:</strong> February 21 @ 12:00 PM CST</li>
                <li><strong>Format:</strong> Live Online Seminar</li>
            </ul>
            <p>We will send you the joining link before the event starts.</p>
            <br>
            <p>Best Regards,<br>
            Dr. Victor Enoh, MD<br>
            Texas Airway Institute</p>
        ";

        $mail->send();
    } catch (Exception $e) {
        // মেইল না গেলে কোড থামবে না, থ্যাংক ইউ পেজে চলে যাবে
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // ৫. সাকসেস
    header("Location: thank_you.php");
    exit;

} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
?>