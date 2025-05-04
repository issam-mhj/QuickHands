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
                        primary: '#FF6B6B',
                        secondary: '#4ECDC4',
                        accent: '#FFE66D',
                        dark: '#1A535C',
                        light: '#F7FFF7',
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
    <nav class="sticky top-0 z-30 bg-white shadow-md py-4 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between overflow-x-auto hide-scrollbar">
                <div class="flex space-x-1 md:space-x-4">
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-chart-line mr-2"></i> Dashboard
                    </a>
                    <a href="/provider/task"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-tasks mr-2"></i> Available Tasks
                    </a>
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg bg-primary text-white font-medium text-sm md:text-base">
                        <i class="fas fa-clipboard-list mr-2"></i> Task Management
                    </a>
                    <a href="/provider/reviews"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-star mr-2"></i> Reviews
                    </a>
                </div>

                <div class="hidden md:flex space-x-2">
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
        </div>

        <!-- Task Management Tabs -->
        <div class="mb-8">
            <div class="border-b border-gray-200">
                <div class="flex overflow-x-auto hide-scrollbar">
                    <button class="tab-button active mx-6" data-tab="active-tasks">
                        Active Tasks
                    </button>
                    <button class="tab-button mx-6" data-tab="calendar">
                        pending offers
                    </button>
                    <button class="tab-button mx-6" data-tab="task-history">
                        Task History
                    </button>
                    <button class="tab-button mx-6" data-tab="disputes">
                        flags
                    </button>
                </div>
            </div>
        </div>

        <!-- Active Tasks Tab Content -->
        <div id="active-tasks" class="tab-content">
            <!-- Task Categories -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="dashboard-card">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-medium">Today</h3>
                        <span
                            class="w-6 h-6 rounded-full bg-primary text-white text-xs flex items-center justify-center">{{ $todayTasks }}</span>
                    </div>
                    <p class="text-sm text-gray-500 mb-2">Tasks will finish today</p>
                    <div class="w-full h-1 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full" style="width: 100%;"></div>
                    </div>
                </div>

                <div class="dashboard-card">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-medium">Upcoming</h3>
                        <span
                            class="w-6 h-6 rounded-full bg-blue-500 text-white text-xs flex items-center justify-center">{{ $futureTasks }}</span>
                    </div>
                    <p class="text-sm text-gray-500 mb-2">Tasks will finish in the future</p>
                    <div class="w-full h-1 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-blue-500 rounded-full" style="width: 100%;"></div>
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-medium">Pending Review</h3>
                        <span
                            class="w-6 h-6 rounded-full bg-purple-500 text-white text-xs flex items-center justify-center">{{ $notstarted }}</span>
                    </div>
                    <p class="text-sm text-gray-500 mb-2">Completed tasks awaiting review</p>
                    <div class="w-full h-1 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-purple-500 rounded-full" style="width: 100%;"></div>
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
                            @foreach ($tasks as $task)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center mr-3">
                                                <i class="fas fa-wrench text-blue-500"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium">{{ $task->offer->service->title }}</p>
                                                <p class="text-xs text-gray-500">{{ $task->offer->service->location }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <span>{{ $task->offer->service->user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <p class="font-medium">
                                            {{ \Carbon\Carbon::parse($task->created_at)->format('M d, Y') }}</p>
                                    </td>
                                    <td class="py-4">
                                        <span class="status-pill in-progress">{{ $task->status }}</span>
                                    </td>
                                    <td class="py-4">
                                        <p class="font-medium">${{ $task->offer->proposed_amount }}</p>
                                    </td>
                                    <td class="py-4">
                                        <div class="flex space-x-2">
                                            <button
                                                class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                                title="Message Client">
                                                <i class="fas fa-comment"></i>
                                            </button>
                                            <form action="/startedTask/{{ $task->id }}" method="post">
                                                @csrf
                                                <button
                                                    {{ $task->status == 'in-progress' || $task->status == 'completed' ? 'disabled' : '' }}
                                                    class="p-2 bg-green-100 hover:bg-green-200 rounded-lg text-green-600 transition-colors"
                                                    title="Mark as started">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="calendar" class="tab-content hidden">
            <div class="dashboard-card mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-display text-xl font-semibold">Pending Offers</h3>
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <input type="text" placeholder="Search offers..."
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
                                <th class="pb-3 text-left font-medium text-gray-500">Offered Amount</th>
                                <th class="pb-3 text-left font-medium text-gray-500">Estimated Time</th>
                                <th class="pb-3 text-left font-medium text-gray-500">Desired Time</th>
                                <th class="pb-3 text-left font-medium text-gray-500">Status</th>
                                <th class="pb-3 text-left font-medium text-gray-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendingOffers as $offer)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center mr-3">
                                                <i class="fas fa-brush text-green-500"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium">{{ $offer->service->title }}</p>
                                                <p class="text-xs text-gray-500">
                                                    {{ $offer->service->servicecategory->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <span>{{ $offer->service->user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <p class="font-medium">${{ $offer->proposed_amount }}</p>
                                        <p class="text-xs text-gray-500">Materials included</p>
                                    </td>
                                    <td class="py-4">
                                        <p class="font-medium">{{ $offer->estimated_time }} hours</p>
                                    </td>
                                    <td class="py-4">
                                        <p class="font-medium">{{ $offer->service->desired_date }}</p>
                                    </td>
                                    <td class="py-4">
                                        <span class="status-pill pending">{{ $offer->status }}</span>
                                    </td>
                                    <td class="py-4">
                                        <div class="flex space-x-2">
                                            <a href="/provider/task"
                                                class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600 transition-colors"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="/offer/delete/{{ $offer->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    class="p-2 bg-red-100 hover:bg-red-200 rounded-lg text-red-600 transition-colors"
                                                    title="Withdraw Offer">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($finishedTasks as $task)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center mr-3">
                                                <i class="fas fa-paint-roller text-green-500"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium">{{ $task->offer->service->title }}</p>
                                                <p class="text-xs text-gray-500">
                                                    {{ $task->offer->service->servicecategory->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <span>{{ $task->offer->service->user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <p class="font-medium">
                                            {{ \Carbon\Carbon::parse($task->end_date)->format('M d, Y') }}</p>
                                    </td>
                                    <td class="py-4">
                                        <span class="status-pill completed">{{ $task->status }}</span>
                                    </td>
                                    <td class="py-4">
                                        <p class="font-medium">${{ $task->offer->proposed_amount }}</p>
                                    </td>
                                </tr>
                            @endforeach
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
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <!-- Header with Stats Summary -->
                <div class="mb-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Flags</h2>
                            <p class="text-sm text-gray-500">Monitor all flag notifications in one place</p>
                        </div>
                        <div class="flex items-center bg-gray-50 rounded-lg p-2">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-500 text-white flex items-center justify-center text-sm font-medium">
                                    {{ $flagsNum }}
                                </div>
                                <span class="text-sm font-medium text-gray-700">Total Flags</span>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Indicator -->
                    <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-red-500 rounded-full" style="width: 100%;"></div>
                    </div>
                </div>

                <!-- Filter Controls -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Flag Details</h3>
                    <div class="flex items-center space-x-2">
                        <label for="sort" class="text-sm text-gray-500">Sort by:</label>
                        <select id="sort"
                            class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-500/20 hover:border-gray-300 transition-colors">
                            <option>Date (Newest First)</option>
                            <option>Date (Oldest First)</option>
                            <option>Status</option>
                            <option>Content Type</option>
                        </select>
                    </div>
                </div>

                <!-- Flag Table -->
                <div class="overflow-x-auto -mx-6">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50">
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Content</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Reason</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @foreach ($flags as $flag)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 w-10 h-10 rounded-lg flex items-center justify-center mr-3
                              {{ $flag->content_type == 'comment'
                                  ? 'bg-blue-100 text-blue-600'
                                  : ($flag->content_type == 'post'
                                      ? 'bg-purple-100 text-purple-600'
                                      : 'bg-gray-100 text-gray-600') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900">{{ $flag->content_type }}</p>
                                                <p class="text-xs text-gray-500">ID: {{ substr($flag->id, 0, 8) }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $flag->reason == 'spam'
                                ? 'bg-red-100 text-red-800'
                                : ($flag->reason == 'inappropriate'
                                    ? 'bg-orange-100 text-orange-800'
                                    : 'bg-gray-100 text-gray-800') }}">
                                            {{ $flag->reason }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">
                                                {{ \Carbon\Carbon::parse($flag->created_at)->format('M d, Y') }}</p>
                                            <p class="text-xs text-gray-500">
                                                {{ \Carbon\Carbon::parse($flag->created_at)->format('h:i A') }}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $flag->status == 'resolved'
                                ? 'bg-green-100 text-green-800'
                                : ($flag->status == 'pending'
                                    ? 'bg-yellow-100 text-yellow-800'
                                    : 'bg-blue-100 text-blue-800') }}">
                                            {{ $flag->status }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Empty State -->
                    @if (count($flags) === 0)
                        <div class="flex flex-col items-center justify-center py-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                            </svg>
                            <p class="mt-2 text-gray-500">No flags to display</p>
                        </div>
                    @endif
                </div>

                <!-- Pagination (if needed) -->
                @if (count($flags) > 0)
                    <div class="flex justify-center sm:justify-end mt-6">
                        <nav class="inline-flex rounded-md shadow-sm">
                            <a href="#"
                                class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                Previous
                            </a>
                            <a href="#"
                                class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                1
                            </a>
                            <a href="#"
                                class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                2
                            </a>
                            <a href="#"
                                class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                Next
                            </a>
                        </nav>
                    </div>
                @endif
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
