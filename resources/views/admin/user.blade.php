@extends('adminlte::page')
@section('title', 'Pengelolaan Data Akun')
@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">PENGELOLAAN DATA AKUN</h1>
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
                                        <th>NISN</th>
                                        <th>EMAIL</th>
                                        <th>PASSWORD</th>
                                        <th>ROLES</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($users as $pengguna)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pengguna->name }}</td>
                                            <td>{{ $pengguna->nisn }}</td>
                                            <td>{{ $pengguna->email }}</td>
                                            <td>{{ $pengguna->password }}</td>
                                            <td>{{ $pengguna->roles->name }}</td>

                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" id="btn-edit-pengguna" class="btn btn-success"
                                                        data-toggle="modal" data-target="#editUserModal"
                                                        data-id="{{ $pengguna->id }}">Edit</button>
                                                    {{-- <a class="btn btn-success"
                                                        href="{{ route('admin.pengguna.update', $pengguna->id) }}">Edit</a> --}}
                                                    <a class="btn btn-danger" href="user/delete/{{ $pengguna->id }}"
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
                        <form method="post" action="{{ route('admin.pengguna.submit') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Masukkan Nama" required />
                            </div>
                            <div class="form-group">
                                <label for="name">NISN/ NIP</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Masukkan NISN Siswa/NIP Guru" required />
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="xxxx@gmail.com" required />
                            </div>
                            <div class="form-group">
                                <label for="password">Kata Sandi</label>
                                <input type="text" class="form-control" name="password" id="password"
                                    placeholder="Masukkan Kata Sandi" required />
                            </div>
                            <div class="form-group">
                                <label for="roles_id">Roles ID</label>
                                <select id="roles_id" name="roles_id">
                                    <option value="">Pilih Akun</option>
                                    @foreach ($roles as $key)
                                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                                    @endforeach
                                    {{-- <option selected>Pilih</option>
                                    <option value="1">Staff</option>
                                    <option value="2">Guru</option> --}}
                                </select>
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
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Obat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('admin.pengguna.update') }}" enctype="multipart/form-data">
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
                                        <label for="edit-email">Email</label>
                                        <input type="text" class="form-control" name="email" id="edit-email"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-nisn">NISN</label>
                                        <input type="text" class="form-control" name="nisn" id="edit-nisn"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-password">Password</label>
                                        <input type="text" class="form-control" name="password" id="edit-password"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-roles_id">Roles ID</label>
                                        <input type="text" class="form-control" name="password" id="edit-roles_id"
                                            required />
                                        {{-- <select id="edit-roles_id" name="roles_id">
                                            <option selected>Pilih</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Alumni</option>
                                        </select> --}}
                                    </div>
                                    {{-- <div class="form-group">
                      <label for="edit-roles_id">Roles</label>
                      <input type="text" class="form-control" name="roles_id" id="edit-roles_id" required/>
                  {{-- </div> --}}
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


                $(document).on('click', '#btn-edit-pengguna', function() {
                    let id = $(this).data('id');

                    $('#image-area').empty();

                    $.ajax({
                        type: "get",
                        url: "{{ url('/admin/ajaxadmin/dataUser') }}/" + id,
                        dataType: 'json',
                        success: function(res) {
                            $('#edit-name').val(res.name);
                            $('#edit-nisn').val(res.nisn);
                            $('#edit-email').val(res.email);
                            $('#edit-password').val(res.password);
                            $('#edit-roles_id').val(res.roles_id);

                            $('#edit-id').val(res.id);
                        },
                    });
                });

            });
        </script>
    @stop
    @section('js')
        <script></script>
