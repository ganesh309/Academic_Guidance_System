<style>
    /* Updated Modern Navbar Styles */
    body {
        background: #f4f6f9;
        margin: 0;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        padding-top: 85px;
    }

    .top-navbar {
        height: 60px;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background: rgba(42, 42, 74, 0.95);
        backdrop-filter: blur(12px);
        padding: 0 2rem;
        z-index: 1000;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .nav-container {
        max-width: 1440px;
        margin: 0 auto;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .nav-brand {
        color: #ffffff;
        font-size: 1.8rem;
        font-weight: 700;
        text-decoration: none;
        letter-spacing: -0.03em;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
    }

    .nav-brand:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    .nav-links {
        display: flex;
        align-items: center;
        gap: 1.2rem;
        height: 100%;
    }

    .nav-btn {
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        border-radius: 5px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-size: 0.95rem;
        font-weight: 500;
        padding: 0.75rem 1.4rem;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .nav-btn:hover {
        background: rgba(133, 183, 214, 0.53);
        transform: translateY(-2px);
        border-color: transparent;
    }

    .nav-btn:active {
        transform: translateY(0);
        box-shadow: 0 2px 10px rgba(255, 77, 125, 0.2);
    }

  

    .nav-btn.active::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60%;
        height: 2px;
        background: white;
        border-radius: 2px;
    }

    /* Modern Hamburger Menu */
    .hamburger {
        display: none;
        cursor: pointer;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .hamburger:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .hamburger span {
        display: block;
        width: 28px;
        height: 2.5px;
        background: white;
        margin: 6px 0;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 4px;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .top-navbar {
            padding: 0 1.5rem;
        }

        .nav-btn {
            padding: 0.6rem 1.2rem;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 768px) {
        body {
            padding-top: 80px;
        }

        .top-navbar {
            height: 80px;
            backdrop-filter: blur(8px);
        }

        .hamburger {
            display: block;
        }

        .nav-links {
            position: fixed;
            top: 80px;
            left: -100%;
            width: 100%;
            height: calc(100vh - 80px);
            background: rgba(42, 42, 74, 0.98);
            backdrop-filter: blur(16px);
            flex-direction: column;
            padding: 2rem;
            gap: 1.5rem;
            transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-links.active {
            left: 0;
        }

        .nav-btn {
            width: 100%;
            justify-content: center;
            padding: 1.2rem;
            font-size: 1.1rem;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.08);
        }

        .nav-btn.active {
            background: linear-gradient(135deg, #ff4d7d 0%, #ff6b95 100%);
        }
    }

    /* Animation Enhancements */
    @keyframes buttonHover {
        0% { transform: translateY(0); }
        50% { transform: translateY(-3px); }
        100% { transform: translateY(-2px); }
    }

    /* Accessibility Enhancements */
    .nav-btn:focus-visible {
        outline: 2px solid #ffffff;
        outline-offset: 2px;
    }

    .hamburger:focus-visible {
        outline: 2px solid #ff4d7d;
        outline-offset: 2px;
    }
</style>

<!-- Updated Navbar HTML -->
<nav class="top-navbar">
    <div class="nav-container">
        <a href="#" class="nav-brand">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1))">
                <path d="M3 13H11V3H3V13ZM3 21H11V15H3V21ZM13 21H21V11H13V21ZM13 3V9H21V3H13Z" fill="white"/>
            </svg>
            Dashboard
        </a>

        <div class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="nav-links">
            <a href="{{ route('students.index') }}" class="nav-btn {{ Route::is('students.*') ? 'active' : '' }}">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                Student List
            </a>
            
            <a href="{{ route('mentees.index') }}" class="nav-btn {{ Route::is('mentees.*') ? 'active' : '' }}">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                Mentee List
            </a>

            <a href="{{ route('mentormentees.index') }}" class="nav-btn {{ Route::is('mentormentees.*') ? 'active' : '' }}">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="8.5" cy="7" r="4"></circle>
                    <path d="M18 8l5 5"></path>
                    <path d="M23 8l-5 5"></path>
                </svg>
                Mentor & Mentee
            </a>

            <a href="{{ route('admin.logout') }}" class="nav-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                Logout
            </a>
        </div>
    </div>
</nav>

<script>
    function toggleMenu() {
        const navLinks = document.querySelector('.nav-links');
        const hamburger = document.querySelector('.hamburger');
        navLinks.classList.toggle('active');
        hamburger.classList.toggle('active');
        
        // Animate hamburger icon
        if (navLinks.classList.contains('active')) {
            document.documentElement.style.overflow = 'hidden';
        } else {
            document.documentElement.style.overflow = '';
        }
    }

    // Enhanced click outside detection
    document.addEventListener('click', (e) => {
        const navContainer = document.querySelector('.nav-container');
        if (!navContainer.contains(e.target)) {
            document.querySelector('.nav-links').classList.remove('active');
            document.querySelector('.hamburger').classList.remove('active');
            document.documentElement.style.overflow = '';
        }
    });

    // Smooth scroll behavior for all links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

</script>