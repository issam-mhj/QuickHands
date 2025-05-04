<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands Admin - Task Oversight</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&display=swap" rel="stylesheet">
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
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f8f9fa;
        }

        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(to right, #FF6B6B, #4ECDC4, #FFE66D);
            z-index: 50;
            width: 0%;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 16rem;
            background-color: #ffffff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.5s;
            z-index: 40;
            transform: translateX(0);
            border-right: 1px solid rgba(0, 0, 0, 0.05);
        }

        .sidebar.collapsed {
            transform: translateX(-100%);
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .sidebar-content {
            padding: 1rem;
            overflow-y: auto;
            height: calc(100% - 80px);
        }

        .sidebar-footer {
            padding: 1rem;
            border-top: 1px solid #f0f0f0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            transition: all 0.3s;
            margin-bottom: 0.5rem;
            color: #4b5563;
        }

        .nav-link:hover {
            background-color: #f3f4f6;
        }

        .nav-link.active {
            background-color: white;
            color: #FF6B6B;
            font-weight: 500;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .nav-link .icon {
            font-size: 1.125rem;
        }

        .sidebar-toggle {
            position: fixed;
            top: 1.5rem;
            left: 1.5rem;
            z-index: 50;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 9999px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .sidebar-toggle:hover {
            background-color: #FF6B6B;
            color: white;
        }

        .content {
            transition: all 0.3s;
            margin-left: 16rem;
            padding: 2rem 1.5rem;
        }

        .content.full-width {
            margin-left: 0;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .content {
                margin-left: 0;
            }
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .btn-primary {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }

        .btn-primary:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }

        .btn-outline-primary {
            color: #4f46e5;
            border-color: #4f46e5;
        }

        .btn-outline-primary:hover {
            background-color: #4f46e5;
            color: white;
        }

        .badge-primary {
            background-color: #4f46e5;
        }

        .badge-warning {
            background-color: #f59e0b;
            color: white;
        }

        .badge-danger {
            background-color: #ef4444;
        }

        .badge-success {
            background-color: #10b981;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .tab-button {
            padding: 10px 20px;
            border-radius: 8px 8px 0 0;
            cursor: pointer;
            transition: all 0.3s;
        }

        .tab-button.active {
            background-color: white;
            border-bottom: 3px solid #4f46e5;
            color: #4f46e5;
            font-weight: 600;
        }

        .tab-button:not(.active):hover {
            background-color: #f0f4ff;
        }

        .severity-high {
            background-color: #fee2e2;
            color: #b91c1c;
        }

        .severity-medium {
            background-color: #fef3c7;
            color: #92400e;
        }

        .severity-low {
            background-color: #e0f2fe;
            color: #0369a1;
        }

        .star-rating {
            color: #f59e0b;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            width: 60%;
            animation: modalFadeIn 0.3s;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .gradient-text {
            @apply text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: black;
        }

        .dropdown {
            position: absolute;
            right: 0;
            top: 100%;
            margin-top: 0.5rem;
            width: 16rem;
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s;
            opacity: 0;
            visibility: hidden;
            z-index: 30;
        }

        .dropdown.show {
            opacity: 1;
            visibility: visible;
        }

        .dropdown-item {
            padding: 0.75rem 1rem;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .dropdown-item:hover {
            background-color: #f3f4f6;
        }

        .dropdown-divider {
            border-top: 1px solid #f0f0f0;
            margin: 0.25rem 0;
        }

        .gradient-text {
            @apply text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary;
        }

        .notification-badge {
            position: absolute;
            top: -0.25rem;
            right: -0.25rem;
            width: 1.25rem;
            height: 1.25rem;
            border-radius: 9999px;
            background-color: #FF6B6B;
            color: white;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .modal-content {
                width: 90%;
            }
        }
    </style>
</head>

<body class="font-sans text-dark bg-gray-50">
    <!-- Scroll Progress Bar -->
    <div id="scroll-progress" class="scroll-progress"></div>

    <!-- Sidebar Toggle -->
    <button id="sidebar-toggle" class="sidebar-toggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <div class="sidebar-header">
            <div class="flex items-center">
                <a href="#" class="font-display font-bold text-2xl">
                    <span class="text-primary">Quick</span><span class="text-secondary">Hands</span>
                </a>
            </div>
        </div>
        <div class="sidebar-content">
            <div class="mb-8">
                <div class="flex items-center space-x-3 mb-4">
                    <img src="https://cdn.pixabay.com/photo/2018/11/13/22/01/avatar-3814081_1280.png" alt="Admin"
                        class="w-10 h-10 rounded-full border-2 border-white">
                    <div>
                        <h4 class="font-medium">{{ $user->name }}</h4>
                        <p class="text-xs text-gray-500">Super Admin</p>
                    </div>
                </div>
            </div>

            <nav class="space-y-2">
                <a href="simplified-dashboard.html" class="nav-link">
                    <i class="fas fa-chart-pie icon mr-3"></i>
                    <span>Dashboard</span>
                </a>
                <a href="user-management.html" class="nav-link">
                    <i class="fas fa-users icon mr-3"></i>
                    <span>User Management</span>
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-user-tie icon mr-3"></i>
                    <span>Provider Management</span>
                </a>
                <a href="/admin/content" class="nav-link">
                    <i class="fas fa-shield-alt icon mr-3"></i>
                    <span>Content Moderation</span>
                </a>
                <a href="#" class="nav-link active">
                    <i class="fas fa-tasks icon mr-3"></i>
                    <span>Task Oversight</span>
                </a>
                <a href="/admin/analytics" class="nav-link">
                    <i class="fas fa-chart-line icon mr-3"></i>
                    <span>Analytics & Reports</span>
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-bell icon mr-3"></i>
                    <span>Notifications</span>
                    <span
                        class="ml-auto bg-primary text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">8</span>
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-cog icon mr-3"></i>
                    <span>Settings</span>
                </a>
            </nav>

            <div class="mt-8 p-4 rounded-2xl bg-gray-50">
                <h5 class="font-medium mb-2">Need Help?</h5>
                <p class="text-sm text-gray-600 mb-3">Contact our support team for assistance</p>
                <a href="#" class="text-sm text-primary font-medium hover:underline">Get Support</a>
            </div>
        </div>
        <div class="sidebar-footer">
            <a href="#" class="flex items-center space-x-2 text-gray-500 hover:text-primary transition-colors">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div id="content" class="content">
        <div class="container mx-auto">
            <!-- Header -->
            <header class="mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="mb-4 md:mb-0">
                        <h1 class="font-display text-4xl font-bold mb-2">
                            Task <span class="gradient-text">Oversight</span>
                        </h1>
                        <p class="text-gray-600">Monitor and manage all tasks on the platform</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Search..." class="search-input">
                            <i
                                class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <div class="relative">
                            <button id="notifications-btn"
                                class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow-md hover:bg-primary/10 transition-colors">
                                <i class="fas fa-bell"></i>
                                <span class="notification-badge">5</span>
                            </button>
                            <div id="notifications-dropdown" class="dropdown">
                                <div class="p-4 border-b border-gray-100">
                                    <h5 class="font-medium">Notifications</h5>
                                    <p class="text-xs text-gray-500">You have 5 unread notifications</p>
                                </div>
                                <div class="max-h-64 overflow-y-auto">
                                    <a href="#" class="dropdown-item">
                                        <div
                                            class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center">
                                            <i class="fas fa-user-plus text-primary"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm">New user registered</p>
                                            <p class="text-xs text-gray-500">5 minutes ago</p>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <div
                                            class="w-8 h-8 rounded-full bg-secondary/20 flex items-center justify-center">
                                            <i class="fas fa-tasks text-secondary"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm">New task created</p>
                                            <p class="text-xs text-gray-500">1 hour ago</p>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <div
                                            class="w-8 h-8 rounded-full bg-accent/20 flex items-center justify-center">
                                            <i class="fas fa-star text-accent"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm">New review submitted</p>
                                            <p class="text-xs text-gray-500">3 hours ago</p>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <div
                                            class="w-8 h-8 rounded-full bg-success/20 flex items-center justify-center">
                                            <i class="fas fa-dollar-sign text-success"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm">Payment received</p>
                                            <p class="text-xs text-gray-500">Yesterday</p>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <div
                                            class="w-8 h-8 rounded-full bg-warning/20 flex items-center justify-center">
                                            <i class="fas fa-exclamation-triangle text-warning"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm">System alert</p>
                                            <p class="text-xs text-gray-500">2 days ago</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-3 border-t border-gray-100">
                                    <a href="#"
                                        class="text-center block text-sm text-primary hover:underline">View all
                                        notifications</a>
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <button id="user-btn"
                                class="flex items-center space-x-2 p-2 rounded-xl hover:bg-gray-100 transition-colors">
                                <img src="https://cdn.pixabay.com/photo/2018/11/13/22/01/avatar-3814081_1280.png" alt="Admin"
                                    class="w-8 h-8 rounded-full">
                                <span class="hidden md:block">{{ $user->name }}</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <div id="user-dropdown" class="dropdown">
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-user"></i>
                                    <span>My Profile</span>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-cog"></i>
                                    <span>Account Settings</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Tasks Card -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all duration-200 hover:shadow-md overflow-hidden relative">
                    <div class="flex justify-between items-start">
                        <div class="relative z-10">
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Tasks</h3>
                            <p class="text-3xl font-bold mt-2 text-gray-800">{{ $taskNum }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-indigo-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                    <div class="absolute bottom-0 right-0 opacity-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="112" height="112" fill="currentColor"
                            class="text-indigo-500" viewBox="0 0 16 16">
                            <path
                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2z" />
                            <path
                                d="M9.828 4h-2.193c-.33 0-.4.19-.4.385L7.235 8h3.77l-.305 2H5.975L5 5.975V5h5l-.445-1h-4.41L3 6.057V12h9l1.235-8.185C13.445 3.622 13.167 4 9.828 4z" />
                        </svg>
                    </div>
                </div>

                <!-- Active Tasks Card -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all duration-200 hover:shadow-md overflow-hidden relative">
                    <div class="flex justify-between items-start">
                        <div class="relative z-10">
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Active Tasks</h3>
                            <p class="text-3xl font-bold mt-2 text-gray-800">{{ $activeTaskNum }}</p>

                        </div>
                        <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="absolute bottom-0 right-0 opacity-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="112" height="112" fill="currentColor"
                            class="text-blue-500" viewBox="0 0 16 16">
                            <path
                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm-6.2-3.4A6.978 6.978 0 0 1 8 2a7 7 0 0 1 7 7 6.938 6.938 0 0 1-2.05 4.95l-7.15-7.15V7a.5.5 0 0 0 1 0V6a.5.5 0 0 0-1 0v.551L4.7 5.45A.5.5 0 1 0 4 6.17l1.1 1.1v.628a.5.5 0 0 0 1 0v-1.23l1.55 1.55a.5.5 0 1 0 .7-.7L7.345 6.45h.93a.5.5 0 0 0 0-1h-.93L8.45 4.35a.5.5 0 0 0-.7-.7L6 5.4V3.8A.5.5 0 0 0 5.5 4c-.178 0-.33.13-.347.304L9.05 8.1c.806.804 1.16 1.614 1.225 2.324.037.404-.074.773-.26 1.105l-.017-.004c-.324.21-.723.33-1.175.33C7.36 11.855 6.3 10.277 6.3 8a.5.5 0 0 0-.832-.374L1.8 12.6z" />
                        </svg>
                    </div>
                </div>

                <!-- Not Started Tasks Card -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all duration-200 hover:shadow-md overflow-hidden relative">
                    <div class="flex justify-between items-start">
                        <div class="relative z-10">
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Not Started Tasks
                            </h3>
                            <p class="text-3xl font-bold mt-2 text-gray-800">{{ $notStartedTasks }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-amber-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                    <div class="absolute bottom-0 right-0 opacity-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="112" height="112" fill="currentColor"
                            class="text-amber-500" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                        </svg>
                    </div>
                </div>

                <!-- Completion Rate Card -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all duration-200 hover:shadow-md overflow-hidden relative">
                    <div class="flex justify-between items-start">
                        <div class="relative z-10">
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Completion Rate</h3>
                            <p class="text-3xl font-bold mt-2 text-gray-800">{{ $rateCompleted }}%</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-emerald-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="absolute bottom-0 right-0 opacity-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="112" height="112" fill="currentColor"
                            class="text-emerald-500" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="bg-white rounded-b-lg shadow-sm p-6">
                <!-- Review Moderation Tab -->
                <div id="reviews-tab" class="tab-content active">
                    <!-- Filters -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                        <div class="flex flex-col md:flex-row md:items-center space-y-3 md:space-y-0 md:space-x-4">
                            <div class="relative">
                                <input type="text" id="review-search" placeholder="Search reviews..."
                                    class="border border-gray-300 rounded-md px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            </div>
                            <select
                                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">All Ratings</option>
                                <option value="5">5 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="2">2 Stars</option>
                                <option value="1">1 Star</option>
                            </select>
                            <select
                                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">All Flags</option>
                                <option value="inappropriate">Inappropriate</option>
                                <option value="spam">Spam</option>
                                <option value="offensive">Offensive</option>
                                <option value="false">False Information</option>
                            </select>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <button
                                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition-colors"
                                onclick="resetFilters('review')">
                                <i class="fas fa-filter mr-2"></i> Reset Filters
                            </button>
                        </div>
                    </div>

                    <!-- Reviews Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                        <div class="flex items-center">
                                            <span>Task ID</span>
                                            <i class="fas fa-sort ml-1"></i>
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                        <div class="flex items-center">
                                            <span>User</span>
                                            <i class="fas fa-sort ml-1"></i>
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                        <div class="flex items-center">
                                            <span>Provider</span>
                                            <i class="fas fa-sort ml-1"></i>
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                        <div class="flex items-center">
                                            <span>Type</span>
                                            <i class="fas fa-sort ml-1"></i>
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                        <div class="flex items-center">
                                            <span>Status</span>
                                            <i class="fas fa-sort ml-1"></i>
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                        <div class="flex items-center">
                                            <span>Start date</span>
                                            <i class="fas fa-sort ml-1"></i>
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                        <div class="flex items-center">
                                            <span>End date</span>
                                            <i class="fas fa-sort ml-1"></i>
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                        <div class="flex items-center">
                                            <span>Budget</span>
                                            <i class="fas fa-sort ml-1"></i>
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white" id="reviews-table-body">
                                @foreach ($tasks as $task)
                                    <tr class="transition-colors hover:bg-gray-50">
                                        <!-- Task ID Column -->
                                        <td class="whitespace-nowrap py-4 px-4">
                                            <div class="flex items-center">
                                                <span
                                                    class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-xs font-medium text-blue-700">
                                                    {{ $task->id . \Carbon\Carbon::parse($task->created_at)->format('d') }}
                                                </span>
                                            </div>
                                        </td>

                                        <!-- Service User Column -->
                                        <td class="py-4 px-4">
                                            <div class="flex flex-col">
                                                <p class="text-sm font-medium text-gray-900">
                                                    {{ $task->offer->service->user->name }}</p>
                                                <p class="text-xs text-gray-500">Service User</p>
                                            </div>
                                        </td>

                                        <!-- Provider Column -->
                                        <td class="py-4 px-4">
                                            <div class="flex flex-col">
                                                <p class="text-sm font-medium text-gray-900">
                                                    {{ $task->offer->provider->user->name }}</p>
                                                <p class="text-xs text-gray-500">Provider</p>
                                            </div>
                                        </td>

                                        <!-- Service Category Column -->
                                        <td class="py-4 px-4">
                                            <span
                                                class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-800">
                                                {{ $task->offer->service->serviceCategory->name }}
                                            </span>
                                        </td>

                                        <!-- Status Column -->
                                        <td class="py-4 px-4">
                                            @php
                                                $statusColor = 'gray';
                                                if ($task->status == 'completed') {
                                                    $statusColor = 'green';
                                                } elseif ($task->status == 'in progress') {
                                                    $statusColor = 'blue';
                                                } elseif ($task->status == 'pending') {
                                                    $statusColor = 'yellow';
                                                } elseif ($task->status == 'cancelled') {
                                                    $statusColor = 'red';
                                                }
                                            @endphp
                                            <span
                                                class="inline-flex rounded-full bg-{{ $statusColor }}-100 px-3 py-1 text-xs font-medium text-{{ $statusColor }}-800">
                                                {{ ucfirst($task->status) }}
                                            </span>
                                        </td>

                                        <!-- Start Date Column -->
                                        <td class="py-4 px-4">
                                            <div class="flex flex-col">
                                                <p class="text-sm font-medium text-gray-900">
                                                    {{ \Carbon\Carbon::parse($task->start_date)->format('M d, Y') }}
                                                </p>
                                                <p class="text-xs text-gray-500">Start Date</p>
                                            </div>
                                        </td>

                                        <!-- End Date Column -->
                                        <td class="py-4 px-4">
                                            <div class="flex flex-col">
                                                @if (\Carbon\Carbon::parse($task->end_date)->isPast())
                                                    <p class="text-sm font-medium text-red-600">
                                                        {{ \Carbon\Carbon::parse($task->end_date)->format('M d, Y') }}
                                                    </p>
                                                    <p class="text-xs text-red-500">Overdue</p>
                                                @else
                                                    <p class="text-sm font-medium text-gray-900">
                                                        {{ \Carbon\Carbon::parse($task->end_date)->format('M d, Y') }}
                                                    </p>
                                                    <p class="text-xs text-gray-500">End Date</p>
                                                @endif
                                            </div>
                                        </td>

                                        <!-- Amount Column -->
                                        <td class="py-4 px-4">
                                            <p class="text-right text-sm font-medium text-gray-900">
                                                ${{ number_format($task->offer->proposed_amount, 2) }}</p>
                                        </td>

                                        <!-- Actions Column -->
                                        <td class="whitespace-nowrap py-4 px-4">
                                            <div class="flex items-center space-x-3">
                                                <a href="/admin/providermanage"
                                                    class="rounded-full bg-green-100 p-2 text-green-600 transition-colors hover:bg-green-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <form action="/removetask/{{ $task->id }}" method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="rounded-full bg-red-100 p-2 text-red-600 transition-colors hover:bg-red-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd" />
                                                        </svg>
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
                    <div class="flex items-center justify-between mt-6">
                        <div class="text-sm text-gray-600">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span
                                class="font-medium">24</span> reviews
                        </div>
                        <div class="flex space-x-1">
                            <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-600 hover:bg-gray-300">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="px-3 py-1 rounded-md bg-indigo-600 text-white">1</button>
                            <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-600 hover:bg-gray-300">2</button>
                            <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-600 hover:bg-gray-300">3</button>
                            <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-600 hover:bg-gray-300">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <!-- View Review Modal -->
    <div id="viewReviewModal" class="modal">
        <div class="modal-content max-w-2xl">
            <span class="close" onclick="closeModal('viewReviewModal')">&times;</span>
            <h2 class="text-xl font-bold mb-4">Review Details</h2>
            <div class="mb-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <img src="/placeholder.svg?height=48&width=48" alt="User" class="h-12 w-12 rounded-full">
                        <div class="ml-3">
                            <p class="text-sm font-medium">Sarah Johnson</p>
                            <p class="text-xs text-gray-500">sarah.j@example.com</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-600">Apr 12, 2023</p>
                        <div class="star-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-1">Provider</h3>
                    <div class="flex items-center">
                        <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="h-10 w-10 rounded-full">
                        <div class="ml-3">
                            <p class="text-sm font-medium">Mike Plumber</p>
                            <p class="text-xs text-gray-500">Plumbing Services</p>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-1">Review Content</h3>
                    <p class="text-sm text-gray-600 p-3 bg-gray-50 rounded-md">
                        Great service but used inappropriate language during the job. He fixed my sink perfectly but
                        kept swearing and making uncomfortable jokes. I appreciate the quality work but the behavior was
                        unprofessional. Would recommend his skills but hope he can be more professional with customers
                        in the future.
                    </p>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-1">Flags</h3>
                    <div class="flex flex-wrap gap-2">
                        <span
                            class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Inappropriate</span>
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Reported
                            by Provider</span>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-1">Report Reason</h3>
                    <p class="text-sm text-gray-600 p-3 bg-gray-50 rounded-md">
                        This review contains false information. I never used inappropriate language and maintained
                        professional behavior throughout the service.
                    </p>
                </div>
            </div>
            <div class="flex justify-end space-x-3">
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300"
                    onclick="closeModal('viewReviewModal')">Close</button>
                <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600"
                    onclick="closeModal('viewReviewModal')">Edit Review</button>
                <button class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600"
                    onclick="closeModal('viewReviewModal')">Remove Review</button>
            </div>
        </div>
    </div>

    <!-- View Report Modal -->
    <div id="viewReportModal" class="modal">
        <div class="modal-content max-w-2xl">
            <span class="close" onclick="closeModal('viewReportModal')">&times;</span>
            <h2 class="text-xl font-bold mb-4">Report Details</h2>
            <div class="mb-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-sm font-medium">Report ID: #R-2305</p>
                        <p class="text-xs text-gray-500">Submitted on Apr 15, 2023</p>
                    </div>
                    <div>
                        <span
                            class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Pending</span>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-1">Reporter</h3>
                    <div class="flex items-center">
                        <img src="/placeholder.svg?height=40&width=40" alt="User" class="h-10 w-10 rounded-full">
                        <div class="ml-3">
                            <p class="text-sm font-medium">Thomas Brown</p>
                            <p class="text-xs text-gray-500">thomas.b@example.com</p>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-1">Report Type</h3>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Message</span>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-1">Reported Content</h3>
                    <div class="p-3 bg-gray-50 rounded-md">
                        <p class="text-sm text-gray-600 mb-2">Provider sent inappropriate messages asking for personal
                            information</p>
                        <div class="border-l-4 border-gray-300 pl-3">
                            <p class="text-sm italic text-gray-600">
                                "Hey, I need your personal address and credit card details to verify your identity
                                before I come to your house. Also, will you be alone when I arrive? Please send me your
                                social media profiles so I can check you're a real person."
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-1">Reported User/Provider</h3>
                    <div class="flex items-center">
                        <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="h-10 w-10 rounded-full">
                        <div class="ml-3">
                            <p class="text-sm font-medium">John Handyman</p>
                            <p class="text-xs text-gray-500">john.h@example.com</p>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-1">Reason</h3>
                    <p class="text-sm text-gray-600">Harassment</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-1">Severity</h3>
                    <span class="px-2 py-1 text-xs rounded-full severity-high">High</span>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-1">Additional Notes</h3>
                    <p class="text-sm text-gray-600 p-3 bg-gray-50 rounded-md">
                        This is the second time this provider has asked for personal information. I've already reported
                        them once before. I feel unsafe using the platform with providers like this.
                    </p>
                </div>
            </div>
            <div class="flex justify-end space-x-3">
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300"
                    onclick="closeModal('viewReportModal')">Close</button>
                <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600"
                    onclick="closeModal('viewReportModal')">Investigate</button>
                <button class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600"
                    onclick="closeModal('viewReportModal')">Resolve</button>
                <button class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600"
                    onclick="closeModal('viewReportModal')">Dismiss</button>
            </div>
        </div>
    </div>

    <!-- View User Modal -->
    <div id="viewUserModal" class="modal">
        <div class="modal-content max-w-2xl">
            <span class="close" onclick="closeModal('viewUserModal')">&times;</span>
            <h2 class="text-xl font-bold mb-4">User/Provider Details</h2>
            <div class="mb-6">
                <div class="flex items-center mb-4">
                    <img src="/placeholder.svg?height=64&width=64" alt="User" class="h-16 w-16 rounded-full">
                    <div class="ml-4">
                        <p class="text-lg font-medium">Alex Johnson</p>
                        <div class="flex items-center">
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded mr-2">User</span>
                            <span
                                class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Warned</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Member since Jan 2023</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-1">Contact Information</h3>
                        <p class="text-sm text-gray-600">Email: alex.j@example.com</p>
                        <p class="text-sm text-gray-600">Phone: (555) 123-4567</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-1">Location</h3>
                        <p class="text-sm text-gray-600">City: New York</p>
                        <p class="text-sm text-gray-600">State: NY</p>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-1">Violations</h3>
                    <div class="flex flex-wrap gap-2 mb-2">
                        <span
                            class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Harassment</span>
                        <span
                            class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Spam</span>
                    </div>
                    <p class="text-sm text-gray-600">Total Reports: <span class="font-medium text-red-600">5</span>
                    </p>
                    <p class="text-sm text-gray-600">Last Violation: Apr 16, 2023</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-1">Violation History</h3>
                    <div class="overflow-y-auto max-h-40 bg-gray-50 rounded-md p-3">
                        <div class="mb-3 pb-3 border-b border-gray-200">
                            <div class="flex justify-between">
                                <p class="text-sm font-medium">Harassment</p>
                                <p class="text-xs text-gray-500">Apr 16, 2023</p>
                            </div>
                            <p class="text-sm text-gray-600">Sent threatening messages to provider after service
                                completion.</p>
                        </div>
                        <div class="mb-3 pb-3 border-b border-gray-200">
                            <div class="flex justify-between">
                                <p class="text-sm font-medium">Spam</p>
                                <p class="text-xs text-gray-500">Apr 10, 2023</p>
                            </div>
                            <p class="text-sm text-gray-600">Posted multiple fake reviews with promotional links.</p>
                        </div>
                        <div class="mb-3 pb-3 border-b border-gray-200">
                            <div class="flex justify-between">
                                <p class="text-sm font-medium">Harassment</p>
                                <p class="text-xs text-gray-500">Mar 28, 2023</p>
                            </div>
                            <p class="text-sm text-gray-600">Used offensive language towards customer support.</p>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-1">Actions Taken</h3>
                    <div class="overflow-y-auto max-h-40 bg-gray-50 rounded-md p-3">
                        <div class="mb-3 pb-3 border-b border-gray-200">
                            <div class="flex justify-between">
                                <p class="text-sm font-medium">Warning Issued</p>
                                <p class="text-xs text-gray-500">Apr 16, 2023</p>
                            </div>
                            <p class="text-sm text-gray-600">Final warning issued for harassment violation.</p>
                        </div>
                        <div class="mb-3 pb-3 border-b border-gray-200">
                            <div class="flex justify-between">
                                <p class="text-sm font-medium">Warning Issued</p>
                                <p class="text-xs text-gray-500">Apr 10, 2023</p>
                            </div>
                            <p class="text-sm text-gray-600">Warning issued for spam violation.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end space-x-3">
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300"
                    onclick="closeModal('viewUserModal')">Close</button>
                <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600"
                    onclick="closeModal('viewUserModal')">Send Warning</button>
                <button class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600"
                    onclick="closeModal('viewUserModal')">Suspend Account</button>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');

            sidebar.classList.toggle('collapsed');
            sidebar.classList.toggle('mobile-open');

            if (window.innerWidth >= 768) {
                content.classList.toggle('full-width');
            }
        });

        // Check screen size on load and resize
        function checkScreenSize() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            const sidebarToggle = document.getElementById('sidebar-toggle');

            if (window.innerWidth < 768) {
                sidebar.classList.add('collapsed');
                content.classList.add('full-width');
                sidebarToggle.innerHTML = '<i class="fas fa-bars"></i>';
            } else {
                sidebar.classList.remove('collapsed');
                sidebar.classList.remove('mobile-open');
                content.classList.remove('full-width');
                sidebarToggle.innerHTML = '<i class="fas fa-bars"></i>';
            }
        }

        // Check on load and resize
        window.addEventListener('load', checkScreenSize);
        window.addEventListener('resize', checkScreenSize);

        // Tab switching
        const tabButtons = document.querySelectorAll('.tab-button');
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all tabs and buttons
                document.querySelectorAll('.tab-content').forEach(tab => {
                    tab.classList.remove('active');
                });
                tabButtons.forEach(btn => {
                    btn.classList.remove('active');
                });

                const tabId = button.getAttribute('data-tab');
                document.getElementById(`${tabId}-tab`).classList.add('active');
                button.classList.add('active');
            });
        });

        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        window.onclick = function(event) {
            const modals = document.getElementsByClassName('modal');
            for (let i = 0; i < modals.length; i++) {
                if (event.target == modals[i]) {
                    modals[i].style.display = 'none';
                }
            }
        }

        // Search functionality
        document.getElementById('review-search').addEventListener('input', function() {
            filterTable('reviews-table-body', this.value);
        });

        document.getElementById('report-search').addEventListener('input', function() {
            filterTable('reports-table-body', this.value);
        });

        document.getElementById('flagged-search').addEventListener('input', function() {
            filterTable('flagged-table-body', this.value);
        });

        function filterTable(tableId, query) {
            const table = document.getElementById(tableId);
            const rows = table.getElementsByTagName('tr');
            query = query.toLowerCase();

            for (let i = 0; i < rows.length; i++) {
                const rowText = rows[i].textContent.toLowerCase();
                if (rowText.includes(query)) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }

        // Reset filters
        function resetFilters(tabType) {
            if (tabType === 'review') {
                document.getElementById('review-search').value = '';
                filterTable('reviews-table-body', '');
            } else if (tabType === 'report') {
                document.getElementById('report-search').value = '';
                filterTable('reports-table-body', '');
            } else if (tabType === 'flagged') {
                document.getElementById('flagged-search').value = '';
                filterTable('flagged-table-body', '');
            }

            // Reset all select elements in the active tab
            const activeTab = document.querySelector('.tab-content.active');
            const selects = activeTab.querySelectorAll('select');
            selects.forEach(select => {
                select.selectedIndex = 0;
            });
        }

        // Export report functionality
        function exportReport() {
            const activeTab = document.querySelector('.tab-content.active');
            const tabId = activeTab.id;
            let reportType = '';

            if (tabId === 'reviews-tab') {
                reportType = 'Reviews';
            } else if (tabId === 'reports-tab') {
                reportType = 'Reports';
            } else if (tabId === 'flagged-tab') {
                reportType = 'Flagged Users/Providers';
            }

            const date = new Date().toISOString().slice(0, 10);
            const filename = `${reportType}_Report_${date}.csv`;

            // In a real application, this would generate a CSV file with the data
            alert(`Exporting ${reportType} report as ${filename}`);

            // Simulate download
            const element = document.createElement('a');
            element.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent('Sample CSV data for ' +
                reportType));
            element.setAttribute('download', filename);
            element.style.display = 'none';
            document.body.appendChild(element);
            element.click();
            document.body.removeChild(element);
        }

        window.addEventListener('scroll', function() {
            const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercentage = (scrollTop / scrollHeight) * 100;
            document.getElementById('scroll-progress').style.width = scrollPercentage + '%';
        });
    </script>
</body>

</html>
