<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Active Tasks</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        'primary-light': '#3b82f6',
                        'primary-dark': '#1d4ed8',
                        secondary: '#10b981',
                        'secondary-light': '#34d399',
                        'secondary-dark': '#059669',
                        accent: '#f97316',
                        'accent-light': '#fb923c',
                        'text-dark': '#1e293b',
                        'text-medium': '#64748b',
                        'text-light': '#94a3b8',
                        white: '#ffffff',
                        'off-white': '#f8fafc',
                        'light-bg': '#f1f5f9',
                        border: '#e2e8f0',
                        success: '#10b981',
                        warning: '#f59e0b',
                        danger: '#ef4444',
                        info: '#0ea5e9',
                    },
                    boxShadow: {
                        'shadow-sm': '0 1px 2px rgba(0, 0, 0, 0.04)',
                        'shadow-md': '0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03)',
                        'shadow-lg': '0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.03)',
                    },
                    borderRadius: {
                        'radius-sm': '0.25rem',
                        'radius-md': '0.5rem',
                        'radius-lg': '0.75rem',
                        'radius-xl': '1rem',
                    },
                    transitionProperty: {
                        'transition': 'all 0.2s ease',
                    }
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                }
            }
        }
    </script>
</head>

<body class="bg-light-bg font-sans text-text-dark">
    <!-- Header -->
    <header class="bg-white sticky top-0 z-50 shadow-md">
        <div class="container max-w-7xl mx-auto px-6 flex justify-between items-center h-[70px]">
            <div class="flex items-center">
                <a href="#" class="flex items-center text-2xl font-bold text-primary no-underline">
                    <i class="fas fa-hands-helping mr-2 text-3xl"></i>
                    <span>QuickHands</span>
                </a>
            </div>
            <div class="flex items-center gap-6">
                <button
                    class="relative bg-transparent border-none text-text-medium text-xl cursor-pointer p-2 rounded-full transition-all hover:text-primary hover:bg-light-bg">
                    <i class="far fa-bell"></i>
                    <span
                        class="absolute top-0 right-0 bg-accent text-white text-xs font-semibold w-5 h-5 rounded-full flex items-center justify-center">3</span>
                </button>
                <div class="flex items-center gap-3 cursor-pointer p-2 rounded-md transition-all hover:bg-light-bg">
                    <div class="text-right">
                        <div class="font-semibold text-sm text-text-dark"> {{ $user->name }} </div>
                        <div class="text-xs text-text-medium">Premium Member</div>
                    </div>
                    <div
                        class="w-10 h-10 rounded-full bg-primary-light flex items-center justify-center font-semibold text-white text-base">
                        AJ
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white border-b border-border py-2">
        <div class="container max-w-7xl mx-auto px-6 flex justify-between items-center">
            <ul class="flex gap-1 list-none">
                <li class="relative">
                    <a href="#"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition-all hover:text-primary hover:bg-light-bg">Dashboard</a>
                </li>
                <li class="relative">
                    <a href="#"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition-all hover:text-primary hover:bg-light-bg">Post
                        a Task</a>
                </li>
                <li class="relative">
                    <a href="#"
                        class="block px-4 py-3 text-primary bg-blue-50 no-underline font-medium text-sm rounded-md">Active
                        Tasks</a>
                </li>
                <li class="relative">
                    <a href="#"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition-all hover:text-primary hover:bg-light-bg">Provider
                        Selection</a>
                </li>
                <li class="relative">
                    <a href="#"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition-all hover:text-primary hover:bg-light-bg">Messages</a>
                </li>
                <li class="relative">
                    <a href="#"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition-all hover:text-primary hover:bg-light-bg">Payment
                        & Billing</a>
                </li>
                <li class="relative">
                    <a href="#"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition-all hover:text-primary hover:bg-light-bg">Reviews</a>
                </li>
                <li class="relative">
                    <a href="#"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition-all hover:text-primary hover:bg-light-bg">Profile
                        & Settings</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-8">
        <div class="container max-w-7xl mx-auto px-6">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold mb-2 text-text-dark">my services</h1>
                <p class="text-text-medium text-base">Track your ongoing tasks in real time</p>
            </div>
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center gap-4">
                    <button
                        class="px-4 py-2 text-sm font-medium text-primary bg-transparent border border-primary rounded-md transition-all hover:bg-primary hover:text-white">
                        Filter
                    </button>
                    <button
                        class="px-4 py-2 text-sm font-medium text-primary bg-transparent border border-primary rounded-md transition-all hover:bg-primary hover:text-white">
                        Sort by Date
                    </button>
                    <button
                        class="px-4 py-2 text-sm font-medium text-primary bg-transparent border border-primary rounded-md transition-all hover:bg-primary hover:text-white">
                        Sort by Category
                    </button>
                </div>

            </div>

            <!-- Services Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                @foreach ($services as $service)
                    <div
                        class="bg-white rounded-lg shadow-md border border-border overflow-hidden transition-all hover:shadow-lg">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="font-semibold text-lg"> {{ $service->title }} </h3>
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-primary-light text-white">
                                    {{ $service->status }} </span>
                            </div>
                            <div class="grid grid-cols-2 gap-3 mb-4">
                                <div>
                                    <p class="text-xs text-text-medium mb-1">Category</p>
                                    <p class="text-sm font-medium"> {{ $service->servicecategory->name }} </p>
                                </div>
                                <div>
                                    <p class="text-xs text-text-medium mb-1">Location</p>
                                    <p class="text-sm font-medium"> {{ $service->location }} </p>
                                </div>
                                <div>
                                    <p class="text-xs text-text-medium mb-1">Desired Date</p>
                                    <p class="text-sm font-medium"> {{ $service->desired_date }} </p>
                                </div>
                            </div>
                            <form action="/user/task/detail/{{ $service->id }}" method="get">
                                <button type="submit"
                                    class="w-full py-2 px-4 text-sm font-medium text-primary bg-transparent border border-primary rounded-md transition-all hover:bg-primary hover:text-white">
                                    View More
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </main>

    <!-- Cancel Task Modal -->
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity"
        id="cancelTaskModal">
        <div
            class="bg-white rounded-lg w-full max-w-md max-h-[90vh] overflow-y-auto shadow-lg transform translate-y-5 transition-transform">
            <div class="p-6 pt-6 pb-2">
                <h3 class="text-xl font-semibold mb-2">Cancel Task</h3>
                <p class="text-sm text-text-medium">Are you sure you want to cancel this task? Cancellation fees may
                    apply based on the provider's time and effort already invested.</p>
            </div>
            <div class="px-6 py-4">
                <div class="p-3 rounded-md bg-yellow-50 border border-yellow-100 text-warning mb-4" id="cancelTaskInfo">
                </div>
                <div class="p-3 rounded-md bg-red-50 border border-red-100 text-danger mb-4">
                    <i class="fas fa-exclamation-circle mr-1"></i>
                    <span>A cancellation fee of $10 may apply</span>
                </div>
                <div class="p-3 rounded-md bg-red-50 border border-red-100 text-danger">
                    <i class="fas fa-exclamation-circle mr-1"></i>
                    <span>Your reliability score may be affected</span>
                </div>
            </div>
            <div class="px-6 py-4 pb-6 flex justify-end gap-2">
                <button
                    class="px-4 py-2 text-sm font-medium text-primary bg-transparent border border-primary rounded-md transition-all hover:bg-primary hover:text-white"
                    id="keepTaskBtn">Keep Task</button>
                <button
                    class="px-4 py-2 text-sm font-medium text-white bg-danger border border-danger rounded-md transition-all hover:bg-red-600"
                    id="confirmCancelBtn">Cancel Task</button>
            </div>
        </div>
    </div>

    <!-- Modify Task Modal -->
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity"
        id="modifyTaskModal">
        <div
            class="bg-white rounded-lg w-full max-w-md max-h-[90vh] overflow-y-auto shadow-lg transform translate-y-5 transition-transform">
            <div class="p-6 pt-6 pb-2">
                <h3 class="text-xl font-semibold mb-2">Request Modification</h3>
                <p class="text-sm text-text-medium">Request changes to your task. The provider will need to approve
                    these modifications.</p>
            </div>
            <div class="px-6 py-4">
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2" for="modificationType">Modification Type</label>
                    <select
                        class="w-full p-3 border border-border rounded-md text-sm transition-all focus:outline-none focus:border-primary-light focus:ring-2 focus:ring-primary-light focus:ring-opacity-10 appearance-none bg-[url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 24 24%27 stroke=%27%2364748b%27%3E%3Cpath stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272%27 d=%27M19 9l-7 7-7-7%27%3E%3C/path%3E%3C/svg%3E')] bg-no-repeat bg-[right_1rem_center] bg-[length:1rem]"
                        id="modificationType">
                        <option>Change delivery address</option>
                        <option>Change delivery time</option>
                        <option>Add items to order</option>
                        <option>Remove items from order</option>
                        <option>Other modification</option>
                    </select>
                </div>
                <div class="mb-4" id="newAddressGroup">
                    <label class="block text-sm font-medium mb-2" for="newAddress">New Delivery Address</label>
                    <input type="text"
                        class="w-full p-3 border border-border rounded-md text-sm transition-all focus:outline-none focus:border-primary-light focus:ring-2 focus:ring-primary-light focus:ring-opacity-10"
                        id="newAddress" placeholder="Enter new address">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2" for="modificationReason">Reason for
                        Modification</label>
                    <textarea
                        class="w-full p-3 border border-border rounded-md text-sm min-h-[100px] resize-y transition-all focus:outline-none focus:border-primary-light focus:ring-2 focus:ring-primary-light focus:ring-opacity-10"
                        id="modificationReason" placeholder="Please explain why you need to modify this task..."></textarea>
                </div>
                <div class="p-3 rounded-md bg-yellow-50 border border-yellow-100 text-warning">
                    <i class="fas fa-exclamation-circle mr-1"></i>
                    <span>Additional fees may apply for significant modifications</span>
                </div>
            </div>
            <div class="px-6 py-4 pb-6 flex justify-end gap-2">
                <button
                    class="px-4 py-2 text-sm font-medium text-primary bg-transparent border border-primary rounded-md transition-all hover:bg-primary hover:text-white"
                    id="cancelModifyBtn">Cancel</button>
                <button
                    class="px-4 py-2 text-sm font-medium text-white bg-primary border border-primary rounded-md transition-all hover:bg-primary-dark"
                    id="submitModifyBtn">Submit Request</button>
            </div>
        </div>
    </div>

    <script>
        // DOM Elements
        const cancelTaskModal = document.getElementById('cancelTaskModal');
        const modifyTaskModal = document.getElementById('modifyTaskModal');
        const cancelTaskInfo = document.getElementById('cancelTaskInfo');
        const keepTaskBtn = document.getElementById('keepTaskBtn');
        const confirmCancelBtn = document.getElementById('confirmCancelBtn');
        const cancelModifyBtn = document.getElementById('cancelModifyBtn');
        const submitModifyBtn = document.getElementById('submitModifyBtn');
        const newAddress = document.getElementById('newAddress');
        const modificationReason = document.getElementById('modificationReason');

        // Setup event listeners
        function setupEventListeners() {
            // Keep task button
            keepTaskBtn.addEventListener('click', () => {
                cancelTaskModal.classList.remove('opacity-100');
                cancelTaskModal.classList.add('opacity-0');
                cancelTaskModal.classList.add('pointer-events-none');
            });

            // Cancel modify button
            cancelModifyBtn.addEventListener('click', () => {
                modifyTaskModal.classList.remove('opacity-100');
                modifyTaskModal.classList.add('opacity-0');
                modifyTaskModal.classList.add('pointer-events-none');
            });

            // View More buttons
            document.querySelectorAll('button').forEach(button => {
                if (button.textContent.trim() === 'View More') {
                    button.addEventListener('click', () => {
                        // In a real app, this would navigate to the task details page
                        alert('Navigating to task details...');
                    });
                }
            });
        }

        // Initialize the page
        document.addEventListener('DOMContentLoaded', setupEventListeners);
    </script>
</body>

</html>
