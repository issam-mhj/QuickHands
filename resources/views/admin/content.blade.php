<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Moderation - QuickHands Admin</title>
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
            background-color: #FF6B6B;
            color: white;
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
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Admin"
                        class="w-10 h-10 rounded-full border-2 border-white">
                    <div>
                        <h4 class="font-medium">John Doe</h4>
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
                <a href="#" class="nav-link active">
                    <i class="fas fa-shield-alt icon mr-3"></i>
                    <span>Content Moderation</span>
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-tasks icon mr-3"></i>
                    <span>Task Oversight</span>
                </a>
                <a href="#" class="nav-link">
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
                            Content <span class="gradient-text">Moderation</span>
                        </h1>
                        <p class="text-gray-600">Monitor and moderate platform content </p>
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
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Admin"
                                    class="w-8 h-8 rounded-full">
                                <span class="hidden md:block">John Doe</span>
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


            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-100 text-red-500">
                            <i class="fas fa-flag text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-sm font-medium text-gray-600">Pending Reports</h2>
                            <p class="text-2xl font-bold text-gray-800">24</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-red-500 text-sm font-medium">
                            <i class="fas fa-arrow-up mr-1"></i> 12%
                        </span>
                        <span class="text-gray-500 text-sm">since last week</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-500">
                            <i class="fas fa-star-half-alt text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-sm font-medium text-gray-600">Flagged Reviews</h2>
                            <p class="text-2xl font-bold text-gray-800">18</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-500 text-sm font-medium">
                            <i class="fas fa-arrow-down mr-1"></i> 5%
                        </span>
                        <span class="text-gray-500 text-sm">since last week</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                            <i class="fas fa-user-shield text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-sm font-medium text-gray-600">Flagged Users</h2>
                            <p class="text-2xl font-bold text-gray-800">7</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-red-500 text-sm font-medium">
                            <i class="fas fa-arrow-up mr-1"></i> 3%
                        </span>
                        <span class="text-gray-500 text-sm">since last week</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-500">
                            <i class="fas fa-check-circle text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-sm font-medium text-gray-600">Resolved Today</h2>
                            <p class="text-2xl font-bold text-gray-800">15</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-500 text-sm font-medium">
                            <i class="fas fa-arrow-up mr-1"></i> 8%
                        </span>
                        <span class="text-gray-500 text-sm">since yesterday</span>
                    </div>
                </div>
            </div>

            <!-- Tabs -->
            <div class="bg-gray-100 rounded-t-lg p-2 flex space-x-2 mb-0">
                <button class="tab-button active" data-tab="reviews">
                    <i class="fas fa-star mr-2"></i> Review Moderation
                </button>
                <button class="tab-button" data-tab="reports">
                    <i class="fas fa-flag mr-2"></i> Report Management
                </button>
                <button class="tab-button" data-tab="flagged">
                    <i class="fas fa-user-shield mr-2"></i> Flagged Users/Providers
                </button>
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
                                <tr class="bg-gray-50 text-gray-600 uppercase text-xs">
                                    <th class="py-3 px-4 text-left">User</th>
                                    <th class="py-3 px-4 text-left">Provider</th>
                                    <th class="py-3 px-4 text-left">Rating</th>
                                    <th class="py-3 px-4 text-left">Comment</th>
                                    <th class="py-3 px-4 text-left">Date</th>
                                    <th class="py-3 px-4 text-left">Flags</th>
                                    <th class="py-3 px-4 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200" id="reviews-table-body">
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="User"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">Sarah Johnson</p>
                                                <p class="text-xs text-gray-500">sarah.j@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="Provider"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">Mike Plumber</p>
                                                <p class="text-xs text-gray-500">Plumbing Services</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600 truncate w-48">Great service but used
                                            inappropriate language during the job.</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">Apr 12, 2023</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Inappropriate</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"
                                                onclick="openModal('viewReviewModal')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-yellow-600 hover:text-yellow-800"
                                                onclick="openModal('editReviewModal')">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800"
                                                onclick="openModal('removeReviewModal')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="User"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">Robert Chen</p>
                                                <p class="text-xs text-gray-500">robert.c@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="Provider"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">Elena Electrician</p>
                                                <p class="text-xs text-gray-500">Electrical Services</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600 truncate w-48">This provider is a scam! They
                                            charged me $500 for a 5-minute job!</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">Apr 10, 2023</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Disputed</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"
                                                onclick="openModal('viewReviewModal')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-yellow-600 hover:text-yellow-800"
                                                onclick="openModal('editReviewModal')">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800"
                                                onclick="openModal('removeReviewModal')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="User"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">Maria Lopez</p>
                                                <p class="text-xs text-gray-500">maria.l@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="Provider"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">David Cleaner</p>
                                                <p class="text-xs text-gray-500">Cleaning Services</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600 truncate w-48">Amazing service! Visit my
                                            website at www.scam-site.com for more reviews!</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">Apr 8, 2023</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Spam</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"
                                                onclick="openModal('viewReviewModal')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-yellow-600 hover:text-yellow-800"
                                                onclick="openModal('editReviewModal')">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800"
                                                onclick="openModal('removeReviewModal')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="User"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">James Wilson</p>
                                                <p class="text-xs text-gray-500">james.w@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="Provider"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">Sandra Painter</p>
                                                <p class="text-xs text-gray-500">Painting Services</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600 truncate w-48">Terrible service with offensive
                                            comments about my home decor.</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">Apr 5, 2023</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Offensive</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"
                                                onclick="openModal('viewReviewModal')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-yellow-600 hover:text-yellow-800"
                                                onclick="openModal('editReviewModal')">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800"
                                                onclick="openModal('removeReviewModal')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
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

                <!-- Report Management Tab -->
                <div id="reports-tab" class="tab-content">
                    <!-- Filters -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                        <div class="flex flex-col md:flex-row md:items-center space-y-3 md:space-y-0 md:space-x-4">
                            <div class="relative">
                                <input type="text" id="report-search" placeholder="Search reports..."
                                    class="border border-gray-300 rounded-md px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            </div>
                            <select
                                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">All Types</option>
                                <option value="review">Review</option>
                                <option value="task">Task</option>
                                <option value="message">Message</option>
                                <option value="profile">Profile</option>
                            </select>
                            <select
                                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">All Statuses</option>
                                <option value="pending">Pending</option>
                                <option value="investigating">Investigating</option>
                                <option value="resolved">Resolved</option>
                                <option value="dismissed">Dismissed</option>
                            </select>
                            <select
                                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">All Severity</option>
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <button
                                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition-colors"
                                onclick="resetFilters('report')">
                                <i class="fas fa-filter mr-2"></i> Reset Filters
                            </button>
                        </div>
                    </div>

                    <!-- Reports Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr class="bg-gray-50 text-gray-600 uppercase text-xs">
                                    <th class="py-3 px-4 text-left">ID</th>
                                    <th class="py-3 px-4 text-left">Reporter</th>
                                    <th class="py-3 px-4 text-left">Type</th>
                                    <th class="py-3 px-4 text-left">Content</th>
                                    <th class="py-3 px-4 text-left">Reason</th>
                                    <th class="py-3 px-4 text-left">Date</th>
                                    <th class="py-3 px-4 text-left">Severity</th>
                                    <th class="py-3 px-4 text-left">Status</th>
                                    <th class="py-3 px-4 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200" id="reports-table-body">
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <p class="text-sm font-medium">#R-2305</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="User"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">Thomas Brown</p>
                                                <p class="text-xs text-gray-500">thomas.b@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Message</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600 truncate w-48">Provider sent inappropriate
                                            messages asking for personal information</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">Harassment</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">Apr 15, 2023</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 text-xs rounded-full severity-high">High</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Pending</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"
                                                onclick="openModal('viewReportModal')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-green-600 hover:text-green-800"
                                                onclick="openModal('resolveReportModal')">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800"
                                                onclick="openModal('dismissReportModal')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <p class="text-sm font-medium">#R-2304</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="User"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">Lisa Wong</p>
                                                <p class="text-xs text-gray-500">lisa.w@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded">Profile</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600 truncate w-48">Provider profile contains false
                                            credentials and misleading information</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">False Information</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">Apr 14, 2023</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 text-xs rounded-full severity-medium">Medium</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Investigating</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"
                                                onclick="openModal('viewReportModal')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-green-600 hover:text-green-800"
                                                onclick="openModal('resolveReportModal')">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800"
                                                onclick="openModal('dismissReportModal')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <p class="text-sm font-medium">#R-2303</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="User"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">Kevin Smith</p>
                                                <p class="text-xs text-gray-500">kevin.s@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Task</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600 truncate w-48">Provider never showed up but
                                            marked task as complete</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">Fraud</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">Apr 13, 2023</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 text-xs rounded-full severity-high">High</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Resolved</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"
                                                onclick="openModal('viewReportModal')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-yellow-600 hover:text-yellow-800"
                                                onclick="openModal('reopenReportModal')">
                                                <i class="fas fa-redo"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <p class="text-sm font-medium">#R-2302</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="User"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">Amanda Davis</p>
                                                <p class="text-xs text-gray-500">amanda.d@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded">Review</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600 truncate w-48">Review contains offensive
                                            language and personal attacks</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">Offensive Content</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">Apr 11, 2023</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 text-xs rounded-full severity-low">Low</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Dismissed</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"
                                                onclick="openModal('viewReportModal')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-yellow-600 hover:text-yellow-800"
                                                onclick="openModal('reopenReportModal')">
                                                <i class="fas fa-redo"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="text-sm text-gray-600">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span
                                class="font-medium">18</span> reports
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

                <!-- Flagged Users/Providers Tab -->
                <div id="flagged-tab" class="tab-content">
                    <!-- Filters -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                        <div class="flex flex-col md:flex-row md:items-center space-y-3 md:space-y-0 md:space-x-4">
                            <div class="relative">
                                <input type="text" id="flagged-search" placeholder="Search users/providers..."
                                    class="border border-gray-300 rounded-md px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            </div>
                            <select
                                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">All Types</option>
                                <option value="user">User</option>
                                <option value="provider">Provider</option>
                            </select>
                            <select
                                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">All Violations</option>
                                <option value="spam">Spam</option>
                                <option value="harassment">Harassment</option>
                                <option value="fraud">Fraud</option>
                                <option value="inappropriate">Inappropriate Content</option>
                            </select>
                            <select
                                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">All Statuses</option>
                                <option value="active">Active</option>
                                <option value="warned">Warned</option>
                                <option value="suspended">Suspended</option>
                                <option value="banned">Banned</option>
                            </select>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <button
                                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition-colors"
                                onclick="resetFilters('flagged')">
                                <i class="fas fa-filter mr-2"></i> Reset Filters
                            </button>
                        </div>
                    </div>

                    <!-- Flagged Users/Providers Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr class="bg-gray-50 text-gray-600 uppercase text-xs">
                                    <th class="py-3 px-4 text-left">User/Provider</th>
                                    <th class="py-3 px-4 text-left">Type</th>
                                    <th class="py-3 px-4 text-left">Email</th>
                                    <th class="py-3 px-4 text-left">Violations</th>
                                    <th class="py-3 px-4 text-left">Reports</th>
                                    <th class="py-3 px-4 text-left">Last Violation</th>
                                    <th class="py-3 px-4 text-left">Status</th>
                                    <th class="py-3 px-4 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200" id="flagged-table-body">
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="User"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">Alex Johnson</p>
                                                <p class="text-xs text-gray-500">Member since Jan 2023</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">User</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">alex.j@example.com</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex flex-wrap gap-1">
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium px-2 py-0.5 rounded">Harassment</span>
                                            <span
                                                class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-0.5 rounded">Spam</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm font-medium text-red-600">5</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">Apr 16, 2023</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Warned</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"
                                                onclick="openModal('viewUserModal')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-yellow-600 hover:text-yellow-800"
                                                onclick="openModal('warnUserModal')">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800"
                                                onclick="openModal('suspendUserModal')">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="Provider"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">Michael Plumber</p>
                                                <p class="text-xs text-gray-500">Member since Nov 2022</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Provider</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">michael.p@example.com</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex flex-wrap gap-1">
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium px-2 py-0.5 rounded">Fraud</span>
                                            <span
                                                class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-0.5 rounded">False
                                                Info</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm font-medium text-red-600">8</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">Apr 15, 2023</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Suspended</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"
                                                onclick="openModal('viewUserModal')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-green-600 hover:text-green-800"
                                                onclick="openModal('reactivateUserModal')">
                                                <i class="fas fa-check-circle"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800"
                                                onclick="openModal('banUserModal')">
                                                <i class="fas fa-times-circle"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="User"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">Sarah Miller</p>
                                                <p class="text-xs text-gray-500">Member since Feb 2023</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">User</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">sarah.m@example.com</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex flex-wrap gap-1">
                                            <span
                                                class="bg-orange-100 text-orange-800 text-xs font-medium px-2 py-0.5 rounded">Inappropriate</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm font-medium text-red-600">3</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">Apr 10, 2023</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Warned</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"
                                                onclick="openModal('viewUserModal')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-yellow-600 hover:text-yellow-800"
                                                onclick="openModal('warnUserModal')">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800"
                                                onclick="openModal('suspendUserModal')">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <img src="/placeholder.svg?height=32&width=32" alt="Provider"
                                                class="h-8 w-8 rounded-full">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium">David Electrician</p>
                                                <p class="text-xs text-gray-500">Member since Dec 2022</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Provider</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">david.e@example.com</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex flex-wrap gap-1">
                                            <span
                                                class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-0.5 rounded">Spam</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm font-medium text-red-600">2</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <p class="text-sm text-gray-600">Apr 8, 2023</p>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Active</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"
                                                onclick="openModal('viewUserModal')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-yellow-600 hover:text-yellow-800"
                                                onclick="openModal('warnUserModal')">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800"
                                                onclick="openModal('suspendUserModal')">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="text-sm text-gray-600">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span
                                class="font-medium">7</span> flagged users/providers
                        </div>
                        <div class="flex space-x-1">
                            <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-600 hover:bg-gray-300">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="px-3 py-1 rounded-md bg-indigo-600 text-white">1</button>
                            <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-600 hover:bg-gray-300">2</button>
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

                // Add active class to selected tab and button
                const tabId = button.getAttribute('data-tab');
                document.getElementById(`${tabId}-tab`).classList.add('active');
                button.classList.add('active');
            });
        });

        // Modal functions
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Close modal when clicking outside
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

        // Scroll progress bar
        window.addEventListener('scroll', function() {
            const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercentage = (scrollTop / scrollHeight) * 100;
            document.getElementById('scroll-progress').style.width = scrollPercentage + '%';
        });
    </script>
</body>

</html>
