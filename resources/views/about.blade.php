<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickHands - Our Story</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.globe.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/splitting@1.0.6/dist/splitting.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/splitting@1.0.6/dist/splitting.css">
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
                        'glass': 'rgba(255, 255, 255, 0.25)',
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        display: ['Clash Display', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                        'float-slow': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'spin-slow': 'spin 15s linear infinite',
                        'bounce-slow': 'bounce 3s infinite',
                        'wiggle': 'wiggle 1s ease-in-out infinite',
                        'morph': 'morph 8s ease-in-out infinite',
                        'gradient': 'gradient 8s ease infinite',
                        'slide-in': 'slideIn 0.5s forwards',
                        'slide-out': 'slideOut 0.5s forwards',
                        'fade-in': 'fadeIn 0.5s forwards',
                        'fade-out': 'fadeOut 0.5s forwards',
                        'scale-in': 'scaleIn 0.5s forwards',
                        'scale-out': 'scaleOut 0.5s forwards',
                        'rotate-3d': 'rotate3d 15s linear infinite',
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
                        gradient: {
                            '0%': {
                                backgroundPosition: '0% 50%'
                            },
                            '50%': {
                                backgroundPosition: '100% 50%'
                            },
                            '100%': {
                                backgroundPosition: '0% 50%'
                            }
                        },
                        slideIn: {
                            '0%': {
                                transform: 'translateX(-100%)',
                                opacity: 0
                            },
                            '100%': {
                                transform: 'translateX(0)',
                                opacity: 1
                            }
                        },
                        slideOut: {
                            '0%': {
                                transform: 'translateX(0)',
                                opacity: 1
                            },
                            '100%': {
                                transform: 'translateX(100%)',
                                opacity: 0
                            }
                        },
                        fadeIn: {
                            '0%': {
                                opacity: 0
                            },
                            '100%': {
                                opacity: 1
                            }
                        },
                        fadeOut: {
                            '0%': {
                                opacity: 1
                            },
                            '100%': {
                                opacity: 0
                            }
                        },
                        scaleIn: {
                            '0%': {
                                transform: 'scale(0.8)',
                                opacity: 0
                            },
                            '100%': {
                                transform: 'scale(1)',
                                opacity: 1
                            }
                        },
                        scaleOut: {
                            '0%': {
                                transform: 'scale(1)',
                                opacity: 1
                            },
                            '100%': {
                                transform: 'scale(0.8)',
                                opacity: 0
                            }
                        },
                        rotate3d: {
                            '0%': {
                                transform: 'perspective(1000px) rotateY(0deg)'
                            },
                            '100%': {
                                transform: 'perspective(1000px) rotateY(360deg)'
                            }
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

        @keyframes pulse-ring {
            0% {
                transform: scale(0.8);
                opacity: 0.8;
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

        @keyframes bounce-subtle {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }

        @keyframes text-reveal {
            0% {
                transform: translateY(100%);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes text-wave {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
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

        @keyframes draw-circle {
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

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-float-slow {
            animation: float 6s ease-in-out infinite;
        }

        .animate-morph {
            animation: morph 8s ease-in-out infinite;
        }

        .animate-gradient {
            animation: gradient 8s ease infinite;
        }

        .animate-pulse-ring {
            animation: pulse-ring 1.5s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }

        .animate-rotate-3d {
            animation: rotate-3d 15s linear infinite;
        }

        .animate-bounce-subtle {
            animation: bounce-subtle 2s ease-in-out infinite;
        }

        .animate-shimmer {
            background: linear-gradient(90deg, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0));
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        .animate-text-reveal {
            animation: text-reveal 0.5s cubic-bezier(0.215, 0.61, 0.355, 1) forwards;
        }

        .animate-text-wave {
            animation: text-wave 2s ease-in-out infinite;
            animation-delay: calc(0.1s * var(--index));
        }

        .animate-draw-line {
            animation: draw-line 2s ease-in-out forwards;
        }

        .animate-draw-circle {
            animation: draw-circle 1.5s ease-in-out forwards;
        }

        .animate-ripple {
            animation: ripple 1.5s ease-out infinite;
        }

        .blob {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            animation: morph 8s ease-in-out infinite;
        }

        .gradient-text {
            background: linear-gradient(90deg, #FF6B6B, #4ECDC4, #FFE66D);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: gradient 8s ease infinite;
        }

        .gradient-border {
            position: relative;
            border-radius: 1rem;
        }

        .gradient-border::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4, #FFE66D, #FF6B6B);
            background-size: 400% 400%;
            z-index: -1;
            border-radius: 1.1rem;
            animation: gradient 8s ease infinite;
        }

        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
            transition: all 0.3s ease;
            transform-style: preserve-3d;
        }

        .glass-card:hover {
            transform: translateY(-5px) rotateX(5deg) rotateY(5deg);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .curved-bg {
            position: absolute;
            height: 100%;
            width: 100%;
            bottom: 0;
            z-index: -1;
        }

        .curved-bg::before {
            content: '';
            display: block;
            position: absolute;
            border-radius: 100% 50%;
            width: 55%;
            height: 100%;
            background-color: rgba(78, 205, 196, 0.2);
            right: -20%;
            top: 30%;
            z-index: -1;
        }

        .curved-bg::after {
            content: '';
            display: block;
            position: absolute;
            border-radius: 100% 50%;
            width: 55%;
            height: 100%;
            background-color: rgba(255, 107, 107, 0.2);
            left: -20%;
            top: 40%;
            z-index: -2;
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

        .timeline-item {
            position: relative;
            z-index: 10;
            display: flex;
            justify-content: center;
            margin-bottom: 3rem;
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.6s ease;
        }

        .timeline-item.active {
            opacity: 1;
            transform: translateY(0);
        }

        .timeline-content {
            position: relative;
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            max-width: 28rem;
            width: calc(50% - 30px);
            transition: all 0.3s ease;
            transform-style: preserve-3d;
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

        .timeline-item:hover .timeline-content {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            transform: translateY(-4px) rotateX(5deg);
        }

        .mission-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 1rem;
            border-radius: 0.75rem;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.8) 0%, rgba(255, 255, 255, 0.9) 100%);
            transition: all 0.3s ease;
            transform: translateY(30px);
            opacity: 0;
        }

        .mission-item.active {
            transform: translateY(0);
            opacity: 1;
        }

        .mission-item:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            background: white;
            transform: translateY(-5px);
        }

        .mission-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .mission-item:hover .mission-icon {
            transform: scale(1.1) rotate(10deg);
        }

        .team-card {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            transition: all 0.5s ease;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 1) 100%);
            transform-style: preserve-3d;
            perspective: 1000px;
        }

        .team-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1) 0%, rgba(78, 205, 196, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 0;
        }

        .team-card:hover::before {
            opacity: 1;
        }

        .team-card:hover {
            transform: translateY(-10px) rotateX(5deg);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .team-image-container {
            position: relative;
            overflow: hidden;
            height: 16rem;
        }

        .team-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.5s ease;
        }

        .team-card:hover .team-image {
            transform: scale(1.05);
        }

        .team-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, transparent 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .team-card:hover .team-overlay {
            opacity: 1;
        }

        .team-content {
            position: relative;
            padding: 1.5rem;
            z-index: 10;
            transition: all 0.3s ease;
        }

        .team-social {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
            display: flex;
            gap: 0.75rem;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }

        .team-card:hover .team-social {
            opacity: 1;
            transform: translateY(0);
        }

        .social-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            color: #6B7280;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: translateY(-3px);
        }

        .value-card {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            transition: all 0.5s ease;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            transform-style: preserve-3d;
            perspective: 1000px;
        }

        .value-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1) 0%, rgba(78, 205, 196, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .value-card:hover::before {
            opacity: 1;
        }

        .value-card:hover {
            transform: translateY(-10px) rotateX(5deg) rotateY(5deg);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .value-icon {
            width: 4rem;
            height: 4rem;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .value-card:hover .value-icon {
            transform: scale(1.1) rotate(10deg);
        }

        .value-title {
            font-family: 'Clash Display', sans-serif;
            font-weight: 600;
            font-size: 1.25rem;
            line-height: 1.75rem;
            margin-bottom: 0.75rem;
            transition: all 0.3s ease;
        }

        .value-card:hover .value-title {
            transform: translateY(-3px);
        }

        .value-description {
            color: #6B7280;
            transition: all 0.3s ease;
        }

        .value-card:hover .value-description {
            color: #4B5563;
        }

        #cursor-follower {
            position: fixed;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 107, 107, 0.5) 0%, rgba(255, 107, 107, 0) 70%);
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s, background 0.3s;
            mix-blend-mode: screen;
        }

        #cursor-dot {
            position: fixed;
            width: 8px;
            height: 8px;
            background-color: #FF6B6B;
            border-radius: 50%;
            pointer-events: none;
            z-index: 10000;
            transform: translate(-50%, -50%);
            transition: transform 0.1s;
        }

        .interactive:hover~#cursor-follower {
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, rgba(78, 205, 196, 0.4) 0%, rgba(78, 205, 196, 0) 70%);
        }

        .interactive:active~#cursor-follower {
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(255, 230, 109, 0.4) 0%, rgba(255, 230, 109, 0) 70%);
        }

        @media (max-width: 768px) {

            #cursor-follower,
            #cursor-dot {
                display: none;
            }
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

        .floating-shape {
            position: absolute;
            opacity: 0.5;
            pointer-events: none;
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

        .shape-4 {
            top: 30%;
            left: 90%;
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
            border-radius: 40% 60% 60% 40% / 40% 40% 60% 60%;
            animation: float 9s ease-in-out infinite alternate, morph 15s ease-in-out infinite;
        }

        .shape-5 {
            top: 70%;
            left: 40%;
            width: 90px;
            height: 90px;
            background: linear-gradient(45deg, #4ECDC4, #FFE66D);
            border-radius: 60% 40% 40% 60% / 60% 60% 40% 40%;
            animation: float 10s ease-in-out infinite reverse, morph 20s ease-in-out infinite alternate;
        }

        .vanta-canvas {
            position: fixed !important;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
        }

        .text-reveal-container {
            overflow: hidden;
        }

        .text-reveal {
            display: inline-block;
            transform: translateY(100%);
            opacity: 0;
        }

        .text-wave-container {
            display: inline-flex;
            overflow: hidden;
        }

        .text-wave {
            display: inline-block;
            transform: translateY(0);
            opacity: 0;
        }

        .text-wave.active {
            opacity: 1;
            animation: text-wave 2s ease-in-out infinite;
            animation-delay: calc(0.1s * var(--index));
        }

        .svg-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .svg-path {
            fill: none;
            stroke: rgba(255, 107, 107, 0.2);
            stroke-width: 2;
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
        }

        .svg-circle {
            fill: none;
            stroke: rgba(78, 205, 196, 0.2);
            stroke-width: 2;
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
        }

        .ripple-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .ripple {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 107, 107, 0.2) 0%, rgba(255, 107, 107, 0) 70%);
            transform: scale(0);
            animation: ripple 1.5s ease-out infinite;
        }

        .parallax-container {
            position: relative;
            overflow: hidden;
            transform-style: preserve-3d;
        }

        .parallax-layer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            will-change: transform;
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
            transition: all 0.3s ease;
            z-index: 999;
        }

        .scroll-to-top.active {
            opacity: 1;
            transform: translateY(0);
        }

        .scroll-to-top:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .char {
            display: inline-block;
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.3s ease;
        }

        .char.active {
            opacity: 1;
            transform: translateY(0);
        }

        .word {
            display: inline-block;
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.3s ease;
        }

        .word.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&display=swap" rel="stylesheet">
</head>

<body class="font-sans text-dark overflow-x-hidden bg-gradient-to-br from-light via-white to-light min-h-screen">
    <!-- Scroll Progress Bar -->
    <div class="scroll-progress" id="scroll-progress"></div>

    <!-- Scroll to Top Button -->
    <div class="scroll-to-top" id="scroll-to-top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Vanta.js Background -->
    <div id="vanta-bg"></div>

    <!-- Floating Shapes -->
    <div class="floating-shapes">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
        <div class="floating-shape shape-4"></div>
        <div class="floating-shape shape-5"></div>
    </div>

    <!-- Cursor Elements -->
    <div id="cursor-follower"></div>
    <div id="cursor-dot"></div>

    <!-- Header -->
    <header class="fixed w-full z-50 transition-all duration-500" id="navbar">
        <div class="container mx-auto px-4 py-4">
            <div class="glass rounded-2xl shadow-lg px-6 py-4 flex justify-between items-center">
                <div class="flex items-center">
                    <a href="#" class="font-display font-bold text-2xl interactive">
                        <span class="text-primary">Quick</span><span class="text-secondary">Hands</span>
                        <div
                            class="absolute -bottom-1 left-0 w-full h-0.5 bg-gradient-to-r from-primary to-secondary scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left">
                        </div>
                    </a>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-dark font-medium relative group interactive">
                        Home
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary to-primary/50 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/about" class="text-primary font-medium relative group interactive">
                        About
                        <span
                            class="absolute -bottom-1 left-0 w-full h-0.5 bg-gradient-to-r from-primary to-secondary"></span>
                    </a>
                    <a href="/contact" class="text-dark font-medium relative group interactive">
                        Contact
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary to-primary/50 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/join" class="text-dark font-medium relative group interactive">
                        Join Us
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary to-primary/50 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </nav>
                <div class="flex items-center space-x-4">
                    <a href="#"
                        class="hidden md:block text-dark hover:text-primary transition-colors interactive">Login</a>
                    <a href="#" class="hidden md:block btn-primary interactive">Sign Up</a>
                    <button class="md:hidden text-dark hover:text-primary transition-colors interactive"
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
                    <a href="/" class="block text-dark hover:text-primary transition-colors">Home</a>
                    <a href="/about" class="block text-primary font-medium">About</a>
                    <a href="/contact" class="block text-dark hover:text-primary transition-colors">Contact</a>
                    <a href="/join" class="block text-dark hover:text-primary transition-colors">Join Us</a>
                    <div class="flex space-x-4 pt-4 border-t border-white/20">
                        <a href="#" class="block text-dark hover:text-primary transition-colors">Login</a>
                        <a href="#" class="block btn-primary">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center pt-24 overflow-hidden" id="hero">
        <div class="svg-container">
            <svg width="100%" height="100%" viewBox="0 0 1000 1000" preserveAspectRatio="none">
                <path class="svg-path" d="M0,500 C200,300 800,700 1000,500" />
                <circle class="svg-circle" cx="500" cy="500" r="200" />
            </svg>
        </div>

        <div class="ripple-container" id="ripple-container"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0" data-aos="fade-right">
                    <div
                        class="inline-block px-4 py-1 bg-primary/10 text-primary rounded-full text-sm font-semibold mb-6 backdrop-blur-sm">
                        OUR JOURNEY
                    </div>
                    <div class="text-reveal-container">
                        <h1 class="font-display text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                            Our <span class="gradient-text" id="story-text">Story</span>
                        </h1>
                    </div>
                    <p class="text-gray-600 mb-8 text-lg max-w-md" id="hero-description">
                        QuickHands was founded with a simple mission: to make everyday services more
                        accessible, reliable, and affordable for everyone.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <button class="btn-primary group flex items-center justify-center interactive">
                            Learn More
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-1"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="btn-secondary interactive">Our Team</button>
                    </div>
                </div>
                <div class="md:w-1/2 md:pl-10" data-aos="fade-left" data-aos-delay="200">
                    <div class="relative">
                        <!-- Blob Background -->
                        <div class="absolute -top-10 -right-10 w-72 h-72 bg-accent/30 blob -z-10"></div>

                        <div class="glass-card p-6 relative transform hover:rotate-1 transition-all duration-500">
                            <div
                                class="absolute -top-4 -right-4 bg-accent text-dark text-xs font-bold px-3 py-1 rounded-full shadow-lg">
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
                                        <div class="relative inline-block w-12 align-middle">
                                            <div
                                                class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center animate-pulse-slow">
                                                <i class="fas fa-handshake text-primary"></i>
                                            </div>
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
            <a href="#journey" class="text-primary hover:text-secondary transition-colors duration-300 interactive">
                <div class="w-8 h-14 border-2 border-primary rounded-full flex justify-center pt-2">
                    <div class="w-1 h-2 bg-primary rounded-full animate-bounce-slow"></div>
                </div>
                <span class="block text-center mt-2 text-sm">Scroll Down</span>
            </a>
        </div>
    </section>

    <!-- Our Journey Timeline Section -->
    <section id="journey" class="py-16 md:py-32 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-secondary/10 rounded-bl-full -z-10"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-1/4 bg-primary/10 rounded-tr-full -z-10"></div>

        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-display text-4xl md:text-5xl font-bold mb-6" id="journey-title">Our Journey</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg" id="journey-description">
                    From a small startup to a thriving platform, here's how we've grown over the years.
                </p>
            </div>

            <div class="timeline" id="timeline">
                <!-- Timeline Item 1 -->
                <div class="timeline-item" data-year="2018">
                    <div class="timeline-content">
                        <div
                            class="bg-primary/10 text-primary text-sm font-semibold px-3 py-1 rounded-full inline-block mb-2">
                            2018
                        </div>
                        <h3 class="font-display text-xl font-semibold mb-2">The Beginning</h3>
                        <p class="text-gray-600">
                            QuickHands was founded with a vision to connect skilled professionals with people who need
                            their services.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 2 -->
                <div class="timeline-item" data-year="2019">
                    <div class="timeline-content">
                        <div
                            class="bg-secondary/10 text-secondary text-sm font-semibold px-3 py-1 rounded-full inline-block mb-2">
                            2019
                        </div>
                        <h3 class="font-display text-xl font-semibold mb-2">First 1,000 Users</h3>
                        <p class="text-gray-600">
                            We celebrated our first milestone of 1,000 active users and expanded our service offerings.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 3 -->
                <div class="timeline-item" data-year="2020">
                    <div class="timeline-content">
                        <div
                            class="bg-primary/10 text-primary text-sm font-semibold px-3 py-1 rounded-full inline-block mb-2">
                            2020
                        </div>
                        <h3 class="font-display text-xl font-semibold mb-2">Nationwide Expansion</h3>
                        <p class="text-gray-600">
                            Despite global challenges, we expanded our services nationwide and introduced new features.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 4 -->
                <div class="timeline-item" data-year="2022">
                    <div class="timeline-content">
                        <div
                            class="bg-secondary/10 text-secondary text-sm font-semibold px-3 py-1 rounded-full inline-block mb-2">
                            2022
                        </div>
                        <h3 class="font-display text-xl font-semibold mb-2">Platform Redesign</h3>
                        <p class="text-gray-600">
                            We completely redesigned our platform for a better user experience and introduced our mobile
                            app.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 5 -->
                <div class="timeline-item" data-year="2023">
                    <div class="timeline-content">
                        <div
                            class="bg-primary/10 text-primary text-sm font-semibold px-3 py-1 rounded-full inline-block mb-2">
                            2023
                        </div>
                        <h3 class="font-display text-xl font-semibold mb-2">100,000 Service Providers</h3>
                        <p class="text-gray-600">
                            We reached the milestone of 100,000 verified service providers on our platform.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 6 -->
                <div class="timeline-item" data-year="Today">
                    <div class="timeline-content">
                        <div
                            class="bg-secondary/10 text-secondary text-sm font-semibold px-3 py-1 rounded-full inline-block mb-2">
                            Today
                        </div>
                        <h3 class="font-display text-xl font-semibold mb-2">Looking to the Future</h3>
                        <p class="text-gray-600">
                            We continue to innovate and expand, with exciting new features and services on the horizon.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Mission Section -->
    <section id="our-mission" class="py-16 md:py-32 relative overflow-hidden bg-white">
        <!-- Background Elements -->
        <div class="absolute top-1/4 right-1/4 w-64 h-64 bg-primary/10 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-1/4 left-1/4 w-80 h-80 bg-secondary/10 rounded-full blur-3xl -z-10"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <div class="relative">
                        <!-- Blob Background -->
                        <div class="absolute -top-10 -left-10 w-40 h-40 bg-primary/20 blob -z-10"></div>

                        <h2 class="font-display text-4xl md:text-5xl font-bold mb-6" id="mission-title">Our Mission
                        </h2>
                        <p class="text-gray-600 text-lg mb-8" id="mission-description">
                            At QuickHands, we believe that everyone should have access to quality service
                            at affordable prices. That's why we prioritize fair pricing, skilled professionals,
                            and reliable service every time, ensuring value for the hard-earned money of our customers.
                        </p>

                        <div class="space-y-4">
                            <h3 class="font-display text-xl font-semibold mb-2">We're committed to:</h3>

                            <!-- Mission Item 1 -->
                            <div class="mission-item" data-index="1">
                                <div class="mission-icon bg-primary/10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium mb-1">Quality Assurance</h4>
                                    <p class="text-gray-600">Offering quality through rigorous provider verification
                                        and continuous monitoring.</p>
                                </div>
                            </div>

                            <!-- Mission Item 2 -->
                            <div class="mission-item" data-index="2">
                                <div class="mission-icon bg-secondary/10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium mb-1">Efficient Matching</h4>
                                    <p class="text-gray-600">Setting the bar for service through efficient matching of
                                        clients and providers.</p>
                                </div>
                            </div>

                            <!-- Mission Item 3 -->
                            <div class="mission-item" data-index="3">
                                <div class="mission-icon bg-accent/10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-accent"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium mb-1">Community Building</h4>
                                    <p class="text-gray-600">Building a community of like-minded professionals who
                                        share our values.</p>
                                </div>
                            </div>

                            <!-- Mission Item 4 -->
                            <div class="mission-item" data-index="4">
                                <div class="mission-icon bg-primary/10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium mb-1">Growth Opportunities</h4>
                                    <p class="text-gray-600">Creating opportunities for growth and development for all
                                        our service providers.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-left" class="parallax-container" id="mission-image">
                    <div class="relative">
                        <!-- Blob Background -->
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-secondary/20 blob -z-10 parallax-layer"
                            data-speed="0.2"></div>

                        <div class="rounded-2xl overflow-hidden shadow-xl">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1771&q=80"
                                alt="Team working together" class="w-full h-auto object-cover parallax-layer"
                                data-speed="-0.1">
                        </div>

                        <!-- Floating Elements -->
                        <div class="absolute -bottom-5 -left-5 w-20 h-20 bg-primary/20 rounded-full animate-pulse-slow parallax-layer"
                            data-speed="0.3"></div>
                        <div class="absolute top-1/3 -right-5 w-16 h-16 bg-secondary/20 rounded-full animate-float parallax-layer"
                            data-speed="0.15"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="py-16 md:py-32 bg-gradient-to-br from-primary/5 to-secondary/5 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-display text-4xl md:text-5xl font-bold mb-6" id="values-title">Our Values</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg" id="values-description">
                    These core principles guide everything we do at QuickHands.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Value 1 -->
                <div class="value-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="value-icon bg-primary/10">
                        <i class="fas fa-handshake text-primary text-2xl"></i>
                    </div>
                    <h3 class="value-title">Trust</h3>
                    <p class="value-description">We build trust through transparency, reliability, and consistent
                        quality service.</p>

                    <!-- Decorative Element -->
                    <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-primary/10 rounded-full"></div>
                </div>

                <!-- Value 2 -->
                <div class="value-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="value-icon bg-secondary/10">
                        <i class="fas fa-users text-secondary text-2xl"></i>
                    </div>
                    <h3 class="value-title">Community</h3>
                    <p class="value-description">We foster a supportive community of service providers and clients who
                        help each other succeed.</p>

                    <!-- Decorative Element -->
                    <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-secondary/10 rounded-full"></div>
                </div>

                <!-- Value 3 -->
                <div class="value-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="value-icon bg-accent/10">
                        <i class="fas fa-star text-accent text-2xl"></i>
                    </div>
                    <h3 class="value-title">Excellence</h3>
                    <p class="value-description">We strive for excellence in every interaction, service, and feature we
                        provide.</p>

                    <!-- Decorative Element -->
                    <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-accent/10 rounded-full"></div>
                </div>

                <!-- Value 4 -->
                <div class="value-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="value-icon bg-primary/10">
                        <i class="fas fa-lightbulb text-primary text-2xl"></i>
                    </div>
                    <h3 class="value-title">Innovation</h3>
                    <p class="value-description">We continuously innovate to improve our platform and create better
                        experiences for everyone.</p>

                    <!-- Decorative Element -->
                    <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-primary/10 rounded-full"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Meet Our Team Section -->
    <section id="team" class="py-16 md:py-32 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-secondary/10 rounded-bl-full -z-10"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-1/4 bg-primary/10 rounded-tr-full -z-10"></div>

        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-display text-4xl md:text-5xl font-bold mb-6" id="team-title">Meet Our Team</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg" id="team-description">
                    The passionate people behind QuickHands. We're working to revolutionize the way you access services.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div class="team-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-image-container">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80"
                            alt="Sara Cooper" class="team-image">
                        <div class="team-overlay"></div>
                    </div>
                    <div class="team-content">
                        <h3 class="font-display font-bold text-xl mb-1">Sara Cooper</h3>
                        <p class="text-primary text-sm mb-4">CEO & Founder</p>
                        <p class="text-gray-600 text-sm">
                            With over 10 years of experience in the service industry, Sara founded QuickHands to bridge
                            the gap between skilled professionals and clients.
                        </p>

                        <!-- Social Links -->
                        <div class="team-social">
                            <a href="#" class="social-icon hover:bg-blue-100 hover:text-blue-600 interactive">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social-icon hover:bg-blue-100 hover:text-blue-400 interactive">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon hover:bg-red-100 hover:text-red-500 interactive">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="team-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-image-container">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80"
                            alt="John Smith" class="team-image">
                        <div class="team-overlay"></div>
                    </div>
                    <div class="team-content">
                        <h3 class="font-display font-bold text-xl mb-1">John Smith</h3>
                        <p class="text-secondary text-sm mb-4">CTO</p>
                        <p class="text-gray-600 text-sm">
                            John brings his technical expertise to create a seamless platform experience, ensuring our
                            service providers and clients connect effortlessly.
                        </p>

                        <!-- Social Links -->
                        <div class="team-social">
                            <a href="#" class="social-icon hover:bg-blue-100 hover:text-blue-600 interactive">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social-icon hover:bg-blue-100 hover:text-blue-400 interactive">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon hover:bg-red-100 hover:text-red-500 interactive">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="team-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-image-container">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1776&q=80"
                            alt="Maria Rodriguez" class="team-image">
                        <div class="team-overlay"></div>
                    </div>
                    <div class="team-content">
                        <h3 class="font-display font-bold text-xl mb-1">Maria Rodriguez</h3>
                        <p class="text-accent text-sm mb-4">Head of Operations</p>
                        <p class="text-gray-600 text-sm">
                            Maria oversees all operational aspects of QuickHands, ensuring quality service delivery and
                            maintaining our high standards.
                        </p>

                        <!-- Social Links -->
                        <div class="team-social">
                            <a href="#" class="social-icon hover:bg-blue-100 hover:text-blue-600 interactive">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social-icon hover:bg-blue-100 hover:text-blue-400 interactive">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon hover:bg-red-100 hover:text-red-500 interactive">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="team-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-image-container">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80"
                            alt="David Chen" class="team-image">
                        <div class="team-overlay"></div>
                    </div>
                    <div class="team-content">
                        <h3 class="font-display font-bold text-xl mb-1">David Chen</h3>
                        <p class="text-primary text-sm mb-4">Head of Marketing</p>
                        <p class="text-gray-600 text-sm">
                            David leads our marketing team, spreading the word about QuickHands and helping connect more
                            service providers with clients.
                        </p>

                        <!-- Social Links -->
                        <div class="team-social">
                            <a href="#" class="social-icon hover:bg-blue-100 hover:text-blue-600 interactive">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social-icon hover:bg-blue-100 hover:text-blue-400 interactive">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon hover:bg-red-100 hover:text-red-500 interactive">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 md:py-32 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary to-secondary opacity-90"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                <h2 class="font-display text-4xl md:text-5xl font-bold mb-6 text-white" id="cta-title">Join QuickHands
                    Today</h2>
                <p class="text-white/80 text-lg mb-8" id="cta-description">
                    Whether you're looking for services or offering your skills, become part of our growing community!
                </p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#"
                        class="bg-white text-primary px-6 py-3 rounded-xl font-medium hover:bg-white/90 transition duration-300 shadow-lg hover:-translate-y-1 transform interactive">
                        Get Started
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="#"
                        class="bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-xl font-medium transition duration-300 hover:-translate-y-1 transform interactive">
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
                    <h3 class="font-display text-2xl font-bold mb-6">Quick<span class="text-primary">Hands</span></h3>
                    <p class="text-gray-400 mb-6">Connecting you with skilled professionals for all your service needs.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors interactive">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors interactive">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors interactive">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors interactive">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>Home
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>About Us
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>Services
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2"></span>Contact
                            </a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Services</h4>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                                <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Home Cleaning
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                                <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Handyman
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                                <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Moving Help
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center interactive">
                                <span class="w-1.5 h-1.5 bg-secondary rounded-full mr-2"></span>Lawn Care
                            </a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Subscribe to Our Newsletter</h4>
                    <p class="text-gray-400 mb-4">Stay updated with our latest services and offers.</p>
                    <div class="flex mb-4">
                        <input type="email" placeholder="Your email"
                            class="px-4 py-3 w-full rounded-l-lg focus:outline-none text-gray-800 interactive">
                        <button
                            class="bg-primary px-4 py-3 rounded-r-lg hover:bg-opacity-90 transition-colors interactive">
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
                    <a href="#"
                        class="text-gray-400 hover:text-white transition-colors text-sm interactive">Privacy Policy</a>
                    <a href="#"
                        class="text-gray-400 hover:text-white transition-colors text-sm interactive">Terms of
                        Service</a>
                    <a href="#"
                        class="text-gray-400 hover:text-white transition-colors text-sm interactive">FAQ</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // Initialize Vanta.js background
        VANTA.GLOBE({
            el: "#vanta-bg",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            color: 0xFF6B6B,
            color2: 0x4ECDC4,
            backgroundColor: 0xF7FFF7,
            size: 1.00,
            speed: 0.30
        });

        // Initialize Splitting.js
        Splitting();

        // Initialize GSAP and ScrollTrigger
        gsap.registerPlugin(ScrollTrigger);

        // Initialize AOS animations
        AOS.init({
            duration: 800,
            once: true
        });

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

        // Custom cursor
        const cursorFollower = document.getElementById('cursor-follower');
        const cursorDot = document.getElementById('cursor-dot');

        if (window.innerWidth > 768) {
            document.addEventListener('mousemove', function(e) {
                cursorFollower.style.left = e.clientX + 'px';
                cursorFollower.style.top = e.clientY + 'px';

                cursorDot.style.left = e.clientX + 'px';
                cursorDot.style.top = e.clientY + 'px';
            });

            // Add special effects on hover for interactive elements
            const interactiveElements = document.querySelectorAll('.interactive');

            interactiveElements.forEach(element => {
                element.addEventListener('mouseenter', function() {
                    cursorFollower.style.width = '80px';
                    cursorFollower.style.height = '80px';
                    cursorDot.style.transform = 'translate(-50%, -50%) scale(1.5)';
                });

                element.addEventListener('mouseleave', function() {
                    cursorFollower.style.width = '40px';
                    cursorFollower.style.height = '40px';
                    cursorDot.style.transform = 'translate(-50%, -50%) scale(1)';
                });

                element.addEventListener('mousedown', function() {
                    cursorFollower.style.width = '70px';
                    cursorFollower.style.height = '70px';
                    cursorDot.style.transform = 'translate(-50%, -50%) scale(0.5)';
                });

                element.addEventListener('mouseup', function() {
                    cursorFollower.style.width = '80px';
                    cursorFollower.style.height = '80px';
                    cursorDot.style.transform = 'translate(-50%, -50%) scale(1.5)';
                });
            });
        }

        // Create particles on click
        document.addEventListener('click', function(e) {
            if (window.innerWidth > 768) {
                createParticles(e.clientX, e.clientY);
            }
        });

        function createParticles(x, y) {
            const particleCount = 8;

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

        // Create ripple effect
        function createRipple() {
            const rippleContainer = document.getElementById('ripple-container');
            const ripple = document.createElement('div');
            ripple.className = 'ripple';

            // Random position
            const x = Math.random() * window.innerWidth;
            const y = Math.random() * (window.innerHeight / 2) + 100;

            // Random size
            const size = Math.random() * 100 + 50;

            ripple.style.width = `${size}px`;
            ripple.style.height = `${size}px`;
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;

            rippleContainer.appendChild(ripple);

            // Remove after animation completes
            setTimeout(() => {
                ripple.remove();
            }, 1500);
        }

        // Create ripples periodically
        setInterval(createRipple, 2000);

        // Animate SVG paths
        setTimeout(() => {
            document.querySelectorAll('.svg-path').forEach(path => {
                path.classList.add('animate-draw-line');
            });

            document.querySelectorAll('.svg-circle').forEach(circle => {
                circle.classList.add('animate-draw-circle');
            });
        }, 500);

        // Text reveal animation for hero section
        gsap.from("#story-text", {
            opacity: 0,
            y: 50,
            duration: 1,
            delay: 0.5
        });

        gsap.from("#hero-description", {
            opacity: 0,
            y: 30,
            duration: 1,
            delay: 0.8
        });

        // Timeline animations
        const timelineItems = document.querySelectorAll('.timeline-item');

        function checkTimelineItems() {
            timelineItems.forEach(item => {
                const itemTop = item.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (itemTop < windowHeight * 0.8) {
                    item.classList.add('active');
                }
            });
        }

        // Mission items animations
        const missionItems = document.querySelectorAll('.mission-item');

        function checkMissionItems() {
            missionItems.forEach(item => {
                const itemTop = item.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (itemTop < windowHeight * 0.8) {
                    item.classList.add('active');

                    // Add staggered delay based on data-index
                    const index = item.getAttribute('data-index');
                    item.style.transitionDelay = `${index * 0.2}s`;
                }
            });
        }

        // Parallax effect for mission image
        const parallaxLayers = document.querySelectorAll('.parallax-layer');

        function updateParallax() {
            parallaxLayers.forEach(layer => {
                const speed = layer.getAttribute('data-speed');
                const yPos = -(window.scrollY * speed);
                layer.style.transform = `translateY(${yPos}px)`;
            });
        }

        // Section title animations with Splitting.js
        gsap.utils.toArray(['#journey-title', '#mission-title', '#values-title', '#team-title', '#cta-title']).forEach(
            title => {
                gsap.from(title, {
                    opacity: 0,
                    y: 50,
                    duration: 1,
                    scrollTrigger: {
                        trigger: title,
                        start: "top 80%",
                        toggleActions: "play none none none"
                    }
                });
            });

        // Section description animations
        gsap.utils.toArray(['#journey-description', '#mission-description', '#values-description', '#team-description',
            '#cta-description'
        ]).forEach(desc => {
            gsap.from(desc, {
                opacity: 0,
                y: 30,
                duration: 1,
                delay: 0.3,
                scrollTrigger: {
                    trigger: desc,
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });
        });

        // Value cards animations
        gsap.utils.toArray('.value-card').forEach((card, index) => {
            gsap.from(card, {
                opacity: 0,
                y: 50,
                duration: 0.8,
                delay: index * 0.2,
                scrollTrigger: {
                    trigger: card,
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });
        });

        // Team cards animations
        gsap.utils.toArray('.team-card').forEach((card, index) => {
            gsap.from(card, {
                opacity: 0,
                y: 50,
                duration: 0.8,
                delay: index * 0.2,
                scrollTrigger: {
                    trigger: card,
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });
        });

        // Run all check functions on scroll
        window.addEventListener('scroll', function() {
            checkTimelineItems();
            checkMissionItems();
            updateParallax();
        });

        // Run once on page load
        window.addEventListener('load', function() {
            checkTimelineItems();
            checkMissionItems();
            updateParallax();
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function(e) {
                            e.preventDefault();
                            const target = document.function(e) {
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

                // Text wave animation for gradient text
                const storyText = document.getElementById('story-text');
                const storyTextContent = storyText.textContent; storyText.innerHTML = '';

                for (let i = 0; i < storyTextContent.length; i++) {
                    const span = document.createElement('span');
                    span.className = 'text-wave';
                    span.style.setProperty('--index', i);
                    span.textContent = storyTextContent[i];
                    storyText.appendChild(span);
                }

                setTimeout(() => {
                    document.querySelectorAll('.text-wave').forEach(char => {
                        char.classList.add('active');
                    });
                }, 500);
    </script>
</body>

</html>
