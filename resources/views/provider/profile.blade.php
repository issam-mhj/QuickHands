<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Provider Profile Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #FF6B6B;
            --primary-light: #FFE2E2;
            --secondary: #4ECDC4;
            --secondary-light: #CBF3F0;
            --dark: #292F36;
            --gray: #6C757D;
            --light-gray: #E9ECEF;
            --white: #FFFFFF;
            --success: #42B883;
            --warning: #FFC107;
            --danger: #FF5252;
            --info: #2196F3;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F8F9FA;
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        header {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .logo h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
        }

        .nav-links {
            display: flex;
            gap: 20px;
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
            gap: 15px;
        }

        .notification-icon {
            position: relative;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--primary);
            color: white;
            font-size: 0.7rem;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
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
            object-fit: cover;
        }

        .user-name {
            font-weight: 500;
        }

        /* Main Content Styles */
        main {
            padding: 30px 0;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .stats-wrapper {
            margin-bottom: 30px;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .stat-card {
            background-color: var(--white);
            border-radius: 10px;
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
            margin-bottom: 10px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 1.2rem;
            color: var(--white);
        }

        .stat-icon.rating {
            background-color: var(--primary);
        }

        .stat-icon.reviews {
            background-color: var(--secondary);
        }

        .stat-icon.completed {
            background-color: var(--success);
        }

        .stat-icon.earnings {
            background-color: var(--info);
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 600;
            margin: 5px 0;
        }

        .stat-label {
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Tab Styles */
        .tabs-container {
            margin-bottom: 30px;
        }

        .tabs {
            display: flex;
            gap: 10px;
            border-bottom: 1px solid var(--light-gray);
            margin-bottom: 20px;
        }

        .tab {
            padding: 10px 20px;
            font-weight: 500;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
        }

        .tab:hover {
            color: var(--primary);
        }

        .tab.active {
            color: var(--primary);
            border-bottom: 3px solid var(--primary);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Card Styles */
        .card {
            background-color: var(--white);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            font-size: 1rem;
            border: 1px solid var(--light-gray);
            border-radius: 5px;
            transition: border-color 0.3s;
            font-family: 'Poppins', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--secondary);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .help-text {
            font-size: 0.8rem;
            color: var(--gray);
            margin-top: 5px;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: 500;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary {
            background-color: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background-color: #ff5252;
        }

        .btn-secondary {
            background-color: var(--secondary);
            color: var(--white);
        }

        .btn-secondary:hover {
            background-color: #3dbbb3;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--light-gray);
            color: var(--dark);
        }

        .btn-outline:hover {
            background-color: var(--light-gray);
        }

        /* Profile Specific Styles */
        .profile-header {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }

        .profile-image-container {
            position: relative;
            width: 150px;
            height: 150px;
        }

        .profile-image {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            object-fit: cover;
        }

        .image-upload {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: var(--white);
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
        }

        .image-upload:hover {
            background-color: var(--primary);
            color: var(--white);
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .profile-status {
            display: inline-block;
            padding: 5px 15px;
            background-color: var(--success);
            color: var(--white);
            border-radius: 20px;
            font-size: 0.85rem;
            margin-bottom: 15px;
        }

        .profile-stats {
            display: flex;
            gap: 30px;
        }

        .profile-stat {
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
        }

        /* Skill Tags */
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }

        .skill-tag {
            background-color: var(--secondary-light);
            color: var(--secondary);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .skill-tag .remove-skill {
            cursor: pointer;
        }

        .add-skill {
            background-color: var(--light-gray);
            color: var(--gray);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .add-skill:hover {
            background-color: var(--gray);
            color: var(--white);
        }

        /* Calendar Styles */
        .calendar-container {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .calendar-title {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .calendar-nav {
            display: flex;
            gap: 10px;
        }

        .calendar-nav-btn {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--light-gray);
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s;
        }

        .calendar-nav-btn:hover {
            background-color: var(--secondary);
            color: var(--white);
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }

        .calendar-day-header {
            text-align: center;
            font-weight: 500;
            padding: 10px;
        }

        .calendar-day {
            aspect-ratio: 1/1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .calendar-day:hover {
            background-color: var(--light-gray);
        }

        .calendar-day.today {
            background-color: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
        }

        .calendar-day.selected {
            background-color: var(--primary);
            color: var(--white);
        }

        .calendar-day.other-month {
            color: var(--light-gray);
        }

        /* Time Slots */
        .time-slots {
            margin-top: 20px;
        }

        .time-slots-header {
            font-weight: 500;
            margin-bottom: 10px;
        }

        .time-slots-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .time-slot {
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
            border: 1px solid var(--light-gray);
        }

        .time-slot:hover {
            background-color: var(--light-gray);
        }

        .time-slot.selected {
            background-color: var(--secondary);
            color: var(--white);
            border-color: var(--secondary);
        }

        /* Service Pricing */
        .pricing-table {
            width: 100%;
            border-collapse: collapse;
        }

        .pricing-table th,
        .pricing-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--light-gray);
        }

        .pricing-table th {
            font-weight: 500;
            color: var(--gray);
        }

        .pricing-type {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .service-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: var(--secondary-light);
            color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pricing-actions {
            display: flex;
            gap: 10px;
        }

        .action-icon {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s;
        }

        .action-icon:hover {
            background-color: var(--light-gray);
        }

        .add-pricing-row {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        /* Modal Styles */
        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
        }

        .modal-backdrop.show {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-content {
            background-color: var(--white);
            border-radius: 10px;
            padding: 25px;
            width: 500px;
            max-width: 90%;
            transform: translateY(-20px);
            transition: transform 0.3s;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .modal-backdrop.show .modal-content {
            transform: translateY(0);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .modal-close {
            cursor: pointer;
            font-size: 1.2rem;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .time-slots-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .profile-stats {
                justify-content: center;
            }

            .time-slots-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .nav-links {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .stats-container {
                grid-template-columns: 1fr;
            }

            .time-slots-grid {
                grid-template-columns: 1fr;
            }

            .user-name {
                display: none;
            }
        }

        /* Toggle Switch */
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 30px;
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
            background-color: #ccc;
            border-radius: 34px;
            transition: .4s;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            border-radius: 50%;
            transition: .4s;
        }

        input:checked+.toggle-slider {
            background-color: var(--success);
        }

        input:focus+.toggle-slider {
            box-shadow: 0 0 1px var(--success);
        }

        input:checked+.toggle-slider:before {
            transform: translateX(30px);
        }

        .toggle-label {
            margin-left: 10px;
            font-weight: normal;
        }

        .status-toggle {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        /* File Upload */
        .file-input {
            display: none;
        }

        .upload-btn {
            background-color: var(--secondary-light);
            color: var(--secondary);
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .upload-btn:hover {
            background-color: var(--secondary);
            color: white;
        }

        .uploaded-files {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 15px;
        }

        .uploaded-file {
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: 5px;
            overflow: hidden;
        }

        .uploaded-file img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .remove-file {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 20px;
            height: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 12px;
        }

        /* Language Selection */
        .language-select {
            position: relative;
        }

        .select-wrapper {
            position: relative;
        }

        .select-wrapper:after {
            content: '\f078';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        select.form-control {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        /* Progress Bar */
        .progress-container {
            width: 100%;
            height: 10px;
            background-color: var(--light-gray);
            border-radius: 5px;
            margin-bottom: 5px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background-color: var(--primary);
            border-radius: 5px;
            transition: width 0.5s;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            color: var(--gray);
        }

        .profile-completion {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <div class="container header-container">
            <div class="logo">
                <img src="/placeholder.svg?height=40&width=40" alt="QuickHands Logo">
                <h1>QuickHands</h1>
            </div>
            <nav class="nav-links">
                <a href="provider-dashboard.html">Dashboard</a>
                <a href="provider-available-tasks.html">Available Tasks</a>
                <a href="provider-task-management.html">My Tasks</a>
                <a href="provider-earnings-payments.html">Earnings</a>
                <a href="provider-reviews-ratings.html">Reviews</a>
                <a href="provider-profile-management.html" class="active">Profile</a>
            </nav>
            <div class="user-actions">
                <div class="notification-icon">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </div>
                <div class="user-profile">
                    <img src="/placeholder.svg?height=40&width=40" alt="User Avatar" class="avatar">
                    <span class="user-name">John Doe</span>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="page-header">
                <h2 class="page-title">Profile Management</h2>
            </div>

            <div class="stats-wrapper">
                <div class="stats-container">
                    <div class="stat-card">
                        <div class="stat-header">
                            <span>Profile Views</span>
                            <div class="stat-icon rating">
                                <i class="fas fa-eye"></i>
                            </div>
                        </div>
                        <h3 class="stat-value">245</h3>
                        <p class="stat-label">Last 30 days</p>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header">
                            <span>Profile Completion</span>
                            <div class="stat-icon reviews">
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                        <h3 class="stat-value">85%</h3>
                        <p class="stat-label">Add more skills to reach 100%</p>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header">
                            <span>Tasks Completed</span>
                            <div class="stat-icon completed">
                                <i class="fas fa-tasks"></i>
                            </div>
                        </div>
                        <h3 class="stat-value">127</h3>
                        <p class="stat-label">Since joining</p>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header">
                            <span>Average Rating</span>
                            <div class="stat-icon earnings">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <h3 class="stat-value">4.8</h3>
                        <p class="stat-label">From 92 reviews</p>
                    </div>
                </div>
            </div>

            <div class="tabs-container">
                <div class="tabs">
                    <div class="tab active" data-tab="profile-details">Profile Details</div>
                    <div class="tab" data-tab="availability">Availability Settings</div>
                    <div class="tab" data-tab="pricing">Service Pricing</div>
                </div>

                <!-- Profile Details Tab -->
                <div class="tab-content active" id="profile-details">
                    <div class="profile-header">
                        <div class="profile-image-container">
                            <img src="/placeholder.svg?height=150&width=150" alt="Profile Image" class="profile-image">
                            <label for="profile-pic" class="image-upload">
                                <i class="fas fa-camera"></i>
                            </label>
                            <input type="file" id="profile-pic" class="file-input" accept="image/*">
                        </div>
                        <div class="profile-info">
                            <h3 class="profile-name">John Doe</h3>
                            <div class="profile-status">Available for Work</div>
                            <div class="profile-stats">
                                <div class="profile-stat">
                                    <div class="stat-number">4.8</div>
                                    <div class="stat-label">Rating</div>
                                </div>
                                <div class="profile-stat">
                                    <div class="stat-number">127</div>
                                    <div class="stat-label">Tasks</div>
                                </div>
                                <div class="profile-stat">
                                    <div class="stat-number">92</div>
                                    <div class="stat-label">Reviews</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Basic Information</h3>
                        </div>
                        <form>
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" id="fullname" class="form-control" value="John Doe">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" class="form-control"
                                    value="johndoe@example.com">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" class="form-control" value="+1 (555) 123-4567">
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" id="location" class="form-control" value="San Francisco, CA">
                            </div>
                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea id="bio" class="form-control">Hi, I'm John! I have over 5 years of experience in various handyman tasks, deliveries, and errands. I'm reliable, punctual, and take pride in providing excellent service. Let me help you get things done efficiently and professionally!</textarea>
                                <div class="help-text">Briefly describe yourself and your experience (max 300
                                    characters)</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Skills & Expertise</h3>
                        </div>
                        <div class="skills-container">
                            <div class="skill-tag">
                                Deliveries <span class="remove-skill"><i class="fas fa-times"></i></span>
                            </div>
                            <div class="skill-tag">
                                Furniture Assembly <span class="remove-skill"><i class="fas fa-times"></i></span>
                            </div>
                            <div class="skill-tag">
                                Home Cleaning <span class="remove-skill"><i class="fas fa-times"></i></span>
                            </div>
                            <div class="skill-tag">
                                Errands <span class="remove-skill"><i class="fas fa-times"></i></span>
                            </div>
                            <div class="skill-tag">
                                Moving <span class="remove-skill"><i class="fas fa-times"></i></span>
                            </div>
                            <div class="add-skill">
                                <i class="fas fa-plus"></i> Add Skill
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Languages Spoken</label>
                            <div class="select-wrapper">
                                <select multiple class="form-control">
                                    <option selected>English</option>
                                    <option selected>Spanish</option>
                                    <option>French</option>
                                    <option>German</option>
                                    <option>Mandarin</option>
                                    <option>Japanese</option>
                                    <option>Hindi</option>
                                    <option>Arabic</option>
                                </select>
                            </div>
                            <div class="help-text">Select all languages you speak fluently</div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Certifications & Qualifications</h3>
                        </div>
                        <div class="form-group">
                            <label for="certifications">Certifications</label>
                            <textarea id="certifications" class="form-control">• Certified Handyman Professional (CHP)
• First Aid and CPR Certified
• Verified Safe Driver</textarea>
                            <div class="help-text">List your relevant certifications</div>
                        </div>
                        <div class="form-group">
                            <label>Certificate Documents</label>
                            <label for="certificate-upload" class="upload-btn">
                                <i class="fas fa-upload"></i> Upload Certificate
                            </label>
                            <input type="file" id="certificate-upload" class="file-input"
                                accept=".pdf,.jpg,.png">
                            <div class="help-text">Upload PDF, JPG, or PNG files (max 5MB per file)</div>

                            <div class="uploaded-files">
                                <div class="uploaded-file">
                                    <img src="/placeholder.svg?height=100&width=100" alt="Certificate 1">
                                    <div class="remove-file">
                                        <i class="fas fa-times"></i>
                                    </div>
                                </div>
                                <div class="uploaded-file">
                                    <img src="/placeholder.svg?height=100&width=100" alt="Certificate 2">
                                    <div class="remove-file">
                                        <i class="fas fa-times"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Work Samples</h3>
                        </div>
                        <div class="form-group">
                            <label for="sample-upload" class="upload-btn">
                                <i class="fas fa-upload"></i> Upload Work Sample
                            </label>
                            <input type="file" id="sample-upload" class="file-input" accept="image/*" multiple>
                            <div class="help-text">Upload images of your past work (max 5MB per image)</div>

                            <div class="uploaded-files">
                                <div class="uploaded-file">
                                    <img src="/placeholder.svg?height=100&width=100" alt="Work Sample 1">
                                    <div class="remove-file">
                                        <i class="fas fa-times"></i>
                                    </div>
                                </div>
                                <div class="uploaded-file">
                                    <img src="/placeholder.svg?height=100&width=100" alt="Work Sample 2">
                                    <div class="remove-file">
                                        <i class="fas fa-times"></i>
                                    </div>
                                </div>
                                <div class="uploaded-file">
                                    <img src="/placeholder.svg?height=100&width=100" alt="Work Sample 3">
                                    <div class="remove-file">
                                        <i class="fas fa-times"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="profile-completion">
                        <p>Profile Completion</p>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 85%;"></div>
                        </div>
                        <div class="progress-label">
                            <span>85% Complete</span>
                            <span>15% Remaining</span>
                        </div>
                    </div>
                </div>

                <!-- Availability Settings Tab -->
                <div class="tab-content" id="availability">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Availability Status</h3>
                        </div>
                        <div class="status-toggle">
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="toggle-slider"></span>
                            </label>
                            <span class="toggle-label">Available for Work</span>
                        </div>
                        <p>When toggled off, you won't receive new task requests but can still complete your current
                            tasks.</p>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Weekly Schedule</h3>
                        </div>
                        <div class="calendar-container">
                            <div class="calendar-header">
                                <div class="calendar-title">September 2023</div>
                                <div class="calendar-nav">
                                    <div class="calendar-nav-btn">
                                        <i class="fas fa-chevron-left"></i>
                                    </div>
                                    <div class="calendar-nav-btn">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="calendar-grid">
                                <div class="calendar-day-header">Sun</div>
                                <div class="calendar-day-header">Mon</div>
                                <div class="calendar-day-header">Tue</div>
                                <div class="calendar-day-header">Wed</div>
                                <div class="calendar-day-header">Thu</div>
                                <div class="calendar-day-header">Fri</div>
                                <div class="calendar-day-header">Sat</div>

                                <div class="calendar-day other-month">27</div>
                                <div class="calendar-day other-month">28</div>
                                <div class="calendar-day other-month">29</div>
                                <div class="calendar-day other-month">30</div>
                                <div class="calendar-day other-month">31</div>
                                <div class="calendar-day">1</div>
                                <div class="calendar-day">2</div>

                                <div class="calendar-day">3</div>
                                <div class="calendar-day">4</div>
                                <div class="calendar-day">5</div>
                                <div class="calendar-day">6</div>
                                <div class="calendar-day">7</div>
                                <div class="calendar-day">8</div>
                                <div class="calendar-day">9</div>

                                <div class="calendar-day">10</div>
                                <div class="calendar-day">11</div>
                                <div class="calendar-day">12</div>
                                <div class="calendar-day">13</div>
                                <div class="calendar-day">14</div>
                                <div class="calendar-day">15</div>
                                <div class="calendar-day today">16</div>

                                <div class="calendar-day">17</div>
                                <div class="calendar-day selected">18</div>
                                <div class="calendar-day">19</div>
                                <div class="calendar-day">20</div>
                                <div class="calendar-day">21</div>
                                <div class="calendar-day">22</div>
                                <div class="calendar-day">23</div>

                                <div class="calendar-day">24</div>
                                <div class="calendar-day">25</div>
                                <div class="calendar-day">26</div>
                                <div class="calendar-day">27</div>
                                <div class="calendar-day">28</div>
                                <div class="calendar-day">29</div>
                                <div class="calendar-day">30</div>
                            </div>

                            <div class="time-slots">
                                <div class="time-slots-header">Available Time Slots for Sep 18</div>
                                <div class="time-slots-grid">
                                    <div class="time-slot">8:00 AM</div>
                                    <div class="time-slot">9:00 AM</div>
                                    <div class="time-slot selected">10:00 AM</div>
                                    <div class="time-slot selected">11:00 AM</div>
                                    <div class="time-slot">12:00 PM</div>
                                    <div class="time-slot">1:00 PM</div>
                                    <div class="time-slot selected">2:00 PM</div>
                                    <div class="time-slot selected">3:00 PM</div>
                                    <div class="time-slot selected">4:00 PM</div>
                                    <div class="time-slot">5:00 PM</div>
                                    <div class="time-slot">6:00 PM</div>
                                    <div class="time-slot">7:00 PM</div>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 20px; text-align: right;">
                            <button class="btn btn-secondary">Save Schedule</button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Service Area</h3>
                        </div>
                        <div class="form-group">
                            <label for="service-radius">Service Radius</label>
                            <select id="service-radius" class="form-control">
                                <option>5 miles</option>
                                <option selected>10 miles</option>
                                <option>15 miles</option>
                                <option>20 miles</option>
                                <option>25 miles</option>
                            </select>
                            <div class="help-text">Maximum distance you're willing to travel for tasks</div>
                        </div>
                        <div class="form-group">
                            <label for="zipcode">ZIP Code</label>
                            <input type="text" id="zipcode" class="form-control" value="94103">
                        </div>
                        <div style="margin-top: 20px;">
                            <button class="btn btn-primary">Update Service Area</button>
                        </div>
                    </div>
                </div>

                <!-- Service Pricing Tab -->
                <div class="tab-content" id="pricing">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Service Rates</h3>
                        </div>
                        <table class="pricing-table">
                            <thead>
                                <tr>
                                    <th>Service Type</th>
                                    <th>Rate Type</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="pricing-type">
                                            <div class="service-icon">
                                                <i class="fas fa-truck"></i>
                                            </div>
                                            <span>Deliveries</span>
                                        </div>
                                    </td>
                                    <td>Hourly</td>
                                    <td>$25.00</td>
                                    <td>
                                        <div class="pricing-actions">
                                            <div class="action-icon">
                                                <i class="fas fa-edit"></i>
                                            </div>
                                            <div class="action-icon">
                                                <i class="fas fa-trash-alt"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="pricing-type">
                                            <div class="service-icon">
                                                <i class="fas fa-shopping-bag"></i>
                                            </div>
                                            <span>Grocery Shopping</span>
                                        </div>
                                    </td>
                                    <td>Hourly</td>
                                    <td>$22.00</td>
                                    <td>
                                        <div class="pricing-actions">
                                            <div class="action-icon">
                                                <i class="fas fa-edit"></i>
                                            </div>
                                            <div class="action-icon">
                                                <i class="fas fa-trash-alt"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="pricing-type">
                                            <div class="service-icon">
                                                <i class="fas fa-couch"></i>
                                            </div>
                                            <span>Furniture Assembly</span>
                                        </div>
                                    </td>
                                    <td>Fixed</td>
                                    <td>$75.00</td>
                                    <td>
                                        <div class="pricing-actions">
                                            <div class="action-icon">
                                                <i class="fas fa-edit"></i>
                                            </div>
                                            <div class="action-icon">
                                                <i class="fas fa-trash-alt"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="pricing-type">
                                            <div class="service-icon">
                                                <i class="fas fa-broom"></i>
                                            </div>
                                            <span>Home Cleaning</span>
                                        </div>
                                    </td>
                                    <td>Hourly</td>
                                    <td>$30.00</td>
                                    <td>
                                        <div class="pricing-actions">
                                            <div class="action-icon">
                                                <i class="fas fa-edit"></i>
                                            </div>
                                            <div class="action-icon">
                                                <i class="fas fa-trash-alt"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="pricing-type">
                                            <div class="service-icon">
                                                <i class="fas fa-people-carry"></i>
                                            </div>
                                            <span>Moving Help</span>
                                        </div>
                                    </td>
                                    <td>Hourly</td>
                                    <td>$35.00</td>
                                    <td>
                                        <div class="pricing-actions">
                                            <div class="action-icon">
                                                <i class="fas fa-edit"></i>
                                            </div>
                                            <div class="action-icon">
                                                <i class="fas fa-trash-alt"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="add-pricing-row">
                            <button class="btn btn-outline">
                                <i class="fas fa-plus"></i> Add New Service
                            </button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Market Rate Comparison</h3>
                        </div>
                        <p>How your rates compare to the market average in your area:</p>
                        <div style="margin: 20px 0;">
                            <div style="margin-bottom: 15px;">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                    <span>Deliveries</span>
                                    <span>Your rate: $25 | Market avg: $23</span>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-bar"
                                        style="width: 108%; background-color: var(--secondary);"></div>
                                </div>
                                <div class="progress-label">
                                    <span>8% above market</span>
                                </div>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                    <span>Furniture Assembly</span>
                                    <span>Your rate: $75 | Market avg: $80</span>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-bar" style="width: 94%; background-color: var(--warning);">
                                    </div>
                                </div>
                                <div class="progress-label">
                                    <span>6% below market</span>
                                </div>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                    <span>Home Cleaning</span>
                                    <span>Your rate: $30 | Market avg: $28</span>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-bar"
                                        style="width: 107%; background-color: var(--secondary);"></div>
                                </div>
                                <div class="progress-label">
                                    <span>7% above market</span>
                                </div>
                            </div>
                        </div>
                        <div class="help-text">Keeping your rates competitive can help you win more tasks.</div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Add New Service Modal -->
    <div class="modal-backdrop" id="add-service-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Service</h3>
                <div class="modal-close">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="service-type">Service Type</label>
                    <select id="service-type" class="form-control">
                        <option value="">Select a service</option>
                        <option value="pet-sitting">Pet Sitting</option>
                        <option value="yard-work">Yard Work</option>
                        <option value="handyman">Handyman</option>
                        <option value="tech-help">Tech Help</option>
                        <option value="other">Other (specify)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="rate-type">Rate Type</label>
                    <select id="rate-type" class="form-control">
                        <option value="hourly">Hourly Rate</option>
                        <option value="fixed">Fixed Price</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="service-price">Price ($)</label>
                    <input type="number" id="service-price" class="form-control" placeholder="0.00" step="0.01"
                        min="0">
                </div>
                <div class="form-group">
                    <label for="service-description">Description (Optional)</label>
                    <textarea id="service-description" class="form-control" placeholder="Describe what's included in this service..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline modal-close-btn">Cancel</button>
                <button class="btn btn-primary">Add Service</button>
            </div>
        </div>
    </div>

    <script>
        // Tab Switching
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => {
                const tabId = tab.getAttribute('data-tab');

                // Remove active class from all tabs
                document.querySelectorAll('.tab').forEach(t => {
                    t.classList.remove('active');
                });

                // Add active class to clicked tab
                tab.classList.add('active');

                // Hide all tab contents
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });

                // Show the selected tab content
                document.getElementById(tabId).classList.add('active');
            });
        });

        // Modal functionality
        document.querySelector('.add-pricing-row button').addEventListener('click', () => {
            document.getElementById('add-service-modal').classList.add('show');
        });

        document.querySelector('.modal-close').addEventListener('click', () => {
            document.getElementById('add-service-modal').classList.remove('show');
        });

        document.querySelector('.modal-close-btn').addEventListener('click', () => {
            document.getElementById('add-service-modal').classList.remove('show');
        });
    </script>
</body>

</html>
