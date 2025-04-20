<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Post a Task</title>
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

        /* Task Form */
        .task-form-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .form-section {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .section-header {
            display: flex;
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

        .form-content {
            padding: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
            font-size: 0.875rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            font-family: 'Inter', sans-serif;
            font-size: 0.875rem;
            color: var(--text-dark);
            background-color: var(--white);
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-control::placeholder {
            color: var(--text-light);
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
            min-height: 120px;
            resize: vertical;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
        }

        .form-check:last-child {
            margin-bottom: 0;
        }

        .form-check-input {
            width: 1rem;
            height: 1rem;
            margin-right: 0.5rem;
            accent-color: var(--primary);
        }

        .form-check-label {
            font-size: 0.875rem;
            color: var(--text-dark);
        }

        .form-text {
            font-size: 0.75rem;
            color: var(--text-medium);
            margin-top: 0.25rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .file-upload {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            border: 2px dashed var(--border);
            border-radius: var(--radius-md);
            background-color: var(--off-white);
            transition: var(--transition);
            cursor: pointer;
        }

        .file-upload:hover {
            border-color: var(--primary-light);
            background-color: rgba(59, 130, 246, 0.05);
        }

        .file-upload-icon {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .file-upload-text {
            font-size: 0.875rem;
            color: var(--text-medium);
            text-align: center;
        }

        .file-upload-text strong {
            color: var(--primary);
            font-weight: 500;
        }

        .file-upload-input {
            display: none;
        }

        .uploaded-files {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .uploaded-file {
            display: flex;
            align-items: center;
            padding: 0.5rem 0.75rem;
            background-color: var(--off-white);
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            font-size: 0.75rem;
        }

        .uploaded-file-icon {
            margin-right: 0.5rem;
            color: var(--primary);
        }

        .uploaded-file-name {
            margin-right: 0.5rem;
        }

        .uploaded-file-remove {
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            font-size: 0.75rem;
            transition: var(--transition);
        }

        .uploaded-file-remove:hover {
            color: var(--danger);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
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

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background-color: var(--primary);
            color: var(--white);
        }

        .btn-lg {
            padding: 0.875rem 1.75rem;
            font-size: 1rem;
        }

        .btn i {
            margin-right: 0.5rem;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        /* Task Type Cards */
        .task-types {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .task-type-card {
            position: relative;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            padding: 1rem;
            cursor: pointer;
            transition: var(--transition);
            background-color: var(--white);
        }

        .task-type-card:hover {
            border-color: var(--primary-light);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .task-type-card.active {
            border-color: var(--primary);
            background-color: rgba(37, 99, 235, 0.05);
        }

        .task-type-card.active::before {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            color: var(--primary);
            font-size: 0.75rem;
            width: 1.25rem;
            height: 1.25rem;
            border-radius: 50%;
            background-color: rgba(37, 99, 235, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .task-type-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: var(--radius-md);
            background-color: rgba(37, 99, 235, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .task-type-title {
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .task-type-desc {
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        /* Service Recommendations */
        .provider-recommendations {
            margin-top: 1.5rem;
        }

        .provider-card {
            display: flex;
            align-items: center;
            padding: 1rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            margin-bottom: 1rem;
            background-color: var(--white);
            transition: var(--transition);
        }

        .provider-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-light);
        }

        .provider-card:last-child {
            margin-bottom: 0;
        }

        .provider-avatar {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .provider-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .provider-info {
            flex-grow: 1;
        }

        .provider-name {
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .provider-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.25rem;
        }

        .provider-rating {
            display: flex;
            align-items: center;
            font-size: 0.75rem;
        }

        .provider-rating i {
            color: #ffc107;
            margin-right: 0.25rem;
        }

        .provider-tasks {
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        .provider-tags {
            display: flex;
            gap: 0.5rem;
        }

        .provider-tag {
            font-size: 0.625rem;
            padding: 0.125rem 0.375rem;
            border-radius: 1rem;
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--secondary);
        }

        .pricing-info {
            margin-top: 1.5rem;
        }

        .pricing-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--border);
        }

        .pricing-item:last-child {
            border-bottom: none;
        }

        .pricing-label {
            font-size: 0.875rem;
            color: var(--text-medium);
        }

        .pricing-value {
            font-weight: 600;
            font-size: 0.875rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .task-form-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .task-types {
                grid-template-columns: 1fr;
            }

            .form-row {
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
                <li><a href="#" class="active">Post a Task</a></li>
                <li><a href="#">Active Tasks</a></li>
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
                <h1 class="page-title">Post a New Task</h1>
                <p class="page-subtitle">Fill in the details below to create your task and find the perfect provider</p>
            </div>

            <!-- Task Form -->
            <div class="task-form-container">
                <!-- Task Details Form -->
                <div class="form-section">
                    <div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-clipboard-list"></i>
                            Task Details
                        </h2>
                    </div>
                    <div class="form-content">
                        <div class="form-group">
                            <label class="form-label">Task Type</label>
                            <div class="task-types">
                                <div class="task-type-card active">
                                    <div class="task-type-icon">
                                        <i class="fas fa-box"></i>
                                    </div>
                                    <div class="task-type-title">Delivery</div>
                                    <div class="task-type-desc">Package pickup and delivery services</div>
                                </div>
                                <div class="task-type-card">
                                    <div class="task-type-icon">
                                        <i class="fas fa-running"></i>
                                    </div>
                                    <div class="task-type-title">Errand</div>
                                    <div class="task-type-desc">Shopping, returns, and other errands</div>
                                </div>
                                <div class="task-type-card">
                                    <div class="task-type-icon">
                                        <i class="fas fa-tools"></i>
                                    </div>
                                    <div class="task-type-title">Small Job</div>
                                    <div class="task-type-desc">Assembly, repairs, and other small tasks</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="taskTitle" class="form-label">Task Title</label>
                            <input type="text" id="taskTitle" class="form-control"
                                placeholder="E.g., Furniture Assembly, Grocery Delivery">
                        </div>

                        <div class="form-group">
                            <label for="taskDescription" class="form-label">Task Description</label>
                            <textarea id="taskDescription" class="form-control form-textarea"
                                placeholder="Provide details about what you need done..."></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="taskLocation" class="form-label">Location</label>
                                <input type="text" id="taskLocation" class="form-control"
                                    placeholder="Enter address">
                            </div>
                            <div class="form-group">
                                <label for="taskDate" class="form-label">Date & Time</label>
                                <input type="datetime-local" id="taskDate" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="taskBudget" class="form-label">Budget</label>
                                <input type="number" id="taskBudget" class="form-control"
                                    placeholder="Enter amount in $">
                                <div class="form-text">Suggested range: $25 - $75 based on similar tasks</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Task Options</label>
                                <div class="form-check">
                                    <input type="checkbox" id="emergencyPriority" class="form-check-input">
                                    <label for="emergencyPriority" class="form-check-label">Mark as emergency priority
                                        (+$15)</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="recurringTask" class="form-check-input">
                                    <label for="recurringTask" class="form-check-label">Set as recurring task (save
                                        15%)</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Upload Reference Files</label>
                            <div class="file-upload">
                                <input type="file" id="fileUpload" class="file-upload-input" multiple>
                                <div class="file-upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="file-upload-text">
                                    <p>Drag and drop files here or <strong>browse</strong></p>
                                    <p>Supports images, PDFs, and documents up to 10MB</p>
                                </div>
                            </div>
                            <div class="uploaded-files">
                                <div class="uploaded-file">
                                    <i class="fas fa-file-image uploaded-file-icon"></i>
                                    <span class="uploaded-file-name">shopping-list.jpg</span>
                                    <button class="uploaded-file-remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button class="btn btn-outline">Save as Draft</button>
                            <button class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane"></i>
                                Post Task
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Service Recommendations -->
                <div class="form-section">
                    <div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-lightbulb"></i>
                            Recommendations
                        </h2>
                    </div>
                    <div class="form-content">
                        <h3 class="form-label">Suggested Providers</h3>
                        <div class="provider-recommendations">
                            <div class="provider-card">
                                <div class="provider-avatar">
                                    <img src="/placeholder.svg?height=60&width=60" alt="Provider">
                                </div>
                                <div class="provider-info">
                                    <div class="provider-name">Michael Brown</div>
                                    <div class="provider-meta">
                                        <div class="provider-rating">
                                            <i class="fas fa-star"></i>
                                            <span>4.9 (42 reviews)</span>
                                        </div>
                                        <div class="provider-tasks">
                                            <i class="fas fa-check-circle"></i>
                                            <span>38 deliveries</span>
                                        </div>
                                    </div>
                                    <div class="provider-tags">
                                        <span class="provider-tag">Fast Delivery</span>
                                        <span class="provider-tag">Top Rated</span>
                                    </div>
                                </div>
                            </div>

                            <div class="provider-card">
                                <div class="provider-avatar">
                                    <img src="/placeholder.svg?height=60&width=60" alt="Provider">
                                </div>
                                <div class="provider-info">
                                    <div class="provider-name">Sarah Wilson</div>
                                    <div class="provider-meta">
                                        <div class="provider-rating">
                                            <i class="fas fa-star"></i>
                                            <span>4.7 (38 reviews)</span>
                                        </div>
                                        <div class="provider-tasks">
                                            <i class="fas fa-check-circle"></i>
                                            <span>24 deliveries</span>
                                        </div>
                                    </div>
                                    <div class="provider-tags">
                                        <span class="provider-tag">Reliable</span>
                                        <span class="provider-tag">On Time</span>
                                    </div>
                                </div>
                            </div>

                            <div class="provider-card">
                                <div class="provider-avatar">
                                    <img src="/placeholder.svg?height=60&width=60" alt="Provider">
                                </div>
                                <div class="provider-info">
                                    <div class="provider-name">David Chen</div>
                                    <div class="provider-meta">
                                        <div class="provider-rating">
                                            <i class="fas fa-star"></i>
                                            <span>4.5 (27 reviews)</span>
                                        </div>
                                        <div class="provider-tasks">
                                            <i class="fas fa-check-circle"></i>
                                            <span>19 deliveries</span>
                                        </div>
                                    </div>
                                    <div class="provider-tags">
                                        <span class="provider-tag">Careful</span>
                                        <span class="provider-tag">Friendly</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="form-label">Estimated Pricing</h3>
                        <div class="pricing-info">
                            <div class="pricing-item">
                                <div class="pricing-label">Average for Delivery Tasks</div>
                                <div class="pricing-value">$35 - $50</div>
                            </div>
                            <div class="pricing-item">
                                <div class="pricing-label">Emergency Priority Fee</div>
                                <div class="pricing-value">+$15</div>
                            </div>
                            <div class="pricing-item">
                                <div class="pricing-label">Recurring Task Discount</div>
                                <div class="pricing-value">-15%</div>
                            </div>
                            <div class="pricing-item">
                                <div class="pricing-label">Service Fee</div>
                                <div class="pricing-value">$5.99</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Task Type Selection
        document.addEventListener('DOMContentLoaded', function() {
            const taskTypeCards = document.querySelectorAll('.task-type-card');

            taskTypeCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Remove active class from all cards
                    taskTypeCards.forEach(c => c.classList.remove('active'));

                    // Add active class to clicked card
                    this.classList.add('active');
                });
            });

            // File Upload Handling
            const fileUpload = document.getElementById('fileUpload');
            const fileUploadContainer = document.querySelector('.file-upload');

            fileUploadContainer.addEventListener('click', function() {
                fileUpload.click();
            });

            fileUploadContainer.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.style.borderColor = 'var(--primary)';
                this.style.backgroundColor = 'rgba(59, 130, 246, 0.05)';
            });

            fileUploadContainer.addEventListener('dragleave', function() {
                this.style.borderColor = 'var(--border)';
                this.style.backgroundColor = 'var(--off-white)';
            });

            fileUploadContainer.addEventListener('drop', function(e) {
                e.preventDefault();
                this.style.borderColor = 'var(--border)';
                this.style.backgroundColor = 'var(--off-white)';

                // Handle file upload logic here
                console.log('Files dropped:', e.dataTransfer.files);
            });

            // Remove uploaded file
            const removeButtons = document.querySelectorAll('.uploaded-file-remove');
            removeButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    this.closest('.uploaded-file').remove();
                });
            });
        });
    </script>
</body>

</html>
