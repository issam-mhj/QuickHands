<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - User Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
            background-color: var(--light-bg);
            line-height: 1.5;
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

        .nav-actions {
            display: flex;
            align-items: center;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.625rem 1.25rem;
            border-radius: var(--radius-md);
            font-weight: 500;
            font-size: 0.875rem;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            border: none;
            outline: none;
        }

        .btn-primary {
            background-color: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn i {
            margin-right: 0.5rem;
            font-size: 0.875rem;
        }

        /* Main Content */
        main {
            padding: 2rem 0;
        }

        .dashboard-header {
            margin-bottom: 2rem;
        }

        .dashboard-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .dashboard-subtitle {
            color: var(--text-medium);
            font-size: 1rem;
        }

        /* Quick Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-light);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: var(--white);
        }

        .stat-icon.blue {
            background-color: var(--primary-light);
        }

        .stat-icon.green {
            background-color: var(--secondary);
        }

        .stat-icon.yellow {
            background-color: var(--warning);
        }

        .stat-icon.orange {
            background-color: var(--accent);
        }

        .stat-label {
            font-size: 0.875rem;
            color: var(--text-medium);
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .stat-trend {
            display: flex;
            align-items: center;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .trend-up {
            color: var(--success);
        }

        .trend-down {
            color: var(--danger);
        }

        .trend-icon {
            margin-right: 0.25rem;
        }

        /* Task Alerts */
        .section {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            margin-bottom: 2rem;
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
        }

        .section-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-dark);
            display: flex;
            align-items: center;
        }

        .section-title i {
            margin-right: 0.5rem;
            color: var(--primary);
        }

        .view-all {
            color: var(--primary);
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .view-all:hover {
            color: var(--primary-dark);
        }

        .view-all i {
            margin-left: 0.25rem;
            font-size: 0.75rem;
        }

        .alerts-container {
            padding: 0.5rem 0;
        }

        .alert-item {
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            transition: var(--transition);
            position: relative;
        }

        .alert-item:hover {
            background-color: var(--light-bg);
        }

        .alert-item:not(:last-child) {
            border-bottom: 1px solid var(--border);
        }

        .alert-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .alert-icon.success {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .alert-icon.warning {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .alert-icon.info {
            background-color: rgba(14, 165, 233, 0.1);
            color: var(--info);
        }

        .alert-content {
            flex-grow: 1;
        }

        .alert-title {
            font-weight: 500;
            margin-bottom: 0.25rem;
            color: var(--text-dark);
        }

        .alert-meta {
            display: flex;
            align-items: center;
            color: var(--text-medium);
            font-size: 0.75rem;
        }

        .alert-time {
            margin-right: 1rem;
            display: flex;
            align-items: center;
        }

        .alert-time i {
            margin-right: 0.25rem;
            font-size: 0.75rem;
        }

        .alert-task {
            display: flex;
            align-items: center;
        }

        .alert-task i {
            margin-right: 0.25rem;
        }

        .alert-actions {
            margin-left: 1rem;
        }

        .alert-btn {
            background: none;
            border: 1px solid var(--primary);
            color: var(--primary);
            cursor: pointer;
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.375rem 0.75rem;
            border-radius: var(--radius-md);
            transition: var(--transition);
        }

        .alert-btn:hover {
            background-color: var(--primary);
            color: var(--white);
        }

        /* Recent Providers */
        .providers-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            padding: 1.5rem;
        }

        .provider-card {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            transition: var(--transition);
            border: 1px solid var(--border);
        }

        .provider-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-light);
        }

        .provider-header {
            position: relative;
            height: 4rem;
            background: linear-gradient(to right, var(--primary-light), var(--secondary-light));
        }

        .provider-avatar {
            position: absolute;
            bottom: -1.5rem;
            left: 1.25rem;
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            background-color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: var(--primary);
            box-shadow: var(--shadow-sm);
            border: 2px solid var(--white);
            overflow: hidden;
        }

        .provider-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .provider-content {
            padding: 2rem 1.25rem 1.25rem;
        }

        .provider-name {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0.25rem;
            color: var(--text-dark);
        }

        .provider-service {
            color: var(--text-medium);
            font-size: 0.875rem;
            margin-bottom: 0.75rem;
        }

        .provider-rating {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .rating-stars {
            color: #ffc107;
            margin-right: 0.375rem;
            font-size: 0.875rem;
        }

        .rating-value {
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--text-dark);
        }

        .rating-count {
            color: var(--text-medium);
            font-size: 0.75rem;
            margin-left: 0.25rem;
        }

        .provider-actions {
            display: flex;
            gap: 0.5rem;
        }

        .provider-btn {
            flex: 1;
            padding: 0.5rem;
            font-size: 0.75rem;
            border-radius: var(--radius-md);
            font-weight: 500;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background-color: var(--primary);
            color: var(--white);
        }

        /* New Alert Indicator */
        .alert-item.new {
            position: relative;
        }

        .alert-item.new::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background-color: var(--primary);
        }

        .new-badge {
            background-color: var(--primary);
            color: var(--white);
            font-size: 0.625rem;
            font-weight: 600;
            padding: 0.125rem 0.375rem;
            border-radius: 1rem;
            margin-left: 0.5rem;
            text-transform: uppercase;
        }

        /* Responsive */
        @media (max-width: 1024px) {

            .stats-grid,
            .providers-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .user-info {
                display: none;
            }
        }

        @media (max-width: 640px) {

            .stats-grid,
            .providers-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(0.5rem);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-card {
            animation: fadeIn 0.3s ease forwards;
        }

        .stat-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .stat-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .stat-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .stat-card:nth-child(4) {
            animation-delay: 0.4s;
        }

        .alert-item {
            animation: fadeIn 0.3s ease forwards;
        }

        .alert-item:nth-child(1) {
            animation-delay: 0.5s;
        }

        .alert-item:nth-child(2) {
            animation-delay: 0.6s;
        }

        .alert-item:nth-child(3) {
            animation-delay: 0.7s;
        }

        .alert-item:nth-child(4) {
            animation-delay: 0.8s;
        }

        .provider-card {
            animation: fadeIn 0.3s ease forwards;
        }

        .provider-card:nth-child(1) {
            animation-delay: 0.9s;
        }

        .provider-card:nth-child(2) {
            animation-delay: 1.0s;
        }

        .provider-card:nth-child(3) {
            animation-delay: 1.1s;
        }

        .provider-card:nth-child(4) {
            animation-delay: 1.2s;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <div class="logo-container">
                <a href="#" class="logo">
                    <i class="fas fa-hands-helping"></i>
                    <span>QuickHands</span>
                </a>
            </div>
            <div class="header-actions">
                <button class="notification-btn">
                    <i class="far fa-bell"></i>
                    <span class="notification-badge">3</span>
                </button>
                <div class="user-menu">
                    <div class="user-info">
                        <div class="user-name"> {{ $user->name }} </div>
                    </div>
                    <div class="user-avatar"> {{ $user->name[0] }} </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav>
        <div class="container nav-container">
            <ul class="nav-links">
                <li><a href="#" class="active">Dashboard</a></li>
                <li><a href="#">Post a Task</a></li>
                <li><a href="#">Active Tasks</a></li>
                <li><a href="#">Provider Selection</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Payment & Billing</a></li>
                <li><a href="#">Reviews</a></li>
                <li><a href="#">Profile & Settings</a></li>
            </ul>
            <div class="nav-actions">
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Post New Task
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <div class="container">
            <!-- Dashboard Header -->
            <div class="dashboard-header">
                <h1 class="dashboard-title">Welcome back, {{ $user->name }}!</h1>
                <p class="dashboard-subtitle">Here's what's happening with your tasks today</p>
            </div>

            <!-- Quick Stats -->
            <div class="stats-grid">
                <!-- Active Tasks -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-label">Active Tasks</div>
                        <div class="stat-icon blue">
                            <i class="fas fa-tasks"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $usertasksNum }}</div>
                </div>

                <!-- Total Spending -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-label">Total Spending</div>
                        <div class="stat-icon green">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                    <div class="stat-value">${{ $totalspent }} </div>
                </div>
            </div>
            <!-- Recent Providers -->
            <div class="section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-user-check"></i>
                        Last providers i worked with
                    </h2>
                    <a href="#" class="view-all">
                        View All
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
                <div class="providers-grid">
                    @foreach ($usertasks as $task)
                        <div class="provider-card">
                            <div class="provider-header"></div>
                            <div class="provider-content">
                                <h3 class="provider-name"> {{ $task->offer->provider->user->name }} </h3>
                                <div class="provider-service">{{ $task->offer->service->title }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

    <script>
        // Animate progress bars on load
        document.addEventListener('DOMContentLoaded', function() {
            // Add pulse effect to new notifications
            const newAlerts = document.querySelectorAll('.alert-item.new');
            newAlerts.forEach(alert => {
                alert.classList.add('pulse');
            });
        });
    </script>
</body>

</html>
