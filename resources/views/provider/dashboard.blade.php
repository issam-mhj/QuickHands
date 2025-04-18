<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QuickHands Provider Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
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

    .stat-card {
      @apply relative overflow-hidden rounded-2xl p-6 transition-all duration-300;
    }

    .stat-card::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 100%);
      z-index: 1;
    }

    .stat-card .stat-icon {
      @apply absolute right-4 bottom-4 text-4xl opacity-20;
      z-index: 0;
    }

    .progress-ring {
      transform: rotate(-90deg);
    }

    .progress-ring__circle {
      stroke-dasharray: 251.2;
      stroke-dashoffset: 251.2;
      transition: stroke-dashoffset 1s ease;
    }

    /* Custom Animations */
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0px); }
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
      0%, 100% {
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
      background: radial-gradient(circle, rgba(255,255,255,0.8) 0%, rgba(255,255,255,0) 70%);
      opacity: 0;
      transition: opacity 0.3s ease;
      z-index: -1;
      border-radius: inherit;
    }

    .glow-on-hover:hover::after {
      opacity: 1;
    }

    /* Wave Animation */
    .wave-bg {
      position: relative;
      overflow: hidden;
    }

    .wave-bg::before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 15%;
      background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' opacity='.25' fill='white'%3E%3C/path%3E%3Cpath d='M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z' opacity='.5' fill='white'%3E%3C/path%3E%3Cpath d='M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z' fill='white'%3E%3C/path%3E%3C/svg%3E") no-repeat;
      background-size: cover;
      animation: wave 10s linear infinite;
    }

    @keyframes wave {
      0% {
        background-position-x: 0;
      }
      100% {
        background-position-x: 1200px;
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
            <button class="p-2 bg-white rounded-full shadow-sm text-gray-500 hover:text-primary transition-colors">
              <i class="fas fa-bell"></i>
              <span class="absolute top-0 right-0 w-2 h-2 bg-primary rounded-full pulse-dot"></span>
            </button>
          </div>

          <div class="relative">
            <button class="p-2 bg-white rounded-full shadow-sm text-gray-500 hover:text-primary transition-colors">
              <i class="fas fa-envelope"></i>
              <span class="absolute top-0 right-0 w-2 h-2 bg-primary rounded-full pulse-dot"></span>
            </button>
          </div>

          <div class="flex items-center">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Provider" class="w-10 h-10 rounded-full border-2 border-white shadow-sm">
            <div class="ml-3">
              <p class="font-medium">Michael Rodriguez</p>
              <p class="text-xs text-gray-500">Professional Handyman</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Navigation -->
  <nav class="sticky top-0 z-50 bg-white shadow-md py-4 px-6 md:px-12">
    <div class="max-w-7xl mx-auto">
      <div class="flex items-center justify-between overflow-x-auto hide-scrollbar">
        <div class="flex space-x-1 md:space-x-4">
          <a href="#" class="px-3 md:px-4 py-2 rounded-lg bg-primary text-white font-medium text-sm md:text-base">
            <i class="fas fa-chart-line mr-2"></i> Dashboard
          </a>
          <a href="#" class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
            <i class="fas fa-tasks mr-2"></i> Available Tasks
          </a>
          <a href="#" class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
            <i class="fas fa-clipboard-list mr-2"></i> Task Management
          </a>
          <a href="#" class="px-3 md:px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium text-sm md:text-base transition-colors">
            <i class="fas fa-dollar-sign mr-2"></i> Earnings
          </a>
        </div>

        <div class="hidden md:flex space-x-2">
          <a href="#" class="px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors">
            <i class="fas fa-star mr-2"></i> Reviews
          </a>
          <a href="#" class="px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors">
            <i class="fas fa-user-circle mr-2"></i> Profile
          </a>
          <a href="#" class="px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors">
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
  <main class="max-w-7xl mx-auto px-6 md:px-12 py-8">
    <!-- Welcome Section -->
    <section class="mb-8">
      <div class="dashboard-card gradient-border wave-bg">
        <div class="flex flex-col md:flex-row md:items-center justify-between">
          <div class="mb-4 md:mb-0">
            <h2 class="font-display text-2xl md:text-3xl font-bold mb-2">Welcome back, Michael!</h2>
            <p class="text-gray-600">Here's what's happening with your tasks today.</p>
          </div>

          <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-2 sm:space-y-0 sm:space-x-4">
            <div class="flex items-center">
              <div class="w-3 h-3 rounded-full bg-success mr-2"></div>
              <span class="text-sm font-medium">Available for work</span>
            </div>

            <button class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
              <i class="fas fa-plus mr-2"></i> Find New Tasks
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Quick Stats -->
    <section class="mb-8">
      <h3 class="font-display text-xl font-semibold mb-4">Quick Stats</h3>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Tasks Completed -->
        <div class="stat-card bg-primary text-white float">
          <div class="relative z-10">
            <p class="text-white/70 text-sm font-medium mb-1">Tasks Completed</p>
            <div class="flex items-baseline">
              <h4 class="text-3xl font-bold">248</h4>
              <span class="ml-2 text-white/70 text-sm">total</span>
            </div>
            <div class="mt-2 flex items-center text-sm">
              <i class="fas fa-arrow-up mr-1 text-white/90"></i>
              <span class="font-medium text-white/90">12% increase</span>
              <span class="ml-1 text-white/70">vs last month</span>
            </div>
          </div>
          <i class="fas fa-check-circle stat-icon"></i>
        </div>

        <!-- Average Rating -->
        <div class="stat-card bg-secondary text-white float float-delay-1">
          <div class="relative z-10">
            <p class="text-white/70 text-sm font-medium mb-1">Average Rating</p>
            <div class="flex items-baseline">
              <h4 class="text-3xl font-bold">4.8</h4>
              <span class="ml-2 text-white/70 text-sm">out of 5</span>
            </div>
            <div class="mt-2 flex items-center text-sm">
              <div class="flex">
                <i class="fas fa-star text-accent mr-0.5"></i>
                <i class="fas fa-star text-accent mr-0.5"></i>
                <i class="fas fa-star text-accent mr-0.5"></i>
                <i class="fas fa-star text-accent mr-0.5"></i>
                <i class="fas fa-star-half-alt text-accent"></i>
              </div>
              <span class="ml-2 text-white/70">(124 reviews)</span>
            </div>
          </div>
          <i class="fas fa-star stat-icon"></i>
        </div>

        <!-- Monthly Earnings -->
        <div class="stat-card bg-accent text-dark float float-delay-2">
          <div class="relative z-10">
            <p class="text-dark/70 text-sm font-medium mb-1">Monthly Earnings</p>
            <div class="flex items-baseline">
              <h4 class="text-3xl font-bold">$2,845</h4>
              <span class="ml-2 text-dark/70 text-sm">this month</span>
            </div>
            <div class="mt-2 flex items-center text-sm">
              <i class="fas fa-arrow-up mr-1 text-dark/90"></i>
              <span class="font-medium text-dark/90">$420 more</span>
              <span class="ml-1 text-dark/70">than last month</span>
            </div>
          </div>
          <i class="fas fa-dollar-sign stat-icon"></i>
        </div>

        <!-- Active Tasks -->
        <div class="stat-card bg-dark text-white float float-delay-3">
          <div class="relative z-10">
            <p class="text-white/70 text-sm font-medium mb-1">Active Tasks</p>
            <div class="flex items-baseline">
              <h4 class="text-3xl font-bold">5</h4>
              <span class="ml-2 text-white/70 text-sm">in progress</span>
            </div>
            <div class="mt-2 flex items-center text-sm">
              <div class="flex items-center">
                <span class="w-2 h-2 rounded-full bg-success mr-1 pulse-dot"></span>
                <span class="font-medium text-white/90">3 due today</span>
              </div>
              <div class="flex items-center ml-3">
                <span class="w-2 h-2 rounded-full bg-warning mr-1"></span>
                <span class="font-medium text-white/90">2 upcoming</span>
              </div>
            </div>
          </div>
          <i class="fas fa-clipboard-list stat-icon"></i>
        </div>
      </div>
    </section>

    <!-- Performance Insights & Upcoming Tasks -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
      <!-- Performance Insights -->
      <div class="lg:col-span-2">
        <h3 class="font-display text-xl font-semibold mb-4">Performance Insights</h3>

        <div class="dashboard-card gradient-border">
          <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
            <div>
              <h4 class="text-lg font-semibold">Earnings Overview</h4>
              <p class="text-gray-500">Your earnings over the past 6 months</p>
            </div>

            <div class="mt-3 md:mt-0">
              <select class="px-3 py-1.5 bg-gray-100 rounded-lg text-sm">
                <option>Last 6 Months</option>
                <option>Last 3 Months</option>
                <option>Last Year</option>
              </select>
            </div>
          </div>

          <div class="h-64">
            <canvas id="earningsChart"></canvas>
          </div>

          <div class="mt-6 pt-6 border-t border-gray-100">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
              <div class="text-center">
                <p class="text-gray-500 text-sm">Avg. Task Value</p>
                <p class="text-xl font-semibold">$85.50</p>
              </div>
              <div class="text-center">
                <p class="text-gray-500 text-sm">Completion Rate</p>
                <p class="text-xl font-semibold">98.2%</p>
              </div>
              <div class="text-center">
                <p class="text-gray-500 text-sm">Repeat Clients</p>
                <p class="text-xl font-semibold">64%</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Monthly Goals -->
        <div class="dashboard-card gradient-border mt-8">
          <div class="flex items-start justify-between mb-6">
            <div>
              <h4 class="text-lg font-semibold">Monthly Goals</h4>
              <p class="text-gray-500">Your progress for April 2023</p>
            </div>

            <div class="flex items-center">
              <span class="text-sm text-primary font-medium">75% Complete</span>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Tasks Goal -->
            <div class="flex flex-col items-center">
              <div class="relative w-28 h-28 mb-3">
                <svg class="progress-ring" width="112" height="112">
                  <circle class="progress-ring__circle" stroke="#e5e7eb" stroke-width="8" fill="transparent" r="48" cx="56" cy="56"/>
                  <circle class="progress-ring__circle progress-tasks" stroke="#FF6B6B" stroke-width="8" fill="transparent" r="48" cx="56" cy="56" style="stroke-dashoffset: 75.36;"/>
                </svg>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                  <span class="text-2xl font-bold">15</span>
                  <span class="text-xs text-gray-500">of 20</span>
                </div>
              </div>
              <h5 class="font-medium">Tasks Completed</h5>
            </div>

            <!-- Earnings Goal -->
            <div class="flex flex-col items-center">
              <div class="relative w-28 h-28 mb-3">
                <svg class="progress-ring" width="112" height="112">
                  <circle class="progress-ring__circle" stroke="#e5e7eb" stroke-width="8" fill="transparent" r="48" cx="56" cy="56"/>
                  <circle class="progress-ring__circle progress-earnings" stroke="#4ECDC4" stroke-width="8" fill="transparent" r="48" cx="56" cy="56" style="stroke-dashoffset: 100.48;"/>
                </svg>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                  <span class="text-2xl font-bold">$2.8k</span>
                  <span class="text-xs text-gray-500">of $3.5k</span>
                </div>
              </div>
              <h5 class="font-medium">Earnings</h5>
            </div>

            <!-- Rating Goal -->
            <div class="flex flex-col items-center">
              <div class="relative w-28 h-28 mb-3">
                <svg class="progress-ring" width="112" height="112">
                  <circle class="progress-ring__circle" stroke="#e5e7eb" stroke-width="8" fill="transparent" r="48" cx="56" cy="56"/>
                  <circle class="progress-ring__circle progress-rating" stroke="#FFE66D" stroke-width="8" fill="transparent" r="48" cx="56" cy="56" style="stroke-dashoffset: 25.12;"/>
                </svg>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                  <span class="text-2xl font-bold">4.8</span>
                  <span class="text-xs text-gray-500">of 5.0</span>
                </div>
              </div>
              <h5 class="font-medium">Rating</h5>
            </div>
          </div>

          <div class="mt-6 pt-6 border-t border-gray-100">
            <div class="flex items-center">
              <div class="w-full bg-gray-200 rounded-full h-2.5">
                <div class="bg-primary h-2.5 rounded-full" style="width: 75%"></div>
              </div>
              <span class="ml-4 text-sm font-medium">75%</span>
            </div>
            <p class="mt-2 text-sm text-gray-500">You're on track to reach your monthly goals! Keep up the good work.</p>
          </div>
        </div>
      </div>

      <!-- Upcoming Tasks & Notifications -->
      <div class="lg:col-span-1">
        <h3 class="font-display text-xl font-semibold mb-4">Today's Schedule</h3>

        <div class="dashboard-card gradient-border mb-8">
          <div class="flex items-center justify-between mb-4">
            <h4 class="text-lg font-semibold">Upcoming Tasks</h4>
            <a href="#" class="text-primary hover:underline text-sm">View All</a>
          </div>

          <div class="space-y-4">
            <div class="p-3 bg-primary/5 rounded-xl border-l-4 border-primary">
              <div class="flex justify-between">
                <p class="font-medium">Kitchen Sink Repair</p>
                <span class="text-xs bg-primary/10 text-primary px-2 py-0.5 rounded-full">9:30 AM</span>
              </div>
              <div class="flex items-center mt-1 text-sm text-gray-500">
                <i class="fas fa-map-marker-alt mr-1"></i>
                <span>1234 Maple Street, Apt 301</span>
              </div>
              <div class="flex items-center justify-between mt-2">
                <span class="text-sm font-medium">$85.00</span>
                <button class="text-xs bg-gray-100 hover:bg-gray-200 text-gray-700 px-2 py-1 rounded transition-colors">
                  <i class="fas fa-directions mr-1"></i> Get Directions
                </button>
              </div>
            </div>

            <div class="p-3 bg-secondary/5 rounded-xl border-l-4 border-secondary">
              <div class="flex justify-between">
                <p class="font-medium">TV Mounting</p>
                <span class="text-xs bg-secondary/10 text-secondary px-2 py-0.5 rounded-full">1:00 PM</span>
              </div>
              <div class="flex items-center mt-1 text-sm text-gray-500">
                <i class="fas fa-map-marker-alt mr-1"></i>
                <span>567 Oak Avenue, Suite 12</span>
              </div>
              <div class="flex items-center justify-between mt-2">
                <span class="text-sm font-medium">$120.00</span>
                <button class="text-xs bg-gray-100 hover:bg-gray-200 text-gray-700 px-2 py-1 rounded transition-colors">
                  <i class="fas fa-directions mr-1"></i> Get Directions
                </button>
              </div>
            </div>

            <div class="p-3 bg-accent/5 rounded-xl border-l-4 border-accent">
              <div class="flex justify-between">
                <p class="font-medium">Furniture Assembly</p>
                <span class="text-xs bg-accent/10 text-dark px-2 py-0.5 rounded-full">4:15 PM</span>
              </div>
              <div class="flex items-center mt-1 text-sm text-gray-500">
                <i class="fas fa-map-marker-alt mr-1"></i>
                <span>890 Pine Road, Unit 7B</span>
              </div>
              <div class="flex items-center justify-between mt-2">
                <span class="text-sm font-medium">$95.00</span>
                <button class="text-xs bg-gray-100 hover:bg-gray-200 text-gray-700 px-2 py-1 rounded transition-colors">
                  <i class="fas fa-directions mr-1"></i> Get Directions
                </button>
              </div>
            </div>
          </div>

          <div class="mt-6 pt-4 border-t border-gray-100 text-center">
            <button class="text-primary hover:underline text-sm font-medium">
              <i class="fas fa-calendar-alt mr-1"></i> View Full Schedule
            </button>
          </div>
        </div>

        <h3 class="font-display text-xl font-semibold mb-4">Notifications</h3>

        <div class="dashboard-card gradient-border">
          <div class="flex items-center justify-between mb-4">
            <h4 class="text-lg font-semibold">Recent Updates</h4>
            <a href="#" class="text-primary hover:underline text-sm">Mark All Read</a>
          </div>

          <div class="space-y-4">
            <div class="flex items-start space-x-3">
              <div class="w-8 h-8 rounded-full bg-success/20 flex-shrink-0 flex items-center justify-center">
                <i class="fas fa-check text-success"></i>
              </div>
              <div>
                <p class="text-sm font-medium">New task bid accepted</p>
                <p class="text-xs text-gray-500">Plumbing repair task for $150</p>
                <p class="text-xs text-gray-400 mt-1">10 minutes ago</p>
              </div>
            </div>

            <div class="flex items-start space-x-3">
              <div class="w-8 h-8 rounded-full bg-primary/20 flex-shrink-0 flex items-center justify-center">
                <i class="fas fa-comment text-primary"></i>
              </div>
              <div>
                <p class="text-sm font-medium">New message from client</p>
                <p class="text-xs text-gray-500">Sarah: "Thanks for the quick service!"</p>
                <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
              </div>
            </div>

            <div class="flex items-start space-x-3">
              <div class="w-8 h-8 rounded-full bg-secondary/20 flex-shrink-0 flex items-center justify-center">
                <i class="fas fa-star text-secondary"></i>
              </div>
              <div>
                <p class="text-sm font-medium">New 5-star review</p>
                <p class="text-xs text-gray-500">John left you a 5-star review</p>
                <p class="text-xs text-gray-400 mt-1">3 hours ago</p>
              </div>
            </div>

            <div class="flex items-start space-x-3">
              <div class="w-8 h-8 rounded-full bg-warning/20 flex-shrink-0 flex items-center justify-center">
                <i class="fas fa-dollar-sign text-warning"></i>
              </div>
              <div>
                <p class="text-sm font-medium">Payment received</p>
                <p class="text-xs text-gray-500">$95.00 for Furniture Assembly</p>
                <p class="text-xs text-gray-400 mt-1">Yesterday</p>
              </div>
            </div>
          </div>

          <div class="mt-6 pt-4 border-t border-gray-100 text-center">
            <button class="text-primary hover:underline text-sm font-medium">
              <i class="fas fa-bell mr-1"></i> View All Notifications
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Service Areas & Skills -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
      <!-- Service Areas -->
      <div>
        <h3 class="font-display text-xl font-semibold mb-4">Your Service Areas</h3>

        <div class="dashboard-card gradient-border">
          <div class="flex items-center justify-between mb-6">
            <div>
              <h4 class="text-lg font-semibold">Coverage Map</h4>
              <p class="text-gray-500">Areas where you provide services</p>
            </div>

            <button class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
              <i class="fas fa-edit mr-1"></i> Edit Areas
            </button>
          </div>

          <div class="h-64 bg-gray-100 rounded-xl mb-4 overflow-hidden">
            <!-- Map placeholder - in a real app, this would be an actual map -->
            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
              <img src="https://placeholder.svg?height=256&width=512" alt="Service Area Map" class="w-full h-full object-cover">
            </div>
          </div>

          <div class="flex flex-wrap gap-2">
            <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-sm">Downtown</span>
            <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-sm">Westside</span>
            <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-sm">North Hills</span>
            <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-sm">Eastwood</span>
            <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-sm">South Bay</span>
            <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm">
              <i class="fas fa-plus mr-1"></i> Add Area
            </span>
          </div>
        </div>
      </div>

      <!-- Skills & Services -->
      <div>
        <h3 class="font-display text-xl font-semibold mb-4">Your Skills & Services</h3>

        <div class="dashboard-card gradient-border">
          <div class="flex items-center justify-between mb-6">
            <div>
              <h4 class="text-lg font-semibold">Service Categories</h4>
              <p class="text-gray-500">Tasks you're qualified to perform</p>
            </div>

            <button class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm">
              <i class="fas fa-edit mr-1"></i> Edit Skills
            </button>
          </div>

          <div class="grid grid-cols-2 gap-4">
            <div class="p-3 border border-gray-200 rounded-xl hover:border-primary/30 transition-colors">
              <div class="flex items-center mb-2">
                <i class="fas fa-tools text-primary mr-2"></i>
                <h5 class="font-medium">Handyman</h5>
              </div>
              <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-check-circle text-success mr-1"></i>
                <span>Verified</span>
                <span class="mx-2">•</span>
                <span>86 tasks</span>
              </div>
            </div>

            <div class="p-3 border border-gray-200 rounded-xl hover:border-primary/30 transition-colors">
              <div class="flex items-center mb-2">
                <i class="fas fa-faucet text-primary mr-2"></i>
                <h5 class="font-medium">Plumbing</h5>
              </div>
              <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-check-circle text-success mr-1"></i>
                <span>Verified</span>
                <span class="mx-2">•</span>
                <span>52 tasks</span>
              </div>
            </div>

            <div class="p-3 border border-gray-200 rounded-xl hover:border-primary/30 transition-colors">
              <div class="flex items-center mb-2">
                <i class="fas fa-plug text-primary mr-2"></i>
                <h5 class="font-medium">Electrical</h5>
              </div>
              <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-check-circle text-success mr-1"></i>
                <span>Verified</span>
                <span class="mx-2">•</span>
                <span>37 tasks</span>
              </div>
            </div>

            <div class="p-3 border border-gray-200 rounded-xl hover:border-primary/30 transition-colors">
              <div class="flex items-center mb-2">
                <i class="fas fa-couch text-primary mr-2"></i>
                <h5 class="font-medium">Furniture</h5>
              </div>
              <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-check-circle text-success mr-1"></i>
                <span>Verified</span>
                <span class="mx-2">•</span>
                <span>73 tasks</span>
              </div>
            </div>
          </div>

          <div class="mt-6 pt-4 border-t border-gray-100">
            <button class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
              <i class="fas fa-plus mr-1"></i> Add New Skill
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Recent Reviews -->
    <section class="mb-8">
      <div class="flex items-center justify-between mb-4">
        <h3 class="font-display text-xl font-semibold">Recent Reviews</h3>
        <a href="#" class="text-primary hover:underline text-sm">View All Reviews</a>
      </div>

      <div class="dashboard-card gradient-border">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div class="p-4 bg-gray-50 rounded-xl">
            <div class="flex items-start justify-between mb-3">
              <div class="flex items-center">
                <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Client" class="w-10 h-10 rounded-full mr-3">
                <div>
                  <h5 class="font-medium">Sarah Johnson</h5>
                  <p class="text-xs text-gray-500">2 days ago</p>
                </div>
              </div>
              <div class="flex text-accent">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
            </div>
            <p class="text-sm text-gray-600">Michael was fantastic! He arrived on time and fixed our kitchen sink quickly. Very professional and knowledgeable. Would definitely hire again!</p>
            <div class="mt-3 text-xs text-gray-500">
              <span class="font-medium">Task:</span> Kitchen Sink Repair
            </div>
          </div>

          <div class="p-4 bg-gray-50 rounded-xl">
            <div class="flex items-start justify-between mb-3">
              <div class="flex items-center">
                <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Client" class="w-10 h-10 rounded-full mr-3">
                <div>
                  <h5 class="font-medium">John Smith</h5>
                  <p class="text-xs text-gray-500">1 week ago</p>
                </div>
              </div>
              <div class="flex text-accent">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
            </div>
            <p class="text-sm text-gray-600">Michael did an excellent job mounting our TV. He was careful with our walls and made sure everything was level. The TV looks great and the cables are neatly hidden.</p>
            <div class="mt-3 text-xs text-gray-500">
              <span class="font-medium">Task:</span> TV Mounting
            </div>
          </div>
        </div>

        <div class="mt-6 pt-4 border-t border-gray-100 text-center">
          <div class="flex items-center justify-center">
            <div class="flex text-accent mr-2">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
            <span class="font-medium">4.8 average from 124 reviews</span>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-white border-t border-gray-200 py-6 px-6 md:px-12">
    <div class="max-w-7xl mx-auto">
      <div class="flex flex-col md:flex-row md:items-center justify-between">
        <div class="mb-4 md:mb-0">
          <p class="text-sm text-gray-500">© 2023 QuickHands. All rights reserved.</p>
        </div>

        <div class="flex space-x-4">
          <a href="#" class="text-sm text-gray-500 hover:text-primary">Help Center</a>
          <a href="#" class="text-sm text-gray-500 hover:text-primary">Privacy Policy</a>
          <a href="#" class="text-sm text-gray-500 hover:text-primary">Terms of Service</a>
          <a href="#" class="text-sm text-gray-500 hover:text-primary">Contact Support</a>
        </div>
      </div>
    </div>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Earnings Chart
      const ctx = document.getElementById('earningsChart').getContext('2d');
      const earningsChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['November', 'December', 'January', 'February', 'March', 'April'],
          datasets: [{
            label: 'Earnings',
            data: [1850, 2100, 1950, 2300, 2450, 2845],
            backgroundColor: 'rgba(255, 107, 107, 0.1)',
            borderColor: '#FF6B6B',
            borderWidth: 3,
            tension: 0.4,
            fill: true,
            pointBackgroundColor: '#FF6B6B',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointRadius: 5,
            pointHoverRadius: 7
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            },
            tooltip: {
              backgroundColor: '#fff',
              titleColor: '#1A535C',
              bodyColor: '#1A535C',
              borderColor: '#e5e7eb',
              borderWidth: 1,
              padding: 12,
              boxPadding: 6,
              usePointStyle: true,
              callbacks: {
                label: function(context) {
                  return `$${context.raw}`;
                }
              }
            }
          },
          scales: {
            x: {
              grid: {
                display: false
              }
            },
            y: {
              beginAtZero: true,
              ticks: {
                callback: function(value) {
                  return '$' + value;
                }
              }
            }
          }
        }
      });

      // Progress Rings Animation
      const setProgress = (element, percent) => {
        const circle = document.querySelector(element);
        const radius = circle.r.baseVal.value;
        const circumference = radius * 2 * Math.PI;

        circle.style.strokeDasharray = `${circumference} ${circumference}`;
        const offset = circumference - (percent / 100) * circumference;
        circle.style.strokeDashoffset = offset;
      };

      // Set progress for each ring
      setProgress('.progress-tasks', 75); // 15/20 = 75%
      setProgress('.progress-earnings', 80); // $2.8k/$3.5k = 80%
      setProgress('.progress-rating', 96); // 4.8/5 = 96%

      // Animate elements on load
      const animateElements = () => {
        gsap.fromTo('.dashboard-card',
          { opacity: 0, y: 30 },
          { opacity: 1, y: 0, duration: 0.6, stagger: 0.1, ease: "power2.out" }
        );

        gsap.fromTo('.stat-card',
          { opacity: 0, scale: 0.9 },
          { opacity: 1, scale: 1, duration: 0.5, stagger: 0.1, ease: "back.out(1.7)" }
        );
      };

      // Run animations
      animateElements();
    });
  </script>
</body>
</html>
