<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Available Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FF6B6B', // Coral red
                        secondary: '#4ECDC4', // Teal
                        accent: '#FFE66D', // Yellow
                        dark: '#1A535C', // Dark teal
                        light: '#F7FFF7', // Off-white
                        'dark-blue': '#2C3E50',
                        'light-blue': '#3498DB',
                        'success': '#2ECC71',
                        'warning': '#F39C12',
                        'danger': '#E74C3C',
                        'info': '#3498DB',
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        display: ['Clash Display', 'sans-serif'],
                    },
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom Styles */
        .dashboard-card {
            @apply bg-white rounded-2xl p-6 shadow-lg transition-all duration-300 hover:shadow-xl border border-gray-100;
            transform-origin: center;
        }

        .dashboard-card:hover {
            @apply transform scale-[1.01];
        }

        .gradient-border {
            position: relative;
            border-radius: 1rem;
            background: white;
        }

        .gradient-border::before {
            content: "";
            position: absolute;
            inset: -2px;
            border-radius: 1.1rem;
            background: linear-gradient(135deg, #FF6B6B, #4ECDC4);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gradient-border:hover::before {
            opacity: 1;
        }

        .task-card {
            @apply relative overflow-hidden rounded-2xl p-6 transition-all duration-300 bg-white border border-gray-100 shadow-sm hover:shadow-md;
        }

        .task-card:hover {
            @apply transform scale-[1.01];
        }

        .task-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
            z-index: 1;
        }

        .task-card .task-icon {
            @apply absolute right-4 bottom-4 text-4xl opacity-20;
            z-index: 0;
        }

        /* Custom Animations */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .float {
            animation: float 6s ease-in-out infinite;
        }

        .float-delay-1 {
            animation-delay: 1s;
        }

        .float-delay-2 {
            animation-delay: 2s;
        }

        .float-delay-3 {
            animation-delay: 3s;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #FF6B6B;
        }

        /* Tooltip */
        .tooltip {
            @apply invisible absolute;
            width: max-content;
        }

        .has-tooltip:hover .tooltip {
            @apply visible z-50;
        }

        /* Pulse Animation */
        .pulse-dot {
            position: relative;
        }

        .pulse-dot::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: inherit;
            border-radius: inherit;
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(1.5);
            }
        }

        /* Glow Effect */
        .glow-on-hover {
            position: relative;
            z-index: 1;
        }

        .glow-on-hover::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.8) 0%, rgba(255, 255, 255, 0) 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
            border-radius: inherit;
        }

        .glow-on-hover:hover::after {
            opacity: 1;
        }

        /* Range Slider */
        input[type="range"] {
            -webkit-appearance: none;
            width: 100%;
            height: 6px;
            border-radius: 5px;
            background: #e5e7eb;
            outline: none;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #FF6B6B;
            cursor: pointer;
            border: 2px solid white;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1);
        }

        input[type="range"]::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #FF6B6B;
            cursor: pointer;
            border: 2px solid white;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1);
        }

        /* Modal */
        .modal-backdrop {
            @apply fixed inset-0 bg-black bg-opacity-50 z-40 flex items-center justify-center;
            backdrop-filter: blur(4px);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal-backdrop.show {
            opacity: 1;
        }

        .modal-content {
            @apply bg-white rounded-2xl shadow-xl w-full max-w-3xl max-h-[90vh] overflow-y-auto;
            transform: scale(0.9);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .modal-backdrop.show .modal-content {
            transform: scale(1);
            opacity: 1;
        }

        /* Checkbox */
        .custom-checkbox {
            @apply relative flex items-center;
        }

        .custom-checkbox input[type="checkbox"] {
            @apply absolute opacity-0 w-0 h-0;
        }

        .custom-checkbox .checkmark {
            @apply w-5 h-5 rounded border border-gray-300 flex items-center justify-center;
            transition: all 0.2s ease;
        }

        .custom-checkbox input[type="checkbox"]:checked~.checkmark {
            @apply bg-primary border-primary;
        }

        .custom-checkbox .checkmark:after {
            content: '';
            @apply w-2 h-2 bg-white rounded-sm;
            opacity: 0;
            transform: scale(0);
            transition: all 0.2s ease;
        }

        .custom-checkbox input[type="checkbox"]:checked~.checkmark:after {
            opacity: 1;
            transform: scale(1);
        }

        /* Chat Styling */
        .app-container {
            @apply flex flex-col lg:flex-row w-full min-h-screen bg-gray-50;
        }

        .conversations {
            @apply w-full lg:w-1/4 bg-white border-r border-gray-200 overflow-y-auto;
            height: calc(100vh - 140px);
        }

        .conversation-item {
            @apply flex items-start px-4 py-3 border-b border-gray-100 cursor-pointer transition-all;
        }

        .conversation-item:hover {
            @apply bg-gray-50;
        }

        .conversation-item.active {
            @apply bg-primary/5 border-l-4 border-l-primary;
        }

        .conversation-avatar {
            @apply w-12 h-12 rounded-full object-cover mr-3 flex-shrink-0;
        }

        .conversation-details {
            @apply flex-1 min-w-0;
        }

        .conversation-header-row {
            @apply flex justify-between items-center mb-1;
        }

        .conversation-name {
            @apply font-medium text-gray-900 truncate;
        }

        .conversation-time {
            @apply text-xs text-gray-500 whitespace-nowrap ml-2;
        }

        .conversation-preview {
            @apply text-sm text-gray-600 truncate flex items-center;
        }

        .unread-indicator {
            @apply w-2 h-2 bg-primary rounded-full mr-2 flex-shrink-0;
        }

        .task-badge {
            @apply text-xs rounded-full px-2 py-0.5 ml-2 whitespace-nowrap;
        }

        .task-active {
            @apply bg-blue-100 text-blue-800;
        }

        .task-completed {
            @apply bg-green-100 text-green-800;
        }

        .chat-area {
            @apply flex-1 flex flex-col bg-gray-50;
            height: calc(100vh - 140px);
        }

        .chat-header {
            @apply flex justify-between items-center p-4 bg-white border-b border-gray-200;
        }

        .chat-user-info {
            @apply flex items-center;
        }

        .chat-avatar {
            @apply w-10 h-10 rounded-full object-cover mr-3;
        }

        .chat-user-details h4 {
            @apply font-medium text-gray-900;
        }

        .chat-user-details p {
            @apply text-xs text-gray-500;
        }

        .chat-actions {
            @apply flex items-center;
        }

        .chat-action-btn {
            @apply w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 cursor-pointer mx-1 hover:bg-gray-200 transition-colors;
        }

        .chat-messages {
            @apply flex-1 p-4 overflow-y-auto;
        }

        .date-divider {
            @apply flex items-center justify-center my-4 text-xs text-gray-500;
        }

        .date-divider::before,
        .date-divider::after {
            content: "";
            @apply flex-1 h-px bg-gray-200 mx-2;
        }

        .message {
            @apply max-w-[75%] mb-4 rounded-lg p-3 relative;
        }

        .message-time {
            @apply text-xs text-gray-500 mt-1;
        }

        .message-received {
            @apply bg-white text-gray-800 shadow-sm;
            border-radius: 0 12px 12px 12px;
        }

        .message-sent {
            @apply bg-primary text-white ml-auto;
            border-radius: 12px 0 12px 12px;
        }

        .message-sent .message-time {
            @apply text-primary-100;
        }

        .message-image {
            @apply rounded-lg mt-2 w-full max-w-xs object-cover;
        }

        .message-file {
            @apply flex items-center bg-gray-100 rounded-lg p-3 mt-2;
        }

        .file-icon {
            @apply text-primary text-2xl mr-3;
        }

        .file-details {
            @apply flex-1;
        }

        .file-name {
            @apply font-medium text-sm;
        }

        .file-size {
            @apply text-xs text-gray-500;
        }

        .file-download {
            @apply text-gray-500 hover:text-primary cursor-pointer;
        }

        .typing-indicator {
            @apply flex items-center p-3 text-xs text-gray-500;
        }

        .typing-dots {
            @apply flex ml-2;
        }

        .typing-dot {
            @apply w-2 h-2 bg-gray-400 rounded-full mx-0.5;
            animation: typingDot 1.4s infinite ease-in-out both;
        }

        .typing-dot:nth-child(1) {
            animation-delay: -0.32s;
        }

        .typing-dot:nth-child(2) {
            animation-delay: -0.16s;
        }

        @keyframes typingDot {
            0%, 80%, 100% {
                transform: scale(0.6);
            }
            40% {
                transform: scale(1);
            }
        }

        .chat-input-area {
            @apply flex items-center p-3 bg-white border-t border-gray-200;
        }

        .attachment-btn {
            @apply p-2 rounded-full text-gray-500 hover:bg-gray-100 cursor-pointer transition-colors;
        }

        .message-input {
            @apply flex-1 bg-gray-100 rounded-full flex items-center overflow-hidden mx-2 px-4;
        }

        .message-input textarea {
            @apply bg-transparent border-none resize-none w-full py-2 focus:outline-none;
            max-height: 80px;
        }

        .emoji-btn {
            @apply p-2 text-gray-500 cursor-pointer;
        }

        .send-btn {
            @apply w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center hover:bg-primary/90 transition-colors;
        }

        .task-details {
            @apply w-full lg:w-1/4 bg-white border-l border-gray-200 p-4 overflow-y-auto;
            height: calc(100vh - 140px);
        }

        .task-details-header {
            @apply flex justify-between items-center mb-4 pb-3 border-b border-gray-200;
        }

        .task-details-title {
            @apply font-medium text-lg;
        }

        .task-details-toggle {
            @apply text-sm text-gray-500 cursor-pointer flex items-center;
        }

        .task-details-toggle i {
            @apply ml-1;
        }

        .task-info {
            @apply mb-4;
        }

        .task-info-item {
            @apply flex justify-between py-2 border-b border-gray-100;
        }

        .task-info-label {
            @apply text-sm text-gray-500;
        }

        .task-info-value {
            @apply text-sm font-medium;
        }

        .task-status {
            @apply text-xs rounded-full px-2 py-0.5;
        }

        .status-in-progress {
            @apply bg-blue-100 text-blue-800;
        }

        .task-description {
            @apply text-sm text-gray-700 p-3 bg-gray-50 rounded-lg mb-4;
        }

        .task-actions {
            @apply flex flex-wrap gap-2;
        }

        .btn {
            @apply py-2 px-4 rounded-lg text-sm font-medium transition-colors;
        }

        .btn-outline {
            @apply border border-gray-300 text-gray-700 hover:bg-gray-50;
        }

        .btn-primary {
            @apply bg-primary text-white hover:bg-primary/90;
        }

        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="font-sans bg-gray-50 text-dark">
    <!-- Header -->
    <header class="bg-gradient-to-r from-primary/10 to-secondary/10 py-8 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-xl bg-white shadow-md flex items-center justify-center mr-4">
                            <i class="fas fa-hands-helping text-primary text-xl"></i>
                        </div>
                        <h1 class="font-display text-2xl font-bold">QuickHands</h1>
                    </div>
                    <p class="text-gray-600 mt-1">Provider Dashboard</p>
                </div>

                <div class="mt-4 md:mt-0 flex items-center space-x-4">
                    <div class="relative">
                        <button
                            class="p-2 bg-white rounded-full shadow-sm text-gray-500 hover:text-primary transition-colors">
                            <i class="fas fa-bell"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-primary rounded-full pulse-dot"></span>
                        </button>
                    </div>

                    <div class="relative">
                        <button
                            class="p-2 bg-white rounded-full shadow-sm text-gray-500 hover:text-primary transition-colors">
                            <i class="fas fa-envelope"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-primary rounded-full pulse-dot"></span>
                        </button>
                    </div>

                    <div class="flex items-center">
                        <img src="/api/placeholder/45/45" alt="Provider"
                            class="w-10 h-10 rounded-full border-2 border-white shadow-sm">
                        <div class="ml-3">
                            <p class="font-medium">John Smith</p>
                            <p class="text-xs text-gray-500">Professional Handyman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="sticky top-0 z-30 bg-white shadow-md py-4 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between overflow-x-auto hide-scrollbar">
                <div class="flex space-x-1 md:space-x-4">
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-chart-line mr-2"></i> Dashboard
                    </a>
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg bg-primary text-white font-medium text-sm md:text-base">
                        <i class="fas fa-tasks mr-2"></i> Available Tasks
                    </a>
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-clipboard-list mr-2"></i> Task Management
                    </a>
                    <a href="#"
                        class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
                        <i class="fas fa-star mr-2"></i> Reviews
                    </a>
                </div>

                <div class="hidden md:flex space-x-2">
                    <a href="#"
                        class="px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors">
                        <i class="fas fa-user-circle mr-2"></i> Profile
                    </a>
                    <a href="#"
                        class="px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors">
                        <i class="fas fa-question-circle mr-2"></i> Help
                    </a>
                </div>

                <div class="md:hidden">
                    <button class="p-2 rounded-lg hover:bg-gray-100 text-gray-700">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="app-container">
        <!-- Conversations List -->
        <div class="conversations">
            <div class="conversation-item active">
                <img src="/api/placeholder/50/50" alt="Sarah Johnson" class="conversation-avatar">
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
                <img src="/api/placeholder/50/50" alt="Michael Brown" class="conversation-avatar">
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
                <img src="/api/placeholder/50/50" alt="Emily Davis" class="conversation-avatar">
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
                <img src="/api/placeholder/50/50" alt="David Wilson" class="conversation-avatar">
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
                <img src="/api/placeholder/50/50" alt="Jennifer Lee" class="conversation-avatar">
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
                <img src="/api/placeholder/50/50" alt="Robert Taylor" class="conversation-avatar">
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
                <img src="/api/placeholder/50/50" alt="Lisa Anderson" class="conversation-avatar">
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

        <!-- Chat Area -->
        <div class="chat-area">
            <div class="chat-header">
                <div class="chat-user-info">
                    <img src="/api/placeholder/45/45" alt="Sarah Johnson" class="chat-avatar">
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
                    <div>Perfect! I've left instructions with the doorman at the pickup location
