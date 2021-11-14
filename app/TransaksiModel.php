<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class TransaksiModel extends Model
{
    public function transaksiList()
    {
        $trans = DB::table('transaksi')
                        ->select('*')
                        ->orderBy('id', 'DESC')
                        ->paginate(20);
        return $trans;
    }
}
