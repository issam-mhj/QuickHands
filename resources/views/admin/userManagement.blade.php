<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands Admin - User Management</title>
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
                <a href="simplified-dashboard.html" class="nav-link">
                    <i class="fas fa-chart-pie icon"></i>
                    <span>Dashboard</span>
                </a>
                <a href="user-management.html" class="nav-link active">
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
                    <span class="ml-auto bg-primary text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">8</span>
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
                            User <span class="gradient-text">Management</span>
                        </h1>
                        <p class="text-gray-600">Manage and monitor all users on the platform</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Search..." class="search-input">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <div class="relative">
                            <button id="notifications-btn" class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow-md hover:bg-primary/10 transition-colors">
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
                                        <div class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center">
                                            <i class="fas fa-user-plus text-primary"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm">New user registered</p>
                                            <p class="text-xs text-gray-500">5 minutes ago</p>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <div class="w-8 h-8 rounded-full bg-secondary/20 flex items-center justify-center">
                                            <i class="fas fa-tasks text-secondary"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm">New task created</p>
                                            <p class="text-xs text-gray-500">1 hour ago</p>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <div class="w-8 h-8 rounded-full bg-accent/20 flex items-center justify-center">
                                            <i class="fas fa-star text-accent"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm">New review submitted</p>
                                            <p class="text-xs text-gray-500">3 hours ago</p>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <div class="w-8 h-8 rounded-full bg-success/20 flex items-center justify-center">
                                            <i class="fas fa-dollar-sign text-success"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm">Payment received</p>
                                            <p class="text-xs text-gray-500">Yesterday</p>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <div class="w-8 h-8 rounded-full bg-warning/20 flex items-center justify-center">
                                            <i class="fas fa-exclamation-triangle text-warning"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm">System alert</p>
                                            <p class="text-xs text-gray-500">2 days ago</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-3 border-t border-gray-100">
                                    <a href="#" class="text-center block text-sm text-primary hover:underline">View all notifications</a>
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <button id="user-btn" class="flex items-center space-x-2 p-2 rounded-xl hover:bg-gray-100 transition-colors">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Admin" class="w-8 h-8 rounded-full">
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

            <!-- User Management Controls -->
            <div class="dashboard-card mb-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-xl font-semibold text-gray-800">User List</h2>
                        <p class="text-sm text-gray-500">Manage and monitor all users on the platform</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <button id="addUserBtn" class="btn bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-plus mr-2"></i> Add User
                        </button>
                        <button id="exportBtn" class="btn bg-success hover:bg-success/90 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-file-export mr-2"></i> Export Data
                        </button>
                    </div>
                </div>

                <!-- Search and Filter -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Search users..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                    </div>

                    <div>
                        <select id="roleFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="">Filter by Role</option>
                            <option value="user">User</option>
                            <option value="provider">Provider</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div>
                        <select id="statusFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="">Filter by Status</option>
                            <option value="active">Active</option>
                            <option value="suspended">Suspended</option>
                            <option value="banned">Banned</option>
                        </select>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg overflow-hidden">
                        <thead class="table-header">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Name</span>
                                        <i class="fas fa-sort ml-1"></i>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Email</span>
                                        <i class="fas fa-sort ml-1"></i>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Role</span>
                                        <i class="fas fa-sort ml-1"></i>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Status</span>
                                        <i class="fas fa-sort ml-1"></i>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Join Date</span>
                                        <i class="fas fa-sort ml-1"></i>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200" id="userTableBody">
                            <!-- User rows will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-6">
                    <div class="text-sm text-gray-500">
                        Showing <span id="startRange">1</span> to <span id="endRange">10</span> of <span id="totalUsers">100</span> users
                    </div>

                    <div class="flex space-x-1">
                        <button id="prevPage" class="pagination-btn px-3 py-1 rounded-md border border-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
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

    <!-- Edit User Modal -->
    <div id="editUserModal" class="modal fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
        <div class="modal-content relative bg-white w-full max-w-md mx-4 rounded-lg shadow-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Edit User</h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form id="editUserForm">
                    <input type="hidden" id="editUserId">

                    <div class="mb-4">
                        <label for="editName" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" id="editName" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="editEmail" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="editEmail" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="editRole" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                        <select id="editRole" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="user">User</option>
                            <option value="provider">Provider</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="editStatus" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select id="editStatus" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="active">Active</option>
                            <option value="suspended">Suspended</option>
                            <option value="banned">Banned</option>
                        </select>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" class="close-modal px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View User Activity Modal -->
    <div id="userActivityModal" class="modal fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
        <div class="modal-content relative bg-white w-full max-w-4xl mx-4 rounded-lg shadow-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">User Activity - <span id="activityUserName"></span></h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="mb-6">
                    <div class="flex space-x-4 mb-4">
                        <button class="activity-tab px-4 py-2 bg-primary text-white rounded-md" data-tab="tasks">Tasks Posted</button>
                        <button class="activity-tab px-4 py-2 bg-gray-200 text-gray-700 rounded-md" data-tab="reviews">Reviews Given</button>
                        <button class="activity-tab px-4 py-2 bg-gray-200 text-gray-700 rounded-md" data-tab="logins">Login History</button>
                    </div>

                    <div id="tasksTab" class="activity-content">
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Task ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200" id="tasksTableBody">
                                    <!-- Tasks will be populated by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="reviewsTab" class="activity-content hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Provider</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Rating</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Comment</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200" id="reviewsTableBody">
                                    <!-- Reviews will be populated by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="loginsTab" class="activity-content hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Date & Time</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">IP Address</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Device</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Location</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200" id="loginsTableBody">
                                    <!-- Login history will be populated by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button class="close-modal px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Export Options Modal -->
    <div id="exportModal" class="modal fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
        <div class="modal-content relative bg-white w-full max-w-md mx-4 rounded-lg shadow-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Export User Data</h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="mb-4">
                    <p class="text-gray-600 mb-4">Select the format you want to export the user data in:</p>

                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="radio" id="csvFormat" name="exportFormat" value="csv" class="h-4 w-4 text-primary focus:ring-primary" checked>
                            <label for="csvFormat" class="ml-2 text-gray-700">CSV Format</label>
                        </div>

                        <div class="flex items-center">
                            <input type="radio" id="excelFormat" name="exportFormat" value="excel" class="h-4 w-4 text-primary focus:ring-primary">
                            <label for="excelFormat" class="ml-2 text-gray-700">Excel Format</label>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <p class="text-gray-600 mb-2">Select data to include:</p>

                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input type="checkbox" id="includeBasicInfo" class="h-4 w-4 text-primary focus:ring-primary" checked>
                            <label for="includeBasicInfo" class="ml-2 text-gray-700">Basic Information</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="includeActivity" class="h-4 w-4 text-primary focus:ring-primary">
                            <label for="includeActivity" class="ml-2 text-gray-700">User Activity</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="includeLoginHistory" class="h-4 w-4 text-primary focus:ring-primary">
                            <label for="includeLoginHistory" class="ml-2 text-gray-700">Login History</label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" class="close-modal px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</button>
                    <button id="confirmExport" class="px-4 py-2 bg-success text-white rounded-md hover:bg-success/90">Export</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample user data
        const users = [
            { id: 1, name: 'John Doe', email: 'john.doe@example.com', role: 'user', status: 'active', joinDate: '2023-01-15' },
            { id: 2, name: 'Jane Smith', email: 'jane.smith@example.com', role: 'user', status: 'active', joinDate: '2023-02-03' },
            { id: 3, name: 'Robert Johnson', email: 'robert.j@example.com', role: 'provider', status: 'active', joinDate: '2023-01-20' },
            { id: 4, name: 'Emily Davis', email: 'emily.davis@example.com', role: 'user', status: 'suspended', joinDate: '2023-03-10' },
            { id: 5, name: 'Michael Brown', email: 'michael.b@example.com', role: 'provider', status: 'active', joinDate: '2023-02-15' },
            { id: 6, name: 'Sarah Wilson', email: 'sarah.w@example.com', role: 'user', status: 'banned', joinDate: '2023-01-05' },
            { id: 7, name: 'David Miller', email: 'david.m@example.com', role: 'admin', status: 'active', joinDate: '2022-12-10' },
            { id: 8, name: 'Jennifer Taylor', email: 'jennifer.t@example.com', role: 'user', status: 'active', joinDate: '2023-03-01' },
            { id: 9, name: 'Thomas Anderson', email: 'thomas.a@example.com', role: 'provider', status: 'suspended', joinDate: '2023-02-20' },
            { id: 10, name: 'Lisa Moore', email: 'lisa.m@example.com', role: 'user', status: 'active', joinDate: '2023-01-25' },
            { id: 11, name: 'Daniel White', email: 'daniel.w@example.com', role: 'user', status: 'active', joinDate: '2023-03-15' },
            { id: 12, name: 'Jessica Brown', email: 'jessica.b@example.com', role: 'provider', status: 'active', joinDate: '2023-02-10' },
            { id: 13, name: 'Matthew Johnson', email: 'matthew.j@example.com', role: 'user', status: 'banned', joinDate: '2023-01-30' },
            { id: 14, name: 'Amanda Clark', email: 'amanda.c@example.com', role: 'user', status: 'active', joinDate: '2023-02-25' },
            { id: 15, name: 'Christopher Lee', email: 'chris.l@example.com', role: 'provider', status: 'active', joinDate: '2023-03-05' },
            { id: 16, name: 'Stephanie Hall', email: 'steph.h@example.com', role: 'user', status: 'suspended', joinDate: '2023-01-18' },
            { id: 17, name: 'Andrew Wilson', email: 'andrew.w@example.com', role: 'admin', status: 'active', joinDate: '2022-12-15' },
            { id: 18, name: 'Nicole Adams', email: 'nicole.a@example.com', role: 'user', status: 'active', joinDate: '2023-02-08' },
            { id: 19, name: 'Kevin Martin', email: 'kevin.m@example.com', role: 'provider', status: 'active', joinDate: '2023-01-22' },
            { id: 20, name: 'Rachel Green', email: 'rachel.g@example.com', role: 'user', status: 'active', joinDate: '2023-03-12' }
        ];

        // Sample task data
        const tasks = [
            { id: 'T1001', title: 'Furniture Assembly', date: '2023-03-10', status: 'Completed' },
            { id: 'T1002', title: 'House Cleaning', date: '2023-03-05', status: 'Completed' },
            { id: 'T1003', title: 'Grocery Delivery', date: '2023-03-15', status: 'In Progress' },
            { id: 'T1004', title: 'Dog Walking', date: '2023-03-12', status: 'Completed' },
            { id: 'T1005', title: 'Lawn Mowing', date: '2023-03-18', status: 'Pending' }
        ];

        // Sample review data
        const reviews = [
            { provider: 'Robert Johnson', rating: 4.5, date: '2023-03-11', comment: 'Great service, very professional!' },
            { provider: 'Michael Brown', rating: 5, date: '2023-03-06', comment: 'Excellent work, highly recommend!' },
            { provider: 'Jessica Brown', rating: 3.5, date: '2023-03-16', comment: 'Good service but arrived late.' },
            { provider: 'Christopher Lee', rating: 4, date: '2023-03-13', comment: 'Did a thorough job, would hire again.' }
        ];

        // Sample login history
        const loginHistory = [
            { datetime: '2023-03-15 09:23:45', ip: '192.168.1.1', device: 'iPhone 13', location: 'New York, USA' },
            { datetime: '2023-03-14 14:12:30', ip: '192.168.1.1', device: 'MacBook Pro', location: 'New York, USA' },
            { datetime: '2023-03-12 18:45:22', ip: '192.168.1.1', device: 'iPhone 13', location: 'New York, USA' },
            { datetime: '2023-03-10 10:05:17', ip: '192.168.1.1', device: 'MacBook Pro', location: 'New York, USA' }
        ];

        // Pagination variables
        let currentPage = 1;
        const itemsPerPage = 10;
        let filteredUsers = [...users];

        // DOM elements
        const userTableBody = document.getElementById('userTableBody');
        const paginationNumbers = document.getElementById('paginationNumbers');
        const prevPageBtn = document.getElementById('prevPage');
        const nextPageBtn = document.getElementById('nextPage');
        const startRangeEl = document.getElementById('startRange');
        const endRangeEl = document.getElementById('endRange');
        const totalUsersEl = document.getElementById('totalUsers');
        const searchInput = document.getElementById('searchInput');
        const roleFilter = document.getElementById('roleFilter');
        const statusFilter = document.getElementById('statusFilter');
        const editUserModal = document.getElementById('editUserModal');
        const userActivityModal = document.getElementById('userActivityModal');
        const exportModal = document.getElementById('exportModal');

        // Initialize the page
        document.addEventListener('DOMContentLoaded', () => {
            renderUsers();
            setupEventListeners();
        });

        // Render users table
        function renderUsers() {
            // Apply filters
            applyFilters();

            // Calculate pagination
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, filteredUsers.length);
            const paginatedUsers = filteredUsers.slice(startIndex, endIndex);

            // Update pagination info
            startRangeEl.textContent = filteredUsers.length > 0 ? startIndex + 1 : 0;
            endRangeEl.textContent = endIndex;
            totalUsersEl.textContent = filteredUsers.length;

            // Clear table
            userTableBody.innerHTML = '';

            // Render user rows
            paginatedUsers.forEach(user => {
                const row = document.createElement('tr');
                row.className = 'hover:bg-gray-50';

                // Status badge class
                let statusClass = '';
                switch(user.status) {
                    case 'active': statusClass = 'badge-active'; break;
                    case 'suspended': statusClass = 'badge-suspended'; break;
                    case 'banned': statusClass = 'badge-banned'; break;
                }

                row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=${encodeURIComponent(user.name)}&background=random" alt="${user.name}">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">${user.name}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${user.email}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 capitalize">${user.role}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="badge ${statusClass} capitalize">${user.status}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${formatDate(user.joinDate)}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex space-x-2 justify-end">
                            <button class="edit-user text-primary hover:text-primary/80" data-id="${user.id}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="view-activity text-success hover:text-success/80" data-id="${user.id}">
                                <i class="fas fa-chart-line"></i>
                            </button>
                            ${user.status !== 'banned' ?
                                `<button class="ban-user text-danger hover:text-danger/80" data-id="${user.id}">
                                    <i class="fas fa-ban"></i>
                                </button>` :
                                `<button class="unban-user text-warning hover:text-warning/80" data-id="${user.id}">
                                    <i class="fas fa-undo"></i>
                                </button>`
                            }
                        </div>
                    </td>
                `;

                userTableBody.appendChild(row);
            });

            // Render pagination
            renderPagination();
        }

        // Apply filters to users
        function applyFilters() {
            const searchTerm = searchInput.value.toLowerCase();
            const roleValue = roleFilter.value;
            const statusValue = statusFilter.value;

            filteredUsers = users.filter(user => {
                const matchesSearch = searchTerm === '' ||
                    user.name.toLowerCase().includes(searchTerm) ||
                    user.email.toLowerCase().includes(searchTerm);

                const matchesRole = roleValue === '' || user.role === roleValue;
                const matchesStatus = statusValue === '' || user.status === statusValue;

                return matchesSearch && matchesRole && matchesStatus;
            });

            // Reset to first page when filters change
            currentPage = 1;
        }

        // Render pagination controls
        function renderPagination() {
            const totalPages = Math.ceil(filteredUsers.length / itemsPerPage);

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
            button.className = `pagination-btn px-3 py-1 rounded-md border ${currentPage === pageNum ? 'bg-primary text-white' : 'border-gray-300 text-gray-700'}`;
            button.textContent = pageNum;
            button.addEventListener('click', () => {
                currentPage = pageNum;
                renderUsers();
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
            const options = { year: 'numeric', month: 'short', day: 'numeric' };
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
                    renderUsers();
                }
            });

            nextPageBtn.addEventListener('click', () => {
                const totalPages = Math.ceil(filteredUsers.length / itemsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    renderUsers();
                }
            });

            // Search and filters
            searchInput.addEventListener('input', renderUsers);
            roleFilter.addEventListener('change', renderUsers);
            statusFilter.addEventListener('change', renderUsers);

            // Edit user buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.edit-user')) {
                    const userId = parseInt(e.target.closest('.edit-user').dataset.id);
                    openEditUserModal(userId);
                }
            });

            // View activity buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.view-activity')) {
                    const userId = parseInt(e.target.closest('.view-activity').dataset.id);
                    openUserActivityModal(userId);
                }
            });

            // Ban/unban user buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.ban-user')) {
                    const userId = parseInt(e.target.closest('.ban-user').dataset.id);
                    banUser(userId);
                }

                if (e.target.closest('.unban-user')) {
                    const userId = parseInt(e.target.closest('.unban-user').dataset.id);
                    unbanUser(userId);
                }
            });

            // Modal close buttons
            document.querySelectorAll('.close-modal').forEach(button => {
                button.addEventListener('click', () => {
                    editUserModal.classList.add('hidden');
                    userActivityModal.classList.add('hidden');
                    exportModal.classList.add('hidden');
                });
            });

            // Edit user form submission
            document.getElementById('editUserForm').addEventListener('submit', (e) => {
                e.preventDefault();
                saveUserChanges();
            });

            // Activity tabs
            document.querySelectorAll('.activity-tab').forEach(tab => {
                tab.addEventListener('click', () => {
                    const tabName = tab.dataset.tab;
                    switchActivityTab(tabName);
                });
            });

            // Export button
            document.getElementById('exportBtn').addEventListener('click', () => {
                exportModal.classList.remove('hidden');
            });

            // Confirm export
            document.getElementById('confirmExport').addEventListener('click', () => {
                exportUserData();
                exportModal.classList.add('hidden');
            });

            // Add user button
            document.getElementById('addUserBtn').addEventListener('click', () => {
                openAddUserModal();
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

        // Open edit user modal
        function openEditUserModal(userId) {
            const user = users.find(u => u.id === userId);
            if (user) {
                document.getElementById('editUserId').value = user.id;
                document.getElementById('editName').value = user.name;
                document.getElementById('editEmail').value = user.email;
                document.getElementById('editRole').value = user.role;
                document.getElementById('editStatus').value = user.status;

                editUserModal.classList.remove('hidden');
            }
        }

        // Open add user modal (reuses edit modal)
        function openAddUserModal() {
            document.getElementById('editUserId').value = '';
            document.getElementById('editName').value = '';
            document.getElementById('editEmail').value = '';
            document.getElementById('editRole').value = 'user';
            document.getElementById('editStatus').value = 'active';

            editUserModal.classList.remove('hidden');
        }

        // Save user changes
        function saveUserChanges() {
            const userId = document.getElementById('editUserId').value;
            const name = document.getElementById('editName').value;
            const email = document.getElementById('editEmail').value;
            const role = document.getElementById('editRole').value;
            const status = document.getElementById('editStatus').value;

            if (userId) {
                // Edit existing user
                const userIndex = users.findIndex(u => u.id === parseInt(userId));
                if (userIndex !== -1) {
                    users[userIndex].name = name;
                    users[userIndex].email = email;
                    users[userIndex].role = role;
                    users[userIndex].status = status;
                }
            } else {
                // Add new user
                const newId = Math.max(...users.map(u => u.id)) + 1;
                const today = new Date().toISOString().split('T')[0];

                users.push({
                    id: newId,
                    name,
                    email,
                    role,
                    status,
                    joinDate: today
                });
            }

            editUserModal.classList.add('hidden');
            renderUsers();
        }

        // Open user activity modal
        function openUserActivityModal(userId) {
            const user = users.find(u => u.id === userId);
            if (user) {
                document.getElementById('activityUserName').textContent = user.name;

                // Populate tasks tab
                const tasksTableBody = document.getElementById('tasksTableBody');
                tasksTableBody.innerHTML = '';

                tasks.forEach(task => {
                    const row = document.createElement('tr');
                    row.className = 'hover:bg-gray-50';
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${task.id}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${task.title}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${formatDate(task.date)}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full ${
                                task.status === 'Completed' ? 'bg-green-100 text-green-800' :
                                task.status === 'In Progress' ? 'bg-blue-100 text-blue-800' :
                                'bg-yellow-100 text-yellow-800'
                            }">${task.status}</span>
                        </td>
                    `;
                    tasksTableBody.appendChild(row);
                });

                // Populate reviews tab
                const reviewsTableBody = document.getElementById('reviewsTableBody');
                reviewsTableBody.innerHTML = '';

                reviews.forEach(review => {
                    const row = document.createElement('tr');
                    row.className = 'hover:bg-gray-50';
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${review.provider}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-sm text-gray-900 mr-1">${review.rating}</span>
                                <div class="text-yellow-400">
                                    ${'★'.repeat(Math.floor(review.rating))}${review.rating % 1 >= 0.5 ? '½' : ''}${'☆'.repeat(5 - Math.ceil(review.rating))}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${formatDate(review.date)}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${review.comment}</td>
                    `;
                    reviewsTableBody.appendChild(row);
                });

                // Populate logins tab
                const loginsTableBody = document.getElementById('loginsTableBody');
                loginsTableBody.innerHTML = '';

                loginHistory.forEach(login => {
                    const row = document.createElement('tr');
                    row.className = 'hover:bg-gray-50';
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${login.datetime}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${login.ip}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${login.device}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${login.location}</td>
                    `;
                    loginsTableBody.appendChild(row);
                });

                // Show the modal
                userActivityModal.classList.remove('hidden');

                // Reset to first tab
                switchActivityTab('tasks');
            }
        }

        // Switch activity tab
        function switchActivityTab(tabName) {
            // Update tab buttons
            document.querySelectorAll('.activity-tab').forEach(tab => {
                if (tab.dataset.tab === tabName) {
                    tab.classList.remove('bg-gray-200', 'text-gray-700');
                    tab.classList.add('bg-primary', 'text-white');
                } else {
                    tab.classList.remove('bg-primary', 'text-white');
                    tab.classList.add('bg-gray-200', 'text-gray-700');
                }
            });

            // Update tab content
            document.querySelectorAll('.activity-content').forEach(content => {
                content.classList.add('hidden');
            });
            document.getElementById(`${tabName}Tab`).classList.remove('hidden');
        }

        // Ban user
        function banUser(userId) {
            const userIndex = users.findIndex(u => u.id === userId);
            if (userIndex !== -1) {
                users[userIndex].status = 'banned';
                renderUsers();
            }
        }

        // Unban user
        function unbanUser(userId) {
            const userIndex = users.findIndex(u => u.id === userId);
            if (userIndex !== -1) {
                users[userIndex].status = 'active';
                renderUsers();
            }
        }

        // Export user data
        function exportUserData() {
            const format = document.querySelector('input[name="exportFormat"]:checked').value;
            const includeBasic = document.getElementById('includeBasicInfo').checked;
            const includeActivity = document.getElementById('includeActivity').checked;
            const includeLogin = document.getElementById('includeLoginHistory').checked;

            // In a real application, this would generate and download the file
            // For this demo, we'll just show an alert
            alert(`Exporting user data in ${format.toUpperCase()} format\nIncluding: ${includeBasic ? 'Basic Info, ' : ''}${includeActivity ? 'Activity, ' : ''}${includeLogin ? 'Login History' : ''}`);
        }
    </script>
</body>
</html>
