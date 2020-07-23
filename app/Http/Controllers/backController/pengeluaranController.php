<?php

namespace App\Http\Controllers\backController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Pengeluaran;
use App\PengeluaranBukti;

class pengeluaranController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Pengeluaran = Pengeluaran::select('pengeluaran_stcw.*')
        ->orderBy('id','Desc')->get();

        return view('backEnd.pengeluaran.showPengeluaran', compact('Pengeluaran'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backEnd.pengeluaran.inputPengeluaran');
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

        $Pengeluaran = new Pengeluaran;

        $Pengeluaran->nama_barang_jasa = $request->namaBarang;
        $Pengeluaran->nominal = $request->harga;
        $Pengeluaran->keperluan = $request->keperluan;

        $Pengeluaran->save();

         if($files=$request->file('fotoPengeluaran')){
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $path = $file->move(public_path('images/fotoBuktiPengeluaran'), $filenameToStore);

                $infoto = new PengeluaranBukti;

                $infoto->id_pengeluaran = $Pengeluaran->id;
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
        $Pengeluaran = Pengeluaran::select('pengeluaran_stcw.*')
        ->where('id',$id)->get();

        return view('backEnd.pengeluaran.editPengeluaran', compact('Pengeluaran'));
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
        $Pengeluaran = Pengeluaran::find($id);

        $Pengeluaran->nama_barang_jasa = $request->namaBarang;
        $Pengeluaran->nominal = $request->harga;
        $Pengeluaran->keperluan = $request->keperluan;

        $Pengeluaran->save();

        return redirect()->route('PengeluaranIn.index')->with('alert','Data Sukses di Update');
    }

    public function showFotoOut($id)
    {
        // menampilkan foto_bukti Pengeluaran

        $foto = PengeluaranBukti::select('bukti_pengeluaran_stcw.*')
        ->where('id_pengeluaran',$id)->get();

        $idFoto = Pengeluaran::select('pengeluaran_stcw.*')
        ->where('id',$id)->first();

        return view('backEnd.pengeluaran.showFotoOut', compact('foto','idFoto'));
    }

    public function inputFoto($id)
    {
        // menampilkan input foto artikel yang di edit

        $showFoto = Pengeluaran::select('pengeluaran_stcw.*')
        ->where('id',$id)->first();

        return view('backEnd.pengeluaran.inputFotoOut', compact('showFoto')); 
    }

    public function storeFoto(Request $request)
    {
        // store foto aktikel tambahan (edit)

        if($files=$request->file('fotoPengeluaran')){
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $path = $file->move(public_path('images/fotoBuktiPengeluaran'), $filenameToStore);

                $infoto = new PengeluaranBukti;

                $infoto->id_pengeluaran = $request->idBukti;
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

        $foto = PengeluaranBukti::find($id);
        $foto->delete();

        // File::delete('images/fotoPengeluaran/'.$foto->foto_bukti);        
        // $foto = PengeluaranFoto::where('id',$id)->first();              
        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
 
    public function FotoTrash()
    {
        // menampilkan foto yang sudah di hapus

        $foto = PengeluaranBukti::onlyTrashed()->get();        

        return view('backEnd.pengeluaran.showTrashFotoOut', compact('foto'));
    }

    
    public function restoreFoto($id)
    {
        // mengembalikan foto yang telah di hapus

        $foto = PengeluaranBukti::onlyTrashed()->where('id',$id);
        $foto->restore();

        return redirect()->back()->with('alert','Data Sukses di Kembalikan');
    }

    public function restoreFotoAll()
    {
        // mengembalikan semua foto yang telah di hapus

        $foto = PengeluaranBukti::onlyTrashed();
        $foto->restore();

        return redirect()->back()->with('alert','Semua Data Sukses di Kembalikan');
    }


    public function forceDelFoto($id)
    {
        // hapus foto permanen

        $foto = PengeluaranBukti::onlyTrashed()->where('id',$id);

        // ambil nama foto dan hapus foto di folder
        $delfoto = $foto->get();

        foreach ($delfoto as $hapus ) {
            File::delete('images/fotoBuktiPengeluaran/'.$hapus->foto_bukti);
        }

        // hapus foto di database
        $foto->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function forceDelFotoAll()
    {
        // hapus semua foto permanen

        $foto = PengeluaranBukti::onlyTrashed();

        // ambil nama foto dan hapus foto di folder
        $delfoto = $foto->get();        

        foreach ($delfoto as $hapus ) {
            File::delete('images/fotoBuktiPengeluaran/'.$hapus->foto_bukti);
        }
        
        // hapus foto di database
        $foto->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function destroyPengeluaran($id)
    {
        // menghapus Pengeluaran softdelete

        $Pengeluaran = Pengeluaran::find($id);
        $Pengeluaran->delete();

        // File::delete('images/PengeluaranArtikel/'.$Pengeluaran->Pengeluaran_artikel);        
        // $Pengeluaran = ArtikelPengeluaran::where('id',$id)->first();              
        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
 
    public function PengeluaranTrash()
    {
        // menampilkan Pengeluaran yang sudah di hapus

        $Pengeluaran = Pengeluaran::onlyTrashed()->get();

        return view('backEnd.pengeluaran.showTrashPengeluaran', compact('Pengeluaran'));
    }

    
    public function restorePengeluaran($id)
    {
        // mengembalikan Pengeluaran yang telah di hapus

        $Pengeluaran = Pengeluaran::onlyTrashed()->where('id',$id);
        $Pengeluaran->restore();

        return redirect()->back()->with('alert','Data Sukses di Kembalikan');
    }

    public function restorePengeluaranAll()
    {
        // mengembalikan semua Pengeluaran yang telah di hapus

        $Pengeluaran = Pengeluaran::onlyTrashed();
        $Pengeluaran->restore();

        return redirect()->back()->with('alert','Semua Data Sukses di Kembalikan');
    }


    public function forceDelPengeluaran($id)
    {
        // hapus Pengeluaran permanen

        $Pengeluaran = Pengeluaran::onlyTrashed()->where('id',$id);
        $Pengeluaran->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function forceDelPengeluaranAll()
    {
        // hapus semua Pengeluaran permanen

        $Pengeluaran = Pengeluaran::onlyTrashed();
        $Pengeluaran->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
}
