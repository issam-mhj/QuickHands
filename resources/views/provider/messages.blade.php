<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Messages</title>
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
                        'float': 'float 6s ease-in-out infinite',
                    }
                }
            }
        }
    </script>
    <style>
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

        .float-delay-3 {
            animation-delay: 3s;
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

        /* Pulse Animation */
        .pulse-dot {
            position: relative;
        }

        .pulse-dot::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: inherit;
            border-radius: inherit;
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(1.5);
            }
        }

        /* Glow Effect */
        .glow-on-hover {
            position: relative;
            z-index: 1;
        }

        .glow-on-hover::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.8) 0%, rgba(255, 255, 255, 0) 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
            border-radius: inherit;
        }

        .glow-on-hover:hover::after {
            opacity: 1;
        }

        /* Wave Animation */
        .wave-bg {
            position: relative;
            overflow: hidden;
        }

        .wave-bg::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 15%;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' opacity='.25' fill='white'%3E%3C/path%3E%3Cpath d='M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z' opacity='.5' fill='white'%3E%3C/path%3E%3Cpath d='M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z' fill='white'%3E%3C/path%3E%3C/svg%3E") no-repeat;
            background-size: cover;
            animation: wave 10s linear infinite;
        }

        @keyframes wave {
            0% {
                background-position-x: 0;
            }

            100% {
                background-position-x: 1200px;
            }
        }
    </style>
</head>

<body class="font-sans bg-gray-50 text-dark">
    <!-- Header (From Dashboard) -->
    <header class="bg-gradient-to-r from-primary/10 to-secondary/10 py-8 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-xl bg-white shadow-md flex items-center justify-center mr-4">
                            <i class="fas fa-hands-helping text-primary text-xl"></i>
                        </div>
                        <h1 class="font-display text-2xl font-bold">QuickHands</h1>
                    </div>
                    <p class="text-gray-600 mt-1">Messages</p>
                </div>

                <div class="mt-4 md:mt-0 flex items-center space-x-4">

                    <div class="relative">
                        <button
                            class="p-2 bg-white rounded-full shadow-sm text-gray-500 hover:text-primary transition-colors">
                            <i class="fas fa-envelope"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-primary rounded-full pulse-dot"></span>
                        </button>
                    </div>

                    <div class="flex items-center">
                        <img src="https://cdn.pixabay.com/photo/2017/06/09/23/22/avatar-2388584_1280.png" alt="Provider"
                            class="w-10 h-10 rounded-full border-2 border-white shadow-sm">
                        <div class="ml-3">
                            <p class="font-medium">{{ $user->name }}</p>
                            <p class="text-xs text-gray-500">Professional Handyman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation (From Dashboard) -->
    <nav class="sticky top-0 z-50 bg-white shadow-md py-4 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between overflow-x-auto hide-scrollbar">
                <div class="flex space-x-1 md:space-x-4">
                    <a href="/provider/dashboard"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-chart-line mr-2"></i> Dashboard
                    </a>
                    <a href="/provider/tasks"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-tasks mr-2"></i> Available Tasks
                    </a>
                    <a href="/provider/taskmanage"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-clipboard-list mr-2"></i> Task Management
                    </a>
                    <a href="/provider/reviews"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-star mr-2"></i> Reviews
                    </a>
                </div>

                <div class="hidden md:flex space-x-2">
                    <a href="/provider/profile"
                        class="px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors">
                        <i class="fas fa-user-circle mr-2"></i> Profile
                    </a>
                    <a href="/provider/help"
                        class="px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors">
                        <i class="fas fa-question-circle mr-2"></i> Help
                    </a>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit"
                            class="px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>

                <div class="md:hidden">
                    <button class="p-2 rounded-lg hover:bg-gray-100 text-gray-700">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 md:px-12 py-8">
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="font-display text-2xl font-bold text-slate-800">Messages</h1>
            <p class="text-slate-500 mt-1">Manage your conversations</p>
        </div>

        <!-- Chat Interface -->
        <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 mx-auto md:mx-10">
            <!-- Conversation List -->
            <div class="bg-white rounded-xl shadow-lg border border-slate-200 lg:col-span-1 overflow-hidden">

                <!-- Conversations -->
                <div class="overflow-y-auto max-h-[calc(100vh-250px)]">
                    <!-- Active Conversation -->
                    @foreach ($conversations as $conversation)
                        <div class="p-4 hover:bg-slate-50 border-b border-slate-100 cursor-pointer transition-colors">
                            <div class="flex items-start space-x-3">
                                <div class="relative">
                                    <div
                                        class="w-12 h-12 bg-purple-500 text-white rounded-full flex items-center justify-center font-medium">
                                        {{ $conversation->offer->provider->user->name[0] }}
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex justify-between">
                                        <h3 class="font-semibold text-slate-800 truncate">
                                            {{ $conversation->offer->provider->user->name }}</h3>
                                        <span class="text-xs text-gray-500">3h ago</span>
                                    </div>
                                    <form action="/user/message/{{ $conversation->id }}">
                                        @csrf
                                        <button type="submit"
                                            class="mt-2 px-4 py-1.5 bg-primary text-white rounded-lg text-sm hover:bg-primary/90 transition-colors">
                                            View Messages
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

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6 px-6 md:px-12 mt-10">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div class="mb-4 md:mb-0">
                    <p class="text-sm text-gray-500">© 2025 QuickHands. All rights reserved.</p>
                </div>

                <div class="flex space-x-4">
                    <a href="#" class="text-sm text-gray-500 hover:text-primary">Help Center</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-primary">Privacy Policy</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-primary">Terms of Service</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-primary">Contact Support</a>
                </div>
            </div>
        </div>
    </footer>

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
            const conversationItems = document.querySelectorAll('.p-4.hover\\:bg-slate-50');
            conversationItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all conversations
                    conversationItems.forEach(i => {
                        i.classList.remove('bg-blue-50');
                        i.classList.add('hover:bg-slate-50');
                    });

                    // Add active class to clicked conversation
                    this.classList.remove('hover:bg-slate-50');
                    this.classList.add('bg-blue-50', 'hover:bg-blue-50');
                });
            });
        });
    </script>
</body>

</html>
