@extends('adminlte::page')
@section('title', 'Pengelolaan Data Guru')
@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">PENGELOLAAN DATA GURU</h1>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Pengelolaan Guru') }}

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
                                        <th>PENDIDIKAN</th>
                                        <th>PENGALAMAN</th>
                                        <th>MATA PELAJARAN</th>
                                        <th>EMAIL</th>
                                        <th>PHOTO</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($gurus as $guru)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $guru->name }}</td>
                                            <td>{{ $guru->deskripsi }}</td>
                                            <td>{{ $guru->pendidikan }}</td>
                                            <td>{{ $guru->pengalaman }}</td>
                                            <td>{{ $guru->mata_pelajaran }}</td>
                                            <td>{{ $guru->email }}</td>

                                            <td>
                                                @if ($guru->photo !== null)
                                                    <img src="{{ asset('storage/photo_guru/' . $guru->photo) }}"
                                                        width="100px" />
                                                @else
                                                    [gambar tidak tersedia]
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" id="btn-edit-guru" class="btn btn-success"
                                                        data-toggle="modal" data-target="#editUserModal"
                                                        data-id="{{ $guru->id }}">Edit</button>
                                                    <a class="btn btn-danger" href="guru/delete/{{ $guru->id }}"
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
                        <form method="post" action="{{ route('admin.guru.submit') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama" required />
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi" required />
                            </div>
                            <div class="form-group">
                                <label for="pendidikan">Pendidikan</label>
                                <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Masukkan pendidikan" required />
                            </div>
                            <div class="form-group">
                                <label for="pengalaman">Pengalaman</label>
                                <input type="text" class="form-control" name="pengalaman" id="pengalaman" placeholder="Masukkan pengalaman" required />
                            </div>
                            <div class="form-group">
                                <label for="mata_pelajaran">Mata Pelajaran</label>
                                <input type="text" class="form-control" name="mata_pelajaran" id="mata_pelajaran" placeholder="Masukkan mata pelajaran"
                                    required />
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan email" required />
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
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Guru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('admin.guru.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit-name">Nama</label>
                                        <input type="text" class="form-control" name="name" id="edit-name"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-deskripsi">Deskripsi</label>
                                        <input type="text" class="form-control" name="deskripsi" id="edit-deskripsi"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-pendidikan">Pendidikan</label>
                                        <input type="text" class="form-control" name="pendidikan"
                                            id="edit-pendidikan" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-pengalaman">Pengalaman</label>
                                        <input type="text" class="form-control" name="pengalaman"
                                            id="edit-pengalaman" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-mata_pelajaran">Mata Pelajaran</label>
                                        <input type="text" class="form-control" name="mata_pelajaran"
                                            id="edit-mata_pelajaran" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-email">Email</label>
                                        <input type="text" class="form-control" name="email" id="edit-email"
                                            required />
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


                $(document).on('click', '#btn-edit-guru', function() {
                    let id = $(this).data('id');

                    $('#image-area').empty();

                    $.ajax({
                        type: "get",
                        url: "{{ url('/admin/ajaxadmin/dataGuru') }}/" + id,
                        dataType: 'json',
                        success: function(res) {
                            $('#edit-name').val(res.name);
                            $('#edit-deskripsi').val(res.deskripsi);
                            $('#edit-pendidikan').val(res.pendidikan);
                            $('#edit-pengalaman').val(res.pengalaman);
                            $('#edit-mata_pelajaran').val(res.mata_pelajaran);
                            $('#edit-email').val(res.email);

                            $('#edit-id').val(res.id);
                            $('#edit-old_photo').val(res.photo);

                            if (res.photo !== null) {
                                $('#image-area').append(
                                    "<img src='" + baseurl + "/storage/photo_guru/" + res
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
