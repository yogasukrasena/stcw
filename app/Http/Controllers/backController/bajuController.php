<?php

namespace App\Http\Controllers\backController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Baju;
use App\PemesananBaju;

class bajuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Baju = Baju::all();

        return view('backEnd.baju.showBaju', compact('Baju'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backEnd.baju.inputBaju');
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
         if($files=$request->file('fotoBaju')){
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $path = $file->move(public_path('images/fotoBaju'), $filenameToStore);                

                $Baju = new Baju;

                $Baju->nama_baju = $request->namaBaju;
                $Baju->harga_baju = $request->hargaBaju;                               
                $Baju->desk_baju = $request->isiBaju;                
                $Baju->foto_baju = $filenameToStore;
               
                $Baju->save();     
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
        $pemesananBaju = PemesananBaju::select('pemesan_baju_stcw.*')->where('id_baju',$id)->get();
        $pemesananBajuid = Baju::select('baju_stcw.id')->where('id',$id)->first();

        // return $pemesananBajuid;

        return view('backEnd.pemesananbaju.showPemesanan', compact('pemesananBaju','pemesananBajuid'));
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
        $editBaju = Baju::select('baju_stcw.*')->where('id',$id)->limit(1)->get();

        return view('backEnd.baju.editBaju', compact('editBaju'));
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
        $Baju = Baju::find($id);

        $Baju->nama_baju = $request->namaBaju;
        $Baju->harga_baju = $request->hargaBaju;                               
        $Baju->desk_baju = $request->isiBaju;                        
       
        $Baju->save();     

        $showBaju = Baju::all();

        return redirect()->route('Baju.index', compact('showBaju'));
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

    public function destroyBaju($id)
    {
        // menghapus Baju softdelete

        $Baju = Baju::find($id);
        $Baju->delete();

        // File::delete('images/BajuArtikel/'.$Baju->Baju_artikel);        
        // $Baju = ArtikelBaju::where('id',$id)->first();              
        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
 
    public function BajuTrash()
    {
        // menampilkan Baju yang sudah di hapus

        $Baju = Baju::onlyTrashed()->get();

        return view('backEnd.baju.showTrashBaju', compact('Baju'));
    }

    
    public function restoreBaju($id)
    {
        // mengembalikan Baju yang telah di hapus

        $Baju = Baju::onlyTrashed()->where('id',$id);
        $Baju->restore();

        return redirect()->back()->with('alert','Data Sukses di Kembalikan');
    }

    public function restoreBajuAll()
    {
        // mengembalikan semua Baju yang telah di hapus

        $Baju = Baju::onlyTrashed();
        $Baju->restore();

        return redirect()->back()->with('alert','Semua Data Sukses di Kembalikan');
    }


    public function forceDelBaju($id)
    {
        // hapus Baju permanen

        $Baju = Baju::onlyTrashed()->where('id',$id);

        $delfoto = $Baju->get();

        foreach ($delfoto as $hapus ) {
            File::delete('images/fotoBaju/'.$hapus->foto_baju);
        }

        $Baju->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function forceDelBajuAll()
    {
        // hapus semua Baju permanen

        $Baju = Baju::onlyTrashed();
    
        $delfoto = $Baju->get();

        foreach ($delfoto as $hapus ) {
            File::delete('images/fotoBaju/'.$hapus->foto_baju);
        }

        $Baju->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
}
