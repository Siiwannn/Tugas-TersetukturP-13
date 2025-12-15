@extends('layouts.auth')

@push('styles')
<style>
    body {
        background: white;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    /* WRAPPER */
    .wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 5px;
        padding-top: 60px;
        min-height: 90vh;
    }

    /* LOGO HEADER */
    .header-logo {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 0px;
    }

    .header-logo img {
        height: 40px;
    }

    .header-title {
        font-weight: bold;
        font-size: 22px;
    }

    /* LOGIN BOX */
    .login-box {
        width: 420px;
        border: 10px solid #000;
        border-radius: 5px;
        padding: 40px;
        text-align: center;
        margin-top: 10px;
    }

    .login-title {
        font-size: 22px;
        font-weight: bold;
        text-decoration: underline;
        margin-bottom: 25px;
    }

    /* LABEL */
    label {
        display: block;
        text-align: left;
        font-weight: bold;
        margin-bottom: 6px;
    }

    /* INPUT */
    .input-field {
        width: 100%;
        border: none;
        background: #eaeaea;
        padding: 14px;
        border-radius: 30px;
        margin-bottom: 18px;
        font-size: 15px;
    }

    /* BUTTON */
    .btn-login {
        background: #c52929;
        color: white;
        padding: 10px 25px;
        border-radius: 25px;
        border: none;
        font-weight: bold;
        cursor: pointer;
    }

    .btn-login:hover {
        opacity: 0.85;
        background: #000;
    }

    .register-text {
        margin-top: 18px;
    }

    .register-text a {
        text-decoration: none;
        color: #0066cc;
    }

    @media screen and (max-width: 768px) {
        .login-box {
            width: 90%;
            padding: 20px;
        }
        .login-title {
            font-size: 18px;
        }
        .header-title {
            font-size: 18px;
        }
        .input-field {
            padding: 10px;
            font-size: 14px;
        }
        .btn-login {
            padding: 8px 20px;
            font-size: 14px;
        }
    }
</style>
@endpush

@section('content')

    <div class="wrapper">

        <!-- LOGO -->
        <div class="header-logo">
            <img src="{{ asset('/images/logo.png') }}" alt="Logo" onerror="this.src='https://via.placeholder.com/40x40'">
            <div class="header-title">PT.WANCARS</div>
        </div>

        <!-- LOGIN BOX -->
        <div class="login-box">
            <div class="login-title">Log In</div>

            @if ($errors->any())
                <div style="color:rgb(255, 12, 12); margin-bottom:10px;">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('success'))
                <div style="color:green; margin-bottom:10px;">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label>Email</label>
                <input type="email" name="email" class="input-field" required>

                <label>Password</label>
                <input type="password" name="password" class="input-field" required>

                <button type="submit" class="btn-login">Masuk</button>
            </form>

            <div class="register-text">
                <a href="{{ route('register') }}">Don't have an account? Register</a>
            </div>

        </div>

    </div>
@endsection