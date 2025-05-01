<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Service Details</title>
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
            <!-- Page Header with Back Button -->
            <div class="flex items-center gap-4 mb-8">
                <a href="/user/activetask"
                    class="flex items-center text-primary hover:text-primary-dark transition-all">
                    <i class="fas fa-arrow-left mr-2"></i>
                    <span>Back to Active Tasks</span>
                </a>
            </div>

            <!-- Service Details Card -->
            <div class="bg-white rounded-lg shadow-md border border-border overflow-hidden transition-all mb-8">
                <div class="p-6">
                    <!-- Service Header -->
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h1 class="text-2xl font-bold mb-2"> {{ $service->title }} </h1>
                            <div class="flex items-center gap-2">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-primary-light text-white">
                                    {{ $service->status }}
                                </span>
                                <span class="text-sm text-text-medium">Category: {{ $service->servicecategory->name }}
                                </span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <form action="/task/delete/{{ $service->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-danger border border-danger rounded-md transition-all hover:bg-red-600">
                                    Delete Task
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Service Details Section -->
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-8 mb-6">
                        <!-- Left Column - Basic Details -->
                        <div class="md:col-span-2">
                            <div class="mb-6">
                                <h2 class="text-lg font-semibold mb-3">Description</h2>
                                <p class="text-text-medium"> {{ $service->description }} </p>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <h3 class="text-sm font-semibold text-text-medium mb-1">Location</h3>
                                    <p class="text-base"> {{ $service->location }} </p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-text-medium mb-1">Desired Date</h3>
                                    <p class="text-base"> {{ $service->desired_date }} </p>
                                </div>
                            </div>

                            <!-- Provider Information - Visible only if status is "In Progress" or "Completed" -->
                            @if ($service->status == 'in_Progress' || $service->status == 'completed')
                                <div class="mb-6 p-4 bg-blue-50 rounded-lg border border-blue-100">
                                    <h2 class="text-lg font-semibold mb-3">Provider Information</h2>
                                    <div class="flex items-center gap-3 mb-4">
                                        <div
                                            class="w-12 h-12 rounded-full bg-primary flex items-center justify-center font-semibold text-white text-base">
                                            {{ substr($offer[0]->provider->user->name, 0, 2) }}
                                        </div>
                                        <div>
                                            <p class="font-semibold"> {{ $offer[0]->provider->user->name }} </p>
                                            <p class="text-sm text-text-medium">{{ $offer[0]->provider->user->age }}
                                                years old</p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                        <div>
                                            <h3 class="text-xs font-semibold text-text-medium mb-1">Payment</h3>
                                            <p class="text-base font-medium">${{ $offer[0]->proposed_amount }}</p>
                                        </div>
                                        <div>
                                            <h3 class="text-xs font-semibold text-text-medium mb-1">Estimated Time</h3>
                                            <p class="text-base">{{ $offer[0]->estimated_time }} hours</p>
                                        </div>
                                        <div>
                                            <h3 class="text-xs font-semibold text-text-medium mb-1">Start Date</h3>
                                            <p class="text-base">{{ $offer[0]->updated_at }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <!-- Rating Section - Visible only if status is "Completed" -->
                            @if ($review && !empty($review[0]->rating) && !empty($review[0]->comment))
                                <div class="p-4 bg-green-50 rounded-lg border border-green-100">
                                    <h2 class="text-lg font-semibold mb-3">Service Rating</h2>
                                    <div class="flex items-center gap-1 mb-2">
                                        @for ($i = 0; $i < (int) $review[0]->rating; $i++)
                                            <i class="fas fa-star text-yellow-500"></i>
                                        @endfor
                                        <span class="ml-2 font-semibold"> {{ $review[0]->rating }} /5.0</span>
                                    </div>
                                    <p class="text-text-medium italic">"{{ $review[0]->comment }}"</p>
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Interactions Section -->
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mb-8">
                <!-- Communication History -->
                <div class="bg-white rounded-lg shadow-md border border-border overflow-hidden">
                    <div class="border-b border-border px-6 py-4">
                        <h2 class="text-lg font-semibold">Communication History</h2>
                    </div>
                    @if ($messages)
                        <div class="p-6 max-h-[400px] overflow-y-auto">
                            @foreach ($messages as $msg)
                                @if ($msg->user_id == $user->id)
                                    <div class="mb-4">
                                        <div class="flex justify-between mb-1">
                                            <p class="text-sm font-semibold">You</p>
                                            <p class="text-xs text-text-medium"> {{ $msg->created_at }} </p>
                                        </div>
                                        <div class="bg-blue-50 rounded-lg p-3 text-sm">
                                            <p> {{ $msg->content }}
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div class="mb-4">
                                        <div class="flex justify-between mb-1">
                                            <p class="text-sm font-semibold"> {{ $msg->user->name }} </p>
                                            <p class="text-xs text-text-medium">{{ $msg->created_at }}</p>
                                        </div>
                                        <div class="bg-gray-50 rounded-lg p-3 text-sm">
                                            <p>{{ $msg->content }}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <!-- Cancel Task Modal -->
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity"
        id="cancelTaskModal">
        <div
            class="bg-white rounded-lg w-full max-w-md max-h-[90vh] overflow-y-auto shadow-lg transform translate-y-5 transition-transform">
            <div class="p-6 pt-6 pb-2">
                <h3 class="text-xl font-semibold mb-2">Delete Task</h3>
                <p class="text-sm text-text-medium">Are you sure you want to delete this task? This action cannot be
                    undone.</p>
            </div>
            <div class="px-6 py-4">
                <div class="p-3 rounded-md bg-red-50 border border-red-100 text-danger mb-4">
                    <i class="fas fa-exclamation-circle mr-1"></i>
                    <span>All task information will be permanently removed</span>
                </div>
            </div>
            <div class="px-6 py-4 pb-6 flex justify-end gap-2">
                <button
                    class="px-4 py-2 text-sm font-medium text-primary bg-transparent border border-primary rounded-md transition-all hover:bg-primary hover:text-white"
                    id="keepTaskBtn">Cancel</button>
                <button
                    class="px-4 py-2 text-sm font-medium text-white bg-danger border border-danger rounded-md transition-all hover:bg-red-600"
                    id="confirmCancelBtn">Delete Task</button>
            </div>
        </div>
    </div>

    <script></script>

</html>
