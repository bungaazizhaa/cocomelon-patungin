<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Redirect, Response;

class HomeController extends Controller
{
    public function index()
    {
        $data['laris'] = \DB::table('transaksi')->join('produk', 'produk.id_produk', '=', 'transaksi.id_produk')
                                                ->orderBy('bnyk_terjual', 'DESC')
                                                ->limit(5)->get();

        $data['stok'] = \DB::table('produk')->orderBy('stok', 'ASC')
                                            ->limit(5)->get();

        $data['countTrans'] = $data['laris']->count();
        $data['countStok']  = $data['stok']->count();

        return view('dashboardstaff',$data);
    }

    public function bosPage()
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

    public function login(Request $request)
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $email = $request->email;
        $pass  = $request->password;

        $chkPass = md5($pass);
        $chkUser = \DB::table('users')->where(['email'=>$email, 'password'=>$chkPass])->first();

        if($chkUser){
            Session::put('id', $chkUser->id);
            Session::put('name', $chkUser->name);
            Session::put('email',$chkUser->email);
            Session::put('jabatan',$chkUser->jabatan);
            Session::put('foto',$chkUser->foto);
            Session::put('login',TRUE);

            if(empty($chkUser->jabatan)){
               return redirect('/home/bosPage');
            }elseif($chkUser->jabatan == 'staff'){
               return redirect('/home/index');
            }else{
               return redirect('/home/bosPage');
            }
        }else{
            Session::flash('alerts', 'Email atau Password salah');
            return redirect('/home/login');
        }


    }

    public function store(Request $request)
    {
        $email    = $request->email;
        $password = $request->password;

        if(!empty($email) && !empty($password))
        {
            $chkUser = \DB::table('users')->where('email', $email)->first();
            if($chkUser){
                Session::flash('alerts', 'Email '.$email.' sudah teregistrasi, gunakan email yang berbeda');
                return redirect('/lp/daftar');
            }else{
                $data = ['email'=>$email, 'password'=>md5($password)];
                \DB::table('users')->insert($data);

                Session::flash('alerts', 'Registrasi berhasil');
                return redirect('/lp/daftar');
            }
        }
    }

    public function update(Request $request)
    {
        $name     = $request->nama;
        $jabatan  = $request->jabatan;
        $email    = $request->email;
        $password = $request->password;
        $id       = $request->id;;
        $page     = $request->page;
        if($page == 'profile'){
            $pass = $password;
        }else{
            $pass = $request->passwordbaru;
        }

        if(!empty($email) && !empty($pass))
        {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $destinationPath = 'assets/foto/';
                $file->move($destinationPath, $file->getClientOriginalName());

                if($page == 'profile'){
                    $pass = md5($password);
                }else{
                    $pass = md5($request->passwordbaru);
                }

                $data = ['email'    => $email,
                         'password' => $pass,
                         'name'     => $name, 'jabatan'=>$jabatan,
                         'foto'     => $file->getClientOriginalName()];

                \DB::table('users')->where('id', $id)->update($data);

            }else{
                Session::flash('alerts', 'Foto belum di upload');
                return redirect('/lp/profile/'.$id);
            }
            Session::flash('alerts', 'Profil berhasil di update');
            return redirect('/lp/profile/'.$id);
        }
    }

    public function logout(){
        Session::put('login', false);
        Session::flush();
        return redirect('/');
    }
}
