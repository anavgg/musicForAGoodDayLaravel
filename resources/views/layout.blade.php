<!DOCTYPE html>
<html>
<head>
    <title>Laravel - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
  
        body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: white;
            text-align: left;
            /* background-color: #2E315B; */
            background:url('./img/finalbackground.jpg');
            background-position: center; 
            background-repeat: cover no-repeat;
        }

        .navbar{
            color: white;
        }
        .navbar-laravel
        {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
            color: white;
        }

        .navbar-brand{
            width: 5%;
        }

        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: 'Roboto';
            color: white;
            
        }

        .card{
            color: #2E315B;
            background-color: #D9D9D9;
        }
        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .login-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .login-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }

        .btn-custom {
            background-color: #2E315B;
            border-color: #2E315B;
        }
    .btn-custom:hover,
    .btn-custom:focus {
        background-color: #F9471C;
        border-color: #F9471C;
    }

    .form-control{
        border: 2px solid #f9471C;
    }

    .containerFooter {
    display: block;
    position: fixed;
    width: 100vw;
    bottom: 20px;
    }

    #textFooter {
    font-family: 'Consolas';
    color: white;
    text-align: center;
    }

    .modal-content {
        color: #2E315B;
        background-color: #D9D9D9;
    }

    .btn-primary{
        background-color:#f9471C;
    }

    .btn-primary:hover{
        background-color: #F9471C;
    }

    .form-control{
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }


    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark navbar-laravel">
    <div class="container">
        <!-- <a class="navbar-brand" href="#">City Tech</a> -->
        <img class="navbar-brand" src="img/logo.svg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
   
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endguest
            </ul>

        </div>
        <div class="containerFooter">
            <p id="textFooter">
                made with ❤ by City Tech
            </p>
        </div>
    </div>
</nav>
  
@yield('content')


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>