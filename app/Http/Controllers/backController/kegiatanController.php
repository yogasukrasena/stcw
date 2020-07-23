<?php

namespace App\Http\Controllers\backController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use File;
use App\Kegiatan;
use App\PemasukanBukti;
use App\PemasukanDetail;

use Carbon\Carbon;

class kegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //menampilkan Kegiatan

        $showKegiatan = Kegiatan::all();

        return view('backEnd.kegiatan.showKegiatan', compact('showKegiatan'));
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         //menampilkan form input pemasukan
        return view('backEnd.kegiatan.inputKegiatan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store kegiatan

        $kegiatan = new Kegiatan;

        $kegiatan->nama_kegiatan = $request->namaKegiatan;
        $kegiatan->tanggal_mulai = $request->tanggalMulai;
        $kegiatan->tanggal_berakhir = $request->tanggalBerakhir;

        $kegiatan->save();

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
        $editKegiatan = Kegiatan::select('kegiatan_stcw.*')->where('id',$id)->limit(1)->get();

        return view('backEnd.kegiatan.editKegiatan', compact('editKegiatan'));
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
        $upKegiatan = Kegiatan::find($id);

        $upKegiatan->nama_kegiatan = $request->namaKegiatan;
        $upKegiatan->tanggal_mulai = $request->tanggalMulai;
        $upKegiatan->tanggal_berakhir = $request->tanggalBerakhir;

        $upKegiatan->save();

        return redirect()->route('admin.showKegiatan')->with('alert','Data Sukses di Update');
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

    public function destroyKegiatan($id)
    {
        // menghapus kegiatan softdelete

        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();

        // File::delete('images/kegiatanArtikel/'.$kegiatan->kegiatan_artikel);        
        // $kegiatan = Artikelkegiatan::where('id',$id)->first();              
        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
 
    public function KegiatanTrash()
    {
        // menampilkan kegiatan yang sudah di hapus

        $kegiatan = Kegiatan::onlyTrashed()->get();

        return view('backEnd.kegiatan.showTrashKegiatan', compact('kegiatan'));
    }

    
    public function restoreKegiatan($id)
    {
        // mengembalikan kegiatan yang telah di hapus

        $kegiatan = Kegiatan::onlyTrashed()->where('id',$id);
        $kegiatan->restore();

        return redirect()->back()->with('alert','Data Sukses di Kembalikan');
    }

    public function restoreKegiatanAll()
    {
        // mengembalikan semua kegiatan yang telah di hapus

        $kegiatan = Kegiatan::onlyTrashed();
        $kegiatan->restore();

        return redirect()->back()->with('alert','Semua Data Sukses di Kembalikan');
    }


    public function forceDelKegiatan($id)
    {
        // hapus kegiatan permanen

        $kegiatan = Kegiatan::onlyTrashed()->where('id',$id);
        $kegiatan->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function forceDelKegiatanAll()
    {
        // hapus semua kegiatan permanen

        $kegiatan = Kegiatan::onlyTrashed();
        $kegiatan->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
}
