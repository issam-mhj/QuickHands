<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - User Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#2563eb',
                            light: '#3b82f6',
                            dark: '#1d4ed8'
                        },
                        secondary: {
                            DEFAULT: '#10b981',
                            light: '#34d399',
                            dark: '#059669'
                        },
                        accent: {
                            DEFAULT: '#f97316',
                            light: '#fb923c'
                        },
                        success: '#10b981',
                        warning: '#f59e0b',
                        danger: '#ef4444',
                        info: '#0ea5e9'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.3s ease forwards',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(0.5rem)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans text-slate-800 bg-slate-100">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center h-[70px]">
            <div class="flex items-center">
                <a href="#" class="flex items-center text-2xl font-bold text-primary">
                    <i class="fas fa-hands-helping mr-2 text-[1.75rem]"></i>
                    <span>QuickHands</span>
                </a>
            </div>
            <div class="flex items-center gap-6">
                <button
                    class="relative bg-transparent border-none text-slate-500 text-xl cursor-pointer p-2 rounded-full transition hover:text-primary hover:bg-slate-100">
                    <i class="far fa-bell"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-accent text-white text-xs font-semibold w-5 h-5 rounded-full flex items-center justify-center">3</span>
                </button>
                <div class="flex items-center gap-3 cursor-pointer p-2 rounded-md transition hover:bg-slate-100">
                    <div class="text-right hidden sm:block">
                        <div class="font-semibold text-sm text-slate-800">{{ $user->name }}</div>
                    </div>
                    <div
                        class="w-10 h-10 rounded-full bg-primary-light flex items-center justify-center font-semibold text-white text-base">
                        {{ $user->name[0] }}
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white border-b border-slate-200 py-2">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <ul class="flex gap-1 hidden md:flex">
                <li><a href="#"
                        class="block px-4 py-3 text-primary bg-blue-50 rounded-md font-medium text-sm">Dashboard</a>
                </li>
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 rounded-md font-medium text-sm transition hover:text-primary hover:bg-slate-100">Post
                        a Task</a></li>
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 rounded-md font-medium text-sm transition hover:text-primary hover:bg-slate-100">Active
                        Tasks</a></li>
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 rounded-md font-medium text-sm transition hover:text-primary hover:bg-slate-100">Provider
                        Selection</a></li>
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 rounded-md font-medium text-sm transition hover:text-primary hover:bg-slate-100">Messages</a>
                </li>
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 rounded-md font-medium text-sm transition hover:text-primary hover:bg-slate-100">Payment
                        & Billing</a></li>
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 rounded-md font-medium text-sm transition hover:text-primary hover:bg-slate-100">Reviews</a>
                </li>
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 rounded-md font-medium text-sm transition hover:text-primary hover:bg-slate-100">Profile
                        & Settings</a></li>
            </ul>
            <button class="md:hidden text-slate-500 text-xl">
                <i class="fas fa-bars"></i>
            </button>
            <div>
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-2.5 rounded-md font-medium text-sm text-white bg-primary hover:bg-primary-dark transition transform hover:-translate-y-0.5 hover:shadow-md">
                    <i class="fas fa-plus mr-2 text-sm"></i>
                    Post New Task
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-8">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Dashboard Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold mb-2 text-slate-800">Welcome back, {{ $user->name }}!</h1>
                <p class="text-base text-slate-500">Here's what's happening with your tasks today</p>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Active Tasks -->
                <div class="bg-white rounded-lg p-6 shadow-md border border-slate-200 transition hover:-translate-y-1 hover:shadow-lg hover:border-primary-light relative overflow-hidden animate-fade-in"
                    style="animation-delay: 0.1s">
                    <div class="flex justify-between items-start mb-4">
                        <div class="text-sm text-slate-500 mb-2">Active Tasks</div>
                        <div
                            class="w-10 h-10 rounded-md flex items-center justify-center text-xl text-white bg-primary-light">
                            <i class="fas fa-tasks"></i>
                        </div>
                    </div>
                    <div class="text-3xl font-bold mb-2 text-slate-800">{{ $usertasksNum }}</div>
                </div>

                <!-- Total Spending -->
                <div class="bg-white rounded-lg p-6 shadow-md border border-slate-200 transition hover:-translate-y-1 hover:shadow-lg hover:border-primary-light relative overflow-hidden animate-fade-in"
                    style="animation-delay: 0.2s">
                    <div class="flex justify-between items-start mb-4">
                        <div class="text-sm text-slate-500 mb-2">Total Spending</div>
                        <div
                            class="w-10 h-10 rounded-md flex items-center justify-center text-xl text-white bg-secondary">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                    <div class="text-3xl font-bold mb-2 text-slate-800">${{ $totalspent }}</div>
                </div>
            </div>

            <!-- Recent Providers -->
            <div class="bg-white rounded-lg shadow-md border border-slate-200 mb-8 overflow-hidden">
                <div class="flex justify-between items-center px-6 py-5 border-b border-slate-200">
                    <h2 class="text-base font-semibold text-slate-800 flex items-center">
                        <i class="fas fa-user-check mr-2 text-primary"></i>
                        Last providers I worked with
                    </h2>
                    <a href="#"
                        class="text-sm font-medium text-primary transition hover:text-primary-dark flex items-center">
                        View All
                        <i class="fas fa-chevron-right ml-1 text-xs"></i>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-6">
                    @foreach ($usertasks as $task)
                        <div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden transition hover:-translate-y-1 hover:shadow-md hover:border-primary-light animate-fade-in"
                            style="animation-delay: 0.{{ $loop->index + 9 }}s">
                            <div class="h-16 relative bg-gradient-to-r from-primary-light to-secondary-light"></div>
                            <div class="relative pt-8 px-5 pb-5">
                                <div
                                    class="absolute -top-6 left-5 w-12 h-12 rounded-full bg-white flex items-center justify-center text-xl text-primary shadow-sm border-2 border-white overflow-hidden">
                                    {{ $task->offer->provider->user->name[0] }}
                                </div>
                                <h3 class="font-semibold text-base mb-1 text-slate-800">
                                    {{ $task->offer->provider->user->name }}</h3>
                                <div class="text-sm text-slate-500 mb-3">{{ $task->offer->service->title }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</body>

</html>
