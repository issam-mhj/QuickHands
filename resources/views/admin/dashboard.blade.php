<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
    <style type="text/tailwindcss">
        @layer components {
            .dashboard-card {
                @apply relative overflow-hidden rounded-2xl p-6 shadow-lg transition-all duration-300 hover:shadow-xl bg-white border border-gray-100;
            }

            .dashboard-card:hover {
                @apply transform -translate-y-1;
            }

            .stat-card {
                @apply relative overflow-hidden rounded-2xl p-6 shadow-lg transition-all duration-300 bg-white border border-gray-100;
            }

            .stat-card:hover {
                @apply transform -translate-y-1;
            }

            .stat-card.users {
                @apply border-l-4 border-l-primary;
            }

            .stat-card.providers {
                @apply border-l-4 border-l-secondary;
            }

            .stat-card.tasks {
                @apply border-l-4 border-l-accent;
            }

            .stat-card.revenue {
                @apply border-l-4 border-l-success;
            }

            .nav-link {
                @apply flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-300;
            }

            .nav-link:hover {
                @apply bg-gray-100;
            }

            .nav-link.active {
                @apply bg-white text-primary font-medium shadow-md;
            }

            .nav-link .icon {
                @apply text-lg;
            }

            .gradient-text {
                @apply text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary;
            }

            .progress-bar {
                @apply h-2 rounded-full overflow-hidden bg-gray-200;
            }

            .progress-bar .progress {
                @apply h-full rounded-full transition-all duration-500;
            }

            .table-container {
                @apply rounded-2xl overflow-hidden shadow-lg bg-white border border-gray-100;
            }

            .table-header {
                @apply bg-gray-50 text-dark font-medium py-4 px-6;
            }

            .table-row {
                @apply border-b border-gray-100 transition-colors duration-300;
            }

            .table-row:hover {
                @apply bg-gray-50;
            }

            .table-cell {
                @apply py-4 px-6;
            }

            .badge {
                @apply px-3 py-1 rounded-full text-xs font-medium;
            }

            .badge-primary {
                @apply bg-primary/20 text-primary;
            }

            .badge-secondary {
                @apply bg-secondary/20 text-secondary;
            }

            .badge-accent {
                @apply bg-accent/20 text-dark;
            }

            .badge-success {
                @apply bg-success/20 text-success;
            }

            .badge-warning {
                @apply bg-warning/20 text-warning;
            }

            .badge-danger {
                @apply bg-danger/20 text-danger;
            }

            .quick-action {
                @apply flex flex-col items-center justify-center p-4 rounded-2xl transition-all duration-300 bg-white border border-gray-100;
            }

            .quick-action:hover {
                @apply shadow-lg transform -translate-y-1 bg-gray-50;
            }

            .quick-action .icon {
                @apply text-2xl mb-2 transition-all duration-300;
            }

            .quick-action:hover .icon {
                @apply transform scale-110;
            }

            .notification-dot {
                @apply absolute top-0 right-0 w-2 h-2 bg-primary rounded-full;
            }

            .search-input {
                @apply w-full px-4 py-2 pl-10 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300;
            }

            .scroll-progress {
                @apply fixed top-0 left-0 h-1 bg-gradient-to-r from-primary via-secondary to-accent z-50;
                width: 0%;
            }

            .chart-container {
                @apply relative rounded-2xl overflow-hidden;
                min-height: 300px;
            }

            .chart-container canvas {
                @apply rounded-2xl;
            }

            .chart-overlay {
                @apply absolute inset-0 flex items-center justify-center bg-white/80 opacity-0 transition-opacity duration-300;
                z-index: 10;
            }

            .chart-container:hover .chart-overlay {
                @apply opacity-100;
            }

            .task-type {
                @apply flex items-center space-x-2 mb-2;
            }

            .task-type-dot {
                @apply w-3 h-3 rounded-full;
            }

            .task-type-label {
                @apply text-sm text-gray-600;
            }

            .animated-number {
                @apply transition-all duration-1000;
            }

            .sidebar-toggle {
                @apply fixed top-6 left-6 z-50 w-10 h-10 rounded-full bg-white shadow-lg flex items-center justify-center transition-all duration-300;
            }

            .sidebar-toggle:hover {
                @apply bg-primary text-white;
            }

            .sidebar {
                @apply fixed top-0 left-0 h-full w-64 bg-white shadow-xl transition-all duration-500 z-40 transform;
                border-right: 1px solid rgba(0, 0, 0, 0.05);
            }

            .sidebar.collapsed {
                @apply -translate-x-full;
            }

            .sidebar-header {
                @apply p-6 border-b border-gray-100;
            }

            .sidebar-content {
                @apply p-4 overflow-y-auto;
                height: calc(100% - 80px);
            }

            .sidebar-footer {
                @apply p-4 border-t border-gray-100 absolute bottom-0 w-full;
            }

            .user-avatar {
                @apply w-10 h-10 rounded-full object-cover border-2 border-white;
            }

            .notification-badge {
                @apply absolute -top-1 -right-1 w-5 h-5 rounded-full bg-primary text-white text-xs flex items-center justify-center;
            }

            .dropdown {
                @apply absolute right-0 top-full mt-2 w-64 bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 opacity-0 invisible;
                z-index: 30;
            }

            .dropdown.show {
                @apply opacity-100 visible;
            }

            .dropdown-item {
                @apply px-4 py-3 hover:bg-gray-50 transition-colors duration-300 flex items-center space-x-3;
            }

            .dropdown-divider {
                @apply border-t border-gray-100 my-1;
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
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Admin" class="user-avatar">
                    <div>
                        <h4 class="font-medium">John Doe</h4>
                        <p class="text-xs text-gray-500">Super Admin</p>
                    </div>
                </div>
            </div>

            <nav class="space-y-2">
                <a href="#" class="nav-link active">
                    <i class="fas fa-chart-pie icon"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-users icon"></i>
                    <span>User Management</span>
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-user-tie icon"></i>
                    <span>Provider Management</span>
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-shield-alt icon"></i>
                    <span>Content Moderation</span>
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-tasks icon"></i>
                    <span>Task Oversight</span>
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-chart-line icon"></i>
                    <span>Analytics & Reports</span>
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-bell icon"></i>
                    <span>Notifications</span>
                    <span
                        class="ml-auto bg-primary text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">8</span>
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-cog icon"></i>
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
    <main class="min-h-screen pt-8 pb-16 transition-all duration-500" id="main-content">
        <div class="container mx-auto px-4 lg:px-8">
            <!-- Header -->
            <header class="mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="mb-4 md:mb-0">
                        <h1 class="font-display text-4xl font-bold mb-2">
                            Dashboard <span class="gradient-text">Overview</span>
                        </h1>
                        <p class="text-gray-600">Welcome back, John! Here's what's happening today.</p>
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Users Stat -->
                <div class="stat-card users">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-gray-500 mb-1">Total Users</p>
                            <h3 class="text-3xl font-bold mb-2 animated-number" id="users-count">0</h3>
                            <div class="flex items-center space-x-1">
                                <span class="text-success text-sm">+12.5%</span>
                                <span class="text-xs text-gray-500">vs last month</span>
                            </div>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-primary/20 flex items-center justify-center">
                            <i class="fas fa-users text-primary"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="progress-bar">
                            <div class="progress bg-primary" style="width: 75%"></div>
                        </div>
                        <div class="flex justify-between mt-1 text-xs text-gray-500">
                            <span>Target: 10,000</span>
                            <span>75%</span>
                        </div>
                    </div>
                </div>

                <!-- Providers Stat -->
                <div class="stat-card providers">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-gray-500 mb-1">Service Providers</p>
                            <h3 class="text-3xl font-bold mb-2 animated-number" id="providers-count">0</h3>
                            <div class="flex items-center space-x-1">
                                <span class="text-success text-sm">+8.3%</span>
                                <span class="text-xs text-gray-500">vs last month</span>
                            </div>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-secondary/20 flex items-center justify-center">
                            <i class="fas fa-user-tie text-secondary"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="progress-bar">
                            <div class="progress bg-secondary" style="width: 60%"></div>
                        </div>
                        <div class="flex justify-between mt-1 text-xs text-gray-500">
                            <span>Target: 5,000</span>
                            <span>60%</span>
                        </div>
                    </div>
                </div>

                <!-- Active Tasks Stat -->
                <div class="stat-card tasks">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-gray-500 mb-1">Active Tasks</p>
                            <h3 class="text-3xl font-bold mb-2 animated-number" id="tasks-count">0</h3>
                            <div class="flex items-center space-x-1">
                                <span class="text-warning text-sm">+5.2%</span>
                                <span class="text-xs text-gray-500">vs last month</span>
                            </div>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-accent/20 flex items-center justify-center">
                            <i class="fas fa-tasks text-accent"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="progress-bar">
                            <div class="progress bg-accent" style="width: 45%"></div>
                        </div>
                        <div class="flex justify-between mt-1 text-xs text-gray-500">
                            <span>Target: 2,000</span>
                            <span>45%</span>
                        </div>
                    </div>
                </div>

                <!-- Revenue Stat -->
                <div class="stat-card revenue">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-gray-500 mb-1">Total Revenue</p>
                            <h3 class="text-3xl font-bold mb-2 animated-number" id="revenue-count">$0</h3>
                            <div class="flex items-center space-x-1">
                                <span class="text-success text-sm">+15.7%</span>
                                <span class="text-xs text-gray-500">vs last month</span>
                            </div>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-success/20 flex items-center justify-center">
                            <i class="fas fa-dollar-sign text-success"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="progress-bar">
                            <div class="progress bg-success" style="width: 85%"></div>
                        </div>
                        <div class="flex justify-between mt-1 text-xs text-gray-500">
                            <span>Target: $500,000</span>
                            <span>85%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- User Growth Chart -->
                <div class="dashboard-card col-span-1 lg:col-span-2">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="font-display text-xl font-semibold">User Growth</h3>
                            <p class="text-gray-500 text-sm">Monthly user acquisition</p>
                        </div>
                        <div class="flex space-x-2">
                            <button
                                class="px-3 py-1 rounded-lg text-xs font-medium bg-white shadow-sm hover:bg-gray-50 transition-colors">
                                Weekly
                            </button>
                            <button
                                class="px-3 py-1 rounded-lg text-xs font-medium bg-primary text-white shadow-sm hover:bg-primary/90 transition-colors">
                                Monthly
                            </button>
                            <button
                                class="px-3 py-1 rounded-lg text-xs font-medium bg-white shadow-sm hover:bg-gray-50 transition-colors">
                                Yearly
                            </button>
                        </div>
                    </div>
                    <div class="chart-container" id="user-growth-chart">
                        <canvas id="userGrowthChart"></canvas>
                        <div class="chart-overlay">
                            <button
                                class="px-4 py-2 bg-primary text-white rounded-lg shadow-lg hover:bg-primary/90 transition-colors">
                                View Detailed Report
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Task Distribution Chart -->
                <div class="dashboard-card">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="font-display text-xl font-semibold">Task Distribution</h3>
                            <p class="text-gray-500 text-sm">By category</p>
                        </div>
                        <button class="text-gray-400 hover:text-primary transition-colors">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                    <div class="chart-container" id="task-distribution-chart">
                        <canvas id="taskDistributionChart"></canvas>
                    </div>
                    <div class="mt-4 grid grid-cols-2 gap-2">
                        <div class="task-type">
                            <div class="task-type-dot bg-primary"></div>
                            <div class="task-type-label">Deliveries</div>
                        </div>
                        <div class="task-type">
                            <div class="task-type-dot bg-secondary"></div>
                            <div class="task-type-label">Errands</div>
                        </div>
                        <div class="task-type">
                            <div class="task-type-dot bg-accent"></div>
                            <div class="task-type-label">Home Services</div>
                        </div>
                        <div class="task-type">
                            <div class="task-type-dot bg-success"></div>
                            <div class="task-type-label">Small Jobs</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Provider Performance and Recent Tasks -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Provider Performance -->
                <div class="dashboard-card">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="font-display text-xl font-semibold">Top Providers</h3>
                            <p class="text-gray-500 text-sm">By rating and completed tasks</p>
                        </div>
                        <button class="text-gray-400 hover:text-primary transition-colors">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                    <div class="chart-container" id="provider-performance-chart">
                        <canvas id="providerPerformanceChart"></canvas>
                    </div>
                </div>

                <!-- Recent Tasks -->
                <div class="dashboard-card">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="font-display text-xl font-semibold">Recent Tasks</h3>
                            <p class="text-gray-500 text-sm">Latest activity</p>
                        </div>
                        <a href="#" class="text-primary hover:underline text-sm font-medium">View All</a>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center p-3 rounded-xl bg-white/50 hover:bg-gray-50 transition-colors">
                            <div class="w-10 h-10 rounded-xl bg-primary/20 flex items-center justify-center mr-4">
                                <i class="fas fa-truck text-primary"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium">Furniture Delivery</h4>
                                <p class="text-xs text-gray-500">Sarah Johnson • 2 hours ago</p>
                            </div>
                            <span class="badge badge-success">Completed</span>
                        </div>
                        <div class="flex items-center p-3 rounded-xl bg-white/50 hover:bg-gray-50 transition-colors">
                            <div class="w-10 h-10 rounded-xl bg-secondary/20 flex items-center justify-center mr-4">
                                <i class="fas fa-broom text-secondary"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium">House Cleaning</h4>
                                <p class="text-xs text-gray-500">Michael Brown • 3 hours ago</p>
                            </div>
                            <span class="badge badge-primary">In Progress</span>
                        </div>
                        <div class="flex items-center p-3 rounded-xl bg-white/50 hover:bg-gray-50 transition-colors">
                            <div class="w-10 h-10 rounded-xl bg-accent/20 flex items-center justify-center mr-4">
                                <i class="fas fa-hammer text-accent"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium">Furniture Assembly</h4>
                                <p class="text-xs text-gray-500">David Wilson • 5 hours ago</p>
                            </div>
                            <span class="badge badge-warning">Pending</span>
                        </div>
                        <div class="flex items-center p-3 rounded-xl bg-white/50 hover:bg-gray-50 transition-colors">
                            <div class="w-10 h-10 rounded-xl bg-success/20 flex items-center justify-center mr-4">
                                <i class="fas fa-leaf text-success"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium">Lawn Mowing</h4>
                                <p class="text-xs text-gray-500">Emily Davis • 6 hours ago</p>
                            </div>
                            <span class="badge badge-success">Completed</span>
                        </div>
                        <div class="flex items-center p-3 rounded-xl bg-white/50 hover:bg-gray-50 transition-colors">
                            <div class="w-10 h-10 rounded-xl bg-danger/20 flex items-center justify-center mr-4">
                                <i class="fas fa-shopping-bag text-danger"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium">Grocery Shopping</h4>
                                <p class="text-xs text-gray-500">Robert Miller • 8 hours ago</p>
                            </div>
                            <span class="badge badge-danger">Cancelled</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Links and Platform Growth -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Quick Links -->
                <div class="dashboard-card">
                    <h3 class="font-display text-xl font-semibold mb-6">Quick Actions</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        <a href="#" class="quick-action">
                            <i class="fas fa-user-plus icon text-primary"></i>
                            <span class="text-sm font-medium">Add User</span>
                        </a>
                        <a href="#" class="quick-action">
                            <i class="fas fa-user-tie icon text-secondary"></i>
                            <span class="text-sm font-medium">Add Provider</span>
                        </a>
                        <a href="#" class="quick-action">
                            <i class="fas fa-tasks icon text-accent"></i>
                            <span class="text-sm font-medium">New Task</span>
                        </a>
                        <a href="#" class="quick-action">
                            <i class="fas fa-chart-bar icon text-success"></i>
                            <span class="text-sm font-medium">Reports</span>
                        </a>
                        <a href="#" class="quick-action">
                            <i class="fas fa-cog icon text-info"></i>
                            <span class="text-sm font-medium">Settings</span>
                        </a>
                        <a href="#" class="quick-action">
                            <i class="fas fa-question-circle icon text-warning"></i>
                            <span class="text-sm font-medium">Help</span>
                        </a>
                    </div>
                </div>

                <!-- Platform Growth -->
                <div class="dashboard-card col-span-1 lg:col-span-2">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="font-display text-xl font-semibold">Platform Growth</h3>
                            <p class="text-gray-500 text-sm">Monthly overview</p>
                        </div>
                        <div class="flex space-x-2">
                            <button
                                class="px-3 py-1 rounded-lg text-xs font-medium bg-white shadow-sm hover:bg-gray-50 transition-colors">
                                3 Months
                            </button>
                            <button
                                class="px-3 py-1 rounded-lg text-xs font-medium bg-primary text-white shadow-sm hover:bg-primary/90 transition-colors">
                                6 Months
                            </button>
                            <button
                                class="px-3 py-1 rounded-lg text-xs font-medium bg-white shadow-sm hover:bg-gray-50 transition-colors">
                                1 Year
                            </button>
                        </div>
                    </div>
                    <div class="chart-container" id="platform-growth-chart">
                        <div id="platformGrowthChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar toggle
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                if (sidebar.classList.contains('collapsed')) {
                    mainContent.style.marginLeft = '0';
                    sidebarToggle.innerHTML = '<i class="fas fa-bars"></i>';
                } else {
                    mainContent.style.marginLeft = '16rem';
                    sidebarToggle.innerHTML = '<i class="fas fa-times"></i>';
                }
            });

            // Initialize sidebar as open for desktop and closed for mobile
            function checkScreenSize() {
                if (window.innerWidth < 1024) {
                    sidebar.classList.add('collapsed');
                    mainContent.style.marginLeft = '0';
                    sidebarToggle.innerHTML = '<i class="fas fa-bars"></i>';
                } else {
                    sidebar.classList.remove('collapsed');
                    mainContent.style.marginLeft = '16rem';
                    sidebarToggle.innerHTML = '<i class="fas fa-times"></i>';
                }
            }

            // Check on load and resize
            checkScreenSize();
            window.addEventListener('resize', checkScreenSize);

            // Dropdowns
            const userBtn = document.getElementById('user-btn');
            const userDropdown = document.getElementById('user-dropdown');
            const notificationsBtn = document.getElementById('notifications-btn');
            const notificationsDropdown = document.getElementById('notifications-dropdown');

            userBtn.addEventListener('click', function() {
                userDropdown.classList.toggle('show');
                notificationsDropdown.classList.remove('show');
            });

            notificationsBtn.addEventListener('click', function() {
                notificationsDropdown.classList.toggle('show');
                userDropdown.classList.remove('show');
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(event) {
                if (!userBtn.contains(event.target) && !userDropdown.contains(event.target)) {
                    userDropdown.classList.remove('show');
                }
                if (!notificationsBtn.contains(event.target) && !notificationsDropdown.contains(event
                        .target)) {
                    notificationsDropdown.classList.remove('show');
                }
            });

            // Scroll progress bar
            const scrollProgress = document.getElementById('scroll-progress');
            window.addEventListener('scroll', function() {
                const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
                const scrollHeight = document.documentElement.scrollHeight - document.documentElement
                    .clientHeight;
                const scrollPercentage = (scrollTop / scrollHeight) * 100;
                scrollProgress.style.width = scrollPercentage + '%';
            });

            // Animated counting for stats
            function animateValue(id, start, end, duration) {
                const obj = document.getElementById(id);
                const range = end - start;
                const minTimer = 50;
                const stepTime = Math.abs(Math.floor(duration / range));
                const startTime = new Date().getTime();
                const endTime = startTime + duration;
                let timer;

                function run() {
                    const now = new Date().getTime();
                    const remaining = Math.max((endTime - now) / duration, 0);
                    const value = Math.round(end - (remaining * range));

                    if (id === 'revenue-count') {
                        obj.innerText = '$' + value.toLocaleString();
                    } else {
                        obj.innerText = value.toLocaleString();
                    }

                    if (value === end) {
                        clearInterval(timer);
                    }
                }

                timer = setInterval(run, stepTime);
                run();
            }

            // Start animations after a short delay
            setTimeout(() => {
                animateValue('users-count', 0, 7500, 2000);
                animateValue('providers-count', 0, 3000, 2000);
                animateValue('tasks-count', 0, 950, 2000);
                animateValue('revenue-count', 0, 425000, 2000);
            }, 500);

            // Initialize charts
            // User Growth Chart
            const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
            const userGrowthChart = new Chart(userGrowthCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                            label: 'Users',
                            data: [5200, 5700, 6200, 6800, 7200, 7500],
                            borderColor: '#FF6B6B',
                            backgroundColor: 'rgba(255, 107, 107, 0.1)',
                            tension: 0.4,
                            fill: true
                        },
                        {
                            label: 'Providers',
                            data: [2100, 2300, 2500, 2700, 2900, 3000],
                            borderColor: '#4ECDC4',
                            backgroundColor: 'rgba(78, 205, 196, 0.1)',
                            tension: 0.4,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            backgroundColor: 'rgba(255, 255, 255, 0.8)',
                            titleColor: '#1A535C',
                            bodyColor: '#1A535C',
                            borderColor: 'rgba(26, 83, 92, 0.1)',
                            borderWidth: 1,
                            cornerRadius: 8,
                            displayColors: true,
                            usePointStyle: true,
                            callbacks: {
                                label: function(context) {
                                    return context.dataset.label + ': ' + context.parsed.y
                                        .toLocaleString();
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true,
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Task Distribution Chart
            const taskDistributionCtx = document.getElementById('taskDistributionChart').getContext('2d');
            const taskDistributionChart = new Chart(taskDistributionCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Deliveries', 'Errands', 'Home Services', 'Small Jobs'],
                    datasets: [{
                        data: [35, 25, 30, 10],
                        backgroundColor: [
                            '#FF6B6B',
                            '#4ECDC4',
                            '#FFE66D',
                            '#2ECC71'
                        ],
                        borderWidth: 0,
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(255, 255, 255, 0.8)',
                            titleColor: '#1A535C',
                            bodyColor: '#1A535C',
                            borderColor: 'rgba(26, 83, 92, 0.1)',
                            borderWidth: 1,
                            cornerRadius: 8,
                            displayColors: true,
                            usePointStyle: true,
                            callbacks: {
                                label: function(context) {
                                    return context.label + ': ' + context.parsed + '%';
                                }
                            }
                        }
                    }
                }
            });

            // Provider Performance Chart
            const providerPerformanceCtx = document.getElementById('providerPerformanceChart').getContext('2d');
            const providerPerformanceChart = new Chart(providerPerformanceCtx, {
                type: 'bar',
                data: {
                    labels: ['John D.', 'Sarah M.', 'Robert K.', 'Emily L.', 'David P.'],
                    datasets: [{
                        label: 'Completed Tasks',
                        data: [85, 72, 68, 65, 58],
                        backgroundColor: '#4ECDC4',
                        borderRadius: 8
                    }, {
                        label: 'Average Rating',
                        data: [95, 88, 90, 85, 92],
                        backgroundColor: '#FF6B6B',
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            backgroundColor: 'rgba(255, 255, 255, 0.8)',
                            titleColor: '#1A535C',
                            bodyColor: '#1A535C',
                            borderColor: 'rgba(26, 83, 92, 0.1)',
                            borderWidth: 1,
                            cornerRadius: 8,
                            displayColors: true,
                            usePointStyle: true
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            grid: {
                                display: true,
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                callback: function(value) {
                                    return value + '%';
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Platform Growth Chart with ApexCharts
            const platformGrowthOptions = {
                series: [{
                    name: 'Users',
                    data: [4500, 5000, 5500, 6000, 6500, 7500]
                }, {
                    name: 'Providers',
                    data: [1800, 2000, 2200, 2500, 2800, 3000]
                }, {
                    name: 'Tasks',
                    data: [600, 650, 700, 800, 850, 950]
                }],
                chart: {
                    height: 350,
                    type: 'area',
                    toolbar: {
                        show: false
                    },
                    fontFamily: 'Outfit, sans-serif',
                },
                colors: ['#FF6B6B', '#4ECDC4', '#FFE66D'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.1,
                        stops: [0, 90, 100]
                    }
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                },
                tooltip: {
                    theme: 'light',
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right'
                }
            };

            const platformGrowthChart = new ApexCharts(document.querySelector("#platformGrowthChart"),
                platformGrowthOptions);
            platformGrowthChart.render();
        });
    </script>
</body>

</html>
