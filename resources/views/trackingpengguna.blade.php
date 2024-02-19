@extends('adminlte::page')
@section('title', 'Pengelolaan Data Guru')
@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">PENGELOLAAN Tracking</h1>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Pengelolaan Tracking') }}</div>
                    <div class="card-body">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah"><i
                                class="fa fa-plus"></i> Tambah Data</button>
                        <hr />
                    </div>
                    <table id="table-data" class="table table-borderer display nowrap" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>TAHUN LULUS</th>
                                <th>PENDIDIKAN</th>
                                <th>PEKERJAAN</th>
                                <th>ALAMAT</th>
                                <th>KONTAK</th>
                                <th>AKTIVITAS</th>
                                <th>KOMENTAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($trackings as $tracking)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $tracking->nama }}</td>
                                    <td>{{ $tracking->thn_lulus }}</td>
                                    <td>{{ $tracking->pendidikan }}</td>
                                    <td>{{ $tracking->pekerjaan }}</td>
                                    <td>{{ $tracking->alamat }}</td>
                                    <td>{{ $tracking->kontak }}</td>
                                    <td>{{ $tracking->aktivitas }}</td>
                                    <td>{{ $tracking->komentar }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.tracking.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukan nama guru" name="nama"
                                id="nama" required />
                        </div>
                        <div class="form-group">
                            <label for="thn_lulus">Tahun Lulus</label>
                            <input type="text" class="form-control" placeholder="Masukan Tahun Lulus" name="thn_lulus"
                                id="thn_lulus" required />
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" class="form-control" placeholder="Masukan pendidikan" name="pendidikan"
                                id="pendidikan" required />
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" placeholder="Masukan pekerjaan" name="pekerjaan"
                                id="pekerjaan" required />
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" placeholder="Masukan alamat" name="alamat"
                                id="alamat" required />
                        </div>
                        <div class="form-group">
                            <label for="kontak">Kontak</label>
                            <input type="text" class="form-control" placeholder="Masukan kontak" name="kontak"
                                id="kontak" required />
                        </div>
                        <div class="form-group">
                            <label for="aktivitas">Aktivitas</label>
                            <input type="text" class="form-control" placeholder="Masukan aktivitas" name="aktivitas"
                                id="aktivitas" required />
                        </div>
                        <div class="form-group">
                            <label for="komentar">Komentar</label>
                            <input type="text" class="form-control" placeholder="Masukan komentar" name="komentar"
                                id="komentar" required />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Data -->


@stop

@section('footer')

@stop

@section('js')
    <script></script>
@stop
