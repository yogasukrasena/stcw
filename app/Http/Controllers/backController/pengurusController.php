<?php

namespace App\Http\Controllers\backController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pengurus;

class pengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pengurus = Pengurus::all();

        return view('backEnd.pengurus.showPengurus', compact('pengurus'));
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
        $pengurus = new Pengurus;

        $pengurus->nama_kepengurusan = $request->tingkatPengurus;

        $pengurus->save();

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

    public function destroyPengurus($id)
    {
        // menghapus Pengurus softdelete

        $Pengurus = Pengurus::find($id);
        $Pengurus->delete();

        // File::delete('images/PengurusArtikel/'.$Pengurus->Pengurus_artikel);        
        // $Pengurus = ArtikelPengurus::where('id',$id)->first();              
        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
 
    public function PengurusTrash()
    {
        // menampilkan Pengurus yang sudah di hapus

        $Pengurus = Pengurus::onlyTrashed()->get();

        return view('backEnd.Pengurus.showTrashPengurus', compact('Pengurus'));
    }

    
    public function restorePengurus($id)
    {
        // mengembalikan Pengurus yang telah di hapus

        $Pengurus = Pengurus::onlyTrashed()->where('id',$id);
        $Pengurus->restore();

        return redirect()->back()->with('alert','Data Sukses di Kembalikan');
    }

    public function restorePengurusAll()
    {
        // mengembalikan semua Pengurus yang telah di hapus

        $Pengurus = Pengurus::onlyTrashed();
        $Pengurus->restore();

        return redirect()->back()->with('alert','Semua Data Sukses di Kembalikan');
    }


    public function forceDelPengurus($id)
    {
        // hapus Pengurus permanen

        $Pengurus = Pengurus::onlyTrashed()->where('id',$id);
        $Pengurus->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function forceDelPengurusAll()
    {
        // hapus semua Pengurus permanen

        $Pengurus = Pengurus::onlyTrashed();
        $Pengurus->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
}
