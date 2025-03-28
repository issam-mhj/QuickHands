<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Your Helping Hand</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FF6B6B',
                        secondary: '#6B66FF',
                        light: '#FFF5F5',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #FFF5F5 0%, #FFFFFF 100%);
        }

        .cta-gradient {
            background: linear-gradient(90deg, #6B66FF 0%, #FF6B6B 100%);
        }
    </style>
</head>

<body class="font-sans text-gray-800">
    <!-- Header -->
    <header class="container mx-auto px-4 py-6 flex justify-between items-center">
        <div class="flex items-center">
            <a href="#" class="text-[#0066cc] font-bold text-xl">Quick <span class="text-[#FF6F61]">Hands</span></a>
        </div>
        <nav class="hidden md:flex space-x-8">
            <a href="/" class="text-gray-600 hover:text-blue-600 transition">Home</a>
            <a href="about" class="text-blue-600 font-medium">About</a>
            <a href="contact" class="text-gray-600 hover:text-blue-600 transition">Contact</a>
            <a href="#" class="text-gray-600 hover:text-blue-600 transition">Join Us</a>
        </nav>
        <button class="md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </header>


    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white p-4 shadow-md">
        <nav class="flex flex-col space-y-4">
            <a href="/" class="font-medium hover:text-primary transition">Home</a>
            <a href="/about" class="font-medium hover:text-primary transition">Prices</a>
            <a href="contact" class="font-medium hover:text-primary transition">Contact</a>
            <a href="join" class="font-medium text-primary hover:text-secondary transition">Join Us</a>
        </nav>
    </div>

    <!-- Our Story Section -->
    <section class="bg-gradient-to-r from-blue-100 to-white py-16 px-6 md:px-12 text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold mb-6">Our Story</h1>
            <p class="text-lg text-gray-600">
                QuickHands was founded with a simple mission: to make everyday services more
                accessible, reliable, and affordable for everyone.
            </p>
        </div>
    </section>

    <!-- Our Mission Section -->
    <section class="py-16 px-6 md:px-12">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-8">
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold mb-6">Our Mission</h2>
                <p class="text-lg text-gray-600 mb-8">
                    At QuickHands, we believe that everyone should have access to quality service
                    at affordable prices. That's why we prioritize fair pricing, skilled professionals,
                    and reliable service every time, ensuring value for the hard-earned money of our customers.
                </p>
                <div class="space-y-4">
                    <h3 class="font-semibold text-lg">We're committed to:</h3>
                    <div class="flex items-start gap-3">
                        <div class="bg-blue-100 p-1 rounded-full mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p>Offering quality through rigorous provider verification</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="bg-blue-100 p-1 rounded-full mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p>Setting the bar for service through efficient matching</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="bg-blue-100 p-1 rounded-full mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p>Building a community of like-minded professionals</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="bg-blue-100 p-1 rounded-full mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p>Creating opportunities for growth and development</p>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2">
                <img src="assets/about1.jpg" alt="Team working together"
                    class="rounded-lg shadow-lg w-full h-auto object-cover">
            </div>
        </div>
    </section>

    <!-- Meet Our Team Section -->
    <section class="py-16 px-6 md:px-12 bg-gray-50">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Meet Our Team</h2>
            <p class="text-lg text-gray-600 mb-12 max-w-3xl mx-auto">
                The passionate people behind QuickHands. We're working to revolutionize the way you access services.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="assets/member1.jpg" alt="Jane Cooper" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-1">Sara Cooper</h3>
                        <p class="text-primary text-sm mb-4">CEO & Founder</p>
                        <p class="text-gray-600 text-sm">
                            With over 10 years of experience in the service industry, Sara founded QuickHands to bridge
                            the gap between skilled professionals and clients.
                        </p>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="assets/member2.jpg" alt="John Smith" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-1">John Smith</h3>
                        <p class="text-primary text-sm mb-4">CTO</p>
                        <p class="text-gray-600 text-sm">
                            John brings his technical expertise to create a seamless platform experience, ensuring our
                            service providers and clients connect effortlessly.
                        </p>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="assets/member4.jpg" alt="Maria Rodriguez" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-1">Maria Rodriguez</h3>
                        <p class="text-primary text-sm mb-4">Head of Operations</p>
                        <p class="text-gray-600 text-sm">
                            Maria oversees all operational aspects of QuickHands, ensuring quality service delivery and
                            maintaining our high standards.
                        </p>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="assets/member3.jpg" alt="David Chen" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-1">David Chen</h3>
                        <p class="text-primary text-sm mb-4">Head of Marketing</p>
                        <p class="text-gray-600 text-sm">
                            David leads our marketing team, spreading the word about QuickHands and helping connect more
                            service providers with clients.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-gradient text-white py-16 px-6 md:px-12">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Join QuickHands Today</h2>
            <p class="text-lg mb-8">
                Whether you're looking for services or offering your skills, become part of our growing community!
            </p>
            <button
                class="bg-white text-primary hover:bg-gray-100 font-medium py-3 px-8 rounded-full transition shadow-md">
                Get Started →
            </button>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-gray-800  text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick<span class="text-primary">Hands</span></h3>
                    <p class="text-gray-400">Connecting you with skilled professionals for all your service needs.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Services</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Home Cleaning</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Handyman</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Moving Help</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Lawn Care</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Connect With Us</h4>
                    <div class="flex space-x-4 mb-4">
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <p class="text-gray-400">Subscribe to our newsletter</p>
                    <div class="flex mt-2">
                        <input type="email" placeholder="Your email"
                            class="px-4 py-2 w-full rounded-l-md focus:outline-none text-gray-800">
                        <button class="bg-primary px-4 py-2 rounded-r-md">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 QuickHands. All rights reserved.</p>
            </div>
        </div>
    </footer>


    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (event) => {
            if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
