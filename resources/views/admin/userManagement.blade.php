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
                    <img src="https://cdn.pixabay.com/photo/2018/11/13/22/01/avatar-3814081_1280.png" alt="Admin"
                        class="user-avatar">
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
                            User <span class="gradient-text">Management</span>
                        </h1>
                        <p class="text-gray-600">Manage and monitor all users on the platform</p>
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
                                <img src="https://cdn.pixabay.com/photo/2018/11/13/22/01/avatar-3814081_1280.png"
                                    alt="Admin" class="w-8 h-8 rounded-full">
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

            <!-- User Management Controls -->
            <div class="dashboard-card mb-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-xl font-semibold text-gray-800">User List</h2>
                        <p class="text-sm text-gray-500">Manage and monitor all users on the platform</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <button id="addUserBtn"
                            class="btn bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-plus mr-2"></i> Add User
                        </button>
                        <button id="exportBtn"
                            class="btn bg-success hover:bg-success/90 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-file-export mr-2"></i> Export Data
                        </button>
                    </div>
                </div>

                <!-- Search and Filter -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Search users..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                    </div>

                    <div>
                        <select id="roleFilter"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="">Filter by Role</option>
                            <option value="user">User</option>
                            <option value="provider">Provider</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div>
                        <select id="statusFilter"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
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
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Name</span>
                                        <i class="fas fa-sort ml-1"></i>
                                    </div>
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Email</span>
                                        <i class="fas fa-sort ml-1"></i>
                                    </div>
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Role</span>
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
                                        <span>Join Date</span>
                                        <i class="fas fa-sort ml-1"></i>
                                    </div>
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-full"
                                                    src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random"
                                                    alt="{{ $user->name }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $user->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 capitalize">{{ $user->role }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            if ($user->is_suspended == 0) {
                                                $statusClass = 'badge-active';
                                                $text = 'active';
                                            } elseif ($user->is_suspended == 1) {
                                                $statusClass = 'badge-suspended';
                                                $text = 'suspended';
                                            } elseif ($user->is_suspended == 2) {
                                                $statusClass = 'badge-warning';
                                                $text = 'warning';
                                            } else {
                                                $statusClass = 'badge-banned';
                                                $text = 'banned';
                                            }
                                        @endphp
                                        <span class="badge {{ $statusClass }} capitalize">{{ $text }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ \Carbon\Carbon::parse($user->created_at)->format('m/d/Y') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex space-x-2 justify-end">
                                            <button class="edit-user text-primary hover:text-primary/80"
                                                data-id="{{ $user->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="view-activity text-success hover:text-success/80"
                                                data-id="{{ $user->id }}">
                                                <i class="fas fa-chart-line"></i>
                                            </button>
                                            @if ($user->status !== 'banned')
                                                <button class="ban-user text-danger hover:text-danger/80"
                                                    data-id="{{ $user->id }}">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            @else
                                                <button class="unban-user text-warning hover:text-warning/80"
                                                    data-id="{{ $user->id }}">
                                                    <i class="fas fa-undo"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-6">
                    <div class="text-sm text-gray-500">
                        @if (isset($users) && method_exists($users, 'total'))
                            Showing {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }} of
                            {{ $users->total() }} users
                        @else
                            Showing users
                        @endif
                    </div>

                    @if (isset($users) && method_exists($users, 'links'))
                        {{ $users->links() }}
                    @else
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
                    @endif
                </div>
            </div>
        </div>
    </main>

    <!-- Add User Modal -->
    <div id="adduser" class="modal fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
        <div class="modal-content relative bg-white w-full max-w-md mx-4 rounded-lg shadow-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Add User</h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form action="/adduser" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="editName" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" name="name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="editEmail" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="editRole" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                        <select name="role"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="user">User</option>
                            <option value="provider">Provider</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button"
                            class="close-modal px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90">Save
                            Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                        <input type="text" id="editName"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="editEmail" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="editEmail"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="editRole" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                        <select id="editRole"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="user">User</option>
                            <option value="provider">Provider</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="editStatus" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select id="editStatus"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="active">Active</option>
                            <option value="suspended">Suspended</option>
                            <option value="banned">Banned</option>
                        </select>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button"
                            class="close-modal px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90">Save
                            Changes</button>
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
                    <h3 class="text-xl font-semibold text-gray-800">User Activity - <span
                            id="activityUserName"></span></h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="mb-6">
                    <div class="flex space-x-4 mb-4">
                        <button class="activity-tab px-4 py-2 bg-primary text-white rounded-md" data-tab="tasks">Tasks
                            Posted</button>
                        <button class="activity-tab px-4 py-2 bg-gray-200 text-gray-700 rounded-md"
                            data-tab="reviews">Reviews Given</button>
                        <button class="activity-tab px-4 py-2 bg-gray-200 text-gray-700 rounded-md"
                            data-tab="logins">Login History</button>
                    </div>

                    <div id="tasksTab" class="activity-content">
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Task ID</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Title</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Date</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Status</th>
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
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Provider</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Rating</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Date</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Comment</th>
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
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Date & Time</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            IP Address</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Device</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Location</th>
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
                    <button
                        class="close-modal px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Close</button>
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
                            <input type="checkbox" id="includeActivity"
                                class="h-4 w-4 text-primary focus:ring-primary">
                            <label for="includeActivity" class="ml-2 text-gray-700">User Activity</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="includeLoginHistory"
                                class="h-4 w-4 text-primary focus:ring-primary">
                            <label for="includeLoginHistory" class="ml-2 text-gray-700">Login History</label>
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
                date: '2023-03-10',
                status: 'Completed'
            },
            {
                id: 'T1002',
                title: 'House Cleaning',
                date: '2023-03-05',
                status: 'Completed'
            },
            {
                id: 'T1003',
                title: 'Grocery Delivery',
                date: '2023-03-15',
                status: 'In Progress'
            },
            {
                id: 'T1004',
                title: 'Dog Walking',
                date: '2023-03-12',
                status: 'Completed'
            },
            {
                id: 'T1005',
                title: 'Lawn Mowing',
                date: '2023-03-18',
                status: 'Pending'
            }
        ];

        // Sample review data
        const reviews = [{
                provider: 'Robert Johnson',
                rating: 4.5,
                date: '2023-03-11',
                comment: 'Great service, very professional!'
            },
            {
                provider: 'Michael Brown',
                rating: 5,
                date: '2023-03-06',
                comment: 'Excellent work, highly recommend!'
            },
            {
                provider: 'Jessica Brown',
                rating: 3.5,
                date: '2023-03-16',
                comment: 'Good service but arrived late.'
            },
            {
                provider: 'Christopher Lee',
                rating: 4,
                date: '2023-03-13',
                comment: 'Did a thorough job, would hire again.'
            }
        ];

        // Sample login history
        const loginHistory = [{
                datetime: '2023-03-15 09:23:45',
                ip: '192.168.1.1',
                device: 'iPhone 13',
                location: 'New York, USA'
            },
            {
                datetime: '2023-03-14 14:12:30',
                ip: '192.168.1.1',
                device: 'MacBook Pro',
                location: 'New York, USA'
            },
            {
                datetime: '2023-03-12 18:45:22',
                ip: '192.168.1.1',
                device: 'iPhone 13',
                location: 'New York, USA'
            },
            {
                datetime: '2023-03-10 10:05:17',
                ip: '192.168.1.1',
                device: 'MacBook Pro',
                location: 'New York, USA'
            }
        ];

        // Initialize the page
        document.addEventListener('DOMContentLoaded', () => {
            setupEventListeners();
        });

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

            // Edit user buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.edit-user')) {
                    const userId = e.target.closest('.edit-user').dataset.id;
                    openEditUserModal(userId);
                }
            });

            // View activity buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.view-activity')) {
                    const userId = e.target.closest('.view-activity').dataset.id;
                    openUserActivityModal(userId);
                }
            });

            // Ban/unban user buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.ban-user')) {
                    const userId = e.target.closest('.ban-user').dataset.id;
                    if (confirm('Are you sure you want to ban this user?')) {
                        // Here you would normally make an AJAX call to ban the user
                        console.log('Banning user:', userId);
                    }
                }

                if (e.target.closest('.unban-user')) {
                    const userId = e.target.closest('.unban-user').dataset.id;
                    if (confirm('Are you sure you want to unban this user?')) {
                        // Here you would normally make an AJAX call to unban the user
                        console.log('Unbanning user:', userId);
                    }
                }
            });

            // Modal close buttons
            document.querySelectorAll('.close-modal').forEach(button => {
                button.addEventListener('click', () => {
                    document.getElementById('editUserModal').classList.add('hidden');
                    document.getElementById('userActivityModal').classList.add('hidden');
                    document.getElementById('exportModal').classList.add('hidden');
                    document.getElementById('adduser').classList.add('hidden');
                });
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
                document.getElementById('exportModal').classList.remove('hidden');
            });

            // Confirm export
            document.getElementById('confirmExport').addEventListener('click', () => {
                exportUserData();
                document.getElementById('exportModal').classList.add('hidden');
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
            // In a real application, you would fetch user data via AJAX
            // For now, we'll just populate with sample data
            document.getElementById('editUserId').value = userId;
            document.getElementById('editName').value = 'User ' + userId;
            document.getElementById('editEmail').value = 'user' + userId + '@example.com';
            document.getElementById('editRole').value = 'user';
            document.getElementById('editStatus').value = 'active';

            document.getElementById('editUserModal').classList.remove('hidden');
        }

        // Open add user modal
        function openAddUserModal() {
            document.getElementById('adduser').classList.remove('hidden');
        }

        // Open user activity modal
        function openUserActivityModal(userId) {
            document.getElementById('activityUserName').textContent = 'User ' + userId;

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
                            task.status === 'Pending' ? 'bg-yellow-100 text-yellow-800' : ''
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
            document.getElementById('userActivityModal').classList.remove('hidden');

            // Reset to first tab
            switchActivityTab('tasks');
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

        // Export user data
        function exportUserData() {
            const format = document.querySelector('input[name="exportFormat"]:checked').value;
            const includeBasic = document.getElementById('includeBasicInfo').checked;
            const includeActivity = document.getElementById('includeActivity').checked;
            const includeLogin = document.getElementById('includeLoginHistory').checked;

            // In a real application, you would make an AJAX call to export the data
            console.log('Exporting user data:', {
                format,
                includeBasic,
                includeActivity,
                includeLogin
            });

            alert(`Data would be exported in ${format.toUpperCase()} format with selected options.`);
        }
    </script>
</body>

</html>
