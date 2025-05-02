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
                    <img src="https://cdn.pixabay.com/photo/2018/11/13/22/01/avatar-3814081_1280.png" alt="Admin"
                        class="user-avatar">
                    <div>
                        <h4 class="font-medium">{{ $user->name }}</h4>
                        <p class="text-xs text-gray-500">{{ ucfirst($user->role) }}</p>
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
                <a href="{{ route('admin.provider') }}" class="nav-link active">
                    <i class="fas fa-user-tie icon"></i>
                    <span>Provider Management</span>
                </a>
                <a href="/admin/content" class="nav-link">
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
            <a href="" class="flex items-center space-x-2 text-gray-500 hover:text-primary transition-colors">
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
                            <i
                                class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
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
                                <a href="" class="dropdown-item text-danger">
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
                </div>

                <!-- Search and Filter -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Search providers..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                    </div>

                    <div>
                        <select id="statusFilter"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="">Status: All</option>
                            <option value="0">Active</option>
                            <option value="1">Suspended</option>
                        </select>
                    </div>

                    <div>
                        <select id="skillFilter"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="">Skills: All</option>
                            <option value="plumbing">Plumbing</option>
                            <option value="electrical">Electrical</option>
                            <option value="cleaning">Cleaning</option>
                            <option value="carpentry">Carpentry</option>
                            <option value="gardening">Gardening</option>
                        </select>
                    </div>

                    <div>
                        <select id="ratingFilter"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
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
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Provider</span>
                                        <i class="fas fa-sort ml-1"></i>
                                    </div>
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                    Skills
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Rating</span>
                                        <i class="fas fa-sort ml-1"></i>
                                    </div>
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                    Status
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Joined</span>
                                        <i class="fas fa-sort ml-1"></i>
                                    </div>
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200" id="providerTableBody">
                            @foreach ($providers as $provider)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-full"
                                                    src="https://ui-avatars.com/api/?name={{ urlencode($provider->name) }}&background=random"
                                                    alt="{{ $provider->name }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $provider->name }}
                                                </div>
                                                <div class="text-xs text-gray-500">{{ $provider->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-1">
                                            @if ($provider->provider && $provider->provider->skills)
                                                @php
                                                    $skills = explode(',', $provider->provider->skills);
                                                @endphp
                                                @foreach ($skills as $skill)
                                                    <span class="skill-tag">{{ trim($skill) }}</span>
                                                @endforeach
                                            @else
                                                <span class="text-gray-400">No skills listed</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            @php
                                                $offers = $provider->provider
                                                    ? $provider->provider->offers
                                                    : collect([]);

                                                $reviews = collect();
                                                foreach ($offers as $offer) {
                                                    if ($offer->review) {
                                                        $reviews->push($offer->review);
                                                    }
                                                }

                                                $avgRating = $reviews->avg('rating') ?? 0;
                                                $fullStars = floor($avgRating);
                                                $hasHalfStar = $avgRating - $fullStars >= 0.5;
                                                $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);

                                                $starsHTML =
                                                    str_repeat('★', $fullStars) .
                                                    ($hasHalfStar ? '½' : '') .
                                                    str_repeat('☆', $emptyStars);
                                            @endphp
                                            <div class="rating-stars mr-1">{!! $starsHTML !!}</div>
                                            <span
                                                class="text-sm font-medium">{{ number_format($avgRating, 1) }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $statusClass = $provider->is_suspended ? 'badge-suspended' : 'badge-active';
                                            $statusText = $provider->is_suspended ? 'Suspended' : 'Active';
                                        @endphp
                                        <span class="badge {{ $statusClass }} capitalize">{{ $statusText }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($provider->created_at)->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex space-x-2 justify-center">
                                            @if (!$provider->is_suspended)
                                                <form action="{{ route('admin.banProvider') }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    <input type="hidden" name="id"
                                                        value="{{ $provider->id }}">
                                                    <button type="submit"
                                                        class="suspend-provider text-danger hover:text-danger/80">
                                                        <i class="fas fa-ban"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.unbanProvider') }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    <input type="hidden" name="id"
                                                        value="{{ $provider->id }}">
                                                    <button type="submit"
                                                        class="reactivate-provider text-warning hover:text-warning/80">
                                                        <i class="fas fa-undo"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <form action="{{ route('admin.deleteProvider') }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $provider->id }}">
                                                <button type="submit"
                                                    class="delete-provider text-danger hover:text-danger/80">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
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
                        Showing <span id="startRange">1</span> to <span id="endRange">{{ count($providers) }}</span>
                        of <span id="totalProviders">{{ count($providers) }}</span> providers
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

    <!-- Add Provider Modal -->

    <div id="addProviderModal" class="modal fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
        <div class="modal-content relative bg-white w-full max-w-md mx-4 rounded-lg shadow-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Add New Provider</h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form id="addProviderForm" action="" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="addName" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" id="addName" name="name" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="addEmail" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="addEmail" name="email" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="addPassword" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="addPassword" name="password" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="addPasswordConfirmation"
                            class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                        <input type="password" id="addPasswordConfirmation" name="password_confirmation" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="addSkills" class="block text-sm font-medium text-gray-700 mb-1">Skills</label>
                        <input type="text" id="addSkills" name="skills"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                            placeholder="Separate skills with commas">
                    </div>

                    <input type="hidden" name="role" value="provider">
                    <input type="hidden" name="is_suspended" value="0">

                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button"
                            class="close-modal px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90">Add
                            Provider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

                <form id="editProviderForm" action="" method="POST">
                    @csrf
                    <input type="hidden" id="editProviderId" name="provider_id">

                    <div class="mb-4">
                        <label for="editName" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" id="editName" name="name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="editEmail" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="editEmail" name="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="mb-4">
                        <label for="editSkills" class="block text-sm font-medium text-gray-700 mb-1">Skills</label>
                        <input type="text" id="editSkills" name="skills"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                            placeholder="Separate skills with commas">
                    </div>

                    <div class="mb-4">
                        <label for="editStatus" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select id="editStatus" name="is_suspended"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="0">Active</option>
                            <option value="1">Suspended</option>
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

    <!-- View Provider Activity Modal -->
    <div id="providerActivityModal" class="modal fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
        <div class="modal-content relative bg-white w-full max-w-4xl mx-4 rounded-lg shadow-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Provider Activity - <span
                            id="activityProviderName"></span></h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="mb-6">
                    <div class="flex space-x-4 mb-4">
                        <button class="activity-tab px-4 py-2 bg-primary text-white rounded-md" data-tab="tasks">Tasks
                            Completed</button>
                        <button class="activity-tab px-4 py-2 bg-gray-200 text-gray-700 rounded-md"
                            data-tab="reviews">Reviews Received</button>
                        <button class="activity-tab px-4 py-2 bg-gray-200 text-gray-700 rounded-md"
                            data-tab="earnings">Earnings</button>
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
                                            Client</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Date</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Amount</th>
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
                                            Client</th>
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

                    <div id="earningsTab" class="activity-content hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Month</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Tasks Completed</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Earnings</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Platform Fee</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                            Net Earnings</th>
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
                    <h3 class="text-xl font-semibold text-gray-800">Export Provider Data</h3>
                    <button class="close-modal text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="mb-4">
                    <p class="text-gray-600 mb-4">Select the format you want to export the provider data in:</p>

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
                            <input type="checkbox" id="includeSkills" class="h-4 w-4 text-primary focus:ring-primary"
                                checked>
                            <label for="includeSkills" class="ml-2 text-gray-700">Skills</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="includeRatings"
                                class="h-4 w-4 text-primary focus:ring-primary" checked>
                            <label for="includeRatings" class="ml-2 text-gray-700">Ratings & Reviews</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="includeTaskHistory"
                                class="h-4 w-4 text-primary focus:ring-primary">
                            <label for="includeTaskHistory" class="ml-2 text-gray-700">Task History</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="includeEarnings"
                                class="h-4 w-4 text-primary focus:ring-primary">
                            <label for="includeEarnings" class="ml-2 text-gray-700">Earnings Information</label>
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
            initializeSidebar();
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

            // Add provider button
            document.getElementById('addProviderBtn').addEventListener('click', () => {
                document.getElementById('addProviderModal').classList.remove('hidden');
            });

            // Edit provider buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.edit-provider')) {
                    const providerId = e.target.closest('.edit-provider').dataset.id;
                    openEditProviderModal(providerId);
                }
            });

            // View activity buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.view-activity')) {
                    const providerId = e.target.closest('.view-activity').dataset.id;
                    openProviderActivityModal(providerId);
                }
            });

            // Suspend/reactivate provider buttons
            document.addEventListener('click', (e) => {
                if (e.target.closest('.suspend-provider')) {
                    const providerId = e.target.closest('.suspend-provider').dataset.id;
                    if (confirm('Are you sure you want to suspend this provider?')) {
                        window.location.href = `/admin/providers/${providerId}/suspend`;
                    }
                }

                if (e.target.closest('.reactivate-provider')) {
                    const providerId = e.target.closest('.reactivate-provider').dataset.id;
                    if (confirm('Are you sure you want to reactivate this provider?')) {
                        window.location.href = `/admin/providers/${providerId}/reactivate`;
                    }
                }
            });

            // Modal close buttons
            document.querySelectorAll('.close-modal').forEach(button => {
                button.addEventListener('click', () => {
                    document.getElementById('editProviderModal').classList.add('hidden');
                    document.getElementById('addProviderModal').classList.add('hidden');
                    document.getElementById('providerActivityModal').classList.add('hidden');
                    document.getElementById('exportModal').classList.add('hidden');
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

        // Initialize sidebar based on screen size
        function initializeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const sidebarToggle = document.getElementById('sidebar-toggle');

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
        }

        // Open edit provider modal
        function openEditProviderModal(providerId) {
            fetch(`/admin/providers/${providerId}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editProviderId').value = data.id;
                    document.getElementById('editName').value = data.name;
                    document.getElementById('editEmail').value = data.email;
                    document.getElementById('editSkills').value = data.provider ? data.provider.skills : '';
                    document.getElementById('editStatus').value = data.is_suspended ? '1' : '0';

                    document.getElementById('editProviderModal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error fetching provider data:', error);
                    alert('Failed to load provider data. Please try again.');
                });
        }

        // Open provider activity modal
        function openProviderActivityModal(providerId) {
            fetch(`/admin/providers/${providerId}/activity`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('activityProviderName').textContent = data.name;

                    // Populate tasks tab
                    const tasksTableBody = document.getElementById('tasksTableBody');
                    tasksTableBody.innerHTML = '';

                    if (data.tasks && data.tasks.length > 0) {
                        data.tasks.forEach(task => {
                            const row = document.createElement('tr');
                            row.className = 'hover:bg-gray-50';
                            row.innerHTML = `
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${task.id}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${task.title}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${task.client_name}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${formatDate(task.created_at)}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$${task.amount}</td>
                            `;
                            tasksTableBody.appendChild(row);
                        });
                    } else {
                        tasksTableBody.innerHTML = `
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No tasks found</td>
                            </tr>
                        `;
                    }

                    // Populate reviews tab
                    const reviewsTableBody = document.getElementById('reviewsTableBody');
                    reviewsTableBody.innerHTML = '';

                    if (data.reviews && data.reviews.length > 0) {
                        data.reviews.forEach(review => {
                            const starsHTML = '★'.repeat(review.rating) + '☆'.repeat(5 - review.rating);

                            const row = document.createElement('tr');
                            row.className = 'hover:bg-gray-50';
                            row.innerHTML = `
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${review.client_name}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="rating-stars text-yellow-400 mr-1">${starsHTML}</div>
                                        <span class="text-sm font-medium">${review.rating}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${formatDate(review.created_at)}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">${review.comment}</td>
                            `;
                            reviewsTableBody.appendChild(row);
                        });
                    } else {
                        reviewsTableBody.innerHTML = `
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">No reviews found</td>
                            </tr>
                        `;
                    }

                    // Show the modal
                    document.getElementById('providerActivityModal').classList.remove('hidden');

                    // Reset to first tab
                    switchActivityTab('tasks');
                })
                .catch(error => {
                    console.error('Error fetching provider activity:', error);
                    alert('Failed to load provider activity. Please try again.');
                });
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

        // Format date
        function formatDate(dateString) {
            const options = {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            };
            return new Date(dateString).toLocaleDateString(undefined, options);
        }
    </script>
</body>

</html>
