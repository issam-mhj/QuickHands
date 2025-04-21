<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Profile & Settings</title>
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

        /* Settings Layout */
        .settings-container {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 1.5rem;
        }

        @media (max-width: 768px) {
            .settings-container {
                grid-template-columns: 1fr;
            }
        }

        /* Settings Sidebar */
        .settings-sidebar {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
            overflow: hidden;
            height: fit-content;
        }

        .settings-nav {
            list-style: none;
        }

        .settings-nav-item {
            border-bottom: 1px solid var(--border);
        }

        .settings-nav-item:last-child {
            border-bottom: none;
        }

        .settings-nav-link {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            color: var(--text-medium);
            text-decoration: none;
            transition: var(--transition);
        }

        .settings-nav-link:hover {
            background-color: var(--light-bg);
            color: var(--primary);
        }

        .settings-nav-link.active {
            background-color: rgba(37, 99, 235, 0.08);
            color: var(--primary);
            font-weight: 500;
        }

        .settings-nav-link i {
            margin-right: 0.75rem;
            width: 1.25rem;
            text-align: center;
        }

        /* Settings Content */
        .settings-content {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .settings-section {
            display: none;
        }

        .settings-section.active {
            display: block;
        }

        .settings-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .settings-title {
            font-size: 1.125rem;
            font-weight: 600;
        }

        .settings-body {
            padding: 1.5rem;
        }

        /* Profile Section */
        .profile-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
        }

        @media (max-width: 768px) {
            .profile-container {
                grid-template-columns: 1fr;
            }
        }

        .profile-photo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 1rem;
            position: relative;
            border: 3px solid var(--border);
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-photo-overlay {
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
            cursor: pointer;
        }

        .profile-photo:hover .profile-photo-overlay {
            opacity: 1;
        }

        .profile-photo-overlay i {
            color: white;
            font-size: 1.5rem;
        }

        .profile-photo-actions {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .photo-action-btn {
            padding: 0.5rem 0.75rem;
            font-size: 0.75rem;
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            background-color: var(--white);
            color: var(--text-medium);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .photo-action-btn:hover {
            background-color: var(--light-bg);
            color: var(--primary);
        }

        .photo-action-btn i {
            margin-right: 0.25rem;
        }

        .profile-photo-help {
            font-size: 0.75rem;
            color: var(--text-medium);
            max-width: 200px;
        }

        .profile-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        @media (max-width: 640px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            font-weight: 500;
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
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-hint {
            font-size: 0.75rem;
            color: var(--text-medium);
            margin-top: 0.25rem;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 1rem;
        }

        /* Preferences Section */
        .preferences-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .preference-item {
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
        }

        .preference-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .preference-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .preference-title {
            font-weight: 600;
            font-size: 1rem;
        }

        .preference-description {
            font-size: 0.875rem;
            color: var(--text-medium);
            margin-bottom: 1rem;
        }

        .language-selector {
            max-width: 300px;
        }

        .notification-options {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .notification-option {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem;
            background-color: var(--light-bg);
            border-radius: var(--radius-md);
        }

        .notification-info {
            display: flex;
            flex-direction: column;
        }

        .notification-name {
            font-weight: 500;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .notification-description {
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        /* Toggle Switch */
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 24px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: var(--border);
            transition: var(--transition);
            border-radius: 34px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: var(--transition);
            border-radius: 50%;
        }

        input:checked+.toggle-slider {
            background-color: var(--primary);
        }

        input:checked+.toggle-slider:before {
            transform: translateX(24px);
        }

        /* Security Section */
        .security-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .security-item {
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
        }

        .security-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .security-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .security-title {
            font-weight: 600;
            font-size: 1rem;
        }

        .security-description {
            font-size: 0.875rem;
            color: var(--text-medium);
            margin-bottom: 1rem;
        }

        .password-fields {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            max-width: 600px;
        }

        @media (max-width: 640px) {
            .password-fields {
                grid-template-columns: 1fr;
            }
        }

        .security-info {
            background-color: var(--light-bg);
            padding: 1rem;
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            color: var(--text-medium);
            margin-bottom: 1rem;
        }

        .security-info strong {
            color: var(--text-dark);
        }

        .security-info i {
            color: var(--info);
            margin-right: 0.5rem;
        }

        .activity-list {
            margin-top: 1rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            overflow: hidden;
        }

        .activity-item {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-item:nth-child(even) {
            background-color: var(--light-bg);
        }

        .activity-device {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
        }

        .activity-device i {
            color: var(--text-medium);
        }

        .activity-time {
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        /* Buttons */
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

        .btn-danger {
            background-color: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background-color: #dc2626;
        }

        .btn i {
            margin-right: 0.5rem;
        }

        /* Alert Messages */
        .alert {
            padding: 0.75rem 1rem;
            border-radius: var(--radius-md);
            margin-bottom: 1rem;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
        }

        .alert i {
            margin-right: 0.5rem;
            font-size: 1rem;
        }

        .alert-success {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .alert-warning {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .alert-danger {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .alert-info {
            background-color: rgba(14, 165, 233, 0.1);
            color: var(--info);
            border: 1px solid rgba(14, 165, 233, 0.2);
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

        .fade-in {
            animation: fadeIn 0.3s ease forwards;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .settings-sidebar {
                margin-bottom: 1.5rem;
            }

            .settings-nav {
                display: flex;
                overflow-x: auto;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .settings-nav-item {
                border-bottom: none;
                border-right: 1px solid var(--border);
            }

            .settings-nav-item:last-child {
                border-right: none;
            }

            .settings-nav-link {
                padding: 0.75rem 1rem;
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
                <li><a href="#">Reviews</a></li>
                <li><a href="#" class="active">Profile & Settings</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">Profile & Settings</h1>
                <p class="page-subtitle">Manage your account details and preferences</p>
            </div>

            <!-- Settings Container -->
            <div class="settings-container">
                <!-- Settings Sidebar -->
                <div class="settings-sidebar">
                    <ul class="settings-nav">
                        <li class="settings-nav-item">
                            <a href="#profile" class="settings-nav-link active" data-section="profile">
                                <i class="fas fa-user"></i>
                                Profile Details
                            </a>
                        </li>
                        <li class="settings-nav-item">
                            <a href="#preferences" class="settings-nav-link" data-section="preferences">
                                <i class="fas fa-sliders-h"></i>
                                Preferences
                            </a>
                        </li>
                        <li class="settings-nav-item">
                            <a href="#security" class="settings-nav-link" data-section="security">
                                <i class="fas fa-shield-alt"></i>
                                Security
                            </a>
                        </li>
                        <li class="settings-nav-item">
                            <a href="#billing" class="settings-nav-link" data-section="billing">
                                <i class="fas fa-credit-card"></i>
                                Billing & Plans
                            </a>
                        </li>
                        <li class="settings-nav-item">
                            <a href="#notifications" class="settings-nav-link" data-section="notifications">
                                <i class="fas fa-bell"></i>
                                Notifications
                            </a>
                        </li>
                        <li class="settings-nav-item">
                            <a href="#privacy" class="settings-nav-link" data-section="privacy">
                                <i class="fas fa-lock"></i>
                                Privacy
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Settings Content -->
                <div class="settings-content">
                    <!-- Profile Section -->
                    <div id="profile" class="settings-section active">
                        <div class="settings-header">
                            <h2 class="settings-title">Profile Details</h2>
                        </div>
                        <div class="settings-body">
                            <div class="alert alert-success" id="profileSuccessAlert" style="display: none;">
                                <i class="fas fa-check-circle"></i>
                                Profile updated successfully!
                            </div>

                            <div class="profile-container">
                                <div class="profile-photo-container">
                                    <div class="profile-photo">
                                        <img src="/placeholder.svg?height=150&width=150" alt="Profile Photo">
                                        <div class="profile-photo-overlay">
                                            <i class="fas fa-camera"></i>
                                        </div>
                                    </div>
                                    <div class="profile-photo-actions">
                                        <button class="photo-action-btn">
                                            <i class="fas fa-upload"></i>
                                            Upload
                                        </button>
                                        <button class="photo-action-btn">
                                            <i class="fas fa-trash-alt"></i>
                                            Remove
                                        </button>
                                    </div>
                                    <p class="profile-photo-help">
                                        Upload a clear photo of yourself. This helps providers recognize you.
                                    </p>
                                </div>

                                <form class="profile-form">
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input type="text" id="firstName" class="form-control" value="Alex">
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <input type="text" id="lastName" class="form-control"
                                                value="Johnson">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" id="email" class="form-control"
                                            value="alex.johnson@example.com">
                                        <div class="form-hint">We'll send important notifications to this email.</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" id="phone" class="form-control"
                                            value="(555) 123-4567">
                                        <div class="form-hint">Used for account verification and task notifications.
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" id="address" class="form-control"
                                            value="123 Main Street">
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" id="city" class="form-control"
                                                value="New York">
                                        </div>
                                        <div class="form-group">
                                            <label for="zipCode" class="form-label">ZIP Code</label>
                                            <input type="text" id="zipCode" class="form-control"
                                                value="10001">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="state" class="form-label">State</label>
                                            <input type="text" id="state" class="form-control"
                                                value="NY">
                                        </div>
                                        <div class="form-group">
                                            <label for="country" class="form-label">Country</label>
                                            <input type="text" id="country" class="form-control"
                                                value="United States">
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="button" class="btn btn-outline">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="saveProfileBtn">
                                            <i class="fas fa-save"></i>
                                            Save Changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Preferences Section -->
                    <div id="preferences" class="settings-section">
                        <div class="settings-header">
                            <h2 class="settings-title">Preferences</h2>
                        </div>
                        <div class="settings-body">
                            <div class="alert alert-success" id="preferencesSuccessAlert" style="display: none;">
                                <i class="fas fa-check-circle"></i>
                                Preferences updated successfully!
                            </div>

                            <div class="preferences-list">
                                <!-- Language Preference -->
                                <div class="preference-item">
                                    <div class="preference-header">
                                        <h3 class="preference-title">Language</h3>
                                    </div>
                                    <p class="preference-description">
                                        Select your preferred language for the QuickHands platform.
                                    </p>
                                    <div class="language-selector">
                                        <select class="form-control" id="languageSelect">
                                            <option value="en" selected>English</option>
                                            <option value="fr">French</option>
                                            <option value="es">Spanish</option>
                                            <option value="ar">Arabic</option>
                                            <option value="zh">Chinese (Simplified)</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Notification Preferences -->
                                <div class="preference-item">
                                    <div class="preference-header">
                                        <h3 class="preference-title">Notification Preferences</h3>
                                    </div>
                                    <p class="preference-description">
                                        Choose how you'd like to receive notifications from QuickHands.
                                    </p>
                                    <div class="notification-options">
                                        <div class="notification-option">
                                            <div class="notification-info">
                                                <div class="notification-name">Email Notifications</div>
                                                <div class="notification-description">Receive task updates and
                                                    important alerts via email</div>
                                            </div>
                                            <label class="toggle-switch">
                                                <input type="checkbox" checked>
                                                <span class="toggle-slider"></span>
                                            </label>
                                        </div>
                                        <div class="notification-option">
                                            <div class="notification-info">
                                                <div class="notification-name">SMS Notifications</div>
                                                <div class="notification-description">Get text messages for urgent
                                                    updates</div>
                                            </div>
                                            <label class="toggle-switch">
                                                <input type="checkbox" checked>
                                                <span class="toggle-slider"></span>
                                            </label>
                                        </div>
                                        <div class="notification-option">
                                            <div class="notification-info">
                                                <div class="notification-name">App Notifications</div>
                                                <div class="notification-description">Receive push notifications on
                                                    your mobile device</div>
                                            </div>
                                            <label class="toggle-switch">
                                                <input type="checkbox" checked>
                                                <span class="toggle-slider"></span>
                                            </label>
                                        </div>
                                        <div class="notification-option">
                                            <div class="notification-info">
                                                <div class="notification-name">Marketing Communications</div>
                                                <div class="notification-description">Receive updates about new
                                                    features and promotions</div>
                                            </div>
                                            <label class="toggle-switch">
                                                <input type="checkbox">
                                                <span class="toggle-slider"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Time Zone Preference -->
                                <div class="preference-item">
                                    <div class="preference-header">
                                        <h3 class="preference-title">Time Zone</h3>
                                    </div>
                                    <p class="preference-description">
                                        Set your local time zone for accurate scheduling and notifications.
                                    </p>
                                    <div class="language-selector">
                                        <select class="form-control" id="timezoneSelect">
                                            <option value="America/New_York" selected>Eastern Time (ET) - New York
                                            </option>
                                            <option value="America/Chicago">Central Time (CT) - Chicago</option>
                                            <option value="America/Denver">Mountain Time (MT) - Denver</option>
                                            <option value="America/Los_Angeles">Pacific Time (PT) - Los Angeles
                                            </option>
                                            <option value="Europe/London">Greenwich Mean Time (GMT) - London</option>
                                            <option value="Europe/Paris">Central European Time (CET) - Paris</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-primary" id="savePreferencesBtn">
                                        <i class="fas fa-save"></i>
                                        Save Preferences
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security Section -->
                    <div id="security" class="settings-section">
                        <div class="settings-header">
                            <h2 class="settings-title">Security</h2>
                        </div>
                        <div class="settings-body">
                            <div class="alert alert-success" id="securitySuccessAlert" style="display: none;">
                                <i class="fas fa-check-circle"></i>
                                Security settings updated successfully!
                            </div>

                            <div class="security-list">
                                <!-- Password Reset -->
                                <div class="security-item">
                                    <div class="security-header">
                                        <h3 class="security-title">Change Password</h3>
                                    </div>
                                    <p class="security-description">
                                        It's a good idea to use a strong password that you don't use elsewhere.
                                    </p>
                                    <div class="password-fields">
                                        <div class="form-group">
                                            <label for="currentPassword" class="form-label">Current Password</label>
                                            <input type="password" id="currentPassword" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="newPassword" class="form-label">New Password</label>
                                            <input type="password" id="newPassword" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="confirmPassword" class="form-label">Confirm New
                                                Password</label>
                                            <input type="password" id="confirmPassword" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-actions" style="justify-content: flex-start;">
                                        <button type="button" class="btn btn-primary" id="changePasswordBtn">
                                            <i class="fas fa-key"></i>
                                            Update Password
                                        </button>
                                    </div>
                                </div>

                                <!-- Two-Factor Authentication -->
                                <div class="security-item">
                                    <div class="security-header">
                                        <h3 class="security-title">Two-Factor Authentication (2FA)</h3>
                                        <label class="toggle-switch">
                                            <input type="checkbox" id="twoFactorToggle">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                    <p class="security-description">
                                        Add an extra layer of security to your account by requiring a verification code
                                        in addition to your password.
                                    </p>
                                    <div class="security-info">
                                        <i class="fas fa-info-circle"></i>
                                        <span>When 2FA is enabled, you'll receive a verification code via SMS or
                                            authenticator app each time you sign in.</span>
                                    </div>
                                    <div id="twoFactorSetup" style="display: none;">
                                        <div class="form-group">
                                            <label for="phoneVerification" class="form-label">Verification Phone
                                                Number</label>
                                            <input type="tel" id="phoneVerification" class="form-control"
                                                value="(555) 123-4567">
                                        </div>
                                        <div class="form-actions" style="justify-content: flex-start;">
                                            <button type="button" class="btn btn-primary" id="setup2FABtn">
                                                <i class="fas fa-shield-alt"></i>
                                                Set Up 2FA
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Account Activity -->
                                <div class="security-item">
                                    <div class="security-header">
                                        <h3 class="security-title">Recent Account Activity</h3>
                                    </div>
                                    <p class="security-description">
                                        Review recent sign-ins to your account. If you don't recognize a device, change
                                        your password immediately.
                                    </p>
                                    <div class="activity-list">
                                        <div class="activity-item">
                                            <div class="activity-device">
                                                <i class="fas fa-laptop"></i>
                                                <span>MacBook Pro - Chrome (New York, NY)</span>
                                            </div>
                                            <div class="activity-time">Today, 10:30 AM</div>
                                        </div>
                                        <div class="activity-item">
                                            <div class="activity-device">
                                                <i class="fas fa-mobile-alt"></i>
                                                <span>iPhone 13 - QuickHands App (New York, NY)</span>
                                            </div>
                                            <div class="activity-time">Yesterday, 6:45 PM</div>
                                        </div>
                                        <div class="activity-item">
                                            <div class="activity-device">
                                                <i class="fas fa-tablet-alt"></i>
                                                <span>iPad - Safari (New York, NY)</span>
                                            </div>
                                            <div class="activity-time">April 18, 2025, 9:15 AM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Other sections would be implemented similarly -->
                    <div id="billing" class="settings-section">
                        <div class="settings-header">
                            <h2 class="settings-title">Billing & Plans</h2>
                        </div>
                        <div class="settings-body">
                            <div class="empty-state">
                                <i class="fas fa-credit-card empty-state-icon"></i>
                                <h3 class="empty-state-title">Billing & Plans</h3>
                                <p class="empty-state-text">Manage your subscription, payment methods, and billing
                                    history.</p>
                            </div>
                        </div>
                    </div>

                    <div id="notifications" class="settings-section">
                        <div class="settings-header">
                            <h2 class="settings-title">Notifications</h2>
                        </div>
                        <div class="settings-body">
                            <div class="empty-state">
                                <i class="fas fa-bell empty-state-icon"></i>
                                <h3 class="empty-state-title">Notifications</h3>
                                <p class="empty-state-text">Configure which notifications you receive and how they are
                                    delivered.</p>
                            </div>
                        </div>
                    </div>

                    <div id="privacy" class="settings-section">
                        <div class="settings-header">
                            <h2 class="settings-title">Privacy</h2>
                        </div>
                        <div class="settings-body">
                            <div class="empty-state">
                                <i class="fas fa-lock empty-state-icon"></i>
                                <h3 class="empty-state-title">Privacy Settings</h3>
                                <p class="empty-state-text">Control your privacy settings and manage your data.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // DOM Elements
        const settingsNavLinks = document.querySelectorAll('.settings-nav-link');
        const settingsSections = document.querySelectorAll('.settings-section');
        const saveProfileBtn = document.getElementById('saveProfileBtn');
        const savePreferencesBtn = document.getElementById('savePreferencesBtn');
        const changePasswordBtn = document.getElementById('changePasswordBtn');
        const twoFactorToggle = document.getElementById('twoFactorToggle');
        const twoFactorSetup = document.getElementById('twoFactorSetup');
        const setup2FABtn = document.getElementById('setup2FABtn');
        const profileSuccessAlert = document.getElementById('profileSuccessAlert');
        const preferencesSuccessAlert = document.getElementById('preferencesSuccessAlert');
        const securitySuccessAlert = document.getElementById('securitySuccessAlert');

        // Initialize the page
        function init() {
            setupEventListeners();
        }

        // Setup event listeners
        function setupEventListeners() {
            // Settings navigation
            settingsNavLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const sectionId = link.getAttribute('data-section');
                    showSection(sectionId);
                });
            });

            // Save profile button
            saveProfileBtn.addEventListener('click', () => {
                // In a real app, this would save the profile data to the server
                showAlert(profileSuccessAlert);
            });

            // Save preferences button
            savePreferencesBtn.addEventListener('click', () => {
                // In a real app, this would save the preferences to the server
                showAlert(preferencesSuccessAlert);
            });

            // Change password button
            changePasswordBtn.addEventListener('click', () => {
                const currentPassword = document.getElementById('currentPassword').value;
                const newPassword = document.getElementById('newPassword').value;
                const confirmPassword = document.getElementById('confirmPassword').value;

                // Simple validation
                if (!currentPassword || !newPassword || !confirmPassword) {
                    alert('Please fill in all password fields.');
                    return;
                }

                if (newPassword !== confirmPassword) {
                    alert('New passwords do not match.');
                    return;
                }

                // In a real app, this would send the password change request to the server
                showAlert(securitySuccessAlert);

                // Clear password fields
                document.getElementById('currentPassword').value = '';
                document.getElementById('newPassword').value = '';
                document.getElementById('confirmPassword').value = '';
            });

            // Two-factor authentication toggle
            twoFactorToggle.addEventListener('change', () => {
                if (twoFactorToggle.checked) {
                    twoFactorSetup.style.display = 'block';
                } else {
                    twoFactorSetup.style.display = 'none';
                }
            });

            // Setup 2FA button
            setup2FABtn.addEventListener('click', () => {
                // In a real app, this would initiate the 2FA setup process
                alert('In a real app, this would send a verification code to your phone to complete 2FA setup.');
            });
        }

        // Show section
        function showSection(sectionId) {
            // Hide all sections
            settingsSections.forEach(section => {
                section.classList.remove('active');
            });

            // Remove active class from all nav links
            settingsNavLinks.forEach(link => {
                link.classList.remove('active');
            });

            // Show selected section
            document.getElementById(sectionId).classList.add('active');

            // Add active class to selected nav link
            document.querySelector(`.settings-nav-link[data-section="${sectionId}"]`).classList.add('active');
        }

        // Show alert
        function showAlert(alertElement) {
            alertElement.style.display = 'flex';

            // Hide alert after 3 seconds
            setTimeout(() => {
                alertElement.style.display = 'none';
            }, 3000);
        }

        // Initialize the page when DOM is loaded
        document.addEventListener('DOMContentLoaded', init);
    </script>
</body>

</html>
