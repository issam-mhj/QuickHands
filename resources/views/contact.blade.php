<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Hands - Get in Touch</title>
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
                        'spin-slow': 'spin 8s linear infinite',
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

            .glass {
                background: rgba(255, 255, 255, 0.25);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.18);
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

            .contact-card {
                @apply relative overflow-hidden rounded-2xl p-6 shadow-lg transition-all duration-500 hover:shadow-2xl;
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.18);
            }

            .contact-card::before {
                content: '';
                @apply absolute inset-0 bg-gradient-to-br from-primary/10 to-secondary/10 opacity-0 transition-opacity duration-300;
                z-index: -1;
            }

            .contact-card:hover::before {
                @apply opacity-100;
            }

            .input-field {
                @apply w-full px-4 py-3 bg-white/80 backdrop-blur-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300;
            }

            .faq-item {
                @apply overflow-hidden rounded-2xl mb-4 border border-gray-100 transition-all duration-300;
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.8) 0%, rgba(255, 255, 255, 0.9) 100%);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
            }

            .faq-item.active {
                @apply shadow-md border-secondary/30;
            }

            .faq-toggle {
                @apply w-full flex justify-between items-center px-6 py-4 focus:outline-none transition-all duration-300;
            }

            .faq-toggle:hover {
                @apply bg-gray-50/80;
            }

            .faq-content {
                @apply px-6 py-4 bg-white/50;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease-out;
            }

            .map-container {
                @apply relative overflow-hidden rounded-2xl shadow-xl;
                height: 500px;
            }

            .map-overlay {
                @apply absolute inset-0 bg-gradient-to-br from-primary/20 to-secondary/20 pointer-events-none opacity-0 transition-opacity duration-300;
                z-index: 10;
            }

            .map-container:hover .map-overlay {
                @apply opacity-100;
            }

            .contact-icon-container {
                @apply relative w-16 h-16 rounded-2xl flex items-center justify-center mb-4 mx-auto;
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.18);
                overflow: hidden;
            }

            .contact-icon-container::before {
                content: '';
                @apply absolute inset-0 bg-gradient-to-br from-primary/20 to-secondary/20 opacity-0 transition-opacity duration-300;
                z-index: -1;
            }

            .contact-card:hover .contact-icon-container::before {
                @apply opacity-100;
            }

            .contact-icon {
                @apply text-2xl text-primary transition-all duration-300;
                z-index: 1;
            }

            .contact-card:hover .contact-icon {
                @apply text-white transform scale-110;
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
                    <a href="/" class="text-gray-800 font-medium nav-link">
                        Home
                    </a>
                    <a href="/about" class="text-gray-800 font-medium nav-link">
                        About
                    </a>
                    <a href="/contact" class="text-primary font-medium nav-link active">
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
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="curved-bg opacity-20"></div>

        <!-- Floating Elements -->
        <div class="absolute top-1/4 right-10 w-20 h-20 bg-accent rounded-full opacity-20 animate-float"></div>
        <div class="absolute bottom-1/4 left-10 w-16 h-16 bg-primary rounded-full opacity-20 animate-float-slow"></div>
        <div class="absolute top-1/3 left-1/4 w-12 h-12 bg-secondary rounded-full opacity-20 animate-pulse-slow"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                <div
                    class="inline-block px-4 py-1 bg-primary/10 text-primary rounded-full text-sm font-semibold mb-6 backdrop-blur-sm">
                    WE'RE HERE TO HELP
                </div>
                <h1 class="font-display text-5xl md:text-6xl font-bold mb-6">
                    Get in <span class="gradient-text">Touch</span>
                </h1>
                <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto">
                    Have questions about QuickHands? We're here to help. Reach out to our team through any of the
                    channels below.
                </p>

                <!-- Animated Scroll Indicator -->
                <div class="flex justify-center mt-8">
                    <a href="#contact-info" class="text-primary hover:text-secondary transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 animate-bounce" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section id="contact-info" class="py-16 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-secondary/10 rounded-bl-full -z-10"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-1/4 bg-primary/10 rounded-tr-full -z-10"></div>

        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Address -->
                <div class="contact-card card-hover" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-icon-container">
                        <i class="fas fa-map-marker-alt contact-icon"></i>
                    </div>
                    <h3 class="font-display font-semibold text-xl text-center mb-3">Our Address</h3>
                    <p class="text-gray-600 text-center">123 QuickHands Street</p>
                    <p class="text-gray-600 text-center">Nador, SC 12345</p>

                    <!-- Decorative Element -->
                    <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-primary/10 rounded-full"></div>
                </div>

                <!-- Phone -->
                <div class="contact-card card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-icon-container">
                        <i class="fas fa-phone contact-icon"></i>
                    </div>
                    <h3 class="font-display font-semibold text-xl text-center mb-3">Phone</h3>
                    <p class="text-gray-600 text-center">Main: 0510000100</p>
                    <p class="text-gray-600 text-center">Support: 0631674696</p>

                    <!-- Decorative Element -->
                    <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-secondary/10 rounded-full"></div>
                </div>

                <!-- Email -->
                <div class="contact-card card-hover" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-icon-container">
                        <i class="fas fa-envelope contact-icon"></i>
                    </div>
                    <h3 class="font-display font-semibold text-xl text-center mb-3">Email</h3>
                    <p class="text-gray-600 text-center">General: info@quickhands.com</p>
                    <p class="text-gray-600 text-center">Support: help@quickhands.com</p>
                    <p class="text-gray-600 text-center">Careers: jobs@quickhands.com</p>

                    <!-- Decorative Element -->
                    <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-accent/10 rounded-full"></div>
                </div>

                <!-- Hours -->
                <div class="contact-card card-hover" data-aos="fade-up" data-aos-delay="400">
                    <div class="contact-icon-container">
                        <i class="fas fa-clock contact-icon"></i>
                    </div>
                    <h3 class="font-display font-semibold text-xl text-center mb-3">Hours</h3>
                    <p class="text-gray-600 text-center">Monday-Friday: 8AM - 6PM</p>
                    <p class="text-gray-600 text-center">Saturday: 10AM - 4PM</p>
                    <p class="text-gray-600 text-center">Sunday: Closed</p>

                    <!-- Decorative Element -->
                    <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-primary/10 rounded-full"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form and FAQ Section -->
    <section class="py-16 md:py-24 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-secondary/5"></div>
        <div class="absolute top-1/4 right-1/4 w-64 h-64 bg-primary/10 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-1/4 left-1/4 w-80 h-80 bg-secondary/10 rounded-full blur-3xl -z-10"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div data-aos="fade-right">
                    <div class="card p-8 relative">
                        <!-- Blob Background -->
                        <div class="absolute -top-10 -left-10 w-40 h-40 bg-primary/20 blob -z-10"></div>

                        <h2 class="font-display text-3xl font-bold mb-6">Get in Touch</h2>
                        <p class="text-gray-600 mb-8">Have questions or feedback? We'd love to hear from you.</p>

                        <form class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Your
                                    Name</label>
                                <input type="text" id="name" placeholder="John Doe" class="input-field">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email
                                    Address</label>
                                <input type="email" id="email" placeholder="john@example.com"
                                    class="input-field">
                            </div>

                            <div>
                                <label for="subject"
                                    class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                                <input type="text" id="subject" placeholder="How can we help you?"
                                    class="input-field">
                            </div>

                            <div>
                                <label for="message"
                                    class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                                <textarea id="message" rows="5" placeholder="Your message here..." class="input-field"></textarea>
                            </div>

                            <button type="submit" class="btn-primary group flex items-center justify-center w-full">
                                Send Message
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-1"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>

                        <!-- Floating Elements -->
                        <div
                            class="absolute -bottom-3 -right-3 w-10 h-10 bg-secondary rounded-full opacity-70 animate-pulse">
                        </div>
                    </div>
                </div>

                <!-- FAQ Section -->
                <div data-aos="fade-left">
                    <div class="relative">
                        <!-- Blob Background -->
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-secondary/20 blob -z-10"></div>

                        <h2 class="font-display text-3xl font-bold mb-6">Frequently Asked Questions</h2>
                        <p class="text-gray-600 mb-8">Find answers to common questions about QuickHands.</p>

                        <div class="space-y-4">
                            <!-- FAQ Item 1 -->
                            <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                                <button class="faq-toggle" data-target="faq1">
                                    <span class="font-display font-medium">How does QuickHands work?</span>
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center transition-transform duration-300">
                                        <i
                                            class="fas fa-plus text-primary text-sm transition-transform duration-300"></i>
                                    </div>
                                </button>
                                <div id="faq1" class="faq-content">
                                    <p class="text-gray-600">
                                        QuickHands connects users with local service providers. You can post a task
                                        describing what you need done, and qualified professionals in your area will
                                        respond
                                        with offers. You can then select the best fit for your needs based on their
                                        profile,
                                        reviews, and pricing.
                                    </p>
                                </div>
                            </div>

                            <!-- FAQ Item 2 -->
                            <div class="faq-item" data-aos="fade-up" data-aos-delay="150">
                                <button class="faq-toggle" data-target="faq2">
                                    <span class="font-display font-medium">How are service providers vetted?</span>
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center transition-transform duration-300">
                                        <i
                                            class="fas fa-plus text-primary text-sm transition-transform duration-300"></i>
                                    </div>
                                </button>
                                <div id="faq2" class="faq-content">
                                    <p class="text-gray-600">
                                        All service providers undergo a thorough background check and verification
                                        process.
                                        We verify their identity, professional credentials, and insurance coverage. We
                                        also
                                        collect and monitor customer reviews to ensure quality service.
                                    </p>
                                </div>
                            </div>

                            <!-- FAQ Item 3 -->
                            <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                                <button class="faq-toggle" data-target="faq3">
                                    <span class="font-display font-medium">What types of services are available?</span>
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center transition-transform duration-300">
                                        <i
                                            class="fas fa-plus text-primary text-sm transition-transform duration-300"></i>
                                    </div>
                                </button>
                                <div id="faq3" class="faq-content">
                                    <p class="text-gray-600">
                                        QuickHands offers a wide range of services including home cleaning, furniture
                                        assembly, moving assistance, handyman services, lawn care, pet sitting, and much
                                        more. If you need help with a task, chances are we have a provider who can
                                        assist.
                                    </p>
                                </div>
                            </div>

                            <!-- FAQ Item 4 -->
                            <div class="faq-item" data-aos="fade-up" data-aos-delay="250">
                                <button class="faq-toggle" data-target="faq4">
                                    <span class="font-display font-medium">How much does it cost to use
                                        QuickHands?</span>
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center transition-transform duration-300">
                                        <i
                                            class="fas fa-plus text-primary text-sm transition-transform duration-300"></i>
                                    </div>
                                </button>
                                <div id="faq4" class="faq-content">
                                    <p class="text-gray-600">
                                        Creating an account and posting tasks is free. You only pay for the services you
                                        book. Service providers set their own rates, and we add a small service fee to
                                        help
                                        maintain the platform and provide customer support.
                                    </p>
                                </div>
                            </div>

                            <!-- FAQ Item 5 -->
                            <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                                <button class="faq-toggle" data-target="faq5">
                                    <span class="font-display font-medium">Is there a guarantee on the work
                                        performed?</span>
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center transition-transform duration-300">
                                        <i
                                            class="fas fa-plus text-primary text-sm transition-transform duration-300"></i>
                                    </div>
                                </button>
                                <div id="faq5" class="faq-content">
                                    <p class="text-gray-600">
                                        Yes, we offer the QuickHands Guarantee. If you're not satisfied with the service
                                        provided, we'll work with you to make it right, which may include arranging for
                                        another service provider or providing a refund.
                                    </p>
                                </div>
                            </div>

                            <!-- FAQ Item 6 -->
                            <div class="faq-item" data-aos="fade-up" data-aos-delay="350">
                                <button class="faq-toggle" data-target="faq6">
                                    <span class="font-display font-medium">How do I pay for services?</span>
                                    <div
                                        class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center transition-transform duration-300">
                                        <i
                                            class="fas fa-plus text-primary text-sm transition-transform duration-300"></i>
                                    </div>
                                </button>
                                <div id="faq6" class="faq-content">
                                    <p class="text-gray-600">
                                        All payments are processed securely through our platform. You can pay using
                                        credit/debit cards, PayPal, or other supported payment methods. Funds are only
                                        released to the service provider after you confirm the task has been completed
                                        satisfactorily.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Elements -->
                        <div
                            class="absolute -bottom-3 -left-3 w-10 h-10 bg-primary rounded-full opacity-70 animate-pulse">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 md:py-24 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="map-container group" data-aos="fade-up">
                <div class="map-overlay"></div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d321.34926019883267!2d-2.9333420549827305!3d35.172332671844124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd77a7e65be2bd67%3A0x8ab5733c867557ea!2z2K_Yp9ixINin2YTYtNio2KfYqA!5e1!3m2!1sar!2sma!4v1743072891102!5m2!1sar!2sma"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>

                <!-- Decorative Elements -->
                <div class="absolute top-4 left-4 w-16 h-16 bg-primary/20 rounded-full animate-pulse-slow"></div>
                <div class="absolute bottom-4 right-4 w-16 h-16 bg-secondary/20 rounded-full animate-float"></div>
            </div>

            <div class="text-center mt-12" data-aos="fade-up">
                <h3 class="font-display text-2xl font-semibold mb-4">Visit Our Office</h3>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    We'd love to meet you in person! Stop by our office during business hours to speak with our team
                    directly.
                </p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 md:py-24 bg-gradient-to-br from-primary to-secondary text-white relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                <h2 class="font-display text-4xl md:text-5xl font-bold mb-6">Ready to Get Started?</h2>
                <p class="text-white/80 text-lg mb-8">
                    Join thousands of satisfied customers who have found reliable service providers through QuickHands.
                </p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="join"
                        class="bg-white text-primary px-6 py-3 rounded-xl font-medium hover:bg-white/90 transition duration-300 shadow-lg">Find
                        a Service</a>
                    <a href="join"
                        class="bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-xl font-medium transition duration-300">
                        Become a Provider
                    </a>
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
            const interactiveElements = document.querySelectorAll('a, button, .card, .contact-card');

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

        // FAQ Accordion
        const faqToggles = document.querySelectorAll('.faq-toggle');

        faqToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const content = document.getElementById(targetId);
                const icon = this.querySelector('i');
                const container = this.closest('.faq-item');

                // Close all other FAQs
                document.querySelectorAll('.faq-content').forEach(item => {
                    if (item.id !== targetId) {
                        item.style.maxHeight = null;
                        item.previousElementSibling.querySelector('i').classList.remove('fa-minus');
                        item.previousElementSibling.querySelector('i').classList.add('fa-plus');
                        item.previousElementSibling.querySelector('i').closest('.faq-item')
                            .classList.remove('active');
                    }
                });

                // Toggle the clicked FAQ
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                    container.classList.remove('active');
                } else {
                    content.style.maxHeight = content.scrollHeight + 'px';
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                    container.classList.add('active');
                }
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 100,
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
