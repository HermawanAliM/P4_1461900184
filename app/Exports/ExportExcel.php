<?php

namespace App\Exports;

use App\Models\Buku;
use App\Models\JenisBuku;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportExcel implements FromCollection {
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $buku = Buku::all();
        $buku = DB::table('buku')->join('jenis_buku', 'jenis_buku.id', '=', 'buku.id') ->get();
        return $buku;
    }
}
