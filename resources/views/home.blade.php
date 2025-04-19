<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Hands - Local Services On Demand</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        display: ['Clash Display', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                        'float-slow': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            },
                        }
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer components {
            .btn-primary {
                @apply bg-primary text-white px-6 py-3 rounded-xl font-medium hover:bg-opacity-90 transition duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5 transform;
            }

            .btn-secondary {
                @apply bg-white text-dark border-2 border-secondary px-6 py-3 rounded-xl font-medium hover:bg-secondary hover:text-white transition duration-300;
            }

            .card {
                @apply bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300;
            }

            .card-hover {
                @apply hover:-translate-y-2 transform transition-all duration-300;
            }

            .gradient-text {
                @apply text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary;
            }

            .blob {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
                transition: all 1s ease-in-out;
                animation: blob-animation 8s ease-in-out infinite;
            }

            .service-card {
                @apply relative overflow-hidden rounded-2xl p-6 shadow-lg transition-all duration-500 hover:shadow-2xl;
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.18);
            }

            .service-card::before {
                content: '';
                @apply absolute inset-0 bg-gradient-to-br from-primary/20 to-secondary/20 opacity-0 transition-opacity duration-300;
                z-index: -1;
            }

            .service-card:hover::before {
                @apply opacity-100;
            }

            .nav-link {
                position: relative;
                transition: all 0.3s ease;
            }

            .nav-link::after {
                content: '';
                position: absolute;
                bottom: -5px;
                left: 0;
                width: 0;
                height: 2px;
                background: linear-gradient(90deg, #FF6B6B, #4ECDC4);
                transition: width 0.3s ease;
            }

            .nav-link:hover::after {
                width: 100%;
            }

            .nav-link.active::after {
                width: 100%;
            }

            .glass {
                background: rgba(255, 255, 255, 0.25);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.18);
            }

            .custom-shape-divider {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                overflow: hidden;
                line-height: 0;
            }
        }

        @keyframes blob-animation {
            0% {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            }

            50% {
                border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%;
            }

            100% {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            }
        }

        .toggle-switch:checked+.toggle-label {
            background-color: #4ECDC4;
        }

        .toggle-label::after {
            content: '';
            @apply absolute left-1 top-1 bg-white w-5 h-5 rounded-full transition-transform duration-300 ease-in-out;
        }

        .toggle-switch:checked+.toggle-label::after {
            @apply transform translate-x-5;
        }

        .scroll-indicator {
            height: 50px;
            width: 30px;
            border: 2px solid white;
            border-radius: 20px;
            position: relative;
        }

        .scroll-indicator::before {
            content: '';
            position: absolute;
            top: 8px;
            left: 50%;
            width: 6px;
            height: 6px;
            margin-left: -3px;
            background-color: white;
            border-radius: 100%;
            animation: scroll-animation 2s infinite;
        }

        @keyframes scroll-animation {
            0% {
                opacity: 1;
                transform: translateY(0);
            }

            100% {
                opacity: 0;
                transform: translateY(20px);
            }
        }

        .marquee {
            white-space: nowrap;
            overflow: hidden;
            position: relative;
        }

        .marquee-content {
            display: inline-block;
            animation: marquee 20s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .curved-bg {
            position: absolute;
            height: 100%;
            width: 100%;
            bottom: 0;
            z-index: -1;
        }

        .curved-bg::before {
            content: '';
            display: block;
            position: absolute;
            border-radius: 100% 50%;
            width: 55%;
            height: 100%;
            background-color: #4ECDC4;
            right: -20%;
            top: 30%;
        }

        .curved-bg::after {
            content: '';
            display: block;
            position: absolute;
            border-radius: 100% 50%;
            width: 55%;
            height: 100%;
            background-color: #FF6B6B;
            left: -20%;
            top: 40%;
            z-index: -1;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&display=swap" rel="stylesheet">
</head>

<body class="font-sans text-dark overflow-x-hidden bg-light">
    <!-- Cursor Follower (for desktop) -->
    <div id="cursor-follower"
        class="fixed w-8 h-8 rounded-full bg-primary opacity-50 pointer-events-none z-50 hidden md:block"></div>

    <!-- Header -->
    <header class="fixed w-full z-50 transition-all duration-500" id="navbar">
        <div class="container mx-auto px-4 py-4">
            <div class="glass rounded-2xl shadow-lg px-6 py-4 flex justify-between items-center">
                <div class="flex items-center">
                    <a href="#" class="font-bold text-2xl">
                        <span class="text-primary">Quick</span><span class="text-secondary">Hands</span>
                    </a>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-primary font-medium nav-link active">
                        Home
                    </a>
                    <a href="/about" class="text-gray-800 font-medium nav-link">
                        About
                    </a>
                    <a href="/contact" class="text-gray-800 font-medium nav-link">
                        Contact
                    </a>
                    <a href="/join" class="text-gray-800 font-medium nav-link">
                        Join Us
                    </a>
                </nav>
                <div class="flex items-center space-x-4">
                    <a href="join"
                        class="hidden md:block text-gray-800 hover:text-primary transition-colors">Login</a>
                    <a href="join" class="hidden md:block magnetic-btn">
                        <div class="btn-primary content">Sign Up</div>
                    </a>
                    <button class="md:hidden text-gray-800 hover:text-primary transition-colors"
                        id="mobile-menu-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="container mx-auto px-4 py-2">
                <div class="glass rounded-2xl shadow-lg p-6 space-y-4">
                    <a href="/" class="block text-gray-800 hover:text-primary transition-colors">Home</a>
                    <a href="/about" class="block text-primary font-medium">About</a>
                    <a href="/contact" class="block text-gray-800 hover:text-primary transition-colors">Contact</a>
                    <a href="/join" class="block text-gray-800 hover:text-primary transition-colors">Join Us</a>
                    <div class="flex space-x-4 pt-4 border-t border-white/20">
                        <a href="#" class="block text-gray-800 hover:text-primary transition-colors">Login</a>
                        <a href="#" class="block btn-primary">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center pt-24 overflow-hidden">
        <div class="curved-bg opacity-20"></div>

        <!-- Floating Elements -->
        <div class="absolute top-1/4 right-10 w-20 h-20 bg-accent rounded-full opacity-20 animate-float"></div>
        <div class="absolute bottom-1/4 left-10 w-16 h-16 bg-primary rounded-full opacity-20 animate-float-slow"></div>
        <div class="absolute top-1/3 left-1/4 w-12 h-12 bg-secondary rounded-full opacity-20 animate-pulse-slow"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0" data-aos="fade-right">
                    <div
                        class="inline-block px-4 py-1 bg-primary/10 text-primary rounded-full text-sm font-semibold mb-6 backdrop-blur-sm">
                        LOCAL SERVICES, ON DEMAND
                    </div>
                    <h1 class="font-display text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                        Your Tasks, <br><span class="gradient-text">Our Hands</span>
                    </h1>
                    <p class="text-gray-600 mb-8 text-lg max-w-md">
                        Connect with trusted local service providers for all your everyday tasks. From home maintenance
                        to specialized services, we've got you covered.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <button class="btn-primary group flex items-center justify-center">
                            Get Started
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-1"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="btn-secondary">Learn More</button>
                    </div>
                </div>
                <div class="md:w-1/2 md:pl-10" data-aos="fade-left" data-aos-delay="200">
                    <div class="relative">
                        <!-- Blob Background -->
                        <div class="absolute -top-10 -right-10 w-72 h-72 bg-accent/30 blob -z-10"></div>

                        <div class="card p-6 relative transform hover:rotate-1 transition-all duration-500">
                            <div
                                class="absolute -top-4 -right-4 bg-accent text-dark text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                Popular
                            </div>
                            <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80"
                                alt="Home cleaning service"
                                class="rounded-xl w-full h-56 object-cover mb-6 shadow-md">

                            <div class="bg-white rounded-xl p-5 shadow-md border border-gray-100">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="font-medium text-lg">Home Cleaning</h3>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                <i class="fas fa-star text-sm"></i>
                                                <i class="fas fa-star text-sm"></i>
                                                <i class="fas fa-star text-sm"></i>
                                                <i class="fas fa-star text-sm"></i>
                                                <i class="fas fa-star-half-alt text-sm"></i>
                                            </div>
                                            <span class="text-xs text-gray-500 ml-2">(4.8/5)</span>
                                        </div>
                                        <p class="text-primary font-semibold mt-2">$75/hr</p>
                                    </div>
                                    <div class="flex flex-col items-end">
                                        <span class="text-xs text-green-500 mb-2 font-medium">Available Today</span>
                                        <div class="relative inline-block w-12 align-middle">
                                            <input type="checkbox" id="toggle" class="toggle-switch sr-only"
                                                checked />
                                            <label for="toggle"
                                                class="toggle-label block overflow-hidden h-7 w-12 rounded-full bg-gray-300 cursor-pointer"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Floating Elements -->
                            <div
                                class="absolute -bottom-3 -left-3 w-10 h-10 bg-secondary rounded-full opacity-70 animate-pulse">
                            </div>
                            <div
                                class="absolute top-1/2 -right-3 w-6 h-6 bg-primary rounded-full opacity-70 animate-ping">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex flex-col items-center">
            <div class="scroll-indicator"></div>
            <span class="text-dark mt-2 text-sm">Scroll Down</span>
        </div>
    </section>

    <!-- Marquee Section -->
    <section class="py-8 bg-dark text-white overflow-hidden">
        <div class="marquee">
            <div class="marquee-content">
                <div class="flex space-x-8 items-center">
                    <span class="text-xl font-medium">Home Cleaning</span>
                    <span class="text-accent text-2xl">•</span>
                    <span class="text-xl font-medium">Handyman Services</span>
                    <span class="text-accent text-2xl">•</span>
                    <span class="text-xl font-medium">Lawn Care</span>
                    <span class="text-accent text-2xl">•</span>
                    <span class="text-xl font-medium">Moving Help</span>
                    <span class="text-accent text-2xl">•</span>
                    <span class="text-xl font-medium">Plumbing</span>
                    <span class="text-accent text-2xl">•</span>
                    <span class="text-xl font-medium">Electrical Work</span>
                    <span class="text-accent text-2xl">•</span>
                    <span class="text-xl font-medium">Home Cleaning</span>
                    <span class="text-accent text-2xl">•</span>
                    <span class="text-xl font-medium">Handyman Services</span>
                    <span class="text-accent text-2xl">•</span>
                    <span class="text-xl font-medium">Lawn Care</span>
                    <span class="text-accent text-2xl">•</span>
                    <span class="text-xl font-medium">Moving Help</span>
                    <span class="text-accent text-2xl">•</span>
                    <span class="text-xl font-medium">Plumbing</span>
                    <span class="text-accent text-2xl">•</span>
                    <span class="text-xl font-medium">Electrical Work</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 md:py-32 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-secondary/20 rounded-bl-full -z-10"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-1/4 bg-primary/20 rounded-tr-full -z-10"></div>

        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-display text-4xl md:text-5xl font-bold mb-6">Popular Services</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Browse our most requested services and find the help you need today.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="service-card card-hover group" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="absolute top-0 right-0 w-24 h-24 bg-primary/10 rounded-bl-full -z-10 transition-all duration-300 group-hover:bg-primary/20">
                    </div>
                    <div class="bg-white/80 p-3 rounded-full inline-block mb-4">
                        <i class="fas fa-broom text-primary text-xl"></i>
                    </div>
                    <h3 class="font-display font-semibold text-xl mb-3 group-hover:text-primary transition-colors">Home
                        Cleaning</h3>
                    <p class="text-gray-600 mb-4">Professional cleaning services for your home or apartment.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-semibold">From $65/hr</span>
                        <a href="#"
                            class="text-sm text-secondary hover:text-dark group-hover:font-medium transition-all flex items-center">
                            Book Now
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 ml-1 transition-transform duration-300 group-hover:translate-x-1"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="service-card card-hover group" data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="absolute top-0 right-0 w-24 h-24 bg-secondary/10 rounded-bl-full -z-10 transition-all duration-300 group-hover:bg-secondary/20">
                    </div>
                    <div class="bg-white/80 p-3 rounded-full inline-block mb-4">
                        <i class="fas fa-tools text-secondary text-xl"></i>
                    </div>
                    <h3 class="font-display font-semibold text-xl mb-3 group-hover:text-secondary transition-colors">
                        Handyman</h3>
                    <p class="text-gray-600 mb-4">Repairs, installations, and maintenance for your home.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-secondary font-semibold">From $80/hr</span>
                        <a href="#"
                            class="text-sm text-primary hover:text-dark group-hover:font-medium transition-all flex items-center">
                            Book Now
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 ml-1 transition-transform duration-300 group-hover:translate-x-1"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="service-card card-hover group" data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="absolute top-0 right-0 w-24 h-24 bg-accent/10 rounded-bl-full -z-10 transition-all duration-300 group-hover:bg-accent/20">
                    </div>
                    <div class="bg-white/80 p-3 rounded-full inline-block mb-4">
                        <i class="fas fa-truck text-accent text-xl"></i>
                    </div>
                    <h3 class="font-display font-semibold text-xl mb-3 group-hover:text-accent transition-colors">
                        Moving Help</h3>
                    <p class="text-gray-600 mb-4">Assistance with packing, loading, and moving your belongings.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-accent font-semibold">From $90/hr</span>
                        <a href="#"
                            class="text-sm text-primary hover:text-dark group-hover:font-medium transition-all flex items-center">
                            Book Now
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 ml-1 transition-transform duration-300 group-hover:translate-x-1"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-16" data-aos="fade-up">
                <a href="#" class="btn-primary inline-block">View All Services</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 md:py-32 bg-dark text-white relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-full h-20 bg-light"
            style="clip-path: polygon(0 0, 100% 0, 100% 100%, 0 0);"></div>
        <div class="absolute bottom-0 right-0 w-full h-20 bg-light"
            style="clip-path: polygon(0 100%, 100% 0, 100% 100%, 0 100%);"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="font-display text-4xl md:text-5xl font-bold mb-6">What Makes QuickHands Different</h2>
                <p class="text-gray-300 max-w-2xl mx-auto text-lg">
                    Our platform is designed with simplicity and efficiency in mind, connecting you with trusted local
                    professionals for all your everyday needs.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="relative group" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-primary/20 to-primary/5 rounded-2xl blur-xl group-hover:blur-lg transition-all duration-300 opacity-70">
                    </div>
                    <div class="relative bg-dark/80 backdrop-blur-sm p-8 rounded-2xl border border-white/10 h-full">
                        <div
                            class="bg-primary/20 w-16 h-16 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-clock text-primary text-2xl"></i>
                        </div>
                        <h3
                            class="font-display font-semibold text-xl mb-4 text-white group-hover:text-primary transition-colors">
                            Quick Response</h3>
                        <p class="text-gray-300">Get connected with service providers within minutes of placing your
                            request.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="relative group" data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-secondary/20 to-secondary/5 rounded-2xl blur-xl group-hover:blur-lg transition-all duration-300 opacity-70">
                    </div>
                    <div class="relative bg-dark/80 backdrop-blur-sm p-8 rounded-2xl border border-white/10 h-full">
                        <div
                            class="bg-secondary/20 w-16 h-16 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-check-circle text-secondary text-2xl"></i>
                        </div>
                        <h3
                            class="font-display font-semibold text-xl mb-4 text-white group-hover:text-secondary transition-colors">
                            Vetted Professionals</h3>
                        <p class="text-gray-300">All service providers are background-checked and skill-verified for
                            your safety.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="relative group" data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-accent/20 to-accent/5 rounded-2xl blur-xl group-hover:blur-lg transition-all duration-300 opacity-70">
                    </div>
                    <div class="relative bg-dark/80 backdrop-blur-sm p-8 rounded-2xl border border-white/10 h-full">
                        <div
                            class="bg-accent/20 w-16 h-16 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-search text-accent text-2xl"></i>
                        </div>
                        <h3
                            class="font-display font-semibold text-xl mb-4 text-white group-hover:text-accent transition-colors">
                            Find Anything</h3>
                        <p class="text-gray-300">From plumbing to tutoring, find the service you need locally with our
                            extensive network.</p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="relative group" data-aos="fade-up" data-aos-delay="400">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-2xl blur-xl group-hover:blur-lg transition-all duration-300 opacity-70">
                    </div>
                    <div class="relative bg-dark/80 backdrop-blur-sm p-8 rounded-2xl border border-white/10 h-full">
                        <div
                            class="bg-gradient-to-r from-primary/20 to-secondary/20 w-16 h-16 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-star text-white text-2xl"></i>
                        </div>
                        <h3
                            class="font-display font-semibold text-xl mb-4 text-white group-hover:text-gradient-text transition-colors">
                            Transparent Reviews</h3>
                        <p class="text-gray-300">Read real reviews from verified customers before booking any service.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-20 md:py-32 bg-light relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-1/4 right-0 w-64 h-64 bg-primary/10 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-1/4 left-0 w-80 h-80 bg-secondary/10 rounded-full blur-3xl -z-10"></div>

        <div class="container mx-auto px-4">
            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="font-display text-4xl md:text-5xl font-bold mb-6">How QuickHands Works</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Getting help has never been easier. Follow these simple steps to find the perfect service provider.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                <!-- Connection Lines (Desktop Only) -->
                <div
                    class="hidden md:block absolute top-1/3 left-1/4 right-1/4 h-0.5 bg-gradient-to-r from-primary to-secondary">
                </div>

                <!-- Step 1 -->
                <div class="relative" data-aos="fade-up" data-aos-delay="100">
                    <div class="card p-8 text-center relative z-10 h-full">
                        <div class="relative mb-8">
                            <div
                                class="bg-primary text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto text-2xl font-bold">
                                1
                            </div>
                            <div
                                class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-24 h-24 bg-primary/20 rounded-full animate-pulse-slow">
                            </div>
                        </div>
                        <h3 class="font-display font-semibold text-xl mb-4">Post Your Task</h3>
                        <p class="text-gray-600">Describe what you need done, when you need it, and your budget.</p>

                        <!-- Decorative Element -->
                        <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-primary/20 rounded-full"></div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="relative" data-aos="fade-up" data-aos-delay="200">
                    <div class="card p-8 text-center relative z-10 h-full">
                        <div class="relative mb-8">
                            <div
                                class="bg-secondary text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto text-2xl font-bold">
                                2
                            </div>
                            <div
                                class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-24 h-24 bg-secondary/20 rounded-full animate-pulse-slow">
                            </div>
                        </div>
                        <h3 class="font-display font-semibold text-xl mb-4">Review Offers</h3>
                        <p class="text-gray-600">Compare profiles, reviews, and quotes from interested service
                            providers.</p>

                        <!-- Decorative Element -->
                        <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-secondary/20 rounded-full"></div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="relative" data-aos="fade-up" data-aos-delay="300">
                    <div class="card p-8 text-center relative z-10 h-full">
                        <div class="relative mb-8">
                            <div
                                class="bg-accent text-dark w-16 h-16 rounded-full flex items-center justify-center mx-auto text-2xl font-bold">
                                3
                            </div>
                            <div
                                class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-24 h-24 bg-accent/20 rounded-full animate-pulse-slow">
                            </div>
                        </div>
                        <h3 class="font-display font-semibold text-xl mb-4">Get It Done</h3>
                        <p class="text-gray-600">Choose the right person for the job and get your task completed.</p>

                        <!-- Decorative Element -->
                        <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-accent/20 rounded-full"></div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-16" data-aos="fade-up">
                <a href="#" class="btn-primary inline-block">Post a Task Now</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 md:py-32 bg-gradient-to-br from-primary to-secondary text-white relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-display text-4xl md:text-5xl font-bold mb-6">What Our Users Say</h2>
                <p class="text-white/80 max-w-2xl mx-auto text-lg">
                    Don't just take our word for it. Here's what people in our community have to say about QuickHands.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                <!-- Testimonial 1 -->
                <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl border border-white/20 transform transition-all duration-300 hover:scale-105 hover:bg-white/20"
                    data-aos="fade-up" data-aos-delay="100">
                    <div class="flex text-yellow-400 mb-6">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="italic mb-8">"QuickHands has changed the way I manage household tasks. I found a reliable
                        plumber within minutes of posting my job."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80"
                                alt="Sarah Johnson" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-medium">Sarah Johnson</h4>
                            <p class="text-sm text-white/70">Homeowner</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl border border-white/20 transform transition-all duration-300 hover:scale-105 hover:bg-white/20"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="flex text-yellow-400 mb-6">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="italic mb-8">"As a busy professional, QuickHands has been a lifesaver. I can find
                        reliable help for any task with just a few clicks."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80"
                                alt="Michael Chen" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-medium">Michael Chen</h4>
                            <p class="text-sm text-white/70">Business Owner</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl border border-white/20 transform transition-all duration-300 hover:scale-105 hover:bg-white/20"
                    data-aos="fade-up" data-aos-delay="300">
                    <div class="flex text-yellow-400 mb-6">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="italic mb-8">"I've been using QuickHands to find clients for my handyman business. The
                        platform is easy to use and has helped me grow."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80"
                                alt="David Wilson" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-medium">David Wilson</h4>
                            <p class="text-sm text-white/70">Service Provider</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 md:py-32 bg-light relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-secondary/5"></div>
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-accent/10 rounded-bl-full -z-10"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-1/4 bg-primary/10 rounded-tr-full -z-10"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden" data-aos="fade-up">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-10 md:p-12 flex flex-col justify-center">
                        <h2 class="font-display text-3xl md:text-4xl font-bold mb-6 leading-tight">Ready to Get
                            Started?</h2>
                        <p class="text-gray-600 mb-8">
                            Join thousands of satisfied customers who have found reliable service providers through
                            QuickHands.
                        </p>
                        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                            <a href="#" class="btn-primary">Find a Service</a>
                            <a href="#" class="btn-secondary">
                                Become a Provider
                            </a>
                        </div>
                    </div>
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1521791055366-0d553872125f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1769&q=80"
                            alt="Happy customer" class="w-full h-full object-cover">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-primary/60 to-secondary/60 mix-blend-multiply">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-white text-center p-8">
                                <div class="text-5xl font-bold mb-2">4.9/5</div>
                                <div class="flex justify-center text-yellow-400 mb-4">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="text-lg font-medium">Average Rating</p>
                                <p class="text-sm opacity-80">Based on 10,000+ reviews</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-20 pb-10 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div>
                    <h3 class="font-display text-2xl font-bold mb-6">Quick<span class="text-primary">Hands</span></h3>
                    <p class="text-gray-400 mb-6">Connecting you with skilled professionals for all your service needs.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>Home
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>About Us
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>Services
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>How It Works
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>Contact
                            </a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Services</h4>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Home Cleaning
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Handyman
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Moving Help
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Lawn Care
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>View All Services
                            </a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Subscribe to Our Newsletter</h4>
                    <p class="text-gray-400 mb-4">Stay updated with our latest services and offers.</p>
                    <div class="flex mb-4">
                        <input type="email" placeholder="Your email"
                            class="px-4 py-3 w-full rounded-l-lg focus:outline-none text-gray-800">
                        <button class="bg-primary px-4 py-3 rounded-r-lg hover:bg-opacity-90 transition-colors">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <p class="text-xs text-gray-500">By subscribing, you agree to our Privacy Policy and consent to
                        receive updates.</p>
                </div>
            </div>
            <div class="border-t border-white/10 mt-16 pt-8 text-center text-gray-400">
                <p>&copy; 2025 QuickHands. All rights reserved.</p>
                <div class="flex justify-center space-x-6 mt-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Privacy
                        Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Terms of
                        Service</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">FAQ</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- React Integration (External) -->
    <div id="react-components"></div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
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

        // Toggle switch functionality
        document.getElementById('toggle').addEventListener('change', function() {
            console.log('Toggle changed:', this.checked);
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

        // Cursor follower for desktop
        const cursorFollower = document.getElementById('cursor-follower');

        if (window.innerWidth > 768) {
            document.addEventListener('mousemove', function(e) {
                cursorFollower.style.left = e.clientX + 'px';
                cursorFollower.style.top = e.clientY + 'px';
            });

            // Add special effects on hover for interactive elements
            const interactiveElements = document.querySelectorAll('a, button, .card, .service-card');

            interactiveElements.forEach(element => {
                element.addEventListener('mouseenter', function() {
                    cursorFollower.classList.add('scale-150');
                    cursorFollower.classList.add('opacity-30');
                });

                element.addEventListener('mouseleave', function() {
                    cursorFollower.classList.remove('scale-150');
                    cursorFollower.classList.remove('opacity-30');
                });
            });
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

    <!-- React Integration Script (External) -->
    <script type="text/javascript">
        // This is where you would load your React components
        // Example:
        // document.addEventListener('DOMContentLoaded', function() {
        //     // Load React and ReactDOM from CDN
        //     const reactScript = document.createElement('script');
        //     reactScript.src = 'https://unpkg.com/react@18/umd/react.production.min.js';
        //     document.body.appendChild(reactScript);
        //
        //     const reactDOMScript = document.createElement('script');
        //     reactDOMScript.src = 'https://unpkg.com/react-dom@18/umd/react-dom.production.min.js';
        //     document.body.appendChild(reactDOMScript);
        //
        //     // Load your custom React components
        //     reactDOMScript.onload = function() {
        //         const customScript = document.createElement('script');
        //         customScript.src = '/path/to/your/react-components.js';
        //         document.body.appendChild(customScript);
        //     };
        // });
    </script>
</body>

</html>
