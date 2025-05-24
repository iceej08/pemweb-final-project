<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Moodiary</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <style>
            :root{
                --sidebar-width: 15rem;
            }
            body{
                font-family: 'Poppins', sans-serif;
                /* background: linear-gradient(to bottom, #F0BB78, #FFF0DC);
                min-height: 100vh; */
            }
            .font-logo{
                font-family: 'Alkatra', cursive;
                
            }
            .sidebar {
                background-color: #FFF0DC;
                border-top-right-radius: 1.5rem;
                border-bottom-right-radius: 1.5rem;
                box-shadow: 4px 0 30px rgba(0, 0, 0, 0.2);
                padding: 2rem 1.5rem;
                width: var(--sidebar-width);
                min-height: 50vh;
                flex-shrink: 0;
                display: flex;
                flex-direction: column;
            }
            .sidebar-content{
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }
            .content-wrapper {
                flex-grow: 1;
                padding: 2rem;
                overflow-x: hidden;
            }
            .nav-item-custom {
                display: flex;
                align-items: center;
                gap: 1rem;
                color: #6e472d;
                text-decoration: none;
                padding: 0.75rem 1rem;
                border-radius: 0.75rem;
                font-size: 1rem;
                transition: all 0.3s ease;
            }
            .nav-item-custom:hover {
                font-weight: 400;
                background-color: #FF7B4F;
            }
            .nav-item-active {
                background-color: #FF7B4F;
                font-weight: 600;
                box-shadow: 2px 0 8px rgba(0, 0, 0, 0.15);
            }
            .nav-item-custom img {
                width: 2rem;
                height: 2rem;
                object-fit: contain;
            }
            .calendar-box-wrapper {
            width: 100%;
            max-width: 1000px;
            }
        </style>
    </head>
        <body>
            <div class="container-fluid">
                <div class="row">
                    @include('navbar')

                    <div class="col-9 px-0 d-flex justify-content-center">
                        <div class="calendar-box-wrapper px-5 py-5">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </body>
</html>