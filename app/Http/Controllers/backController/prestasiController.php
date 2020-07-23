<?php

namespace App\Http\Controllers\backController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Prestasi;

class prestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prestasi = Prestasi::all();

        return view('backEnd.prestasi.showPrestasi', compact('prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backEnd.prestasi.inputPrestasi');
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
         if($files=$request->file('fotoPrestasi')){
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $path = $file->move(public_path('images/fotoPrestasi'), $filenameToStore);                

                $prestasi = new Prestasi;

                $prestasi->nama_prestasi = $request->namaPrestasi;
                $prestasi->juara = $request->juaraIn;                
                $prestasi->tingkat_prestasi = $request->tingkatIn;
                $prestasi->isi_prestasi = $request->isiPrestasi;                
                $prestasi->bukti_prestasi = $filenameToStore;
               
                $prestasi->save();     
            }
        }
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
        $editPrestasi = Prestasi::select('prestasi_stcw.*')->where('id',$id)->limit(1)->get();

        return view('backEnd.prestasi.editPrestasi', compact('editPrestasi'));
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
        $prestasi = Prestasi::find($id);

        $prestasi->nama_prestasi = $request->namaPrestasi;
        $prestasi->juara = $request->juaraIn;                
        $prestasi->tingkat_prestasi = $request->tingkatIn;
        $prestasi->isi_prestasi = $request->isiPrestasi;                        
       
        $prestasi->save();     

        $showPrestasi = Prestasi::all();

        return redirect()->route('Prestasi.index', compact('showPrestasi'));
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

    public function destroyPrestasi($id)
    {
        // menghapus Prestasi softdelete

        $Prestasi = Prestasi::find($id);
        $Prestasi->delete();

        // File::delete('images/PrestasiArtikel/'.$Prestasi->Prestasi_artikel);        
        // $Prestasi = ArtikelPrestasi::where('id',$id)->first();              
        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
 
    public function PrestasiTrash()
    {
        // menampilkan Prestasi yang sudah di hapus

        $Prestasi = Prestasi::onlyTrashed()->get();

        return view('backEnd.prestasi.showTrashPrestasi', compact('Prestasi'));
    }

    
    public function restorePrestasi($id)
    {
        // mengembalikan Prestasi yang telah di hapus

        $Prestasi = Prestasi::onlyTrashed()->where('id',$id);
        $Prestasi->restore();

        return redirect()->back()->with('alert','Data Sukses di Kembalikan');
    }

    public function restorePrestasiAll()
    {
        // mengembalikan semua Prestasi yang telah di hapus

        $Prestasi = Prestasi::onlyTrashed();
        $Prestasi->restore();

        return redirect()->back()->with('alert','Semua Data Sukses di Kembalikan');
    }


    public function forceDelPrestasi($id)
    {
        // hapus Prestasi permanen

        $Prestasi = Prestasi::onlyTrashed()->where('id',$id);
        $Prestasi->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function forceDelPrestasiAll()
    {
        // hapus semua Prestasi permanen

        $Prestasi = Prestasi::onlyTrashed();
        $Prestasi->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
}
