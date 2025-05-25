<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="/images/logomoo.png">
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
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.25);
            width: 15rem; /* 2.5 kolom dari 12 kolom */
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
            font-weight: 500;
            background-color: #ff7b4f92;
        }
        .nav-item-custom.active {
            font-weight: 600;
            background-color: #ff7b4f92;
        }
        .nav-item-custom img {
            width: 2rem;
            height: 2rem;
        }
        input[type=radio]:checked + img{
            font-weight: 600;
            background-color: #ff7b4f92;
            border-radius: 10px;
        }
        #save{
            background-color: #d2691e;;
        }
        #save:hover{
            background-color: #AF4D07;
        }
        .btn-logout{
            background-color:rgb(210, 30, 30);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;

            transition: all 0.2s ease;
            margin-top: 1rem;
        }
        .btn-logout:hover {
            background:rgb(167, 43, 26);
            box-shadow: 0 4px 12px rgba(210, 105, 30, 0.3);
        }
        .logout-section{
            margin-left:2.5rem;
        }

    </style>

    </head>
        <body>
            <div class="container-fluid">
                <div class="row">
                    @yield('navbar')

                    <div class="col-2"></div>
                    <div class="col-9 px-0 d-flex justify-content-center">
                        <div class="calendar-box-wrapper px-5 py-5">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </body>
       </html>