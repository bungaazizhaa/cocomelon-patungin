<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            PaTungin - Login
        </title>
        <link rel="stylesheet" href="{{ asset('assets/css/patungin.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="topnav">
            <a class="navbar-brand" href="#">
                <div class="logo-image">
                      <img src="{{asset('assets/images/Logo-small.png')}}" class="img-fluid">
                </div>
            </a>
            <div class="topnav-right">
                <a href="{{route('lp.index')}}">Beranda</a>
                <a href="#tentang">Tentang</a>
                <a href="#carakerja">Cara kerja</a>
                <a class="login-button" href="{{route('home.login')}}">Login</a>
            </div>
        </div>
        @if(session('alerts'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <p style="margin-left: 10px;font-weight: bold">{{session('alerts')}}</p>
            </div>
        @endif
        <div class="loginform-container">
            <div class="loginform">
                <div class="logingrid">
                    <img src="{{asset('assets/images/Login-img.png')}}" style=" width:100%">
                </div>
                <div class="logingrid">
                    <h2>Login</h2>
                    <form role="form" action="{{route('home.loginPost')}}" method="POST">
                     {{ csrf_field() }}
                    <div class="login-input" style="margin-top: 30px;">
                        <p>Email</p>
                        <input type="text" id="email" name="email" required>
                        <p>Password</p>
                        <input type="password" id="password" name="password" required
                               style="border-radius: 12px;
                                        border: none;
                                        margin-top: 10px;
                                        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);"
                        >
                    </div>
                    <p style="margin-top: 20px; font-size: 12px;">Belum punya akun? <a href="{{route('lp.daftar')}}" style="color:rgb(46, 156, 160)">Register sekarang!</a><button type="submit" class="loginbutton" style="margin-left: 15px;">Login</button></p>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-container">
                <a class="navbar-brand" href="#">
                    <div class="logo-image">
                          <img src="{{asset('assets/images/Logo-footer.png')}}" class="footer-fluid">
                    </div>
                </a>
                <div class="card">
                    <div class="isian">
                        <h3 class="footer-h3">Menu</h3>
                        <p><a href="{{'/'}}">Beranda</a></p>
                        <p><a href="{{route('lp.index')}}#tentang">Tentang</a></p>
                        <p><a href="{{route('lp.index')}}#carakerja">Cara kerja</a></p>
                        <p><a href="{{route('home.login')}}">Login</a></p>
                    </div>
                </div>
                <div class="card">
                    <div class="isian">
                        <h3 class="footer-h3">Contact Us</h3>
                        <p><a href="#mail"><img src="{{asset('assets/images/mail.png')}}" style="width: 20px">patungin@gmail.com</a></p>
                        <p><a href="#facebook"><img src="{{asset('assets/images/fb.png')}}" style="width: 20px">PaTungin Aja</a></p>
                        <p><a href="#instagram"><img src="{{asset('assets/images/instagram.png')}}" style="width: 20px">PaTungin</a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    $(document).ready(function() {
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
    });
</script>
