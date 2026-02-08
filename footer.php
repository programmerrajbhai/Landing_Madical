<footer style="text-align: center; padding: 60px 0; border-top: var(--border); font-size: 0.9rem; margin-top: 50px;">
        <div class="container">
            <p style="max-width: 800px; margin: 0 auto 15px; opacity: 0.7;">
                ⚖️ This seminar is for educational purposes only and does not constitute medical advice. Always consult a qualified healthcare professional regarding personal health decisions.
            </p>
            <p>&copy; <?php echo date("Y"); ?> Texas Airway Institute. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 1000, offset: 50 });

        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        document.addEventListener('mousemove', function(e) {
            const heroImg = document.querySelector('.hero-img');
            const x = (window.innerWidth - e.pageX * 2) / 100;
            const y = (window.innerHeight - e.pageY * 2) / 100;
            if(heroImg) heroImg.style.transform = `translateX(${x}px) translateY(${y}px)`;
        });
    </script>
</body>
</html>