@extends('adminlte::page')
@section('title', 'Pengelolaan Data Fasilitas')
@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">PENGELOLAAN DATA FASILITAS</h1>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Pengelolaan Fsilitas') }}

                        {{-- <button class="btn btn-secondary float-right" data-toggle="modal"><a href="{{ route('admin.print.drugs') }}" target="_blank"><i class="fa fa-print"></i> Cetak PDF</a></button> --}}
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary float-left mr-3" data-toggle="modal" data-target="#tambahUserModal"><i
                                class="fa fa-plus"></i> Tambah Data</button>
                        <div class="btn-group mb-5" role="group" aria-label="Basis Example">
                        </div>
                        <div class="table-responsive">
                            <table id="table-data" class="table">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>DESKRIPSI</th>
                                        <th>JUMLAH</th>
                                        <th>KONDISI</th>
                                        <th>LOKASI</th>
                                        <th>PENGGUNAAN</th>
                                        <th>PHOTO</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($fasilitas as $fasilitas)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $fasilitas->nama }}</td>
                                            <td>{{ $fasilitas->deskripsi }}</td>
                                            <td>{{ $fasilitas->jumlah }}</td>
                                            <td>{{ $fasilitas->kondisi }}</td>
                                            <td>{{ $fasilitas->lokasi }}</td>
                                            <td>{{ $fasilitas->penggunaan }}</td>

                                            <td>
                                                @if ($fasilitas->photo !== null)
                                                    <img src="{{ asset('storage/photo_fasilitas/' . $fasilitas->photo) }}"
                                                        width="100px" />
                                                @else
                                                    [gambar tidak tersedia]
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" id="btn-edit-pengguna" class="btn btn-success"
                                                        data-toggle="modal" data-target="#editUserModal"
                                                        data-id="{{ $fasilitas->id }}"
                                                        data-cover="{{ $fasilitas->photo }}">Edit</button>
                                                    <a class="btn btn-danger" href="fasilitas/delete/{{ $fasilitas->id }}"
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
    </div>
    </div>
    </div>
    <div>

        <div class="modal fade" id="tambahUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Fasilitas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('admin.fasilitas.submit') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Barang</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama barang" required />
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi" required />
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan jumlah" required />
                            </div>
                            <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="Masukkan Kondisi" required />
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Masukkan lokasi" required />
                            </div>
                            <div class="form-group">
                                <label for="penggunaan">Penggunaan</label>
                                <input type="text" class="form-control" name="penggunaan" id="penggunaan" placeholder="Masukkan penggunaan" required />
                            </div>
                            {{-- <div class="form-group">
                  <label for="roles_id">Roles</label>
                  <input type="text" class="form-control" name="roles_id" id="roles_id" required/>
              </div> --}}

                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control" name="photo" id="photo" />
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

        <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Fasilitas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('admin.fasilitas.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edit-nama">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="edit-nama"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-deskripsi">Deskripsi</label>
                                        <input type="text" class="form-control" name="deskripsi" id="edit-deskripsi"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-jumlah">jumlah</label>
                                        <input type="text" class="form-control" name="jumlah" id="edit-jumlah"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-kondisi">kondisi</label>
                                        <input type="text" class="form-control" name="kondisi" id="edit-kondisi"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-lokasi">lokasi</label>
                                        <input type="text" class="form-control" name="lokasi" id="edit-lokasi"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-penggunaan">penggunaan</label>
                                        <input type="text" class="form-control" name="penggunaan"
                                            id="edit-penggunaan" required />
                                    </div>
                                    {{-- <div class="form-group">
                      <label for="edit-roles_id">Roles</label>
                      <input type="text" class="form-control" name="roles_id" id="edit-roles_id" required/>
                  {{-- </div> --}}
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="image-area"></div>
                                    <div class="form-group">
                                        <label for="edit-photo">Photo</label>
                                        <input type="file" class="form-control" name="photo" id="edit-photo" />
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="edit-id" />
                        <input type="hidden" name="old_photo" id="edit-old-photo" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @stop

    @section('footer')

    @stop

    @section('css')
        <style>
            input[type=text],
            select,
            textarea {
                width: 100%;
                /* Full width */
                padding: 12px;
                /* Some padding */
                border: 1px solid #ccc;
                /* Gray border */
                border-radius: 4px;
                /* Rounded borders */
                box-sizing: border-box;
                /* Make sure that padding and width stays in place */
                margin-top: 6px;
                /* Add a top margin */
                margin-bottom: 16px;
                /* Bottom margin */
                resize: vertical
                    /* Allow the user to vertically resize the textarea (not horizontally) */
            }
        </style>
    @stop
    @section('js')
        <script>
            $(function() {


                $(document).on('click', '#btn-edit-pengguna', function() {
                    let id = $(this).data('id');

                    $('#image-area').empty();

                    $.ajax({
                        type: "get",
                        url: baseurl + '/admin/ajaxadmin/dataFasilitas/' + id,
                        dataType: 'json',
                        success: function(res) {
                            $('#edit-nama').val(res.nama);
                            $('#edit-deskripsi').val(res.deskripsi);
                            $('#edit-jumlah').val(res.jumlah);
                            $('#edit-kondisi').val(res.kondisi);
                            $('#edit-lokasi').val(res.lokasi);
                            $('#edit-penggunaan').val(res.penggunaan);

                            $('#edit-id').val(res.id);
                            $('#edit-old-photo').val(res.photo);

                            if (res.photo !== null) {
                                $('#image-area').append(
                                    "<img src='" + baseurl + "/storage/photo_fasilitas/" + res
                                    .photo + "' width='200px'/>"
                                );
                            } else {
                                $('#image-area').append('[Gambar tidak tersedia]');
                            }
                        },
                    });
                });

            });

            $(document).on('click', '#btn-delete-pengguna', function() {
                let id = $(this).data('id');
                let photo = $(this).data('photo');
                $('#delete-id').val(id);
                $('#delete-old-photo').val(photo);
                console.log("hallo");
            });
        </script>
    @stop
    @section('js')
        <script></script>
