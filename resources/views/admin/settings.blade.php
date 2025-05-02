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

        </div>
        <div class="sidebar-footer">
            <form action="/logout" method="post">
                @csrf
                <button type="submit"
                    class="flex items-center space-x-2 text-gray-500 hover:text-primary transition-colors">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
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
                                    class="font-medium">{{ \Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Edit Form -->
                <div class="settings-card lg:col-span-2">
                    <h3 class="font-display text-xl font-semibold mb-6">Edit Profile Information</h3>
                    <form action="/updateprofile" method="POST" class="max-w-4xl mx-auto">
                        @csrf
                        <!-- Personal Information Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold mb-4 pb-2 border-b">Personal Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="form-group">
                                    <label for="full_name" class="form-label block mb-1 font-medium">Full Name</label>
                                    <input type="text" id="full_name" name="name"
                                        class="form-input w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                                        value="{{ old('name', $user->name) }}" required aria-required="true">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label block mb-1 font-medium">Email
                                        Address</label>
                                    <div class="relative">
                                        <input type="email" {{ $user->role == 'admin' ? 'readonly' : '' }}
                                            id="email" name="email"
                                            class="form-input w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition
                                            {{ $user->role == 'admin' ? 'bg-gray-100' : '' }}"
                                            value="{{ old('email', $user->email) }}" required aria-required="true">
                                        @if ($user->role == 'admin')
                                            <span
                                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-xs text-gray-500"
                                                aria-label="Admin emails cannot be changed">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 116 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="age" class="form-label block mb-1 font-medium">Age</label>
                                    <input type="number" id="age" name="age"
                                        class="form-input w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                                        value="{{ old('age', $user->age ?? '') }}" min="18" max="120">
                                    <p class="text-xs text-gray-500 mt-1">Must be 18 or older</p>
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="form-label block mb-1 font-medium">Gender</label>
                                    <select id="gender" name="gender"
                                        class="form-select w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                                        <option value="" disabled
                                            {{ old('gender', $user->gender ?? '') ? '' : 'selected' }}>Select gender
                                        </option>
                                        <option value="m"
                                            {{ old('gender', $user->gender ?? '') == 'm' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="f"
                                            {{ old('gender', $user->gender ?? '') == 'f' ? 'selected' : '' }}>Female
                                        </option>
                                        <option value="other"
                                            {{ old('gender', $user->gender ?? '') == 'other' ? 'selected' : '' }}>
                                            Non-binary/Other</option>
                                        <option value="prefer_not"
                                            {{ old('gender', $user->gender ?? '') == 'prefer_not' ? 'selected' : '' }}>
                                            Prefer not to say</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Location Information -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold mb-4 pb-2 border-b">Location</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="form-group md:col-span-1">
                                    <label for="location" class="form-label block mb-1 font-medium">Address</label>
                                    <input type="text" id="location" name="location"
                                        class="form-input w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                                        value="{{ old('location', $user->location ?? '') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Password Change -->
                        <div class="border-t border-gray-200 pt-8 mt-8">
                            <h3 class="text-lg font-semibold mb-4">Security Settings</h3>
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 shadow-sm">
                                <h4 class="font-medium mb-4">Change Password</h4>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div class="form-group">
                                        <label for="current_password"
                                            class="form-label block mb-1 font-medium">Current Password</label>
                                        <div class="relative">
                                            <input type="password" id="current_password" name="password"
                                                class="form-input pr-10 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                                            <button type="button"
                                                class="toggle-password absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500"
                                                data-target="current_password"
                                                aria-label="Toggle password visibility">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password" class="form-label block mb-1 font-medium">New
                                            Password</label>
                                        <div class="relative">
                                            <input type="password" id="new_password" name="new_password"
                                                class="form-input pr-10 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                                            <button type="button"
                                                class="toggle-password absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500"
                                                data-target="new_password" aria-label="Toggle password visibility">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password"
                                            class="form-label block mb-1 font-medium">Confirm New Password</label>
                                        <div class="relative">
                                            <input type="password" id="confirm_password" name="confirm_password"
                                                class="form-input pr-10 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                                            <button type="button"
                                                class="toggle-password absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500"
                                                data-target="confirm_password"
                                                aria-label="Toggle password visibility">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <div class="password-strength-meter hidden mt-2 mb-4">
                                        <div class="flex justify-between mb-1 text-xs">
                                            <span>Password strength:</span>
                                            <span class="password-strength-text">Poor</span>
                                        </div>
                                        <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                            <div
                                                class="password-strength-bar bg-red-500 h-full rounded-full w-1/4 transition-all duration-300">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-sm text-gray-600 mt-3 bg-gray-100 p-3 rounded">
                                        <p class="font-medium mb-1">Password requirements:</p>
                                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-1 list-inside">
                                            <li class="password-requirement" data-requirement="length">
                                                <span class="inline-block w-4 h-4 mr-1">⚪</span> At least 8 characters
                                            </li>
                                            <li class="password-requirement" data-requirement="uppercase">
                                                <span class="inline-block w-4 h-4 mr-1">⚪</span> At least one uppercase
                                                letter
                                            </li>
                                            <li class="password-requirement" data-requirement="lowercase">
                                                <span class="inline-block w-4 h-4 mr-1">⚪</span> At least one lowercase
                                                letter
                                            </li>
                                            <li class="password-requirement" data-requirement="number">
                                                <span class="inline-block w-4 h-4 mr-1">⚪</span> At least one number
                                            </li>
                                            <li class="password-requirement" data-requirement="special">
                                                <span class="inline-block w-4 h-4 mr-1">⚪</span> At least one special
                                                character
                                            </li>
                                            <li class="password-requirement" data-requirement="match"
                                                id="password-match">
                                                <span class="inline-block w-4 h-4 mr-1">⚪</span> Passwords match
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Notifications -->
                        @if (session('success'))
                            <div
                                class="mt-6 text-green-700 bg-green-100 p-4 rounded-lg border border-green-200 flex items-start">
                                <svg class="h-5 w-5 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mt-6 text-red-700 bg-red-100 p-4 rounded-lg border border-red-200">
                                <div class="flex items-start">
                                    <svg class="h-5 w-5 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    <div>
                                        <p class="font-medium">Please correct the following errors:</p>
                                        <ul class="mt-1 list-disc list-inside text-sm">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Form Actions -->
                        <div class="flex flex-wrap justify-end gap-4 mt-8 border-t border-gray-200 pt-6">
                            <button type="button"
                                class="btn btn-secondary px-6 py-2 bg-white border border-gray-300 text-gray-700 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">Cancel</button>
                            <button type="submit"
                                class="btn btn-primary px-6 py-2 bg-blue-600 border border-transparent text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                    </svg>
                                    Save Changes
                                </span>
                            </button>
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

        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            document.querySelectorAll('.toggle-password').forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const passwordInput = document.getElementById(targetId);

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        this.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                `;
                    } else {
                        passwordInput.type = 'password';
                        this.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                `;
                    }
                });
            });

            // Password strength checker
            const newPasswordInput = document.getElementById('new_password');
            const confirmPasswordInput = document.getElementById('confirm_password');
            const strengthMeter = document.querySelector('.password-strength-meter');
            const strengthBar = document.querySelector('.password-strength-bar');
            const strengthText = document.querySelector('.password-strength-text');

            if (newPasswordInput) {
                newPasswordInput.addEventListener('input', function() {
                    const password = this.value;

                    if (password.length > 0) {
                        strengthMeter.classList.remove('hidden');

                        // Check password requirements
                        checkPasswordRequirements(password);

                        // Update strength meter
                        const strength = calculatePasswordStrength(password);
                        updateStrengthMeter(strength);
                    } else {
                        strengthMeter.classList.add('hidden');
                        resetRequirements();
                    }

                    // Check if passwords match
                    checkPasswordsMatch();
                });
            }

            if (confirmPasswordInput) {
                confirmPasswordInput.addEventListener('input', checkPasswordsMatch);
            }

            function checkPasswordRequirements(password) {
                // Length check
                updateRequirement('length', password.length >= 8);

                // Uppercase check
                updateRequirement('uppercase', /[A-Z]/.test(password));

                // Lowercase check
                updateRequirement('lowercase', /[a-z]/.test(password));

                // Number check
                updateRequirement('number', /[0-9]/.test(password));

                // Special character check
                updateRequirement('special', /[^A-Za-z0-9]/.test(password));
            }

            function updateRequirement(requirement, isValid) {
                const element = document.querySelector(`[data-requirement="${requirement}"] span`);
                if (element) {
                    element.innerHTML = isValid ? '✅' : '⚪';
                }
            }

            function resetRequirements() {
                document.querySelectorAll('.password-requirement span').forEach(span => {
                    span.innerHTML = '⚪';
                });
            }

            function checkPasswordsMatch() {
                const password = newPasswordInput.value;
                const confirmPassword = confirmPasswordInput.value;

                const matchRequirement = document.getElementById('password-match');

                if (password && confirmPassword) {
                    updateRequirement('match', password === confirmPassword);
                } else {
                    document.querySelector('[data-requirement="match"] span').innerHTML = '⚪';
                }
            }

            function calculatePasswordStrength(password) {
                let strength = 0;

                // Length criteria
                if (password.length >= 8) strength += 1;
                if (password.length >= 12) strength += 1;

                // Character type criteria
                if (/[A-Z]/.test(password)) strength += 1;
                if (/[a-z]/.test(password)) strength += 1;
                if (/[0-9]/.test(password)) strength += 1;
                if (/[^A-Za-z0-9]/.test(password)) strength += 1;

                return strength;
            }

            function updateStrengthMeter(strength) {
                // Update width and color based on strength
                let color, width, text;

                switch (true) {
                    case (strength <= 2):
                        color = 'bg-red-500';
                        width = 'w-1/4';
                        text = 'Poor';
                        break;
                    case (strength <= 4):
                        color = 'bg-yellow-500';
                        width = 'w-2/4';
                        text = 'Medium';
                        break;
                    case (strength <= 5):
                        color = 'bg-blue-500';
                        width = 'w-3/4';
                        text = 'Good';
                        break;
                    default:
                        color = 'bg-green-500';
                        width = 'w-full';
                        text = 'Strong';
                }

                strengthBar.className = `h-full rounded-full transition-all duration-300 ${color} ${width}`;
                strengthText.textContent = text;
            }
        });
    </script>
</body>

</html>
