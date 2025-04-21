<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands Admin - Provider Management</title>
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

            .badge-pending {
                @apply bg-warning/20 text-warning;
            }

            .badge-suspended {
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

            .skill-tag {
                @apply inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mr-1 mb-1;
            }

            .rating-stars {
                @apply text-yellow-400 flex;
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
                <a href="user-management.html" class="nav-link">
                    <i class="fas fa-users icon"></i>
                    <span>User Management</span>
                </a>
                <a href="provider-management.html" class="nav-link active">
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
                            Provider <span class="gradient-text">Management</span>
                        </h1>
                        <p class="text-gray-600">Manage and monitor all service providers on the platform</p>
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
                                            <p class="text-sm">New provider registered</p>
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

            <!-- Provider Management Controls -->
            <div class="dashboard-card mb-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-xl font-semibold text-gray-800">Provider List</h2>
                        <p class="text-sm text-gray-500">Manage and monitor all service providers on the platform</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <button id="addProviderBtn" class="btn bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-plus mr-2"></i> Add Provider
                        </button>
                        <button id="exportBtn" class="btn bg-success hover:bg-success/90 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-file-export mr-2"></i> Export Data
                        </button>
                    </div>
                </div>

                <!-- Search and Filter -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Search providers..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                    </div>

                    <div>
                        <select id="statusFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="">Status: All</option>
                            <option value="active">Active</option>
                            <option value="pending">Pending Approval</option>
                            <option value="suspended">Suspended</option>
                        </select>
                    </div>

                    <div>
                        <select id="skillFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="">Skills: All</option>
                            <option value="plumbing">Plumbing</option>
                            <option value="electrical">Electrical</option>
                            <option value="cleaning">Cleaning</option>
                            <option value="carpentry">Carpentry</option>
                            <option value="gardening">Gardening</option>
                        </select>
                    </div>

                    <div>
                        <select id="ratingFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="">Rating: All</option>
                            <option value="5">5 Stars</option>
                            <option value="4">4+ Stars</option>
                            <option value="3">3+ Stars</option>
                        </select>
                    </div>
                </div>

                <!-- Providers Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg overflow-hidden">
                        <thead class="table-header">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Provider</span>
                                        <i class="fas fa-sort ml-1"></i>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                    Skills
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Rating</span>
                                        <i class="fas fa-sort ml-1"></i>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                    Location
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Status</span>
                                        <i class="fas fa-sort ml-1"></i>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Joined</span>
                                        <i class="fas fa-sort ml-1"></i>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200" id="providerTableBody">
                            <!-- Provider rows will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-6">
                    <div class="text-sm text-gray-500">
                        Showing <span id="startRange">1</span> to <span id="endRange">10</span> of <span id="totalProviders">50</span> providers
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

    <!-- Edit Provider Modal -->
    <div id="editProviderModal" class="modal fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
        <div class="modal-content relative bg-white w-full max-w-md mx-4 rounded-lg shadow-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Edit Provider</h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form id="editProviderForm">
                    <input type="hidden" id="editProviderId">

                    <div class="mb-4">
                        <label for="editName" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" id="editName" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="editEmail" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="editEmail" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="editPhone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                        <input type="tel" id="editPhone" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="editLocation" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                        <input type="text" id="editLocation" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Skills</label>
                        <div class="flex flex-wrap gap-2 p-3 border border-gray-300 rounded-md min-h-[80px]" id="skillsContainer">
                            <div class="skill-tag">
                                Plumbing <span class="ml-1 cursor-pointer remove-skill">×</span>
                            </div>
                            <div class="skill-tag">
                                Electrical <span class="ml-1 cursor-pointer remove-skill">×</span>
                            </div>
                            <input type="text" id="newSkill" placeholder="Add skill..." class="border-none outline-none flex-grow min-w-[100px] text-sm">
                        </div  class="border-none outline-none flex-grow min-w-[100px] text-sm">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="editStatus" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select id="editStatus" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="active">Active</option>
                            <option value="pending">Pending Approval</option>
                            <option value="suspended">Suspended</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="editBio" class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                        <textarea id="editBio" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" class="close-modal px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Provider Activity Modal -->
    <div id="providerActivityModal" class="modal fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
        <div class="modal-content relative bg-white w-full max-w-4xl mx-4 rounded-lg shadow-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Provider Activity - <span id="activityProviderName"></span></h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="mb-6">
                    <div class="flex space-x-4 mb-4">
                        <button class="activity-tab px-4 py-2 bg-primary text-white rounded-md" data-tab="tasks">Tasks Completed</button>
                        <button class="activity-tab px-4 py-2 bg-gray-200 text-gray-700 rounded-md" data-tab="reviews">Reviews Received</button>
                        <button class="activity-tab px-4 py-2 bg-gray-200 text-gray-700 rounded-md" data-tab="earnings">Earnings</button>
                    </div>

                    <div id="tasksTab" class="activity-content">
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Task ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Client</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Amount</th>
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
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Client</th>
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

                    <div id="earningsTab" class="activity-content hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Month</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Tasks Completed</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Earnings</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Platform Fee</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Net Earnings</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200" id="earningsTableBody">
                                    <!-- Earnings will be populated by JavaScript -->
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

    <!-- Approve Provider Modal -->
    <div id="approveProviderModal" class="modal fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
        <div class="modal-content relative bg-white w-full max-w-md mx-4 rounded-lg shadow-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Approve Provider</h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="mb-4">
                    <p class="text-gray-600 mb-4">You are about to approve this provider. They will be able to start accepting tasks on the platform.</p>

                    <div class="bg-gray-50 p-4 rounded-lg mb-4">
                        <div class="flex items-center mb-3">
                            <img src="/placeholder.svg?height=60&width=60" alt="Provider" class="w-12 h-12 rounded-full mr-3">
                            <div>
                                <h4 class="font-medium" id="approveProviderName">James Wilson</h4>
                                <p class="text-sm text-gray-500" id="approveProviderEmail">james.w@example.com</p>
                            </div>
                        </div>
                        <div class="text-sm">
                            <p class="mb-1"><span class="font-medium">Skills:</span> <span id="approveProviderSkills">Electrical, Wiring, Lighting</span></p>
                            <p class="mb-1"><span class="font-medium">Location:</span> <span id="approveProviderLocation">Miami, FL</span></p>
                            <p><span class="font-medium">Background Check:</span> <span class="text-success">Completed</span></p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="approvalNotes" class="block text-sm font-medium text-gray-700 mb-1">Admin Notes</label>
                        <textarea id="approvalNotes" rows="3" placeholder="Add any notes about this provider..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                    </div>

                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="sendWelcomeEmail" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="sendWelcomeEmail" class="ml-2 block text-sm text-gray-700">Send welcome email with platform guidelines</label>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" class="close-modal px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</button>
                    <button id="confirmApprove" class="px-4 py-2 bg-success text-white rounded-md hover:bg-success/90">Approve Provider</button>
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
                    <h3 class="text-xl font-semibold text-gray-800">Export Provider Data</h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="mb-4">
                    <p class="text-gray-600 mb-4">Select the format you want to export the provider data in:</p>

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
                            <input type="checkbox" id="includeSkills" class="h-4 w-4 text-primary focus:ring-primary" checked>
                            <label for="includeSkills" class="ml-2 text-gray-700">Skills</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="includeRatings" class="h-4 w-4 text-primary focus:ring-primary" checked>
                            <label for="includeRatings" class="ml-2 text-gray-700">Ratings & Reviews</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="includeTaskHistory" class="h-4 w-4 text-primary focus:ring-primary">
                            <label for="includeTaskHistory" class="ml-2 text-gray-700">Task History</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="includeEarnings" class="h-4 w-4 text-primary focus:ring-primary">
                            <label for="includeEarnings" class="ml-2 text-gray-700">Earnings Information</label>
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
        // Sample provider data
        const providers = [
            { id: 1, name: 'Robert Johnson', email: 'robert.j@example.com', skills: ['Plumbing', 'Heating', 'Repair'], rating: 4.9, location: 'New York, NY', status: 'active', joinDate: '2023-08-12' },
            { id: 2, name: 'Maria Garcia', email: 'maria.g@example.com', skills: ['Cleaning', 'Organizing'], rating: 4.2, location: 'Chicago, IL', status: 'active', joinDate: '2023-09-03' },
            { id: 3, name: 'James Wilson', email: 'james.w@example.com', skills: ['Electrical', 'Wiring', 'Lighting'], rating: 4.7, location: 'Miami, FL', status: 'pending', joinDate: '2023-11-17' },
            { id: 4, name: 'Sarah Thompson', email: 'sarah.t@example.com', skills: ['Gardening', 'Landscaping'], rating: 4.0, location: 'Los Angeles, CA', status: 'suspended', joinDate: '2023-07-05' },
            { id: 5, name: 'Michael Brown', email: 'michael.b@example.com', skills: ['Carpentry', 'Furniture', 'Repair'], rating: 3.5, location: 'Seattle, WA', status: 'active', joinDate: '2023-10-20' },
            { id: 6, name: 'Jennifer Davis', email: 'jennifer.d@example.com', skills: ['Painting', 'Decorating'], rating: 4.6, location: 'Boston, MA', status: 'active', joinDate: '2023-06-15' },
            { id: 7, name: 'David Martinez', email: 'david.m@example.com', skills: ['Moving', 'Packing', 'Assembly'], rating: 4.3, location: 'Austin, TX', status: 'active', joinDate: '2023-09-22' },
            { id: 8, name: 'Lisa Rodriguez', email: 'lisa.r@example.com', skills: ['Pet Care', 'Dog Walking'], rating: 4.8, location: 'Denver, CO', status: 'pending', joinDate: '2023-11-05' },
            { id: 9, name: 'Kevin Taylor', email: 'kevin.t@example.com', skills: ['Computer Repair', 'IT Support'], rating: 4.4, location: 'San Francisco, CA', status: 'active', joinDate: '2023-08-30' },
            { id: 10, name: 'Amanda White', email: 'amanda.w@example.com', skills: ['Tutoring', 'Math', 'Science'], rating: 4.9, location: 'Portland, OR', status: 'active', joinDate: '2023-07-18' }
        ];

        // Sample task data
        const tasks = [
            { id: 'T2001', title: 'Bathroom Sink Repair', client: 'John Davis', date: '2023-11-20', amount: '$120' },
            { id: 'T1985', title: 'Kitchen Faucet Installation', client: 'Emma White', date: '2023-11-15', amount: '$150' },
            { id: 'T1972', title: 'Shower Repair', client: 'Mike Johnson', date: '2023-11-12', amount: '$200' },
            { id: 'T1945', title: 'Toilet Replacement', client: 'Susan Miller', date: '2023-11-05', amount: '$250' },
            { id: 'T1932', title: 'Pipe Leak Fix', client: 'David Brown', date: '2023-10-28', amount: '$100' }
        ];

        // Sample review data
        const reviews = [
            { client: 'John Davis', rating: 5, date: '2023-11-21', comment: 'Excellent work! Fixed my sink perfectly.' },
            { client: 'Emma White', rating: 5, date: '2023-11-16', comment: 'Very professional and efficient. Highly recommend!' },
            { client: 'Mike Johnson', rating: 4, date: '2023-11-13', comment: 'Good job, but arrived a bit late.' },
            { client: 'Susan Miller', rating: 5, date: '2023-11-06', comment: 'Great service, very knowledgeable.' },
            { client: 'David Brown', rating: 5, date: '2023-10-29', comment: 'Fixed the leak quickly. Very satisfied!' }
        ];

        // Sample earnings data
        const earnings = [
            { month: 'November 2023', tasksCompleted: 12, earnings: '$1,450', platformFee: '$145', netEarnings: '$1,305' },
            { month: 'October 2023', tasksCompleted: 15, earnings: '$1,800', platformFee: '$180', netEarnings: '$1,620' },
            { month: 'September 2023', tasksCompleted: 10, earnings: '$1,200', platformFee: '$120', netEarnings: '$1,080' },
            { month: 'August 2023', tasksCompleted: 14, earnings: '$1,650', platformFee: '$165', netEarnings: '$1,485' },
            { month: 'July 2023', tasksCompleted: 11, earnings: '$1,350', platformFee: '$135', netEarnings: '$1,215' }
        ];

        // Pagination variables
        let currentPage = 1;
        const itemsPerPage = 10;
        let filteredProviders = [...providers];

        // DOM elements
        const providerTableBody = document.getElementById('providerTableBody');
        const paginationNumbers = document.getElementById('paginationNumbers');
        const prevPageBtn = document.getElementById('prevPage');
        const nextPageBtn = document.getElementById('nextPage');
        const startRangeEl = document.getElementById('startRange');
        const endRangeEl = document.getElementById('endRange');
        const totalProvidersEl = document.getElementById('totalProviders');
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const skillFilter = document.getElementById('skillFilter');
        const ratingFilter = document.getElementById('ratingFilter');

        // Initialize the page
        document.addEventListener('DOMContentLoaded', () => {
            renderProviders();
            setupEventListeners();
        });

        // Render providers table
        function renderProviders() {
            // Apply filters
            applyFilters();

            // Calculate pagination
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, filteredProviders.length);
            const paginatedProviders = filteredProviders.slice(startIndex, endIndex);

            // Update pagination info
            startRangeEl.textContent = filteredProviders.length > 0 ? startIndex + 1 : 0;
            endRangeEl.textContent = endIndex;
            totalProvidersEl.textContent = filteredProviders.length;

            // Clear table
            providerTableBody.innerHTML = '';

            // Render provider rows
            paginatedProviders.forEach(provider => {
                const row = document.createElement('tr');
                row.className = 'hover:bg-gray-50';

                // Status badge class
                let statusClass = '';
                switch(provider.status) {
                    case 'active': statusClass = 'badge-active'; break;
                    case 'pending': statusClass = 'badge-pending'; break;
                    case 'suspended': statusClass = 'badge-suspended'; break;
                }

                // Generate stars based on rating
                const fullStars = Math.floor(provider.rating);
                const hasHalfStar = provider.rating % 1 >= 0.5;
                const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);

                const starsHTML =
                    '★'.repeat(fullStars) +
                    (hasHalfStar ? '½' : '') +
                    '☆'.repeat(emptyStars);

                // Generate skills HTML
                const skillsHTML = provider.skills.map(skill =>
                    `<span class="skill-tag">${skill}</span>`
                ).join('');

                row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=${encodeURIComponent(provider.name)}&background=random" alt="${provider.name}">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">${provider.name}</div>
                                <div class="text-xs text-gray-500">${provider.email}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-wrap gap-1">
                            ${skillsHTML}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="rating-stars mr-1">${starsHTML}</div>
                            <span class="text-sm font-medium">${provider.rating.toFixed(1)}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        ${provider.location}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="badge ${statusClass} capitalize">${provider.status}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        ${formatDate(provider.joinDate)}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex space-x-2 justify-end">
                            ${provider.status === 'pending' ?
                                `<button class="approve-provider text-success hover:text-success/80" data-id="${provider.id}">
                                    <i class="fas fa-check-circle"></i>
                                </button>` :
                                `<button class="view-activity text-info hover:text-info/80" data-id="${provider.id}">
                                    <i class="fas fa-chart-line"></i>
                                </button>`
                            }
                            <button class="edit-provider text-primary hover:text-primary/80" data-id="${provider.id}">
                                <i class="fas fa-edit"></i>
                            </button>
                            ${provider.status !== 'suspended' ?
                                `<button class="suspend-provider text-danger hover:text-danger/80" data-id="${provider.id}">
                                    <i class="fas fa-ban"></i>
                                </button>` :
                                `<button class="reactivate-provider text-warning hover:text-warning/80" data-id="${provider.id}">
                                    <i class="fas fa-undo"></i>
                                </button>`
                            }
                        </div>
                    </td>
                `;

                providerTableBody.appendChild(row);
            });

            // Render pagination
            renderPagination();
        }

        // Apply filters to providers
        function applyFilters() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;
            const skillValue = skillFilter.value;
            const ratingValue = ratingFilter.value ? parseFloat(ratingFilter.value) : 0;

            filteredProviders = providers.filter(provider => {
                const matchesSearch = searchTerm === '' ||
                    provider.name.toLowerCase().includes(searchTerm) ||
                    provider.email.toLowerCase().includes(searchTerm) ||
                    provider.location.toLowerCase().includes(searchTerm) ||
                    provider.skills.some(skill => skill.toLowerCase().includes(searchTerm));

                const matchesStatus = statusValue === '' || provider.status === statusValue;
                const matchesSkill = skillValue === '' || provider.skills.some(skill => skill.toLowerCase() === skillValue.toLowerCase());
                const matchesRating = ratingValue === 0 || provider.rating >= ratingValue;

                return matchesSearch && matchesStatus && matchesSkill && matchesRating;
            });

            // Reset to first page when filters change
            currentPage = 1;
        }

        // Render pagination controls
        function renderPagination() {
            const totalPages = Math.ceil(filteredProviders.length / itemsPerPage);

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
                renderProviders();
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
                    renderProviders();
                }
            });

            nextPageBtn.addEventListener('click', () => {
                const totalPages = Math.ceil(filteredProviders.length / itemsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    renderProviders();
                }
            });

            // Search and filters
            searchInput.addEventListener('input', renderProviders);
            statusFilter.addEventListener('change', renderProviders);
            skillFilter.addEventListener('change', renderProviders);
            ratingFilter.addEventListener('change', renderProviders);

            // Edit provider buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.edit-provider')) {
                    const providerId = parseInt(e.target.closest('.edit-provider').dataset.id);
                    openEditProviderModal(providerId);
                }
            });

            // View activity buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.view-activity')) {
                    const providerId = parseInt(e.target.closest('.view-activity').dataset.id);
                    openProviderActivityModal(providerId);
                }
            });

            // Approve provider buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.approve-provider')) {
                    const providerId = parseInt(e.target.closest('.approve-provider').dataset.id);
                    openApproveProviderModal(providerId);
                }
            });

            // Suspend/reactivate provider buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.suspend-provider')) {
                    const providerId = parseInt(e.target.closest('.suspend-provider').dataset.id);
                    suspendProvider(providerId);
                }

                if (e.target.closest('.reactivate-provider')) {
                    const providerId = parseInt(e.target.closest('.reactivate-provider').dataset.id);
                    reactivateProvider(providerId);
                }
            });

            // Modal close buttons
            document.querySelectorAll('.close-modal').forEach(button => {
                button.addEventListener('click', () => {
                    document.getElementById('editProviderModal').classList.add('hidden');
                    document.getElementById('providerActivityModal').classList.add('hidden');
                    document.getElementById('approveProviderModal').classList.add('hidden');
                    document.getElementById('exportModal').classList.add('hidden');
                });
            });

            // Edit provider form submission
            document.getElementById('editProviderForm').addEventListener('submit', (e) => {
                e.preventDefault();
                saveProviderChanges();
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
                exportProviderData();
                document.getElementById('exportModal').classList.add('hidden');
            });

            // Add provider button
            document.getElementById('addProviderBtn').addEventListener('click', () => {
                openAddProviderModal();
            });

            // Confirm approve
            document.getElementById('confirmApprove').addEventListener('click', () => {
                approveProvider();
                document.getElementById('approveProviderModal').classList.add('hidden');
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

            // Skills input functionality
            const newSkillInput = document.getElementById('newSkill');
            if (newSkillInput) {
                newSkillInput.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' && this.value.trim() !== '') {
                        e.preventDefault();
                        addSkill(this.value.trim());
                        this.value = '';
                    }
                });
            }

            // Remove skill functionality
            document.addEventListener('click', (e) => {
                if (e.target.classList.contains('remove-skill')) {
                    e.target.parentElement.remove();
                }
            });
        }

        // Open edit provider modal
        function openEditProviderModal(providerId) {
            const provider = providers.find(p => p.id === providerId);
            if (provider) {
                document.getElementById('editProviderId').value = provider.id;
                document.getElementById('editName').value = provider.name;
                document.getElementById('editEmail').value = provider.email;
                document.getElementById('editPhone').value = '+1 555-123-4567'; // Sample data
                document.getElementById('editLocation').value = provider.location;
                document.getElementById('editStatus').value = provider.status;
                document.getElementById('editBio').value = 'Professional service provider with experience in ' + provider.skills.join(', ') + '.';

                // Clear and populate skills
                const skillsContainer = document.getElementById('skillsContainer');
                // Keep only the input field
                skillsContainer.innerHTML = '<input type="text" id="newSkill" placeholder="Add skill..." class="border-none outline-none flex-grow min-w-[100px] text-sm">';

                // Add each skill
                provider.skills.forEach(skill => {
                    const skillTag = document.createElement('div');
                    skillTag.className = 'skill-tag';
                    skillTag.innerHTML = `${skill} <span class="ml-1 cursor-pointer remove-skill">×</span>`;
                    skillsContainer.insertBefore(skillTag, document.getElementById('newSkill'));
                });

                document.getElementById('editProviderModal').classList.remove('hidden');
            }
        }

        // Open add provider modal (reuses edit modal)
        function openAddProviderModal() {
            document.getElementById('editProviderId').value = '';
            document.getElementById('editName').value = '';
            document.getElementById('editEmail').value = '';
            document.getElementById('editPhone').value = '';
            document.getElementById('editLocation').value = '';
            document.getElementById('editStatus').value = 'pending';
            document.getElementById('editBio').value = '';

            // Clear skills
            const skillsContainer = document.getElementById('skillsContainer');
            skillsContainer.innerHTML = '<input type="text" id="newSkill" placeholder="Add skill..." class="border-none outline-none flex-grow min-w-[100px] text-sm">';

            document.getElementById('editProviderModal').classList.remove('hidden');
        }

        // Add skill tag
        function addSkill(skill) {
            const skillsContainer = document.getElementById('skillsContainer');
            const skillTag = document.createElement('div');
            skillTag.className = 'skill-tag';
            skillTag.innerHTML = `${skill} <span class="ml-1 cursor-pointer remove-skill">×</span>`;
            skillsContainer.insertBefore(skillTag, document.getElementById('newSkill'));
        }

        // Save provider changes
        function saveProviderChanges() {
            const providerId = document.getElementById('editProviderId').value;
            const name = document.getElementById('editName').value;
            const email = document.getElementById('editEmail').value;
            const location = document.getElementById('editLocation').value;
            const status = document.getElementById('editStatus').value;

            // Get skills from tags
            const skillTags = document.querySelectorAll('#skillsContainer .skill-tag');
            const skills = Array.from(skillTags).map(tag => tag.textContent.trim().replace('×', ''));

            if (providerId) {
                // Edit existing provider
                const providerIndex = providers.findIndex(p => p.id === parseInt(providerId));
                if (providerIndex !== -1) {
                    providers[providerIndex].name = name;
                    providers[providerIndex].email = email;
                    providers[providerIndex].location = location;
                    providers[providerIndex].status = status;
                    providers[providerIndex].skills = skills;
                }
            } else {
                // Add new provider
                const newId = Math.max(...providers.map(p => p.id)) + 1;
                const today = new Date().toISOString().split('T')[0];

                providers.push({
                    id: newId,
                    name,
                    email,
                    location,
                    status,
                    skills,
                    rating: 0,
                    joinDate: today
                });
            }

            document.getElementById('editProviderModal').classList.add('hidden');
            renderProviders();
        }

        // Open provider activity modal
        function openProviderActivityModal(providerId) {
            const provider = providers.find(p => p.id === providerId);
            if (provider) {
                document.getElementById('activityProviderName').textContent = provider.name;

                // Populate tasks tab
                const tasksTableBody = document.getElementById('tasksTableBody');
                tasksTableBody.innerHTML = '';

                tasks.forEach(task => {
                    const row = document.createElement('tr');
                    row.className = 'hover:bg-gray-50';
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${task.id}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${task.title}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${task.client}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${formatDate(task.date)}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${task.amount}</td>
                    `;
                    tasksTableBody.appendChild(row);
                });

                // Populate reviews tab
                const reviewsTableBody = document.getElementById('reviewsTableBody');
                reviewsTableBody.innerHTML = '';

                reviews.forEach(review => {
                    // Generate stars based on rating
                    const fullStars = Math.floor(review.rating);
                    const hasHalfStar = review.rating % 1 >= 0.5;
                    const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);

                    const starsHTML =
                        '★'.repeat(fullStars) +
                        (hasHalfStar ? '½' : '') +
                        '☆'.repeat(emptyStars);

                    const row = document.createElement('tr');
                    row.className = 'hover:bg-gray-50';
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${review.client}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="rating-stars text-yellow-400 mr-1">${starsHTML}</div>
                                <span class="text-sm font-medium">${review.rating.toFixed(1)}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${formatDate(review.date)}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${review.comment}</td>
                    `;
                    reviewsTableBody.appendChild(row);
                });

                // Populate earnings tab
                const earningsTableBody = document.getElementById('earningsTableBody');
                earningsTableBody.innerHTML = '';

                earnings.forEach(earning => {
                    const row = document.createElement('tr');
                    row.className = 'hover:bg-gray-50';
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${earning.month}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${earning.tasksCompleted}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${earning.earnings}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${earning.platformFee}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${earning.netEarnings}</td>
                    `;
                    earningsTableBody.appendChild(row);
                });

                // Show the modal
                document.getElementById('providerActivityModal').classList.remove('hidden');

                // Reset to first tab
                switchActivityTab('tasks');
            }
        }

        // Open approve provider modal
        function openApproveProviderModal(providerId) {
            const provider = providers.find(p => p.id === providerId);
            if (provider) {
                document.getElementById('approveProviderName').textContent = provider.name;
                document.getElementById('approveProviderEmail').textContent = provider.email;
                document.getElementById('approveProviderSkills').textContent = provider.skills.join(', ');
                document.getElementById('approveProviderLocation').textContent = provider.location;

                document.getElementById('approveProviderModal').classList.remove('hidden');
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

        // Suspend provider
        function suspendProvider(providerId) {
            const providerIndex = providers.findIndex(p => p.id === providerId);
            if (providerIndex !== -1) {
                providers[providerIndex].status = 'suspended';
                renderProviders();
            }
        }

        // Reactivate provider
        function reactivateProvider(providerId) {
            const providerIndex = providers.findIndex(p => p.id === providerId);
            if (providerIndex !== -1) {
                providers[providerIndex].status = 'active';
                renderProviders();
            }
        }

        // Approve provider
        function approveProvider() {
            const providerName = document.getElementById('approveProviderName').textContent;
            const provider = providers.find(p => p.name === providerName);

            if (provider) {
                provider.status = 'active';
                renderProviders();

                // Show success notification (in a real app)
                alert(`Provider ${providerName} has been approved successfully.`);
            }
        }

        // Export provider data
        function exportProviderData() {
            const format = document.querySelector('input[name="exportFormat"]:checked').value;
            const includeBasic = document.getElementById('includeBasicInfo').checked;
            const includeSkills = document.getElementById('includeSkills').checked;
            const includeRatings = document.getElementById('includeRatings').checked;
            const includeTaskHistory = document.getElementById('includeTaskHistory').checked;
            const includeEarnings = document.getElementById('includeEarnings').checked;

            // In a real application, this would generate and download the file
            // For this demo, we'll just show an alert
            alert(`Exporting provider data in ${format.toUpperCase()} format\nIncluding: ${includeBasic ? 'Basic Info, ' : ''}${includeSkills ? 'Skills, ' : ''}${includeRatings ? 'Ratings, ' : ''}${includeTaskHistory ? 'Task History, ' : ''}${includeEarnings ? 'Earnings' : ''}`);
        }
    </script>
</body>
</html>
