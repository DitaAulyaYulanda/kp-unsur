<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Session;


class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $roles =  Role::all();
        $users = User::with('roles')->get();
        return view('admin.show', compact('user', 'users', 'roles'));
    }
    public function create()
    {
        return view('admin.tambahakun');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:accounts',
        //     'password' => 'required|min:8',
        //     'roles_id' => 'required',
        // ]);

        $users = new User;
        $users->name = $request->get('name');
        $users->nisn = $request->get('nisn');
        $users->email = $request->get('email');
        $users->password = Hash::make($request->get('password'));
        $users->roles_id = $request->get('roles_id');
        $users->save();
        $notification = array(
            'message' => 'Akun Berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('akun.show')->with($notification);
    }

    public function edit($id)
    {
        $users = User::find($id);

        return view('admin.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:accounts,email,' . $id,
        //     'password' => 'nullable|min:8',
        //     'roles_id' => 'required',
        // ]);

        $users = User::find($id);
        $users->name = $request->get('name');
        $users->nisn = $request->get('nisn');
        $users->email = $request->get('email');
        if ($request->get('password')) {
            $users->password = Hash::make($request->get('password'));
        }
        $users->roles_id = $request->get('roles_id');
        $notification = array(
            'message' => 'Akun Berhasil diubah',
            'alert-type' => 'success'
        );
        $users->save();
        return redirect()->route('akun.show')->with($notification);
    }

    // public function submit_user(Request $req)
    // {
    //     $pengguna = new User;

    //     $pengguna->name = $req->get('name');
    //     $pengguna->email = $req->get('email');
    //     $pengguna->password = Hash::make($req->get('password'));
    //     $pengguna->roles_id = $req->get('roles_id');
    //     $pengguna->save();

    //     $notification = array(
    //         'message' => 'Data User berhasil ditambahkan',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('admin.pengguna.submit')->with($notification);
    // }
    // public function edit($id)
    // {
    //     $user = User::find($id);

    //     return view('admin.edit', compact('user'));
    // }

    // public function update(Request $request, $id)
    // {
    //     // $request->validate([
    //     //     'name' => 'required',
    //     //     'email' => 'required|email|unique:accounts,email,' . $id,
    //     //     'password' => 'nullable|min:8',
    //     //     'roles_id' => 'required',
    //     // ]);

    //     $pengguna = User::find($id);
    //     $pengguna->name = $request->get('name');
    //     $pengguna->email = $request->get('email');
    //     if ($request->get('password')) {
    //         $pengguna->password = Hash::make($request->get('password'));
    //     }
    //     $pengguna->roles_id = $request->get('roles_id');
    //     $pengguna->save();

    //     return redirect()->route('admin.pengguna')->with('success', 'Akun berhasil diubah.');
    // }
    // public function update(Request $req)
    // {
    //     $pengguna = User::find($req->get('id'));

    //     $pengguna->name = $req->get('name');
    //     $pengguna->email = $req->get('email');
    //     if ($req->get('password')) {
    //         $pengguna->password = Hash::make($req->get('password'));
    //     }
    //     $pengguna->roles_id = $req->get('roles_id');

    //     $pengguna->save();

    //     $notification = array(
    //         'message' => 'Data User berhasil diubah',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('admin.pengguna.update')->with($notification);
    // }

    // public function getDataUser($id)
    // {
    //     $pengguna = User::find($id);

    //     return response()->json($pengguna);
    // }

    public function destroy(Request $req, $id)
    {
        $users = User::find($id);
        $users->delete();

        Session::flash('status', 'Hapus data User berhasil!!!');
        return redirect()->back();
    }
}
