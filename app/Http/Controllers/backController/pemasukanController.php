<?php

namespace App\Http\Controllers\backController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use File;
use App\Pemasukan;
use App\PemasukanBukti;


class pemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pemasukan = Pemasukan::select('pemasukan_stcw.*')
        ->orderBy('id','Desc')->get();

        return view('backEnd.pemasukan.showPemasukan', compact('pemasukan'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backEnd.pemasukan.inputPemasukan');
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

        $pemasukan = new Pemasukan;

        $pemasukan->nama_barang_jasa = $request->namaBarang;
        $pemasukan->nominal = $request->harga;
        $pemasukan->sumber_dana = $request->sumberDana;

        $pemasukan->save();

         if($files=$request->file('fotoPemasukan')){
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $path = $file->move(public_path('images/fotoBuktiPemasukan'), $filenameToStore);

                $infoto = new PemasukanBukti;

                $infoto->id_pemasukan = $pemasukan->id;
                $infoto->foto_bukti = $filenameToStore;                
                $infoto->save();     
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
        $pemasukan = Pemasukan::select('pemasukan_stcw.*')
        ->where('id',$id)->get();

        return view('backEnd.pemasukan.editPemasukan', compact('pemasukan'));
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
        $pemasukan = Pemasukan::find($id);

        $pemasukan->nama_barang_jasa = $request->namaBarang;
        $pemasukan->nominal = $request->harga;
        $pemasukan->sumber_dana = $request->sumberDana;

        $pemasukan->save();

        return redirect()->route('PemasukanIn.index')->with('alert','Data Sukses di Update');
    }

    public function showFotoIn($id)
    {
        // menampilkan foto_bukti pemasukan

        $foto = PemasukanBukti::select('bukti_pemasukan_stcw.*')
        ->where('id_pemasukan',$id)->get();

        $idFoto = Pemasukan::select('pemasukan_stcw.*')
        ->where('id',$id)->first();

        return view('backEnd.pemasukan.showFotoIn', compact('foto','idFoto'));
    }

    public function inputFoto($id)
    {
        // menampilkan input foto artikel yang di edit

        $showFoto = Pemasukan::select('pemasukan_stcw.*')
        ->where('id',$id)->first();

        return view('backEnd.pemasukan.inputFotoIn', compact('showFoto')); 
    }

    public function storeFoto(Request $request)
    {
        // store foto aktikel tambahan (edit)

        if($files=$request->file('fotoPemasukan')){
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $path = $file->move(public_path('images/fotoBuktiPemasukan'), $filenameToStore);

                $infoto = new PemasukanBukti;

                $infoto->id_pemasukan = $request->idBukti;
                $infoto->foto_bukti = $filenameToStore;                
                $infoto->save();     
            }
        }                
        return redirect()->back()->with('alert','Data Sukses di Tambahkan');
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

    public function destroyFoto($id)
    {
        // menghapus foto softdelete

        $foto = PemasukanBukti::find($id);
        $foto->delete();

        // File::delete('images/fotoPemasukan/'.$foto->foto_bukti);        
        // $foto = PemasukanFoto::where('id',$id)->first();              
        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
 
    public function FotoTrash()
    {
        // menampilkan foto yang sudah di hapus

        $foto = PemasukanBukti::onlyTrashed()->get();        

        return view('backEnd.pemasukan.showTrashFotoIn', compact('foto'));
    }

    
    public function restoreFoto($id)
    {
        // mengembalikan foto yang telah di hapus

        $foto = PemasukanBukti::onlyTrashed()->where('id',$id);
        $foto->restore();

        return redirect()->back()->with('alert','Data Sukses di Kembalikan');
    }

    public function restoreFotoAll()
    {
        // mengembalikan semua foto yang telah di hapus

        $foto = PemasukanBukti::onlyTrashed();
        $foto->restore();

        return redirect()->back()->with('alert','Semua Data Sukses di Kembalikan');
    }


    public function forceDelFoto($id)
    {
        // hapus foto permanen

        $foto = PemasukanBukti::onlyTrashed()->where('id',$id);

        // ambil nama foto dan hapus foto di folder
        $delfoto = $foto->get();

        foreach ($delfoto as $hapus ) {
            File::delete('images/fotoBuktiPemasukan/'.$hapus->foto_bukti);
        }

        // hapus foto di database
        $foto->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function forceDelFotoAll()
    {
        // hapus semua foto permanen

        $foto = PemasukanBukti::onlyTrashed();

        // ambil nama foto dan hapus foto di folder
        $delfoto = $foto->get();        

        foreach ($delfoto as $hapus ) {
            File::delete('images/fotoBuktiPemasukan/'.$hapus->foto_bukti);
        }
        
        // hapus foto di database
        $foto->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function destroyPemasukan($id)
    {
        // menghapus Pemasukan softdelete

        $Pemasukan = Pemasukan::find($id);
        $Pemasukan->delete();

        // File::delete('images/PemasukanArtikel/'.$Pemasukan->Pemasukan_artikel);        
        // $Pemasukan = ArtikelPemasukan::where('id',$id)->first();              
        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
 
    public function PemasukanTrash()
    {
        // menampilkan Pemasukan yang sudah di hapus

        $Pemasukan = Pemasukan::onlyTrashed()->get();

        return view('backEnd.pemasukan.showTrashPemasukan', compact('Pemasukan'));
    }

    
    public function restorePemasukan($id)
    {
        // mengembalikan Pemasukan yang telah di hapus

        $Pemasukan = Pemasukan::onlyTrashed()->where('id',$id);
        $Pemasukan->restore();

        return redirect()->back()->with('alert','Data Sukses di Kembalikan');
    }

    public function restorePemasukanAll()
    {
        // mengembalikan semua Pemasukan yang telah di hapus

        $Pemasukan = Pemasukan::onlyTrashed();
        $Pemasukan->restore();

        return redirect()->back()->with('alert','Semua Data Sukses di Kembalikan');
    }


    public function forceDelPemasukan($id)
    {
        // hapus Pemasukan permanen

        $Pemasukan = Pemasukan::onlyTrashed()->where('id',$id);
        $Pemasukan->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function forceDelPemasukanAll()
    {
        // hapus semua Pemasukan permanen

        $Pemasukan = Pemasukan::onlyTrashed();
        $Pemasukan->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
}
