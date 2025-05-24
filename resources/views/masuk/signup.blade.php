<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alkatra:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #FFF0DC, #F0BB78);
            height: 100vh;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            height: 100vh;
            padding: 0 60px;
        }
        .form-box {
            background: white;
            border-radius: 15px;
            padding: 70px 60px;
            width: 420px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
        }
        .input-group {
            background: #f7f7f7;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 18px;
            text-align: left;
        }
        .input-group input {
            border: none;
            background: transparent;
            outline: none;
            width: 100%;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
        }
        .form-box h2 {
            margin-bottom: 10px;
            font-size: 32px;
        }
        .form-box p {
            margin-bottom: 50px;
            font-size: 22px;
            color: #555;
        }
        button {
            width: 100%;
            padding: 12px;
            background: rgb(225, 106, 22);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            margin-top: 5px;
        }
        .link {
            margin-top: 14px;
            font-size: 14px;
        }
        .link a {
            color: #6936F5;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="container">
    <div><img src="{{ asset('images/cow_signup.png') }}" alt="cow" width="750"></div>

    <form action="/signup" method="POST" class="form-box">
        @csrf
        <h2>Sign Up</h2>
        <p>Welcome to Moodiary</p>

        @if ($errors->any())
            <div style="color: red; margin-bottom: 10px; text-align: left;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="input-group">
            <input type="text" name="name" placeholder="Name" required>
        </div>
        <div class="input-group">
            <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" required>
        </div>
        <div class="input-group">
            <input type="email" name="email" placeholder="Email address" required>
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="input-group">
            <input type="password" name="password_confirmation" placeholder="Enter your password again" required>
        </div>

        <button type="submit">Sign Up</button>
        <div class="link">Have an account? <a href="/login">Log In</a></div>
    </form>
</div>

<script>
document.querySelector('form').addEventListener('submit', function (e) {
    const pass = document.querySelector('input[name="password"]').value;
    const confirm = document.querySelector('input[name="password_confirmation"]').value;

    if (pass !== confirm) {
        e.preventDefault();
        alert('Password and Confirm Password do not match!');
    }
});
</script>
</body>
</html>
