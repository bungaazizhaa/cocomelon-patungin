<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>
            PaTungin - Profil
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
                @if($jabatan == 'bos')
                    <a href="{{route('lp.dashboardbos')}}">Dashboard</a>
                    <a href="{{route('lp.transaksibos')}}">Transaksi</a>
                    <a href="{{route('lp.produkbos')}}">Produk</a>
                @else
                    <a href="{{route('lp.dashboardstaff')}}">Dashboard</a>
                    <a href="{{route('lp.transaksistaff')}}">Transaksi</a>
                    <a href="{{route('lp.produkstaff')}}">Produk</a>
                @endif
                    <a href="{{url('lp/profile')}}/{{session('id')}}">Profile</a>
                    <a class="login-button" href="{{route('home.logout')}}">Logout</a>
            </div>
        </div>

        @if(session('alerts'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <p style="margin-left: 10px;font-weight: bold">{{session('alerts')}}</p>
            </div>
        @endif
        <div class="profileform-container">
            <div class="profilegrid"></div>
            <form role="form" action="{{route('home.update')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="profileform">
                <div class="profilegrid">
                    <!--nanti tolong dihubungin ke foto yang diinput-->
                    @if(isset($foto))
                        <img src="{{asset('assets/foto/'.$foto)}}" style="width:100%;height:50%">
                        <input type="file" name="file" accept=".png, .jpeg, .jpg" class="form-control" >
                    @else
                        <img src="{{asset('assets/foto/noimage.png')}}" style="width:100%">
                        <input type="file" name="file" accept=".png, .jpeg, .jpg" class="form-control" >
                    @endif
                </div>
                <div class="profilegrid">
                    <h2>Profile</h2>
                    <div class="profile-input">
                        <input type="hidden" name="page" value="profile">
                        <input type="hidden" name="id" value="{{session('id')}}">
                        <p>Nama</p>
                        <input type="text" id="nama" name="nama" required>
                        <p>Jabatan</p>
                        {{--<input type="text" id="jabatan" name="jabatan">--}}

                        <select name="jabatan" id="jabatan" style="border-radius: 12px;border: none;margin-top: 10px;box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);" required>
                            @if($jabatan)
                                <option value="{{$jabatan}}" selected>{{ucwords($jabatan)}}</option>
                            @endif
                            <option vlaue=""></option>
                            <option value="bos">Bos</option>
                            <option value="staff">Staff</option>
                        </select>
                        <p>Email</p>
                        <input type="text" id="email" name="email" value="{{$email}}" required>
                        <p>Password</p>
                        <input type="password" id="password" name="password" required
                               style="border-radius: 12px;
                                        border: none;
                                        margin-top: 10px;
                                        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);"
                        >
                    </div>
                    <button type="submit" class="updatebutton" href="profilupdate">Update</button>
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
