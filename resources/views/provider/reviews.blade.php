<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Reviews & Ratings | QuickHands</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        :root {
            --primary: #FF6B6B;
            --primary-light: #FFD8D8;
            --secondary: #4ECDC4;
            --secondary-light: #C7F9F3;
            --dark: #292F36;
            --gray: #F7F7F7;
            --gray-medium: #E0E0E0;
            --gray-dark: #ADADAD;
            --success: #6BCB77;
            --warning: #FFD166;
            --danger: #FF6B6B;
            --white: #FFFFFF;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-large: 0 8px 24px rgba(0, 0, 0, 0.12);
            --radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F9FAFB;
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background-color: var(--white);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo i {
            color: var(--secondary);
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-links a.active {
            color: var(--secondary);
        }

        .user-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification-bell {
            position: relative;
            cursor: pointer;
        }

        .notification-bell i {
            font-size: 20px;
            color: var(--dark);
        }

        .notification-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 600;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .user-name {
            font-weight: 500;
        }

        .main-content {
            padding: 30px 0;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .breadcrumb {
            display: flex;
            gap: 8px;
            color: var(--gray-dark);
            font-size: 14px;
        }

        .breadcrumb a {
            color: var(--secondary);
            text-decoration: none;
        }

        .breadcrumb span {
            color: var(--gray-dark);
        }

        .card {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 24px;
            margin-bottom: 24px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-large);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark);
        }

        .card-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: var(--radius);
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: #ff5252;
        }

        .btn-secondary {
            background-color: var(--secondary);
            color: white;
        }

        .btn-secondary:hover {
            background-color: #3dbdb5;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--gray-medium);
            color: var(--dark);
        }

        .btn-outline:hover {
            background-color: var(--gray);
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stats-card {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-large);
        }

        .stats-card.primary {
            border-left: 4px solid var(--primary);
        }

        .stats-card.secondary {
            border-left: 4px solid var(--secondary);
        }

        .stats-card.success {
            border-left: 4px solid var(--success);
        }

        .stats-card.warning {
            border-left: 4px solid var(--warning);
        }

        .stats-label {
            font-size: 14px;
            color: var(--gray-dark);
            margin-bottom: 5px;
        }

        .stats-value {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stats-trend {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
        }

        .trend-up {
            color: var(--success);
        }

        .trend-down {
            color: var(--danger);
        }

        .chart-container {
            height: 300px;
            margin-bottom: 20px;
        }

        .tabs {
            display: flex;
            border-bottom: 1px solid var(--gray-medium);
            margin-bottom: 20px;
        }

        .tab {
            padding: 12px 24px;
            cursor: pointer;
            font-weight: 500;
            color: var(--gray-dark);
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
        }

        .tab.active {
            color: var(--secondary);
            border-bottom: 3px solid var(--secondary);
        }

        .tab:hover:not(.active) {
            color: var(--dark);
            border-bottom: 3px solid var(--gray-medium);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .filter-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-group {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding-left: 40px;
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-dark);
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--gray-medium);
            border-radius: var(--radius);
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--secondary);
        }

        .select-control {
            padding: 10px 16px;
            border: 1px solid var(--gray-medium);
            border-radius: var(--radius);
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            background-color: white;
            cursor: pointer;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .page-item {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
        }

        .page-item:hover:not(.active) {
            background-color: var(--gray);
        }

        .page-item.active {
            background-color: var(--secondary);
            color: white;
        }

        .review-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .review-item {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .review-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-large);
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .reviewer-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .reviewer-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--gray);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark);
            font-weight: 600;
        }

        .reviewer-details {
            display: flex;
            flex-direction: column;
        }

        .reviewer-name {
            font-weight: 600;
            font-size: 16px;
        }

        .review-date {
            font-size: 12px;
            color: var(--gray-dark);
        }

        .review-rating {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .star {
            color: var(--warning);
            font-size: 16px;
        }

        .star.empty {
            color: var(--gray-medium);
        }

        .review-content {
            margin-bottom: 15px;
            font-size: 14px;
            line-height: 1.6;
        }

        .review-task {
            font-size: 12px;
            color: var(--gray-dark);
            margin-bottom: 15px;
        }

        .review-task span {
            color: var(--secondary);
            font-weight: 500;
        }

        .review-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .review-reply {
            margin-top: 15px;
            padding: 15px;
            background-color: var(--gray);
            border-radius: var(--radius);
            font-size: 14px;
        }

        .reply-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .reply-title {
            font-weight: 600;
            color: var(--dark);
        }

        .reply-date {
            font-size: 12px;
            color: var(--gray-dark);
        }

        .reply-content {
            color: var(--dark);
        }

        .rating-breakdown {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .rating-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .rating-label {
            width: 120px;
            font-size: 14px;
            color: var(--dark);
        }

        .rating-bar-container {
            flex: 1;
            height: 8px;
            background-color: var(--gray);
            border-radius: 4px;
            overflow: hidden;
        }

        .rating-bar {
            height: 100%;
            background-color: var(--secondary);
            border-radius: 4px;
        }

        .rating-value {
            width: 40px;
            text-align: right;
            font-weight: 600;
            font-size: 14px;
        }

        .rating-summary {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .rating-average {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .average-value {
            font-size: 48px;
            font-weight: 700;
            color: var(--dark);
        }

        .average-stars {
            display: flex;
            gap: 5px;
        }

        .average-count {
            font-size: 14px;
            color: var(--gray-dark);
        }

        .rating-distribution {
            flex: 1;
            max-width: 300px;
        }

        .distribution-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }

        .distribution-label {
            width: 30px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .distribution-bar-container {
            flex: 1;
            height: 8px;
            background-color: var(--gray);
            border-radius: 4px;
            overflow: hidden;
        }

        .distribution-bar {
            height: 100%;
            background-color: var(--secondary);
            border-radius: 4px;
        }

        .distribution-count {
            width: 40px;
            text-align: right;
            font-size: 12px;
            color: var(--gray-dark);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 14px;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }

        .badge-delivery {
            background-color: #E3F5FF;
            color: #0085FF;
        }

        .badge-errand {
            background-color: #FFF3E0;
            color: #FF9800;
        }

        .badge-cleaning {
            background-color: #E8F5E9;
            color: #4CAF50;
        }

        .badge-assembly {
            background-color: #EDE7F6;
            color: #673AB7;
        }

        .badge-other {
            background-color: #F5F5F5;
            color: #9E9E9E;
        }

        @media (max-width: 992px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .rating-summary {
                flex-direction: column;
                align-items: center;
                gap: 30px;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .review-header {
                flex-direction: column;
                gap: 10px;
            }
        }

        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 16px;
            }

            .page-title {
                font-size: 24px;
            }

            .filter-bar {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .filter-group {
                width: 100%;
            }

            .search-box {
                width: 100%;
            }

            .search-box input {
                width: 100%;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }

        .delay-1 {
            animation-delay: 0.1s;
        }

        .delay-2 {
            animation-delay: 0.2s;
        }

        .delay-3 {
            animation-delay: 0.3s;
        }

        .delay-4 {
            animation-delay: 0.4s;
        }
    </style>
</head>

<body class="font-sans bg-gray-50 text-dark">
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
                            <i class="fas fa-bell"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-primary rounded-full pulse-dot"></span>
                        </button>
                    </div>

                    <div class="relative">
                        <button
                            class="p-2 bg-white rounded-full shadow-sm text-gray-500 hover:text-primary transition-colors">
                            <i class="fas fa-envelope"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-primary rounded-full pulse-dot"></span>
                        </button>
                    </div>

                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Provider"
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
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-tasks mr-2"></i> Available Tasks
                    </a>
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-clipboard-list mr-2"></i> Task Management
                    </a>
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg bg-primary text-white font-medium text-sm md:text-base">
                        <i class="fas fa-star mr-2"></i> Reviews
                    </a>
                </div>

                <div class="hidden md:flex space-x-2">
                    <a href="#"
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
                <h1 class="page-title">Reviews & Ratings</h1>
                <div class="breadcrumb">
                    <a href="provider-dashboard.html">Dashboard</a>
                    <span>/</span>
                    <span>Reviews & Ratings</span>
                </div>
            </div>

            <div class="stats-grid fade-in">
                <div class="stats-card primary delay-1">
                    <div class="stats-label">Overall Rating</div>
                    <div class="stats-value">{{ $ratingAvg }}</div>
                </div>
                <div class="stats-card secondary delay-2">
                    <div class="stats-label">Total Reviews</div>
                    <div class="stats-value">{{ $totalRv }}</div>
                </div>
                <div class="stats-card success delay-3">
                    <div class="stats-label">5-Star Reviews</div>
                    <div class="stats-value">{{ $fiveStar }}</div>
                </div>
            </div>
            <div class="card fade-in delay-3">
                <div class="card-header">
                    <h2 class="card-title">User Reviews</h2>
                    <div class="card-actions">
                        <select class="select-control">
                            <option>All Reviews</option>
                            <option>5 Star</option>
                            <option>4 Star</option>
                            <option>3 Star</option>
                            <option>2 Star</option>
                            <option>1 Star</option>
                        </select>
                    </div>
                </div>

                <div class="filter-bar">
                    <div class="filter-group">
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="form-control" placeholder="Search reviews...">
                        </div>
                    </div>
                    <div class="filter-group">
                        <select class="select-control">
                            <option>All Task Types</option>
                            <option>Deliveries</option>
                            <option>Errands</option>
                            <option>Cleaning</option>
                            <option>Assembly</option>
                            <option>Other</option>
                        </select>
                        <select class="select-control">
                            <option>Most Recent</option>
                            <option>Highest Rated</option>
                            <option>Lowest Rated</option>
                        </select>
                    </div>
                </div>

                <div class="review-list">
                    <div class="review-item">
                        <div class="review-header">
                            <div class="reviewer-info">
                                <div class="reviewer-avatar">EM</div>
                                <div class="reviewer-details">
                                    <div class="reviewer-name">Emily Martinez</div>
                                    <div class="review-date">April 15, 2025</div>
                                </div>
                            </div>
                            <div class="review-rating">
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                            </div>
                        </div>
                        <div class="review-task">
                            Task: <span>Furniture Assembly</span> <span class="badge badge-assembly">Assembly</span>
                        </div>
                        <div class="review-content">
                            John was absolutely amazing! He arrived right on time and assembled my IKEA bookshelf and
                            desk in record time. Everything is sturdy and looks perfect. He even cleaned up all the
                            packaging before leaving. I'll definitely be requesting him for all my future assembly
                            needs!
                        </div>
                        <div class="review-actions">
                            <button class="btn btn-outline btn-sm">Reply</button>
                        </div>
                        <div class="review-reply">
                            <div class="reply-header">
                                <div class="reply-title">Your Reply</div>
                                <div class="reply-date">April 15, 2025</div>
                            </div>
                            <div class="reply-content">
                                Thank you so much for your kind words, Emily! It was a pleasure helping you with your
                                furniture assembly. I'm glad everything turned out to your satisfaction. Looking forward
                                to assisting you with future projects!
                            </div>
                        </div>
                    </div>

                    <div class="review-item">
                        <div class="review-header">
                            <div class="reviewer-info">
                                <div class="reviewer-avatar">RJ</div>
                                <div class="reviewer-details">
                                    <div class="reviewer-name">Robert Johnson</div>
                                    <div class="review-date">April 12, 2025</div>
                                </div>
                            </div>
                            <div class="review-rating">
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                            </div>
                        </div>
                        <div class="review-task">
                            Task: <span>Grocery Delivery</span> <span class="badge badge-delivery">Delivery</span>
                        </div>
                        <div class="review-content">
                            John is incredibly reliable. He delivered my groceries exactly when promised and was very
                            careful with all items. He even helped me bring everything inside since I have a bad back.
                            The communication throughout was excellent - he texted me when he was at the store and on
                            his way. Highly recommend!
                        </div>
                        <div class="review-actions">
                            <button class="btn btn-outline btn-sm">Reply</button>
                        </div>
                    </div>

                    <div class="review-item">
                        <div class="review-header">
                            <div class="reviewer-info">
                                <div class="reviewer-avatar">SW</div>
                                <div class="reviewer-details">
                                    <div class="reviewer-name">Sarah Wilson</div>
                                    <div class="review-date">April 10, 2025</div>
                                </div>
                            </div>
                            <div class="review-rating">
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="far fa-star star empty"></i>
                            </div>
                        </div>
                        <div class="review-task">
                            Task: <span>House Cleaning</span> <span class="badge badge-cleaning">Cleaning</span>
                        </div>
                        <div class="review-content">
                            John did a great job cleaning my apartment. Most areas were spotless, though I noticed a few
                            spots under the furniture were missed. Overall, I'm satisfied with the service and would use
                            John again. He was very professional and finished within the estimated time frame.
                        </div>
                        <div class="review-actions">
                            <button class="btn btn-outline btn-sm">Reply</button>
                        </div>
                        <div class="review-reply">
                            <div class="reply-header">
                                <div class="reply-title">Your Reply</div>
                                <div class="reply-date">April 10, 2025</div>
                            </div>
                            <div class="reply-content">
                                Thank you for your feedback, Sarah! I appreciate you pointing out the missed spots -
                                I'll be more thorough next time. I'm glad you were satisfied overall, and I look forward
                                to providing an even better cleaning service in the future.
                            </div>
                        </div>
                    </div>

                    <div class="review-item">
                        <div class="review-header">
                            <div class="reviewer-info">
                                <div class="reviewer-avatar">DT</div>
                                <div class="reviewer-details">
                                    <div class="reviewer-name">David Thompson</div>
                                    <div class="review-date">April 8, 2025</div>
                                </div>
                            </div>
                            <div class="review-rating">
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                            </div>
                        </div>
                        <div class="review-task">
                            Task: <span>Package Pickup</span> <span class="badge badge-errand">Errand</span>
                        </div>
                        <div class="review-content">
                            John went above and beyond! I needed an urgent package pickup from across town during rush
                            hour, and he managed to get it to me in record time. He kept me updated throughout and was
                            extremely courteous. This level of service is rare these days. Thank you!
                        </div>
                        <div class="review-actions">
                            <button class="btn btn-outline btn-sm">Reply</button>
                        </div>
                    </div>
                </div>

                <div class="pagination">
                    <div class="page-item"><i class="fas fa-chevron-left"></i></div>
                    <div class="page-item active">1</div>
                    <div class="page-item">2</div>
                    <div class="page-item">3</div>
                    <div class="page-item">...</div>
                    <div class="page-item">12</div>
                    <div class="page-item"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Reply button functionality
        document.querySelectorAll('.btn-outline').forEach(button => {
            button.addEventListener('click', function() {
                if (this.textContent === 'Reply') {
                    const reviewItem = this.closest('.review-item');
                    if (!reviewItem.querySelector('.review-reply')) {
                        const replyForm = document.createElement('div');
                        replyForm.className = 'review-reply';
                        replyForm.style.padding = '15px';
                        replyForm.innerHTML = `
                            <div class="form-group">
                                <label class="form-label">Your Reply</label>
                                <textarea class="form-control" placeholder="Write your response here..."></textarea>
                            </div>
                            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                                <button class="btn btn-outline btn-sm cancel-reply">Cancel</button>
                                <button class="btn btn-secondary btn-sm submit-reply">Submit</button>
                            </div>
                        `;
                        reviewItem.appendChild(replyForm);

                        // Add event listeners to the new buttons
                        reviewItem.querySelector('.cancel-reply').addEventListener('click', function() {
                            reviewItem.removeChild(replyForm);
                        });

                        reviewItem.querySelector('.submit-reply').addEventListener('click', function() {
                            const replyText = reviewItem.querySelector('textarea').value;
                            if (replyText.trim() !== '') {
                                const today = new Date();
                                const formattedDate = today.toLocaleDateString('en-US', {
                                    month: 'long',
                                    day: 'numeric',
                                    year: 'numeric'
                                });

                                const newReply = document.createElement('div');
                                newReply.className = 'review-reply';
                                newReply.innerHTML = `
                                    <div class="reply-header">
                                        <div class="reply-title">Your Reply</div>
                                        <div class="reply-date">${formattedDate}</div>
                                    </div>
                                    <div class="reply-content">
                                        ${replyText}
                                    </div>
                                `;

                                reviewItem.removeChild(replyForm);
                                reviewItem.appendChild(newReply);
                            }
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>
