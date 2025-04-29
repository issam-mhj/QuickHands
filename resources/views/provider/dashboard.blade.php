<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands Provider Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
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

        /* Wave Animation */
        .wave-bg {
            position: relative;
            overflow: hidden;
        }

        .wave-bg::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 15%;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' opacity='.25' fill='white'%3E%3C/path%3E%3Cpath d='M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z' opacity='.5' fill='white'%3E%3C/path%3E%3Cpath d='M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z' fill='white'%3E%3C/path%3E%3C/svg%3E") no-repeat;
            background-size: cover;
            animation: wave 10s linear infinite;
        }

        @keyframes wave {
            0% {
                background-position-x: 0;
            }

            100% {
                background-position-x: 1200px;
            }
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
                        <img src="https://cdn.pixabay.com/photo/2017/06/09/23/22/avatar-2388584_1280.png" alt="Provider"
                            class="w-10 h-10 rounded-full border-2 border-white shadow-sm">
                        <div class="ml-3">
                            <p class="font-medium">{{ $user->name }}</p>
                            <p class="text-xs text-gray-500">Professional Handyman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white shadow-md py-4 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between overflow-x-auto hide-scrollbar">
                <div class="flex space-x-1 md:space-x-4">
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg bg-primary text-white font-medium text-sm md:text-base">
                        <i class="fas fa-chart-line mr-2"></i> Dashboard
                    </a>
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
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

    <main class="max-w-7xl mx-auto px-6 md:px-12 py-8">
        <section class="mb-8">
            <div class="dashboard-card gradient-border wave-bg">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div class="mb-4 md:mb-0">
                        <h2 class="font-display text-2xl md:text-3xl font-bold mb-2">Welcome back, {{ $user->name }}!
                        </h2>
                        <p class="text-gray-600">Here's what's happening with your tasks today.</p>
                    </div>

                    <div
                        class="flex flex-col sm:flex-row items-start sm:items-center space-y-2 sm:space-y-0 sm:space-x-4">
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-success mr-2"></div>
                            <span class="text-sm font-medium">Available for work</span>
                        </div>

                        <button
                            class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                            <i class="fas fa-plus mr-2"></i> Find New Tasks
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-8">
            <h3 class="font-display text-xl font-semibold mb-4">Quick Stats</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-6">
                <!-- Tasks Completed -->
                <div
                    class="relative overflow-hidden rounded-xl bg-gradient-to-br from-blue-600 to-blue-800 p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="relative z-10">
                        <p class="text-blue-100 text-sm font-medium mb-2">Tasks Completed</p>
                        <div class="flex items-baseline">
                            @php
                                $countTask = 0;
                                foreach ($tasks as $task) {
                                    if ($user->provider->id == $task->offer->provider_id) {
                                        $countTask++;
                                    }
                                }
                            @endphp
                            <h4 class="text-4xl font-bold text-white">{{ $countTask }}</h4>
                            <span class="ml-2 text-blue-200 text-sm">total</span>
                        </div>
                    </div>
                    <div class="absolute -bottom-2 -right-2 text-blue-400/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                        </svg>
                    </div>
                </div>

                <!-- Average Rating -->
                <div
                    class="relative overflow-hidden rounded-xl bg-gradient-to-br from-purple-600 to-purple-800 p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="relative z-10">
                        <p class="text-purple-100 text-sm font-medium mb-2">Average Rating</p>
                        <div class="flex items-baseline">
                            <h4 class="text-4xl font-bold text-white">{{ $reviewsAVG }}</h4>
                            <span class="ml-2 text-purple-200 text-sm">out of 5</span>
                            <span class="ml-2 text-purple-200 text-sm">({{ $reviewsNum }} reviews)</span>
                        </div>
                    </div>
                    <div class="absolute -bottom-2 -right-2 text-purple-400/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                    </div>
                </div>

                <!-- Monthly Earnings -->
                <div
                    class="relative overflow-hidden rounded-xl bg-gradient-to-br from-green-500 to-emerald-700 p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="relative z-10">
                        <p class="text-green-100 text-sm font-medium mb-2">total Earnings</p>
                        <div class="flex items-baseline">
                            <h4 class="text-4xl font-bold text-white">${{ $earnSum }}</h4>
                        </div>
                    </div>
                    <div class="absolute -bottom-2 -right-2 text-green-400/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z" />
                        </svg>
                    </div>
                </div>

                <!-- Active Tasks -->
                <div
                    class="relative overflow-hidden rounded-xl bg-gradient-to-br from-gray-700 to-gray-900 p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="relative z-10">
                        <p class="text-gray-300 text-sm font-medium mb-2">Active Tasks</p>
                        <div class="flex items-baseline">
                            <h4 class="text-4xl font-bold text-white">{{ $notcompleted }}</h4>
                            <span class="ml-2 text-gray-300 text-sm">in progress</span>
                        </div>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <div class="flex items-center bg-gray-700/50 rounded-full px-3 py-1">
                                <span class="w-2 h-2 rounded-full bg-green-400 mr-2 animate-pulse"></span>
                                <span class="font-medium text-white">{{ $inprogress }} in progress</span>
                            </div>
                            <div class="flex items-center bg-gray-700/50 rounded-full px-3 py-1">
                                <span class="w-2 h-2 rounded-full bg-yellow-400 mr-2"></span>
                                <span class="font-medium text-white">{{ $notstarted }} not started</span>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-2 -right-2 text-gray-600/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm-2 14l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z" />
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <!-- Performance Insights & Upcoming Tasks -->
        <div class="grid grid-cols-1 lg:grid-cols-1 gap-8 mb-8">
            <!-- Upcoming Tasks & Notifications -->
            <div class="lg:col-span-1">
                <h3 class="font-display text-xl font-semibold mb-4">my latest completed tasks</h3>
                @foreach ($myCompletedTasks as $task)
                    <div class="mb-8">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-lg font-semibold">Tasks</h4>
                            <a href="#" class="text-primary hover:underline text-sm">View All</a>
                        </div>

                        <div class="space-y-4">
                            <div class="p-3 bg-primary/5 rounded-xl border-l-4 border-primary">
                                <div class="flex justify-between">
                                    <p class="font-medium">{{ $task->offer->service->title }}</p>
                                    <span
                                        class="text-xs bg-primary/10 text-primary px-2 py-0.5 rounded-full">{{ \Carbon\Carbon::parse($task->created_at)->format('M d, Y') }}</span>
                                </div>
                                <div class="flex items-center mt-1 text-sm text-gray-500">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    <span>{{ $task->offer->service->location }}</span>
                                </div>
                                <div class="flex items-center justify-between mt-2">
                                    <span class="text-sm font-medium">${{ $task->offer->proposed_amount }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-gray-100 text-center">
                            <button class="text-primary hover:underline text-sm font-medium">
                                <i class="fas fa-calendar-alt mr-1"></i> View Full Schedule
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Service Areas & Skills -->
        <div class="grid grid-cols-1 lg:grid-cols-1 gap-8 mb-8">
            <!-- Skills & Services -->
            <div>
                <h3 class="font-display text-xl font-semibold mb-4">Your Skills</h3>

                <div>
                    <div class="flex items-center justify-between mb-6">
                        <button
                            class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
                            <i class="fas fa-edit mr-1"></i> Edit Skills
                        </button>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        @foreach ($skills[0] as $skill)
                            <div
                                class="p-3 border border-gray-200 rounded-xl hover:border-primary/30 transition-colors">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-tools text-primary mr-2"></i>
                                    <h5 class="font-medium">{{ $skill }}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 pt-4 border-t border-gray-100">
                        <button
                            class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                            <i class="fas fa-plus mr-1"></i> Add New Skill
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <section class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-display text-xl font-semibold">Recent Reviews</h3>
                <a href="#" class="text-primary hover:underline text-sm">View All Reviews</a>
            </div>

            <div>
                <div class="max-w-4xl mx-auto">
                    <!-- Summary section - moved to top -->
                    <div class="mb-8 p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                        <div class="flex items-center justify-center flex-col md:flex-row gap-4">
                            <div class="flex text-yellow-500 text-xl mr-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="font-medium text-lg">{{ $reviewsAVG }} average from {{ $reviewsNum }}
                                reviews</span>
                        </div>
                    </div>

                    <!-- Reviews -->
                    <div class="grid grid-cols-1 gap-6">
                        @foreach ($reviews as $review)
                            <div
                                class="p-6 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                                <div class="flex flex-col md:flex-row md:items-start gap-4">
                                    <!-- User info and rating -->
                                    <div class="flex flex-col items-start md:w-1/3">
                                        <div class="flex items-center mb-3">
                                            <div
                                                class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-700 font-semibold text-lg mr-3">
                                                {{ $review->offer->service->user->name[0] }}
                                            </div>
                                            <div>
                                                <h5 class="font-medium text-gray-900">
                                                    {{ $review->offer->service->user->name }}</h5>
                                                <p class="text-xs text-gray-500">
                                                    {{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex text-yellow-500 mb-2">
                                            @for ($i = 0; $i < (int) $review->rating; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor

                                        </div>
                                        <div class="text-xs text-gray-500">
                                            <span class="font-medium">Task:</span>
                                            {{ $review->offer->service->title }}
                                        </div>
                                    </div>

                                    <!-- Review comment -->
                                    <div class="md:w-2/3">
                                        <p class="text-gray-700">{{ $review->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination can be added here if needed -->
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div class="mb-4 md:mb-0">
                    <p class="text-sm text-gray-500">© 2025 QuickHands. All rights reserved.</p>
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
</body>

</html>
