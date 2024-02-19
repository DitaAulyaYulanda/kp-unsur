<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Fasilitas;
use App\Models\Guru;
use App\Models\Profilsekolah;
use App\Models\Tracking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $beritas = Berita::Count();
        $trackings = Tracking::Count();
        $profilsekolahs = Profilsekolah::Count();
        $gurus = Guru::Count();
        $fasilitas = Fasilitas::Count();
        $users = User::Count();
        $user = Auth::user();
        return view('home', compact('user', 'users', 'fasilitas', 'gurus', 'profilsekolahs', 'trackings', 'beritas'));
    }
}
