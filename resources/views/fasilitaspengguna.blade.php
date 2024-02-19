<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
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
                        <a class="nav-link" href="{{ url('http://127.0.0.1:8000') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('sekolah') }}">Profil Sekolah</a> --}}
                        <a class="nav-link" href="#about">Profil Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#service">Profil Guru</a>
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

    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/cameramen1.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>SMKN 1 CIPANAS</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/bg-1.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- tentang section --}}
    <section id="about" class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="about-img">
                        <img src="{{ asset('images/cameramen1.jpg') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <div class="about-text">
                        <h2>Tentang Sekolah<br></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis ullam qui debitis
                            consequuntur non blanditiis architecto quidem aut perferendis placeat quas neque, voluptatum
                            soluta amet quod optio ex quibusdam quisquam!</p><a href="#"
                            class="btn btn-warning">Learn More </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- kotak2 seaction --}}
    <section id="service" class="service section-padding">
        <div class="container-fluid">
            <div>
                <div class="card card-default">
                    <div class="card-header">{{ __('Fasilitas') }}</div>
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-white">
                            <thead>
                                <tr class="text-center">
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>DESKRIPSI</th>
                                    <th>JUMLAH</th>
                                    <th>KONDISI</th>
                                    <th>LOKASI</th>
                                    <th>PENGGUNAAN</th>
                                    <th>PHOTO</th>
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
                                            @if ($fasilitas->phote !== null)
                                                <img src="{{ asset('storage/photo_fasilitas/' . $pengguna->photo) }}"
                                                    width="100px" />
                                            @else
                                                [gambar tidak tersedia]
                                            @endif
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- footer --}}
    <footer class="bg-dark p-2 text-center">
        <div class="container">
            <div class="text-white">All Right Reserved @SMKN 1 CIPANAS</div>
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
