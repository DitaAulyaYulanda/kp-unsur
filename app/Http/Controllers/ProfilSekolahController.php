<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Profilsekolah;
use Session;

class ProfilSekolahController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profilsekolahs = Profilsekolah::all();
        return view('admin.profilsekolah', compact('user', 'profilsekolahs'));
    }

    public function tambah_profilsekolah(Request $req)
    {
        $profilsekolah = new Profilsekolah;

        $profilsekolah->nama = $req->get('nama');
        $profilsekolah->alamat = $req->get('alamat');
        $profilsekolah->visi = $req->get('visi');
        $profilsekolah->misi = $req->get('misi');
        $profilsekolah->sejarah = $req->get('sejarah');
        $profilsekolah->ekstrakulikuler = $req->get('ekstrakulikuler');
        $profilsekolah->no_tlp = $req->get('no_tlp');
        $profilsekolah->email = $req->get('email');

        $profilsekolah->save();

        $notification = array(
            'message' => 'Data profilsekolah berhasil ditambahkan',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.profilsekolah')->with($notification);
    }
    //Ajax Processes
    public function getDataProfilsekolah($id)
    {
        $profilsekolah = Profilsekolah::find($id);

        return response()->json($profilsekolah);
    }

    public function update_profilsekolah(Request $req)
    {
        $profilsekolah = Profilsekolah::find($req->get('id'));
        // $profilsekolah = tra$profilsekolah::find($req->get('id'));

        $profilsekolah->nama = $req->get('nama');
        $profilsekolah->alamat = $req->get('alamat');
        $profilsekolah->visi = $req->get('visi');
        $profilsekolah->misi = $req->get('misi');
        $profilsekolah->sejarah = $req->get('sejarah');
        $profilsekolah->ekstrakulikuler = $req->get('ekstrakulikuler');
        $profilsekolah->no_tlp = $req->get('no_tlp');
        $profilsekolah->email = $req->get('email');

        $profilsekolah->save();

        $notification = array(
            'message' => 'Data Brand berhasil diedit',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.profilsekolah')->with($notification);
    }
    public function delete_profilsekolah(Request $req, $id)
    {
        $profilsekolah = Profilsekolah::where('id', $id);
        $profilsekolah->delete();
        Session::flash('status', 'Hapus data profilsekolah berhasil!!!');
        return redirect()->back();
    }
}
