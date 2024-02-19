<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Session;


class GuruController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $gurus = Guru::all();
        return view('admin.guru', compact('user', 'gurus'));
    }
    public function submit_guru(Request $req)
    {
        $gurus = new Guru;

        $gurus->name = $req->get('name');
        $gurus->deskripsi = $req->get('deskripsi');
        $gurus->pendidikan = $req->get('pendidikan');
        $gurus->pengalaman = $req->get('pengalaman');
        $gurus->mata_pelajaran = $req->get('mata_pelajaran');
        $gurus->email = $req->get('email');


        if ($req->hasFile('photo')) {
            $extension = $req->file('photo')->extension();

            $filename = 'photo_guru_' . time() . '.' . $extension;

            $req->file('photo')->storeAs(
                'public/photo_guru',
                $filename
            );

            $gurus->photo = $filename;
        }
        $gurus->save();

        $notification = array(
            'message' => 'Data guru berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.guru.submit')->with($notification);
    }
    public function update(Request $req)
    {
        $gurus = Guru::find($req->get('id'));

        $gurus->name = $req->get('name');
        $gurus->deskripsi = $req->get('deskripsi');
        $gurus->pendidikan = $req->get('pendidikan');
        $gurus->pengalaman = $req->get('pengalaman');
        $gurus->mata_pelajaran = $req->get('mata_pelajaran');
        $gurus->email = $req->get('email');


        if ($req->hasFile('photo')) {
            $extension = $req->file('photo')->extension();

            $filename = 'photo_guru_' . time() . '.' . $extension;

            $req->file('photo')->storeAs(
                'public/photo_guru',
                $filename
            );
            Storage::delete('public/photo_guru/' . $req->get('old_photo'));

            $gurus->photo = $filename;
        }
        $gurus->save();

        $notification = array(
            'message' => 'Data guru berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.guru.update')->with($notification);
    }

    public function getDataGuru($id)
    {
        $gurus = Guru::find($id);

        return response()->json($gurus);
    }

    public function delete_guru(Request $req, $id)
    {
        $gurus = Guru::find($id);
        storage::delete('public/photo_guru/' . $req->get('old_photo'));
        $gurus->delete();

        Session::flash('status', 'Hapus data guru berhasil!!!');
        return redirect()->back();
    }
}
