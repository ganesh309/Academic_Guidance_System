<!DOCTYPE html>
<html lang="en">

<style>
    :root {
        --primary-accent: #1E3A8A;
        --secondary-accent: #B91C1C;
        --text-primary: #1F2937;
        --background-light: #F5F5F4;
        --gold-accent: #D4AF37;
        --shadow-soft: 0 4px 15px rgba(0, 0, 0, 0.1);
        --glass-bg: rgba(255, 255, 255, 0.9);
    }

    body {
        background: url('/images/pic3.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        overflow-x: hidden;
        color: var(--text-primary);
        position: relative;
        margin: 0;
        padding-top: 80px;
        /* Adjust for fixed navbar */
    }

    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.88);
        z-index: -1;
    }

    .nature-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('https://www.transparenttextures.com/patterns/leaf.png') repeat;
        background-size: 200px 200px;
        animation: natureShift 30s linear infinite;
        opacity: 0.3;
        z-index: -2;
    }

    @keyframes natureShift {
        0% {
            background-position: 0 0;
        }

        100% {
            background-position: 200px 200px;
        }
    }

    .leaves-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        pointer-events: none;
    }

    .leaf {
        position: absolute;
        width: 30px;
        height: 30px;
        background: url('https://www.pngall.com/wp-content/uploads/2016/05/Leaf-PNG-File.png') no-repeat center;
        background-size: contain;
        opacity: 0.7;
        animation: fall linear infinite;
    }

    @keyframes fall {
        0% {
            opacity: 0;
            transform: translateY(-100vh) rotate(0deg);
        }

        20% {
            opacity: 0.8;
        }

        100% {
            opacity: 0.2;
            transform: translateY(100vh) rotate(360deg);
        }
    }

    /* Navbar Styles (Restored Single-Row Layout) */
    .navbar {
        position: fixed;
        top: 0;
        width: 90%;
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        padding: 15px 5%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        z-index: 1000;
        box-shadow: var(--shadow-soft);
    }

    .navbar-brand {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary-accent);
        text-decoration: none;
    }

    .navbar-nav {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        flex-wrap: nowrap;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .navbar-nav .nav-link {
        color: var(--text-primary);
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        margin-left: 40px;
        transition: all 0.3s ease;
        position: relative;
        white-space: nowrap;
    }

    .navbar-nav .nav-link:hover {
        color: var(--secondary-accent);
    }

    .navbar-nav .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -5px;
        left: 0;
        background: var(--secondary-accent);
        transition: width 0.3s ease;
    }

    .navbar-nav .nav-link:hover::after {
        width: 100%;
    }

    .main-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        min-height: 100vh;
        padding: 0 5%;
        position: relative;
        animation: bgPulse 10s infinite alternate;
    }

    .hero-section {
        flex: 1;
        max-width: 650px;
        padding: 30px;
        background: var(--glass-bg);
        border-radius: 20px;
        backdrop-filter: blur(12px);
        animation: slideInLeft 1.2s cubic-bezier(0.4, 0, 0.2, 1) forwards,
            floatSection 6s ease-in-out infinite;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .image-container {
        flex: 1;
        display: flex;
        justify-content: flex-end;
        perspective: 1200px;
    }

    .hero-image {
        max-width: 85%;
        transform: rotateY(20deg) rotateX(15deg);
        animation: floatImage 4s ease-in-out infinite,
            imageEntrance 1.5s ease-out forwards;
        transition: transform 0.3s ease;
    }

    .hero-image:hover {
        transform: rotateY(25deg) rotateX(20deg) scale(1.05);
    }

    .hero-section h1 {
        font-family: 'Playfair Display', serif;
        font-size: 4rem;
        font-weight: 900;
        background: linear-gradient(45deg, var(--primary-accent), var(--secondary-accent));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 1.5rem;
        text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.15);
        position: relative;
    }

    .hero-section h1::after {
        content: '';
        position: absolute;
        width: 4px;
        height: 60%;
        background: var(--secondary-accent);
        right: -10px;
        top: 20%;
        animation: blink 0.7s infinite;
    }

    .hero-section h4 {
        font-size: 1.8rem;
        color: var(--text-primary);
        opacity: 0;
        animation: fadeInUp 0.8s 1.2s ease-out forwards;
    }

    .hero-section h5 {
        font-size: 1.3rem;
        color: #6B7280;
        opacity: 0;
        animation: fadeInUp 0.8s 1.6s ease-out forwards;
    }

    .buttons-container {
        display: flex;
        gap: 20px;
        margin-top: 30px;
        justify-content: center;
        opacity: 0;
        animation: fadeInButtons 1s 2.2s ease-out forwards;
    }

    .btn {
        padding: 14px 30px;
        font-size: 1.2rem;
        font-weight: 600;
        border-radius: 50px;
        transition: all 0.4s ease;
        border: none;
        color: white;
        box-shadow: var(--shadow-soft);
        position: relative;
        overflow: hidden;
    }

    .btn i {
        margin-right: 8px;
        transition: transform 0.3s ease;
    }

    .btn:hover i {
        transform: scale(1.2) rotate(10deg);
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.3);
        transition: all 0.4s ease;
        transform: skewX(-20deg);
    }

    .btn:hover::before {
        left: 100%;
    }

    .btn:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .btn:active {
        transform: translateY(2px) scale(0.98);
    }

    .btn-primary {
        background: linear-gradient(45deg, var(--primary-accent), var(--secondary-accent));
    }

    .section {
        min-height: 100vh;
        padding: 80px 5% 20px;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .section h2 {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        font-weight: 900;
        color: var(--text-primary);
        margin-bottom: 2rem;
        text-align: center;
        position: relative;
    }

    .section h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-accent), var(--secondary-accent));
        border-radius: 2px;
    }

    .section-content {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background: var(--glass-bg);
        border-radius: 15px;
        box-shadow: var(--shadow-soft);
        backdrop-filter: blur(10px);
        animation: fadeIn 1s ease-out;
    }

    .section-content p {
        font-size: 1.1rem;
        color: #6B7280;
        line-height: 1.8;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .service-card {
        padding: 20px;
        background: var(--glass-bg);
        border-radius: 10px;
        text-align: center;
        transition: transform 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .contact-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-top: 20px;
    }

    .contact-form input,
    .contact-form textarea {
        padding: 12px;
        border: 1px solid #E5E7EB;
        border-radius: 5px;
        font-family: 'Poppins', sans-serif;
        background: rgba(255, 255, 255, 0.8);
    }

    .contact-form button {
        padding: 12px;
        background: linear-gradient(45deg, var(--primary-accent), var(--secondary-accent));
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .contact-form button:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .footer {
        background: var(--primary-accent);
        color: white;
        text-align: center;
        padding: 20px 5%;
        font-size: 1rem;
        box-shadow: 0 -3px 10px rgba(0, 0, 0, 0.2);
    }

    .footer-content p {
        margin-bottom: 10px;
    }

    .footer-links {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .footer-links a {
        color: var(--gold-accent);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .footer-links a:hover {
        color: var(--secondary-accent);
    }

    /* Animations */
    @keyframes slideInLeft {
        from {
            transform: translateX(-100px) scale(0.9);
            opacity: 0;
        }

        to {
            transform: translateX(0) scale(1);
            opacity: 1;
        }
    }

    @keyframes imageEntrance {
        from {
            transform: rotateY(40deg) rotateX(25deg) translateX(150px);
            opacity: 0;
        }

        to {
            transform: rotateY(20deg) rotateX(15deg) translateX(0);
            opacity: 1;
        }
    }

    @keyframes floatImage {

        0%,
        100% {
            transform: translateY(0) rotateY(20deg) rotateX(15deg);
        }

        50% {
            transform: translateY(-25px) rotateY(20deg) rotateX(15deg) translateX(10px);
        }
    }

    @keyframes fadeInButtons {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes floatSection {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-15px);
        }
    }

    @keyframes blink {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes bgPulse {
        0% {
            background-color: rgba(255, 255, 255, 0.1);
        }

        100% {
            background-color: rgba(255, 255, 255, 0.2);
        }
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .hero-section h1 {
            font-size: 3rem;
        }

        .hero-section h4 {
            font-size: 1.5rem;
        }

        .hero-section h5 {
            font-size: 1.1rem;
        }

        .hero-image {
            max-width: 90%;
        }

        .navbar-nav .nav-link {
            margin-left: 30px;
        }
    }

    @media (max-width: 992px) {
        .main-container {
            flex-direction: column;
            padding: 20px 5%;
        }

        .hero-section {
            max-width: 100%;
            margin-bottom: 20px;
        }

        .image-container {
            justify-content: center;
        }

        .hero-image {
            max-width: 70%;
        }

        .buttons-container {
            flex-wrap: wrap;
            justify-content: center;
        }

        .navbar-nav .nav-link {
            margin-left: 20px;
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {
        body {
            padding-top: 100px;
            /* Adjust for mobile navbar */
        }

        .navbar {
            left: 0;
            width: 100%;
            /* Full width on mobile */
            padding: 10px 5%;
        }

        .navbar-brand {
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            margin-left: 15px;
            font-size: 0.9rem;
        }

        .hero-section h1 {
            font-size: 2.5rem;
        }

        .hero-section h4 {
            font-size: 1.3rem;
        }

        .hero-section h5 {
            font-size: 1rem;
        }

        .section h2 {
            font-size: 2.5rem;
        }

        .btn {
            padding: 12px 20px;
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .navbar-nav .nav-link {
            margin-left: 10px;
            font-size: 0.8rem;
        }

        .hero-section h1 {
            font-size: 2rem;
        }

        .hero-section h4 {
            font-size: 1.1rem;
        }

        .hero-section h5 {
            font-size: 0.9rem;
        }

        .section h2 {
            font-size: 2rem;
        }

        .hero-image {
            max-width: 80%;
        }

        .buttons-container {
            gap: 10px;
        }

        .btn {
            padding: 10px 15px;
            font-size: 0.9rem;
        }
    }

    /* Accessibility */
    .navbar-nav .nav-link:focus,
    .btn:focus,
    .contact-form input:focus,
    .contact-form textarea:focus,
    .contact-form button:focus {
        outline: 2px solid var(--secondary-accent);
        outline-offset: 2px;
    }
</style>


<body>
    <div class="nature-bg"></div>
    <div class="leaves-container" id="leaves-container"></div>

    <!-- Navbar (Single-Row Buttons) -->
    <nav class="navbar">
        <a class="navbar-brand" href="#home">MentorMentee</a>
        <div class="navbar-nav">
            <a class="nav-link" href="#home">Home</a>
            <a class="nav-link" href="#about">About Us</a>
            <a class="nav-link" href="#services">Services</a>
            <a class="nav-link" href="#contact">Contact</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="main-container" id="home">
        <div class="hero-section">
            <h1 id="typewriter"></h1>
            <h4>Your journey starts here</h4>
            <h5>— choose your login and get started!</h5>
            <div class="buttons-container">
                <a href="{{ route('admin.login') }}" class="btn btn-primary">
                    <i class="fas fa-user-shield"></i> Admin Login
                </a>
                <a href="{{ route('mentor.login') }}" class="btn btn-primary">
                    <i class="fas fa-user-shield"></i> Mentor Login
                </a>
                <a href="{{ route('mentee.login') }}" class="btn btn-primary">
                    <i class="fas fa-user-shield"></i> Mentee Login
                </a>
            </div>
        </div>
        <div class="image-container">
            <img src="{{ asset('images/home (2).jpg') }}" alt="3D System Illustration" class="hero-image">
        </div>
    </div>

    <!-- About Section -->
    <section class="section" id="about">
        <h2>About Us</h2>
        <div class="section-content">
            <p>
                We are a dedicated team committed to providing innovative solutions for educational institutions.
                Our system is designed to streamline administrative tasks and enhance the student experience through
                cutting-edge technology and user-friendly interfaces. With years of experience in educational
                technology, we strive to empower both administrators and students with tools that make learning
                and management more efficient and effective.
            </p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section" id="services">
        <h2>Services</h2>
        <div class="section-content">
            <div class="services-grid">
                <div class="service-card">
                    <h3>Student Management</h3>
                    <p>Efficiently manage student records, attendance, and performance tracking.</p>
                </div>
                <div class="service-card">
                    <h3>Admin Dashboard</h3>
                    <p>Comprehensive tools for administrators to oversee operations.</p>
                </div>
                <div class="service-card">
                    <h3>Secure Login</h3>
                    <p>Safe and reliable access for both students and administrators.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section" id="contact">
        <h2>Contact Us</h2>
        <div class="section-content">
            <p>Have questions? Get in touch with us!</p>
            <form class="contact-form">
                <input type="text" placeholder="Your Name" required>
                <input type="email" placeholder="Your Email" required>
                <textarea rows="5" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <p>© 2025 MentorMentee System. All Rights Reserved.</p>
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Cookie Policy</a>
                <a href="#">FAQs</a>
            </div>
        </div>
    </footer>
    @include('layouts.footer')

    <!-- Scripts -->
    <script>
        // Typewriter Effect
        const text = "Welcome to Our System!";
        const speed = 80;
        let i = 0;
        const typewriter = document.getElementById("typewriter");

        function typeEffect() {
            if (i < text.length) {
                typewriter.innerHTML += text.charAt(i);
                i++;
                setTimeout(typeEffect, speed);
            } else {
                setTimeout(() => {
                    typewriter.style.transition = 'opacity 0.5s, transform 0.5s';
                    typewriter.style.opacity = '0';
                    typewriter.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        typewriter.innerHTML = "";
                        typewriter.style.opacity = '1';
                        typewriter.style.transform = 'translateY(0)';
                        i = 0;
                        typeEffect();
                    }, 500);
                }, 2500);
            }
        }
        typeEffect();

        // Smooth Scroll for Navbar Links
        document.querySelectorAll('.navbar-nav .nav-link').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetSection = document.querySelector(targetId);

                if (targetSection) {
                    targetSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Leaf Animation
        document.addEventListener('DOMContentLoaded', function() {
            const leavesContainer = document.getElementById('leaves-container');
            const leafCount = 20;

            for (let i = 0; i < leafCount; i++) {
                createLeaf();
            }

            function createLeaf() {
                const leaf = document.createElement('div');
                leaf.className = 'leaf';

                const startX = Math.random() * window.innerWidth;
                const duration = Math.random() * 8 + 4;
                const delay = Math.random() * 5;
                const size = Math.random() * 15 + 8;

                leaf.style.left = `${startX}px`;
                leaf.style.animationDuration = `${duration}s`;
                leaf.style.animationDelay = `${delay}s`;
                leaf.style.width = `${size}px`;
                leaf.style.height = `${size}px`;
                leaf.style.transform = `rotate(${Math.random() * 360}deg)`;

                leavesContainer.appendChild(leaf);

                leaf.addEventListener('animationend', () => {
                    leaf.remove();
                    createLeaf();
                });
            }
        });
    </script>
</body>

</html>