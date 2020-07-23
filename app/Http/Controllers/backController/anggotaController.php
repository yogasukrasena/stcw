<?php

namespace App\Http\Controllers\backController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Anggota;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Image;

class anggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $anggota = Anggota::all();

        return view('backEnd.anggota.showAnggota', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backEnd.anggota.inputAnggota');
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
        if($files=$request->file('fotoAnggota')){

            $validation = $request->validate([
                'fotoAnggota.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
             ]);

            foreach ($files as $file) {                
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $path = $file->move(public_path('images/fotoAnggota'), $filenameToStore);               
                
                $infoto = new Anggota;

                $infoto->nama_anggota = $request->namaAnggota;
                $infoto->profile_image = $filenameToStore;
                $infoto->email = $request->emailAnggota;
                $infoto->no_tlpn = $request->nomerTlpn;
                $infoto->status = $request->statusAnggota;
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
        $anggota = Anggota::select('anggota_stcw.*')->where('id',$id)->get();

        return view('backEnd.anggota.editAnggotaFoto', compact('anggota'));
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
        $anggota = Anggota::select('anggota_stcw.*')->where('id',$id)->get();

        return view('backEnd.anggota.editAnggota', compact('anggota'));
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
        $infoto = Anggota::find($id);

        $infoto->nama_anggota = $request->namaAnggota;        
        $infoto->email = $request->emailAnggota;
        $infoto->no_tlpn = $request->nomerTlpn;
        $infoto->status = $request->statusAnggota;
        $infoto->save();

        return redirect()->route('Anggota.index')->with('alert','Data Sukses di Update');     
    }

    public function updateFoto(Request $request, $id)
    {
        //hapus foto lama
        $fotoLama = Anggota::select('anggota_stcw.*')
        ->where('id',$id)->get();

        foreach ($fotoLama as $hapus ) {
        File::delete('images/fotoAnggota/'.$hapus->profile_image);
        }
        
        //insert foto baru

         if($files=$request->file('fotoAnggota')){

            $validation = $request->validate([
                'fotoAnggota.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
             ]);

            foreach ($files as $file) {                
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $path = $file->move(public_path('images/fotoAnggota'), $filenameToStore);               
                
                $infoto = Anggota::find($id);
             
                $infoto->profile_image = $filenameToStore;               
                $infoto->save();     
            }
        }                       
        return redirect()->route('Anggota.index')->with('alert','Data Sukses di Update');     
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

     public function destroyAnggota($id)
    {
        // menghapus Anggota softdelete

        $Anggota = Anggota::find($id);
        $Anggota->delete();

        // File::delete('images/AnggotaArtikel/'.$Anggota->Anggota_artikel);        
        // $Anggota = ArtikelAnggota::where('id',$id)->first();              
        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
 
    public function AnggotaTrash()
    {
        // menampilkan Anggota yang sudah di hapus

        $Anggota = Anggota::onlyTrashed()->get();

        return view('backEnd.anggota.showTrashAnggota', compact('Anggota'));
    }

    
    public function restoreAnggota($id)
    {
        // mengembalikan Anggota yang telah di hapus

        $Anggota = Anggota::onlyTrashed()->where('id',$id);
        $Anggota->restore();

        return redirect()->back()->with('alert','Data Sukses di Kembalikan');
    }

    public function restoreAnggotaAll()
    {
        // mengembalikan semua Anggota yang telah di hapus

        $Anggota = Anggota::onlyTrashed();
        $Anggota->restore();

        return redirect()->back()->with('alert','Semua Data Sukses di Kembalikan');
    }


    public function forceDelAnggota($id)
    {
        // hapus Anggota permanen

        $Anggota = Anggota::onlyTrashed()->where('id',$id);

        // ambil nama foto dan hapus foto di folder
        $delfoto = $Anggota->get();

        foreach ($delfoto as $hapus ) {
            File::delete('images/fotoAnggota/'.$hapus->profile_image);
        }

        $Anggota->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }

    public function forceDelAnggotaAll()
    {
        // hapus semua Anggota permanen

        $Anggota = Anggota::onlyTrashed();

        // ambil nama foto dan hapus foto di folder
        $delfoto = $Anggota->get();

        foreach ($delfoto as $hapus ) {
            File::delete('images/fotoAnggota/'.$hapus->profile_image);
        }

        $Anggota->forceDelete();

        return redirect()->back()->with('alert','Data Sukses di Hapus');
    }
}

