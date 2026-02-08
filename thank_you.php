<?php
// thankyou.php
$whatsapp_link = "https://chat.whatsapp.com/EYaL1JZQFDpIum2DU2kbZT?mode=gi_t"; // ✅ এখানে আপনার WhatsApp Community invite link দিন
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>You’re Registered | MEDLEAD</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700;800&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
<script>
  fbq('track', 'CompleteRegistration');
</script>

  <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '4155728038000919'); // Client Pixel ID
  fbq('track', 'PageView');
  
  // ✅ Lead Event (Successful Registration)
  fbq('track', 'Lead'); 
  </script>
  <noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=4155728038000919&ev=PageView&noscript=1"
  /></noscript>
  <style>
    :root{
      --bg: #020617;
      --card: rgba(30,41,59,0.7);
      --primary: #32C4F3;
      --primaryGlow: rgba(50, 196, 243, 0.45);
      --gold: #F59E0B;
      --border: 1px solid rgba(255,255,255,0.1);
      --text: #F8FAFC;
      --muted: #94A3B8;
      --radius: 30px;

      --wa: #22C55E;
      --waDark: #16A34A;
      --waGlow: rgba(34,197,94,0.35);
    }

    *{margin:0;padding:0;box-sizing:border-box;}

    body{
      background: var(--bg);
      color: var(--muted);
      font-family:'Poppins',sans-serif;
      min-height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:20px;
      overflow:hidden;
      position:relative;
    }

    /* background blobs */
    body::before, body::after{
      content:'';
      position:absolute;
      width:500px;height:500px;border-radius:50%;
      filter:blur(100px);
      z-index:-1;
      animation:floatBg 10s infinite alternate;
    }
    body::before{background:rgba(50,196,243,0.10);top:-10%;left:-10%;}
    body::after{background:rgba(245,158,11,0.08);bottom:-10%;right:-10%;animation-delay:5s;}

    @keyframes floatBg{
      0%{transform:translate(0,0) scale(1);}
      100%{transform:translate(30px,50px) scale(1.1);}
    }

    .wrap{max-width:650px;width:100%;position:relative;z-index:10;}

    .card{
      background:var(--card);
      border:var(--border);
      border-radius:var(--radius);
      padding:50px 40px 42px;
      box-shadow:0 40px 100px rgba(0,0,0,0.60);
      backdrop-filter:blur(20px);
      text-align:center;
      position:relative;
      overflow:hidden;
    }

    /* ✅ top gradient bar (fix: pseudo element) */
    .card::before{
      content:'';
      position:absolute;
      top:0;left:0;
      width:100%;
      height:6px;
      background:linear-gradient(90deg, var(--primary), #1E3A8A);
      opacity:.95;
    }

    .icon-wrapper{
      width:100px;height:100px;margin:0 auto 30px;
      background:rgba(16,185,129,0.10);
      border-radius:50%;
      display:flex;align-items:center;justify-content:center;
      border:1px solid rgba(16,185,129,0.30);
      animation:pulseGreen 2s infinite;
    }
    .success-icon{font-size:3.5rem;color:#10B981;}

    @keyframes pulseGreen{
      0%{box-shadow:0 0 0 0 rgba(16,185,129,0.40);}
      70%{box-shadow:0 0 0 20px rgba(16,185,129,0);}
      100%{box-shadow:0 0 0 0 rgba(16,185,129,0);}
    }

    h1{
      font-family:'Inter',sans-serif;
      color:var(--text);
      font-size:clamp(2rem, 4vw, 2.8rem);
      margin-bottom:15px;
      letter-spacing:-1px;
    }

    p.msg{
      font-size:1.1rem;
      line-height:1.6;
      color:var(--muted);
      margin-bottom:30px;
    }

    .note-box{
      background:rgba(245,158,11,0.10);
      border:1px solid rgba(245,158,11,0.20);
      padding:15px 20px;
      border-radius:12px;
      display:inline-flex;
      align-items:center;
      gap:10px;
      color:#FCD34D;
      font-size:0.9rem;
      font-weight:500;
      margin-bottom:35px;
    }
    .note-box i{font-size:1.1rem;}

    /* ✅ buttons row */
    .btn-row{
      display:flex;
      gap:14px;
      justify-content:center;
      flex-wrap:wrap;
      margin-top:6px;
    }

    .btn{
      display:inline-flex;
      align-items:center;
      justify-content:center;
      gap:12px;
      padding:18px 30px;
      border-radius:100px;
      text-decoration:none;
      font-weight:700;
      font-family:'Inter',sans-serif;
      border:none;
      font-size:1.05rem;
      transition:all .4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      cursor:pointer;
      min-width: 230px;
    }

    .btn-home{
      background:var(--primary);
      color:white;
      box-shadow:0 10px 30px rgba(50, 196, 243, 0.30);
    }
    .btn-home:hover{
      transform:translateY(-5px) scale(1.04);
      box-shadow:0 20px 40px rgba(50, 196, 243, 0.50);
    }

    /* ✅ WhatsApp button */
    .btn-wa{
      background: linear-gradient(135deg, var(--wa), var(--waDark));
      color:white;
      box-shadow:0 10px 30px var(--waGlow);
      position:relative;
      overflow:hidden;
    }
    .btn-wa::before{
      content:'';
      position:absolute;
      inset:-2px;
      background: radial-gradient(300px 80px at 20% 20%, rgba(255,255,255,.18), transparent 60%);
      opacity:.9;
      pointer-events:none;
    }
    .btn-wa:hover{
      transform:translateY(-5px) scale(1.04);
      box-shadow:0 20px 45px rgba(34,197,94,0.45);
    }

    .btn small{
      display:block;
      font-weight:600;
      font-family:'Poppins',sans-serif;
      font-size:.82rem;
      opacity:.85;
      margin-top:2px;
    }

    @media (max-width:520px){
      .card{padding:44px 22px 34px;}
      .btn{width:100%; min-width:unset;}
    }
  </style>
</head>

<body>
  <div class="wrap">
    <div class="card" data-aos="zoom-in" data-aos-duration="800">

      <div class="icon-wrapper">
        <i class="fa-solid fa-check success-icon" data-aos="zoom-in" data-aos-delay="400"></i>
      </div>

      <h1 data-aos="fade-up" data-aos-delay="200">Registration Complete!</h1>

      <p class="msg" data-aos="fade-up" data-aos-delay="300">
        You have successfully secured your seat. <br>
        Check your email for the official confirmation ticket.
      </p>

      <div class="note-box" data-aos="fade-up" data-aos-delay="400">
        <i class="fa-solid fa-bell"></i>
        <span>We will send a reminder before the event starts.</span>
      </div>

      <div class="btn-row" data-aos="fade-up" data-aos-delay="500">
        <a class="btn btn-home" href="index.php">
          <i class="fa-solid fa-arrow-left"></i>
          Back to Homepage
        </a>

        <a class="btn btn-wa" href="<?php echo htmlspecialchars($whatsapp_link, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener">
          <i class="fa-brands fa-whatsapp"></i>
          Join WhatsApp Community
        </a>
      </div>

    </div>
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ once: true });
  </script>
</body>
</html>