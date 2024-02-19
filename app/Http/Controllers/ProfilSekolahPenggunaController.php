<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Profilsekolah;

class ProfilSekolahPenggunaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profilsekolahs = Profilsekolah::all();
        return view('profilsekolahpengguna', compact('user', 'profilsekolahs'));
    }
}
