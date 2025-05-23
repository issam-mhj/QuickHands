<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands Admin - Notifications</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
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

            .badge-info {
                @apply bg-info/20 text-info;
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

            .notification-item {
                @apply flex items-start p-4 border-b border-gray-100 hover:bg-gray-50 transition-all duration-300;
            }

            .notification-item.unread {
                @apply bg-blue-50;
            }

            .notification-item .icon-container {
                @apply w-10 h-10 rounded-full flex items-center justify-center mr-3 flex-shrink-0;
            }

            .notification-item .content {
                @apply flex-grow;
            }

            .notification-item .title {
                @apply font-medium text-gray-900 mb-1;
            }

            .notification-item .message {
                @apply text-sm text-gray-600 mb-1;
            }

            .notification-item .time {
                @apply text-xs text-gray-500;
            }

            .notification-item .actions {
                @apply mt-2 flex items-center space-x-2;
            }

            .notification-item .action-btn {
                @apply text-xs px-2 py-1 rounded-md transition-colors duration-300;
            }

            .notification-item .mark-read {
                @apply text-blue-600 hover:bg-blue-50;
            }

            .notification-item .resolve {
                @apply text-green-600 hover:bg-green-50;
            }

            .notification-item .dismiss {
                @apply text-gray-600 hover:bg-gray-100;
            }

            .notification-item .view {
                @apply text-primary hover:bg-primary/10;
            }

            .notification-filter {
                @apply px-3 py-1 rounded-full text-sm transition-colors duration-300 cursor-pointer;
            }

            .notification-filter.active {
                @apply bg-primary text-white;
            }

            .notification-filter:not(.active) {
                @apply bg-gray-100 text-gray-700 hover:bg-gray-200;
            }

            .notification-category {
                @apply text-xs uppercase tracking-wider text-gray-500 font-medium py-2 px-4 bg-gray-50;
            }

            .notification-empty {
                @apply py-8 text-center;
            }

            .notification-empty .icon {
                @apply text-4xl text-gray-300 mb-2;
            }

            .notification-empty .text {
                @apply text-gray-500;
            }

            .notification-count {
                @apply ml-auto bg-primary text-white text-xs rounded-full w-5 h-5 flex items-center justify-center;
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
                <a href="task-oversight.html" class="nav-link">
                    <i class="fas fa-tasks icon"></i>
                    <span>Task Oversight</span>
                </a>
                <a href="/admin/analytics" class="nav-link">
                    <i class="fas fa-chart-line icon"></i>
                    <span>Analytics & Reports</span>
                </a>
                <a href="notifications.html" class="nav-link active">
                    <i class="fas fa-bell icon"></i>
                    <span>Notifications</span>
                    <span class="notification-count">8</span>
                </a>
                <a href="/admin/settings" class="nav-link">
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
                            <span class="gradient-text">Notifications</span>
                        </h1>
                        <p class="text-gray-600">Stay informed about important platform activity</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Search notifications..." class="search-input">
                            <i
                                class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <div class="relative">
                            <button id="notifications-btn"
                                class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow-md hover:bg-primary/10 transition-colors">
                                <i class="fas fa-bell"></i>
                                <span class="notification-badge">8</span>
                            </button>
                            <div id="notifications-dropdown" class="dropdown">
                                <div class="p-4 border-b border-gray-100">
                                    <h5 class="font-medium">Notifications</h5>
                                    <p class="text-xs text-gray-500">You have 8 unread notifications</p>
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

            <!-- Notification Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-8">
                <div class="stat-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-medium text-gray-500">Total Notifications</h3>
                            <p class="text-3xl font-bold mt-1">{{ $notifNum }}</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center">
                            <i class="fas fa-bell text-primary"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-medium text-gray-500">Unread</h3>
                            <p class="text-3xl font-bold mt-1">{{ $UnNotifNum }}</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-warning/20 flex items-center justify-center">
                            <i class="fas fa-envelope text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notification Controls -->
            <div class="dashboard-card mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-xl font-semibold text-gray-800">Notification Center</h2>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <form action="/markasread" method="post">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 bg-secondary text-white rounded-lg flex items-center">
                                <i class="fas fa-check-double mr-2"></i> Mark All Read
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Notification List -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md">
                    @foreach ($notifs as $notif)
                        <div class="notification-item {{ $notif->read_status == 0 ? 'unread' : '' }} "
                            data-type="system">
                            <div class="icon-container bg-info/20">
                                <i class="fas fa-database text-info"></i>
                            </div>
                            <div class="content">
                                <div class="title">{{ $notif->type }}</div>
                                <div class="message">{{ $notif->message }}</div>
                                <div class="time">{{ \Carbon\Carbon::parse($notif->created_at)->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-6">
                    <div class="text-sm text-gray-500">
                        Showing <span id="startRange">1</span> to <span id="endRange">15</span> of <span
                            id="totalNotifications">124</span> notifications
                    </div>

                    <div class="flex space-x-1">
                        <button id="prevPage"
                            class="pagination-btn px-3 py-1 rounded-md border border-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button
                            class="pagination-btn px-3 py-1 rounded-md border border-gray-300 bg-primary text-white">1</button>
                        <button class="pagination-btn px-3 py-1 rounded-md border border-gray-300">2</button>
                        <button class="pagination-btn px-3 py-1 rounded-md border border-gray-300">3</button>
                        <span class="px-3 py-1">...</span>
                        <button class="pagination-btn px-3 py-1 rounded-md border border-gray-300">9</button>
                        <button id="nextPage" class="pagination-btn px-3 py-1 rounded-md border border-gray-300">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Initialize the page
        document.addEventListener('DOMContentLoaded', () => {
            setupEventListeners();
            initializeNotifications();
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

            // Notification filters
            const filters = document.querySelectorAll('.notification-filter');
            filters.forEach(filter => {
                filter.addEventListener('click', () => {
                    // Remove active class from all filters
                    filters.forEach(f => f.classList.remove('active'));

                    // Add active class to clicked filter
                    filter.classList.add('active');

                    // Apply filter
                    const filterType = filter.dataset.filter;
                    filterNotifications(filterType);
                });
            });


            // Close modal buttons
            document.querySelectorAll('.close-modal').forEach(button => {
                button.addEventListener('click', () => {
                    document.getElementById('settingsModal').classList.add('hidden');
                });
            });


            // Dismiss buttons
            document.querySelectorAll('.dismiss').forEach(button => {
                button.addEventListener('click', (e) => {
                    const notificationItem = e.target.closest('.notification-item');
                    dismissNotification(notificationItem);
                    e.stopPropagation();
                });
            });

            // View buttons
            document.querySelectorAll('.view').forEach(button => {
                button.addEventListener('click', (e) => {
                    const notificationItem = e.target.closest('.notification-item');
                    viewNotification(notificationItem);
                    e.stopPropagation();
                });
            });

            // Resolve buttons
            document.querySelectorAll('.resolve').forEach(button => {
                button.addEventListener('click', (e) => {
                    const notificationItem = e.target.closest('.notification-item');
                    resolveNotification(notificationItem);
                    e.stopPropagation();
                });
            });
        }

        // Initialize notifications
        function initializeNotifications() {
            // Count unread notifications
            updateUnreadCount();
        }

        // Filter notifications
        function filterNotifications(filterType) {
            const notificationItems = document.querySelectorAll('.notification-item');

            notificationItems.forEach(item => {
                if (filterType === 'all' || item.dataset.type === filterType) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });

            // Check if any notifications are visible in each category
            const categories = document.querySelectorAll('.notification-category');
            categories.forEach(category => {
                const nextCategory = category.nextElementSibling;
                let hasVisibleNotifications = false;

                let currentElement = nextCategory;
                while (currentElement && !currentElement.classList.contains('notification-category')) {
                    if (currentElement.classList.contains('notification-item') &&
                        currentElement.style.display !== 'none') {
                        hasVisibleNotifications = true;
                        break;
                    }
                    currentElement = currentElement.nextElementSibling;
                }

                if (hasVisibleNotifications) {
                    category.style.display = 'block';
                } else {
                    category.style.display = 'none';
                }
            });
        }

        // Mark all notifications as read
        function markAllAsRead() {
            const unreadNotifications = document.querySelectorAll('.notification-item.unread');
            unreadNotifications.forEach(notification => {
                notification.classList.remove('unread');
            });

            updateUnreadCount();

            // Show success message
            alert('All notifications marked as read');
        }

        // Mark a single notification as read
        function markAsRead(notification) {
            notification.classList.remove('unread');
            updateUnreadCount();
        }

        // Dismiss a notification
        function dismissNotification(notification) {
            notification.style.height = notification.offsetHeight + 'px';

            // Animate the notification out
            setTimeout(() => {
                notification.style.height = '0';
                notification.style.opacity = '0';
                notification.style.padding = '0';
                notification.style.margin = '0';
                notification.style.overflow = 'hidden';

                // Remove the notification after animation
                setTimeout(() => {
                    notification.remove();
                    updateUnreadCount();

                    // Check if category is empty
                    checkEmptyCategories();
                }, 300);
            }, 10);
        }

        // View notification details
        function viewNotification(notification) {
            // In a real application, this would navigate to the relevant page or open a modal
            // For this demo, we'll just mark it as read and show an alert
            markAsRead(notification);

            const title = notification.querySelector('.title').textContent;
            alert(`Viewing details for: ${title}`);
        }

        // Resolve a notification
        function resolveNotification(notification) {
            // In a real application, this would open a resolution flow
            // For this demo, we'll just mark it as read and dismiss it
            markAsRead(notification);

            const title = notification.querySelector('.title').textContent;
            alert(`Resolving: ${title}`);

            // Add a slight delay before dismissing
            setTimeout(() => {
                dismissNotification(notification);
            }, 500);
        }

        // Update the unread notification count
        function updateUnreadCount() {
            const unreadNotifications = document.querySelectorAll('.notification-item.unread');
            const count = unreadNotifications.length;

            // Update the badge in the sidebar
            const notificationCount = document.querySelector('.notification-count');
            notificationCount.textContent = count;

            // Update the stats card
            const unreadStat = document.querySelector('.stat-card:nth-child(2) .text-3xl');
            unreadStat.textContent = count;

            // Hide the badge if no unread notifications
            if (count === 0) {
                notificationCount.style.display = 'none';
            } else {
                notificationCount.style.display = 'flex';
            }
        }

        // Check if any categories are empty after filtering
        function checkEmptyCategories() {
            const categories = document.querySelectorAll('.notification-category');
            categories.forEach(category => {
                const nextCategory = category.nextElementSibling;
                let hasNotifications = false;

                let currentElement = nextCategory;
                while (currentElement && !currentElement.classList.contains('notification-category')) {
                    if (currentElement.classList.contains('notification-item')) {
                        hasNotifications = true;
                        break;
                    }
                    currentElement = currentElement.nextElementSibling;
                }

                if (!hasNotifications) {
                    category.style.display = 'none';
                }
            });
        }

        // Save notification settings
        function saveNotificationSettings() {
            // In a real application, this would save the settings to the server
            // For this demo, we'll just show an alert
            alert('Notification settings saved successfully');
        }
    </script>

    <style>
        /* Switch styling */
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #FF6B6B;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #FF6B6B;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        /* Animation for notification items */
        .notification-item {
            transition: all 0.3s ease;
        }
    </style>
</body>

</html>
