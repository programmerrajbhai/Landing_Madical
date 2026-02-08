<header class="hero">
    <div class="container">
        <div class="hero-grid">
            
            <div data-aos="fade-right" data-aos-duration="1000">
                <div class="badge-pill">
                    <i class="fas fa-check-circle"></i> <?php echo $hero_badge; ?>
                </div>
                
                <h1><?php echo $hero_title; ?></h1>
                <p><?php echo $hero_desc; ?></p>
                
                <div style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center; @media(min-width:992px){justify-content: flex-start;}">
                    <a href="#register" class="btn btn-primary">MY FREE SEAT</a>
                    <a href="#about" class="btn btn-glass">Learn More</a>
                </div>
            </div>

            <div class="hero-visual" id="heroVisual" data-aos="zoom-in" data-aos-duration="1200">
                <div class="hero-img-wrapper">
                    <img src="<?php echo $hero_img; ?>" alt="Doctor" class="hero-img">
                    
                    <div class="float-card fc-1">
                        <div class="icon-box" style="background: rgba(59,130,246,0.2); color: #60A5FA;">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <div>
                            <h4>20+ Years</h4>
                            <span>Experience</span>
                        </div>
                    </div>
                    <div class="float-card fc-2">
                        <div class="icon-box" style="background: rgba(245,158,11,0.2); color: #FCD34D;">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div>
                            <h4>Board Certified</h4>
                            <span>Anesthesiologist</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>