@extends('adminlte::page')
@section('title', 'Pengelolaan Data Berita')
@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">PENGELOLAAN DATA BERITA</h1>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Pengelolaan Berita') }}

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
                                        <th>JUDUL</th>
                                        <th>NAMA EDITOR</th>
                                        <th>TANGGAL</th>
                                        <th>KATEGORI</th>
                                        <th>ISI BERITA</th>
                                        <th>PHOTO</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($beritas as $berita)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $berita->judul }}</td>
                                            <td>{{ $berita->users }}</td>
                                            <td>{{ $berita->tanggal }}</td>
                                            <td>{{ $berita->kategori }}</td>
                                            <td>{{ $berita->isi_berita }}</td>

                                            <td>
                                                @if ($berita->photo !== null)
                                                    <img src="{{ asset('storage/photo_berita/' . $berita->photo) }}"
                                                        width="100px" />
                                                @else
                                                    [gambar tidak tersedia]
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" id="btn-edit-berita" class="btn btn-success"
                                                        data-toggle="modal" data-target="#editUserModal"
                                                        data-id="{{ $berita->id }}">Edit</button>
                                                    <a class="btn btn-danger" href="berita/delete/{{ $berita->id }}"
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('admin.berita.submit') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul" required />
                            </div>
                            <div class="form-group">
                                <label for="users">Pilih Editor</label>
                                <select name="users" id="users" class="form-control">
                                    <option value="">Pilih Editor</option>
                                    @foreach ($pengguna as $key)
                                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" required />
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukkan kategori" required />
                            </div>
                            <div class="form-group">
                                <label for="isi_berita">Isi Berita</label>
                                <input type="text" class="form-control" name="isi_berita" id="isi_berita" placeholder="Masukkan isi berita" required />
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

        <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Berita</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('admin.berita.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit-judul">Judul</label>
                                        <input type="text" class="form-control" name="judul" id="edit-judul"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="users">Pilih Editor</label>
                                        <select name="users" id="edit-users" class="form-control">
                                            <option value="">Pilih Editor</option>
                                            @foreach ($pengguna as $key)
                                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-tanggal">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" id="edit-tanggal"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-kategori">Kategori</label>
                                        <input type="text" class="form-control" name="kategori" id="edit-kategori"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-isi_berita">Isi Berita</label>
                                        <input type="text" class="form-control" name="isi_berita"
                                            id="edit-isi_berita" required />
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
                        <input type="hidden" name="old_photo" id="edit-old_photo" />
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


                $(document).on('click', '#btn-edit-berita', function() {
                    let id = $(this).data('id');

                    $('#image-area').empty();

                    $.ajax({
                        type: "get",
                        url: "{{ url('/admin/ajaxadmin/dataBerita') }}/" + id,
                        dataType: 'json',
                        success: function(res) {
                            $('#edit-judul').val(res.judul);
                            $('#edit-users').val(res.users);
                            $('#edit-tanggal').val(res.tanggal);
                            $('#edit-kategori').val(res.kategori);
                            $('#edit-isi_berita').val(res.isi_berita);

                            $('#edit-id').val(res.id);
                            $('#edit-old_photo').val(res.photo);

                            if (res.photo !== null) {
                                $('#image-area').append(
                                    "<img src='" + baseurl + "/storage/photo_berita/" + res
                                    .photo + "' width='200px'/>"
                                );
                            } else {
                                $('#image-area').append('[Gambar tidak tersedia]');
                            }
                        },
                    });
                });

            });
        </script>
    @stop
    @section('js')
        <script></script>
