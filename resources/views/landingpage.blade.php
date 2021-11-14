<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            PaTungin
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
                <a href="#tentang">Tentang</a>
                <a href="#carakerja">Cara kerja</a>
                @if(session('login') == TRUE)
                    <a class="login-button" href="{{route('home.login')}}">Logout</a>
                @else
                    <a class="login-button" href="{{route('home.login')}}">Login</a>
                @endif
            </div>
        </div>
        <div class="bg-container" id="beranda">
            <img src="{{asset('assets/images/Header.png')}}" style="width:100%;">
            <div class="landingpage-logo">
                <img src="{{asset('assets/images/Logo.png')}}" style="width:100%">
            </div>
            <div class="landingpage-jargon">
                <p>Mengatur finance perusahaan anda!</p>
            </div>
            <div class="landingpage-daftar">

                <a class="register-button" href="{{route('lp.daftar')}}" style="text-decoration: none;">Daftar</a>

            </div>
        </div>
        <div class="centertext" id="tentang">
            <h3>
                <span style="color: rgb(46, 156, 160)">Tentang</span>
                <span style="color: black">PaTungin</span>
            </h3>
            <p>PaTungin adalah aplikasi berbasis website untuk pendataan kegiatan penjualan pangan di sebuah perusahaan. PaTungin Yang merupakan buku pendataan stok makanan beserta harga jual, pemasukan dan banyak barang terjual. Aplikasi ini berguna sebagai rekapitulasi data pada perusahaan serta sebagai informasi bagi petinggi perusaan untuk memantau kegiatan perusahaan.</p>
        </div>
        <div class="bg-container">
            <image src="{{asset('assets/images/Header2.png')}}" style="width:100%">
            <div class="satu">
                <image src="{{asset('assets/images/1.png')}}" style="width:50px; height: auto"></image>
                <p>Dapat melihat database perusahaan dengan mudah</p>
            </div>
            <div class="duatiga">
                <div class="duatiga-card">
                    <image src="{{asset('assets/images/2.png')}}" style="width:50px; height: auto"></image>
                    <p>Mengamati kegiatan perusahaan dengan mudah</p>
                </div>
                <div class="duatiga-card">
                    <image src="{{asset('assets/images/3.png')}}" style="width:50px; height: auto"></image>
                    <p>Memberikan laporan kegiatan perusahaan</p>
                </div>
            </div>
        </div>
        <div class="centertext" id="carakerja">
            <h3>
                <span style="color: rgb(46, 156, 160)">Cara kerja</span>
                <span style="color: black">PaTungin</span>
            </h3>
        </div>
        <div class="container-carakerja">
            <div class="card">
                <img src="{{asset('assets/images/Register.png')}}" style="width:100%">
                <div class="isian">
                  <p>Register data diri anda yang terdaftar di perusahaan.</p>
                </div>
              </div>
              <div class="card">
                <img src="{{asset('assets/images/Login.png')}}" style="width:100%">
                <div class="isian">
                  <p>Login dengan username dan password yang telah terdaftar sebelumnya.</p>
                </div>
              </div>
              <div class="card">
                <img src="{{asset('assets/images/Bos.png')}}" style="width:100%">
                <div class="isian">
                  <p>Apabila seorang petinggi perusahaan, akan di arahkan pada halaman boss.</p>
                </div>
              </div>
              <div class="card">
                <img src="{{asset('assets/images/Staff.png')}}" style="width:100%">
                <div class="isian">
                  <p>Apabila seorang staff/karyawan perusahaan, akan di arahkan pada halaman staff.</p>
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
                        <p><a href="#tentang">Tentang</a></p>
                        <p><a href="#carakerja">Cara kerja</a></p>
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
