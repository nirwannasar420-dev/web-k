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
           SIDEBAR NAVIGATION
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

            padding:
                20px 12px 15px;

        }


        /* =====================================================
           SECTION TITLE
        ===================================================== */

        .sidebar-section-title {

            padding:
                0 13px;

            margin:
                2px 0 9px;

            color:
                rgba(255,255,255,.48);

            font-size:
                9px;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                1px;

        }

        .sidebar-section-title.management {
            margin-top: 22px;
        }


        /* =====================================================
           DIVIDER
        ===================================================== */

        .sidebar-section-divider {

            height: 1px;

            margin:
                8px 12px 18px;

            background:
                rgba(255,255,255,.11);

        }


        /* =====================================================
           SIDEBAR MENU
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

            padding:
                10px 13px;

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

        .sidebar-menu a:hover {

            background:
                rgba(255,255,255,.09);

            color:
                #FFFFFF;

            transform:
                translateX(2px);

        }

        .sidebar-menu a.active {

            background:
                #FFFFFF;

            color:
                #0B2A6F;

            font-weight:
                700;

            box-shadow:
                0 5px 14px
                rgba(0,0,0,.12);

            transform:
                none;

        }

        .sidebar-menu a.active::before {

            content: '';

            position: absolute;

            left: 0;

            top: 8px;
            bottom: 8px;

            width: 4px;

            background:
                #E30613;

            border-radius:
                0 5px 5px 0;

        }

        .sidebar-menu a.active:hover {

            background:
                #FFFFFF;

            color:
                #0B2A6F;

            transform:
                none;

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

            min-height:
                100vh;

        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {

            height: 72px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding:
                0 30px;

            background:
                #0B2A6F;

            border-bottom:
                1px solid #071D4D;

            position:
                sticky;

            top: 0;

            z-index:
                900;

            box-shadow:
                0 3px 10px
                rgba(7,29,77,.12);

        }

        .topbar-left {

            display: flex;

            align-items: center;

            gap:
                12px;

        }

        .page-title {

            color:
                #FFFFFF;

            font-size:
                19px;

            font-weight:
                700;

        }


        /* =====================================================
           USER AREA
        ===================================================== */

        .topbar-right {

            display: flex;

            align-items: center;

            gap:
                15px;

        }

        .user-area {

            display: flex;

            align-items: center;

            gap:
                10px;

        }

        .user-avatar {

            width:
                36px;

            height:
                36px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius:
                50%;

            background:
                rgba(255,255,255,.14);

            border:
                1px solid
                rgba(255,255,255,.22);

            color:
                #FFFFFF;

            font-size:
                13px;

            font-weight:
                700;

        }

        .user-details {
            line-height: 1.2;
        }

        .user-name {

            color:
                #FFFFFF;

            font-size:
                12px;

            font-weight:
                700;

        }

        .user-role {

            margin-top:
                3px;

            color:
                rgba(255,255,255,.62);

            font-size:
                10px;

        }


        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout-button {

            padding:
                8px 13px;

            background:
                #FFFFFF;

            border:
                1px solid
                rgba(255,255,255,.65);

            border-radius:
                8px;

            color:
                #0B2A6F;

            font-size:
                11px;

            font-weight:
                700;

            cursor:
                pointer;

            transition:
                .2s ease;

        }

        .logout-button:hover {

            background:
                #E8EEF9;

            border-color:
                #E8EEF9;

            color:
                #071D4D;

        }


        /* =====================================================
           PAGE CONTENT
        ===================================================== */

        .page-content {

            padding:
                30px;

        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert {

            padding:
                12px 15px;

            border-radius:
                9px;

            margin-bottom:
                20px;

            font-size:
                13px;

        }

        .alert-error {

            background:
                #FCE8E6;

            color:
                var(--danger);

            border:
                1px solid #F5B8B3;

        }


        /* =====================================================
           TOAST
        ===================================================== */

        .toast-container {

            position:
                fixed;

            top:
                88px;

            right:
                25px;

            z-index:
                99999;

            display:
                flex;

            flex-direction:
                column;

            gap:
                10px;

            width:
                min(
                    380px,
                    calc(100vw - 30px)
                );

            pointer-events:
                none;

        }

        .toast {

            position:
                relative;

            display:
                flex;

            align-items:
                flex-start;

            gap:
                12px;

            width:
                100%;

            padding:
                14px 15px;

            background:
                #FFFFFF;

            border:
                1px solid #E2E8F0;

            border-radius:
                13px;

            box-shadow:
                0 12px 30px
                rgba(15,23,42,.14);

            pointer-events:
                auto;

            overflow:
                hidden;

            opacity:
                0;

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

        .toast-icon {

            width:
                36px;

            height:
                36px;

            flex-shrink:
                0;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border-radius:
                10px;

        }

        .toast-icon svg {

            width:
                19px;

            height:
                19px;

        }

        .toast-success .toast-icon {

            background:
                #E7F6EF;

            color:
                #159A6C;

        }

        .toast-error .toast-icon {

            background:
                #FDEBED;

            color:
                #E30613;

        }

        .toast-content {

            flex:
                1;

            min-width:
                0;

            padding-top:
                1px;

        }

        .toast-title {

            color:
                #172033;

            font-size:
                12px;

            font-weight:
                800;

            line-height:
                1.3;

        }

        .toast-message {

            margin-top:
                4px;

            color:
                #64748B;

            font-size:
                11px;

            line-height:
                1.45;

        }

        .toast-close {

            width:
                25px;

            height:
                25px;

            flex-shrink:
                0;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border:
                none;

            background:
                transparent;

            color:
                #94A3B8;

            border-radius:
                6px;

            cursor:
                pointer;

            font-size:
                17px;

            line-height:
                1;

        }

        .toast-close:hover {

            background:
                #F1F5F9;

            color:
                #475569;

        }

        .toast-progress {

            position:
                absolute;

            left: 0;
            right: 0;
            bottom: 0;

            height:
                3px;

            transform-origin:
                left;

            animation:
                toastProgress
                4s linear
                forwards;

        }

        .toast-success .toast-progress {
            background:
                #159A6C;
        }

        .toast-error .toast-progress {
            background:
                #E30613;
        }


        /* =====================================================
           TOAST ANIMATION
        ===================================================== */

        @keyframes toastIn {

            from {

                opacity:
                    0;

                transform:
                    translateX(30px);

            }

            to {

                opacity:
                    1;

                transform:
                    translateX(0);

            }

        }

        @keyframes toastOut {

            from {

                opacity:
                    1;

                transform:
                    translateX(0);

            }

            to {

                opacity:
                    0;

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
           MOBILE MENU BUTTON
        ===================================================== */

        .mobile-menu-button {

            display:
                none;

            width:
                38px;

            height:
                38px;

            align-items:
                center;

            justify-content:
                center;

            border:
                1px solid
                rgba(255,255,255,.25);

            background:
                rgba(255,255,255,.10);

            color:
                #FFFFFF;

            border-radius:
                8px;

            cursor:
                pointer;

            font-size:
                18px;

        }

        .mobile-menu-button:hover {

            background:
                rgba(255,255,255,.17);

        }


        /* =====================================================
           OVERLAY
        ===================================================== */

        .sidebar-overlay {

            display:
                none;

            position:
                fixed;

            inset:
                0;

            background:
                rgba(15,23,42,.42);

            z-index:
                999;

        }

        .sidebar-overlay.show {
            display:
                block;
        }


        /* =====================================================
           SCROLLBAR
        ===================================================== */

        .sidebar::-webkit-scrollbar {
            width:
                5px;
        }

        .sidebar::-webkit-scrollbar-track {
            background:
                #09245F;
        }

        .sidebar::-webkit-scrollbar-thumb {

            background:
                rgba(255,255,255,.22);

            border-radius:
                99px;

        }


        /* =====================================================
           DESKTOP/GENERAL RESPONSIVE
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

                width:
                    100%;

                margin-left:
                    0;

            }

            .mobile-menu-button {

                display:
                    inline-flex;

            }

            .topbar {

                padding:
                    0 20px;

            }

            .page-content {

                padding:
                    20px;

            }

            .toast-container {

                top:
                    78px;

                right:
                    15px;

                width:
                    calc(100vw - 30px);

            }

        }


    </style>


    {{-- PAGE-SPECIFIC STYLES --}}
    @yield('styles')


    {{-- =====================================================
         MOBILE ONLY
         Desktop is intentionally untouched.
    ====================================================== --}}

    <style>

        @media (max-width: 600px) {

            /* =================================================
               GLOBAL
            ================================================= */

            html,
            body {

                width:
                    100%;

                max-width:
                    100%;

                overflow-x:
                    hidden;

            }

            body {

                background:
                    #F1F5F9;

                -webkit-font-smoothing:
                    antialiased;

            }

            .app-layout {

                width:
                    100%;

                min-height:
                    100vh;

            }

            .main-content {

                width:
                    100%;

                margin-left:
                    0;

                min-width:
                    0;

            }


            /* =================================================
               MOBILE TOPBAR
            ================================================= */

            .topbar {

                height:
                    68px;

                min-height:
                    68px;

                padding:
                    0 14px;

                gap:
                    10px;

                box-shadow:
                    0 4px 16px
                    rgba(7,29,77,.16);

            }

            .topbar-left {

                min-width:
                    0;

                flex:
                    1;

                display:
                    flex;

                align-items:
                    center;

                gap:
                    10px;

            }

            .mobile-menu-button {

                width:
                    42px;

                height:
                    42px;

                min-width:
                    42px;

                border-radius:
                    11px;

                border:
                    1px solid
                    rgba(255,255,255,.26);

                background:
                    rgba(255,255,255,.10);

                font-size:
                    21px;

                line-height:
                    1;

                flex-shrink:
                    0;

                -webkit-tap-highlight-color:
                    transparent;

            }

            .mobile-menu-button:active {

                transform:
                    scale(.95);

                background:
                    rgba(255,255,255,.17);

            }

            .page-title {

                min-width:
                    0;

                max-width:
                    100%;

                overflow:
                    hidden;

                white-space:
                    nowrap;

                text-overflow:
                    ellipsis;

                font-size:
                    18px;

            }


            /* =================================================
               USER
            ================================================= */

            .topbar-right {

                gap:
                    8px;

                flex-shrink:
                    0;

            }

            .user-details {

                display:
                    none !important;

            }

            .user-avatar {

                width:
                    42px;

                height:
                    42px;

                min-width:
                    42px;

                font-size:
                    14px;

            }

            .logout-button {

                min-width:
                    78px;

                height:
                    42px;

                padding:
                    0 13px;

                display:
                    inline-flex;

                align-items:
                    center;

                justify-content:
                    center;

                border-radius:
                    10px;

                font-size:
                    12px;

            }


            /* =================================================
               SIDEBAR
            ================================================= */

            .sidebar {

                width:
                    268px;

                max-width:
                    calc(100vw - 42px);

                box-shadow:
                    14px 0 38px
                    rgba(7,29,77,.25);

                overscroll-behavior:
                    contain;

            }

            .sidebar-overlay {

                background:
                    rgba(15,23,42,.54);

                backdrop-filter:
                    blur(2px);

                -webkit-backdrop-filter:
                    blur(2px);

            }

            .brand {

                height:
                    108px;

                padding:
                    10px;

            }

            .brand-link {

                width:
                    215px;

                height:
                    76px;

            }

            .brand-logo-image {

                width:
                    285px;

                height:
                    285px;

                left:
                    -35px;

                top:
                    -104px;

            }

            .sidebar-navigation {

                padding:
                    18px 10px 20px;

            }

            .sidebar-section-title {

                padding:
                    0 13px;

                margin:
                    2px 0 10px;

                font-size:
                    10px;

                letter-spacing:
                    1.1px;

            }

            .sidebar-menu li {

                margin-bottom:
                    5px;

            }

            .sidebar-menu a {

                min-height:
                    47px;

                padding:
                    10px 14px;

                gap:
                    12px;

                border-radius:
                    10px;

            }

            .menu-icon {

                width:
                    22px;

                height:
                    22px;

            }

            .menu-icon svg {

                width:
                    19px;

                height:
                    19px;

            }

            .menu-label {

                font-size:
                    15px;

            }


            /* =================================================
               PAGE CONTENT
            ================================================= */

            .page-content {

                width:
                    100%;

                max-width:
                    540px;

                margin:
                    0 auto;

                padding:
                    20px 15px 34px;

                min-width:
                    0;

            }


            /* =================================================
               GENERAL HEADINGS
            ================================================= */

            .page-content h1 {

                max-width:
                    100%;

                line-height:
                    1.12;

            }


            .page-content p {

                max-width:
                    100%;

                line-height:
                    1.55;

            }


            /* =================================================
               FORM CONTROLS
            ================================================= */

            .page-content input,
            .page-content select,
            .page-content textarea {

                min-height:
                    46px;

                font-size:
                    15px;

                border-radius:
                    10px;

            }


            .page-content textarea {

                min-height:
                    110px;

            }


            /* =================================================
               GENERAL BUTTON
            ================================================= */

            .page-content a,
            .page-content button {

                -webkit-tap-highlight-color:
                    transparent;

            }


            /* =================================================
               CUSTOMERS
            ================================================= */

            .customers-page {

                width:
                    100%;

                min-width:
                    0;

            }

            .customers-header {

                width:
                    100%;

                flex-direction:
                    column;

                align-items:
                    stretch;

                gap:
                    14px;

                margin-bottom:
                    18px;

            }

            .customers-header-left h1 {

                font-size:
                    32px;

                line-height:
                    1.1;

            }

            .customers-header-left p {

                font-size:
                    14px;

                line-height:
                    1.5;

            }

            .btn-add-customer {

                width:
                    100%;

                height:
                    48px;

                border-radius:
                    11px;

                font-size:
                    14px;

                box-shadow:
                    0 5px 14px
                    rgba(11,42,111,.14);

            }

            .btn-add-customer svg {

                width:
                    18px;

                height:
                    18px;

            }

            .customers-card {

                width:
                    100%;

                border-radius:
                    17px;

                box-shadow:
                    0 5px 20px
                    rgba(15,23,42,.06);

            }

            .customers-toolbar {

                display:
                    flex;

                flex-direction:
                    column;

                gap:
                    10px;

                padding:
                    15px;

            }

            .search-wrapper {

                width:
                    100%;

            }

            .search-input {

                width:
                    100%;

                height:
                    48px;

                font-size:
                    14px;

                border-radius:
                    10px;

            }

            .btn-search {

                width:
                    100%;

                height:
                    46px;

                border-radius:
                    10px;

                font-size:
                    14px;

            }


            /* =================================================
               CUSTOMER TABLE -> MOBILE CARDS
            ================================================= */

            .table-wrapper {

                width:
                    100%;

                padding:
                    10px;

                overflow:
                    visible;

            }

            .customers-table {

                width:
                    100%;

                min-width:
                    0;

                display:
                    block;

                border-collapse:
                    separate;

            }

            .customers-table thead {

                display:
                    none;

            }

            .customers-table tbody {

                display:
                    block;

                width:
                    100%;

            }

            .customers-table tbody tr {

                display:
                    block;

                width:
                    100%;

                margin-bottom:
                    12px;

                padding:
                    15px;

                background:
                    #FFFFFF;

                border:
                    1px solid #E2E8F0;

                border-radius:
                    14px;

                box-shadow:
                    0 4px 12px
                    rgba(15,23,42,.045);

            }

            .customers-table tbody tr:last-child {

                margin-bottom:
                    0;

            }

            .customers-table td {

                display:
                    flex;

                align-items:
                    center;

                justify-content:
                    space-between;

                gap:
                    12px;

                width:
                    100%;

                padding:
                    7px 0;

                border:
                    none;

                text-align:
                    right;

                font-size:
                    13px;

            }

            .customers-table td:first-child {

                display:
                    block;

                padding:
                    0 0 12px;

                margin-bottom:
                    4px;

                text-align:
                    left;

                border-bottom:
                    1px solid #EEF2F6;

            }

            .customer-info {

                width:
                    100%;

                min-width:
                    0;

                display:
                    flex;

                align-items:
                    center;

                gap:
                    11px;

            }

            .customer-avatar {

                width:
                    42px;

                height:
                    42px;

                min-width:
                    42px;

                border-radius:
                    11px;

                font-size:
                    13px;

            }

            .customer-name {

                min-width:
                    0;

                overflow:
                    hidden;

                text-overflow:
                    ellipsis;

                white-space:
                    nowrap;

                font-size:
                    14px;

                font-weight:
                    700;

            }

            .customers-table td:nth-child(2)::before {

                content:
                    "Company";

                color:
                    #94A3B8;

                font-size:
                    11px;

                font-weight:
                    600;

                flex-shrink:
                    0;

            }

            .company-text {

                max-width:
                    62%;

                overflow:
                    hidden;

                text-overflow:
                    ellipsis;

                white-space:
                    nowrap;

                color:
                    #475569;

            }

            .customers-table td:nth-child(3)::before {

                content:
                    "Email";

                color:
                    #94A3B8;

                font-size:
                    11px;

                font-weight:
                    600;

                flex-shrink:
                    0;

            }

            .email-text {

                max-width:
                    62%;

                overflow:
                    hidden;

                text-overflow:
                    ellipsis;

                white-space:
                    nowrap;

            }

            .customers-table td:nth-child(4)::before {

                content:
                    "Phone";

                color:
                    #94A3B8;

                font-size:
                    11px;

                font-weight:
                    600;

                flex-shrink:
                    0;

            }

            .customers-table td:nth-child(5) {

                display:
                    block;

                padding:
                    12px 0 0;

                margin-top:
                    5px;

                border-top:
                    1px solid #EEF2F6;

            }

            .actions {

                display:
                    grid;

                grid-template-columns:
                    repeat(3, 1fr);

                gap:
                    7px;

                width:
                    100%;

            }

            .action-btn {

                width:
                    100%;

                height:
                    38px;

                padding:
                    0 5px;

                border-radius:
                    8px;

                font-size:
                    11px;

            }


            /* =================================================
               DASHBOARD
            ================================================= */

            .dashboard-page {

                width:
                    100%;

                min-width:
                    0;

            }

            .dashboard-top {

                display:
                    flex;

                flex-direction:
                    column;

                align-items:
                    flex-start;

                gap:
                    8px;

                margin-bottom:
                    18px;

            }

            .dashboard-top h1 {

                margin-bottom:
                    7px;

                font-size:
                    32px;

                line-height:
                    1.1;

            }

            .dashboard-top p {

                font-size:
                    14px;

            }

            .today-label {

                display:
                    inline-flex;

                align-items:
                    center;

                min-height:
                    32px;

                padding:
                    0 11px;

                margin-top:
                    2px;

                background:
                    #E8EEF9;

                border:
                    1px solid #D8E2F4;

                border-radius:
                    8px;

                color:
                    #0B2A6F;

                font-size:
                    11px;

                font-weight:
                    600;

                white-space:
                    nowrap;

            }

            .stats-grid {

                width:
                    100%;

                grid-template-columns:
                    1fr !important;

                gap:
                    13px;

                margin-bottom:
                    18px;

            }

            .stat-card {

                width:
                    100%;

                min-width:
                    0;

                min-height:
                    126px;

                padding:
                    17px 17px 16px 20px;

                border-radius:
                    15px;

                box-shadow:
                    0 4px 14px
                    rgba(15,23,42,.055);

            }

            .stat-card::before {

                width:
                    4px;

            }

            .stat-top {

                margin-bottom:
                    12px;

            }

            .stat-title {

                font-size:
                    13px;

            }

            .stat-subtitle {

                font-size:
                    11px;

            }

            .stat-icon {

                width:
                    43px;

                height:
                    43px;

                min-width:
                    43px;

                border-radius:
                    11px;

            }

            .stat-value {

                font-size:
                    34px;

            }

            .stat-value.revenue {

                font-size:
                    19px;

            }


            /* =================================================
               DASHBOARD CARDS
            ================================================= */

            .dashboard-grid {

                width:
                    100%;

                grid-template-columns:
                    1fr !important;

                gap:
                    14px;

                margin-bottom:
                    16px;

            }

            .dashboard-card,
            .table-card {

                width:
                    100%;

                min-width:
                    0;

                padding:
                    17px;

                border-radius:
                    15px;

            }

            .card-header {

                margin-bottom:
                    15px;

            }

            .card-header h3 {

                font-size:
                    15px;

            }


            /* =================================================
               DASHBOARD PIPELINE
            ================================================= */

            .pipeline-wrapper {

                width:
                    100%;

                overflow-x:
                    auto;

                -webkit-overflow-scrolling:
                    touch;

            }

            .pipeline {

                min-width:
                    590px;

            }


            /* =================================================
               SUMMARY
            ================================================= */

            .summary-list {

                gap:
                    8px;

            }

            .summary-item {

                padding:
                    11px 12px;

                border-radius:
                    10px;

            }


            /* =================================================
               TOAST MOBILE
            ================================================= */

            .toast-container {

                top:
                    78px;

                left:
                    12px;

                right:
                    12px;

                width:
                    auto;

            }

            .toast {

                border-radius:
                    12px;

            }


            /* =================================================
               DELETE MODAL
            ================================================= */

            .delete-modal {

                padding:
                    16px;

            }

            .delete-modal-box {

                width:
                    100%;

                max-width:
                    390px;

                padding:
                    23px 18px;

                border-radius:
                    16px;

            }

            .delete-actions {

                width:
                    100%;

                gap:
                    8px;

            }

            .cancel-delete,
            .confirm-delete {

                flex:
                    1;

                height:
                    42px;

            }

        }


        /* =====================================================
           VERY SMALL PHONES
        ===================================================== */

        @media (max-width: 380px) {

            .topbar {

                padding:
                    0 10px;

            }

            .mobile-menu-button {

                width:
                    39px;

                height:
                    39px;

                min-width:
                    39px;

            }

            .page-title {

                font-size:
                    17px;

            }

            .user-avatar {

                width:
                    39px;

                height:
                    39px;

                min-width:
                    39px;

            }

            .logout-button {

                min-width:
                    70px;

                height:
                    40px;

                padding:
                    0 10px;

            }

            .sidebar {

                width:
                    250px;

            }

            .page-content {

                padding:
                    19px 13px 30px;

            }

            .customers-table tbody tr {

                padding:
                    14px;

            }

            .action-btn {

                font-size:
                    10px;

            }

        }

    </style>

    <style>

/* =========================================================
   MOBILE FIX
   LEADS / OPPORTUNITIES / ACTIVITIES / USERS ONLY

   CUSTOMERS / DASHBOARD / PRODUCTS / SALES RESUME /
   REPORTS ARE NOT CHANGED
========================================================= */

@media (max-width: 600px) {

    /* =====================================================
       COMMON
    ===================================================== */

    .leads-page,
    .opportunities-page,
    .activities-page,
    .users-page {
        width: 100%;
        min-width: 0;
        overflow: visible;
    }


    /* =====================================================
       COMMON TABLE WRAPPER
    ===================================================== */

    .leads-page .table-wrapper,
    .opportunities-page .table-wrapper,
    .activities-page .table-wrapper,
    .users-page .table-wrapper {
        width: 100%;
        overflow: visible !important;
        padding: 10px;
    }


    /* =====================================================
       COMMON TABLE RESET
    ===================================================== */

    .leads-table,
    .opportunities-table,
    .activities-table,
    .users-table {
        width: 100% !important;
        min-width: 0 !important;
        max-width: 100% !important;
        display: block !important;
        border-collapse: separate !important;
        border-spacing: 0 !important;
        table-layout: auto !important;
    }


    .leads-table thead,
    .opportunities-table thead,
    .activities-table thead,
    .users-table thead {
        display: none !important;
    }


    .leads-table tbody,
    .opportunities-table tbody,
    .activities-table tbody,
    .users-table tbody {
        display: block !important;
        width: 100% !important;
    }


    /* =====================================================
       COMMON ROW -> CARD
    ===================================================== */

    .leads-table tbody tr,
    .opportunities-table tbody tr,
    .activities-table tbody tr,
    .users-table tbody tr {
        display: block !important;
        width: 100% !important;
        min-width: 0 !important;
        margin: 0 0 12px !important;
        padding: 15px !important;
        background: #FFFFFF !important;
        border: 1px solid #E2E8F0 !important;
        border-radius: 14px !important;
        box-shadow: 0 4px 12px rgba(15,23,42,.045) !important;
        overflow: hidden !important;
    }


    .leads-table tbody tr:last-child,
    .opportunities-table tbody tr:last-child,
    .activities-table tbody tr:last-child,
    .users-table tbody tr:last-child {
        margin-bottom: 0 !important;
    }


    /* =====================================================
       COMMON CELL
    ===================================================== */

    .leads-table td,
    .opportunities-table td,
    .activities-table td,
    .users-table td {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        gap: 12px !important;

        width: 100% !important;
        min-width: 0 !important;

        padding: 8px 0 !important;

        border: none !important;

        font-size: 13px !important;
        line-height: 1.4 !important;

        vertical-align: middle !important;

        text-align: right !important;

        white-space: normal !important;

        overflow: visible !important;
    }


    /* =====================================================
       FIRST CELL
       MAIN INFORMATION
    ===================================================== */

    .leads-table td:first-child,
    .opportunities-table td:first-child,
    .activities-table td:first-child,
    .users-table td:first-child {
        display: block !important;

        padding: 0 0 12px !important;
        margin-bottom: 4px !important;

        text-align: left !important;

        border-bottom: 1px solid #EEF2F6 !important;
    }


    /* =====================================================
       LAST CELL / ACTIONS
    ===================================================== */

    .leads-table td:last-child,
    .opportunities-table td:last-child,
    .activities-table td:last-child,
    .users-table td:last-child {
        display: block !important;

        padding: 12px 0 0 !important;
        margin-top: 5px !important;

        border-top: 1px solid #EEF2F6 !important;

        text-align: left !important;
    }


    /* =====================================================
       LEADS
    ===================================================== */

    .leads-header {
        width: 100%;
        display: flex !important;
        flex-direction: column !important;
        align-items: stretch !important;
        gap: 14px !important;
        margin-bottom: 18px !important;
    }


    .leads-header-left h1 {
        font-size: 32px !important;
        line-height: 1.1 !important;
        margin-bottom: 7px !important;
    }


    .leads-header-left p {
        font-size: 14px !important;
        line-height: 1.5 !important;
    }


    .btn-add-lead {
        width: 100% !important;
        min-height: 48px !important;
        height: 48px !important;

        justify-content: center !important;

        border-radius: 11px !important;
        font-size: 14px !important;
    }


    .leads-toolbar {
        width: 100%;
        display: flex !important;
        flex-direction: column !important;
        align-items: stretch !important;
        gap: 10px !important;
    }


    .leads-toolbar .search-wrapper,
    .leads-toolbar .status-select,
    .leads-toolbar .btn-search {
        width: 100% !important;
    }


    .leads-toolbar .search-input {
        width: 100% !important;
        min-height: 48px !important;
    }


    .leads-table tbody tr {
        padding: 15px !important;
    }


    .lead-info {
        width: 100%;
        min-width: 0;

        display: flex;
        align-items: center;

        gap: 11px;
    }


    .lead-avatar {
        width: 42px !important;
        height: 42px !important;
        min-width: 42px !important;

        border-radius: 11px !important;
    }


    .lead-name {
        min-width: 0;

        overflow-wrap: anywhere;
        word-break: break-word;

        font-size: 14px !important;
        line-height: 1.35 !important;
        font-weight: 700;
    }


    .leads-table td:nth-child(2)::before {
        content: "Contact";
    }


    .leads-table td:nth-child(3)::before {
        content: "Email";
    }


    .leads-table td:nth-child(4)::before {
        content: "Source";
    }


    .leads-table td:nth-child(5)::before {
        content: "Status";
    }


    .leads-table td:nth-child(2)::before,
    .leads-table td:nth-child(3)::before,
    .leads-table td:nth-child(4)::before,
    .leads-table td:nth-child(5)::before {
        color: #94A3B8;
        font-size: 11px;
        font-weight: 600;
        flex-shrink: 0;
        text-align: left;
    }


    .contact-text,
    .email-text,
    .source-text {
        min-width: 0;
        max-width: 68%;

        overflow-wrap: anywhere;
        word-break: break-word;

        color: #475569;
        text-align: right;
    }


    .leads-table .actions {
        width: 100% !important;

        display: grid !important;
        grid-template-columns: repeat(3, 1fr) !important;

        gap: 7px !important;
    }


    .leads-table .action-btn {
        width: 100% !important;
        height: 38px !important;
        padding: 0 6px !important;

        border-radius: 8px !important;

        font-size: 11px !important;
    }


    /* =====================================================
       OPPORTUNITIES
    ===================================================== */

    .opportunities-header {
        width: 100%;
        display: flex !important;
        flex-direction: column !important;
        align-items: stretch !important;
        gap: 14px !important;
        margin-bottom: 18px !important;
    }


    .opportunities-header-left h1 {
        font-size: 32px !important;
        line-height: 1.1 !important;
        margin-bottom: 7px !important;
    }


    .opportunities-header-left p {
        font-size: 14px !important;
        line-height: 1.5 !important;
    }


    .btn-add-opportunity {
        width: 100% !important;
        min-height: 48px !important;
        height: 48px !important;

        justify-content: center !important;

        border-radius: 11px !important;

        font-size: 14px !important;
    }


    .opportunities-toolbar {
        width: 100%;

        display: flex !important;
        flex-direction: column !important;

        align-items: stretch !important;

        gap: 10px !important;
    }


    .opportunities-toolbar .search-wrapper,
    .opportunities-toolbar .stage-filter,
    .opportunities-toolbar .btn-search {
        width: 100% !important;
    }


    .opportunities-toolbar .search-input {
        width: 100% !important;
        min-height: 48px !important;
    }


    .opportunities-table tbody tr {
        padding: 15px !important;
    }


    .opportunity-info {
        width: 100% !important;
        min-width: 0 !important;
    }


    .opportunity-name {
        min-width: 0;

        white-space: normal !important;

        overflow-wrap: anywhere !important;
        word-break: break-word !important;

        font-size: 14px !important;
        line-height: 1.4 !important;
        font-weight: 700 !important;
    }


    .opportunity-id {
        margin-top: 4px !important;

        font-size: 11px !important;
        color: #94A3B8 !important;
    }


    .opportunities-table td:nth-child(2)::before {
        content: "Customer";
    }


    .opportunities-table td:nth-child(3)::before {
        content: "Stage";
    }


    .opportunities-table td:nth-child(4)::before {
        content: "Revenue";
    }


    .opportunities-table td:nth-child(5)::before {
        content: "Rating";
    }


    .opportunities-table td:nth-child(6)::before {
        content: "Date";
    }


    .opportunities-table td:nth-child(2)::before,
    .opportunities-table td:nth-child(3)::before,
    .opportunities-table td:nth-child(4)::before,
    .opportunities-table td:nth-child(5)::before,
    .opportunities-table td:nth-child(6)::before {
        color: #94A3B8;
        font-size: 11px;
        font-weight: 600;
        flex-shrink: 0;
        text-align: left;
    }


    .opportunities-table .customer-info {
        min-width: 0 !important;

        display: flex;
        align-items: center;

        gap: 10px;
    }


    .opportunities-table .customer-avatar {
        width: 40px !important;
        height: 40px !important;
        min-width: 40px !important;

        border-radius: 11px !important;
    }


    .opportunities-table .customer-name,
    .opportunities-table .customer-company {
        max-width: 100% !important;

        overflow-wrap: anywhere !important;
        word-break: break-word !important;

        white-space: normal !important;
    }


    .opportunities-table .revenue {
        white-space: normal !important;
        text-align: right !important;
        font-size: 13px !important;
    }


    .opportunities-table .rating {
        white-space: nowrap !important;
        font-size: 14px !important;
    }


    .opportunities-table .date-text {
        white-space: normal !important;
    }


    .opportunities-table .actions {
        width: 100% !important;

        display: grid !important;
        grid-template-columns: repeat(2, 1fr) !important;

        gap: 7px !important;
    }


    .opportunities-table .action-btn {
        width: 100% !important;
        height: 38px !important;

        padding: 0 7px !important;

        border-radius: 8px !important;

        font-size: 11px !important;
    }


    /* =====================================================
       ACTIVITIES
    ===================================================== */

    .activities-page {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }


    .activities-header {
        width: 100%;

        display: flex !important;
        flex-direction: column !important;
        align-items: stretch !important;

        gap: 14px !important;
        margin-bottom: 18px !important;
    }


    .activities-title h1 {
        font-size: 32px !important;
        line-height: 1.1 !important;
    }


    .activities-title p {
        font-size: 14px !important;
        line-height: 1.5 !important;
    }


    .activities-header .btn-add {
        width: 100% !important;
        min-height: 48px !important;
        height: 48px !important;

        border-radius: 11px !important;
        font-size: 14px !important;
    }


    .activity-card {
        width: 100% !important;
        border-radius: 16px !important;
    }


    .activity-card .filter-area {
        padding: 16px !important;
    }


    .activity-card .filter-form {
        display: flex !important;
        flex-direction: column !important;

        gap: 10px !important;
    }


    .activity-card .form-group,
    .activity-card .btn-filter,
    .activity-card .form-control-custom,
    .activity-card .form-select-custom {
        width: 100% !important;
    }


    .activity-card .form-control-custom,
    .activity-card .form-select-custom {
        min-height: 46px !important;
    }


    .activities-table tbody tr {
        padding: 15px !important;

        min-height: 0 !important;
        height: auto !important;
    }


    .activities-table td:first-child {
        display: block !important;

        min-height: 0 !important;
        height: auto !important;
    }


    .activity-subject {
        white-space: normal !important;

        overflow-wrap: anywhere !important;
        word-break: break-word !important;

        font-size: 14px !important;
        line-height: 1.4 !important;
    }


    .activity-description {
        max-width: 100% !important;

        margin-top: 5px !important;

        white-space: normal !important;

        overflow: visible !important;
        text-overflow: clip !important;

        overflow-wrap: anywhere !important;
        word-break: break-word !important;

        font-size: 12px !important;
        line-height: 1.45 !important;
    }


    .activities-table td:nth-child(2)::before {
        content: "Opportunity";
    }


    .activities-table td:nth-child(3)::before {
        content: "Customer";
    }


    .activities-table td:nth-child(4)::before {
        content: "Date";
    }


    .activities-table td:nth-child(5)::before {
        content: "Status";
    }


    .activities-table td:nth-child(2)::before,
    .activities-table td:nth-child(3)::before,
    .activities-table td:nth-child(4)::before,
    .activities-table td:nth-child(5)::before {
        color: #94A3B8;

        font-size: 11px;
        font-weight: 600;

        flex-shrink: 0;

        text-align: left;
    }


    .activities-table td:nth-child(2) .opportunity-name,
    .activities-table td:nth-child(3) .customer-name {
        max-width: 68% !important;

        white-space: normal !important;

        overflow-wrap: anywhere !important;
        word-break: break-word !important;

        text-align: right !important;
    }


    .activities-table .date-text {
        max-width: 68% !important;

        white-space: normal !important;

        overflow-wrap: anywhere !important;
        word-break: break-word !important;

        text-align: right !important;
    }


    .activities-table .status-badge {
        flex-shrink: 0;
    }


    .activities-table .action-area {
        width: 100% !important;

        display: grid !important;
        grid-template-columns: repeat(3, 1fr) !important;

        gap: 7px !important;

        white-space: normal !important;
    }


    .activities-table .action-btn {
        width: 100% !important;
        height: 38px !important;

        padding: 0 5px !important;

        border-radius: 8px !important;

        font-size: 10px !important;
    }


    /* =====================================================
       USERS
    ===================================================== */

    .users-header {
        width: 100%;

        display: flex !important;
        flex-direction: column !important;
        align-items: stretch !important;

        gap: 14px !important;
        margin-bottom: 18px !important;
    }


    .users-header-left h1 {
        font-size: 32px !important;
        line-height: 1.1 !important;
    }


    .users-header-left p {
        font-size: 14px !important;
        line-height: 1.5 !important;
    }


    .users-header .btn {
        width: 100% !important;
        min-height: 48px !important;
        height: 48px !important;

        border-radius: 11px !important;

        font-size: 14px !important;
    }


    .users-table tbody tr {
        padding: 15px !important;
    }


    .user-info {
        width: 100% !important;
        min-width: 0 !important;

        display: flex !important;
        align-items: center !important;

        gap: 11px !important;
    }


    .users-table .user-avatar {
        width: 42px !important;
        height: 42px !important;
        min-width: 42px !important;

        border-radius: 11px !important;
    }


    .user-name {
        min-width: 0 !important;

        white-space: normal !important;

        overflow-wrap: anywhere !important;
        word-break: break-word !important;

        font-size: 14px !important;
        line-height: 1.35 !important;
        font-weight: 700 !important;
    }


    .users-table td:nth-child(2)::before {
        content: "Email";
    }


    .users-table td:nth-child(3)::before {
        content: "Role";
    }


    .users-table td:nth-child(4)::before {
        content: "Created";
    }


    .users-table td:nth-child(2)::before,
    .users-table td:nth-child(3)::before,
    .users-table td:nth-child(4)::before {
        color: #94A3B8;

        font-size: 11px;
        font-weight: 600;

        flex-shrink: 0;

        text-align: left;
    }


    .users-table .user-email {
        max-width: 68% !important;

        white-space: normal !important;

        overflow-wrap: anywhere !important;
        word-break: break-word !important;

        text-align: right !important;
    }


    .users-table .role-badge {
        flex-shrink: 0;
    }


    .users-table td:nth-child(4) {
        align-items: flex-start !important;
    }


    .users-table td:nth-child(4) {
        white-space: normal !important;
    }


    .users-table .actions {
        width: 100% !important;

        display: grid !important;
        grid-template-columns: repeat(3, 1fr) !important;

        gap: 7px !important;
    }


    .users-table .action-btn {
        width: 100% !important;

        height: 38px !important;

        padding: 0 6px !important;

        border-radius: 8px !important;

        font-size: 10px !important;
    }


    /* =====================================================
       EMPTY STATE
    ===================================================== */

    .leads-table .empty-row,
    .opportunities-table .empty-row,
    .activities-table .empty-row,
    .users-table .empty-row {
        display: block !important;
        width: 100% !important;
        padding: 0 !important;
    }

}


/* =========================================================
   EXTRA SMALL PHONE
========================================================= */

@media (max-width: 380px) {

    .leads-table tbody tr,
    .opportunities-table tbody tr,
    .activities-table tbody tr,
    .users-table tbody tr {
        padding: 13px !important;
    }


    .leads-table .action-btn,
    .opportunities-table .action-btn,
    .activities-table .action-btn,
    .users-table .action-btn {
        font-size: 9px !important;
    }


    .contact-text,
    .email-text,
    .source-text,
    .users-table .user-email {
        max-width: 64% !important;
    }

}

</style>

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
                            request()->routeIs('crm.dashboard')
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
                            request()->routeIs('crm.pipeline')
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
                            request()->routeIs('leads.*')
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
                            request()->routeIs('customers.*')
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
                        href="{{ route('opportunities.index') }}"
                        class="{{
                            request()->routeIs('opportunities.*')
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
                        href="{{ route('activities.index') }}"
                        class="{{
                            request()->routeIs('activities.*')
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


                <!-- SALES RESUME -->

                <li>

                    <a
                        href="{{ route('sales_resume.index') }}"
                        class="{{
                            request()->routeIs('sales_resume.*')
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

                @if(Auth::user()->role === 'admin')

                    <div class="sidebar-section-title management">
                        Management
                    </div>

                    <ul class="sidebar-menu">


                        <!-- REPORTS -->

                        <li>

                            <a
                                href="{{ route('reports.index') }}"
                                class="{{
                                    request()->routeIs('reports.*')
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

                                        <path d="M16 16v-9"/>

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
                                href="{{ route('users.index') }}"
                                class="{{
                                    request()->routeIs('users.*')
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
         MAIN CONTENT
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
                    aria-label="Open navigation menu"
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

                            {{
                                strtoupper(
                                    substr(
                                        Auth::user()->name,
                                        0,
                                        1
                                    )
                                )
                            }}

                        </div>


                        <div class="user-details">


                            <div class="user-name">

                                {{ Auth::user()->name }}

                            </div>


                            <div class="user-role">

                                {{
                                    ucfirst(
                                        Auth::user()->role
                                        ?? 'User'
                                    )
                                }}

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
                aria-label="Close notification"
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

                    <path
                        d="M12 8v4"
                    />

                    <path
                        d="M12 16h.01"
                    />

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
                aria-label="Close notification"
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


    /* =====================================================
       CLOSE SIDEBAR WHEN MENU IS CLICKED
    ===================================================== */

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


    /* =====================================================
       ESC KEY CLOSES MOBILE SIDEBAR
    ===================================================== */

    document.addEventListener(
        'keydown',
        function(event)
        {

            if (
                event.key === 'Escape'
            ) {

                closeSidebar();

            }

        }
    );


    /* =====================================================
       CLOSE ON DESKTOP RESIZE
    ===================================================== */

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


    /* =====================================================
       AUTO CLOSE TOAST
    ===================================================== */

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