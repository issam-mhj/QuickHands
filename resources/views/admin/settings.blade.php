<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands Admin Settings</title>
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
    <style type="text/tailwindcss">
        @layer components {
            .dashboard-card {
                @apply relative overflow-hidden rounded-2xl p-6 shadow-lg transition-all duration-300 hover:shadow-xl bg-white border border-gray-100;
            }

            .dashboard-card:hover {
                @apply transform -translate-y-1;
            }

            .settings-card {
                @apply relative overflow-hidden rounded-2xl p-6 shadow-lg transition-all duration-300 bg-white border border-gray-100;
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

            .search-input {
                @apply w-full px-4 py-2 pl-10 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300;
            }

            .scroll-progress {
                @apply fixed top-0 left-0 h-1 bg-gradient-to-r from-primary via-secondary to-accent z-50;
                width: 0%;
            }

            .form-input {
                @apply w-full p-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300;
            }

            .form-label {
                @apply block text-gray-700 font-medium mb-2;
            }

            .form-group {
                @apply mb-6;
            }

            .btn {
                @apply px-6 py-3 rounded-xl font-medium transition-all duration-300;
            }

            .btn-primary {
                @apply bg-primary text-white hover:bg-primary/90 shadow-md hover:shadow-lg;
            }

            .btn-secondary {
                @apply bg-gray-100 text-dark hover:bg-gray-200;
            }

            .nav-tab {
                @apply px-4 py-2 font-medium rounded-full transition-all duration-300;
            }

            .nav-tab.active {
                @apply bg-primary text-white;
            }

            .nav-tab:not(.active) {
                @apply hover:bg-gray-100;
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
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fas fa-chart-pie icon"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.users') }}" class="nav-link">
                    <i class="fas fa-users icon"></i>
                    <span>User Management</span>
                </a>
                <a href="{{ route('admin.provider') }}" class="nav-link">
                    <i class="fas fa-user-tie icon"></i>
                    <span>Provider Management</span>
                </a>
                <a href="{{ route('admin.content') }}" class="nav-link">
                    <i class="fas fa-shield-alt icon"></i>
                    <span>Content Moderation</span>
                </a>
                <a href="{{ route('admin.tasks') }}" class="nav-link">
                    <i class="fas fa-tasks icon"></i>
                    <span>Task Oversight</span>
                </a>
                <a href="{{ route('admin.analytics') }}" class="nav-link">
                    <i class="fas fa-chart-line icon"></i>
                    <span>Analytics & Reports</span>
                </a>
                <a href="{{ route('admin.notifications') }}" class="nav-link">
                    <i class="fas fa-bell icon"></i>
                    <span>Notifications</span>
                    <span
                        class="ml-auto bg-primary text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">8</span>
                </a>
                <a href="{{ route('admin.settings') }}" class="nav-link active">
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
                            Account <span class="gradient-text">Settings</span>
                        </h1>
                        <p class="text-gray-600">Manage your profile and account preferences</p>
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

            <!-- Settings Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Profile Photo & Info -->
                <div class="settings-card lg:col-span-1">
                    <div class="flex flex-col items-center justify-center pb-6 border-b border-gray-100">
                        <div class="relative mb-4">
                            <img src="https://cdn.pixabay.com/photo/2018/11/13/22/01/avatar-3814081_1280.png"
                                alt="Admin"
                                class="w-28 h-28 rounded-full object-cover border-4 border-white shadow-lg">
                        </div>
                        <h3 class="font-display text-xl font-semibold">{{ $user->name }}</h3>
                        <p class="text-gray-500">Super Admin</p>
                        <div class="mt-4 flex items-center space-x-2">
                            <span class="px-3 py-1 rounded-full bg-primary/20 text-primary text-xs">Active</span>
                            <span class="text-xs text-gray-500">Member since
                                {{ $user->created_at->format('M Y') }}</span>
                        </div>
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
                                <span
                                    class="font-medium">{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Edit Form -->
                <div class="settings-card lg:col-span-2">
                    <h3 class="font-display text-xl font-semibold mb-6">Edit Profile Information</h3>
                    <form id="profile-form">
                        <!-- Personal Info -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div class="form-group">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" id="full_name" name="full_name" class="form-input"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" name="email" class="form-input"
                                    value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" id="age" name="age" class="form-input"
                                    value="{{ $user->age ?? '' }}" min="18" max="100">
                            </div>
                            <div class="form-group">
                                <label for="gender" class="form-label">Gender</label>
                                <select id="gender" name="gender" class="form-input">
                                    <option value="" disabled>Select gender</option>
                                    <option value="male" {{ ($user->gender ?? '') == 'male' ? 'selected' : '' }}>
                                        Male</option>
                                    <option value="female" {{ ($user->gender ?? '') == 'female' ? 'selected' : '' }}>
                                        Female</option>
                                    <option value="non-binary"
                                        {{ ($user->gender ?? '') == 'non-binary' ? 'selected' : '' }}>Non-binary
                                    </option>
                                    <option value="prefer-not-to-say"
                                        {{ ($user->gender ?? '') == 'prefer-not-to-say' ? 'selected' : '' }}>Prefer not
                                        to say</option>
                                </select>
                            </div>
                        </div>

                        <!-- Location Info -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <div class="form-group md:col-span-1">
                                <label for="country" class="form-label">Country</label>
                                <select id="country" name="country" class="form-input">
                                    <option value="" disabled>Select country</option>
                                    <option value="US" {{ ($user->country ?? '') == 'US' ? 'selected' : '' }}>
                                        United States</option>
                                    <option value="CA" {{ ($user->country ?? '') == 'CA' ? 'selected' : '' }}>
                                        Canada</option>
                                    <option value="UK" {{ ($user->country ?? '') == 'UK' ? 'selected' : '' }}>
                                        United Kingdom</option>
                                    <option value="AU" {{ ($user->country ?? '') == 'AU' ? 'selected' : '' }}>
                                        Australia</option>
                                    <!-- Add more countries -->
                                </select>
                            </div>
                            <div class="form-group md:col-span-1">
                                <label for="state" class="form-label">State/Province</label>
                                <input type="text" id="state" name="state" class="form-input"
                                    value="{{ $user->state ?? '' }}">
                            </div>
                            <div class="form-group md:col-span-1">
                                <label for="city" class="form-label">City</label>
                                <input type="text" id="city" name="city" class="form-input"
                                    value="{{ $user->city ?? '' }}">
                            </div>
                        </div>

                        <!-- Password Change -->
                        <div class="border-t border-gray-100 pt-6 mt-6">
                            <h4 class="font-medium mb-4">Change Password</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="form-group">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input type="password" id="current_password" name="current_password"
                                        class="form-input">
                                </div>
                                <div class="form-group">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" id="new_password" name="new_password" class="form-input">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password" class="form-label">Confirm New Password</label>
                                    <input type="password" id="confirm_password" name="confirm_password"
                                        class="form-input">
                                </div>
                            </div>
                            <div class="text-xs text-gray-500 mt-2">
                                <p>Password must be at least 8 characters long and include:</p>
                                <ul class="list-disc pl-5 mt-1">
                                    <li>At least one uppercase letter</li>
                                    <li>At least one lowercase letter</li>
                                    <li>At least one number</li>
                                    <li>At least one special character</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex justify-end space-x-3 mt-8">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Success Toast Notification -->
    <div id="success-toast"
        class="fixed bottom-4 right-4 bg-white rounded-2xl shadow-xl p-4 flex items-center space-x-3 transform translate-y-20 opacity-0 transition-all duration-500">
        <div class="w-10 h-10 rounded-full bg-success/20 flex items-center justify-center flex-shrink-0">
            <i class="fas fa-check text-success"></i>
        </div>
        <div>
            <h5 class="font-medium">Success!</h5>
            <p class="text-sm text-gray-500">Your profile has been updated successfully.</p>
        </div>
        <button class="ml-4 text-gray-400 hover:text-gray-600">
            <i class="fas fa-times"></i>
        </button>
    </div>

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

            // Settings Tab Navigation
            const navTabs = document.querySelectorAll('.nav-tab');

            navTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    navTabs.forEach(t => t.classList.remove('active'));

                    // Add active class to clicked tab
                    this.classList.add('active');

                    // You would typically show/hide content based on the tab
                    // For this demo, we're just showing the profile tab content
                    const tabName = this.getAttribute('data-tab');
                    console.log(`Tab clicked: ${tabName}`);

                    // Additional logic to show/hide tab content would go here
                });
            });

            // Form submission
            const profileForm = document.getElementById('profile-form');
            const successToast = document.getElementById('success-toast');

            profileForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Here you would typically send an AJAX request to update the profile
                // For demo purposes, we'll just show the success toast

                // Show success toast
                successToast.classList.remove('translate-y-20', 'opacity-0');

                // Hide toast after 5 seconds
                setTimeout(() => {
                    successToast.classList.add('translate-y-20', 'opacity-0');
                }, 5000);
            });

            // Close toast when clicking the close button
            const toastCloseBtn = successToast.querySelector('button');
            toastCloseBtn.addEventListener('click', function() {
                successToast.classList.add('translate-y-20', 'opacity-0');
            });
        });
    </script>
</body>

</html>
