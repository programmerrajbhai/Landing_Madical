<?php
// ১. ডাটাবেস কানেকশন চেক করা (যদি না থাকে তবে কানেক্ট করা)
if (!isset($conn)) {
    require_once __DIR__ . '/../db_connect.php'; // পাথ ঠিক করা হলো
}

try {
    // ২. মোট সিট সংখ্যা নির্ধারণ করুন (আপনি চাইলে বাড়াতে/কমাতে পারেন)
    $total_seats = 500; 

    // ৩. ডাটাবেস থেকে বর্তমান লিড সংখ্যা গোনা
    $stmt = $conn->query("SELECT COUNT(*) FROM leads");
    $registered_count = $stmt->fetchColumn();

    // ৪. মার্কেটিং ট্রিক: শুরুতে যাতে একদম 100% খালি না দেখায়, তাই কিছু কাল্পনিক বুকিং যোগ করা (অপশনাল)
    // আসল ইউজার যদি ০ হয়, তবুও দেখাবে ৪৫ জন বুক করেছে। 
    $fake_initial_booking = 40; 
    $current_filled = $registered_count + $fake_initial_booking;

    // ৫. লজিক: কত শতাংশ বাকি আছে বের করা
    $remaining_seats = $total_seats - $current_filled;
    
    // নেগেটিভ ভ্যালু আটকানো (যদি সিট শেষ হয়ে যায়)
    if ($remaining_seats < 0) $remaining_seats = 0;

    $percentage_left = floor(($remaining_seats / $total_seats) * 100);

} catch (Exception $e) {
    // ডাটাবেস এরর হলে ডিফল্ট ভ্যালু
    $percentage_left = 84; 
}

// ৬. টেক্সট সেট করা
$left_badge_text = $percentage_left . "% Free Registration Remaining";
$cta_text        = "Register Now";
?>

<style>
/* Navbar Variables */
:root{
  --nav-bg: rgba(2, 6, 23, 0.95);
  --nav-border: rgba(255,255,255,0.1);
  --green: #22C55E;
  --red1: #FF1B1B;
  --red2: #FF3B3B;
  --text: #F8FAFC;
}

/* Navbar Styles */
.navbar{
  position: sticky;
  top: 0;
  z-index: 9999;
  padding: 12px 0;
  background: var(--nav-bg);
  border-bottom: 1px solid var(--nav-border);
  backdrop-filter: blur(14px);
  width: 100%;
}

.nav-flex{
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 14px;
}

/* LEFT BADGE */
.nav-pill{
  display: inline-flex;
  align-items: center;
  gap: 12px;
  padding: 10px 20px;
  border-radius: 999px;
  background: rgba(2,6,23,0.6);
  border: 1px solid rgba(56,189,248,0.5);
  box-shadow: 0 0 15px rgba(56,189,248,0.1);
  font-weight: 700;
  font-size: 1rem;
  color: var(--text);
  white-space: nowrap;
}

/* সবুজ বাতি (Blinking Dot) */
.nav-pill .dot{
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: var(--green);
  box-shadow: 0 0 0 4px rgba(34,197,94,0.18);
  animation: pulseGreen 2s infinite;
}

@keyframes pulseGreen {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(34, 197, 94, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
}

/* RIGHT CTA BUTTON */
.nav-cta{
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 12px 28px;
  border-radius: 999px;
  text-decoration: none;
  background: linear-gradient(135deg, var(--red1), var(--red2));
  color: #fff;
  font-weight: 800;
  font-size: 1rem;
  border: 4px solid rgba(255, 255, 255, 0.1);
  box-shadow: 0 10px 30px rgba(255, 59, 59, 0.3);
  transition: transform .2s ease, box-shadow .2s ease;
  white-space: nowrap;
  letter-spacing: 0.5px;
}

.nav-cta:hover{
  transform: translateY(-2px);
  box-shadow: 0 15px 40px rgba(255, 59, 59, 0.5);
}

/* MOBILE RESPONSIVE */
@media (max-width: 600px){
  .nav-flex{
    flex-direction: column;
    gap: 10px;
  }
  .nav-pill{ font-size: 0.85rem; padding: 8px 16px; width: 100%; justify-content: center; }
  .nav-cta{ font-size: 0.95rem; padding: 10px 20px; width: 100%; }
}
</style>

<nav class="navbar" id="navbar">
  <div class="container">
    <div class="nav-flex">

      <div class="nav-pill">
        <span class="dot"></span>
        <?php echo $left_badge_text; ?>
      </div>

      <a href="#register" class="nav-cta">
        <?php echo $cta_text; ?>
      </a>

    </div>
  </div>
</nav>