<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Hands - Local Services On Demand</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0066CC',
                        secondary: '#F8FAFC',
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer components {
            .btn-primary {
                @apply bg-primary text-white px-6 py-3 rounded-md font-medium hover:bg-blue-700 transition duration-300;
            }

            .btn-secondary {
                @apply bg-white text-primary px-6 py-3 rounded-md font-medium hover:bg-gray-100 transition duration-300;
            }
        }

        .bg-bubble {
            position: absolute;
            border-radius: 50%;
            background-color: #f1f5f9;
            z-index: -1;
        }

        .toggle-switch:checked+.toggle-label {
            background-color: #0066CC;
        }
    </style>
</head>

<body class="font-sans text-gray-800 overflow-x-hidden">
    <!-- Background Bubbles -->
    <div class="bg-bubble w-96 h-96 top-0 right-0 opacity-50"></div>
    <div class="bg-bubble w-64 h-64 bottom-40 left-20 opacity-30"></div>

    <!-- Header -->
    <header class="container mx-auto px-4 py-6 flex justify-between items-center">
        <div class="flex items-center">
            <a href="#" class="text-primary font-bold text-xl">Quick <span class="text-[#FF6F61]">Hands</span></a>
        </div>
        <nav class="hidden md:flex space-x-8">
            <a href="#" class="text-blue-600 font-medium">Home</a>
            <a href="#" class="text-gray-600 hover:text-blue-600 transition">About</a>
            <a href="#" class="text-gray-600 hover:text-blue-600 transition">Contact</a>
            <a href="#" class="text-gray-600 hover:text-blue-600 transition">Join Us</a>
        </nav>
        <button class="md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </header>

    <!-- Hero Section -->
    <section class="container mx-auto px-4 py-12 md:py-20 relative">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <p class="text-sm font-semibold text-gray-600 mb-2">LOCAL SERVICES, ON DEMAND</p>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Your Tasks, <br><span class="text-primary">Our
                        Hands</span></h1>
                <p class="text-gray-600 mb-8 max-w-md">Connect with trusted local service providers for all your
                    everyday tasks. From home maintenance to specialized services, we've got you covered.</p>
                <div class="flex space-x-4">
                    <button class="btn-primary flex items-center">
                        Get Started
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button class="btn-secondary">Learn More</button>
                </div>
            </div>
            <div class="md:w-1/2">
                <div class="relative">
                    <div class="bg-white rounded-xl shadow-lg p-4">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSps42uVZ1yJ7End4CYzlqR8uqwlLnVjjH9A&s"
                            alt="People working together" class="rounded-lg w-full h-48 object-cover mb-6">

                        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="font-medium">Home Cleaning</h3>
                                    <p class="text-primary font-semibold mt-1">$75/hr</p>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-xs text-green-500 mr-2">Available Today</span>
                                    <div class="relative inline-block w-10 mr-2 align-middle">
                                        <input type="checkbox" id="toggle" class="toggle-switch sr-only" checked />
                                        <label for="toggle"
                                            class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer transition-colors duration-200 ease-in"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-16">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400 animate-bounce" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section class="container mx-auto px-4 py-16 md:py-24">
        <h2 class="text-3xl font-bold text-center mb-4">What Makes QuickHands Different</h2>
        <p class="text-gray-600 text-center mb-12 max-w-2xl mx-auto">
            Our platform is designed with simplicity and efficiency in mind, connecting you with trusted local
            professionals for all your everyday needs.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="text-center">
                <div class="bg-blue-50 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-clock text-primary"></i>
                </div>
                <h3 class="font-semibold mb-2">Quick Response</h3>
                <p class="text-gray-600 text-sm">Get connected with service providers within minutes of placing your
                    request.</p>
            </div>

            <!-- Feature 2 -->
            <div class="text-center">
                <div class="bg-green-50 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-check-circle text-green-500"></i>
                </div>
                <h3 class="font-semibold mb-2">Vetted Professionals</h3>
                <p class="text-gray-600 text-sm">All service providers are background-checked and skill-verified.</p>
            </div>

            <!-- Feature 3 -->
            <div class="text-center">
                <div class="bg-purple-50 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-search text-purple-500"></i>
                </div>
                <h3 class="font-semibold mb-2">Find Anything</h3>
                <p class="text-gray-600 text-sm">From plumbing to tutoring, find the service you need locally.</p>
            </div>

            <!-- Feature 4 -->
            <div class="text-center">
                <div class="bg-orange-50 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-star text-orange-500"></i>
                </div>
                <h3 class="font-semibold mb-2">Transparent Reviews</h3>
                <p class="text-gray-600 text-sm">Read real reviews from verified customers before booking.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="container mx-auto px-4 py-16 md:py-24">
        <h2 class="text-3xl font-bold text-center mb-4">What Our Users Say</h2>
        <p class="text-gray-600 text-center mb-12 max-w-2xl mx-auto">
            Don't just take our word for it. Here's what people in our community have to say about QuickHands.
        </p>

        <div class="relative max-w-3xl mx-auto">
            <!-- Testimonial Carousel -->
            <div class="testimonial-carousel">
                <!-- Testimonial 1 -->
                <div class="testimonial-slide bg-white rounded-lg p-8 shadow-md">
                    <div class="flex justify-center mb-4">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-center text-gray-700 italic mb-6">"QuickHands has changed the way I manage household
                        tasks. I found a reliable plumber within minutes of posting my job."</p>
                    <div class="flex items-center justify-center">
                        <div class="w-10 h-10 rounded-full bg-gray-300 mr-3 overflow-hidden">
                            <img src="https://www.celebrity-cutouts.co.uk/wp-content/uploads/2020/02/lionel-messi-mouth-open-celebrity-mask.jpg"
                                alt="Sarah Johnson" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-medium">Leo Messi</h4>
                            <p class="text-sm text-gray-500">Football player</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel Controls -->
            <button
                class="absolute top-1/2 -left-4 transform -translate-y-1/2 bg-white rounded-full w-10 h-10 shadow-md flex items-center justify-center">
                <i class="fas fa-chevron-left text-gray-400"></i>
            </button>
            <button
                class="absolute top-1/2 -right-4 transform -translate-y-1/2 bg-white rounded-full w-10 h-10 shadow-md flex items-center justify-center">
                <i class="fas fa-chevron-right text-gray-400"></i>
            </button>
        </div>

        <!-- Carousel Dots -->
        <div class="flex justify-center mt-8 space-x-2">
            <button class="w-2 h-2 rounded-full bg-primary"></button>
            <button class="w-2 h-2 rounded-full bg-gray-300"></button>
            <button class="w-2 h-2 rounded-full bg-gray-300"></button>
            <button class="w-2 h-2 rounded-full bg-gray-300"></button>
        </div>
    </section>

    <script>
        // Toggle switch functionality
        document.getElementById('toggle').addEventListener('change', function() {
            // Add toggle functionality here
        });

        // Mobile menu toggle
        document.querySelector('header button').addEventListener('click', function() {
            // Add mobile menu toggle functionality here
        });

        // Testimonial carousel functionality could be added here
        // For a real implementation, you might want to use a library like Swiper.js
    </script>
</body>

</html>
