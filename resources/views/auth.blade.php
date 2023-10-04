<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nutech | Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,800" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Montserrat", sans-serif;
            background: #f6f5f7;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;

        }

        h1 {
            font-weight: bold;
            margin: 0;
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }


        .form-container form {
            background: #fff;
            display: flex;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .social-container {
            margin: 20px 0;
        }

        .social-container a {
            border: 1px solid #ddd;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }

        .form-container input {
            background: #fff;
            border: 1px solid #333;
            padding: 20px 15px;
            margin: 8px 0;
            width: 70%;
        }

        button {
            border-radius: 20px;
            border: 1px solid #ff4b2b;
            background: #ff445c;
            color: #fff;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background: transparent;
            border-color: #fff;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            z-index: 1;
            opacity: 0;
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .overlay {
            background: url('/assets/images/98699.png') repeat-x;
            background-size: 50% 100%;
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateY(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-panel {
            position: absolute;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 40px;
            height: 100%;
            width: 50%;
            text-align: center;
            transform: translateY(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-right {
            right: 0;
            transform: translateY(0);
        }

        .overlay-left {
            transform: translateY(-20%);
        }

        .container.right-panel-active .sign-in-container {
            transform: translateY(100%);
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateY(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateY(20%);
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h1 class="col-5 mx-auto text-center mb-3">Daftar dan buat akun disini</h1>
                <input type="text" name="name" id="name" placeholder="Masukkan Name Anda" required />
                <input type="email" name="email" id="email" placeholder="Masukkan Email Anda" required />
                <input type="password" name="password" id="password" placeholder="Masukkan Password Anda" required />
                <button type="submit" class="mt-3">Daftar</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <h1 class="col-7 mx-auto text-center mb-3">Masuk atau buat akun untuk memulai</h1>
                <input type="email" name="email" id="email" placeholder="Masukkan Email Anda" required />
                <input type="password" name="password" id="password" placeholder="Masukkan Password Anda" required />
                <button type="submit" class="mt-3">Masuk</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Selamat Datang!</h1>
                    <p>Untuk tetap terhubung dengan kami, silakan login dengan informasi pribadi Anda</p>
                    <button class="ghost" id="signIn">Masuk</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Daftar Akun Disini!</h1>
                    <p>Masukkan detail data pribadi Anda dan mulailah perjalanan bersama kami</p>
                    <button class="ghost" id="signUp">Daftar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const $signUpButton = document.getElementById("signUp");
        const $signInButton = document.getElementById("signIn");
        const $container = document.getElementById("container");

        $signUpButton.addEventListener("click", () => {
            $container.classList.add("right-panel-active");
        });

        $signInButton.addEventListener("click", () => {
            $container.classList.remove("right-panel-active");
        });
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>