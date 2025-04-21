<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Provider Support & Help Center</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #FF6B6B;
            --primary-light: #FFE2E2;
            --secondary: #4ECDC4;
            --secondary-light: #DBF5F3;
            --dark: #292F36;
            --gray: #6C757D;
            --light-gray: #F8F9FA;
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
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: var(--dark);
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, var(--primary), #FF9E9E);
            color: white;
            padding: 1.5rem 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 60%);
            transform: rotate(30deg);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }

        .logo i {
            margin-right: 10px;
            font-size: 2rem;
        }

        .user-nav {
            display: flex;
            align-items: center;
        }

        .user-nav .btn {
            margin-left: 15px;
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
            background-color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            margin-right: 10px;
            border: 2px solid white;
        }

        .user-name {
            font-weight: 500;
            margin-right: 5px;
        }

        .stats-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            flex: 1;
            min-width: 200px;
            margin: 0 10px 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .stat-title {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark);
        }

        .stat-trend {
            display: flex;
            align-items: center;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .trend-up {
            color: var(--success);
        }

        .trend-down {
            color: var(--danger);
        }

        .trend-icon {
            margin-right: 5px;
        }

        /* Main Content Styles */
        .main-content {
            padding: 2rem 0;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--dark);
            display: flex;
            align-items: center;
        }

        .page-title i {
            margin-right: 10px;
            color: var(--primary);
        }

        /* Support Center Specific Styles */
        .support-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        @media (max-width: 992px) {
            .support-container {
                grid-template-columns: 1fr;
            }
        }

        .support-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .support-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .support-card-header {
            background: linear-gradient(135deg, var(--secondary), #6DEFE7);
            color: white;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .support-card-header h3 {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 5px;
            position: relative;
            z-index: 1;
        }

        .support-card-header p {
            font-size: 0.9rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .support-card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 60%);
            transform: rotate(30deg);
        }

        .support-card-body {
            padding: 20px;
        }

        /* FAQ Section */
        .faq-container {
            margin-bottom: 30px;
        }

        .faq-search {
            position: relative;
            margin-bottom: 20px;
        }

        .faq-search input {
            width: 100%;
            padding: 15px 20px;
            padding-left: 50px;
            border: none;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .faq-search input:focus {
            outline: none;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .faq-search i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            font-size: 1.2rem;
        }

        .faq-categories {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .faq-category {
            padding: 8px 15px;
            background-color: white;
            border-radius: 20px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid #eee;
        }

        .faq-category:hover {
            background-color: var(--light-gray);
        }

        .faq-category.active {
            background-color: var(--secondary);
            color: white;
            border-color: var(--secondary);
        }

        .faq-item {
            background-color: white;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-question {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 500;
        }

        .faq-question i {
            transition: transform 0.3s ease;
        }

        .faq-answer {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
            line-height: 1.6;
            color: var(--gray);
        }

        .faq-item.active {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .faq-item.active .faq-question {
            color: var(--secondary);
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
            color: var(--secondary);
        }

        .faq-item.active .faq-answer {
            padding: 0 20px 20px;
            max-height: 500px;
        }

        /* Contact Support Section */
        .contact-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .contact-options {
                grid-template-columns: 1fr;
            }
        }

        .contact-option {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .contact-option:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .contact-option i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--secondary);
            transition: all 0.3s ease;
        }

        .contact-option:hover i {
            transform: scale(1.1);
        }

        .contact-option h4 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .contact-option p {
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Support Ticket Form */
        .support-form {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

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
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(78, 205, 196, 0.2);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: #ff5252;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }

        .btn-secondary {
            background-color: var(--secondary);
            color: white;
        }

        .btn-secondary:hover {
            background-color: #3dbeb6;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 205, 196, 0.4);
        }

        /* AI Chat Assistant */
        .ai-assistant {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .ai-header {
            background: linear-gradient(135deg, #6A11CB, #2575FC);
            color: white;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .ai-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 60%);
            transform: rotate(30deg);
        }

        .ai-header h3 {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 5px;
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
        }

        .ai-header h3 i {
            margin-right: 10px;
            font-size: 1.6rem;
        }

        .ai-header p {
            font-size: 0.9rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .ai-body {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            height: 400px;
        }

        .chat-container {
            flex: 1;
            overflow-y: auto;
            padding-right: 10px;
            margin-bottom: 20px;
        }

        .chat-message {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
        }

        .message-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            flex-shrink: 0;
        }

        .user-message .message-avatar {
            background-color: var(--primary);
        }

        .ai-message .message-avatar {
            background-color: #6A11CB;
        }

        .message-content {
            background-color: #f5f7fa;
            padding: 12px 15px;
            border-radius: 15px;
            max-width: 80%;
            position: relative;
        }

        .user-message .message-content {
            border-top-right-radius: 4px;
            background-color: var(--primary-light);
        }

        .ai-message .message-content {
            border-top-left-radius: 4px;
            background-color: #f0f4ff;
        }

        .message-text {
            line-height: 1.5;
            font-size: 0.95rem;
        }

        .message-time {
            font-size: 0.75rem;
            color: var(--gray);
            margin-top: 5px;
            text-align: right;
        }

        .chat-input {
            display: flex;
            align-items: center;
            background-color: #f5f7fa;
            border-radius: 30px;
            padding: 5px;
        }

        .chat-input input {
            flex: 1;
            border: none;
            background: transparent;
            padding: 12px 15px;
            font-size: 0.95rem;
        }

        .chat-input input:focus {
            outline: none;
        }

        .chat-input button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #6A11CB;
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .chat-input button:hover {
            background-color: #5a0db1;
            transform: scale(1.05);
        }

        .chat-input .attachment-btn {
            background-color: transparent;
            color: var(--gray);
            margin-right: 5px;
        }

        .chat-input .attachment-btn:hover {
            color: var(--dark);
            background-color: #e9ecef;
        }

        /* Live Chat Section */
        .live-chat {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .live-chat-header {
            background: linear-gradient(135deg, var(--primary), #FF9E9E);
            color: white;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .live-chat-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 60%);
            transform: rotate(30deg);
        }

        .live-chat-header h3 {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 5px;
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
        }

        .live-chat-header h3 i {
            margin-right: 10px;
            font-size: 1.6rem;
        }

        .live-chat-header p {
            font-size: 0.9rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .live-chat-body {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            height: 400px;
        }

        .agent-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }

        .agent-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .agent-details h4 {
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .agent-details p {
            font-size: 0.85rem;
            color: var(--gray);
        }

        .agent-status {
            display: flex;
            align-items: center;
            font-size: 0.85rem;
            color: var(--success);
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: var(--success);
            margin-right: 5px;
            position: relative;
        }

        .status-dot::after {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border-radius: 50%;
            background-color: rgba(40, 167, 69, 0.3);
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        /* Knowledge Base */
        .knowledge-base {
            margin-top: 30px;
        }

        .kb-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--dark);
            display: flex;
            align-items: center;
        }

        .kb-title i {
            margin-right: 10px;
            color: var(--secondary);
        }

        .kb-categories {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .kb-category {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .kb-category:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .kb-category-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: var(--secondary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .kb-category-icon i {
            font-size: 1.8rem;
            color: var(--secondary);
        }

        .kb-category h4 {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .kb-category p {
            font-size: 0.9rem;
            color: var(--gray);
            margin-bottom: 15px;
        }

        .kb-category-articles {
            list-style: none;
        }

        .kb-category-articles li {
            margin-bottom: 8px;
        }

        .kb-category-articles a {
            color: var(--secondary);
            text-decoration: none;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
        }

        .kb-category-articles a i {
            margin-right: 5px;
            font-size: 0.8rem;
        }

        .kb-category-articles a:hover {
            color: var(--primary);
            text-decoration: underline;
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

        @keyframes slideIn {
            from {
                transform: translateX(-20px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }

            60% {
                transform: translateY(-10px);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }

        .slide-in {
            animation: slideIn 0.5s ease forwards;
        }

        .bounce {
            animation: bounce 2s ease infinite;
        }

        /* Typing animation for AI chat */
        .typing-indicator {
            display: flex;
            align-items: center;
            padding: 10px 15px;
        }

        .typing-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: var(--gray);
            margin-right: 5px;
            animation: typingAnimation 1.5s infinite ease-in-out;
        }

        .typing-dot:nth-child(1) {
            animation-delay: 0s;
        }

        .typing-dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-dot:nth-child(3) {
            animation-delay: 0.4s;
            margin-right: 0;
        }

        @keyframes typingAnimation {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0);
            }
        }

        /* Floating Action Button */
        .floating-action-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), #FF9E9E);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 20px rgba(255, 107, 107, 0.4);
            cursor: pointer;
            z-index: 100;
            transition: all 0.3s ease;
        }

        .floating-action-btn:hover {
            transform: scale(1.1) rotate(10deg);
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.5);
        }

        .floating-action-btn i {
            font-size: 1.8rem;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .support-container {
                grid-template-columns: 1fr;
            }

            .contact-options {
                grid-template-columns: 1fr;
            }

            .kb-categories {
                grid-template-columns: 1fr;
            }
        }

        /* 3D Card Effect */
        .card-3d {
            transform-style: preserve-3d;
            transition: all 0.5s ease;
        }

        .card-3d:hover {
            transform: rotateX(5deg) rotateY(5deg);
        }

        /* Confetti Animation */
        .confetti-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 9999;
            display: none;
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f00;
            opacity: 0.7;
            animation: confetti-fall 5s linear infinite;
        }

        @keyframes confetti-fall {
            0% {
                transform: translateY(-100px) rotate(0deg);
                opacity: 1;
            }

            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }

        /* Tooltip Styles */
        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 200px;
            background-color: var(--dark);
            color: white;
            text-align: center;
            border-radius: 6px;
            padding: 10px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 0.85rem;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: var(--dark) transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body>
    <!-- Confetti Container -->
    <div class="confetti-container" id="confettiContainer"></div>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <a href="#" class="logo">
                    <i class="fas fa-hands-helping"></i>
                    QuickHands
                </a>
                <div class="user-nav">
                    <div class="user-profile">
                        <div class="user-avatar">JS</div>
                        <span class="user-name">John Smith</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <button class="btn btn-primary">
                        <i class="fas fa-plus"></i> New Task
                    </button>
                </div>
            </div>
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-title">Support Tickets</div>
                    <div class="stat-value">3</div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up trend-icon"></i>
                        <span>2 new this week</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Response Time</div>
                    <div class="stat-value">1.2h</div>
                    <div class="stat-trend trend-down">
                        <i class="fas fa-arrow-down trend-icon"></i>
                        <span>30min faster</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Knowledge Base</div>
                    <div class="stat-value">42</div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up trend-icon"></i>
                        <span>5 new articles</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Satisfaction</div>
                    <div class="stat-value">98%</div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up trend-icon"></i>
                        <span>+2% this month</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h1 class="page-title">
                <i class="fas fa-life-ring"></i>
                Support & Help Center
            </h1>

            <!-- Support Cards -->
            <div class="support-container">
                <!-- AI Assistant -->
                <div class="ai-assistant card-3d">
                    <div class="ai-header">
                        <h3><i class="fas fa-robot"></i> QuickBot AI Assistant</h3>
                        <p>Get instant answers to your questions</p>
                    </div>
                    <div class="ai-body">
                        <div class="chat-container" id="aiChatContainer">
                            <div class="chat-message ai-message">
                                <div class="message-avatar">
                                    <i class="fas fa-robot"></i>
                                </div>
                                <div class="message-content">
                                    <div class="message-text">
                                        👋 Hi there! I'm QuickBot, your AI assistant. How can I help you today?
                                    </div>
                                    <div class="message-time">10:30 AM</div>
                                </div>
                            </div>
                            <div class="chat-message user-message">
                                <div class="message-avatar">JS</div>
                                <div class="message-content">
                                    <div class="message-text">
                                        How do I withdraw my earnings?
                                    </div>
                                    <div class="message-time">10:31 AM</div>
                                </div>
                            </div>
                            <div class="chat-message ai-message">
                                <div class="message-avatar">
                                    <i class="fas fa-robot"></i>
                                </div>
                                <div class="message-content">
                                    <div class="message-text">
                                        To withdraw your earnings, go to the "Earnings & Payments" page, click on
                                        "Withdraw Funds", select your preferred payment method, enter the amount, and
                                        click "Request Withdrawal". Funds typically arrive within 1-3 business days
                                        depending on your payment method.
                                    </div>
                                    <div class="message-time">10:31 AM</div>
                                </div>
                            </div>
                            <div class="chat-message user-message">
                                <div class="message-avatar">JS</div>
                                <div class="message-content">
                                    <div class="message-text">
                                        What payment methods are available?
                                    </div>
                                    <div class="message-time">10:32 AM</div>
                                </div>
                            </div>
                            <div class="chat-message ai-message">
                                <div class="message-avatar">
                                    <i class="fas fa-robot"></i>
                                </div>
                                <div class="message-content">
                                    <div class="message-text">
                                        QuickHands currently supports these payment methods:
                                        <br>- Direct bank transfer
                                        <br>- PayPal
                                        <br>- Mobile Money
                                        <br>- Venmo
                                        <br><br>You can add or manage your payment methods in the "Earnings & Payments"
                                        section under "Withdrawal Methods".
                                    </div>
                                    <div class="message-time">10:32 AM</div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-input">
                            <button class="attachment-btn">
                                <i class="fas fa-paperclip"></i>
                            </button>
                            <input type="text" placeholder="Type your question here..." id="aiChatInput">
                            <button id="aiSendBtn">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Live Support -->
                <div class="live-chat card-3d">
                    <div class="live-chat-header">
                        <h3><i class="fas fa-headset"></i> Live Support</h3>
                        <p>Chat with our support team in real-time</p>
                    </div>
                    <div class="live-chat-body">
                        <div class="agent-info">
                            <div class="agent-avatar">SA</div>
                            <div class="agent-details">
                                <h4>Sarah Adams</h4>
                                <p>Support Specialist</p>
                                <div class="agent-status">
                                    <div class="status-dot"></div>
                                    <span>Online</span>
                                </div>
                            </div>
                        </div>
                        <div class="chat-container" id="liveChatContainer">
                            <div class="chat-message ai-message">
                                <div class="message-avatar">SA</div>
                                <div class="message-content">
                                    <div class="message-text">
                                        Hello! I'm Sarah from QuickHands support. How can I assist you today?
                                    </div>
                                    <div class="message-time">11:45 AM</div>
                                </div>
                            </div>
                            <div class="typing-indicator">
                                <div class="typing-dot"></div>
                                <div class="typing-dot"></div>
                                <div class="typing-dot"></div>
                            </div>
                        </div>
                        <div class="chat-input">
                            <button class="attachment-btn">
                                <i class="fas fa-paperclip"></i>
                            </button>
                            <input type="text" placeholder="Type your message here..." id="liveChatInput">
                            <button id="liveSendBtn">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="faq-container">
                <h2 class="page-title">
                    <i class="fas fa-question-circle"></i>
                    Frequently Asked Questions
                </h2>
                <div class="faq-search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search for answers..." id="faqSearch">
                </div>
                <div class="faq-categories">
                    <div class="faq-category active">All</div>
                    <div class="faq-category">Account</div>
                    <div class="faq-category">Payments</div>
                    <div class="faq-category">Tasks</div>
                    <div class="faq-category">Ratings</div>
                    <div class="faq-category">Technical</div>
                </div>
                <div class="faq-items">
                    <div class="faq-item active">
                        <div class="faq-question">
                            <span>How do I withdraw my earnings?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            To withdraw your earnings, navigate to the "Earnings & Payments" page from your dashboard.
                            Click on the "Withdraw Funds" button, select your preferred payment method, enter the amount
                            you wish to withdraw, and click "Request Withdrawal". Depending on your payment method,
                            funds typically arrive within 1-3 business days. You can track the status of your withdrawal
                            in the "Payment History" section.
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>How do I update my availability?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            You can update your availability by going to the "Profile Management" page and clicking on
                            the "Availability Settings" tab. There, you'll find a calendar where you can mark your
                            available days and hours. You can also toggle your overall status between "Available" and
                            "Busy". Remember to save your changes before leaving the page. Your availability settings
                            help users know when you're ready to take on new tasks.
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>What happens if a client disputes my work?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            If a client disputes your work, you'll receive a notification in your dashboard. You can
                            view the details of the dispute in the "Task Management" page under the "Dispute Resolution"
                            tab. There, you'll find the client's concerns and can respond with your perspective. You can
                            also provide evidence such as photos, chat logs, or other documentation to support your
                            case. Our support team will review both sides and make a fair decision based on the evidence
                            provided. We encourage open communication to resolve disputes amicably.
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>How do I set or change my service pricing?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            To set or change your service pricing, go to the "Profile Management" page and select the
                            "Service Pricing" tab. Here, you can set hourly rates or fixed prices for specific task
                            types. You can add new service categories, edit existing ones, or remove services you no
                            longer offer. The platform provides market rate comparisons to help you set competitive
                            prices. Changes to your pricing will apply to new tasks only and won't affect already
                            accepted tasks.
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>How can I improve my ratings?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            To improve your ratings, focus on providing excellent service in these key areas:
                            punctuality, communication, and quality of work. Always arrive on time or communicate
                            proactively if you're running late. Maintain clear and professional communication with
                            clients throughout the task. Deliver high-quality work that meets or exceeds expectations.
                            Respond promptly to client messages and be courteous and professional. After completing
                            tasks successfully, you can politely ask satisfied clients to leave a review. Consistently
                            good performance will gradually improve your overall rating.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Support Ticket Form -->
            <div class="support-form">
                <h2 class="page-title">
                    <i class="fas fa-ticket-alt"></i>
                    Submit a Support Ticket
                </h2>
                <div class="form-group">
                    <label for="ticketSubject">Subject</label>
                    <input type="text" id="ticketSubject" class="form-control"
                        placeholder="Brief description of your issue">
                </div>
                <div class="form-group">
                    <label for="ticketCategory">Category</label>
                    <select id="ticketCategory" class="form-control">
                        <option value="">Select a category</option>
                        <option value="account">Account Issues</option>
                        <option value="payment">Payment Problems</option>
                        <option value="task">Task Concerns</option>
                        <option value="technical">Technical Difficulties</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ticketPriority">Priority</label>
                    <select id="ticketPriority" class="form-control">
                        <option value="low">Low - General question</option>
                        <option value="medium">Medium - Issue affecting my work</option>
                        <option value="high">High - Urgent problem</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ticketDescription">Description</label>
                    <textarea id="ticketDescription" class="form-control"
                        placeholder="Please provide as much detail as possible about your issue..."></textarea>
                </div>
                <div class="form-group">
                    <label for="ticketAttachment">Attachments (optional)</label>
                    <input type="file" id="ticketAttachment" class="form-control">
                </div>
                <div class="form-footer">
                    <button type="button" class="btn btn-secondary" id="submitTicketBtn">Submit Ticket</button>
                </div>
            </div>

            <!-- Knowledge Base -->
            <div class="knowledge-base">
                <h2 class="kb-title">
                    <i class="fas fa-book"></i>
                    Knowledge Base
                </h2>
                <div class="kb-categories">
                    <div class="kb-category">
                        <div class="kb-category-icon">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <h4>Account Management</h4>
                        <p>Learn how to manage your provider account settings</p>
                        <ul class="kb-category-articles">
                            <li><a href="#"><i class="fas fa-file-alt"></i> Setting up your provider profile</a>
                            </li>
                            <li><a href="#"><i class="fas fa-file-alt"></i> Managing your personal
                                    information</a></li>
                            <li><a href="#"><i class="fas fa-file-alt"></i> Security best practices</a></li>
                        </ul>
                    </div>
                    <div class="kb-category">
                        <div class="kb-category-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h4>Task Management</h4>
                        <p>Everything you need to know about handling tasks</p>
                        <ul class="kb-category-articles">
                            <li><a href="#"><i class="fas fa-file-alt"></i> Finding and accepting tasks</a></li>
                            <li><a href="#"><i class="fas fa-file-alt"></i> Completing tasks efficiently</a>
                            </li>
                            <li><a href="#"><i class="fas fa-file-alt"></i> Handling task disputes</a></li>
                        </ul>
                    </div>
                    <div class="kb-category">
                        <div class="kb-category-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <h4>Payments & Earnings</h4>
                        <p>Information about getting paid for your services</p>
                        <ul class="kb-category-articles">
                            <li><a href="#"><i class="fas fa-file-alt"></i> Understanding the payment system</a>
                            </li>
                            <li><a href="#"><i class="fas fa-file-alt"></i> Setting up payment methods</a></li>
                            <li><a href="#"><i class="fas fa-file-alt"></i> Tax information for providers</a>
                            </li>
                        </ul>
                    </div>
                    <div class="kb-category">
                        <div class="kb-category-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>Ratings & Reviews</h4>
                        <p>How to maintain a stellar reputation</p>
                        <ul class="kb-category-articles">
                            <li><a href="#"><i class="fas fa-file-alt"></i> Understanding the rating system</a>
                            </li>
                            <li><a href="#"><i class="fas fa-file-alt"></i> Responding to client reviews</a>
                            </li>
                            <li><a href="#"><i class="fas fa-file-alt"></i> Tips for improving your ratings</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Action Button -->
    <div class="floating-action-btn" id="helpBtn">
        <i class="fas fa-question"></i>
    </div>

    <script>
        // FAQ Accordion
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const item = question.parentElement;
                const isActive = item.classList.contains('active');

                // Close all items
                document.querySelectorAll('.faq-item').forEach(faqItem => {
                    faqItem.classList.remove('active');
                });

                // Open clicked item if it wasn't active
                if (!isActive) {
                    item.classList.add('active');
                }
            });
        });

        // FAQ Category Filter
        document.querySelectorAll('.faq-category').forEach(category => {
            category.addEventListener('click', () => {
                document.querySelectorAll('.faq-category').forEach(cat => {
                    cat.classList.remove('active');
                });
                category.classList.add('active');
                // Here you would add logic to filter FAQ items by category
            });
        });

        // AI Chat Input
        const aiChatInput = document.getElementById('aiChatInput');
        const aiSendBtn = document.getElementById('aiSendBtn');
        const aiChatContainer = document.getElementById('aiChatContainer');

        aiSendBtn.addEventListener('click', sendAiMessage);
        aiChatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                sendAiMessage();
            }
        });

        function sendAiMessage() {
            const message = aiChatInput.value.trim();
            if (message) {
                // Add user message
                const userMessage = createChatMessage('user', message);
                aiChatContainer.appendChild(userMessage);

                // Clear input
                aiChatInput.value = '';

                // Scroll to bottom
                aiChatContainer.scrollTop = aiChatContainer.scrollHeight;

                // Simulate AI typing
                setTimeout(() => {
                    const typingIndicator = document.createElement('div');
                    typingIndicator.className = 'typing-indicator';
                    typingIndicator.innerHTML = `
                        <div class="typing-dot"></div>
                        <div class="typing-dot"></div>
                        <div class="typing-dot"></div>
                    `;
                    aiChatContainer.appendChild(typingIndicator);
                    aiChatContainer.scrollTop = aiChatContainer.scrollHeight;

                    // Simulate AI response after typing
                    setTimeout(() => {
                        aiChatContainer.removeChild(typingIndicator);

                        // Add AI response based on user message
                        let aiResponse = getAiResponse(message);
                        const aiMessage = createChatMessage('ai', aiResponse);
                        aiChatContainer.appendChild(aiMessage);

                        // Scroll to bottom
                        aiChatContainer.scrollTop = aiChatContainer.scrollHeight;
                    }, 2000);
                }, 500);
            }
        }

        function createChatMessage(type, text) {
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const timeString = `${hours}:${minutes < 10 ? '0' + minutes : minutes} ${hours >= 12 ? 'PM' : 'AM'}`;

            const messageDiv = document.createElement('div');
            messageDiv.className = `chat-message ${type === 'user' ? 'user-message' : 'ai-message'}`;

            const avatar = type === 'user' ? 'JS' : '<i class="fas fa-robot"></i>';

            messageDiv.innerHTML = `
                <div class="message-avatar">${avatar}</div>
                <div class="message-content">
                    <div class="message-text">${text}</div>
                    <div class="message-time">${timeString}</div>
                </div>
            `;

            return messageDiv;
        }

        function getAiResponse(message) {
            // Simple AI response logic based on keywords
            message = message.toLowerCase();

            if (message.includes('hello') || message.includes('hi') || message.includes('hey')) {
                return "Hello! How can I assist you today?";
            } else if (message.includes('payment') || message.includes('withdraw') || message.includes('earnings')) {
                return "To withdraw your earnings, go to the Earnings & Payments page, select your preferred payment method, enter the amount, and click 'Request Withdrawal'. Payments typically process within 1-3 business days.";
            } else if (message.includes('rating') || message.includes('review')) {
                return "Your ratings are based on client feedback after completing tasks. To improve your ratings, focus on punctuality, communication, and quality of work. You can view your detailed ratings in the Reviews & Ratings section.";
            } else if (message.includes('task') || message.includes('job')) {
                return "You can find available tasks in the Available Tasks section. To manage your current tasks, use the Task Management page where you can update status, communicate with clients, and track your progress.";
            } else if (message.includes('profile') || message.includes('account')) {
                return "You can update your profile information, skills, and availability in the Profile Management section. Make sure to keep your information up-to-date to attract more clients!";
            } else if (message.includes('thank')) {
                return "You're welcome! Is there anything else I can help you with?";
            } else {
                return "I'm not sure I understand your question. Could you please rephrase or provide more details? You can also check our Knowledge Base for common questions or contact our support team for personalized assistance.";
            }
        }

        // Submit Ticket Button with Confetti Effect
        document.getElementById('submitTicketBtn').addEventListener('click', function() {
            // Validate form (simplified)
            const subject = document.getElementById('ticketSubject').value;
            const description = document.getElementById('ticketDescription').value;

            if (subject && description) {
                // Show success message
                alert('Your support ticket has been submitted successfully! Our team will respond shortly.');

                // Clear form
                document.getElementById('ticketSubject').value = '';
                document.getElementById('ticketDescription').value = '';
                document.getElementById('ticketCategory').selectedIndex = 0;
                document.getElementById('ticketPriority').selectedIndex = 0;

                // Show confetti
                showConfetti();
            } else {
                alert('Please fill in all required fields.');
            }
        });

        // Confetti Animation
        function showConfetti() {
            const confettiContainer = document.getElementById('confettiContainer');
            confettiContainer.style.display = 'block';
            confettiContainer.innerHTML = '';

            const colors = ['#FF6B6B', '#4ECDC4', '#FFD166', '#06D6A0', '#118AB2'];

            for (let i = 0; i < 100; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.animationDuration = (Math.random() * 3 + 2) + 's';
                confetti.style.animationDelay = Math.random() * 5 + 's';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];

                // Random shapes
                if (Math.random() > 0.5) {
                    confetti.style.borderRadius = '50%';
                } else {
                    confetti.style.width = '8px';
                    confetti.style.height = '16px';
                    confetti.style.transform = `rotate(${Math.random() * 360}deg)`;
                }

                confettiContainer.appendChild(confetti);
            }

            setTimeout(() => {
                confettiContainer.style.display = 'none';
            }, 8000);
        }

        // Help Button Animation
        const helpBtn = document.getElementById('helpBtn');
        helpBtn.addEventListener('mouseover', () => {
            helpBtn.classList.add('bounce');
        });
        helpBtn.addEventListener('mouseout', () => {
            helpBtn.classList.remove('bounce');
        });
        helpBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Live Chat Simulation
        const liveChatInput = document.getElementById('liveChatInput');
        const liveSendBtn = document.getElementById('liveSendBtn');
        const liveChatContainer = document.getElementById('liveChatContainer');

        liveSendBtn.addEventListener('click', sendLiveMessage);
        liveChatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                sendLiveMessage();
            }
        });

        function sendLiveMessage() {
            const message = liveChatInput.value.trim();
            if (message) {
                // Add user message
                const userMessage = createChatMessage('user', message);
                liveChatContainer.appendChild(userMessage);

                // Clear input
                liveChatInput.value = '';

                // Scroll to bottom
                liveChatContainer.scrollTop = liveChatContainer.scrollHeight;

                // Show typing indicator
                const typingIndicator = document.createElement('div');
                typingIndicator.className = 'typing-indicator';
                typingIndicator.innerHTML = `
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                `;
                liveChatContainer.appendChild(typingIndicator);

                // Simulate agent response after typing
                setTimeout(() => {
                    liveChatContainer.removeChild(typingIndicator);

                    // Add agent response
                    const agentResponse =
                        "Thank you for reaching out! I'm reviewing your question and will help you resolve this issue. Could you please provide a bit more information so I can assist you better?";
                    const agentMessage = document.createElement('div');
                    agentMessage.className = 'chat-message ai-message';

                    const now = new Date();
                    const hours = now.getHours();
                    const minutes = now.getMinutes();
                    const timeString =
                        `${hours}:${minutes < 10 ? '0' + minutes : minutes} ${hours >= 12 ? 'PM' : 'AM'}`;

                    agentMessage.innerHTML = `
                        <div class="message-avatar">SA</div>
                        <div class="message-content">
                            <div class="message-text">${agentResponse}</div>
                            <div class="message-time">${timeString}</div>
                        </div>
                    `;

                    liveChatContainer.appendChild(agentMessage);

                    // Scroll to bottom
                    liveChatContainer.scrollTop = liveChatContainer.scrollHeight;
                }, 3000);
            }
        }
    </script>
</body>

</html>
