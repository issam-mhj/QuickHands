<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Provider Selection</title>
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

        /* Provider Selection Styles */
        .provider-selection-container {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 1.5rem;
        }

        @media (max-width: 1024px) {
            .provider-selection-container {
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
            height: fit-content;
            margin-bottom: 1.5rem;
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

        /* Task Details Styles */
        .task-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .task-details {
                grid-template-columns: 1fr;
            }
        }

        .task-detail-item {
            background-color: var(--light-bg);
            padding: 0.75rem;
            border-radius: var(--radius-md);
        }

        .task-detail-label {
            font-size: 0.75rem;
            color: var(--text-medium);
            margin-bottom: 0.25rem;
        }

        .task-detail-value {
            font-size: 0.875rem;
            font-weight: 500;
        }

        .task-description {
            margin-bottom: 1rem;
        }

        .task-description p {
            font-size: 0.875rem;
            color: var(--text-medium);
        }

        .task-actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
        }

        /* Status Tracker Styles */
        .status-tracker {
            margin-bottom: 1.5rem;
        }

        .tracker-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }

        .tracker-stat {
            text-align: center;
        }

        .tracker-value {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .tracker-label {
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        .progress-bar {
            height: 0.5rem;
            background-color: var(--light-bg);
            border-radius: 1rem;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background-color: var(--primary);
            border-radius: 1rem;
            width: 60%;
        }

        /* Filter Styles */
        .filter-group {
            margin-bottom: 1.5rem;
        }

        .filter-group:last-child {
            margin-bottom: 0;
        }

        .filter-title {
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .filter-title button {
            background: none;
            border: none;
            color: var(--primary);
            font-size: 0.75rem;
            cursor: pointer;
        }

        .filter-options {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-checkbox {
            display: flex;
            align-items: center;
        }

        .filter-checkbox input[type="checkbox"] {
            margin-right: 0.5rem;
            width: 1rem;
            height: 1rem;
            accent-color: var(--primary);
        }

        .filter-checkbox label {
            font-size: 0.875rem;
            color: var(--text-medium);
            cursor: pointer;
        }

        .filter-checkbox .count {
            margin-left: auto;
            font-size: 0.75rem;
            color: var(--text-light);
            background-color: var(--light-bg);
            padding: 0.125rem 0.375rem;
            border-radius: 1rem;
        }

        /* Offer List Styles */
        .offer-list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .offer-count {
            font-size: 0.875rem;
            color: var(--text-medium);
        }

        .offer-sort {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .offer-sort label {
            font-size: 0.875rem;
            color: var(--text-medium);
        }

        .offer-sort select {
            padding: 0.5rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            color: var(--text-dark);
            background-color: var(--white);
        }

        .offer-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .offer-card {
            background-color: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            transition: var(--transition);
        }

        .offer-card:hover {
            border-color: var(--primary-light);
            box-shadow: var(--shadow-md);
        }

        .offer-card-header {
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border);
            cursor: pointer;
        }

        .offer-provider {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .offer-avatar {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            overflow: hidden;
        }

        .offer-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .offer-provider-info {
            display: flex;
            flex-direction: column;
        }

        .offer-provider-name {
            font-weight: 600;
            font-size: 0.875rem;
        }

        .offer-provider-rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .offer-provider-rating i {
            color: #ffc107;
            font-size: 0.75rem;
        }

        .offer-provider-rating span {
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        .offer-price {
            font-weight: 700;
            font-size: 1.125rem;
            color: var(--text-dark);
        }

        .offer-status {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.625rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-pending {
            background-color: var(--light-bg);
            color: var(--text-medium);
        }

        .status-accepted {
            background-color: var(--success);
            color: white;
        }

        .status-declined {
            background-color: var(--danger);
            color: white;
        }

        .status-negotiating {
            background-color: var(--warning);
            color: white;
        }

        .offer-card-body {
            padding: 1.5rem;
            display: none;
        }

        .offer-card.expanded .offer-card-body {
            display: block;
        }

        .offer-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 768px) {
            .offer-details {
                grid-template-columns: 1fr;
            }
        }

        .offer-provider-details {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .provider-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .skill-tag {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            background-color: var(--light-bg);
            color: var(--text-medium);
            border-radius: 1rem;
        }

        .provider-info {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .provider-info-item {
            display: flex;
            align-items: center;
            font-size: 0.875rem;
            color: var(--text-medium);
        }

        .provider-info-item i {
            width: 1rem;
            margin-right: 0.5rem;
            color: var(--primary);
        }

        .offer-notes {
            background-color: var(--light-bg);
            padding: 1rem;
            border-radius: var(--radius-md);
            margin-bottom: 1rem;
        }

        .offer-notes-title {
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .offer-notes-content {
            font-size: 0.875rem;
            color: var(--text-medium);
        }

        .negotiation-chat {
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            overflow: hidden;
        }

        .chat-header {
            background-color: var(--light-bg);
            padding: 0.75rem 1rem;
            font-weight: 600;
            font-size: 0.875rem;
            border-bottom: 1px solid var(--border);
        }

        .chat-messages {
            padding: 1rem;
            max-height: 300px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .chat-message {
            display: flex;
            flex-direction: column;
            max-width: 80%;
        }

        .chat-message.user {
            align-self: flex-end;
        }

        .chat-message.provider {
            align-self: flex-start;
        }

        .message-content {
            padding: 0.75rem 1rem;
            border-radius: var(--radius-md);
            font-size: 0.875rem;
        }

        .chat-message.user .message-content {
            background-color: var(--primary-light);
            color: white;
            border-top-right-radius: 0;
        }

        .chat-message.provider .message-content {
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

        .chat-input {
            display: flex;
            padding: 0.75rem;
            border-top: 1px solid var(--border);
        }

        .chat-input input {
            flex: 1;
            padding: 0.5rem 0.75rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            margin-right: 0.5rem;
        }

        .chat-input button {
            padding: 0.5rem 0.75rem;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: var(--radius-md);
            font-weight: 500;
            font-size: 0.875rem;
            cursor: pointer;
        }

        .offer-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1rem;
            border-radius: var(--radius-md);
            font-weight: 500;
            font-size: 0.875rem;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            flex: 1;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .btn-success {
            background-color: var(--success);
            color: white;
        }

        .btn-success:hover {
            background-color: var(--secondary-dark);
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

        .compare-checkbox {
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            width: 1.5rem;
            height: 1.5rem;
            border-radius: 50%;
            background-color: var(--white);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
        }

        .compare-checkbox input {
            display: none;
        }

        .compare-checkbox i {
            color: var(--primary);
            font-size: 0.75rem;
            opacity: 0;
            transition: var(--transition);
        }

        .compare-checkbox input:checked + i {
            opacity: 1;
        }

        /* Comparison Tool */
        .comparison-tool {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: var(--white);
            border-top: 1px solid var(--border);
            box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
            transform: translateY(100%);
            transition: transform 0.3s ease;
            z-index: 50;
        }

        .comparison-tool.active {
            transform: translateY(0);
        }

        .comparison-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .comparison-title {
            font-weight: 600;
            font-size: 1rem;
        }

        .comparison-close {
            background: none;
            border: none;
            color: var(--text-medium);
            cursor: pointer;
            font-size: 1.25rem;
        }

        .comparison-providers {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .comparison-provider {
            background-color: var(--light-bg);
            border-radius: var(--radius-md);
            padding: 1rem;
            position: relative;
        }

        .comparison-provider.empty {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 200px;
            border: 2px dashed var(--border);
            color: var(--text-light);
        }

        .comparison-remove {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            background: none;
            border: none;
            color: var(--text-medium);
            cursor: pointer;
            font-size: 0.875rem;
        }

        .comparison-avatar {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 0.75rem;
        }

        .comparison-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .comparison-name {
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .comparison-rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            margin-bottom: 0.5rem;
        }

        .comparison-rating i {
            color: #ffc107;
            font-size: 0.75rem;
        }

        .comparison-rating span {
            font-size: 0.75rem;
            color: var(--text-medium);
        }

        .comparison-details {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
        }

        .comparison-detail {
            display: flex;
            justify-content: space-between;
            font-size: 0.75rem;
        }

        .comparison-detail-label {
            color: var(--text-medium);
        }

        .comparison-detail-value {
            font-weight: 500;
        }

        .comparison-price {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0.75rem;
        }

        .comparison-actions {
            display: flex;
            gap: 0.5rem;
        }

        .comparison-btn {
            flex: 1;
            padding: 0.5rem;
            font-size: 0.75rem;
        }

        .highlight-badge {
            position: absolute;
            top: 0;
            left: 0;
            background-color: var(--accent);
            color: white;
            font-size: 0.625rem;
            font-weight: 600;
            padding: 0.25rem 0.5rem;
            border-top-left-radius: var(--radius-md);
            border-bottom-right-radius: var(--radius-md);
        }

        /* Modal */
        .modal-backdrop {
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 100;
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

            .comparison-providers {
                grid-template-columns: 1fr;
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
                <li><a href="#" class="active">Provider Selection</a></li>
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
                <h1 class="page-title">Provider Selection</h1>
                <p class="page-subtitle">Review offers, negotiate terms, and select a provider for your task</p>
            </div>

            <!-- Task Details Section -->
            <div class="form-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-clipboard-list"></i>
                        Task Details
                    </h2>
                    <button class="btn btn-outline" style="padding: 0.5rem 0.75rem; font-size: 0.75rem;">
                        <i class="fas fa-edit"></i>
                        Edit Task
                    </button>
                </div>
                <div class="form-content">
                    <div class="task-description">
                        <p>I need someone to pick up a package from the UPS store and deliver it to my home address. The package is small (under 5 lbs) and already has a prepaid label attached. The UPS store is located at 123 Main St and my home is about 3 miles away.</p>
                    </div>
                    <div class="task-details">
                        <div class="task-detail-item">
                            <div class="task-detail-label">Budget</div>
                            <div class="task-detail-value">$10.00</div>
                        </div>
                        <div class="task-detail-item">
                            <div class="task-detail-label">Deadline</div>
                            <div class="task-detail-value">Today, 5:00 PM</div>
                        </div>
                        <div class="task-detail-item">
                            <div class="task-detail-label">Location</div>
                            <div class="task-detail-value">UPS Store, 123 Main St to 456 Oak Ave</div>
                        </div>
                        <div class="task-detail-item">
                            <div class="task-detail-label">Posted</div>
                            <div class="task-detail-value">Today, 10:30 AM</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Negotiation Status Tracker -->
            <div class="form-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-chart-line"></i>
                        Negotiation Status
                    </h2>
                </div>
                <div class="form-content">
                    <div class="status-tracker">
                        <div class="tracker-stats">
                            <div class="tracker-stat">
                                <div class="tracker-value">6</div>
                                <div class="tracker-label">Offers Received</div>
                            </div>
                            <div class="tracker-stat">
                                <div class="tracker-value">2</div>
                                <div class="tracker-label">Active Negotiations</div>
                            </div>
                            <div class="tracker-stat">
                                <div class="tracker-value">0</div>
                                <div class="tracker-label">Confirmed Providers</div>
                            </div>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Provider Selection Container -->
            <div class="provider-selection-container">
                <!-- Offers List -->
                <div>
                    <div class="offer-list-header">
                        <div class="offer-count">
                            <span>6 offers received</span>
                        </div>
                        <div class="offer-sort">
                            <label for="sort-by">Sort by:</label>
                            <select id="sort-by">
                                <option value="lowest-price">Lowest Price</option>
                                <option value="highest-rating">Highest Rating</option>
                                <option value="fastest-response">Fastest Response</option>
                                <option value="newest">Newest First</option>
                            </select>
                        </div>
                    </div>

                    <div class="offer-list" id="offerList">
                        <!-- Offer 1 -->
                        <div class="offer-card" data-offer-id="offer-1">
                            <div class="offer-card-header">
                                <div class="offer-provider">
                                    <div class="offer-avatar">
                                        <img src="/placeholder.svg?height=60&width=60" alt="Michael Brown">
                                    </div>
                                    <div class="offer-provider-info">
                                        <div class="offer-provider-name">Michael Brown</div>
                                        <div class="offer-provider-rating">
                                            <i class="fas fa-star"></i>
                                            <span>4.9 (42 reviews)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="offer-price">$9.00</div>
                                <div class="offer-status status-negotiating">Negotiating</div>
                            </div>
                            <div class="offer-card-body">
                                <div class="offer-details">
                                    <div class="offer-provider-details">
                                        <div>
                                            <h4 class="form-label">Provider Skills</h4>
                                            <div class="provider-skills">
                                                <div class="skill-tag">Delivery</div>
                                                <div class="skill-tag">Errands</div>
                                                <div class="skill-tag">Shopping</div>
                                            </div>
                                        </div>
                                        <div class="provider-info">
                                            <div class="provider-info-item">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>New York, NY</span>
                                            </div>
                                            <div class="provider-info-item">
                                                <i class="fas fa-clock"></i>
                                                <span>Response time: Under 30 min</span>
                                            </div>
                                            <div class="provider-info-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>38 tasks completed</span>
                                            </div>
                                            <div class="provider-info-item">
                                                <i class="fas fa-language"></i>
                                                <span>Languages: English, Spanish</span>
                                            </div>
                                        </div>
                                        <div class="offer-notes">
                                            <div class="offer-notes-title">Provider Notes</div>
                                            <div class="offer-notes-content">
                                                I can pick up your package right away and deliver it within the hour. I'm currently in the area and can get to the UPS store in about 10 minutes.
                                            </div>
                                        </div>
                                        <label class="compare-checkbox">
                                            <input type="checkbox" class="compare-checkbox-input" data-provider-id="provider-1">
                                            <i class="fas fa-check"></i>
                                        </label>
                                    </div>
                                    <div class="negotiation-chat">
                                        <div class="chat-header">
                                            Negotiation History
                                        </div>
                                        <div class="chat-messages">
                                            <div class="chat-message provider">
                                                <div class="message-content">
                                                    I can do this task for $9.00
                                                </div>
                                                <div class="message-time">11:15 AM</div>
                                            </div>
                                            <div class="chat-message user">
                                                <div class="message-content">
                                                    Can you do it for $8.50?
                                                </div>
                                                <div class="message-time">11:20 AM</div>
                                            </div>
                                            <div class="chat-message provider">
                                                <div class="message-content">
                                                    I can meet you at $9.00 and guarantee delivery by 3:00 PM
                                                </div>
                                                <div class="message-time">11:22 AM</div>
                                            </div>
                                        </div>
                                        <div class="chat-input">
                                            <input type="text" placeholder="Enter your counteroffer...">
                                            <button>Send</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="offer-actions">
                                    <button class="btn btn-success">
                                        <i class="fas fa-check"></i>
                                        Accept Offer
                                    </button>
                                    <button class="btn btn-outline">
                                        <i class="fas fa-comment-dollar"></i>
                                        Counteroffer
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fas fa-times"></i>
                                        Decline
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Offer 2 -->
                        <div class="offer-card" data-offer-id="offer-2">
                            <div class="offer-card-header">
                                <div class="offer-provider">
                                    <div class="offer-avatar">
                                        <img src="/placeholder.svg?height=60&width=60" alt="Sarah Wilson">
                                    </div>
                                    <div class="offer-provider-info">
                                        <div class="offer-provider-name">Sarah Wilson</div>
                                        <div class="offer-provider-rating">
                                            <i class="fas fa-star"></i>
                                            <span>4.7 (38 reviews)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="offer-price">$10.00</div>
                                <div class="offer-status status-pending">Pending</div>
                            </div>
                            <div class="offer-card-body">
                                <div class="offer-details">
                                    <div class="offer-provider-details">
                                        <div>
                                            <h4 class="form-label">Provider Skills</h4>
                                            <div class="provider-skills">
                                                <div class="skill-tag">Delivery</div>
                                                <div class="skill-tag">Driving</div>
                                                <div class="skill-tag">Shopping</div>
                                            </div>
                                        </div>
                                        <div class="provider-info">
                                            <div class="provider-info-item">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>Brooklyn, NY</span>
                                            </div>
                                            <div class="provider-info-item">
                                                <i class="fas fa-clock"></i>
                                                <span>Response time: Under 1 hour</span>
                                            </div>
                                            <div class="provider-info-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>24 tasks completed</span>
                                            </div>
                                            <div class="provider-info-item">
                                                <i class="fas fa-language"></i>
                                                <span>Languages: English, French</span>
                                            </div>
                                        </div>
                                        <div class="offer-notes">
                                            <div class="offer-notes-title">Provider Notes</div>
                                            <div class="offer-notes-content">
                                                I can complete this task today. I have a car and can deliver your package safely and on time.
                                            </div>
                                        </div>
                                        <label class="compare-checkbox">
                                            <input type="checkbox" class="compare-checkbox-input" data-provider-id="provider-2">
                                            <i class="fas fa-check"></i>
                                        </label>
                                    </div>
                                    <div class="negotiation-chat">
                                        <div class="chat-header">
                                            Negotiation History
                                        </div>
                                        <div class="chat-messages">
                                            <div class="chat-message provider">
                                                <div class="message-content">
                                                    I can do this task for $10.00
                                                </div>
                                                <div class="message-time">11:45 AM</div>
                                            </div>
                                        </div>
                                        <div class="chat-input">
                                            <input type="text" placeholder="Enter your counteroffer...">
                                            <button>Send</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="offer-actions">
                                    <button class="btn btn-success">
                                        <i class="fas fa-check"></i>
                                        Accept Offer
                                    </button>
                                    <button class="btn btn-outline">
                                        <i class="fas fa-comment-dollar"></i>
                                        Counteroffer
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fas fa-times"></i>
                                        Decline
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Offer 3 -->
                        <div class="offer-card" data-offer-id="offer-3">
                            <div class="offer-card-header">
                                <div class="offer-provider">
                                    <div class="offer-avatar">
                                        <img src="/placeholder.svg?height=60&width=60" alt="David Chen">
                                    </div>
                                    <div class="offer-provider-info">
                                        <div class="offer-provider-name">David Chen</div>
                                        <div class="offer-provider-rating">
                                            <i class="fas fa-star"></i>
                                            <span>4.5 (27 reviews)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="offer-price">$8.50</div>
                                <div class="offer-status status-negotiating">Negotiating</div>
                            </div>
                            <div class="offer-card-body">
                                <div class="offer-details">
                                    <div class="offer-provider-details">
                                        <div>
                                            <h4 class="form-label">Provider Skills</h4>
                                            <div class="provider-skills">
                                                <div class="skill-tag">Delivery</div>
                                                <div class="skill-tag">Moving</div>
                                                <div class="skill-tag">Heavy Lifting</div>
                                            </div>
                                        </div>
                                        <div class="provider-info">
                                            <div class="provider-info-item">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>Queens, NY</span>
                                            </div>
                                            <div class="provider-info-item">
                                                <i class="fas fa-clock"></i>
                                                <span>Response time: Under 2 hours</span>
                                            </div>
                                            <div class="provider-info-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>19 tasks completed</span>
                                            </div>
                                            <div class="provider-info-item">
                                                <i class="fas fa-language"></i>
                                                <span>Languages: English, Mandarin</span>
                                            </div>
                                        </div>
                                        <div class="offer-notes">
                                            <div class="offer-notes-title">Provider Notes</div>
                                            <div class="offer-notes-content">
                                                I can pick up your package and deliver it by 4:00 PM today. I'm offering a competitive rate for quick service.
                                            </div>
                                        </div>
                                        <label class="compare-checkbox">
                                            <input type="checkbox" class="compare-checkbox-input" data-provider-id="provider-3">
                                            <i class="fas fa-check"></i>
                                        </label>
                                    </div>
                                    <div class="negotiation-chat">
                                        <div class="chat-header">
                                            Negotiation History
                                        </div>
                                        <div class="chat-messages">
                                            <div class="chat-message provider">
                                                <div class="message-content">
                                                    I can do this task for $8.50
                                                </div>
                                                <div class="message-time">12:15 PM</div>
                                            </div>
                                            <div class="chat-message user">
                                                <div class="message-content">
                                                    That works for me, but can you deliver by 3:30 PM?
                                                </div>
                                                <div class="message-time">12:20 PM</div>
                                            </div>
                                            <div class="chat-message provider">
                                                <div class="message-content">
                                                    I can try for 3:30 PM, but can't guarantee it. 4:00 PM is more realistic.
                                                </div>
                                                <div class="message-time">12:25 PM</div>
                                            </div>
                                        </div>
                                        <div class="chat-input">
                                            <input type="text" placeholder="Enter your counteroffer...">
                                            <button>Send</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="offer-actions">
                                    <button class="btn btn-success">
                                        <i class="fas fa-check"></i>
                                        Accept Offer
                                    </button>
                                    <button class="btn btn-outline">
                                        <i class="fas fa-comment-dollar"></i>
                                        Counteroffer
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fas fa-times"></i>
                                        Decline
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div>
                    <div class="form-section">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="fas fa-filter"></i>
                                Filter Offers
                            </h2>
                        </div>
                        <div class="form-content">
                            <!-- Rating Filter -->
                            <div class="filter-group">
                                <div class="filter-title">
                                    <span>Provider Rating</span>
                                    <button type="button" class="clear-filter">Clear</button>
                                </div>
                                <div class="filter-options">
                                    <div class="filter-checkbox">
                                        <input type="checkbox" id="rating5" checked>
                                        <label for="rating5">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            (5.0)
                                        </label>
                                        <span class="count">1</span>
                                    </div>
                                    <div class="filter-checkbox">
                                        <input type="checkbox" id="rating4.5" checked>
                                        <label for="rating4.5">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            (4.5+)
                                        </label>
                                        <span class="count">3</span>
                                    </div>
                                    <div class="filter-checkbox">
                                        <input type="checkbox" id="rating4" checked>
                                        <label for="rating4">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            (4.0+)
                                        </label>
                                        <span class="count">2</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Filter -->
                            <div class="filter-group">
                                <div class="filter-title">
                                    <span>Offer Status</span>
                                    <button type="button" class="clear-filter">Clear</button>
                                </div>
                                <div class="filter-options">
                                    <div class="filter-checkbox">
                                        <input type="checkbox" id="status-pending" checked>
                                        <label for="status-pending">Pending</label>
                                        <span class="count">3</span>
                                    </div>
                                    <div class="filter-checkbox">
                                        <input type="checkbox" id="status-negotiating" checked>
                                        <label for="status-negotiating">Negotiating</label>
                                        <span class="count">2</span>
                                    </div>
                                    <div class="filter-checkbox">
                                        <input type="checkbox" id="status-accepted">
                                        <label for="status-accepted">Accepted</label>
                                        <span class="count">0</span>
                                    </div>
                                    <div class="filter-checkbox">
                                        <input type="checkbox" id="status-declined">
                                        <label for="status-declined">Declined</label>
                                        <span class="count">1</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Languages Filter -->
                            <div class="filter-group">
                                <div class="filter-title">
                                    <span>Languages</span>
                                    <button type="button" class="clear-filter">Clear</button>
                                </div>
                                <div class="filter-options">
                                    <div class="filter-checkbox">
                                        <input type="checkbox" id="lang-english" checked>
                                        <label for="lang-english">English</label>
                                        <span class="count">6</span>
                                    </div>
                                    <div class="filter-checkbox">
                                        <input type="checkbox" id="lang-spanish">
                                        <label for="lang-spanish">Spanish</label>
                                        <span class="count">2</span>
                                    </div>
                                    <div class="filter-checkbox">
                                        <input type="checkbox" id="lang-french">
                                        <label for="lang-french">French</label>
                                        <span class="count">1</span>
                                    </div>
                                    <div class="filter-checkbox">
                                        <input type="checkbox" id="lang-mandarin">
                                        <label for="lang-mandarin">Mandarin</label>
                                        <span class="count">1</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Direct Hire Option -->
                    <div class="form-section">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="fas fa-bolt"></i>
                                Direct Hire
                            </h2>
                        </div>
                        <div class="form-content">
                            <p style="font-size: 0.875rem; color: var(--text-medium); margin-bottom: 1rem;">
                                Skip the negotiation process and hire a provider instantly at your original price.
                            </p>
                            <button class="btn btn-primary" style="width: 100%;">
                                <i class="fas fa-handshake"></i>
                                Hire Now at $10.00
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Comparison Tool -->
    <div class="comparison-tool" id="comparisonTool">
        <div class="container">
            <div class="comparison-header">
                <div class="comparison-title">Compare Providers (<span id="compareCount">0</span>/3)</div>
                <button class="comparison-close" id="closeCompare">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="comparison-providers" id="comparisonProviders">
                <div class="comparison-provider empty">
                    <span>Select a provider to compare</span>
                </div>
                <div class="comparison-provider empty">
                    <span>Select a provider to compare</span>
                </div>
                <div class="comparison-provider empty">
                    <span>Select a provider to compare</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Counteroffer Modal -->
    <div class="modal-backdrop" id="counterofferModal">
        <div class="modal">
            <div class="modal-header">
                <h3 class="modal-title">Make a Counteroffer</h3>
                <p class="modal-description">Propose a new price or terms to the provider</p>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label" for="counterofferPrice">Your Price</label>
                    <input type="text" class="form-control" id="counterofferPrice" placeholder="Enter your price">
                </div>
                <div class="form-group">
                    <label class="form-label" for="counterofferMessage">Message (Optional)</label>
                    <textarea class="form-control" id="counterofferMessage" placeholder="Add details about your counteroffer..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" id="cancelCounterBtn">Cancel</button>
                <button class="btn btn-primary" id="sendCounterBtn">Send Counteroffer</button>
            </div>
        </div>
    </div>

    <script>
        // DOM Elements
        const offerList = document.getElementById('offerList');
        const comparisonTool = document.getElementById('comparisonTool');
        const comparisonProviders = document.getElementById('comparisonProviders');
        const compareCount = document.getElementById('compareCount');
        const closeCompare = document.getElementById('closeCompare');
        const counterofferModal = document.getElementById('counterofferModal');
        const cancelCounterBtn = document.getElementById('cancelCounterBtn');
        const sendCounterBtn = document.getElementById('sendCounterBtn');

        // Mock data for providers
        const MOCK_PROVIDERS = [
            {
                id: "provider-1",
                name: "Michael Brown",
                avatar: "/placeholder.svg?height=60&width=60",
                rating: 4.9,
                reviews: 42,
                skills: ["Delivery", "Errands", "Shopping"],
                languages: ["English", "Spanish"],
                location: "New York, NY",
                responseTime: "Under 30 min",
                completedTasks: 38,
                price: "$9.00",
                status: "negotiating"
            },
            {
                id: "provider-2",
                name: "Sarah Wilson",
                avatar: "/placeholder.svg?height=60&width=60",
                rating: 4.7,
                reviews: 38,
                skills: ["Delivery", "Driving", "Shopping"],
                languages: ["English", "French"],
                location: "Brooklyn, NY",
                responseTime: "Under 1 hour",
                completedTasks: 24,
                price: "$10.00",
                status: "pending"
            },
            {
                id: "provider-3",
                name: "David Chen",
                avatar: "/placeholder.svg?height=60&width=60",
                rating: 4.5,
                reviews: 27,
                skills: ["Delivery", "Moving", "Heavy Lifting"],
                languages: ["English", "Mandarin"],
                location: "Queens, NY",
                responseTime: "Under 2 hours",
                completedTasks: 19,
                price: "$8.50",
                status: "negotiating"
            },
            {
                id: "provider-4",
                name: "Emily Rodriguez",
                avatar: "/placeholder.svg?height=60&width=60",
                rating: 5.0,
                reviews: 15,
                skills: ["Delivery", "Errands", "Shopping"],
                languages: ["English", "Spanish"],
                location: "Manhattan, NY",
                responseTime: "Under 15 min",
                completedTasks: 12,
                price: "$10.00",
                status: "pending"
            },
            {
                id: "provider-5",
                name: "James Wilson",
                avatar: "/placeholder.svg?height=60&width=60",
                rating: 4.8,
                reviews: 31,
                skills: ["Delivery", "Driving", "Shopping"],
                languages: ["English"],
                location: "Bronx, NY",
                responseTime: "Under 45 min",
                completedTasks: 27,
                price: "$9.50",
                status: "pending"
            },
            {
                id: "provider-6",
                name: "Olivia Martinez",
                avatar: "/placeholder.svg?height=60&width=60",
                rating: 4.6,
                reviews: 22,
                skills: ["Delivery", "Errands", "Shopping"],
                languages: ["English", "Spanish"],
                location: "Staten Island, NY",
                responseTime: "Under 1 hour",
                completedTasks: 18,
                price: "$11.00",
                status: "declined"
            }
        ];

        // Selected providers for comparison
        let selectedProviders = [];

        // Initialize the page
        function init() {
            setupEventListeners();
        }

        // Setup event listeners
        function setupEventListeners() {
            // Offer card header click to expand/collapse
            document.addEventListener('click', (e) => {
                const header = e.target.closest('.offer-card-header');
                if (header) {
                    const card = header.closest('.offer-card');
                    toggleOfferCard(card);
                }
            });

            // Compare checkbox
            document.addEventListener('change', (e) => {
                if (e.target.classList.contains('compare-checkbox-input')) {
                    const providerId = e.target.dataset.providerId;
                    if (e.target.checked) {
                        addToCompare(providerId);
                    } else {
                        removeFromCompare(providerId);
                    }
                }
            });

            // Close comparison tool
            closeCompare.addEventListener('click', () => {
                comparisonTool.classList.remove('active');
            });

            // Counteroffer button
            document.addEventListener('click', (e) => {
                if (e.target.classList.contains('btn-outline') && e.target.textContent.includes('Counteroffer')) {
                    const card = e.target.closest('.offer-card');
                    if (card) {
                        const providerId = card.dataset.offerId;
                        openCounterOfferModal(providerId);
                    }
                }
            });

            // Accept offer button
            document.addEventListener('click', (e) => {
                if (e.target.classList.contains('btn-success') || e.target.closest('.btn-success')) {
                    const card = e.target.closest('.offer-card');
                    if (card) {
                        const providerId = card.dataset.offerId;
                        acceptOffer(providerId);
                    }
                }
            });

            // Decline offer button
            document.addEventListener('click', (e) => {
                if (e.target.classList.contains('btn-danger') || e.target.closest('.btn-danger')) {
                    const card = e.target.closest('.offer-card');
                    if (card) {
                        const providerId = card.dataset.offerId;
                        declineOffer(providerId);
                    }
                }
            });

            // Cancel counteroffer button
            cancelCounterBtn.addEventListener('click', () => {
                counterofferModal.classList.remove('active');
            });

            // Send counteroffer button
            sendCounterBtn.addEventListener('click', () => {
                const price = document.getElementById('counterofferPrice').value;
                const message = document.getElementById('counterofferMessage').value;

                if (price.trim() === '') {
                    alert('Please enter a price for your counteroffer');
                    return;
                }

                // In a real app, this would send the counteroffer to the backend
                alert(`Your counteroffer of ${price} has been sent!`);
                counterofferModal.classList.remove('active');

                // Clear form
                document.getElementById('counterofferPrice').value = '';
                document.getElementById('counterofferMessage').value = '';
            });

            // Filter clear buttons
            document.querySelectorAll('.clear-filter').forEach(button => {
                button.addEventListener('click', (e) => {
                    const filterGroup = e.target.closest('.filter-group');
                    const checkboxes = filterGroup.querySelectorAll('input[type="checkbox"]');
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = false;
                    });
                });
            });

            // Sort select
            document.getElementById('sort-by').addEventListener('change', (e) => {
                const sortValue = e.target.value;
                sortOffers(sortValue);
            });
        }

        // Toggle offer card expand/collapse
        function toggleOfferCard(card) {
            // Close all other cards
            document.querySelectorAll('.offer-card.expanded').forEach(expandedCard => {
                if (expandedCard !== card) {
                    expandedCard.classList.remove('expanded');
                }
            });

            // Toggle this card
            card.classList.toggle('expanded');
        }

        // Add provider to comparison
        function addToCompare(providerId) {
            if (selectedProviders.length >= 3) {
                alert('You can only compare up to 3 providers at a time');
                // Uncheck the checkbox
                const checkbox = document.querySelector(`.compare-checkbox-input[data-provider-id="${providerId}"]`);
                if (checkbox) {
                    checkbox.checked = false;
                }
                return;
            }

            const provider = MOCK_PROVIDERS.find(p => p.id === providerId);
            if (provider && !selectedProviders.includes(providerId)) {
                selectedProviders.push(providerId);
                updateComparisonTool();
            }
        }

        // Remove provider from comparison
        function removeFromCompare(providerId) {
            const index = selectedProviders.indexOf(providerId);
            if (index !== -1) {
                selectedProviders.splice(index, 1);
                updateComparisonTool();

                // Uncheck the checkbox
                const checkbox = document.querySelector(`.compare-checkbox-input[data-provider-id="${providerId}"]`);
                if (checkbox) {
                    checkbox.checked = false;
                }
            }
        }

        // Update comparison tool
        function updateComparisonTool() {
            compareCount.textContent = selectedProviders.length;

            // Show/hide comparison tool
            if (selectedProviders.length > 0) {
                comparisonTool.classList.add('active');
            } else {
                comparisonTool.classList.remove('active');
            }

            // Update comparison providers
            const comparisonSlots = comparisonProviders.querySelectorAll('.comparison-provider');

            // Reset all slots to empty
            comparisonSlots.forEach((slot, index) => {
                if (index < selectedProviders.length) {
                    const providerId = selectedProviders[index];
                    const provider = MOCK_PROVIDERS.find(p => p.id === providerId);

                    if (provider) {
                        slot.className = 'comparison-provider';

                        // Add highlight badges
                        let highlightBadge = '';
                        if (index === 0 && selectedProviders.length > 1) {
                            // Find the lowest price
                            const prices = selectedProviders.map(id => {
                                const p = MOCK_PROVIDERS.find(p => p.id === id);
                                return parseFloat(p.price.replace('$', ''));
                            });
                            const lowestPrice = Math.min(...prices);
                            const thisPrice = parseFloat(provider.price.replace('$', ''));

                            if (thisPrice === lowestPrice) {
                                highlightBadge = '<div class="highlight-badge">Cheapest</div>';
                            }

                            // Find the fastest response
                            const responseTimes = selectedProviders.map(id => {
                                const p = MOCK_PROVIDERS.find(p => p.id === id);
                                return p.responseTime.includes('min') ?
                                    parseInt(p.responseTime.match(/\d+/)[0]) :
                                    parseInt(p.responseTime.match(/\d+/)[0]) * 60;
                            });
                            const fastestResponse = Math.min(...responseTimes);
                            const thisResponse = provider.responseTime.includes('min') ?
                                parseInt(provider.responseTime.match(/\d+/)[0]) :
                                parseInt(provider.responseTime.match(/\d+/)[0]) * 60;

                            if (thisResponse === fastestResponse && !highlightBadge) {
                                highlightBadge = '<div class="highlight-badge">Fastest</div>';
                            }

                            // Highest rated
                            const ratings = selectedProviders.map(id => {
                                const p = MOCK_PROVIDERS.find(p => p.id === id);
                                return p.rating;
                            });
                            const highestRating = Math.max(...ratings);

                            if (provider.rating === highestRating && !highlightBadge) {
                                highlightBadge = '<div class="highlight-badge">Top Rated</div>';
                            }
                        }

                        slot.innerHTML = `
                            ${highlightBadge}
                            <button class="comparison-remove" data-provider-id="${provider.id}">
                                <i class="fas fa-times"></i>
                            </button>
                            <div class="comparison-avatar">
                                <img src="${provider.avatar}" alt="${provider.name}">
                            </div>
                            <div class="comparison-name">${provider.name}</div>
                            <div class="comparison-rating">
                                <i class="fas fa-star"></i>
                                <span>${provider.rating} (${provider.reviews})</span>
                            </div>
                            <div class="comparison-details">
                                <div class="comparison-detail">
                                    <div class="comparison-detail-label">Response Time</div>
                                    <div class="comparison-detail-value">${provider.responseTime}</div>
                                </div>
                                <div class="comparison-detail">
                                    <div class="comparison-detail-label">Completed Tasks</div>
                                    <div class="comparison-detail-value">${provider.completedTasks}</div>
                                </div>
                                <div class="comparison-detail">
                                    <div class="comparison-detail-label">Languages</div>
                                    <div class="comparison-detail-value">${provider.languages.join(', ')}</div>
                                </div>
                                <div class="comparison-detail">
                                    <div class="comparison-detail-label">Status</div>
                                    <div class="comparison-detail-value">${provider.status.charAt(0).toUpperCase() + provider.status.slice(1)}</div>
                                </div>
                            </div>
                            <div class="comparison-price">${provider.price}</div>
                            <div class="comparison-actions">
                                <button class="btn btn-success comparison-btn" data-provider-id="${provider.id}">
                                    Accept
                                </button>
                                <button class="btn btn-outline comparison-btn" data-provider-id="${provider.id}">
                                    Counter
                                </button>
                            </div>
                        `;
                    }
                } else {
                    slot.className = 'comparison-provider empty';
                    slot.innerHTML = '<span>Select a provider to compare</span>';
                }
            });

            // Add event listeners to remove buttons
            document.querySelectorAll('.comparison-remove').forEach(button => {
                button.addEventListener('click', (e) => {
                    const providerId = e.target.closest('.comparison-remove').dataset.providerId;
                    removeFromCompare(providerId);
                });
            });
        }

        // Open counteroffer modal
        function openCounterOfferModal(offerId) {
            // In a real app, you would get the provider details from the offerId
            counterofferModal.classList.add('active');
        }

        // Accept offer
        function acceptOffer(offerId) {
            // In a real app, this would send the acceptance to the backend
            alert(`You've accepted the offer! In a real app, this would finalize the booking.`);
        }

        // Decline offer
        function declineOffer(offerId) {
            // In a real app, this would send the decline to the backend
            alert(`You've declined the offer. In a real app, this would notify the provider.`);
        }

        // Sort offers
        function sortOffers(sortValue) {
            // In a real app, this would re-fetch or re-sort the offers
            alert(`Sorting by ${sortValue}. In a real app, this would re-sort the offers list.`);
        }

        // Initialize the page when DOM is loaded
        document.addEventListener('DOMContentLoaded', init);
    </script>
</body>

</html>
