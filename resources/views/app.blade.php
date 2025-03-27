<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Your Tasks, Our Hands</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans">
    <!-- Navbar -->
    <nav class="flex justify-between items-center p-4 bg-white shadow-md">
        <div class="flex items-center">
            <span class="text-2xl font-bold text-blue-600">QuickHands</span>
        </div>
        <div class="space-x-4">
            <a href="#" class="text-gray-700 hover:text-blue-600">Home</a>
            <a href="#" class="text-gray-700 hover:text-blue-600">About</a>
            <a href="#" class="text-gray-700 hover:text-blue-600">Contact</a>
            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Join Us</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="flex items-center p-12 bg-gray-50">
        <div class="w-1/2 pr-8">
            <h1 class="text-4xl font-bold mb-4">Your Tasks, Our Hands</h1>
            <p class="text-gray-600 mb-6">Contract with trusted local workers for all your everyday tasks. From home
                maintenance to specialized services, we've got you covered.</p>
            <div class="flex space-x-4">
                <button class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700">Get Started</button>
                <button class="border border-blue-600 text-blue-600 px-6 py-3 rounded hover:bg-blue-50">Learn
                    More</button>
            </div>
        </div>
        <div class="w-1/2">
            <img src="/api/placeholder/600/400" alt="Working Together" class="rounded-lg shadow-lg">
        </div>
    </div>

    <!-- Differentiators Section -->
    <div class="p-12 bg-white text-center">
        <h2 class="text-3xl font-bold mb-8">What Makes QuickHands Different</h2>
        <div class="flex justify-between space-x-6">
            <div class="flex-1 p-6 bg-gray-50 rounded-lg shadow-md">
                <div class="w-16 h-16 bg-blue-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                    </svg>
                </div>
                <h3 class="font-bold mb-2">Quick Response</h3>
                <p class="text-gray-600">Get quick help within minutes, not hours.</p>
            </div>
            <div class="flex-1 p-6 bg-gray-50 rounded-lg shadow-md">
                <div class="w-16 h-16 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 12a1 1 0 11-2 0v-5a1 1 0 112 0v5zm-1-8a1 1 0 100 2 1 1 0 000-2z" />
                    </svg>
                </div>
                <h3 class="font-bold mb-2">Vetted Professionals</h3>
                <p class="text-gray-600">Trusted and background-checked service providers.</p>
            </div>
            <div class="flex-1 p-6 bg-gray-50 rounded-lg shadow-md">
                <div class="w-16 h-16 bg-purple-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="font-bold mb-2">Find Anything</h3>
                <p class="text-gray-600">Any service you're looking for, we've got you covered.</p>
            </div>
            <div class="flex-1 p-6 bg-gray-50 rounded-lg shadow-md">
                <div class="w-16 h-16 bg-yellow-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-8 h-8 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                        <path fill-rule="evenodd"
                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="font-bold mb-2">Transparent Reviews</h3>
                <p class="text-gray-600">Read honest feedback before booking services.</p>
            </div>
        </div>
    </div>

    <!-- User Testimonials Section -->
    <div class="p-12 bg-gray-50 text-center">
        <h2 class="text-3xl font-bold mb-8">What Our Users Say</h2>
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <div class="text-yellow-400 text-2xl mb-4">★★★★★</div>
            <p class="text-gray-600 italic mb-4">"QuickHands has changed the way I manage household tasks. I found a
                reliable platform with professional services at my fingertips."</p>
            <div class="flex items-center justify-center">
                <img src="/api/placeholder/50/50" alt="User" class="rounded-full mr-4">
                <span class="font-semibold">Sarah Johnson</span>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white p-8 border-t">
        <div class="container mx-auto flex justify-between">
            <div>
                <span class="text-xl font-bold text-blue-600">QuickHands</span>
                <div class="mt-4 space-x-4">
                    <a href="#" class="text-gray-600 hover:text-blue-600">About</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600">Contact</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600">Services</a>
                </div>
            </div>
            <div>
                <p class="text-gray-600">© 2025 QuickHands. All rights reserved.</p>
                <div class="mt-4 flex space-x-4">
                    <a href="#" class="text-gray-600 hover:text-blue-600">Facebook</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600">Twitter</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600">LinkedIn</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
