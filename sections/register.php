<style>
/* ================================
   FORM SELECT OPTION COLOR FIX
================================ */
select.form-control option {
    background-color: #FFD700;  /* Yellow */
    color: #000000;
    padding: 12px;
    font-weight: 600;
}

/* ================================
   🔧 EVENT DETAILS TEXT COLOR FIX
================================ */
.reg-left span {
    color: rgba(255, 255, 255, 0.85); /* DATE / FORMAT / COST label */
    opacity: 1;
    letter-spacing: 1.2px;
}

.reg-left h3 {
    color: #FFFFFF; /* Main value text */
}

/* COST sub-text */
.reg-left h3 span {
    color: rgba(255, 255, 255, 0.85);
}
</style>

<section class="section-py" id="register">
    <div class="container">
        <div class="reg-box">

            <!-- ================= LEFT PANEL ================= -->
            <div class="reg-left">
                <h2 style="font-size: 2.5rem; margin-bottom: 30px;">📅 Event Details</h2>

                <div style="margin-bottom: 25px;">
                    <span style="display:block; font-weight:700; margin-bottom:5px;">
                        DATE
                    </span>
                    <h3 style="font-size:1.5rem;">
                        <?php echo $event_date; ?>
                    </h3>
                </div>

                <div style="margin-bottom: 25px;">
                    <span style="display:block; font-weight:700; margin-bottom:5px;">
                        FORMAT
                    </span>
                    <h3 style="font-size:1.5rem;">
                        <?php echo $event_format; ?>
                    </h3>
                </div>

                <div style="margin-bottom: 25px;">
                    <span style="display:block; font-weight:700; margin-bottom:5px;">
                        COST
                    </span>
                    <h3 style="font-size:1.5rem; color:#EF4444;">
                        <?php echo $event_cost; ?>
                        <span style="font-size:1rem; font-weight:400;">
                            (Educational Only)
                        </span>
                    </h3>
                </div>

                
                <p style="font-size: 0.9rem; color: rgba(255,255,255,0.8); margin-top: auto;">
                    <i class="fas fa-users"></i>
                    Audience: Healthcare-aware adults, professionals, and serious learners.
                </p>
            </div>

            <!-- ================= RIGHT PANEL ================= -->
            <div class="reg-right">
                <h2 style="margin-bottom: 10px;">📝 Save My Spot</h2>
                <p style="margin-bottom: 30px; opacity: 0.8;">
                    Limited seats available. Secure your registration below.
                </p>

                <form action="submit_lead.php" method="POST">

                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="full_name" class="form-control"
                               placeholder="Dr. John Doe" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control"
                               placeholder="john@example.com" required>
                    </div>

                  

                    <div class="form-group">
                        <label class="form-label">
                            Daily Supplements?
                            <span style="font-size:0.8em; opacity:0.7; text-transform:none;">
                                (Optional)
                            </span>
                        </label>
                        <select name="supplement_count" class="form-control">
                            <option value="" disabled selected>Select an option</option>
                            <option value="0-2">0 – 2</option>
                            <option value="3-5">3 – 5</option>
                            <option value="6+">6+</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width:100%;">
                        Secure My Seat
                    </button>

                    <p style="text-align:center; margin-top:20px; font-size:0.8rem; opacity:0.6;">
                        <i class="fas fa-lock"></i>
                        We respect your privacy. One confirmation email only.
                    </p>

                </form>
            </div>

        </div>
    </div>
</section>
