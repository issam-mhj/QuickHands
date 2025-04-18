<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Available Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
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
                        'dark-blue': '#2C3E50',
                        'light-blue': '#3498DB',
                        'success': '#2ECC71',
                        'warning': '#F39C12',
                        'danger': '#E74C3C',
                        'info': '#3498DB',
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        display: ['Clash Display', 'sans-serif'],
                    },
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom Styles */
        .dashboard-card {
            @apply bg-white rounded-2xl p-6 shadow-lg transition-all duration-300 hover:shadow-xl border border-gray-100;
            transform-origin: center;
        }

        .dashboard-card:hover {
            @apply transform scale-[1.01];
        }

        .gradient-border {
            position: relative;
            border-radius: 1rem;
            background: white;
        }

        .gradient-border::before {
            content: "";
            position: absolute;
            inset: -2px;
            border-radius: 1.1rem;
            background: linear-gradient(135deg, #FF6B6B, #4ECDC4);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gradient-border:hover::before {
            opacity: 1;
        }

        .task-card {
            @apply relative overflow-hidden rounded-2xl p-6 transition-all duration-300 bg-white border border-gray-100 shadow-sm hover:shadow-md;
        }

        .task-card:hover {
            @apply transform scale-[1.01];
        }

        .task-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
            z-index: 1;
        }

        .task-card .task-icon {
            @apply absolute right-4 bottom-4 text-4xl opacity-20;
            z-index: 0;
        }

        /* Custom Animations */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .float {
            animation: float 6s ease-in-out infinite;
        }

        .float-delay-1 {
            animation-delay: 1s;
        }

        .float-delay-2 {
            animation-delay: 2s;
        }

        .float-delay-3 {
            animation-delay: 3s;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #FF6B6B;
        }

        /* Tooltip */
        .tooltip {
            @apply invisible absolute;
            width: max-content;
        }

        .has-tooltip:hover .tooltip {
            @apply visible z-50;
        }

        /* Pulse Animation */
        .pulse-dot {
            position: relative;
        }

        .pulse-dot::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: inherit;
            border-radius: inherit;
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(1.5);
            }
        }

        /* Glow Effect */
        .glow-on-hover {
            position: relative;
            z-index: 1;
        }

        .glow-on-hover::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.8) 0%, rgba(255, 255, 255, 0) 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
            border-radius: inherit;
        }

        .glow-on-hover:hover::after {
            opacity: 1;
        }

        /* Range Slider */
        input[type="range"] {
            -webkit-appearance: none;
            width: 100%;
            height: 6px;
            border-radius: 5px;
            background: #e5e7eb;
            outline: none;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #FF6B6B;
            cursor: pointer;
            border: 2px solid white;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1);
        }

        input[type="range"]::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #FF6B6B;
            cursor: pointer;
            border: 2px solid white;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1);
        }

        /* Modal */
        .modal-backdrop {
            @apply fixed inset-0 bg-black bg-opacity-50 z-40 flex items-center justify-center;
            backdrop-filter: blur(4px);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal-backdrop.show {
            opacity: 1;
        }

        .modal-content {
            @apply bg-white rounded-2xl shadow-xl w-full max-w-3xl max-h-[90vh] overflow-y-auto;
            transform: scale(0.9);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .modal-backdrop.show .modal-content {
            transform: scale(1);
            opacity: 1;
        }

        /* Checkbox */
        .custom-checkbox {
            @apply relative flex items-center;
        }

        .custom-checkbox input[type="checkbox"] {
            @apply absolute opacity-0 w-0 h-0;
        }

        .custom-checkbox .checkmark {
            @apply w-5 h-5 rounded border border-gray-300 flex items-center justify-center;
            transition: all 0.2s ease;
        }

        .custom-checkbox input[type="checkbox"]:checked~.checkmark {
            @apply bg-primary border-primary;
        }

        .custom-checkbox .checkmark:after {
            content: '';
            @apply w-2 h-2 bg-white rounded-sm;
            opacity: 0;
            transform: scale(0);
            transition: all 0.2s ease;
        }

        .custom-checkbox input[type="checkbox"]:checked~.checkmark:after {
            opacity: 1;
            transform: scale(1);
        }
    </style>
</head>

<body class="font-sans bg-gray-50 text-dark">
    <!-- Header -->
    <header class="bg-gradient-to-r from-primary/10 to-secondary/10 py-8 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-xl bg-white shadow-md flex items-center justify-center mr-4">
                            <i class="fas fa-hands-helping text-primary text-xl"></i>
                        </div>
                        <h1 class="font-display text-2xl font-bold">QuickHands</h1>
                    </div>
                    <p class="text-gray-600 mt-1">Provider Dashboard</p>
                </div>

                <div class="mt-4 md:mt-0 flex items-center space-x-4">
                    <div class="relative">
                        <button
                            class="p-2 bg-white rounded-full shadow-sm text-gray-500 hover:text-primary transition-colors">
                            <i class="fas fa-bell"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-primary rounded-full pulse-dot"></span>
                        </button>
                    </div>

                    <div class="relative">
                        <button
                            class="p-2 bg-white rounded-full shadow-sm text-gray-500 hover:text-primary transition-colors">
                            <i class="fas fa-envelope"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-primary rounded-full pulse-dot"></span>
                        </button>
                    </div>

                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Provider"
                            class="w-10 h-10 rounded-full border-2 border-white shadow-sm">
                        <div class="ml-3">
                            <p class="font-medium">Michael Rodriguez</p>
                            <p class="text-xs text-gray-500">Professional Handyman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="sticky top-0 z-30 bg-white shadow-md py-4 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between overflow-x-auto hide-scrollbar">
                <div class="flex space-x-1 md:space-x-4">
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-chart-line mr-2"></i> Dashboard
                    </a>
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg bg-primary text-white font-medium text-sm md:text-base">
                        <i class="fas fa-tasks mr-2"></i> Available Tasks
                    </a>
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-clipboard-list mr-2"></i> Task Management
                    </a>
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-dollar-sign mr-2"></i> Earnings
                    </a>
                </div>

                <div class="hidden md:flex space-x-2">
                    <a href="#"
                        class="px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors">
                        <i class="fas fa-star mr-2"></i> Reviews
                    </a>
                    <a href="#"
                        class="px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors">
                        <i class="fas fa-user-circle mr-2"></i> Profile
                    </a>
                    <a href="#"
                        class="px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors">
                        <i class="fas fa-question-circle mr-2"></i> Help
                    </a>
                </div>

                <div class="md:hidden">
                    <button class="p-2 rounded-lg hover:bg-gray-100 text-gray-700">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 md:px-12 py-8">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
            <div>
                <h2 class="font-display text-2xl md:text-3xl font-bold">Available Tasks</h2>
                <p class="text-gray-600">Browse and bid on tasks that match your skills</p>
            </div>

            <div class="mt-4 md:mt-0">
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-500">Sort by:</span>
                    <select
                        class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/20">
                        <option>Newest First</option>
                        <option>Highest Budget</option>
                        <option>Closest Location</option>
                        <option>Soonest Deadline</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Search and Filters -->
        <section class="mb-8">
            <div class="dashboard-card gradient-border">
                <div class="flex flex-col lg:flex-row lg:items-center gap-6">
                    <!-- Search Bar -->
                    <div class="lg:flex-1">
                        <div class="relative">
                            <input type="text" placeholder="Search tasks by keyword (e.g., plumbing, delivery)"
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20">
                            <i
                                class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Filter Button -->
                    <div>
                        <button id="filterToggle"
                            class="w-full lg:w-auto px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center justify-center">
                            <i class="fas fa-filter mr-2"></i> Filters
                            <span
                                class="ml-2 w-5 h-5 rounded-full bg-primary text-white text-xs flex items-center justify-center">3</span>
                        </button>
                    </div>

                    <!-- View Toggle -->
                    <div class="flex rounded-xl overflow-hidden border border-gray-200">
                        <button class="px-4 py-2 bg-primary text-white flex items-center justify-center">
                            <i class="fas fa-th-large"></i>
                        </button>
                        <button
                            class="px-4 py-2 bg-white text-gray-700 hover:bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>

                <!-- Expanded Filters -->
                <div id="filterPanel" class="mt-6 pt-6 border-t border-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Task Type Filter -->
                        <div>
                            <label class="block text-sm font-medium mb-2">Task Type</label>
                            <div class="space-y-2">
                                <label class="custom-checkbox flex items-center">
                                    <input type="checkbox" checked>
                                    <span class="checkmark mr-2"></span>
                                    <span class="text-sm">Handyman</span>
                                </label>
                                <label class="custom-checkbox flex items-center">
                                    <input type="checkbox" checked>
                                    <span class="checkmark mr-2"></span>
                                    <span class="text-sm">Plumbing</span>
                                </label>
                                <label class="custom-checkbox flex items-center">
                                    <input type="checkbox" checked>
                                    <span class="checkmark mr-2"></span>
                                    <span class="text-sm">Electrical</span>
                                </label>
                                <label class="custom-checkbox flex items-center">
                                    <input type="checkbox">
                                    <span class="checkmark mr-2"></span>
                                    <span class="text-sm">Moving</span>
                                </label>
                                <label class="custom-checkbox flex items-center">
                                    <input type="checkbox">
                                    <span class="checkmark mr-2"></span>
                                    <span class="text-sm">Cleaning</span>
                                </label>
                            </div>
                        </div>

                        <!-- Location Filter -->
                        <div>
                            <label class="block text-sm font-medium mb-2">Location</label>
                            <select
                                class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/20">
                                <option>All Locations</option>
                                <option>Within 5 miles</option>
                                <option>Within 10 miles</option>
                                <option>Within 20 miles</option>
                                <option>Within 50 miles</option>
                            </select>
                            <div class="mt-3">
                                <label class="custom-checkbox flex items-center">
                                    <input type="checkbox">
                                    <span class="checkmark mr-2"></span>
                                    <span class="text-sm">Only show tasks in my service areas</span>
                                </label>
                            </div>
                        </div>

                        <!-- Budget Range Filter -->
                        <div>
                            <label class="block text-sm font-medium mb-2">Budget Range</label>
                            <div class="space-y-4">
                                <div>
                                    <input type="range" min="0" max="500" value="50"
                                        class="w-full" id="minBudgetSlider">
                                    <div class="flex justify-between mt-1">
                                        <span class="text-xs text-gray-500">$0</span>
                                        <span class="text-xs text-gray-500">$500+</span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-sm mr-2">Min Budget:</span>
                                    <div class="relative">
                                        <span
                                            class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">$</span>
                                        <input type="number" value="50" min="0" max="500"
                                            class="w-24 pl-7 pr-2 py-1 border border-gray-200 rounded-lg text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Date Filter -->
                        <div>
                            <label class="block text-sm font-medium mb-2">Task Deadline</label>
                            <select
                                class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/20">
                                <option>Any Time</option>
                                <option>Today</option>
                                <option>This Week</option>
                                <option>This Month</option>
                                <option>Custom Range</option>
                            </select>
                            <div class="mt-3">
                                <label class="custom-checkbox flex items-center">
                                    <input type="checkbox">
                                    <span class="checkmark mr-2"></span>
                                    <span class="text-sm">Urgent tasks only</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex flex-col sm:flex-row sm:justify-between items-center">
                        <div class="mb-3 sm:mb-0">
                            <span class="text-sm text-gray-500">3 filters applied</span>
                            <button class="ml-2 text-primary hover:underline text-sm">Clear All</button>
                        </div>
                        <div class="flex space-x-3">
                            <button
                                class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                                Cancel
                            </button>
                            <button
                                class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                                Apply Filters
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Task Results -->
        <section class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-display text-xl font-semibold">24 Tasks Found</h3>
                <span class="text-sm text-gray-500">Showing 1-12 of 24</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Task Card 1 -->
                <div class="task-card">
                    <div class="flex justify-between items-start mb-3">
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">New • 2h ago</span>
                        <div class="flex space-x-1">
                            <button
                                class="p-1.5 bg-gray-100 hover:bg-gray-200 rounded-full text-gray-600 transition-colors">
                                <i class="fas fa-bookmark"></i>
                            </button>
                            <button
                                class="p-1.5 bg-gray-100 hover:bg-gray-200 rounded-full text-gray-600 transition-colors">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>

                    <h4 class="text-lg font-semibold mb-1">Leaky Faucet Repair</h4>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        <span>Downtown, 2.3 miles away</span>
                    </div>

                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Client"
                            class="w-8 h-8 rounded-full mr-2">
                        <div>
                            <p class="text-sm font-medium">Jennifer L.</p>
                            <div class="flex items-center">
                                <div class="flex text-xs text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="text-xs text-gray-500 ml-1">(4.8)</span>
                            </div>
                        </div>
                    </div>

                    <p class="text-sm text-gray-600 mb-4 line-clamp-2">Kitchen sink has a slow drip that needs fixing.
                        Already purchased replacement parts, just need installation.</p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Plumbing</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Quick Fix</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">1-2 hours</span>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div>
                            <p class="text-sm text-gray-500">Budget</p>
                            <p class="font-semibold">$75 - $100</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Due Date</p>
                            <p class="font-semibold">Tomorrow</p>
                        </div>
                        <button
                            class="px-3 py-1.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors text-sm"
                            onclick="openTaskModal('task1')">
                            Place Bid
                        </button>
                    </div>

                    <i class="fas fa-wrench task-icon text-gray-100"></i>
                </div>

                <!-- Task Card 2 -->
                <div class="task-card">
                    <div class="flex justify-between items-start mb-3">
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">New • 5h ago</span>
                        <div class="flex space-x-1">
                            <button
                                class="p-1.5 bg-gray-100 hover:bg-gray-200 rounded-full text-gray-600 transition-colors">
                                <i class="fas fa-bookmark"></i>
                            </button>
                            <button
                                class="p-1.5 bg-gray-100 hover:bg-gray-200 rounded-full text-gray-600 transition-colors">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>

                    <h4 class="text-lg font-semibold mb-1">TV Mounting - 65" OLED</h4>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        <span>Westside, 4.7 miles away</span>
                    </div>

                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Client"
                            class="w-8 h-8 rounded-full mr-2">
                        <div>
                            <p class="text-sm font-medium">Robert T.</p>
                            <div class="flex items-center">
                                <div class="flex text-xs text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="text-xs text-gray-500 ml-1">(5.0)</span>
                            </div>
                        </div>
                    </div>

                    <p class="text-sm text-gray-600 mb-4 line-clamp-2">Need to mount a new 65" OLED TV on drywall. Have
                        the mount already. Would like cables concealed if possible.</p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Handyman</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">TV Mounting</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">2-3 hours</span>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div>
                            <p class="text-sm text-gray-500">Budget</p>
                            <p class="font-semibold">$120 - $150</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Due Date</p>
                            <p class="font-semibold">This Weekend</p>
                        </div>
                        <button
                            class="px-3 py-1.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors text-sm"
                            onclick="openTaskModal('task2')">
                            Place Bid
                        </button>
                    </div>

                    <i class="fas fa-tv task-icon text-gray-100"></i>
                </div>

                <!-- Task Card 3 -->
                <div class="task-card">
                    <div class="flex justify-between items-start mb-3">
                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Urgent • 1d
                            ago</span>
                        <div class="flex space-x-1">
                            <button
                                class="p-1.5 bg-gray-100 hover:bg-gray-200 rounded-full text-gray-600 transition-colors">
                                <i class="fas fa-bookmark"></i>
                            </button>
                            <button
                                class="p-1.5 bg-gray-100 hover:bg-gray-200 rounded-full text-gray-600 transition-colors">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>

                    <h4 class="text-lg font-semibold mb-1">Ceiling Fan Installation</h4>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        <span>North Hills, 1.8 miles away</span>
                    </div>

                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/22.jpg" alt="Client"
                            class="w-8 h-8 rounded-full mr-2">
                        <div>
                            <p class="text-sm font-medium">Maria G.</p>
                            <div class="flex items-center">
                                <div class="flex text-xs text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <span class="text-xs text-gray-500 ml-1">(4.0)</span>
                            </div>
                        </div>
                    </div>

                    <p class="text-sm text-gray-600 mb-4 line-clamp-2">Need to replace old ceiling fan with new one in
                        master bedroom. Have the new fan ready for installation.</p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Electrical</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Installation</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">1-2 hours</span>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div>
                            <p class="text-sm text-gray-500">Budget</p>
                            <p class="font-semibold">$80 - $120</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Due Date</p>
                            <p class="font-semibold">Today</p>
                        </div>
                        <button
                            class="px-3 py-1.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors text-sm"
                            onclick="openTaskModal('task3')">
                            Place Bid
                        </button>
                    </div>

                    <i class="fas fa-fan task-icon text-gray-100"></i>
                </div>

                <!-- Task Card 4 -->
                <div class="task-card">
                    <div class="flex justify-between items-start mb-3">
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">1d ago</span>
                        <div class="flex space-x-1">
                            <button
                                class="p-1.5 bg-gray-100 hover:bg-gray-200 rounded-full text-gray-600 transition-colors">
                                <i class="fas fa-bookmark"></i>
                            </button>
                            <button
                                class="p-1.5 bg-gray-100 hover:bg-gray-200 rounded-full text-gray-600 transition-colors">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>

                    <h4 class="text-lg font-semibold mb-1">Furniture Assembly - IKEA</h4>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        <span>Eastwood, 3.5 miles away</span>
                    </div>

                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/33.jpg" alt="Client"
                            class="w-8 h-8 rounded-full mr-2">
                        <div>
                            <p class="text-sm font-medium">David K.</p>
                            <div class="flex items-center">
                                <div class="flex text-xs text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="text-xs text-gray-500 ml-1">(4.5)</span>
                            </div>
                        </div>
                    </div>

                    <p class="text-sm text-gray-600 mb-4 line-clamp-2">Need help assembling IKEA furniture: 1
                        bookshelf, 1 desk, and 2 chairs. All items are still in boxes.</p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Handyman</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Furniture</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">3-4 hours</span>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div>
                            <p class="text-sm text-gray-500">Budget</p>
                            <p class="font-semibold">$150 - $200</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Due Date</p>
                            <p class="font-semibold">This Week</p>
                        </div>
                        <button
                            class="px-3 py-1.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors text-sm"
                            onclick="openTaskModal('task4')">
                            Place Bid
                        </button>
                    </div>

                    <i class="fas fa-couch task-icon text-gray-100"></i>
                </div>

                <!-- Task Card 5 -->
                <div class="task-card">
                    <div class="flex justify-between items-start mb-3">
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">2d ago</span>
                        <div class="flex space-x-1">
                            <button
                                class="p-1.5 bg-gray-100 hover:bg-gray-200 rounded-full text-gray-600 transition-colors">
                                <i class="fas fa-bookmark"></i>
                            </button>
                            <button
                                class="p-1.5 bg-gray-100 hover:bg-gray-200 rounded-full text-gray-600 transition-colors">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>

                    <h4 class="text-lg font-semibold mb-1">Bathroom Sink Clog</h4>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        <span>South Bay, 5.2 miles away</span>
                    </div>

                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/56.jpg" alt="Client"
                            class="w-8 h-8 rounded-full mr-2">
                        <div>
                            <p class="text-sm font-medium">Patricia H.</p>
                            <div class="flex items-center">
                                <div class="flex text-xs text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <span class="text-xs text-gray-500 ml-1">(4.0)</span>
                            </div>
                        </div>
                    </div>

                    <p class="text-sm text-gray-600 mb-4 line-clamp-2">Bathroom sink is completely clogged. Water won't
                        drain at all. Tried liquid drain cleaner with no success.</p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Plumbing</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Repair</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">1 hour</span>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div>
                            <p class="text-sm text-gray-500">Budget</p>
                            <p class="font-semibold">$60 - $90</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Due Date</p>
                            <p class="font-semibold">Tomorrow</p>
                        </div>
                        <button
                            class="px-3 py-1.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors text-sm"
                            onclick="openTaskModal('task5')">
                            Place Bid
                        </button>
                    </div>

                    <i class="fas fa-sink task-icon text-gray-100"></i>
                </div>

                <!-- Task Card 6 -->
                <div class="task-card">
                    <div class="flex justify-between items-start mb-3">
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">2d ago</span>
                        <div class="flex space-x-1">
                            <button
                                class="p-1.5 bg-gray-100 hover:bg-gray-200 rounded-full text-gray-600 transition-colors">
                                <i class="fas fa-bookmark"></i>
                            </button>
                            <button
                                class="p-1.5 bg-gray-100 hover:bg-gray-200 rounded-full text-gray-600 transition-colors">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>

                    <h4 class="text-lg font-semibold mb-1">Light Fixture Replacement</h4>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        <span>Downtown, 1.5 miles away</span>
                    </div>

                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/78.jpg" alt="Client"
                            class="w-8 h-8 rounded-full mr-2">
                        <div>
                            <p class="text-sm font-medium">Thomas B.</p>
                            <div class="flex items-center">
                                <div class="flex text-xs text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="text-xs text-gray-500 ml-1">(5.0)</span>
                            </div>
                        </div>
                    </div>

                    <p class="text-sm text-gray-600 mb-4 line-clamp-2">Need to replace dining room chandelier with new
                        pendant light fixture. Have the new fixture ready to install.</p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Electrical</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Installation</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">1-2 hours</span>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div>
                            <p class="text-sm text-gray-500">Budget</p>
                            <p class="font-semibold">$90 - $120</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Due Date</p>
                            <p class="font-semibold">This Weekend</p>
                        </div>
                        <button
                            class="px-3 py-1.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors text-sm"
                            onclick="openTaskModal('task6')">
                            Place Bid
                        </button>
                    </div>

                    <i class="fas fa-lightbulb task-icon text-gray-100"></i>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                <nav class="flex items-center space-x-1">
                    <button class="p-2 rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button
                        class="w-10 h-10 rounded-lg bg-primary text-white flex items-center justify-center">1</button>
                    <button
                        class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 flex items-center justify-center">2</button>
                    <button
                        class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 flex items-center justify-center">3</button>
                    <span class="w-10 h-10 flex items-center justify-center">...</span>
                    <button class="p-2 rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </nav>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div class="mb-4 md:mb-0">
                    <p class="text-sm text-gray-500">© 2023 QuickHands. All rights reserved.</p>
                </div>

                <div class="flex space-x-4">
                    <a href="#" class="text-sm text-gray-500 hover:text-primary">Help Center</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-primary">Privacy Policy</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-primary">Terms of Service</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-primary">Contact Support</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Task Detail Modal -->
    <div id="taskModal" class="modal-backdrop hidden">
        <div class="modal-content">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-display text-2xl font-bold">Task Details</h3>
                    <button class="p-2 hover:bg-gray-100 rounded-full" onclick="closeTaskModal()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div id="taskModalContent">
                    <!-- Content will be dynamically inserted here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Filter toggle
            const filterToggle = document.getElementById('filterToggle');
            const filterPanel = document.getElementById('filterPanel');

            filterToggle.addEventListener('click', function() {
                filterPanel.classList.toggle('hidden');
            });

            // Animate elements on load
            const animateElements = () => {
                gsap.fromTo('.task-card', {
                    opacity: 0,
                    y: 30
                }, {
                    opacity: 1,
                    y: 0,
                    duration: 0.6,
                    stagger: 0.1,
                    ease: "power2.out"
                });
            };

            // Run animations
            animateElements();
        });

        // Task Modal Functions
        function openTaskModal(taskId) {
            const modal = document.getElementById('taskModal');
            const modalContent = document.getElementById('taskModalContent');

            // Set content based on task ID
            if (taskId === 'task1') {
                modalContent.innerHTML = `
          <div class="mb-6">
            <div class="flex items-center mb-4">
              <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Client" class="w-12 h-12 rounded-full mr-3">
              <div>
                <h5 class="font-medium">Jennifer L.</h5>
                <div class="flex items-center">
                  <div class="flex text-yellow-400">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                  </div>
                  <span class="text-sm text-gray-500 ml-1">(4.8)</span>
                </div>
              </div>
              <span class="ml-auto px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">New • 2h ago</span>
            </div>

            <h4 class="text-xl font-semibold mb-2">Leaky Faucet Repair</h4>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-map-marker-alt mr-1"></i>
              <span>Downtown, 2.3 miles away</span>
            </div>

            <div class="flex flex-wrap gap-2 mb-4">
              <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Plumbing</span>
              <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Quick Fix</span>
              <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">1-2 hours</span>
            </div>

            <div class="bg-gray-50 p-4 rounded-xl mb-4">
              <h5 class="font-medium mb-2">Task Description</h5>
              <p class="text-gray-600">Kitchen sink has a slow drip that needs fixing. I've already purchased replacement parts (washer and O-ring), just need someone with the right tools and expertise to install them properly. The faucet is a standard Moen single-handle kitchen faucet, about 5 years old. The drip is coming from the spout when the handle is in the off position.</p>

              <div class="mt-4 grid grid-cols-2 gap-4">
                <img src="https://placeholder.svg?height=150&width=200" alt="Sink Photo" class="rounded-lg">
                <img src="https://placeholder.svg?height=150&width=200" alt="Parts Photo" class="rounded-lg">
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
              <div>
                <h5 class="font-medium mb-2">Budget</h5>
                <p class="text-xl font-semibold">$75 - $100</p>
                <p class="text-sm text-gray-500">Client's budget range</p>
              </div>

              <div>
                <h5 class="font-medium mb-2">Timeline</h5>
                <p class="text-xl font-semibold">Tomorrow</p>
                <p class="text-sm text-gray-500">Preferred completion date</p>
              </div>
            </div>

            <div class="border-t border-gray-200 pt-6 mb-6">
              <h5 class="font-medium mb-4">Client Requirements</h5>
              <ul class="space-y-2">
                <li class="flex items-start">
                  <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                  <span>Must have own tools</span>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                  <span>Experience with Moen faucets</span>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                  <span>Available tomorrow between 9am-5pm</span>
                </li>
              </ul>
            </div>
          </div>

          <div class="border-t border-gray-200 pt-6">
            <h5 class="font-medium mb-4">Submit Your Bid</h5>

            <div class="space-y-4">
              <div>
                <label class="block text-sm font-medium mb-1">Your Bid Amount</label>
                <div class="flex items-center">
                  <span class="bg-gray-100 px-3 py-2 rounded-l-lg text-gray-500">$</span>
                  <input type="number" class="flex-1 px-3 py-2 border-y border-r border-gray-200 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Enter amount" min="75" max="200">
                </div>
                <p class="text-xs text-gray-500 mt-1">Client's budget: $75 - $100</p>
              </div>

              <div>
                <label class="block text-sm font-medium mb-1">Estimated Completion Time</label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                  <option>Less than 1 hour</option>
                  <option selected>1-2 hours</option>
                  <option>2-3 hours</option>
                  <option>3-4 hours</option>
                  <option>4+ hours</option>
                </select>
              </div>

              <div>
                <label class="block text-sm font-medium mb-1">Available Date/Time</label>
                <div class="grid grid-cols-2 gap-4">
                  <input type="date" class="px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                  <select class="px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                    <option>Morning (8am-12pm)</option>
                    <option>Afternoon (12pm-5pm)</option>
                    <option>Evening (5pm-8pm)</option>
                  </select>
                </div>
              </div>

              <div>
                <label class="block text-sm font-medium mb-1">Message to Client</label>
                <textarea class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 h-24" placeholder="Introduce yourself and explain why you're the right person for this task..."></textarea>
              </div>

              <div class="flex items-center">
                <label class="custom-checkbox flex items-center">
                  <input type="checkbox">
                  <span class="checkmark mr-2"></span>
                  <span class="text-sm">I have the necessary tools and expertise for this task</span>
                </label>
              </div>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
              <button class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors" onclick="closeTaskModal()">
                Cancel
              </button>
              <button class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                Submit Bid
              </button>
            </div>
          </div>
        `;
            } else {
                // Default content for other tasks
                modalContent.innerHTML = `
          <div class="p-6 text-center">
            <p>Task details for ${taskId} would be shown here.</p>
            <button class="mt-4 px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors" onclick="closeTaskModal()">
              Close
            </button>
          </div>
        `;
            }

            // Show modal with animation
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('show');
            }, 10);
        }

        function closeTaskModal() {
            const modal = document.getElementById('taskModal');
            modal.classList.remove('show');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    </script>
</body>

</html>
