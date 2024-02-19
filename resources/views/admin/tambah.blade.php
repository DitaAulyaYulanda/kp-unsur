@extends('adminlte::page')
@section('title', 'Data Diri')
@section('content_header')
    <h1>Form Mengisi Data</h1>
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
                        <form action="{{ route('tracking.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="thn_lulus">Tahun Lulus</label>
                                        <input type="text" class="form-control" id="thn_lulus" name="thn_lulus" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan</label>
                                        <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="kontak">Kontak</label>
                                        <input type="text" class="form-control" id="kontak" name="kontak" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="aktivitas">Aktivitas</label>
                                        <input type="aktivitas" class="form-control" id="aktivitas" name="aktivitas"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="komentar">Komentar</label>
                                        <input type="text" class="form-control" id="komentar" name="komentar" required>
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
        @stop
