@extends('adminlte::page')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@section('title', 'Data Akun')
@section('content_header')
    <h1>Data Akun</h1>
@stop
@section('content')
    <div class="container-fluid">
        <div>


            <div>
                <div class="card card-default">
                    <div class="card-header">{{ __('Data Akun') }}</div>
                    <div class="card-body">
                        <a href="/akun/create" class="btn btn-success"><i class="fa fa-plus"></i>Tambah Akun</a>
                        <div class="mt-3"></div>
                        <table id="table-data" class="table table-white">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">NISN/NIP</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Roles ID</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $no=1; @endphp
                                @foreach ($users as $key)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $key->name }}</td>
                                        <td class="text-center">{{ $key->nisn }}</td>
                                        <td class="text-center">{{ $key->email }}</td>
                                        <td class="text-center">{{ $key->roles->name }}</td>
                                        <td>
                                            <a href="{{ route('akun.edit', $key->id) }}"> <i class="fa fa-edit"></i></a>
                                            <a href="{{ route('akun.delete', $key->id) }}"
                                                onclick="return confirm('Apakah Anda Yakin Menghapus Data?')"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @stop


    @section('js')

    @stop
