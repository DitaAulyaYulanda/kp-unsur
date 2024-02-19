<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Berita;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Session;

class BeritaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pengguna = User::all();
        $beritas = Berita::with('pengguna')->get();
        return view('admin.berita', compact('user', 'beritas', 'pengguna'));
    }

    public function tambah_berita(Request $req)
    {
        $berita = new Berita;

        $berita->judul = $req->get('judul');
        $berita->users = $req->get('users');
        $berita->tanggal = $req->get('tanggal');
        $berita->kategori = $req->get('kategori');
        $berita->isi_berita = $req->get('isi_berita');

        if ($req->hasFile('photo')) {
            $extension = $req->file('photo')->extension();

            $filename = 'photo_berita_' . time() . '.' . $extension;

            $req->file('photo')->storeAs(
                'public/photo_berita',
                $filename
            );

            $berita->photo = $filename;
        }
        $berita->save();

        $notification = array(
            'message' => 'Data berita berhasil ditambahkan',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.berita')->with($notification);
    }
    //Ajax Processes
    public function getDataberita($id)
    {
        $berita = Berita::find($id);

        return response()->json($berita);
    }

    public function update_berita(Request $req)
    {
        $berita = Berita::find($req->get('id'));
        // $berita = berita::find($req->get('id'));

        $berita->judul = $req->get('judul');
        $berita->users = $req->get('users');
        $berita->tanggal = $req->get('tanggal');
        $berita->kategori = $req->get('kategori');
        $berita->isi_berita = $req->get('isi_berita');
        if ($req->hasFile('photo')) {
            $extension = $req->file('photo')->extension();

            $filename = 'photo_berita_' . time() . '.' . $extension;

            $req->file('photo')->storeAs(
                'public/photo_berita',
                $filename
            );

            $berita->photo = $filename;
        }
        $berita->save();

        $notification = array(
            'message' => 'Data Brand berhasil diedit',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.berita')->with($notification);
    }
    public function delete_berita(Request $req, $id)
    {
        $berita = Berita::where('id', $id);
        storage::delete('public/photo_berita/' . $req->get('old_photo'));
        $berita->delete();
        Session::flash('status', 'Hapus data berita berhasil!!!');
        return redirect()->back();
    }
}
