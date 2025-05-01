<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Post a Task</title>
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
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans bg-slate-100 text-slate-800">
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
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-slate-100">Dashboard</a>
                </li>
                <li><a href="#"
                        class="block px-4 py-3 text-primary no-underline font-medium text-sm rounded-md bg-blue-50">Post
                        a Task</a></li>
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-slate-100">Active
                        Tasks</a></li>
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-slate-100">Provider
                        Selection</a></li>
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-slate-100">Messages</a>
                </li>
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-slate-100">Payment
                        & Billing</a></li>
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-slate-100">Reviews</a>
                </li>
                <li><a href="#"
                        class="block px-4 py-3 text-slate-500 no-underline font-medium text-sm rounded-md transition hover:text-primary hover:bg-slate-100">Profile
                        & Settings</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-8">
        @if (session('done'))
            <div class="max-w-7xl mx-auto px-6 mb-4">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto px-6">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold mb-2 text-slate-800">Post a New Task</h1>
                <p class="text-slate-500">Fill in the details below to create your task and find the perfect provider
                </p>
            </div>

            <!-- Task Form -->
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 mb-8">
                <!-- Task Details Form -->
                <form action="/user/postTask" method="POST">
                    @csrf
                    <div
                        class="lg:col-span-2 bg-white rounded-lg shadow-md border border-slate-200 overflow-hidden animate-[fadeIn_0.3s_ease_forwards]">
                        <div class="flex items-center p-5 border-b border-slate-200">
                            <h2 class="text-base font-semibold text-slate-800 flex items-center">
                                <i class="fas fa-clipboard-list mr-2 text-primary"></i>
                                Task Details
                            </h2>
                        </div>
                        <div class="p-6">
                            <div class="mb-6">
                                <label for="taskCategory" class="block font-semibold mb-2 text-slate-700">
                                    <i class="fas fa-tag text-primary mr-2"></i>
                                    Task Category <span class="text-red-500">*</span>
                                </label>
                                <select name="service_category" id="taskCategory"
                                    class="w-full px-4 py-3 border border-slate-300 rounded-lg text-slate-700 bg-white transition
                                focus:outline-none focus:border-primary focus:ring-3 focus:ring-primary/20"
                                    required>
                                    <option value="" disabled selected>Select a category</option>
                                    @foreach ($taskcategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('service_category')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="taskTitle" class="block font-medium mb-2 text-sm text-slate-800">Task
                                    Title</label>
                                <input type="text" id="taskTitle" name="serviceTitle"
                                    class="w-full px-4 py-3 border border-slate-200 rounded-md text-sm text-slate-800 bg-white transition focus:outline-none focus:border-primary-light focus:ring-3 focus:ring-blue-100"
                                    placeholder="E.g., Computer Setup, WiFi Configuration">
                                @error('serviceTitle')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="taskDescription" class="block font-medium mb-2 text-sm text-slate-800">Task
                                    Description</label>
                                <textarea id="taskDescription" name="serviceDescription"
                                    class="w-full px-4 py-3 border border-slate-200 rounded-md text-sm text-slate-800 bg-white transition focus:outline-none focus:border-primary-light focus:ring-3 focus:ring-blue-100 min-h-[120px] resize-y"
                                    placeholder="Provide details about what you need done..."></textarea>
                                @error('serviceDescription')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div>
                                    <label for="taskLocation"
                                        class="block font-medium mb-2 text-sm text-slate-800">Location</label>
                                    <input type="text" id="taskLocation" name="serviceLocation"
                                        class="w-full px-4 py-3 border border-slate-200 rounded-md text-sm text-slate-800 bg-white transition focus:outline-none focus:border-primary-light focus:ring-3 focus:ring-blue-100"
                                        placeholder="Enter address">
                                </div>
                                @error('serviceLocation')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                                <div>
                                    <label for="taskDate" class="block font-medium mb-2 text-sm text-slate-800">Date &
                                        Time</label>
                                    <input type="datetime-local" id="taskDate" name="serviceDate"
                                        class="w-full px-4 py-3 border border-slate-200 rounded-md text-sm text-slate-800 bg-white transition focus:outline-none focus:border-primary-light focus:ring-3 focus:ring-blue-100">
                                </div>
                                @error('serviceDate')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex justify-end gap-4 mt-6">
                                <button type="submit"
                                    class="inline-flex items-center justify-center px-7 py-3.5 rounded-md font-medium text-base bg-primary text-white transition hover:bg-primary-dark hover:-translate-y-0.5 hover:shadow-md">
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    Post Task
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Task Type Selection
            const taskTypeCards = document.querySelectorAll(
                '[class*="border border-slate-200 rounded-md p-4 cursor-pointer"], [class*="border border-primary rounded-md p-4 cursor-pointer"]'
            );

            taskTypeCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Remove active class from all cards
                    taskTypeCards.forEach(c => {
                        c.classList.remove('border-primary', 'bg-blue-50');
                        c.classList.add('border-slate-200', 'bg-white');

                        // Hide the checkmark
                        const checkmark = c.querySelector('.absolute');
                        if (checkmark) {
                            checkmark.classList.add('opacity-0');
                            checkmark.classList.remove('opacity-100');
                        }
                    });

                    // Add active class to clicked card
                    this.classList.remove('border-slate-200', 'bg-white');
                    this.classList.add('border-primary', 'bg-blue-50');

                    // Show the checkmark
                    const checkmark = this.querySelector('.absolute');
                    if (checkmark) {
                        checkmark.classList.remove('opacity-0');
                        checkmark.classList.add('opacity-100');
                    }
                });
            });

            // File Upload Handling
            const fileUpload = document.getElementById('fileUpload');
            const fileUploadContainer = fileUpload.parentElement;

            fileUploadContainer.addEventListener('click', function() {
                fileUpload.click();
            });

            fileUploadContainer.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('border-primary-light', 'bg-blue-50');
                this.classList.remove('border-slate-200', 'bg-slate-50');
            });

            fileUploadContainer.addEventListener('dragleave', function() {
                this.classList.remove('border-primary-light', 'bg-blue-50');
                this.classList.add('border-slate-200', 'bg-slate-50');
            });

            fileUploadContainer.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('border-primary-light', 'bg-blue-50');
                this.classList.add('border-slate-200', 'bg-slate-50');

                // Handle file upload logic here
                console.log('Files dropped:', e.dataTransfer.files);
            });

            // Remove uploaded file
            const removeButtons = document.querySelectorAll('[class*="text-slate-400 hover:text-danger"]');
            removeButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    this.closest('[class*="flex items-center px-3 py-2 bg-slate-50"]').remove();
                });
            });
        });
    </script>
</body>

</html>
