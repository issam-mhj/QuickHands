<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Provider Selection</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    <style>
        :root {
            --primary: #2563eb;
            --primary-light: #3b82f6;
            --primary-dark: #1d4ed8;
            --secondary: #10b981;
            --secondary-light: #34d399;
            --secondary-dark: #059669;
            --accent: #f97316;
            --accent-light: #fb923c;
            --text-dark: #1e293b;
            --text-medium: #64748b;
            --text-light: #94a3b8;
            --white: #ffffff;
            --off-white: #f8fafc;
            --light-bg: #f1f5f9;
            --border: #e2e8f0;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #0ea5e9;
            --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.04);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.03);
            --radius-sm: 0.25rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --transition: all 0.2s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Header Styles */
        header {
            background-color: var(--white);
            box-shadow: var(--shadow-md);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
        }

        .logo i {
            margin-right: 0.5rem;
            font-size: 1.75rem;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .notification-btn {
            position: relative;
            background: none;
            border: none;
            color: var(--text-medium);
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: var(--transition);
        }

        .notification-btn:hover {
            color: var(--primary);
            background-color: var(--light-bg);
        }

        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: var(--accent);
            color: var(--white);
            font-size: 0.75rem;
            font-weight: 600;
            width: 1.25rem;
            height: 1.25rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: var(--radius-md);
            transition: var(--transition);
        }

        .user-menu:hover {
            background-color: var(--light-bg);
        }

        .user-info {
            text-align: right;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--text-dark);
        }

        .user-role {
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        .user-avatar {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            background-color: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: var(--white);
            font-size: 1rem;
        }

        /* Navigation */
        nav {
            background-color: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 0.5rem 0;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 0.25rem;
        }

        .nav-links li {
            position: relative;
        }

        .nav-links a {
            display: block;
            padding: 0.75rem 1rem;
            color: var(--text-medium);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.875rem;
            border-radius: var(--radius-md);
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--primary);
            background-color: var(--light-bg);
        }

        .nav-links a.active {
            color: var(--primary);
            background-color: rgba(37, 99, 235, 0.08);
        }
    </style>
</head>

<body class="font-sans bg-slate-100 text-slate-800">

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
                    <a href="/user/dashboard"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition-all hover:text-primary hover:bg-light-bg">Dashboard</a>
                </li>
                <li class="relative">
                    <a href="/user/task"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition-all hover:text-primary hover:bg-light-bg">Post
                        a Task</a>
                </li>
                <li class="relative">
                    <a href="/user/activetask"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition-all hover:text-primary hover:bg-light-bg">Active
                        Tasks</a>
                </li>
                <li class="relative">
                    <a href="/user/selectprovider"
                        class="block px-4 py-3 text-primary bg-blue-50 no-underline font-medium text-sm rounded-md">Provider
                        Selection</a>
                </li>
                <li class="relative">
                    <a href="/user/conversation"
                        class="block px-4 py-3 text-text-medium no-underline font-medium text-sm rounded-md transition-all hover:text-primary hover:bg-light-bg">Messages</a>
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

    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Provider Offers</h1>
        <p class="text-gray-600 mb-6">Review and compare offers from service providers</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Offer Card 1 -->
            @foreach ($offers as $offer)
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-primary-light p-4 text-white">
                        <h2 class="font-semibold text-lg"> {{ $offer->service->title }} </h2>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-4">
                            <div class="ml-3">
                                <h3 class="font-semibold text-gray-800"> {{ $offer->provider->user->name }} </h3>
                            </div>
                        </div>

                        <div class="mb-4 flex flex-col gap-2">
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-money-bill-wave w-5 text-primary"></i>
                                <span class="ml-2 font-medium">${{ $offer->proposed_amount }} </span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-clock w-5 text-primary"></i>
                                <span class="ml-2">Est. {{ $offer->estimated_time }} hours </span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-user w-5 text-primary"></i>
                                <span class="ml-2">{{ $offer->provider->user->age }} years old</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-map-marker-alt w-5 text-primary"></i>
                                <span class="ml-2">{{ $offer->provider->user->location }}</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach ($providerSkills[0] as $skill)
                                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">
                                    {{ $skill }} </span>
                            @endforeach
                        </div>

                        <div class="border-t border-gray-200 pt-4 mt-2">
                            <div class="flex gap-2">
                                <form action="/offer/accept/{{ $offer->id }}" method="POST">
                                    @csrf
                                    <button
                                        class="bg-primary text-white py-2 px-4 rounded text-sm font-medium hover:bg-primary-dark flex-1 flex items-center justify-center">
                                        <i class="fas fa-check mr-1"></i> Accept
                                    </button>
                                </form>
                                <form action="/offer/reject/{{ $offer->id }}" method="POST">
                                    @csrf
                                    <button
                                        class="border border-primary text-primary py-2 px-4 rounded text-sm font-medium hover:bg-blue-50 flex-1 flex items-center justify-center">
                                        reject
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</body>
<script>
    // Simple toggle functionality for expanding offer details
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.offer-card');

        cards.forEach(card => {
            card.addEventListener('click', function(e) {
                // Don't toggle if clicking buttons
                if (e.target.closest('button')) return;

                // Add animation/interaction if needed
            });
        });
    });
</script>

</html>
