<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'frontEndController@index')->name('home');
Route::get('/about', 'frontEndController@about')->name('about');

Route::group(['prefix' => 'admin'], function()
{
	Route::get('/home', 'backEndController@index')->name('admin.index');

	// Route Untuk Artikel dan foto Artikel
	
	Route::get('/showArtikel/editFoto/{id}', 'backController\artikelController@showFoto')->name('admin.editFotoArt');
	Route::get('/showArtikel/editFoto/delete/{id}', 'backController\artikelController@destroyFoto')->name('admin.deleteFotoArt');
	Route::get('/showArtikel/fotoArtikel/Trash', 'backController\artikelController@FotoTrash')->name('admin.trashFotoArtikel');
	Route::get('/showArtikel/fotoArtikel/restore/{id}','backController\artikelController@restoreFoto')->name('admin.restoreFotoArt');
	Route::get('/showArtikel/fotoArtikel/restoreAll/','backController\artikelController@restoreFotoAll')->name('admin.restoreFotoArtAll');
	Route::get('/showArtikel/fotoArtikel/delete/{id}', 'backController\artikelController@forceDelFoto')->name('admin.forceDeleteFotoArt');
	Route::get('/showArtikel/fotoArtikel/delete/', 'backController\artikelController@forceDelFotoAll')->name('admin.forceDeleteFotoArtAll');
	Route::get('/inputFotoArt/{id}', 'backController\artikelController@inputFoto')->name('admin.inputFotoArt');
	Route::post('/inputFotoArt/', 'backController\artikelController@storeFoto')->name('admin.storeFotoArt');

	Route::get('/showArtikel/editArtikel/delete/{id}', 'backController\artikelController@destroyArtikel')->name('admin.deleteArtikel');
	Route::get('/showArtikel/Artikel/Trash', 'backController\artikelController@ArtikelTrash')->name('admin.trashArtikel');
	Route::get('/showArtikel/Artikel/restore/{id}','backController\artikelController@restoreArtikel')->name('admin.restoreArtikel');
	Route::get('/showArtikel/Artikel/restoreAll/','backController\artikelController@restoreArtikelAll')->name('admin.restoreArtikelAll');
	Route::get('/showArtikel/Artikel/delete/{id}', 'backController\artikelController@forceDelArtikel')->name('admin.forceDeleteArtikel');
	Route::get('/showArtikel/Artikel/delete/', 'backController\artikelController@forceDelArtikelAll')->name('admin.forceDeleteArtikelAll');

	// route Kegiatan
	Route::get('/showKegiatan/editKegiatan/delete/{id}', 'backController\kegiatanController@destroyKegiatan')->name('admin.deleteKegiatan');
	Route::get('/showKegiatan/Kegiatan/Trash', 'backController\kegiatanController@KegiatanTrash')->name('admin.trashKegiatan');
	Route::get('/showKegiatan/Kegiatan/restore/{id}','backController\kegiatanController@restoreKegiatan')->name('admin.restoreKegiatan');
	Route::get('/showKegiatan/Kegiatan/restoreAll/','backController\kegiatanController@restoreKegiatanAll')->name('admin.restoreKegiatanAll');
	Route::get('/showKegiatan/Kegiatan/delete/{id}', 'backController\kegiatanController@forceDelKegiatan')->name('admin.forceDeleteKegiatan');
	Route::get('/showKegiatan/Kegiatan/delete/', 'backController\kegiatanController@forceDelKegiatanAll')->name('admin.forceDeleteKegiatanAll');

	// route pemasukan
	Route::get('/showPemasukan/editPemasukan/delete/{id}', 'backController\pemasukanController@destroyPemasukan')->name('admin.deletePemasukan');
	Route::get('/showPemasukan/Pemasukan/Trash', 'backController\pemasukanController@PemasukanTrash')->name('admin.trashPemasukan');
	Route::get('/showPemasukan/Pemasukan/restore/{id}','backController\pemasukanController@restorePemasukan')->name('admin.restorePemasukan');
	Route::get('/showPemasukan/Pemasukan/restoreAll/','backController\pemasukanController@restorePemasukanAll')->name('admin.restorePemasukanAll');
	Route::get('/showPemasukan/Pemasukan/delete/{id}', 'backController\pemasukanController@forceDelPemasukan')->name('admin.forceDeletePemasukan');
	Route::get('/showPemasukan/Pemasukan/delete/', 'backController\pemasukanController@forceDelPemasukanAll')->name('admin.forceDeletePemasukanAll');
	Route::get('/showPemasukan/editFoto/delete/{id}', 'backController\pemasukanController@destroyFoto')->name('admin.deleteFotoIn');
	Route::get('/showPemasukan/fotoPemasukan/Trash', 'backController\pemasukanController@FotoTrash')->name('admin.trashFotoPemasukan');
	Route::get('/showPemasukan/fotoPemasukan/restore/{id}','backController\pemasukanController@restoreFoto')->name('admin.restoreFotoIn');
	Route::get('/showPemasukan/fotoPemasukan/restoreAll/','backController\pemasukanController@restoreFotoAll')->name('admin.restoreFotoInAll');
	Route::get('/showPemasukan/fotoPemasukan/delete/{id}', 'backController\pemasukanController@forceDelFoto')->name('admin.forceDeleteFotoIn');
	Route::get('/showPemasukan/fotoPemasukan/delete/', 'backController\pemasukanController@forceDelFotoAll')->name('admin.forceDeleteFotoInAll');
	// Route::get('/inputFotoArt/{id}', 'backController\pemasukanController@inputFoto')->name('admin.inputFotoArt');
	// Route::post('/inputFotoArt/', 'backController\pemasukanController@storeFoto')->name('admin.storeFotoArt');
	Route::get('/PemasukanIn/foto/{id}', 'backController\pemasukanController@showFotoIn')->name('admin.showFotoIn');
	Route::get('/inputFotoIn/{id}', 'backController\pemasukanController@inputFoto')->name('admin.inputFotoIn');
	Route::post('/inputFotoIn/', 'backController\pemasukanController@storeFoto')->name('admin.storeFotoIn');

	// route pengeluaran
	Route::get('/showPengeluaran/editPengeluaran/delete/{id}', 'backController\pengeluaranController@destroyPengeluaran')->name('admin.deletePengeluaran');
	Route::get('/showPengeluaran/Pengeluaran/Trash', 'backController\pengeluaranController@PengeluaranTrash')->name('admin.trashPengeluaran');
	Route::get('/showPengeluaran/Pengeluaran/restore/{id}','backController\pengeluaranController@restorePengeluaran')->name('admin.restorePengeluaran');
	Route::get('/showPengeluaran/Pengeluaran/restoreAll/','backController\pengeluaranController@restorePengeluaranAll')->name('admin.restorePengeluaranAll');
	Route::get('/showPengeluaran/Pengeluaran/delete/{id}', 'backController\pengeluaranController@forceDelPengeluaran')->name('admin.forceDeletePengeluaran');
	Route::get('/showPengeluaran/Pengeluaran/delete/', 'backController\pengeluaranController@forceDelPengeluaranAll')->name('admin.forceDeletePengeluaranAll');
	Route::get('/showPengeluaran/editFoto/delete/{id}', 'backController\pengeluaranController@destroyFoto')->name('admin.deleteFotoOut');
	Route::get('/showPengeluaran/fotoPengeluaran/Trash', 'backController\pengeluaranController@FotoTrash')->name('admin.trashFotoPengeluaran');
	Route::get('/showPengeluaran/fotoPengeluaran/restore/{id}','backController\pengeluaranController@restoreFoto')->name('admin.restoreFotoOut');
	Route::get('/showPengeluaran/fotoPengeluaran/restoreAll/','backController\pengeluaranController@restoreFotoAll')->name('admin.restoreFotoOutAll');
	Route::get('/showPengeluaran/fotoPengeluaran/delete/{id}', 'backController\pengeluaranController@forceDelFoto')->name('admin.forceDeleteFotoOut');
	Route::get('/showPengeluaran/fotoPengeluaran/delete/', 'backController\pengeluaranController@forceDelFotoAll')->name('admin.forceDeleteFotoOutAll');
	Route::get('/PengeluaranOut/foto/{id}', 'backController\pengeluaranController@showFotoOut')->name('admin.showFotoOut');
	Route::get('/inputFotoOut/{id}', 'backController\pengeluaranController@inputFoto')->name('admin.inputFotoOut');
	Route::post('/inputFotoOut/', 'backController\pengeluaranController@storeFoto')->name('admin.storeFotoOut');

	//route Prestasi
	Route::get('/showPrestasi/editPrestasi/delete/{id}', 'backController\prestasiController@destroyPrestasi')->name('admin.deletePrestasi');
	Route::get('/showPrestasi/prestasi/Trash', 'backController\prestasiController@PrestasiTrash')->name('admin.trashPrestasi');
	Route::get('/showPrestasi/prestasi/restore/{id}','backController\prestasiController@restorePrestasi')->name('admin.restorePrestasi');
	Route::get('/showPrestasi/prestasi/restoreAll/','backController\prestasiController@restorePrestasiAll')->name('admin.restorePrestasiAll');
	Route::get('/showPrestasi/prestasi/delete/{id}', 'backController\prestasiController@forceDelPrestasi')->name('admin.forceDeletePrestasi');
	Route::get('/showPrestasi/prestasi/delete/', 'backController\prestasiController@forceDelPrestasiAll')->name('admin.forceDeletePrestasiAll');

	//route Baju
	Route::get('/showBaju/editBaju/delete/{id}', 'backController\bajuController@destroyBaju')->name('admin.deleteBaju');
	Route::get('/showBaju/baju/Trash', 'backController\bajuController@BajuTrash')->name('admin.trashBaju');
	Route::get('/showBaju/baju/restore/{id}','backController\bajuController@restoreBaju')->name('admin.restoreBaju');
	Route::get('/showBaju/baju/restoreAll/','backController\bajuController@restoreBajuAll')->name('admin.restoreBajuAll');
	Route::get('/showBaju/baju/delete/{id}', 'backController\bajuController@forceDelBaju')->name('admin.forceDeleteBaju');
	Route::get('/showBaju/baju/delete/', 'backController\bajuController@forceDelBajuAll')->name('admin.forceDeleteBajuAll');

	//route pemesanna
	Route::get('/showpemesan/editpemesan/delete/{id}', 'backController\pemesananBajuController@destroypemesan')->name('admin.deletePemesan');
	Route::get('/showpemesan/pemesan/Trash', 'backController\pemesananBajuController@pemesanTrash')->name('admin.trashPemesan');
	Route::get('/showpemesan/pemesan/restore/{id}','backController\pemesananBajuController@restorepemesan')->name('admin.restorePemesan');
	Route::get('/showpemesan/pemesan/restoreAll/','backController\pemesananBajuController@restorepemesanAll')->name('admin.restorePemesanAll');
	Route::get('/showpemesan/pemesan/delete/{id}', 'backController\pemesananBajuController@forceDelpemesan')->name('admin.forceDeletePemesan');
	Route::get('/showpemesan/pemesan/delete/', 'backController\pemesananBajuController@forceDelpemesanAll')->name('admin.forceDeletePemesanAll');

	//route dokumen
	Route::get('/showdokumen/editdokumen/delete/{id}', 'backController\dokumenController@destroydokumen')->name('admin.deleteDokumen');
	Route::get('/showdokumen/dokumen/Trash', 'backController\dokumenController@dokumenTrash')->name('admin.trashDokumen');
	Route::get('/showdokumen/dokumen/restore/{id}','backController\dokumenController@restoredokumen')->name('admin.restoreDokumen');
	Route::get('/showdokumen/dokumen/restoreAll/','backController\dokumenController@restoredokumenAll')->name('admin.restoreDokumenAll');
	Route::get('/showdokumen/dokumen/delete/{id}', 'backController\dokumenController@forceDeldokumen')->name('admin.forceDeleteDokumen');
	Route::get('/showdokumen/dokumen/delete/', 'backController\dokumenController@forceDeldokumenAll')->name('admin.forceDeleteDokumenAll');
	Route::post('/inputFotoDoc/', 'backController\dokumenController@storeFoto')->name('admin.storeFotoDoc');
	Route::post('/inputVideooDoc/', 'backController\dokumenController@storeVideo')->name('admin.storeVideoDoc');

	//route anggota
	Route::match(['put', 'patch'],'/Anggota/Foto/{Anggotum}', 'backController\anggotaController@updateFoto')->name('admin.anggotaProfile');
	Route::get('/showanggota/editanggota/delete/{id}', 'backController\anggotaController@destroyAnggota')->name('admin.deleteAnggota');
	Route::get('/showanggota/anggota/Trash', 'backController\anggotaController@AnggotaTrash')->name('admin.trashAnggota');
	Route::get('/showanggota/anggota/restore/{id}','backController\anggotaController@restoreAnggota')->name('admin.restoreAnggota');
	Route::get('/showanggota/anggota/restoreAll/','backController\anggotaController@restoreAnggotaAll')->name('admin.restoreAnggotaAll');
	Route::get('/showanggota/anggota/delete/{id}', 'backController\anggotaController@forceDelAnggota')->name('admin.forceDeleteAnggota');
	Route::get('/showanggota/anggota/delete/', 'backController\anggotaController@forceDelAnggotaAll')->name('admin.forceDeleteAnggotaAll');

	//route pengurus
	Route::get('/showpengurus/editpengurus/delete/{id}', 'backController\pengurusController@destroyPengurus')->name('admin.deletePengurus');
	Route::get('/showpengurus/pengurus/Trash', 'backController\pengurusController@PengurusTrash')->name('admin.trashPengurus');
	Route::get('/showpengurus/pengurus/restore/{id}','backController\pengurusController@restorePengurus')->name('admin.restorePengurus');
	Route::get('/showpengurus/pengurus/restoreAll/','backController\pengurusController@restorePengurusAll')->name('admin.restorePengurusAll');
	Route::get('/showpengurus/pengurus/delete/{id}', 'backController\pengurusController@forceDelPengurus')->name('admin.forceDeletePengurus');	
	Route::get('/showpengurus/pengurus/delete/', 'backController\pengurusController@forceDelPengurusAll')->name('admin.forceDeletePengurusAll');

	//route penjabat
	Route::get('/showpenjabat/editpenjabat/delete/{id}', 'backController\detailpengurusController@destroyPenjabat')->name('admin.deletePenjabat');
	Route::get('/showpenjabat/penjabat/Trash', 'backController\detailpengurusController@PenjabatTrash')->name('admin.trashPenjabat');
	Route::get('/showpenjabat/penjabat/restore/{id}','backController\detailpengurusController@restorePenjabat')->name('admin.restorePenjabat');
	Route::get('/showpenjabat/penjabat/restoreAll/','backController\detailpengurusController@restorePenjabatAll')->name('admin.restorePenjabatAll');
	Route::get('/showpenjabat/penjabat/delete/{id}', 'backController\detailpengurusController@forceDelPenjabat')->name('admin.forceDeletePenjabat');	
	Route::get('/showpenjabat/penjabat/delete/', 'backController\detailpengurusController@forceDelPenjabatAll')->name('admin.forceDeletePenjabatAll');

	// route resource
	Route::resource('/Prestasi', 'backController\prestasiController');
	Route::resource('/Artikel', 'backController\artikelController');
	Route::resource('/Pemasukan', 'backController\pemasukanController');
	Route::resource('/Pengeluaran', 'backController\pengeluaranController');	
	Route::resource('/Kegiatan', 'backController\kegiatanController');
	Route::resource('/Baju', 'backController\bajuController');
	Route::resource('/Pemesanan', 'backController\pemesananBajuController');
	Route::resource('/Dokumen', 'backController\dokumenController');
	Route::resource('/Anggota', 'backController\anggotaController');
	Route::resource('/Pengurus', 'backController\pengurusController');
	Route::resource('/Penjabat', 'backController\detailpengurusController');


	
});
