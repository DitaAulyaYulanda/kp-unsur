@extends('adminlte::page')
@section('title', 'Pengelolaan Data Tracking Alumni')
@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">PENGELOLAAN DATA TRACKING ALUMNI</h1>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Pengelolaan Data Tracking Alumni') }}</div>
                    <div class="card-body">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah"><i
                                class="fa fa-plus"></i> Tambah Data</button>
                        <hr />
                    </div>
                    <div class="table-responsive">
                        <table id="table-data" class="table table-borderer">
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
                                    <th>AKSI</th>
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
                                        <td>
                                            <div class="btn-group" roles="group" aria-label="Basic Example">
                                                <button type="button" id="btn-edit-tracking" class="btn btn-success"
                                                    data-toggle="modal" data-target="#ubahModal"
                                                    data-id="{{ $tracking->id }}">Edit</button>
                                                <a class="btn btn-danger" href="tracking/delete/{{ $tracking->id }}"
                                                    onclick="return confirm('Apakah Anda Yakin Menghapus Data?')">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tracking</h5>
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


    <!-- Ubah Tingkatan -->
    <div class="modal fade" id="ubahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Tracking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.tracking.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="edit-nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="edit-nama" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-thn_lulus">Tahun Lulus</label>
                            <input type="text" class="form-control" name="thn_lulus" id="edit-thn_lulus" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-pendidikan">Pendidikan</label>
                            <input type="text" class="form-control" name="pendidikan" id="edit-pendidikan"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="edit-pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan" id="edit-pekerjaan" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="edit-alamat" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-kontak">Kontak</label>
                            <input type="text" class="form-control" name="kontak" id="edit-kontak" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-aktivitas">Aktivitas</label>
                            <input type="text" class="form-control" name="aktivitas" id="edit-aktivitas" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-komentar">Komentar</label>
                            <input type="text" class="form-control" name="komentar" id="edit-komentar" required />
                        </div>
                </div>


                <div class="modal-footer">
                    <input type="hidden" name="id" id="edit-id" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Edit Data -->


    @stop

    @section('footer')

    @stop

    @section('js')
        <script>
            $(function() {


                $(document).on('click', '#btn-edit-tracking', function() {
                    let id = $(this).data('id');

                    $('#image-area').empty();

                    $.ajax({
                        type: "get",
                        url: "{{ url('/admin/ajaxadmin/dataTracking') }}/" + id,
                        dataType: 'json',
                        success: function(res) {
                            $('#edit-nama').val(res.nama);
                            $('#edit-thn_lulus').val(res.thn_lulus);
                            $('#edit-pendidikan').val(res.pendidikan);
                            $('#edit-pekerjaan').val(res.pekerjaan);
                            $('#edit-alamat').val(res.alamat);
                            $('#edit-kontak').val(res.kontak);
                            $('#edit-aktivitas').val(res.aktivitas);
                            $('#edit-komentar').val(res.komentar);
                            $('#edit-id').val(res.id);

                        },
                    });
                });

            });
        </script>
    @stop
    @section('js')
        <script></script>
    @stop
