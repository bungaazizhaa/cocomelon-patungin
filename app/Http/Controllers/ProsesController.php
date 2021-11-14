<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Redirect, Response;

class ProsesController extends Controller
{
   public function index()
   {
       $data['trans'] = \DB::table('transaksi')->orderBy('id', 'DESC')->get();

       return view('transaksistaff', $data);

   }

   public function addTrans()
   {
       return view('inputtransaksi');
   }

   public function storeTrans(Request $request)
   {
       date_default_timezone_set('Asia/Jakarta');

       $idTrans     = $request->idtransaksi;
       $idProd      = $request->idproduk;
       $bnykJual    = $request->banyakterjual;
       $pendapatan  = $request->pendapatan;
       $pengeluaran = $request->pengeluaran;
       $keuntungan  = $request->keuntungan;

       $data = [
           'id_transaksi'   => $idTrans,
           'id_produk'      => $idProd,
           'bnyk_terjual'   => $bnykJual,
           'pendapatan'     => $pendapatan,
           'pengeluaran'    => $pengeluaran,
           'keuntungan'     => $keuntungan,
           'create_date'    => date('Y-m-d')
       ];

       \DB::table('transaksi')->where('id', $request->id)->insert($data);

       Session::flash('alerts', 'Data Transaksi berhasil di tambahkan');
       return redirect('/proses/index');
   }

   public function edit($id)
   {
       $data['trans'] = \DB::table('transaksi')->where('id', $id)->first();

       return view('edittransaksi', $data);
   }

   public function update(Request $request)
   {
       date_default_timezone_set('Asia/Jakarta');

       $idTrans     = $request->idtransaksi;
       $idProd      = $request->idproduk;
       $bnykJual    = $request->banyakterjual;
       $pendapatan  = $request->pendapatan;
       $pengeluaran = $request->pengeluaran;
       $keuntungan  = $request->keuntungan;

       $data = [
           'id_transaksi'   => $idTrans,
           'id_produk'      => $idProd,
           'bnyk_terjual'   => $bnykJual,
           'pendapatan'     => $pendapatan,
           'pengeluaran'    => $pengeluaran,
           'keuntungan'     => $keuntungan,
           'update_date'    => date('Y-m-d')
       ];

       \DB::table('transaksi')->where('id', $request->id)->update($data);

       Session::flash('alerts', 'Data Transaksi berhasil di update');
       return redirect('/proses/index');
   }

   public function destroy($id)
   {
       \DB::table('transaksi')->where('id', $id)->delete();

       Session::flash('alerts', 'Data Transaksi berhasil di hapus');
       return redirect('/proses/index');
   }

   /******************* produk ************************/
   public function prodList()
   {
       $data['prod'] = \DB::table('produk')->orderBy('id', 'DESC')->get();

       return view('produkstaff', $data);
   }


    public function addProduk()
    {
        return view('inputproduk');
    }

    public function storeProduk(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $idProd = $request->idproduk;
        $namaProd = $request->namaproduk;
        $hargaProd = $request->hargaproduk;
        $stok = $request->stok;

        $cekIdProduk = \DB::table('produk')->where('id_produk', $idProd)->first();
        if ($cekIdProduk) {
            Session::flash('alerts', 'ID Produk sudah terdaftar');
            return redirect('/proses/addProduk');
        } else{
            $data = [
                'id_produk' => $idProd,
                'nama_produk' => $namaProd,
                'harga_produk' => $hargaProd,
                'stok' => $stok,
                'create_date' => date('Y-m-d')
            ];

        \DB::table('produk')->insert($data);

        Session::flash('alerts', 'Data Produk berhasil di tambahkan');
        return redirect('/proses/prodList');
        }
    }

    public function editProd($id)
    {
        $data['prod'] = \DB::table('produk')->where('id', $id)->first();

        return view('editproduk', $data);
    }

    public function updateProd(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $idProd      = $request->idproduk;
        $namaProd    = $request->namaproduk;
        $hargaProd   = $request->hargaproduk;
        $jualPerBln  = $request->terjualperbulan;
        $stok        = $request->stok;

        $data = [
            'id_produk'         => $idProd,
            'nama_produk'       => $namaProd,
            'harga_produk'      => $hargaProd,
            'terjual_per_bulan' => $jualPerBln,
            'stok'              => $stok,
            'update_date'       => date('Y-m-d')
        ];

        \DB::table('produk')->where('id', $request->id)->update($data);

        Session::flash('alerts', 'Data Produk berhasil di update');
        return redirect('/proses/prodList');
    }

    public function destroyProd($id)
    {
        \DB::table('produk')->where('id', $id)->delete();

        Session::flash('alerts', 'Data Produk berhasil di hapus');
        return redirect('/proses/prodList');
    }
}
