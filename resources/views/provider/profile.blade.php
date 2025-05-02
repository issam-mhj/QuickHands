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
                        <i class="fas fa-star mr-2"></i> Reviews
                    </a>
                </div>

                <div class="hidden md:flex space-x-2">
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg bg-primary text-white font-medium text-sm md:text-base">
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

    <main class="max-w-7xl mx-auto px-6 py-8">
        <div class="settings-card lg:col-span-1">
            <div class="flex flex-col items-center justify-center pb-6 border-b border-gray-100">
                <div class="mt-4 flex items-center space-x-2">
                    <h3 class="font-display text-xl font-semibold">{{ $user->name }}</h3>
                    <span class="px-3 py-1 rounded-full bg-primary/20 text-primary text-xs">Active</span>
                </div>
                <p class="text-gray-500 mt-1">Member since {{ $user->created_at->format('M Y') }}</p>
            </div>
            <div class="pt-6">
                <h4 class="font-medium mb-4">Account Summary</h4>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Account Status</span>
                        <span
                            class="text-success font-medium">{{ $user->is_suspended == 1 ? 'inactive' : 'active' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Role</span>
                        <span class="font-medium">{{ $user->role }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Last profile Change</span>
                        <span class="font-medium">{{ \Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Edit Form -->
        <div class="settings-card lg:col-span-2 mt-8">
            <h3 class="font-display text-xl font-semibold mb-6">Edit Profile Information</h3>
            <form action="/provider/updateprofile" method="POST" class="max-w-4xl mx-auto">
                @csrf
                <!-- Personal Information Section -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4 pb-2 border-b">Personal Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-group">
                            <label for="full_name" class="form-label block mb-1 font-medium">Full Name</label>
                            <input type="text" id="full_name" name="name"
                                class="form-input w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                                value="{{ old('name', $user->name) }}" required aria-required="true">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label block mb-1 font-medium">Email
                                Address</label>
                            <div class="relative">
                                <input type="email" {{ $user->role == 'admin' ? 'readonly' : '' }} id="email"
                                    name="email"
                                    class="form-input w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition
                                                {{ $user->role == 'admin' ? 'bg-gray-100' : '' }}"
                                    value="{{ old('email', $user->email) }}" required aria-required="true">
                                @if ($user->role == 'admin')
                                    <span
                                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-xs text-gray-500"
                                        aria-label="Admin emails cannot be changed">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 116 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="age" class="form-label block mb-1 font-medium">Age</label>
                            <input type="number" id="age" name="age"
                                class="form-input w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                                value="{{ old('age', $user->age ?? '') }}" min="18" max="120">
                            <p class="text-xs text-gray-500 mt-1">Must be 18 or older</p>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="form-label block mb-1 font-medium">Gender</label>
                            <select id="gender" name="gender"
                                class="form-select w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                                <option value="" disabled
                                    {{ old('gender', $user->gender ?? '') ? '' : 'selected' }}>Select gender
                                </option>
                                <option value="m"
                                    {{ old('gender', $user->gender ?? '') == 'm' ? 'selected' : '' }}>Male
                                </option>
                                <option value="f"
                                    {{ old('gender', $user->gender ?? '') == 'f' ? 'selected' : '' }}>Female
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Location Information -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4 pb-2 border-b">Location</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="form-group md:col-span-1">
                            <label for="location" class="form-label block mb-1 font-medium">Address</label>
                            <input type="text" id="location" name="location"
                                class="form-input w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                                value="{{ old('location', $user->location ?? '') }}">
                        </div>
                    </div>
                </div>

                <!-- Password Change -->
                <div class="border-t border-gray-200 pt-8 mt-8">
                    <h3 class="text-lg font-semibold mb-4">Security Settings</h3>
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 shadow-sm">
                        <h4 class="font-medium mb-4">Change Password</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="form-group">
                                <label for="current_password" class="form-label block mb-1 font-medium">Current
                                    Password</label>
                                <div class="relative">
                                    <input type="password" id="current_password" name="password"
                                        class="form-input pr-10 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                                    <button type="button"
                                        class="toggle-password absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500"
                                        data-target="current_password" aria-label="Toggle password visibility">
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
                            <div class="form-group">
                                <label for="new_password" class="form-label block mb-1 font-medium">New
                                    Password</label>
                                <div class="relative">
                                    <input type="password" id="new_password" name="new_password"
                                        class="form-input pr-10 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                                    <button type="button"
                                        class="toggle-password absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500"
                                        data-target="new_password" aria-label="Toggle password visibility">
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
                            <div class="form-group">
                                <label for="confirm_password" class="form-label block mb-1 font-medium">Confirm New
                                    Password</label>
                                <div class="relative">
                                    <input type="password" id="confirm_password" name="confirm_password"
                                        class="form-input pr-10 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                                    <button type="button"
                                        class="toggle-password absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500"
                                        data-target="confirm_password" aria-label="Toggle password visibility">
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
                        </div>
                        <!-- Continuing from the existing code -->
                        <div class="password-requirements mt-4 p-4 bg-blue-50 rounded-lg text-sm">
                            <h5 class="font-medium mb-2">Password Requirements:</h5>
                            <ul class="space-y-1 text-gray-600">
                                <li class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-blue-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    At least 8 characters long
                                </li>
                                <li class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-blue-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Include at least one uppercase letter
                                </li>
                                <li class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-blue-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Include at least one number
                                </li>
                                <li class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-blue-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Include at least one special character
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Skills Section - NEW -->
                <div class="border-t border-gray-200 pt-8 mt-8">
                    <h3 class="text-lg font-semibold mb-4">Professional Skills</h3>
                    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                        <div class="form-group">
                            <label for="skills" class="form-label block mb-1 font-medium">Your Skills</label>
                            <div class="space-y-2">
                                <input type="text" id="skills" name="skills"
                                    class="form-input w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                                    value="{{ old('skills', $user->provider->skills ?? '') }}"
                                    placeholder="e.g. Plumbing, Electrical work, Carpentry, Painting">
                                <p class="text-xs text-gray-500">Enter your skills separated by commas (e.g. Plumbing,
                                    Electrical work, Carpentry)</p>
                            </div>
                        </div>

                        <!-- Skills Preview Section -->
                        <div class="mt-4">
                            <h5 class="text-sm font-medium text-gray-600 mb-2">Current Skills:</h5>
                            <div id="skills-preview" class="flex flex-wrap gap-2">
                                @if (!empty($user->provider->skills))
                                    @foreach (explode(',', $user->provider->skills) as $skill)
                                        <span class="px-3 py-1 bg-secondary/20 text-secondary rounded-full text-sm">
                                            {{ trim($skill) }}
                                        </span>
                                    @endforeach
                                @else
                                    <span class="text-sm text-gray-500 italic">No skills added yet</span>
                                @endif
                            </div>
                        </div>

                        <!-- Skills Suggestions -->
                        <div class="mt-6">
                            <h5 class="text-sm font-medium text-gray-600 mb-2">Popular Skills:</h5>
                            <div class="flex flex-wrap gap-2">
                                <button type="button"
                                    class="skill-suggestion px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full text-sm transition-colors"
                                    data-skill="Plumbing">Plumbing</button>
                                <button type="button"
                                    class="skill-suggestion px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full text-sm transition-colors"
                                    data-skill="Electrical">Electrical</button>
                                <button type="button"
                                    class="skill-suggestion px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full text-sm transition-colors"
                                    data-skill="Carpentry">Carpentry</button>
                                <button type="button"
                                    class="skill-suggestion px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full text-sm transition-colors"
                                    data-skill="Painting">Painting</button>
                                <button type="button"
                                    class="skill-suggestion px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full text-sm transition-colors"
                                    data-skill="Gardening">Gardening</button>
                                <button type="button"
                                    class="skill-suggestion px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full text-sm transition-colors"
                                    data-skill="Cleaning">Cleaning</button>
                                <button type="button"
                                    class="skill-suggestion px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full text-sm transition-colors"
                                    data-skill="Assembly">Assembly</button>
                                <button type="button"
                                    class="skill-suggestion px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full text-sm transition-colors"
                                    data-skill="Moving">Moving</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Buttons -->
                <div class="flex justify-end space-x-4 mt-8">
                    <button type="reset"
                        class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-6 py-2 border border-transparent rounded-md shadow-sm text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-8 px-6 md:px-12 mt-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center mr-3">
                            <i class="fas fa-hands-helping text-primary text-lg"></i>
                        </div>
                        <h2 class="font-display text-xl font-bold">QuickHands</h2>
                    </div>
                    <p class="text-gray-400 mt-2 text-sm">Find help for all your tasks</p>
                </div>

                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <div class="border-t border-gray-700 my-6"></div>

            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} QuickHands Inc. All rights reserved.</p>

                <div class="flex flex-wrap space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Terms of
                        Service</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy
                        Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Contact Us</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript for skills functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle Password Visibility
            const toggleButtons = document.querySelectorAll('.toggle-password');
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const passwordInput = document.getElementById(targetId);

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        this.innerHTML = `
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
    </svg>
`;
                    } else {
                        passwordInput.type = 'password';
                        this.innerHTML = `
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
    </svg>
`;
                    }
                });
            });

            // Skills Functionality
            const skillsInput = document.getElementById('skills');
            const skillsPreview = document.getElementById('skills-preview');
            const skillSuggestions = document.querySelectorAll('.skill-suggestion');

            // Update skills preview on input change
            skillsInput.addEventListener('input', updateSkillsPreview);

            // Add skill suggestion on click
            skillSuggestions.forEach(button => {
                button.addEventListener('click', function() {
                    const skill = this.getAttribute('data-skill');
                    addSkill(skill);
                });
            });

            function updateSkillsPreview() {
                if (!skillsInput.value.trim()) {
                    skillsPreview.innerHTML =
                        '<span class="text-sm text-gray-500 italic">No skills added yet</span>';
                    return;
                }

                const skills = skillsInput.value.split(',').map(skill => skill.trim()).filter(skill => skill);

                skillsPreview.innerHTML = '';
                skills.forEach(skill => {
                    if (skill) {
                        const span = document.createElement('span');
                        span.className = 'px-3 py-1 bg-secondary/20 text-secondary rounded-full text-sm';
                        span.textContent = skill;
                        skillsPreview.appendChild(span);
                    }
                });
            }

            function addSkill(skill) {
                const currentSkills = skillsInput.value.split(',').map(s => s.trim()).filter(s => s);

                // Check if skill already exists
                if (!currentSkills.includes(skill)) {
                    if (currentSkills.length > 0 && currentSkills[0] !== '') {
                        skillsInput.value = currentSkills.join(', ') + ', ' + skill;
                    } else {
                        skillsInput.value = skill;
                    }
                    updateSkillsPreview();
                }
            }

            // Initialize skills preview
            updateSkillsPreview();
        });
    </script>
</body>

</html>
