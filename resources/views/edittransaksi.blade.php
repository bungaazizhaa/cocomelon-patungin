<!DOCTYPE html>
<html>
    <head>
        <title>
            PaTungin - Edit Transaksi
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
                <a href="{{'/'}}">Dashboard</a>
                <a href="{{route('lp.transaksistaff')}}">Transaksi</a>
                <a href="{{route('lp.produkstaff')}}">Produk</a>
                <a href="{{url('lp/profile')}}/{{session('id')}}">Profile</a>
                <a class="login-button" href="{{route('home.logout')}}">Logout</a>
            </div>
        </div>
        <div class="header-container">
            <div class="produk-header">
                <h2 style="margin-top: 30px;">Edit transaksi di sini!</h2>
                <p style="margin-top: -20px;">Masukkan data transaksi penjualan dan keuangan yang akan di edit</p>
            </div>
        </div>
        <div class="produkform-container">
            <div class="transaksiform">
                <div class="transaksigrid">
                    <h2>Edit Transaksi</h2>
                    <form role="form" action="{{route('proses.update')}}" method="POST">
                        {{ csrf_field() }}
                    <div class="transaksi-input">
                        <input type="hidden" name="id" value="{{$trans->id}}" />
                        <p>ID Transaksi</p>
                        <input type="text" id="idtransaksi" name="idtransaksi" value="{{$trans->id_transaksi}}">
                        <p>ID Produk</p>
                        <input type="text" id="idproduk" name="idproduk" value="{{$trans->id_produk}}">
                        <p>Banyak Terjual</p>
                        <input type="text" id="banyakterjual" name="banyakterjual" value="{{$trans->bnyk_terjual}}">
                        <p>Pendapatan Harian</p>
                        <input type="text" id="pendapatan" name="pendapatan"  value="{{$trans->pendapatan}}">
                        <p>Pengeluaran Harian</p>
                        <input type="text" id="pengeluaran" name="pengeluaran"  value="{{$trans->pengeluaran}}">
                        <p>Keuntungan</p>
                        <input type="text" id="keuntungan" name="keuntungan" value="{{$trans->keuntungan}}">
                    </div>
                    <button style="float: right; margin-top : 20px" type="submit" class="produkbutton">Simpan</button>
                    </form>
                </div>
                <div class="transaksigrid">
                    <img src="{{asset('assets/images/transaksi.png')}}" style="width:100%">
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
