<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Hands - Get in Touch</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#ff6b6b',
                        secondary: '#4ecdc4',
                        light: '#f7f9fc'
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="font-sans">
    <!-- Header -->
    <header class="container mx-auto px-4 py-6 flex justify-between items-center">
        <div class="flex items-center">
            <a href="#" class="text-[#0066cc] font-bold text-xl">Quick <span
                    class="text-[#FF6F61]">Hands</span></a>
        </div>
        <nav class="hidden md:flex space-x-8">
            <a href="/" class="text-gray-600 hover:text-blue-600 transition">Home</a>
            <a href="about" class="text-gray-600 hover:text-blue-600 transition">About</a>
            <a href="contact" class=" text-blue-600 font-medium">Contact</a>
            <a href="join" class="text-gray-600 hover:text-blue-600 transition">Join Us</a>
        </nav>
        <button class="md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-100 to-white py-12">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Get in Touch</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Have questions about QuickHands? We're here to help. Reach out to our team through any of the channels
                below.
            </p>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Address -->
                <div class="text-center">
                    <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-blue-500"></i>
                    </div>
                    <h3 class="font-bold mb-2">Our Address</h3>
                    <p class="text-gray-600">123 QuickHands Street</p>
                    <p class="text-gray-600">Service City, SC 12345</p>
                </div>

                <!-- Phone -->
                <div class="text-center">
                    <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone text-blue-500"></i>
                    </div>
                    <h3 class="font-bold mb-2">Phone</h3>
                    <p class="text-gray-600">Main: +1 (555) 123-4567</p>
                    <p class="text-gray-600">Support: +1 (555) 987-6543</p>
                </div>

                <!-- Email -->
                <div class="text-center">
                    <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-blue-500"></i>
                    </div>
                    <h3 class="font-bold mb-2">Email</h3>
                    <p class="text-gray-600">General: info@quickhands.com</p>
                    <p class="text-gray-600">Support: help@quickhands.com</p>
                    <p class="text-gray-600">Careers: jobs@quickhands.com</p>
                </div>

                <!-- Hours -->
                <div class="text-center">
                    <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-blue-500"></i>
                    </div>
                    <h3 class="font-bold mb-2">Hours</h3>
                    <p class="text-gray-600">Monday-Friday: 8AM - 6PM</p>
                    <p class="text-gray-600">Saturday: 10AM - 4PM</p>
                    <p class="text-gray-600">Sunday: Closed</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form and FAQ Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div>
                    <h2 class="text-2xl font-bold mb-4">Get in Touch</h2>
                    <p class="text-gray-600 mb-6">Have questions or feedback? We'd love to hear from you.</p>

                    <form>
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                            <input type="text" id="name" placeholder="John Doe"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email
                                Address</label>
                            <input type="email" id="email" placeholder="john@example.com"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                            <input type="text" id="subject" placeholder="How can we help you?"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-6">
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea id="message" rows="5" placeholder="Your message here..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <button type="submit"
                            class="bg-blue-500 text-white px-6 py-3 rounded-md font-medium flex items-center justify-center w-full md:w-auto">
                            Send Message
                            <i class="fas fa-paper-plane ml-2"></i>
                        </button>
                    </form>
                </div>

                <!-- FAQ Section -->
                <div>
                    <h2 class="text-2xl font-bold mb-4">Frequently Asked Questions</h2>
                    <p class="text-gray-600 mb-6">Find answers to common questions about QuickHands.</p>

                    <div class="space-y-4">
                        <!-- FAQ Item 1 -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <button
                                class="faq-toggle w-full flex justify-between items-center px-4 py-3 bg-white hover:bg-gray-50 focus:outline-none"
                                data-target="faq1">
                                <span class="font-medium">How does QuickHands work?</span>
                                <i class="fas fa-chevron-down text-gray-400 transition-transform"></i>
                            </button>
                            <div id="faq1"
                                class="faq-content hidden px-4 py-3 bg-gray-50 border-t border-gray-200">
                                <p class="text-gray-600">
                                    QuickHands connects users with local service providers. You can post a task
                                    describing what you need done, and qualified professionals in your area will respond
                                    with offers. You can then select the best fit for your needs based on their profile,
                                    reviews, and pricing.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <button
                                class="faq-toggle w-full flex justify-between items-center px-4 py-3 bg-white hover:bg-gray-50 focus:outline-none"
                                data-target="faq2">
                                <span class="font-medium">How are service providers vetted?</span>
                                <i class="fas fa-chevron-down text-gray-400 transition-transform"></i>
                            </button>
                            <div id="faq2"
                                class="faq-content hidden px-4 py-3 bg-gray-50 border-t border-gray-200">
                                <p class="text-gray-600">
                                    All service providers undergo a thorough background check and verification process.
                                    We verify their identity, professional credentials, and insurance coverage. We also
                                    collect and monitor customer reviews to ensure quality service.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <button
                                class="faq-toggle w-full flex justify-between items-center px-4 py-3 bg-white hover:bg-gray-50 focus:outline-none"
                                data-target="faq3">
                                <span class="font-medium">What types of services are available?</span>
                                <i class="fas fa-chevron-down text-gray-400 transition-transform"></i>
                            </button>
                            <div id="faq3"
                                class="faq-content hidden px-4 py-3 bg-gray-50 border-t border-gray-200">
                                <p class="text-gray-600">
                                    QuickHands offers a wide range of services including home cleaning, furniture
                                    assembly, moving assistance, handyman services, lawn care, pet sitting, and much
                                    more. If you need help with a task, chances are we have a provider who can assist.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <button
                                class="faq-toggle w-full flex justify-between items-center px-4 py-3 bg-white hover:bg-gray-50 focus:outline-none"
                                data-target="faq4">
                                <span class="font-medium">How much does it cost to use QuickHands?</span>
                                <i class="fas fa-chevron-down text-gray-400 transition-transform"></i>
                            </button>
                            <div id="faq4"
                                class="faq-content hidden px-4 py-3 bg-gray-50 border-t border-gray-200">
                                <p class="text-gray-600">
                                    Creating an account and posting tasks is free. You only pay for the services you
                                    book. Service providers set their own rates, and we add a small service fee to help
                                    maintain the platform and provide customer support.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 5 -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <button
                                class="faq-toggle w-full flex justify-between items-center px-4 py-3 bg-white hover:bg-gray-50 focus:outline-none"
                                data-target="faq5">
                                <span class="font-medium">Is there a guarantee on the work performed?</span>
                                <i class="fas fa-chevron-down text-gray-400 transition-transform"></i>
                            </button>
                            <div id="faq5"
                                class="faq-content hidden px-4 py-3 bg-gray-50 border-t border-gray-200">
                                <p class="text-gray-600">
                                    Yes, we offer the QuickHands Guarantee. If you're not satisfied with the service
                                    provided, we'll work with you to make it right, which may include arranging for
                                    another service provider or providing a refund.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 6 -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <button
                                class="faq-toggle w-full flex justify-between items-center px-4 py-3 bg-white hover:bg-gray-50 focus:outline-none"
                                data-target="faq6">
                                <span class="font-medium">How do I pay for services?</span>
                                <i class="fas fa-chevron-down text-gray-400 transition-transform"></i>
                            </button>
                            <div id="faq6"
                                class="faq-content hidden px-4 py-3 bg-gray-50 border-t border-gray-200">
                                <p class="text-gray-600">
                                    All payments are processed securely through our platform. You can pay using
                                    credit/debit cards, PayPal, or other supported payment methods. Funds are only
                                    released to the service provider after you confirm the task has been completed
                                    satisfactorily.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="border rounded-lg overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d321.34926019883267!2d-2.9333420549827305!3d35.172332671844124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd77a7e65be2bd67%3A0x8ab5733c867557ea!2z2K_Yp9ixINin2YTYtNio2KfYqA!5e1!3m2!1sar!2sma!4v1743072891102!5m2!1sar!2sma"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
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

    <!-- JavaScript for FAQ Accordion -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqToggles = document.querySelectorAll('.faq-toggle');

            faqToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const content = document.getElementById(targetId);
                    const icon = this.querySelector('i');

                    // Toggle the content visibility
                    if (content.classList.contains('hidden')) {
                        content.classList.remove('hidden');
                        icon.classList.add('transform', 'rotate-180');
                    } else {
                        content.classList.add('hidden');
                        icon.classList.remove('transform', 'rotate-180');
                    }
                });
            });
        });
    </script>
</body>

</html>
