<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Hands - Join Our Community</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0056b3',
                        secondary: '#ff6b6b',
                        'light-bg': '#f8fafc'
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-light-bg">
    <!-- Navigation Bar -->
    <nav class="flex justify-between items-center px-6 py-4 bg-white shadow-sm">
        <div class="flex items-center">
            <a href="#" class="text-xl font-bold">
                <span class="text-primary">Quick</span>
                <span class="text-secondary">Hands</span>
            </a>
        </div>
        <div class="flex space-x-6">
            <a href="#" class="text-gray-700 hover:text-primary">Home</a>
            <a href="#" class="text-gray-700 hover:text-primary">About</a>
            <a href="#" class="text-gray-700 hover:text-primary">Contact</a>
            <a href="#" class="text-primary font-medium">Join Us</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 py-12">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <div class="flex justify-center mb-4">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-secondary" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" />
                    </svg>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Join Our Community</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Connect with local service providers and get things done faster than ever before.
            </p>
        </div>

        <!-- Two Columns Section -->
        <div class="grid md:grid-cols-2 gap-8 mb-12">
            <!-- For Customers -->
            <div class="bg-white p-6 rounded-lg border border-gray-200 relative">
                <div class="absolute top-6 left-0 w-1 h-[calc(100%-3rem)] bg-primary"></div>
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800">For Customers</h2>
                </div>
                <ul class="space-y-3 pl-2">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 mt-0.5 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-gray-600">Find local professionals for everyday tasks</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 mt-0.5 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-gray-600">Save time with quick service matching</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 mt-0.5 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-gray-600">Secure payments and verified providers</span>
                    </li>
                </ul>
            </div>

            <!-- For Providers -->
            <div class="bg-white p-6 rounded-lg border border-gray-200 relative">
                <div class="absolute top-6 left-0 w-1 h-[calc(100%-3rem)] bg-secondary"></div>
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-secondary" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800">For Providers</h2>
                </div>
                <ul class="space-y-3 pl-2">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary mr-2 mt-0.5 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-gray-600">Grow your client base in your local area</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-secondary mr-2 mt-0.5 flex-shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-gray-600">Set your own schedule and rates</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-secondary mr-2 mt-0.5 flex-shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-gray-600">Get paid quickly with secure transactions</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Tabs and Form Section -->
        <div class="max-w-xl mx-auto">
            <!-- Tabs -->
            <div class="flex border-b border-gray-200 mb-8">
                <button id="signup-tab" class="px-6 py-2 font-medium text-primary border-b-2 border-primary">Sign
                    Up</button>
                <button id="login-tab" class="px-6 py-2 font-medium text-gray-500 hover:text-gray-700">Log In</button>
            </div>

            <!-- Sign Up Form -->
            <div id="signup-form" class="bg-white p-8 rounded-lg shadow-sm">
                <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Create Your Account</h2>
                <p class="text-gray-600 text-center mb-6">
                    Join our community and start connecting with service providers.
                </p>

                <form action="{{ route('signup') }}" method="POST">
                    @csrf
                    <!-- Full Name -->
                    <div class="mb-4">
                        <label for="fullname" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input type="text" id="fullname" name="fullname" placeholder="John Doe"
                                class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary">
                        </div>
                        @error('fullname')
                            <div class="alert text-red-600 alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email
                            Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="email" id="email" name="email" placeholder="john@example.com"
                                class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary">
                        </div>
                        @error('email')
                            <div class="alert text-red-600 alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" placeholder="••••••••"
                                class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" id="toggle-password"
                                    class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @error('password')
                            <div class="alert text-red-600 alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- User Type -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">I am a</label>
                        <select name="role"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary bg-white">
                            <option value="user">User - I need services</option>
                            <option value="provider">Provider - I offer services</option>
                        </select>
                    </div>
                    <!-- Terms Agreement -->
                    <div class="mb-6">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" name="terms" type="checkbox"
                                    class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="text-gray-600">I agree to the <a href="#"
                                        class="text-primary hover:underline">Terms of Service</a> and <a
                                        href="#" class="text-primary hover:underline">Privacy Policy</a></label>
                            </div>
                        </div>
                        @error('terms')
                            <div class="alert text-red-600 alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Sign Up Button -->
                    <button type="submit"
                        class="w-full flex justify-center items-center px-4 py-2 bg-primary text-white font-medium rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Sign Up
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                    @if (session('done'))
                        <div class="alert text-green-600 alert-success">{{ session('done') }}</div>
                    @endif

                    <!-- Or Continue With -->
                    <div class="mt-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">or continue with</span>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-2 gap-3">
                            <div>
                                <a href="#"
                                    class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z" />
                                    </svg>
                                    <span class="ml-2">Google</span>
                                </a>
                            </div>

                            <div>
                                <a href="#"
                                    class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    <svg class="h-5 w-5 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                    <span class="ml-2">Facebook</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Already have an account -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Already have an account? <a href="#" id="login-link"
                                class="text-primary hover:underline">Log in</a>
                        </p>
                    </div>
                </form>
            </div>

            <!-- Login Form (Hidden by default) -->
            <div id="login-form" class="hidden bg-white p-8 rounded-lg shadow-sm">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Log In to Your Account</h2>
                <form>
                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="login-email" class="block text-sm font-medium text-gray-700 mb-1">Email
                            Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="email" id="login-email" name="email" placeholder="john@example.com"
                                class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="login-password"
                            class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" id="login-password" name="password" placeholder="••••••••"
                                class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary">
                        </div>
                    </div>

                    <!-- Log In Button -->
                    <button type="submit"
                        class="w-full flex justify-center items-center px-4 py-2 bg-primary text-white font-medium rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Log In
                    </button>

                    <!-- Don't have an account -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Don't have an account? <a href="#" id="signup-link"
                                class="text-primary hover:underline">Sign up</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </main>
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


    <script>
        // Password toggle functionality
        document.addEventListener('DOMContentLoaded', () => {
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('toggle-password');

            togglePassword.addEventListener('click', () => {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle eye icon
                const eyeOpenPath = document.getElementById('eye-open');
                const eyeClosedPath = document.getElementById('eye-closed');
                eyeOpenPath.classList.toggle('hidden');
                eyeClosedPath.classList.toggle('hidden');
            });
        });
        // Tab switching functionality
        const signupTab = document.getElementById('signup-tab');
        const loginTab = document.getElementById('login-tab');
        const signupForm = document.getElementById('signup-form');
        const loginForm = document.getElementById('login-form');
        const signupLink = document.getElementById('signup-link');
        const loginLink = document.getElementById('login-link');

        function showSignup() {
            signupForm.classList.remove('hidden');
            loginForm.classList.add('hidden');
            signupTab.classList.add('text-primary', 'border-b-2', 'border-primary');
            signupTab.classList.remove('text-gray-500');
            loginTab.classList.remove('text-primary', 'border-b-2', 'border-primary');
            loginTab.classList.add('text-gray-500');
        }

        function showLogin() {
            loginForm.classList.remove('hidden');
            signupForm.classList.add('hidden');
            loginTab.classList.add('text-primary', 'border-b-2', 'border-primary');
            loginTab.classList.remove('text-gray-500');
            signupTab.classList.remove('text-primary', 'border-b-2', 'border-primary');
            signupTab.classList.add('text-gray-500');
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
    </script>
</body>

</html>
