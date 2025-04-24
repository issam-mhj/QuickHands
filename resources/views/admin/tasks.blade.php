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

            .badge-active {
                @apply bg-success/20 text-success;
            }

            .badge-suspended {
                @apply bg-warning/20 text-warning;
            }

            .badge-banned {
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

            .modal {
                background-color: rgba(0, 0, 0, 0.5);
                backdrop-filter: blur(5px);
            }

            .modal-content {
                background: white;
                border-radius: 16px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            }

            .status-pending {
                @apply bg-yellow-100 text-yellow-800;
            }

            .status-in-progress {
                @apply bg-blue-100 text-blue-800;
            }

            .status-completed {
                @apply bg-green-100 text-green-800;
            }

            .status-cancelled {
                @apply bg-red-100 text-red-800;
            }

            .status-dispute {
                @apply bg-purple-100 text-purple-800;
            }

            .priority-high {
                @apply bg-red-100 text-red-800;
            }

            .priority-medium {
                @apply bg-yellow-100 text-yellow-800;
            }

            .priority-low {
                @apply bg-green-100 text-green-800;
            }

            .task-type-cleaning {
                @apply bg-blue-100 text-blue-800;
            }

            .task-type-delivery {
                @apply bg-green-100 text-green-800;
            }

            .task-type-assembly {
                @apply bg-purple-100 text-purple-800;
            }

            .task-type-moving {
                @apply bg-orange-100 text-orange-800;
            }

            .task-type-other {
                @apply bg-gray-100 text-gray-800;
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
                        <h4 class="font-medium">{{ $user->name }}</h4>
                        <p class="text-xs text-gray-500">Super Admin</p>
                    </div>
                </div>
            </div>

            <nav class="space-y-2">
                <a href="simplified-dashboard.html" class="nav-link">
                    <i class="fas fa-chart-pie icon"></i>
                    <span>Dashboard</span>
                </a>
                <a href="user-management.html" class="nav-link">
                    <i class="fas fa-users icon"></i>
                    <span>User Management</span>
                </a>
                <a href="provider-management.html" class="nav-link">
                    <i class="fas fa-user-tie icon"></i>
                    <span>Provider Management</span>
                </a>
                <a href="content-moderation.html" class="nav-link">
                    <i class="fas fa-shield-alt icon"></i>
                    <span>Content Moderation</span>
                </a>
                <a href="task-oversight.html" class="nav-link active">
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
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Admin"
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

            <!-- Task Overview Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stat-card tasks">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-medium text-gray-500">Total Tasks</h3>
                            <p class="text-3xl font-bold mt-1">{{ $taskNum }}</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center">
                            <i class="fas fa-tasks text-accent"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-medium text-gray-500">Active Tasks</h3>
                            <p class="text-3xl font-bold mt-1">{{ $activeTaskNum }}</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-secondary/20 flex items-center justify-center">
                            <i class="fas fa-spinner text-secondary"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-medium text-gray-500">Not started Tasks</h3>
                            <p class="text-3xl font-bold mt-1">{{ $notStartedTasks }}</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-warning/20 flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-warning"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-medium text-gray-500">Completion Rate</h3>
                            <p class="text-3xl font-bold mt-1">{{ $rateCompleted }}%</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-success/20 flex items-center justify-center">
                            <i class="fas fa-check-circle text-success"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Task Management Controls -->
            <div class="dashboard-card mb-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-xl font-semibold text-gray-800">Task List</h2>
                        <p class="text-sm text-gray-500">Monitor and manage all tasks on the platform</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <button id="exportBtn"
                            class="btn bg-success hover:bg-success/90 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-file-export mr-2"></i> Export Data
                        </button>
                    </div>
                </div>

                <!-- Search and Filter -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Search tasks..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                    </div>

                    <div>
                        <select id="statusFilter"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="">Filter by Status</option>
                            <option value="pending">Pending</option>
                            <option value="in-progress">In Progress</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                            <option value="dispute">In Dispute</option>
                        </select>
                    </div>

                    <div>
                        <select id="typeFilter"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="">Filter by Type</option>
                            <option value="cleaning">Cleaning</option>
                            <option value="delivery">Delivery</option>
                            <option value="assembly">Assembly</option>
                            <option value="moving">Moving</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div>
                        <input type="date" id="dateFilter"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                </div>

                <!-- Tasks Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg overflow-hidden">
                        <thead class="table-header">
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
                                        <span>Date</span>
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
                        <tbody class="divide-y divide-gray-200" id="taskTableBody">
                            <!-- Task rows will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-6">
                    <div class="text-sm text-gray-500">
                        Showing <span id="startRange">1</span> to <span id="endRange">10</span> of <span
                            id="totalTasks">100</span> tasks
                    </div>

                    <div class="flex space-x-1">
                        <button id="prevPage"
                            class="pagination-btn px-3 py-1 rounded-md border border-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <div id="paginationNumbers" class="flex space-x-1">
                            <!-- Pagination numbers will be populated by JavaScript -->
                        </div>
                        <button id="nextPage" class="pagination-btn px-3 py-1 rounded-md border border-gray-300">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Task Details Modal -->
    <div id="taskDetailsModal" class="modal fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
        <div class="modal-content relative bg-white w-full max-w-4xl mx-4 rounded-lg shadow-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Task Details - <span id="detailsTaskId"></span>
                    </h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h4 class="font-medium text-gray-700 mb-2">Basic Information</h4>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500">Title</p>
                                    <p class="font-medium" id="detailsTitle"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Type</p>
                                    <p class="font-medium" id="detailsType"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Status</p>
                                    <p class="font-medium" id="detailsStatus"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Date</p>
                                    <p class="font-medium" id="detailsDate"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Budget</p>
                                    <p class="font-medium" id="detailsBudget"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Priority</p>
                                    <p class="font-medium" id="detailsPriority"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="font-medium text-gray-700 mb-2">Participants</h4>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="mb-4">
                                <p class="text-sm text-gray-500">User</p>
                                <div class="flex items-center mt-1">
                                    <img id="detailsUserAvatar" class="w-8 h-8 rounded-full mr-2"
                                        src="/placeholder.svg" alt="User">
                                    <div>
                                        <p class="font-medium" id="detailsUserName"></p>
                                        <p class="text-xs text-gray-500" id="detailsUserEmail"></p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Provider</p>
                                <div class="flex items-center mt-1">
                                    <img id="detailsProviderAvatar" class="w-8 h-8 rounded-full mr-2"
                                        src="/placeholder.svg" alt="Provider">
                                    <div>
                                        <p class="font-medium" id="detailsProviderName"></p>
                                        <p class="text-xs text-gray-500" id="detailsProviderEmail"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h4 class="font-medium text-gray-700 mb-2">Description</h4>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p id="detailsDescription" class="text-gray-700"></p>
                    </div>
                </div>

                <div class="mb-6">
                    <h4 class="font-medium text-gray-700 mb-2">Location</h4>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p id="detailsLocation" class="text-gray-700"></p>
                    </div>
                </div>

                <div class="mb-6">
                    <h4 class="font-medium text-gray-700 mb-2">Timeline</h4>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-plus text-primary"></i>
                                </div>
                                <div>
                                    <p class="font-medium">Task Created</p>
                                    <p class="text-sm text-gray-500" id="timelineCreated"></p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 rounded-full bg-secondary/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-user-check text-secondary"></i>
                                </div>
                                <div>
                                    <p class="font-medium">Provider Assigned</p>
                                    <p class="text-sm text-gray-500" id="timelineAssigned"></p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-spinner text-accent"></i>
                                </div>
                                <div>
                                    <p class="font-medium">Work Started</p>
                                    <p class="text-sm text-gray-500" id="timelineStarted"></p>
                                </div>
                            </div>
                            <div class="flex items-start" id="timelineCompletedContainer">
                                <div
                                    class="w-10 h-10 rounded-full bg-success/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-success"></i>
                                </div>
                                <div>
                                    <p class="font-medium">Task Completed</p>
                                    <p class="text-sm text-gray-500" id="timelineCompleted"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-3">
                    <button id="cancelTaskBtn"
                        class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel
                        Task</button>
                    <button id="resolveDisputeBtn"
                        class="px-4 py-2 bg-warning text-white rounded-md hover:bg-warning/90">Resolve Dispute</button>
                    <button
                        class="close-modal px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Resolve Dispute Modal -->
    <div id="resolveDisputeModal" class="modal fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
        <div class="modal-content relative bg-white w-full max-w-md mx-4 rounded-lg shadow-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Resolve Dispute</h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form id="resolveDisputeForm">
                    <input type="hidden" id="disputeTaskId">

                    <div class="mb-4">
                        <label for="disputeReason" class="block text-sm font-medium text-gray-700 mb-1">Dispute
                            Reason</label>
                        <p id="disputeReason" class="bg-gray-50 p-3 rounded-lg text-gray-700"></p>
                    </div>

                    <div class="mb-4">
                        <label for="disputeResolution"
                            class="block text-sm font-medium text-gray-700 mb-1">Resolution</label>
                        <select id="disputeResolution"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="">Select Resolution</option>
                            <option value="user">Favor User</option>
                            <option value="provider">Favor Provider</option>
                            <option value="partial">Partial Refund</option>
                            <option value="mediation">Require Mediation</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="disputeNotes" class="block text-sm font-medium text-gray-700 mb-1">Resolution
                            Notes</label>
                        <textarea id="disputeNotes" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button"
                            class="close-modal px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90">Resolve
                            Dispute</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Export Options Modal -->
    <div id="exportModal" class="modal fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
        <div class="modal-content relative bg-white w-full max-w-md mx-4 rounded-lg shadow-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Export Task Data</h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="mb-4">
                    <p class="text-gray-600 mb-4">Select the format you want to export the task data in:</p>

                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="radio" id="csvFormat" name="exportFormat" value="csv"
                                class="h-4 w-4 text-primary focus:ring-primary" checked>
                            <label for="csvFormat" class="ml-2 text-gray-700">CSV Format</label>
                        </div>

                        <div class="flex items-center">
                            <input type="radio" id="excelFormat" name="exportFormat" value="excel"
                                class="h-4 w-4 text-primary focus:ring-primary">
                            <label for="excelFormat" class="ml-2 text-gray-700">Excel Format</label>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <p class="text-gray-600 mb-2">Select data to include:</p>

                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input type="checkbox" id="includeBasicInfo"
                                class="h-4 w-4 text-primary focus:ring-primary" checked>
                            <label for="includeBasicInfo" class="ml-2 text-gray-700">Basic Information</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="includeUserInfo"
                                class="h-4 w-4 text-primary focus:ring-primary">
                            <label for="includeUserInfo" class="ml-2 text-gray-700">User Information</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="includeProviderInfo"
                                class="h-4 w-4 text-primary focus:ring-primary">
                            <label for="includeProviderInfo" class="ml-2 text-gray-700">Provider Information</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="includeTimeline"
                                class="h-4 w-4 text-primary focus:ring-primary">
                            <label for="includeTimeline" class="ml-2 text-gray-700">Task Timeline</label>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <p class="text-gray-600 mb-2">Date range:</p>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="startDate" class="block text-sm text-gray-700 mb-1">Start Date</label>
                            <input type="date" id="startDate"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label for="endDate" class="block text-sm text-gray-700 mb-1">End Date</label>
                            <input type="date" id="endDate"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button"
                        class="close-modal px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</button>
                    <button id="confirmExport"
                        class="px-4 py-2 bg-success text-white rounded-md hover:bg-success/90">Export</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample task data
        const tasks = [{
                id: 'T1001',
                title: 'Furniture Assembly',
                user: {
                    name: 'John Doe',
                    email: 'john.doe@example.com',
                    avatar: 'https://randomuser.me/api/portraits/men/1.jpg'
                },
                provider: {
                    name: 'Robert Johnson',
                    email: 'robert.j@example.com',
                    avatar: 'https://randomuser.me/api/portraits/men/2.jpg'
                },
                type: 'assembly',
                status: 'completed',
                date: '2023-03-10',
                budget: '$120',
                priority: 'medium',
                description: 'Assembly of a new IKEA bookshelf and desk for home office.',
                location: '123 Main St, Apt 4B, New York, NY 10001',
                timeline: {
                    created: '2023-03-08 09:15 AM',
                    assigned: '2023-03-08 10:30 AM',
                    started: '2023-03-10 09:00 AM',
                    completed: '2023-03-10 11:45 AM'
                }
            },
            {
                id: 'T1002',
                title: 'House Cleaning',
                user: {
                    name: 'Jane Smith',
                    email: 'jane.smith@example.com',
                    avatar: 'https://randomuser.me/api/portraits/women/1.jpg'
                },
                provider: {
                    name: 'Emily Davis',
                    email: 'emily.davis@example.com',
                    avatar: 'https://randomuser.me/api/portraits/women/2.jpg'
                },
                type: 'cleaning',
                status: 'completed',
                date: '2023-03-12',
                budget: '$85',
                priority: 'low',
                description: 'Deep cleaning of 2-bedroom apartment including kitchen and bathrooms.',
                location: '456 Park Ave, New York, NY 10022',
                timeline: {
                    created: '2023-03-09 14:20 PM',
                    assigned: '2023-03-09 15:45 PM',
                    started: '2023-03-12 10:00 AM',
                    completed: '2023-03-12 01:30 PM'
                }
            },
            {
                id: 'T1003',
                title: 'Grocery Delivery',
                user: {
                    name: 'Michael Brown',
                    email: 'michael.b@example.com',
                    avatar: 'https://randomuser.me/api/portraits/men/3.jpg'
                },
                provider: {
                    name: 'Sarah Wilson',
                    email: 'sarah.w@example.com',
                    avatar: 'https://randomuser.me/api/portraits/women/3.jpg'
                },
                type: 'delivery',
                status: 'in-progress',
                date: '2023-03-15',
                budget: '$45',
                priority: 'high',
                description: 'Purchase and delivery of weekly groceries from Whole Foods.',
                location: '789 Broadway, New York, NY 10003',
                timeline: {
                    created: '2023-03-14 16:10 PM',
                    assigned: '2023-03-14 16:45 PM',
                    started: '2023-03-15 09:30 AM',
                    completed: null
                }
            },
            {
                id: 'T1004',
                title: 'Dog Walking',
                user: {
                    name: 'Jennifer Taylor',
                    email: 'jennifer.t@example.com',
                    avatar: 'https://randomuser.me/api/portraits/women/4.jpg'
                },
                provider: {
                    name: 'David Miller',
                    email: 'david.m@example.com',
                    avatar: 'https://randomuser.me/api/portraits/men/4.jpg'
                },
                type: 'other',
                status: 'completed',
                date: '2023-03-11',
                budget: '$30',
                priority: 'medium',
                description: 'Walk golden retriever for 30 minutes in Central Park.',
                location: 'Central Park, New York, NY',
                timeline: {
                    created: '2023-03-10 18:05 PM',
                    assigned: '2023-03-10 19:20 PM',
                    started: '2023-03-11 16:00 PM',
                    completed: '2023-03-11 16:45 PM'
                }
            },
            {
                id: 'T1005',
                title: 'Moving Assistance',
                user: {
                    name: 'Thomas Anderson',
                    email: 'thomas.a@example.com',
                    avatar: 'https://randomuser.me/api/portraits/men/5.jpg'
                },
                provider: {
                    name: 'Lisa Moore',
                    email: 'lisa.m@example.com',
                    avatar: 'https://randomuser.me/api/portraits/women/5.jpg'
                },
                type: 'moving',
                status: 'pending',
                date: '2023-03-18',
                budget: '$200',
                priority: 'high',
                description: 'Help moving furniture and boxes from studio apartment to new 1-bedroom.',
                location: 'From: 101 E 10th St, To: 202 W 20th St, New York, NY',
                timeline: {
                    created: '2023-03-12 11:30 AM',
                    assigned: '2023-03-12 13:15 PM',
                    started: null,
                    completed: null
                }
            },
            {
                id: 'T1006',
                title: 'TV Mounting',
                user: {
                    name: 'Daniel White',
                    email: 'daniel.w@example.com',
                    avatar: 'https://randomuser.me/api/portraits/men/6.jpg'
                },
                provider: {
                    name: 'Jessica Brown',
                    email: 'jessica.b@example.com',
                    avatar: 'https://randomuser.me/api/portraits/women/6.jpg'
                },
                type: 'assembly',
                status: 'dispute',
                date: '2023-03-14',
                budget: '$95',
                priority: 'medium',
                description: 'Mount 55" TV on living room wall with concealed wiring.',
                location: '303 E 33rd St, Apt 5C, New York, NY 10016',
                timeline: {
                    created: '2023-03-13 09:45 AM',
                    assigned: '2023-03-13 10:30 AM',
                    started: '2023-03-14 14:00 PM',
                    completed: null
                },
                dispute: {
                    reason: 'Provider damaged wall during installation and refused to repair it. TV is mounted but there is a large crack in the drywall that needs professional repair.'
                }
            },
            {
                id: 'T1007',
                title: 'Lawn Mowing',
                user: {
                    name: 'Matthew Johnson',
                    email: 'matthew.j@example.com',
                    avatar: 'https://randomuser.me/api/portraits/men/7.jpg'
                },
                provider: {
                    name: 'Amanda Clark',
                    email: 'amanda.c@example.com',
                    avatar: 'https://randomuser.me/api/portraits/women/7.jpg'
                },
                type: 'other',
                status: 'cancelled',
                date: '2023-03-13',
                budget: '$50',
                priority: 'low',
                description: 'Mow front and back lawn, edge walkways, and trim hedges.',
                location: '404 Oak St, Queens, NY 11101',
                timeline: {
                    created: '2023-03-11 15:20 PM',
                    assigned: '2023-03-11 16:05 PM',
                    started: null,
                    completed: null
                }
            },
            {
                id: 'T1008',
                title: 'Plumbing Repair',
                user: {
                    name: 'Christopher Lee',
                    email: 'chris.l@example.com',
                    avatar: 'https://randomuser.me/api/portraits/men/8.jpg'
                },
                provider: {
                    name: 'Stephanie Hall',
                    email: 'steph.h@example.com',
                    avatar: 'https://randomuser.me/api/portraits/women/8.jpg'
                },
                type: 'other',
                status: 'in-progress',
                date: '2023-03-15',
                budget: '$150',
                priority: 'high',
                description: 'Fix leaking kitchen sink and replace bathroom faucet.',
                location: '505 W 47th St, Apt 2D, New York, NY 10036',
                timeline: {
                    created: '2023-03-14 10:10 AM',
                    assigned: '2023-03-14 11:25 AM',
                    started: '2023-03-15 08:30 AM',
                    completed: null
                }
            },
            {
                id: 'T1009',
                title: 'Painting Room',
                user: {
                    name: 'Nicole Adams',
                    email: 'nicole.a@example.com',
                    avatar: 'https://randomuser.me/api/portraits/women/9.jpg'
                },
                provider: {
                    name: 'Kevin Martin',
                    email: 'kevin.m@example.com',
                    avatar: 'https://randomuser.me/api/portraits/men/9.jpg'
                },
                type: 'other',
                status: 'pending',
                date: '2023-03-20',
                budget: '$180',
                priority: 'medium',
                description: 'Paint bedroom walls and ceiling, color: Soft Blue (paint provided).',
                location: '606 E 9th St, Apt 3A, New York, NY 10009',
                timeline: {
                    created: '2023-03-15 13:40 PM',
                    assigned: '2023-03-15 14:55 PM',
                    started: null,
                    completed: null
                }
            },
            {
                id: 'T1010',
                title: 'Computer Setup',
                user: {
                    name: 'Rachel Green',
                    email: 'rachel.g@example.com',
                    avatar: 'https://randomuser.me/api/portraits/women/10.jpg'
                },
                provider: {
                    name: 'Andrew Wilson',
                    email: 'andrew.w@example.com',
                    avatar: 'https://randomuser.me/api/portraits/men/10.jpg'
                },
                type: 'other',
                status: 'completed',
                date: '2023-03-09',
                budget: '$75',
                priority: 'low',
                description: 'Set up new desktop computer, connect to network, and install basic software.',
                location: '707 3rd Ave, New York, NY 10017',
                timeline: {
                    created: '2023-03-08 16:30 PM',
                    assigned: '2023-03-08 17:15 PM',
                    started: '2023-03-09 13:00 PM',
                    completed: '2023-03-09 14:45 PM'
                }
            }
        ];

        // Pagination variables
        let currentPage = 1;
        const itemsPerPage = 10;
        let filteredTasks = [...tasks];

        // DOM elements
        const taskTableBody = document.getElementById('taskTableBody');
        const paginationNumbers = document.getElementById('paginationNumbers');
        const prevPageBtn = document.getElementById('prevPage');
        const nextPageBtn = document.getElementById('nextPage');
        const startRangeEl = document.getElementById('startRange');
        const endRangeEl = document.getElementById('endRange');
        const totalTasksEl = document.getElementById('totalTasks');
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const typeFilter = document.getElementById('typeFilter');
        const dateFilter = document.getElementById('dateFilter');
        const taskDetailsModal = document.getElementById('taskDetailsModal');
        const resolveDisputeModal = document.getElementById('resolveDisputeModal');
        const exportModal = document.getElementById('exportModal');

        // Initialize the page
        document.addEventListener('DOMContentLoaded', () => {
            renderTasks();
            setupEventListeners();
        });

        // Render tasks table
        function renderTasks() {
            // Apply filters
            applyFilters();

            // Calculate pagination
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, filteredTasks.length);
            const paginatedTasks = filteredTasks.slice(startIndex, endIndex);

            // Update pagination info
            startRangeEl.textContent = filteredTasks.length > 0 ? startIndex + 1 : 0;
            endRangeEl.textContent = endIndex;
            totalTasksEl.textContent = filteredTasks.length;

            // Clear table
            taskTableBody.innerHTML = '';

            // Render task rows
            paginatedTasks.forEach(task => {
                const row = document.createElement('tr');
                row.className = 'hover:bg-gray-50';

                // Status badge class
                let statusClass = '';
                switch (task.status) {
                    case 'pending':
                        statusClass = 'status-pending';
                        break;
                    case 'in-progress':
                        statusClass = 'status-in-progress';
                        break;
                    case 'completed':
                        statusClass = 'status-completed';
                        break;
                    case 'cancelled':
                        statusClass = 'status-cancelled';
                        break;
                    case 'dispute':
                        statusClass = 'status-dispute';
                        break;
                }

                // Type badge class
                let typeClass = '';
                switch (task.type) {
                    case 'cleaning':
                        typeClass = 'task-type-cleaning';
                        break;
                    case 'delivery':
                        typeClass = 'task-type-delivery';
                        break;
                    case 'assembly':
                        typeClass = 'task-type-assembly';
                        break;
                    case 'moving':
                        typeClass = 'task-type-moving';
                        break;
                    case 'other':
                        typeClass = 'task-type-other';
                        break;
                }

                row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">${task.id}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-8 w-8 flex-shrink-0">
                                <img class="h-8 w-8 rounded-full" src="${task.user.avatar}" alt="${task.user.name}">
                            </div>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">${task.user.name}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-8 w-8 flex-shrink-0">
                                <img class="h-8 w-8 rounded-full" src="${task.provider.avatar}" alt="${task.provider.name}">
                            </div>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">${task.provider.name}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="badge ${typeClass} capitalize">${task.type}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="badge ${statusClass} capitalize">${task.status}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${formatDate(task.date)}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${task.budget}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex space-x-2 justify-end">
                            <button class="view-task text-primary hover:text-primary/80" data-id="${task.id}">
                                <i class="fas fa-eye"></i>
                            </button>
                            ${task.status === 'dispute' ?
                                `<button class="resolve-dispute text-warning hover:text-warning/80" data-id="${task.id}">
                                                                                                <i class="fas fa-gavel"></i>
                                                                                            </button>` : ''
                            }
                            ${task.status !== 'completed' && task.status !== 'cancelled' ?
                                `<button class="cancel-task text-danger hover:text-danger/80" data-id="${task.id}">
                                                                                                <i class="fas fa-ban"></i>
                                                                                            </button>` : ''
                            }
                        </div>
                    </td>
                `;

                taskTableBody.appendChild(row);
            });

            // Render pagination
            renderPagination();
        }

        // Apply filters to tasks
        function applyFilters() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;
            const typeValue = typeFilter.value;
            const dateValue = dateFilter.value;

            filteredTasks = tasks.filter(task => {
                const matchesSearch = searchTerm === '' ||
                    task.title.toLowerCase().includes(searchTerm) ||
                    task.id.toLowerCase().includes(searchTerm) ||
                    task.user.name.toLowerCase().includes(searchTerm) ||
                    task.provider.name.toLowerCase().includes(searchTerm);

                const matchesStatus = statusValue === '' || task.status === statusValue;
                const matchesType = typeValue === '' || task.type === typeValue;
                const matchesDate = dateValue === '' || task.date === dateValue;

                return matchesSearch && matchesStatus && matchesType && matchesDate;
            });

            // Reset to first page when filters change
            currentPage = 1;
        }

        // Render pagination controls
        function renderPagination() {
            const totalPages = Math.ceil(filteredTasks.length / itemsPerPage);

            // Clear pagination
            paginationNumbers.innerHTML = '';

            // Determine range of pages to show
            let startPage = Math.max(1, currentPage - 2);
            let endPage = Math.min(totalPages, startPage + 4);

            // Adjust start if we're near the end
            if (endPage - startPage < 4) {
                startPage = Math.max(1, endPage - 4);
            }

            // Add first page if not included
            if (startPage > 1) {
                addPageButton(1);
                if (startPage > 2) {
                    addEllipsis();
                }
            }

            // Add page numbers
            for (let i = startPage; i <= endPage; i++) {
                addPageButton(i);
            }

            // Add last page if not included
            if (endPage < totalPages) {
                if (endPage < totalPages - 1) {
                    addEllipsis();
                }
                addPageButton(totalPages);
            }

            // Update prev/next buttons
            prevPageBtn.disabled = currentPage === 1;
            nextPageBtn.disabled = currentPage === totalPages || totalPages === 0;

            if (prevPageBtn.disabled) {
                prevPageBtn.classList.add('disabled');
            } else {
                prevPageBtn.classList.remove('disabled');
            }

            if (nextPageBtn.disabled) {
                nextPageBtn.classList.add('disabled');
            } else {
                nextPageBtn.classList.remove('disabled');
            }
        }

        // Add a page button to pagination
        function addPageButton(pageNum) {
            const button = document.createElement('button');
            button.className =
                `pagination-btn px-3 py-1 rounded-md border ${currentPage === pageNum ? 'bg-primary text-white' : 'border-gray-300 text-gray-700'}`;
            button.textContent = pageNum;
            button.addEventListener('click', () => {
                currentPage = pageNum;
                renderTasks();
            });
            paginationNumbers.appendChild(button);
        }

        // Add ellipsis to pagination
        function addEllipsis() {
            const span = document.createElement('span');
            span.className = 'px-3 py-1';
            span.textContent = '...';
            paginationNumbers.appendChild(span);
        }

        // Format date
        function formatDate(dateString) {
            const options = {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            };
            return new Date(dateString).toLocaleDateString(undefined, options);
        }

        // Setup event listeners
        function setupEventListeners() {
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

            // Pagination controls
            prevPageBtn.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    renderTasks();
                }
            });

            nextPageBtn.addEventListener('click', () => {
                const totalPages = Math.ceil(filteredTasks.length / itemsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    renderTasks();
                }
            });

            // Search and filters
            searchInput.addEventListener('input', renderTasks);
            statusFilter.addEventListener('change', renderTasks);
            typeFilter.addEventListener('change', renderTasks);
            dateFilter.addEventListener('change', renderTasks);

            // View task buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.view-task')) {
                    const taskId = e.target.closest('.view-task').dataset.id;
                    openTaskDetailsModal(taskId);
                }
            });

            // Resolve dispute buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.resolve-dispute')) {
                    const taskId = e.target.closest('.resolve-dispute').dataset.id;
                    openResolveDisputeModal(taskId);
                }
            });

            // Cancel task buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.cancel-task')) {
                    const taskId = e.target.closest('.cancel-task').dataset.id;
                    cancelTask(taskId);
                }
            });

            // Modal close buttons
            document.querySelectorAll('.close-modal').forEach(button => {
                button.addEventListener('click', () => {
                    taskDetailsModal.classList.add('hidden');
                    resolveDisputeModal.classList.add('hidden');
                    exportModal.classList.add('hidden');
                });
            });

            // Resolve dispute form submission
            document.getElementById('resolveDisputeForm').addEventListener('submit', (e) => {
                e.preventDefault();
                resolveDispute();
            });

            // Export button
            document.getElementById('exportBtn').addEventListener('click', () => {
                exportModal.classList.remove('hidden');
            });

            // Confirm export
            document.getElementById('confirmExport').addEventListener('click', () => {
                exportTaskData();
                exportModal.classList.add('hidden');
            });

            // Cancel task button in task details
            document.getElementById('cancelTaskBtn').addEventListener('click', () => {
                const taskId = document.getElementById('detailsTaskId').textContent;
                cancelTask(taskId);
                taskDetailsModal.classList.add('hidden');
            });

            // Resolve dispute button in task details
            document.getElementById('resolveDisputeBtn').addEventListener('click', () => {
                const taskId = document.getElementById('detailsTaskId').textContent;
                openResolveDisputeModal(taskId);
                taskDetailsModal.classList.add('hidden');
            });

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
                if (!notificationsBtn.contains(event.target) && !notificationsDropdown.contains(event.target)) {
                    notificationsDropdown.classList.remove('show');
                }
            });

            // Scroll progress bar
            const scrollProgress = document.getElementById('scroll-progress');
            window.addEventListener('scroll', function() {
                const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
                const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrollPercentage = (scrollTop / scrollHeight) * 100;
                scrollProgress.style.width = scrollPercentage + '%';
            });
        }

        // Open task details modal
        function openTaskDetailsModal(taskId) {
            const task = tasks.find(t => t.id === taskId);
            if (task) {
                // Populate basic info
                document.getElementById('detailsTaskId').textContent = task.id;
                document.getElementById('detailsTitle').textContent = task.title;
                document.getElementById('detailsType').textContent = task.type;
                document.getElementById('detailsStatus').textContent = task.status;
                document.getElementById('detailsDate').textContent = formatDate(task.date);
                document.getElementById('detailsBudget').textContent = task.budget;
                document.getElementById('detailsPriority').textContent = task.priority;

                // Populate user info
                document.getElementById('detailsUserAvatar').src = task.user.avatar;
                document.getElementById('detailsUserName').textContent = task.user.name;
                document.getElementById('detailsUserEmail').textContent = task.user.email;

                // Populate provider info
                document.getElementById('detailsProviderAvatar').src = task.provider.avatar;
                document.getElementById('detailsProviderName').textContent = task.provider.name;
                document.getElementById('detailsProviderEmail').textContent = task.provider.email;

                // Populate description and location
                document.getElementById('detailsDescription').textContent = task.description;
                document.getElementById('detailsLocation').textContent = task.location;

                // Populate timeline
                document.getElementById('timelineCreated').textContent = task.timeline.created;
                document.getElementById('timelineAssigned').textContent = task.timeline.assigned;
                document.getElementById('timelineStarted').textContent = task.timeline.started || 'Not started yet';

                // Show/hide completed step
                const timelineCompletedContainer = document.getElementById('timelineCompletedContainer');
                if (task.timeline.completed) {
                    timelineCompletedContainer.classList.remove('hidden');
                    document.getElementById('timelineCompleted').textContent = task.timeline.completed;
                } else {
                    timelineCompletedContainer.classList.add('hidden');
                }

                // Show/hide action buttons based on status
                const cancelTaskBtn = document.getElementById('cancelTaskBtn');
                const resolveDisputeBtn = document.getElementById('resolveDisputeBtn');

                if (task.status === 'completed' || task.status === 'cancelled') {
                    cancelTaskBtn.classList.add('hidden');
                } else {
                    cancelTaskBtn.classList.remove('hidden');
                }

                if (task.status === 'dispute') {
                    resolveDisputeBtn.classList.remove('hidden');
                } else {
                    resolveDisputeBtn.classList.add('hidden');
                }

                // Show the modal
                taskDetailsModal.classList.remove('hidden');
            }
        }

        // Open resolve dispute modal
        function openResolveDisputeModal(taskId) {
            const task = tasks.find(t => t.id === taskId);
            if (task && task.dispute) {
                document.getElementById('disputeTaskId').value = task.id;
                document.getElementById('disputeReason').textContent = task.dispute.reason;

                // Show the modal
                resolveDisputeModal.classList.remove('hidden');
            }
        }

        // Resolve dispute
        function resolveDispute() {
            const taskId = document.getElementById('disputeTaskId').value;
            const resolution = document.getElementById('disputeResolution').value;
            const notes = document.getElementById('disputeNotes').value;

            if (!resolution) {
                alert('Please select a resolution');
                return;
            }

            // In a real application, this would update the database
            // For this demo, we'll just update the local data and show an alert
            const taskIndex = tasks.findIndex(t => t.id === taskId);
            if (taskIndex !== -1) {
                tasks[taskIndex].status = 'completed';
                tasks[taskIndex].dispute.resolution = resolution;
                tasks[taskIndex].dispute.notes = notes;
                tasks[taskIndex].dispute.resolvedAt = new Date().toLocaleString();

                resolveDisputeModal.classList.add('hidden');
                renderTasks();

                alert(`Dispute for task ${taskId} has been resolved with resolution: ${resolution}`);
            }
        }

        // Cancel task
        function cancelTask(taskId) {
            // In a real application, this would update the database
            // For this demo, we'll just update the local data and show an alert
            const taskIndex = tasks.findIndex(t => t.id === taskId);
            if (taskIndex !== -1) {
                tasks[taskIndex].status = 'cancelled';
                renderTasks();

                alert(`Task ${taskId} has been cancelled`);
            }
        }

        // Export task data
        function exportTaskData() {
            const format = document.querySelector('input[name="exportFormat"]:checked').value;
            const includeBasic = document.getElementById('includeBasicInfo').checked;
            const includeUser = document.getElementById('includeUserInfo').checked;
            const includeProvider = document.getElementById('includeProviderInfo').checked;
            const includeTimeline = document.getElementById('includeTimeline').checked;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

            // In a real application, this would generate and download the file
            // For this demo, we'll just show an alert
            alert(
                `Exporting task data in ${format.toUpperCase()} format\nIncluding: ${includeBasic ? 'Basic Info, ' : ''}${includeUser ? 'User Info, ' : ''}${includeProvider ? 'Provider Info, ' : ''}${includeTimeline ? 'Timeline' : ''}\nDate range: ${startDate || 'All'} to ${endDate || 'All'}`
            );
        }
    </script>
</body>

</html>
