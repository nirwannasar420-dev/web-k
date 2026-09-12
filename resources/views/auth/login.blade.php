<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Login - CRM Petra Textima
    </title>


    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* =====================================================
           BODY
        ===================================================== */

        body {
            min-height: 100vh;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                #0B2A6F;

            color: #202124;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 25px;

            position: relative;

            overflow: hidden;
        }


        /* =====================================================
           BACKGROUND DECORATION
        ===================================================== */

        .bg-circle-one {
            position: fixed;

            width: 560px;

            height: 560px;

            top: -300px;

            left: -170px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.035);

            pointer-events: none;
        }


        .bg-circle-two {
            position: fixed;

            width: 680px;

            height: 680px;

            right: -330px;

            bottom: -350px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.035);

            pointer-events: none;
        }


        .bg-circle-three {
            position: fixed;

            width: 320px;

            height: 320px;

            right: 5%;

            top: -160px;

            border-radius: 50%;

            border:
                1px solid rgba(255,255,255,.05);

            pointer-events: none;
        }


        .bg-line {
            position: fixed;

            width: 750px;

            height: 90px;

            left: -170px;

            bottom: 90px;

            border:
                1px solid rgba(255,255,255,.045);

            border-radius: 999px;

            transform:
                rotate(-14deg);

            pointer-events: none;
        }


        .bg-line-two {
            position: fixed;

            width: 630px;

            height: 75px;

            right: -160px;

            top: 115px;

            border:
                1px solid rgba(255,255,255,.04);

            border-radius: 999px;

            transform:
                rotate(-14deg);

            pointer-events: none;
        }


        /* =====================================================
           LOGIN CONTAINER
        ===================================================== */

        .login-container {
            width: 100%;

            max-width: 420px;

            position: relative;

            z-index: 10;
        }


        /* =====================================================
           LOGIN CARD
        ===================================================== */

        .login-card {
            width: 100%;

            background:
                rgba(255,255,255,.98);

            border:
                1px solid rgba(255,255,255,.8);

            border-radius: 18px;

            padding:
                32px
                34px
                28px;

            box-shadow:
                0 25px 55px rgba(0,0,0,.22);

            backdrop-filter:
                blur(8px);
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .login-logo {
            width: 100%;

            height: 105px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 16px;

            overflow: hidden;
        }


        .login-logo img {
            display: block;

            width: 280px;

            max-width: 100%;

            height: auto;

            object-fit: contain;
        }


        /* =====================================================
           TITLE
        ===================================================== */

        .login-title {
            margin: 0;

            text-align: center;

            color: #172033;

            font-size: 25px;

            font-weight: 800;

            line-height: 1.2;
        }


        /* =====================================================
           SUBTITLE
        ===================================================== */

        .login-subtitle {
            margin-top: 7px;

            margin-bottom: 28px;

            text-align: center;

            color: #7C8798;

            font-size: 11px;

            line-height: 1.5;
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert {
            margin-bottom: 18px;

            padding: 11px 13px;

            border-radius: 8px;

            font-size: 11px;

            line-height: 1.5;
        }


        .alert-error {
            background: #FDEBED;

            border:
                1px solid #F4C8CC;

            color: #B4232D;
        }


        /* =====================================================
           FORM GROUP
        ===================================================== */

        .form-group {
            margin-bottom: 18px;
        }


        /* =====================================================
           LABEL
        ===================================================== */

        .form-label {
            display: block;

            margin-bottom: 7px;

            color: #3C4043;

            font-size: 12px;

            font-weight: 600;
        }


        /* =====================================================
           INPUT
        ===================================================== */

        .form-input {
            width: 100%;

            height: 44px;

            padding:
                0
                13px;

            border:
                1px solid #D7DDE5;

            border-radius: 8px;

            background: #FFFFFF;

            color: #202124;

            font-size: 12px;

            outline: none;

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }


        .form-input:hover {
            border-color: #BCC5D1;
        }


        .form-input::placeholder {
            color: #9AA0A6;
        }


        .form-input:focus {
            border-color: #0B2A6F;

            background: #FFFFFF;

            box-shadow:
                0 0 0 3px
                rgba(11,42,111,.09);
        }


        /* =====================================================
           FIELD ERROR
        ===================================================== */

        .field-error {
            margin-top: 5px;

            color: #D93025;

            font-size: 10px;

            line-height: 1.4;
        }


        /* =====================================================
           LOGIN BUTTON
        ===================================================== */

        .login-button {
            width: 100%;

            height: 44px;

            margin-top: 5px;

            border: none;

            border-radius: 8px;

            background:
                #0B2A6F;

            color: #FFFFFF;

            font-size: 12px;

            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 7px 16px
                rgba(11,42,111,.18);

            transition:
                background .2s ease,
                box-shadow .2s ease,
                transform .1s ease;
        }


        .login-button:hover {
            background:
                #071D4D;

            box-shadow:
                0 9px 20px
                rgba(11,42,111,.24);
        }


        .login-button:active {
            transform:
                translateY(1px);
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .login-footer {
            margin-top: 22px;

            padding-top: 16px;

            border-top:
                1px solid #EEF2F7;

            text-align: center;

            color: #9AA0A6;

            font-size: 9px;

            line-height: 1.5;
        }


        .login-footer strong {
            color: #64748B;

            font-weight: 700;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 500px) {

            body {
                padding: 18px;
            }


            .login-card {
                padding:
                    28px
                    22px
                    25px;
            }


            .login-logo {
                height: 90px;

                margin-bottom: 14px;
            }


            .login-logo img {
                width: 250px;
            }


            .login-title {
                font-size: 22px;
            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         BACKGROUND
    ====================================================== -->

    <div class="bg-circle-one"></div>

    <div class="bg-circle-two"></div>

    <div class="bg-circle-three"></div>

    <div class="bg-line"></div>

    <div class="bg-line-two"></div>


    <!-- =====================================================
         LOGIN
    ====================================================== -->

    <div class="login-container">


        <div class="login-card">


            <!-- =================================================
                 LOGO TEXTIMA
            ================================================== -->

            <div class="login-logo">

                <img
                    src="{{ asset('images/logo-petra.png') }}"
                    alt="Petra Textima"
                >

            </div>


            <!-- =================================================
                 TITLE
            ================================================== -->

            <h1 class="login-title">

                Login CRM

            </h1>


            <!-- =================================================
                 SESSION ERROR
            ================================================== -->

            @if(session('error'))

                <div class="alert alert-error">

                    {{ session('error') }}

                </div>

            @endif


            <!-- =================================================
                 VALIDATION ERROR
            ================================================== -->

            @if($errors->any())

                <div class="alert alert-error">

                    Email atau password yang kamu masukkan
                    tidak sesuai.

                </div>

            @endif


            <!-- =================================================
                 LOGIN FORM
            ================================================== -->

            <form
                action="{{ route('login') }}"
                method="POST"
            >

                @csrf


                <!-- EMAIL -->

                <div class="form-group">

                    <label
                        for="email"
                        class="form-label"
                    >

                        Email

                    </label>


                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        autocomplete="email"
                        required
                        autofocus
                    >


                    @error('email')

                        <div class="field-error">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                <!-- PASSWORD -->

                <div class="form-group">

                    <label
                        for="password"
                        class="form-label"
                    >

                        Password

                    </label>


                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required
                    >


                    @error('password')

                        <div class="field-error">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                <!-- LOGIN BUTTON -->

                <button
                    type="submit"
                    class="login-button"
                >

                    Masuk ke CRM

                </button>


            </form>


            <!-- =================================================
                 FOOTER
            ================================================== -->

            <div class="login-footer">

                <strong>
                    PT Petra Textima Mandiri
                </strong>

                <br>

                Sistem Customer Relationship Management

            </div>


        </div>


    </div>


</body>

</html>