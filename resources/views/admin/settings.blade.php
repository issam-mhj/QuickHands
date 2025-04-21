<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands Admin - Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&display=swap" rel="stylesheet">
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
    <style>
        /* Custom Styles */
        .settings-card {
            @apply bg-white rounded-2xl p-6 shadow-lg transition-all duration-300 hover:shadow-xl border border-gray-100;
            transform-origin: center;
        }

        .settings-card:hover {
            @apply transform scale-[1.01];
        }

        .settings-section {
            @apply opacity-0 transform translate-y-4;
        }

        .settings-input {
            @apply w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300;
        }

        .settings-toggle {
            @apply relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-300 focus:outline-none;
        }

        .settings-toggle-dot {
            @apply inline-block h-4 w-4 transform rounded-full bg-white transition duration-300;
        }

        .back-button {
            @apply fixed top-8 right-8 z-50 w-12 h-12 rounded-full bg-white shadow-lg flex items-center justify-center transition-all duration-300 hover:bg-primary hover:text-white;
        }

        .tab-button {
            @apply px-6 py-3 rounded-xl text-gray-500 font-medium transition-all duration-300;
        }

        .tab-button.active {
            @apply bg-white text-primary shadow-md;
        }

        .settings-header {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1) 0%, rgba(78, 205, 196, 0.1) 100%);
        }

        .gradient-border {
            position: relative;
            border-radius: 1rem;
            background: white;
        }

        .gradient-border::before {
            content: "";
            position: absolute;
            inset: -2px;
            border-radius: 1.1rem;
            background: linear-gradient(135deg, #FF6B6B, #4ECDC4);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gradient-border:hover::before {
            opacity: 1;
        }

        /* Custom Animations */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .float {
            animation: float 6s ease-in-out infinite;
        }

        .float-delay-1 {
            animation-delay: 1s;
        }

        .float-delay-2 {
            animation-delay: 2s;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #FF6B6B;
        }

        /* Tooltip */
        .tooltip {
            @apply invisible absolute;
            width: max-content;
        }

        .has-tooltip:hover .tooltip {
            @apply visible z-50;
        }
    </style>
</head>

<body class="font-sans bg-gray-50 text-dark overflow-x-hidden">
    <!-- Back Button -->
    <a href="simplified-dashboard.html" class="back-button">
        <i class="fas fa-times"></i>
    </a>

    <!-- Settings Header -->
    <header class="settings-header py-16 px-6 md:px-12 text-center">
        <div class="max-w-6xl mx-auto">
            <h1 class="font-display text-5xl md:text-6xl font-bold mb-4">
                <span class="text-primary">Settings</span> <span class="text-secondary">&</span> <span
                    class="text-dark">Configuration</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Configure your platform settings, manage admin roles, and customize system preferences
            </p>
        </div>
    </header>

    <!-- Settings Navigation -->
    <div class="max-w-6xl mx-auto px-6 md:px-12 -mt-8 mb-8">
        <div class="bg-gray-100 p-2 rounded-2xl shadow-md flex flex-wrap justify-center">
            <button class="tab-button active" data-tab="platform">
                <i class="fas fa-sliders-h mr-2"></i> Platform
            </button>
            <button class="tab-button" data-tab="admin">
                <i class="fas fa-user-shield mr-2"></i> Admin Roles
            </button>
            <button class="tab-button" data-tab="system">
                <i class="fas fa-cogs mr-2"></i> System
            </button>
            <button class="tab-button" data-tab="notifications">
                <i class="fas fa-bell mr-2"></i> Notifications
            </button>
            <button class="tab-button" data-tab="security">
                <i class="fas fa-shield-alt mr-2"></i> Security
            </button>
        </div>
    </div>

    <!-- Settings Content -->
    <main class="max-w-6xl mx-auto px-6 md:px-12 pb-24">
        <!-- Platform Settings -->
        <section id="platform-settings" class="settings-section active">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Fee Configuration -->
                <div class="settings-card gradient-border">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-1">Fee Configuration</h3>
                            <p class="text-gray-500">Set service fees and commission rates</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                            <i class="fas fa-percentage text-primary"></i>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Platform Service Fee (%)</label>
                            <div class="flex items-center">
                                <input type="range" min="0" max="30" value="15" class="w-full mr-4"
                                    id="serviceFeeSlider">
                                <div class="w-16 h-10 bg-gray-100 rounded-lg flex items-center justify-center font-medium"
                                    id="serviceFeeValue">15%</div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Provider Commission Rate
                                (%)</label>
                            <div class="flex items-center">
                                <input type="range" min="0" max="30" value="10" class="w-full mr-4"
                                    id="commissionSlider">
                                <div class="w-16 h-10 bg-gray-100 rounded-lg flex items-center justify-center font-medium"
                                    id="commissionValue">10%</div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Transaction Fee (Fixed)</label>
                            <div class="relative">
                                <span class="absolute left-3 top-3 text-gray-500">$</span>
                                <input type="number" value="1.99" step="0.01" min="0"
                                    class="settings-input pl-8">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Promotional Discount (%)</label>
                            <div class="flex items-center">
                                <input type="range" min="0" max="100" value="0" class="w-full mr-4"
                                    id="discountSlider">
                                <div class="w-16 h-10 bg-gray-100 rounded-lg flex items-center justify-center font-medium"
                                    id="discountValue">0%</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <button
                            class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                            Save Fee Settings
                        </button>
                    </div>
                </div>

                <!-- Policy Management -->
                <div class="settings-card gradient-border">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-1">Policy Management</h3>
                            <p class="text-gray-500">Update platform policies and terms</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center">
                            <i class="fas fa-file-contract text-secondary"></i>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Terms of Service</label>
                            <div class="flex items-center space-x-4 mb-2">
                                <span class="text-sm text-gray-500">Last updated: March 15, 2023</span>
                                <span
                                    class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Published</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <button
                                    class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </button>
                                <button
                                    class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
                                    <i class="fas fa-history mr-1"></i> History
                                </button>
                                <button
                                    class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
                                    <i class="fas fa-eye mr-1"></i> Preview
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Privacy Policy</label>
                            <div class="flex items-center space-x-4 mb-2">
                                <span class="text-sm text-gray-500">Last updated: March 15, 2023</span>
                                <span
                                    class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Published</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <button
                                    class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </button>
                                <button
                                    class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
                                    <i class="fas fa-history mr-1"></i> History
                                </button>
                                <button
                                    class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
                                    <i class="fas fa-eye mr-1"></i> Preview
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Community Guidelines</label>
                            <div class="flex items-center space-x-4 mb-2">
                                <span class="text-sm text-gray-500">Last updated: February 28, 2023</span>
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Draft</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <button
                                    class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </button>
                                <button
                                    class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
                                    <i class="fas fa-history mr-1"></i> History
                                </button>
                                <button
                                    class="px-3 py-1.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors text-sm">
                                    <i class="fas fa-check mr-1"></i> Publish
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <button
                            class="px-4 py-2 bg-secondary text-white rounded-lg hover:bg-secondary/90 transition-colors">
                            <i class="fas fa-plus mr-1"></i> Create New Policy
                        </button>
                    </div>
                </div>

                <!-- Platform Customization -->
                <div class="settings-card gradient-border">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-1">Platform Customization</h3>
                            <p class="text-gray-500">Customize platform appearance and branding</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center">
                            <i class="fas fa-paint-brush text-accent"></i>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Platform Name</label>
                            <input type="text" value="QuickHands" class="settings-input">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tagline</label>
                            <input type="text" value="Get help, fast." class="settings-input">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Logo</label>
                            <div class="flex items-center space-x-4">
                                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-hands-helping text-2xl text-primary"></i>
                                </div>
                                <button
                                    class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
                                    <i class="fas fa-upload mr-1"></i> Upload New
                                </button>
                                <button
                                    class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
                                    <i class="fas fa-trash mr-1"></i> Remove
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Primary Color</label>
                            <div class="flex items-center space-x-3">
                                <input type="color" value="#FF6B6B" class="w-10 h-10 rounded cursor-pointer">
                                <input type="text" value="#FF6B6B" class="settings-input">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Color</label>
                            <div class="flex items-center space-x-3">
                                <input type="color" value="#4ECDC4" class="w-10 h-10 rounded cursor-pointer">
                                <input type="text" value="#4ECDC4" class="settings-input">
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <div class="flex items-center justify-between">
                            <button
                                class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                                Save Customization
                            </button>
                            <button
                                class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                Preview Changes
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Feature Toggles -->
                <div class="settings-card gradient-border">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-1">Feature Toggles</h3>
                            <p class="text-gray-500">Enable or disable platform features</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-info/10 flex items-center justify-center">
                            <i class="fas fa-toggle-on text-info"></i>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-medium">Instant Booking</h4>
                                <p class="text-sm text-gray-500">Allow users to book services without provider
                                    confirmation</p>
                            </div>
                            <label class="settings-toggle bg-gray-200 peer-checked:bg-primary">
                                <input type="checkbox" class="sr-only peer" checked>
                                <span class="settings-toggle-dot peer-checked:translate-x-5"></span>
                            </label>
                        </div>

                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-medium">Provider Verification</h4>
                                <p class="text-sm text-gray-500">Require ID verification for service providers</p>
                            </div>
                            <label class="settings-toggle bg-gray-200 peer-checked:bg-primary">
                                <input type="checkbox" class="sr-only peer" checked>
                                <span class="settings-toggle-dot peer-checked:translate-x-5"></span>
                            </label>
                        </div>

                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-medium">In-app Chat</h4>
                                <p class="text-sm text-gray-500">Enable messaging between users and providers</p>
                            </div>
                            <label class="settings-toggle bg-gray-200 peer-checked:bg-primary">
                                <input type="checkbox" class="sr-only peer" checked>
                                <span class="settings-toggle-dot peer-checked:translate-x-5"></span>
                            </label>
                        </div>

                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-medium">Reviews & Ratings</h4>
                                <p class="text-sm text-gray-500">Allow users to rate and review providers</p>
                            </div>
                            <label class="settings-toggle bg-gray-200 peer-checked:bg-primary">
                                <input type="checkbox" class="sr-only peer" checked>
                                <span class="settings-toggle-dot peer-checked:translate-x-5"></span>
                            </label>
                        </div>

                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-medium">Subscription Plans</h4>
                                <p class="text-sm text-gray-500">Enable premium subscription options</p>
                            </div>
                            <label class="settings-toggle bg-gray-200 peer-checked:bg-primary">
                                <input type="checkbox" class="sr-only peer">
                                <span class="settings-toggle-dot peer-checked:translate-x-5"></span>
                            </label>
                        </div>

                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-medium">Referral Program</h4>
                                <p class="text-sm text-gray-500">Enable user and provider referral rewards</p>
                            </div>
                            <label class="settings-toggle bg-gray-200 peer-checked:bg-primary">
                                <input type="checkbox" class="sr-only peer">
                                <span class="settings-toggle-dot peer-checked:translate-x-5"></span>
                            </label>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <button
                            class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                            Save Feature Settings
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Admin Roles Settings -->
        <section id="admin-settings" class="settings-section hidden">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="settings-card gradient-border">
                        <div class="flex items-start justify-between mb-6">
                            <div>
                                <h3 class="text-xl font-semibold mb-1">Admin Users</h3>
                                <p class="text-gray-500">Manage admin accounts and permissions</p>
                            </div>
                            <button
                                class="px-3 py-1.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors text-sm">
                                <i class="fas fa-plus mr-1"></i> Add Admin
                            </button>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="text-left text-gray-500 border-b border-gray-200">
                                        <th class="pb-3 font-medium">Name</th>
                                        <th class="pb-3 font-medium">Email</th>
                                        <th class="pb-3 font-medium">Role</th>
                                        <th class="pb-3 font-medium">Status</th>
                                        <th class="pb-3 font-medium">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3">
                                            <div class="flex items-center">
                                                <img src="https://randomuser.me/api/portraits/men/32.jpg"
                                                    alt="Admin" class="w-8 h-8 rounded-full mr-3">
                                                <span>John Doe</span>
                                            </div>
                                        </td>
                                        <td class="py-3">john.doe@example.com</td>
                                        <td class="py-3"><span
                                                class="px-2 py-1 bg-primary/10 text-primary rounded-full text-xs">Super
                                                Admin</span></td>
                                        <td class="py-3"><span
                                                class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Active</span>
                                        </td>
                                        <td class="py-3">
                                            <div class="flex space-x-2">
                                                <button class="p-1 text-gray-500 hover:text-primary"><i
                                                        class="fas fa-edit"></i></button>
                                                <button class="p-1 text-gray-500 hover:text-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3">
                                            <div class="flex items-center">
                                                <img src="https://randomuser.me/api/portraits/women/44.jpg"
                                                    alt="Admin" class="w-8 h-8 rounded-full mr-3">
                                                <span>Jane Smith</span>
                                            </div>
                                        </td>
                                        <td class="py-3">jane.smith@example.com</td>
                                        <td class="py-3"><span
                                                class="px-2 py-1 bg-secondary/10 text-secondary rounded-full text-xs">Content
                                                Moderator</span></td>
                                        <td class="py-3"><span
                                                class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Active</span>
                                        </td>
                                        <td class="py-3">
                                            <div class="flex space-x-2">
                                                <button class="p-1 text-gray-500 hover:text-primary"><i
                                                        class="fas fa-edit"></i></button>
                                                <button class="p-1 text-gray-500 hover:text-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3">
                                            <div class="flex items-center">
                                                <img src="https://randomuser.me/api/portraits/men/67.jpg"
                                                    alt="Admin" class="w-8 h-8 rounded-full mr-3">
                                                <span>Robert Johnson</span>
                                            </div>
                                        </td>
                                        <td class="py-3">robert.j@example.com</td>
                                        <td class="py-3"><span
                                                class="px-2 py-1 bg-info/10 text-info rounded-full text-xs">Support
                                                Agent</span></td>
                                        <td class="py-3"><span
                                                class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Active</span>
                                        </td>
                                        <td class="py-3">
                                            <div class="flex space-x-2">
                                                <button class="p-1 text-gray-500 hover:text-primary"><i
                                                        class="fas fa-edit"></i></button>
                                                <button class="p-1 text-gray-500 hover:text-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3">
                                            <div class="flex items-center">
                                                <img src="https://randomuser.me/api/portraits/women/22.jpg"
                                                    alt="Admin" class="w-8 h-8 rounded-full mr-3">
                                                <span>Emily Davis</span>
                                            </div>
                                        </td>
                                        <td class="py-3">emily.d@example.com</td>
                                        <td class="py-3"><span
                                                class="px-2 py-1 bg-accent/10 text-dark rounded-full text-xs">Analytics
                                                Manager</span></td>
                                        <td class="py-3"><span
                                                class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Away</span>
                                        </td>
                                        <td class="py-3">
                                            <div class="flex space-x-2">
                                                <button class="p-1 text-gray-500 hover:text-primary"><i
                                                        class="fas fa-edit"></i></button>
                                                <button class="p-1 text-gray-500 hover:text-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3">
                                            <div class="flex items-center">
                                                <img src="https://randomuser.me/api/portraits/men/45.jpg"
                                                    alt="Admin" class="w-8 h-8 rounded-full mr-3">
                                                <span>Michael Brown</span>
                                            </div>
                                        </td>
                                        <td class="py-3">michael.b@example.com</td>
                                        <td class="py-3"><span
                                                class="px-2 py-1 bg-warning/10 text-warning rounded-full text-xs">Financial
                                                Admin</span></td>
                                        <td class="py-3"><span
                                                class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Inactive</span>
                                        </td>
                                        <td class="py-3">
                                            <div class="flex space-x-2">
                                                <button class="p-1 text-gray-500 hover:text-primary"><i
                                                        class="fas fa-edit"></i></button>
                                                <button class="p-1 text-gray-500 hover:text-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="settings-card gradient-border mb-8">
                        <div class="flex items-start justify-between mb-6">
                            <div>
                                <h3 class="text-xl font-semibold mb-1">Role Management</h3>
                                <p class="text-gray-500">Configure admin roles and permissions</p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                <i class="fas fa-user-tag text-primary"></i>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="p-3 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-medium">Super Admin</h4>
                                    <button class="p-1 text-gray-500 hover:text-primary"><i
                                            class="fas fa-edit"></i></button>
                                </div>
                                <p class="text-sm text-gray-500 mb-2">Full access to all platform features and settings
                                </p>
                                <div class="flex flex-wrap gap-1">
                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-700 rounded-full text-xs">All
                                        Permissions</span>
                                </div>
                            </div>

                            <div class="p-3 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-medium">Content Moderator</h4>
                                    <button class="p-1 text-gray-500 hover:text-primary"><i
                                            class="fas fa-edit"></i></button>
                                </div>
                                <p class="text-sm text-gray-500 mb-2">Manage and moderate platform content</p>
                                <div class="flex flex-wrap gap-1">
                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-700 rounded-full text-xs">Review
                                        Content</span>
                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-700 rounded-full text-xs">Manage
                                        Reports</span>
                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-700 rounded-full text-xs">User
                                        Communication</span>
                                </div>
                            </div>

                            <div class="p-3 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-medium">Support Agent</h4>
                                    <button class="p-1 text-gray-500 hover:text-primary"><i
                                            class="fas fa-edit"></i></button>
                                </div>
                                <p class="text-sm text-gray-500 mb-2">Handle user support requests and issues</p>
                                <div class="flex flex-wrap gap-1">
                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-700 rounded-full text-xs">View
                                        Users</span>
                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-700 rounded-full text-xs">Support
                                        Tickets</span>
                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-700 rounded-full text-xs">Basic
                                        Reports</span>
                                </div>
                            </div>

                            <div class="p-3 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-medium">Analytics Manager</h4>
                                    <button class="p-1 text-gray-500 hover:text-primary"><i
                                            class="fas fa-edit"></i></button>
                                </div>
                                <p class="text-sm text-gray-500 mb-2">Access to analytics and reporting tools</p>
                                <div class="flex flex-wrap gap-1">
                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-700 rounded-full text-xs">View
                                        Analytics</span>
                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-700 rounded-full text-xs">Generate
                                        Reports</span>
                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-700 rounded-full text-xs">Export
                                        Data</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button
                                class="w-full px-4 py-2 bg-secondary text-white rounded-lg hover:bg-secondary/90 transition-colors">
                                <i class="fas fa-plus mr-1"></i> Create New Role
                            </button>
                        </div>
                    </div>

                    <div class="settings-card gradient-border">
                        <div class="flex items-start justify-between mb-6">
                            <div>
                                <h3 class="text-xl font-semibold mb-1">Activity Log</h3>
                                <p class="text-gray-500">Recent admin actions</p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-info/10 flex items-center justify-center">
                                <i class="fas fa-history text-info"></i>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-primary/10 flex-shrink-0 flex items-center justify-center">
                                    <i class="fas fa-user-plus text-primary text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-sm"><span class="font-medium">John Doe</span> added new admin user
                                    </p>
                                    <p class="text-xs text-gray-500">Today, 10:45 AM</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-secondary/10 flex-shrink-0 flex items-center justify-center">
                                    <i class="fas fa-edit text-secondary text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-sm"><span class="font-medium">Jane Smith</span> updated platform
                                        settings</p>
                                    <p class="text-xs text-gray-500">Yesterday, 3:20 PM</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-warning/10 flex-shrink-0 flex items-center justify-center">
                                    <i class="fas fa-ban text-warning text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-sm"><span class="font-medium">Robert Johnson</span> suspended user
                                        account</p>
                                    <p class="text-xs text-gray-500">Yesterday, 11:15 AM</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-success/10 flex-shrink-0 flex items-center justify-center">
                                    <i class="fas fa-check text-success text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-sm"><span class="font-medium">Emily Davis</span> approved provider
                                        application</p>
                                    <p class="text-xs text-gray-500">Mar 15, 2023</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-gray-100">
                            <a href="#"
                                class="text-primary hover:underline text-sm flex items-center justify-center">
                                View Full Activity Log <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- System Settings -->
        <section id="system-settings" class="settings-section hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Payment Gateway Configuration -->
                <div class="settings-card gradient-border">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-1">Payment Gateways</h3>
                            <p class="text-gray-500">Configure payment processing options</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-success/10 flex items-center justify-center">
                            <i class="fas fa-credit-card text-success"></i>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Stripe -->
                        <div class="p-4 border border-gray-200 rounded-xl">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <i class="fab fa-stripe text-2xl text-blue-600 mr-3"></i>
                                    <h4 class="font-medium">Stripe</h4>
                                </div>
                                <label class="settings-toggle bg-gray-200 peer-checked:bg-primary">
                                    <input type="checkbox" class="sr-only peer" checked>
                                    <span class="settings-toggle-dot peer-checked:translate-x-5"></span>
                                </label>
                            </div>

                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">API Key</label>
                                    <div class="relative">
                                        <input type="password" value="sk_test_51HG7..." class="settings-input pr-10">
                                        <button class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Webhook Secret</label>
                                    <div class="relative">
                                        <input type="password" value="whsec_1234..." class="settings-input pr-10">
                                        <button class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-green-600 flex items-center">
                                        <i class="fas fa-check-circle mr-1"></i> Connected
                                    </span>
                                    <button
                                        class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
                                        Test Connection
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- PayPal -->
                        <div class="p-4 border border-gray-200 rounded-xl">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <i class="fab fa-paypal text-2xl text-blue-800 mr-3"></i>
                                    <h4 class="font-medium">PayPal</h4>
                                </div>
                                <label class="settings-toggle bg-gray-200 peer-checked:bg-primary">
                                    <input type="checkbox" class="sr-only peer">
                                    <span class="settings-toggle-dot peer-checked:translate-x-5"></span>
                                </label>
                            </div>

                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Client ID</label>
                                    <input type="text" placeholder="Enter PayPal client ID"
                                        class="settings-input">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Secret Key</label>
                                    <input type="password" placeholder="Enter PayPal secret key"
                                        class="settings-input">
                                </div>

                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-500 flex items-center">
                                        <i class="fas fa-circle mr-1"></i> Not Connected
                                    </span>
                                    <button
                                        class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
                                        Connect
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Apple Pay -->
                        <div class="p-4 border border-gray-200 rounded-xl">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <i class="fab fa-apple-pay text-2xl text-black mr-3"></i>
                                    <h4 class="font-medium">Apple Pay</h4>
                                </div>
                                <label class="settings-toggle bg-gray-200 peer-checked:bg-primary">
                                    <input type="checkbox" class="sr-only peer">
                                    <span class="settings-toggle-dot peer-checked:translate-x-5"></span>
                                </label>
                            </div>

                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Merchant ID</label>
                                    <input type="text" placeholder="Enter Apple Pay merchant ID"
                                        class="settings-input">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Certificate</label>
                                    <div class="flex items-center">
                                        <input type="file" class="hidden" id="appleCertificate">
                                        <label for="appleCertificate"
                                            class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm cursor-pointer">
                                            <i class="fas fa-upload mr-1"></i> Upload Certificate
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <button
                            class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                            Save Payment Settings
                        </button>
                    </div>
                </div>

                <!-- Email Configuration -->
                <div class="settings-card gradient-border">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-1">Email Configuration</h3>
                            <p class="text-gray-500">Configure email notifications and templates</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center">
                            <i class="fas fa-envelope text-secondary"></i>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Provider</label>
                            <select class="settings-input">
                                <option value="sendgrid">SendGrid</option>
                                <option value="mailchimp">Mailchimp</option>
                                <option value="ses">Amazon SES</option>
                                <option value="smtp">Custom SMTP</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">API Key</label>
                            <div class="relative">
                                <input type="password" value="SG.1234abcd..." class="settings-input pr-10">
                                <button class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">From Email</label>
                            <input type="email" value="noreply@quickhands.com" class="settings-input">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">From Name</label>
                            <input type="text" value="QuickHands Support" class="settings-input">
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label class="block text-sm font-medium text-gray-700">Email Templates</label>
                                <button class="text-sm text-primary hover:underline">Manage Templates</button>
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <h5 class="font-medium">Welcome Email</h5>
                                        <p class="text-xs text-gray-500">Sent when a new user registers</p>
                                    </div>
                                    <button class="p-1 text-gray-500 hover:text-primary"><i
                                            class="fas fa-edit"></i></button>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <h5 class="font-medium">Password Reset</h5>
                                        <p class="text-xs text-gray-500">Sent when a user requests password reset</p>
                                    </div>
                                    <button class="p-1 text-gray-500 hover:text-primary"><i
                                            class="fas fa-edit"></i></button>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <h5 class="font-medium">Booking Confirmation</h5>
                                        <p class="text-xs text-gray-500">Sent when a booking is confirmed</p>
                                    </div>
                                    <button class="p-1 text-gray-500 hover:text-primary"><i
                                            class="fas fa-edit"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <div class="flex items-center justify-between">
                            <button
                                class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                                Save Email Settings
                            </button>
                            <button
                                class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                Send Test Email
                            </button>
                        </div>
                    </div>
                </div>

                <!-- API Configuration -->
                <div class="settings-card gradient-border">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-1">API Configuration</h3>
                            <p class="text-gray-500">Manage API keys and integrations</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center">
                            <i class="fas fa-code text-accent"></i>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label class="block text-sm font-medium text-gray-700">API Keys</label>
                                <button class="text-sm text-primary hover:underline">Generate New Key</button>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <h5 class="font-medium">Production Key</h5>
                                        <div class="flex items-center">
                                            <span
                                                class="text-xs font-mono bg-gray-100 px-2 py-1 rounded">qh_prod_1234...5678</span>
                                            <button class="ml-2 text-gray-500 hover:text-primary"><i
                                                    class="far fa-copy"></i></button>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <span
                                            class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full mr-2">Active</span>
                                        <button class="p-1 text-gray-500 hover:text-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <h5 class="font-medium">Development Key</h5>
                                        <div class="flex items-center">
                                            <span
                                                class="text-xs font-mono bg-gray-100 px-2 py-1 rounded">qh_dev_5678...9012</span>
                                            <button class="ml-2 text-gray-500 hover:text-primary"><i
                                                    class="far fa-copy"></i></button>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <span
                                            class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full mr-2">Active</span>
                                        <button class="p-1 text-gray-500 hover:text-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label class="block text-sm font-medium text-gray-700">Webhooks</label>
                                <button class="text-sm text-primary hover:underline">Add Webhook</button>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <h5 class="font-medium">Booking Events</h5>
                                        <p class="text-xs text-gray-500">https://api.example.com/webhooks/bookings</p>
                                    </div>
                                    <div class="flex items-center">
                                        <button class="p-1 text-gray-500 hover:text-primary mr-1"><i
                                                class="fas fa-edit"></i></button>
                                        <button class="p-1 text-gray-500 hover:text-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <h5 class="font-medium">Payment Events</h5>
                                        <p class="text-xs text-gray-500">https://api.example.com/webhooks/payments</p>
                                    </div>
                                    <div class="flex items-center">
                                        <button class="p-1 text-gray-500 hover:text-primary mr-1"><i
                                                class="fas fa-edit"></i></button>
                                        <button class="p-1 text-gray-500 hover:text-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <div class="flex items-center justify-between">
                            <button
                                class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                                Save API Settings
                            </button>
                            <a href="#" class="text-primary hover:underline text-sm">View API Documentation</a>
                        </div>
                    </div>
                </div>

                <!-- Storage Configuration -->
                <div class="settings-card gradient-border">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-1">Storage Configuration</h3>
                            <p class="text-gray-500">Configure file storage and CDN settings</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-info/10 flex items-center justify-center">
                            <i class="fas fa-database text-info"></i>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Storage Provider</label>
                            <select class="settings-input">
                                <option value="s3">Amazon S3</option>
                                <option value="gcs">Google Cloud Storage</option>
                                <option value="azure">Azure Blob Storage</option>
                                <option value="local">Local Storage</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bucket Name</label>
                            <input type="text" value="quickhands-production" class="settings-input">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Region</label>
                            <input type="text" value="us-east-1" class="settings-input">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Access Key</label>
                            <div class="relative">
                                <input type="password" value="AKIA1234..." class="settings-input pr-10">
                                <button class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Secret Key</label>
                            <div class="relative">
                                <input type="password" value="abcd1234..." class="settings-input pr-10">
                                <button class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">CDN URL (optional)</label>
                            <input type="text" value="https://cdn.quickhands.com" class="settings-input">
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <div class="flex items-center justify-between">
                            <button
                                class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                                Save Storage Settings
                            </button>
                            <button
                                class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                Test Connection
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Notifications Settings -->
        <section id="notifications-settings" class="settings-section hidden">
            <!-- Notifications settings content -->
        </section>

        <!-- Security Settings -->
        <section id="security-settings" class="settings-section hidden">
            <!-- Security settings content -->
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
                    // Tab navigation
                    const tabButtons = document.querySelectorAll('.tab-button');
                    const settingsSections = document.querySelectorAll('.settings-section');

                    tabButtons.forEach(button => {
                        button.addEventListener('click', () => {
                            // Remove active class from all buttons
                            tabButtons.forEach(btn => btn() => {
                                // Remove active class from all buttons
                                tabButtons.forEach(btn => btn.classList.remove('active'));

                                // Add active class to clicked button
                                button.classList.add('active');

                                // Hide all sections
                                settingsSections.forEach(section => {
                                    section.classList.add('hidden');
                                    section.classList.remove('active');
                                });

                                // Show selected section
                                const tabId = button.dataset.tab;
                                const activeSection = document.getElementById(`${tabId}-settings`);
                                activeSection.classList.remove('hidden');
                                activeSection.classList.add('active');

                                // Animate section entrance
                                gsap.fromTo(activeSection, {
                                    opacity: 0,
                                    y: 20
                                }, {
                                    opacity: 1,
                                    y: 0,
                                    duration: 0.5,
                                    ease: "power2.out"
                                });
                            });
                        });

                        // Initialize first tab
                        document.querySelector('.tab-button.active').click();

                        // Fee sliders
                        const serviceFeeSlider = document.getElementById('serviceFeeSlider');
                        const serviceFeeValue = document.getElementById('serviceFeeValue');
                        const commissionSlider = document.getElementById('commissionSlider');
                        const commissionValue = document.getElementById('commissionValue');
                        const discountSlider = document.getElementById('discountSlider');
                        const discountValue = document.getElementById('discountValue');

                        if (serviceFeeSlider && serviceFeeValue) {
                            serviceFeeSlider.addEventListener('input', () => {
                                serviceFeeValue.textContent = serviceFeeSlider.value + '%';
                            });
                        }

                        if (commissionSlider && commissionValue) {
                            commissionSlider.addEventListener('input', () => {
                                commissionValue.textContent = commissionSlider.value + '%';
                            });
                        }

                        if (discountSlider && discountValue) {
                            discountSlider.addEventListener('input', () => {
                                discountValue.textContent = discountSlider.value + '%';
                            });
                        }

                        // Toggle switches
                        const toggles = document.querySelectorAll('.settings-toggle');
                        toggles.forEach(toggle => {
                            const input = toggle.querySelector('input');
                            const dot = toggle.querySelector('.settings-toggle-dot');

                            if (input && dot) {
                                if (input.checked) {
                                    toggle.classList.add('bg-primary');
                                    toggle.classList.remove('bg-gray-200');
                                    dot.classList.add('translate-x-5');
                                }

                                input.addEventListener('change', () => {
                                    if (input.checked) {
                                        toggle.classList.add('bg-primary');
                                        toggle.classList.remove('bg-gray-200');
                                        dot.classList.add('translate-x-5');
                                    } else {
                                        toggle.classList.remove('bg-primary');
                                        toggle.classList.add('bg-gray-200');
                                        dot.classList.remove('translate-x-5');
                                    }
                                });
                            }
                        });

                        // Animate cards on load
                        const settingsCards = document.querySelectorAll('.settings-card');
                        gsap.fromTo(settingsCards, {
                            opacity: 0,
                            y: 30
                        }, {
                            opacity: 1,
                            y: 0,
                            duration: 0.6,
                            stagger: 0.1,
                            ease: "power2.out"
                        });

                        // Floating animation for cards
                        settingsCards.forEach((card, index) => {
                            if (index % 3 === 0) {
                                card.classList.add('float');
                            } else if (index % 3 === 1) {
                                card.classList.add('float', 'float-delay-1');
                            } else {
                                card.classList.add('float', 'float-delay-2');
                            }
                        });
                    });
    </script>
</body>

</html>
