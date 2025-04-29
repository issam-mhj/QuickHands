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
            <div>
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
            </div>
        </section>

        <!-- Task Results -->
        <section class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-display text-xl font-semibold">{{ $servicesNum }} Tasks Found</h3>
                <span class="text-sm text-gray-500">Showing 1-12 of 24</span>
            </div>

            <!-- Services Grid -->
            <div class="container mx-auto py-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($services as $service)
                        <div
                            class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow overflow-hidden border border-gray-100 relative">
                            <!-- Service Category Badge -->
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1.5 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                    {{ $service->servicecategory->name }}
                                </span>
                            </div>

                            <!-- Card Content -->
                            <div class="p-6">
                                <!-- Time Posted -->
                                <span
                                    class="inline-block px-2.5 py-1 bg-green-50 text-green-700 text-xs font-medium rounded-full mb-3">
                                    <i
                                        class="far fa-clock mr-1"></i>{{ \Carbon\Carbon::parse($service->created_at)->diffForHumans() }}
                                </span>

                                <!-- Title -->
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $service->title }}</h3>

                                <!-- Location -->
                                <div class="flex items-center text-sm text-gray-600 mb-4">
                                    <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>
                                    <span>{{ $service->location }}</span>
                                </div>

                                <!-- Description -->
                                <p class="text-sm text-gray-600 mb-5 line-clamp-3">{{ $service->description }}</p>

                                <!-- Provider Info -->
                                <div class="flex items-center mb-5">
                                    <div
                                        class="w-10 h-10 flex items-center justify-center bg-blue-100 text-blue-700 rounded-full font-semibold mr-3">
                                        {{ substr($service->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">{{ $service->user->name }}</p>
                                        <p class="text-xs text-gray-500">Service Provider</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="bg-gray-50 p-4 border-t border-gray-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase font-medium mb-1">Budget</p>
                                        <p class="font-semibold text-gray-800">Open to discuss</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase font-medium mb-1">Due Date</p>
                                        <p class="font-semibold text-gray-800">
                                            {{ \Carbon\Carbon::parse($service->desired_date)->format('M d, Y') }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Action Button -->
                                <button
                                    class="mt-4 w-full px-4 py-2.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors text-sm font-medium flex items-center justify-center"
                                    onclick="openBidModal('{{ $service->id }}', '{{ $service->title }}')">
                                    <i class="fas fa-hand-paper mr-2"></i> Place Bid
                                </button>
                            </div>

                            <!-- Background Icon -->
                            <div class="absolute -bottom-4 -right-4 opacity-5">
                                <i class="fas fa-tools text-6xl"></i>
                            </div>
                        </div>
                        <!-- Bid Modal -->
                        <div id="bidModal"
                            class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
                            <div class="bg-white rounded-xl shadow-xl max-w-lg w-full mx-4 animate-fadeIn">
                                <!-- Modal Header -->
                                <div class="p-6 border-b border-gray-100">
                                    <div class="flex justify-between items-center">
                                        <h3 class="text-xl font-bold text-gray-800">Place Your Bid</h3>
                                        <button onclick="closeBidModal()" class="text-gray-400 hover:text-gray-600">
                                            <i class="fas fa-times text-xl"></i>
                                        </button>
                                    </div>
                                    <p id="modalServiceTitle" class="text-gray-600 mt-2 text-sm"></p>
                                </div>

                                <!-- Modal Body -->
                                <form id="bidForm" action="task/giveoffer/{{$service->id}}" method="POST" class="p-6">
                                    @csrf
                                    <input type="hidden" id="service_id" name="service_id">

                                    <div class="space-y-5">
                                        <!-- Amount Field -->
                                        <div>
                                            <label for="amount"
                                                class="block text-sm font-medium text-gray-700 mb-1">Proposed
                                                Amount ($)</label>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <span class="text-gray-500">$</span>
                                                </div>
                                                <input type="number" id="amount" name="amount" min="1"
                                                    step="0.01"
                                                    class="pl-8 block w-full rounded-lg border border-gray-300 py-3 px-4 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                                                    placeholder="0.00" required>
                                            </div>
                                        </div>

                                        <!-- Estimated Time Field -->
                                        <div>
                                            <label for="estimated_time"
                                                class="block text-sm font-medium text-gray-700 mb-1">Estimated Time
                                                (hours)
                                            </label>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 right-0 pr-10 flex items-center pointer-events-none">
                                                    <span class="text-gray-500">hours</span>
                                                </div>
                                                <input type="number" id="estimated_time" name="estimated_time"
                                                    min="1" step="1"
                                                    class="block w-full rounded-lg border border-gray-300 py-3 px-4 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                                                    placeholder="Enter estimated hours" required>
                                            </div>
                                        </div>

                                        <!-- Notes/Message Field (Optional) -->
                                        <div>
                                            <label for="message"
                                                class="block text-sm font-medium text-gray-700 mb-1">Additional
                                                Notes (Optional)</label>
                                            <textarea id="message" name="message" rows="3"
                                                class="block w-full rounded-lg border border-gray-300 py-3 px-4 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                                                placeholder="Any additional details about your offer..."></textarea>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="mt-6">
                                        <button type="submit"
                                            class="w-full bg-primary text-white py-3 px-6 rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors font-medium">
                                            Submit Bid
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
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

    <script>
        // Functions to handle the bid modal
        function openBidModal(serviceId, serviceTitle) {
            // Set the service ID in the hidden form field
            document.getElementById('service_id').value = serviceId;

            // Set the service title in the modal
            document.getElementById('modalServiceTitle').textContent = serviceTitle;

            // Show the modal
            document.getElementById('bidModal').classList.remove('hidden');

            // Add no-scroll class to body
            document.body.classList.add('overflow-hidden');
        }

        function closeBidModal() {
            // Hide the modal
            document.getElementById('bidModal').classList.add('hidden');

            // Remove no-scroll class from body
            document.body.classList.remove('overflow-hidden');

            // Reset form
            document.getElementById('bidForm').reset();
        }

        // Close modal when clicking outside
        document.getElementById('bidModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeBidModal();
            }
        });
    </script>

    <style>
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</body>

</html>
