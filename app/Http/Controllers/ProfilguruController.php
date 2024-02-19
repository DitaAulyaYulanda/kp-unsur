<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class ProfilguruController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $gurus = Guru::all();
        return view('gurupengguna', compact('user', 'gurus'));
    }
}
