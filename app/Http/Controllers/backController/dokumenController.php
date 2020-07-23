<?php

namespace App\Http\Controllers\backController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dokumen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Image;

class dokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $showDokumen = Dokumen::all();

        return view('backEnd.dokumen.showDokumen', compact('showDokumen'));
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
    public function storeVideo(Request $request)
    {
        //
        $invideo = new Dokumen;

            $invideo->media = $request->DokumenVideo;
            $invideo->jenis_media = $request->jenisMedia;                
            $invideo->doc_for = $request->dokumenUntuk;
            $invideo->uploaded = $request->admin;                                
            $invideo->save();     
                     
        return redirect()->back()->with('alert','Data Sukses di Tambahkan');

    }

    public function storeFoto(Request $request)
    {
        //
        if($files=$request->file('DokumenFoto')){
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $path = $file->move(public_path('images/fotoDokumen'), $filenameToStore);

                $infoto = new Dokumen;

                $infoto->media = $filenameToStore;
                $infoto->jenis_media = $request->jenisMedia;                
                $infoto->doc_for = $request->dokumenUntuk;
                $infoto->uploaded = $request->admin;                                
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

    public function destroydokumen($id)
    {
        // menghapus dokumen softdelete

        $dokumen = Dokumen::find($id);
        $dokumen->delete();

        // File::delete('images/dokumenArtikel/'.$dokumen->dokumen_artikel);        
        // $dokumen = Artikeldokumen::where('id',$id)->first();              
        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
 
    public function dokumenTrash()
    {
        // menampilkan dokumen yang sudah di hapus

        $dokumen = Dokumen::onlyTrashed()->get();

        return view('backEnd.dokumen.showTrashDokumen', compact('dokumen'));
    }

    
    public function restoredokumen($id)
    {
        // mengembalikan dokumen yang telah di hapus

        $dokumen = Dokumen::onlyTrashed()->where('id',$id);
        $dokumen->restore();

        return redirect()->back()->with('alert','Data Sukses di Kembalikan');
    }

    public function restoredokumenAll()
    {
        // mengembalikan semua dokumen yang telah di hapus

        $dokumen = Dokumen::onlyTrashed();
        $dokumen->restore();

        return redirect()->back()->with('alert','Semua Data Sukses di Kembalikan');
    }


    public function forceDeldokumen($id)
    {
        // hapus dokumen permanen

        $dokumen = Dokumen::onlyTrashed()->where('id',$id);

        $delfoto = $dokumen->get();

        foreach ($delfoto as $hapus ) {

            if ($hapus->jenis_media == 1 ){            
                
                    File::delete('images/fotoDokumen/'.$hapus->media);                
                
                $dokumen->forceDelete();    
            }
            else{

                $dokumen->forceDelete();
            }
        }
        

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function forceDeldokumenAll()
    {
        // hapus semua dokumen permanen

        $dokumen = Dokumen::onlyTrashed();

        $delfoto = $dokumen->get();

        foreach ($delfoto as $hapus ) {

            if ($hapus->jenis_media == 1 ){            
                
                    File::delete('images/fotoDokumen/'.$hapus->media);                
                
                $dokumen->forceDelete();    
            }
            else{

                $dokumen->forceDelete();
            }
        }        

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
}
