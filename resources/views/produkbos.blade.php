<!DOCTYPE html>
<html>
    <head>
        <title>
            PaTungin - Produk Bos
        </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
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
                <a href="{{route('lp.dashboardbos')}}">Dashboard</a>
                <a href="{{route('lp.transaksibos')}}">Transaksi</a>
                <a class="active" href="{{route('lp.produkbos')}}">Produk</a>
                <a href="{{url('lp/profile')}}/{{session('id')}}">Profile</a>
                <a class="login-button" href="{{route('home.logout')}}">Logout</a>
            </div>
        </div>
        <div class="producttable-container">
            <div class="producttable">
                <div class="producttable-grid">
                    <table id="showtable" class="table display">
                        <thead>
                        <tr>
                            <th>ID Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Produk Terjual/Bulan</th>
                            <th>Stok</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($prod as $row)
                            <tr>
                                <td><?= $row->id_produk ?></td>
                                <td><?= $row->nama_produk ?></td>
                                <td><?= 'Rp. '.number_format($row->harga_produk) ?></td>
                                <td><?= number_format($row->terjual_per_bulan) ?></td>
                                <td><?= number_format($row->stok) ?></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
    <script>
        $(document).ready( function () {
            $('#showtable').DataTable({
                "pagingType": "simple_numbers",
                "language": {
                    "search": '<i class="fa fa-search"></i>',
                    "searchPlaceholder": "cari",
                },
                "dom":' <"search"f><"top"l>rt<"bottom"ip><"clear">'
            });
        } );
    </script>
</html>
