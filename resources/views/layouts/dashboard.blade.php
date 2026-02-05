<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <title>@yield('title', 'TESLA Dashboard')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap");

        :root {
            --bg: #0b0c10;
            --panel: #0f1116;
            --panel2: #141722;
            --card: #0e1016;
            --border: rgba(255, 255, 255, .10);
            --muted: rgba(255, 255, 255, .55);
            --muted2: rgba(255, 255, 255, .40);
            --text: #ffffff;
            --white: #ffffff;
            --sidebar: #07080b;
            --sidebar2: #0a0b10;
            --accent: #ffffff;
            --green: #34d399;
            --red: #fb7185;
            --blue: #60a5fa;
            --amber: #f59e0b;
            --violet: #a78bfa;
            --cyan: #22d3ee;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            background: linear-gradient(180deg, #07080b, #0b0c10 30%, #0b0c10);
            color: var(--text);
            overflow-x: hidden;
        }

        /* layout */
        .app {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 260px 1fr;
        }

        @media (max-width: 1024px) {
            .app {
                grid-template-columns: 1fr;
            }
        }

        /* sidebar */
        .sidebar {
            background: radial-gradient(800px 500px at 50% 0%, rgba(255, 255, 255, .06), transparent 60%),
                linear-gradient(180deg, var(--sidebar), var(--sidebar2));
            border-right: 1px solid rgba(255, 255, 255, .08);
            position: sticky;
            top: 0;
            height: 100vh;
            overflow: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, .15) transparent;
            display: flex;
            flex-direction: column;
        }

        .sidebar::-webkit-scrollbar {
            width: 8px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, .12);
            border-radius: 10px;
        }

        .wordmark {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 18px 18px 10px;
            user-select: none;
        }

        .wordmark img {
            height: 60px;
            width: auto;
            object-fit: contain;
        }

        .wordmark span {
            font-weight: 900;
            letter-spacing: .28em;
            font-size: 18px;
            color: #fff;
            opacity: .95;
        }

        .userBox {
            margin: 10px 14px 14px;
            padding: 12px;
            border-radius: 14px;
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .08);
            display: flex;
            gap: 10px;
            align-items: flex-start;
        }

        .avatar {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(255, 255, 255, .10);
            display: grid;
            place-items: center;
            flex: 0 0 auto;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            font-weight: 800;
            padding: 5px 8px;
            border-radius: 999px;
            background: rgba(52, 211, 153, .10);
            border: 1px solid rgba(52, 211, 153, .25);
            color: rgba(52, 211, 153, .95);
            margin-top: 8px;
            width: max-content;
        }

        .nav {
            padding: 6px 10px 14px;
        }

        .nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 12px;
            border-radius: 10px;
            color: rgba(255, 255, 255, .62);
            font-weight: 700;
            font-size: 13px;
            text-decoration: none;
            transition: all .15s ease;
        }

        .nav a:hover {
            background: rgba(255, 255, 255, .05);
            color: rgba(255, 255, 255, .82);
        }

        .nav a.active {
            background: #fff;
            color: #0f1116;
        }

        .nav a.active svg {
            color: #0f1116;
            opacity: 1;
        }

        .nav svg {
            width: 16px;
            height: 16px;
            opacity: .85;
        }

        .navSection {
            margin-top: 8px;
            padding-top: 10px;
            border-top: 1px solid rgba(255, 255, 255, .07);
        }

        .logout {
            margin-top: auto;
            padding: 14px 12px;
            border-top: 1px solid rgba(255, 255, 255, .07);
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: rgba(255, 255, 255, .55);
            font-size: 12px;
            font-weight: 800;
        }

        .logoutBtn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 12px;
            border-radius: 12px;
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .08);
            color: rgba(255, 255, 255, .75);
            cursor: pointer;
            transition: all .15s ease;
        }

        .logoutBtn:hover {
            background: rgba(255, 255, 255, .06);
        }

        /* content */
        .content {
            min-height: 100vh;
            background: #f8f8f8;
            overflow-x: hidden;
            max-width: 100%;
        }

        .topbar {
            height: 58px;
            background: #fff;
            color: #0f1116;
            border-bottom: 1px solid rgba(0, 0, 0, .08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 18px;
            position: sticky;
            top: 0;
            z-index: 30;
        }

        @media (max-width: 768px) {
            .topbar {
                padding: 0 12px;
                height: 54px;
            }
            
            .topTitle {
                font-size: 13px;
            }
        }

        .topLeft {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
        }

        .hamb {
            display: none;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            border: 1px solid rgba(0, 0, 0, .10);
            background: #fff;
            cursor: pointer;
            align-items: center;
            justify-content: center;
        }

        .topTitle {
            font-weight: 900;
            font-size: 14px;
            color: #111827;
            letter-spacing: -0.01em;
        }

        .topRight {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .bellWrapper,
        .profileWrapper {
            position: relative;
        }

        .bell {
            width: 34px;
            height: 34px;
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, .10);
            display: grid;
            place-items: center;
            position: relative;
            cursor: pointer;
        }

        .bellBadge {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #ef4444;
            border: 2px solid #fff;
            display: grid;
            place-items: center;
            font-size: 8px;
            font-weight: 900;
            color: #fff;
        }

        .bellBadge.hidden {
            display: none;
        }

        .notificationDropdown {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            width: 360px;
            max-height: 480px;
            background: #fff;
            border: 1px solid rgba(0,0,0,.10);
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,.15);
            z-index: 100;
            display: none;
            overflow: hidden;
        }

        .notificationDropdown.show {
            display: block;
        }

        .notificationHeader {
            padding: 16px;
            border-bottom: 1px solid rgba(0,0,0,.06);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notificationHeader h5 {
            margin: 0;
            font-size: 13px;
            font-weight: 900;
            color: #111827;
        }

        .notificationHeader button {
            background: none;
            border: none;
            font-size: 11px;
            font-weight: 900;
            color: #2563eb;
            cursor: pointer;
            padding: 0;
        }

        .notificationList {
            max-height: 400px;
            overflow-y: auto;
        }

        .notificationItem {
            padding: 12px 16px;
            border-bottom: 1px solid rgba(0,0,0,.06);
            cursor: pointer;
            transition: background 0.15s;
        }

        .notificationItem:hover {
            background: #f9fafb;
        }

        .notificationItem.unread {
            background: #eff6ff;
        }

        .notificationItem.unread:hover {
            background: #dbeafe;
        }

        .notificationTitle {
            font-size: 12px;
            font-weight: 900;
            color: #111827;
            margin-bottom: 4px;
        }

        .notificationMessage {
            font-size: 11px;
            color: #6b7280;
            line-height: 1.4;
            margin-bottom: 4px;
        }

        .notificationTime {
            font-size: 10px;
            color: #9ca3af;
        }

        .notificationEmpty {
            padding: 40px 20px;
            text-align: center;
            color: #9ca3af;
            font-size: 12px;
        }

        .profileIcon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #e5e7eb;
            border: 1px solid rgba(0, 0, 0, .10);
            display: grid;
            place-items: center;
            cursor: pointer;
        }

        .profileDropdown {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            width: 200px;
            background: #fff;
            border: 1px solid rgba(0,0,0,.10);
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,.15);
            z-index: 100;
            display: none;
            overflow: hidden;
            padding: 8px 0;
        }

        .profileDropdown.show {
            display: block;
        }

        .profileDropdown a,
        .profileDropdown form {
            display: block;
        }

        .profileDropdown a,
        .profileDropdown button {
            width: 100%;
            padding: 12px 16px;
            text-align: left;
            font-size: 13px;
            font-weight: 700;
            color: #111827;
            background: none;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.15s;
        }

        .profileDropdown a:hover,
        .profileDropdown button:hover {
            background: #f9fafb;
        }

        .profileDropdown .profileDropdownDivider {
            height: 1px;
            background: rgba(0,0,0,.06);
            margin: 4px 0;
        }

        @media (max-width:1024px) {
            .sidebar {
                position: fixed;
                left: 0;
                top: 0;
                bottom: 0;
                width: 260px;
                transform: translateX(-105%);
                transition: transform .2s ease;
                z-index: 60;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .hamb {
                display: flex;
            }

            .overlay {
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, .55);
                z-index: 55;
                display: none;
            }

            .overlay.show {
                display: block;
            }
        }

        /* inner layout */
        .wrap {
            padding: 18px 18px 30px;
            max-width: 100%;
            overflow-x: hidden;
            box-sizing: border-box;
        }

        @media (max-width: 768px) {
            .wrap {
                padding: 16px 16px 24px;
            }

            /* Increase base font sizes for better readability */
            body {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .wrap {
                padding: 14px 14px 20px;
            }
        }

        .surface {
            border-radius: 18px;
            background: transparent;
            border: none;
            overflow: visible;
        }

        .heroCard {
            min-height: 120px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
            border-radius: 18px;
        }

        @media (max-width: 768px) {
            .heroCard {
                flex-direction: column;
                align-items: flex-start;
                padding: 16px;
                gap: 16px;
            }
        }

        .heroText h3 {
            margin: 0;
            font-size: 22px;
            font-weight: 900;
            color: #ffffff;
            letter-spacing: -0.01em;
        }

        .heroText p {
            margin: 8px 0 0;
            font-size: 15px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.85);
            line-height: 1.5;
            max-width: 420px;
        }

        @media (max-width: 768px) {
            .heroText h3 {
                font-size: 20px;
            }
            
            .heroText p {
                font-size: 14px;
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .heroText h3 {
                font-size: 18px;
            }
            
            .heroText p {
                font-size: 13px;
            }
        }

        .balanceBox {
            min-width: 260px;
            padding: 16px;
            border-radius: 16px;
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 768px) {
            .balanceBox {
                min-width: 100%;
                width: 100%;
            }
        }

        .balanceTop {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: rgba(255, 255, 255, 0.85);
            font-size: 14px;
            font-weight: 900;
            margin-bottom: 8px;
        }

        .balanceAmt {
            font-size: 28px;
            font-weight: 900;
            letter-spacing: -.02em;
            color: #ffffff;
        }

        @media (max-width: 768px) {
            .balanceAmt {
                font-size: 24px;
            }

            .balanceTop {
                font-size: 13px;
            }
        }

        @media (max-width: 480px) {
            .balanceAmt {
                font-size: 22px;
            }
        }

        .balanceBtns {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }

        @media (max-width: 768px) {
            .balanceBtns {
                flex-direction: column;
                gap: 8px;
            }
            
            .balanceBtns .sbtn {
                width: 100%;
            }
        }

        .sbtn {
            flex: 1;
            height: 38px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 900;
            border: 1px solid rgba(255, 255, 255, .15);
            background: rgba(255, 255, 255, .08);
            color: rgba(255, 255, 255, .95);
            cursor: pointer;
            transition: all .2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        @media (max-width: 768px) {
            .sbtn {
                height: 42px;
                font-size: 14px;
            }
        }

        .sbtn:hover {
            background: rgba(255, 255, 255, .15);
            border-color: rgba(255, 255, 255, .25);
            transform: translateY(-1px);
        }

        .sbtn.deposit-btn {
            background: rgba(16, 185, 129, .2);
            border-color: rgba(16, 185, 129, .4);
            color: #10b981;
        }

        .sbtn.deposit-btn:hover {
            background: rgba(16, 185, 129, .3);
            border-color: rgba(16, 185, 129, .5);
            color: #34d399;
        }

        .sbtn.ghost {
            background: transparent;
            border-color: rgba(255, 255, 255, .2);
            color: rgba(255, 255, 255, .85);
        }

        .sbtn.withdraw-btn:hover {
            background: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .3);
            color: rgba(255, 255, 255, 1);
        }

        .sbtn svg {
            flex-shrink: 0;
        }

        /* stat cards */
        .statGrid {
            margin-top: 12px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }

        @media (max-width: 1100px) {
            .statGrid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 520px) {
            .statGrid {
                grid-template-columns: 1fr;
            }
        }

        .stat {
            border-radius: 14px;
            background: #fff;
            color: #0f1116;
            border: 1px solid rgba(0, 0, 0, .08);
            padding: 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            min-height: 78px;
        }

        .stat small {
            display: block;
            font-size: 10px;
            font-weight: 900;
            color: #6b7280;
            margin-bottom: 2px;
        }

        @media (max-width: 768px) {
            .stat small {
                font-size: 11px;
            }
        }

        .stat strong {
            font-size: 14px;
            font-weight: 900;
            letter-spacing: -.01em;
        }

        @media (max-width: 768px) {
            .stat strong {
                font-size: 16px;
            }
        }

        .stat .sub {
            font-size: 11px;
            font-weight: 900;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .chip {
            width: 28px;
            height: 28px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            border: 1px solid rgba(0, 0, 0, .10);
            background: #f9fafb;
        }

        .up {
            color: #10b981;
        }

        .down {
            color: #ef4444;
        }

        /* quick actions */
        .quickGrid {
            margin-top: 12px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }

        @media (max-width: 1100px) {
            .quickGrid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 520px) {
            .quickGrid {
                grid-template-columns: 1fr;
            }
        }

        .quick {
            border-radius: 14px;
            background: #fff;
            color: #0f1116;
            border: 1px solid rgba(0, 0, 0, .08);
            padding: 16px;
            min-height: 90px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
        }

        @media (max-width: 768px) {
            .quick {
                padding: 16px;
                min-height: auto;
            }
            
            .quick h4 {
                font-size: 13px;
            }
            
            .quick p {
                font-size: 12px;
            }
            
            .quick a {
                font-size: 12px;
            }
            
            .quick svg {
                width: 18px;
                height: 18px;
            }
        }

        @media (max-width: 480px) {
            .quick {
                padding: 14px;
            }
        }

        .quick h4 {
            margin: 0;
            font-size: 15px;
            font-weight: 900;
            color: #111827;
        }

        .quick p {
            margin: 6px 0 0;
            font-size: 13px;
            color: #6b7280;
            font-weight: 700;
            line-height: 1.4;
        }

        .quick a {
            margin-top: 10px;
            font-size: 13px;
            font-weight: 900;
            color: #2563eb;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        @media (max-width: 768px) {
            .quick a {
                font-size: 13px;
                margin-top: 12px;
            }
        }

        .quick a[href*="investments"] {
            color: #10b981;
        }

        .quick a[href*="stocks"] {
            color: #7c3aed;
        }

        .quick a[href*="portfolio"] {
            color: #f59e0b;
        }

        .quick a:hover {
            opacity: .85;
        }

        /* lower area */
        .lowerGrid {
            margin-top: 14px;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 12px;
        }

        @media (max-width: 1100px) {
            .lowerGrid {
                grid-template-columns: 1fr;
            }
        }

        .whitePanel {
            background: #fff;
            color: #0f1116;
            border: 1px solid rgba(0, 0, 0, .08);
            border-radius: 14px;
            overflow: hidden;
        }

        .panelHead {
            padding: 12px 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(0, 0, 0, .06);
        }

        @media (max-width: 768px) {
            .panelHead {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
                padding: 10px 12px;
            }
            
            .panelHead h5 {
                font-size: 11px;
            }
            
            .panelHead small {
                font-size: 10px;
            }
            
            .viewAll {
                font-size: 10px;
            }
        }

        .panelHead h5 {
            margin: 0;
            font-size: 15px;
            font-weight: 900;
            color: #111827;
        }

        .panelHead small {
            display: block;
            margin-top: 4px;
            font-size: 12px;
            font-weight: 700;
            color: #6b7280;
        }

        .viewAll {
            font-size: 13px;
            font-weight: 900;
            color: #111827;
            opacity: .7;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .viewAll:hover {
            opacity: 1;
        }

        /* orders list */
        .orderRow {
            padding: 12px 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        @media (max-width: 768px) {
            .orderRow {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
                padding: 14px;
            }
            
            .orderRight {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .orderTitle {
                font-size: 14px;
            }

            .orderMeta {
                font-size: 12px;
            }

            .price {
                font-size: 14px;
            }

            .status {
                font-size: 11px;
                padding: 5px 10px;
            }
        }

        .orderRow+.orderRow {
            border-top: 1px solid rgba(0, 0, 0, .06);
        }

        .orderLeft {
            display: flex;
            gap: 10px;
            align-items: center;
            min-width: 0;
        }

        .thumb {
            width: 44px;
            height: 34px;
            border-radius: 10px;
            background: #f3f4f6;
            border: 1px solid rgba(0, 0, 0, .08);
            overflow: hidden;
            flex: 0 0 auto;
        }

        .orderTitle {
            font-size: 14px;
            font-weight: 900;
            color: #111827;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 280px;
        }

        .orderMeta {
            font-size: 11px;
            font-weight: 700;
            color: #6b7280;
            margin-top: 2px;
        }

        @media (max-width: 768px) {
            .orderMeta {
                font-size: 10px;
                word-break: break-word;
            }
        }

        .orderRight {
            text-align: right;
            flex: 0 0 auto;
        }

        .price {
            font-size: 14px;
            font-weight: 900;
            color: #111827;
        }

        .status {
            margin-top: 4px;
            font-size: 10px;
            font-weight: 900;
            padding: 4px 8px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status.ok {
            background: rgba(52, 211, 153, .14);
            color: rgba(16, 185, 129, .95);
            border: 1px solid rgba(16, 185, 129, .25);
        }

        /* market overview list */
        .mItem {
            padding: 12px 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        @media (max-width: 768px) {
            .mItem {
                padding: 14px 16px;
            }
            
            .mRight {
                margin-right: -16px;
                padding: 8px 12px;
            }
            
            .mPrice {
                font-size: 14px;
            }
            
            .mChange {
                font-size: 12px;
            }

            .mName {
                font-size: 13px;
            }

            .mTicker {
                font-size: 12px;
            }
        }

        .mItem+.mItem {
            border-top: 1px solid rgba(0, 0, 0, .06);
        }

        .logo {
            width: 30px;
            height: 30px;
            border-radius: 10px;
            border: 1px solid rgba(0, 0, 0, .10);
            background: #f9fafb;
            display: grid;
            place-items: center;
            font-size: 11px;
            font-weight: 900;
            color: #111827;
            flex: 0 0 auto;
        }

        .mLeft {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
        }

        .mName {
            font-size: 12px;
            font-weight: 900;
            color: #111827;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 220px;
        }

        @media (max-width: 768px) {
            .mName {
                max-width: 100%;
                font-size: 13px;
            }
            
            .mTicker {
                font-size: 12px;
            }
            
            .mLeft {
                min-width: 0;
                flex: 1;
            }

            .logo {
                width: 36px;
                height: 36px;
                font-size: 12px;
            }
        }

        .mTicker {
            font-size: 12px;
            font-weight: 800;
            color: #6b7280;
            margin-top: 2px;
        }

        .mRight {
            text-align: right;
            flex: 0 0 auto;
            background: rgba(16, 185, 129, 0.1);
            padding: 8px 12px;
            border-radius: 8px;
            margin-right: -14px;
        }

        .mPrice {
            font-size: 13px;
            font-weight: 900;
            color: #111827;
        }

        .mChange {
            font-size: 12px;
            font-weight: 900;
            margin-top: 3px;
            color: #10b981;
        }

        /* chart */
        .chartWrap {
            margin-top: 12px;
            background: #fff;
            border: 1px solid rgba(0, 0, 0, .08);
            border-radius: 14px;
            overflow: hidden;
        }

        .chartBody {
            padding: 12px 14px 14px;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        @media (max-width: 768px) {
            .chartBody {
                padding: 10px 12px 12px;
            }
            
            .chartBody svg {
                min-width: 600px;
            }
        }

        .legend {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            align-items: center;
            justify-content: flex-end;
            color: #6b7280;
            font-weight: 900;
            font-size: 12px;
        }

        @media (max-width: 768px) {
            .legend {
                gap: 10px;
                font-size: 12px;
                justify-content: flex-start;
                margin-top: 10px;
            }
            
            .chartBody {
                padding: 14px 16px 16px;
                overflow-x: auto;
            }
            
            .chartWrap svg {
                min-width: 600px;
            }

            .chartWrap .panelHead h5 {
                font-size: 13px;
            }

            .chartWrap .panelHead small {
                font-size: 11px;
            }
        }

        .dotc {
            width: 9px;
            height: 9px;
            border-radius: 99px;
            display: inline-block;
            margin-right: 6px;
        }

        /* spacing like screenshot (big empty top area) */
        .spacerTop {
            height: 0;
            background: transparent;
        }

        @media (max-width: 900px) {
            .spacerTop {
                height: 120px;
            }
        }

        /* Additional mobile fixes */
        @media (max-width: 480px) {
            .heroCard {
                padding: 16px;
            }
            
            .balanceBox {
                padding: 16px;
            }
            
            .whitePanel {
                border-radius: 14px;
            }
            
            .stat,
            .quick {
                border-radius: 14px;
            }
            
            .chartWrap {
                border-radius: 14px;
            }
            
            .thumb {
                width: 48px;
                height: 36px;
            }
            
            .logo {
                width: 32px;
                height: 32px;
                font-size: 11px;
            }

            /* Ensure text is readable */
            .orderTitle {
                font-size: 13px;
            }

            .orderMeta {
                font-size: 11px;
            }

            .mName {
                font-size: 12px;
            }

            .mTicker {
                font-size: 11px;
            }
        }

        /* Dashboard popup banner (like screenshot) */
        .dashPopup {
            position: fixed;
            left: 50%;
            bottom: 16px;
            transform: translateX(-50%);
            z-index: 9999;
            max-width: 360px;
            width: calc(100vw - 32px);
            background: #0b0c10;
            color: #fff;
            border-radius: 14px;
            border: 1px solid rgba(255,255,255,.14);
            box-shadow: 0 18px 45px rgba(0,0,0,.35);
            padding: 12px 12px;
            display: none;
        }
        .dashPopup.show { display: block; }
        .dashPopupTop {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            align-items: start;
        }
        .dashPopupTitle {
            font-size: 13px;
            font-weight: 900;
            margin: 0;
        }
        .dashPopupMsg {
            margin-top: 2px;
            font-size: 13px;
            font-weight: 700;
            color: rgba(255,255,255,.82);
            line-height: 1.35;
        }
        .dashPopupAmt {
            font-size: 15px;
            font-weight: 900;
            color: #ffffff;
        }
        .dashPopupClose {
            width: 28px;
            height: 28px;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,.12);
            background: rgba(255,255,255,.06);
            color: #fff;
            cursor: pointer;
            display: grid;
            place-items: center;
            flex-shrink: 0;
        }
        .dashPopupClose:hover { background: rgba(255,255,255,.10); }
        @media (max-width: 480px) {
            .dashPopup { left: 50%; bottom: 12px; transform: translateX(-50%); width: calc(100vw - 24px); }
        }
    </style>
    @stack('styles')

</head>

<body>
    <div class="overlay" id="overlay"></div>

    <div class="app">
        <!-- ================= SIDEBAR ================= -->
        <aside class="sidebar" id="sidebar">
            <div class="wordmark">
                <img src="{{ asset('images/logo.png') }}" alt="TESLA Logo" />
            </div>

            <div class="userBox">
                <div class="avatar">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        style="color:rgba(255,255,255,.85)" stroke-width="2">
                        <path d="M12 2v2" />
                        <path d="M8 4h8" />
                        <rect x="6" y="6" width="12" height="10" rx="3" />
                        <path d="M8 16v2" />
                        <path d="M16 16v2" />
                        <path d="M9 10h.01M15 10h.01" />
                    </svg>
                </div>

                <div class="min-w-0">
                    <div class="text-[12px] font-[900] text-white/85 leading-tight truncate">
                        {{ auth()->user()->name ?? 'User' }}
                    </div>
                    <div class="text-[11px] font-[700] text-white/45 truncate">
                        {{ auth()->user()->email ?? '' }}
                    </div>
                    @php
                        $user = auth()->user();
                        $isKycVerified = $user && $user->isKycVerified();
                        $latestKyc = $user ? $user->latestKycSubmission : null;
                    @endphp
                    <div class="pill" style="background: {{ $isKycVerified ? 'rgba(52,211,153,.14)' : ($latestKyc && $latestKyc->status === 'Pending' ? 'rgba(251,191,36,.14)' : 'rgba(239,68,68,.14)') }}; border: 1px solid {{ $isKycVerified ? 'rgba(52,211,153,.45)' : ($latestKyc && $latestKyc->status === 'Pending' ? 'rgba(251,191,36,.45)' : 'rgba(239,68,68,.45)') }};">
                        <span class="inline-block w-2 h-2 rounded-full" style="background:{{ $isKycVerified ? 'rgba(52,211,153,.95)' : ($latestKyc && $latestKyc->status === 'Pending' ? 'rgba(251,191,36,.95)' : 'rgba(239,68,68,.95)') }}"></span>
                        @if($isKycVerified)
                            KYC Verified
                        @elseif($latestKyc && $latestKyc->status === 'Pending')
                            KYC Pending
                        @elseif($latestKyc && $latestKyc->status === 'Rejected')
                            KYC Rejected
                        @else
                            KYC Not Verified
                        @endif
                    </div>
                </div>
            </div>

            <nav class="nav" id="nav">
                <a href="{{ route('dashboard.index') }}" @if(Route::currentRouteName() == 'dashboard.index') class="active" @endif>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 12l2-2 7-7 7 7 2 2" />
                        <path d="M5 10v10h14V10" />
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('dashboard.wallet') }}" @if(Route::currentRouteName() == 'dashboard.wallet') class="active" @endif>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 12V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-2" />
                        <path d="M21 12h-7a2 2 0 0 0 0 4h7" />
                    </svg>
                    Wallet
                </a>

                <a href="{{ route('dashboard.investments') }}" @if(Route::currentRouteName() == 'dashboard.investments') class="active" @endif>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 17l6-6 4 4 8-8" />
                        <path d="M21 7v6h-6" />
                    </svg>
                    Investments
                </a>

                <a href="{{ route('dashboard.stocks') }}" @if(Route::currentRouteName() == 'dashboard.stocks') class="active" @endif>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 19V5" />
                        <path d="M4 19h16" />
                        <path d="M8 15V9" />
                        <path d="M12 15V7" />
                        <path d="M16 15v-5" />
                    </svg>
                    Stocks
                </a>

                <a href="{{ route('dashboard.portfolio') }}" @if(Route::currentRouteName() == 'dashboard.portfolio') class="active" @endif>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M7 7h10v10H7z" />
                        <path d="M4 10V4h6" />
                        <path d="M20 14v6h-6" />
                    </svg>
                    Portfolio
                </a>

                <a href="{{ route('dashboard.investment-dashboard') }}" @if(Route::currentRouteName() == 'dashboard.investment-dashboard') class="active" @endif>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 21H3" />
                        <path d="M7 16V8" />
                        <path d="M12 16V5" />
                        <path d="M17 16v-9" />
                    </svg>
                    Investment Dashboard
                </a>

                <a href="{{ route('dashboard.inventory') }}" @if(Route::currentRouteName() == 'dashboard.inventory') class="active" @endif>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 12h18" />
                        <path d="M6 12l3-7h6l3 7" />
                        <path d="M7 19a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
                        <path d="M17 19a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
                    </svg>
                    Inventory
                </a>

                <a href="{{ route('dashboard.orders') }}" @if(Route::currentRouteName() == 'dashboard.orders') class="active" @endif>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 6h15l-1.5 9h-13z" />
                        <path d="M6 6l-2 0" />
                        <path d="M9 20a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" />
                        <path d="M18 20a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" />
                    </svg>
                    Orders
                </a>

                <a href="{{ route('dashboard.account') }}" @if(Route::currentRouteName() == 'dashboard.account') class="active" @endif>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21a8 8 0 1 0-16 0" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    Account
                </a>

                <a href="{{ route('dashboard.kyc') }}" @if(Route::currentRouteName() == 'dashboard.kyc') class="active" @endif>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 3l8 4v6c0 5-3 8-8 8s-8-3-8-8V7z" />
                        <path d="M9 12l2 2 4-4" />
                    </svg>
                    KYC Verification
                </a>

                <div class="navSection">
                    <a href="{{ route('dashboard.support') }}" @if(Route::currentRouteName() == 'dashboard.support') class="active" @endif>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 12a10 10 0 1 1-20 0 10 10 0 0 1 20 0Z" />
                            <path d="M8 12h.01M12 12h.01M16 12h.01" />
                        </svg>
                        Support
                    </a>
                </div>
            </nav>

            <div class="logout">
                <span>Logout</span>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logoutBtn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="opacity:.9"
                            stroke-width="2">
                            <path d="M10 17l5-5-5-5" />
                            <path d="M15 12H3" />
                            <path d="M21 21V3" />
                        </svg>
                    </button>
                </form>
            </div>
        </aside>

        <!-- ================= CONTENT ================= -->
        <main class="content">
            <div class="topbar">
                <div class="topLeft">
                    <button class="hamb" id="hamb" aria-label="Open sidebar">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#111" stroke-width="2"
                            stroke-linecap="round">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <div class="topTitle">@yield('topTitle', 'Dashboard')</div>
                </div>

                <div class="topRight">
                    <div class="bellWrapper">
                        <div class="bell" id="notificationBell" title="Notifications">
                            <div class="bellBadge hidden" id="notificationBadge">0</div>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#111" stroke-width="2">
                                <path d="M18 8a6 6 0 1 0-12 0c0 7-3 7-3 7h18s-3 0-3-7" />
                                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                            </svg>
                        </div>
                        <div class="notificationDropdown" id="notificationDropdown">
                            <div class="notificationHeader">
                                <h5>Notifications</h5>
                                <button type="button" id="notificationMarkAllRead">Mark all read</button>
                            </div>
                            <div class="notificationList" id="notificationList">
                                <div class="notificationEmpty" id="notificationEmpty">No notifications</div>
                            </div>
                        </div>
                    </div>
                    <div class="profileWrapper">
                        <div class="profileIcon" id="profileIcon" title="Account">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2">
                                <path d="M20 21a8 8 0 1 0-16 0" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                        </div>
                        <div class="profileDropdown" id="profileDropdown">
                            <a href="{{ route('dashboard.account') }}">Account</a>
                            <div class="profileDropdownDivider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('admin_id'))
                <div style="background: #f59e0b; color: white; padding: 12px 18px; margin-bottom: 12px; border-radius: 8px; display: flex; align-items: center; justify-content: space-between; font-size: 13px; font-weight: 700;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                        <span>You are viewing as this user. Admin impersonation mode active.</span>
                    </div>
                    <form method="POST" action="{{ route('stop.impersonating') }}" style="display: inline;">
                        @csrf
                        <button type="submit" style="padding: 6px 12px; border-radius: 6px; background: rgba(255,255,255,.2); color: white; font-size: 12px; font-weight: 900; cursor: pointer; border: 1px solid rgba(255,255,255,.3);">
                            Return to Admin
                        </button>
                    </form>
                </div>
            @endif

            @if(session('success'))
                <div style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2); color: #34d399; padding: 14px 18px; margin: 18px 18px; margin-bottom: 0; border-radius: 12px; display: flex; align-items: center; gap: 12px; font-size: 14px; font-weight: 600;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #fb7185; padding: 14px 18px; margin: 18px 18px; margin-bottom: 0; border-radius: 12px; display: flex; align-items: center; gap: 12px; font-size: 14px; font-weight: 600;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #fb7185; padding: 14px 18px; margin: 18px 18px; margin-bottom: 0; border-radius: 12px; font-size: 14px; font-weight: 600;">
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        <span>Please check the following errors:</span>
                    </div>
                    <ul style="list-style: disc; margin-left: 36px; margin-bottom: 0px; font-weight: 500; font-size: 13px; opacity: 0.9;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')

        </main>
    </div>

    <!-- Dashboard popup banner -->
    <div class="dashPopup" id="dashPopup" aria-live="polite" aria-atomic="true">
        <div class="dashPopupTop">
            <div style="min-width:0;">
                <div class="dashPopupTitle" id="dashPopupTitle">Notification</div>
                <div class="dashPopupMsg" id="dashPopupMsg"></div>
            </div>
            <button type="button" class="dashPopupClose" id="dashPopupClose" aria-label="Close">✕</button>
        </div>
    </div>

    <script>
        // Sidebar toggle (mobile)
        const sidebar = document.getElementById("sidebar");
        const hamb = document.getElementById("hamb");
        const overlay = document.getElementById("overlay");

        function openSidebar() {
            sidebar.classList.add("open");
            overlay.classList.add("show");
        }
        function closeSidebar() {
            sidebar.classList.remove("open");
            overlay.classList.remove("show");
        }
        hamb?.addEventListener("click", openSidebar);
        overlay?.addEventListener("click", closeSidebar);

        // Active nav state
        const nav = document.getElementById("nav");

        // Notification & profile dropdowns
        const notificationBell = document.getElementById("notificationBell");
        const notificationDropdown = document.getElementById("notificationDropdown");
        const notificationList = document.getElementById("notificationList");
        const notificationEmpty = document.getElementById("notificationEmpty");
        const notificationMarkAllRead = document.getElementById("notificationMarkAllRead");
        const bellWrapper = notificationBell ? notificationBell.closest(".bellWrapper") : null;
        const profileIcon = document.getElementById("profileIcon");
        const profileDropdown = document.getElementById("profileDropdown");
        const profileWrapper = profileIcon ? profileIcon.closest(".profileWrapper") : null;

        function loadNotifications() {
            fetch('{{ route("dashboard.notifications.get") }}')
                .then(response => response.json())
                .then(data => {
                    const list = document.getElementById("notificationList");
                    const emptyEl = document.getElementById("notificationEmpty");
                    if (!list || !emptyEl) return;
                    list.querySelectorAll(".notificationItem").forEach(n => n.remove());
                    if (data.notifications && data.notifications.length > 0) {
                        emptyEl.style.display = "none";
                        data.notifications.forEach(function(n) {
                            const item = document.createElement("div");
                            item.className = "notificationItem unread";
                            item.dataset.notificationId = n.id;
                            item.innerHTML = '<div class="notificationTitle">' + (n.title || 'Notification') + '</div>' +
                                (n.message ? '<div class="notificationMessage">' + n.message + '</div>' : '') +
                                (n.created_at ? '<div class="notificationTime">' + n.created_at + '</div>' : '');
                            if (n.link) {
                                item.style.cursor = "pointer";
                                item.addEventListener("click", function() {
                                    markAsRead(n.id);
                                    window.location.href = n.link;
                                });
                            } else {
                                item.addEventListener("click", function() { markAsRead(n.id); });
                            }
                            list.appendChild(item);
                        });
                    } else {
                        emptyEl.style.display = "block";
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function markAsRead(notificationId) {
            fetch('{{ route("dashboard.notifications.mark-read") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ notification_id: notificationId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const item = document.querySelector('[data-notification-id="' + notificationId + '"]');
                    if (item) {
                        item.classList.remove('unread');
                        item.remove();
                    }
                    updateNotificationBadge();
                    if (notificationList && notificationList.querySelectorAll(".notificationItem").length === 0) {
                        const emptyEl = document.getElementById("notificationEmpty");
                        if (emptyEl) emptyEl.style.display = "block";
                    }
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function markAllAsRead() {
            fetch('{{ route("dashboard.notifications.mark-all-read") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (notificationList) {
                        notificationList.querySelectorAll(".notificationItem").forEach(n => n.remove());
                        if (notificationEmpty) notificationEmpty.style.display = "block";
                    }
                    updateNotificationBadge();
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function updateNotificationBadge() {
            fetch('{{ route("dashboard.notifications.get") }}')
                .then(response => response.json())
                .then(data => {
                    const badge = document.getElementById('notificationBadge');
                    if (!badge) return;
                    if (data.unread_count > 0) {
                        badge.textContent = data.unread_count > 99 ? '99+' : data.unread_count;
                        badge.classList.remove('hidden');
                    } else {
                        badge.classList.add('hidden');
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        // Popup banner (show newest unread notifications like screenshot)
        const dashPopup = document.getElementById('dashPopup');
        const dashPopupTitle = document.getElementById('dashPopupTitle');
        const dashPopupMsg = document.getElementById('dashPopupMsg');
        const dashPopupClose = document.getElementById('dashPopupClose');

        let dashPopupTimer = null;
        let currentPopupNotification = null;

        function mapPopupTitle(n) {
            const t = (n && n.type) ? String(n.type) : '';
            if (t.includes('withdraw')) return 'Withdrawal';
            if (t.includes('deposit')) return 'Deposit';
            if (t.includes('stock')) return 'Purchase';
            if (t.includes('vehicle')) return 'Purchase';
            if (t.includes('investment')) return 'Profit';
            return (n && n.title) ? n.title : 'Notification';
        }

        function highlightAmount(text) {
            return String(text || '').replace(/(\$[0-9][0-9,]*(?:\.[0-9]{2})?)/, '<span class="dashPopupAmt">$1</span>');
        }

        function showDashPopup(n) {
            if (!dashPopup || !dashPopupTitle || !dashPopupMsg) return;
            currentPopupNotification = n;
            dashPopupTitle.textContent = mapPopupTitle(n);
            dashPopupMsg.innerHTML = highlightAmount(n.message || n.title || '');
            dashPopup.classList.add('show');

            if (dashPopupTimer) clearTimeout(dashPopupTimer);
            dashPopupTimer = setTimeout(() => {
                if (dashPopup.classList.contains('show') && currentPopupNotification?.id) {
                    markAsRead(currentPopupNotification.id);
                }
                dashPopup.classList.remove('show');
            }, 10000);
        }

        dashPopupClose?.addEventListener('click', function (e) {
            e.stopPropagation();
            if (currentPopupNotification?.id) markAsRead(currentPopupNotification.id);
            dashPopup?.classList.remove('show');
        });

        dashPopup?.addEventListener('click', function () {
            if (currentPopupNotification?.id) markAsRead(currentPopupNotification.id);
            if (currentPopupNotification?.link) window.location.href = currentPopupNotification.link;
            dashPopup.classList.remove('show');
        });

        function loadPopupNotification() {
            fetch('{{ route("dashboard.notifications.get") }}')
                .then(r => r.json())
                .then(data => {
                    const list = data.notifications || [];
                    if (list.length > 0) {
                        // show the newest unread
                        showDashPopup(list[0]);
                    }
                })
                .catch(() => {});
        }

        if (notificationBell && notificationDropdown && bellWrapper) {
            notificationBell.addEventListener("click", function(e) {
                e.stopPropagation();
                if (profileDropdown) profileDropdown.classList.remove("show");
                notificationDropdown.classList.toggle("show");
                if (notificationDropdown.classList.contains("show")) {
                    loadNotifications();
                }
            });
            if (notificationMarkAllRead) {
                notificationMarkAllRead.addEventListener("click", function(e) {
                    e.preventDefault();
                    markAllAsRead();
                });
            }
            document.addEventListener("click", function(e) {
                if (!bellWrapper.contains(e.target)) {
                    notificationDropdown.classList.remove("show");
                }
            });
        }

        updateNotificationBadge();
        // popup on dashboard
        setTimeout(loadPopupNotification, 1500);
        setInterval(loadPopupNotification, 30000);

        // Profile dropdown toggle
        if (profileIcon && profileDropdown && profileWrapper) {
            profileIcon.addEventListener("click", function(e) {
                e.stopPropagation();
                if (notificationDropdown) notificationDropdown.classList.remove("show");
                profileDropdown.classList.toggle("show");
            });
            document.addEventListener("click", function(e) {
                if (!profileWrapper.contains(e.target)) {
                    profileDropdown.classList.remove("show");
                }
            });
        }
        nav?.addEventListener("click", (e) => {
            const a = e.target.closest("a[data-page]");
            if (!a) return;
            nav.querySelectorAll("a").forEach(x => x.classList.remove("active"));
            a.classList.add("active");

            // mobile auto-close
            if (window.innerWidth <= 1024) closeSidebar();
        });

        // Close sidebar if resizing to desktop
        window.addEventListener("resize", () => {
            if (window.innerWidth > 1024) closeSidebar();
        });
    </script>
    @stack('scripts')

    <!-- Dual Popup Notifications -->
    <div id="dual-notification-container" class="fixed bottom-4 left-4 z-50 flex flex-col gap-2 pointer-events-none">
        <!-- Notifications will be injected here -->
    </div>

    <style>
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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('dual-notification-container');
            
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
    <!-- WhatsApp Live Chat Widget -->
    <a href="https://wa.me/17863989017" target="_blank" class="fixed bottom-6 right-6 z-50 hover:scale-110 transition-transform duration-300">
        <div class="bg-green-500 rounded-full p-3 shadow-lg flex items-center justify-center w-14 h-14">
            <svg fill="#ffffff" width="30px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.0117 2.0127C6.50571 2.0127 2.02344 6.47833 2.02344 11.9722C2.02344 13.916 2.58431 15.7171 3.55589 17.2612L2.09919 21.8415L6.96349 20.3704C8.42168 21.144 10.1554 21.5794 11.9961 21.5794C17.502 21.5794 21.9844 17.1137 21.9844 11.6198C21.9844 6.12596 17.502 2.0127 12.0117 2.0127ZM11.9961 19.9141C10.3768 19.9141 8.86895 19.4636 7.57551 18.6675L7.27961 18.4862L4.40263 19.3562L5.29746 16.5418L4.97495 16.2081C4.04944 15.0118 3.56064 13.5407 3.56064 11.9682C3.56064 7.42629 7.33719 3.73133 11.9961 3.73133C16.655 3.73133 20.4316 7.42629 20.4316 11.9682C20.4472 16.5101 16.655 19.9141 11.9961 19.9141ZM16.3533 14.6644C16.1259 14.5369 14.9965 14.0026 14.7828 13.9318C14.569 13.8532 14.4168 13.8178 14.2562 14.0418C14.0956 14.2737 13.6455 14.7963 13.5119 14.9575C13.3704 15.1186 13.2329 15.1383 13.001 15.0165C12.7691 14.8986 12.0227 14.6432 11.1384 13.8532C10.4507 13.2363 9.98305 12.478 9.75515 12.0772C9.52726 11.6804 9.72769 11.4722 9.84558 11.3582C9.9517 11.2521 10.0814 11.0871 10.1993 10.9417C10.3132 10.8002 10.3525 10.6941 10.4311 10.5369C10.5097 10.3797 10.4704 10.2382 10.4114 10.1164C10.3525 9.99849 9.88873 8.83515 9.69223 8.35569C9.49965 7.89588 9.30315 7.95482 9.15773 7.95482C9.01627 7.95482 8.85127 7.95089 8.68623 7.95089C8.5212 7.95089 8.254 8.01377 8.03393 8.24958C7.81385 8.4893 7.18919 9.07106 7.18919 10.254C7.18919 11.4369 8.04965 12.5802 8.17148 12.7413C8.28938 12.9025 9.85335 15.4223 12.3339 16.4206C14.8144 17.4189 14.8144 17.0888 15.2508 17.0495C15.6872 17.0102 16.656 16.4835 16.8564 15.9099C17.0569 15.3362 17.0569 14.8491 16.994 14.7391C16.9311 14.629 16.7857 14.5622 16.5539 14.4443H16.3533Z"/>
            </svg>
        </div>
    </a>
</body>
</html>
