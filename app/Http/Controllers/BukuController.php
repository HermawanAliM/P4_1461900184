<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Buku;
use App\Exports\ExportExcel;

class BukuController extends Controller {
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // $buku = Buku::all();
    //     $buku = DB::table('buku')->get();
    //     $buku = DB::table('buku')->Join('jenis_buku', 'jenis', 'jenis_buku.jenis')->get();
    //     return view('buku0184', ['buku'=> $buku]);
    // }
        $buku = Buku::join('jenis_buku','buku.id','=','jenis_buku.id')->get();
        return view('buku0184',['buku' => $buku]);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('tambah_data0184');
    }

    public function export_excel() {
		return Excel::download(new ExportExcel, 'Data_1461900184.xlsx');
	}

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        Buku::create([
            'id' => $request-> id,
            'judul' => $request-> judul,
            'tahun_terbit' => $request-> tahun_terbit,
        ]);

        return redirect('buku0184');
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $buku = buku::find($id);
        return view('edit_data0184', ['buku0184' => $buku]);
    }

    /* 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $buku = buku::find($id);
        $buku->id = $request->id;
        $buku->judul = $request->judul;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->save();

        return redirect('buku0184');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $buku = buku::find($id);
        $buku->delete();

        return redirect ('buku0184');
    }
}