<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Guru;
use Illuminate\Http\Request;
use App\Models\Profilsekolah;
use App\Models\Fasilitas;

class DashboardPenggunaController extends Controller
{
    function index()
    {
        $profileSchool = Profilsekolah::latest()->first();
        $teachers = Guru::all();
        $facilities = Fasilitas::all();
        $news = Berita::all();
        return view('dashboard', compact('profileSchool', 'teachers', 'facilities', 'news'));
    }
}
