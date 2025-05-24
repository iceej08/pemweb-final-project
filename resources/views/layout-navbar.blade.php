
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<style>
        body{
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #F0BB78, #FFF0DC); 
        }
        .font-logo{
            font-family: 'Alkatra', cursive;
        }
        .sidebar {
            background-color: #FFF0DC;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            box-shadow: 4px 0 30px rgba(0, 0, 0, 1.5);
            width: 15%; /* 2.5 kolom dari 12 kolom */
        }
        .sidebar-content{
            margin: 40px, auto, auto, auto;
        }
        .nav-item-custom {
            display: flex;
            align-items: center;
            gap: 30px;
            color: #6e472d;
            padding: 15px 15px;
            border-radius: 15px;
            text-decoration: none;
            transition: 0.3s;
            font-size: 20px;
        }
        .nav-item-custom:hover {
            font-weight: 600;
            background-color: #f8b69833;
        }
        .nav-item-active {
            background-color: #FF7B4F;
            font-weight: 700;
            box-shadow: 3px 0 1px rgba(0, 0, 0, 1.5);
        }
        .nav-item-custom img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @include('navbar')

            <div class="col-md-9 py-4 px-5">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>