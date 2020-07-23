<?php

namespace App\Http\Controllers\backController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Image;
use App\Artikel;
use App\ArtikelDetail;
use App\ArtikelFoto;
use Carbon\Carbon;

class artikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //menampilkan artikel

        $showArtikel = Artikel::select('artikel_stcw.*')->orderBy('id','desc')->get();

        return view('backEnd.artikel.showArtikel', compact('showArtikel'));        
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //menampilkan form input artikel

        return view('backEnd.artikel.inputArtikel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save data artikel baru

        // store master artikel        

            $artikel = new Artikel;

            $artikel->judul = $request->judulArtikel;            
            $artikel->isi_artikel = $request->isiArtikel;
            $artikel->penulis = 'yoga';

            $artikel->save();            

        // store foto artikel

        if($files=$request->file('fotoArtikel')){
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $path = $file->move(public_path('images/fotoArtikel'), $filenameToStore);

                $infoto = new ArtikelFoto;

                $infoto->id_artikel = $artikel->id;
                $infoto->foto_artikel = $filenameToStore;
                $infoto->sumber_foto = $request->sumberFoto;
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
        //menampilkan data yang akan di edit

        $editArtikel = Artikel::select('artikel_stcw.*', 'image_artikel_stcw.sumber_foto')
        ->join('image_artikel_stcw', 'artikel_stcw.id', '=', 'image_artikel_stcw.id_artikel')
        ->where('artikel_stcw.id',$id)->limit(1)->get();

        return view('backEnd.artikel.editArtikel', compact('editArtikel')); 
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
        //update Artikel

        $upArtikel = Artikel::find($id);

        $upArtikel->judul = $request->judulArtikel;
        $upArtikel->isi_artikel = $request->isiArtikel;

        $upArtikel->save();

        //update sumber foto artikel

        $upSumFoto = ArtikelFoto::where('id_artikel',$id)
        ->update(['sumber_foto'=>$request->sumberFoto]);       

        $showArtikel = Artikel::all();

        return redirect()->route('Artikel.index', compact('showArtikel'));
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

    public function showFoto($id)
    {
        // menampilkan foto artikel yang di edit

        $showFoto = ArtikelFoto::select('image_artikel_stcw.*')
        ->where('id_artikel',$id)->get();

        $idFoto = ArtikelFoto::select('image_artikel_stcw.*')
        ->where('id_artikel',$id)->first();

        return view('backEnd.artikel.showFotoArt', compact('showFoto','idFoto')); 
    }

    public function inputFoto($id)
    {
        // menampilkan input foto artikel yang di edit

        $showFoto = ArtikelFoto::select('image_artikel_stcw.*')
        ->where('id_artikel',$id)->first();

        return view('backEnd.artikel.inputFotoArt', compact('showFoto')); 
    }

    public function storeFoto(Request $request)
    {
        // store foto aktikel tambahan (edit)
          
        if($files=$request->file('fotoArtikel')){

            $validation = $request->validate([
                'fotoArtikel.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
             ]);

            foreach ($files as $file) {                
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $path = $file->move(public_path('images/fotoArtikel'), $filenameToStore);               
                
                $infoto = new ArtikelFoto;

                $infoto->id_artikel = $request->idArtikel;
                $infoto->foto_artikel = $filenameToStore;
                $infoto->sumber_foto = $request->sumberFoto;
                $infoto->save();     
            }
        }                
        return redirect()->back()->with('alert','Data Sukses di Tambahkan');
    }

    public function destroyFoto($id)
    {
        // menghapus foto softdelete

        $foto = ArtikelFoto::find($id);
        $foto->delete();

        // File::delete('images/fotoArtikel/'.$foto->foto_artikel);        
        // $foto = ArtikelFoto::where('id',$id)->first();              
        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
 
    public function FotoTrash()
    {
        // menampilkan foto yang sudah di hapus

        $foto = ArtikelFoto::onlyTrashed()->get();        

        return view('backEnd.artikel.showTrashFotoArt', compact('foto'));
    }

    
    public function restoreFoto($id)
    {
        // mengembalikan foto yang telah di hapus

        $foto = ArtikelFoto::onlyTrashed()->where('id',$id);
        $foto->restore();

        return redirect()->back()->with('alert','Data Sukses di Kembalikan');
    }

    public function restoreFotoAll()
    {
        // mengembalikan semua foto yang telah di hapus

        $foto = ArtikelFoto::onlyTrashed();
        $foto->restore();

        return redirect()->back()->with('alert','Semua Data Sukses di Kembalikan');
    }


    public function forceDelFoto($id)
    {
        // hapus foto permanen

        $foto = ArtikelFoto::onlyTrashed()->where('id',$id);

        // ambil nama foto dan hapus foto di folder
        $delfoto = $foto->get();

        foreach ($delfoto as $hapus ) {
            File::delete('images/fotoArtikel/'.$hapus->foto_artikel);
        }

        // hapus foto di database
        $foto->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function forceDelFotoAll()
    {
        // hapus semua foto permanen

        $foto = ArtikelFoto::onlyTrashed();

        // ambil nama foto dan hapus foto di folder
        $delfoto = $foto->get();

        foreach ($delfoto as $hapus ) {
            File::delete('images/fotoArtikel/'.$hapus->foto_artikel);
        }
        
        // hapus foto di database
        $foto->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function destroyArtikel($id)
    {
        // menghapus artikel softdelete

        $artikel = Artikel::find($id);
        $artikel->delete();

        // File::delete('images/fotoArtikel/'.$foto->foto_artikel);        
        // $foto = ArtikelFoto::where('id',$id)->first();              
        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
 
    public function ArtikelTrash()
    {
        // menampilkan artikel yang sudah di hapus

        $artikel = Artikel::onlyTrashed()->get();

        return view('backEnd.artikel.showTrashArtikel', compact('artikel'));
    }

    
    public function restoreArtikel($id)
    {
        // mengembalikan artikelyang telah di hapus

        $artikel  = Artikel::onlyTrashed()->where('id',$id);
        $artikel ->restore();

        return redirect()->back()->with('alert','Data Sukses di Kembalikan');
    }

    public function restoreArtikelAll()
    {
        // mengembalikan semua artikel yang telah di hapus

         $artikel  = Artikel::onlyTrashed();
         $artikel ->restore();

        return redirect()->back()->with('alert','Semua Data Sukses di Kembalikan');
    }


    public function forceDelArtikel($id)
    {
        // hapus artikel permanen

        $artikel  = Artikel::onlyTrashed()->where('id',$id);
        $artikel ->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function forceDelArtikelAll()
    {
        // hapus semua artikel permanen

        $foto = Artikel::onlyTrashed();
        $foto->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }


}
