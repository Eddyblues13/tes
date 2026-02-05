<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:title" content="@yield('title', 'TESLA - Invest. Trade. Drive.')" />
    <meta property="og:description" content="All-in-one platform for crypto wallet funding, automated investments, live stocks, and premium EV inventory." />
    <meta property="og:image" content="{{ asset('images/logo.png') }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ url('/') }}" />
    <meta property="twitter:title" content="@yield('title', 'TESLA - Invest. Trade. Drive.')" />
    <meta property="twitter:description" content="All-in-one platform for crypto wallet funding, automated investments, live stocks, and premium EV inventory." />
    <meta property="twitter:image" content="{{ asset('images/logo.png') }}" />

    <title>@yield('title', 'TESLA - Invest. Trade. Drive.')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @stack('styles')

    <style>
        /* Dual Popup Notifications Styles */
        .dual-popup {
            min-width: 300px;
            max-width: 360px;
            padding: 16px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            transform: translateX(-120%);
            transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            pointer-events: auto;
            position: relative;
            overflow: hidden;
        }

        .dual-popup.show {
            transform: translateX(0);
        }

        /* Black / Incoming */
        .dual-popup.popup-black {
            background: #0b0c10;
            border: 1px solid rgba(255,255,255,0.15);
            color: #fff;
        }

        /* Red / Outgoing */
        .dual-popup.popup-red {
            background: #7f1d1d; /* darker red background */
            border: 1px solid rgba(255,255,255,0.15);
            color: #fff;
        }
        
        .dual-popup-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 18px;
            flex-shrink: 0;
        }
        
        .popup-black .dual-popup-icon {
            background: rgba(255,255,255,0.1);
            color: #34d399; /* Green icon for money coming in */
        }

        .popup-red .dual-popup-icon {
            background: rgba(255,255,255,0.1);
            color: #fff; 
        }

        .dual-popup-content {
            display: flex;
            flex-direction: column;
        }

        .dual-popup-title {
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 2px;
            opacity: 0.9;
        }

        .dual-popup-desc {
            font-size: 11px;
            opacity: 0.7;
            font-weight: 500;
        }
        
        .dual-popup-time {
            position: absolute;
            top: 10px;
            right: 12px;
            font-size: 9px;
            opacity: 0.5;
            font-weight: 700;
        }

    </style>

</head>

<body>
    @include('layouts.header')

    @include('layouts.mobile-menu')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    @include('layouts.scripts')

    <!-- Dual Popup Notifications Container -->
    <div id="dual-notification-container" class="fixed bottom-4 left-4 z-50 flex flex-col gap-2 pointer-events-none">
        <!-- Notifications will be injected here -->
    </div>

    <!-- WhatsApp Live Chat Widget -->
    <a href="https://wa.me/17863989017" target="_blank" class="fixed bottom-6 right-6 z-50 hover:scale-110 transition-transform duration-300">
        <div class="bg-green-500 rounded-full p-3 shadow-lg flex items-center justify-center w-14 h-14">
            <svg fill="#ffffff" width="30px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.0117 2.0127C6.50571 2.0127 2.02344 6.47833 2.02344 11.9722C2.02344 13.916 2.58431 15.7171 3.55589 17.2612L2.09919 21.8415L6.96349 20.3704C8.42168 21.144 10.1554 21.5794 11.9961 21.5794C17.502 21.5794 21.9844 17.1137 21.9844 11.6198C21.9844 6.12596 17.502 2.0127 12.0117 2.0127ZM11.9961 19.9141C10.3768 19.9141 8.86895 19.4636 7.57551 18.6675L7.27961 18.4862L4.40263 19.3562L5.29746 16.5418L4.97495 16.2081C4.04944 15.0118 3.56064 13.5407 3.56064 11.9682C3.56064 7.42629 7.33719 3.73133 11.9961 3.73133C16.655 3.73133 20.4316 7.42629 20.4316 11.9682C20.4472 16.5101 16.655 19.9141 11.9961 19.9141ZM16.3533 14.6644C16.1259 14.5369 14.9965 14.0026 14.7828 13.9318C14.569 13.8532 14.4168 13.8178 14.2562 14.0418C14.0956 14.2737 13.6455 14.7963 13.5119 14.9575C13.3704 15.1186 13.2329 15.1383 13.001 15.0165C12.7691 14.8986 12.0227 14.6432 11.1384 13.8532C10.4507 13.2363 9.98305 12.478 9.75515 12.0772C9.52726 11.6804 9.72769 11.4722 9.84558 11.3582C9.9517 11.2521 10.0814 11.0871 10.1993 10.9417C10.3132 10.8002 10.3525 10.6941 10.4311 10.5369C10.5097 10.3797 10.4704 10.2382 10.4114 10.1164C10.3525 9.99849 9.88873 8.83515 9.69223 8.35569C9.49965 7.89588 9.30315 7.95482 9.15773 7.95482C9.01627 7.95482 8.85127 7.95089 8.68623 7.95089C8.5212 7.95089 8.254 8.01377 8.03393 8.24958C7.81385 8.4893 7.18919 9.07106 7.18919 10.254C7.18919 11.4369 8.04965 12.5802 8.17148 12.7413C8.28938 12.9025 9.85335 15.4223 12.3339 16.4206C14.8144 17.4189 14.8144 17.0888 15.2508 17.0495C15.6872 17.0102 16.656 16.4835 16.8564 15.9099C17.0569 15.3362 17.0569 14.8491 16.994 14.7391C16.9311 14.629 16.7857 14.5622 16.5539 14.4443H16.3533Z"/>
            </svg>
        </div>
    </a>

    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('dual-notification-container');
            if(!container) return;
            
            // Configuration
            const names = [
                "Alex M.", "Sarah K.", "John D.", "Emma W.", "Michael R.", 
                "Jessica T.", "David L.", "Emily B.", "Chris P.", "Amanda S.",
                "Robert N.", "Olivia G.", "Daniel H.", "Sophia M.", "James Wilson",
                "Charlotte D.", "William K.", "Isabella R.", "Liam T.", "Mia P."
            ];
            
            const countries = [
                "USA", "UK", "Canada", "Germany", "France", 
                "Australia", "Japan", "Brazil", "Spain", "Italy",
                "Netherlands", "Sweden", "Singapore", "Switzerland", "Norway"
            ];
            
            const actionsIn = [
                { type: "Deposit", text: "Verified Deposit", icon: "↓" },
                { type: "Bonus", text: "Referral Bonus", icon: "★" },
                { type: "Profit", text: "Profit Received", icon: "↗" },
                { type: "Registration", text: "New User Registered", icon: "User" }
            ];
            
            const actionsOut = [
                { type: "Withdrawal", text: "Funds Withdrawn", icon: "↑" },
                { type: "Investment", text: "Plan Purchased", icon: "⚡" },
                { type: "Transfer", text: "Transfer Sent", icon: "→" }
            ];

            function getRandom(arr) {
                return arr[Math.floor(Math.random() * arr.length)];
            }
            
            function getRandomAmount(min, max) {
                return '$' + (Math.floor(Math.random() * (max - min + 1)) + min).toLocaleString();
            }

            function createPopupHTML(user, country, action, isIncoming) {
                const bgClass = isIncoming ? 'popup-black' : 'popup-red';
                const amt = getRandomAmount(100, 5000);
                // For registration there is no amount usually, but we can keep it consistent or hide it
                // Let's add amount for financial actions
                const amountText = action.type === 'Registration' ? '' : ` • ${amt}`;
                
                return `
                    <div class="dual-popup ${bgClass}">
                        <div class="dual-popup-icon">
                            ${action.icon === 'User' ? '<svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>' : 
                              action.icon === '⚡' ? '<svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>' :
                              action.icon === '★' ? '<svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>' :
                              action.icon}
                        </div>
                        <div class="dual-popup-content">
                            <div class="dual-popup-title">${action.text}</div>
                            <div class="dual-popup-desc">
                                ${user} from ${country}${amountText}
                            </div>
                        </div>
                        <div class="dual-popup-time">Just now</div>
                    </div>
                `;
            }

            function showDualNotification() {
                // 1. Pick shared user data
                const user = getRandom(names);
                const country = getRandom(countries);
                
                // 2. Pick one incoming and one outgoing action
                const inAction = getRandom(actionsIn);
                const outAction = getRandom(actionsOut);
                
                // 3. Generate HTML
                const html1 = createPopupHTML(user, country, inAction, true); // Black
                const html2 = createPopupHTML(user, country, outAction, false); // Red
                
                // 4. Inject
                container.innerHTML = html1 + html2;
                
                // 5. Trigger animation
                requestAnimationFrame(() => {
                    const popups = container.querySelectorAll('.dual-popup');
                    popups.forEach(p => p.classList.add('show'));
                    
                    // 6. Hide after delay
                    setTimeout(() => {
                        popups.forEach(p => p.classList.remove('show'));
                        // Clean up after transition
                        setTimeout(() => {
                            container.innerHTML = '';
                        }, 600);
                    }, 6000); 
                });
            }

            // Start cycle
            setTimeout(showDualNotification, 2000); // First run
            setInterval(showDualNotification, 10000); // Repeat every 10s
        });
    </script>
</body>

</html>
