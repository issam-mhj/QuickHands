<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Task Management</title>
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
                        'float': 'float 6s ease-in-out infinite',
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom Styles */
        .dashboard-card {
            @apply bg-white rounded-2xl p-6 shadow-lg transition-all duration-300 hover:shadow-xl border border-gray-100;
            transform-origin: center;
        }

        .dashboard-card:hover {
            @apply transform scale-[1.01];
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

        .task-card {
            @apply relative overflow-hidden rounded-2xl p-6 transition-all duration-300 bg-white border border-gray-100 shadow-sm hover:shadow-md;
        }

        .task-card:hover {
            @apply transform scale-[1.01];
        }

        .task-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
            z-index: 1;
        }

        .task-card .task-icon {
            @apply absolute right-4 bottom-4 text-4xl opacity-20;
            z-index: 0;
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

        /* Task Status Pills */
        .status-pill {
            @apply px-2 py-1 rounded-full text-xs font-medium;
        }

        .status-pill.pending {
            @apply bg-blue-100 text-blue-800;
        }

        .status-pill.in-progress {
            @apply bg-yellow-100 text-yellow-800;
        }

        .status-pill.completed {
            @apply bg-green-100 text-green-800;
        }

        .status-pill.cancelled {
            @apply bg-red-100 text-red-800;
        }

        .status-pill.disputed {
            @apply bg-purple-100 text-purple-800;
        }

        /* Modal */
        .modal-backdrop {
            @apply fixed inset-0 bg-black bg-opacity-50 z-40 flex items-center justify-center;
            backdrop-filter: blur(4px);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal-backdrop.show {
            opacity: 1;
        }

        .modal-content {
            @apply bg-white rounded-2xl shadow-xl w-full max-w-3xl max-h-[90vh] overflow-y-auto;
            transform: scale(0.9);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .modal-backdrop.show .modal-content {
            transform: scale(1);
            opacity: 1;
        }

        /* Tab Styles */
        .tab-button {
            @apply px-4 py-2 font-medium text-gray-500 border-b-2 border-transparent;
            transition: all 0.3s ease;
        }

        .tab-button:hover {
            @apply text-gray-800;
        }

        .tab-button.active {
            @apply text-primary border-primary;
        }

        /* Progress Bar */
        .progress-bar {
            @apply w-full h-2 bg-gray-200 rounded-full overflow-hidden;
        }

        .progress-bar-fill {
            @apply h-full rounded-full;
            transition: width 0.5s ease;
        }

        /* Timeline */
        .timeline {
            @apply relative pl-8;
        }

        .timeline-item {
            @apply relative pb-8;
        }

        .timeline-item:last-child {
            @apply pb-0;
        }

        .timeline-item::before {
            content: '';
            @apply absolute left-0 top-0 w-4 h-4 rounded-full bg-white border-2 border-primary transform -translate-x-1/2;
            z-index: 1;
        }

        .timeline-item::after {
            content: '';
            @apply absolute left-0 top-4 bottom-0 w-0.5 bg-gray-200 transform -translate-x-1/2;
        }

        .timeline-item:last-child::after {
            @apply hidden;
        }

        /* Custom Checkbox */
        .custom-checkbox {
            @apply relative flex items-center;
        }

        .custom-checkbox input[type="checkbox"] {
            @apply absolute opacity-0 w-0 h-0;
        }

        .custom-checkbox .checkmark {
            @apply w-5 h-5 rounded border border-gray-300 flex items-center justify-center;
            transition: all 0.2s ease;
        }

        .custom-checkbox input[type="checkbox"]:checked~.checkmark {
            @apply bg-primary border-primary;
        }

        .custom-checkbox .checkmark:after {
            content: '';
            @apply w-2 h-2 bg-white rounded-sm;
            opacity: 0;
            transform: scale(0);
            transition: all 0.2s ease;
        }

        .custom-checkbox input[type="checkbox"]:checked~.checkmark:after {
            opacity: 1;
            transform: scale(1);
        }
    </style>
</head>

<body class="font-sans bg-gray-50 text-dark">
    <!-- Header -->
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
                    <p class="text-gray-600 mt-1">Provider Dashboard</p>
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

    <!-- Navigation -->
    <nav class="sticky top-0 z-30 bg-white shadow-md py-4 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between overflow-x-auto hide-scrollbar">
                <div class="flex space-x-1 md:space-x-4">
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-chart-line mr-2"></i> Dashboard
                    </a>
                    <a href="/provider/task"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-tasks mr-2"></i> Available Tasks
                    </a>
                    <a href="/provider/taskmanage"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-clipboard-list mr-2"></i> Task Management
                    </a>
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg bg-primary text-white font-medium text-sm md:text-base">
                        <i class="fas fa-star mr-2"></i> Reviews
                    </a>
                </div>

                <div class="hidden md:flex space-x-2">
                    <a href="/provider/profile"
                        class="px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors">
                        <i class="fas fa-user-circle mr-2"></i> Profile
                    </a>
                    <a href="#"
                        class="px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors">
                        <i class="fas fa-question-circle mr-2"></i> Help
                    </a>
                </div>

                <div class="md:hidden">
                    <button class="p-2 rounded-lg hover:bg-gray-100 text-gray-700">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="main-content">
            <div class="page-header">
                <h1 class="page-title text-2xl font-bold text-dark mb-4">Reviews & Ratings</h1>
                <div class="breadcrumb text-sm text-gray-500 mb-6">
                    <a href="provider-dashboard.html" class="hover:text-primary">Dashboard</a>
                    <span class="mx-2">/</span>
                    <span>Reviews & Ratings</span>
                </div>
            </div>

            <div class="stats-grid grid grid-cols-1 md:grid-cols-3 gap-6 fade-in">
                <div class="stats-card bg-primary text-white p-6 rounded-lg shadow-md delay-1">
                    <div class="stats-label text-sm font-medium">Overall Rating</div>
                    <div class="stats-value text-3xl font-bold">{{ $ratingAvg }}</div>
                </div>
                <div class="stats-card bg-secondary text-white p-6 rounded-lg shadow-md delay-2">
                    <div class="stats-label text-sm font-medium">Total Reviews</div>
                    <div class="stats-value text-3xl font-bold">{{ $totalRv }}</div>
                </div>
                <div class="stats-card bg-success text-white p-6 rounded-lg shadow-md delay-3">
                    <div class="stats-label text-sm font-medium">5-Star Reviews</div>
                    <div class="stats-value text-3xl font-bold">{{ $fiveStar }}</div>
                </div>
            </div>
            <div class="card bg-white p-6 rounded-lg shadow-md fade-in delay-3">
                <div class="card-header flex justify-between items-center border-b pb-4 mb-4">
                    <h2 class="card-title text-xl font-semibold text-dark">User Reviews</h2>
                    <div class="card-actions">
                        <select class="select-control border border-gray-300 rounded-lg p-2 text-sm">
                            <option>All Reviews</option>
                            <option>5 Star</option>
                            <option>4 Star</option>
                            <option>3 Star</option>
                            <option>2 Star</option>
                            <option>1 Star</option>
                        </select>
                    </div>
                </div>
                <div class="review-list space-y-6">
                    @foreach ($userRVW as $review)
                        <div class="review-item bg-gray-50 p-4 rounded-lg shadow-sm">
                            <div class="review-header flex justify-between items-center mb-3">
                                <div class="reviewer-info flex items-center space-x-4">
                                    <div
                                        class="reviewer-avatar bg-primary text-white w-10 h-10 flex items-center justify-center rounded-full text-lg font-bold">
                                        {{ $review->offer->service->user->name[0] }}
                                    </div>
                                    <div>
                                        <div class="reviewer-name font-semibold text-dark">
                                            {{ $review->offer->service->user->name }}</div>
                                        <div class="review-date text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($review->created_at)->format('M d, Y') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="review-rating flex space-x-1">
                                    @for ($i = 0; $i < (int) $review->rating; $i++)
                                        <i class="fas fa-star text-yellow-500"></i>
                                    @endfor
                                </div>
                            </div>
                            <div class="review-task text-sm text-gray-600 mb-2">
                                Task: <span class="font-medium text-dark">{{ $review->offer->service->title }}</span>
                                <span
                                    class="badge bg-secondary text-white px-2 py-1 rounded-full text-xs ml-2">{{ $review->offer->service->servicecategory->name }}</span>
                            </div>
                            <div class="review-content text-gray-700 mb-3">
                                {{ $review->comment }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="pagination flex justify-center items-center space-x-2 mt-6">
                    <button
                        class="page-item bg-gray-200 text-gray-600 px-3 py-1 rounded-lg hover:bg-primary hover:text-white">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="page-item bg-primary text-white px-3 py-1 rounded-lg">1</button>
                    <button
                        class="page-item bg-gray-200 text-gray-600 px-3 py-1 rounded-lg hover:bg-primary hover:text-white">2</button>
                    <button
                        class="page-item bg-gray-200 text-gray-600 px-3 py-1 rounded-lg hover:bg-primary hover:text-white">3</button>
                    <span class="text-gray-500">...</span>
                    <button
                        class="page-item bg-gray-200 text-gray-600 px-3 py-1 rounded-lg hover:bg-primary hover:text-white">12</button>
                    <button
                        class="page-item bg-gray-200 text-gray-600 px-3 py-1 rounded-lg hover:bg-primary hover:text-white">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div class="mb-4 md:mb-0">
                    <p class="text-sm text-gray-500">© 2023 QuickHands. All rights reserved.</p>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Tab switching
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons
                    tabButtons.forEach(btn => btn.classList.remove('active'));

                    // Add active class to clicked button
                    button.classList.add('active');

                    // Hide all tab contents
                    tabContents.forEach(content => content.classList.add('hidden'));

                    // Show the selected tab content
                    const tabId = button.getAttribute('data-tab');
                    document.getElementById(tabId).classList.remove('hidden');
                });
            });

            // Animate elements on load
            const animateElements = () => {
                gsap.fromTo('.dashboard-card', {
                    opacity: 0,
                    y: 20
                }, {
                    opacity: 1,
                    y: 0,
                    duration: 0.5,
                    stagger: 0.1,
                    ease: "power2.out"
                });
            };

            // Run animations
            animateElements();
        });
    </script>
</body>

</html>
