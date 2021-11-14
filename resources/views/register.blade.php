<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>
            PaTungin - Register
        </title>
        <link rel="stylesheet" href="{{ asset('assets/css/patungin.css')}}">
    </head>
    <body>
        <div class="topnav">
            <a class="navbar-brand" href="#">
                <div class="logo-image">
                      <img src="{{asset('assets/images/Logo-small.png')}}" class="img-fluid">
                </div>
            </a>
            <div class="topnav-right">
                <a href="{{'/'}}">Beranda</a>
                <a href="{{route('lp.index')}}#tentang">Tentang</a>
                <a href="{{route('lp.index')}}#carakerja">Cara kerja</a><
                <a class="login-button" href="{{route('home.login')}}">Login</a>
            </div>
        </div>
        @if(session('alerts'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert">
                <p style="margin-left: 10px;font-weight: bold">{{session('alerts')}}</p>
            </div>
        @endif
        <div class="loginform-container">
            <div class="loginform">
                <div class="logingrid">
                    <img src="{{asset('assets/images/Register-img.png')}}" style="width:100%">
                </div>
                <div class="logingrid">
                    <h2>Register</h2>
                    <form role="form" action="{{route('home.store')}}" method="POST">
                        {{ csrf_field() }}
                    <div class="login-input">
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
                    <p style="margin-left: 17px">Sudah punya akun? <a href="{{route('home.login')}}" style="color:rgb(46, 156, 160)">Login sekarang!</a></p>
                    <button type="submit" class="loginbutton" style="margin-left: 140px">Register</button>
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
    $("#alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#alert").slideUp(500);
    });
});
</script>

