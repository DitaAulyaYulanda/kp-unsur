<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Tracking;

class TrackingPenggunaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $trackings = Tracking::all();
        return view('trackingpengguna', compact('user', 'trackings'));
    }
    // public function create()
    // {
    //     return view('user.tracking');
    // }

    public function store(Request $request)
    {

        $trackings = new Tracking();
        $trackings->nama = $request->get('nama');
        $trackings->thn_lulus = $request->get('thn_lulus');
        $trackings->pendidikan = $request->get('pendidikan');
        $trackings->pekerjaan = $request->get('pekerjaan');
        $trackings->alamat = $request->get('alamat');
        $trackings->kontak = $request->get('kontak');
        $trackings->aktivitas = $request->get('aktivitas');
        $trackings->komentar = $request->get('komentar');
        $trackings->save();
        $notification = array(
            'message' => 'Data tracking berhasil ditambahkan',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.hasil')->with($notification);
    }
    public function hasil()
    {
        $user = Auth::user();
        $tracking = Tracking::where('nama', '=', auth()->user()->name)->get();
        return view('admin.hasil', compact('user', 'tracking'));
    }
}
