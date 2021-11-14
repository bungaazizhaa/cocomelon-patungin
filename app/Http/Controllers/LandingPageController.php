<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class LandingPageController extends Controller
{
    public function index()
    {
        return view('landingpage');
    }

    public function daftar()
    {
        return view('register');
    }

    public function dashboardbos()
    {
        $data['laris'] = \DB::table('transaksi')->join('produk', 'produk.id_produk', '=', 'transaksi.id_produk')
                                                ->orderBy('bnyk_terjual', 'DESC')
                                                ->limit(5)->get();

        $data['stok'] = \DB::table('produk')->orderBy('stok', 'ASC')
                                            ->limit(5)->get();

        $data['countTrans'] = $data['laris']->count();
        $data['countStok']  = $data['stok']->count();

        return view('dashboardbos', $data);
    }

    public function transaksibos()
    {
        $data['trans'] = \DB::table('transaksi')->get();

        return view('transaksibos', $data);
    }

    public function produkbos()
    {
        $data['prod'] = \DB::table('produk')->orderBy('id', 'DESC')->get();

        return view('produkbos', $data);
    }

    public function dashboardstaff()
    {
        $data['laris'] = \DB::table('transaksi')->join('produk', 'produk.id_produk', '=', 'transaksi.id_produk')
                                                ->orderBy('bnyk_terjual', 'DESC')
                                                ->limit(5)->get();

        $data['stok'] = \DB::table('produk')//->where('stok', 0)
                                            ->orderBy('stok', 'ASC')
                                            ->limit(5)->get();

        $data['countTrans'] = $data['laris']->count();
        $data['countStok']  = $data['stok']->count();

        return view('dashboardstaff', $data);
    }

    public function transaksistaff()
    {
        $data['trans'] = \DB::table('transaksi')->get();

        return view('transaksistaff', $data);
    }

    public function produkstaff()
    {
        $data['prod'] = \DB::table('produk')->orderBy('id', 'DESC')->get();

        return view('produkstaff', $data);
    }

    public function profile(Request $request)
    {
        $id = $request->id;
        $chkUser    = \DB::table('users')->where('id', $id)->first();
        $email      = $chkUser->email;
        $password   = $chkUser->password;
        $jabatan    = $chkUser->jabatan;
        $nama       = $chkUser->name;
        $foto       = $chkUser->foto;

        $data = ['email' => $email, 'password' => $password, 'jabatan' => $jabatan, 'nama' => $nama, 'foto' => $foto];
        if(isset($chkUser->foto)){
            return view('profilupdate', $data);
        }else{
            return view('profil', $data);
        }

    }
}
