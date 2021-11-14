<!DOCTYPE html>
<html>
    <head>
        <title>
            PaTungin - Profil Update
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
            <a href="{{'/'}}">Dashboard</a>
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

        <div class="updateform-container">
            <div class="updategrid"></div>
            <form role="form" action="{{route('home.update')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="updateform">
                <div class="updategrid">
                    <!--nanti tolong dihubungin ke foto yang diinput-->
                    @if(isset($foto))
                        <img src="{{asset('assets/foto/'.$foto)}}" style="width:100%;height:50%">
                        <input type="file" name="file" accept=".png, .jpeg, .jpg" class="form-control" >
                    @else
                        <img src="{{asset('assets/foto/noimage.png')}}" style="width:100%">
                        <input type="file" name="file" accept=".png, .jpeg, .jpg" class="form-control" >
                    @endif
                </div>
                <div class="updategrid">
                    <h2>Profile</h2>
                    <div class="update-input">
                        <input type="hidden" name="page" value="profileUpdate">
                        <input type="hidden" name="id" value="{{session('id')}}">
                        <p>Nama</p>
                        <input type="text" id="nama" name="nama" value="{{$nama}}">
                        <p>Jabatan</p>
                        {{--<input type="text" id="jabatan" name="jabatan">--}}

                        <select name="jabatan" id="jabatan" clas="form-control" style="border-radius: 12px;border: none;margin-top: 10px;box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);" required>
                            @if($jabatan)
                                <option value="{{$jabatan}}" selected>{{ucwords($jabatan)}}</option>
                            @endif
                            <option vlaue=""></option>
                            <option value="bos">Bos</option>
                            <option value="staff">Staff</option>
                        </select>
                        <p>Email</p>
                        <input type="text" id="email" name="email" value="{{$email}}">
                        <p>Password lama</p>
                        <input type="password" id="passwordlama" name="passwordlama"
                               style="border-radius: 12px;
                                        border: none;
                                        margin-top: 10px;
                                        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);"
                        >
                        <p>Password baru</p>
                        <input type="password" id="passwordbaru" name="passwordbaru"
                               style="border-radius: 12px;
                                        border: none;
                                        margin-top: 10px;
                                        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);"
                        >
                        <!--<p>Foto Profil</p>
                        <input type="file" id="browse" name="browse">-->
                    </div>
                    <button type="submit" class="updatebutton2">Update</button>
                </div>
            </div>
            </form>
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
