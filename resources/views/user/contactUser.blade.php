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
    </style>
</head>

<body class="bg-slate-50 text-slate-800">
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
                        <div class="text-xs text-slate-500">Premium Member</div>
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
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-slate-100">Provider
                        Selection</a></li>
                <li><a href="/user/conversation"
                        class="block px-4 py-3 text-primary no-underline font-medium text-sm rounded-md bg-blue-50">Messages</a>
                </li>
                <li><a href="#"
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
    <main class="container mx-auto px-4 py-6">
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-800">Messages</h1>
            <p class="text-slate-500 mt-1">Manage your conversations</p>
        </div>

        <!-- Chat Interface -->
        <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
            <!-- Conversation List -->
            <div class="bg-white rounded-xl shadow-card border border-slate-200 lg:col-span-1 overflow-hidden">


                <div class="p-4 border-b border-slate-200 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-10 h-10 bg-purple-500 text-white rounded-full flex items-center justify-center font-medium">
                            {{ $messages[0]->conversation->offer->provider->user->name[0] }}
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-800">
                                {{ $messages[0]->conversation->offer->provider->user->name }} </h3>
                        </div>
                    </div>
                </div>

                <!-- Chat Messages -->
                <div class="flex-1 overflow-y-auto p-4 bg-slate-50 space-y-4">
                    @foreach ($messages as $msg)
                        @if ($msg->user_id == $user->id)
                            <div class="flex items-start justify-end space-x-2 max-w-[75%] ml-auto">
                                <div>
                                    <div class="bg-primary text-white p-3 rounded-lg rounded-tr-none shadow-sm">
                                        <p>{{ $msg->content }}</p>
                                    </div>
                                    <div class="flex items-center justify-end text-xs text-slate-500 mt-1 mr-2">
                                        <span>{{ $msg->created_at }}</span>
                                        <i class="fas fa-check-double ml-1 text-primary"></i>
                                    </div>
                                </div>
                                <div
                                    class="w-8 h-8 bg-primary-light text-white rounded-full flex items-center justify-center text-xs">
                                    {{ $user->name[0] }}
                                </div>
                            </div>
                        @else
                            <!-- Message - Other Person -->
                            <div class="flex items-start space-x-2 max-w-[75%]">
                                <div
                                    class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center text-xs">
                                    {{ $msg->conversation->offer->provider->user->name[0] }}
                                </div>
                                <div>
                                    <div class="bg-white p-3 rounded-lg rounded-tl-none shadow-sm">
                                        <div class="text-xs text-green-600 font-medium mb-1">
                                            {{ $msg->conversation->offer->provider->user->name }} </div>
                                        <p>{{ $msg->content }}</p>
                                    </div>
                                    <div class="text-xs text-slate-500 mt-1 ml-2">{{ $msg->created_at }}</div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Chat Input -->
                <div class="p-6 border-t border-slate-200 bg-white">
                    <form action="/message/store/{{ $messages[0]->conversation->id }}" method="POST"
                        class="flex items-end space-x-3">
                        @csrf
                        <div class="flex-1 relative">
                            <textarea rows="1" placeholder="Type a message..." name="content"
                                class="w-full pl-5 pr-14 py-4 border border-slate-300 rounded-xl shadow focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all text-sm resize-none"></textarea>
                            <div class="absolute right-3 bottom-3 flex space-x-2 text-gray-400">
                                <button type="button" class="hover:text-blue-500 transition-colors">
                                    <i class="fas fa-paperclip"></i>
                                </button>
                                <button type="button" class="hover:text-blue-500 transition-colors">
                                    <i class="fas fa-smile"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit"
                            class="p-4 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow transition-colors flex items-center justify-center">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
    </main>

    <script>
        // Placeholder for actual functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-expand textarea as user types
            const textarea = document.querySelector('textarea');
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

            // Make conversation items clickable
            const conversationItems = document.querySelectorAll(
                '.p-3.hover\\:bg-slate-50, .p-3.hover\\:bg-blue-50');
            conversationItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all conversations
                    conversationItems.forEach(i => {
                        i.classList.remove('bg-blue-50', 'border-l-4', 'border-primary');
                        i.classList.add('hover:bg-slate-50', 'border-b',
                            'border-slate-100');
                    });

                    // Add active class to clicked conversation
                    this.classList.remove('hover:bg-slate-50', 'border-b', 'border-slate-100');
                    this.classList.add('bg-blue-50', 'border-l-4', 'border-primary',
                        'hover:bg-blue-50');
                });
            });
        });
    </script>
</body>

</html>
