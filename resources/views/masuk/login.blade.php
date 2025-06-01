<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/images/logomoo.png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(to right, #FFF0DC, #F0BB78);
            height: 100vh;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 0 120px;
            gap: 0px; 
        }
        .form-box {
            background: white;
            border-radius: 20px;
            padding: 60px 30px;
            width: 400px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            text-align: center;
            margin-left: auto;
        }
        .form-box h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .form-box p {
            font-size: 22px;
            margin-bottom: 30px;
            color: #444;
        }

        .form-box input {
            width: 100%;
            padding: 14px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 15px;
        }

        .form-box button {
            width: 100%;
            padding: 14px;
            background-color: #e16a16;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }

        .form-box .link {
            margin-top: 20px;
            font-size: 15px;
        }

        .form-box .link a {
            color: #6936F5;
            text-decoration: none;
            font-weight: 600;
        }

        .image-container img {
            max-width: 570px;
            width: 500%;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-box">
        <h2>Log In</h2>
        <p>Welcome to Moodiary</p>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log In</button>
        </form>
        <div class="link">No Account? <a href="/signup">Sign Up</a></div>
    </div>
    <div class="image-container">
        <img src="{{ asset('images/cow_login.png') }}" alt="Cow">
    </div>
</div>
    @if ($errors->has('invalid'))
        <div style="color:red;text-align:center;margin-top:10px;">
            {{ $errors->first('invalid') }}
        </div>
    @endif
    @if (session('success'))
        <script>alert("{{ session('success') }}");</script>
    @endif

    @if ($errors->has('invalid'))
        <script>alert("{{ $errors->first('invalid') }}");</script>
    @endif
    {{-- @if ($errors->has('invalid'))
        <div style="color:red;text-align:center;margin-top:10px;">
            {{ $errors->first('invalid') }}
        </div>
    @endif
    @if (session('alert'))
        <div class="alert alert-warning">
            {{ session('alert') }}
        </div>
    @endif --}}
</body>
</html>
