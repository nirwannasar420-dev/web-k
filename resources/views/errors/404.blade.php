<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>403 Forbidden | CRM Petra Textima</title>

    <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/favicon-petra-textima.png') }}"
    >

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Helvetica,
                Arial,
                sans-serif;

            background: #f8f9fa;
            color: #202124;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 24px;
        }

        .error-wrapper {
            width: 100%;
            max-width: 720px;
            text-align: left;
        }

        .error-icon {
            width: 110px;
            height: 110px;
            margin-bottom: 28px;
        }

        .error-icon svg {
            width: 100%;
            height: 100%;
        }

        .error-code {
            font-size: 16px;
            color: #5f6368;
            margin-bottom: 10px;
            letter-spacing: 0.2px;
        }

        .error-title {
            font-size: 42px;
            line-height: 1.15;
            font-weight: 500;
            color: #202124;
            margin-bottom: 16px;
        }

        .error-message {
            font-size: 17px;
            line-height: 1.6;
            color: #5f6368;
            max-width: 650px;
            margin-bottom: 28px;
        }

        .error-url {
            display: inline-block;
            background: #f1f3f4;
            padding: 10px 14px;
            border-radius: 6px;
            color: #5f6368;
            font-size: 14px;
            word-break: break-all;
            margin-bottom: 30px;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            border: none;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            padding: 11px 20px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary {
            background: #0b2a6f;
            color: #fff;
        }

        .btn-primary:hover {
            background: #071d4d;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: transparent;
            color: #0b2a6f;
            border: 1px solid #dadce0;
        }

        .btn-secondary:hover {
            background: #f1f3f4;
        }

        .footer {
            margin-top: 55px;
            font-size: 13px;
            color: #9aa0a6;
        }

        @media (max-width: 600px) {
            body {
                align-items: flex-start;
                padding-top: 70px;
            }

            .error-icon {
                width: 85px;
                height: 85px;
                margin-bottom: 22px;
            }

            .error-title {
                font-size: 32px;
            }

            .error-message {
                font-size: 15px;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="error-wrapper">

        <!-- Error Icon -->
        <div class="error-icon">
            <svg
                viewBox="0 0 120 120"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <!-- Document -->
                <rect
                    x="25"
                    y="14"
                    width="70"
                    height="92"
                    rx="8"
                    fill="#FFFFFF"
                    stroke="#BDC1C6"
                    stroke-width="4"
                />

                <!-- Fold -->
                <path
                    d="M72 14V32H95"
                    stroke="#BDC1C6"
                    stroke-width="4"
                    stroke-linejoin="round"
                />

                <!-- Face -->
                <circle
                    cx="45"
                    cy="59"
                    r="4"
                    fill="#5F6368"
                />

                <circle
                    cx="75"
                    cy="59"
                    r="4"
                    fill="#5F6368"
                />

                <!-- Sad mouth -->
                <path
                    d="M48 80C54 74 66 74 72 80"
                    stroke="#5F6368"
                    stroke-width="4"
                    stroke-linecap="round"
                />

                <!-- Red accent -->
                <path
                    d="M25 99H95"
                    stroke="#E30613"
                    stroke-width="5"
                    stroke-linecap="round"
                />
            </svg>
        </div>

        <div class="error-code">
            Error 403
        </div>

        <h1 class="error-title">
            Access denied
        </h1>

        <p class="error-message">
            You don't have permission to access this page.
            Please return to the dashboard or go back to the previous page.
        </p>

        <div class="error-url">
            {{ request()->fullUrl() }}
        </div>

        <div class="actions">

            <a
                href="{{ url()->previous() }}"
                class="btn btn-secondary"
                onclick="
                    if (document.referrer === '') {
                        this.href = '{{ route('dashboard') }}';
                    }
                "
            >
                ← Go Back
            </a>

            <a
                href="{{ route('dashboard') }}"
                class="btn btn-primary"
            >
                Go to Dashboard
            </a>

        </div>

        <div class="footer">
            CRM Petra Textima
        </div>

    </div>

</body>
</html>