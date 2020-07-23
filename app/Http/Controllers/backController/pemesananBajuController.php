<?php

namespace App\Http\Controllers\backController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PemesananBaju;
use App\Baju;

class pemesananBajuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pemesan = new PemesananBaju;

        $pemesan->id_baju = $request->idBaju;
        $pemesan->nama_pemesan = $request->namaPemesan;
        $pemesan->ukuran_baju = $request->ukuranBaju;
        $pemesan->status = $request->statusPemesan;
        $pemesan->jumlah_baju = $request->jumlahBaju;
        $pemesan->gender_baju = $request->genderBaju;

        $pemesan->save();

        return redirect()->back()->with('alert','Data Sukses di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pemesananBaju = Baju::select('baju_stcw.id')->where('id',$id)->first();

        return view('backEnd.pemesananbaju.inputPemesanan', compact('pemesananBaju'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pemesananBaju = PemesananBaju::select('pemesan_baju_stcw.*')->where('id',$id)->get();

        return view('backEnd.pemesananbaju.editPemesanan', compact('pemesananBaju'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pemesan =  PemesananBaju::find($id);

        $pemesan->id_baju = $request->idBaju;
        $pemesan->nama_pemesan = $request->namaPemesan;
        $pemesan->ukuran_baju = $request->ukuranBaju;
        $pemesan->status = $request->statusPemesan;
        $pemesan->jumlah_baju = $request->jumlahBaju;
        $pemesan->gender_baju = $request->genderBaju;

        $pemesan->save();

        $pemesananBajuid = PemesananBaju::select('pemesan_baju_stcw.*')->where('id_baju',$pemesan->id_baju)->first();

        $pemesananBaju = PemesananBaju::select('pemesan_baju_stcw.*')->where('id_baju',$pemesan->id_baju)->get();
 
       return redirect()->route('Baju.show', [$pemesananBajuid->id_baju]);
       // return view('backEnd.pemesananBaju.showPemesanan', compact('pemesananBajuid', 'pemesananBaju'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function destroypemesan($id)
    {
        // menghapus pemesan softdelete

        $pemesan = PemesananBaju::find($id);
        $pemesan->delete();

        // File::delete('images/pemesanArtikel/'.$pemesan->pemesan_artikel);        
        // $pemesan = Artikelpemesan::where('id',$id)->first();              
        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
 
    public function pemesanTrash()
    {
        // menampilkan pemesan yang sudah di hapus

        $pemesan = PemesananBaju::onlyTrashed()->get();

        return view('backEnd.pemesananbaju.showTrashpemesan', compact('pemesan'));
    }

    
    public function restorepemesan($id)
    {
        // mengembalikan pemesan yang telah di hapus

        $pemesan = PemesananBaju::onlyTrashed()->where('id',$id);
        $pemesan->restore();

        return redirect()->back()->with('alert','Data Sukses di Kembalikan');
    }

    public function restorepemesanAll()
    {
        // mengembalikan semua pemesan yang telah di hapus

        $pemesan = PemesananBaju::onlyTrashed();
        $pemesan->restore();

        return redirect()->back()->with('alert','Semua Data Sukses di Kembalikan');
    }


    public function forceDelpemesan($id)
    {
        // hapus pemesan permanen

        $pemesan = PemesananBaju::onlyTrashed()->where('id',$id);
        $pemesan->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function forceDelpemesanAll()
    {
        // hapus semua pemesan permanen

        $pemesan = PemesananBaju::onlyTrashed();
        $pemesan->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
}
