<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Reviews & Feedback</title>
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

        /* Form Section */
        .form-section {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
            overflow: hidden;
            margin-bottom: 2rem;
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

        /* Review Form */
        .review-form-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
        }

        @media (max-width: 768px) {
            .review-form-container {
                grid-template-columns: 1fr;
            }
        }

        .provider-card {
            background-color: var(--light-bg);
            border-radius: var(--radius-md);
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .provider-avatar {
            width: 5rem;
            height: 5rem;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .provider-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .provider-name {
            font-weight: 600;
            font-size: 1.125rem;
            margin-bottom: 0.25rem;
        }

        .provider-rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            margin-bottom: 0.75rem;
        }

        .provider-rating i {
            color: #ffc107;
            font-size: 0.875rem;
        }

        .provider-rating span {
            font-size: 0.875rem;
            color: var(--text-medium);
        }

        .task-details {
            margin-top: 1rem;
            width: 100%;
        }

        .task-detail-item {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid var(--border);
            font-size: 0.875rem;
        }

        .task-detail-item:last-child {
            border-bottom: none;
        }

        .task-detail-label {
            color: var(--text-medium);
        }

        .task-detail-value {
            font-weight: 500;
        }

        .rating-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .rating-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .rating-label {
            font-weight: 600;
            font-size: 0.875rem;
            display: flex;
            justify-content: space-between;
        }

        .rating-value {
            font-weight: 400;
            color: var(--text-medium);
        }

        .star-rating {
            display: flex;
            gap: 0.25rem;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            cursor: pointer;
            font-size: 1.5rem;
            color: #d1d5db;
            transition: var(--transition);
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input:checked~label {
            color: #ffc107;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            transition: var(--transition);
            resize: vertical;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-md);
            font-weight: 500;
            font-size: 0.875rem;
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
            border: 1px solid var(--border);
            color: var(--text-medium);
        }

        .btn-outline:hover {
            background-color: var(--light-bg);
        }

        .btn i {
            margin-right: 0.5rem;
        }

        /* Review History */
        .review-history-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .review-count {
            font-size: 0.875rem;
            color: var(--text-medium);
        }

        .review-filter {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .review-filter label {
            font-size: 0.875rem;
            color: var(--text-medium);
        }

        .review-filter select {
            padding: 0.5rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            color: var(--text-dark);
            background-color: var(--white);
        }

        .review-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .review-card {
            background-color: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            transition: var(--transition);
        }

        .review-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .review-card-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .review-provider {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .review-provider-avatar {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            overflow: hidden;
        }

        .review-provider-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .review-provider-info {
            display: flex;
            flex-direction: column;
        }

        .review-provider-name {
            font-weight: 600;
            font-size: 0.875rem;
        }

        .review-task-name {
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        .review-date {
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        .review-card-body {
            padding: 1.5rem;
        }

        .review-ratings {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .review-rating-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .review-rating-label {
            font-size: 0.75rem;
            color: var(--text-medium);
            margin-bottom: 0.25rem;
        }

        .review-rating-stars {
            display: flex;
            gap: 0.125rem;
        }

        .review-rating-stars i {
            color: #ffc107;
            font-size: 0.875rem;
        }

        .review-comment {
            font-size: 0.875rem;
            color: var(--text-medium);
            line-height: 1.5;
        }

        .review-card-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .review-overall {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .review-overall-label {
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        .review-overall-rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .review-overall-rating i {
            color: #ffc107;
            font-size: 0.875rem;
        }

        .review-overall-rating span {
            font-weight: 600;
            font-size: 0.875rem;
        }

        .review-actions {
            display: flex;
            gap: 0.5rem;
        }

        .review-action-btn {
            background: none;
            border: none;
            color: var(--text-medium);
            font-size: 0.875rem;
            cursor: pointer;
            padding: 0.25rem 0.5rem;
            border-radius: var(--radius-sm);
            transition: var(--transition);
        }

        .review-action-btn:hover {
            color: var(--primary);
            background-color: var(--light-bg);
        }

        .review-action-btn i {
            margin-right: 0.25rem;
        }

        /* Empty State */
        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            text-align: center;
        }

        .empty-state-icon {
            font-size: 3rem;
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        .empty-state-title {
            font-weight: 600;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .empty-state-text {
            color: var(--text-medium);
            max-width: 400px;
            margin: 0 auto 1.5rem;
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

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .review-ratings {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .review-rating-item {
                flex-direction: row;
                justify-content: space-between;
                width: 100%;
            }
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
                <li><a href="#">Active Tasks</a></li>
                <li><a href="#">Provider Selection</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Payment & Billing</a></li>
                <li><a href="#" class="active">Reviews</a></li>
                <li><a href="#">Profile & Settings</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">Reviews & Feedback</h1>
                <p class="page-subtitle">Rate providers and view your review history</p>
            </div>

            <!-- Review Form Section -->
            <div class="form-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-star"></i>
                        Leave a Review
                    </h2>
                </div>
                <div class="form-content">
                    <div class="review-form-container">
                        <!-- Provider Info -->
                        <div class="provider-card">
                            <div class="provider-avatar">
                                <img src="/placeholder.svg?height=100&width=100" alt="Michael Brown">
                            </div>
                            <div class="provider-name">Michael Brown</div>
                            <div class="provider-rating">
                                <i class="fas fa-star"></i>
                                <span>4.9 (42 reviews)</span>
                            </div>
                            <div class="task-details">
                                <div class="task-detail-item">
                                    <div class="task-detail-label">Task</div>
                                    <div class="task-detail-value">Package Delivery</div>
                                </div>
                                <div class="task-detail-item">
                                    <div class="task-detail-label">Date</div>
                                    <div class="task-detail-value">April 20, 2025</div>
                                </div>
                                <div class="task-detail-item">
                                    <div class="task-detail-label">Amount</div>
                                    <div class="task-detail-value">$10.00</div>
                                </div>
                                <div class="task-detail-item">
                                    <div class="task-detail-label">Status</div>
                                    <div class="task-detail-value">Completed</div>
                                </div>
                            </div>
                        </div>

                        <!-- Rating Form -->
                        <form class="rating-form">
                            <!-- Punctuality Rating -->
                            <div class="rating-group">
                                <div class="rating-label">
                                    <span>Punctuality</span>
                                    <span class="rating-value" id="punctualityValue">0/5</span>
                                </div>
                                <div class="star-rating" id="punctualityRating">
                                    <input type="radio" id="punctuality5" name="punctuality" value="5">
                                    <label for="punctuality5" class="fas fa-star"></label>
                                    <input type="radio" id="punctuality4" name="punctuality" value="4">
                                    <label for="punctuality4" class="fas fa-star"></label>
                                    <input type="radio" id="punctuality3" name="punctuality" value="3">
                                    <label for="punctuality3" class="fas fa-star"></label>
                                    <input type="radio" id="punctuality2" name="punctuality" value="2">
                                    <label for="punctuality2" class="fas fa-star"></label>
                                    <input type="radio" id="punctuality1" name="punctuality" value="1">
                                    <label for="punctuality1" class="fas fa-star"></label>
                                </div>
                            </div>

                            <!-- Communication Rating -->
                            <div class="rating-group">
                                <div class="rating-label">
                                    <span>Communication</span>
                                    <span class="rating-value" id="communicationValue">0/5</span>
                                </div>
                                <div class="star-rating" id="communicationRating">
                                    <input type="radio" id="communication5" name="communication" value="5">
                                    <label for="communication5" class="fas fa-star"></label>
                                    <input type="radio" id="communication4" name="communication" value="4">
                                    <label for="communication4" class="fas fa-star"></label>
                                    <input type="radio" id="communication3" name="communication" value="3">
                                    <label for="communication3" class="fas fa-star"></label>
                                    <input type="radio" id="communication2" name="communication" value="2">
                                    <label for="communication2" class="fas fa-star"></label>
                                    <input type="radio" id="communication1" name="communication" value="1">
                                    <label for="communication1" class="fas fa-star"></label>
                                </div>
                            </div>

                            <!-- Quality Rating -->
                            <div class="rating-group">
                                <div class="rating-label">
                                    <span>Quality of Service</span>
                                    <span class="rating-value" id="qualityValue">0/5</span>
                                </div>
                                <div class="star-rating" id="qualityRating">
                                    <input type="radio" id="quality5" name="quality" value="5">
                                    <label for="quality5" class="fas fa-star"></label>
                                    <input type="radio" id="quality4" name="quality" value="4">
                                    <label for="quality4" class="fas fa-star"></label>
                                    <input type="radio" id="quality3" name="quality" value="3">
                                    <label for="quality3" class="fas fa-star"></label>
                                    <input type="radio" id="quality2" name="quality" value="2">
                                    <label for="quality2" class="fas fa-star"></label>
                                    <input type="radio" id="quality1" name="quality" value="1">
                                    <label for="quality1" class="fas fa-star"></label>
                                </div>
                            </div>

                            <!-- Comments -->
                            <div class="form-group">
                                <label for="reviewComments" class="form-label">Comments</label>
                                <textarea id="reviewComments" class="form-control" rows="4"
                                    placeholder="Share your experience with this provider..."></textarea>
                            </div>

                            <!-- Form Actions -->
                            <div class="form-actions">
                                <button type="button" class="btn btn-outline">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane"></i>
                                    Submit Review
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Review History Section -->
            <div class="form-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-history"></i>
                        Review History
                    </h2>
                </div>
                <div class="form-content">
                    <div class="review-history-header">
                        <div class="review-count">
                            <span>5 reviews submitted</span>
                        </div>
                        <div class="review-filter">
                            <label for="sort-by">Sort by:</label>
                            <select id="sort-by">
                                <option value="newest">Newest First</option>
                                <option value="oldest">Oldest First</option>
                                <option value="highest-rating">Highest Rating</option>
                                <option value="lowest-rating">Lowest Rating</option>
                            </select>
                        </div>
                    </div>

                    <div class="review-list">
                        <!-- Review 1 -->
                        <div class="review-card">
                            <div class="review-card-header">
                                <div class="review-provider">
                                    <div class="review-provider-avatar">
                                        <img src="/placeholder.svg?height=60&width=60" alt="Sarah Wilson">
                                    </div>
                                    <div class="review-provider-info">
                                        <div class="review-provider-name">Sarah Wilson</div>
                                        <div class="review-task-name">Furniture Assembly</div>
                                    </div>
                                </div>
                                <div class="review-date">April 15, 2025</div>
                            </div>
                            <div class="review-card-body">
                                <div class="review-ratings">
                                    <div class="review-rating-item">
                                        <div class="review-rating-label">Punctuality</div>
                                        <div class="review-rating-stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="review-rating-item">
                                        <div class="review-rating-label">Communication</div>
                                        <div class="review-rating-stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="review-rating-item">
                                        <div class="review-rating-label">Quality</div>
                                        <div class="review-rating-stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-comment">
                                    Sarah was extremely professional and assembled my IKEA furniture perfectly. She
                                    arrived right on time and communicated clearly throughout the process. The quality
                                    of work was excellent!
                                </div>
                            </div>
                            <div class="review-card-footer">
                                <div class="review-overall">
                                    <div class="review-overall-label">Overall:</div>
                                    <div class="review-overall-rating">
                                        <i class="fas fa-star"></i>
                                        <span>4.7</span>
                                    </div>
                                </div>
                                <div class="review-actions">
                                    <button class="review-action-btn">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                    <button class="review-action-btn">
                                        <i class="fas fa-trash-alt"></i>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Review 2 -->
                        <div class="review-card">
                            <div class="review-card-header">
                                <div class="review-provider">
                                    <div class="review-provider-avatar">
                                        <img src="/placeholder.svg?height=60&width=60" alt="David Chen">
                                    </div>
                                    <div class="review-provider-info">
                                        <div class="review-provider-name">David Chen</div>
                                        <div class="review-task-name">Package Delivery</div>
                                    </div>
                                </div>
                                <div class="review-date">April 10, 2025</div>
                            </div>
                            <div class="review-card-body">
                                <div class="review-ratings">
                                    <div class="review-rating-item">
                                        <div class="review-rating-label">Punctuality</div>
                                        <div class="review-rating-stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="review-rating-item">
                                        <div class="review-rating-label">Communication</div>
                                        <div class="review-rating-stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="review-rating-item">
                                        <div class="review-rating-label">Quality</div>
                                        <div class="review-rating-stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-comment">
                                    David delivered my package safely and kept me updated throughout the process. He was
                                    slightly delayed due to traffic but communicated this promptly. Very satisfied with
                                    the service!
                                </div>
                            </div>
                            <div class="review-card-footer">
                                <div class="review-overall">
                                    <div class="review-overall-label">Overall:</div>
                                    <div class="review-overall-rating">
                                        <i class="fas fa-star"></i>
                                        <span>4.7</span>
                                    </div>
                                </div>
                                <div class="review-actions">
                                    <button class="review-action-btn">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                    <button class="review-action-btn">
                                        <i class="fas fa-trash-alt"></i>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Review 3 -->
                        <div class="review-card">
                            <div class="review-card-header">
                                <div class="review-provider">
                                    <div class="review-provider-avatar">
                                        <img src="/placeholder.svg?height=60&width=60" alt="Emily Rodriguez">
                                    </div>
                                    <div class="review-provider-info">
                                        <div class="review-provider-name">Emily Rodriguez</div>
                                        <div class="review-task-name">House Cleaning</div>
                                    </div>
                                </div>
                                <div class="review-date">April 5, 2025</div>
                            </div>
                            <div class="review-card-body">
                                <div class="review-ratings">
                                    <div class="review-rating-item">
                                        <div class="review-rating-label">Punctuality</div>
                                        <div class="review-rating-stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="review-rating-item">
                                        <div class="review-rating-label">Communication</div>
                                        <div class="review-rating-stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="review-rating-item">
                                        <div class="review-rating-label">Quality</div>
                                        <div class="review-rating-stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-comment">
                                    Emily did an outstanding job cleaning my home. She was thorough, efficient, and paid
                                    attention to every detail. My house has never looked better! Highly recommend her
                                    services.
                                </div>
                            </div>
                            <div class="review-card-footer">
                                <div class="review-overall">
                                    <div class="review-overall-label">Overall:</div>
                                    <div class="review-overall-rating">
                                        <i class="fas fa-star"></i>
                                        <span>5.0</span>
                                    </div>
                                </div>
                                <div class="review-actions">
                                    <button class="review-action-btn">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                    <button class="review-action-btn">
                                        <i class="fas fa-trash-alt"></i>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // DOM Elements
        const punctualityRating = document.getElementById('punctualityRating');
        const communicationRating = document.getElementById('communicationRating');
        const qualityRating = document.getElementById('qualityRating');
        const punctualityValue = document.getElementById('punctualityValue');
        const communicationValue = document.getElementById('communicationValue');
        const qualityValue = document.getElementById('qualityValue');
        const reviewForm = document.querySelector('.rating-form');
        const sortSelect = document.getElementById('sort-by');

        // Initialize the page
        function init() {
            setupEventListeners();
        }

        // Setup event listeners
        function setupEventListeners() {
            // Star rating functionality
            setupRatingListeners(punctualityRating, punctualityValue);
            setupRatingListeners(communicationRating, communicationValue);
            setupRatingListeners(qualityRating, qualityValue);

            // Form submission
            reviewForm.addEventListener('submit', (e) => {
                e.preventDefault();
                submitReview();
            });

            // Sort reviews
            sortSelect.addEventListener('change', () => {
                sortReviews(sortSelect.value);
            });

            // Edit review buttons
            document.querySelectorAll('.review-action-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const action = e.target.textContent.trim() || e.target.closest('.review-action-btn')
                        .textContent.trim();
                    const reviewCard = e.target.closest('.review-card');

                    if (action.includes('Edit')) {
                        editReview(reviewCard);
                    } else if (action.includes('Delete')) {
                        deleteReview(reviewCard);
                    }
                });
            });
        }

        // Setup star rating listeners
        function setupRatingListeners(ratingElement, valueElement) {
            const stars = ratingElement.querySelectorAll('input[type="radio"]');

            stars.forEach(star => {
                star.addEventListener('change', () => {
                    const value = star.value;
                    valueElement.textContent = `${value}/5`;
                });
            });
        }

        // Submit review
        function submitReview() {
            // Get form values
            const punctuality = document.querySelector('input[name="punctuality"]:checked')?.value || 0;
            const communication = document.querySelector('input[name="communication"]:checked')?.value || 0;
            const quality = document.querySelector('input[name="quality"]:checked')?.value || 0;
            const comments = document.getElementById('reviewComments').value;

            // Validate form
            if (punctuality === 0 || communication === 0 || quality === 0) {
                alert('Please rate all categories before submitting.');
                return;
            }

            if (comments.trim() === '') {
                alert('Please provide some comments about your experience.');
                return;
            }

            // Calculate overall rating
            const overall = ((parseInt(punctuality) + parseInt(communication) + parseInt(quality)) / 3).toFixed(1);

            // In a real app, this would send the review to the server
            alert(`Review submitted successfully! Overall rating: ${overall}/5`);

            // Reset form
            resetForm();
        }

        // Reset form
        function resetForm() {
            document.querySelectorAll('input[type="radio"]').forEach(input => {
                input.checked = false;
            });

            document.getElementById('reviewComments').value = '';
            punctualityValue.textContent = '0/5';
            communicationValue.textContent = '0/5';
            qualityValue.textContent = '0/5';
        }

        // Sort reviews
        function sortReviews(sortBy) {
            // In a real app, this would re-fetch or re-sort the reviews
            alert(`Sorting reviews by: ${sortBy}`);
        }

        // Edit review
        function editReview(reviewCard) {
            // In a real app, this would populate the form with the review data
            alert('Edit functionality would be implemented in a real app.');
        }

        // Delete review
        function deleteReview(reviewCard) {
            // In a real app, this would show a confirmation dialog and delete the review
            if (confirm('Are you sure you want to delete this review?')) {
                reviewCard.remove();
                alert('Review deleted successfully!');
            }
        }

        // Initialize the page when DOM is loaded
        document.addEventListener('DOMContentLoaded', init);
    </script>
</body>

</html>
