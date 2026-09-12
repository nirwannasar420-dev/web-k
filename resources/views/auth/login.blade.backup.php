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

            background: #F7F8FA;

            color: #202124;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 20px;
        }


        /* =====================================================
           LOGIN CONTAINER
        ===================================================== */

        .login-container {
            width: 100%;

            max-width: 430px;
        }


        /* =====================================================
           LOGIN CARD
        ===================================================== */

        .login-card {
            width: 100%;

            background: #FFFFFF;

            border: 1px solid #E8EAED;

            border-radius: 18px;

            padding: 30px 34px 32px;

            box-shadow:
                0 8px 25px rgba(60, 64, 67, .08);
        }


        /* =====================================================
           LOGO AREA
        ===================================================== */

        .login-logo {
            width: 100%;

            height: 105px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 15px;

            overflow: hidden;

            position: relative;
        }


        /* =====================================================
           LOGO IMAGE
        ===================================================== */

        .login-logo img {
            display: block;

            width: 350px;

            height: 350px;

            max-width: none;

            max-height: none;

            object-fit: contain;

            position: absolute;

            left: 50%;

            top: 50%;

            transform:
                translate(-50%, -50%);
        }


        /* =====================================================
           TITLE
        ===================================================== */

        .login-title {
            margin: 0 0 26px;

            text-align: center;

            color: #202124;

            font-size: 24px;

            font-weight: 700;

            line-height: 1.2;
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert {
            padding: 11px 13px;

            margin-bottom: 18px;

            border-radius: 8px;

            font-size: 11px;

            line-height: 1.5;
        }


        .alert-error {
            background: #FDE8EA;

            border: 1px solid #F4C2C7;

            color: #B42318;
        }


        /* =====================================================
           FORM GROUP
        ===================================================== */

        .form-group {
            margin-bottom: 17px;
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

            padding: 0 13px;

            border: 1px solid #DADCE0;

            border-radius: 8px;

            background: #FFFFFF;

            color: #202124;

            font-size: 12px;

            outline: none;

            transition:
                border-color .2s ease,
                box-shadow .2s ease;
        }


        .form-input::placeholder {
            color: #9AA0A6;
        }


        .form-input:focus {
            border-color: #0B2A6F;

            box-shadow:
                0 0 0 3px rgba(11, 42, 111, .08);
        }


        /* =====================================================
           ERROR FIELD
        ===================================================== */

        .field-error {
            margin-top: 5px;

            color: #D93025;

            font-size: 10px;
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

            background: #0B2A6F;

            color: #FFFFFF;

            font-size: 12px;

            font-weight: 600;

            cursor: pointer;

            transition: background .2s ease;
        }


        .login-button:hover {
            background: #071D4D;
        }


        .login-button:active {
            transform: translateY(1px);
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 500px) {

            .login-card {
                padding: 27px 22px 30px;
            }


            .login-logo {
                height: 90px;

                margin-bottom: 15px;
            }


            .login-logo img {
                width: 300px;

                height: 300px;
            }


            .login-title {
                font-size: 22px;

                margin-bottom: 23px;
            }

        }

    </style>

</head>


<body>


<div class="login-container">


    <div class="login-card">


        <!-- =================================================
             LOGO PETRA TEXTIMA
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
             ERROR SESSION
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
             FORM LOGIN
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


            <!-- BUTTON -->

            <button
                type="submit"
                class="login-button"
            >

                Masuk ke CRM

            </button>


        </form>


    </div>


</div>


</body>

</html>