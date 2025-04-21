<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Messages</title>
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
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
            width: 100%;
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
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 2rem 0;
            height: calc(100vh - 130px);
            /* Adjust based on header + nav height */
        }

        .page-header {
            margin-bottom: 1.5rem;
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

        /* Messages Layout */
        .messages-container {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 1.5rem;
            height: 100%;
            max-height: calc(100vh - 200px);
            /* Adjust based on header + nav + page header */
        }

        @media (max-width: 768px) {
            .messages-container {
                grid-template-columns: 1fr;
            }
        }

        /* Conversation List */
        .conversation-list {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .conversation-list-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .conversation-list-title {
            font-weight: 600;
            font-size: 1rem;
        }

        .conversation-search {
            position: relative;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border);
        }

        .conversation-search input {
            width: 100%;
            padding: 0.5rem 0.75rem 0.5rem 2rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            font-size: 0.875rem;
        }

        .conversation-search i {
            position: absolute;
            left: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-medium);
        }

        .conversation-items {
            flex: 1;
            overflow-y: auto;
        }

        .conversation-item {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .conversation-item:hover {
            background-color: var(--light-bg);
        }

        .conversation-item.active {
            background-color: rgba(37, 99, 235, 0.08);
        }

        .conversation-avatar {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
        }

        .conversation-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .conversation-info {
            flex: 1;
            min-width: 0;
        }

        .conversation-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.25rem;
        }

        .conversation-name {
            font-weight: 600;
            font-size: 0.875rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .conversation-time {
            font-size: 0.75rem;
            color: var(--text-medium);
            white-space: nowrap;
        }

        .conversation-preview {
            font-size: 0.75rem;
            color: var(--text-medium);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: flex;
            align-items: center;
        }

        .conversation-preview-status {
            display: flex;
            align-items: center;
            margin-right: 0.25rem;
        }

        .conversation-preview-status i {
            font-size: 0.625rem;
            margin-right: 0.25rem;
        }

        .conversation-badge {
            background-color: var(--primary);
            color: var(--white);
            font-size: 0.75rem;
            font-weight: 600;
            min-width: 1.25rem;
            height: 1.25rem;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 0.5rem;
        }

        /* Chat Area */
        .chat-area {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .chat-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-header-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .chat-avatar {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            overflow: hidden;
        }

        .chat-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .chat-user-info {
            display: flex;
            flex-direction: column;
        }

        .chat-user-name {
            font-weight: 600;
            font-size: 0.875rem;
        }

        .chat-user-status {
            font-size: 0.75rem;
            color: var(--text-medium);
            display: flex;
            align-items: center;
        }

        .chat-user-status i {
            color: var(--success);
            margin-right: 0.25rem;
            font-size: 0.625rem;
        }

        .chat-actions {
            display: flex;
            gap: 0.75rem;
        }

        .chat-action-btn {
            background: none;
            border: none;
            color: var(--text-medium);
            font-size: 1rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: var(--transition);
        }

        .chat-action-btn:hover {
            color: var(--primary);
            background-color: var(--light-bg);
        }

        .chat-task-info {
            padding: 0.75rem 1.5rem;
            background-color: var(--light-bg);
            border-bottom: 1px solid var(--border);
            font-size: 0.75rem;
            color: var(--text-medium);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .chat-task-info a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .chat-task-info a:hover {
            text-decoration: underline;
        }

        .chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .message {
            display: flex;
            flex-direction: column;
            max-width: 70%;
        }

        .message.outgoing {
            align-self: flex-end;
        }

        .message.incoming {
            align-self: flex-start;
        }

        .message-content {
            padding: 0.75rem 1rem;
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            position: relative;
        }

        .message.outgoing .message-content {
            background-color: var(--primary-light);
            color: white;
            border-top-right-radius: 0;
        }

        .message.incoming .message-content {
            background-color: var(--light-bg);
            color: var(--text-dark);
            border-top-left-radius: 0;
        }

        .message-time {
            font-size: 0.75rem;
            color: var(--text-medium);
            margin-top: 0.25rem;
            align-self: flex-end;
        }

        .message-status {
            display: flex;
            align-items: center;
            font-size: 0.75rem;
            color: var(--text-medium);
            margin-top: 0.25rem;
        }

        .message-status i {
            margin-right: 0.25rem;
            font-size: 0.625rem;
        }

        .message-image {
            max-width: 100%;
            border-radius: var(--radius-md);
            overflow: hidden;
            margin-bottom: 0.5rem;
        }

        .message-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .message-file {
            display: flex;
            align-items: center;
            background-color: var(--light-bg);
            padding: 0.75rem;
            border-radius: var(--radius-md);
            margin-bottom: 0.5rem;
        }

        .message-file i {
            font-size: 1.5rem;
            margin-right: 0.75rem;
            color: var(--primary);
        }

        .message-file-info {
            flex: 1;
        }

        .message-file-name {
            font-weight: 500;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .message-file-size {
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        .message-file-download {
            color: var(--primary);
            font-size: 1rem;
            cursor: pointer;
        }

        .date-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 1rem 0;
        }

        .date-divider-line {
            flex: 1;
            height: 1px;
            background-color: var(--border);
        }

        .date-divider-text {
            padding: 0 1rem;
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        .chat-input-container {
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--border);
        }

        .chat-input-wrapper {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .chat-input-actions {
            display: flex;
            gap: 0.5rem;
        }

        .chat-input-action {
            background: none;
            border: none;
            color: var(--text-medium);
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: var(--transition);
        }

        .chat-input-action:hover {
            color: var(--primary);
            background-color: var(--light-bg);
        }

        .chat-input {
            flex: 1;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            resize: none;
            max-height: 100px;
            min-height: 40px;
        }

        .chat-input:focus {
            outline: none;
            border-color: var(--primary-light);
        }

        .chat-send-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 2.5rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .chat-send-btn:hover {
            background-color: var(--primary-dark);
        }

        /* Empty State */
        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            padding: 2rem;
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
            margin: 0 auto;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 0.3s ease forwards;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .conversation-list {
                display: none;
            }

            .conversation-list.active {
                display: flex;
            }

            .chat-area {
                display: none;
            }

            .chat-area.active {
                display: flex;
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
                <li><a href="#" class="active">Messages</a></li>
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
                <h1 class="page-title">Messages</h1>
                <p class="page-subtitle">Communicate with your task providers</p>
            </div>

            <!-- Messages Container -->
            <div class="messages-container">
                <!-- Conversation List -->
                <div class="conversation-list">
                    <div class="conversation-list-header">
                        <div class="conversation-list-title">Conversations</div>
                        <button class="chat-action-btn">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                    <div class="conversation-search">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search conversations...">
                    </div>
                    <div class="conversation-items">
                        <!-- Conversation 1 -->
                        <div class="conversation-item active" data-conversation-id="1">
                            <div class="conversation-avatar">
                                <img src="/placeholder.svg?height=60&width=60" alt="Michael Brown">
                            </div>
                            <div class="conversation-info">
                                <div class="conversation-header">
                                    <div class="conversation-name">Michael Brown</div>
                                    <div class="conversation-time">10:30 AM</div>
                                </div>
                                <div class="conversation-preview">
                                    <div class="conversation-preview-status">
                                        <i class="fas fa-check-double" style="color: var(--primary);"></i>
                                    </div>
                                    I'll be there in about 15 minutes with your package
                                </div>
                            </div>
                        </div>

                        <!-- Conversation 2 -->
                        <div class="conversation-item" data-conversation-id="2">
                            <div class="conversation-avatar">
                                <img src="/placeholder.svg?height=60&width=60" alt="Sarah Wilson">
                            </div>
                            <div class="conversation-info">
                                <div class="conversation-header">
                                    <div class="conversation-name">Sarah Wilson</div>
                                    <div class="conversation-time">Yesterday</div>
                                </div>
                                <div class="conversation-preview">
                                    <div class="conversation-preview-status">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    Thank you for your payment! I'll start assembling your furniture tomorrow morning.
                                </div>
                                <div class="conversation-badge">2</div>
                            </div>
                        </div>

                        <!-- Conversation 3 -->
                        <div class="conversation-item" data-conversation-id="3">
                            <div class="conversation-avatar">
                                <img src="/placeholder.svg?height=60&width=60" alt="David Chen">
                            </div>
                            <div class="conversation-info">
                                <div class="conversation-header">
                                    <div class="conversation-name">David Chen</div>
                                    <div class="conversation-time">Yesterday</div>
                                </div>
                                <div class="conversation-preview">
                                    <div class="conversation-preview-status">
                                        <i class="fas fa-check-double"></i>
                                    </div>
                                    Your package has been delivered. I've left it at your front door as requested.
                                </div>
                            </div>
                        </div>

                        <!-- Conversation 4 -->
                        <div class="conversation-item" data-conversation-id="4">
                            <div class="conversation-avatar">
                                <img src="/placeholder.svg?height=60&width=60" alt="Emily Rodriguez">
                            </div>
                            <div class="conversation-info">
                                <div class="conversation-header">
                                    <div class="conversation-name">Emily Rodriguez</div>
                                    <div class="conversation-time">Monday</div>
                                </div>
                                <div class="conversation-preview">
                                    <div class="conversation-preview-status">
                                        <i class="fas fa-check-double"></i>
                                    </div>
                                    I've completed the cleaning service. Please let me know if everything looks good!
                                </div>
                            </div>
                        </div>

                        <!-- Conversation 5 -->
                        <div class="conversation-item" data-conversation-id="5">
                            <div class="conversation-avatar">
                                <img src="/placeholder.svg?height=60&width=60" alt="James Wilson">
                            </div>
                            <div class="conversation-info">
                                <div class="conversation-header">
                                    <div class="conversation-name">James Wilson</div>
                                    <div class="conversation-time">Last week</div>
                                </div>
                                <div class="conversation-preview">
                                    <div class="conversation-preview-status">
                                        <i class="fas fa-check-double"></i>
                                    </div>
                                    Thanks for the 5-star review! Let me know if you need any help in the future.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chat Area -->
                <div class="chat-area">
                    <div class="chat-header">
                        <div class="chat-header-info">
                            <div class="chat-avatar">
                                <img src="/placeholder.svg?height=60&width=60" alt="Michael Brown">
                            </div>
                            <div class="chat-user-info">
                                <div class="chat-user-name">Michael Brown</div>
                                <div class="chat-user-status">
                                    <i class="fas fa-circle"></i>
                                    <span>Online</span>
                                </div>
                            </div>
                        </div>
                        <div class="chat-actions">
                            <button class="chat-action-btn">
                                <i class="fas fa-phone"></i>
                            </button>
                            <button class="chat-action-btn">
                                <i class="fas fa-video"></i>
                            </button>
                            <button class="chat-action-btn">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </div>
                    </div>
                    <div class="chat-task-info">
                        <span>Task: <a href="#">Package Pickup & Delivery</a> • Status: <strong>In
                                Progress</strong></span>
                        <a href="#">View Task Details</a>
                    </div>
                    <div class="chat-messages">
                        <!-- Date Divider -->
                        <div class="date-divider">
                            <div class="date-divider-line"></div>
                            <div class="date-divider-text">Today</div>
                            <div class="date-divider-line"></div>
                        </div>

                        <!-- Incoming Message -->
                        <div class="message incoming">
                            <div class="message-content">
                                Hello! I've accepted your package pickup task. I'll be heading to the UPS store in about
                                10 minutes.
                            </div>
                            <div class="message-time">10:15 AM</div>
                        </div>

                        <!-- Outgoing Message -->
                        <div class="message outgoing">
                            <div class="message-content">
                                Great! Thank you for the update. The package has a prepaid label already attached.
                            </div>
                            <div class="message-time">10:18 AM</div>
                            <div class="message-status">
                                <i class="fas fa-check-double" style="color: var(--primary);"></i>
                                <span>Read</span>
                            </div>
                        </div>

                        <!-- Incoming Message with Image -->
                        <div class="message incoming">
                            <div class="message-image">
                                <img src="/placeholder.svg?height=200&width=300" alt="Package Image">
                            </div>
                            <div class="message-content">
                                I'm at the UPS store now. Is this the right package? It has your name on it.
                            </div>
                            <div class="message-time">10:25 AM</div>
                        </div>

                        <!-- Outgoing Message -->
                        <div class="message outgoing">
                            <div class="message-content">
                                Yes, that's the one! Thank you for confirming.
                            </div>
                            <div class="message-time">10:26 AM</div>
                            <div class="message-status">
                                <i class="fas fa-check-double" style="color: var(--primary);"></i>
                                <span>Read</span>
                            </div>
                        </div>

                        <!-- Incoming Message -->
                        <div class="message incoming">
                            <div class="message-content">
                                Perfect! I've got the package and I'm on my way to your address now. I'll be there in
                                about 15 minutes.
                            </div>
                            <div class="message-time">10:30 AM</div>
                        </div>

                        <!-- Outgoing Message -->
                        <div class="message outgoing">
                            <div class="message-content">
                                Sounds good. I'll be home waiting. Let me know if you have any trouble finding the
                                place.
                            </div>
                            <div class="message-time">10:32 AM</div>
                            <div class="message-status">
                                <i class="fas fa-check-double" style="color: var(--primary);"></i>
                                <span>Read</span>
                            </div>
                        </div>

                        <!-- Incoming Message with File -->
                        <div class="message incoming">
                            <div class="message-file">
                                <i class="fas fa-file-pdf"></i>
                                <div class="message-file-info">
                                    <div class="message-file-name">delivery_receipt.pdf</div>
                                    <div class="message-file-size">156 KB</div>
                                </div>
                                <i class="fas fa-download message-file-download"></i>
                            </div>
                            <div class="message-content">
                                Here's a copy of the receipt for your records.
                            </div>
                            <div class="message-time">10:35 AM</div>
                        </div>
                    </div>
                    <div class="chat-input-container">
                        <div class="chat-input-wrapper">
                            <div class="chat-input-actions">
                                <button class="chat-input-action">
                                    <i class="fas fa-paperclip"></i>
                                </button>
                                <button class="chat-input-action">
                                    <i class="far fa-image"></i>
                                </button>
                                <button class="chat-input-action">
                                    <i class="far fa-smile"></i>
                                </button>
                            </div>
                            <textarea class="chat-input" placeholder="Type a message..."></textarea>
                            <button class="chat-send-btn">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // DOM Elements
        const conversationItems = document.querySelectorAll('.conversation-item');
        const chatArea = document.querySelector('.chat-area');
        const conversationList = document.querySelector('.conversation-list');
        const chatInput = document.querySelector('.chat-input');
        const chatSendBtn = document.querySelector('.chat-send-btn');

        // Initialize the page
        function init() {
            setupEventListeners();
        }

        // Setup event listeners
        function setupEventListeners() {
            // Conversation item click
            conversationItems.forEach(item => {
                item.addEventListener('click', () => {
                    // Remove active class from all conversation items
                    conversationItems.forEach(i => i.classList.remove('active'));

                    // Add active class to clicked item
                    item.classList.add('active');

                    // Remove any badges (unread messages)
                    const badge = item.querySelector('.conversation-badge');
                    if (badge) {
                        badge.remove();
                    }

                    // On mobile, show chat area and hide conversation list
                    if (window.innerWidth <= 768) {
                        conversationList.classList.remove('active');
                        chatArea.classList.add('active');
                    }

                    // In a real app, this would load the conversation data
                    loadConversation(item.dataset.conversationId);
                });
            });

            // Chat input auto-resize
            chatInput.addEventListener('input', () => {
                chatInput.style.height = 'auto';
                chatInput.style.height = (chatInput.scrollHeight) + 'px';
            });

            // Send message on Enter (but allow Shift+Enter for new line)
            chatInput.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    sendMessage();
                }
            });

            // Send button click
            chatSendBtn.addEventListener('click', sendMessage);

            // File upload buttons
            document.querySelectorAll('.chat-input-action').forEach(btn => {
                btn.addEventListener('click', () => {
                    // In a real app, this would open file picker or emoji picker
                    alert('This feature would open a file picker or emoji selector in a real app.');
                });
            });

            // Chat action buttons
            document.querySelectorAll('.chat-action-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    // In a real app, this would trigger actions like calling, video chat, etc.
                    alert('This feature would trigger actions like calling or video chat in a real app.');
                });
            });
        }

        // Load conversation data
        function loadConversation(conversationId) {
            // In a real app, this would fetch conversation data from the server
            console.log(`Loading conversation ${conversationId}`);

            // Update chat header with the selected conversation's info
            const selectedConversation = document.querySelector(
                `.conversation-item[data-conversation-id="${conversationId}"]`);
            if (selectedConversation) {
                const name = selectedConversation.querySelector('.conversation-name').textContent;
                const avatar = selectedConversation.querySelector('.conversation-avatar img').src;

                document.querySelector('.chat-user-name').textContent = name;
                document.querySelector('.chat-avatar img').src = avatar;
                document.querySelector('.chat-avatar img').alt = name;
            }
        }

        // Send message
        function sendMessage() {
            const messageText = chatInput.value.trim();

            if (messageText) {
                // Create new message element
                const messageElement = document.createElement('div');
                messageElement.className = 'message outgoing';

                const now = new Date();
                const hours = now.getHours();
                const minutes = now.getMinutes();
                const ampm = hours >= 12 ? 'PM' : 'AM';
                const formattedHours = hours % 12 || 12;
                const formattedMinutes = minutes < 10 ? `0${minutes}` : minutes;
                const timeString = `${formattedHours}:${formattedMinutes} ${ampm}`;

                messageElement.innerHTML = `
                    <div class="message-content">
                        ${messageText}
                    </div>
                    <div class="message-time">${timeString}</div>
                    <div class="message-status">
                        <i class="fas fa-check"></i>
                        <span>Sent</span>
                    </div>
                `;

                // Add message to chat
                document.querySelector('.chat-messages').appendChild(messageElement);

                // Clear input
                chatInput.value = '';
                chatInput.style.height = 'auto';

                // Scroll to bottom
                const chatMessages = document.querySelector('.chat-messages');
                chatMessages.scrollTop = chatMessages.scrollHeight;

                // In a real app, this would send the message to the server
                // And then update the UI when the message is delivered/read

                // Simulate message delivery after 1 second
                setTimeout(() => {
                    const status = messageElement.querySelector('.message-status');
                    status.innerHTML = `
                        <i class="fas fa-check-double"></i>
                        <span>Delivered</span>
                    `;
                }, 1000);

                // Simulate message read after 2 seconds
                setTimeout(() => {
                    const status = messageElement.querySelector('.message-status');
                    status.innerHTML = `
                        <i class="fas fa-check-double" style="color: var(--primary);"></i>
                        <span>Read</span>
                    `;

                    // Simulate a reply after 3 seconds
                    setTimeout(() => {
                        simulateReply();
                    }, 3000);
                }, 2000);
            }
        }

        // Simulate a reply
        function simulateReply() {
            const replies = [
                "I'll be there soon with your package!",
                "Thanks for the information. I'll keep you updated on my progress.",
                "Got it! I'll make sure to follow your instructions.",
                "I'm about 5 minutes away from your location now.",
                "Is there anything else you need me to do for this task?"
            ];

            const randomReply = replies[Math.floor(Math.random() * replies.length)];

            // Create new message element
            const messageElement = document.createElement('div');
            messageElement.className = 'message incoming';

            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const ampm = hours >= 12 ? 'PM' : 'AM';
            const formattedHours = hours % 12 || 12;
            const formattedMinutes = minutes < 10 ? `0${minutes}` : minutes;
            const timeString = `${formattedHours}:${formattedMinutes} ${ampm}`;

            messageElement.innerHTML = `
                <div class="message-content">
                    ${randomReply}
                </div>
                <div class="message-time">${timeString}</div>
            `;

            // Add message to chat
            document.querySelector('.chat-messages').appendChild(messageElement);

            // Scroll to bottom
            const chatMessages = document.querySelector('.chat-messages');
            chatMessages.scrollTop = chatMessages.scrollHeight;

            // Update conversation preview
            const activeConversation = document.querySelector('.conversation-item.active');
            if (activeConversation) {
                const preview = activeConversation.querySelector('.conversation-preview');
                preview.innerHTML = `
                    <div class="conversation-preview-status">
                    </div>
                    ${randomReply}
                `;

                const time = activeConversation.querySelector('.conversation-time');
                time.textContent = `${formattedHours}:${formattedMinutes} ${ampm}`;
            }
        }

        // Initialize the page when DOM is loaded
        document.addEventListener('DOMContentLoaded', init);
    </script>
</body>

</html>
