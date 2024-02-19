<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Berita;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class BeritaPenggunaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pengguna = User::all();
        $beritas = Berita::with('pengguna')->get();
        return view('beritapengguna', compact('user', 'beritas', 'pengguna'));
    }
}
