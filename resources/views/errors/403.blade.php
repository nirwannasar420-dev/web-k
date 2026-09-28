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

        :root {
            --navy: #081F5C;
            --navy-light: #123A8A;
            --blue-line: #5B86D6;
            --blue-soft: #9CB8EF;
            --white: #FFFFFF;
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html,
        body {
            width: 100%;
            min-height: 100%;
        }


        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            overflow-x: hidden;

            background:
                radial-gradient(
                    circle at 50% 45%,
                    #173F91 0%,
                    #0C2A73 35%,
                    #081F5C 70%,
                    #061741 100%
                );

            color: var(--white);

        }


        /* =====================================================
           FULL PAGE
        ===================================================== */

        .error-page {

            min-height: 100vh;

            position: relative;

            display: flex;

            align-items: center;

            justify-content: center;

            overflow: hidden;

        }


        /* =====================================================
           BACKGROUND GRID
        ===================================================== */

        .grid {

            position: absolute;

            inset: 0;

            background-image:

                linear-gradient(
                    rgba(120, 160, 230, 0.08) 1px,
                    transparent 1px
                ),

                linear-gradient(
                    90deg,
                    rgba(120, 160, 230, 0.08) 1px,
                    transparent 1px
                );

            background-size:
                58px 58px;

            opacity: 0.7;

        }


        /* =====================================================
           GLOW
        ===================================================== */

        .glow {

            position: absolute;

            width: 720px;
            height: 720px;

            left: 50%;
            top: 48%;

            transform:
                translate(-50%, -50%);

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(81, 132, 230, 0.20) 0%,
                    rgba(81, 132, 230, 0.08) 32%,
                    transparent 70%
                );

            pointer-events: none;

        }


        /* =====================================================
           CIRCUIT DECORATION
        ===================================================== */

        .circuit {

            position: absolute;

            inset: 0;

            pointer-events: none;

            opacity: 0.72;

        }


        .circuit svg {

            width: 100%;
            height: 100%;

            display: block;

        }


        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .content {

            position: relative;

            z-index: 5;

            width: 100%;

            max-width: 1100px;

            padding:
                50px 28px 55px;

            text-align: center;

        }


        /* =====================================================
           SMALL LABEL
        ===================================================== */

        .error-label {

            display: inline-block;

            margin-bottom: 18px;

            font-size: 14px;

            font-weight: 600;

            letter-spacing: 3px;

            color: #C9D9FA;

            text-transform: uppercase;

        }


        /* =====================================================
           BIG 403
        ===================================================== */

        .error-number {

            position: relative;

            font-size:
                clamp(130px, 24vw, 270px);

            line-height:
                0.82;

            font-weight:
                800;

            letter-spacing:
                8px;

            color:
                rgba(255, 255, 255, 0.96);

            /*
             * Slight blur effect
             * keeps the number readable
             * while creating a soft modern glow.
             */

            filter:
                blur(2.5px);

            text-shadow:
                0 0 28px rgba(155, 190, 255, 0.32),
                0 0 55px rgba(80, 130, 230, 0.18),
                0 15px 40px rgba(0, 0, 0, 0.20);

            transform:
                scale(1.02);

        }


        /* =====================================================
           TITLE
        ===================================================== */

        .title {

            font-size:
                clamp(30px, 4vw, 48px);

            line-height:
                1.2;

            font-weight:
                600;

            margin-top:
                22px;

            margin-bottom:
                14px;

            color:
                #FFFFFF;

        }


        /* =====================================================
           DESCRIPTION
        ===================================================== */

        .description {

            max-width:
                620px;

            margin:
                0 auto;

            font-size:
                16px;

            line-height:
                1.7;

            color:
                #D3DDF2;

        }


        /* =====================================================
           CURRENT URL
        ===================================================== */

        .url {

            display:
                inline-block;

            max-width:
                90%;

            margin-top:
                21px;

            padding:
                10px 15px;

            border:
                1px solid
                rgba(255, 255, 255, 0.18);

            border-radius:
                8px;

            background:
                rgba(0, 0, 0, 0.16);

            color:
                #C6D6F4;

            font-size:
                13px;

            word-break:
                break-all;

        }


        /* =====================================================
           ACTION BUTTONS
        ===================================================== */

        .actions {

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                12px;

            margin-top:
                29px;

            flex-wrap:
                wrap;

        }


        .button {

            min-width:
                155px;

            height:
                46px;

            padding:
                0 20px;

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            border-radius:
                8px;

            text-decoration:
                none;

            font-size:
                14px;

            font-weight:
                600;

            transition:
                all 0.18s ease;

        }


        /* =====================================================
           GO BACK BUTTON
        ===================================================== */

        .button-secondary {

            color:
                #FFFFFF;

            background:
                rgba(255, 255, 255, 0.08);

            border:
                1px solid
                rgba(255, 255, 255, 0.32);

            backdrop-filter:
                blur(4px);

        }


        .button-secondary:hover {

            background:
                rgba(255, 255, 255, 0.15);

            transform:
                translateY(-2px);

        }


        /* =====================================================
           DASHBOARD BUTTON
        ===================================================== */

        .button-primary {

            color:
                var(--navy);

            background:
                #FFFFFF;

            border:
                1px solid #FFFFFF;

            box-shadow:
                0 8px 22px rgba(0, 0, 0, 0.16);

        }


        .button-primary:hover {

            background:
                #EEF3FF;

            transform:
                translateY(-2px);

            box-shadow:
                0 12px 26px rgba(0, 0, 0, 0.20);

        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {

            margin-top:
                43px;

            font-size:
                12px;

            color:
                rgba(255, 255, 255, 0.46);

        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 700px) {

            .content {

                padding:
                    40px 20px 45px;

            }


            .error-label {

                font-size:
                    12px;

                letter-spacing:
                    2px;

            }


            .error-number {

                font-size:
                    clamp(105px, 30vw, 180px);

                letter-spacing:
                    4px;

            }


            .title {

                font-size:
                    30px;

                margin-top:
                    18px;

            }


            .description {

                font-size:
                    15px;

            }


            .actions {

                flex-direction:
                    column;

            }


            .button {

                width:
                    100%;

                max-width:
                    290px;

            }


            .footer {

                margin-top:
                    35px;

            }

        }

    </style>

</head>


<body>


<div class="error-page">


    <!-- =====================================================
         BACKGROUND GRID
    ====================================================== -->

    <div class="grid"></div>


    <!-- =====================================================
         SOFT GLOW
    ====================================================== -->

    <div class="glow"></div>


    <!-- =====================================================
         CIRCUIT DECORATION
    ====================================================== -->

    <div class="circuit">

        <svg
            viewBox="0 0 1600 900"
            preserveAspectRatio="none"
            xmlns="http://www.w3.org/2000/svg"
        >

            <!-- LEFT TOP -->

            <g
                fill="none"
                stroke="#81A5E8"
                stroke-width="3"
            >

                <path
                    d="M45 120H260V190H350"
                />

                <path
                    d="M0 220H155V290H290"
                />

                <path
                    d="M75 370H215V315H405"
                />

                <path
                    d="M150 80V155H195"
                />

            </g>


            <!-- RIGHT TOP -->

            <g
                fill="none"
                stroke="#81A5E8"
                stroke-width="3"
            >

                <path
                    d="M1555 120H1340V190H1250"
                />

                <path
                    d="M1600 220H1445V290H1310"
                />

                <path
                    d="M1525 370H1385V315H1195"
                />

                <path
                    d="M1450 80V155H1405"
                />

            </g>


            <!-- LEFT BOTTOM -->

            <g
                fill="none"
                stroke="#6E95DD"
                stroke-width="3"
            >

                <path
                    d="M20 760H220V695H360"
                />

                <path
                    d="M80 840H300V790H430"
                />

                <path
                    d="M130 610H250V655H390"
                />

            </g>


            <!-- RIGHT BOTTOM -->

            <g
                fill="none"
                stroke="#6E95DD"
                stroke-width="3"
            >

                <path
                    d="M1580 760H1380V695H1240"
                />

                <path
                    d="M1520 840H1300V790H1170"
                />

                <path
                    d="M1470 610H1350V655H1210"
                />

            </g>


            <!-- NODES -->

            <g fill="#C8DAFC">

                <circle
                    cx="260"
                    cy="120"
                    r="7"
                />

                <circle
                    cx="350"
                    cy="190"
                    r="7"
                />

                <circle
                    cx="155"
                    cy="220"
                    r="7"
                />

                <circle
                    cx="290"
                    cy="290"
                    r="7"
                />

                <circle
                    cx="215"
                    cy="370"
                    r="7"
                />

                <circle
                    cx="405"
                    cy="315"
                    r="7"
                />


                <circle
                    cx="1340"
                    cy="120"
                    r="7"
                />

                <circle
                    cx="1250"
                    cy="190"
                    r="7"
                />

                <circle
                    cx="1445"
                    cy="220"
                    r="7"
                />

                <circle
                    cx="1310"
                    cy="290"
                    r="7"
                />

                <circle
                    cx="1385"
                    cy="370"
                    r="7"
                />

                <circle
                    cx="1195"
                    cy="315"
                    r="7"
                />


                <circle
                    cx="220"
                    cy="760"
                    r="7"
                />

                <circle
                    cx="360"
                    cy="695"
                    r="7"
                />

                <circle
                    cx="300"
                    cy="840"
                    r="7"
                />

                <circle
                    cx="430"
                    cy="790"
                    r="7"
                />

                <circle
                    cx="250"
                    cy="610"
                    r="7"
                />


                <circle
                    cx="1380"
                    cy="760"
                    r="7"
                />

                <circle
                    cx="1240"
                    cy="695"
                    r="7"
                />

                <circle
                    cx="1300"
                    cy="840"
                    r="7"
                />

                <circle
                    cx="1170"
                    cy="790"
                    r="7"
                />

                <circle
                    cx="1350"
                    cy="610"
                    r="7"
                />

            </g>


            <!-- TOP PIXEL BLOCKS -->

            <g
                fill="#5C82CB"
                opacity="0.65"
            >

                <rect
                    x="0"
                    y="0"
                    width="55"
                    height="10"
                />

                <rect
                    x="65"
                    y="0"
                    width="25"
                    height="10"
                />

                <rect
                    x="105"
                    y="0"
                    width="60"
                    height="10"
                />

                <rect
                    x="180"
                    y="0"
                    width="35"
                    height="10"
                />

                <rect
                    x="235"
                    y="0"
                    width="80"
                    height="10"
                />


                <rect
                    x="1285"
                    y="0"
                    width="55"
                    height="10"
                />

                <rect
                    x="1350"
                    y="0"
                    width="25"
                    height="10"
                />

                <rect
                    x="1390"
                    y="0"
                    width="60"
                    height="10"
                />

                <rect
                    x="1465"
                    y="0"
                    width="35"
                    height="10"
                />

                <rect
                    x="1520"
                    y="0"
                    width="80"
                    height="10"
                />

            </g>


            <!-- BINARY LEFT -->

            <g
                fill="#91B3EC"
                opacity="0.42"
                font-family="monospace"
                font-size="18"
            >

                <text
                    x="70"
                    y="480"
                >
                    01010101
                </text>

                <text
                    x="70"
                    y="510"
                >
                    10100110
                </text>

                <text
                    x="70"
                    y="540"
                >
                    11001001
                </text>

                <text
                    x="70"
                    y="570"
                >
                    01101010
                </text>

            </g>


            <!-- BINARY RIGHT -->

            <g
                fill="#91B3EC"
                opacity="0.42"
                font-family="monospace"
                font-size="18"
            >

                <text
                    x="1320"
                    y="480"
                >
                    11001010
                </text>

                <text
                    x="1320"
                    y="510"
                >
                    01010111
                </text>

                <text
                    x="1320"
                    y="540"
                >
                    10010101
                </text>

                <text
                    x="1320"
                    y="570"
                >
                    00111010
                </text>

            </g>


            <!-- BOTTOM PIXEL BLOCKS -->

            <g
                fill="#5C82CB"
                opacity="0.65"
            >

                <rect
                    x="0"
                    y="890"
                    width="70"
                    height="10"
                />

                <rect
                    x="82"
                    y="890"
                    width="28"
                    height="10"
                />

                <rect
                    x="125"
                    y="890"
                    width="70"
                    height="10"
                />

                <rect
                    x="210"
                    y="890"
                    width="38"
                    height="10"
                />


                <rect
                    x="1350"
                    y="890"
                    width="70"
                    height="10"
                />

                <rect
                    x="1432"
                    y="890"
                    width="28"
                    height="10"
                />

                <rect
                    x="1475"
                    y="890"
                    width="70"
                    height="10"
                />

                <rect
                    x="1560"
                    y="890"
                    width="38"
                    height="10"
                />

            </g>

        </svg>

    </div>


    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <main class="content">


        <!-- ERROR LABEL -->

        <div class="error-label">

            HTTP ERROR

        </div>


        <!-- 403 -->

        <div class="error-number">

            403

        </div>


        <!-- TITLE -->

        <h1 class="title">

            Access Denied

        </h1>


        <!-- DESCRIPTION -->

        <p class="description">

            You don't have permission to access this page.
            Please go back and try another page or return
            to the main application.

        </p>


        <!-- CURRENT URL -->

        <div class="url">

            {{ request()->fullUrl() }}

        </div>


        <!-- ACTIONS -->

        <div class="actions">


            <!-- GO BACK = REFRESH CURRENT 403 PAGE -->

            <a
                href="{{ request()->fullUrl() }}"
                class="button button-secondary"
                onclick="
                    event.preventDefault();
                    window.location.reload();
                "
            >

                ↻ Go Back

            </a>


            <!-- GO TO MAIN APPLICATION -->

            <a
                href="{{ url('/') }}"
                class="button button-primary"
            >

                Go to Dashboard

            </a>


        </div>


        <!-- FOOTER -->

        <div class="footer">

            CRM Petra Textima

        </div>


    </main>


</div>


</body>

</html>