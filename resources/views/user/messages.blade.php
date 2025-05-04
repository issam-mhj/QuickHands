<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Messages</title>
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
                        card: '0 4px 12px -2px rgba(0, 0, 0, 0.08), 0 2px 6px -1px rgba(0, 0, 0, 0.06)',
                        inner: 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.05)',
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 8px;
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

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .animate-pulse-slow {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Glass morphism effect */
        .glassmorphism {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-50 to-blue-50 text-slate-800 min-h-screen">
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
                        class="absolute -top-0 -right-0 bg-accent text-white text-xs font-semibold w-5 h-5 rounded-full flex items-center justify-center">3</span>
                </button>
                <div class="flex items-center gap-3 cursor-pointer p-2 rounded-md transition hover:bg-slate-100">
                    <div class="text-right">
                        <div class="font-semibold text-sm text-slate-800"> {{ $user->name }} </div>
                    </div>
                    <div
                        class="w-10 h-10 rounded-full bg-primary-light flex items-center justify-center font-semibold text-white">
                        AJ</div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white border-b border-slate-200 py-2">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <ul class="flex gap-1">
                <li><a href="/user/dashboard"
                        class="block px-4 py-3 text-slate-500 no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-slate-100">Dashboard</a>
                </li>
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-slate-100">Post
                        a Task</a></li>
                <li><a href="/user/activetask"
                        class="block px-4 py-3 text-slate-500 no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-slate-100">Active
                        Tasks</a></li>
                <li><a href="/user/selectprovider"
                        class="block px-4 py-3 text-slate-500 no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-slate-100">Provider
                        Selection</a></li>
                <li><a href="#"
                        class="block px-4 py-3 text-primary no-underline font-medium text-sm rounded-md bg-blue-50">Messages</a>
                </li>
                <li><a href="/user/reviews"
                        class="block px-4 py-3 text-slate-500 no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-slate-100">Reviews</a>
                </li>
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-slate-100">Profile
                        & Settings</a></li>
            </ul>
            <div class="flex items-center gap-4">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 text-slate-500 hover:text-danger transition">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <!-- Page Header -->
        <div class="mb-8 animate-fade-in">
            <div>
                <div class="ml-[125px]">
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center">
                        <i class="fas fa-comments text-primary-light mr-3"></i>
                        Messages
                    </h1>
                    <p class="text-slate-500 mt-1.5 ml-1">Connect with your service providers</p>
                </div>
            </div>
        </div>

        <!-- Chat Interface -->
        <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 mx-auto max-w-4xl animate-fade-in">
            <!-- Conversation List -->
            <div class="bg-white rounded-2xl shadow-card border border-slate-200/60 lg:col-span-1 overflow-hidden">
                <div class="border-b border-slate-100 px-6 py-4 flex justify-between items-center bg-slate-50/50">
                    <h2 class="font-medium text-slate-700 flex items-center">
                        <i class="fas fa-user-friends text-primary-light mr-2"></i>
                        My Conversations
                    </h2>
                    <div class="flex space-x-2">
                        <button
                            class="text-sm text-slate-500 hover:text-primary flex items-center px-3 py-1.5 rounded-md hover:bg-slate-100 transition-colors">
                            <i class="fas fa-filter mr-1.5"></i> Filter
                        </button>
                        <button
                            class="text-sm text-slate-500 hover:text-primary flex items-center px-3 py-1.5 rounded-md hover:bg-slate-100 transition-colors">
                            <i class="fas fa-sort mr-1.5"></i> Sort
                        </button>
                    </div>
                </div>

                <!-- Conversations -->
                <div class="overflow-y-auto max-h-[calc(100vh-250px)]">
                    <!-- Active Conversation -->
                    @foreach ($conversations as $conversation)
                        <div
                            class="p-4 hover:bg-blue-50/70 bg-blue-50/80 border-l-4 border-primary cursor-pointer transition-all duration-200 ease-in-out">
                            <div class="flex items-start space-x-4">
                                <div class="relative">
                                    <div
                                        class="w-14 h-14 bg-gradient-to-br from-purple-500 to-indigo-600 text-white rounded-full flex items-center justify-center font-medium shadow-md">
                                        {{ $conversation->offer->provider->user->name[0] }}
                                    </div>
                                    <div
                                        class="absolute bottom-0 right-0 w-4 h-4 bg-green-500 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex justify-between items-center">
                                        <h3 class="font-semibold text-slate-800 truncate text-base">
                                            {{ $conversation->offer->provider->user->name }}</h3>
                                        <span class="text-xs text-slate-500 whitespace-nowrap">2h ago</span>
                                    </div>
                                    <p class="text-slate-500 text-sm mt-1 truncate">Last message preview would go
                                        here...</p>
                                    <form action="/message/{{ $conversation->id }}" class="mt-3">
                                        @csrf
                                        <button type="submit"
                                            class="w-full py-2 px-4 bg-primary hover:bg-primary-dark text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow flex items-center justify-center">
                                            <i class="fas fa-comment-dots mr-2"></i> View Conversation
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

    <script>
        // Placeholder for actual functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-expand textarea as user types
            const textarea = document.querySelector('textarea');
            if (textarea) {
                textarea.addEventListener('input', function() {
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight) + 'px';
                    // Cap at certain height
                    if (this.scrollHeight > 150) {
                        this.style.height = '150px';
                        this.style.overflowY = 'auto';
                    } else {
                        this.style.overflowY = 'hidden';
                    }
                });
            }

            // Make conversation items clickable
            const conversationItems = document.querySelectorAll(
                '.p-4.hover\\:bg-blue-50\\/70, .p-4.hover\\:bg-blue-50\\/70');
            conversationItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all conversations
                    conversationItems.forEach(i => {
                        i.classList.remove('bg-blue-50/80', 'border-l-4', 'border-primary');
                        i.classList.add('hover:bg-slate-50/70', 'border-b',
                            'border-slate-100');
                    });

                    // Add active class to clicked conversation
                    this.classList.remove('hover:bg-slate-50/70', 'border-b', 'border-slate-100');
                    this.classList.add('bg-blue-50/80', 'border-l-4', 'border-primary',
                        'hover:bg-blue-50/70');
                });
            });
        });
    </script>
</body>

</html>
