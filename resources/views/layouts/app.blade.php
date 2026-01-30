<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
