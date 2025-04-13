<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Join Our Community</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FF6B6B', // Coral red
                        secondary: '#4ECDC4', // Teal
                        accent: '#FFE66D', // Yellow
                        dark: '#1A535C', // Dark teal
                        light: '#F7FFF7', // Off-white
                        'glass': 'rgba(255, 255, 255, 0.25)',
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        display: ['Clash Display', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                        'float-slow': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'spin-slow': 'spin 15s linear infinite',
                        'bounce-slow': 'bounce 3s infinite',
                        'wiggle': 'wiggle 1s ease-in-out infinite',
                        'morph': 'morph 8s ease-in-out infinite',
                        'gradient': 'gradient 8s ease infinite',
                        'slide-in': 'slideIn 0.5s forwards',
                        'slide-out': 'slideOut 0.5s forwards',
                        'fade-in': 'fadeIn 0.5s forwards',
                        'fade-out': 'fadeOut 0.5s forwards',
                        'scale-in': 'scaleIn 0.5s forwards',
                        'scale-out': 'scaleOut 0.5s forwards',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(-3deg)' },
                            '50%': { transform: 'rotate(3deg)' },
                        },
                        morph: {
                            '0%': { borderRadius: '60% 40% 30% 70% / 60% 30% 70% 40%' },
                            '50%': { borderRadius: '30% 60% 70% 40% / 50% 60% 30% 60%' },
                            '100%': { borderRadius: '60% 40% 30% 70% / 60% 30% 70% 40%' }
                        },
                        gradient: {
                            '0%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' },
                            '100%': { backgroundPosition: '0% 50%' }
                        },
                        slideIn: {
                            '0%': { transform: 'translateX(-100%)', opacity: 0 },
                            '100%': { transform: 'translateX(0)', opacity: 1 }
                        },
                        slideOut: {
                            '0%': { transform: 'translateX(0)', opacity: 1 },
                            '100%': { transform: 'translateX(100%)', opacity: 0 }
                        },
                        fadeIn: {
                            '0%': { opacity: 0 },
                            '100%': { opacity: 1 }
                        },
                        fadeOut: {
                            '0%': { opacity: 1 },
                            '100%': { opacity: 0 }
                        },
                        scaleIn: {
                            '0%': { transform: 'scale(0.8)', opacity: 0 },
                            '100%': { transform: 'scale(1)', opacity: 1 }
                        },
                        scaleOut: {
                            '0%': { transform: 'scale(1)', opacity: 1 },
                            '100%': { transform: 'scale(0.8)', opacity: 0 }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes morph {
            0% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
            50% { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; }
            100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes pulse-ring {
            0% { transform: scale(0.8); opacity: 0.8; }
            100% { transform: scale(1.5); opacity: 0; }
        }

        @keyframes rotate-3d {
            0% { transform: perspective(1000px) rotateY(0deg); }
            100% { transform: perspective(1000px) rotateY(360deg); }
        }

        @keyframes bounce-subtle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-float-slow {
            animation: float 6s ease-in-out infinite;
        }

        .animate-morph {
            animation: morph 8s ease-in-out infinite;
        }

        .animate-gradient {
            animation: gradient 8s ease infinite;
        }

        .animate-pulse-ring {
            animation: pulse-ring 1.5s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }

        .animate-rotate-3d {
            animation: rotate-3d 15s linear infinite;
        }

        .animate-bounce-subtle {
            animation: bounce-subtle 2s ease-in-out infinite;
        }

        .animate-shimmer {
            background: linear-gradient(90deg, rgba(255,255,255,0), rgba(255,255,255,0.5), rgba(255,255,255,0));
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        .blob {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            animation: morph 8s ease-in-out infinite;
        }

        .gradient-text {
            background: linear-gradient(90deg, #FF6B6B, #4ECDC4, #FFE66D);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: gradient 8s ease infinite;
        }

        .gradient-border {
            position: relative;
            border-radius: 1rem;
        }

        .gradient-border::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4, #FFE66D, #FF6B6B);
            background-size: 400% 400%;
            z-index: -1;
            border-radius: 1.1rem;
            animation: gradient 8s ease infinite;
        }

        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
            transition: all 0.3s ease;
            transform-style: preserve-3d;
        }

        .glass-card:hover {
            transform: translateY(-5px) rotateX(5deg) rotateY(5deg);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .form-input {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.3);
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(45deg, #FF6B6B, #FF8E8E);
            color: white;
            border-radius: 0.75rem;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.4);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.5s ease;
            z-index: -1;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.5);
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-social {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            transform-style: preserve-3d;
        }

        .btn-social:hover {
            transform: translateY(-3px) rotateX(5deg);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .tab-button {
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .tab-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
            border-radius: 9999px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .tab-button.active::before {
            opacity: 1;
        }

        .tab-button.active {
            color: white;
            transform: scale(1.05);
        }

        .tab-slider {
            position: absolute;
            height: 100%;
            border-radius: 9999px;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
            z-index: 0;
        }

        .checkbox-wrapper {
            position: relative;
            display: inline-block;
        }

        .checkbox-wrapper input[type="checkbox"] {
            opacity: 0;
            position: absolute;
        }

        .checkbox-wrapper label {
            position: relative;
            display: inline-block;
            padding-left: 30px;
            cursor: pointer;
        }

        .checkbox-wrapper label::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 107, 107, 0.5);
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
        }

        .checkbox-wrapper input[type="checkbox"]:checked + label::before {
            background: #FF6B6B;
            border-color: #FF6B6B;
        }

        .checkbox-wrapper label::after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 8px;
            height: 12px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg) scale(0);
            opacity: 0;
            transition: all 0.2s ease;
        }

        .checkbox-wrapper input[type="checkbox"]:checked + label::after {
            opacity: 1;
            transform: rotate(45deg) scale(1);
        }

        .select-wrapper {
            position: relative;
        }

        .select-wrapper::after {
            content: '';
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-top: 6px solid rgba(255, 107, 107, 0.8);
            pointer-events: none;
        }

        .select-wrapper select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            padding-right: 2.5rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        .select-wrapper select:focus {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.3);
            transform: translateY(-2px);
        }

        #cursor-follower {
            position: fixed;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,107,107,0.5) 0%, rgba(255,107,107,0) 70%);
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s, background 0.3s;
            mix-blend-mode: screen;
        }

        #cursor-dot {
            position: fixed;
            width: 8px;
            height: 8px;
            background-color: #FF6B6B;
            border-radius: 50%;
            pointer-events: none;
            z-index: 10000;
            transform: translate(-50%, -50%);
            transition: transform 0.1s;
        }

        .interactive:hover ~ #cursor-follower {
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, rgba(78,205,196,0.4) 0%, rgba(78,205,196,0) 70%);
        }

        .interactive:active ~ #cursor-follower {
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(255,230,109,0.4) 0%, rgba(255,230,109,0) 70%);
        }

        @media (max-width: 768px) {
            #cursor-follower, #cursor-dot {
                display: none;
            }
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            background: radial-gradient(circle, rgba(255,255,255,0.8) 0%, rgba(255,255,255,0) 70%);
        }

        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .floating-shape {
            position: absolute;
            opacity: 0.5;
            pointer-events: none;
        }

        .shape-1 {
            top: 10%;
            left: 10%;
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #FF6B6B, #FF8E8E);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: float 6s ease-in-out infinite, morph 8s ease-in-out infinite;
        }

        .shape-2 {
            top: 60%;
            left: 80%;
            width: 120px;
            height: 120px;
            background: linear-gradient(45deg, #4ECDC4, #6EE7E0);
            border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%;
            animation: float 8s ease-in-out infinite reverse, morph 10s ease-in-out infinite alternate;
        }

        .shape-3 {
            top: 80%;
            left: 20%;
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, #FFE66D, #FFF0A8);
            border-radius: 50% 50% 50% 50% / 60% 40% 60% 40%;
            animation: float 7s ease-in-out infinite, morph 12s ease-in-out infinite alternate-reverse;
        }

        .shape-4 {
            top: 30%;
            left: 90%;
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
            border-radius: 40% 60% 60% 40% / 40% 40% 60% 60%;
            animation: float 9s ease-in-out infinite alternate, morph 15s ease-in-out infinite;
        }

        .shape-5 {
            top: 70%;
            left: 40%;
            width: 90px;
            height: 90px;
            background: linear-gradient(45deg, #4ECDC4, #FFE66D);
            border-radius: 60% 40% 40% 60% / 60% 60% 40% 40%;
            animation: float 10s ease-in-out infinite reverse, morph 20s ease-in-out infinite alternate;
        }

        .form-appear {
            animation: scaleIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        .form-disappear {
            animation: scaleOut 0.5s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards;
        }

        .input-icon {
            transition: all 0.3s ease;
        }

        .form-input:focus + .input-icon {
            transform: scale(1.2);
            color: #FF6B6B;
        }

        .form-group {
            position: relative;
            z-index: 1;
        }

        .form-group::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #FF6B6B, #4ECDC4);
            transition: width 0.3s ease, left 0.3s ease;
            z-index: -1;
        }

        .form-group:focus-within::after {
            width: 100%;
            left: 0;
        }

        .form-label {
            position: absolute;
            left: 3.5rem;
            top: 0.85rem;
            color: #6B7280;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .form-input:focus ~ .form-label,
        .form-input:not(:placeholder-shown) ~ .form-label {
            transform: translateY(-1.5rem) scale(0.8);
            color: #FF6B6B;
            font-weight: 500;
        }

        .form-input::placeholder {
            color: transparent;
        }

        .form-input:focus::placeholder {
            color: #9CA3AF;
        }

        .vanta-canvas {
            position: fixed !important;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&display=swap" rel="stylesheet">
</head>

<body class="font-sans text-dark overflow-x-hidden bg-gradient-to-br from-light via-white to-light min-h-screen">
    <!-- Vanta.js Background -->
    <div id="vanta-bg"></div>

    <!-- Floating Shapes -->
    <div class="floating-shapes">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
        <div class="floating-shape shape-4"></div>
        <div class="floating-shape shape-5"></div>
    </div>

    <!-- Cursor Elements -->
    <div id="cursor-follower"></div>
    <div id="cursor-dot"></div>

    <!-- Header -->
    <header class="fixed w-full z-50 transition-all duration-500" id="navbar">
        <div class="container mx-auto px-4 py-4">
            <div class="glass rounded-2xl shadow-lg px-6 py-4 flex justify-between items-center">
                <div class="flex items-center">
                    <a href="#" class="font-display font-bold text-2xl interactive">
                        <span class="text-primary">Quick</span><span class="text-secondary">Hands</span>
                        <div class="absolute -bottom-1 left-0 w-full h-0.5 bg-gradient-to-r from-primary to-secondary scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-dark font-medium relative group interactive">
                        Home
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary to-primary/50 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/about" class="text-dark font-medium relative group interactive">
                        About
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary to-primary/50 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/contact" class="text-dark font-medium relative group interactive">
                        Contact
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary to-primary/50 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/join" class="text-primary font-medium relative group interactive">
                        Join Us
                        <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-gradient-to-r from-primary to-secondary"></span>
                    </a>
                </nav>
                <div class="flex items-center space-x-4">
                    <a href="#" class="hidden md:block text-dark hover:text-primary transition-colors interactive">Login</a>
                    <a href="#" class="hidden md:block btn-primary interactive">Sign Up</a>
                    <button class="md:hidden text-dark hover:text-primary transition-colors interactive" id="mobile-menu-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="container mx-auto px-4 py-2">
                <div class="glass rounded-2xl shadow-lg p-6 space-y-4">
                    <a href="/" class="block text-dark hover:text-primary transition-colors">Home</a>
                    <a href="/about" class="block text-dark hover:text-primary transition-colors">About</a>
                    <a href="/contact" class="block text-dark hover:text-primary transition-colors">Contact</a>
                    <a href="/join" class="block text-primary font-medium">Join Us</a>
                    <div class="flex space-x-4 pt-4 border-t border-white/20">
                        <a href="#" class="block text-dark hover:text-primary transition-colors">Login</a>
                        <a href="#" class="block btn-primary">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-32 pb-20 relative overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <!-- Hero Section -->
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="relative inline-flex mb-6">
                    <div class="absolute inset-0 bg-primary/20 rounded-full animate-pulse-ring"></div>
                    <div class="relative inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-primary to-secondary rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white animate-bounce-subtle" fill="none" viewBox="0   class="h-10 w-10 text-white animate-bounce-subtle" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" />
                        </svg>
                    </div>
                </div>
                <h1 class="font-display text-5xl md:text-6xl font-bold mb-6 relative">
                    Join Our <span class="gradient-text">Community</span>
                    <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-primary via-secondary to-accent rounded-full"></div>
                </h1>
                <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto">
                    Connect with local service providers and get things done faster than ever before.
                </p>
            </div>

            <!-- Two Columns Section -->
            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <!-- For Customers -->
                <div class="glass-card p-8 relative overflow-hidden group" data-aos="fade-right">
                    <div class="absolute -top-10 -left-10 w-40 h-40 bg-primary/10 blob -z-10"></div>
                    <div class="absolute top-0 left-0 w-2 h-full bg-gradient-to-b from-primary to-primary/50 rounded-full"></div>

                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary/20 to-primary/40 rounded-2xl flex items-center justify-center mr-4 rotate-12 group-hover:rotate-0 transition-all duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h2 class="font-display text-2xl font-semibold">For Customers</h2>
                    </div>

                    <ul class="space-y-4 pl-4">
                        <li class="flex items-start group/item">
                            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center mr-3 group-hover/item:bg-primary/20 transition-all duration-300 group-hover/item:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-gray-600 group-hover/item:text-gray-800 transition-colors duration-300 group-hover/item:translate-x-1 transform transition-transform">Find local professionals for everyday tasks</span>
                        </li>
                        <li class="flex items-start group/item">
                            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center mr-3 group-hover/item:bg-primary/20 transition-all duration-300 group-hover/item:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-gray-600 group-hover/item:text-gray-800 transition-colors duration-300 group-hover/item:translate-x-1 transform transition-transform">Save time with quick service matching</span>
                        </li>
                        <li class="flex items-start group/item">
                            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center mr-3 group-hover/item:bg-primary/20 transition-all duration-300 group-hover/item:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-gray-600 group-hover/item:text-gray-800 transition-colors duration-300 group-hover/item:translate-x-1 transform transition-transform">Secure payments and verified providers</span>
                        </li>
                    </ul>

                    <!-- Decorative Element -->
                    <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-primary/10 rounded-full animate-pulse-slow"></div>
                </div>

                <!-- For Providers -->
                <div class="glass-card p-8 relative overflow-hidden group" data-aos="fade-left">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-secondary/10 blob -z-10"></div>
                    <div class="absolute top-0 left-0 w-2 h-full bg-gradient-to-b from-secondary to-secondary/50 rounded-full"></div>

                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-secondary/20 to-secondary/40 rounded-2xl flex items-center justify-center mr-4 -rotate-12 group-hover:rotate-0 transition-all duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h2 class="font-display text-2xl font-semibold">For Providers</h2>
                    </div>

                    <ul class="space-y-4 pl-4">
                        <li class="flex items-start group/item">
                            <div class="w-10 h-10 bg-secondary/10 rounded-full flex items-center justify-center mr-3 group-hover/item:bg-secondary/20 transition-all duration-300 group-hover/item:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-gray-600 group-hover/item:text-gray-800 transition-colors duration-300 group-hover/item:translate-x-1 transform transition-transform">Grow your client base in your local area</span>
                        </li>
                        <li class="flex items-start group/item">
                            <div class="w-10 h-10 bg-secondary/10 rounded-full flex items-center justify-center mr-3 group-hover/item:bg-secondary/20 transition-all duration-300 group-hover/item:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-gray-600 group-hover/item:text-gray-800 transition-colors duration-300 group-hover/item:translate-x-1 transform transition-transform">Set your own schedule and rates</span>
                        </li>
                        <li class="flex items-start group/item">
                            <div class="w-10 h-10 bg-secondary/10 rounded-full flex items-center justify-center mr-3 group-hover/item:bg-secondary/20 transition-all duration-300 group-hover/item:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-gray-600 group-hover/item:text-gray-800 transition-colors duration-300 group-hover/item:translate-x-1 transform transition-transform">Get paid quickly with secure transactions</span>
                        </li>
                    </ul>

                    <!-- Decorative Element -->
                    <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-secondary/10 rounded-full animate-pulse-slow"></div>
                </div>
            </div>

            <!-- Tabs and Form Section -->
            <div class="max-w-2xl mx-auto relative" data-aos="fade-up">
                <!-- Background Blob -->
                <div class="absolute -top-20 -left-20 w-64 h-64 bg-primary/5 rounded-full blur-3xl -z-10"></div>
                <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-secondary/5 rounded-full blur-3xl -z-10"></div>

                <!-- Tabs -->
                <div class="flex justify-center mb-8">
                    <div class="glass rounded-full p-1.5 shadow-lg relative">
                        <div id="tab-slider" class="tab-slider" style="width: 50%; left: 0;"></div>
                        <button id="signup-tab" class="tab-button active px-8 py-3 font-medium rounded-full relative z-10 interactive">Sign Up</button>
                        <button id="login-tab" class="tab-button px-8 py-3 font-medium text-gray-600 hover:text-gray-800 transition-colors rounded-full relative z-10 interactive">Log In</button>
                    </div>
                </div>

                <!-- Sign Up Form -->
                <div id="signup-form" class="gradient-border form-appear">
                    <div class="glass-card p-8 shadow-xl">
                        <h2 class="font-display text-3xl font-bold text-center mb-2 relative">
                            Create Your Account
                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-16 h-1 bg-gradient-to-r from-primary to-secondary rounded-full"></div>
                        </h2>
                        <p class="text-gray-600 text-center mb-8">
                            Join our community and start connecting with service providers.
                        </p>

                        <form action="{{ route('signup') }}" method="POST">
                            @csrf
                            <!-- Full Name -->
                            <div class="mb-8 form-group">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="fullname" name="fullname" placeholder="John Doe" class="pl-12 w-full px-4 py-3 form-input focus:outline-none">
                                    <label for="fullname" class="form-label">Full Name</label>
                                </div>
                                @error('fullname')
                                    <div class="text-primary text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="mb-8 form-group">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="email" id="email" name="email" placeholder="john@example.com" class="pl-12 w-full px-4 py-3 form-input focus:outline-none">
                                    <label for="email" class="form-label">Email Address</label>
                                </div>
                                @error('email')
                                    <div class="text-primary text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-8 form-group">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    <input type="password" id="password" name="password" placeholder="••••••••" class="pl-12 w-full px-4 py-3 form-input focus:outline-none">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <button type="button" id="toggle-password" class="text-gray-400 hover:text-gray-500 focus:outline-none interactive">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="eye-open">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="eye-closed">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-3.809a4.5 4.5 0 00-6.364 0m11.868 8.693A10.05 10.05 0 0112 19c-2.751 0-5.273-1.109-7.103-2.907m14.206 0a9.97 9.97 0 01-7.103 2.907" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="text-primary text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- User Type -->
                            <div class="mb-8 form-group">
                                <div class="select-wrapper">
                                    <select name="role" class="pl-12 w-full px-4 py-3 form-input focus:outline-none">
                                        <option value="user">User - I need services</option>
                                        <option value="provider">Provider - I offer services</option>
                                    </select>
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Terms Agreement -->
                            <div class="mb-8">
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" id="terms" name="terms" class="interactive">
                                    <label for="terms" class="text-gray-600">I agree to the <a href="#" class="text-primary hover:underline">Terms of Service</a> and <a href="#" class="text-primary hover:underline">Privacy Policy</a></label>
                                </div>
                                @error('terms')
                                    <div class="text-primary text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sign Up Button -->
                            <button type="submit" class="w-full btn-primary py-4 flex justify-center items-center interactive">
                                <span class="relative z-10">Sign Up</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                            @if (session('done'))
                                <div class="mt-4 p-3 bg-green-100 text-green-700 rounded-xl">{{ session('done') }}</div>
                            @endif

                            <!-- Or Continue With -->
                            <div class="mt-8">
                                <div class="relative">
                                    <div class="absolute inset-0 flex items-center">
                                        <div class="w-full border-t border-gray-200"></div>
                                    </div>
                                    <div class="relative flex justify-center text-sm">
                                        <span class="px-4 bg-white text-gray-500">or continue with</span>
                                    </div>
                                </div>

                                <div class="mt-6 grid grid-cols-2 gap-4">
                                    <a href="#" class="btn-social py-3 flex justify-center items-center interactive">
                                        <svg class="h-5 w-5 text-red-500 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z" />
                                        </svg>
                                        <span>Google</span>
                                    </a>

                                    <a href="#" class="btn-social py-3 flex justify-center items-center interactive">
                                        <svg class="h-5 w-5 text-blue-600 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                        </svg>
                                        <span>Facebook</span>
                                    </a>
                                </div>
                            </div>

                            <!-- Already have an account -->
                            <div class="mt-6 text-center">
                                <p class="text-gray-600">
                                    Already have an account? <a href="#" id="login-link" class="text-primary hover:underline interactive">Log in</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Login Form (Hidden by default) -->
                <div id="login-form" class="hidden gradient-border">
                    <div class="glass-card p-8 shadow-xl">
                        <h2 class="font-display text-3xl font-bold text-center mb-2 relative">
                            Welcome Back
                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-16 h-1 bg-gradient-to-r from-primary to-secondary rounded-full"></div>
                        </h2>
                        <p class="text-gray-600 text-center mb-8">
                            Log in to your account and continue your journey
                        </p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Email Address -->
                            <div class="mb-8 form-group">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="email" id="login-email" name="email" placeholder="john@example.com" class="pl-12 w-full px-4 py-3 form-input focus:outline-none">
                                    <label for="login-email" class="form-label">Email Address</label>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="mb-8 form-group">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    <input type="password" id="login-password" name="password" placeholder="••••••••" class="pl-12 w-full px-4 py-3 form-input focus:outline-none">
                                    <label for="login-password" class="form-label">Password</label>
                                </div>
                            </div>

                            <!-- Log In Button -->
                            <button type="submit" class="w-full btn-primary py-4 flex justify-center items-center interactive">
                                <span class="relative z-10">Log In</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>

                            <!-- Don't have an account -->
                            <div class="mt-6 text-center">
                                <p class="text-gray-600">
                                    Don't have an account? <a href="#" id="signup-link" class="text-primary hover:underline interactive">Sign up</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-20 pb-10 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div>
                    <h3 class="font-display text-2xl font-bold mb-6">Quick<span class="text-primary">Hands</span></h3>
                    <p class="text-gray-400 mb-6">Connecting you with skilled professionals for all your service needs.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors interactive">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors interactive">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors interactive">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors interactive">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                            <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>Home
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                            <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>About Us
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                            <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>Services
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                            <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>Contact
                        </a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Services</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                            <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Home Cleaning
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                            <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Handyman
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                            <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Moving Help
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                            <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Lawn Care
                        </a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Subscribe to Our Newsletter</h4>
                    <p class="text-gray-400 mb-4">Stay updated with our latest services and offers.</p>
                    <div class="flex mb-4">
                        <input type="email" placeholder="Your email" class="px-4 py-3 w-full rounded-l-lg focus:outline-none text-gray-800">
                        <button class="bg-primary px-4 py-3 rounded-r-lg hover:bg-opacity-90 transition-colors interactive">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <p class="text-xs text-gray-500">By subscribing, you agree to our Privacy Policy and consent to receive updates.</p>
                </div>
            </div>
            <div class="border-t border-white/10 mt-16 pt-8 text-center text-gray-400">
                <p>&copy; 2025 QuickHands. All rights reserved.</p>
                <div class="flex justify-center space-x-6 mt-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm interactive">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm interactive">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm interactive">FAQ</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // Initialize Vanta.js background
        VANTA.NET({
            el: "#vanta-bg",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            color: 0xFF6B6B,
            backgroundColor: 0xF7FFF7,
            points: 10.00,
            maxDistance: 20.00,
            spacing: 16.00
        });

        // Initialize AOS animations
        AOS.init({
            duration: 800,
            once: true
        });

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('py-2');
                navbar.classList.remove('py-4');
            } else {
                navbar.classList.add('py-4');
                navbar.classList.remove('py-2');
            }
        });

        // Custom cursor
        const cursorFollower = document.getElementById('cursor-follower');
        const cursorDot = document.getElementById('cursor-dot');

        if (window.innerWidth > 768) {
            document.addEventListener('mousemove', function(e) {
                cursorFollower.style.left = e.clientX + 'px';
                cursorFollower.style.top = e.clientY + 'px';

                cursorDot.style.left = e.clientX + 'px';
                cursorDot.style.top = e.clientY + 'px';
            });

            // Add special effects on hover for interactive elements
            const interactiveElements = document.querySelectorAll('.interactive');

            interactiveElements.forEach(element => {
                element.addEventListener('mouseenter', function() {
                    cursorFollower.style.width = '80px';
                    cursorFollower.style.height = '80px';
                    cursorDot.style.transform = 'translate(-50%, -50%) scale(1.5)';
                });

                element.addEventListener('mouseleave', function() {
                    cursorFollower.style.width = '40px';
                    cursorFollower.style.height = '40px';
                    cursorDot.style.transform = 'translate(-50%, -50%) scale(1)';
                });

                element.addEventListener('mousedown', function() {
                    cursorFollower.style.width = '70px';
                    cursorFollower.style.height = '70px';
                    cursorDot.style.transform = 'translate(-50%, -50%) scale(0.5)';
                });

                element.addEventListener('mouseup', function() {
                    cursorFollower.style.width = '80px';
                    cursorFollower.style.height = '80px';
                    cursorDot.style.transform = 'translate(-50%, -50%) scale(1.5)';
                });
            });
        }

        // Create particles on click
        document.addEventListener('click', function(e) {
            if (window.innerWidth > 768) {
                createParticles(e.clientX, e.clientY);
            }
        });

        function createParticles(x, y) {
            const particleCount = 8;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';

                // Random size between 5 and 15
                const size = Math.random() * 10 + 5;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;

                // Random color
                const colors = ['#FF6B6B', '#4ECDC4', '#FFE66D'];
                const color = colors[Math.floor(Math.random() * colors.length)];
                particle.style.background = color;

                // Position at click
                particle.style.left = `${x}px`;
                particle.style.top = `${y}px`;

                // Random direction
                const angle = Math.random() * Math.PI * 2;
                const speed = Math.random() * 100 + 50;
                const vx = Math.cos(angle) * speed;
                const vy = Math.sin(angle) * speed;

                document.body.appendChild(particle);

                // Animate
                const startTime = Date.now();
                const duration = Math.random() * 1000 + 500; // 0.5 to 1.5 seconds

                function animate() {
                    const elapsed = Date.now() - startTime;
                    const progress = elapsed / duration;

                    if (progress >= 1) {
                        particle.remove();
                        return;
                    }

                    const currentX = x + vx * progress;
                    const currentY = y + vy * progress + (progress * progress * 200); // Add gravity
                    const scale = 1 - progress; // Fade out

                    particle.style.left = `${currentX}px`;
                    particle.style.top = `${currentY}px`;
                    particle.style.opacity = scale;
                    particle.style.transform = `scale(${scale})`;

                    requestAnimationFrame(animate);
                }

                animate();
            }
        }

        // Password toggle functionality
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('toggle-password');
        const eyeOpen = document.getElementById('eye-open');
        const eyeClosed = document.getElementById('eye-closed');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            eyeOpen.classList.toggle('hidden');
            eyeClosed.classList.toggle('hidden');
        });

        // Tab switching functionality with animation
        const signupTab = document.getElementById('signup-tab');
        const loginTab = document.getElementById('login-tab');
        const signupForm = document.getElementById('signup-form');
        const loginForm = document.getElementById('login-form');
        const signupLink = document.getElementById('signup-link');
        const loginLink = document.getElementById('login-link');
        const tabSlider = document.getElementById('tab-slider');

        function showSignup() {
            loginForm.classList.add('form-disappear');

            setTimeout(() => {
                loginForm.classList.add('hidden');
                signupForm.classList.remove('hidden');
                signupForm.classList.add('form-appear');
                signupForm.classList.remove('form-disappear');

                signupTab.classList.add('active');
                loginTab.classList.remove('active');

                // Move the slider
                tabSlider.style.left = '0';
            }, 300);
        }

        function showLogin() {
            signupForm.classList.add('form-disappear');

            setTimeout(() => {
                signupForm.classList.add('hidden');
                loginForm.classList.remove('hidden');
                loginForm.classList.add('form-appear');
                loginForm.classList.remove('form-disappear');

                loginTab.classList.add('active');
                signupTab.classList.remove('active');

                // Move the slider
                tabSlider.style.left = '50%';
            }, 300);
        }

        signupTab.addEventListener('click', showSignup);
        loginTab.addEventListener('click', showLogin);
        signupLink.addEventListener('click', function(e) {
            e.preventDefault();
            showSignup();
        });
        loginLink.addEventListener('click', function(e) {
            e.preventDefault();
            showLogin();
        });

        // Form input animations
        const formInputs = document.querySelectorAll('.form-input');

        formInputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('focused');
            });

            input.addEventListener('blur', () => {
                input.parentElement.classList.remove('focused');
            });
        });
    </script>
</body>

</html>
