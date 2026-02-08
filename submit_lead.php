<?php
// submit_lead.php

// ডাটাবেস কানেকশন
require_once 'db_connect.php';

// ইনপুট ক্লিন করার ফাংশন
function clean($s) {
    return strip_tags(trim($s));
}

// সরাসরি ফাইল এক্সেস বন্ধ করা
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

try {
    // ২. ডুপ্লিকেট চেক (আগে রেজিস্টার করে থাকলে)
    $stmt = $conn->prepare("SELECT id FROM leads WHERE email = :email LIMIT 1");
    $stmt->execute([':email' => $email]);
    if ($stmt->fetch()) {
        // অলরেডি থাকলে থ্যাংক ইউ পেজে পাঠিয়ে দিবে
        header("Location: thank_you.php");
        exit;
    }

    // ৩. ডাটাবেসে নতুন লিড সেভ করা
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
    // 🔥 FACEBOOK CAPI (SERVER-SIDE TRACKING) 🔥
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

    // Facebook API তে ডাটা পাঠানো
    $ch = curl_init('https://graph.facebook.com/v16.0/' . $pixel_id . '/events?access_token=' . $access_token);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($pixel_event_data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_exec($ch); // ডাটা সেন্ড হলো
    curl_close($ch);

    // ৪. সব কাজ শেষে থ্যাংক ইউ পেজে রিডাইরেক্ট
    header("Location: thank_you.php");
    exit;

} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
?>