<!DOCTYPE html>

<html>
    <head>
        <title>
            PaTungin - Dashboard
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
                <a class="active" href="{{route('lp.dashboardbos')}}">Dashboard</a>
                <a href="{{route('lp.transaksibos')}}">Transaksi</a>
                <a href="{{route('lp.produkbos')}}">Produk</a>
                <a href="{{url('lp/profile')}}/{{session('id')}}">Profile</a>
                <a class="login-button" href="{{route('home.logout')}}">Logout</a>
            </div>
        </div>
        <div class="header-container">
            <div class="produk-header">
                @if(!empty(session('name')))
                    <h2>Selamat datang {{session('name')}}</h2>
                @else
                    <h2>Selamat datang {{session('email')}}</h2>
                @endif
                <p style="margin-top: -20px;">Berikut data pembukuan dan keuangan perusahaan.</p>
            </div>
        </div>
        <div class="dashboard-container">
            <div class="dashboard-grid">
                <!--canvas chart.js nya masukin disini nanti, ini cuma template-->
                <div class="graphgrid">
                    <img src="{{asset('assets/images/tabel.png')}}" style="width:100%">
                </div>
                <div class="graphgrid">
                    <h2>Grafik Penjualan per Bulan</h2>
                    <p>Berikut merupakan grafik penjualan dari produk produk makanan selama 5 bulan terakhir. Dari grafik bisa terlihat peningkatan maupun penurunan jumlah produk yang berbeda setiap bulannya.<br><br>
                       Kunjungi halaman selanjutnya untuk informasi lebih rinci.<br><br>
                       Di bawah ini merupakan data produk yang paling laku terjual serta data stok produk yang mulai menipis.
                    </p>
                </div>
            </div>
        </div>
        <div class="dashboard-container">
            <div class="tabletitle-container">
                <div class="tabletitle">
                    <h3>Top 5 Produk Paling Laku Terjual</h3>
                </div>
                <div class="tabletitle">
                    <h3>Top 5 Stok Produk Menipis</h3>
                </div>
            </div>
        </div>
        <div class="dashboard-container">
            <div class="table-grid">
                <div class="tablecard">
                    <table id="dashboardtable">
                        <thead>
                        <tr>
                            <th>ID Produk</th>
                            <th>Nama Produk</th>
                            <th>Terjual</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($countTrans > 0)
                        @foreach($laris as $row)
                            <tr>
                                <td>{{$row->id_produk}}</td>
                                <td>{{$row->nama_produk}}</td>
                                <td>{{$row->bnyk_terjual}}</td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="tablecard">
                    <table id="dashboardtable">
                        <thead>
                        <tr>
                            <th>ID Produk</th>
                            <th>Nama Produk</th>
                            <th>Stok</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($countStok > 0)
                        @foreach($stok as $row)
                            <tr>
                                <td>{{$row->id_produk}}</td>
                                <td>{{$row->nama_produk}}</td>
                                <td>{{$row->stok}}</td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>

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
