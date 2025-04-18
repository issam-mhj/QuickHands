<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Messages/Inbox - QuickHands</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #FF7D5C;
            --primary-light: #FFE8E2;
            --secondary: #2CCCC3;
            --secondary-light: #E5F7F6;
            --dark: #333333;
            --gray: #6C757D;
            --light-gray: #E9ECEF;
            --lighter-gray: #F8F9FA;
            --white: #FFFFFF;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --info: #17a2b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Header Styles */
        header {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .logo i {
            margin-right: 10px;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 30px;
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

        .user-actions {
            display: flex;
            align-items: center;
        }

        .notification-bell {
            position: relative;
            margin-right: 20px;
            cursor: pointer;
        }

        .notification-bell i {
            font-size: 20px;
            color: var(--gray);
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
            font-size: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .user-profile {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .user-name {
            font-weight: 600;
        }

        /* Main Content Styles */
        .main-content {
            padding: 30px 0;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 600;
            color: var(--dark);
        }

        .page-actions {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: #ff6a45;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--gray);
            color: var(--gray);
        }

        .btn-outline:hover {
            background-color: var(--light-gray);
        }

        /* Dashboard Stats */
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: var(--white);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .stat-title {
            font-size: 14px;
            color: var(--gray);
            font-weight: 500;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
        }

        .icon-primary {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        .icon-secondary {
            background-color: var(--secondary-light);
            color: var(--secondary);
        }

        .icon-success {
            background-color: #e5f7ed;
            color: var(--success);
        }

        .icon-warning {
            background-color: #fff8e5;
            color: var(--warning);
        }

        .stat-value {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .stat-change {
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .change-positive {
            color: var(--success);
        }

        .change-negative {
            color: var(--danger);
        }

        /* Messages Section */
        .messages-container {
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 20px;
            height: calc(100vh - 250px);
            min-height: 600px;
        }

        .conversation-list {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .conversation-header {
            padding: 20px;
            border-bottom: 1px solid var(--light-gray);
        }

        .search-bar {
            position: relative;
            margin-bottom: 15px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border-radius: 8px;
            border: 1px solid var(--light-gray);
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .search-bar input:focus {
            outline: none;
            border-color: var(--primary);
        }

        .search-bar i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .conversation-filters {
            display: flex;
            gap: 10px;
        }

        .filter-btn {
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }

        .filter-btn.active {
            background-color: var(--primary);
            color: white;
        }

        .filter-btn:not(.active) {
            background-color: var(--light-gray);
            color: var(--gray);
        }

        .conversations {
            overflow-y: auto;
            flex-grow: 1;
        }

        .conversation-item {
            padding: 15px 20px;
            display: flex;
            gap: 15px;
            border-bottom: 1px solid var(--light-gray);
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .conversation-item:hover {
            background-color: var(--lighter-gray);
        }

        .conversation-item.active {
            background-color: var(--primary-light);
            border-left: 3px solid var(--primary);
        }

        .conversation-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .conversation-details {
            flex-grow: 1;
            overflow: hidden;
        }

        .conversation-header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .conversation-name {
            font-weight: 600;
            font-size: 15px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .conversation-time {
            font-size: 12px;
            color: var(--gray);
        }

        .conversation-preview {
            font-size: 13px;
            color: var(--gray);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .unread-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--primary);
            display: inline-block;
        }

        .task-badge {
            font-size: 11px;
            padding: 3px 8px;
            border-radius: 12px;
            margin-left: 5px;
        }

        .task-active {
            background-color: var(--secondary-light);
            color: var(--secondary);
        }

        .task-completed {
            background-color: #e5f7ed;
            color: var(--success);
        }

        /* Chat Area */
        .chat-area {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .chat-header {
            padding: 15px 20px;
            border-bottom: 1px solid var(--light-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .chat-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
        }

        .chat-user-details h4 {
            font-weight: 600;
            margin-bottom: 3px;
        }

        .chat-user-details p {
            font-size: 13px;
            color: var(--gray);
        }

        .chat-actions {
            display: flex;
            gap: 15px;
        }

        .chat-action-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--light-gray);
            color: var(--gray);
            cursor: pointer;
            transition: all 0.3s;
        }

        .chat-action-btn:hover {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        .chat-messages {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
            background-color: #f9f9f9;
        }

        .message {
            max-width: 70%;
            padding: 12px 15px;
            border-radius: 12px;
            position: relative;
        }

        .message-time {
            font-size: 11px;
            color: var(--gray);
            margin-top: 5px;
            text-align: right;
        }

        .message-received {
            align-self: flex-start;
            background-color: var(--light-gray);
            border-bottom-left-radius: 0;
        }

        .message-sent {
            align-self: flex-end;
            background-color: var(--primary-light);
            color: var(--dark);
            border-bottom-right-radius: 0;
        }

        .message-image {
            max-width: 100%;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 5px;
        }

        .message-file {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: var(--white);
            padding: 10px;
            border-radius: 8px;
            margin-top: 5px;
        }

        .file-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background-color: var(--light-gray);
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--gray);
        }

        .file-details {
            flex-grow: 1;
            overflow: hidden;
        }

        .file-name {
            font-size: 13px;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .file-size {
            font-size: 11px;
            color: var(--gray);
        }

        .file-download {
            color: var(--primary);
            cursor: pointer;
        }

        .date-divider {
            display: flex;
            align-items: center;
            color: var(--gray);
            font-size: 12px;
            margin: 15px 0;
        }

        .date-divider::before,
        .date-divider::after {
            content: "";
            flex-grow: 1;
            height: 1px;
            background-color: var(--light-gray);
        }

        .date-divider::before {
            margin-right: 15px;
        }

        .date-divider::after {
            margin-left: 15px;
        }

        .typing-indicator {
            display: flex;
            align-items: center;
            gap: 5px;
            color: var(--gray);
            font-size: 13px;
            padding: 0 20px;
            height: 30px;
        }

        .typing-dots {
            display: flex;
            gap: 3px;
        }

        .typing-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: var(--gray);
            animation: typingAnimation 1.5s infinite ease-in-out;
        }

        .typing-dot:nth-child(1) {
            animation-delay: 0s;
        }

        .typing-dot:nth-child(2) {
            animation-delay: 0.3s;
        }

        .typing-dot:nth-child(3) {
            animation-delay: 0.6s;
        }

        @keyframes typingAnimation {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }

            100% {
                transform: translateY(0);
            }
        }

        .chat-input-area {
            padding: 15px 20px;
            border-top: 1px solid var(--light-gray);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .attachment-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--light-gray);
            color: var(--gray);
            cursor: pointer;
            transition: all 0.3s;
        }

        .attachment-btn:hover {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        .message-input {
            flex-grow: 1;
            position: relative;
        }

        .message-input textarea {
            width: 100%;
            padding: 12px 15px;
            border-radius: 25px;
            border: 1px solid var(--light-gray);
            font-size: 14px;
            resize: none;
            max-height: 100px;
            transition: border-color 0.3s;
            font-family: 'Poppins', sans-serif;
        }

        .message-input textarea:focus {
            outline: none;
            border-color: var(--primary);
        }

        .emoji-btn {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            cursor: pointer;
            transition: color 0.3s;
        }

        .emoji-btn:hover {
            color: var(--primary);
        }

        .send-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--primary);
            color: white;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }

        .send-btn:hover {
            background-color: #ff6a45;
        }

        /* Task Details Sidebar */
        .task-details {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-top: 20px;
        }

        .task-details-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .task-details-title {
            font-size: 18px;
            font-weight: 600;
        }

        .task-details-toggle {
            color: var(--primary);
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .task-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }

        .task-info-item {
            display: flex;
            flex-direction: column;
        }

        .task-info-label {
            font-size: 12px;
            color: var(--gray);
            margin-bottom: 5px;
        }

        .task-info-value {
            font-size: 14px;
            font-weight: 500;
        }

        .task-status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-in-progress {
            background-color: var(--secondary-light);
            color: var(--secondary);
        }

        .task-description {
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .task-actions {
            display: flex;
            gap: 10px;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .dashboard-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .messages-container {
                grid-template-columns: 1fr;
            }

            .conversation-list {
                display: none;
            }

            .conversation-list.active {
                display: flex;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 10;
            }

            .back-to-list {
                display: flex;
                align-items: center;
                gap: 10px;
                color: var(--primary);
                cursor: pointer;
                margin-bottom: 15px;
            }
        }

        @media (max-width: 768px) {
            .dashboard-stats {
                grid-template-columns: 1fr;
            }

            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        /* Notification Dropdown */
        .notification-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            width: 300px;
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none;
        }

        .notification-dropdown.show {
            display: block;
        }

        .notification-header {
            padding: 15px;
            border-bottom: 1px solid var(--light-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notification-title {
            font-weight: 600;
        }

        .mark-all-read {
            color: var(--primary);
            font-size: 12px;
            cursor: pointer;
        }

        .notification-list {
            max-height: 300px;
            overflow-y: auto;
        }

        .notification-item {
            padding: 15px;
            border-bottom: 1px solid var(--light-gray);
            display: flex;
            gap: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .notification-item:hover {
            background-color: var(--lighter-gray);
        }

        .notification-item.unread {
            background-color: var(--primary-light);
        }

        .notification-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
        }

        .notification-content {
            flex-grow: 1;
        }

        .notification-message {
            font-size: 13px;
            margin-bottom: 5px;
        }

        .notification-time {
            font-size: 11px;
            color: var(--gray);
        }

        .notification-footer {
            padding: 15px;
            text-align: center;
            border-top: 1px solid var(--light-gray);
        }

        .view-all-notifications {
            color: var(--primary);
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <div class="container header-container">
            <a href="#" class="logo">
                <i class="fas fa-hands-helping"></i>
                QuickHands
            </a>
            <ul class="nav-links">
                <li><a href="provider-dashboard.html">Dashboard</a></li>
                <li><a href="provider-available-tasks.html">Available Tasks</a></li>
                <li><a href="provider-task-management.html">My Tasks</a></li>
                <li><a href="provider-earnings-payments.html">Earnings</a></li>
                <li><a href="provider-reviews-ratings.html">Reviews</a></li>
            </ul>
            <div class="user-actions">
                <div class="notification-bell">
                    <i class="far fa-bell"></i>
                    <span class="notification-count">3</span>
                </div>
                <div class="user-profile">
                    <img src="/placeholder.svg?height=40&width=40" alt="User Avatar" class="user-avatar">
                    <span class="user-name">John D.</span>
                </div>
            </div>
        </div>
    </header>

    <div class="container main-content">
        <div class="page-header">
            <h1 class="page-title">Messages</h1>
            <div class="page-actions">
                <button class="btn btn-outline">
                    <i class="fas fa-filter"></i>
                    Filter
                </button>
                <button class="btn btn-primary">
                    <i class="fas fa-bell"></i>
                    Notification Settings
                </button>
            </div>
        </div>

        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Unread Messages</div>
                    <div class="stat-icon icon-primary">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                <div class="stat-value">12</div>
                <div class="stat-change change-positive">
                    <i class="fas fa-arrow-up"></i>
                    3 new since yesterday
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Active Conversations</div>
                    <div class="stat-icon icon-secondary">
                        <i class="fas fa-comments"></i>
                    </div>
                </div>
                <div class="stat-value">8</div>
                <div class="stat-change">
                    <i class="fas fa-minus"></i>
                    No change
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Response Rate</div>
                    <div class="stat-icon icon-success">
                        <i class="fas fa-reply"></i>
                    </div>
                </div>
                <div class="stat-value">98%</div>
                <div class="stat-change change-positive">
                    <i class="fas fa-arrow-up"></i>
                    2% from last week
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Avg. Response Time</div>
                    <div class="stat-icon icon-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="stat-value">5 min</div>
                <div class="stat-change change-positive">
                    <i class="fas fa-arrow-down"></i>
                    2 min from last week
                </div>
            </div>
        </div>

        <div class="messages-container">
            <div class="conversation-list">
                <div class="conversation-header">
                    <div class="search-bar">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search conversations...">
                    </div>
                    <div class="conversation-filters">
                        <button class="filter-btn active">All</button>
                        <button class="filter-btn">Active Tasks</button>
                        <button class="filter-btn">Completed</button>
                    </div>
                </div>
                <div class="conversations">
                    <div class="conversation-item active">
                        <img src="/placeholder.svg?height=50&width=50" alt="Sarah Johnson" class="conversation-avatar">
                        <div class="conversation-  alt="Sarah Johnson" class="conversation-avatar">
                            <div class="conversation-details">
                                <div class="conversation-header-row">
                                    <div class="conversation-name">Sarah Johnson</div>
                                    <div class="conversation-time">10:23 AM</div>
                                </div>
                                <div class="conversation-preview">
                                    <span class="unread-indicator"></span>
                                    Can you deliver the package by 3 PM?
                                    <span class="task-badge task-active">Active</span>
                                </div>
                            </div>
                        </div>
                        <div class="conversation-item">
                            <img src="/placeholder.svg?height=50&width=50" alt="Michael Brown"
                                class="conversation-avatar">
                            <div class="conversation-details">
                                <div class="conversation-header-row">
                                    <div class="conversation-name">Michael Brown</div>
                                    <div class="conversation-time">Yesterday</div>
                                </div>
                                <div class="conversation-preview">
                                    Thanks for your help with the furniture assembly!
                                    <span class="task-badge task-completed">Completed</span>
                                </div>
                            </div>
                        </div>
                        <div class="conversation-item">
                            <img src="/placeholder.svg?height=50&width=50" alt="Emily Davis"
                                class="conversation-avatar">
                            <div class="conversation-details">
                                <div class="conversation-header-row">
                                    <div class="conversation-name">Emily Davis</div>
                                    <div class="conversation-time">Yesterday</div>
                                </div>
                                <div class="conversation-preview">
                                    <span class="unread-indicator"></span>
                                    I've sent you the address for the grocery pickup
                                </div>
                            </div>
                        </div>
                        <div class="conversation-item">
                            <img src="/placeholder.svg?height=50&width=50" alt="David Wilson"
                                class="conversation-avatar">
                            <div class="conversation-details">
                                <div class="conversation-header-row">
                                    <div class="conversation-name">David Wilson</div>
                                    <div class="conversation-time">Monday</div>
                                </div>
                                <div class="conversation-preview">
                                    Perfect! The lawn looks great. Thank you!
                                    <span class="task-badge task-completed">Completed</span>
                                </div>
                            </div>
                        </div>
                        <div class="conversation-item">
                            <img src="/placeholder.svg?height=50&width=50" alt="Jennifer Lee"
                                class="conversation-avatar">
                            <div class="conversation-details">
                                <div class="conversation-header-row">
                                    <div class="conversation-name">Jennifer Lee</div>
                                    <div class="conversation-time">Monday</div>
                                </div>
                                <div class="conversation-preview">
                                    <span class="unread-indicator"></span>
                                    Are you available for a dog walking task tomorrow?
                                </div>
                            </div>
                        </div>
                        <div class="conversation-item">
                            <img src="/placeholder.svg?height=50&width=50" alt="Robert Taylor"
                                class="conversation-avatar">
                            <div class="conversation-details">
                                <div class="conversation-header-row">
                                    <div class="conversation-name">Robert Taylor</div>
                                    <div class="conversation-time">Sunday</div>
                                </div>
                                <div class="conversation-preview">
                                    I've updated the task details for the house cleaning
                                    <span class="task-badge task-active">Active</span>
                                </div>
                            </div>
                        </div>
                        <div class="conversation-item">
                            <img src="/placeholder.svg?height=50&width=50" alt="Lisa Anderson"
                                class="conversation-avatar">
                            <div class="conversation-details">
                                <div class="conversation-header-row">
                                    <div class="conversation-name">Lisa Anderson</div>
                                    <div class="conversation-time">Last week</div>
                                </div>
                                <div class="conversation-preview">
                                    The delivery was on time. Thanks for your help!
                                    <span class="task-badge task-completed">Completed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="chat-area">
                    <div class="chat-header">
                        <div class="chat-user-info">
                            <img src="/placeholder.svg?height=45&width=45" alt="Sarah Johnson" class="chat-avatar">
                            <div class="chat-user-details">
                                <h4>Sarah Johnson</h4>
                                <p>Package Delivery • 2.5 miles away</p>
                            </div>
                        </div>
                        <div class="chat-actions">
                            <div class="chat-action-btn">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="chat-action-btn">
                                <i class="fas fa-video"></i>
                            </div>
                            <div class="chat-action-btn">
                                <i class="fas fa-info-circle"></i>
                            </div>
                        </div>
                    </div>

                    <div class="chat-messages">
                        <div class="date-divider">Yesterday</div>

                        <div class="message message-received">
                            <div>Hi! I need help with a package delivery. Are you available tomorrow afternoon?</div>
                            <div class="message-time">2:15 PM</div>
                        </div>

                        <div class="message message-sent">
                            <div>Hello Sarah! Yes, I'm available tomorrow afternoon. What time do you need the delivery
                                done?</div>
                            <div class="message-time">2:18 PM</div>
                        </div>

                        <div class="message message-received">
                            <div>Great! I need it delivered by 3 PM. It's a small package, about the size of a shoebox.
                            </div>
                            <div class="message-time">2:20 PM</div>
                        </div>

                        <div class="message message-sent">
                            <div>That works for me. Can you provide the pickup and delivery addresses?</div>
                            <div class="message-time">2:22 PM</div>
                        </div>

                        <div class="message message-received">
                            <div>Pickup: 123 Oak Street, Apt 4B. Delivery: 456 Pine Avenue, Suite 302. Both are in
                                downtown.</div>
                            <div class="message-time">2:25 PM</div>
                        </div>

                        <div class="date-divider">Today</div>

                        <div class="message message-received">
                            <div>Good morning! Just checking if we're still on for the delivery today?</div>
                            <div class="message-time">9:45 AM</div>
                        </div>

                        <div class="message message-sent">
                            <div>Good morning Sarah! Yes, we're still on for today. I'll pick up the package around 2 PM
                                and deliver it by 3 PM as requested.</div>
                            <div class="message-time">9:50 AM</div>
                        </div>

                        <div class="message message-received">
                            <div>Perfect! I've left instructions with the doorman at the pickup location. Here's a photo
                                of the package:</div>
                            <img src="/placeholder.svg?height=200&width=300" alt="Package Photo"
                                class="message-image">
                            <div class="message-time">10:05 AM</div>
                        </div>

                        <div class="message message-sent">
                            <div>Got it! I'll make sure to handle it carefully. Is there a specific person I should ask
                                for at the delivery location?</div>
                            <div class="message-time">10:10 AM</div>
                        </div>

                        <div class="message message-received">
                            <div>Yes, please ask for Mr. Thompson at the front desk. Also, here's the receipt for the
                                package that you'll need to show:</div>
                            <div class="message-file">
                                <div class="file-icon">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <div class="file-details">
                                    <div class="file-name">delivery_receipt.pdf</div>
                                    <div class="file-size">245 KB</div>
                                </div>
                                <div class="file-download">
                                    <i class="fas fa-download"></i>
                                </div>
                            </div>
                            <div class="message-time">10:23 AM</div>
                        </div>
                    </div>

                    <div class="typing-indicator">
                        <span>Sarah is typing</span>
                        <div class="typing-dots">
                            <div class="typing-dot"></div>
                            <div class="typing-dot"></div>
                            <div class="typing-dot"></div>
                        </div>
                    </div>

                    <div class="chat-input-area">
                        <div class="attachment-btn">
                            <i class="fas fa-paperclip"></i>
                        </div>
                        <div class="message-input">
                            <textarea placeholder="Type a message..."></textarea>
                            <div class="emoji-btn">
                                <i class="far fa-smile"></i>
                            </div>
                        </div>
                        <button class="send-btn">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="task-details">
                <div class="task-details-header">
                    <h3 class="task-details-title">Task Details</h3>
                    <div class="task-details-toggle">
                        <i class="fas fa-chevron-up"></i>
                        Hide
                    </div>
                </div>
                <div class="task-info">
                    <div class="task-info-item">
                        <div class="task-info-label">Task ID</div>
                        <div class="task-info-value">#T-78945</div>
                    </div>
                    <div class="task-info-item">
                        <div class="task-info-label">Status</div>
                        <div class="task-info-value">
                            <span class="task-status status-in-progress">In Progress</span>
                        </div>
                    </div>
                    <div class="task-info-item">
                        <div class="task-info-label">Due Date</div>
                        <div class="task-info-value">Today, 3:00 PM</div>
                    </div>
                    <div class="task-info-item">
                        <div class="task-info-label">Payment</div>
                        <div class="task-info-value">$25.00</div>
                    </div>
                </div>
                <div class="task-description">
                    Package delivery from 123 Oak Street, Apt 4B to 456 Pine Avenue, Suite 302. Small package, handle
                    with care. Recipient: Mr. Thompson.
                </div>
                <div class="task-actions">
                    <button class="btn btn-outline">View Full Details</button>
                    <button class="btn btn-primary">Update Status</button>
                </div>
            </div>
        </div>

        <script>
            // Toggle notification dropdown
            document.querySelector('.notification-bell').addEventListener('click', function() {
                // Implementation would go here
                alert('Notification panel would open here');
            });

            // Toggle task details
            document.querySelector('.task-details-toggle').addEventListener('click', function() {
                const taskDetails = document.querySelector('.task-details');
                const taskDetailsContent = taskDetails.querySelector('.task-info').parentElement;
                const toggleIcon = this.querySelector('i');
                const toggleText = this.textContent.trim();

                if (toggleText === 'Hide') {
                    taskDetailsContent.style.display = 'none';
                    toggleIcon.className = 'fas fa-chevron-down';
                    this.innerHTML = '<i class="fas fa-chevron-down"></i> Show';
                } else {
                    taskDetailsContent.style.display = 'block';
                    toggleIcon.className = 'fas fa-chevron-up';
                    this.innerHTML = '<i class="fas fa-chevron-up"></i> Hide';
                }
            });

            // Send message
            document.querySelector('.send-btn').addEventListener('click', function() {
                const messageInput = document.querySelector('.message-input textarea');
                const message = messageInput.value.trim();

                if (message) {
                    const chatMessages = document.querySelector('.chat-messages');
                    const newMessage = document.createElement('div');
                    newMessage.className = 'message message-sent fade-in';

                    const messageContent = document.createElement('div');
                    messageContent.textContent = message;

                    const messageTime = document.createElement('div');
                    messageTime.className = 'message-time';

                    // Get current time
                    const now = new Date();
                    let hours = now.getHours();
                    const minutes = now.getMinutes().toString().padStart(2, '0');
                    const ampm = hours >= 12 ? 'PM' : 'AM';
                    hours = hours % 12;
                    hours = hours ? hours : 12;

                    messageTime.textContent = `${hours}:${minutes} ${ampm}`;

                    newMessage.appendChild(messageContent);
                    newMessage.appendChild(messageTime);
                    chatMessages.appendChild(newMessage);

                    // Clear input
                    messageInput.value = '';

                    // Scroll to bottom
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
            });

            // Handle Enter key in textarea
            document.querySelector('.message-input textarea').addEventListener('keypress', function(e) {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    document.querySelector('.send-btn').click();
                }
            });

            // Switch between conversations
            document.querySelectorAll('.conversation-item').forEach(item => {
                item.addEventListener('click', function() {
                    document.querySelectorAll('.conversation-item').forEach(i => {
                        i.classList.remove('active');
                    });
                    this.classList.add('active');

                    // In a real app, this would load the conversation
                    // For demo purposes, we'll just show an alert
                    if (!this.classList.contains('active-loaded')) {
                        alert('In a real app, this would load the conversation with ' + this.querySelector(
                            '.conversation-name').textContent);
                        this.classList.add('active-loaded');
                    }
                });
            });
        </script>
</body>

</html>
