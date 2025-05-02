<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Profile & Settings</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#2563eb',
                            light: '#3b82f6',
                            dark: '#1d4ed8',
                        },
                        secondary: {
                            DEFAULT: '#10b981',
                            light: '#34d399',
                            dark: '#059669',
                        },
                        accent: {
                            DEFAULT: '#f97316',
                            light: '#fb923c',
                        },
                        success: '#10b981',
                        warning: '#f59e0b',
                        danger: '#ef4444',
                        info: '#0ea5e9',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    boxShadow: {
                        card: '0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03)',
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease forwards;
        }

        .toggle-password:focus {
            outline: none;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="#" class="flex items-center text-primary font-bold text-xl">
                    <i class="fas fa-hands-helping mr-2 text-2xl"></i>
                    <span>QuickHands</span>
                </a>
            </div>
            <div class="flex items-center space-x-4">
                <button
                    class="relative p-2 text-slate-500 hover:text-primary hover:bg-slate-100 rounded-full transition-colors">
                    <i class="far fa-bell text-lg"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-accent text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">3</span>
                </button>
                <div
                    class="flex items-center space-x-3 pl-2 py-1 pr-1 rounded-lg hover:bg-slate-100 transition-colors cursor-pointer">
                    <div class="text-right hidden sm:block">
                        <div class="font-semibold text-sm">{{ $user->name }}</div>
                        <div class="text-xs text-slate-500"> Member</div>
                    </div>
                    <div
                        class="w-9 h-9 bg-primary-light text-white rounded-full flex items-center justify-center font-medium">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white border-b border-slate-200">
        <div class="container mx-auto px-4">
            <div class="overflow-x-auto flex whitespace-nowrap py-1 -mx-2">
                <a href="#"
                    class="px-3 py-2 text-sm font-medium text-slate-500 hover:text-primary hover:bg-slate-50 rounded-md mx-1 transition-colors">Dashboard</a>
                <a href="#"
                    class="px-3 py-2 text-sm font-medium text-slate-500 hover:text-primary hover:bg-slate-50 rounded-md mx-1 transition-colors">Post
                    a Task</a>
                <a href="#"
                    class="px-3 py-2 text-sm font-medium text-slate-500 hover:text-primary hover:bg-slate-50 rounded-md mx-1 transition-colors">Active
                    Tasks</a>
                <a href="#"
                    class="px-3 py-2 text-sm font-medium text-slate-500 hover:text-primary hover:bg-slate-50 rounded-md mx-1 transition-colors">Provider
                    Selection</a>
                <a href="#"
                    class="px-3 py-2 text-sm font-medium text-slate-500 hover:text-primary hover:bg-slate-50 rounded-md mx-1 transition-colors">Messages</a>
                <a href="#"
                    class="px-3 py-2 text-sm font-medium text-slate-500 hover:text-primary hover:bg-slate-50 rounded-md mx-1 transition-colors">Payment
                    & Billing</a>
                <a href="#"
                    class="px-3 py-2 text-sm font-medium text-slate-500 hover:text-primary hover:bg-slate-50 rounded-md mx-1 transition-colors">Reviews</a>
                <a href="#"
                    class="px-3 py-2 text-sm font-medium text-primary bg-blue-50 rounded-md mx-1 transition-colors">Profile
                    & Settings</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-slate-800">Profile & Settings</h1>
            <p class="text-slate-500 mt-1">Manage your account information and preferences</p>
        </div>

        <!-- Settings Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Profile Summary Card -->
            <div class="bg-white rounded-xl shadow-card border border-slate-200 p-6 lg:col-span-1 h-fit">
                <div class="flex flex-col items-center justify-center pb-6 border-b border-slate-100">
                    <div
                        class="w-24 h-24 bg-primary-light rounded-full flex items-center justify-center text-white text-xl font-bold">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <div class="mt-4 flex items-center space-x-2">
                        <h3 class="text-xl font-semibold">{{ $user->name }}</h3>
                        <span
                            class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs font-medium">Active</span>
                    </div>
                    <p class="text-slate-500 mt-1">Member since {{ $user->created_at->format('M Y') }} </p>
                </div>
                <div class="pt-6">
                    <h4 class="font-medium mb-4">Account Summary</h4>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-slate-500">Account Status</span>
                            <span
                                class="text-green-600 font-medium">{{ $user->is_suspended == 1 ? 'inactive' : 'Active' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Role</span>
                            <span class="font-medium">Premium Member</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Last profile update</span>
                            <span
                                class="font-medium">{{ \Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Edit Form -->
            <div class="bg-white rounded-xl shadow-card border border-slate-200 p-6 lg:col-span-3">
                <!-- Settings Tabs -->
                <div class="border-b border-slate-200 pb-4 mb-6">
                    <div class="flex space-x-6">
                        <button class="text-primary border-b-2 border-primary pb-4 -mb-4 font-medium text-sm">Personal
                            Information</button>
                    </div>
                </div>

                <!-- Personal Information Form -->
                <form action="/edit/user/{{ $user->id }}" method="POST" class="animate-fade-in">
                    @csrf
                    <!-- Personal Information Section -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4">Personal Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label for="full_name" class="block mb-1 text-sm font-medium text-slate-700">Full
                                    Name</label>
                                <input type="text" id="full_name" name="name" value="{{ $user->name }}" required
                                    class="w-full px-3 py-2 border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all text-sm">
                            </div>
                            <div class="form-group">
                                <label for="email" class="block mb-1 text-sm font-medium text-slate-700">Email
                                    Address</label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}" required
                                    class="w-full px-3 py-2 border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all text-sm">
                            </div>
                            <div class="form-group">
                                <label for="age" class="block mb-1 text-sm font-medium text-slate-700">Age</label>
                                <input type="number" id="age" name="age" value="{{ $user->age }}"
                                    min="18" max="120"
                                    class="w-full px-3 py-2 border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all text-sm">
                                <p class="text-xs text-slate-500 mt-1">Must be 18 or older</p>
                            </div>
                            <div class="form-group">
                                <label for="gender"
                                    class="block mb-1 text-sm font-medium text-slate-700">Gender</label>
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
                        <h3 class="text-lg font-semibold mb-4">Location</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label for="address"
                                    class="block mb-1 text-sm font-medium text-slate-700">Address</label>
                                <input type="text" id="address" name="location" value="{{ $user->location }}"
                                    class="w-full px-3 py-2 border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all text-sm">
                            </div>
                        </div>
                    </div>

                    <!-- Security Section - Change Password -->
                    <div class="border-t border-slate-200 pt-8 mb-8">
                        <h3 class="text-lg font-semibold mb-4">Change Password</h3>
                        <div class="bg-slate-50 p-6 rounded-lg border border-slate-200">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="form-group">
                                    <label for="current_password"
                                        class="block mb-1 text-sm font-medium text-slate-700">Current Password</label>
                                    <div class="relative">
                                        <input type="password" id="current_password" name="current_password"
                                            class="w-full pl-3 pr-10 py-2 border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all text-sm">
                                        <button type="button"
                                            class="toggle-password absolute inset-y-0 right-0 pr-3 flex items-center text-slate-500"
                                            data-target="current_password">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_password"
                                        class="block mb-1 text-sm font-medium text-slate-700">New Password</label>
                                    <div class="relative">
                                        <input type="password" id="new_password" name="new_password"
                                            class="w-full pl-3 pr-10 py-2 border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all text-sm">
                                        <button type="button"
                                            class="toggle-password absolute inset-y-0 right-0 pr-3 flex items-center text-slate-500"
                                            data-target="new_password">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password"
                                        class="block mb-1 text-sm font-medium text-slate-700">Confirm New
                                        Password</label>
                                    <div class="relative">
                                        <input type="password" id="confirm_password" name="confirm_password"
                                            class="w-full pl-3 pr-10 py-2 border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all text-sm">
                                        <button type="button"
                                            class="toggle-password absolute inset-y-0 right-0 pr-3 flex items-center text-slate-500"
                                            data-target="confirm_password">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 p-4 bg-blue-50 rounded-lg">
                                <h5 class="text-sm font-medium text-slate-700 mb-2">Password Requirements:</h5>
                                <ul class="space-y-1 text-xs text-slate-600">
                                    <li class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-primary"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        At least 8 characters long
                                    </li>
                                    <li class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-primary"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        Include at least one uppercase letter
                                    </li>
                                    <li class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-primary"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        Include at least one number
                                    </li>
                                    <li class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-primary"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        Include at least one special character
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Form Buttons -->
                    <div class="flex justify-end space-x-4 mt-8 border-t border-slate-200 pt-6">
                        <button type="button"
                            class="px-4 py-2 border border-slate-300 rounded-lg text-slate-700 hover:bg-slate-50 font-medium text-sm transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-primary hover:bg-primary-dark text-white rounded-lg font-medium text-sm transition-colors">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        // Password visibility toggle
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.toggle-password');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const targetInput = document.getElementById(targetId);
                    const icon = this.querySelector('i');

                    if (targetInput.type === 'password') {
                        targetInput.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        targetInput.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            });
        });
    </script>
</body>

</html>
