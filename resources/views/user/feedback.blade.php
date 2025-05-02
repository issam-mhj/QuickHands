<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Reviews & Feedback</title>
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
                        text: {
                            dark: '#1e293b',
                            medium: '#64748b',
                            light: '#94a3b8',
                        },
                        border: '#e2e8f0',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                },
            },
        };
    </script>
    <style>
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

        .animate-fadeIn {
            animation: fadeIn 0.3s ease forwards;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans text-text-dark">
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
                    class="relative bg-transparent border-none text-text-medium text-xl cursor-pointer p-2 rounded-full transition hover:text-primary hover:bg-gray-100">
                    <i class="far fa-bell"></i>
                    <span
                        class="absolute top-0 right-0 bg-accent text-white text-xs font-semibold w-5 h-5 rounded-full flex items-center justify-center">3</span>
                </button>
                <div class="flex items-center gap-3 cursor-pointer p-2 rounded-md transition hover:bg-gray-100">
                    <div class="text-right">
                        <div class="font-semibold text-sm"> {{ $user->name }} </div>
                        <div class="text-xs text-text-medium">Premium Member</div>
                    </div>
                    <div
                        class="w-10 h-10 rounded-full bg-primary-light flex items-center justify-center font-semibold text-white">
                        {{ substr($user->name, 0, 2) }}
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white border-b border-border py-2">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <ul class="flex gap-1">
                <li><a href="#"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-gray-100">Dashboard</a>
                </li>
                <li><a href="#"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-gray-100">Post
                        a Task</a></li>
                <li><a href="#"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-gray-100">Active
                        Tasks</a></li>
                <li><a href="#"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-gray-100">Provider
                        Selection</a></li>
                <li><a href="#"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-gray-100">Messages</a>
                </li>
                <li><a href="#"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-gray-100">Payment
                        & Billing</a></li>
                <li><a href="#"
                        class="block px-4 py-3 text-primary no-underline font-medium text-sm rounded-md bg-blue-50">Reviews</a>
                </li>
                <li><a href="#"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-gray-100">Profile
                        & Settings</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-8">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold mb-2">Reviews & Feedback</h1>
                <p class="text-text-medium">Rate providers and view your review history</p>
            </div>

            <!-- Completed Tasks without Reviews Section -->
            <div
                class="bg-white rounded-lg shadow-md border border-border overflow-hidden mb-8 opacity-0 animate-[fadeIn_0.3s_ease_forwards_0.1s]">
                <div class="flex items-center justify-between p-5 border-b border-border">
                    <h2 class="text-base font-semibold flex items-center">
                        <i class="fas fa-clipboard-check text-primary mr-2"></i>
                        Completed Tasks without Reviews
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Task Card with Rating Form -->
                        @foreach ($offerswithoutRv as $task)
                            <div class="bg-white rounded-lg border border-border overflow-hidden">
                                <div class="p-5 border-b border-border flex justify-between items-center">
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <div class="font-semibold text-sm">{{ $task->provider->user->name }}</div>
                                            <div class="text-xs text-text-medium"> {{ $task->service->title }} </div>
                                        </div>
                                    </div>
                                    <div class="text-xs text-text-medium"> {{ $task->updated_at }} </div>
                                </div>
                                <div class="p-5">
                                    <form action="/review/store/{{ $task->id }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <label class="block font-semibold text-sm mb-2">Overall Rating</label>
                                            <div class="flex gap-1" id="overallRating">
                                                <input type="radio" id="star5" name="overall" value="5"
                                                    class="hidden">
                                                <label for="star5"
                                                    class="text-2xl cursor-pointer text-gray-300 hover:text-yellow-400">★</label>

                                                <input type="radio" id="star4" name="overall" value="4"
                                                    class="hidden">
                                                <label for="star4"
                                                    class="text-2xl cursor-pointer text-gray-300 hover:text-yellow-400">★</label>

                                                <input type="radio" id="star3" name="overall" value="3"
                                                    class="hidden">
                                                <label for="star3"
                                                    class="text-2xl cursor-pointer text-gray-300 hover:text-yellow-400">★</label>

                                                <input type="radio" id="star2" name="overall" value="2"
                                                    class="hidden">
                                                <label for="star2"
                                                    class="text-2xl cursor-pointer text-gray-300 hover:text-yellow-400">★</label>

                                                <input type="radio" id="star1" name="overall" value="1"
                                                    class="hidden">
                                                <label for="star1"
                                                    class="text-2xl cursor-pointer text-gray-300 hover:text-yellow-400">★</label>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="reviewComments" class="block font-semibold text-sm mb-2">Your
                                                Comments</label>
                                            <textarea id="reviewComments" rows="4" name="review"
                                                class="w-full p-3 border border-border rounded-md text-sm transition focus:outline-none focus:border-primary-light focus:ring-1 focus:ring-primary-light"
                                                placeholder="Share your experience with this provider..."></textarea>
                                        </div>
                                        <div class="flex justify-end gap-4">
                                            <button type="submit"
                                                class="inline-flex items-center justify-center px-6 py-3 rounded-md font-medium text-sm transition bg-primary text-white hover:bg-primary-dark">
                                                <i class="far fa-paper-plane mr-2"></i>
                                                Submit Review
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Make all content visible
            document.body.style.display = 'block';

            // Initialize star rating functionality
            const stars = document.querySelectorAll('[id^="star"]');
            stars.forEach(star => {
                star.nextElementSibling.addEventListener('click', function() {
                    const value = star.value;
                    const labels = document.querySelectorAll('[for^="star"]');
                    labels.forEach(label => {
                        if (parseInt(label.getAttribute('for').replace('star', '')) <=
                            value) {
                            label.classList.add('text-yellow-400');
                            label.classList.remove('text-gray-300');
                        } else {
                            label.classList.add('text-gray-300');
                            label.classList.remove('text-yellow-400');
                        }
                    });
                });
            });

            // Add animation classes to sections
            const sections = document.querySelectorAll('.opacity-0');
            sections.forEach((section, index) => {
                section.classList.add('animate-fadeIn');
                section.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>

</html>
