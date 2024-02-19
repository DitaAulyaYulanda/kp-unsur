@extends('adminlte::page')
@section('title', 'Pengelolaan Data Profil Sekolah')
@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">PENGELOLAAN DATA PROFIL SEKOLAH</h1>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Pengelolaan Data Profil Sekolah') }}</div>
                    <div class="card-body">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah"><i
                                class="fa fa-plus"></i> Tambah Data</button>
                        <hr />
                    </div>
                    <div class="table-responsive">
                    <table id="table-data" class="table">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>ALAMAT</th>
                                <th>VISI</th>
                                <th>MISI</th>
                                <th>SEJARAH</th>
                                <th>EKSTRAKULIKULER</th>
                                <th>NO TELEPON</th>
                                <th>EMAIL</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($profilsekolahs as $profilsekolah)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $profilsekolah->nama }}</td>
                                    <td>{{ $profilsekolah->alamat }}</td>
                                    <td>{{ $profilsekolah->visi }}</td>
                                    <td>{{ $profilsekolah->misi }}</td>
                                    <td>{{ $profilsekolah->sejarah }}</td>
                                    <td>{{ $profilsekolah->ekstrakulikuler }}</td>
                                    <td>{{ $profilsekolah->no_tlp }}</td>
                                    <td>{{ $profilsekolah->email }}</td>
                                    <td>
                                        <div class="btn-group" roles="group" aria-label="Basic Example">
                                            <button type="button" id="btn-edit-profilsekolah" class="btn btn-success"
                                                data-toggle="modal" data-target="#ubahModal"
                                                data-id="{{ $profilsekolah->id }}">Edit</button>
                                            <a class="btn btn-danger" href="profilsekolah/delete/{{ $profilsekolah->id }}"
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Profil Sekolah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.profilsekolah.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Sekolah</label>
                            <input type="text" class="form-control" placeholder="Masukan nama guru" name="nama"
                                id="nama" required />
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" placeholder="Masukan alamat" name="alamat"
                                id="alamat" required />
                        </div>
                        <div class="form-group">
                            <label for="visi">Visi</label>
                            <input type="text" class="form-control" placeholder="Masukan visi" name="visi"
                                id="visi" required />
                        </div>
                        <div class="form-group">
                            <label for="misi">Misi</label>
                            <input type="text" class="form-control" placeholder="Masukan misi" name="misi"
                                id="misi" required />
                        </div>
                        <div class="form-group">
                            <label for="sejarah">Sejarah</label>
                            <input type="text" class="form-control" placeholder="Masukan sejarah" name="sejarah"
                                id="sejarah" required />
                        </div>
                        <div class="form-group">
                            <label for="ekstrakulikuler">Ekstrakulikuler</label>
                            <input type="text" class="form-control" placeholder="Masukan ekstrakulikuler"
                                name="ekstrakulikuler" id="ekstrakulikuler" required />
                        </div>
                        <div class="form-group">
                            <label for="no_tlp">No Telepon</label>
                            <input type="text" class="form-control" placeholder="Masukan no_tlp" name="no_tlp"
                                id="no_tlp" required />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" placeholder="Masukan email" name="email"
                                id="email" required />
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
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Profil Sekolah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.profilsekolah.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="edit-nama">Nama Sekolah</label>
                            <input type="text" class="form-control" name="nama" id="edit-nama" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="edit-alamat" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-visi">Visi</label>
                            <input type="text" class="form-control" name="visi" id="edit-visi" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-misi">Misi</label>
                            <input type="text" class="form-control" name="misi" id="edit-misi" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-sejarah">Sejarah</label>
                            <input type="text" class="form-control" name="sejarah" id="edit-sejarah" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-ekstrakulikuler">Ekstrakulikuler</label>
                            <input type="text" class="form-control" name="ekstrakulikuler" id="edit-ekstrakulikuler"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="edit-no_tlp">No Telepon</label>
                            <input type="text" class="form-control" name="no_tlp" id="edit-no_tlp" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-email">Email</label>
                            <input type="text" class="form-control" name="email" id="edit-email" required />
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


                $(document).on('click', '#btn-edit-profilsekolah', function() {
                    let id = $(this).data('id');

                    $('#image-area').empty();

                    $.ajax({
                        type: "get",
                        url: "{{ url('/admin/ajaxadmin/dataProfilsekolah') }}/" + id,
                        dataType: 'json',
                        success: function(res) {
                            $('#edit-nama').val(res.nama);
                            $('#edit-alamat').val(res.alamat);
                            $('#edit-visi').val(res.visi);
                            $('#edit-misi').val(res.misi);
                            $('#edit-sejarah').val(res.sejarah);
                            $('#edit-ekstrakulikuler').val(res.ekstrakulikuler);
                            $('#edit-no_tlp').val(res.no_tlp);
                            $('#edit-email').val(res.email);
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
