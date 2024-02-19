<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class FasilitasPenggunaController extends Controller
{
    public function index()
    {
        // $fasilitas = Auth::user();
        $fasilitasData = Fasilitas::all();
        return view('dashboard', ['fasilitas' => $fasilitasData]);
    }
}
