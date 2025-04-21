<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Earnings & Payments | QuickHands</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .earnings-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .earnings-card {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .earnings-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-large);
        }

        .earnings-card.primary {
            border-left: 4px solid var(--primary);
        }

        .earnings-card.secondary {
            border-left: 4px solid var(--secondary);
        }

        .earnings-card.success {
            border-left: 4px solid var(--success);
        }

        .earnings-card.warning {
            border-left: 4px solid var(--warning);
        }

        .earnings-label {
            font-size: 14px;
            color: var(--gray-dark);
            margin-bottom: 5px;
        }

        .earnings-value {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .earnings-trend {
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

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 12px 16px;
            background-color: var(--gray);
            color: var(--dark);
            font-weight: 600;
            font-size: 14px;
        }

        td {
            padding: 12px 16px;
            border-bottom: 1px solid var(--gray-medium);
            font-size: 14px;
        }

        tr:hover {
            background-color: var(--gray);
        }

        .status {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }

        .status-paid {
            background-color: var(--secondary-light);
            color: var(--secondary);
        }

        .status-pending {
            background-color: var(--warning);
            color: white;
        }

        .status-processing {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        .payment-methods {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .payment-method {
            border: 1px solid var(--gray-medium);
            border-radius: var(--radius);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .payment-method:hover {
            border-color: var(--secondary);
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        }

        .payment-method.active {
            border-color: var(--secondary);
            background-color: var(--secondary-light);
        }

        .payment-method-icon {
            font-size: 32px;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .payment-method.active .payment-method-icon {
            color: var(--secondary);
        }

        .payment-method-name {
            font-weight: 500;
            margin-bottom: 5px;
        }

        .payment-method-details {
            font-size: 12px;
            color: var(--gray-dark);
            text-align: center;
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

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
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

        .select-control {
            padding: 10px 16px;
            border: 1px solid var(--gray-medium);
            border-radius: var(--radius);
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            background-color: white;
            cursor: pointer;
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

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background-color: white;
            border-radius: var(--radius);
            width: 500px;
            max-width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            padding: 30px;
            position: relative;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--gray-dark);
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 30px;
        }

        .donut-chart-container {
            height: 200px;
            width: 200px;
            margin: 0 auto;
        }

        .earnings-breakdown {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        .breakdown-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid var(--gray-medium);
        }

        .breakdown-label {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .color-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .breakdown-value {
            font-weight: 500;
        }

        .withdrawal-summary {
            background-color: var(--gray);
            border-radius: var(--radius);
            padding: 20px;
            margin-top: 20px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .summary-label {
            color: var(--gray-dark);
        }

        .summary-value {
            font-weight: 500;
        }

        .summary-total {
            border-top: 1px solid var(--gray-medium);
            padding-top: 10px;
            margin-top: 10px;
            font-weight: 600;
        }

        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
            color: var(--gray-dark);
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 20px;
            color: var(--gray-medium);
        }

        .empty-state-text {
            font-size: 16px;
            margin-bottom: 20px;
        }

        @media (max-width: 992px) {
            .earnings-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .payment-methods {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .earnings-grid {
                grid-template-columns: 1fr;
            }

            .payment-methods {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
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

<body>
    <header>
        <div class="header-container">
            <a href="#" class="logo">
                <i class="fas fa-hands-helping"></i>
                QuickHands
            </a>
            <nav class="nav-links">
                <a href="provider-dashboard.html">Dashboard</a>
                <a href="provider-available-tasks.html">Available Tasks</a>
                <a href="provider-task-management.html">Task Management</a>
                <a href="provider-earnings-payments.html" class="active">Earnings & Payments</a>
                <a href="#">Messages</a>
                <a href="#">Profile</a>
            </nav>
            <div class="user-actions">
                <div class="notification-bell">
                    <i class="far fa-bell"></i>
                    <span class="notification-count">3</span>
                </div>
                <div class="user-profile">
                    <div class="avatar">JS</div>
                    <span class="user-name">John Smith</span>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="main-content">
            <div class="page-header">
                <h1 class="page-title">Earnings & Payments</h1>
                <div class="breadcrumb">
                    <a href="provider-dashboard.html">Dashboard</a>
                    <span>/</span>
                    <span>Earnings & Payments</span>
                </div>
            </div>

            <div class="earnings-grid fade-in">
                <div class="earnings-card primary delay-1">
                    <div class="earnings-label">Current Month Earnings</div>
                    <div class="earnings-value">$1,245.00</div>
                    <div class="earnings-trend trend-up">
                        <i class="fas fa-arrow-up"></i>
                        <span>12% from last month</span>
                    </div>
                </div>
                <div class="earnings-card secondary delay-2">
                    <div class="earnings-label">Lifetime Earnings</div>
                    <div class="earnings-value">$8,750.00</div>
                    <div class="earnings-trend trend-up">
                        <i class="fas fa-arrow-up"></i>
                        <span>25% from last year</span>
                    </div>
                </div>
                <div class="earnings-card success delay-3">
                    <div class="earnings-label">Pending Payments</div>
                    <div class="earnings-value">$320.00</div>
                    <div class="earnings-trend">
                        <i class="fas fa-clock"></i>
                        <span>Expected in 2-3 days</span>
                    </div>
                </div>
                <div class="earnings-card warning delay-4">
                    <div class="earnings-label">Available for Withdrawal</div>
                    <div class="earnings-value">$925.00</div>
                    <div class="earnings-trend">
                        <i class="fas fa-wallet"></i>
                        <span>Ready to withdraw</span>
                    </div>
                </div>
            </div>

            <div class="card fade-in delay-1">
                <div class="card-header">
                    <h2 class="card-title">Earnings Overview</h2>
                    <div class="card-actions">
                        <select class="select-control">
                            <option>Last 7 Days</option>
                            <option>Last 30 Days</option>
                            <option>Last 3 Months</option>
                            <option>Last 6 Months</option>
                            <option>Last Year</option>
                        </select>
                        <button class="btn btn-outline btn-sm">
                            <i class="fas fa-download"></i>
                            Export
                        </button>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="earningsChart"></canvas>
                </div>
            </div>

            <div class="card fade-in delay-2">
                <div class="card-header">
                    <h2 class="card-title">Earnings Breakdown</h2>
                    <div class="card-actions">
                        <select class="select-control">
                            <option>Current Month</option>
                            <option>Last Month</option>
                            <option>Last 3 Months</option>
                            <option>Last 6 Months</option>
                            <option>Last Year</option>
                        </select>
                    </div>
                </div>
                <div style="display: flex; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 300px;">
                        <div class="donut-chart-container">
                            <canvas id="breakdownChart"></canvas>
                        </div>
                    </div>
                    <div style="flex: 2; min-width: 300px;">
                        <div class="earnings-breakdown">
                            <div class="breakdown-item">
                                <div class="breakdown-label">
                                    <div class="color-indicator" style="background-color: #FF6B6B;"></div>
                                    <span>Deliveries</span>
                                </div>
                                <div class="breakdown-value">$625.00 (50%)</div>
                            </div>
                            <div class="breakdown-item">
                                <div class="breakdown-label">
                                    <div class="color-indicator" style="background-color: #4ECDC4;"></div>
                                    <span>Errands</span>
                                </div>
                                <div class="breakdown-value">$312.50 (25%)</div>
                            </div>
                            <div class="breakdown-item">
                                <div class="breakdown-label">
                                    <div class="color-indicator" style="background-color: #FFD166;"></div>
                                    <span>Cleaning</span>
                                </div>
                                <div class="breakdown-value">$187.50 (15%)</div>
                            </div>
                            <div class="breakdown-item">
                                <div class="breakdown-label">
                                    <div class="color-indicator" style="background-color: #6BCB77;"></div>
                                    <span>Assembly</span>
                                </div>
                                <div class="breakdown-value">$75.00 (6%)</div>
                            </div>
                            <div class="breakdown-item">
                                <div class="breakdown-label">
                                    <div class="color-indicator" style="background-color: #ADADAD;"></div>
                                    <span>Other</span>
                                </div>
                                <div class="breakdown-value">$45.00 (4%)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card fade-in delay-3">
                <div class="tabs">
                    <div class="tab active" data-tab="payment-history">Payment History</div>
                    <div class="tab" data-tab="withdrawal-methods">Withdrawal Methods</div>
                    <div class="tab" data-tab="withdrawal-request">Withdrawal Request</div>
                </div>

                <div class="tab-content active" id="payment-history">
                    <div class="filter-bar">
                        <div class="filter-group">
                            <div class="search-box">
                                <i class="fas fa-search search-icon"></i>
                                <input type="text" class="form-control" placeholder="Search payments...">
                            </div>
                        </div>
                        <div class="filter-group">
                            <select class="select-control">
                                <option>All Statuses</option>
                                <option>Paid</option>
                                <option>Pending</option>
                                <option>Processing</option>
                            </select>
                            <select class="select-control">
                                <option>Last 30 Days</option>
                                <option>Last 3 Months</option>
                                <option>Last 6 Months</option>
                                <option>Last Year</option>
                            </select>
                            <button class="btn btn-outline btn-sm">
                                <i class="fas fa-filter"></i>
                                Filter
                            </button>
                        </div>
                    </div>

                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#TRX-8765432</td>
                                    <td>Apr 15, 2025</td>
                                    <td>$320.00</td>
                                    <td>Bank Transfer</td>
                                    <td><span class="status status-paid">Paid</span></td>
                                    <td>
                                        <button class="btn btn-outline btn-sm">View Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#TRX-8765431</td>
                                    <td>Apr 10, 2025</td>
                                    <td>$245.00</td>
                                    <td>PayPal</td>
                                    <td><span class="status status-paid">Paid</span></td>
                                    <td>
                                        <button class="btn btn-outline btn-sm">View Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#TRX-8765430</td>
                                    <td>Apr 05, 2025</td>
                                    <td>$180.00</td>
                                    <td>Bank Transfer</td>
                                    <td><span class="status status-paid">Paid</span></td>
                                    <td>
                                        <button class="btn btn-outline btn-sm">View Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#TRX-8765429</td>
                                    <td>Apr 01, 2025</td>
                                    <td>$500.00</td>
                                    <td>Bank Transfer</td>
                                    <td><span class="status status-paid">Paid</span></td>
                                    <td>
                                        <button class="btn btn-outline btn-sm">View Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#TRX-8765428</td>
                                    <td>Mar 28, 2025</td>
                                    <td>$125.00</td>
                                    <td>PayPal</td>
                                    <td><span class="status status-pending">Pending</span></td>
                                    <td>
                                        <button class="btn btn-outline btn-sm">View Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#TRX-8765427</td>
                                    <td>Mar 25, 2025</td>
                                    <td>$195.00</td>
                                    <td>Mobile Money</td>
                                    <td><span class="status status-processing">Processing</span></td>
                                    <td>
                                        <button class="btn btn-outline btn-sm">View Details</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination">
                        <div class="page-item"><i class="fas fa-chevron-left"></i></div>
                        <div class="page-item active">1</div>
                        <div class="page-item">2</div>
                        <div class="page-item">3</div>
                        <div class="page-item">...</div>
                        <div class="page-item">10</div>
                        <div class="page-item"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="tab-content" id="withdrawal-methods">
                    <div class="payment-methods">
                        <div class="payment-method active">
                            <div class="payment-method-icon">
                                <i class="fas fa-university"></i>
                            </div>
                            <div class="payment-method-name">Bank Transfer</div>
                            <div class="payment-method-details">****6789 • Chase Bank</div>
                        </div>
                        <div class="payment-method">
                            <div class="payment-method-icon">
                                <i class="fab fa-paypal"></i>
                            </div>
                            <div class="payment-method-name">PayPal</div>
                            <div class="payment-method-details">john.smith@example.com</div>
                        </div>
                        <div class="payment-method">
                            <div class="payment-method-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="payment-method-name">Mobile Money</div>
                            <div class="payment-method-details">+1 (555) 123-4567</div>
                        </div>
                    </div>

                    <button class="btn btn-secondary">
                        <i class="fas fa-plus"></i>
                        Add New Payment Method
                    </button>
                </div>

                <div class="tab-content" id="withdrawal-request">
                    <div class="form-group">
                        <label class="form-label">Select Withdrawal Method</label>
                        <select class="form-control">
                            <option>Bank Transfer (****6789)</option>
                            <option>PayPal (john.smith@example.com)</option>
                            <option>Mobile Money (+1 (555) 123-4567)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Withdrawal Amount</label>
                        <input type="text" class="form-control" value="$925.00" readonly>
                    </div>

                    <div class="withdrawal-summary">
                        <div class="summary-row">
                            <div class="summary-label">Available Balance</div>
                            <div class="summary-value">$925.00</div>
                        </div>
                        <div class="summary-row">
                            <div class="summary-label">Processing Fee</div>
                            <div class="summary-value">$0.00</div>
                        </div>
                        <div class="summary-row summary-total">
                            <div class="summary-label">Total Amount</div>
                            <div class="summary-value">$925.00</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Notes (Optional)</label>
                        <textarea class="form-control" rows="3" placeholder="Add any notes for this withdrawal..."></textarea>
                    </div>

                    <button class="btn btn-primary">
                        <i class="fas fa-money-bill-wave"></i>
                        Request Withdrawal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="withdrawalConfirmModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Confirm Withdrawal</h3>
                <button class="modal-close">&times;</button>
            </div>
            <p>You are about to request a withdrawal of <strong>$925.00</strong> to your Bank Account (****6789).</p>
            <p>This process typically takes 2-3 business days to complete.</p>
            <div class="modal-footer">
                <button class="btn btn-outline">Cancel</button>
                <button class="btn btn-primary">Confirm Withdrawal</button>
            </div>
        </div>
    </div>

    <script>
        // Initialize tabs
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                // Add active class to clicked tab
                tab.classList.add('active');

                // Hide all tab content
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });

                // Show corresponding tab content
                const tabId = tab.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });

        // Initialize earnings chart
        const earningsCtx = document.getElementById('earningsChart').getContext('2d');
        const earningsChart = new Chart(earningsCtx, {
            type: 'line',
            data: {
                labels: ['Apr 10', 'Apr 11', 'Apr 12', 'Apr 13', 'Apr 14', 'Apr 15', 'Apr 16'],
                datasets: [{
                    label: 'Daily Earnings',
                    data: [65, 85, 40, 120, 90, 75, 95],
                    backgroundColor: 'rgba(78, 205, 196, 0.2)',
                    borderColor: 'rgba(78, 205, 196, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    pointBackgroundColor: 'rgba(78, 205, 196, 1)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value;
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return '$' + context.parsed.y;
                            }
                        }
                    }
                }
            }
        });

        // Initialize breakdown chart
        const breakdownCtx = document.getElementById('breakdownChart').getContext('2d');
        const breakdownChart = new Chart(breakdownCtx, {
            type: 'doughnut',
            data: {
                labels: ['Deliveries', 'Errands', 'Cleaning', 'Assembly', 'Other'],
                datasets: [{
                    data: [50, 25, 15, 6, 4],
                    backgroundColor: [
                        '#FF6B6B',
                        '#4ECDC4',
                        '#FFD166',
                        '#6BCB77',
                        '#ADADAD'
                    ],
                    borderWidth: 0,
                    hoverOffset: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.parsed + '%';
                            }
                        }
                    }
                }
            }
        });

        // Payment method selection
        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('click', () => {
                document.querySelectorAll('.payment-method').forEach(m => {
                    m.classList.remove('active');
                });
                method.classList.add('active');
            });
        });

        // Modal functionality
        document.querySelector('.btn-primary').addEventListener('click', function() {
            if (this.closest('#withdrawal-request')) {
                document.getElementById('withdrawalConfirmModal').classList.add('active');
            }
        });

        document.querySelector('.modal-close').addEventListener('click', function() {
            document.getElementById('withdrawalConfirmModal').classList.remove('active');
        });

        document.querySelector('.modal-footer .btn-outline').addEventListener('click', function() {
            document.getElementById('withdrawalConfirmModal').classList.remove('active');
        });
    </script>
</body>

</html>
