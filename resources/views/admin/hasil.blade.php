@extends('adminlte::page')
@section('title', 'Hasil Mengisi Tracking')
@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">Hasil Mengisi Tracking</h1>
@stop
@section('content')
    <div class="card">

        <table class="table table-white">
            <thead>
                @foreach ($tracking as $row)
            <tbody>
                <tr>
                    <td>NAMA</td>
                    <td>: {{ $row->nama }}</td>
                </tr>
                <tr>
                    <td>TAHUN LULUS</td>
                    <td>:{{ $row->thn_lulus }}</td>
                </tr>
                <tr>
                    <td>PENDIDIKAN</td>
                    <td>:{{ $row->pendidikan }}</td>
                </tr>
                <tr>
                    <td>PEKERJAAN</td>
                    <td>:{{ $row->pekerjaan }}</td>
                </tr>
                <tr>
                    <td>ALAMAT</td>
                    <td>:{{ $row->alamat }}</td>
                </tr>
                <tr>
                    <td>KONTAK</td>
                    <td>:{{ $row->kontak }}</td>
                </tr>
                <tr>
                    <td>AKTIVITAS</td>
                    <td>:{{ $row->aktivitas }}</td>
                </tr>
                <tr>
                    <td>KOMENTAR</td>
                    <td>:{{ $row->komentar }}</td>
                </tr>
            </tbody>
            </thead>
            @endforeach
        </table>
    </div>
@stop


@section('js')
    <script></script>
@stop
