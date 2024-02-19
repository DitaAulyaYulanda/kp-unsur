@extends('adminlte::page')
@section('title', 'Data Akun')
@section('content_header')
    <h1>Form Ubah Data</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card card-default">
        <div class="card-body">
            <form action="{{ route('akun.update', $users->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $users->name }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="nisn">NISN:</label>
                    <input type="text" nisn="nisn" id="nisn" class="form-control" value="{{ $users->nisn }}">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $users->email }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="text" name="password" id="password" class="form-control" value="{{ $users->password }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="roles_id">Roles ID:</label>
                    <select name="roles_id" id="roles_id" class="form-control" required>
                        <option selected value="{{ $users->roles_id }}">Pilih</option>
                        <option value="1">Admin</option>
                        <option value="2">Alumni</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary center">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@stop