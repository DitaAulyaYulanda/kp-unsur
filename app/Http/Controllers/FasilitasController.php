<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Session;

class FasilitasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $fasilitas = Fasilitas::all();
        return view('admin.fasilitas', compact('user', 'fasilitas'));
    }
    public function submit_fasilitas(Request $req)
    {
        $fasilitas = new Fasilitas;

        $fasilitas->nama = $req->get('nama');
        $fasilitas->deskripsi = $req->get('deskripsi');
        $fasilitas->jumlah = $req->get('jumlah');
        $fasilitas->kondisi = $req->get('kondisi');
        $fasilitas->lokasi = $req->get('lokasi');
        $fasilitas->penggunaan = $req->get('penggunaan');


        if ($req->hasFile('photo')) {
            $extension = $req->file('photo')->extension();
            $filename = 'photo' . time() . '.' . $extension;
            $req->file('photo')->storeAS('public/photo_fasilitas', $filename);
            $fasilitas->photo = $filename;
        }
        $fasilitas->save();

        $notification = array(
            'message' => 'Data fasilitas berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.fasilitas')->with($notification);
    }
    public function update(Request $req)
    {
        $fasilitas = Fasilitas::find($req->get('id'));

        $fasilitas->nama = $req->get('nama');
        $fasilitas->deskripsi = $req->get('deskripsi');
        $fasilitas->jumlah = $req->get('jumlah');
        $fasilitas->kondisi = $req->get('kondisi');
        $fasilitas->lokasi = $req->get('lokasi');
        $fasilitas->penggunaan = $req->get('penggunaan');


        if ($req->hasFile('photo')) {
            $extension = $req->file('photo')->extension();
            $filename = 'photo' . time() . '.' . $extension;
            $req->file('photo')->storeAS('public/photo_fasilitas', $filename);
            $fasilitas->photo = $filename;
        }
        $fasilitas->save();
        $notification = array(
            'message' => 'Data fasilitas berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.fasilitas')->with($notification);
    }

    public function getDataFasilitas($id)
    {
        $fasilitas = Fasilitas::find($id);

        return response()->json($fasilitas);
    }

    public function delete_fasilitas(Request $req, $id)
    {
        $fasilitas = Fasilitas::where('id', $id);
        storage::delete('public/photo_fasilitas/' . $req->get('old_photo'));
        $fasilitas->delete();
        Session::flash('status', 'Hapus data Agenda berhasil!!!');
        return redirect()->back();
    }
}
