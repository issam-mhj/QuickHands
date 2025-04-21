<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Task Management</title>
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

        /* Calendar Styles */
        .calendar-day {
            @apply w-full aspect-square flex flex-col items-center justify-center rounded-lg border border-gray-200 transition-all duration-200;
        }

        .calendar-day:hover {
            @apply bg-gray-50;
        }

        .calendar-day.has-task {
            @apply border-primary/30 bg-primary/5;
        }

        .calendar-day.today {
            @apply border-primary bg-primary/10;
        }

        .calendar-day.selected {
            @apply border-primary bg-primary text-white;
        }

        /* Task Status Pills */
        .status-pill {
            @apply px-2 py-1 rounded-full text-xs font-medium;
        }

        .status-pill.pending {
            @apply bg-blue-100 text-blue-800;
        }

        .status-pill.in-progress {
            @apply bg-yellow-100 text-yellow-800;
        }

        .status-pill.completed {
            @apply bg-green-100 text-green-800;
        }

        .status-pill.cancelled {
            @apply bg-red-100 text-red-800;
        }

        .status-pill.disputed {
            @apply bg-purple-100 text-purple-800;
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

        /* Tab Styles */
        .tab-button {
            @apply px-4 py-2 font-medium text-gray-500 border-b-2 border-transparent;
            transition: all 0.3s ease;
        }

        .tab-button:hover {
            @apply text-gray-800;
        }

        .tab-button.active {
            @apply text-primary border-primary;
        }

        /* Progress Bar */
        .progress-bar {
            @apply w-full h-2 bg-gray-200 rounded-full overflow-hidden;
        }

        .progress-bar-fill {
            @apply h-full rounded-full;
            transition: width 0.5s ease;
        }

        /* Timeline */
        .timeline {
            @apply relative pl-8;
        }

        .timeline-item {
            @apply relative pb-8;
        }

        .timeline-item:last-child {
            @apply pb-0;
        }

        .timeline-item::before {
            content: '';
            @apply absolute left-0 top-0 w-4 h-4 rounded-full bg-white border-2 border-primary transform -translate-x-1/2;
            z-index: 1;
        }

        .timeline-item::after {
            content: '';
            @apply absolute left-0 top-4 bottom-0 w-0.5 bg-gray-200 transform -translate-x-1/2;
        }

        .timeline-item:last-child::after {
            @apply hidden;
        }

        /* Custom Checkbox */
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
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-tasks mr-2"></i> Available Tasks
                    </a>
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg bg-primary text-white font-medium text-sm md:text-base">
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
                <h2 class="font-display text-2xl md:text-3xl font-bold">Task Management</h2>
                <p class="text-gray-600">Organize and track your tasks</p>
            </div>

            <div class="mt-4 md:mt-0 flex flex-wrap gap-3">
                <button
                    class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors flex items-center">
                    <i class="fas fa-calendar-alt mr-2 text-primary"></i>
                    <span>Calendar View</span>
                </button>

                <button
                    class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors flex items-center">
                    <i class="fas fa-file-export mr-2 text-primary"></i>
                    <span>Export Tasks</span>
                </button>

                <button
                    class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    <span>Add Manual Task</span>
                </button>
            </div>
        </div>

        <!-- Task Management Tabs -->
        <div class="mb-8">
            <div class="border-b border-gray-200">
                <div class="flex overflow-x-auto hide-scrollbar">
                    <button class="tab-button active" data-tab="active-tasks">
                        Active Tasks <span
                            class="ml-2 px-1.5 py-0.5 bg-primary/10 text-primary rounded text-xs">5</span>
                    </button>
                    <button class="tab-button" data-tab="calendar">
                        Calendar View
                    </button>
                    <button class="tab-button" data-tab="task-history">
                        Task History <span
                            class="ml-2 px-1.5 py-0.5 bg-gray-100 text-gray-600 rounded text-xs">28</span>
                    </button>
                    <button class="tab-button" data-tab="disputes">
                        Disputes <span class="ml-2 px-1.5 py-0.5 bg-red-100 text-red-600 rounded text-xs">1</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Active Tasks Tab Content -->
        <div id="active-tasks" class="tab-content">
            <!-- Task Categories -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="dashboard-card">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-medium">Today</h3>
                        <span
                            class="w-6 h-6 rounded-full bg-primary text-white text-xs flex items-center justify-center">2</span>
                    </div>
                    <p class="text-sm text-gray-500 mb-2">Tasks scheduled for today</p>
                    <div class="w-full h-1 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full" style="width: 40%;"></div>
                    </div>
                </div>

                <div class="dashboard-card">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-medium">Upcoming</h3>
                        <span
                            class="w-6 h-6 rounded-full bg-blue-500 text-white text-xs flex items-center justify-center">3</span>
                    </div>
                    <p class="text-sm text-gray-500 mb-2">Tasks scheduled for future dates</p>
                    <div class="w-full h-1 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-blue-500 rounded-full" style="width: 60%;"></div>
                    </div>
                </div>

                <div class="dashboard-card">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-medium">In Progress</h3>
                        <span
                            class="w-6 h-6 rounded-full bg-yellow-500 text-white text-xs flex items-center justify-center">1</span>
                    </div>
                    <p class="text-sm text-gray-500 mb-2">Tasks currently in progress</p>
                    <div class="w-full h-1 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-yellow-500 rounded-full" style="width: 20%;"></div>
                    </div>
                </div>

                <div class="dashboard-card">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-medium">Pending Review</h3>
                        <span
                            class="w-6 h-6 rounded-full bg-purple-500 text-white text-xs flex items-center justify-center">2</span>
                    </div>
                    <p class="text-sm text-gray-500 mb-2">Completed tasks awaiting review</p>
                    <div class="w-full h-1 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-purple-500 rounded-full" style="width: 40%;"></div>
                    </div>
                </div>
            </div>

            <!-- Active Tasks List -->
            <div class="dashboard-card mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-display text-xl font-semibold">Active Tasks</h3>
                    <div class="flex items-center">
                        <span class="text-sm text-gray-500 mr-2">Sort by:</span>
                        <select
                            class="px-3 py-1.5 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/20">
                            <option>Date (Newest First)</option>
                            <option>Date (Oldest First)</option>
                            <option>Status</option>
                            <option>Client Name</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="pb-3 text-left font-medium text-gray-500">Task</th>
                                <th class="pb-3 text-left font-medium text-gray-500">Client</th>
                                <th class="pb-3 text-left font-medium text-gray-500">Date & Time</th>
                                <th class="pb-3 text-left font-medium text-gray-500">Status</th>
                                <th class="pb-3 text-left font-medium text-gray-500">Payment</th>
                                <th class="pb-3 text-left font-medium text-gray-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Task 1 -->
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-wrench text-blue-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Leaky Faucet Repair</p>
                                            <p class="text-xs text-gray-500">Downtown, 2.3 miles away</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Client"
                                            class="w-8 h-8 rounded-full mr-2">
                                        <span>Jennifer L.</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">Today</p>
                                    <p class="text-xs text-gray-500">2:00 PM - 4:00 PM</p>
                                </td>
                                <td class="py-4">
                                    <span class="status-pill in-progress">In Progress</span>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">$85.00</p>
                                    <p class="text-xs text-gray-500">Paid upfront</p>
                                </td>
                                <td class="py-4">
                                    <div class="flex space-x-2">
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="Message Client">
                                            <i class="fas fa-comment"></i>
                                        </button>
                                        <button
                                            class="p-2 bg-green-100 hover:bg-green-200 rounded-lg text-green-600 transition-colors"
                                            title="Mark as Complete">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Task 2 -->
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-yellow-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-tv text-yellow-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">TV Mounting - 65" OLED</p>
                                            <p class="text-xs text-gray-500">Westside, 4.7 miles away</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Client"
                                            class="w-8 h-8 rounded-full mr-2">
                                        <span>Robert T.</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">Today</p>
                                    <p class="text-xs text-gray-500">5:00 PM - 7:00 PM</p>
                                </td>
                                <td class="py-4">
                                    <span class="status-pill pending">Scheduled</span>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">$135.00</p>
                                    <p class="text-xs text-gray-500">Pending completion</p>
                                </td>
                                <td class="py-4">
                                    <div class="flex space-x-2">
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="Message Client">
                                            <i class="fas fa-comment"></i>
                                        </button>
                                        <button
                                            class="p-2 bg-red-100 hover:bg-red-200 rounded-lg text-red-600 transition-colors"
                                            title="Cancel Task">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Task 3 -->
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-fan text-green-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Ceiling Fan Installation</p>
                                            <p class="text-xs text-gray-500">North Hills, 1.8 miles away</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/women/22.jpg" alt="Client"
                                            class="w-8 h-8 rounded-full mr-2">
                                        <span> alt="Client" class="w-8 h-8 rounded-full mr-2">
                                            <span>Maria G.</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">Tomorrow</p>
                                    <p class="text-xs text-gray-500">10:00 AM - 12:00 PM</p>
                                </td>
                                <td class="py-4">
                                    <span class="status-pill pending">Scheduled</span>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">$100.00</p>
                                    <p class="text-xs text-gray-500">Pending completion</p>
                                </td>
                                <td class="py-4">
                                    <div class="flex space-x-2">
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="Message Client">
                                            <i class="fas fa-comment"></i>
                                        </button>
                                        <button
                                            class="p-2 bg-red-100 hover:bg-red-200 rounded-lg text-red-600 transition-colors"
                                            title="Cancel Task">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Task 4 -->
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-couch text-purple-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Furniture Assembly - IKEA</p>
                                            <p class="text-xs text-gray-500">Eastwood, 3.5 miles away</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/men/33.jpg" alt="Client"
                                            class="w-8 h-8 rounded-full mr-2">
                                        <span>David K.</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">Saturday</p>
                                    <p class="text-xs text-gray-500">1:00 PM - 5:00 PM</p>
                                </td>
                                <td class="py-4">
                                    <span class="status-pill pending">Scheduled</span>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">$175.00</p>
                                    <p class="text-xs text-gray-500">Pending completion</p>
                                </td>
                                <td class="py-4">
                                    <div class="flex space-x-2">
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="Message Client">
                                            <i class="fas fa-comment"></i>
                                        </button>
                                        <button
                                            class="p-2 bg-red-100 hover:bg-red-200 rounded-lg text-red-600 transition-colors"
                                            title="Cancel Task">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Task 5 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-sink text-red-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Bathroom Sink Clog</p>
                                            <p class="text-xs text-gray-500">South Bay, 5.2 miles away</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/women/56.jpg" alt="Client"
                                            class="w-8 h-8 rounded-full mr-2">
                                        <span>Patricia H.</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">Sunday</p>
                                    <p class="text-xs text-gray-500">11:00 AM - 12:00 PM</p>
                                </td>
                                <td class="py-4">
                                    <span class="status-pill pending">Scheduled</span>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">$75.00</p>
                                    <p class="text-xs text-gray-500">Pending completion</p>
                                </td>
                                <td class="py-4">
                                    <div class="flex space-x-2">
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="Message Client">
                                            <i class="fas fa-comment"></i>
                                        </button>
                                        <button
                                            class="p-2 bg-red-100 hover:bg-red-200 rounded-lg text-red-600 transition-colors"
                                            title="Cancel Task">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Calendar View Tab Content -->
        <div id="calendar" class="tab-content hidden">
            <div class="dashboard-card mb-8">
                <div class="flex flex-col md:flex-row md:items-start gap-6">
                    <!-- Calendar -->
                    <div class="md:w-2/3">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-display text-xl font-semibold">October 2023</h3>
                            <div class="flex space-x-2">
                                <button
                                    class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button
                                    class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Calendar Grid -->
                        <div class="grid grid-cols-7 gap-2">
                            <!-- Days of Week -->
                            <div class="text-center font-medium text-gray-500 py-2">Sun</div>
                            <div class="text-center font-medium text-gray-500 py-2">Mon</div>
                            <div class="text-center font-medium text-gray-500 py-2">Tue</div>
                            <div class="text-center font-medium text-gray-500 py-2">Wed</div>
                            <div class="text-center font-medium text-gray-500 py-2">Thu</div>
                            <div class="text-center font-medium text-gray-500 py-2">Fri</div>
                            <div class="text-center font-medium text-gray-500 py-2">Sat</div>

                            <!-- Week 1 -->
                            <div class="calendar-day text-gray-400">24</div>
                            <div class="calendar-day text-gray-400">25</div>
                            <div class="calendar-day text-gray-400">26</div>
                            <div class="calendar-day text-gray-400">27</div>
                            <div class="calendar-day text-gray-400">28</div>
                            <div class="calendar-day text-gray-400">29</div>
                            <div class="calendar-day text-gray-400">30</div>

                            <!-- Week 2 -->
                            <div class="calendar-day">1</div>
                            <div class="calendar-day">2</div>
                            <div class="calendar-day">3</div>
                            <div class="calendar-day">4</div>
                            <div class="calendar-day">5</div>
                            <div class="calendar-day">6</div>
                            <div class="calendar-day">7</div>

                            <!-- Week 3 -->
                            <div class="calendar-day">8</div>
                            <div class="calendar-day">9</div>
                            <div class="calendar-day">10</div>
                            <div class="calendar-day">11</div>
                            <div class="calendar-day">12</div>
                            <div class="calendar-day has-task">
                                <span>13</span>
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-1"></span>
                            </div>
                            <div class="calendar-day">14</div>

                            <!-- Week 4 -->
                            <div class="calendar-day has-task">
                                <span>15</span>
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-1"></span>
                            </div>
                            <div class="calendar-day today selected">
                                <span>16</span>
                                <span class="w-1.5 h-1.5 bg-white rounded-full mt-1"></span>
                                <span class="w-1.5 h-1.5 bg-white rounded-full mt-0.5"></span>
                            </div>
                            <div class="calendar-day">17</div>
                            <div class="calendar-day has-task">
                                <span>18</span>
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-1"></span>
                            </div>
                            <div class="calendar-day">19</div>
                            <div class="calendar-day">20</div>
                            <div class="calendar-day has-task">
                                <span>21</span>
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-1"></span>
                            </div>

                            <!-- Week 5 -->
                            <div class="calendar-day">22</div>
                            <div class="calendar-day">23</div>
                            <div class="calendar-day">24</div>
                            <div class="calendar-day">25</div>
                            <div class="calendar-day">26</div>
                            <div class="calendar-day">27</div>
                            <div class="calendar-day">28</div>

                            <!-- Week 6 -->
                            <div class="calendar-day">29</div>
                            <div class="calendar-day">30</div>
                            <div class="calendar-day">31</div>
                            <div class="calendar-day text-gray-400">1</div>
                            <div class="calendar-day text-gray-400">2</div>
                            <div class="calendar-day text-gray-400">3</div>
                            <div class="calendar-day text-gray-400">4</div>
                        </div>
                    </div>

                    <!-- Day Schedule -->
                    <div class="md:w-1/3">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-display text-xl font-semibold">October 16, 2023</h3>
                            <span class="px-2 py-1 bg-primary/10 text-primary rounded-full text-xs">Today</span>
                        </div>

                        <div class="space-y-4">
                            <!-- Task 1 -->
                            <div
                                class="p-4 border border-gray-200 rounded-xl hover:border-primary/30 hover:bg-primary/5 transition-colors">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-500">2:00 PM - 4:00 PM</span>
                                    <span class="status-pill in-progress">In Progress</span>
                                </div>
                                <h4 class="font-medium mb-1">Leaky Faucet Repair</h4>
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    <span>Downtown, 2.3 miles away</span>
                                </div>
                                <div class="flex items-center">
                                    <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Client"
                                        class="w-6 h-6 rounded-full mr-2">
                                    <span class="text-sm">Jennifer L.</span>
                                </div>
                            </div>

                            <!-- Task 2 -->
                            <div
                                class="p-4 border border-gray-200 rounded-xl hover:border-primary/30 hover:bg-primary/5 transition-colors">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-500">5:00 PM - 7:00 PM</span>
                                    <span class="status-pill pending">Scheduled</span>
                                </div>
                                <h4 class="font-medium mb-1">TV Mounting - 65" OLED</h4>
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    <span>Westside, 4.7 miles away</span>
                                </div>
                                <div class="flex items-center">
                                    <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Client"
                                        class="w-6 h-6 rounded-full mr-2">
                                    <span class="text-sm">Robert T.</span>
                                </div>
                            </div>

                            <!-- Add Task Button -->
                            <button
                                class="w-full p-4 border border-dashed border-gray-300 rounded-xl text-gray-500 hover:border-primary hover:text-primary transition-colors flex items-center justify-center">
                                <i class="fas fa-plus mr-2"></i>
                                <span>Add Task to This Day</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Task History Tab Content -->
        <div id="task-history" class="tab-content hidden">
            <div class="dashboard-card mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-display text-xl font-semibold">Task History</h3>
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <input type="text" placeholder="Search tasks..."
                                class="pl-9 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                            <i
                                class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>

                        <button
                            class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors flex items-center">
                            <i class="fas fa-filter mr-2 text-primary"></i>
                            <span>Filter</span>
                        </button>

                        <button
                            class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors flex items-center">
                            <i class="fas fa-file-export mr-2 text-primary"></i>
                            <span>Export</span>
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="pb-3 text-left font-medium text-gray-500">Task</th>
                                <th class="pb-3 text-left font-medium text-gray-500">Client</th>
                                <th class="pb-3 text-left font-medium text-gray-500">Date</th>
                                <th class="pb-3 text-left font-medium text-gray-500">Status</th>
                                <th class="pb-3 text-left font-medium text-gray-500">Earnings</th>
                                <th class="pb-3 text-left font-medium text-gray-500">Rating</th>
                                <th class="pb-3 text-left font-medium text-gray-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Task 1 -->
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-paint-roller text-green-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Interior Painting</p>
                                            <p class="text-xs text-gray-500">Bedroom walls and ceiling</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/women/33.jpg" alt="Client"
                                            class="w-8 h-8 rounded-full mr-2">
                                        <span>Sarah M.</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">Oct 10, 2023</p>
                                    <p class="text-xs text-gray-500">9:00 AM - 5:00 PM</p>
                                </td>
                                <td class="py-4">
                                    <span class="status-pill completed">Completed</span>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">$320.00</p>
                                    <p class="text-xs text-gray-500">+ $40.00 tip</p>
                                </td>
                                <td class="py-4">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="ml-1 text-gray-700">5.0</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex space-x-2">
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="Download Invoice">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Task 2 -->
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-faucet text-blue-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Kitchen Sink Installation</p>
                                            <p class="text-xs text-gray-500">New sink and disposal</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/men/42.jpg" alt="Client"
                                            class="w-8 h-8 rounded-full mr-2">
                                        <span>James W.</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">Oct 8, 2023</p>
                                    <p class="text-xs text-gray-500">1:00 PM - 4:00 PM</p>
                                </td>
                                <td class="py-4">
                                    <span class="status-pill completed">Completed</span>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">$180.00</p>
                                    <p class="text-xs text-gray-500">+ $20.00 tip</p>
                                </td>
                                <td class="py-4">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="ml-1 text-gray-700">4.5</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex space-x-2">
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="Download Invoice">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Task 3 -->
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-couch text-purple-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Furniture Assembly</p>
                                            <p class="text-xs text-gray-500">Dresser and nightstands</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Client"
                                            class="w-8 h-8 rounded-full mr-2">
                                        <span>Emily R.</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">Oct 5, 2023</p>
                                    <p class="text-xs text-gray-500">10:00 AM - 1:00 PM</p>
                                </td>
                                <td class="py-4">
                                    <span class="status-pill completed">Completed</span>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">$120.00</p>
                                    <p class="text-xs text-gray-500">No tip</p>
                                </td>
                                <td class="py-4">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span class="ml-1 text-gray-700">4.0</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex space-x-2">
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="Download Invoice">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Task 4 -->
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-yellow-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-bolt text-yellow-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Light Fixture Installation</p>
                                            <p class="text-xs text-gray-500">Dining room chandelier</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/men/78.jpg" alt="Client"
                                            class="w-8 h-8 rounded-full mr-2">
                                        <span>Thomas B.</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">Oct 2, 2023</p>
                                    <p class="text-xs text-gray-500">3:00 PM - 5:00 PM</p>
                                </td>
                                <td class="py-4">
                                    <span class="status-pill completed">Completed</span>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">$110.00</p>
                                    <p class="text-xs text-gray-500">+ $15.00 tip</p>
                                </td>
                                <td class="py-4">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="ml-1 text-gray-700">5.0</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex space-x-2">
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="Download Invoice">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Task 5 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-door-open text-red-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Door Repair</p>
                                            <p class="text-xs text-gray-500">Fix sticking bathroom door</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/women/56.jpg" alt="Client"
                                            class="w-8 h-8 rounded-full mr-2">
                                        <span>Patricia H.</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">Sep 28, 2023</p>
                                    <p class="text-xs text-gray-500">11:00 AM - 12:00 PM</p>
                                </td>
                                <td class="py-4">
                                    <span class="status-pill disputed">Disputed</span>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">$60.00</p>
                                    <p class="text-xs text-gray-500">In dispute</p>
                                </td>
                                <td class="py-4">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span class="ml-1 text-gray-700">2.0</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex space-x-2">
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                            title="View Dispute">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
            </div>
        </div>

        <!-- Disputes Tab Content -->
        <div id="disputes" class="tab-content hidden">
            <div class="dashboard-card mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-display text-xl font-semibold">Dispute Resolution</h3>
                    <button
                        class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors flex items-center">
                        <i class="fas fa-question-circle mr-2 text-primary"></i>
                        <span>Dispute Guidelines</span>
                    </button>
                </div>

                <div class="mb-6 p-4 bg-yellow-50 border border-yellow-200 rounded-xl">
                    <div class="flex items-start">
                        <div class="p-2 bg-yellow-100 rounded-lg text-yellow-700 mr-3">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div>
                            <h4 class="font-medium mb-1">About Disputes</h4>
                            <p class="text-sm text-gray-600">Disputes are created when there's a disagreement between
                                you and the client about a task. Our support team will review all evidence and make a
                                fair decision. Most disputes are resolved within 48 hours.</p>
                        </div>
                    </div>
                </div>

                <!-- Active Disputes -->
                <div class="mb-8">
                    <h4 class="font-medium mb-4">Active Disputes (1)</h4>

                    <div class="border border-gray-200 rounded-xl overflow-hidden">
                        <div class="p-6 bg-white">
                            <div class="flex flex-col md:flex-row md:items-center justify-between mb-4">
                                <div class="flex items-center mb-4 md:mb-0">
                                    <div class="w-12 h-12 rounded-lg bg-red-100 flex items-center justify-center mr-4">
                                        <i class="fas fa-door-open text-red-500 text-xl"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-medium">Door Repair</h5>
                                        <p class="text-sm text-gray-500">Sep 28, 2023</p>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <img src="https://randomuser.me/api/portraits/women/56.jpg" alt="Client"
                                        class="w-8 h-8 rounded-full mr-2">
                                    <div>
                                        <p class="text-sm font-medium">Patricia H.</p>
                                        <div class="flex text-xs text-yellow-400">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-4 bg-gray-50 rounded-lg mb-4">
                                <h5 class="font-medium mb-2">Dispute Reason</h5>
                                <p class="text-sm text-gray-600">Client claims the door still sticks after repair and
                                    is requesting a refund or additional service at no cost.</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <h5 class="font-medium mb-2">Dispute Status</h5>
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Under
                                        Review</span>
                                    <p class="text-xs text-gray-500 mt-1">Submitted on Oct 1, 2023</p>
                                </div>

                                <div>
                                    <h5 class="font-medium mb-2">Payment Status</h5>
                                    <p class="text-sm">$60.00 <span class="text-yellow-600">(on hold)</span></p>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 pt-4">
                                <h5 class="font-medium mb-3">Timeline</h5>

                                <div class="timeline">
                                    <div class="timeline-item">
                                        <p class="font-medium">Dispute Submitted</p>
                                        <p class="text-sm text-gray-500">Oct 1, 2023 at 10:23 AM</p>
                                        <p class="text-sm mt-1">Client submitted a dispute claiming the door still
                                            sticks after repair.</p>
                                    </div>

                                    <div class="timeline-item">
                                        <p class="font-medium">Your Response</p>
                                        <p class="text-sm text-gray-500">Oct 1, 2023 at 2:45 PM</p>
                                        <p class="text-sm mt-1">You provided evidence that the door was working
                                            properly when you left.</p>
                                    </div>

                                    <div class="timeline-item">
                                        <p class="font-medium">Support Team Review</p>
                                        <p class="text-sm text-gray-500">Oct 2, 2023 at 9:15 AM</p>
                                        <p class="text-sm mt-1">Our support team is reviewing the evidence from both
                                            parties.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 flex flex-col md:flex-row md:justify-between items-center">
                                <div class="mb-4 md:mb-0">
                                    <button class="text-primary hover:underline text-sm flex items-center">
                                        <i class="fas fa-paperclip mr-1"></i>
                                        <span>View Attached Evidence (3 files)</span>
                                    </button>
                                </div>

                                <div class="flex space-x-3">
                                    <button
                                        class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                                        <i class="fas fa-comment-alt mr-2"></i>
                                        <span>Message Support</span>
                                    </button>
                                    <button
                                        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                                        <i class="fas fa-plus mr-2"></i>
                                        <span>Add Evidence</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Past Disputes -->
                <div>
                    <h4 class="font-medium mb-4">Past Disputes (2)</h4>

                    <div class="space-y-4">
                        <!-- Past Dispute 1 -->
                        <div
                            class="p-4 border border-gray-200 rounded-xl hover:border-primary/30 hover:bg-primary/5 transition-colors">
                            <div class="flex flex-col md:flex-row md:items-center justify-between">
                                <div class="flex items-center mb-4 md:mb-0">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center mr-3">
                                        <i class="fas fa-paint-roller text-blue-500"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-medium">Wall Painting</h5>
                                        <p class="text-xs text-gray-500">Aug 15, 2023</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-4">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Resolved
                                        in Your Favor</span>
                                    <button
                                        class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Past Dispute 2 -->
                        <div
                            class="p-4 border border-gray-200 rounded-xl hover:border-primary/30 hover:bg-primary/5 transition-colors">
                            <div class="flex flex-col md:flex-row md:items-center justify-between">
                                <div class="flex items-center mb-4 md:mb-0">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center mr-3">
                                        <i class="fas fa-couch text-purple-500"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-medium">Furniture Assembly</h5>
                                        <p class="text-xs text-gray-500">Jul 22, 2023</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-4">
                                    <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Resolved in
                                        Client's Favor</span>
                                    <button
                                        class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab switching
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons
                    tabButtons.forEach(btn => btn.classList.remove('active'));

                    // Add active class to clicked button
                    button.classList.add('active');

                    // Hide all tab contents
                    tabContents.forEach(content => content.classList.add('hidden'));

                    // Show the selected tab content
                    const tabId = button.getAttribute('data-tab');
                    document.getElementById(tabId).classList.remove('hidden');
                });
            });

            // Animate elements on load
            const animateElements = () => {
                gsap.fromTo('.dashboard-card', {
                    opacity: 0,
                    y: 20
                }, {
                    opacity: 1,
                    y: 0,
                    duration: 0.5,
                    stagger: 0.1,
                    ease: "power2.out"
                });
            };

            // Run animations
            animateElements();
        });
    </script>
</body>

</html>
