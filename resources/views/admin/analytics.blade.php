<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands Admin - Analytics & Reporting</title>
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
                @apply relative rounded-2xl overflow-hidden bg-white p-6;
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

            .date-range-selector {
                @apply flex items-center space-x-2 p-2 bg-white rounded-lg border border-gray-200;
            }

            .date-range-selector button {
                @apply px-3 py-1 rounded-md text-sm transition-all duration-200;
            }

            .date-range-selector button.active {
                @apply bg-primary text-white;
            }

            .date-range-selector button:not(.active) {
                @apply hover:bg-gray-100;
            }

            .metric-card {
                @apply bg-white rounded-xl shadow-md p-5 flex flex-col;
            }

            .metric-value {
                @apply text-3xl font-bold mb-1;
            }

            .metric-label {
                @apply text-sm text-gray-500;
            }

            .metric-trend {
                @apply flex items-center mt-2 text-sm;
            }

            .trend-up {
                @apply text-success;
            }

            .trend-down {
                @apply text-danger;
            }

            .trend-neutral {
                @apply text-gray-500;
            }

            .tab-button {
                @apply px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200;
            }

            .tab-button.active {
                @apply bg-primary text-white;
            }

            .tab-button:not(.active) {
                @apply text-gray-600 hover:bg-gray-100;
            }

            .data-table {
                @apply w-full border-collapse;
            }

            .data-table th {
                @apply px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50;
            }

            .data-table td {
                @apply px-4 py-3 text-sm border-t border-gray-100;
            }

            .data-table tr:hover td {
                @apply bg-gray-50;
            }

            .legend-item {
                @apply flex items-center space-x-2 text-sm;
            }

            .legend-color {
                @apply w-3 h-3 rounded-full;
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
                <a href="#" class="nav-link">
                    <i class="fas fa-user-tie icon"></i>
                    <span>Provider Management</span>
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-shield-alt icon"></i>
                    <span>Content Moderation</span>
                </a>
                <a href="task-oversight.html" class="nav-link">
                    <i class="fas fa-tasks icon"></i>
                    <span>Task Oversight</span>
                </a>
                <a href="analytics-reporting.html" class="nav-link active">
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
                            Analytics & <span class="gradient-text">Reporting</span>
                        </h1>
                        <p class="text-gray-600">Detailed insights into platform performance</p>
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

            <!-- Date Range Selector -->
            <div class="dashboard-card mb-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <h2 class="text-xl font-semibold mb-4 md:mb-0">Analytics Overview</h2>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="date-range-selector">
                            <button class="date-range-btn active" data-range="7">7 Days</button>
                            <button class="date-range-btn" data-range="30">30 Days</button>
                            <button class="date-range-btn" data-range="90">90 Days</button>
                            <button class="date-range-btn" data-range="365">1 Year</button>
                            <button class="date-range-btn" data-range="custom">Custom</button>
                        </div>
                        <button id="exportAnalyticsBtn"
                            class="btn bg-success hover:bg-success/90 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-file-export mr-2"></i> Export Data
                        </button>
                    </div>
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="metric-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <div class="metric-value" id="totalUsers">{{ $usersNum }}</div>
                            <div class="metric-label">Total Users</div>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="metric-trend trend-up">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>12.5% vs last period</span>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <div class="metric-value" id="totalProviders">{{ $provNum }}</div>
                            <div class="metric-label">Active Providers</div>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center text-secondary">
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </div>
                    <div class="metric-trend trend-up">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>8.3% vs last period</span>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <div class="metric-value" id="totalTasks">{{ $taskNum }}</div>
                            <div class="metric-label">Total Tasks</div>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center text-accent">
                            <i class="fas fa-tasks"></i>
                        </div>
                    </div>
                    <div class="metric-trend trend-up">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>15.2% vs last period</span>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <div class="metric-value" id="totalRevenue">${{ $totalRev }}</div>
                            <div class="metric-label">Total Revenue</div>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-success/10 flex items-center justify-center text-success">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                    <div class="metric-trend trend-up">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>18.7% vs last period</span>
                    </div>
                </div>
            </div>

            <!-- User Analytics Section -->
            <div class="dashboard-card mb-6">
                <h2 class="text-xl font-semibold mb-4">User Analytics</h2>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- User Growth Chart -->
                    <div class="chart-container shadow-md rounded-xl">
                        <h3 class="text-lg font-medium mb-4">User Growth Trends</h3>
                        <div class="h-80">
                            <canvas id="userGrowthChart"></canvas>
                        </div>
                    </div>

                    <!-- User Activity Chart -->
                    <div class="chart-container shadow-md rounded-xl">
                        <h3 class="text-lg font-medium mb-4">User Activity</h3>
                        <div class="h-80">
                            <canvas id="userActivityChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- User Demographics -->
                <div class="mt-6">
                    <h3 class="text-lg font-medium mb-4">User Demographics</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Age Distribution -->
                        <div class="chart-container shadow-md rounded-xl">
                            <h4 class="text-base font-medium mb-3">Age Distribution</h4>
                            <div class="h-64">
                                <canvas id="ageDistributionChart"></canvas>
                            </div>
                        </div>

                        <!-- Gender Distribution -->
                        <div class="chart-container shadow-md rounded-xl">
                            <h4 class="text-base font-medium mb-3">Gender Distribution</h4>
                            <div class="h-64">
                                <canvas id="genderDistributionChart"></canvas>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <!-- Provider Analytics Section -->
            <div class="dashboard-card mb-6">
                <h2 class="text-xl font-semibold mb-4">Provider Analytics</h2>

                <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
                    <!-- Provider Earnings Chart -->
                    <div class="chart-container shadow-md rounded-xl">
                        <h3 class="text-lg font-medium mb-4">Provider Earnings</h3>
                        <div class="h-80">
                            <canvas id="providerEarningsChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Provider Ratings -->
                <div class="mt-6">
                    <h3 class="text-lg font-medium mb-4">Provider Ratings Distribution</h3>
                    <div class="chart-container shadow-md rounded-xl">
                        <div class="h-64">
                            <canvas id="providerRatingsChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Top Providers Table -->
                <div class="mt-6">
                    <h3 class="text-lg font-medium mb-4">Top Performing Providers</h3>
                    <div class="overflow-x-auto">
                        <table class="data-table min-w-full">
                            <thead>
                                <tr>
                                    <th>Provider</th>
                                    <th>Tasks Completed</th>
                                    <th>Avg. Rating</th>
                                    <th>Total Earnings</th>
                                    <th>Completion Rate</th>
                                </tr>
                            </thead>
                            <tbody id="topProvidersTableBody">
                                @foreach ($providerStats as $provider)
                                    @php
                                        // Calculate completed tasks count
                                        $completedTasksCount = 0;
                                        foreach ($tasks as $task) {
                                            if ($task->offer->provider_id == $provider->id) {
                                                $completedTasksCount++;
                                            }
                                        }

                                        // Calculate average rating
                                        $reviewSum = 0;
                                        $reviewCount = 0;
                                        foreach ($reviews as $review) {
                                            if ($review->offer->provider_id == $provider->id) {
                                                $reviewSum += $review->rating;
                                                $reviewCount++;
                                            }
                                        }
                                        $averageRating =
                                            $reviewCount > 0 ? number_format($reviewSum / $reviewCount, 1) : 0;

                                        // Calculate earnings
                                        $totalEarnings = 0;
                                        foreach ($tasks as $task) {
                                            if ($task->offer->provider_id == $provider->id) {
                                                $totalEarnings += $task->offer->proposed_amount;
                                            }
                                        }

                                        // Calculate completion rate
                                        $completedCount = 0;
                                        $totalAssignedTasks = 0;
                                        foreach ($allTasks as $task) {
                                            if ($task->offer->provider_id == $provider->id) {
                                                $totalAssignedTasks++;
                                                if ($task->status == 'completed') {
                                                    $completedCount++;
                                                }
                                            }
                                        }
                                        $completionRate =
                                            $totalAssignedTasks > 0
                                                ? round(($completedCount * 100) / $totalAssignedTasks)
                                                : 0;
                                    @endphp

                                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                                        <td class="px-4 py-3 border-b">
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600">
                                                    {{ substr($provider->user->name, 0, 1) }}
                                                </div>
                                                <span class="font-medium">{{ $provider->user->name }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 border-b text-center">
                                            <span class="font-medium">{{ $completedTasksCount }}</span>
                                            <div class="text-xs text-gray-500">Tasks</div>
                                        </td>
                                        <td class="px-4 py-3 border-b">
                                            <div class="flex items-center justify-center">
                                                <span class="font-medium mr-2">{{ $averageRating }}</span>
                                                <div class="flex text-sm">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= floor($averageRating))
                                                            <span class="text-yellow-400">★</span>
                                                        @elseif ($i - 0.5 <= $averageRating)
                                                            <span class="text-yellow-400">★</span>
                                                        @else
                                                            <span class="text-gray-300">★</span>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 border-b text-center">
                                            <span class="font-medium">${{ number_format($totalEarnings, 2) }}</span>
                                            <div class="text-xs text-gray-500">Earnings</div>
                                        </td>
                                        <td class="px-4 py-3 border-b">
                                            <div class="flex flex-col items-center">
                                                <div class="flex items-center w-full mb-1">
                                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                                        <div class="bg-green-500 rounded-full h-2"
                                                            style="width: {{ $completionRate }}%"></div>
                                                    </div>
                                                </div>
                                                <div class="flex justify-between w-full text-xs">
                                                    <span class="font-medium">{{ $completionRate }}%</span>
                                                    <span
                                                        class="text-gray-500">{{ $completedCount }}/{{ $totalAssignedTasks }}
                                                        tasks</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Export Modal -->
    <div id="exportModal" class="modal fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
        <div class="modal-content relative bg-white w-full max-w-md mx-4 rounded-lg shadow-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Export Analytics Data</h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="mb-4">
                    <p class="text-gray-600 mb-4">Select the format you want to export the analytics data in:</p>

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

                        <div class="flex items-center">
                            <input type="radio" id="pdfFormat" name="exportFormat" value="pdf"
                                class="h-4 w-4 text-primary focus:ring-primary">
                            <label for="pdfFormat" class="ml-2 text-gray-700">PDF Format</label>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <p class="text-gray-600 mb-2">Select data to include:</p>

                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input type="checkbox" id="includeUserAnalytics"
                                class="h-4 w-4 text-primary focus:ring-primary" checked>
                            <label for="includeUserAnalytics" class="ml-2 text-gray-700">User Analytics</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="includeProviderAnalytics"
                                class="h-4 w-4 text-primary focus:ring-primary" checked>
                            <label for="includeProviderAnalytics" class="ml-2 text-gray-700">Provider
                                Analytics</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="includeTaskAnalytics"
                                class="h-4 w-4 text-primary focus:ring-primary" checked>
                            <label for="includeTaskAnalytics" class="ml-2 text-gray-700">Task Analytics</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="includeRevenueAnalytics"
                                class="h-4 w-4 text-primary focus:ring-primary" checked>
                            <label for="includeRevenueAnalytics" class="ml-2 text-gray-700">Revenue Analytics</label>
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
        // Initialize the page
        document.addEventListener('DOMContentLoaded', () => {
            setupEventListeners();
            initializeCharts();
        });

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

            // Date range buttons
            document.querySelectorAll('.date-range-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.date-range-btn').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    updateCharts(btn.dataset.range);
                });
            });

            // Export button
            document.getElementById('exportAnalyticsBtn').addEventListener('click', () => {
                document.getElementById('exportModal').classList.remove('hidden');
            });

            // Confirm export
            document.getElementById('confirmExport').addEventListener('click', () => {
                exportAnalyticsData();
                document.getElementById('exportModal').classList.add('hidden');
            });

            // Modal close buttons
            document.querySelectorAll('.close-modal').forEach(button => {
                button.addEventListener('click', () => {
                    document.getElementById('exportModal').classList.add('hidden');
                });
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

        // Initialize all charts
        function initializeCharts() {
            // User Growth Chart
            const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
            const userGrowthChart = new Chart(userGrowthCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'New Users',
                        data: [{{ $janUsersCount }}, {{ $febUsersCount }}, {{ $marUsersCount }},
                            {{ $aprUsersCount }}, {{ $maiUsersCount }}, {{ $junUsersCount }},
                            {{ $julUsersCount }}
                        ],
                        borderColor: '#FF6B6B',
                        backgroundColor: 'rgba(255, 107, 107, 0.1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
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

            const userActivityCtx = document.getElementById('userActivityChart').getContext('2d');
            const userActivityChart = new Chart(userActivityCtx, {
                type: 'bar',
                data: {
                    labels: ['Tasks Posted', 'Reviews Given', 'Messages Sent'],
                    datasets: [{
                        label: 'Activity Count',
                        data: [{{ $serviceNum }}, {{ $reviewsNum }}, {{ $messageNum }}],
                        backgroundColor: [
                            'rgba(255, 107, 107, 0.7)',
                            'rgba(78, 205, 196, 0.7)',
                            'rgba(255, 230, 109, 0.7)'
                        ],
                        borderColor: [
                            'rgba(255, 107, 107, 1)',
                            'rgba(78, 205, 196, 1)',
                            'rgba(255, 230, 109, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Age Distribution Chart
            const ageDistributionCtx = document.getElementById('ageDistributionChart').getContext('2d');
            const ageDistributionChart = new Chart(ageDistributionCtx, {
                type: 'doughnut',
                data: {
                    labels: ['18-24', '25-34', '35-44', '45-54', '55+'],
                    datasets: [{
                        data: [{{ $firstAge }}, {{ $secondAge }}, {{ $thirdAge }},
                            {{ $fourthAge }}, {{ $fifthAge }}
                        ],
                        backgroundColor: [
                            'rgba(255, 107, 107, 0.7)',
                            'rgba(78, 205, 196, 0.7)',
                            'rgba(255, 230, 109, 0.7)',
                            'rgba(46, 204, 113, 0.7)',
                            'rgba(52, 152, 219, 0.7)'
                        ],
                        borderColor: [
                            'rgba(255, 107, 107, 1)',
                            'rgba(78, 205, 196, 1)',
                            'rgba(255, 230, 109, 1)',
                            'rgba(46, 204, 113, 1)',
                            'rgba(52, 152, 219, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    }
                }
            });

            // Gender Distribution Chart
            const genderDistributionCtx = document.getElementById('genderDistributionChart').getContext('2d');
            const genderDistributionChart = new Chart(genderDistributionCtx, {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        data: [{{ $male }}, {{ $female }}],
                        backgroundColor: [
                            'rgba(52, 152, 219, 0.7)',
                            'rgba(255, 107, 107, 0.7)',
                        ],
                        borderColor: [
                            'rgba(52, 152, 219, 1)',
                            'rgba(255, 107, 107, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    }
                }
            });
            // Provider Earnings Chart
            const providerEarningsCtx = document.getElementById('providerEarningsChart').getContext('2d');
            const providerEarningsChart = new Chart(providerEarningsCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'Provider Earnings',
                        data: [{{ $janProvearn }}, {{ $febProvearn }}, {{ $marProvearn }},
                            {{ $avrProvearn }}, {{ $maiProvearn }}, {{ $junProvearn }},
                            {{ $julProvearn }}
                        ],
                        backgroundColor: 'rgba(78, 205, 196, 0.7)',
                        borderColor: 'rgba(78, 205, 196, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value;
                                }
                            }
                        }
                    }
                }
            });

            // Provider Ratings Chart
            const providerRatingsCtx = document.getElementById('providerRatingsChart').getContext('2d');
            const providerRatingsChart = new Chart(providerRatingsCtx, {
                type: 'bar',
                data: {
                    labels: ['1 Star', '2 Stars', '3 Stars', '4 Stars', '5 Stars'],
                    datasets: [{
                        label: 'Number of Ratings',
                        data: [{{ $oneRate }}, {{ $twoRate }}, {{ $threeRate }},
                            {{ $fourRate }}, {{ $fiveRate }}
                        ],
                        backgroundColor: [
                            'rgba(231, 76, 60, 0.7)',
                            'rgba(243, 156, 18, 0.7)',
                            'rgba(255, 230, 109, 0.7)',
                            'rgba(46, 204, 113, 0.7)',
                            'rgba(52, 152, 219, 0.7)'
                        ],
                        borderColor: [
                            'rgba(231, 76, 60, 1)',
                            'rgba(243, 156, 18, 1)',
                            'rgba(255, 230, 109, 1)',
                            'rgba(46, 204, 113, 1)',
                            'rgba(52, 152, 219, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            // Revenue by Region Chart
            const revenueByRegionCtx = document.getElementById('revenueByRegionChart').getContext('2d');
            const revenueByRegionChart = new Chart(revenueByRegionCtx, {
                type: 'bar',
                data: {
                    labels: ['Northeast', 'Southeast', 'Midwest', 'Southwest', 'West'],
                    datasets: [{
                        label: 'Revenue',
                        data: [42000, 35000, 28000, 22000, 38000],
                        backgroundColor: 'rgba(46, 204, 113, 0.7)',
                        borderColor: 'rgba(46, 204, 113, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value;
                                }
                            }
                        }
                    }
                }
            });
        }

        // Update charts based on date range
        function updateCharts(range) {
            // In a real application, this would fetch new data based on the selected range
            // For this demo, we'll just show an alert
            console.log(`Updating charts for range: ${range} days`);

            // Simulate data updates with random variations
            if (range === 'custom') {
                // Show a date picker or custom range selector in a real app
                alert('In a real application, a date picker would appear here to select custom date range');
            } else {
                // Update key metrics with random variations
                const variation = Math.random() * 0.2 - 0.1; // -10% to +10%

                const totalUsers = document.getElementById('totalUsers');
                const currentUsers = parseInt(totalUsers.textContent.replace(/,/g, ''));
                totalUsers.textContent = Math.round(currentUsers * (1 + variation)).toLocaleString();

                const totalProviders = document.getElementById('totalProviders');
                const currentProviders = parseInt(totalProviders.textContent.replace(/,/g, ''));
                totalProviders.textContent = Math.round(currentProviders * (1 + variation)).toLocaleString();

                const totalTasks = document.getElementById('totalTasks');
                const currentTasks = parseInt(totalTasks.textContent.replace(/,/g, ''));
                totalTasks.textContent = Math.round(currentTasks * (1 + variation)).toLocaleString();

                const totalRevenue = document.getElementById('totalRevenue');
                const currentRevenue = parseInt(totalRevenue.textContent.replace(/[$,]/g, ''));
                totalRevenue.textContent = '$' + Math.round(currentRevenue * (1 + variation)).toLocaleString();
            }
        }

        // Export analytics data
        function exportAnalyticsData() {
            const format = document.querySelector('input[name="exportFormat"]:checked').value;
            const includeUser = document.getElementById('includeUserAnalytics').checked;
            const includeProvider = document.getElementById('includeProviderAnalytics').checked;
            const includeTask = document.getElementById('includeTaskAnalytics').checked;
            const includeRevenue = document.getElementById('includeRevenueAnalytics').checked;

            // In a real application, this would generate and download the file
            // For this demo, we'll just show an alert
            alert(
                `Exporting analytics data in ${format.toUpperCase()} format\nIncluding: ${includeUser ? 'User Analytics, ' : ''}${includeProvider ? 'Provider Analytics, ' : ''}${includeTask ? 'Task Analytics, ' : ''}${includeRevenue ? 'Revenue Analytics' : ''}`
            );
        }
    </script>
</body>

</html>
