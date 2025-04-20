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

        /* Main Content */
        main {
            padding: 2rem 0;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .page-subtitle {
            color: var(--text-medium);
            font-size: 1rem;
        }

        /* Task Styles */
        .task-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 1.5rem;
        }

        @media (max-width: 1024px) {
            .task-container {
                grid-template-columns: 1fr;
            }
        }

        .form-section {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
            overflow: hidden;
            animation: fadeIn 0.3s ease forwards;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
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

        .form-content {
            padding: 1.5rem;
        }

        /* Task List */
        .task-list {
            border-top: 1px solid var(--border);
        }

        .task-item {
            padding: 1rem;
            border-bottom: 1px solid var(--border);
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .task-item:hover {
            background-color: var(--light-bg);
        }

        .task-item.active {
            background-color: var(--light-bg);
        }

        .task-item-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .task-title {
            font-weight: 500;
            font-size: 0.875rem;
        }

        .task-provider {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .provider-avatar {
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 0.5rem;
        }

        .provider-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .provider-name {
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        .task-deadline {
            display: flex;
            align-items: center;
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        .task-deadline i {
            margin-right: 0.25rem;
            font-size: 0.75rem;
        }

        /* Status Badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.625rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-scheduled {
            background-color: var(--light-bg);
            color: var(--text-medium);
        }

        .status-in-progress {
            background-color: var(--primary-light);
            color: white;
        }

        .status-arriving {
            background-color: var(--secondary);
            color: white;
        }

        .status-completed {
            background-color: var(--success);
            color: white;
        }

        .status-cancelled {
            background-color: var(--danger);
            color: white;
        }

        .emergency-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.625rem;
            font-weight: 600;
            background-color: var(--danger);
            color: white;
            margin-top: 0.5rem;
        }

        /* Task Details */
        .task-details-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        @media (max-width: 768px) {
            .task-details-container {
                grid-template-columns: 1fr;
            }
        }

        .task-details-header {
            margin-bottom: 1rem;
        }

        .task-details-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .task-details-description {
            font-size: 0.875rem;
            color: var(--text-medium);
            margin-bottom: 1rem;
        }

        .task-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .task-info-item {
            background-color: var(--light-bg);
            padding: 0.75rem;
            border-radius: var(--radius-md);
        }

        .task-info-label {
            font-size: 0.75rem;
            color: var(--text-medium);
            margin-bottom: 0.25rem;
        }

        .task-info-value {
            font-size: 0.875rem;
            font-weight: 500;
        }

        .provider-card {
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .provider-card-header {
            display: flex;
            align-items: center;
        }

        .provider-card-avatar {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 1rem;
        }

        .provider-card-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .provider-card-info {
            flex-grow: 1;
        }

        .provider-card-name {
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .provider-card-rating {
            display: flex;
            align-items: center;
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        .provider-card-rating i {
            color: #ffc107;
            margin-right: 0.25rem;
        }

        .provider-contact-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 0.75rem;
            background-color: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
            border-radius: var(--radius-md);
            font-size: 0.75rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }

        .provider-contact-btn:hover {
            background-color: var(--primary);
            color: white;
        }

        .provider-contact-btn i {
            margin-right: 0.25rem;
        }

        /* Map */
        .map-container {
            position: relative;
            width: 100%;
            height: 200px;
            background-color: var(--light-bg);
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .map-placeholder {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .map-placeholder i {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .map-placeholder-text {
            font-size: 0.875rem;
            font-weight: 500;
            text-align: center;
        }

        .map-placeholder-eta {
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        /* Timeline */
        .timeline-container {
            background-color: var(--light-bg);
            border-radius: var(--radius-md);
            padding: 1rem;
        }

        .timeline-header {
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.75rem;
        }

        .timeline {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .timeline-item {
            display: flex;
            align-items: flex-start;
        }

        .timeline-icon {
            width: 1.5rem;
            height: 1.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.5rem;
            flex-shrink: 0;
        }

        .timeline-icon.completed {
            background-color: var(--primary);
            color: white;
        }

        .timeline-icon.pending {
            background-color: var(--border);
            color: var(--text-medium);
        }

        .timeline-icon.cancelled {
            background-color: var(--danger);
            color: white;
        }

        .timeline-content {
            flex-grow: 1;
        }

        .timeline-title {
            font-size: 0.75rem;
            font-weight: 500;
        }

        .timeline-time {
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            border-radius: var(--radius-md);
            font-weight: 500;
            font-size: 0.75rem;
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
        }

        .btn-danger {
            background-color: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background-color: #dc2626;
        }

        .btn i {
            margin-right: 0.25rem;
        }

        /* Empty State */
        .empty-state {
            padding: 2rem;
            text-align: center;
        }

        .empty-state-icon {
            width: 4rem;
            height: 4rem;
            border-radius: 50%;
            background-color: var(--light-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .empty-state-icon i {
            font-size: 2rem;
            color: var(--text-medium);
        }

        .empty-state-title {
            font-size: 1.25rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .empty-state-text {
            color: var(--text-medium);
        }

        /* Modal */
        .modal-backdrop {
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 50;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease;
        }

        .modal-backdrop.active {
            opacity: 1;
            pointer-events: auto;
        }

        .modal {
            background-color: white;
            border-radius: var(--radius-lg);
            width: 100%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: var(--shadow-lg);
            transform: translateY(20px);
            transition: transform 0.2s ease;
        }

        .modal-backdrop.active .modal {
            transform: translateY(0);
        }

        .modal-header {
            padding: 1.5rem 1.5rem 0.5rem;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .modal-description {
            font-size: 0.875rem;
            color: var(--text-medium);
        }

        .modal-body {
            padding: 1rem 1.5rem;
        }

        .modal-footer {
            padding: 1rem 1.5rem 1.5rem;
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748b'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1rem;
            padding-right: 2.5rem;
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }

        .alert {
            padding: 0.75rem;
            border-radius: var(--radius-md);
            margin-bottom: 1rem;
            font-size: 0.75rem;
        }

        .alert-warning {
            background-color: rgba(245, 158, 11, 0.1);
            border: 1px solid rgba(245, 158, 11, 0.2);
            color: var(--warning);
        }

        .alert-danger {
            background-color: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: var(--danger);
        }

        .alert i {
            margin-right: 0.25rem;
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

        .form-section {
            animation: fadeIn 0.3s ease forwards;
        }

        .form-section:nth-child(1) {
            animation-delay: 0.1s;
        }

        .form-section:nth-child(2) {
            animation-delay: 0.2s;
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
                        <div class="user-name">Alex Johnson</div>
                        <div class="user-role">Premium Member</div>
                    </div>
                    <div class="user-avatar">AJ</div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav>
        <div class="container nav-container">
            <ul class="nav-links">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Post a Task</a></li>
                <li><a href="#" class="active">Active Tasks</a></li>
                <li><a href="#">Provider Selection</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Payment & Billing</a></li>
                <li><a href="#">Reviews</a></li>
                <li><a href="#">Profile & Settings</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">Active Tasks</h1>
                <p class="page-subtitle">Track your ongoing tasks in real time</p>
            </div>

            <!-- Task Container -->
            <div class="task-container">
                <!-- Task List -->
                <div class="form-section">
                    <div class="section-header">
                        <h2 class="section-title">
                            <i class="far fa-clock"></i>
                            Current Tasks
                        </h2>
                    </div>
                    <div class="task-list" id="taskList">
                        <!-- Task items will be populated by JavaScript -->
                    </div>
                </div>

                <!-- Task Details -->
                <div class="form-section" id="taskDetailsSection">
                    <div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-info-circle"></i>
                            Task Details
                        </h2>
                        <div class="action-buttons" id="taskActionButtons" style="display: none;">
                            <button class="btn btn-outline" id="modifyTaskBtn">
                                <i class="fas fa-edit"></i>
                                Modify
                            </button>
                            <button class="btn btn-danger" id="cancelTaskBtn">
                                <i class="fas fa-times"></i>
                                Cancel
                            </button>
                        </div>
                    </div>
                    <div class="form-content" id="taskDetailsContent">
                        <!-- Empty state initially -->
                        <div class="empty-state" id="emptyState">
                            <div class="empty-state-icon">
                                <i class="far fa-clock"></i>
                            </div>
                            <h3 class="empty-state-title">Select a task to view details</h3>
                            <p class="empty-state-text">Click on any active task to see real-time updates and tracking
                                information</p>
                        </div>

                        <!-- Task details will be populated by JavaScript -->
                        <div class="task-details-container" id="taskDetails" style="display: none;">
                            <!-- Left column -->
                            <div>
                                <div class="task-details-header">
                                    <h3 class="task-details-title" id="taskTitle"></h3>
                                    <p class="task-details-description" id="taskDescription"></p>
                                </div>

                                <div class="task-info-grid">
                                    <div class="task-info-item">
                                        <div class="task-info-label">Status</div>
                                        <div class="task-info-value" id="taskStatus"></div>
                                    </div>
                                    <div class="task-info-item">
                                        <div class="task-info-label">Price</div>
                                        <div class="task-info-value" id="taskPrice"></div>
                                    </div>
                                    <div class="task-info-item">
                                        <div class="task-info-label">Created</div>
                                        <div class="task-info-value" id="taskCreated"></div>
                                    </div>
                                    <div class="task-info-item">
                                        <div class="task-info-label">Deadline</div>
                                        <div class="task-info-value" id="taskDeadline"></div>
                                    </div>
                                </div>

                                <div class="provider-card">
                                    <h4 class="form-label">Provider Information</h4>
                                    <div class="provider-card-header">
                                        <div class="provider-card-avatar">
                                            <img id="providerAvatar" src="/placeholder.svg?height=60&width=60"
                                                alt="Provider">
                                        </div>
                                        <div class="provider-card-info">
                                            <div class="provider-card-name" id="providerName"></div>
                                            <div class="provider-card-rating">
                                                <i class="fas fa-star"></i>
                                                <span id="providerRating"></span>
                                            </div>
                                        </div>
                                        <button class="provider-contact-btn">
                                            <i class="fas fa-phone"></i>
                                            Contact
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Right column -->
                            <div>
                                <h4 class="form-label">Real-Time Location</h4>
                                <div class="map-container" id="mapContainer">
                                    <!-- Map placeholder -->
                                </div>

                                <div class="timeline-container">
                                    <h4 class="timeline-header">Delivery Updates</h4>
                                    <div class="timeline" id="taskTimeline">
                                        <!-- Timeline items will be populated by JavaScript -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Cancel Task Modal -->
    <div class="modal-backdrop" id="cancelTaskModal">
        <div class="modal">
            <div class="modal-header">
                <h3 class="modal-title">Cancel Task</h3>
                <p class="modal-description">Are you sure you want to cancel this task? Cancellation fees may apply
                    based on the provider's time and effort already invested.</p>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <div id="cancelTaskInfo"></div>
                </div>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>A cancellation fee of $10 may apply</span>
                </div>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Your reliability score may be affected</span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" id="keepTaskBtn">Keep Task</button>
                <button class="btn btn-danger" id="confirmCancelBtn">Cancel Task</button>
            </div>
        </div>
    </div>

    <!-- Modify Task Modal -->
    <div class="modal-backdrop" id="modifyTaskModal">
        <div class="modal">
            <div class="modal-header">
                <h3 class="modal-title">Request Modification</h3>
                <p class="modal-description">Request changes to your task. The provider will need to approve these
                    modifications.</p>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label" for="modificationType">Modification Type</label>
                    <select class="form-control form-select" id="modificationType">
                        <option>Change delivery address</option>
                        <option>Change delivery time</option>
                        <option>Add items to order</option>
                        <option>Remove items from order</option>
                        <option>Other modification</option>
                    </select>
                </div>
                <div class="form-group" id="newAddressGroup">
                    <label class="form-label" for="newAddress">New Delivery Address</label>
                    <input type="text" class="form-control" id="newAddress" placeholder="Enter new address">
                </div>
                <div class="form-group">
                    <label class="form-label" for="modificationReason">Reason for Modification</label>
                    <textarea class="form-control form-textarea" id="modificationReason"
                        placeholder="Please explain why you need to modify this task..."></textarea>
                </div>
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Additional fees may apply for significant modifications</span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" id="cancelModifyBtn">Cancel</button>
                <button class="btn btn-primary" id="submitModifyBtn">Submit Request</button>
            </div>
        </div>
    </div>

    <script>
        // Mock data for active tasks
        const MOCK_TASKS = [{
                id: "task-1",
                title: "Grocery Delivery",
                provider: {
                    name: "Michael Brown",
                    avatar: "/placeholder.svg?height=60&width=60",
                    phone: "+1 (555) 123-4567",
                    rating: 4.9,
                },
                status: "in-progress",
                deadline: "Today, 2:30 PM",
                createdAt: "Today, 1:15 PM",
                location: {
                    current: "1.2 miles away",
                    eta: "15 minutes",
                    coordinates: {
                        lat: 40.7128,
                        lng: -74.006
                    },
                },
                details: "Pickup groceries from Whole Foods and deliver to home address",
                price: "$45.00",
                emergency: true,
            },
            {
                id: "task-2",
                title: "Furniture Assembly",
                provider: {
                    name: "Sarah Wilson",
                    avatar: "/placeholder.svg?height=60&width=60",
                    phone: "+1 (555) 987-6543",
                    rating: 4.7,
                },
                status: "arriving",
                deadline: "Today, 4:00 PM",
                createdAt: "Today, 12:30 PM",
                location: {
                    current: "0.5 miles away",
                    eta: "5 minutes",
                    coordinates: {
                        lat: 40.7228,
                        lng: -73.996
                    },
                },
                details: "Assemble IKEA bookshelf and coffee table",
                price: "$75.00",
                emergency: false,
            },
            {
                id: "task-3",
                title: "Package Return",
                provider: {
                    name: "David Chen",
                    avatar: "/placeholder.svg?height=60&width=60",
                    phone: "+1 (555) 456-7890",
                    rating: 4.5,
                },
                status: "scheduled",
                deadline: "Tomorrow, 11:00 AM",
                createdAt: "Today, 10:45 AM",
                location: {
                    current: "Not started",
                    eta: "Scheduled for tomorrow",
                    coordinates: null,
                },
                details: "Return package to UPS store with prepaid label",
                price: "$25.00",
                emergency: false,
            },
        ];

        // DOM Elements
        const taskList = document.getElementById('taskList');
        const taskDetailsSection = document.getElementById('taskDetailsSection');
        const taskActionButtons = document.getElementById('taskActionButtons');
        const emptyState = document.getElementById('emptyState');
        const taskDetails = document.getElementById('taskDetails');
        const cancelTaskModal = document.getElementById('cancelTaskModal');
        const modifyTaskModal = document.getElementById('modifyTaskModal');

        // Task details elements
        const taskTitle = document.getElementById('taskTitle');
        const taskDescription = document.getElementById('taskDescription');
        const taskStatus = document.getElementById('taskStatus');
        const taskPrice = document.getElementById('taskPrice');
        const taskCreated = document.getElementById('taskCreated');
        const taskDeadline = document.getElementById('taskDeadline');
        const providerAvatar = document.getElementById('providerAvatar');
        const providerName = document.getElementById('providerName');
        const providerRating = document.getElementById('providerRating');
        const mapContainer = document.getElementById('mapContainer');
        const taskTimeline = document.getElementById('taskTimeline');

        // Modal elements
        const cancelTaskInfo = document.getElementById('cancelTaskInfo');
        const keepTaskBtn = document.getElementById('keepTaskBtn');
        const confirmCancelBtn = document.getElementById('confirmCancelBtn');
        const cancelTaskBtn = document.getElementById('cancelTaskBtn');
        const modifyTaskBtn = document.getElementById('modifyTaskBtn');
        const cancelModifyBtn = document.getElementById('cancelModifyBtn');
        const submitModifyBtn = document.getElementById('submitModifyBtn');
        const newAddress = document.getElementById('newAddress');
        const modificationReason = document.getElementById('modificationReason');

        // Current selected task
        let selectedTask = null;

        // Initialize the page
        function init() {
            renderTaskList();
            setupEventListeners();
        }

        // Render the task list
        function renderTaskList() {
            taskList.innerHTML = '';

            if (MOCK_TASKS.length === 0) {
                taskList.innerHTML = `
                    <div class="empty-state">
                        <p>You don't have any active tasks</p>
                    </div>
                `;
                return;
            }

            MOCK_TASKS.forEach(task => {
                const taskItem = document.createElement('div');
                taskItem.className = 'task-item';
                taskItem.dataset.taskId = task.id;

                // Status badge configuration
                const statusConfig = {
                    'scheduled': {
                        class: 'status-scheduled',
                        label: 'Scheduled'
                    },
                    'in-progress': {
                        class: 'status-in-progress',
                        label: 'In Progress'
                    },
                    'arriving': {
                        class: 'status-arriving',
                        label: 'Arriving Soon'
                    },
                    'completed': {
                        class: 'status-completed',
                        label: 'Completed'
                    },
                    'cancelled': {
                        class: 'status-cancelled',
                        label: 'Cancelled'
                    }
                };

                const statusBadge = statusConfig[task.status] || statusConfig['scheduled'];

                taskItem.innerHTML = `
                    <div class="task-item-header">
                        <div class="task-title">${task.title}</div>
                        <div class="status-badge ${statusBadge.class}">${statusBadge.label}</div>
                    </div>
                    <div class="task-provider">
                        <div class="provider-avatar">
                            <img src="${task.provider.avatar}" alt="${task.provider.name}">
                        </div>
                        <div class="provider-name">${task.provider.name}</div>
                    </div>
                    <div class="task-deadline">
                        <i class="far fa-clock"></i>
                        <span>Deadline: ${task.deadline}</span>
                    </div>
                    ${task.emergency ? '<div class="emergency-badge">Emergency Priority</div>' : ''}
                `;

                taskList.appendChild(taskItem);
            });
        }

        // Setup event listeners
        function setupEventListeners() {
            // Task item click
            taskList.addEventListener('click', (e) => {
                const taskItem = e.target.closest('.task-item');
                if (taskItem) {
                    const taskId = taskItem.dataset.taskId;
                    selectTask(taskId);

                    // Update active state
                    document.querySelectorAll('.task-item').forEach(item => {
                        item.classList.remove('active');
                    });
                    taskItem.classList.add('active');
                }
            });

            // Cancel task button
            cancelTaskBtn.addEventListener('click', () => {
                if (selectedTask) {
                    cancelTaskInfo.innerHTML = `
                        <div class="text-sm font-medium mb-1">${selectedTask.title}</div>
                        <div class="text-xs text-text-medium mb-2">Provider: ${selectedTask.provider.name}</div>
                        <div class="text-xs text-text-medium">Deadline: ${selectedTask.deadline}</div>
                    `;
                    cancelTaskModal.classList.add('active');
                }
            });

            // Keep task button
            keepTaskBtn.addEventListener('click', () => {
                cancelTaskModal.classList.remove('active');
            });

            // Confirm cancel button
            confirmCancelBtn.addEventListener('click', () => {
                if (selectedTask) {
                    cancelTask(selectedTask.id);
                    cancelTaskModal.classList.remove('active');
                }
            });

            // Modify task button
            modifyTaskBtn.addEventListener('click', () => {
                if (selectedTask) {
                    // Pre-fill address if it's a delivery task
                    if (selectedTask.details.includes('deliver to')) {
                        const address = selectedTask.details.split('deliver to ')[1];
                        newAddress.value = address;
                    } else {
                        newAddress.value = '';
                    }

                    modificationReason.value = '';
                    modifyTaskModal.classList.add('active');
                }
            });

            // Cancel modify button
            cancelModifyBtn.addEventListener('click', () => {
                modifyTaskModal.classList.remove('active');
            });

            // Submit modification button
            submitModifyBtn.addEventListener('click', () => {
                if (selectedTask && modificationReason.value.trim() !== '') {
                    // In a real app, this would send the modification request to the backend
                    alert(`Modification requested: ${modificationReason.value}`);
                    modifyTaskModal.classList.remove('active');
                } else {
                    alert('Please provide a reason for the modification');
                }
            });
        }

        // Select a task to display details
        function selectTask(taskId) {
            selectedTask = MOCK_TASKS.find(task => task.id === taskId);

            if (selectedTask) {
                // Show task details and hide empty state
                emptyState.style.display = 'none';
                taskDetails.style.display = 'grid';
                taskActionButtons.style.display = 'flex';

                // Disable action buttons for completed or cancelled tasks
                const isTaskActive = !['completed', 'cancelled'].includes(selectedTask.status);
                cancelTaskBtn.disabled = !isTaskActive;
                modifyTaskBtn.disabled = !isTaskActive;

                // Update task details
                taskTitle.textContent = selectedTask.title;
                taskDescription.textContent = selectedTask.details;

                // Status badge
                const statusConfig = {
                    'scheduled': {
                        class: 'status-scheduled',
                        label: 'Scheduled'
                    },
                    'in-progress': {
                        class: 'status-in-progress',
                        label: 'In Progress'
                    },
                    'arriving': {
                        class: 'status-arriving',
                        label: 'Arriving Soon'
                    },
                    'completed': {
                        class: 'status-completed',
                        label: 'Completed'
                    },
                    'cancelled': {
                        class: 'status-cancelled',
                        label: 'Cancelled'
                    }
                };

                const statusBadge = statusConfig[selectedTask.status] || statusConfig['scheduled'];
                taskStatus.innerHTML = `<span class="status-badge ${statusBadge.class}">${statusBadge.label}</span>`;

                taskPrice.textContent = selectedTask.price;
                taskCreated.textContent = selectedTask.createdAt;
                taskDeadline.textContent = selectedTask.deadline;

                // Provider info
                providerAvatar.src = selectedTask.provider.avatar;
                providerAvatar.alt = selectedTask.provider.name;
                providerName.textContent = selectedTask.provider.name;
                providerRating.textContent =
                    `${selectedTask.provider.rating} (${Math.floor(Math.random() * 50) + 10} reviews)`;

                // Map
                renderMap();

                // Timeline
                renderTimeline();
            }
        }

        // Render the map
        function renderMap() {
            if (selectedTask.location.coordinates) {
                mapContainer.innerHTML = `
                    <div class="map-placeholder">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="map-placeholder-text">Provider is ${selectedTask.location.current}</div>
                        <div class="map-placeholder-eta">ETA: ${selectedTask.location.eta}</div>
                    </div>
                `;
            } else {
                mapContainer.innerHTML = `
                    <div class="map-placeholder">
                        <div class="map-placeholder-text">Location tracking will be available when the task starts</div>
                    </div>
                `;
            }
        }

        // Render the timeline
        function renderTimeline() {
            taskTimeline.innerHTML = '';

            // Always show task accepted
            const acceptedItem = document.createElement('div');
            acceptedItem.className = 'timeline-item';
            acceptedItem.innerHTML = `
                <div class="timeline-icon completed">
                    <i class="fas fa-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="timeline-title">Task accepted by provider</div>
                    <div class="timeline-time">${selectedTask.createdAt}</div>
                </div>
            `;
            taskTimeline.appendChild(acceptedItem);

            // Show started if not scheduled
            if (selectedTask.status !== 'scheduled') {
                const startedItem = document.createElement('div');
                startedItem.className = 'timeline-item';
                startedItem.innerHTML = `
                    <div class="timeline-icon completed">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="timeline-content">
                        <div class="timeline-title">Provider started the task</div>
                        <div class="timeline-time">Today, 1:45 PM</div>
                    </div>
                `;
                taskTimeline.appendChild(startedItem);
            }

            // Show arriving if status is arriving
            if (selectedTask.status === 'arriving') {
                const arrivingItem = document.createElement('div');
                arrivingItem.className = 'timeline-item';
                arrivingItem.innerHTML = `
                    <div class="timeline-icon completed">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="timeline-content">
                        <div class="timeline-title">Provider is on the way</div>
                        <div class="timeline-time">Today, 2:10 PM</div>
                    </div>
                `;
                taskTimeline.appendChild(arrivingItem);
            }

            // Show cancelled if status is cancelled
            if (selectedTask.status === 'cancelled') {
                const cancelledItem = document.createElement('div');
                cancelledItem.className = 'timeline-item';
                cancelledItem.innerHTML = `
                    <div class="timeline-icon cancelled">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="timeline-content">
                        <div class="timeline-title">Task cancelled</div>
                        <div class="timeline-time">Today, 2:15 PM</div>
                    </div>
                `;
                taskTimeline.appendChild(cancelledItem);
            }

            // Show completed if status is completed
            if (selectedTask.status === 'completed') {
                const completedItem = document.createElement('div');
                completedItem.className = 'timeline-item';
                completedItem.innerHTML = `
                    <div class="timeline-icon completed">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="timeline-content">
                        <div class="timeline-title">Task completed</div>
                        <div class="timeline-time">Today, 2:45 PM</div>
                    </div>
                `;
                taskTimeline.appendChild(completedItem);
            }

            // Show estimated completion if not cancelled or completed
            if (selectedTask.status !== 'cancelled' && selectedTask.status !== 'completed') {
                const estimatedItem = document.createElement('div');
                estimatedItem.className = 'timeline-item';
                estimatedItem.innerHTML = `
                    <div class="timeline-icon pending">
                        <i class="far fa-clock"></i>
                    </div>
                    <div class="timeline-content">
                        <div class="timeline-title">Estimated completion</div>
                        <div class="timeline-time">${selectedTask.deadline}</div>
                    </div>
                `;
                taskTimeline.appendChild(estimatedItem);
            }
        }

        // Cancel a task
        function cancelTask(taskId) {
            // Update the task status in our mock data
            MOCK_TASKS.forEach(task => {
                if (task.id === taskId) {
                    task.status = 'cancelled';
                }
            });

            // Re-render the task list
            renderTaskList();

            // Update the selected task details
            selectTask(taskId);

            // Update the active state in the task list
            document.querySelectorAll('.task-item').forEach(item => {
                if (item.dataset.taskId === taskId) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }

        // Initialize the page when DOM is loaded
        document.addEventListener('DOMContentLoaded', init);
    </script>
</body>

</html>
