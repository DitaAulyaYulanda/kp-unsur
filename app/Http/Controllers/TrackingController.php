<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Tracking;
use Session;

class TrackingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $trackings = Tracking::all();
        return view('admin.tracking', compact('user', 'trackings'));
    }
    public function create()
    {
        return view('admin.tambah');
    }
    public function tambah_tracking(Request $req)
    {
        $tracking = new Tracking;

        $tracking->nama = $req->get('nama');
        $tracking->thn_lulus = $req->get('thn_lulus');
        $tracking->pendidikan = $req->get('pendidikan');
        $tracking->pekerjaan = $req->get('pekerjaan');
        $tracking->alamat = $req->get('alamat');
        $tracking->kontak = $req->get('kontak');
        $tracking->aktivitas = $req->get('aktivitas');
        $tracking->komentar = $req->get('komentar');

        $tracking->save();

        $notification = array(
            'message' => 'Data tracking berhasil ditambahkan',
            'alert-type' => 'success'
        );
        if (Auth::user()->roles_id == 1) {
            return redirect()->route('admin.tracking')->with($notification);
        } else if (Auth::user()->roles_id == 2) {
            return redirect()->route('admin.hasil')->with($notification);
        }
        // return redirect()->route('admin.tracking')->with($notification);
    }
    //Ajax Processes
    public function getDataTracking($id)
    {
        $tracking = Tracking::find($id);

        return response()->json($tracking);
    }

    public function update_tracking(Request $req)
    {
        $tracking = Tracking::find($req->get('id'));
        // $tracking = tra$tracking::find($req->get('id'));

        $tracking->nama = $req->get('nama');
        $tracking->thn_lulus = $req->get('thn_lulus');
        $tracking->pendidikan = $req->get('pendidikan');
        $tracking->pekerjaan = $req->get('pekerjaan');
        $tracking->alamat = $req->get('alamat');
        $tracking->kontak = $req->get('kontak');
        $tracking->aktivitas = $req->get('aktivitas');
        $tracking->komentar = $req->get('komentar');

        $tracking->save();

        $notification = array(
            'message' => 'Data Brand berhasil diedit',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.tracking')->with($notification);
    }
    public function hasil()
    {
        $user = Auth::user();
        $tracking = Tracking::where('nama', '=', auth()->user()->name)->get();
        return view('admin.hasil', compact('user', 'tracking'));
    }
    public function delete_tracking(Request $req, $id)
    {
        $tracking = Tracking::where('id', $id);
        $tracking->delete();
        Session::flash('status', 'Hapus data tracking berhasil!!!');
        return redirect()->back();
    }
}
