<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Longevity Medical Seminar | <?php echo strip_tags($speaker_name); ?></title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '4155728038000919');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=4155728038000919&ev=PageView&noscript=1"
    /></noscript>
    <style>
        :root {
            --bg-dark: <?php echo $bg_dark; ?>;
            --primary: <?php echo $theme_primary; ?>;
            --gold: <?php echo $theme_gold; ?>;
            --text-main: <?php echo $text_main; ?>;
            --text-muted: <?php echo $text_muted; ?>;
            
            --bg-card: rgba(30, 41, 59, 0.7); 
            --bg-surface: #0f172a;
            --primary-glow: <?php echo $theme_primary; ?>80;
            --gold-glow: <?php echo $theme_gold; ?>66;

            --font-head: <?php echo $font_title; ?>;
            --font-body: <?php echo $font_body; ?>;
            
            --glass: blur(20px) saturate(180%);
            --border: 1px solid rgba(255, 255, 255, 0.1);
            --radius: 24px;
            --container: 1240px;
            --section-gap: clamp(80px, 10vw, 120px);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { font-size: 16px; scroll-behavior: smooth; }
        
        body {
            font-family: var(--font-body);
            background-color: var(--bg-dark);
            color: var(--text-muted);
            line-height: 1.7;
            overflow-x: hidden;
            background-image: 
                radial-gradient(circle at 15% 50%, var(--primary-glow) 0%, transparent 25%),
                radial-gradient(circle at 85% 30%, var(--gold-glow) 0%, transparent 25%);
            background-size: 120% 120%;
        }

        h1, h2, h3, h4 {
            font-family: var(--font-head);
            color: var(--text-main);
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 1.1;
        }

        h1 { font-size: clamp(2.5rem, 5vw, 4.5rem); margin-bottom: 24px; }
        h2 { font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 20px; }
        h3 { font-size: 1.5rem; margin-bottom: 15px; }
        p { margin-bottom: 24px; font-size: clamp(1rem, 1.2vw, 1.125rem); }

        .text-gradient {
            background: linear-gradient(135deg, #60A5FA 0%, var(--primary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-style: normal;
        }
        
        .text-gold { color: var(--gold); }

        .container { width: 100%; max-width: var(--container); margin: 0 auto; padding: 0 24px; position: relative; }
        .section-py { padding: var(--section-gap) 0; }
        
        .btn {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 18px 40px; border-radius: 100px;
            font-weight: 600; text-decoration: none; transition: 0.4s;
            font-family: var(--font-head); border: none; cursor: pointer;
            position: relative; overflow: hidden; z-index: 1; font-size: 1rem;
        }
        
        .btn-primary {
            background: var(--primary); color: white;
            box-shadow: 0 0 20px var(--primary-glow);
        }
        .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 0 40px var(--primary-glow); }

        .btn-glass {
            background: rgba(255,255,255,0.05); color: white;
            border: var(--border); backdrop-filter: blur(10px);
        }
        .btn-glass:hover { background: rgba(255,255,255,0.1); border-color: white; }

        .hero {
            /* ✅ FIXED: Padding reduced from 160px to 80px to fix GAP issue */
            padding-top: 80px; 
            padding-bottom: 80px;
            min-height: 90vh; display: flex; align-items: center; position: relative;
        }
        .hero-grid { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 60px; align-items: center; }

        .badge-pill {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 10px 24px; background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.3); border-radius: 50px;
            color: #60A5FA; font-weight: 600; font-size: 0.9rem;
            text-transform: uppercase; letter-spacing: 1px; margin-bottom: 30px;
        }

        .hero-visual { position: relative; perspective: 1000px; }
        .hero-img {
            width: 100%; border-radius: var(--radius);
            box-shadow: 0 50px 100px -20px rgba(0,0,0,0.6);
            border: var(--border); position: relative; z-index: 2;
            transition: transform 0.3s ease-out;
        }
        
        .float-card {
            position: absolute; background: rgba(15, 23, 42, 0.85); 
            backdrop-filter: blur(20px);
            padding: 18px 24px; border-radius: 16px; border: var(--border);
            display: flex; gap: 16px; align-items: center; z-index: 3;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
            animation: float 6s ease-in-out infinite;
        }
        .float-card h4 { font-size: 1.1rem; margin: 0; color: white; font-weight: 700; }
        .float-card span { font-size: 0.85rem; color: var(--text-muted); }
        .icon-box {
            width: 45px; height: 45px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center; font-size: 1.2rem;
        }
        
        .fc-1 { top: 10%; left: -40px; }
        .fc-2 { bottom: 10%; right: -30px; animation-delay: 2s; }
        @keyframes float { 0%,100%{transform:translateY(0);} 50%{transform:translateY(-15px);} }

        .intro-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 40px; }
        .intro-card { 
            background: var(--bg-card); padding: 35px; border-radius: var(--radius); 
            border: var(--border); transition: 0.4s; position: relative; overflow: hidden;
        }
        .intro-card:hover { transform: translateY(-10px); border-color: var(--primary); }
        .intro-card h3 { font-size: 1.3rem; margin-bottom: 15px; display: flex; align-items: center; gap: 10px; font-weight: 700; }
        .intro-card i { color: var(--gold); }

        .why-section { background: rgba(30, 41, 59, 0.3); border-top: var(--border); border-bottom: var(--border); }
        .why-box { max-width: 800px; margin: 0 auto; text-align: center; }

        .learn-grid { 
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px; 
            margin-top: 40px; 
        }
        
        .learn-card { 
            background: var(--bg-card); 
            padding: 30px; 
            border-radius: var(--radius); 
            border-left: 4px solid var(--primary); 
            transition: 0.3s;
            flex: 1 1 300px;
            max-width: 400px;
            width: 100%;
        }
        
        .learn-card:hover { 
            transform: translateY(-5px); 
            border-color: var(--gold); 
            background: rgba(255,255,255,0.05); 
        }
        .learn-card h4 { color: var(--text-main); font-size: 1.2rem; margin-bottom: 10px; font-weight: 700; }
        .learn-card p { margin: 0; font-size: 0.95rem; color: var(--text-muted); }

        .speaker-grid { display: grid; grid-template-columns: 400px 1fr; gap: 80px; align-items: center; }
        .speaker-frame { position: relative; padding: 20px; border: var(--border); border-radius: 40px; }
        .speaker-img { width: 100%; border-radius: 30px; display: block; }
        
        .check-item {
            display: flex; gap: 15px; margin-bottom: 16px; align-items: start;
            border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 16px;
        }
        .check-item:last-child { border-bottom: none; }
        .check-item i { color: var(--gold); margin-top: 5px; font-size: 1.1rem; flex-shrink: 0; }

        .audience-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-top: 40px; }
        .aud-box { padding: 45px; border-radius: var(--radius); background: var(--bg-surface); border: var(--border); }
        .aud-box.for { border-top: 4px solid #10B981; }
        .aud-box.not { border-top: 4px solid #EF4444; }
        .aud-list li { margin-bottom: 15px; display: flex; gap: 12px; align-items: center; font-size: 1.05rem; }

        .reg-box {
            background: #0F172A; border-radius: 40px; overflow: hidden;
            display: grid; grid-template-columns: 1fr 1.2fr; border: var(--border);
            box-shadow: 0 0 100px rgba(0,0,0,0.5);
        }
        .reg-left {
            padding: 60px; position: relative;
            background: linear-gradient(135deg, var(--primary), #1E3A8A);
        }
        .reg-left::after {
            content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: url('https://www.transparenttextures.com/patterns/cubes.png'); opacity: 0.1;
        }
        .reg-right { padding: 60px; background: #0B1120; }

        .form-group { margin-bottom: 25px; }
        .form-label {
            display: block; font-size: 0.9rem; font-weight: 600; text-transform: uppercase;
            letter-spacing: 1px; color: var(--primary); margin-bottom: 10px; font-family: var(--font-body);
        }
        .form-control {
            width: 100%; padding: 18px 24px; 
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 12px;
            color: white; font-size: 1.05rem; font-family: var(--font-body); 
            transition: all 0.3s ease;
        }
        .form-control:focus { 
            outline: none; border-color: var(--primary); 
            background: rgba(255,255,255,0.1); 
            box-shadow: 0 0 0 4px var(--primary-glow);
        }
        select.form-control {
            appearance: none; cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%233B82F6' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat; background-position: right 20px center;
        }

        /* ✅ YELLOW BACKGROUND FIX for Options */
        select.form-control option {
            background-color: #FFD700; /* Yellow Color */
            color: #000000;            /* Black Text */
            font-weight: 600;
            padding: 12px;
        }

        @media (max-width: 992px) {
            .hero-grid, .speaker-grid, .intro-grid, .reg-box, .audience-grid { grid-template-columns: 1fr; }
            .hero { text-align: center; padding-top: 60px; } /* ✅ FIXED Mobile Gap */
            .hero-grid { gap: 50px; }
            .hero-img-wrapper { order: -1; max-width: 500px; margin: 0 auto 30px; }
            .speaker-img { height: 400px; max-width: 100%; margin-bottom: 30px; }
            .fc-1, .fc-2 { display: none; }
            .reg-left, .reg-right { padding: 40px 24px; }
            .check-item { text-align: left; }
            .logo-img { height: 50px; }
            .btn { width: 100%; margin-bottom: 10px; }
        }
    </style>
</head>
<body>