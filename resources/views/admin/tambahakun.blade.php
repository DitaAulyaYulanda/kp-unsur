@extends('adminlte::page')
@section('title', 'Data Akun')
@section('content_header')
    <h1>Form Tambah Akun</h1>
@stop
@section('content')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div>
            <div class="card card-default">
                <div class="card-body">
                    <table id="table-data" class="table table-white">
                        <form action="{{ route('akun.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Masukkan nama lengkap" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nisn">NISN/NIP</label>
                                        <input type="nisn" name="nisn" id="nisn" class="form-control"
                                            placeholder="Masukkan NISN Siswa/ NIP Guru" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Masukkan Email" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Masukkan Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="roles_id">Roles ID</label>
                                        <select class="form-control" id="roles_id" name="roles_id" required>
                                            <option selected>Pilih</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Alumni</option>
                                        </select>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary center">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
