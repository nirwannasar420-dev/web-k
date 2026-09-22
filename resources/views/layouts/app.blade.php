@php
    use Illuminate\Support\Facades\Auth;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
    @yield('title', 'CRM Petra Textima')
</title>


<link
    rel="icon"
    type="image/png"
    href="{{ asset('images/favicon-petra-textima.png') }}"
>


    <style>

        /* =====================================================
           ROOT
        ===================================================== */

        :root {

            --primary: #0B2A6F;
            --primary-dark: #071D4D;

            --brand-red: #E30613;

            --white: #FFFFFF;

            --text-primary: #172033;
            --text-secondary: #64748B;
            --text-muted: #94A3B8;

            --background: #F1F5F9;

            --border: #E2E8F0;

            --success: #188038;
            --danger: #D93025;

            --sidebar-width: 245px;

        }


        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html {
            min-height: 100%;
        }


        body {

            min-height: 100vh;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: var(--background);

            color: var(--text-primary);

        }


        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }


        a {
            text-decoration: none;
        }


        /* =====================================================
           MAIN APP
        ===================================================== */

        .app-layout {

            display: flex;

            min-height: 100vh;

        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            position: fixed;

            top: 0;
            left: 0;
            bottom: 0;

            width: var(--sidebar-width);

            display: flex;

            flex-direction: column;

            background: #FFFFFF;

            border-right: 1px solid var(--border);

            z-index: 1000;

            overflow-y: auto;

            overflow-x: hidden;

        }


        /* =====================================================
           LOGO AREA
        ===================================================== */

        .brand {

            width: 100%;

            height: 127px;

            padding: 20px 15px 10px;

            display: flex;

            align-items: center;

            justify-content: center;

            position: relative;

            background: #FFFFFF;

            flex-shrink: 0;

        }


        /* FULL RED LINE */

        .brand::after {

            content: '';

            position: absolute;

            left: 0;

            right: 0;

            bottom: 0;

            height: 3px;

            background: #E30613;

        }


        .brand-link {

            width: 215px;

            height: 85px;

            display: block;

            position: relative;

            overflow: hidden;

        }


        .brand-logo-image {

            position: absolute;

            width: 315px;

            height: 315px;

            max-width: none;

            max-height: none;

            object-fit: contain;

            left: -50px;

            top: -116px;

        }


        /* =====================================================
           NAVIGATION
        ===================================================== */

        .sidebar-navigation {

            flex: 1;

            display: flex;

            flex-direction: column;

            background:
                linear-gradient(
                    180deg,
                    #0B2A6F 0%,
                    #0A2869 55%,
                    #09245F 100%
                );

            padding: 20px 12px 15px;

        }


        /* =====================================================
           SECTION TITLE
        ===================================================== */

        .sidebar-section-title {

            padding: 0 13px;

            margin: 2px 0 9px;

            color:
                rgba(255,255,255,.48);

            font-size: 9px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: 1px;

        }


        .sidebar-section-title.management {

            margin-top: 22px;

        }


        /* =====================================================
           DIVIDER
        ===================================================== */

        .sidebar-section-divider {

            height: 1px;

            margin: 8px 12px 18px;

            background:
                rgba(255,255,255,.11);

        }


        /* =====================================================
           MENU
        ===================================================== */

        .sidebar-menu {

            list-style: none;

            margin: 0;

            padding: 0;

        }


        .sidebar-menu li {

            margin-bottom: 4px;

        }


        .sidebar-menu a {

            position: relative;

            min-height: 44px;

            padding: 10px 13px;

            display: flex;

            align-items: center;

            gap: 11px;

            color:
                rgba(255,255,255,.76);

            border-radius: 10px;

            transition:
                background .2s ease,
                color .2s ease,
                transform .2s ease,
                box-shadow .2s ease;

        }


        /* =====================================================
           HOVER
        ===================================================== */

        .sidebar-menu a:hover {

            background:
                rgba(255,255,255,.09);

            color: #FFFFFF;

            transform:
                translateX(2px);

        }


        /* =====================================================
           ACTIVE
        ===================================================== */

        .sidebar-menu a.active {

            background: #FFFFFF;

            color: #0B2A6F;

            font-weight: 700;

            box-shadow:
                0 5px 14px rgba(0,0,0,.12);

            transform: none;

        }


        .sidebar-menu a.active::before {

            content: '';

            position: absolute;

            left: 0;

            top: 8px;

            bottom: 8px;

            width: 4px;

            background: #E30613;

            border-radius:
                0 5px 5px 0;

        }


        .sidebar-menu a.active:hover {

            background: #FFFFFF;

            color: #0B2A6F;

            transform: none;

        }


        /* =====================================================
           ICON
        ===================================================== */

        .menu-icon {

            width: 21px;

            height: 21px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

            color: inherit;

        }


        .menu-icon svg {

            width: 18px;

            height: 18px;

            stroke:
                currentColor;

        }


        .menu-label {

            flex: 1;

        }


        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .main-content {

            width:
                calc(
                    100% -
                    var(--sidebar-width)
                );

            margin-left:
                var(--sidebar-width);

            min-height: 100vh;

        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {

            height: 72px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 30px;

            background: #0B2A6F;

            border-bottom:
                1px solid #071D4D;

            position: sticky;

            top: 0;

            z-index: 900;

            box-shadow:
                0 3px 10px
                rgba(7,29,77,.12);

        }


        .topbar-left {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .page-title {

            color: #FFFFFF;

            font-size: 19px;

            font-weight: 700;

        }


        /* =====================================================
           USER AREA
        ===================================================== */

        .topbar-right {

            display: flex;

            align-items: center;

            gap: 15px;

        }


        .user-area {

            display: flex;

            align-items: center;

            gap: 10px;

        }


        .user-avatar {

            width: 36px;

            height: 36px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background:
                rgba(255,255,255,.14);

            border:
                1px solid
                rgba(255,255,255,.22);

            color: #FFFFFF;

            font-size: 13px;

            font-weight: 700;

        }


        .user-details {

            line-height: 1.2;

        }


        .user-name {

            color: #FFFFFF;

            font-size: 12px;

            font-weight: 700;

        }


        .user-role {

            margin-top: 3px;

            color:
                rgba(255,255,255,.62);

            font-size: 10px;

        }


        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout-button {

            padding: 8px 13px;

            background: #FFFFFF;

            border:
                1px solid
                rgba(255,255,255,.65);

            border-radius: 8px;

            color: #0B2A6F;

            font-size: 11px;

            font-weight: 700;

            cursor: pointer;

            transition: .2s ease;

        }


        .logout-button:hover {

            background: #E8EEF9;

            border-color: #E8EEF9;

            color: #071D4D;

        }


        /* =====================================================
           PAGE CONTENT
        ===================================================== */

        .page-content {

            padding: 30px;

        }


        /* =====================================================
           OLD ALERT
           Kept for validation errors
        ===================================================== */

        .alert {

            padding: 12px 15px;

            border-radius: 9px;

            margin-bottom: 20px;

            font-size: 13px;

        }


        .alert-error {

            background: #FCE8E6;

            color: var(--danger);

            border:
                1px solid #F5B8B3;

        }


        /* =====================================================
           TOAST NOTIFICATION
        ===================================================== */

        .toast-container {

            position: fixed;

            top: 88px;

            right: 25px;

            z-index: 99999;

            display: flex;

            flex-direction: column;

            gap: 10px;

            width: min(
                380px,
                calc(100vw - 30px)
            );

            pointer-events: none;

        }


        .toast {

            position: relative;

            display: flex;

            align-items: flex-start;

            gap: 12px;

            width: 100%;

            padding: 14px 15px;

            background: #FFFFFF;

            border: 1px solid #E2E8F0;

            border-radius: 13px;

            box-shadow:
                0 12px 30px
                rgba(15,23,42,.14);

            pointer-events: auto;

            overflow: hidden;

            opacity: 0;

            transform:
                translateX(30px);

            animation:
                toastIn .35s ease
                forwards;

        }


        .toast.toast-hide {

            animation:
                toastOut .3s ease
                forwards;

        }


        /* =====================================================
           TOAST ICON
        ===================================================== */

        .toast-icon {

            width: 36px;

            height: 36px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 10px;

        }


        .toast-icon svg {

            width: 19px;

            height: 19px;

        }


        .toast-success .toast-icon {

            background: #E7F6EF;

            color: #159A6C;

        }


        .toast-error .toast-icon {

            background: #FDEBED;

            color: #E30613;

        }


        /* =====================================================
           TOAST CONTENT
        ===================================================== */

        .toast-content {

            flex: 1;

            min-width: 0;

            padding-top: 1px;

        }


        .toast-title {

            color: #172033;

            font-size: 12px;

            font-weight: 800;

            line-height: 1.3;

        }


        .toast-message {

            margin-top: 4px;

            color: #64748B;

            font-size: 11px;

            line-height: 1.45;

        }


        /* =====================================================
           TOAST CLOSE
        ===================================================== */

        .toast-close {

            width: 25px;

            height: 25px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            border: none;

            background: transparent;

            color: #94A3B8;

            border-radius: 6px;

            cursor: pointer;

            font-size: 17px;

            line-height: 1;

            transition: .2s ease;

        }


        .toast-close:hover {

            background: #F1F5F9;

            color: #475569;

        }


        /* =====================================================
           TOAST PROGRESS
        ===================================================== */

        .toast-progress {

            position: absolute;

            left: 0;

            right: 0;

            bottom: 0;

            height: 3px;

            transform-origin: left;

            animation:
                toastProgress 4s linear
                forwards;

        }


        .toast-success .toast-progress {

            background: #159A6C;

        }


        .toast-error .toast-progress {

            background: #E30613;

        }


        /* =====================================================
           TOAST ANIMATION
        ===================================================== */

        @keyframes toastIn {

            from {

                opacity: 0;

                transform:
                    translateX(30px);

            }

            to {

                opacity: 1;

                transform:
                    translateX(0);

            }

        }


        @keyframes toastOut {

            from {

                opacity: 1;

                transform:
                    translateX(0);

            }

            to {

                opacity: 0;

                transform:
                    translateX(30px);

            }

        }


        @keyframes toastProgress {

            from {

                transform:
                    scaleX(1);

            }

            to {

                transform:
                    scaleX(0);

            }

        }


        /* =====================================================
           MOBILE MENU
        ===================================================== */

        .mobile-menu-button {

            display: none;

            width: 38px;

            height: 38px;

            align-items: center;

            justify-content: center;

            border:
                1px solid
                rgba(255,255,255,.25);

            background:
                rgba(255,255,255,.10);

            color: #FFFFFF;

            border-radius: 8px;

            cursor: pointer;

            font-size: 18px;

        }


        .mobile-menu-button:hover {

            background:
                rgba(255,255,255,.17);

        }


        /* =====================================================
           OVERLAY
        ===================================================== */

        .sidebar-overlay {

            display: none;

            position: fixed;

            inset: 0;

            background:
                rgba(15,23,42,.42);

            z-index: 999;

        }


        .sidebar-overlay.show {

            display: block;

        }


        /* =====================================================
           SCROLLBAR
        ===================================================== */

        .sidebar::-webkit-scrollbar {

            width: 5px;

        }


        .sidebar::-webkit-scrollbar-track {

            background: #09245F;

        }


        .sidebar::-webkit-scrollbar-thumb {

            background:
                rgba(255,255,255,.22);

            border-radius: 99px;

        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            .sidebar {

                transform:
                    translateX(-100%);

                transition:
                    transform .25s ease;

            }


            .sidebar.show {

                transform:
                    translateX(0);

            }


            .main-content {

                width: 100%;

                margin-left: 0;

            }


            .mobile-menu-button {

                display: inline-flex;

            }


            .topbar {

                padding: 0 20px;

            }


            .page-content {

                padding: 20px;

            }


            .toast-container {

                top: 78px;

                right: 15px;

                width: calc(
                    100vw - 30px
                );

            }

        }


        @media (max-width: 600px) {

            .topbar {

                height: 64px;

            }


            .page-title {

                font-size: 16px;

            }


            .user-details {

                display: none;

            }


            .page-content {

                padding: 15px;

            }


            .brand {

                height: 120px;

            }

        }

    </style>


    @yield('styles')

</head>


<body>


<div class="app-layout">


    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <aside
        id="sidebar"
        class="sidebar"
    >


        <!-- LOGO -->

        <div class="brand">

            <a
                href="{{ route('crm.dashboard') }}"
                class="brand-link"
            >

                <img
                    src="{{ asset('images/logo-petra.png') }}"
                    alt="Petra Textima"
                    class="brand-logo-image"
                >

            </a>

        </div>


        <!-- NAVIGATION -->

        <div class="sidebar-navigation">


            <!-- WORKSPACE -->

            <div class="sidebar-section-title">

                Workspace

            </div>


            <ul class="sidebar-menu">


                <!-- DASHBOARD -->

                <li>

                    <a
                        href="{{ route('crm.dashboard') }}"
                        class="{{
                            request()->routeIs(
                                'crm.dashboard'
                            )
                                ? 'active'
                                : ''
                        }}"
                    >

                        <span class="menu-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <rect
                                    x="3"
                                    y="3"
                                    width="7"
                                    height="7"
                                    rx="1"
                                />

                                <rect
                                    x="14"
                                    y="3"
                                    width="7"
                                    height="7"
                                    rx="1"
                                />

                                <rect
                                    x="3"
                                    y="14"
                                    width="7"
                                    height="7"
                                    rx="1"
                                />

                                <rect
                                    x="14"
                                    y="14"
                                    width="7"
                                    height="7"
                                    rx="1"
                                />

                            </svg>

                        </span>


                        <span class="menu-label">

                            Dashboard

                        </span>

                    </a>

                </li>


                <!-- PIPELINE -->

                <li>

                    <a
                        href="{{ route('crm.pipeline') }}"
                        class="{{
                            request()->routeIs(
                                'crm.pipeline'
                            )
                                ? 'active'
                                : ''
                        }}"
                    >

                        <span class="menu-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path d="M4 6h16"/>

                                <path d="M7 12h10"/>

                                <path d="M10 18h4"/>

                            </svg>

                        </span>


                        <span class="menu-label">

                            Pipeline

                        </span>

                    </a>

                </li>


                <!-- LEADS -->

                <li>

                    <a
                        href="{{ route('leads.index') }}"
                        class="{{
                            request()->routeIs(
                                'leads.*'
                            )
                                ? 'active'
                                : ''
                        }}"
                    >

                        <span class="menu-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <circle
                                    cx="9"
                                    cy="8"
                                    r="3"
                                />

                                <path
                                    d="M3 20c0-3.2 2.7-5 6-5s6 1.8 6 5"
                                />

                                <path
                                    d="M16 5.5a3 3 0 0 1 0 5"
                                />

                                <path
                                    d="M18 15c1.7.7 3 2.2 3 5"
                                />

                            </svg>

                        </span>


                        <span class="menu-label">

                            Leads

                        </span>

                    </a>

                </li>


                <!-- CUSTOMERS -->

                <li>

                    <a
                        href="{{ route('customers.index') }}"
                        class="{{
                            request()->routeIs(
                                'customers.*'
                            )
                                ? 'active'
                                : ''
                        }}"
                    >

                        <span class="menu-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path d="M3 21h18"/>

                                <path
                                    d="M5 21V5l7-2 7 2v16"
                                />

                                <path d="M9 8h1"/>

                                <path d="M14 8h1"/>

                                <path d="M9 12h1"/>

                                <path d="M14 12h1"/>

                                <path
                                    d="M10 21v-5h4v5"
                                />

                            </svg>

                        </span>


                        <span class="menu-label">

                            Customers

                        </span>

                    </a>

                </li>


                <!-- OPPORTUNITIES -->

                <li>

                    <a
                        href="{{ route(
                            'opportunities.index'
                        ) }}"
                        class="{{
                            request()->routeIs(
                                'opportunities.*'
                            )
                                ? 'active'
                                : ''
                        }}"
                    >

                        <span class="menu-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path
                                    d="M4 17l5-5 4 3 7-8"
                                />

                                <path
                                    d="M15 7h5v5"
                                />

                            </svg>

                        </span>


                        <span class="menu-label">

                            Opportunities

                        </span>

                    </a>

                </li>


                <!-- PRODUCTS -->

                <li>

                    <a
                        href="{{ route('products.index') }}"
                        class="{{
                            request()->routeIs('products.*')
                                ? 'active'
                                : ''
                        }}"
                    >

                        <span class="menu-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path
                                    d="M3 7l9-4 9 4-9 4-9-4Z"
                                />

                                <path
                                    d="M3 7v10l9 4 9-4V7"
                                />

                                <path
                                    d="M12 11v10"
                                />

                            </svg>

                        </span>


                        <span class="menu-label">

                            Products

                        </span>

                    </a>

                </li>


                <!-- ACTIVITIES -->

                <li>

                    <a
                        href="{{ route(
                            'activities.index'
                        ) }}"
                        class="{{
                            request()->routeIs(
                                'activities.*'
                            )
                                ? 'active'
                                : ''
                        }}"
                    >

                        <span class="menu-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <rect
                                    x="3"
                                    y="4"
                                    width="18"
                                    height="17"
                                    rx="2"
                                />

                                <path d="M8 2v4"/>

                                <path d="M16 2v4"/>

                                <path d="M3 10h18"/>

                                <path d="M8 14h.01"/>

                                <path d="M12 14h.01"/>

                                <path d="M16 14h.01"/>

                                <path d="M8 18h.01"/>

                                <path d="M12 18h.01"/>

                                <path d="M16 18h.01"/>

                            </svg>

                        </span>


                        <span class="menu-label">

                            Activities

                        </span>

                    </a>

                </li>


                <!-- SALES RESUME / PIPO -->

                <li>

                    <a
                        href="{{ route(
                            'sales_resume.index'
                        ) }}"
                        class="{{
                            request()->routeIs(
                                'sales_resume.*'
                            )
                                ? 'active'
                                : ''
                        }}"
                    >

                        <span class="menu-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path d="M4 19V5"/>

                                <path d="M4 19h16"/>

                                <path d="M8 16v-5"/>

                                <path d="M12 16V8"/>

                                <path d="M16 16v-3"/>

                                <path d="M20 16v-7"/>

                            </svg>

                        </span>


                        <span class="menu-label">

                            Sales Resume

                        </span>

                    </a>

                </li>


            </ul>


            <!-- DIVIDER -->

            <div class="sidebar-section-divider"></div>


            <!-- MANAGEMENT -->

            @auth

                @if(
                    Auth::user()->role === 'admin'
                )


                    <div
                        class="
                            sidebar-section-title
                            management
                        "
                    >

                        Management

                    </div>


                    <ul class="sidebar-menu">


                        <!-- REPORTS -->

                        <li>

                            <a
                                href="{{ route(
                                    'reports.index'
                                ) }}"
                                class="{{
                                    request()->routeIs(
                                        'reports.*'
                                    )
                                        ? 'active'
                                        : ''
                                }}"
                            >

                                <span class="menu-icon">

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >

                                        <path d="M4 19V5"/>

                                        <path
                                            d="M4 19h16"
                                        />

                                        <path
                                            d="M8 16v-5"
                                        />

                                        <path
                                            d="M12 16V8"
                                        />

                                        <path
                                            d="M16 16v-9"
                                        />

                                    </svg>

                                </span>


                                <span class="menu-label">

                                    Reports

                                </span>

                            </a>

                        </li>


                        <!-- USERS -->

                        <li>

                            <a
                                href="{{ route(
                                    'users.index'
                                ) }}"
                                class="{{
                                    request()->routeIs(
                                        'users.*'
                                    )
                                        ? 'active'
                                        : ''
                                }}"
                            >

                                <span class="menu-icon">

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >

                                        <circle
                                            cx="12"
                                            cy="8"
                                            r="3"
                                        />

                                        <path
                                            d="M5 21c0-4 3-6 7-6s7 2 7 6"
                                        />

                                    </svg>

                                </span>


                                <span class="menu-label">

                                    Users

                                </span>

                            </a>

                        </li>


                    </ul>


                @endif

            @endauth


        </div>


    </aside>


    <!-- =====================================================
         MOBILE OVERLAY
    ====================================================== -->

    <div
        id="sidebarOverlay"
        class="sidebar-overlay"
        onclick="closeSidebar()"
    ></div>


    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main class="main-content">


        <!-- =================================================
             TOPBAR
        ================================================== -->

        <header class="topbar">


            <div class="topbar-left">


                <button
                    type="button"
                    class="mobile-menu-button"
                    onclick="toggleSidebar()"
                >

                    ☰

                </button>


                <div class="page-title">

                    @yield(
                        'page-title',
                        'CRM Dashboard'
                    )

                </div>


            </div>


            <!-- USER -->

            <div class="topbar-right">


                @auth


                    <div class="user-area">


                        <div class="user-avatar">

                            {{ strtoupper(
                                substr(
                                    Auth::user()->name,
                                    0,
                                    1
                                )
                            ) }}

                        </div>


                        <div class="user-details">


                            <div class="user-name">

                                {{ Auth::user()->name }}

                            </div>


                            <div class="user-role">

                                {{ ucfirst(
                                    Auth::user()->role
                                    ?? 'User'
                                ) }}

                            </div>


                        </div>


                    </div>


                    <form
                        action="{{ route('logout') }}"
                        method="POST"
                    >

                        @csrf


                        <button
                            type="submit"
                            class="logout-button"
                        >

                            Logout

                        </button>


                    </form>


                @else


                    <a
                        href="{{ route('login') }}"
                        class="logout-button"
                    >

                        Login

                    </a>


                @endauth


            </div>


        </header>


        <!-- =================================================
             PAGE CONTENT
        ================================================== -->

        <section class="page-content">


            {{-- VALIDATION ERRORS --}}

            @if($errors->any())


                <div class="alert alert-error">


                    <strong>
                        An error occurred:
                    </strong>


                    <ul
                        style="
                            margin-top:8px;
                            padding-left:20px;
                        "
                    >


                        @foreach(
                            $errors->all()
                            as $error
                        )

                            <li>

                                {{ $error }}

                            </li>

                        @endforeach


                    </ul>


                </div>


            @endif


            @yield('content')


        </section>


    </main>


</div>


<!-- =====================================================
     TOAST NOTIFICATION
====================================================== -->

<div
    id="toastContainer"
    class="toast-container"
>


    @if(session('success'))


        <div
            class="toast toast-success"
            data-toast
        >


            <div class="toast-icon">


                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <path
                        d="M20 6L9 17l-5-5"
                    />

                </svg>


            </div>


            <div class="toast-content">


                <div class="toast-title">

                    Success

                </div>


                <div class="toast-message">

                    {{ session('success') }}

                </div>


            </div>


            <button
                type="button"
                class="toast-close"
                onclick="closeToast(this.closest('.toast'))"
            >

                ×

            </button>


            <div class="toast-progress"></div>


        </div>


    @endif


    @if(session('error'))


        <div
            class="toast toast-error"
            data-toast
        >


            <div class="toast-icon">


                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <circle
                        cx="12"
                        cy="12"
                        r="9"
                    />

                    <path d="M12 8v4"/>

                    <path d="M12 16h.01"/>

                </svg>


            </div>


            <div class="toast-content">


                <div class="toast-title">

                    Failed

                </div>


                <div class="toast-message">

                    {{ session('error') }}

                </div>


            </div>


            <button
                type="button"
                class="toast-close"
                onclick="closeToast(this.closest('.toast'))"
            >

                ×

            </button>


            <div class="toast-progress"></div>


        </div>


    @endif


</div>


<!-- =====================================================
     JAVASCRIPT
====================================================== -->

<script>

    /* =====================================================
       SIDEBAR
    ===================================================== */

    function toggleSidebar()
    {

        const sidebar =
            document.getElementById(
                'sidebar'
            );


        const overlay =
            document.getElementById(
                'sidebarOverlay'
            );


        sidebar.classList.toggle(
            'show'
        );


        overlay.classList.toggle(
            'show'
        );

    }


    function closeSidebar()
    {

        const sidebar =
            document.getElementById(
                'sidebar'
            );


        const overlay =
            document.getElementById(
                'sidebarOverlay'
            );


        sidebar.classList.remove(
            'show'
        );


        overlay.classList.remove(
            'show'
        );

    }


    document
        .querySelectorAll(
            '.sidebar-menu a'
        )
        .forEach(
            function(link)
            {

                link.addEventListener(
                    'click',
                    function()
                    {

                        closeSidebar();

                    }
                );

            }
        );


    window.addEventListener(
        'resize',
        function()
        {

            if (
                window.innerWidth > 900
            ) {

                closeSidebar();

            }

        }
    );


    /* =====================================================
       TOAST
    ===================================================== */

    function closeToast(toast)
    {

        if (!toast) {
            return;
        }


        toast.classList.add(
            'toast-hide'
        );


        setTimeout(
            function()
            {

                if (toast) {

                    toast.remove();

                }

            },
            300
        );

    }


    document.addEventListener(
        'DOMContentLoaded',
        function()
        {

            const toasts =
                document.querySelectorAll(
                    '[data-toast]'
                );


            toasts.forEach(
                function(toast)
                {

                    setTimeout(
                        function()
                        {

                            closeToast(
                                toast
                            );

                        },
                        4000
                    );

                }
            );

        }
    );

</script>


@yield('scripts')


</body>

</html>