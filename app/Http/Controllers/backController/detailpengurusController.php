<?php

namespace App\Http\Controllers\backController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DetailPengurus;
use App\Anggota;
use App\Pengurus;
use Carbon\Carbon;

class detailpengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $penjabat = DetailPengurus::select('detail_pengurus_stcw.*', 'anggota_stcw.nama_anggota', 'pengurus_stcw.nama_kepengurusan')
            ->join('anggota_stcw', 'detail_pengurus_stcw.id_anggota', '=', 'anggota_stcw.id')
            ->join('pengurus_stcw', 'detail_pengurus_stcw.id_pengurus', '=', 'pengurus_stcw.id')
            ->get();

        return view('backEnd.penjabat.showPenjabat', compact('penjabat')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $anggota = Anggota::all();

        $pengurus = Pengurus::all();

        return view('backEnd.penjabat.inputPenjabat', compact('anggota','pengurus')); 
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
        
        $penjabat = new DetailPengurus;

        $penjabat->id_anggota = $request->namaPengurus;
        $penjabat->id_pengurus = $request->jabatan;
        $penjabat->mulai_menjabat = $request->tglMenjabat;
        $penjabat->akhir_menjabat = Carbon::parse($request->tglMenjabat)->add(2,'year')->format('Y-m-d') ;

        $penjabat->save();

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
        $anggota = Anggota::all();

        $pengurus = Pengurus::all();

        $penjabat = DetailPengurus::select('detail_pengurus_stcw.*')->where('id',$id)->get();

        return view('backEnd.penjabat.editPenjabat', compact('anggota','pengurus', 'penjabat')); 
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
        $penjabat = DetailPengurus::find($id);

        $penjabat->id_anggota = $request->namaPengurus;
        $penjabat->id_pengurus = $request->jabatan;
        $penjabat->mulai_menjabat = $request->tglMenjabat;
        $penjabat->akhir_menjabat = $request->tglAkhir;

        $penjabat->save();

        return redirect()->route('Penjabat.index')->with('alert','Data Sukses di Perbaharui');

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

     public function destroyPenjabat($id)
    {
        // menghapus Penjabat softdelete

        $Penjabat = DetailPengurus::find($id);
        $Penjabat->delete();

        // File::delete('images/PenjabatArtikel/'.$Penjabat->Penjabat_artikel);        
        // $Penjabat = ArtikelPenjabat::where('id',$id)->first();              
        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
 
    public function PenjabatTrash()
    {
        // menampilkan Penjabat yang sudah di hapus

        $penjabat = DetailPengurus::select('detail_pengurus_stcw.*', 'anggota_stcw.nama_anggota', 'pengurus_stcw.nama_kepengurusan')
            ->join('anggota_stcw', 'detail_pengurus_stcw.id_anggota', '=', 'anggota_stcw.id')
            ->join('pengurus_stcw', 'detail_pengurus_stcw.id_pengurus', '=', 'pengurus_stcw.id')
            ->onlyTrashed()
            ->get();

        return view('backEnd.penjabat.showTrashPenjabat', compact('penjabat'));
    }

    
    public function restorePenjabat($id)
    {
        // mengembalikan Penjabat yang telah di hapus

        $Penjabat = DetailPengurus::onlyTrashed()->where('id',$id);
        $Penjabat->restore();

        return redirect()->back()->with('alert','Data Sukses di Kembalikan');
    }

    public function restorePenjabatAll()
    {
        // mengembalikan semua Penjabat yang telah di hapus

        $Penjabat = DetailPengurus::onlyTrashed();
        $Penjabat->restore();

        return redirect()->back()->with('alert','Semua Data Sukses di Kembalikan');
    }


    public function forceDelPenjabat($id)
    {
        // hapus Penjabat permanen

        $Penjabat = DetailPengurus::onlyTrashed()->where('id',$id);
        $Penjabat->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function forceDelPenjabatAll()
    {
        // hapus semua Penjabat permanen

        $Penjabat = DetailPengurus::onlyTrashed();
        $Penjabat->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
}
