<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Sekolah</title>
    <!-- Load Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><span class="text-primary">SMKN 1 CIPANAS</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sekolah') }}">Profil Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guru') }}">Profil Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('berita') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fasilitas') }}">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li> --}}
                </ul>
                {{-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> --}}
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div>
            <table id="datatable" class="table table-white">
                @foreach ($profilsekolahs as $row)
                    <tbody>
                        <tr>
                            <td>NAMA</td>
                            <td>: {{ $row->nama }}</td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td>
                            <td>:{{ $row->alamat }}</td>
                        </tr>
                        <tr>
                            <td>VISI</td>
                            <td>:{{ $row->visi }}</td>
                        </tr>
                        <tr>
                            <td>MISI</td>
                            <td>:{{ $row->misi }}</td>
                        </tr>
                        <tr>
                            <td>SEJARAH</td>
                            <td>:{{ $row->sejarah }}</td>
                        </tr>
                        <tr>
                            <td>EKSTRAKULIKULER</td>
                            <td>:{{ $row->ekstrakulikuler }}</td>
                        </tr>
                        <tr>
                            <td>NOMOR TELEPON</td>
                            <td>:{{ $row->no_tlp }}</td>
                        </tr>
                        <tr>
                            <td>EMAIL</td>
                            <td>:{{ $row->email }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        <hr />
    </div>
    </section>

    {{-- footer --}}
    <footer class="bg-dark p-2 text-center">
        <div class="container">
            <div class="text-white">All Right Reserved @KSP Harapan Jaya</div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <!-- Load Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
