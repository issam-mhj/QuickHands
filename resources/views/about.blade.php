<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Our Story</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/controls/OrbitControls.js"></script>
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
                    },
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                        'float-slow': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'spin-slow': 'spin 15s linear infinite',
                        'bounce-slow': 'bounce 3s infinite',
                        'wiggle': 'wiggle 1s ease-in-out infinite',
                        'morph': 'morph 8s ease-in-out infinite',
                        'wave': 'wave 8s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            },
                        },
                        wiggle: {
                            '0%, 100%': {
                                transform: 'rotate(-3deg)'
                            },
                            '50%': {
                                transform: 'rotate(3deg)'
                            },
                        },
                        morph: {
                            '0%': {
                                borderRadius: '60% 40% 30% 70% / 60% 30% 70% 40%'
                            },
                            '50%': {
                                borderRadius: '30% 60% 70% 40% / 50% 60% 30% 60%'
                            },
                            '100%': {
                                borderRadius: '60% 40% 30% 70% / 60% 30% 70% 40%'
                            }
                        },
                        wave: {
                            '0%': {
                                transform: 'translateX(0) translateY(0)'
                            },
                            '25%': {
                                transform: 'translateX(5px) translateY(-5px)'
                            },
                            '50%': {
                                transform: 'translateX(10px) translateY(0)'
                            },
                            '75%': {
                                transform: 'translateX(5px) translateY(5px)'
                            },
                            '100%': {
                                transform: 'translateX(0) translateY(0)'
                            },
                        },
                        glow: {
                            '0%, 100%': {
                                boxShadow: '0 0 5px rgba(255, 107, 107, 0.5), 0 0 10px rgba(255, 107, 107, 0.3)'
                            },
                            '50%': {
                                boxShadow: '0 0 20px rgba(255, 107, 107, 0.8), 0 0 30px rgba(255, 107, 107, 0.5)'
                            },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes morph {
            0% {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            }

            50% {
                border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%;
            }

            100% {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            }
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes slide-up {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slide-in-left {
            0% {
                opacity: 0;
                transform: translateX(-50px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slide-in-right {
            0% {
                opacity: 0;
                transform: translateX(50px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes scale-up {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes draw-line {
            0% {
                stroke-dashoffset: 1000;
            }

            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes ripple {
            0% {
                transform: scale(0);
                opacity: 1;
            }

            100% {
                transform: scale(1.5);
                opacity: 0;
            }
        }

        @keyframes rotate-3d {
            0% {
                transform: perspective(1000px) rotateY(0deg);
            }

            100% {
                transform: perspective(1000px) rotateY(360deg);
            }
        }

        @keyframes bounce-in {
            0% {
                transform: scale(0.3);
                opacity: 0;
            }

            50% {
                transform: scale(1.05);
                opacity: 1;
            }

            70% {
                transform: scale(0.9);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-5px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(5px);
            }
        }

        @keyframes flip {
            0% {
                transform: perspective(400px) rotateY(0);
            }

            100% {
                transform: perspective(400px) rotateY(180deg);
            }
        }

        @keyframes glitch {
            0% {
                clip-path: inset(40% 0 61% 0);
                transform: translate(-5px, 5px);
            }

            20% {
                clip-path: inset(92% 0 1% 0);
                transform: translate(5px, -5px);
            }

            40% {
                clip-path: inset(43% 0 1% 0);
                transform: translate(5px, 5px);
            }

            60% {
                clip-path: inset(25% 0 58% 0);
                transform: translate(-5px, -5px);
            }

            80% {
                clip-path: inset(54% 0 7% 0);
                transform: translate(-5px, 5px);
            }

            100% {
                clip-path: inset(58% 0 43% 0);
                transform: translate(5px, -5px);
            }
        }

        @keyframes wave {
            0% {
                transform: translateX(0) translateY(0);
            }

            25% {
                transform: translateX(5px) translateY(-5px);
            }

            50% {
                transform: translateX(10px) translateY(0);
            }

            75% {
                transform: translateX(5px) translateY(5px);
            }

            100% {
                transform: translateX(0) translateY(0);
            }
        }

        @keyframes glow {

            0%,
            100% {
                box-shadow: 0 0 5px rgba(255, 107, 107, 0.5), 0 0 10px rgba(255, 107, 107, 0.3);
            }

            50% {
                box-shadow: 0 0 20px rgba(255, 107, 107, 0.8), 0 0 30px rgba(255, 107, 107, 0.5);
            }
        }

        @keyframes text-shimmer {
            0% {
                background-position: -100% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            overflow-x: hidden;
            cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="%23FF6B6B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/></svg>') 12 12, auto;
        }

        .gradient-text {
            background: linear-gradient(90deg, #FF6B6B, #4ECDC4, #FFE66D);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: gradient 8s ease infinite;
        }

        .shimmer-text {
            background: linear-gradient(90deg, transparent, #FF6B6B, #4ECDC4, #FFE66D, transparent);
            background-size: 200% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: text-shimmer 3s infinite;
        }

        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .timeline {
            position: relative;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            height: 100%;
            width: 4px;
            background: linear-gradient(to bottom, #FF6B6B, #4ECDC4);
            border-radius: 9999px;
            z-index: 0;
        }

        .timeline-content {
            position: relative;
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            max-width: 28rem;
            width: calc(50% - 30px);
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .timeline-content::before {
            content: '';
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 1.5rem;
            height: 1.5rem;
            border-radius: 9999px;
            background-color: white;
            border: 4px solid #FF6B6B;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .timeline-item:nth-child(odd) .timeline-content {
            margin-right: auto;
        }

        .timeline-item:nth-child(odd) .timeline-content::before {
            right: -13px;
            border-color: #FF6B6B;
        }

        .timeline-item:nth-child(even) .timeline-content {
            margin-left: auto;
        }

        .timeline-item:nth-child(even) .timeline-content::before {
            left: -13px;
            border-color: #4ECDC4;
        }

        .timeline-item {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .timeline-item.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .timeline-item:hover .timeline-content {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .timeline-item:hover .timeline-content::before {
            transform: translateY(-50%) scale(1.3);
            box-shadow: 0 0 15px rgba(255, 107, 107, 0.5);
        }

        .btn-primary {
            display: inline-flex;
            height: 3rem;
            align-items: center;
            justify-content: center;
            padding: 0 2rem;
            background: linear-gradient(135deg, #FF6B6B, #FF8E8E);
            color: white;
            font-weight: 500;
            border-radius: 0.75rem;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(255, 107, 107, 0.4);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #FF8E8E, #FF6B6B);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-primary:hover::before {
            opacity: 1;
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        .btn-primary:hover::after {
            animation: ripple 1s ease-out;
        }

        .btn-secondary {
            display: inline-flex;
            height: 3rem;
            align-items: center;
            justify-content: center;
            padding: 0 2rem;
            background: white;
            color: #FF6B6B;
            font-weight: 500;
            border-radius: 0.75rem;
            border: 2px solid rgba(255, 107, 107, 0.2);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            position: relative;
            overflow: hidden;
        }

        .btn-secondary:hover {
            transform: translateY(-5px);
            border-color: #FF6B6B;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            background: rgba(255, 107, 107, 0.05);
        }

        .btn-secondary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 107, 107, 0.2), transparent);
            transition: all 0.5s ease;
        }

        .btn-secondary:hover::before {
            left: 100%;
        }

        .mission-item {
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            opacity: 0;
            transform: translateY(30px);
            position: relative;
            z-index: 1;
        }

        .mission-item.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .mission-item:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .mission-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(78, 205, 196, 0.1));
            border-radius: 0.5rem;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .mission-item:hover::before {
            opacity: 1;
        }

        .mission-icon {
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .mission-item:hover .mission-icon {
            transform: scale(1.2) rotate(10deg);
            animation: glow 2s ease-in-out infinite;
        }

        .value-card {
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            opacity: 0;
            transform: translateY(30px);
            position: relative;
            overflow: hidden;
        }

        .value-card.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .value-card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(transparent, rgba(255, 107, 107, 0.1), transparent 30%);
            animation: rotate-3d 4s linear infinite;
            z-index: -1;
        }

        .value-icon {
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .value-card:hover .value-icon {
            transform: scale(1.2) rotate(10deg);
            animation: glow 2s ease-in-out infinite;
        }

        .team-card {
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            opacity: 0;
            transform: translateY(30px);
            position: relative;
            overflow: hidden;
        }

        .team-card.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .team-card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .team-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #FF6B6B, #4ECDC4);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease;
        }

        .team-card:hover::before {
            transform: scaleX(1);
        }

        .team-image {
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .team-card:hover .team-image {
            transform: scale(1.1);
        }

        .team-social {
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            opacity: 0;
            transform: translateY(10px);
        }

        .team-card:hover .team-social {
            opacity: 1;
            transform: translateY(0);
        }

        .social-icon {
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .social-icon:hover {
            transform: translateY(-3px) scale(1.2);
            background: linear-gradient(135deg, #FF6B6B, #4ECDC4);
            color: white;
        }

        .blob {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            animation: morph 8s ease-in-out infinite;
            filter: blur(3px);
        }

        .floating-shape {
            position: absolute;
            opacity: 0.5;
            pointer-events: none;
            filter: blur(2px);
        }

        .shape-1 {
            top: 10%;
            left: 10%;
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #FF6B6B, #FF8E8E);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: float 6s ease-in-out infinite, morph 8s ease-in-out infinite;
        }

        .shape-2 {
            top: 60%;
            left: 80%;
            width: 120px;
            height: 120px;
            background: linear-gradient(45deg, #4ECDC4, #6EE7E0);
            border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%;
            animation: float 8s ease-in-out infinite reverse, morph 10s ease-in-out infinite alternate;
        }

        .shape-3 {
            top: 80%;
            left: 20%;
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, #FFE66D, #FFF0A8);
            border-radius: 50% 50% 50% 50% / 60% 40% 60% 40%;
            animation: float 7s ease-in-out infinite, morph 12s ease-in-out infinite alternate-reverse;
        }

        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0;
            height: 4px;
            background: linear-gradient(90deg, #FF6B6B, #4ECDC4);
            z-index: 9999;
            transition: width 0.1s ease;
        }

        .scroll-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            background: linear-gradient(135deg, #FF6B6B, #4ECDC4);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            z-index: 999;
        }

        .scroll-to-top.active {
            opacity: 1;
            transform: translateY(0);
        }

        .scroll-to-top:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .hero-content {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .hero-content.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .hero-image {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            transition-delay: 0.3s;
        }

        .hero-image.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .section-title {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .section-title.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .section-description {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            transition-delay: 0.2s;
        }

        .section-description.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .cta-content {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .cta-content.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.8) 0%, rgba(255, 255, 255, 0) 70%);
        }

        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .cursor-dot {
            width: 8px;
            height: 8px;
            background-color: #FF6B6B;
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease;
        }

        .cursor-outline {
            width: 40px;
            height: 40px;
            border: 2px solid rgba(255, 107, 107, 0.5);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9998;
            transform: translate(-50%, -50%);
            transition: transform 0.2s ease, width 0.3s ease, height 0.3s ease, border-color 0.3s ease;
        }

        .parallax-layer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .parallax-item {
            position: absolute;
            transition: transform 0.1s ease-out;
        }

        .glowing-border {
            position: relative;
        }

        .glowing-border::after {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            border-radius: inherit;
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4, #FFE66D, #FF6B6B);
            z-index: -1;
            animation: rotate-3d 4s linear infinite;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .glowing-border:hover::after {
            opacity: 1;
        }

        .rotating-bg {
            position: absolute;
            width: 150%;
            height: 150%;
            top: -25%;
            left: -25%;
            background: conic-gradient(from 0deg, transparent, rgba(255, 107, 107, 0.05), rgba(78, 205, 196, 0.05), transparent);
            animation: rotate-3d 20s linear infinite;
            z-index: -1;
        }

        .text-3d {
            text-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0, 0, 0, .1), 0 0 5px rgba(0, 0, 0, .1), 0 1px 3px rgba(0, 0, 0, .3), 0 3px 5px rgba(0, 0, 0, .2), 0 5px 10px rgba(0, 0, 0, .25), 0 10px 10px rgba(0, 0, 0, .2), 0 20px 20px rgba(0, 0, 0, .15);
        }

        .magnetic-btn {
            transform-style: preserve-3d;
            transform: perspective(1000px);
            transition: transform 0.3s ease;
        }

        .magnetic-btn .content {
            transform-style: preserve-3d;
            transform: translateZ(20px);
        }

        .magnetic-btn::before {
            content: '';
            position: absolute;
            inset: -5px;
            transform: translateZ(-20px);
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
            border-radius: inherit;
            filter: blur(10px);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .magnetic-btn:hover::before {
            opacity: 0.7;
        }

        .hover-card {
            transition: all 0.3s ease;
            transform-style: preserve-3d;
            perspective: 1000px;
        }

        .hover-card:hover {
            transform: rotateX(5deg) rotateY(5deg);
        }

        .hover-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, rgba(255, 107, 107, 0.2), rgba(78, 205, 196, 0.2));
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: inherit;
        }

        .hover-card:hover::before {
            opacity: 1;
        }

        .hover-card .card-content {
            transform: translateZ(20px);
            transform-style: preserve-3d;
        }

        #canvas-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .scroll-indicator {
            position: relative;
            width: 30px;
            height: 50px;
            border: 2px solid #FF6B6B;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            padding-top: 10px;
        }

        .scroll-indicator::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #FF6B6B;
            animation: scroll-down 2s infinite;
        }

        @keyframes scroll-down {
            0% {
                transform: translateY(0);
                opacity: 1;
            }

            80% {
                transform: translateY(20px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 0;
            }
        }

        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #FF6B6B, #4ECDC4);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link.active::after {
            width: 100%;
        }

        .text-gradient {
            background: linear-gradient(90deg, #FF6B6B, #4ECDC4);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .text-outline {
            -webkit-text-stroke: 1px #FF6B6B;
            color: transparent;
        }

        .text-shadow {
            text-shadow: 3px 3px 0 rgba(255, 107, 107, 0.3);
        }

        .text-glow {
            text-shadow: 0 0 10px rgba(255, 107, 107, 0.5), 0 0 20px rgba(255, 107, 107, 0.3);
        }

        .text-animated {
            display: inline-block;
            animation: wave 3s ease-in-out infinite;
        }

        .text-animated:nth-child(2) {
            animation-delay: 0.1s;
        }

        .text-animated:nth-child(3) {
            animation-delay: 0.2s;
        }

        .text-animated:nth-child(4) {
            animation-delay: 0.3s;
        }

        .text-animated:nth-child(5) {
            animation-delay: 0.4s;
        }

        .text-animated:nth-child(6) {
            animation-delay: 0.5s;
        }

        .text-animated:nth-child(7) {
            animation-delay: 0.6s;
        }

        .text-animated:nth-child(8) {
            animation-delay: 0.7s;
        }

        .text-animated:nth-child(9) {
            animation-delay: 0.8s;
        }

        .text-animated:nth-child(10) {
            animation-delay: 0.9s;
        }

        .text-animated:nth-child(11) {
            animation-delay: 1s;
        }

        .text-animated:nth-child(12) {
            animation-delay: 1.1s;
        }

        .text-animated:nth-child(13) {
            animation-delay: 1.2s;
        }

        .text-animated:nth-child(14) {
            animation-delay: 1.3s;
        }

        .text-animated:nth-child(15) {
            animation-delay: 1.4s;
        }

        .text-animated:nth-child(16) {
            animation-delay: 1.5s;
        }

        .text-animated:nth-child(17) {
            animation-delay: 1.6s;
        }

        .text-animated:nth-child(18) {
            animation-delay: 1.7s;
        }

        .text-animated:nth-child(19) {
            animation-delay: 1.8s;
        }

        .text-animated:nth-child(20) {
            animation-delay: 1.9s;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="font-sans text-gray-800 bg-white min-h-screen overflow-x-hidden">
    <!-- Cursor Effects -->
    <div class="cursor-dot" id="cursor-dot"></div>
    <div class="cursor-outline" id="cursor-outline"></div>

    <!-- Canvas Background -->
    <div id="canvas-container"></div>

    <!-- Scroll Progress Bar -->
    <div class="scroll-progress" id="scroll-progress"></div>

    <!-- Scroll to Top Button -->
    <div class="scroll-to-top" id="scroll-to-top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Floating Shapes -->
    <div class="floating-shapes">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
    </div>

    <!-- Header -->
    <header class="fixed w-full z-50 transition-all duration-500" id="navbar">
        <div class="container mx-auto px-4 py-4">
            <div class="glass rounded-2xl shadow-lg px-6 py-4 flex justify-between items-center">
                <div class="flex items-center">
                    <a href="#" class="font-bold text-2xl">
                        <span class="text-primary">Quick</span><span class="text-secondary">Hands</span>
                    </a>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-800 font-medium nav-link">
                        Home
                    </a>
                    <a href="/about" class="text-primary font-medium nav-link active">
                        About
                    </a>
                    <a href="/contact" class="text-gray-800 font-medium nav-link">
                        Contact
                    </a>
                    <a href="/join" class="text-gray-800 font-medium nav-link">
                        Join Us
                    </a>
                </nav>
                <div class="flex items-center space-x-4">
                    <a href="join"
                        class="hidden md:block text-gray-800 hover:text-primary transition-colors">Login</a>
                    <a href="join" class="hidden md:block magnetic-btn">
                        <div class="btn-primary content">Sign Up</div>
                    </a>
                    <button class="md:hidden text-gray-800 hover:text-primary transition-colors"
                        id="mobile-menu-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="container mx-auto px-4 py-2">
                <div class="glass rounded-2xl shadow-lg p-6 space-y-4">
                    <a href="/" class="block text-gray-800 hover:text-primary transition-colors">Home</a>
                    <a href="/about" class="block text-primary font-medium">About</a>
                    <a href="/contact" class="block text-gray-800 hover:text-primary transition-colors">Contact</a>
                    <a href="/join" class="block text-gray-800 hover:text-primary transition-colors">Join Us</a>
                    <div class="flex space-x-4 pt-4 border-t border-white/20">
                        <a href="join" class="block text-gray-800 hover:text-primary transition-colors">Login</a>
                        <a href="join" class="block btn-primary">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="pt-32 pb-16 bg-light relative overflow-hidden">
        <!-- Parallax Background -->
        <div class="parallax-layer" data-depth="0.2">
            <div class="parallax-item" style="top: 10%; left: 5%; width: 150px; height: 150px;">
                <div class="blob bg-primary/10"></div>
            </div>
            <div class="parallax-item" style="top: 60%; right: 10%; width: 200px; height: 200px;">
                <div class="blob bg-secondary/10"></div>
            </div>
            <div class="parallax-item" style="bottom: 20%; left: 15%; width: 100px; height: 100px;">
                <div class="blob bg-accent/10"></div>
            </div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 hero-content">
                    <div
                        class="inline-block px-4 py-1 bg-primary/10 text-primary rounded-full text-sm font-semibold mb-6 animate-pulse-slow">
                        OUR JOURNEY
                    </div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                        <span class="text-outline">Our</span> <span class="gradient-text">Story</span>
                    </h1>
                    <p class="text-gray-600 mb-8 text-lg max-w-md">
                        QuickHands was founded with a simple mission: to make everyday services more
                        accessible, reliable, and affordable for everyone.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="#journey" class="magnetic-btn">
                            <div class="btn-primary content group flex items-center">
                                Learn More
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-1"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </a>
                        <a href="#team" class="btn-secondary glowing-border">Our Team</a>
                    </div>
                </div>
                <div class="md:w-1/2 md:pl-10 hero-image">
                    <div class="relative hover-card">
                        <!-- Blob Background -->
                        <div class="absolute -top-10 -right-10 w-72 h-72 bg-accent/30 blob -z-10"></div>

                        <div
                            class="bg-white rounded-xl shadow-lg p-6 relative transform transition-all duration-500 card-content">
                            <div
                                class="absolute -top-4 -right-4 bg-accent text-dark text-xs font-bold px-3 py-1 rounded-full shadow-lg animate-pulse-slow">
                                Our Vision
                            </div>
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1771&q=80"
                                alt="Team working together"
                                class="rounded-xl w-full h-56 object-cover mb-6 shadow-md">

                            <div class="bg-white rounded-xl p-5 shadow-md border border-gray-100">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="font-medium text-lg">Connecting People</h3>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                <i class="fas fa-star text-sm"></i>
                                                <i class="fas fa-star text-sm"></i>
                                                <i class="fas fa-star text-sm"></i>
                                                <i class="fas fa-star text-sm"></i>
                                                <i class="fas fa-star-half-alt text-sm"></i>
                                            </div>
                                            <span class="text-xs text-gray-500 ml-2">(4.8/5)</span>
                                        </div>
                                        <p class="text-primary font-semibold mt-2">Since 2018</p>
                                    </div>
                                    <div class="flex flex-col items-end">
                                        <span class="text-xs text-green-500 mb-2 font-medium">100,000+ Providers</span>
                                        <div
                                            class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center animate-pulse-slow">
                                            <i class="fas fa-handshake text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Floating Elements -->
                            <div
                                class="absolute -bottom-3 -left-3 w-10 h-10 bg-secondary rounded-full opacity-70 animate-pulse">
                            </div>
                            <div
                                class="absolute top-1/2 -right-3 w-6 h-6 bg-primary rounded-full opacity-70 animate-ping">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex flex-col items-center">
            <a href="#journey" class="text-primary hover:text-secondary transition-colors duration-300">
                <div class="scroll-indicator"></div>
                <span class="block text-center mt-2 text-sm">Scroll Down</span>
            </a>
        </div>
    </section>

    <!-- Our Journey Timeline Section -->
    <section id="journey" class="py-16 md:py-32 bg-white relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-secondary/10 rounded-bl-full -z-10"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-1/4 bg-primary/10 rounded-tr-full -z-10"></div>
        <div class="rotating-bg"></div>

        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 section-title text-3d">Our Journey</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg section-description">
                    From a small startup to a thriving platform, here's how we've grown over the years.
                </p>
            </div>

            <div class="timeline">
                <!-- Timeline Item 1 -->
                <div class="timeline-item mb-12" data-delay="0">
                    <div class="timeline-content glowing-border">
                        <div
                            class="bg-primary/10 text-primary text-sm font-semibold px-3 py-1 rounded-full inline-block mb-2">
                            2018
                        </div>
                        <h3 class="text-xl font-semibold mb-2">The Beginning</h3>
                        <p class="text-gray-600">
                            QuickHands was founded with a vision to connect skilled professionals with people who need
                            their services.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 2 -->
                <div class="timeline-item mb-12" data-delay="200">
                    <div class="timeline-content glowing-border">
                        <div
                            class="bg-secondary/10 text-secondary text-sm font-semibold px-3 py-1 rounded-full inline-block mb-2">
                            2019
                        </div>
                        <h3 class="text-xl font-semibold mb-2">First 1,000 Users</h3>
                        <p class="text-gray-600">
                            We celebrated our first milestone of 1,000 active users and expanded our service offerings.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 3 -->
                <div class="timeline-item mb-12" data-delay="400">
                    <div class="timeline-content glowing-border">
                        <div
                            class="bg-primary/10 text-primary text-sm font-semibold px-3 py-1 rounded-full inline-block mb-2">
                            2020
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Nationwide Expansion</h3>
                        <p class="text-gray-600">
                            Despite global challenges, we expanded our services nationwide and introduced new features.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 4 -->
                <div class="timeline-item mb-12" data-delay="600">
                    <div class="timeline-content glowing-border">
                        <div
                            class="bg-secondary/10 text-secondary text-sm font-semibold px-3 py-1 rounded-full inline-block mb-2">
                            2022
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Platform Redesign</h3>
                        <p class="text-gray-600">
                            We completely redesigned our platform for a better user experience and introduced our mobile
                            app.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 5 -->
                <div class="timeline-item mb-12" data-delay="800">
                    <div class="timeline-content glowing-border">
                        <div
                            class="bg-primary/10 text-primary text-sm font-semibold px-3 py-1 rounded-full inline-block mb-2">
                            2023
                        </div>
                        <h3 class="text-xl font-semibold mb-2">100,000 Service Providers</h3>
                        <p class="text-gray-600">
                            We reached the milestone of 100,000 verified service providers on our platform.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 6 -->
                <div class="timeline-item" data-delay="1000">
                    <div class="timeline-content glowing-border">
                        <div
                            class="bg-secondary/10 text-secondary text-sm font-semibold px-3 py-1 rounded-full inline-block mb-2">
                            Today
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Looking to the Future</h3>
                        <p class="text-gray-600">
                            We continue to innovate and expand, with exciting new features and services on the horizon.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Mission Section -->
    <section id="our-mission" class="py-16 md:py-32 bg-light relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-1/4 right-1/4 w-64 h-64 bg-primary/10 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-1/4 left-1/4 w-80 h-80 bg-secondary/10 rounded-full blur-3xl -z-10"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="relative">
                        <!-- Blob Background -->
                        <div class="absolute -top-10 -left-10 w-40 h-40 bg-primary/20 blob -z-10"></div>

                        <h2 class="text-4xl md:text-5xl font-bold mb-6 section-title text-shadow">Our Mission</h2>
                        <p class="text-gray-600 text-lg mb-8 section-description">
                            At QuickHands, we believe that everyone should have access to quality service
                            at affordable prices. That's why we prioritize fair pricing, skilled professionals,
                            and reliable service every time, ensuring value for the hard-earned money of our customers.
                        </p>

                        <div class="space-y-4">
                            <h3 class="text-xl font-semibold mb-2">We're committed to:</h3>

                            <!-- Mission Item 1 -->
                            <div class="flex items-start gap-3 p-4 bg-white rounded-lg shadow-sm mission-item hover-card"
                                data-delay="0">
                                <div
                                    class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center mission-icon">
                                    <i class="fas fa-check text-primary"></i>
                                </div>
                                <div class="card-content">
                                    <h4 class="font-medium mb-1">Quality Assurance</h4>
                                    <p class="text-gray-600">Offering quality through rigorous provider verification
                                        and continuous monitoring.</p>
                                </div>
                            </div>

                            <!-- Mission Item 2 -->
                            <div class="flex items-start gap-3 p-4 bg-white rounded-lg shadow-sm mission-item hover-card"
                                data-delay="200">
                                <div
                                    class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center mission-icon">
                                    <i class="fas fa-check text-secondary"></i>
                                </div>
                                <div class="card-content">
                                    <h4 class="font-medium mb-1">Efficient Matching</h4>
                                    <p class="text-gray-600">Setting the bar for service through efficient matching of
                                        clients and providers.</p>
                                </div>
                            </div>

                            <!-- Mission Item 3 -->
                            <div class="flex items-start gap-3 p-4 bg-white rounded-lg shadow-sm mission-item hover-card"
                                data-delay="400">
                                <div
                                    class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center mission-icon">
                                    <i class="fas fa-check text-accent"></i>
                                </div>
                                <div class="card-content">
                                    <h4 class="font-medium mb-1">Community Building</h4>
                                    <p class="text-gray-600">Building a community of like-minded professionals who
                                        share our values.</p>
                                </div>
                            </div>

                            <!-- Mission Item 4 -->
                            <div class="flex items-start gap-3 p-4 bg-white rounded-lg shadow-sm mission-item hover-card"
                                data-delay="600">
                                <div
                                    class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center mission-icon">
                                    <i class="fas fa-check text-primary"></i>
                                </div>
                                <div class="card-content">
                                    <h4 class="font-medium mb-1">Growth Opportunities</h4>
                                    <p class="text-gray-600">Creating opportunities for growth and development for all
                                        our service providers.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative overflow-hidden rounded-2xl shadow-xl hover-card">
                    <div class="card-content">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1771&q=80"
                            alt="Team working together"
                            class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-700">

                        <!-- Floating Elements -->
                        <div
                            class="absolute -bottom-5 -left-5 w-20 h-20 bg-primary/20 rounded-full animate-pulse-slow">
                        </div>
                        <div class="absolute top-1/3 -right-5 w-16 h-16 bg-secondary/20 rounded-full animate-float">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section id="values"
        class="py-16 md:py-32 bg-gradient-to-br from-primary/5 to-secondary/5 relative overflow-hidden">
        <div class="rotating-bg"></div>

        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 section-title text-glow">Our Values</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg section-description">
                    These core principles guide everything we do at QuickHands.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Value 1 -->
                <div class="bg-white rounded-lg shadow-md p-6 value-card hover-card" data-delay="0">
                    <div class="card-content">
                        <div
                            class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-4 value-icon">
                            <i class="fas fa-handshake text-primary text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Trust</h3>
                        <p class="text-gray-600">We build trust through transparency, reliability, and consistent
                            quality service.</p>

                        <!-- Decorative Element -->
                        <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-primary/10 rounded-full"></div>
                    </div>
                </div>

                <!-- Value 2 -->
                <div class="bg-white rounded-lg shadow-md p-6 value-card hover-card" data-delay="200">
                    <div class="card-content">
                        <div
                            class="w-16 h-16 rounded-full bg-secondary/10 flex items-center justify-center mb-4 value-icon">
                            <i class="fas fa-users text-secondary text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Community</h3>
                        <p class="text-gray-600">We foster a supportive community of service providers and clients who
                            help each other succeed.</p>

                        <!-- Decorative Element -->
                        <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-secondary/10 rounded-full"></div>
                    </div>
                </div>

                <!-- Value 3 -->
                <div class="bg-white rounded-lg shadow-md p-6 value-card hover-card" data-delay="400">
                    <div class="card-content">
                        <div
                            class="w-16 h-16 rounded-full bg-accent/10 flex items-center justify-center mb-4 value-icon">
                            <i class="fas fa-star text-accent text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Excellence</h3>
                        <p class="text-gray-600">We strive for excellence in every interaction, service, and feature we
                            provide.</p>

                        <!-- Decorative Element -->
                        <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-accent/10 rounded-full"></div>
                    </div>
                </div>

                <!-- Value 4 -->
                <div class="bg-white rounded-lg shadow-md p-6 value-card hover-card" data-delay="600">
                    <div class="card-content">
                        <div
                            class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-4 value-icon">
                            <i class="fas fa-lightbulb text-primary text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Innovation</h3>
                        <p class="text-gray-600">We continuously innovate to improve our platform and create better
                            experiences for everyone.</p>

                        <!-- Decorative Element -->
                        <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-primary/10 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Meet Our Team Section -->
    <section id="team" class="py-16 md:py-32 bg-light relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-secondary/10 rounded-bl-full -z-10"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-1/4 bg-primary/10 rounded-tr-full -z-10"></div>
        <div class="rotating-bg"></div>

        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 section-title">
                    <span class="text-animated">M</span>
                    <span class="text-animated">e</span>
                    <span class="text-animated">e</span>
                    <span class="text-animated">t</span>
                    <span class="text-animated">&nbsp;</span>
                    <span class="text-animated">O</span>
                    <span class="text-animated">u</span>
                    <span class="text-animated">r</span>
                    <span class="text-animated">&nbsp;</span>
                    <span class="text-animated">T</span>
                    <span class="text-animated">e</span>
                    <span class="text-animated">a</span>
                    <span class="text-animated">m</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg section-description">
                    The passionate people behind QuickHands. We're working to revolutionize the way you access services.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden team-card hover-card" data-delay="0">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80"
                            alt="Sara Cooper" class="w-full h-full object-cover team-image">
                    </div>
                    <div class="p-6 relative card-content">
                        <h3 class="font-bold text-xl mb-1">Sara Cooper</h3>
                        <p class="text-primary text-sm mb-4">CEO & Founder</p>
                        <p class="text-gray-600 text-sm">
                            With over 10 years of experience in the service industry, Sara founded QuickHands to bridge
                            the gap between skilled professionals and clients.
                        </p>
                        <div class="flex mt-4 space-x-2 team-social">
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 social-icon">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 social-icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 social-icon">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden team-card hover-card" data-delay="200">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80"
                            alt="John Smith" class="w-full h-full object-cover team-image">
                    </div>
                    <div class="p-6 relative card-content">
                        <h3 class="font-bold text-xl mb-1">John Smith</h3>
                        <p class="text-secondary text-sm mb-4">CTO</p>
                        <p class="text-gray-600 text-sm">
                            John brings his technical expertise to create a seamless platform experience, ensuring our
                            service providers and clients connect effortlessly.
                        </p>
                        <div class="flex mt-4 space-x-2 team-social">
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 social-icon">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 social-icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 social-icon">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden team-card hover-card" data-delay="400">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1776&q=80"
                            alt="Maria Rodriguez" class="w-full h-full object-cover team-image">
                    </div>
                    <div class="p-6 relative card-content">
                        <h3 class="font-bold text-xl mb-1">Maria Rodriguez</h3>
                        <p class="text-accent text-sm mb-4">Head of Operations</p>
                        <p class="text-gray-600 text-sm">
                            Maria oversees all operational aspects of QuickHands, ensuring quality service delivery and
                            maintaining our high standards.
                        </p>
                        <div class="flex mt-4 space-x-2 team-social">
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 social-icon">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 social-icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 social-icon">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden team-card hover-card" data-delay="600">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80"
                            alt="David Chen" class="w-full h-full object-cover team-image">
                    </div>
                    <div class="p-6 relative card-content">
                        <h3 class="font-bold text-xl mb-1">David Chen</h3>
                        <p class="text-primary text-sm mb-4">Head of Marketing</p>
                        <p class="text-gray-600 text-sm">
                            David leads our marketing team, spreading the word about QuickHands and helping connect more
                            service providers with clients.
                        </p>
                        <div class="flex mt-4 space-x-2 team-social">
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 social-icon">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 social-icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 social-icon">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="cta"
        class="py-16 md:py-32 bg-gradient-to-br from-primary to-secondary text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-3xl mx-auto cta-content">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white shimmer-text">Join QuickHands Today</h2>
                <p class="text-white/80 text-lg mb-8">
                    Whether you're looking for services or offering your skills, become part of our growing community!
                </p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#" class="magnetic-btn">
                        <div
                            class="bg-white text-primary px-6 py-3 rounded-xl font-medium hover:bg-white/90 transition duration-300 shadow-lg hover:-translate-y-1 transform content">
                            Get Started
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </a>
                    <a href="#"
                        class="bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-xl font-medium transition duration-300 hover:-translate-y-1 transform glowing-border">
                        Learn More
                    </a>
                </div>
            </div>
        </div>

        <!-- Animated Particles -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="particle-1 absolute w-3 h-3 bg-white rounded-full opacity-70 animate-float"
                style="top: 20%; left: 10%"></div>
            <div class="particle-2 absolute w-2 h-2 bg-white rounded-full opacity-60 animate-float-slow"
                style="top: 40%; left: 20%"></div>
            <div class="particle-3 absolute w-4 h-4 bg-white rounded-full opacity-80 animate-float"
                style="top: 70%; left: 15%"></div>
            <div class="particle-4 absolute w-3 h-3 bg-white rounded-full opacity-70 animate-float-slow"
                style="top: 30%; left: 80%"></div>
            <div class="particle-5 absolute w-2 h-2 bg-white rounded-full opacity-60 animate-float"
                style="top: 60%; left: 85%"></div>
            <div class="particle-6 absolute w-4 h-4 bg-white rounded-full opacity-80 animate-float-slow"
                style="top: 80%; left: 75%"></div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-20 pb-10 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div>
                    <h3 class="text-2xl font-bold mb-6">Quick<span class="text-primary">Hands</span></h3>
                    <p class="text-gray-400 mb-6">Connecting you with skilled professionals for all your service needs.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>Home
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>About Us
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>Services
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>Contact
                            </a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Services</h4>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Home Cleaning
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Handyman
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Moving Help
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Lawn Care
                            </a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Subscribe to Our Newsletter</h4>
                    <p class="text-gray-400 mb-4">Stay updated with our latest services and offers.</p>
                    <div class="flex mb-4">
                        <input type="email" placeholder="Your email"
                            class="px-4 py-3 w-full rounded-l-lg focus:outline-none text-gray-800">
                        <button class="bg-primary px-4 py-3 rounded-r-lg hover:bg-opacity-90 transition-colors">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <p class="text-xs text-gray-500">By subscribing, you agree to our Privacy Policy and consent to
                        receive updates.</p>
                </div>
            </div>
            <div class="border-t border-white/10 mt-16 pt-8 text-center text-gray-400">
                <p>&copy; 2025 QuickHands. All rights reserved.</p>
                <div class="flex justify-center space-x-6 mt-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Privacy
                        Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Terms of
                        Service</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">FAQ</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Initialize GSAP and ScrollTrigger
        gsap.registerPlugin(ScrollTrigger);

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('py-2');
                navbar.classList.remove('py-4');
            } else {
                navbar.classList.add('py-4');
                navbar.classList.remove('py-2');
            }
        });

        // Scroll progress bar
        const scrollProgress = document.getElementById('scroll-progress');
        window.addEventListener('scroll', function() {
            const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercentage = (scrollTop / scrollHeight) * 100;
            scrollProgress.style.width = scrollPercentage + '%';

            // Show/hide scroll to top button
            const scrollToTop = document.getElementById('scroll-to-top');
            if (scrollTop > 300) {
                scrollToTop.classList.add('active');
            } else {
                scrollToTop.classList.remove('active');
            }
        });

        // Scroll to top button
        document.getElementById('scroll-to-top').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Create particles on click
        document.addEventListener('click', function(e) {
            createParticles(e.clientX, e.clientY);
        });

        function createParticles(x, y) {
            const particleCount = 12;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';

                // Random size between 5 and 15
                const size = Math.random() * 10 + 5;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;

                // Random color
                const colors = ['#FF6B6B', '#4ECDC4', '#FFE66D'];
                const color = colors[Math.floor(Math.random() * colors.length)];
                particle.style.background = color;

                // Position at click
                particle.style.left = `${x}px`;
                particle.style.top = `${y}px`;

                // Random direction
                const angle = Math.random() * Math.PI * 2;
                const speed = Math.random() * 100 + 50;
                const vx = Math.cos(angle) * speed;
                const vy = Math.sin(angle) * speed;

                document.body.appendChild(particle);

                // Animate
                const startTime = Date.now();
                const duration = Math.random() * 1000 + 500; // 0.5 to 1.5 seconds

                function animate() {
                    const elapsed = Date.now() - startTime;
                    const progress = elapsed / duration;

                    if (progress >= 1) {
                        particle.remove();
                        return;
                    }

                    const currentX = x + vx * progress;
                    const currentY = y + vy * progress + (progress * progress * 200); // Add gravity
                    const scale = 1 - progress; // Fade out

                    particle.style.left = `${currentX}px`;
                    particle.style.top = `${currentY}px`;
                    particle.style.opacity = scale;
                    particle.style.transform = `scale(${scale})`;

                    requestAnimationFrame(animate);
                }

                animate();
            }
        }

        // Custom cursor
        const cursorDot = document.getElementById('cursor-dot');
        const cursorOutline = document.getElementById('cursor-outline');

        window.addEventListener('mousemove', function(e) {
            const posX = e.clientX;
            const posY = e.clientY;

            cursorDot.style.left = `${posX}px`;
            cursorDot.style.top = `${posY}px`;

            cursorOutline.style.left = `${posX}px`;
            cursorOutline.style.top = `${posY}px`;
        });

        // Cursor effects on hover
        document.querySelectorAll('a, button, .hover-card').forEach(item => {
            item.addEventListener('mouseenter', () => {
                cursorOutline.style.width = '60px';
                cursorOutline.style.height = '60px';
                cursorOutline.style.borderColor = 'rgba(255, 107, 107, 0.8)';
            });

            item.addEventListener('mouseleave', () => {
                cursorOutline.style.width = '40px';
                cursorOutline.style.height = '40px';
                cursorOutline.style.borderColor = 'rgba(255, 107, 107, 0.5)';
            });
        });

        // Parallax effect
        document.addEventListener('mousemove', function(e) {
            const parallaxItems = document.querySelectorAll('.parallax-item');
            const mouseX = e.clientX;
            const mouseY = e.clientY;

            parallaxItems.forEach(item => {
                const depth = 0.05;
                const moveX = (mouseX - window.innerWidth / 2) * depth;
                const moveY = (mouseY - window.innerHeight / 2) * depth;

                item.style.transform = `translate(${moveX}px, ${moveY}px)`;
            });
        });

        // Magnetic buttons
        document.querySelectorAll('.magnetic-btn').forEach(btn => {
            btn.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const deltaX = (x - centerX) / centerX;
                const deltaY = (y - centerY) / centerY;

                this.style.transform =
                    `perspective(1000px) rotateX(${deltaY * 10}deg) rotateY(${deltaX * -10}deg)`;
            });

            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
            });
        });

        // 3D background with Three.js
        function initThreeJSBackground() {
            const container = document.getElementById('canvas-container');

            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);

            const renderer = new THREE.WebGLRenderer({
                alpha: true
            });
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setClearColor(0x000000, 0);
            container.appendChild(renderer.domElement);

            // Create particles
            const particleCount = 500;
            const particles = new THREE.BufferGeometry();
            const positions = new Float32Array(particleCount * 3);
            const colors = new Float32Array(particleCount * 3);

            for (let i = 0; i < particleCount * 3; i += 3) {
                // Position
                positions[i] = (Math.random() - 0.5) * 10;
                positions[i + 1] = (Math.random() - 0.5) * 10;
                positions[i + 2] = (Math.random() - 0.5) * 10;

                // Color
                colors[i] = Math.random();
                colors[i + 1] = Math.random();
                colors[i + 2] = Math.random();
            }

            particles.setAttribute('position', new THREE.BufferAttribute(positions, 3));
            particles.setAttribute('color', new THREE.BufferAttribute(colors, 3));

            const particleMaterial = new THREE.PointsMaterial({
                size: 0.05,
                vertexColors: true,
                transparent: true,
                opacity: 0.7,
                blending: THREE.AdditiveBlending
            });

            const particleSystem = new THREE.Points(particles, particleMaterial);
            scene.add(particleSystem);

            camera.position.z = 5;

            // Mouse movement effect
            let mouseX = 0;
            let mouseY = 0;

            document.addEventListener('mousemove', (event) => {
                mouseX = (event.clientX / window.innerWidth) * 2 - 1;
                mouseY = -(event.clientY / window.innerHeight) * 2 + 1;
            });

            // Animation loop
            function animate() {
                requestAnimationFrame(animate);

                particleSystem.rotation.x += 0.001;
                particleSystem.rotation.y += 0.001;

                // Follow mouse
                particleSystem.rotation.x += (mouseY * 0.01 - particleSystem.rotation.x) * 0.05;
                particleSystem.rotation.y += (mouseX * 0.01 - particleSystem.rotation.y) * 0.05;

                renderer.render(scene, camera);
            }

            animate();

            // Handle window resize
            window.addEventListener('resize', () => {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, window.innerHeight);
            });
        }

        // Initialize Three.js background
        initThreeJSBackground();

        // Intersection Observer for animations
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        // Hero section animations
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                document.querySelector('.hero-content').classList.add('animate');
                setTimeout(() => {
                    document.querySelector('.hero-image').classList.add('animate');
                }, 300);
            }, 300);
        });

        // Section titles and descriptions
        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.section-title, .section-description, .cta-content').forEach(el => {
            sectionObserver.observe(el);
        });

        // Timeline items with GSAP
        gsap.utils.toArray('.timeline-item').forEach((item, i) => {
            ScrollTrigger.create({
                trigger: item,
                start: 'top 80%',
                onEnter: () => {
                    gsap.to(item, {
                        opacity: 1,
                        y: 0,
                        duration: 0.8,
                        ease: 'back.out(1.7)',
                        delay: i * 0.1
                    });
                }
            });
        });

        // Mission items with GSAP
        gsap.utils.toArray('.mission-item').forEach((item, i) => {
            ScrollTrigger.create({
                trigger: item,
                start: 'top 80%',
                onEnter: () => {
                    gsap.to(item, {
                        opacity: 1,
                        y: 0,
                        duration: 0.8,
                        ease: 'back.out(1.7)',
                        delay: i * 0.1
                    });
                }
            });
        });

        // Value cards with GSAP
        gsap.utils.toArray('.value-card').forEach((item, i) => {
            ScrollTrigger.create({
                trigger: item,
                start: 'top 80%',
                onEnter: () => {
                    gsap.to(item, {
                        opacity: 1,
                        y: 0,
                        duration: 0.8,
                        ease: 'back.out(1.7)',
                        delay: i * 0.1
                    });
                }
            });
        });

        // Team cards with GSAP
        gsap.utils.toArray('.team-card').forEach((item, i) => {
            ScrollTrigger.create({
                trigger: item,
                start: 'top 80%',
                onEnter: () => {
                    gsap.to(item, {
                        opacity: 1,
                        y: 0,
                        duration: 0.8,
                        ease: 'back.out(1.7)',
                        delay: i * 0.1
                    });
                }
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Text animation for section titles
        gsap.utils.toArray('.text-animated').forEach((char, i) => {
            gsap.from(char, {
                opacity: 0,
                y: 20,
                duration: 0.5,
                delay: i * 0.05,
                scrollTrigger: {
                    trigger: char.parentElement,
                    start: 'top 80%'
                }
            });
        });

        // Hover card effect
        document.querySelectorAll('.hover-card').forEach(card => {
            card.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const deltaX = (x - centerX) / centerX;
                const deltaY = (y - centerY) / centerY;

                this.style.transform = `rotateX(${deltaY * 5}deg) rotateY(${deltaX * 5}deg)`;
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'rotateX(0) rotateY(0)';
            });
        });
    </script>
</body>

</html>
